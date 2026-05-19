/**
 * Multi-device full-page screenshot capture.
 * Uses Puppeteer's KnownDevices for accurate emulation.
 * Captures FULL PAGE (not viewport) so user can visually inspect entire layout.
 */
const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const BASE = process.env.BASE_URL || 'http://localhost:8000';
const OUT = path.join(__dirname, 'screenshots-devices');
if (!fs.existsSync(OUT)) fs.mkdirSync(OUT, { recursive: true });

// Device profiles — accurate emulation including UA, viewport, deviceScaleFactor
const DEVICES = [
  { name: 'iphone-se',       device: 'iPhone SE'                                    },
  { name: 'iphone-12-pro',   device: 'iPhone 12 Pro'                                },
  { name: 'iphone-14-promax',device: 'iPhone 14 Pro Max'                            },
  { name: 'pixel-7',         device: 'Pixel 7'                                      },
  { name: 'galaxy-s22',      device: 'Galaxy S9+'                                   }, // close to S22 dimensions
  { name: 'ipad',            device: 'iPad'                                         },
  { name: 'ipad-pro',        device: 'iPad Pro'                                     },
  { name: 'desktop-1440',    custom: { width: 1440, height: 900, dsf: 1, mobile: false, ua: 'Chrome' } },
  { name: 'desktop-1920',    custom: { width: 1920, height: 1080, dsf: 1, mobile: false, ua: 'Chrome' } },
];

const PAGES = [
  { name: 'home',          url: '/' },
  { name: 'delegation',    url: '/delegation.php' },
  { name: 'checklist',     url: '/checklist.php' },
  { name: 'attendance',    url: '/attendance-management-system.php' },
  { name: 'video-gallery', url: '/video-gallery.php' },
  { name: 'faq',           url: '/faq.php' },
  { name: 'contact-us',    url: '/contact-us.php' },
  { name: 'about-us',      url: '/about-us.php' },
];

const sleep = ms => new Promise(r => setTimeout(r, ms));

(async () => {
  console.log(`Multi-device screenshots: ${PAGES.length} pages × ${DEVICES.length} devices = ${PAGES.length * DEVICES.length} captures\n`);
  const browser = await puppeteer.launch({
    headless: 'new',
    args: ['--no-sandbox', '--disable-setuid-sandbox', '--disable-dev-shm-usage'],
  });
  const KnownDevices = puppeteer.KnownDevices || {};

  const results = [];
  const t0 = Date.now();

  for (const dev of DEVICES) {
    for (const pg of PAGES) {
      const ctx = await browser.newPage();
      try {
        if (dev.device && KnownDevices[dev.device]) {
          await ctx.emulate(KnownDevices[dev.device]);
        } else if (dev.custom) {
          await ctx.setViewport({
            width: dev.custom.width, height: dev.custom.height,
            deviceScaleFactor: dev.custom.dsf, isMobile: !!dev.custom.mobile,
          });
        }

        const t1 = Date.now();
        await ctx.goto(BASE + pg.url, { waitUntil: 'networkidle2', timeout: 45000 });
        // Wait for animations + lazy content
        await sleep(1500);
        // Trigger lazy-load images by scrolling to bottom and back
        await ctx.evaluate(async () => {
          await new Promise(resolve => {
            let total = 0;
            const dist = 400;
            const t = setInterval(() => {
              window.scrollBy(0, dist);
              total += dist;
              if (total >= document.body.scrollHeight) {
                clearInterval(t);
                window.scrollTo(0, 0);
                resolve();
              }
            }, 100);
          });
        });
        await sleep(800);

        const fname = `${pg.name}__${dev.name}.png`;
        await ctx.screenshot({
          path: path.join(OUT, fname),
          fullPage: true,
        });
        const took = Date.now() - t1;
        console.log(`✓ ${pg.name.padEnd(15)} ${dev.name.padEnd(20)} ${took}ms`);
        results.push({ page: pg.name, device: dev.name, ok: true, ms: took });
      } catch (e) {
        console.log(`✗ ${pg.name} ${dev.name}: ${e.message.slice(0,80)}`);
        results.push({ page: pg.name, device: dev.name, ok: false, error: e.message });
      } finally {
        await ctx.close();
      }
    }
  }

  const dur = ((Date.now() - t0) / 1000).toFixed(1);
  await browser.close();

  fs.writeFileSync(
    path.join(__dirname, 'reports', 'devices.json'),
    JSON.stringify(results, null, 2)
  );

  const ok = results.filter(r => r.ok).length;
  console.log(`\nDone in ${dur}s — ${ok}/${results.length} OK`);
  console.log(`Screenshots: ${OUT}`);
})();
