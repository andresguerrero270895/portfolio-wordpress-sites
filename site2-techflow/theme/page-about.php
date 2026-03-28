<?php
/**
 * Template Name: About Page
 * TechFlow Agency — About
 */
get_header(); ?>

<!-- ============================================
     1. HERO
     ============================================ -->
<section class="tf-about-hero">
    <div class="tf-about-hero__bg">
        <div class="tf-orb tf-orb--violet" style="top:-10%;left:60%;width:600px;height:600px;opacity:0.2;"></div>
        <div class="tf-orb tf-orb--cyan"   style="bottom:0;left:-5%;width:400px;height:400px;opacity:0.1;"></div>
        <div class="tf-grid-lines"></div>
    </div>
    <div class="tf-container">
        <nav class="tf-breadcrumb">
            <a href="<?php echo home_url('/'); ?>">Home</a>
            <span class="tf-breadcrumb__sep">→</span>
            <span class="tf-breadcrumb__current">About</span>
        </nav>
        <div class="tf-about-hero__content">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                Who We Are
            </div>
            <h1 class="tf-about-hero__title">
                We Build Digital Products
                <span class="tf-gradient-text">That Matter</span>
            </h1>
            <p class="tf-about-hero__subtitle">
                TechFlow is a team of engineers, designers, and strategists obsessed with 
                crafting high-performance digital products. We partner with startups and 
                enterprises to turn complex problems into elegant solutions.
            </p>
            <div class="tf-about-hero__actions">
                <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
                    Work With Us
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="<?php echo home_url('/work'); ?>" class="tf-btn tf-btn--ghost tf-btn--lg">
                    See Our Work
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     2. STATS STRIP
     ============================================ -->
<section class="tf-about-stats">
    <div class="tf-container">
        <div class="tf-about-stats__grid">
            <div class="tf-about-stat">
                <span class="tf-about-stat__number">5+</span>
                <span class="tf-about-stat__label">Years in Business</span>
            </div>
            <div class="tf-about-stat">
                <span class="tf-about-stat__number">40+</span>
                <span class="tf-about-stat__label">Projects Delivered</span>
            </div>
            <div class="tf-about-stat">
                <span class="tf-about-stat__number">18</span>
                <span class="tf-about-stat__label">Team Members</span>
            </div>
            <div class="tf-about-stat">
                <span class="tf-about-stat__number">12</span>
                <span class="tf-about-stat__label">Countries Served</span>
            </div>
            <div class="tf-about-stat">
                <span class="tf-about-stat__number">98%</span>
                <span class="tf-about-stat__label">Client Satisfaction</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     3. STORY SECTION
     ============================================ -->
<section class="tf-about-story">
    <div class="tf-container">
        <div class="tf-about-story__inner">
            <div class="tf-about-story__content">
                <div class="tf-eyebrow">
                    <span class="tf-eyebrow__dot"></span>
                    Our Story
                </div>
                <h2 class="tf-section-title">
                    Built by Builders,
                    <span class="tf-gradient-text">For Builders</span>
                </h2>
                <p>
                    TechFlow started in 2019 when three engineers got tired of watching 
                    great ideas die because of bad execution. We knew there had to be a 
                    better way to build software — faster, cleaner, and with less pain.
                </p>
                <p>
                    We started small, taking on freelance projects and proving our process. 
                    Within two years, we had a team of 10 and clients across three continents. 
                    Today, we're 18 people strong — and still growing.
                </p>
                <p>
                    Our north star has never changed: ship products that work, on time, 
                    without the drama. We're not the cheapest option, but we are the most 
                    reliable one.
                </p>
                <div class="tf-about-story__values">
                    <div class="tf-value-pill">
                        <span>🎯</span> Execution-first
                    </div>
                    <div class="tf-value-pill">
                        <span>🔍</span> Transparent
                    </div>
                    <div class="tf-value-pill">
                        <span>⚡</span> Fast & reliable
                    </div>
                    <div class="tf-value-pill">
                        <span>🤝</span> Long-term partners
                    </div>
                </div>
            </div>
            <div class="tf-about-story__visual">
                <div class="tf-about-card-stack">
                    <div class="tf-about-card tf-about-card--1">
                        <div class="tf-about-card__icon">🚀</div>
                        <div class="tf-about-card__text">
                            <strong>Founded 2019</strong>
                            <span>San Francisco, CA</span>
                        </div>
                    </div>
                    <div class="tf-about-card tf-about-card--2">
                        <div class="tf-about-card__icon">💡</div>
                        <div class="tf-about-card__text">
                            <strong>40+ Products Shipped</strong>
                            <span>Across 12 industries</span>
                        </div>
                    </div>
                    <div class="tf-about-card tf-about-card--3">
                        <div class="tf-about-card__icon">🏆</div>
                        <div class="tf-about-card__text">
                            <strong>Top Agency 2024</strong>
                            <span>Clutch & G2 Certified</span>
                        </div>
                    </div>
                    <div class="tf-about-card tf-about-card--4">
                        <div class="tf-about-card__icon">⭐</div>
                        <div class="tf-about-card__text">
                            <strong>4.9/5 Rating</strong>
                            <span>From 60+ reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     4. VALUES SECTION
     ============================================ -->
<section class="tf-values-section">
    <div class="tf-container">
        <div class="tf-section-header tf-section-header--center">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                What Drives Us
            </div>
            <h2 class="tf-section-title">
                Our Core
                <span class="tf-gradient-text">Values</span>
            </h2>
        </div>
        <div class="tf-values-grid">

            <div class="tf-value-card">
                <div class="tf-value-card__icon tf-service-icon--violet">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                    </svg>
                </div>
                <h3>Speed Without Shortcuts</h3>
                <p>We move fast because we've built the systems to do so — not because we cut corners. Quality is non-negotiable.</p>
            </div>

            <div class="tf-value-card">
                <div class="tf-value-card__icon tf-service-icon--cyan">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>
                <h3>Radical Transparency</h3>
                <p>No smoke and mirrors. You'll always know where your project stands — the good, the bad, and the blockers.</p>
            </div>

            <div class="tf-value-card">
                <div class="tf-value-card__icon tf-service-icon--amber">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>Client Partnership</h3>
                <p>We don't just deliver and disappear. We invest in understanding your business and become a long-term extension of your team.</p>
            </div>

            <div class="tf-value-card">
                <div class="tf-value-card__icon tf-service-icon--green">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <h3>Ownership Mentality</h3>
                <p>Every team member treats your project like it's their own startup. We care about outcomes, not just outputs.</p>
            </div>

            <div class="tf-value-card">
                <div class="tf-value-card__icon tf-service-icon--violet">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                </div>
                <h3>Excellence as Default</h3>
                <p>We don't aim for "good enough." Every pixel, every line of code, every interaction is crafted with intent and care.</p>
            </div>

            <div class="tf-value-card">
                <div class="tf-value-card__icon tf-service-icon--cyan">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3>Security & Trust</h3>
                <p>Your data, your IP, your business logic — we treat them with the highest level of security and confidentiality.</p>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     5. TEAM SECTION
     ============================================ -->
<section class="tf-team-section">
    <div class="tf-container">
        <div class="tf-section-header tf-section-header--center">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                The Team
            </div>
            <h2 class="tf-section-title">
                The People Behind
                <span class="tf-gradient-text">Your Product</span>
            </h2>
            <p class="tf-section-subtitle">
                Senior engineers, award-winning designers, and battle-tested product managers.
            </p>
        </div>

        <div class="tf-team-grid">
            <?php
            $team = techflow_get_team(8);
            if ( $team->have_posts() ) :
                while ( $team->have_posts() ) : $team->the_post();
                    $role    = get_post_meta( get_the_ID(), '_tf_team_role', true );
                    $twitter = get_post_meta( get_the_ID(), '_tf_team_twitter', true );
                    $github  = get_post_meta( get_the_ID(), '_tf_team_github', true );
                    $linkedin= get_post_meta( get_the_ID(), '_tf_team_linkedin', true );
                    ?>
                    <div class="tf-team-card">
                        <div class="tf-team-card__avatar">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'tf-team-card__img']); ?>
                            <?php else : ?>
                                <div class="tf-team-card__placeholder">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tf-team-card__content">
                            <h3 class="tf-team-card__name"><?php the_title(); ?></h3>
                            <span class="tf-team-card__role"><?php echo esc_html($role); ?></span>
                            <div class="tf-team-card__social">
                                <?php if ($twitter) : ?>
                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" class="tf-social-link" aria-label="Twitter">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ($github) : ?>
                                    <a href="<?php echo esc_url($github); ?>" target="_blank" class="tf-social-link" aria-label="GitHub">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" class="tf-social-link" aria-label="LinkedIn">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Fallback team
                $fallback_team = [
                    ['name' => 'Alex Rivera',    'role' => 'CEO & Co-Founder',      'emoji' => '👨‍💻'],
                    ['name' => 'Sarah Chen',     'role' => 'CTO & Co-Founder',      'emoji' => '👩‍💻'],
                    ['name' => 'Marcus Johnson', 'role' => 'Lead Designer',         'emoji' => '🎨'],
                    ['name' => 'Priya Patel',    'role' => 'Senior Engineer',       'emoji' => '⚡'],
                    ['name' => 'Tom Williams',   'role' => 'DevOps Lead',           'emoji' => '☁️'],
                    ['name' => 'Luna García',    'role' => 'Product Manager',       'emoji' => '🚀'],
                    ['name' => 'James Park',     'role' => 'Mobile Developer',      'emoji' => '📱'],
                    ['name' => 'Emma Wilson',    'role' => 'UI/UX Designer',        'emoji' => '✨'],
                ];
                foreach ( $fallback_team as $member ) : ?>
                    <div class="tf-team-card">
                        <div class="tf-team-card__avatar">
                            <div class="tf-team-card__placeholder">
                                <span style="font-size:2rem;"><?php echo $member['emoji']; ?></span>
                            </div>
                        </div>
                        <div class="tf-team-card__content">
                            <h3 class="tf-team-card__name"><?php echo esc_html($member['name']); ?></h3>
                            <span class="tf-team-card__role"><?php echo esc_html($member['role']); ?></span>
                            <div class="tf-team-card__social">
                                <a href="#" class="tf-social-link">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- ============================================
     6. CTA
     ============================================ -->
<section class="tf-about-cta">
    <div class="tf-container">
        <div class="tf-services-cta__inner">
            <div class="tf-services-cta__bg">
                <div class="tf-orb tf-orb--violet" style="top:50%;left:20%;transform:translate(-50%,-50%);width:400px;height:400px;opacity:0.2;"></div>
            </div>
            <div class="tf-services-cta__content">
                <h2 class="tf-services-cta__title">
                    Let's Build Something
                    <span class="tf-gradient-text">Together</span>
                </h2>
                <p class="tf-services-cta__desc">
                    We're always looking for great clients and great talent.
                </p>
                <div class="tf-services-cta__actions">
                    <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
                        Start a Project
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="mailto:hello@techflow.dev" class="tf-btn tf-btn--ghost tf-btn--lg">
                        Join Our Team
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>