/* ==========================================================================
   MIS.work - Modern JavaScript (v2)
   GPU-accelerated cursor + advanced interactions
   ========================================================================== */

(function() {
  'use strict';

  // ============================================================
  // SMOOTH GPU-ACCELERATED CURSOR
  // ============================================================
  
  let cursor = null;
  let follower = null;
  let mouseX = 0, mouseY = 0;
  let cursorX = 0, cursorY = 0;
  let followerX = 0, followerY = 0;
  let cursorInitialized = false;
  
  function initCustomCursor() {
    // Skip on touch devices
    if (window.matchMedia('(hover: none)').matches) return;
    if (window.innerWidth < 1024) return;
    
    cursor = document.createElement('div');
    cursor.className = 'cursor-mis';
    document.body.appendChild(cursor);
    
    follower = document.createElement('div');
    follower.className = 'cursor-mis-follower';
    document.body.appendChild(follower);
    
    // Initialize at mouse position to prevent jump on first move
    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      
      if (!cursorInitialized) {
        cursorX = mouseX;
        cursorY = mouseY;
        followerX = mouseX;
        followerY = mouseY;
        cursorInitialized = true;
      }
    });
    
    // Hide on document leave
    document.addEventListener('mouseleave', () => {
      if (cursor) cursor.style.opacity = '0';
      if (follower) follower.style.opacity = '0';
    });
    
    document.addEventListener('mouseenter', () => {
      if (cursor) cursor.style.opacity = '1';
      if (follower) follower.style.opacity = '1';
    });
    
    // Smooth animation loop
    function animate() {
      // Small dot - very fast tracking (0.5 lerp = nearly instant but smooth)
      cursorX += (mouseX - cursorX) * 0.5;
      cursorY += (mouseY - cursorY) * 0.5;
      
      // Follower - slower, smooth lerp
      followerX += (mouseX - followerX) * 0.18;
      followerY += (mouseY - followerY) * 0.18;
      
      if (cursor) {
        cursor.style.transform = 
          `translate3d(${cursorX}px, ${cursorY}px, 0) translate(-50%, -50%)`;
      }
      if (follower) {
        follower.style.transform = 
          `translate3d(${followerX}px, ${followerY}px, 0) translate(-50%, -50%)`;
      }
      
      requestAnimationFrame(animate);
    }
    requestAnimationFrame(animate);
    
    // Hover state on interactive elements
    setupCursorHover();
  }
  
  function setupCursorHover() {
    if (!cursor || !follower) return;
    
    // Use event delegation for performance and dynamic elements
    document.body.addEventListener('mouseover', (e) => {
      const target = e.target.closest('a, button, input, textarea, select, [data-cursor-hover], .product-card-mis, .stat-card-mis, .testimonial-card-mis');
      if (target) {
        cursor.classList.add('hover');
        follower.classList.add('hover');
        
        // Special state for text inputs
        if (target.matches('input[type="text"], input[type="email"], input[type="tel"], textarea')) {
          cursor.classList.add('text');
        }
      }
    });
    
    document.body.addEventListener('mouseout', (e) => {
      const target = e.target.closest('a, button, input, textarea, select, [data-cursor-hover], .product-card-mis, .stat-card-mis, .testimonial-card-mis');
      if (target) {
        cursor.classList.remove('hover');
        cursor.classList.remove('text');
        follower.classList.remove('hover');
      }
    });
  }
  
  // ============================================================
  // SCROLL PROGRESS BAR
  // ============================================================
  
  function initScrollProgress() {
    const progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress';
    progressBar.innerHTML = '<div class="scroll-progress-bar"></div>';
    document.body.appendChild(progressBar);
    
    const bar = progressBar.querySelector('.scroll-progress-bar');
    
    function update() {
      const scrolled = window.pageYOffset;
      const height = document.documentElement.scrollHeight - window.innerHeight;
      const progress = (scrolled / height) * 100;
      bar.style.width = progress + '%';
    }
    
    window.addEventListener('scroll', update, { passive: true });
    update();
  }
  
  // ============================================================
  // SMOOTH SCROLL (Lenis-style with native API)
  // ============================================================
  
  function initSmoothScroll() {
    // DISABLED - Causing extreme delay
    // Let browser handle anchor links natively
    return;
  }
  
  function smoothScrollTo(targetY, duration) {
    // DISABLED
    return;
  }
  
  // ============================================================
  // NAVIGATION SCROLL BEHAVIOR
  // ============================================================
  
  function initNavigation() {
    const nav = document.querySelector('.nav-mis');
    if (!nav) return;
    
    let ticking = false;
    
    function updateNav() {
      const scrolled = window.pageYOffset;
      
      if (scrolled > 50) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }
      
      ticking = false;
    }
    
    window.addEventListener('scroll', () => {
      if (!ticking) {
        requestAnimationFrame(updateNav);
        ticking = true;
      }
    }, { passive: true });
    
    // Mobile menu toggle
    const toggle = document.querySelector('.nav-mis-toggle');
    const menu = document.querySelector('.nav-mis-menu');
    
    if (toggle && menu) {
      toggle.addEventListener('click', () => {
        toggle.classList.toggle('active');
        menu.classList.toggle('mobile-open');
      });
    }
  }
  
  // ============================================================
  // SCROLL REVEAL ANIMATIONS
  // ============================================================
  
  function initScrollReveal() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      root: null,
      rootMargin: '0px 0px -100px 0px',
      threshold: 0.1
    });
    
    document.querySelectorAll('.reveal-on-scroll, .reveal-stagger, .image-reveal').forEach(el => {
      observer.observe(el);
    });
  }
  
  // ============================================================
  // ANIMATED COUNTERS (Smooth easing)
  // ============================================================
  
  function animateCounter(element, target, duration = 2500) {
    const startTime = performance.now();
    const suffix = element.dataset.counterSuffix || '';
    
    function easeOutExpo(t) {
      return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
    }
    
    function update(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const eased = easeOutExpo(progress);
      const current = Math.floor(target * eased);
      
      element.textContent = current.toLocaleString('en-US') + (progress === 1 ? suffix : '');
      
      if (progress < 1) {
        requestAnimationFrame(update);
      }
    }
    
    requestAnimationFrame(update);
  }
  
  function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    if (counters.length === 0) return;
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const target = parseFloat(entry.target.dataset.counter);
          animateCounter(entry.target, target, 2500);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
  }
  
  // ============================================================
  // MAGNETIC BUTTONS (Smoother with RAF)
  // ============================================================
  
  function initMagneticButtons() {
    if (window.innerWidth < 1024) return;
    if (window.matchMedia('(hover: none)').matches) return;
    
    // MAGNETIC BUTTONS DISABLED FOR PERFORMANCE
    const buttons = document.querySelectorAll('.btn-magnetic, [data-magnetic]');
    
    buttons.forEach(button => {
      button.addEventListener('mouseenter', () => {
        button.style.transform = 'scale(1.05)';
      });
      
      button.addEventListener('mouseleave', () => {
        button.style.transform = 'scale(1)';
      });
    });
  }
  
  // ============================================================
  // CARD SPOTLIGHT EFFECT (Mouse-following glow)
  // ============================================================
  
  function initCardSpotlight() {
    const cards = document.querySelectorAll('.product-card-mis');
    
    cards.forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        
        card.style.setProperty('--mouse-x', `${x}%`);
        card.style.setProperty('--mouse-y', `${y}%`);
      });
    });
  }
  
  // ============================================================
  // 3D TILT EFFECT (Smoother)
  // ============================================================
  
  function init3DTilt() {
    if (window.innerWidth < 1024) return;
    if (window.matchMedia('(hover: none)').matches) return;
    
    const cards = document.querySelectorAll('[data-tilt]');
    
    cards.forEach(card => {
      let bounds;
      let targetRotateX = 0, targetRotateY = 0;
      let currentRotateX = 0, currentRotateY = 0;
      let rafId = null;
      let isHovering = false;
      
      function animate() {
        currentRotateX += (targetRotateX - currentRotateX) * 0.15;
        currentRotateY += (targetRotateY - currentRotateY) * 0.15;
        
        const scale = isHovering ? 1.02 : 1;
        card.style.transform = 
          `perspective(1200px) rotateX(${currentRotateX}deg) rotateY(${currentRotateY}deg) scale3d(${scale}, ${scale}, ${scale})`;
        
        if (Math.abs(currentRotateX - targetRotateX) > 0.01 || Math.abs(currentRotateY - targetRotateY) > 0.01 || isHovering) {
          rafId = requestAnimationFrame(animate);
        } else {
          rafId = null;
        }
      }
      
      card.addEventListener('mouseenter', () => {
        bounds = card.getBoundingClientRect();
        isHovering = true;
        if (!rafId) animate();
      });
      
      card.addEventListener('mousemove', (e) => {
        const x = e.clientX - bounds.left;
        const y = e.clientY - bounds.top;
        
        targetRotateX = ((y - bounds.height / 2) / bounds.height) * -10;
        targetRotateY = ((x - bounds.width / 2) / bounds.width) * 10;
        
        if (!rafId) animate();
      });
      
      card.addEventListener('mouseleave', () => {
        isHovering = false;
        targetRotateX = 0;
        targetRotateY = 0;
        if (!rafId) animate();
      });
    });
  }
  
  // ============================================================
  // MOUSE PARALLAX (Hero elements move with cursor)
  // ============================================================
  
  function initMouseParallax() {
    if (window.innerWidth < 1024) return;
    if (window.matchMedia('(hover: none)').matches) return;
    
    const hero = document.querySelector('.hero-mis');
    if (!hero) return;
    
    const orbs = hero.querySelectorAll('.hero-orb');
    const decorations = hero.querySelectorAll('.hero-decoration');
    
    let mouseX = 0, mouseY = 0;
    let targetMouseX = 0, targetMouseY = 0;
    
    document.addEventListener('mousemove', (e) => {
      targetMouseX = (e.clientX / window.innerWidth - 0.5) * 2;
      targetMouseY = (e.clientY / window.innerHeight - 0.5) * 2;
    });
    
    function animate() {
      mouseX += (targetMouseX - mouseX) * 0.05;
      mouseY += (targetMouseY - mouseY) * 0.05;
      
      orbs.forEach((orb, i) => {
        const intensity = 30 + i * 10;
        orb.style.transform = `translate3d(${mouseX * intensity}px, ${mouseY * intensity}px, 0)`;
      });
      
      decorations.forEach((dec, i) => {
        const intensity = 15 + i * 5;
        dec.style.transform = `translate3d(${mouseX * intensity}px, ${mouseY * intensity}px, 0)`;
      });
      
      requestAnimationFrame(animate);
    }
    requestAnimationFrame(animate);
  }
  
  // ============================================================
  // BUTTON RIPPLE EFFECT
  // ============================================================
  
  function initButtonRipple() {
    document.addEventListener('click', (e) => {
      const button = e.target.closest('.btn-mis');
      if (!button) return;
      
      const rect = button.getBoundingClientRect();
      const ripple = document.createElement('span');
      ripple.className = 'btn-ripple';
      
      const size = Math.max(rect.width, rect.height);
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
      ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
      
      button.appendChild(ripple);
      
      setTimeout(() => ripple.remove(), 600);
    });
  }
  
  // ============================================================
  // HERO TITLE WORD-BY-WORD ANIMATION
  // ============================================================
  
  function initHeroTitle() {
    const heroTitles = document.querySelectorAll('[data-split-words]');
    
    heroTitles.forEach(title => {
      const text = title.textContent;
      const words = text.split(' ');
      
      title.innerHTML = words.map((word, i) => 
        `<span class="hero-title-line">
          <span class="hero-title-word" style="animation-delay: ${0.4 + i * 0.1}s">${word}</span>
        </span>`
      ).join(' ');
    });
  }
  
  // ============================================================
  // TEXT REVEAL ON SCROLL (per character)
  // ============================================================
  
  function initTextReveal() {
    const elements = document.querySelectorAll('[data-text-reveal]');
    
    elements.forEach(el => {
      const text = el.textContent;
      el.innerHTML = '';
      el.classList.add('text-reveal');
      
      [...text].forEach((char, i) => {
        const span = document.createElement('span');
        span.className = 'text-reveal-char';
        span.textContent = char === ' ' ? '\u00A0' : char;
        span.style.transitionDelay = `${i * 30}ms`;
        el.appendChild(span);
      });
    });
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    
    elements.forEach(el => observer.observe(el));
  }
  
  // ============================================================
  // PERFORMANCE: Throttle resize for cursor recalculations
  // ============================================================
  
  function initResizeHandler() {
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        // Re-init magnetic bounds
        document.querySelectorAll('.btn-magnetic, [data-magnetic]').forEach(btn => {
          btn.style.transform = '';
        });
      }, 250);
    });
  }
  
  // ============================================================
  // INITIALIZE EVERYTHING
  // ============================================================
  
  function init() {
    // Critical first
    initCustomCursor();
    initScrollProgress();
    initNavigation();
    
    // Visual enhancements
    initScrollReveal();
    initCounters();
    initMagneticButtons();
    initCardSpotlight();
    init3DTilt();
    initMouseParallax();
    
    // Smooth scroll
    initSmoothScroll();
    
    // Text effects
    initHeroTitle();
    initTextReveal();
    
    // Click effects
    initButtonRipple();
    
    // Performance
    initResizeHandler();
  }
  
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
  
})();
