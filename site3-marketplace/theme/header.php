<?php
/**
 * FreshBite Theme — header.php
 * Idioma: Español
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
     BARRA SUPERIOR
     ============================================================ -->
<div class="fb-topbar">
    <div class="fb-container">
        <div class="fb-topbar-inner">

            <div class="fb-topbar-left">
                <span>🚚 Envío gratis en pedidos mayores a \$35</span>
                <span class="fb-topbar-divider">|</span>
                <span>📞 Atención: Lun–Vie 8am–6pm</span>
            </div>

            <div class="fb-topbar-right">
                <a href="<?php echo esc_url(home_url('/rastrear-pedido')); ?>">
                    📦 Rastrear Pedido
                </a>
                <span class="fb-topbar-divider">|</span>
                <a href="<?php echo esc_url(home_url('/ayuda')); ?>">
                    ❓ Ayuda
                </a>
                <span class="fb-topbar-divider">|</span>

                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(get_dashboard_url()); ?>">
                        👤 Mi Cuenta
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>">
                        Iniciar Sesión
                    </a>
                    <span class="fb-topbar-divider">|</span>
                    <a href="<?php echo esc_url(wp_registration_url()); ?>">
                        Registrarse
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<!-- ============================================================
     HEADER PRINCIPAL
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

            <!-- BUSCADOR (desktop) -->
            <div class="fb-header-search">
                <span class="fb-search-icon">🔍</span>
                <form role="search" method="get"
                      action="<?php echo esc_url(home_url('/')); ?>">
                    <input
                        type="search"
                        placeholder="Buscar frutas, verduras, agricultores..."
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
                    Inicio
                </a>
                <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                   class="<?php echo is_shop() ? 'active' : ''; ?>">
                    Tienda
                </a>
                <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                class="<?php echo (is_page('vendedores') || is_post_type_archive('fb_vendor') || dokan_is_store_listing()) ? 'active' : ''; ?>">
                Vendedores
                </a>
                <a href="<?php echo esc_url(home_url('/nosotros')); ?>"
                   class="<?php echo is_page('nosotros') ? 'active' : ''; ?>">
                    Nosotros
                </a>
                <a href="<?php echo esc_url(home_url('/contacto')); ?>"
                   class="<?php echo is_page('contacto') ? 'active' : ''; ?>">
                    Contacto
                </a>
            </nav>

            <!-- ACCIONES -->
            <div class="fb-header-actions">

                <!-- CARRITO -->
                <?php if (class_exists('WooCommerce')) : ?>
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
                       class="fb-cart-btn"
                       title="Ver carrito">
                        🛒
                        <?php
                        $count = WC()->cart
                            ? WC()->cart->get_cart_contents_count()
                            : 0;
                        if ($count > 0) : ?>
                            <span class="fb-cart-count">
                                <?php echo esc_html($count); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>

                <!-- VENDER EN FRESHBITE -->
                <?php if (class_exists('WeDevs_Dokan')) : ?>
                    <?php if (dokan_is_user_seller(get_current_user_id())) : ?>
                        <a href="<?php echo esc_url(dokan_get_navigation_url()); ?>"
                           class="fb-btn fb-btn-outline fb-btn-sm">
                            Panel Vendedor
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>"
                           class="fb-btn fb-btn-secondary fb-btn-sm">
                            🏪 Vender Aquí
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- CUENTA -->
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(get_dashboard_url()); ?>"
                       class="fb-btn fb-btn-primary fb-btn-sm">
                        👤 Mi Cuenta
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>"
                       class="fb-btn fb-btn-primary fb-btn-sm">
                        Ingresar
                    </a>
                <?php endif; ?>

                <!-- HAMBURGUESA (móvil) -->
                <button class="fb-hamburger"
                        id="fb-hamburger"
                        aria-label="Abrir menú"
                        aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div><!-- /.fb-header-actions -->
        </div><!-- /.fb-header-inner -->
    </div><!-- /.fb-container -->

    <!-- MENÚ MÓVIL -->
    <div class="fb-mobile-menu" id="fb-mobile-menu" aria-hidden="true">
        <div class="fb-mobile-menu-inner">

            <!-- Buscador móvil -->
            <div class="fb-mobile-search">
                <form role="search" method="get"
                      action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="fb-mobile-search-wrap">
                        <span>🔍</span>
                        <input
                            type="search"
                            placeholder="Buscar productos..."
                            value="<?php echo get_search_query(); ?>"
                            name="s"
                        >
                        <?php if (class_exists('WooCommerce')) : ?>
                            <input type="hidden" name="post_type" value="product">
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- Links móvil -->
            <nav class="fb-mobile-nav">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <span>🏠</span> Inicio
                </a>
                <a href="<?php echo esc_url(home_url('/tienda')); ?>">
                    <span>🛒</span> Tienda
                </a>
                <a href="<?php echo esc_url(home_url('/vendedores')); ?>">
                    <span>🏪</span> Vendedores
                </a>
                <a href="<?php echo esc_url(home_url('/nosotros')); ?>">
                    <span>🌿</span> Nosotros
                </a>
                <a href="<?php echo esc_url(home_url('/contacto')); ?>">
                    <span>✉️</span> Contacto
                </a>
            </nav>

            <!-- Info útil móvil -->
            <div class="fb-mobile-info">
                <div class="fb-mobile-info-item">
                    <span>🚚</span>
                    <span>Envío gratis en pedidos +\$35</span>
                </div>
                <div class="fb-mobile-info-item">
                    <span>📞</span>
                    <span>Lun–Vie 8am–6pm</span>
                </div>
                <div class="fb-mobile-info-item">
                    <span>✅</span>
                    <span>100% Productos Frescos</span>
                </div>
            </div>

            <!-- Acciones móvil -->
            <div class="fb-mobile-actions">
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(get_dashboard_url()); ?>"
                       class="fb-btn fb-btn-outline"
                       style="width:100%;justify-content:center;">
                        👤 Mi Cuenta
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>"
                       class="fb-btn fb-btn-primary"
                       style="width:100%;justify-content:center;">
                        Iniciar Sesión
                    </a>
                    <a href="<?php echo esc_url(wp_registration_url()); ?>"
                       class="fb-btn fb-btn-outline"
                       style="width:100%;justify-content:center;">
                        Crear Cuenta
                    </a>
                <?php endif; ?>

                <?php if (class_exists('WeDevs_Dokan') &&
                          !dokan_is_user_seller(get_current_user_id())) : ?>
                    <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>"
                       class="fb-btn fb-btn-secondary"
                       style="width:100%;justify-content:center;">
                        🏪 Quiero Vender Aquí
                    </a>
                <?php endif; ?>
            </div>

        </div><!-- /.fb-mobile-menu-inner -->
    </div><!-- /.fb-mobile-menu -->

</header><!-- /.fb-header -->

<!-- Overlay menú móvil -->
<div class="fb-mobile-overlay" id="fb-mobile-overlay"></div>

<!-- Wrapper de página -->
<div id="fb-page" class="fb-page-wrapper">
  