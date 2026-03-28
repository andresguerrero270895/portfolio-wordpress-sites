<?php
/**
 * MedPractice USA - Generic Page Template
 * @package MedPractice
 */
if (!defined('ABSPATH')) { exit; }
get_header();
?>

<section style="padding-top:120px;padding-bottom:var(--mp-space-2xl);background:var(--mp-primary);">
    <div class="mp-container" style="text-align:center;">
        <h1 style="color:var(--mp-white);font-size:var(--mp-text-4xl);margin-bottom:var(--mp-space-sm);"><?php the_title(); ?></h1>
    </div>
</section>

<div class="mp-container" style="padding-top:var(--mp-space-lg);">
    <?php medpractice_breadcrumbs(); ?>
</div>

<section class="mp-section" style="padding-top:var(--mp-space-xl);">
    <div class="mp-container" style="max-width:800px;">
        <div class="mp-fade-in" style="line-height:1.9;">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
