/**
 * Multi-browser UA test:
 *  - Safari iOS / Mac
 *  - Chrome Android / Desktop
 *  - Firefox
 *  - Edge
 * For each, load homepage + product page and check for:
 *  - HTTP 200
 *  - Console errors
 *  - Layout overflow
 *  - Critical CSS inlined
 *  - Lazy images attribute present
 *
 * Plus: network throttling test (Slow 3G simulation)
 */
const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const BASE = process.env.BASE_URL || 'http://localhost:8000';
const REPORTS = path.join(__dirname, 'reports');

const sleep = ms => new Promise(r => setTimeout(r, ms));

const UAS = [
  { name: 'safari-ios',     ua: 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1', vp: { w: 414, h: 896, mobile: true } },
  { name: 'safari-mac',     ua: 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Safari/605.1.15', vp: { w: 1440, h: 900, mobile: false } },
  { name: 'chrome-android', ua: 'Mozilla/5.0 (Linux; Android 14; Pixel 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36', vp: { w: 412, h: 915, mobile: true } },
  { name: 'chrome-desktop', ua: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', vp: { w: 1440, h: 900, mobile: false } },
  { name: 'firefox-desktop',ua: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0', vp: { w: 1440, h: 900, mobile: false } },
  { name: 'edge-desktop',   ua: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', vp: { w: 1440, h: 900, mobile: false } },
  { name: 'samsung-internet',ua: 'Mozilla/5.0 (Linux; Android 13; SAMSUNG SM-S908U) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/24.0 Chrome/121.0.0.0 Mobile Safari/537.36', vp: { w: 360, h: 780, mobile: true } },
];

const URLS = [
  { name: 'home',       url: '/' },
  { name: 'delegation', url: '/delegation.php' },
  { name: 'contact-us', url: '/contact-us.php' },
  { name: 'faq',        url: '/faq.php' },
];

const results = [];

(async () => {
  console.log(`Multi-browser test: ${UAS.length} UAs × ${URLS.length} pages\n`);
  const browser = await puppeteer.launch({
    headless: 'new',
    args: ['--no-sandbox', '--disable-setuid-sandbox', '--disable-dev-shm-usage'],
  });

  for (const ua of UAS) {
    for (const u of URLS) {
      const ctx = await browser.newPage();
      const consoleErrors = [];
      const failedReqs = [];
      ctx.on('console', m => { if (m.type() === 'error') consoleErrors.push(m.text().slice(0,200)); });
      ctx.on('pageerror', e => consoleErrors.push('PAGE: ' + e.message.slice(0,200)));
      ctx.on('requestfailed', r => failedReqs.push(r.url().slice(0,100) + ' :: ' + (r.failure()?.errorText || '?')));

      await ctx.setUserAgent(ua.ua);
      await ctx.setViewport({ width: ua.vp.w, height: ua.vp.h, isMobile: ua.vp.mobile });

      let status = null, hasCritical = false, hasLazyImg = false, layoutOverflow = false;
      try {
        const r = await ctx.goto(BASE + u.url, { waitUntil: 'networkidle2', timeout: 45000 });
        status = r ? r.status() : 0;
        await sleep(800);

        const eval1 = await ctx.evaluate(() => {
          const critEl = document.querySelector('style#critical-css');
          const lazyImgs = document.querySelectorAll('img[loading="lazy"]').length;
          const docW = document.documentElement.scrollWidth;
          const vw = window.innerWidth;
          return {
            hasCritical: !!critEl && (critEl.textContent || '').length > 1000,
            critSize: critEl ? (critEl.textContent || '').length : 0,
            lazyImgs,
            docW, vw,
            overflow: docW > vw + 2,
          };
        });
        hasCritical = eval1.hasCritical;
        hasLazyImg = eval1.lazyImgs > 0;
        layoutOverflow = eval1.overflow;

        const ok = status === 200 && consoleErrors.length === 0 && !layoutOverflow;
        const mark = ok ? '✓' : (status === 200 ? '⚠' : '✗');
        console.log(`${mark} ${ua.name.padEnd(18)} ${u.name.padEnd(12)} ${status} | crit=${eval1.critSize}b lazy=${eval1.lazyImgs} ovrflw=${layoutOverflow} errs=${consoleErrors.length}`);
        results.push({ ua: ua.name, page: u.name, status, ok, hasCritical, critSize: eval1.critSize, lazyImgs: eval1.lazyImgs, layoutOverflow, consoleErrors: consoleErrors.slice(0,3), failedReqs: failedReqs.slice(0,3) });
      } catch (e) {
        console.log(`✗ ${ua.name} ${u.name}: ${e.message.slice(0,100)}`);
        results.push({ ua: ua.name, page: u.name, status: 0, ok: false, error: e.message });
      }
      await ctx.close();
    }
  }

  // ============================================================
  // Network throttling test (Slow 3G simulation)
  // ============================================================
  console.log('\n--- Slow 3G throttling test (homepage on mobile) ---');
  {
    const ctx = await browser.newPage();
    await ctx.setUserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1');
    await ctx.setViewport({ width: 414, height: 896, isMobile: true });

    // Slow 3G CDP throttling
    const client = await ctx.target().createCDPSession();
    await client.send('Network.emulateNetworkConditions', {
      offline: false,
      latency: 400,           // 400ms RTT
      downloadThroughput: 400 * 1024 / 8,  // 400 Kbps
      uploadThroughput: 400 * 1024 / 8,
    });
    await client.send('Emulation.setCPUThrottlingRate', { rate: 4 });

    const t0 = Date.now();
    const r = await ctx.goto(BASE, { waitUntil: 'networkidle2', timeout: 90000 });
    const ttFinish = Date.now() - t0;

    const perf = await ctx.evaluate(() => {
      const nav = performance.getEntriesByType('navigation')[0];
      const fcp = performance.getEntriesByType('paint').find(p => p.name === 'first-contentful-paint');
      return {
        fcp: fcp ? Math.round(fcp.startTime) : null,
        domContentLoaded: nav ? Math.round(nav.domContentLoadedEventEnd) : null,
        loadEvent: nav ? Math.round(nav.loadEventEnd) : null,
        totalDownload: performance.getEntriesByType('resource').reduce((s, r) => s + (r.transferSize || 0), 0),
      };
    });
    console.log(`  Slow 3G mobile: FCP=${perf.fcp}ms DCL=${perf.domContentLoaded}ms load=${perf.loadEvent}ms total=${ttFinish}ms`);
    console.log(`  Bytes downloaded: ${(perf.totalDownload/1024).toFixed(1)}KB`);
    results.push({ test: 'slow-3g-mobile', ...perf, ttFinish });
    await ctx.close();
  }

  await browser.close();

  fs.writeFileSync(path.join(REPORTS, 'browsers.json'), JSON.stringify(results, null, 2));

  // Summary
  const browserResults = results.filter(r => r.ua);
  const okBrowser = browserResults.filter(r => r.ok).length;
  const overflowCount = browserResults.filter(r => r.layoutOverflow).length;
  const errorCount = browserResults.filter(r => r.consoleErrors && r.consoleErrors.length).length;
  console.log(`\n=== Browser tests: ${okBrowser}/${browserResults.length} fully OK ===`);
  console.log(`Layout overflow: ${overflowCount} | Console errors: ${errorCount}`);
  if (overflowCount || errorCount) {
    console.log('\nIssues:');
    browserResults.filter(r => r.layoutOverflow || (r.consoleErrors && r.consoleErrors.length)).forEach(r => {
      console.log(`  ${r.ua}/${r.page}: overflow=${r.layoutOverflow} errors=${(r.consoleErrors || []).length}`);
      (r.consoleErrors || []).forEach(e => console.log(`    - ${e}`));
    });
  }
})();
