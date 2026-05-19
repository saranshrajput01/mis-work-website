/**
 * Pull failing audits + opportunities from each LH JSON report.
 */
const fs = require('fs');
const path = require('path');

const DIR = path.join(__dirname, 'reports', 'lighthouse');
const files = fs.readdirSync(DIR).filter(f => f.endsWith('.report.json'));

const opportunityMap = {}; // audit_id -> { title, displayValue (sum), occurrences }
const a11yFailMap = {};
const seoFailMap = {};
const bpFailMap = {};

for (const f of files) {
  const data = JSON.parse(fs.readFileSync(path.join(DIR, f), 'utf8'));
  const audits = data.audits;
  const target = f.replace('.report.json', '');
  for (const [id, audit] of Object.entries(audits)) {
    if (audit.score === null) continue;
    if (audit.score >= 0.9) continue;

    // Group by category via category refs
    const cats = data.categories;
    let cat = null;
    for (const [cid, c] of Object.entries(cats)) {
      if (c.auditRefs.find(r => r.id === id)) { cat = cid; break; }
    }
    if (!cat) continue;

    const entry = {
      id,
      title: audit.title,
      score: audit.score,
      displayValue: audit.displayValue,
      target,
    };
    if (cat === 'performance') {
      // We want opportunities only (savings)
      if (audit.details?.overallSavingsMs > 100 || audit.details?.type === 'opportunity') {
        const savings = audit.details?.overallSavingsMs || 0;
        if (!opportunityMap[id]) opportunityMap[id] = { id, title: audit.title, totalMs: 0, count: 0 };
        opportunityMap[id].totalMs += savings;
        opportunityMap[id].count++;
      }
    } else if (cat === 'accessibility' && audit.score < 1) {
      if (!a11yFailMap[id]) a11yFailMap[id] = { id, title: audit.title, count: 0, targets: [] };
      a11yFailMap[id].count++;
      a11yFailMap[id].targets.push(target);
    } else if (cat === 'seo' && audit.score < 1) {
      if (!seoFailMap[id]) seoFailMap[id] = { id, title: audit.title, count: 0, targets: [] };
      seoFailMap[id].count++;
      seoFailMap[id].targets.push(target);
    } else if (cat === 'best-practices' && audit.score < 1) {
      if (!bpFailMap[id]) bpFailMap[id] = { id, title: audit.title, count: 0, targets: [] };
      bpFailMap[id].count++;
      bpFailMap[id].targets.push(target);
    }
  }
}

console.log('\n=== TOP PERFORMANCE OPPORTUNITIES (sum savings across runs) ===\n');
const ops = Object.values(opportunityMap).sort((a, b) => b.totalMs - a.totalMs);
for (const o of ops.slice(0, 12)) {
  console.log(`  -${(o.totalMs/1000).toFixed(2)}s total | ${o.id}: ${o.title}`);
}

console.log('\n=== ACCESSIBILITY FAILURES ===\n');
for (const a of Object.values(a11yFailMap)) {
  console.log(`  [${a.count}x] ${a.id}: ${a.title}`);
}

console.log('\n=== SEO FAILURES ===\n');
for (const s of Object.values(seoFailMap)) {
  console.log(`  [${s.count}x] ${s.id}: ${s.title}`);
}

console.log('\n=== BEST-PRACTICES FAILURES ===\n');
for (const b of Object.values(bpFailMap)) {
  console.log(`  [${b.count}x] ${b.id}: ${b.title}`);
}
