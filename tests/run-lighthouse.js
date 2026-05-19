/**
 * Run Lighthouse on critical pages, mobile + desktop.
 * Saves JSON + HTML reports + summary table.
 */
const fs = require('fs');
const path = require('path');
const { spawnSync } = require('child_process');

const BASE = process.env.BASE_URL || 'http://localhost:8000';
const REPORTS_DIR = path.join(__dirname, 'reports', 'lighthouse');
const CHROME = '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';
const LH_BIN = path.join(__dirname, 'node_modules', '.bin', 'lighthouse');

const TARGETS = [
  { name: 'home',         url: '/' },
  { name: 'delegation',   url: '/delegation.php' },
  { name: 'contact-us',   url: '/contact-us.php' },
  { name: 'faq',          url: '/faq.php' },
];

const FORM_FACTORS = ['mobile', 'desktop'];

if (!fs.existsSync(REPORTS_DIR)) fs.mkdirSync(REPORTS_DIR, { recursive: true });

const summary = [];

for (const t of TARGETS) {
  for (const ff of FORM_FACTORS) {
    const reportBase = path.join(REPORTS_DIR, `${t.name}__${ff}`);
    console.log(`\n>> ${t.name} [${ff}]`);
    const args = [
      BASE + t.url,
      '--quiet',
      '--chrome-flags=--headless=new --no-sandbox --disable-gpu',
      ...(ff === 'desktop' ? ['--preset=desktop'] : [`--form-factor=mobile`, '--screenEmulation.mobile=true']),
      `--output=json`,
      `--output=html`,
      `--output-path=${reportBase}`,
      `--only-categories=performance,accessibility,best-practices,seo`,
    ].filter(Boolean);

    const res = spawnSync(LH_BIN, args, {
      env: { ...process.env, CHROME_PATH: CHROME },
      timeout: 180000,
    });
    if (res.status !== 0) {
      console.log('  FAILED:', res.stderr?.toString().slice(0, 400));
      continue;
    }
    const jsonPath = reportBase + '.report.json';
    if (!fs.existsSync(jsonPath)) {
      console.log('  No JSON output');
      continue;
    }
    const data = JSON.parse(fs.readFileSync(jsonPath, 'utf8'));
    const cats = data.categories;
    const audits = data.audits;
    const row = {
      page: t.name,
      formFactor: ff,
      perf: Math.round((cats.performance?.score || 0) * 100),
      a11y: Math.round((cats.accessibility?.score || 0) * 100),
      bp:   Math.round((cats['best-practices']?.score || 0) * 100),
      seo:  Math.round((cats.seo?.score || 0) * 100),
      fcp: audits['first-contentful-paint']?.displayValue,
      lcp: audits['largest-contentful-paint']?.displayValue,
      tbt: audits['total-blocking-time']?.displayValue,
      cls: audits['cumulative-layout-shift']?.displayValue,
      si:  audits['speed-index']?.displayValue,
    };
    summary.push(row);
    console.log(`  Perf ${row.perf}, A11y ${row.a11y}, BP ${row.bp}, SEO ${row.seo} | LCP ${row.lcp}, FCP ${row.fcp}, CLS ${row.cls}, SI ${row.si}`);
  }
}

let md = `# Lighthouse Report\n\n`;
md += `**Date:** ${new Date().toISOString()}\n**Base:** ${BASE}\n\n`;
md += `| Page | Form factor | Perf | A11y | BP | SEO | FCP | LCP | TBT | CLS | Speed Idx |\n`;
md += `|------|-------------|------|------|----|----|-----|-----|-----|-----|-----------|\n`;
for (const r of summary) {
  md += `| ${r.page} | ${r.formFactor} | **${r.perf}** | ${r.a11y} | ${r.bp} | ${r.seo} | ${r.fcp} | ${r.lcp} | ${r.tbt} | ${r.cls} | ${r.si} |\n`;
}
fs.writeFileSync(path.join(REPORTS_DIR, 'summary.md'), md);
fs.writeFileSync(path.join(REPORTS_DIR, 'summary.json'), JSON.stringify(summary, null, 2));
console.log('\nSummary saved:', path.join(REPORTS_DIR, 'summary.md'));
