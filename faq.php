<?php
$page_title    = 'FAQ — MIS.work | Frequently Asked Questions';
$page_desc     = 'Find answers to common questions about MIS.work services, support, plans, and business automation solutions.';
$active_page   = 'faq';
$active_product = '';

include 'inc/header-modern.php';
?>

    <!-- ====== FAQ HERO ====== -->
    <section class="product-hero">
        <div class="product-hero-aurora"></div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>

        <!-- Floating background objects -->
        <div class="hero-float-obj" style="top: 20%; right: 10%; width: 70px; height: 70px; background: linear-gradient(135deg, rgba(0,164,210,0.1), rgba(66,197,239,0.05)); border-radius: 18px; animation: floatSlow 9s ease-in-out infinite; border: 1px solid rgba(0,164,210,0.08);"></div>
        <div class="hero-float-obj" style="top: 50%; left: 6%; width: 50px; height: 50px; background: linear-gradient(135deg, rgba(139,92,246,0.08), transparent); border-radius: 50%; animation: floatSlow 11s ease-in-out infinite 3s; border: 1px solid rgba(139,92,246,0.06);"></div>
        <div class="hero-float-obj" style="bottom: 15%; right: 15%; width: 35px; height: 35px; background: linear-gradient(135deg, rgba(0,164,210,0.06), transparent); border-radius: 10px; animation: floatSlow 7s ease-in-out infinite 1.5s; border: 1px solid rgba(0,164,210,0.05); transform: rotate(45deg);"></div>

        <div class="product-hero-container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
            <div class="product-hero-content" style="max-width: 700px; text-align: center;">
                <div class="product-hero-eyebrow" style="justify-content: center;">
                    <span class="dot"></span>
                    <span>FAQ</span>
                </div>

                <h1 class="product-hero-title">
                    Got Questions?
                    <span class="gradient">We've Got Answers</span>
                </h1>

                <p class="product-hero-subtitle" style="max-width: 550px; margin: 0 auto;">
                    Everything you need to know about MIS.work — from setup to scaling. Can't find your answer? Reach out directly.
                </p>
            </div>
        </div>
    </section>

    <!-- ====== FAQ ACCORDION ====== -->
    <section style="padding: 60px 0 100px; background: #fff; position: relative; overflow: hidden;">
        <!-- Subtle bg decoration -->
        <div style="position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0,164,210,0.04), transparent 70%); border-radius: 50%; pointer-events: none;"></div>
        <div style="position: absolute; bottom: -50px; left: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(139,92,246,0.03), transparent 70%); border-radius: 50%; pointer-events: none;"></div>

        <div style="max-width: 780px; margin: 0 auto; padding: 0 32px; position: relative; z-index: 2;">
            <div class="faq-grid-modern">
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
                <div class="faq-item-v2 reveal-on-scroll" data-cursor-hover>
                    <button class="faq-q-v2" onclick="this.parentElement.classList.toggle('active')">
                        <span class="faq-q-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
                        <span class="faq-q-text"><?= $faq['q'] ?></span>
                        <span class="faq-q-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </span>
                    </button>
                    <div class="faq-a-v2">
                        <p><?= $faq['a'] ?></p>
                    </div>
                </div>
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
    .faq-grid-modern { display: flex; flex-direction: column; gap: 12px; }
    .faq-item-v2 {
        background: #fff;
        border: 1px solid rgba(0,0,0,0.06);
        border-radius: 14px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    .faq-item-v2:hover {
        border-color: rgba(0,164,210,0.2);
        box-shadow: 0 8px 30px rgba(0,164,210,0.06);
    }
    .faq-item-v2.active {
        border-color: rgba(0,164,210,0.3);
        box-shadow: 0 8px 30px rgba(0,164,210,0.08);
        background: linear-gradient(135deg, rgba(0,164,210,0.02), rgba(255,255,255,1));
    }
    .faq-q-v2 {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 22px 24px;
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
        font-family: inherit;
    }
    .faq-q-num {
        font-size: 0.8rem;
        font-weight: 700;
        color: #00A4D2;
        min-width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,164,210,0.08);
        border-radius: 8px;
    }
    .faq-q-text {
        flex: 1;
        font-size: 1.02rem;
        font-weight: 550;
        color: #1a1a2e;
    }
    .faq-q-icon {
        flex-shrink: 0;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(0,0,0,0.03);
        color: #666;
        transition: all 0.3s ease;
    }
    .faq-item-v2.active .faq-q-icon {
        background: rgba(0,164,210,0.1);
        color: #00A4D2;
        transform: rotate(45deg);
    }
    .faq-a-v2 {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, padding 0.3s ease;
    }
    .faq-item-v2.active .faq-a-v2 {
        max-height: 300px;
        padding: 0 24px 22px 68px;
    }
    .faq-a-v2 p {
        color: #555;
        line-height: 1.7;
        margin: 0;
        font-size: 0.95rem;
    }
    </style>

<?php
$cta_title    = 'Still have <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">questions?</span>';
$cta_subtitle = 'Our team is always happy to help. Reach out and we\'ll get back to you within 2 hours.';
$default_interest = '';
include 'inc/footer-modern.php';
