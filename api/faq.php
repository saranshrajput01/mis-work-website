<?php
$page_title    = 'FAQ — MIS.work | Frequently Asked Questions';
$page_desc     = 'Find answers to common questions about MIS.work services, support, plans, and business automation solutions.';
$active_page   = 'faq';
$active_product = '';

include __DIR__.'/../inc/header-modern.php';
?>

    <!-- ====== FAQ HERO ====== -->
    <section class="product-hero" style="padding-bottom: 40px;">
        <div class="product-hero-aurora"></div>
        <div class="bg-grid"></div>
        <div class="noise-overlay"></div>

        <div class="product-hero-container">
            <div class="product-hero-content" style="max-width: 100%; text-align: center;">
                <div class="product-hero-eyebrow" style="justify-content: center;">
                    <span class="dot"></span>
                    <span>FAQ</span>
                </div>

                <h1 class="product-hero-title">
                    Frequently Asked
                    <span class="gradient">Questions</span>
                </h1>

                <p class="product-hero-subtitle" style="max-width: 600px; margin: 0 auto;">
                    Got questions? We've got answers. If you can't find what you're looking for, reach out to us directly.
                </p>
            </div>
        </div>
    </section>

    <!-- ====== FAQ ACCORDION ====== -->
    <section class="feature-row-section is-light" style="padding: 20px 0 80px;">
        <div class="feature-row-container" style="max-width: 800px;">
            <div class="faq-section-modern">
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
                <div class="faq-item-modern" data-cursor-hover>
                    <button class="faq-question-modern" onclick="this.parentElement.classList.toggle('active')">
                        <span><?= $faq['q'] ?></span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="faq-answer-modern">
                        <p><?= $faq['a'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
    .faq-section-modern { display: flex; flex-direction: column; gap: 12px; }
    .faq-item-modern { background: #fff; border: 1px solid rgba(0,0,0,0.06); border-radius: 12px; overflow: hidden; transition: all 0.3s ease; }
    .faq-item-modern:hover { border-color: rgba(0,164,210,0.2); box-shadow: 0 4px 20px rgba(0,164,210,0.06); }
    .faq-question-modern { width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 20px 24px; background: none; border: none; cursor: pointer; font-size: 1.05rem; font-weight: 500; color: #1a1a1a; text-align: left; gap: 16px; font-family: inherit; }
    .faq-question-modern svg { flex-shrink: 0; transition: transform 0.3s ease; opacity: 0.4; }
    .faq-item-modern.active .faq-question-modern svg { transform: rotate(180deg); opacity: 1; color: #00A4D2; }
    .faq-answer-modern { max-height: 0; overflow: hidden; transition: max-height 0.3s ease, padding 0.3s ease; }
    .faq-item-modern.active .faq-answer-modern { max-height: 200px; padding: 0 24px 20px; }
    .faq-answer-modern p { color: #555; line-height: 1.7; margin: 0; font-size: 0.95rem; }
    </style>

<?php
$cta_title    = 'Still have <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">questions?</span>';
$cta_subtitle = 'Our team is always happy to help. Reach out and we\'ll get back to you within 2 hours.';
$default_interest = '';
include __DIR__.'/../inc/footer-modern.php';
