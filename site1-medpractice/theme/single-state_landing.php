<?php
/**
 * MedPractice USA - Single State Landing Page Template
 * @package MedPractice
 */
if (!defined('ABSPATH')) { exit; }
get_header();

$state_code = get_post_meta(get_the_ID(),'_mp_state_code',true);
$capital = get_post_meta(get_the_ID(),'_mp_state_capital',true);
$population = get_post_meta(get_the_ID(),'_mp_state_population',true);
$practices = get_post_meta(get_the_ID(),'_mp_practices_count',true);
$avg_price = get_post_meta(get_the_ID(),'_mp_avg_price',true);
$phone = get_post_meta(get_the_ID(),'_mp_state_phone',true);
$email = get_post_meta(get_the_ID(),'_mp_state_email',true);
$headline = get_post_meta(get_the_ID(),'_mp_hero_headline',true);
$subheadline = get_post_meta(get_the_ID(),'_mp_hero_subheadline',true);
$cta_text = get_post_meta(get_the_ID(),'_mp_cta_text',true);
?>

<!-- STATE HERO -->
<section class="mp-hero" style="min-height:70vh;">
    <div class="mp-hero__grid-pattern"></div>
    <div class="mp-hero__float mp-hero__float--1"></div>
    <div class="mp-hero__float mp-hero__float--2"></div>
    <div class="mp-hero__content">
        <div class="mp-hero__badge">
            <span class="mp-hero__badge__dot"></span>
            <?php echo esc_html($state_code); ?> — <?php echo esc_html($practices ?: '50+'); ?> Practices Available
        </div>
        <h1 class="mp-hero__title" style="font-size:var(--mp-text-4xl);">
            <?php echo esc_html($headline ?: 'Medical Practices for Sale in ' . get_the_title()); ?>
        </h1>
        <p class="mp-hero__subtitle">
            <?php echo esc_html($subheadline ?: get_the_excerpt()); ?>
        </p>
        <div class="mp-hero__cta">
            <a href="#contact-form" class="mp-btn mp-btn--accent mp-btn--large"><?php echo esc_html($cta_text ?: 'Get Started'); ?></a>
            <a href="tel:<?php echo esc_attr($phone); ?>" class="mp-btn mp-btn--secondary mp-btn--large" style="border-color:rgba(255,255,255,0.3);color:white;">📞 <?php echo esc_html($phone ?: '(800) 555-1234'); ?></a>
        </div>
        <div class="mp-hero__stats">
            <div class="mp-hero__stat">
                <span class="mp-hero__stat-number"><span class="mp-counter" data-count="<?php echo esc_attr($practices ?: '50'); ?>">0</span>+</span>
                <span class="mp-hero__stat-label">Active Listings</span>
            </div>
            <div class="mp-hero__stat">
                <span class="mp-hero__stat-number">$<span class="mp-counter" data-count="<?php echo esc_attr(str_replace(',','',$avg_price) ?: '500000'); ?>">0</span></span>
                <span class="mp-hero__stat-label">Avg. Price</span>
            </div>
            <div class="mp-hero__stat">
                <span class="mp-hero__stat-number"><span class="mp-counter" data-count="98">0</span>%</span>
                <span class="mp-hero__stat-label">Success Rate</span>
            </div>
        </div>
    </div>
</section>

<!-- BREADCRUMBS -->
<div class="mp-container" style="padding-top:var(--mp-space-lg);">
    <?php medpractice_breadcrumbs(); ?>
</div>

<!-- STATE CONTENT -->
<section class="mp-section" style="padding-top:var(--mp-space-2xl);">
    <div class="mp-container">
        <div style="display:grid;grid-template-columns:2fr 1fr;gap:var(--mp-space-3xl);">

            <!-- Main Content -->
            <div class="mp-fade-in">
                <div class="mp-state-content" style="font-size:var(--mp-text-base);line-height:1.9;">
                    <?php the_content(); ?>
                </div>

                <!-- Practice Types Grid -->
                <div style="margin-top:var(--mp-space-3xl);">
                    <h2 style="margin-bottom:var(--mp-space-xl);">Practice Types in <?php the_title(); ?></h2>
                    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:var(--mp-space-md);">
                        <?php
                        $types = array(
                            array('icon'=>'🏥','name'=>'General Medicine','count'=>rand(10,40)),
                            array('icon'=>'🦷','name'=>'Dental','count'=>rand(8,30)),
                            array('icon'=>'❤️','name'=>'Cardiology','count'=>rand(5,20)),
                            array('icon'=>'👶','name'=>'Pediatrics','count'=>rand(6,25)),
                            array('icon'=>'👁️','name'=>'Ophthalmology','count'=>rand(4,15)),
                            array('icon'=>'🩺','name'=>'Urgent Care','count'=>rand(5,18)),
                        );
                        foreach ($types as $type) :
                        ?>
                        <div style="background:var(--mp-off-white);border-radius:var(--mp-radius-lg);padding:var(--mp-space-lg);text-align:center;transition:all 0.3s;border:1px solid var(--mp-light-gray);">
                            <div style="font-size:2rem;margin-bottom:var(--mp-space-sm);"><?php echo $type['icon']; ?></div>
                            <h4 style="font-size:var(--mp-text-sm);margin-bottom:4px;"><?php echo $type['name']; ?></h4>
                            <p style="font-size:var(--mp-text-xs);color:var(--mp-medium-gray);margin:0;"><?php echo $type['count']; ?> available</p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="mp-fade-in-left">
                <!-- Quick Stats Card -->
                <div style="background:var(--mp-primary);border-radius:var(--mp-radius-xl);padding:var(--mp-space-2xl);color:white;margin-bottom:var(--mp-space-xl);">
                    <h3 style="color:white;font-size:var(--mp-text-xl);margin-bottom:var(--mp-space-lg);">📊 <?php the_title(); ?> at a Glance</h3>
                    <ul style="list-style:none;">
                        <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(255,255,255,0.1);">
                            <span style="color:rgba(255,255,255,0.7);">State Code</span>
                            <strong><?php echo esc_html($state_code); ?></strong>
                        </li>
                        <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(255,255,255,0.1);">
                            <span style="color:rgba(255,255,255,0.7);">Capital</span>
                            <strong><?php echo esc_html($capital); ?></strong>
                        </li>
                        <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(255,255,255,0.1);">
                            <span style="color:rgba(255,255,255,0.7);">Active Listings</span>
                            <strong><?php echo esc_html($practices ?: '50+'); ?></strong>
                        </li>
                        <li style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid rgba(255,255,255,0.1);">
                            <span style="color:rgba(255,255,255,0.7);">Avg. Price</span>
                            <strong>$<?php echo esc_html($avg_price ?: 'N/A'); ?></strong>
                        </li>
                        <li style="display:flex;justify-content:space-between;padding:12px 0;">
                            <span style="color:rgba(255,255,255,0.7);">Success Rate</span>
                            <strong>98%</strong>
                        </li>
                    </ul>
                </div>

                <!-- Contact Card -->
                <div id="contact-form" style="background:var(--mp-white);border:2px solid var(--mp-light-gray);border-radius:var(--mp-radius-xl);padding:var(--mp-space-2xl);">
                    <h3 style="font-size:var(--mp-text-xl);margin-bottom:var(--mp-space-sm);">Get Started in <?php the_title(); ?></h3>
                    <p style="font-size:var(--mp-text-sm);color:var(--mp-medium-gray);margin-bottom:var(--mp-space-lg);">Fill out the form and we'll contact you within 24 hours.</p>
                    
                    <form id="mp-contact-form" class="mp-form">
                        <div class="mp-form-message"></div>
                        <input type="hidden" name="state" value="<?php the_title(); ?>">
                        <div class="mp-form__group">
                            <label class="mp-form__label">Full Name *</label>
                            <input type="text" name="name" class="mp-form__input" placeholder="Dr. John Smith" required>
                        </div>
                        <div class="mp-form__group">
                            <label class="mp-form__label">Email *</label>
                            <input type="email" name="email" class="mp-form__input" placeholder="john@email.com" required>
                        </div>
                        <div class="mp-form__group">
                            <label class="mp-form__label">Phone</label>
                            <input type="tel" name="phone" class="mp-form__input" placeholder="(555) 123-4567">
                        </div>
                        <div class="mp-form__group">
                            <label class="mp-form__label">Message *</label>
                            <textarea name="message" class="mp-form__textarea" placeholder="I'm interested in practices in <?php the_title(); ?>..." required></textarea>
                        </div>
                        <button type="submit" class="mp-btn mp-btn--primary" style="width:100%;">Send Inquiry</button>
                    </form>

                    <div style="margin-top:var(--mp-space-lg);padding-top:var(--mp-space-lg);border-top:1px solid var(--mp-light-gray);">
                        <p style="font-size:var(--mp-text-sm);margin-bottom:8px;"><strong>Or contact us directly:</strong></p>
                        <p style="font-size:var(--mp-text-sm);margin-bottom:4px;">📞 <a href="tel:<?php echo esc_attr($phone); ?>" style="color:var(--mp-secondary);"><?php echo esc_html($phone ?: '(800) 555-1234'); ?></a></p>
                        <p style="font-size:var(--mp-text-sm);margin:0;">✉️ <a href="mailto:<?php echo esc_attr($email); ?>" style="color:var(--mp-secondary);"><?php echo esc_html($email ?: 'info@medpracticeusa.com'); ?></a></p>
                    </div>
                </div>
            </aside>

        </div><!-- grid -->
    </div>
</section>

<!-- OTHER STATES CTA -->
<section class="mp-section" style="background:var(--mp-off-white);">
    <div class="mp-container">
        <div class="mp-section-header mp-fade-in">
            <span class="mp-section-label">Explore More</span>
            <h2 class="mp-section-title">Browse Other States</h2>
            <p class="mp-section-desc">Can't find what you're looking for in <?php the_title(); ?>? Explore opportunities in other states.</p>
        </div>
        <div class="mp-states-grid mp-stagger">
            <?php
            $other_states = new WP_Query(array(
                'post_type'=>'state_landing',
                'posts_per_page'=>6,
                'orderby'=>'rand',
                'post__not_in'=>array(get_the_ID()),
                'post_status'=>'publish'
            ));
            if ($other_states->have_posts()) :
                while ($other_states->have_posts()) : $other_states->the_post();
                    $o_code = get_post_meta(get_the_ID(),'_mp_state_code',true);
                    $o_practices = get_post_meta(get_the_ID(),'_mp_practices_count',true);
            ?>
                <a href="<?php the_permalink(); ?>" class="mp-state-card mp-fade-in">
                    <span class="mp-state-card__code"><?php echo esc_html($o_code); ?></span>
                    <span class="mp-state-card__name"><?php the_title(); ?></span>
                    <span class="mp-state-card__count"><?php echo esc_html($o_practices ?: '50+'); ?> practices</span>
                </a>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <div style="text-align:center;margin-top:var(--mp-space-2xl);">
            <a href="<?php echo esc_url(get_post_type_archive_link('state_landing')); ?>" class="mp-btn mp-btn--primary mp-btn--large">View All 30 States</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
