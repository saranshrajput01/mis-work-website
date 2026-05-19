/* ==========================================================================
   MIS.work - ULTRA Advanced Effects
   Scramble text, cursor trail, FAQ, spotlight, dashboard animations
   ========================================================================== */

(function() {
  'use strict';

  // ============================================================
  // SCRAMBLE TEXT EFFECT
  // ============================================================
  
  function initScrambleText() {
    const elements = document.querySelectorAll('[data-scramble]');
    const chars = '!<>-_\\/[]{}—=+*^?#________';
    
    elements.forEach(el => {
      const originalText = el.textContent;
      let scrambleInterval;
      let triggered = false;
      
      function scramble() {
        let iteration = 0;
        clearInterval(scrambleInterval);
        
        scrambleInterval = setInterval(() => {
          el.textContent = originalText
            .split('')
            .map((char, idx) => {
              if (idx < iteration) return originalText[idx];
              if (char === ' ') return ' ';
              return chars[Math.floor(Math.random() * chars.length)];
            })
            .join('');
          
          if (iteration >= originalText.length) {
            clearInterval(scrambleInterval);
            el.textContent = originalText;
          }
          iteration += 1 / 3;
        }, 30);
      }
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !triggered) {
            triggered = true;
            scramble();
          }
        });
      }, { threshold: 0.5 });
      
      observer.observe(el);
      
      el.addEventListener('mouseenter', () => {
        scramble();
      });
    });
  }
  
  // ============================================================
  // CURSOR TRAIL EFFECT
  // ============================================================
  
  function initCursorTrail() {
    if (window.innerWidth < 1024) return;
    if (window.matchMedia('(hover: none)').matches) return;
    
    const trailLength = 10;
    const trail = [];
    
    for (let i = 0; i < trailLength; i++) {
      const dot = document.createElement('div');
      dot.className = 'cursor-trail-dot';
      const size = 5 - (i * 0.35);
      dot.style.width = `${Math.max(2, size)}px`;
      dot.style.height = `${Math.max(2, size)}px`;
      dot.style.opacity = `${1 - (i / trailLength) * 0.95}`;
      document.body.appendChild(dot);
      trail.push({ el: dot, x: 0, y: 0 });
    }
    
    let mouseX = 0, mouseY = 0;
    
    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
    });
    
    function animate() {
      let prevX = mouseX;
      let prevY = mouseY;
      
      trail.forEach((dot, i) => {
        dot.x += (prevX - dot.x) * (0.4 - i * 0.025);
        dot.y += (prevY - dot.y) * (0.4 - i * 0.025);
        dot.el.style.transform = `translate3d(${dot.x}px, ${dot.y}px, 0) translate(-50%, -50%)`;
        prevX = dot.x;
        prevY = dot.y;
      });
      
      requestAnimationFrame(animate);
    }
    animate();
  }
  
  // ============================================================
  // SPOTLIGHT EFFECT
  // ============================================================
  
  function initSpotlight() {
    const sections = document.querySelectorAll('.spotlight-section');
    
    sections.forEach(section => {
      section.addEventListener('mousemove', (e) => {
        const rect = section.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        
        section.style.setProperty('--spotlight-x', `${x}%`);
        section.style.setProperty('--spotlight-y', `${y}%`);
      });
    });
  }
  
  // ============================================================
  // CONIC GRADIENT POINTER
  // ============================================================
  
  function initConicPointer() {
    const cards = document.querySelectorAll('.conic-card');
    
    cards.forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        
        card.style.setProperty('--cursor-x', `${x}%`);
        card.style.setProperty('--cursor-y', `${y}%`);
      });
    });
  }
  
  // ============================================================
  // WAVY TEXT SETUP
  // ============================================================
  
  function initWavyText() {
    const elements = document.querySelectorAll('[data-wavy-text]');
    
    elements.forEach(el => {
      if (el.dataset.processed) return;
      el.dataset.processed = 'true';
      const text = el.textContent;
      el.innerHTML = '';
      el.classList.add('wavy-text');
      
      [...text].forEach(char => {
        const span = document.createElement('span');
        span.className = 'wavy-text-char';
        span.textContent = char === ' ' ? '\u00A0' : char;
        el.appendChild(span);
      });
    });
  }
  
  // ============================================================
  // FAQ ACCORDION
  // ============================================================
  
  function initFAQ() {
    const items = document.querySelectorAll('.faq-item');
    
    items.forEach(item => {
      const question = item.querySelector('.faq-question');
      if (!question) return;
      
      question.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        items.forEach(i => i.classList.remove('active'));
        if (!isActive) {
          item.classList.add('active');
        }
      });
    });
  }
  
  // ============================================================
  // COMPARISON SLIDER
  // ============================================================
  
  function initComparisonSlider() {
    const sliders = document.querySelectorAll('.comparison-slider');
    
    sliders.forEach(slider => {
      const after = slider.querySelector('.comparison-slider-after');
      const handle = slider.querySelector('.comparison-slider-handle');
      
      if (!after || !handle) return;
      
      let isDragging = false;
      
      function updatePosition(clientX) {
        const rect = slider.getBoundingClientRect();
        const x = clientX - rect.left;
        const percent = Math.max(0, Math.min(100, (x / rect.width) * 100));
        
        after.style.width = `${percent}%`;
        handle.style.left = `${percent}%`;
      }
      
      slider.addEventListener('mousedown', (e) => {
        isDragging = true;
        updatePosition(e.clientX);
      });
      
      window.addEventListener('mousemove', (e) => {
        if (isDragging) updatePosition(e.clientX);
      });
      
      window.addEventListener('mouseup', () => { isDragging = false; });
      
      slider.addEventListener('touchstart', (e) => {
        isDragging = true;
        updatePosition(e.touches[0].clientX);
      });
      
      window.addEventListener('touchmove', (e) => {
        if (isDragging) updatePosition(e.touches[0].clientX);
      });
      
      window.addEventListener('touchend', () => { isDragging = false; });
    });
  }
  
  // ============================================================
  // DASHBOARD ANIMATED PROGRESS
  // ============================================================
  
  function initDashboardAnimation() {
    const dashboards = document.querySelectorAll('.dashboard-preview');
    
    dashboards.forEach(dashboard => {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const fills = dashboard.querySelectorAll('.dashboard-progress-fill');
            fills.forEach((fill, idx) => {
              setTimeout(() => {
                const target = fill.dataset.progress || '50';
                fill.style.setProperty('--progress-width', `${target}%`);
                fill.style.width = `${target}%`;
              }, idx * 200);
            });
            observer.unobserve(dashboard);
          }
        });
      }, { threshold: 0.3 });
      
      observer.observe(dashboard);
    });
  }
  
  // ============================================================
  // LIVE STATS (Numbers fluctuating)
  // ============================================================
  
  function initLiveStats() {
    const liveStats = document.querySelectorAll('[data-live-stat]');
    
    liveStats.forEach(stat => {
      const baseValue = parseInt(stat.dataset.liveStat);
      let currentValue = baseValue;
      
      setInterval(() => {
        const change = Math.floor(Math.random() * 5) - 2;
        currentValue = Math.max(baseValue - 10, Math.min(baseValue + 10, currentValue + change));
        stat.textContent = currentValue.toLocaleString('en-US');
      }, 2000);
    });
  }
  
  // ============================================================
  // SVG BEAM ANIMATION
  // ============================================================
  
  function initBeams() {
    const beams = document.querySelectorAll('.animated-beam');
    
    beams.forEach((beam, i) => {
      const length = beam.getTotalLength ? beam.getTotalLength() : 100;
      beam.style.strokeDasharray = `${length}`;
      beam.style.strokeDashoffset = `${length}`;
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            beam.style.transition = `stroke-dashoffset 2s ${i * 0.2}s ease-in-out`;
            beam.style.strokeDashoffset = '0';
            observer.unobserve(beam);
          }
        });
      }, { threshold: 0.3 });
      
      observer.observe(beam);
    });
  }
  
  // ============================================================
  // INITIALIZE EVERYTHING
  // ============================================================
  
  function init() {
    initScrambleText();
    initCursorTrail();
    initSpotlight();
    initConicPointer();
    initWavyText();
    initFAQ();
    initComparisonSlider();
    initDashboardAnimation();
    initLiveStats();
    initBeams();
  }
  
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
  
})();
