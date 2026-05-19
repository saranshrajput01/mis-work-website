/**
 * Build a minified base CSS containing:
 *  - variables.css (CSS custom properties / design tokens)
 *  - reset.css (browser normalization)
 *  - typography.css (heading/text defaults)
 *
 * This output is inlined into <head> on every page so critical CSS rules
 * have their var(--*) references resolvable from first paint.
 */

const fs = require('fs');
const path = require('path');

const ROOT = path.resolve(__dirname, '..');
const FILES = [
  'assets/css/base/variables.css',
  'assets/css/base/reset.css',
  'assets/css/base/typography.css',
];
const OUT = path.join(ROOT, 'assets/css/critical/base.css');

function minify(css) {
  return css
    // remove block comments
    .replace(/\/\*[\s\S]*?\*\//g, '')
    // collapse whitespace
    .replace(/\s+/g, ' ')
    // remove space around symbols
    .replace(/\s*([{};:,>+~])\s*/g, '$1')
    // trim leading/trailing space
    .trim();
}

let combined = '';
for (const rel of FILES) {
  const full = path.join(ROOT, rel);
  const content = fs.readFileSync(full, 'utf8');
  combined += `/* ${rel} */\n` + content + '\n';
}

const minified = minify(combined);
fs.writeFileSync(OUT, minified);

console.log(`Built ${path.relative(ROOT, OUT)}`);
console.log(`  raw: ${(Buffer.byteLength(combined) / 1024).toFixed(1)} KB`);
console.log(`  min: ${(Buffer.byteLength(minified) / 1024).toFixed(1)} KB`);
