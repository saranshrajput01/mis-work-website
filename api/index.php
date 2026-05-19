<?php
// MIS.work - ULTRA FUTURISTIC HOMEPAGE
// Aurora, Spotlight, Scramble, Process Flow, Dashboard, FAQ

// Critical CSS (inlined for fast first paint)
$ver = time();
$critical_dir = __DIR__ . '/../assets/css/critical/';
$critical_base = @file_get_contents($critical_dir . 'base.css') ?: '';
$critical_home = @file_get_contents($critical_dir . 'home.css') ?: '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MIS.work - Premium business automation. Build systems, grow to greatness. 500+ clients, 11+ years.">
    
    <title>MIS.work — Build Systems. Scale Faster.</title>
    
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Critical CSS: inlined for fast first paint -->
    <style id="critical-css"><?= $critical_base ?>
<?= $critical_home ?></style>
    
    <!-- Non-critical CSS: deferred via media=print trick (loads async, swaps to all once loaded) -->
    <link rel="stylesheet" href="assets/css/main.css?v=<?= $ver ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="assets/css/components/components.css?v=<?= $ver ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="assets/css/sections/sections.css?v=<?= $ver ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="assets/css/sections/futuristic.css?v=<?= $ver ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="assets/css/sections/aurora-effects.css?v=<?= $ver ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="assets/css/sections/hero-effects.css?v=<?= $ver ?>" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="assets/css/mobile-responsive.css?v=<?= $ver ?>" media="print" onload="this.media='all'">
    
    <!-- No-JS fallback -->
    <noscript>
        <link rel="stylesheet" href="assets/css/main.css?v=<?= $ver ?>">
        <link rel="stylesheet" href="assets/css/components/components.css?v=<?= $ver ?>">
        <link rel="stylesheet" href="assets/css/sections/sections.css?v=<?= $ver ?>">
        <link rel="stylesheet" href="assets/css/sections/futuristic.css?v=<?= $ver ?>">
        <link rel="stylesheet" href="assets/css/sections/aurora-effects.css?v=<?= $ver ?>">
        <link rel="stylesheet" href="assets/css/sections/hero-effects.css?v=<?= $ver ?>">
        <link rel="stylesheet" href="assets/css/mobile-responsive.css?v=<?= $ver ?>">
    </noscript>
    
    <style>
        body { background: #FAFBFC; cursor: none; }
        @media (hover: none) { body { cursor: auto; } }
        input, textarea, select { cursor: text !important; }
    </style>
</head>
<body>

    <!-- ====== NAVIGATION ====== -->
    <nav class="nav-mis">
        <div class="nav-mis-container">
            <a href="/" class="nav-mis-logo" data-cursor-hover>
                <img src="assets/images/logo.png" alt="MIS Logo" fetchpriority="high" decoding="async">
            </a>
            
            <ul class="nav-mis-menu">
                <li><a href="/" class="nav-mis-link active">Home</a></li>
                <li><a href="services.php" class="nav-mis-link">Services</a></li>
                <li class="nav-mis-dropdown">
                    <a href="#" class="nav-mis-link">Products ↓</a>
                    <div class="nav-mis-dropdown-menu">
                        <a href="delegation.php" class="nav-mis-dropdown-item">Delegation System</a>
                        <a href="checklist.php" class="nav-mis-dropdown-item">Checklist System</a>
                        <a href="leave-application.php" class="nav-mis-dropdown-item">Leave Management</a>
                        <a href="lead-management.php" class="nav-mis-dropdown-item">Lead Management</a>
                        <a href="attendance-management-system.php" class="nav-mis-dropdown-item">Attendance Software</a>
                    </div>
                </li>
                <li><a href="video-gallery.php" class="nav-mis-link">Library</a></li>
                <li><a href="#faq" class="nav-mis-link">FAQ</a></li>
                <li><a href="contact-us.php" class="nav-mis-link">Contact</a></li>
            </ul>
            
            <div class="nav-mis-actions">
                <a href="#contact" class="btn-mis btn-primary-mis btn-magnetic" data-cursor-hover>
                    Take Free Demo
                    <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                </a>
                <button class="nav-mis-toggle" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </nav>
    
    <!-- ====== HERO WITH VIDEO + 3D FLOATING CARDS ====== -->
    <section class="hero-mega">
        <!-- Aurora background -->
        <div class="aurora-bg">
            <div class="aurora-blob aurora-blob-1"></div>
            <div class="aurora-blob aurora-blob-2"></div>
            <div class="aurora-blob aurora-blob-3"></div>
            <div class="aurora-blob aurora-blob-4"></div>
        </div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>
        
        <div class="hero-mega-container">
            <div class="hero-mega-content">
                <div class="hero-mega-badge">
                    <span class="pulse-dot"></span>
                    <span>500+ businesses growing with MIS</span>
                </div>
                
                <h1 class="hero-mega-title">
                    <span style="display: block; opacity: 0; animation: fadeInUp 0.9s var(--ease-smooth) 0.3s forwards;">
                        Invest in Ideas,
                    </span>
                    <span class="hero-title-mega-gradient" style="display: block; opacity: 0; animation: fadeInUp 0.9s var(--ease-smooth) 0.5s forwards;">
                        Not Micromanagement
                    </span>
                </h1>
                
                <p class="hero-mega-subtitle" style="opacity: 0; animation: fadeInUp 0.9s var(--ease-smooth) 0.7s forwards;">
                    Transform chaos into clarity with intelligent automation. From delegation to analytics, 
                    we build <strong>custom systems</strong> that save time, reduce errors, and unlock growth.
                </p>
                
                <div class="hero-mega-cta" style="opacity: 0; animation: fadeInUp 0.9s var(--ease-smooth) 0.9s forwards;">
                    <a href="#products" class="btn-mis btn-primary-mis" data-cursor-hover>
                        Explore Solutions
                        <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#contact" class="btn-mis btn-ghost-mis" data-cursor-hover>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                        Watch Demo
                    </a>
                </div>
                
                <p class="hero-mega-trust" style="opacity: 0; animation: fadeInUp 0.9s var(--ease-smooth) 1.1s forwards;">
                    ✨ Trusted by <strong>500+ Indian businesses</strong> · 11+ years · 47% time saved
                </p>
            </div>
            
            <!-- HALF PAGE VIDEO WITH FLOATING CARDS -->
            <div class="hero-mega-video-wrapper" data-cursor-hover>
                <div class="hero-mega-video-controls">
                    <span></span><span></span><span></span>
                </div>
                <video autoplay loop muted playsinline poster="assets/images/imgtop.jpg" preload="metadata">
                    <source src="assets/images/homepage.mp4" type="video/mp4">
                </video>
                
                <!-- 3D Floating Product Cards -->
                <div class="hero-floating-card hero-floating-card-1 float-element">
                    <div class="hero-floating-card-icon green">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                    <div class="hero-floating-card-content">
                        <strong>Task Completed</strong>
                        <span>1 minute ago</span>
                    </div>
                </div>
                
                <div class="hero-floating-card hero-floating-card-2 float-element-2">
                    <div class="hero-floating-card-icon blue">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                    </div>
                    <div class="hero-floating-card-content">
                        <strong><span data-live-stat="487">487</span> Active Now</strong>
                        <span>Live tracking</span>
                    </div>
                </div>
                
                <div class="hero-floating-card hero-floating-card-3 float-element-3">
                    <div class="hero-floating-card-icon purple">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                    <div class="hero-floating-card-content">
                        <strong>+47% Productivity</strong>
                        <span>This month</span>
                    </div>
                </div>
                
                <div class="hero-floating-card hero-floating-card-4 float-element">
                    <div class="hero-floating-card-icon orange">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                    </div>
                    <div class="hero-floating-card-content">
                        <strong>Real-time Sync</strong>
                        <span>All systems active</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== STATS TICKER ====== -->
    <section class="stats-ticker">
        <div class="stats-ticker-track">
            <?php for ($k = 0; $k < 2; $k++): ?>
            <div class="stats-ticker-item">
                <div class="stats-ticker-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                </div>
                <span class="stats-ticker-text"><strong>500+</strong> Active Clients</span>
            </div>
            <div class="stats-ticker-item">
                <div class="stats-ticker-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </div>
                <span class="stats-ticker-text"><strong>1,569+</strong> Systems Built</span>
            </div>
            <div class="stats-ticker-item">
                <div class="stats-ticker-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
                <span class="stats-ticker-text"><strong>37+</strong> Industries Served</span>
            </div>
            <div class="stats-ticker-item">
                <div class="stats-ticker-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <span class="stats-ticker-text"><strong>47%</strong> Time Saved</span>
            </div>
            <div class="stats-ticker-item">
                <div class="stats-ticker-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <span class="stats-ticker-text"><strong>75%</strong> Productivity Boost</span>
            </div>
            <div class="stats-ticker-item">
                <div class="stats-ticker-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                </div>
                <span class="stats-ticker-text"><strong>11+</strong> Years Excellence</span>
            </div>
            <?php endfor; ?>
        </div>
    </section>
    
    <!-- ====== REAL CLIENT LOGOS ====== -->
    <section class="real-logos-section section-tight">
        <div class="container-mis">
            <p class="real-logos-label">Trusted by Industry Leaders Across India</p>
        </div>
        <div class="real-logos-marquee">
            <div class="real-logos-track">
                <?php for ($j = 0; $j < 2; $j++): ?>
                <div class="real-logo-item"><img src="assets/images/logo1.png" alt="Client 1" loading="lazy" decoding="async"></div>
                <div class="real-logo-item"><img src="assets/images/logo2.jpg" alt="Client 2" loading="lazy" decoding="async"></div>
                <div class="real-logo-item"><img src="assets/images/logo3.png" alt="Client 3" loading="lazy" decoding="async"></div>
                <div class="real-logo-item"><img src="assets/images/logo4.jpeg" alt="Client 4" loading="lazy" decoding="async"></div>
                <div class="real-logo-item"><img src="assets/images/logo5.jpeg" alt="Client 5" loading="lazy" decoding="async"></div>
                <div class="real-logo-item"><img src="assets/images/logo6.jpg" alt="Client 6" loading="lazy" decoding="async"></div>
                <div class="real-logo-item"><img src="assets/images/logo7.png" alt="Client 7" loading="lazy" decoding="async"></div>
                <div class="real-logo-item"><img src="assets/images/kapbros.jpg" alt="Kapbros" loading="lazy" decoding="async"></div>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    
    <!-- ====== HOW IT WORKS - PROCESS FLOW (DARK) ====== -->
    <section class="process-flow-section spotlight-section">
        <div class="spotlight-grid"></div>
        <div class="spotlight-effect"></div>
        <div class="container-mis spotlight-content">
            <div class="section-header-compact reveal-on-scroll">
                <div class="section-eyebrow-premium">
                    <span class="dot"></span>
                    <span>How It Works</span>
                </div>
                <h2 class="section-title-mis">
                    <span>4 Steps</span> to <span class="text-gradient">Automation</span>
                </h2>
                <p class="section-subtitle-mis">
                    From discovery to deployment in days, not months.
                </p>
            </div>
            
            <div class="process-flow-grid reveal-stagger">
                <div class="process-step" data-cursor-hover>
                    <div class="process-step-number">1</div>
                    <div class="process-step-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <h3>Discover</h3>
                    <p>We analyze your workflow, pain points, and goals</p>
                </div>
                
                <div class="process-step" data-cursor-hover>
                    <div class="process-step-number">2</div>
                    <div class="process-step-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    </div>
                    <h3>Design</h3>
                    <p>Custom system architecture tailored to your needs</p>
                </div>
                
                <div class="process-step" data-cursor-hover>
                    <div class="process-step-number">3</div>
                    <div class="process-step-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3>Build</h3>
                    <p>Development with iterative reviews & testing</p>
                </div>
                
                <div class="process-step" data-cursor-hover>
                    <div class="process-step-number">4</div>
                    <div class="process-step-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
                    </div>
                    <h3>Launch</h3>
                    <p>Smooth rollout with training and ongoing support</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== PRODUCTS SECTION ====== -->
    <section class="products-section-mis section-medium" id="products">
        <div class="container-mis">
            <div class="section-header-compact reveal-on-scroll">
                <div class="section-eyebrow-premium">
                    <span class="dot"></span>
                    <span>Our Products</span>
                </div>
                <h2 class="section-title-mis">
                    One Access. <span class="text-gradient">Endless Automations.</span>
                </h2>
                <p class="section-subtitle-mis">
                    Ready-to-use and customised solutions for every business need.
                </p>
            </div>
            
            <div class="products-grid-mis reveal-stagger">
                <div class="product-card-mis" data-tilt>
                    <div class="product-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    </div>
                    <h3 class="product-card-title">Delegation System</h3>
                    <p class="product-card-description">Assign tasks, relax your mind. Real-time updates, media support, auto reports & performance tracking.</p>
                    <a href="delegation.php" class="product-card-link" aria-label="Learn more about Delegation System">Explore Delegation <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a>
                </div>
                
                <div class="product-card-mis" data-tilt>
                    <div class="product-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"></path><rect x="3" y="6" width="18" height="14" rx="2"></rect></svg>
                    </div>
                    <h3 class="product-card-title">Checklist & Work Management</h3>
                    <p class="product-card-description">Daily to Annual tasks with Auto Reminders, Task Tracking, and Smart Reports.</p>
                    <a href="checklist.php" class="product-card-link" aria-label="Learn more about Checklist System">Explore Checklist <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a>
                </div>
                
                <div class="product-card-mis" data-tilt>
                    <div class="product-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <h3 class="product-card-title">Attendance Management</h3>
                    <p class="product-card-description">Smart real-time tracking, automated logs, and complete workforce visibility.</p>
                    <a href="attendance-management-system.php" class="product-card-link" aria-label="Learn more about Attendance Management System">Explore Attendance <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a>
                </div>
                
                <div class="product-card-mis" data-tilt>
                    <div class="product-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </div>
                    <h3 class="product-card-title">Leave Management</h3>
                    <p class="product-card-description">Streamline employee leave requests with smooth approval workflows.</p>
                    <a href="leave-application.php" class="product-card-link" aria-label="Learn more about Leave Management System">Explore Leave Management <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a>
                </div>
                
                <div class="product-card-mis" data-tilt>
                    <div class="product-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <h3 class="product-card-title">Lead Management</h3>
                    <p class="product-card-description">Turn leads into loyalty. Smart, scalable solutions that convert prospects.</p>
                    <a href="lead-management.php" class="product-card-link" aria-label="Learn more about Lead Management / CRM">Explore Lead Management <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a>
                </div>
                
                <div class="product-card-mis" data-tilt>
                    <div class="product-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l18-5v12L3 14v-3z"></path><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path></svg>
                    </div>
                    <h3 class="product-card-title">Bulk Marketing</h3>
                    <p class="product-card-description">Power your campaigns with seamless bulk WhatsApp & Email marketing.</p>
                    <a href="#contact" class="product-card-link" aria-label="Contact us about Bulk Marketing">Explore Bulk Marketing <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== VIDEO SHOWCASE ====== -->
    <section class="video-showcase-section section-medium">
        <div class="container-mis">
            <div class="section-header-compact reveal-on-scroll">
                <div class="section-eyebrow-premium">
                    <span class="dot"></span>
                    <span>See It in Action</span>
                </div>
                <h2 class="section-title-mis">
                    Built for <span class="text-gradient">Modern Teams</span>
                </h2>
            </div>
            
            <div class="video-showcase-grid reveal-stagger">
                <div class="video-showcase-card" data-cursor-hover>
                    <div class="video-showcase-wrapper">
                        <video autoplay loop muted playsinline preload="metadata">
                            <source src="assets/images/d1.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="video-showcase-content">
                        <h3>Delegation in Action</h3>
                        <p>Watch teams collaborate seamlessly with real-time task management</p>
                    </div>
                </div>
                
                <div class="video-showcase-card" data-cursor-hover>
                    <div class="video-showcase-wrapper">
                        <video autoplay loop muted playsinline preload="metadata">
                            <source src="assets/images/youtube.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="video-showcase-content">
                        <h3>Mobile-First Experience</h3>
                        <p>Manage everything from your phone with our intuitive mobile interface</p>
                    </div>
                </div>
            </div>
            
            <div class="stats-grid-simple reveal-stagger" style="margin-top: 60px;">
                <div class="stat-card-simple" data-cursor-hover>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    <div class="stat-number">47%</div>
                    <div class="stat-label">Time Saved</div>
                </div>
                
                <div class="stat-card-simple" data-cursor-hover>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="7" width="20" height="14" rx="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    </div>
                    <div class="stat-number">37+</div>
                    <div class="stat-label">Industries Served</div>
                </div>
                
                <div class="stat-card-simple" data-cursor-hover>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                    </div>
                    <div class="stat-number">75%</div>
                    <div class="stat-label">Productivity Boost</div>
                </div>
                
                <div class="stat-card-simple" data-cursor-hover>
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Secure & Reliable</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== DARK SPOTLIGHT FEATURE SECTION ====== -->
    <section class="feature-showcase-section spotlight-section">
        <div class="spotlight-grid"></div>
        <div class="spotlight-effect"></div>
        <div class="container-mis spotlight-content">
            <div class="feature-showcase-grid">
                <div class="feature-showcase-content reveal-on-scroll">
                    <div class="section-eyebrow-premium" style="background: rgba(0, 164, 210, 0.15); color: #42C5EF; border-color: rgba(0, 164, 210, 0.3);">
                        <span class="dot"></span>
                        <span>Why Choose Us</span>
                    </div>
                    <h2>
                        Everything you need to <span class="ai-text">scale faster</span>
                    </h2>
                    <p>From small startups to large enterprises, our automation systems adapt to your needs. Built with cutting-edge technology and battle-tested by 500+ businesses.</p>
                    
                    <div class="feature-list">
                        <div class="feature-list-item">
                            <div class="feature-list-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
                            </div>
                            <div class="feature-list-content">
                                <h3>Lightning Fast Setup</h3>
                                <p>Get up and running in under 24 hours</p>
                            </div>
                        </div>
                        <div class="feature-list-item">
                            <div class="feature-list-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            </div>
                            <div class="feature-list-content">
                                <h3>Custom Workflows</h3>
                                <p>Tailored to match your exact business processes</p>
                            </div>
                        </div>
                        <div class="feature-list-item">
                            <div class="feature-list-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            </div>
                            <div class="feature-list-content">
                                <h3>24/7 Support</h3>
                                <p>Dedicated team available round the clock</p>
                            </div>
                        </div>
                        <div class="feature-list-item">
                            <div class="feature-list-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            </div>
                            <div class="feature-list-content">
                                <h3>No Code Required</h3>
                                <p>User-friendly interface for everyone</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="reveal-on-scroll">
                    <!-- LIVE DASHBOARD PREVIEW -->
                    <div class="dashboard-preview">
                        <div class="dashboard-header">
                            <h3>📊 Live Dashboard</h3>
                            <span class="dashboard-status">All Systems Operational</span>
                        </div>
                        
                        <div class="dashboard-stats">
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-label">Tasks</div>
                                <div class="dashboard-stat-value" data-live-stat="247">247</div>
                                <div class="dashboard-stat-trend up">↑ 12%</div>
                            </div>
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-label">Done</div>
                                <div class="dashboard-stat-value" data-live-stat="183">183</div>
                                <div class="dashboard-stat-trend up">↑ 8%</div>
                            </div>
                            <div class="dashboard-stat">
                                <div class="dashboard-stat-label">Active</div>
                                <div class="dashboard-stat-value" data-live-stat="64">64</div>
                                <div class="dashboard-stat-trend up">↑ 4%</div>
                            </div>
                        </div>
                        
                        <div class="dashboard-progress-list">
                            <div class="dashboard-progress-item">
                                <div class="dashboard-progress-header">
                                    <span class="dashboard-progress-name">Marketing Campaign</span>
                                    <span class="dashboard-progress-percent">87%</span>
                                </div>
                                <div class="dashboard-progress-bar">
                                    <div class="dashboard-progress-fill" data-progress="87"></div>
                                </div>
                            </div>
                            <div class="dashboard-progress-item">
                                <div class="dashboard-progress-header">
                                    <span class="dashboard-progress-name">Q4 Reports</span>
                                    <span class="dashboard-progress-percent">64%</span>
                                </div>
                                <div class="dashboard-progress-bar">
                                    <div class="dashboard-progress-fill" data-progress="64"></div>
                                </div>
                            </div>
                            <div class="dashboard-progress-item">
                                <div class="dashboard-progress-header">
                                    <span class="dashboard-progress-name">Team Onboarding</span>
                                    <span class="dashboard-progress-percent">92%</span>
                                </div>
                                <div class="dashboard-progress-bar">
                                    <div class="dashboard-progress-fill" data-progress="92"></div>
                                </div>
                            </div>
                            <div class="dashboard-progress-item">
                                <div class="dashboard-progress-header">
                                    <span class="dashboard-progress-name">Product Launch</span>
                                    <span class="dashboard-progress-percent">45%</span>
                                </div>
                                <div class="dashboard-progress-bar">
                                    <div class="dashboard-progress-fill" data-progress="45"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== BIG MARQUEE TEXT ====== -->
    <section class="marquee-text">
        <div class="marquee-text-track">
            <div class="marquee-text-item">
                <span>Build Systems</span>
                <span class="marquee-dot"></span>
                <span class="marquee-text-stroked">Grow to Greatness</span>
                <span class="marquee-dot"></span>
                <span>Build Systems</span>
                <span class="marquee-dot"></span>
                <span class="marquee-text-stroked">Grow to Greatness</span>
                <span class="marquee-dot"></span>
            </div>
            <div class="marquee-text-item">
                <span>Build Systems</span>
                <span class="marquee-dot"></span>
                <span class="marquee-text-stroked">Grow to Greatness</span>
                <span class="marquee-dot"></span>
                <span>Build Systems</span>
                <span class="marquee-dot"></span>
                <span class="marquee-text-stroked">Grow to Greatness</span>
                <span class="marquee-dot"></span>
            </div>
        </div>
    </section>
    
    <!-- ====== WHY PEOPLE LIKE US - FUTURISTIC STATS ====== -->
    <section class="why-people-section spotlight-section">
        <div class="spotlight-grid"></div>
        <div class="spotlight-effect"></div>
        
        <!-- Floating decorative numbers in background -->
        <div class="floating-numbers-bg">
            <span class="floating-num floating-num-1">600+</span>
            <span class="floating-num floating-num-2">1569+</span>
            <span class="floating-num floating-num-3">37+</span>
            <span class="floating-num floating-num-4">15+</span>
            <span class="floating-num floating-num-5">100%</span>
            <span class="floating-num floating-num-6">24/7</span>
        </div>
        
        <div class="container-mis spotlight-content">
            <div class="section-header-compact reveal-on-scroll">
                <div class="section-eyebrow-premium">
                    <span class="dot"></span>
                    <span>Why People Like Us</span>
                </div>
                <h2 class="section-title-mis">
                    Professional Solutions <span class="text-gradient">That Deliver</span>
                </h2>
                <p class="section-subtitle-mis">
                    Numbers that speak louder than words. Trusted by industries across India.
                </p>
            </div>
            
            <div class="why-people-grid reveal-stagger">
                <div class="why-people-card" data-cursor-hover>
                    <div class="why-people-orbit">
                        <div class="why-people-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <span class="orbit-dot orbit-dot-1"></span>
                        <span class="orbit-dot orbit-dot-2"></span>
                        <span class="orbit-dot orbit-dot-3"></span>
                    </div>
                    <div class="why-people-number" data-count="600">600+</div>
                    <div class="why-people-label">Happy Clients</div>
                    <div class="why-people-glow"></div>
                </div>
                
                <div class="why-people-card" data-cursor-hover>
                    <div class="why-people-orbit">
                        <div class="why-people-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        </div>
                        <span class="orbit-dot orbit-dot-1"></span>
                        <span class="orbit-dot orbit-dot-2"></span>
                        <span class="orbit-dot orbit-dot-3"></span>
                    </div>
                    <div class="why-people-number" data-count="1569">1569+</div>
                    <div class="why-people-label">Systems Created</div>
                    <div class="why-people-glow"></div>
                </div>
                
                <div class="why-people-card" data-cursor-hover>
                    <div class="why-people-orbit">
                        <div class="why-people-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        </div>
                        <span class="orbit-dot orbit-dot-1"></span>
                        <span class="orbit-dot orbit-dot-2"></span>
                        <span class="orbit-dot orbit-dot-3"></span>
                    </div>
                    <div class="why-people-number" data-count="37">37+</div>
                    <div class="why-people-label">Industries Served</div>
                    <div class="why-people-glow"></div>
                </div>
                
                <div class="why-people-card" data-cursor-hover>
                    <div class="why-people-orbit">
                        <div class="why-people-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                        </div>
                        <span class="orbit-dot orbit-dot-1"></span>
                        <span class="orbit-dot orbit-dot-2"></span>
                        <span class="orbit-dot orbit-dot-3"></span>
                    </div>
                    <div class="why-people-number" data-count="15">15+</div>
                    <div class="why-people-label">Years Of Experience</div>
                    <div class="why-people-glow"></div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== TESTIMONIALS (DARK) ====== -->
    <section class="testimonials-section-mis section-medium spotlight-section">
        <div class="spotlight-grid"></div>
        <div class="spotlight-effect"></div>
        <div class="container-mis spotlight-content">
            <div class="section-header-compact reveal-on-scroll">
                <div class="section-eyebrow-premium">
                    <span class="dot"></span>
                    <span>Customer Stories</span>
                </div>
                <h2 class="section-title-mis">
                    Words That <span class="text-gradient">Inspire Trust</span>
                </h2>
            </div>
            
            <div class="testimonials-grid-mis reveal-stagger">
                <div class="testimonial-card-mis">
                    <div class="testimonial-quote-mark">"</div>
                    <p class="testimonial-text">MIS Company truly has an outstanding team. The entire team is professional and helpful. Thank you for your exceptional service.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">PM</div>
                        <div class="testimonial-info">
                            <h3>Priya Mehta</h3>
                            <span>Founder, Homecare</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card-mis">
                    <div class="testimonial-quote-mark">"</div>
                    <p class="testimonial-text">Make It Simple has truly transformed our business. Their ERP system is the best we've ever used — simple, powerful, and tailored.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">KB</div>
                        <div class="testimonial-info">
                            <h3>Kapbros Team</h3>
                            <span>Operations Director</span>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card-mis">
                    <div class="testimonial-quote-mark">"</div>
                    <p class="testimonial-text">Partnering with Make It Simple has been a game-changer. Most efficient and user-friendly system we've worked with.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">RS</div>
                        <div class="testimonial-info">
                            <h3>Rajesh Sharma</h3>
                            <span>CEO, TechVantage</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== FAQ SECTION (DARK) ====== -->
    <section class="faq-section section-medium spotlight-section" id="faq">
        <div class="spotlight-grid"></div>
        <div class="spotlight-effect"></div>
        <div class="container-mis spotlight-content">
            <div class="section-header-compact reveal-on-scroll">
                <div class="section-eyebrow-premium">
                    <span class="dot"></span>
                    <span>Frequently Asked</span>
                </div>
                <h2 class="section-title-mis">
                    Got <span class="text-gradient">Questions?</span>
                </h2>
                <p class="section-subtitle-mis">
                    Everything you need to know about our automation systems.
                </p>
            </div>
            
            <div class="faq-list reveal-on-scroll">
                <div class="faq-item active">
                    <button class="faq-question">
                        <span>How long does it take to implement a custom system?</span>
                        <div class="faq-toggle">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </div>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Most ready-to-use systems can be set up in 24-48 hours. Custom solutions typically take 2-4 weeks depending on complexity. We provide white-glove onboarding for all clients.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Do I need technical knowledge to use the systems?</span>
                        <div class="faq-toggle">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </div>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Not at all! Our systems are designed for non-technical users. We provide complete training and ongoing support to ensure your team is comfortable using them.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Can the systems integrate with my existing tools?</span>
                        <div class="faq-toggle">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </div>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Yes! We integrate with Tally, Google Sheets, WhatsApp, popular ERPs, CRMs, and most business tools. Custom integrations are also available.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>What kind of support do you provide?</span>
                        <div class="faq-toggle">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </div>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            We provide 24/7 technical support, regular updates, training sessions, and a dedicated account manager for enterprise clients.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Is my data secure?</span>
                        <div class="faq-toggle">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </div>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Absolutely. We use bank-grade SSL/TLS encryption, role-based access control, 2-factor authentication, and complete audit logs. Your data is hosted on secure Indian servers.
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        <span>How much does it cost?</span>
                        <div class="faq-toggle">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </div>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            Pricing depends on the system, team size, and customizations needed. Get a free demo and we'll provide a tailored quote that fits your budget.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== CTA SECTION ====== -->
    <section class="cta-section-mis section-medium">
        <div class="container-mis">
            <div class="cta-wrapper-mis reveal-on-scroll">
                <h2 class="cta-title-mis">
                    Ready to <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Build Your Future?</span>
                </h2>
                <p class="cta-subtitle-mis">Join 500+ businesses transforming their operations with our automation systems.</p>
                <div class="cta-buttons-mis">
                    <a href="#contact" class="btn-mis btn-white-mis btn-magnetic" data-cursor-hover>
                        Take Free Demo
                        <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </a>
                    <a href="services.php" class="btn-mis btn-glass-mis" data-cursor-hover>Explore Services</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== CONTACT SECTION ====== -->
    <section class="contact-section-mis section-medium" id="contact">
        <div class="container-mis">
            <div class="contact-grid-mis">
                <div class="reveal-on-scroll">
                    <div class="section-eyebrow-premium">
                        <span class="dot"></span>
                        <span>Get in Touch</span>
                    </div>
                    <h2 class="section-title-mis" style="text-align: left; margin-top: 16px;">
                        Let's start <span class="text-gradient">building together</span>
                    </h2>
                    <p style="font-size: 16px; line-height: 1.6; color: var(--color-text-secondary); margin: 20px 0 32px;">
                        Have a project in mind? Reach out to our team. We typically respond within 2 hours during business days.
                    </p>
                    
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div class="contact-info-content">
                            <h3>Visit Us</h3>
                            <p>775, 7th Floor, Aggarwal Millennium Tower-2, NSP, Pitampura, Delhi – 110034</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div class="contact-info-content">
                            <h3>Call Us</h3>
                            <a href="tel:+919999408444">+91 9999408444</a>
                        </div>
                    </div>
                    
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div class="contact-info-content">
                            <h3>Email Us</h3>
                            <a href="mailto:info@mis.work">info@mis.work</a>
                        </div>
                    </div>
                </div>
                
                <div class="reveal-on-scroll">
                    <form id="contactFormHome" target="hidden_iframe_home" action="https://script.google.com/macros/s/AKfycbyWzxuRTEiTgzLX1N6DvAb7ovWngGFSrDFJqT1q6sykrs7qE930gk3CdUC9ZVmXbEOZ/exec" method="POST" style="background: white; padding: 32px; border-radius: 24px; box-shadow: 0 20px 50px -10px rgba(0,0,0,0.08); border: 1px solid var(--color-border-light);">
                        <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 6px;">Send us a message</h3>
                        <p style="font-size: 13px; color: var(--color-text-secondary); margin-bottom: 24px;">Fill in the form and we'll get back to you soon.</p>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-mis-label" for="hf-name">Name *</label>
                                <input type="text" id="hf-name" name="name" class="form-mis-input" placeholder="Your name" required autocomplete="name">
                            </div>
                            <div>
                                <label class="form-mis-label" for="hf-email">Email *</label>
                                <input type="email" id="hf-email" name="email" class="form-mis-input" placeholder="you@example.com" required autocomplete="email">
                            </div>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-mis-label" for="hf-phone">Contact No. *</label>
                                <input type="tel" id="hf-phone" name="phone" class="form-mis-input" placeholder="+91 99999 99999" required autocomplete="tel">
                            </div>
                            <div>
                                <label class="form-mis-label" for="hf-city">City *</label>
                                <input type="text" id="hf-city" name="city" class="form-mis-input" placeholder="Your city" required autocomplete="address-level2">
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 14px;">
                            <label class="form-mis-label" for="hf-interested">Interested In *</label>
                            <select id="hf-interested" name="interested" class="form-mis-input" required>
                                <option value="">Select a service</option>
                                <option value="Delegation System">Delegation System</option>
                                <option value="Checklist">Checklist</option>
                                <option value="Lead Management">Lead Management</option>
                                <option value="FMS">FMS</option>
                                <option value="Leave Management">Leave Management</option>
                                <option value="Attendance Management">Attendance Management</option>
                                <option value="Mobile App">Mobile App</option>
                                <option value="Tally">Tally</option>
                                <option value="Tally Integration">Tally Integration</option>
                                <option value="Whatsapp API">WhatsApp API</option>
                                <option value="Bulk Marketing">Bulk Marketing</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        
                        <div style="margin-bottom: 20px;">
                            <label class="form-mis-label" for="hf-message">Message</label>
                            <textarea id="hf-message" name="message" class="form-mis-input form-mis-textarea" placeholder="Tell us about your needs..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn-mis btn-primary-mis" style="width: 100%; padding: 14px;" data-cursor-hover id="homeSubmitBtn">
                            Send Message
                            <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </button>
                        <div id="homeFormMsg" style="margin-top: 14px; text-align: center; font-size: 14px; display: none;"></div>
                    </form>
                    <iframe name="hidden_iframe_home" title="Form submission target" aria-hidden="true" style="display:none;"></iframe>
                    <script>
                    document.getElementById('contactFormHome').addEventListener('submit', function(){
                        var btn = document.getElementById('homeSubmitBtn');
                        var msg = document.getElementById('homeFormMsg');
                        btn.disabled = true; btn.innerHTML = 'Sending...';
                        setTimeout(function(){
                            msg.style.display='block'; msg.style.color='#10b981';
                            msg.innerHTML='✅ Message sent successfully! We\'ll get back within 2 hours.';
                            document.getElementById('contactFormHome').reset();
                            btn.disabled=false;
                            btn.innerHTML='Send Message <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>';
                        }, 2000);
                    });
                    </script>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ====== FOOTER ====== -->
    <footer class="footer-mis">
        <div class="container-mis footer-mis-content">
            <div class="footer-mis-grid">
                <div>
                    <img src="assets/images/logo.png" alt="MIS Logo" style="height: 50px; filter: brightness(0) invert(1); margin-bottom: 20px;" loading="lazy" decoding="async">
                    <p style="color: rgba(255,255,255,0.6); font-size: 14px; line-height: 1.7;">
                        With over 11 years of experience, MIS has helped 500+ customers across 37 industries develop automated systems that save up to 47% of their time.
                    </p>
                    <div class="footer-mis-social" style="margin-top: 24px;">
                        <a href="#" class="footer-mis-social-link" data-cursor-hover aria-label="Visit MIS.work on Facebook"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                        <a href="#" class="footer-mis-social-link" data-cursor-hover aria-label="Follow MIS.work on Instagram"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                        <a href="#" class="footer-mis-social-link" data-cursor-hover aria-label="Connect with MIS.work on LinkedIn"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="footer-mis-heading">Products</h3>
                    <a href="delegation.php" class="footer-mis-link" data-cursor-hover>Delegation System</a>
                    <a href="checklist.php" class="footer-mis-link" data-cursor-hover>Checklist</a>
                    <a href="leave-application.php" class="footer-mis-link" data-cursor-hover>Leave Management</a>
                    <a href="lead-management.php" class="footer-mis-link" data-cursor-hover>Lead Management</a>
                    <a href="attendance-management-system.php" class="footer-mis-link" data-cursor-hover>Attendance</a>
                </div>
                
                <div>
                    <h3 class="footer-mis-heading">Company</h3>
                    <a href="about-us.php" class="footer-mis-link" data-cursor-hover>About Us</a>
                    <a href="services.php" class="footer-mis-link" data-cursor-hover>Services</a>
                    <a href="#faq" class="footer-mis-link" data-cursor-hover>FAQ</a>
                    <a href="contact-us.php" class="footer-mis-link" data-cursor-hover>Contact</a>
                </div>
                
                <div>
                    <h3 class="footer-mis-heading">Legal</h3>
                    <a href="privacy-policy.php" class="footer-mis-link" data-cursor-hover>Privacy Policy</a>
                    <a href="terms-conditions.php" class="footer-mis-link" data-cursor-hover>Terms & Conditions</a>
                </div>
            </div>
            
            <div class="footer-mis-bottom">
                <p style="color: rgba(255,255,255,0.5); font-size: 13px;">© <?= date('Y') ?> MIS.work — All rights reserved</p>
                <p style="color: rgba(255,255,255,0.5); font-size: 13px;">Crafted with precision in Delhi, India</p>
            </div>
        </div>
    </footer>
    
    <!-- ====== LIVE NOTIFICATION ====== -->
    <div class="live-notification" id="liveNotification">
        <div class="live-notification-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
        </div>
        <div class="live-notification-content">
            <strong>Rajesh from Mumbai</strong>
            <span>Just signed up · 2 min ago</span>
        </div>
        <button class="live-notification-close" onclick="document.getElementById('liveNotification').style.display='none'">×</button>
    </div>
    
    <script src="assets/js/modern.js?v=<?= time() ?>"></script>
    <script src="assets/js/effects.js?v=<?= time() ?>"></script>
    <script src="assets/js/hero-effects.js?v=<?= time() ?>"></script>
    
    <script>
        // Cycle live notifications
        const notifications = [
            { name: 'Rajesh from Mumbai', action: 'Just signed up', time: '2 min ago' },
            { name: 'Priya from Delhi', action: 'Booked a demo', time: '5 min ago' },
            { name: 'Amit from Bangalore', action: 'Started Delegation', time: '8 min ago' },
            { name: 'Sneha from Pune', action: 'Joined the platform', time: '12 min ago' },
            { name: 'Vikram from Chennai', action: 'Got a free trial', time: '15 min ago' },
            { name: 'Neha from Hyderabad', action: 'Asked for demo', time: '18 min ago' },
            { name: 'Rohan from Gurgaon', action: 'Started Checklist', time: '22 min ago' }
        ];
        
        let notifIndex = 0;
        const notif = document.getElementById('liveNotification');
        
        setInterval(() => {
            if (notif && notif.style.display !== 'none') {
                notifIndex = (notifIndex + 1) % notifications.length;
                const n = notifications[notifIndex];
                notif.querySelector('strong').textContent = n.name;
                notif.querySelector('span').textContent = n.action + ' · ' + n.time;
                
                notif.style.animation = 'none';
                setTimeout(() => {
                    notif.style.animation = 'slideInRight 0.6s var(--ease-spring) both';
                }, 10);
            }
        }, 7000);
    </script>
</body>
</html>
