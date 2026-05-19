<?php
// ============================================
// MIS.work — Reusable Modern Header
// Used by: All internal pages (delegation, checklist, etc.)
// Variables expected:
//   $page_title    (string) - Page title
//   $page_desc     (string) - Meta description
//   $active_page   (string) - 'home'|'services'|'products'|'library'|'faq'|'contact'
//   $active_product (string) - Optional: 'delegation'|'checklist'|... (highlights dropdown item)
// ============================================

if (!isset($page_title))   $page_title   = 'MIS.work — Build Systems. Scale Faster.';
if (!isset($page_desc))    $page_desc    = 'MIS.work - Premium business automation. Build systems, grow to greatness. 500+ clients, 11+ years.';
if (!isset($active_page))  $active_page  = '';
if (!isset($active_product)) $active_product = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">

    <title><?= htmlspecialchars($page_title) ?></title>

    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/main.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/components/components.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/sections/sections.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/sections/futuristic.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/sections/aurora-effects.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/sections/hero-effects.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/sections/product-pages.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/mobile-responsive.css?v=<?= time() ?>">

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
            <a href="index.php" class="nav-mis-logo" data-cursor-hover>
                <img src="assets/images/logo.png" alt="MIS Logo">
            </a>

            <ul class="nav-mis-menu">
                <li><a href="index.php" class="nav-mis-link <?= $active_page === 'home' ? 'active' : '' ?>">Home</a></li>
                <li><a href="services.php" class="nav-mis-link <?= $active_page === 'services' ? 'active' : '' ?>">Services</a></li>
                <li class="nav-mis-dropdown">
                    <a href="#" class="nav-mis-link <?= $active_page === 'products' ? 'active' : '' ?>">Products ↓</a>
                    <div class="nav-mis-dropdown-menu">
                        <a href="delegation.php" class="nav-mis-dropdown-item <?= $active_product === 'delegation' ? 'active' : '' ?>">Delegation System</a>
                        <a href="checklist.php" class="nav-mis-dropdown-item <?= $active_product === 'checklist' ? 'active' : '' ?>">Checklist System</a>
                        <a href="leave-application.php" class="nav-mis-dropdown-item <?= $active_product === 'leave' ? 'active' : '' ?>">Leave Management</a>
                        <a href="lead-management.php" class="nav-mis-dropdown-item <?= $active_product === 'lead' ? 'active' : '' ?>">Lead Management</a>
                        <a href="attendance-management-system.php" class="nav-mis-dropdown-item <?= $active_product === 'attendance' ? 'active' : '' ?>">Attendance Software</a>
                    </div>
                </li>
                <li><a href="video-gallery.php" class="nav-mis-link <?= $active_page === 'library' ? 'active' : '' ?>">Library</a></li>
                <li><a href="faq.php" class="nav-mis-link <?= $active_page === 'faq' ? 'active' : '' ?>">FAQ</a></li>
                <li><a href="contact-us.php" class="nav-mis-link <?= $active_page === 'contact' ? 'active' : '' ?>">Contact</a></li>
            </ul>

            <div class="nav-mis-actions">
                <a href="#contact" class="btn-mis btn-primary-mis" data-cursor-hover>
                    Take Free Demo
                    <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                </a>
                <button class="nav-mis-toggle" aria-label="Menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </nav>
