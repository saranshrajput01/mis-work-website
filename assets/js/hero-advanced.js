/**
 * ULTRA ADVANCED HERO SECTION
 * Motion.dev inspired effects
 * - 3D Parallax on scroll
 * - Magnetic cursor interactions
 * - Smooth spring physics
 * - Live animated stats
 * - Typewriter effect
 */

(function() {
    'use strict';

    // ===== TYPEWRITER EFFECT =====
    class Typewriter {
        constructor(element, options = {}) {
            this.element = element;
            this.words = options.words || [];
            this.speed = options.speed || 100;
            this.deleteSpeed = options.deleteSpeed || 50;
            this.pauseTime = options.pauseTime || 2000;
            this.currentWordIndex = 0;
            this.currentText = '';
            this.isDeleting = false;
            
            if (this.words.length > 0) {
                this.type();
            }
        }
        
        type() {
            const currentWord = this.words[this.currentWordIndex];
            
            if (this.isDeleting) {
                this.currentText = currentWord.substring(0, this.currentText.length - 1);
            } else {
                this.currentText = currentWord.substring(0, this.currentText.length + 1);
            }
            
            this.element.textContent = this.currentText;
            
            let typeSpeed = this.isDeleting ? this.deleteSpeed : this.speed;
            
            if (!this.isDeleting && this.currentText === currentWord) {
                typeSpeed = this.pauseTime;
                this.isDeleting = true;
            } else if (this.isDeleting && this.currentText === '') {
                this.isDeleting = false;
                this.currentWordIndex = (this.currentWordIndex + 1) % this.words.length;
                typeSpeed = 500;
            }
            
            setTimeout(() => this.type(), typeSpeed);
        }
    }

    // ===== 3D PARALLAX ON SCROLL =====
    function init3DParallax() {
        const dashboard = document.querySelector('.hero-ultra-dashboard-wrapper');
        const productCards = document.querySelectorAll('.hero-ultra-product-card');
        
        if (!dashboard) return;
        
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.3;
            
            // Dashboard parallax
            dashboard.style.transform = `translateY(${rate}px) rotateX(${scrolled * 0.01}deg)`;
            
            // Product cards parallax
            productCards.forEach((card, index) => {
                const speed = 0.2 + (index * 0.1);
                card.style.transform = `translateY(${scrolled * speed}px) translateZ(${scrolled * 0.05}px)`;
            });
        });
    }

    // ===== MAGNETIC CURSOR EFFECT =====
    function initMagneticEffect() {
        const magneticElements = document.querySelectorAll('.hero-ultra-magnetic, .btn-magnetic');
        
        magneticElements.forEach(element => {
            element.addEventListener('mousemove', (e) => {
                const rect = element.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                const moveX = x * 0.3;
                const moveY = y * 0.3;
                
                element.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
            
            element.addEventListener('mouseleave', () => {
                element.style.transform = 'translate(0, 0)';
            });
        });
    }

    // ===== MOUSE MOVE 3D TILT =====
    function initMouseTilt() {
        const dashboard = document.querySelector('.hero-ultra-dashboard-wrapper');
        if (!dashboard) return;
        
        const container = document.querySelector('.hero-ultra');
        
        container.addEventListener('mousemove', (e) => {
            const rect = container.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width;
            const y = (e.clientY - rect.top) / rect.height;
            
            const rotateX = (y - 0.5) * 10;
            const rotateY = (x - 0.5) * -10;
            
            dashboard.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        container.addEventListener('mouseleave', () => {
            dashboard.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
        });
    }

    // ===== LIVE ANIMATED STATS =====
    function animateNumber(element, target, duration = 2000) {
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 16);
    }

    function initLiveStats() {
        const statElements = document.querySelectorAll('.hero-ultra-live-stat-value');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.target);
                    animateNumber(entry.target, target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        statElements.forEach(stat => observer.observe(stat));
    }

    // ===== FLOATING ANIMATION =====
    function initFloatingElements() {
        const floatingElements = document.querySelectorAll('.hero-ultra-product-card');
        
        floatingElements.forEach((element, index) => {
            const randomDelay = Math.random() * 2;
            const randomDuration = 6 + Math.random() * 4;
            
            element.style.animation = `float3D ${randomDuration}s ease-in-out infinite`;
            element.style.animationDelay = `${randomDelay}s`;
        });
    }

    // ===== GRADIENT ORBS MOUSE FOLLOW =====
    function initOrbsFollow() {
        const orbs = document.querySelectorAll('.hero-ultra-orb');
        
        document.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            
            orbs.forEach((orb, index) => {
                const speed = (index + 1) * 0.05;
                const moveX = (x - 0.5) * 100 * speed;
                const moveY = (y - 0.5) * 100 * speed;
                
                orb.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
    }

    // ===== SCROLL REVEAL ANIMATIONS =====
    function initScrollReveal() {
        const elements = document.querySelectorAll('[data-scroll-reveal]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        elements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(element);
        });
    }

    // ===== SMOOTH SPRING PHYSICS FOR BUTTONS =====
    function initSpringButtons() {
        const buttons = document.querySelectorAll('.btn-mis');
        
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transition = 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
                this.style.transform = 'scale(1.05)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
            
            button.addEventListener('mousedown', function() {
                this.style.transform = 'scale(0.95)';
            });
            
            button.addEventListener('mouseup', function() {
                this.style.transform = 'scale(1.05)';
            });
        });
    }

    // ===== PRODUCT CARDS HOVER EFFECT =====
    function initProductCardsHover() {
        const cards = document.querySelectorAll('.hero-ultra-product-card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
                this.style.transform = 'translateZ(30px) scale(1.05)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateZ(0) scale(1)';
            });
        });
    }

    // ===== LIVE COUNTER ANIMATION =====
    function initLiveCounter() {
        const counters = document.querySelectorAll('[data-live-counter]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.liveCounter);
            let current = 0;
            const increment = target / 100;
            
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(counter);
        });
    }

    // ===== INIT ALL =====
    function init() {
        // Check if hero section exists
        if (!document.querySelector('.hero-ultra')) return;
        
        init3DParallax();
        initMagneticEffect();
        initMouseTilt();
        initLiveStats();
        initFloatingElements();
        initOrbsFollow();
        initScrollReveal();
        initSpringButtons();
        initProductCardsHover();
        initLiveCounter();
        
        // Typewriter effect for dynamic text
        const typewriterElement = document.querySelector('[data-typewriter]');
        if (typewriterElement) {
            new Typewriter(typewriterElement, {
                words: ['Automation', 'Delegation', 'Growth', 'Efficiency'],
                speed: 100,
                deleteSpeed: 50,
                pauseTime: 2000
            });
        }
        
        console.log('✨ Ultra Advanced Hero initialized');
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
