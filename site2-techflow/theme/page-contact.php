<?php
/**
 * Template Name: Contact Page
 * TechFlow Agency — Contact
 */
get_header(); ?>

<!-- ============================================
     1. HERO
     ============================================ -->
<section class="tf-contact-hero">
    <div class="tf-contact-hero__bg">
        <div class="tf-orb tf-orb--violet" style="top:-10%;right:10%;width:600px;height:600px;opacity:0.2;"></div>
        <div class="tf-orb tf-orb--cyan"   style="bottom:0;left:-5%;width:400px;height:400px;opacity:0.1;"></div>
        <div class="tf-grid-lines"></div>
    </div>
    <div class="tf-container">
        <nav class="tf-breadcrumb">
            <a href="<?php echo home_url('/'); ?>">Home</a>
            <span class="tf-breadcrumb__sep">→</span>
            <span class="tf-breadcrumb__current">Contact</span>
        </nav>
        <div class="tf-contact-hero__content">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                Get In Touch
            </div>
            <h1 class="tf-contact-hero__title">
                Let's Build Something
                <span class="tf-gradient-text">Remarkable</span>
            </h1>
            <p class="tf-contact-hero__subtitle">
                Tell us about your project. We'll get back to you within 24 hours 
                with a clear plan of action — no sales pitch, no fluff.
            </p>
        </div>

        <!-- Info Cards -->
        <div class="tf-contact-info-cards">
            <div class="tf-contact-info-card">
                <div class="tf-contact-info-card__icon tf-service-icon--violet">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.42 2 2 0 0 1 3.58 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.54a16 16 0 0 0 6 6l.92-.92a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16v.92z"/>
                    </svg>
                </div>
                <div class="tf-contact-info-card__text">
                    <span class="tf-contact-info-card__label">Phone</span>
                    <span class="tf-contact-info-card__value">+1 (800) 555-1234</span>
                </div>
            </div>
            <div class="tf-contact-info-card">
                <div class="tf-contact-info-card__icon tf-service-icon--cyan">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                <div class="tf-contact-info-card__text">
                    <span class="tf-contact-info-card__label">Email</span>
                    <span class="tf-contact-info-card__value">hello@techflow.dev</span>
                </div>
            </div>
            <div class="tf-contact-info-card">
                <div class="tf-contact-info-card__icon tf-service-icon--amber">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <div class="tf-contact-info-card__text">
                    <span class="tf-contact-info-card__label">Location</span>
                    <span class="tf-contact-info-card__value">San Francisco, CA</span>
                </div>
            </div>
            <div class="tf-contact-info-card">
                <div class="tf-contact-info-card__icon tf-service-icon--green">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <div class="tf-contact-info-card__text">
                    <span class="tf-contact-info-card__label">Response Time</span>
                    <span class="tf-contact-info-card__value">Within 24 hours</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     2. CONTACT FORM + SIDEBAR
     ============================================ -->
<section class="tf-contact-section">
    <div class="tf-container">
        <div class="tf-contact-layout">

            <!-- FORM -->
            <div class="tf-contact-form-wrap">
                <div class="tf-contact-form-header">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form and we'll be in touch shortly.</p>
                </div>

                <form class="tf-contact-form" id="tf-contact-form" novalidate>
                    <?php wp_nonce_field('tf_contact_nonce', 'tf_contact_nonce_field'); ?>

                    <div class="tf-form-row">
                        <div class="tf-form-group">
                            <label class="tf-form-label" for="tf-name">
                                Full Name <span class="tf-form-required">*</span>
                            </label>
                            <input
                                type="text"
                                id="tf-name"
                                name="name"
                                class="tf-form-input"
                                placeholder="John Smith"
                                required
                                autocomplete="name"
                            >
                            <span class="tf-form-error" id="tf-name-error"></span>
                        </div>
                        <div class="tf-form-group">
                            <label class="tf-form-label" for="tf-email">
                                Email Address <span class="tf-form-required">*</span>
                            </label>
                            <input
                                type="email"
                                id="tf-email"
                                name="email"
                                class="tf-form-input"
                                placeholder="john@company.com"
                                required
                                autocomplete="email"
                            >
                            <span class="tf-form-error" id="tf-email-error"></span>
                        </div>
                    </div>

                    <div class="tf-form-row">
                        <div class="tf-form-group">
                            <label class="tf-form-label" for="tf-company">
                                Company
                            </label>
                            <input
                                type="text"
                                id="tf-company"
                                name="company"
                                class="tf-form-input"
                                placeholder="Your Company"
                                autocomplete="organization"
                            >
                        </div>
                        <div class="tf-form-group">
                            <label class="tf-form-label" for="tf-budget">
                                Budget Range
                            </label>
                            <select id="tf-budget" name="budget" class="tf-form-select">
                                <option value="" disabled selected>Select budget range</option>
                                <option value="under-5k">Under \$5,000</option>
                                <option value="5k-15k">\$5,000 – \$15,000</option>
                                <option value="15k-50k">\$15,000 – \$50,000</option>
                                <option value="50k-plus">\$50,000+</option>
                                <option value="ongoing">Ongoing retainer</option>
                            </select>
                        </div>
                    </div>

                    <div class="tf-form-group">
                        <label class="tf-form-label">
                            Services Needed
                        </label>
                        <div class="tf-form-checkboxes">
                            <?php
                            $services = [
                                'web-dev'    => 'Web Development',
                                'ui-ux'      => 'UI/UX Design',
                                'mobile'     => 'Mobile Apps',
                                'devops'     => 'Cloud & DevOps',
                                'ecommerce'  => 'E-Commerce',
                                'ai'         => 'AI Integration',
                            ];
                            foreach ( $services as $val => $label ) : ?>
                                <label class="tf-checkbox-label">
                                    <input type="checkbox" name="services[]" value="<?php echo esc_attr($val); ?>" class="tf-checkbox">
                                    <span class="tf-checkbox-custom"></span>
                                    <?php echo esc_html($label); ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="tf-form-group">
                        <label class="tf-form-label" for="tf-message">
                            Project Details <span class="tf-form-required">*</span>
                        </label>
                        <textarea
                            id="tf-message"
                            name="message"
                            class="tf-form-textarea"
                            placeholder="Tell us about your project — what are you building, what's your timeline, and what does success look like?"
                            rows="6"
                            required
                        ></textarea>
                        <span class="tf-form-error" id="tf-message-error"></span>
                        <span class="tf-form-hint" id="tf-char-count">0 / 1000</span>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="tf-btn tf-btn--primary tf-btn--lg tf-btn--full tf-contact-submit" id="tf-contact-submit">
                        <span class="tf-submit-text">Send Message</span>
                        <span class="tf-submit-loading" style="display:none;">
                            <svg class="tf-spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
                            </svg>
                            Sending...
                        </span>
                        <svg class="tf-submit-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13"/>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                        </svg>
                    </button>

                    <!-- Response Messages -->
                    <div class="tf-form-response tf-form-response--success" id="tf-form-success" style="display:none;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        <span>Message sent! We'll get back to you within 24 hours.</span>
                    </div>
                    <div class="tf-form-response tf-form-response--error" id="tf-form-error-msg" style="display:none;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <span>Something went wrong. Please try again or email us directly.</span>
                    </div>

                </form>
            </div>

            <!-- SIDEBAR -->
            <div class="tf-contact-sidebar">

                <!-- Availability -->
                <div class="tf-contact-sidebar-card">
                    <div class="tf-availability-badge">
                        <span class="tf-availability-dot"></span>
                        Available for new projects
                    </div>
                    <h3>Schedule a Free Call</h3>
                    <p>Prefer to talk? Book a 30-minute discovery call directly on our calendar.</p>
                    <a href="#" class="tf-btn tf-btn--ghost tf-btn--full">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        Book a Call
                    </a>
                </div>

                <!-- What to Expect -->
                <div class="tf-contact-sidebar-card">
                    <h3>What Happens Next?</h3>
                    <div class="tf-contact-steps">
                        <div class="tf-contact-step">
                            <div class="tf-contact-step__num">01</div>
                            <div class="tf-contact-step__text">
                                <strong>We review your message</strong>
                                <span>Usually within a few hours</span>
                            </div>
                        </div>
                        <div class="tf-contact-step">
                            <div class="tf-contact-step__num">02</div>
                            <div class="tf-contact-step__text">
                                <strong>Discovery call scheduled</strong>
                                <span>30 min to align on scope</span>
                            </div>
                        </div>
                        <div class="tf-contact-step">
                            <div class="tf-contact-step__num">03</div>
                            <div class="tf-contact-step__text">
                                <strong>Proposal delivered</strong>
                                <span>Detailed scope + pricing in 48h</span>
                            </div>
                        </div>
                        <div class="tf-contact-step">
                            <div class="tf-contact-step__num">04</div>
                            <div class="tf-contact-step__text">
                                <strong>We start building</strong>
                                <span>Kickoff within 1 week</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="tf-contact-sidebar-card">
                    <h3>Find Us Online</h3>
                    <div class="tf-contact-socials">
                        <a href="#" class="tf-contact-social-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            LinkedIn
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:auto;">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                            </svg>
                        </a>
                        <a href="#" class="tf-contact-social-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                            Twitter / X
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:auto;">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                            </svg>
                        </a>
                        <a href="#" class="tf-contact-social-link">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                            </svg>
                            GitHub
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:auto;">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ============================================
     FORM SCRIPT
     ============================================ -->
<script>
(function() {
    'use strict';

    const form       = document.getElementById('tf-contact-form');
    const submitBtn  = document.getElementById('tf-contact-submit');
    const submitText = submitBtn.querySelector('.tf-submit-text');
    const submitLoad = submitBtn.querySelector('.tf-submit-loading');
    const submitIcon = submitBtn.querySelector('.tf-submit-icon');
    const successMsg = document.getElementById('tf-form-success');
    const errorMsg   = document.getElementById('tf-form-error-msg');
    const textarea   = document.getElementById('tf-message');
    const charCount  = document.getElementById('tf-char-count');

    /* --- Char counter --- */
    if (textarea && charCount) {
        textarea.addEventListener('input', function() {
            const len = this.value.length;
            charCount.textContent = len + ' / 1000';
            charCount.style.color = len > 900
                ? '#F59E0B'
                : 'var(--tf-gray-500)';
        });
    }

    /* --- Input focus effects --- */
    document.querySelectorAll('.tf-form-input, .tf-form-select, .tf-form-textarea').forEach(function(el) {
        el.addEventListener('focus', function() {
            this.closest('.tf-form-group').classList.add('tf-form-group--focused');
        });
        el.addEventListener('blur', function() {
            this.closest('.tf-form-group').classList.remove('tf-form-group--focused');
            validateField(this);
        });
    });

    /* --- Validation --- */
    function validateField(field) {
        const group = field.closest('.tf-form-group');
        if (!group) return true;
        const error = group.querySelector('.tf-form-error');
        let valid = true;

        if (field.hasAttribute('required') && !field.value.trim()) {
            if (error) error.textContent = 'This field is required.';
            group.classList.add('tf-form-group--error');
            valid = false;
        } else if (field.type === 'email' && field.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value)) {
            if (error) error.textContent = 'Please enter a valid email.';
            group.classList.add('tf-form-group--error');
            valid = false;
        } else {
            if (error) error.textContent = '';
            group.classList.remove('tf-form-group--error');
        }
        return valid;
    }

    function validateForm() {
        const fields = form.querySelectorAll('[required]');
        let valid = true;
        fields.forEach(function(f) {
            if (!validateField(f)) valid = false;
        });
        return valid;
    }

    /* --- Submit --- */
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (!validateForm()) return;

            // Loading state
            submitBtn.disabled = true;
            submitText.style.display = 'none';
            submitLoad.style.display = 'flex';
            submitIcon.style.display = 'none';
            successMsg.style.display = 'none';
            errorMsg.style.display   = 'none';

            // Collect services
            const services = [];
            form.querySelectorAll('input[name="services[]"]:checked').forEach(function(cb) {
                services.push(cb.value);
            });

            const data = new FormData();
            data.append('action',   'tf_contact_form');
            data.append('nonce',    form.querySelector('[name="tf_contact_nonce_field"]').value);
            data.append('name',     form.querySelector('[name="name"]').value);
            data.append('email',    form.querySelector('[name="email"]').value);
            data.append('company',  form.querySelector('[name="company"]').value);
            data.append('budget',   form.querySelector('[name="budget"]').value);
            data.append('services', services.join(', '));
            data.append('message',  textarea.value);

            fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                body: data,
            })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) {
                    successMsg.style.display = 'flex';
                    form.reset();
                    charCount.textContent = '0 / 1000';
                } else {
                    errorMsg.style.display = 'flex';
                }
            })
            .catch(function() {
                errorMsg.style.display = 'flex';
            })
            .finally(function() {
                submitBtn.disabled = false;
                submitText.style.display = '';
                submitLoad.style.display = 'none';
                submitIcon.style.display = '';
            });
        });
    }

})();
</script>

<?php get_footer(); ?>