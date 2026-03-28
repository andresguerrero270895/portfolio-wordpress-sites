<?php
/**
 * FreshBite Theme — header.php
 */
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F97316">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============================================================
     HEADER
     ============================================================ -->
<header class="fb-header" id="fb-header">
    <div class="fb-container">
        <div class="fb-header-inner">

            <!-- LOGO -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="fb-logo">
                <div class="fb-logo-icon">🥬</div>
                <span class="fb-logo-text">
                    Fresh<span>Bite</span>
                </span>
            </a>

            <!-- SEARCH BAR (desktop) -->
            <div class="fb-header-search">
                <span class="fb-search-icon">🔍</span>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input
                        type="search"
                        placeholder="Search fresh products, vendors..."
                        value="<?php echo get_search_query(); ?>"
                        name="s"
                        autocomplete="off"
                    >
                    <?php if (class_exists('WooCommerce')) : ?>
                        <input type="hidden" name="post_type" value="product">
                    <?php endif; ?>
                </form>
            </div>

            <!-- NAV (desktop) -->
            <nav class="fb-nav" id="fb-nav">
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="<?php echo is_front_page() ? 'active' : ''; ?>">
                    Home
                </a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>"
                   class="<?php echo is_shop() ? 'active' : ''; ?>">
                    Shop
                </a>
                <a href="<?php echo esc_url(home_url('/vendors')); ?>"
                   class="<?php echo is_post_type_archive('fb_vendor') ? 'active' : ''; ?>">
                    Vendors
                </a>
                <a href="<?php echo esc_url(home_url('/about')); ?>"
                   class="<?php echo is_page('about') ? 'active' : ''; ?>">
                    About
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"
                   class="<?php echo is_page('contact') ? 'active' : ''; ?>">
                    Contact
                </a>
            </nav>

            <!-- ACTIONS -->
            <div class="fb-header-actions">

                <?php if (class_exists('WooCommerce')) : ?>
                    <!-- CART -->
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
                       class="fb-cart-btn"
                       title="Cart">
                        🛒
                        <?php
                        $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
                        if ($count > 0) :
                        ?>
                            <span class="fb-cart-count"><?php echo esc_html($count); ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>

                <!-- SELL ON FRESHBITE -->
                <?php if (class_exists('WeDevs_Dokan')) : ?>
                    <?php if (dokan_is_user_seller(get_current_user_id())) : ?>
                        <a href="<?php echo esc_url(dokan_get_navigation_url()); ?>"
                           class="fb-btn fb-btn-outline fb-btn-sm">
                            Dashboard
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>"
                           class="fb-btn fb-btn-secondary fb-btn-sm">
                            🏪 Sell Here
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- ACCOUNT -->
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(get_dashboard_url()); ?>"
                       class="fb-btn fb-btn-primary fb-btn-sm">
                        👤 Account
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>"
                       class="fb-btn fb-btn-primary fb-btn-sm">
                        Sign In
                    </a>
                <?php endif; ?>

                <!-- HAMBURGER (mobile) -->
                <button class="fb-hamburger"
                        id="fb-hamburger"
                        aria-label="Toggle menu"
                        aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div><!-- /.fb-header-actions -->
        </div><!-- /.fb-header-inner -->
    </div><!-- /.fb-container -->

    <!-- MOBILE MENU -->
    <div class="fb-mobile-menu" id="fb-mobile-menu" aria-hidden="true">
        <div class="fb-mobile-menu-inner">

            <!-- Mobile search -->
            <div class="fb-mobile-search">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="fb-mobile-search-wrap">
                        <span>🔍</span>
                        <input
                            type="search"
                            placeholder="Search products..."
                            value="<?php echo get_search_query(); ?>"
                            name="s"
                        >
                        <?php if (class_exists('WooCommerce')) : ?>
                            <input type="hidden" name="post_type" value="product">
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- Mobile nav links -->
            <nav class="fb-mobile-nav">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <span>🏠</span> Home
                </a>
                <a href="<?php echo esc_url(home_url('/shop')); ?>">
                    <span>🛒</span> Shop
                </a>
                <a href="<?php echo esc_url(home_url('/vendors')); ?>">
                    <span>🏪</span> Vendors
                </a>
                <a href="<?php echo esc_url(home_url('/about')); ?>">
                    <span>🌿</span> About
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>">
                    <span>✉️</span> Contact
                </a>
            </nav>

            <!-- Mobile actions -->
            <div class="fb-mobile-actions">
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(get_dashboard_url()); ?>"
                       class="fb-btn fb-btn-outline" style="width:100%;justify-content:center;">
                        👤 My Account
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>"
                       class="fb-btn fb-btn-primary" style="width:100%;justify-content:center;">
                        Sign In
                    </a>
                    <a href="<?php echo esc_url(wp_registration_url()); ?>"
                       class="fb-btn fb-btn-outline" style="width:100%;justify-content:center;">
                        Create Account
                    </a>
                <?php endif; ?>
            </div>

        </div><!-- /.fb-mobile-menu-inner -->
    </div><!-- /.fb-mobile-menu -->

</header><!-- /.fb-header -->

<!-- Mobile menu overlay -->
<div class="fb-mobile-overlay" id="fb-mobile-overlay"></div>

<!-- Page wrapper -->
<div id="fb-page" class="fb-page-wrapper">