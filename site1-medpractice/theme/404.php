<?php
/**
 * MedPractice USA - 404 Error Page
 * @package MedPractice
 */
if (!defined('ABSPATH')) { exit; }
get_header();
?>

<section style="min-height:80vh;display:flex;align-items:center;justify-content:center;text-align:center;padding:var(--mp-space-2xl);background:linear-gradient(135deg,var(--mp-primary),var(--mp-primary-dark));">
    <div style="max-width:600px;">
        <div style="font-size:8rem;font-weight:800;font-family:var(--mp-font-heading);background:linear-gradient(135deg,var(--mp-secondary-light),var(--mp-accent));-webkit-background-clip:text;-webkit-text-fill-color:transparent;line-height:1;margin-bottom:var(--mp-space-lg);">404</div>
        <h1 style="color:var(--mp-white);font-size:var(--mp-text-3xl);margin-bottom:var(--mp-space-md);">Page Not Found</h1>
        <p style="color:rgba(255,255,255,0.7);font-size:var(--mp-text-lg);margin-bottom:var(--mp-space-2xl);line-height:1.8;">
            The page you're looking for doesn't exist or has been moved. Let's get you back on track.
        </p>
        <div style="display:flex;gap:var(--mp-space-md);justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="mp-btn mp-btn--accent mp-btn--large">Go Home</a>
            <a href="<?php echo esc_url(get_post_type_archive_link('state_landing')); ?>" class="mp-btn mp-btn--secondary mp-btn--large" style="border-color:rgba(255,255,255,0.3);color:white;">Browse States</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
