/**
 * Extract critical (above-the-fold) CSS for each page archetype.
 * Uses Critical (which wraps Penthouse + Puppeteer).
 *
 * Outputs per-archetype CSS to assets/css/critical/.
 */

const fs = require('fs');
const path = require('path');

const ROOT = path.resolve(__dirname, '..');
const OUT_DIR = path.join(ROOT, 'assets', 'css', 'critical');
if (!fs.existsSync(OUT_DIR)) fs.mkdirSync(OUT_DIR, { recursive: true });

const BASE = 'http://localhost:8000';

// Mobile-first dimensions for critical extraction
// Larger height captures more above-the-fold content for better visual stability
const DIMS = [
  { width: 414,  height: 896  },
  { width: 1300, height: 900  },
];

const PAGES = [
  { name: 'home',     url: '/' },
  { name: 'product',  url: '/delegation.php' },
  { name: 'content',  url: '/contact-us.php' },
  { name: 'gallery',  url: '/video-gallery.php' },
  { name: 'faq',      url: '/faq.php' },
];

(async () => {
  const { generate } = await import('critical');
  console.log('Extracting critical CSS from local server...\n');

  for (const page of PAGES) {
    const url = BASE + page.url;
    console.log(`>> ${page.name}: ${url}`);
    try {
      const result = await generate({
        base: ROOT,
        src: url,
        // Combined dimensions = critical CSS that covers both mobile + desktop above-fold
        dimensions: DIMS,
        inline: false,
        extract: false,        // we'll defer the originals manually
        ignore: {
          atrule: ['@font-face'], // skip @font-face since fonts are loaded via Google
        },
        penthouse: {
          timeout: 60000,
          renderWaitTime: 1500,
          puppeteer: {
            args: ['--no-sandbox', '--disable-setuid-sandbox'],
          },
        },
      });

      const css = (result.css || '').trim();
      if (!css) {
        console.log(`   ⚠️  empty CSS — skipping`);
        continue;
      }
      const outPath = path.join(OUT_DIR, page.name + '.css');
      fs.writeFileSync(outPath, css);
      const kb = (Buffer.byteLength(css) / 1024).toFixed(1);
      console.log(`   ✓ ${kb} KB → ${path.relative(ROOT, outPath)}`);
    } catch (e) {
      console.log(`   ❌ ${e.message}`);
    }
  }

  console.log('\nDone. Critical CSS in:', path.relative(ROOT, OUT_DIR));
})();
