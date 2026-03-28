<?php
/**
 * Blog Index Template
 * TechFlow Agency — Blog
 */
get_header(); ?>

<!-- ============================================
     1. HERO
     ============================================ -->
<section class="tf-blog-hero">
    <div class="tf-blog-hero__bg">
        <div class="tf-orb tf-orb--violet" style="top:-10%;right:10%;width:600px;height:600px;opacity:0.2;"></div>
        <div class="tf-orb tf-orb--cyan"   style="bottom:0;left:-5%;width:400px;height:400px;opacity:0.1;"></div>
        <div class="tf-grid-lines"></div>
    </div>
    <div class="tf-container">
        <nav class="tf-breadcrumb">
            <a href="<?php echo home_url('/'); ?>">Home</a>
            <span class="tf-breadcrumb__sep">→</span>
            <span class="tf-breadcrumb__current">Blog</span>
        </nav>
        <div class="tf-blog-hero__content">
            <div class="tf-eyebrow">
                <span class="tf-eyebrow__dot"></span>
                Our Blog
            </div>
            <h1 class="tf-blog-hero__title">
                Insights, Tutorials &
                <span class="tf-gradient-text">Tech Deep-Dives</span>
            </h1>
            <p class="tf-blog-hero__subtitle">
                We write about web development, design systems, DevOps, 
                AI integrations, and everything in between. 
                No fluff — just actionable insights from our team.
            </p>
        </div>
    </div>
</section>

<!-- ============================================
     2. BLOG GRID
     ============================================ -->
<section class="tf-blog-section">
    <div class="tf-container">

        <?php
        $blog_query = new WP_Query([
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 10,
        ]);
        ?>

        <?php if ( $blog_query->have_posts() ) : ?>

            <!-- Featured Post -->
            <?php $blog_query->the_post(); ?>
            <article class="tf-blog-featured">
                <div class="tf-blog-featured__thumb">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('large', ['class' => 'tf-blog-featured__img']); ?>
                    <?php else : ?>
                        <div class="tf-blog-featured__placeholder">
                            <div class="tf-placeholder-grid">
                                <div class="tf-placeholder-bar tf-placeholder-bar--wide"></div>
                                <div class="tf-placeholder-bar tf-placeholder-bar--medium"></div>
                                <div class="tf-placeholder-row">
                                    <div class="tf-placeholder-block"></div>
                                    <div class="tf-placeholder-block"></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <span class="tf-blog-featured__badge">Featured</span>
                </div>
                <div class="tf-blog-featured__content">
                    <div class="tf-blog-featured__meta">
                        <?php $cats = get_the_category();
                        if ( $cats ) : ?>
                            <span class="tf-blog-cat"><?php echo esc_html($cats[0]->name); ?></span>
                        <?php endif; ?>
                        <span class="tf-blog-date"><?php echo get_the_date('M j, Y'); ?></span>
                        <span class="tf-blog-read-time">
                            <?php
                            $wc = str_word_count( strip_tags( get_the_content() ) );
                            echo max(1, ceil($wc / 200)) . ' min read';
                            ?>
                        </span>
                    </div>
                    <h2 class="tf-blog-featured__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="tf-blog-featured__excerpt">
                        <?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?>
                    </p>
                    <div class="tf-blog-featured__author">
                        <?php echo get_avatar( get_the_author_meta('ID'), 40, '', '', ['class' => 'tf-author-avatar'] ); ?>
                        <div class="tf-author-info">
                            <span class="tf-author-name"><?php the_author(); ?></span>
                            <span class="tf-author-role">TechFlow Team</span>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="tf-btn tf-btn--primary tf-blog-read-btn">
                            Read Article
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Rest of Posts -->
            <?php if ( $blog_query->have_posts() ) : ?>
                <div class="tf-blog-grid">
                    <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                        <article class="tf-blog-card">
                            <div class="tf-blog-card__thumb">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('medium_large', ['class' => 'tf-blog-card__img']); ?>
                                <?php else : ?>
                                    <div class="tf-blog-card__placeholder">
                                        <div class="tf-placeholder-grid">
                                            <div class="tf-placeholder-bar tf-placeholder-bar--wide"></div>
                                            <div class="tf-placeholder-bar tf-placeholder-bar--medium"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="tf-blog-card__content">
                                <div class="tf-blog-card__meta">
                                    <?php $cats = get_the_category();
                                    if ( $cats ) : ?>
                                        <span class="tf-blog-cat"><?php echo esc_html($cats[0]->name); ?></span>
                                    <?php endif; ?>
                                    <span class="tf-blog-date"><?php echo get_the_date('M j, Y'); ?></span>
                                </div>
                                <h3 class="tf-blog-card__title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="tf-blog-card__excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
                                </p>
                                <div class="tf-blog-card__footer">
                                    <?php echo get_avatar( get_the_author_meta('ID'), 28, '', '', ['class' => 'tf-author-avatar tf-author-avatar--sm'] ); ?>
                                    <span class="tf-author-name tf-author-name--sm"><?php the_author(); ?></span>
                                    <span class="tf-blog-read-time tf-blog-read-time--sm">
                                        <?php
                                        $wc = str_word_count( strip_tags( get_the_content() ) );
                                        echo max(1, ceil($wc / 200)) . ' min';
                                        ?>
                                    </span>
                                    <a href="<?php the_permalink(); ?>" class="tf-blog-card__read">Read →</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>

        <?php else : ?>

            <!-- No Posts Fallback -->
            <div class="tf-blog-grid">
                <?php
                $placeholder_posts = [
                    [
                        'title'   => 'Building Scalable React Applications in 2024',
                        'cat'     => 'Web Dev',
                        'date'    => 'Dec 15, 2024',
                        'read'    => '8 min',
                        'excerpt' => 'A deep dive into modern React patterns, state management strategies, and performance optimization techniques.',
                        'author'  => 'Alex Rivera',
                    ],
                    [
                        'title'   => 'The Complete Guide to Design Systems',
                        'cat'     => 'Design',
                        'date'    => 'Dec 10, 2024',
                        'read'    => '12 min',
                        'excerpt' => 'How to build a robust design system from scratch — tokens, components, documentation, and team adoption.',
                        'author'  => 'Sarah Chen',
                    ],
                    [
                        'title'   => 'Deploying with Kubernetes: A Practical Guide',
                        'cat'     => 'DevOps',
                        'date'    => 'Dec 5, 2024',
                        'read'    => '10 min',
                        'excerpt' => 'Everything you need to deploy production-ready applications with Kubernetes, from setup to auto-scaling.',
                        'author'  => 'Tom Williams',
                    ],
                    [
                        'title'   => 'Integrating OpenAI into Your Web App',
                        'cat'     => 'AI / ML',
                        'date'    => 'Nov 28, 2024',
                        'read'    => '7 min',
                        'excerpt' => 'Step-by-step tutorial on integrating OpenAI APIs, building RAG pipelines, and intelligent user experiences.',
                        'author'  => 'Priya Patel',
                    ],
                    [
                        'title'   => 'Next.js 14 App Router: What You Need to Know',
                        'cat'     => 'Web Dev',
                        'date'    => 'Nov 20, 2024',
                        'read'    => '9 min',
                        'excerpt' => 'Breaking down the Next.js 14 App Router — server components, streaming, parallel routes and patterns.',
                        'author'  => 'Alex Rivera',
                    ],
                    [
                        'title'   => 'Mobile-First Design: Beyond Responsive Layouts',
                        'cat'     => 'Design',
                        'date'    => 'Nov 15, 2024',
                        'read'    => '6 min',
                        'excerpt' => 'True mobile-first design goes beyond media queries. Touch interactions, performance, and UX for mobile.',
                        'author'  => 'Marcus Johnson',
                    ],
                ];
                foreach ( $placeholder_posts as $p ) : ?>
                    <article class="tf-blog-card">
                        <div class="tf-blog-card__thumb">
                            <div class="tf-blog-card__placeholder">
                                <div class="tf-placeholder-grid">
                                    <div class="tf-placeholder-bar tf-placeholder-bar--wide"></div>
                                    <div class="tf-placeholder-bar tf-placeholder-bar--medium"></div>
                                    <div class="tf-placeholder-row">
                                        <div class="tf-placeholder-block"></div>
                                        <div class="tf-placeholder-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tf-blog-card__content">
                            <div class="tf-blog-card__meta">
                                <span class="tf-blog-cat"><?php echo esc_html($p['cat']); ?></span>
                                <span class="tf-blog-date"><?php echo esc_html($p['date']); ?></span>
                            </div>
                            <h3 class="tf-blog-card__title">
                                <a href="#"><?php echo esc_html($p['title']); ?></a>
                            </h3>
                            <p class="tf-blog-card__excerpt"><?php echo esc_html($p['excerpt']); ?></p>
                            <div class="tf-blog-card__footer">
                                <div class="tf-author-avatar tf-author-avatar--sm tf-author-avatar--placeholder">
                                    <?php echo esc_html(substr($p['author'], 0, 1)); ?>
                                </div>
                                <span class="tf-author-name tf-author-name--sm"><?php echo esc_html($p['author']); ?></span>
                                <span class="tf-blog-read-time tf-blog-read-time--sm"><?php echo esc_html($p['read']); ?></span>
                                <a href="#" class="tf-blog-card__read">Read →</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>