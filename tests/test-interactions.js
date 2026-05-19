/**
 * Interaction Tests — verify interactive UI works correctly.
 * Tests:
 *  1. Mobile hamburger toggle (375px)
 *  2. Desktop nav dropdown hover (1440px)
 *  3. FAQ accordion expand/collapse
 *  4. Smooth scroll to anchor links
 *  5. Scroll-reveal animations trigger
 *  6. Form field validation (HTML5 required)
 *  7. Page link navigation (no 404s on internal links)
 *  8. Video element renders + plays
 */
const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const BASE = process.env.BASE_URL || 'http://localhost:8000';
const REPORTS = path.join(__dirname, 'reports');
if (!fs.existsSync(REPORTS)) fs.mkdirSync(REPORTS, { recursive: true });

const sleep = ms => new Promise(r => setTimeout(r, ms));

const results = [];
function record(name, ok, details = '') {
  results.push({ test: name, ok, details });
  const mark = ok ? '✓' : '✗';
  console.log(`${mark} ${name}${details ? ': ' + details : ''}`);
}

(async () => {
  console.log('Interaction tests starting...\n');
  const browser = await puppeteer.launch({
    headless: 'new',
    args: ['--no-sandbox', '--disable-setuid-sandbox', '--disable-dev-shm-usage'],
  });

  // ==================================================================
  // TEST 1: Mobile Hamburger Toggle
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 375, height: 812, isMobile: true });
    await ctx.setUserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 17_0 like Mac OS X) AppleWebKit/605.1.15 Version/17.0 Mobile/15E148 Safari/604.1');
    await ctx.goto(BASE, { waitUntil: 'networkidle2', timeout: 30000 });
    await sleep(800);

    // Check hamburger button is visible on mobile
    const togglerVisible = await ctx.evaluate(() => {
      const t = document.querySelector('.nav-mis-toggle');
      if (!t) return null;
      const r = t.getBoundingClientRect();
      const cs = getComputedStyle(t);
      return {
        rendered: r.width > 0 && r.height > 0,
        display: cs.display,
        ariaLabel: t.getAttribute('aria-label'),
      };
    });
    record('hamburger button visible on mobile (375px)',
      togglerVisible?.rendered === true && togglerVisible?.display !== 'none',
      JSON.stringify(togglerVisible));

    // Check menu is hidden initially
    const menuHiddenInitial = await ctx.evaluate(() => {
      const m = document.querySelector('.nav-mis-menu');
      if (!m) return null;
      const cs = getComputedStyle(m);
      return { maxHeight: cs.maxHeight, opacity: cs.opacity };
    });
    record('mobile menu collapsed initially',
      menuHiddenInitial && (parseFloat(menuHiddenInitial.opacity) === 0 || menuHiddenInitial.maxHeight === '0px'),
      JSON.stringify(menuHiddenInitial));

    // Click hamburger
    await ctx.click('.nav-mis-toggle');
    await sleep(500);
    const menuOpen = await ctx.evaluate(() => {
      const m = document.querySelector('.nav-mis-menu');
      const cs = m ? getComputedStyle(m) : null;
      const r = m ? m.getBoundingClientRect() : null;
      return cs ? {
        opacity: cs.opacity,
        maxHeight: cs.maxHeight,
        height: r.height,
        hasActiveClass: m.classList.contains('active') || document.querySelector('.nav-mis')?.classList.contains('mobile-menu-open'),
      } : null;
    });
    record('mobile menu opens after hamburger click',
      menuOpen && (parseFloat(menuOpen.opacity) > 0 || menuOpen.height > 50),
      JSON.stringify(menuOpen));

    await ctx.close();
  }

  // ==================================================================
  // TEST 2: Desktop Nav Dropdown
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 1440, height: 900 });
    await ctx.goto(BASE, { waitUntil: 'networkidle2' });
    await sleep(500);

    // Hover the Products dropdown
    await ctx.hover('.nav-mis-dropdown');
    await sleep(400);
    const dropdown = await ctx.evaluate(() => {
      const d = document.querySelector('.nav-mis-dropdown-menu');
      if (!d) return null;
      const cs = getComputedStyle(d);
      const r = d.getBoundingClientRect();
      return {
        opacity: cs.opacity,
        visibility: cs.visibility,
        width: r.width,
        height: r.height,
      };
    });
    record('desktop nav dropdown opens on hover',
      dropdown && parseFloat(dropdown.opacity) > 0 && dropdown.visibility === 'visible',
      `opacity=${dropdown?.opacity}, visibility=${dropdown?.visibility}`);

    await ctx.close();
  }

  // ==================================================================
  // TEST 3: FAQ Accordion (homepage has FAQ section)
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 1440, height: 900 });
    await ctx.goto(BASE, { waitUntil: 'networkidle2' });
    await sleep(500);

    // Scroll to FAQ
    await ctx.evaluate(() => {
      const faq = document.querySelector('.faq-list, .faq-item');
      if (faq) faq.scrollIntoView({ behavior: 'instant' });
    });
    await sleep(500);

    // Find first inactive FAQ item, click and check answer expands
    const faqResult = await ctx.evaluate(async () => {
      const items = document.querySelectorAll('.faq-item');
      if (!items.length) return { error: 'no .faq-item found' };
      // Find any item, click its question button
      let target = items[1] || items[0]; // skip first one which may be already active
      const btn = target.querySelector('.faq-question, button');
      if (!btn) return { error: 'no question button' };
      const wasActive = target.classList.contains('active');
      btn.click();
      await new Promise(r => setTimeout(r, 350));
      const isActive = target.classList.contains('active');
      const answer = target.querySelector('.faq-answer');
      const ah = answer ? answer.getBoundingClientRect().height : 0;
      return { wasActive, isActive, answerHeight: ah, totalItems: items.length };
    });
    record('FAQ accordion toggles on click',
      faqResult.totalItems > 0 && faqResult.isActive !== faqResult.wasActive,
      JSON.stringify(faqResult));

    await ctx.close();
  }

  // ==================================================================
  // TEST 4: Smooth scroll to #contact
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 1440, height: 900 });
    await ctx.goto(BASE, { waitUntil: 'networkidle2' });
    await sleep(400);

    const initialY = await ctx.evaluate(() => window.scrollY);
    await ctx.click('a[href="#contact"]');
    // Wait for scroll
    await sleep(1500);
    const finalY = await ctx.evaluate(() => window.scrollY);
    const contactInView = await ctx.evaluate(() => {
      const c = document.querySelector('#contact');
      if (!c) return null;
      const r = c.getBoundingClientRect();
      return r.top >= -50 && r.top < window.innerHeight;
    });
    record('clicking #contact scrolls into view',
      finalY > initialY + 500 && contactInView === true,
      `from ${initialY} → ${finalY}, contact-in-view: ${contactInView}`);

    await ctx.close();
  }

  // ==================================================================
  // TEST 5: Scroll-reveal animations trigger
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 1440, height: 900 });
    await ctx.goto(BASE, { waitUntil: 'networkidle2' });
    await sleep(500);

    // Scroll page to trigger reveals
    await ctx.evaluate(async () => {
      let total = 0;
      const dist = 600;
      while (total < document.body.scrollHeight) {
        window.scrollBy(0, dist);
        total += dist;
        await new Promise(r => setTimeout(r, 200));
      }
    });
    await sleep(800);

    const revealsTriggered = await ctx.evaluate(() => {
      const els = document.querySelectorAll('.reveal-on-scroll, .reveal-stagger, [class*="reveal"]');
      let visible = 0;
      let total = els.length;
      els.forEach(el => {
        const cs = getComputedStyle(el);
        if (parseFloat(cs.opacity) > 0.5 ||
            el.classList.contains('is-visible') ||
            el.classList.contains('revealed') ||
            el.classList.contains('active')) {
          visible++;
        }
      });
      return { total, visible };
    });
    record('scroll-reveal elements become visible',
      revealsTriggered.total > 0 && revealsTriggered.visible / revealsTriggered.total > 0.3,
      `${revealsTriggered.visible}/${revealsTriggered.total} visible`);

    await ctx.close();
  }

  // ==================================================================
  // TEST 6: Contact form fill + validation
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 1440, height: 900 });
    await ctx.goto(BASE + '/contact-us.php', { waitUntil: 'networkidle2' });
    await sleep(500);

    // Find the contact form
    const formExists = await ctx.evaluate(() => {
      const f = document.querySelector('#contactFormMIS, #contactFormHome, form[id*="contact"], form[id*="Contact"]');
      return f ? f.id : null;
    });
    if (!formExists) {
      record('contact form found', false, 'no form found');
    } else {
      // Try to submit empty (HTML5 validation should prevent)
      const validation = await ctx.evaluate((fid) => {
        const f = document.getElementById(fid);
        const reqFields = f.querySelectorAll('[required]');
        let invalid = 0;
        reqFields.forEach(field => { if (!field.checkValidity()) invalid++; });
        return { reqCount: reqFields.length, invalidCount: invalid };
      }, formExists);
      record('contact form has required-field validation',
        validation.reqCount > 0 && validation.invalidCount === validation.reqCount,
        `${validation.invalidCount}/${validation.reqCount} required-field validation`);

      // Fill form
      await ctx.evaluate((fid) => {
        const f = document.getElementById(fid);
        const set = (sel, val) => { const e = f.querySelector(sel); if (e) { e.value = val; e.dispatchEvent(new Event('input', {bubbles:true})); } };
        set('input[name="name"]', 'Test User');
        set('input[name="email"]', 'test@example.com');
        set('input[name="phone"]', '+919999900000');
        set('input[name="city"]', 'Delhi');
        const sel = f.querySelector('select[name="interested"]');
        if (sel) { sel.value = 'Delegation System'; sel.dispatchEvent(new Event('change', {bubbles:true})); }
        set('textarea[name="message"]', 'Automated test - please ignore');
      }, formExists);
      await sleep(300);

      const filled = await ctx.evaluate((fid) => {
        const f = document.getElementById(fid);
        const reqFields = f.querySelectorAll('[required]');
        let invalid = 0;
        reqFields.forEach(field => { if (!field.checkValidity()) invalid++; });
        return { invalid };
      }, formExists);
      record('contact form valid after filling all required fields',
        filled.invalid === 0,
        `${filled.invalid} invalid fields after fill`);
    }
    await ctx.close();
  }

  // ==================================================================
  // TEST 7: All nav links resolve to 200
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 1440, height: 900 });
    await ctx.goto(BASE, { waitUntil: 'networkidle2' });
    await sleep(400);

    const links = await ctx.evaluate(() => {
      const ls = Array.from(document.querySelectorAll('a[href]'));
      return ls
        .map(a => a.getAttribute('href'))
        .filter(h => h && !h.startsWith('#') && !h.startsWith('mailto:') && !h.startsWith('tel:') && !h.startsWith('javascript:') && !h.startsWith('http://localhost') && !h.startsWith('https://'))
        .filter((h, i, arr) => arr.indexOf(h) === i); // unique
    });

    let broken = [];
    for (const href of links) {
      try {
        const resp = await fetch(BASE + (href.startsWith('/') ? href : '/' + href), { method: 'HEAD' });
        if (resp.status >= 400) broken.push({ href, status: resp.status });
      } catch (e) { broken.push({ href, error: e.message }); }
    }
    record(`all internal nav links return 200 (${links.length} unique)`,
      broken.length === 0,
      broken.length ? `broken: ${JSON.stringify(broken).slice(0,200)}` : `all ${links.length} OK`);

    await ctx.close();
  }

  // ==================================================================
  // TEST 8: Hero video element renders + autoplays
  // ==================================================================
  {
    const ctx = await browser.newPage();
    await ctx.setViewport({ width: 1440, height: 900 });
    await ctx.goto(BASE, { waitUntil: 'networkidle2' });
    await sleep(2500); // give video time to start

    const videoState = await ctx.evaluate(() => {
      const v = document.querySelector('.hero-mega-video-wrapper video');
      if (!v) return { found: false };
      return {
        found: true,
        autoplay: v.autoplay,
        muted: v.muted,
        loop: v.loop,
        playsInline: v.playsInline,
        readyState: v.readyState,         // 0=nothing, 1=metadata, 4=enough
        currentTime: v.currentTime,
        duration: v.duration,
        paused: v.paused,
        src: (v.currentSrc || '').slice(-30),
      };
    });
    record('hero video element renders with autoplay/muted/loop',
      videoState.found && videoState.autoplay && videoState.muted && videoState.loop,
      JSON.stringify(videoState));

    await ctx.close();
  }

  // ==================================================================
  // Save report
  // ==================================================================
  await browser.close();

  fs.writeFileSync(
    path.join(REPORTS, 'interactions.json'),
    JSON.stringify(results, null, 2)
  );

  const passed = results.filter(r => r.ok).length;
  console.log(`\n=== ${passed}/${results.length} interaction tests passed ===`);
  if (passed < results.length) {
    console.log('\nFailures:');
    results.filter(r => !r.ok).forEach(r => console.log(`  - ${r.test}: ${r.details}`));
  }
})();
