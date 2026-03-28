<?php
/**
 * Single Project — Case Study
 * TechFlow Agency
 */
get_header();

$project_url  = get_post_meta( get_the_ID(), '_tf_project_url',  true );
$github_url   = get_post_meta( get_the_ID(), '_tf_github_url',   true );
$stack        = get_post_meta( get_the_ID(), '_tf_stack',        true );
$result       = get_post_meta( get_the_ID(), '_tf_result',       true );
$duration     = get_post_meta( get_the_ID(), '_tf_duration',     true );
$client       = get_post_meta( get_the_ID(), '_tf_client',       true );
$year         = get_post_meta( get_the_ID(), '_tf_year',         true );

$categories   = get_the_terms( get_the_ID(), 'tf_category' );
$techs        = get_the_terms( get_the_ID(), 'tf_tech' );
$cat_name     = $categories && ! is_wp_error($categories) ? $categories[0]->name : 'Project';
?>

<!-- ============================================
     HERO
     ============================================ -->
<section class="tf-case-hero">
    <div class="tf-case-hero__bg">
        <div class="tf-orb tf-orb--violet" style="top:-10%;right:10%;width:600px;height:600px;opacity:0.2;"></div>
        <div class="tf-grid-lines"></div>
    </div>
    <div class="tf-container">
        <nav class="tf-breadcrumb">
            <a href="<?php echo home_url('/'); ?>">Home</a>
            <span class="tf-breadcrumb__sep">→</span>
            <a href="<?php echo home_url('/work'); ?>">Work</a>
            <span class="tf-breadcrumb__sep">→</span>
            <span class="tf-breadcrumb__current"><?php the_title(); ?></span>
        </nav>

        <div class="tf-case-hero__inner">
            <div class="tf-case-hero__content">
                <div class="tf-eyebrow">
                    <span class="tf-eyebrow__dot"></span>
                    <?php echo esc_html($cat_name); ?>
                </div>
                <h1 class="tf-case-hero__title"><?php the_title(); ?></h1>
                <p class="tf-case-hero__excerpt">
                    <?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?>
                </p>

                <!-- Actions -->
                <div class="tf-case-hero__actions">
                    <?php if ( $project_url ) : ?>
                        <a href="<?php echo esc_url($project_url); ?>" target="_blank" rel="noopener" class="tf-btn tf-btn--primary tf-btn--lg">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                <polyline points="15 3 21 3 21 9"/>
                                <line x1="10" y1="14" x2="21" y2="3"/>
                            </svg>
                            View Live Site
                        </a>
                    <?php endif; ?>
                    <?php if ( $github_url ) : ?>
                        <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener" class="tf-btn tf-btn--ghost tf-btn--lg">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0 1 12 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/>
                            </svg>
                            View Code
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Project Meta Card -->
            <div class="tf-case-meta-card">
                <?php if ( $client ) : ?>
                    <div class="tf-case-meta-item">
                        <span class="tf-case-meta-item__label">Client</span>
                        <span class="tf-case-meta-item__value"><?php echo esc_html($client); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ( $cat_name ) : ?>
                    <div class="tf-case-meta-item">
                        <span class="tf-case-meta-item__label">Category</span>
                        <span class="tf-case-meta-item__value"><?php echo esc_html($cat_name); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ( $duration ) : ?>
                    <div class="tf-case-meta-item">
                        <span class="tf-case-meta-item__label">Duration</span>
                        <span class="tf-case-meta-item__value"><?php echo esc_html($duration); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ( $year ) : ?>
                    <div class="tf-case-meta-item">
                        <span class="tf-case-meta-item__label">Year</span>
                        <span class="tf-case-meta-item__value"><?php echo esc_html($year); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ( $result ) : ?>
                    <div class="tf-case-meta-item tf-case-meta-item--result">
                        <span class="tf-case-meta-item__label">Key Result</span>
                        <span class="tf-case-meta-item__value tf-case-result">
                            <span class="tf-result-dot"></span>
                            <?php echo esc_html($result); ?>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if ( $techs && ! is_wp_error($techs) ) : ?>
                    <div class="tf-case-meta-item">
                        <span class="tf-case-meta-item__label">Tech Stack</span>
                        <div class="tf-case-stack">
                            <?php foreach ( $techs as $tech ) : ?>
                                <span class="tf-tech-pill"><?php echo esc_html($tech->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php elseif ( $stack ) : ?>
                    <div class="tf-case-meta-item">
                        <span class="tf-case-meta-item__label">Tech Stack</span>
                        <div class="tf-case-stack">
                            <?php echo techflow_stack_pills($stack); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     FEATURED IMAGE
     ============================================ -->
<?php if ( has_post_thumbnail() ) : ?>
    <div class="tf-case-cover">
        <div class="tf-container">
            <?php the_post_thumbnail('full', ['class' => 'tf-case-cover__img']); ?>
        </div>
    </div>
<?php endif; ?>

<!-- ============================================
     CONTENT
     ============================================ -->
<section class="tf-case-content-section">
    <div class="tf-container">
        <div class="tf-case-content-layout">

            <!-- Main Content -->
            <div class="tf-case-content">
                <div class="tf-case-body">
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- Sticky Sidebar -->
            <aside class="tf-case-sidebar">
                <div class="tf-case-sidebar__inner">
                    <h3>Project Summary</h3>

                    <?php if ( $result ) : ?>
                        <div class="tf-case-sidebar-stat">
                            <span class="tf-case-sidebar-stat__value"><?php echo esc_html($result); ?></span>
                            <span class="tf-case-sidebar-stat__label">Key Result</span>
                        </div>
                    <?php endif; ?>

                    <?php if ( $client ) : ?>
                        <div class="tf-case-sidebar-row">
                            <span class="tf-case-sidebar-row__label">Client</span>
                            <span class="tf-case-sidebar-row__value"><?php echo esc_html($client); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ( $duration ) : ?>
                        <div class="tf-case-sidebar-row">
                            <span class="tf-case-sidebar-row__label">Duration</span>
                            <span class="tf-case-sidebar-row__value"><?php echo esc_html($duration); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ( $year ) : ?>
                        <div class="tf-case-sidebar-row">
                            <span class="tf-case-sidebar-row__label">Year</span>
                            <span class="tf-case-sidebar-row__value"><?php echo esc_html($year); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="tf-case-sidebar-actions">
                        <?php if ( $project_url ) : ?>
                            <a href="<?php echo esc_url($project_url); ?>" target="_blank" class="tf-btn tf-btn--primary tf-btn--full">
                                View Live Site ↗
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--ghost tf-btn--full">
                            Start Similar Project
                        </a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>

<!-- ============================================
     NEXT/PREV PROJECTS
     ============================================ -->
<section class="tf-case-nav">
    <div class="tf-container">
        <div class="tf-case-nav__inner">
            <?php
            $prev = get_previous_post();
            $next = get_next_post();
            ?>
            <?php if ( $prev ) : ?>
                <a href="<?php echo get_permalink($prev->ID); ?>" class="tf-case-nav-link tf-case-nav-link--prev">
                    <span class="tf-case-nav-link__dir">← Previous Project</span>
                    <span class="tf-case-nav-link__title"><?php echo esc_html($prev->post_title); ?></span>
                </a>
            <?php else : ?>
                <div></div>
            <?php endif; ?>

            <a href="<?php echo home_url('/work'); ?>" class="tf-case-nav-all">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                    <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                </svg>
                All Projects
            </a>

            <?php if ( $next ) : ?>
                <a href="<?php echo get_permalink($next->ID); ?>" class="tf-case-nav-link tf-case-nav-link--next">
                    <span class="tf-case-nav-link__dir">Next Project →</span>
                    <span class="tf-case-nav-link__title"><?php echo esc_html($next->post_title); ?></span>
                </a>
            <?php else : ?>
                <div></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="tf-about-cta">
    <div class="tf-container">
        <div class="tf-services-cta__inner">
            <div class="tf-services-cta__bg">
                <div class="tf-orb tf-orb--violet" style="top:50%;left:20%;transform:translate(-50%,-50%);width:400px;height:400px;opacity:0.2;"></div>
            </div>
            <div class="tf-services-cta__content">
                <h2 class="tf-services-cta__title">
                    Like What You See?
                    <span class="tf-gradient-text">Let's Build Yours</span>
                </h2>
                <p class="tf-services-cta__desc">
                    Tell us about your project and we'll get back to you in 24 hours.
                </p>
                <div class="tf-services-cta__actions">
                    <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
                        Start a Project
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="<?php echo home_url('/work'); ?>" class="tf-btn tf-btn--ghost tf-btn--lg">
                        More Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>