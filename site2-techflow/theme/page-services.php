<?php
/**
 * Template Name: Services Page
 * TechFlow Agency — Services
 */
get_header(); ?>

<!-- ============================================
     1. HERO SECTION
     ============================================ -->
<section class="tf-services-hero">
    <div class="tf-services-hero__bg">
        <div class="tf-orb tf-orb--violet" style="top:-10%;left:60%;width:600px;height:600px;"></div>
        <div class="tf-orb tf-orb--cyan"   style="top:40%;left:-5%;width:400px;height:400px;"></div>
        <div class="tf-grid-lines"></div>
    </div>

    <div class="tf-container">
        <!-- Breadcrumb -->
        <nav class="tf-breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo home_url('/'); ?>">Home</a>
            <span class="tf-breadcrumb__sep">→</span>
            <span class="tf-breadcrumb__current">Services</span>
        </nav>

        <div class="tf-services-hero__content">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                What We Do
            </div>
            <h1 class="tf-services-hero__title">
                Full-Stack Solutions<br>
                <span class="tf-gradient-text">Built to Perform</span>
            </h1>
            <p class="tf-services-hero__subtitle">
                From pixel-perfect interfaces to scalable backend systems,
                we deliver end-to-end digital products that drive real business results.
            </p>
            <div class="tf-services-hero__actions">
                <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
                    Start a Project
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="#tf-pricing" class="tf-btn tf-btn--ghost tf-btn--lg">
                    View Pricing
                </a>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="tf-services-hero__stats">
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">6</span>
                <span class="tf-stat-pill__label">Core Services</span>
            </div>
            <div class="tf-stat-pill__divider"></div>
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">48h</span>
                <span class="tf-stat-pill__label">Avg. Response Time</span>
            </div>
            <div class="tf-stat-pill__divider"></div>
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">100%</span>
                <span class="tf-stat-pill__label">Satisfaction Rate</span>
            </div>
            <div class="tf-stat-pill__divider"></div>
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">5yr</span>
                <span class="tf-stat-pill__label">Average Partnership</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     2. SERVICES GRID
     ============================================ -->
<section class="tf-services-grid-section" id="tf-services">
    <div class="tf-container">

        <div class="tf-section-header tf-section-header--center">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                Our Expertise
            </div>
            <h2 class="tf-section-title">
                Everything You Need to
                <span class="tf-gradient-text">Ship & Scale</span>
            </h2>
            <p class="tf-section-subtitle">
                Six specialized service areas, one unified team. We cover the full product lifecycle.
            </p>
        </div>

        <div class="tf-services-grid">

            <!-- Service 1: Web Development -->
            <article class="tf-service-detail-card tf-service-detail-card--featured">
                <div class="tf-service-detail-card__glow"></div>
                <div class="tf-service-detail-card__inner">
                    <div class="tf-service-detail-card__header">
                        <div class="tf-service-icon tf-service-icon--violet">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <polyline points="16 18 22 12 16 6"/>
                                <polyline points="8 6 2 12 8 18"/>
                            </svg>
                        </div>
                        <span class="tf-service-badge">Most Popular</span>
                    </div>
                    <h3 class="tf-service-detail-card__title">Web Development</h3>
                    <p class="tf-service-detail-card__desc">
                        Custom web applications built with modern frameworks. From SPAs to 
                        complex enterprise platforms, we architect solutions that scale with your business.
                    </p>
                    <ul class="tf-service-features">
                        <li><span class="tf-check">✓</span> React / Next.js / Vue.js</li>
                        <li><span class="tf-check">✓</span> Node.js / Python backends</li>
                        <li><span class="tf-check">✓</span> REST & GraphQL APIs</li>
                        <li><span class="tf-check">✓</span> Performance optimization</li>
                        <li><span class="tf-check">✓</span> CI/CD pipelines</li>
                    </ul>
                    <div class="tf-service-detail-card__footer">
                        <span class="tf-service-starting">Starting at</span>
                        <span class="tf-service-price">\$8,000</span>
                        <a href="<?php echo home_url('/contact'); ?>" class="tf-service-cta">
                            Get a Quote →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Service 2: UI/UX Design -->
            <article class="tf-service-detail-card">
                <div class="tf-service-detail-card__glow"></div>
                <div class="tf-service-detail-card__inner">
                    <div class="tf-service-detail-card__header">
                        <div class="tf-service-icon tf-service-icon--cyan">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <circle cx="12" cy="12" r="10"/>
                                <circle cx="12" cy="12" r="4"/>
                                <line x1="4.93" y1="4.93" x2="9.17" y2="9.17"/>
                                <line x1="14.83" y1="14.83" x2="19.07" y2="19.07"/>
                                <line x1="14.83" y1="9.17" x2="19.07" y2="4.93"/>
                                <line x1="4.93" y1="19.07" x2="9.17" y2="14.83"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="tf-service-detail-card__title">UI/UX Design</h3>
                    <p class="tf-service-detail-card__desc">
                        User-centered design that converts. We craft intuitive interfaces backed 
                        by research, testing, and data — not assumptions.
                    </p>
                    <ul class="tf-service-features">
                        <li><span class="tf-check">✓</span> User research & personas</li>
                        <li><span class="tf-check">✓</span> Wireframes & prototypes</li>
                        <li><span class="tf-check">✓</span> Design systems</li>
                        <li><span class="tf-check">✓</span> Usability testing</li>
                        <li><span class="tf-check">✓</span> Figma handoff</li>
                    </ul>
                    <div class="tf-service-detail-card__footer">
                        <span class="tf-service-starting">Starting at</span>
                        <span class="tf-service-price">\$4,500</span>
                        <a href="<?php echo home_url('/contact'); ?>" class="tf-service-cta">
                            Get a Quote →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Service 3: Mobile Apps -->
            <article class="tf-service-detail-card">
                <div class="tf-service-detail-card__glow"></div>
                <div class="tf-service-detail-card__inner">
                    <div class="tf-service-detail-card__header">
                        <div class="tf-service-icon tf-service-icon--amber">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
                                <line x1="12" y1="18" x2="12.01" y2="18"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="tf-service-detail-card__title">Mobile Apps</h3>
                    <p class="tf-service-detail-card__desc">
                        Native and cross-platform mobile experiences for iOS and Android. 
                        High-performance apps that users actually love to use.
                    </p>
                    <ul class="tf-service-features">
                        <li><span class="tf-check">✓</span> React Native / Flutter</li>
                        <li><span class="tf-check">✓</span> Native iOS (Swift)</li>
                        <li><span class="tf-check">✓</span> Native Android (Kotlin)</li>
                        <li><span class="tf-check">✓</span> App Store publishing</li>
                        <li><span class="tf-check">✓</span> Push notifications</li>
                    </ul>
                    <div class="tf-service-detail-card__footer">
                        <span class="tf-service-starting">Starting at</span>
                        <span class="tf-service-price">\$12,000</span>
                        <a href="<?php echo home_url('/contact'); ?>" class="tf-service-cta">
                            Get a Quote →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Service 4: Cloud & DevOps -->
            <article class="tf-service-detail-card">
                <div class="tf-service-detail-card__glow"></div>
                <div class="tf-service-detail-card__inner">
                    <div class="tf-service-detail-card__header">
                        <div class="tf-service-icon tf-service-icon--green">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="tf-service-detail-card__title">Cloud & DevOps</h3>
                    <p class="tf-service-detail-card__desc">
                        Scalable infrastructure that grows with you. We architect, deploy, 
                        and monitor cloud systems for maximum reliability and performance.
                    </p>
                    <ul class="tf-service-features">
                        <li><span class="tf-check">✓</span> AWS / GCP / Azure</li>
                        <li><span class="tf-check">✓</span> Docker & Kubernetes</li>
                        <li><span class="tf-check">✓</span> Infrastructure as Code</li>
                        <li><span class="tf-check">✓</span> 24/7 monitoring</li>
                        <li><span class="tf-check">✓</span> Auto-scaling setup</li>
                    </ul>
                    <div class="tf-service-detail-card__footer">
                        <span class="tf-service-starting">Starting at</span>
                        <span class="tf-service-price">\$3,000</span>
                        <a href="<?php echo home_url('/contact'); ?>" class="tf-service-cta">
                            Get a Quote →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Service 5: E-Commerce -->
            <article class="tf-service-detail-card">
                <div class="tf-service-detail-card__glow"></div>
                <div class="tf-service-detail-card__inner">
                    <div class="tf-service-detail-card__header">
                        <div class="tf-service-icon tf-service-icon--violet">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="tf-service-detail-card__title">E-Commerce</h3>
                    <p class="tf-service-detail-card__desc">
                        Revenue-optimized online stores built on proven platforms. 
                        From MVP stores to enterprise-grade marketplaces with custom features.
                    </p>
                    <ul class="tf-service-features">
                        <li><span class="tf-check">✓</span> Shopify / WooCommerce</li>
                        <li><span class="tf-check">✓</span> Custom checkout flows</li>
                        <li><span class="tf-check">✓</span> Payment integrations</li>
                        <li><span class="tf-check">✓</span> Inventory systems</li>
                        <li><span class="tf-check">✓</span> Conversion optimization</li>
                    </ul>
                    <div class="tf-service-detail-card__footer">
                        <span class="tf-service-starting">Starting at</span>
                        <span class="tf-service-price">\$6,000</span>
                        <a href="<?php echo home_url('/contact'); ?>" class="tf-service-cta">
                            Get a Quote →
                        </a>
                    </div>
                </div>
            </article>

            <!-- Service 6: AI Integration -->
            <article class="tf-service-detail-card">
                <div class="tf-service-detail-card__glow"></div>
                <div class="tf-service-detail-card__inner">
                    <div class="tf-service-detail-card__header">
                        <div class="tf-service-icon tf-service-icon--cyan">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2a10 10 0 1 0 10 10"/>
                                <path d="M12 6v6l4 2"/>
                                <path d="M22 2L12 12"/>
                                <circle cx="19" cy="5" r="3"/>
                            </svg>
                        </div>
                        <span class="tf-service-badge tf-service-badge--new">New</span>
                    </div>
                    <h3 class="tf-service-detail-card__title">AI Integration</h3>
                    <p class="tf-service-detail-card__desc">
                        Supercharge your product with AI capabilities. We integrate LLMs, 
                        build custom ML pipelines, and create intelligent automation workflows.
                    </p>
                    <ul class="tf-service-features">
                        <li><span class="tf-check">✓</span> OpenAI / Claude APIs</li>
                        <li><span class="tf-check">✓</span> Custom AI chatbots</li>
                        <li><span class="tf-check">✓</span> RAG pipelines</li>
                        <li><span class="tf-check">✓</span> ML model integration</li>
                        <li><span class="tf-check">✓</span> Automation workflows</li>
                    </ul>
                    <div class="tf-service-detail-card__footer">
                        <span class="tf-service-starting">Starting at</span>
                        <span class="tf-service-price">\$5,000</span>
                        <a href="<?php echo home_url('/contact'); ?>" class="tf-service-cta">
                            Get a Quote →
                        </a>
                    </div>
                </div>
            </article>

        </div><!-- .tf-services-grid -->
    </div><!-- .tf-container -->
</section>

<!-- ============================================
     3. PRICING SECTION
     ============================================ -->
<section class="tf-pricing-section" id="tf-pricing">
    <div class="tf-pricing-section__bg">
        <div class="tf-orb tf-orb--violet" style="bottom:0;right:10%;width:500px;height:500px;opacity:0.15;"></div>
    </div>

    <div class="tf-container">
        <div class="tf-section-header tf-section-header--center">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                Transparent Pricing
            </div>
            <h2 class="tf-section-title">
                Choose Your
                <span class="tf-gradient-text">Engagement Model</span>
            </h2>
            <p class="tf-section-subtitle">
                No hidden fees. No surprises. Pick the plan that fits your stage and scale up anytime.
            </p>

            <!-- Toggle Mensual / Anual -->
            <div class="tf-pricing-toggle" id="tf-pricing-toggle">
                <span class="tf-pricing-toggle__label tf-pricing-toggle__label--active" id="tf-toggle-monthly">Monthly</span>
                <button class="tf-pricing-toggle__btn" id="tf-toggle-btn" aria-label="Toggle billing period">
                    <span class="tf-pricing-toggle__knob"></span>
                </button>
                <span class="tf-pricing-toggle__label" id="tf-toggle-annual">
                    Annual
                    <span class="tf-pricing-toggle__save">Save 20%</span>
                </span>
            </div>
        </div>

        <div class="tf-pricing-grid">

            <!-- Plan Starter -->
            <div class="tf-pricing-card">
                <div class="tf-pricing-card__inner">
                    <div class="tf-pricing-card__header">
                        <span class="tf-pricing-plan-name">Starter</span>
                        <p class="tf-pricing-plan-desc">Perfect for MVPs and early-stage products.</p>
                    </div>
                    <div class="tf-pricing-card__price">
                        <span class="tf-price-currency">$</span>
                        <span class="tf-price-amount" data-monthly="4,500" data-annual="3,600">4,500</span>
                        <span class="tf-price-period">/project</span>
                    </div>
                    <ul class="tf-pricing-features">
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Up to 5 pages / screens
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Responsive design
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Basic CMS integration
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            2 revision rounds
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            30-day post-launch support
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--no">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            Custom integrations
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--no">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            Dedicated project manager
                        </li>
                    </ul>
                    <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--ghost tf-btn--full">
                        Get Started
                    </a>
                </div>
            </div>

            <!-- Plan Growth — FEATURED -->
            <div class="tf-pricing-card tf-pricing-card--featured">
                <div class="tf-pricing-card__badge">Most Popular</div>
                <div class="tf-pricing-card__inner">
                    <div class="tf-pricing-card__header">
                        <span class="tf-pricing-plan-name">Growth</span>
                        <p class="tf-pricing-plan-desc">For scaling startups and growing businesses.</p>
                    </div>
                    <div class="tf-pricing-card__price">
                        <span class="tf-price-currency">$</span>
                        <span class="tf-price-amount" data-monthly="12,000" data-annual="9,600">12,000</span>
                        <span class="tf-price-period">/project</span>
                    </div>
                    <ul class="tf-pricing-features">
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Up to 20 pages / screens
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Full UI/UX design system
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Custom API integrations
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Unlimited revision rounds
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            90-day post-launch support
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Dedicated project manager
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Analytics dashboard
                        </li>
                    </ul>
                    <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--primary tf-btn--full">
                        Get Started
                    </a>
                </div>
            </div>

            <!-- Plan Enterprise -->
            <div class="tf-pricing-card">
                <div class="tf-pricing-card__inner">
                    <div class="tf-pricing-card__header">
                        <span class="tf-pricing-plan-name">Enterprise</span>
                        <p class="tf-pricing-plan-desc">For complex products and long-term partnerships.</p>
                    </div>
                    <div class="tf-pricing-card__price">
                        <span class="tf-price-amount tf-price-amount--custom">Custom</span>
                    </div>
                    <ul class="tf-pricing-features">
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Unlimited scope
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Full product team on-demand
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            SLA guaranteed uptime
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Priority 24/7 support
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Security audits
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Custom contracts & NDA
                        </li>
                        <li class="tf-pricing-feature tf-pricing-feature--yes">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Dedicated infrastructure
                        </li>
                    </ul>
                    <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--ghost tf-btn--full">
                        Contact Sales
                    </a>
                </div>
            </div>

        </div><!-- .tf-pricing-grid -->

        <p class="tf-pricing-note">
            All prices in USD. Projects billed in milestones. 
            <a href="<?php echo home_url('/contact'); ?>">Need something custom?</a> Let's talk.
        </p>

    </div><!-- .tf-container -->
</section>

<!-- ============================================
     4. PROCESS MINI SECTION
     ============================================ -->
<section class="tf-services-process">
    <div class="tf-container">
        <div class="tf-section-header tf-section-header--center">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                How We Work
            </div>
            <h2 class="tf-section-title">
                A Process Built for
                <span class="tf-gradient-text">Clarity & Speed</span>
            </h2>
        </div>

        <div class="tf-services-process__grid">

            <div class="tf-process-mini-step">
                <div class="tf-process-mini-step__number">01</div>
                <div class="tf-process-mini-step__content">
                    <h3>Discovery Call</h3>
                    <p>30-minute call to understand your goals, constraints, and timeline. No sales pressure.</p>
                </div>
            </div>

            <div class="tf-process-mini-connector"></div>

            <div class="tf-process-mini-step">
                <div class="tf-process-mini-step__number">02</div>
                <div class="tf-process-mini-step__content">
                    <h3>Proposal & Scope</h3>
                    <p>Detailed proposal with timeline, deliverables, and fixed pricing. Delivered in 48 hours.</p>
                </div>
            </div>

            <div class="tf-process-mini-connector"></div>

            <div class="tf-process-mini-step">
                <div class="tf-process-mini-step__number">03</div>
                <div class="tf-process-mini-step__content">
                    <h3>Build & Iterate</h3>
                    <p>Weekly demos, async updates, and full transparency. You're always in the loop.</p>
                </div>
            </div>

            <div class="tf-process-mini-connector"></div>

            <div class="tf-process-mini-step">
                <div class="tf-process-mini-step__number">04</div>
                <div class="tf-process-mini-step__content">
                    <h3>Launch & Support</h3>
                    <p>Smooth deployment with post-launch monitoring and dedicated support period.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     5. FAQ SECTION
     ============================================ -->
<section class="tf-faq-section">
    <div class="tf-container">
        <div class="tf-faq-inner">

            <div class="tf-faq-header">
                <div class="tf-eyebrow">
                    <span class="tf-eyebrow__dot"></span>
                    FAQ
                </div>
                <h2 class="tf-section-title">
                    Questions We Get
                    <span class="tf-gradient-text">All the Time</span>
                </h2>
                <p class="tf-section-subtitle">
                    Can't find your answer? <a href="<?php echo home_url('/contact'); ?>">Ask us directly →</a>
                </p>
            </div>

            <div class="tf-faq-list" id="tf-faq-list">

                <div class="tf-faq-item" data-faq="0">
                    <button class="tf-faq-question" aria-expanded="false">
                        <span>How long does a typical project take?</span>
                        <span class="tf-faq-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </button>
                    <div class="tf-faq-answer">
                        <p>It depends on scope. A Starter project typically runs 4–6 weeks, Growth projects 8–14 weeks, and Enterprise engagements are ongoing. We'll give you an accurate timeline in your proposal.</p>
                    </div>
                </div>

                <div class="tf-faq-item" data-faq="1">
                    <button class="tf-faq-question" aria-expanded="false">
                        <span>Do you work with early-stage startups?</span>
                        <span class="tf-faq-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </button>
                    <div class="tf-faq-answer">
                        <p>Absolutely. Some of our favorite projects started as napkin sketches. We help early-stage founders move from idea to MVP fast, without overengineering the first version.</p>
                    </div>
                </div>

                <div class="tf-faq-item" data-faq="2">
                    <button class="tf-faq-question" aria-expanded="false">
                        <span>What's your payment structure?</span>
                        <span class="tf-faq-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </button>
                    <div class="tf-faq-answer">
                        <p>We bill in milestone-based installments — typically 40% upfront, 30% at mid-project review, and 30% on delivery. Enterprise clients have custom invoicing terms available.</p>
                    </div>
                </div>

                <div class="tf-faq-item" data-faq="3">
                    <button class="tf-faq-question" aria-expanded="false">
                        <span>Will I own the code and designs?</span>
                        <span class="tf-faq-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </button>
                    <div class="tf-faq-answer">
                        <p>100% yes. Full IP transfer is included in every project. You get the source code, design files, documentation, and all credentials. We don't hold anything hostage.</p>
                    </div>
                </div>

                <div class="tf-faq-item" data-faq="4">
                    <button class="tf-faq-question" aria-expanded="false">
                        <span>Do you offer ongoing maintenance?</span>
                        <span class="tf-faq-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </button>
                    <div class="tf-faq-answer">
                        <p>Yes. After the post-launch support period, we offer monthly retainer packages for ongoing development, bug fixes, and feature additions. Many clients transition to this model.</p>
                    </div>
                </div>

                <div class="tf-faq-item" data-faq="5">
                    <button class="tf-faq-question" aria-expanded="false">
                        <span>Can you work with our existing team?</span>
                        <span class="tf-faq-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </span>
                    </button>
                    <div class="tf-faq-answer">
                        <p>Definitely. We integrate seamlessly with in-house teams. We can embed as individual contributors, lead specific workstreams, or work as a fully separate pod with handoff documentation.</p>
                    </div>
                </div>

            </div><!-- .tf-faq-list -->
        </div><!-- .tf-faq-inner -->
    </div><!-- .tf-container -->
</section>

<!-- ============================================
     6. CTA STRIP
     ============================================ -->
<section class="tf-services-cta">
    <div class="tf-container">
        <div class="tf-services-cta__inner">
            <div class="tf-services-cta__bg">
                <div class="tf-orb tf-orb--violet" style="top:50%;left:20%;transform:translate(-50%,-50%);width:400px;height:400px;opacity:0.2;"></div>
                <div class="tf-orb tf-orb--cyan"   style="top:50%;right:10%;transform:translateY(-50%);width:300px;height:300px;opacity:0.15;"></div>
            </div>
            <div class="tf-services-cta__content">
                <h2 class="tf-services-cta__title">
                    Ready to Build Something
                    <span class="tf-gradient-text">Remarkable?</span>
                </h2>
                <p class="tf-services-cta__desc">
                    Let's talk about your project. First call is free, no strings attached.
                </p>
                <div class="tf-services-cta__actions">
                    <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
                        Book a Free Call
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.42 2 2 0 0 1 3.58 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.54a16 16 0 0 0 6 6l.92-.92a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16v.92z"/>
                        </svg>
                    </a>
                    <a href="<?php echo home_url('/work'); ?>" class="tf-btn tf-btn--ghost tf-btn--lg">
                        View Our Work
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     PAGE SCRIPTS — Pricing Toggle + FAQ
     ============================================ -->
<script>
(function() {
    'use strict';

    /* ---- PRICING TOGGLE ---- */
    const toggleBtn    = document.getElementById('tf-toggle-btn');
    const labelMonthly = document.getElementById('tf-toggle-monthly');
    const labelAnnual  = document.getElementById('tf-toggle-annual');
    const priceAmounts = document.querySelectorAll('.tf-price-amount[data-monthly]');
    let   isAnnual     = false;

    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            isAnnual = !isAnnual;
            toggleBtn.classList.toggle('tf-pricing-toggle__btn--active', isAnnual);
            labelMonthly.classList.toggle('tf-pricing-toggle__label--active', !isAnnual);
            labelAnnual.classList.toggle('tf-pricing-toggle__label--active',  isAnnual);

            priceAmounts.forEach(function(el) {
                el.textContent = isAnnual
                    ? el.dataset.annual
                    : el.dataset.monthly;
            });
        });
    }

    /* ---- FAQ ACCORDION ---- */
    const faqItems = document.querySelectorAll('.tf-faq-item');

    faqItems.forEach(function(item) {
        const btn    = item.querySelector('.tf-faq-question');
        const answer = item.querySelector('.tf-faq-answer');

        if (!btn || !answer) return;

        btn.addEventListener('click', function() {
            const isOpen = item.classList.contains('tf-faq-item--open');

            // Cerrar todos
            faqItems.forEach(function(i) {
                i.classList.remove('tf-faq-item--open');
                i.querySelector('.tf-faq-question').setAttribute('aria-expanded', 'false');
                i.querySelector('.tf-faq-answer').style.maxHeight = '0';
            });

            // Abrir el clickeado si estaba cerrado
            if (!isOpen) {
                item.classList.add('tf-faq-item--open');
                btn.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

})();
</script>

<?php get_footer(); ?>