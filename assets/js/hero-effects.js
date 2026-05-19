/**
 * HERO SECTION - MINDBLOWING FUTURISTIC EFFECTS
 * Advanced animations and interactions
 */

(function() {
    'use strict';

    // ===== PARALLAX SCROLL EFFECT (COMPLETELY DISABLED) =====
    function initParallaxScroll() {
        // Disabled - causing laggy scroll
        return;
    }

    // ===== MOUSE TRACKING FOR MAGNETIC BUTTONS (DISABLED - CAUSING LAG) =====
    function initMagneticButtons() {
        // Simplified - just scale on hover
        const buttons = document.querySelectorAll('.btn-magnetic');
        
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    }

    // ===== 3D TILT EFFECT ON VIDEO (DISABLED - CAUSING LAG) =====
    function init3DTilt() {
        // Disabled for performance
        return;
    }

    // ===== FLOATING CARDS INTERACTIVE HOVER =====
    function initFloatingCardsHover() {
        const cards = document.querySelectorAll('.hero-floating-card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
                this.style.zIndex = '100';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.zIndex = '';
            });
        });
    }

    // ===== AURORA BLOBS MOUSE FOLLOW (DISABLED) =====
    function initAuroraFollow() {
        // Disabled - causing scroll lag
        return;
    }

    // ===== ANIMATED COUNTER FOR STATS =====
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    function initLiveStats() {
        const stats = document.querySelectorAll('[data-live-stat]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.liveStat);
                    animateCounter(entry.target, target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        stats.forEach(stat => observer.observe(stat));
    }

    // ===== GLITCH EFFECT ON TITLE (DISABLED - MAKING TEXT DISAPPEAR) =====
    function initGlitchEffect() {
        // Disabled - was causing text to disappear
        return;
    }

    // ===== RIPPLE EFFECT ON CLICK (DISABLED - CAUSING DELAY) =====
    function initRippleEffect() {
        // Disabled for instant button response
        return;
    }

    // ===== FLOATING ANIMATION RANDOMIZER =====
    function initFloatingAnimation() {
        const cards = document.querySelectorAll('.hero-floating-card');
        
        cards.forEach((card, index) => {
            const duration = 4 + Math.random() * 4;
            const delay = Math.random() * 2;
            
            card.style.animation = `float-element ${duration}s ease-in-out ${delay}s infinite`;
        });
    }

    // ===== GRADIENT ANIMATION ON SCROLL (DISABLED) =====
    function initGradientScroll() {
        // Disabled - causing scroll lag
        return;
    }

    // ===== VIDEO PLAY/PAUSE ON VISIBILITY =====
    function initVideoControl() {
        const video = document.querySelector('.hero-mega-video-wrapper video');
        if (!video) return;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    video.play();
                } else {
                    video.pause();
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(video);
    }

    // ===== PERFORMANCE OPTIMIZATION =====
    function optimizeForDevice() {
        const isMobile = window.innerWidth < 768;
        const isLowPerf = navigator.hardwareConcurrency < 4;
        
        if (isMobile || isLowPerf) {
            // Disable heavy effects on low-end devices
            document.querySelectorAll('.aurora-blob').forEach(blob => {
                blob.style.filter = 'blur(40px)';
            });
            
            document.querySelector('.noise-overlay')?.remove();
        }
    }

    // ===== INIT ALL EFFECTS =====
    function init() {
        if (!document.querySelector('.hero-mega')) return;
        
        initParallaxScroll();
        initMagneticButtons();
        init3DTilt();
        initFloatingCardsHover();
        initAuroraFollow();
        initLiveStats();
        initGlitchEffect();
        initRippleEffect();
        initFloatingAnimation();
        initGradientScroll();
        initVideoControl();
        optimizeForDevice();
        
        console.log('🚀 Hero futuristic effects initialized');
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
