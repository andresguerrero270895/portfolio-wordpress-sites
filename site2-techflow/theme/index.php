<?php
/**
 * TechFlow Theme — index.php
 * Fallback template
 */
get_header(); ?>

<main id="tf-main">
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>
