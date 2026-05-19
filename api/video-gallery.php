<?php
$page_title    = 'Video Gallery — MIS.work | Product Demos & Tutorials';
$page_desc     = 'Watch MIS.work product demos, tutorials, and customer success stories on our video gallery.';
$active_page   = 'videos';
$active_product = '';

include __DIR__.'/../inc/header-modern.php';
?>

    <!-- ====== VIDEO HERO ====== -->
    <section class="product-hero">
        <div class="product-hero-aurora"></div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>

        <!-- Floating background objects -->
        <div class="hero-float-obj" style="top: 18%; left: 8%; width: 70px; height: 70px; background: linear-gradient(135deg, rgba(0,164,210,0.1), rgba(66,197,239,0.04)); border-radius: 16px; animation: floatSlow 8s ease-in-out infinite; border: 1px solid rgba(0,164,210,0.08);"></div>
        <div class="hero-float-obj" style="top: 55%; right: 6%; width: 55px; height: 55px; background: linear-gradient(135deg, rgba(139,92,246,0.08), transparent); border-radius: 50%; animation: floatSlow 10s ease-in-out infinite 2s; border: 1px solid rgba(139,92,246,0.06);"></div>
        <div class="hero-float-obj" style="bottom: 25%; left: 15%; width: 40px; height: 40px; background: linear-gradient(135deg, rgba(0,164,210,0.06), transparent); border-radius: 10px; animation: floatSlow 7s ease-in-out infinite 1s; border: 1px solid rgba(0,164,210,0.05); transform: rotate(45deg);"></div>

        <div class="product-hero-container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
            <div class="product-hero-content" style="max-width: 700px; text-align: center;">
                <div class="product-hero-eyebrow" style="justify-content: center;">
                    <span class="dot"></span>
                    <span>Video Library</span>
                </div>

                <h1 class="product-hero-title">
                    Watch Our Products
                    <span class="gradient">in Action</span>
                </h1>

                <p class="product-hero-subtitle" style="max-width: 550px; margin: 0 auto;">
                    See how MIS.work systems work through demos, tutorials, and real use-cases from 500+ businesses.
                </p>
            </div>
        </div>
    </section>

    <!-- ====== VIDEO GRID ====== -->
    <section style="padding: 60px 0 100px; background: #fff; position: relative; overflow: hidden;">
        <!-- Subtle bg glow -->
        <div style="position: absolute; top: -80px; left: -80px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0,164,210,0.04), transparent 70%); border-radius: 50%; pointer-events: none;"></div>
        <div style="position: absolute; bottom: -100px; right: -100px; width: 500px; height: 500px; background: radial-gradient(circle, rgba(139,92,246,0.03), transparent 70%); border-radius: 50%; pointer-events: none;"></div>

        <div style="max-width: 1200px; margin: 0 auto; padding: 0 32px; position: relative; z-index: 2;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 28px;">
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
                <a href="<?= $video['url'] ?>" target="_blank" rel="noopener" class="vid-card reveal-on-scroll" data-cursor-hover style="text-decoration: none;">
                    <div class="vid-card-thumb">
                        <img src="<?= $video['thumb'] ?>" alt="<?= $video['title'] ?>">
                        <div class="vid-card-play">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="white" stroke="none"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                        </div>
                        <span class="vid-card-tag"><?= $video['tag'] ?></span>
                    </div>
                    <div class="vid-card-info">
                        <h4><?= $video['title'] ?></h4>
                        <span class="vid-card-link">Watch Demo →</span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
    .hero-float-obj {
        position: absolute;
        pointer-events: none;
        z-index: 1;
        backdrop-filter: blur(4px);
    }
    @keyframes floatSlow {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    .vid-card {
        display: block;
        background: #fff;
        border: 1px solid rgba(0,0,0,0.06);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.35s ease;
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
    }
    .vid-card:hover {
        border-color: rgba(0,164,210,0.25);
        box-shadow: 0 12px 40px rgba(0,164,210,0.1);
        transform: translateY(-6px);
    }
    .vid-card-thumb {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
    }
    .vid-card-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .vid-card:hover .vid-card-thumb img {
        transform: scale(1.05);
    }
    .vid-card-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: rgba(0,164,210,0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 20px rgba(0,164,210,0.4);
        transition: all 0.3s ease;
    }
    .vid-card:hover .vid-card-play {
        transform: translate(-50%, -50%) scale(1.1);
        box-shadow: 0 8px 30px rgba(0,164,210,0.5);
    }
    .vid-card-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 5px 12px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(8px);
        border-radius: 100px;
        font-size: 11px;
        font-weight: 600;
        color: #00A4D2;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .vid-card-info {
        padding: 18px 22px;
    }
    .vid-card-info h4 {
        color: #1a1a2e;
        font-size: 1.05rem;
        font-weight: 600;
        margin: 0 0 6px;
    }
    .vid-card-link {
        font-size: 0.85rem;
        color: #00A4D2;
        font-weight: 500;
        opacity: 0;
        transition: opacity 0.3s;
    }
    .vid-card:hover .vid-card-link { opacity: 1; }
    </style>

<?php
$cta_title    = 'Want a <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">personalized demo?</span>';
$cta_subtitle = 'Book a free 1-on-1 demo call and see the system tailored to your business.';
$default_interest = '';
include __DIR__.'/../inc/footer-modern.php';
