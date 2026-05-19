<?php
// ============================================
// MIS.work — Reusable Modern Footer
// Used by: All internal pages
// Variables expected (optional):
//   $cta_title    (string) - CTA section title
//   $cta_subtitle (string) - CTA section subtitle
//   $default_interest (string) - Pre-selected option in contact form (e.g., "Delegation System")
// ============================================

if (!isset($cta_title))    $cta_title    = 'Ready to <span style="background: linear-gradient(135deg, #fff, #B8EAFB); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Build Your Future?</span>';
if (!isset($cta_subtitle)) $cta_subtitle = 'Join 500+ businesses transforming their operations with our automation systems.';
if (!isset($default_interest)) $default_interest = '';

$products = [
    'Delegation System',
    'Checklist',
    'Lead Management',
    'FMS',
    'Leave Management',
    'Attendance Management',
    'Mobile App',
    'Tally',
    'Tally Integration',
    'Whatsapp API',
    'Bulk Marketing',
    'Others',
];
?>

    <!-- ====== CTA SECTION ====== -->
    <section class="cta-section-mis section-medium">
        <div class="container-mis">
            <div class="cta-wrapper-mis reveal-on-scroll">
                <h2 class="cta-title-mis"><?= $cta_title ?></h2>
                <p class="cta-subtitle-mis"><?= htmlspecialchars($cta_subtitle) ?></p>
                <div class="cta-buttons-mis">
                    <a href="#contact" class="btn-mis btn-white-mis" data-cursor-hover>
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
                            <h6>Visit Us</h6>
                            <p>775, 7th Floor, Aggarwal Millennium Tower-2, NSP, Pitampura, Delhi – 110034</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div class="contact-info-content">
                            <h6>Call Us</h6>
                            <a href="tel:+919999408444">+91 9999408444</a>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div class="contact-info-content">
                            <h6>Email Us</h6>
                            <a href="mailto:info@mis.work">info@mis.work</a>
                        </div>
                    </div>
                </div>

                <div class="reveal-on-scroll">
                    <form id="contactFormMIS" style="background: white; padding: 32px; border-radius: 24px; box-shadow: 0 20px 50px -10px rgba(0,0,0,0.08); border: 1px solid var(--color-border-light);">
                        <h3 style="font-size: 22px; font-weight: 700; margin-bottom: 6px;">Send us a message</h3>
                        <p style="font-size: 13px; color: var(--color-text-secondary); margin-bottom: 24px;">Fill in the form and we'll get back to you soon.</p>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-mis-label">Name *</label>
                                <input type="text" name="name" class="form-mis-input" placeholder="Your name" required>
                            </div>
                            <div>
                                <label class="form-mis-label">Email *</label>
                                <input type="email" name="email" class="form-mis-input" placeholder="you@example.com" required>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-mis-label">Contact No. *</label>
                                <input type="tel" name="phone" class="form-mis-input" placeholder="+91 99999 99999" required>
                            </div>
                            <div>
                                <label class="form-mis-label">City *</label>
                                <input type="text" name="city" class="form-mis-input" placeholder="Your city" required>
                            </div>
                        </div>

                        <div style="margin-bottom: 14px;">
                            <label class="form-mis-label">Interested In *</label>
                            <select name="interested" class="form-mis-input" required>
                                <option value="">Select a service</option>
                                <?php foreach ($products as $p): ?>
                                    <option value="<?= htmlspecialchars($p) ?>" <?= ($default_interest === $p) ? 'selected' : '' ?>><?= htmlspecialchars($p) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label class="form-mis-label">Message</label>
                            <textarea name="message" class="form-mis-input form-mis-textarea" placeholder="Tell us about your needs..."></textarea>
                        </div>

                        <button type="submit" class="btn-mis btn-primary-mis" style="width: 100%; padding: 14px;" data-cursor-hover id="contactSubmitBtn">
                            Send Message
                            <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </button>
                        <div id="contactFormMsg" style="margin-top: 14px; text-align: center; font-size: 14px; display: none;"></div>
                    </form>
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
                        <a href="#" class="footer-mis-social-link" data-cursor-hover><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
                        <a href="#" class="footer-mis-social-link" data-cursor-hover><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                        <a href="#" class="footer-mis-social-link" data-cursor-hover><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
                    </div>
                </div>

                <div>
                    <h6 class="footer-mis-heading">Products</h6>
                    <a href="delegation.php" class="footer-mis-link" data-cursor-hover>Delegation System</a>
                    <a href="checklist.php" class="footer-mis-link" data-cursor-hover>Checklist</a>
                    <a href="leave-application.php" class="footer-mis-link" data-cursor-hover>Leave Management</a>
                    <a href="lead-management.php" class="footer-mis-link" data-cursor-hover>Lead Management</a>
                    <a href="attendance-management-system.php" class="footer-mis-link" data-cursor-hover>Attendance</a>
                </div>

                <div>
                    <h6 class="footer-mis-heading">Company</h6>
                    <a href="about-us.php" class="footer-mis-link" data-cursor-hover>About Us</a>
                    <a href="services.php" class="footer-mis-link" data-cursor-hover>Services</a>
                    <a href="faq.php" class="footer-mis-link" data-cursor-hover>FAQ</a>
                    <a href="contact-us.php" class="footer-mis-link" data-cursor-hover>Contact</a>
                </div>

                <div>
                    <h6 class="footer-mis-heading">Legal</h6>
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

    <script src="assets/js/modern.js?v=<?= time() ?>"></script>
    <script src="assets/js/effects.js?v=<?= time() ?>"></script>
    <script src="assets/js/hero-effects.js?v=<?= time() ?>"></script>
    <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;"></iframe>
    <script>
    (function(){
        var form = document.getElementById('contactFormMIS');
        if (!form) return;
        form.setAttribute('action', 'https://script.google.com/macros/s/AKfycbwVDbqz17pQUXloA_eZn9y70zzYgsfCqlPQcWjtuc9ZlwQGH0rH5qyy6h5_rSAHDbBH/exec');
        form.setAttribute('method', 'POST');
        form.setAttribute('target', 'hidden_iframe');
        form.removeAttribute('onsubmit');

        form.addEventListener('submit', function(){
            var btn = document.getElementById('contactSubmitBtn');
            var msg = document.getElementById('contactFormMsg');
            btn.disabled = true;
            btn.innerHTML = 'Sending...';
            setTimeout(function(){
                msg.style.display = 'block';
                msg.style.color = '#10b981';
                msg.innerHTML = '✅ Message sent successfully! We\'ll get back within 2 hours.';
                form.reset();
                btn.disabled = false;
                btn.innerHTML = 'Send Message <svg class="btn-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>';
            }, 2000);
        });
    })();
    </script>
</body>
</html>
