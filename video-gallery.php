<?php
$page_title    = 'Video Gallery — MIS.work | Product Demos & Tutorials';
$page_desc     = 'Watch MIS.work product demos, tutorials, and customer success stories on our video gallery.';
$active_page   = 'videos';
$active_product = '';

include 'inc/header-modern.php';
?>

    <!-- ====== VIDEO HERO ====== -->
    <section class="product-hero" style="padding-bottom: 40px;">
        <div class="product-hero-aurora"></div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>

        <div class="product-hero-container">
            <div class="product-hero-content" style="max-width: 100%; text-align: center;">
                <div class="product-hero-eyebrow" style="justify-content: center;">
                    <span class="dot"></span>
                    <span>Video Gallery</span>
                </div>

                <h1 class="product-hero-title">
                    Watch Our Products
                    <span class="gradient">in Action</span>
                </h1>

                <p class="product-hero-subtitle" style="max-width: 600px; margin: 0 auto;">
                    See how MIS.work systems work through demos, tutorials, and real use-cases.
                </p>
            </div>
        </div>
    </section>

    <!-- ====== VIDEO GRID ====== -->
    <section class="benefits-section" style="padding-top: 0;">
        <div class="benefits-container">
            <div class="benefits-grid reveal-stagger">
                <?php
                $videos = [
                    ['url' => 'https://www.youtube.com/watch?v=-f39s8alRy0&t=309s', 'thumb' => 'assets/images/yt1.jpg', 'title' => 'MIS.work Product Overview'],
                    ['url' => 'https://www.youtube.com/watch?v=_lTASz6zDqM&t=96s', 'thumb' => 'assets/images/yt2.jpg', 'title' => 'Delegation System Demo'],
                    ['url' => 'https://www.youtube.com/watch?v=fpmo37-Qpfk', 'thumb' => 'assets/images/yt3.jpg', 'title' => 'Checklist Management'],
                    ['url' => 'https://www.youtube.com/watch?v=M56gDssDbPU', 'thumb' => 'assets/images/yt4.jpg', 'title' => 'Lead & CRM System'],
                    ['url' => 'https://www.youtube.com/watch?v=5eCef2-oC50', 'thumb' => 'assets/images/yt5.jpg', 'title' => 'Attendance Tracking'],
                    ['url' => 'https://www.youtube.com/watch?v=QsQq1av9bOI', 'thumb' => 'assets/images/yt6.jpg', 'title' => 'WhatsApp Integration'],
                ];
                foreach ($videos as $video): ?>
                <a href="<?= $video['url'] ?>" target="_blank" rel="noopener" class="benefit-card" data-cursor-hover style="text-decoration: none; color: inherit; padding: 0; overflow: hidden;">
                    <div style="position: relative; width: 100%; aspect-ratio: 16/9; overflow: hidden;">
                        <img src="<?= $video['thumb'] ?>" alt="<?= $video['title'] ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                        <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.3); transition: background 0.3s;">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="white" stroke="none"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                        </div>
                    </div>
                    <div style="padding: 16px 20px;">
                        <h4 class="benefit-card-title" style="margin: 0; font-size: 1rem;"><?= $video['title'] ?></h4>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php
$cta_title    = 'Want a <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">personalized demo?</span>';
$cta_subtitle = 'Book a free 1-on-1 demo call and see the system tailored to your business.';
$default_interest = '';
include 'inc/footer-modern.php';
