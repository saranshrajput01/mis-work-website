<?php
$page_title    = 'Video Gallery — MIS.work | Product Demos & Tutorials';
$page_desc     = 'Watch MIS.work product demos, tutorials, and customer success stories on our video gallery.';
$active_page   = 'videos';
$active_product = '';

include 'inc/header-modern.php';
?>

    <!-- ====== VIDEO HERO ====== -->
    <section class="product-hero" style="background: linear-gradient(180deg, #0a0a0f 0%, #111118 100%); padding-bottom: 40px;">
        <div class="product-hero-aurora"></div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>

        <div class="product-hero-container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
            <div class="product-hero-content" style="max-width: 700px; text-align: center;">
                <div class="product-hero-eyebrow" style="justify-content: center; border-color: rgba(66,197,239,0.3); background: rgba(0,164,210,0.15);">
                    <span class="dot"></span>
                    <span>Video Gallery</span>
                </div>

                <h1 class="product-hero-title" style="color: #fff;">
                    Watch Our Products
                    <span class="gradient">in Action</span>
                </h1>

                <p class="product-hero-subtitle" style="color: rgba(255,255,255,0.6); max-width: 550px; margin: 0 auto;">
                    See how MIS.work systems work through demos, tutorials, and real use-cases from 500+ businesses.
                </p>
            </div>
        </div>
    </section>

    <!-- ====== VIDEO GRID - DARK FUTURISTIC ====== -->
    <section style="background: linear-gradient(180deg, #111118 0%, #0a0a0f 100%); padding: 40px 0 100px; position: relative; overflow: hidden;">
        <!-- Aurora blobs -->
        <div style="position: absolute; top: 20%; left: -10%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(0,164,210,0.08), transparent 70%); border-radius: 50%; filter: blur(80px); pointer-events: none;"></div>
        <div style="position: absolute; bottom: 10%; right: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(139,92,246,0.06), transparent 70%); border-radius: 50%; filter: blur(80px); pointer-events: none;"></div>

        <div style="max-width: 1200px; margin: 0 auto; padding: 0 32px; position: relative; z-index: 2;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
                <?php
                $videos = [
                    ['url' => 'https://www.youtube.com/watch?v=-f39s8alRy0&t=309s', 'thumb' => 'assets/images/yt1.jpg', 'title' => 'MIS.work Product Overview', 'tag' => 'Overview'],
                    ['url' => 'https://www.youtube.com/watch?v=_lTASz6zDqM&t=96s', 'thumb' => 'assets/images/yt2.jpg', 'title' => 'Delegation System Demo', 'tag' => 'Delegation'],
                    ['url' => 'https://www.youtube.com/watch?v=fpmo37-Qpfk', 'thumb' => 'assets/images/yt3.jpg', 'title' => 'Checklist Management', 'tag' => 'Checklist'],
                    ['url' => 'https://www.youtube.com/watch?v=M56gDssDbPU', 'thumb' => 'assets/images/yt4.jpg', 'title' => 'Lead & CRM System', 'tag' => 'CRM'],
                    ['url' => 'https://www.youtube.com/watch?v=5eCef2-oC50', 'thumb' => 'assets/images/yt5.jpg', 'title' => 'Attendance Tracking', 'tag' => 'Attendance'],
                    ['url' => 'https://www.youtube.com/watch?v=QsQq1av9bOI', 'thumb' => 'assets/images/yt6.jpg', 'title' => 'WhatsApp Integration', 'tag' => 'WhatsApp'],
                ];
                foreach ($videos as $i => $video): ?>
                <a href="<?= $video['url'] ?>" target="_blank" rel="noopener" class="video-card-futuristic reveal-on-scroll" data-cursor-hover style="text-decoration: none; animation-delay: <?= $i * 0.1 ?>s;">
                    <div class="video-card-thumb">
                        <img src="<?= $video['thumb'] ?>" alt="<?= $video['title'] ?>">
                        <div class="video-card-overlay">
                            <div class="video-play-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white" stroke="none"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                            </div>
                        </div>
                        <span class="video-card-tag"><?= $video['tag'] ?></span>
                    </div>
                    <div class="video-card-info">
                        <h4><?= $video['title'] ?></h4>
                        <span class="video-card-cta">Watch Now →</span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
    .video-card-futuristic {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: block;
    }
    .video-card-futuristic:hover {
        border-color: rgba(0,164,210,0.4);
        box-shadow: 0 0 40px rgba(0,164,210,0.1), 0 20px 60px rgba(0,0,0,0.4);
        transform: translateY(-4px);
        background: rgba(255,255,255,0.05);
    }
    .video-card-thumb {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
    }
    .video-card-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .video-card-futuristic:hover .video-card-thumb img {
        transform: scale(1.08);
    }
    .video-card-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,0,0,0.4);
        transition: background 0.3s;
    }
    .video-card-futuristic:hover .video-card-overlay {
        background: rgba(0,164,210,0.2);
    }
    .video-play-btn {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: rgba(0,164,210,0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 30px rgba(0,164,210,0.5);
        transition: all 0.3s;
    }
    .video-card-futuristic:hover .video-play-btn {
        transform: scale(1.15);
        box-shadow: 0 0 50px rgba(0,164,210,0.7);
    }
    .video-card-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 4px 12px;
        background: rgba(0,0,0,0.7);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 100px;
        font-size: 11px;
        font-weight: 600;
        color: #42C5EF;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .video-card-info {
        padding: 18px 20px;
    }
    .video-card-info h4 {
        color: #fff;
        font-size: 1rem;
        font-weight: 600;
        margin: 0 0 6px;
    }
    .video-card-cta {
        font-size: 0.8rem;
        color: #42C5EF;
        font-weight: 500;
        opacity: 0;
        transition: opacity 0.3s;
    }
    .video-card-futuristic:hover .video-card-cta { opacity: 1; }
    </style>

<?php
$cta_title    = 'Want a <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">personalized demo?</span>';
$cta_subtitle = 'Book a free 1-on-1 demo call and see the system tailored to your business.';
$default_interest = '';
include 'inc/footer-modern.php';
