<?php
$page_title    = 'FAQ — MIS.work | Frequently Asked Questions';
$page_desc     = 'Find answers to common questions about MIS.work services, support, plans, and business automation solutions.';
$active_page   = 'faq';
$active_product = '';

include 'inc/header-modern.php';
?>

    <!-- ====== FAQ HERO ====== -->
    <section class="product-hero" style="background: linear-gradient(180deg, #0a0a0f 0%, #111118 100%); padding-bottom: 40px;">
        <div class="product-hero-aurora"></div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>

        <div class="product-hero-container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
            <div class="product-hero-content" style="max-width: 700px; text-align: center;">
                <div class="product-hero-eyebrow" style="justify-content: center; border-color: rgba(66,197,239,0.3); background: rgba(0,164,210,0.15);">
                    <span class="dot"></span>
                    <span>FAQ</span>
                </div>

                <h1 class="product-hero-title" style="color: #fff;">
                    Got Questions?
                    <span class="gradient">We've Got Answers</span>
                </h1>

                <p class="product-hero-subtitle" style="color: rgba(255,255,255,0.6); max-width: 550px; margin: 0 auto;">
                    Everything you need to know about MIS.work — from setup to scaling.
                </p>
            </div>
        </div>
    </section>

    <!-- ====== FAQ ACCORDION - DARK FUTURISTIC ====== -->
    <section style="background: linear-gradient(180deg, #111118 0%, #0a0a0f 100%); padding: 20px 0 100px; position: relative; overflow: hidden;">
        <!-- Aurora blobs -->
        <div style="position: absolute; top: 10%; right: -5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(0,164,210,0.06), transparent 70%); border-radius: 50%; filter: blur(80px); pointer-events: none;"></div>
        <div style="position: absolute; bottom: 20%; left: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(139,92,246,0.05), transparent 70%); border-radius: 50%; filter: blur(80px); pointer-events: none;"></div>

        <div style="max-width: 780px; margin: 0 auto; padding: 0 32px; position: relative; z-index: 2;">
            <div class="faq-grid-futuristic">
                <?php
                $faqs = [
                    ['q' => 'What services does MIS.work offer?', 'a' => 'We offer Custom Cloud-Based ERP, Mobile & Web Apps, WhatsApp API & Bulk Marketing Tools, Delegation & Checklist Task Management, CRM & Lead Management, Attendance Systems, and Google Sheets to Tally/ERP integrations.'],
                    ['q' => 'How long does it take to set up a system?', 'a' => 'Most systems go live within 7-14 days depending on complexity. Simple setups like Delegation or Checklist systems can be live in under 7 days.'],
                    ['q' => 'Do you offer customer support?', 'a' => 'Yes, we provide 24/7 customer support through WhatsApp, email, and phone. Every client gets a dedicated account manager.'],
                    ['q' => 'Can I customize the system for my business?', 'a' => 'Absolutely! Every system we build is 100% customizable. We study your workflow first and tailor the solution to match your exact needs.'],
                    ['q' => 'What is your refund policy?', 'a' => 'We offer a 30-day money-back guarantee. If you are not satisfied with our product, you can request a full refund within 30 days.'],
                    ['q' => 'Can I upgrade my plan later?', 'a' => 'Yes! You can upgrade your plan at any time. Our systems are built to scale as your team and business grows.'],
                    ['q' => 'Do I need technical knowledge to use your systems?', 'a' => 'Not at all. Our systems are designed to be intuitive and easy to use. We also provide hands-on training during onboarding.'],
                    ['q' => 'Which industries do you serve?', 'a' => 'We serve 37+ industries including manufacturing, retail, healthcare, education, real estate, logistics, and more.'],
                    ['q' => 'How do WhatsApp alerts work?', 'a' => 'Our systems send real-time notifications via WhatsApp API — task assignments, reminders, reports, and status updates are delivered directly to your team\'s WhatsApp.'],
                    ['q' => 'Can I get a free demo?', 'a' => 'Yes! We offer free demos for all our products. Fill the contact form or call us to schedule one.'],
                ];
                foreach ($faqs as $i => $faq): ?>
                <div class="faq-card-futuristic reveal-on-scroll" data-cursor-hover>
                    <button class="faq-q-futuristic" onclick="this.parentElement.classList.toggle('active')">
                        <span class="faq-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
                        <span class="faq-q-text"><?= $faq['q'] ?></span>
                        <svg class="faq-chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="faq-a-futuristic">
                        <p><?= $faq['a'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
    .faq-grid-futuristic { display: flex; flex-direction: column; gap: 12px; }
    .faq-card-futuristic {
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 14px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .faq-card-futuristic:hover {
        border-color: rgba(0,164,210,0.3);
        background: rgba(255,255,255,0.04);
        box-shadow: 0 0 30px rgba(0,164,210,0.05);
    }
    .faq-card-futuristic.active {
        border-color: rgba(0,164,210,0.4);
        background: rgba(0,164,210,0.04);
        box-shadow: 0 0 40px rgba(0,164,210,0.08);
    }
    .faq-q-futuristic {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 20px 24px;
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
        font-family: inherit;
    }
    .faq-num {
        font-size: 0.75rem;
        font-weight: 700;
        color: #42C5EF;
        opacity: 0.6;
        min-width: 24px;
    }
    .faq-q-text {
        flex: 1;
        font-size: 1.02rem;
        font-weight: 500;
        color: rgba(255,255,255,0.9);
    }
    .faq-chevron {
        flex-shrink: 0;
        color: rgba(255,255,255,0.3);
        transition: all 0.3s ease;
    }
    .faq-card-futuristic.active .faq-chevron {
        transform: rotate(180deg);
        color: #42C5EF;
    }
    .faq-a-futuristic {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s ease;
    }
    .faq-card-futuristic.active .faq-a-futuristic {
        max-height: 300px;
        padding: 0 24px 20px 64px;
    }
    .faq-a-futuristic p {
        color: rgba(255,255,255,0.55);
        line-height: 1.7;
        margin: 0;
        font-size: 0.93rem;
    }
    </style>

<?php
$cta_title    = 'Still have <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">questions?</span>';
$cta_subtitle = 'Our team is always happy to help. Reach out and we\'ll get back to you within 2 hours.';
$default_interest = '';
include 'inc/footer-modern.php';
