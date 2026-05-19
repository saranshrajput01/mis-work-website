/**
 * MIS.work — Cross-device testing
 * Visits all pages at 4 viewports, captures:
 *  - Console errors / warnings
 *  - Failed network requests (404s, broken images)
 *  - Horizontal overflow (mobile responsive bug)
 *  - JS runtime errors
 *  - Screenshots
 */

const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const BASE = process.env.BASE_URL || 'http://localhost:8000';
const SCREENS_DIR = path.join(__dirname, 'screenshots');
const REPORTS_DIR = path.join(__dirname, 'reports');

const PAGES = [
  { name: 'home', url: '/' },
  { name: 'about-us', url: '/about-us.php' },
  { name: 'services', url: '/services.php' },
  { name: 'delegation', url: '/delegation.php' },
  { name: 'checklist', url: '/checklist.php' },
  { name: 'leave-application', url: '/leave-application.php' },
  { name: 'lead-management', url: '/lead-management.php' },
  { name: 'attendance', url: '/attendance-management-system.php' },
  { name: 'video-gallery', url: '/video-gallery.php' },
  { name: 'faq', url: '/faq.php' },
  { name: 'contact-us', url: '/contact-us.php' },
  { name: 'blogs', url: '/blogs.php' },
  { name: 'blog-details', url: '/blog-details.php' },
  { name: 'privacy-policy', url: '/privacy-policy.php' },
  { name: 'terms', url: '/terms-conditions.php' },
];

const VIEWPORTS = [
  { name: 'mobile-sm',  width: 375,  height: 812,  device: 'iPhone SE / 13 mini' },
  { name: 'mobile-lg',  width: 414,  height: 896,  device: 'iPhone 14 Pro Max'   },
  { name: 'tablet',     width: 768,  height: 1024, device: 'iPad'                },
  { name: 'desktop',    width: 1440, height: 900,  device: 'Desktop'             },
];

const sleep = (ms) => new Promise(r => setTimeout(r, ms));

async function testPage(browser, page, viewport, results) {
  const ctx = await browser.newPage();
  await ctx.setViewport({ width: viewport.width, height: viewport.height, deviceScaleFactor: 1 });
  await ctx.setUserAgent(viewport.width < 500
    ? 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 Version/17.0 Mobile/15E148 Safari/604.1'
    : 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/120.0 Safari/537.36');

  const issues = {
    page: page.name,
    viewport: viewport.name,
    url: page.url,
    consoleErrors: [],
    consoleWarnings: [],
    pageErrors: [],
    failedRequests: [],
    httpStatus: null,
    horizontalOverflow: null,
    overflowingElements: [],
    loadTimeMs: null,
    screenshotPath: null,
  };

  ctx.on('console', (msg) => {
    if (msg.type() === 'error') issues.consoleErrors.push(msg.text().slice(0, 300));
    else if (msg.type() === 'warning') issues.consoleWarnings.push(msg.text().slice(0, 300));
  });
  ctx.on('pageerror', (err) => {
    issues.pageErrors.push((err.message || String(err)).slice(0, 300));
  });
  ctx.on('requestfailed', (req) => {
    issues.failedRequests.push({
      url: req.url().slice(0, 200),
      reason: req.failure()?.errorText || 'unknown',
    });
  });
  ctx.on('response', (res) => {
    const url = res.url();
    if (url === BASE + page.url || url === BASE + page.url + '/') {
      issues.httpStatus = res.status();
    }
    if (res.status() >= 400) {
      issues.failedRequests.push({ url: url.slice(0, 200), reason: `HTTP ${res.status()}` });
    }
  });

  const t0 = Date.now();
  try {
    const resp = await ctx.goto(BASE + page.url, { waitUntil: 'networkidle2', timeout: 45000 });
    if (issues.httpStatus == null && resp) issues.httpStatus = resp.status();
    await sleep(800); // settle animations
  } catch (e) {
    issues.pageErrors.push('NAV: ' + e.message);
  }
  issues.loadTimeMs = Date.now() - t0;

  // Detect horizontal overflow
  try {
    const overflow = await ctx.evaluate((vw) => {
      const docW = Math.max(
        document.documentElement.scrollWidth,
        document.body ? document.body.scrollWidth : 0
      );
      const offenders = [];
      const all = document.querySelectorAll('body *');
      for (const el of all) {
        const r = el.getBoundingClientRect();
        if (r.right > vw + 1 || r.left < -1) {
          if (r.width > 0 && r.height > 0) {
            const sel = el.tagName.toLowerCase()
              + (el.id ? '#' + el.id : '')
              + (el.className && typeof el.className === 'string'
                  ? '.' + el.className.split(/\s+/).slice(0, 2).join('.')
                  : '');
            offenders.push({
              sel: sel.slice(0, 120),
              right: Math.round(r.right),
              left: Math.round(r.left),
              w: Math.round(r.width),
            });
            if (offenders.length >= 10) break;
          }
        }
      }
      return { docWidth: docW, viewportWidth: vw, offenders };
    }, viewport.width);
    issues.horizontalOverflow = overflow.docWidth > viewport.width + 2;
    issues.documentWidth = overflow.docWidth;
    issues.overflowingElements = overflow.offenders;
  } catch (e) {
    issues.pageErrors.push('OVERFLOW_CHECK: ' + e.message);
  }

  // Screenshot
  try {
    const fname = `${page.name}__${viewport.name}.png`;
    const fpath = path.join(SCREENS_DIR, fname);
    await ctx.screenshot({ path: fpath, fullPage: false });
    issues.screenshotPath = path.relative(__dirname, fpath);
  } catch (e) {
    issues.pageErrors.push('SCREENSHOT: ' + e.message);
  }

  await ctx.close();
  results.push(issues);
  const status = issues.httpStatus === 200 ? '✓' : '✗';
  const overflow = issues.horizontalOverflow ? ' [OVERFLOW]' : '';
  const errs = issues.consoleErrors.length || issues.pageErrors.length
    ? ` [${issues.consoleErrors.length + issues.pageErrors.length} errs]` : '';
  console.log(`${status} ${page.name.padEnd(20)} ${viewport.name.padEnd(10)} ${issues.httpStatus} ${issues.loadTimeMs}ms${overflow}${errs}`);
}

(async () => {
  console.log(`\nTesting ${PAGES.length} pages × ${VIEWPORTS.length} viewports = ${PAGES.length * VIEWPORTS.length} runs`);
  console.log(`Base: ${BASE}\n`);
  if (!fs.existsSync(SCREENS_DIR)) fs.mkdirSync(SCREENS_DIR, { recursive: true });
  if (!fs.existsSync(REPORTS_DIR)) fs.mkdirSync(REPORTS_DIR, { recursive: true });

  const browser = await puppeteer.launch({
    headless: 'new',
    args: ['--no-sandbox', '--disable-setuid-sandbox', '--disable-dev-shm-usage'],
  });

  const results = [];
  const t0 = Date.now();
  for (const page of PAGES) {
    for (const vp of VIEWPORTS) {
      await testPage(browser, page, vp, results);
    }
  }
  const dur = ((Date.now() - t0) / 1000).toFixed(1);

  await browser.close();

  // Save raw JSON
  fs.writeFileSync(
    path.join(REPORTS_DIR, 'results.json'),
    JSON.stringify(results, null, 2),
  );

  // Summary
  const total = results.length;
  const ok200 = results.filter(r => r.httpStatus === 200).length;
  const overflow = results.filter(r => r.horizontalOverflow);
  const withConsoleErr = results.filter(r => r.consoleErrors.length);
  const withPageErr = results.filter(r => r.pageErrors.length);
  const withFailed = results.filter(r => r.failedRequests.length);
  const failedReqsTotal = results.reduce((s, r) => s + r.failedRequests.length, 0);
  const consoleErrsTotal = results.reduce((s, r) => s + r.consoleErrors.length, 0);
  const avgLoad = Math.round(results.reduce((s, r) => s + (r.loadTimeMs || 0), 0) / total);

  let md = `# Cross-Device Test Report\n\n`;
  md += `**Date:** ${new Date().toISOString()}\n`;
  md += `**Base URL:** ${BASE}\n`;
  md += `**Total runs:** ${total} (${PAGES.length} pages × ${VIEWPORTS.length} viewports)\n`;
  md += `**Duration:** ${dur}s\n\n`;
  md += `## Summary\n\n`;
  md += `| Metric | Value |\n|---|---|\n`;
  md += `| HTTP 200 OK | ${ok200}/${total} |\n`;
  md += `| Horizontal overflow detected | ${overflow.length} runs |\n`;
  md += `| Runs with console errors | ${withConsoleErr.length} (${consoleErrsTotal} total) |\n`;
  md += `| Runs with page errors | ${withPageErr.length} |\n`;
  md += `| Runs with failed requests | ${withFailed.length} (${failedReqsTotal} total) |\n`;
  md += `| Avg load time | ${avgLoad} ms |\n\n`;

  md += `## Per-Page × Per-Viewport\n\n`;
  md += `| Page | Viewport | Status | Load (ms) | Overflow | Console err | Page err | Failed req |\n`;
  md += `|------|----------|--------|-----------|----------|-------------|----------|------------|\n`;
  for (const r of results) {
    md += `| ${r.page} | ${r.viewport} | ${r.httpStatus} | ${r.loadTimeMs} | ${r.horizontalOverflow ? '⚠️ YES' : 'no'} | ${r.consoleErrors.length} | ${r.pageErrors.length} | ${r.failedRequests.length} |\n`;
  }

  if (overflow.length) {
    md += `\n## ⚠️ Horizontal Overflow Issues\n\n`;
    for (const r of overflow) {
      md += `### ${r.page} @ ${r.viewport} (vw ${VIEWPORTS.find(v=>v.name===r.viewport).width}px, doc ${r.documentWidth}px)\n`;
      for (const off of r.overflowingElements.slice(0, 5)) {
        md += `- \`${off.sel}\` — right=${off.right}px width=${off.w}px\n`;
      }
      md += `\n`;
    }
  }

  if (consoleErrsTotal) {
    md += `\n## Console Errors\n\n`;
    const seen = new Set();
    for (const r of results) {
      for (const e of r.consoleErrors) {
        const key = e.slice(0, 120);
        if (seen.has(key)) continue;
        seen.add(key);
        md += `- **${r.page}** @ ${r.viewport}: ${e}\n`;
      }
    }
  }

  if (failedReqsTotal) {
    md += `\n## Failed Requests (HTTP 4xx/5xx or network errors)\n\n`;
    const seen = new Map();
    for (const r of results) {
      for (const f of r.failedRequests) {
        const key = f.url + '|' + f.reason;
        if (seen.has(key)) { seen.set(key, seen.get(key) + 1); continue; }
        seen.set(key, 1);
      }
    }
    const sorted = [...seen.entries()].sort((a,b) => b[1] - a[1]).slice(0, 50);
    for (const [k, count] of sorted) {
      md += `- (${count}x) ${k}\n`;
    }
  }

  fs.writeFileSync(path.join(REPORTS_DIR, 'report.md'), md);
  console.log(`\nReport: ${path.join(REPORTS_DIR, 'report.md')}`);
  console.log(`Screenshots: ${SCREENS_DIR}`);
  console.log(`\nSummary: ${ok200}/${total} OK, ${overflow.length} overflow, ${consoleErrsTotal} console errors, ${failedReqsTotal} failed requests`);
})();
