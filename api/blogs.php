<?php
$page_title    = 'Blogs — MIS.work | Life at MIS, News & Tips';
$page_desc     = 'Read the latest blogs from MIS.work — updates, tips, and insights on business automation, ERP, and team productivity.';
$active_page   = 'blogs';
$active_product = '';

include __DIR__.'/../inc/header-modern.php';
?>

    <!-- ====== BLOG HERO ====== -->
    <section class="product-hero" style="padding-bottom: 60px;">
        <div class="product-hero-aurora"></div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>

        <div class="product-hero-container">
            <div class="product-hero-content" style="max-width: 100%; text-align: center;">
                <div class="product-hero-eyebrow" style="justify-content: center;">
                    <span class="dot"></span>
                    <span>Life at MIS</span>
                </div>

                <h1 class="product-hero-title">
                    News, Tips &
                    <span class="gradient">Latest Updates</span>
                </h1>

                <p class="product-hero-subtitle" style="max-width: 600px; margin: 0 auto;">
                    Stay updated with the latest from MIS.work — product updates, automation tips, and team stories.
                </p>
            </div>
        </div>
    </section>

    <!-- ====== BLOG GRID ====== -->
    <section class="benefits-section" style="padding-top: 0;">
        <div class="benefits-container">
            <div class="benefits-grid reveal-stagger">
                <?php
                $blogs = [
                    ['title' => 'How Delegation Systems Save 47% Time', 'desc' => 'Learn how automated task delegation eliminates micro-management and boosts team output.', 'date' => '25 Feb 2025'],
                    ['title' => 'Why Every Business Needs a Checklist System', 'desc' => 'Discover how daily checklists ensure accountability and reduce missed tasks across teams.', 'date' => '18 Mar 2025'],
                    ['title' => '5 Signs Your Business Needs an ERP', 'desc' => 'Growing pains? Here are the signs that your operations need a unified system.', 'date' => '10 Apr 2025'],
                    ['title' => 'WhatsApp API for Business Automation', 'desc' => 'How to leverage WhatsApp API for real-time alerts, reports, and customer engagement.', 'date' => '22 Apr 2025'],
                    ['title' => 'Attendance Tracking: GPS vs Manual', 'desc' => 'A comparison of modern attendance systems and why GPS-based tracking wins.', 'date' => '05 May 2025'],
                    ['title' => 'From Google Sheets to Custom ERP', 'desc' => 'The journey from spreadsheets to a full-fledged ERP and what to expect.', 'date' => '12 May 2025'],
                ];
                foreach ($blogs as $blog): ?>
                <a href="blog-details.php" class="benefit-card" data-cursor-hover style="text-decoration: none; color: inherit;">
                    <div class="benefit-card-icon">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    </div>
                    <h4 class="benefit-card-title"><?= $blog['title'] ?></h4>
                    <p class="benefit-card-description"><?= $blog['desc'] ?></p>
                    <p style="font-size: 0.8rem; opacity: 0.5; margin-top: 8px;"><?= $blog['date'] ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php
$cta_title    = 'Want to <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">automate your business?</span>';
$cta_subtitle = 'Get a free consultation and see how MIS.work can transform your operations.';
$default_interest = '';
include __DIR__.'/../inc/footer-modern.php';
