<?php
/**
 * Template Name: Work Page
 * TechFlow Agency — Portfolio
 */
get_header(); ?>

<!-- ============================================
     1. HERO
     ============================================ -->
<section class="tf-work-hero">
    <div class="tf-work-hero__bg">
        <div class="tf-orb tf-orb--violet" style="top:-10%;right:10%;width:600px;height:600px;opacity:0.2;"></div>
        <div class="tf-orb tf-orb--cyan"   style="bottom:0;left:-5%;width:400px;height:400px;opacity:0.1;"></div>
        <div class="tf-grid-lines"></div>
    </div>

    <div class="tf-container">
        <nav class="tf-breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo home_url('/'); ?>">Home</a>
            <span class="tf-breadcrumb__sep">→</span>
            <span class="tf-breadcrumb__current">Work</span>
        </nav>

        <div class="tf-work-hero__content">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                Our Portfolio
            </div>
            <h1 class="tf-work-hero__title">
                Products We've
                <span class="tf-gradient-text">Shipped</span>
            </h1>
            <p class="tf-work-hero__subtitle">
                Real projects. Real results. From early-stage MVPs to enterprise platforms —
                here's what we've built with our clients.
            </p>
        </div>

        <div class="tf-work-hero__stats">
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">40+</span>
                <span class="tf-stat-pill__label">Projects Delivered</span>
            </div>
            <div class="tf-stat-pill__divider"></div>
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">12</span>
                <span class="tf-stat-pill__label">Industries</span>
            </div>
            <div class="tf-stat-pill__divider"></div>
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">98%</span>
                <span class="tf-stat-pill__label">On-time Delivery</span>
            </div>
            <div class="tf-stat-pill__divider"></div>
            <div class="tf-stat-pill">
                <span class="tf-stat-pill__number">\$2M+</span>
                <span class="tf-stat-pill__label">Revenue Generated</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     2. PORTFOLIO GRID
     ============================================ -->
<section class="tf-portfolio-section" id="tf-portfolio">
    <div class="tf-container">

        <!-- Filter Bar -->
        <div class="tf-portfolio-filters" id="tf-portfolio-filters">
            <button class="tf-filter-btn tf-filter-btn--active" data-filter="all">
                All Projects
            </button>
            <?php
            $categories = get_terms([
                'taxonomy'   => 'tf_category',
                'hide_empty' => false,
            ]);
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
                foreach ( $categories as $cat ) : ?>
                    <button class="tf-filter-btn" data-filter="<?php echo esc_attr( $cat->slug ); ?>">
                        <?php echo esc_html( $cat->name ); ?>
                    </button>
                <?php endforeach;
            else :
                $fallback_filters = ['Web App', 'Mobile', 'E-Commerce', 'AI / ML', 'Design'];
                foreach ( $fallback_filters as $filter ) : ?>
                    <button class="tf-filter-btn" data-filter="<?php echo esc_attr( sanitize_title($filter) ); ?>">
                        <?php echo esc_html( $filter ); ?>
                    </button>
                <?php endforeach;
            endif; ?>
        </div>

        <!-- Projects Grid -->
        <div class="tf-portfolio-grid" id="tf-portfolio-grid">
            <?php
            $projects = new WP_Query([
                'post_type'      => 'tf_project',
                'posts_per_page' => 12,
                'post_status'    => 'publish',
            ]);

            if ( $projects->have_posts() ) :
                while ( $projects->have_posts() ) : $projects->the_post();
                    $categories = get_the_terms( get_the_ID(), 'tf_category' );
                    $techs      = get_the_terms( get_the_ID(), 'tf_tech' );
                    $cat_slugs  = $categories ? implode(' ', wp_list_pluck($categories, 'slug')) : '';
                    $cat_name   = $categories ? $categories[0]->name : 'Project';
                    $url        = get_post_meta( get_the_ID(), '_tf_project_url', true );
                    $stack      = get_post_meta( get_the_ID(), '_tf_stack', true );
                    $result     = get_post_meta( get_the_ID(), '_tf_result', true );
                    ?>
                    <article class="tf-portfolio-card" data-category="<?php echo esc_attr($cat_slugs); ?>">
                        <div class="tf-portfolio-card__thumb">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('large', ['class' => 'tf-portfolio-card__img']); ?>
                            <?php else : ?>
                                <div class="tf-portfolio-card__placeholder">
                                    <div class="tf-placeholder-grid">
                                        <div class="tf-placeholder-bar tf-placeholder-bar--wide"></div>
                                        <div class="tf-placeholder-bar tf-placeholder-bar--medium"></div>
                                        <div class="tf-placeholder-row">
                                            <div class="tf-placeholder-block"></div>
                                            <div class="tf-placeholder-block"></div>
                                            <div class="tf-placeholder-block"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="tf-portfolio-card__overlay">
                                <div class="tf-portfolio-card__overlay-actions">
                                    <?php if ( $url ) : ?>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank" class="tf-overlay-btn">
                                            Live Site
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo get_permalink(); ?>" class="tf-overlay-btn tf-overlay-btn--primary">
                                        Case Study
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tf-portfolio-card__content">
                            <div class="tf-portfolio-card__meta">
                                <span class="tf-portfolio-card__category"><?php echo esc_html($cat_name); ?></span>
                                <?php if ( $result ) : ?>
                                    <span class="tf-portfolio-card__result">
                                        <span class="tf-result-dot"></span>
                                        <?php echo esc_html($result); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <h3 class="tf-portfolio-card__title">
                                <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="tf-portfolio-card__excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
                            </p>
                            <?php if ( $techs && ! is_wp_error($techs) ) : ?>
                                <div class="tf-portfolio-card__stack">
                                    <?php foreach ( array_slice($techs, 0, 4) as $tech ) : ?>
                                        <span class="tf-tech-pill"><?php echo esc_html($tech->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php elseif ( $stack ) : ?>
                                <div class="tf-portfolio-card__stack">
                                    <?php echo techflow_stack_pills($stack); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();

            else :
                $placeholder_projects = [
                    [
                        'title'    => 'FinTrack Dashboard',
                        'category' => 'Web App',
                        'cat_slug' => 'web-app',
                        'excerpt'  => 'Real-time financial analytics platform with AI-powered insights and automated reporting for enterprise clients.',
                        'stack'    => 'React, Node.js, PostgreSQL, AWS',
                        'result'   => '3x faster reporting',
                        'color'    => '#7C3AED',
                    ],
                    [
                        'title'    => 'ShopNow Mobile',
                        'category' => 'Mobile',
                        'cat_slug' => 'mobile',
                        'excerpt'  => 'Cross-platform e-commerce app with AR product preview, one-tap checkout, and real-time inventory sync.',
                        'stack'    => 'React Native, Firebase, Stripe',
                        'result'   => '4.8★ App Store',
                        'color'    => '#06B6D4',
                    ],
                    [
                        'title'    => 'MediSync Platform',
                        'category' => 'Web App',
                        'cat_slug' => 'web-app',
                        'excerpt'  => 'HIPAA-compliant telemedicine platform connecting 500+ doctors with patients across 12 states.',
                        'stack'    => 'Next.js, Python, WebRTC, Azure',
                        'result'   => '500+ doctors onboarded',
                        'color'    => '#10B981',
                    ],
                    [
                        'title'    => 'LuxeStore',
                        'category' => 'E-Commerce',
                        'cat_slug' => 'e-commerce',
                        'excerpt'  => 'Premium fashion marketplace with AI-powered size recommendations and seamless multi-vendor management.',
                        'stack'    => 'Shopify, React, Node.js',
                        'result'   => '\$1.2M first-year revenue',
                        'color'    => '#F59E0B',
                    ],
                    [
                        'title'    => 'ChatGenius AI',
                        'category' => 'AI / ML',
                        'cat_slug' => 'ai-ml',
                        'excerpt'  => 'Custom LLM-powered customer support system with RAG pipeline and seamless CRM integration.',
                        'stack'    => 'Python, OpenAI, Pinecone, FastAPI',
                        'result'   => '80% ticket deflection',
                        'color'    => '#7C3AED',
                    ],
                    [
                        'title'    => 'BuildFlow SaaS',
                        'category' => 'Web App',
                        'cat_slug' => 'web-app',
                        'excerpt'  => 'Construction project management SaaS with real-time collaboration, Gantt charts, and budget tracking.',
                        'stack'    => 'Vue.js, Laravel, MySQL, Docker',
                        'result'   => '200+ active teams',
                        'color'    => '#06B6D4',
                    ],
                    [
                        'title'    => 'FoodDash App',
                        'category' => 'Mobile',
                        'cat_slug' => 'mobile',
                        'excerpt'  => 'On-demand food delivery app with live GPS tracking, smart routing, and restaurant analytics dashboard.',
                        'stack'    => 'Flutter, Node.js, MongoDB, Maps API',
                        'result'   => '50K+ downloads',
                        'color'    => '#10B981',
                    ],
                    [
                        'title'    => 'DataPulse Analytics',
                        'category' => 'AI / ML',
                        'cat_slug' => 'ai-ml',
                        'excerpt'  => 'Predictive analytics platform that processes 10M+ events/day with real-time ML model serving.',
                        'stack'    => 'Python, TensorFlow, Kafka, GCP',
                        'result'   => '95% prediction accuracy',
                        'color'    => '#F59E0B',
                    ],
                    [
                        'title'    => 'StyleBox E-Com',
                        'category' => 'E-Commerce',
                        'cat_slug' => 'e-commerce',
                        'excerpt'  => 'Subscription box e-commerce with personalization engine, quiz flow, and automated fulfillment.',
                        'stack'    => 'WooCommerce, React, Node.js',
                        'result'   => '35% lower churn',
                        'color'    => '#7C3AED',
                    ],
                ];

                foreach ( $placeholder_projects as $project ) :
                    $stacks = explode(', ', $project['stack']); ?>
                    <article class="tf-portfolio-card" data-category="<?php echo esc_attr($project['cat_slug']); ?>">
                        <div class="tf-portfolio-card__thumb">
                            <div class="tf-portfolio-card__placeholder" style="--accent:<?php echo esc_attr($project['color']); ?>">
                                <div class="tf-placeholder-grid">
                                    <div class="tf-placeholder-bar tf-placeholder-bar--wide"></div>
                                    <div class="tf-placeholder-bar tf-placeholder-bar--medium"></div>
                                    <div class="tf-placeholder-row">
                                        <div class="tf-placeholder-block"></div>
                                        <div class="tf-placeholder-block"></div>
                                        <div class="tf-placeholder-block"></div>
                                    </div>
                                    <div class="tf-placeholder-chart">
                                        <div class="tf-chart-bar" style="height:40%"></div>
                                        <div class="tf-chart-bar" style="height:70%"></div>
                                        <div class="tf-chart-bar" style="height:55%"></div>
                                        <div class="tf-chart-bar" style="height:90%"></div>
                                        <div class="tf-chart-bar" style="height:65%"></div>
                                        <div class="tf-chart-bar" style="height:80%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-portfolio-card__overlay">
                                <div class="tf-portfolio-card__overlay-actions">
                                    <a href="#" class="tf-overlay-btn tf-overlay-btn--primary">
                                        Case Study
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tf-portfolio-card__content">
                            <div class="tf-portfolio-card__meta">
                                <span class="tf-portfolio-card__category"><?php echo esc_html($project['category']); ?></span>
                                <span class="tf-portfolio-card__result">
                                    <span class="tf-result-dot"></span>
                                    <?php echo esc_html($project['result']); ?>
                                </span>
                            </div>
                            <h3 class="tf-portfolio-card__title">
                                <a href="#"><?php echo esc_html($project['title']); ?></a>
                            </h3>
                            <p class="tf-portfolio-card__excerpt"><?php echo esc_html($project['excerpt']); ?></p>
                            <div class="tf-portfolio-card__stack">
                                <?php foreach ( array_slice($stacks, 0, 4) as $tech ) : ?>
                                    <span class="tf-tech-pill"><?php echo esc_html(trim($tech)); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach;
            endif; ?>

        </div><!-- .tf-portfolio-grid -->

        <div class="tf-portfolio-empty" id="tf-portfolio-empty" style="display:none;">
            <div class="tf-portfolio-empty__icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </div>
            <h3>No projects found</h3>
            <p>Try a different filter category.</p>
            <button class="tf-btn tf-btn--ghost" id="tf-reset-filter">Show All Projects</button>
        </div>

    </div><!-- .tf-container -->
</section>

<!-- ============================================
     3. CTA STRIP
     ============================================ -->
<section class="tf-work-cta">
    <div class="tf-container">
        <div class="tf-work-cta__inner">
            <div class="tf-work-cta__content">
                <h2 class="tf-work-cta__title">
                    Want to Be Our
                    <span class="tf-gradient-text">Next Success Story?</span>
                </h2>
                <p class="tf-work-cta__desc">
                    Let's build something remarkable together.
                </p>
            </div>
            <div class="tf-work-cta__actions">
                <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
                    Start a Project
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="<?php echo home_url('/services'); ?>" class="tf-btn tf-btn--ghost tf-btn--lg">
                    Our Services
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FILTER SCRIPT -->
<script>
(function() {
    'use strict';
    const filterBtns = document.querySelectorAll('.tf-filter-btn');
    const cards      = document.querySelectorAll('.tf-portfolio-card');
    const emptyState = document.getElementById('tf-portfolio-empty');
    const resetBtn   = document.getElementById('tf-reset-filter');

    function filterProjects(filter) {
        let visibleCount = 0;
        cards.forEach(function(card) {
            const cats   = card.dataset.category || '';
            const matches = filter === 'all' || cats.includes(filter);
            card.style.display = matches ? '' : 'none';
            if (matches) visibleCount++;
        });
        if (emptyState) {
            emptyState.style.display = visibleCount === 0 ? 'flex' : 'none';
        }
        filterBtns.forEach(function(btn) {
            btn.classList.toggle('tf-filter-btn--active', btn.dataset.filter === filter);
        });
    }

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            filterProjects(this.dataset.filter);
        });
    });

    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            filterProjects('all');
        });
    }
})();
</script>

<?php get_footer(); ?>