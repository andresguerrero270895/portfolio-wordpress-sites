<?php
/**
 * FreshBite Theme — single-fb_vendor.php
 * Template: Perfil individual de vendedor/agricultor
 */
defined('ABSPATH') || exit;

get_header();

$pid      = get_the_ID();
$emoji    = get_post_meta($pid, 'fb_vendor_emoji',    true) ?: '🏪';
$spec     = get_post_meta($pid, 'fb_vendor_specialty', true);
$location = get_post_meta($pid, 'fb_vendor_location',  true);
$since    = get_post_meta($pid, 'fb_vendor_since',     true);
$products = get_post_meta($pid, 'fb_vendor_products',  true) ?: '0';
$rating   = get_post_meta($pid, 'fb_vendor_rating',    true) ?: '5';
$reviews  = get_post_meta($pid, 'fb_vendor_reviews',   true) ?: '0';
$sales    = get_post_meta($pid, 'fb_vendor_sales',     true) ?: '0';
$badge    = get_post_meta($pid, 'fb_vendor_badge',     true);
$verified = get_post_meta($pid, 'fb_vendor_verified',  true) === 'si';
$website  = get_post_meta($pid, 'fb_vendor_website',   true);
$instagram= get_post_meta($pid, 'fb_vendor_instagram', true);
$story    = get_post_meta($pid, 'fb_vendor_story',     true);
$pickup   = get_post_meta($pid, 'fb_vendor_pickup',    true) === 'si';
$delivery = get_post_meta($pid, 'fb_vendor_delivery',  true) === 'si';
$schedule = get_post_meta($pid, 'fb_vendor_schedule',  true);
$min_order= get_post_meta($pid, 'fb_vendor_min_order', true);
?>

<!-- ============================================================
     HERO DEL VENDEDOR
     ============================================================ -->
<section class="fb-vendor-hero-section">

    <!-- Banner de fondo -->
    <div class="fb-vendor-banner">
        <div class="fb-vendor-banner-overlay"></div>
        <div class="fb-vendor-banner-pattern">
            <?php
            $pattern_emojis = ['🌾', '🥬', '🍎', '🥕', '🌿', '🍅', '🥦', '🌽'];
            for ($i = 0; $i < 24; $i++) {
                echo '<span>' . $pattern_emojis[$i % count($pattern_emojis)] . '</span>';
            }
            ?>
        </div>
    </div>

    <div class="fb-container" style="position:relative;z-index:2;">

        <!-- Breadcrumb -->
        <div class="fb-breadcrumb" style="padding-top:32px;
             margin-bottom:32px;">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               style="color:rgba(255,255,255,0.6);">
                Inicio
            </a>
            <span style="color:rgba(255,255,255,0.4);">›</span>
            <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
               style="color:rgba(255,255,255,0.6);">
                Vendedores
            </a>
            <span style="color:rgba(255,255,255,0.4);">›</span>
            <span style="color:rgba(255,255,255,0.8);">
                <?php the_title(); ?>
            </span>
        </div>

        <!-- Perfil principal -->
        <div class="fb-vendor-profile">

            <!-- Avatar -->
            <div class="fb-vendor-profile-avatar">
                <?php if (has_post_thumbnail()) :
                    the_post_thumbnail('freshbite-vendor');
                else : ?>
                    <span><?php echo esc_html($emoji); ?></span>
                <?php endif; ?>

                <?php if ($verified) : ?>
                    <div class="fb-vendor-verified-badge"
                         title="Vendedor Verificado">
                        ✅
                    </div>
                <?php endif; ?>
            </div>

            <!-- Info -->
            <div class="fb-vendor-profile-info">

                <div style="display:flex;align-items:center;
                             gap:12px;flex-wrap:wrap;margin-bottom:8px;">
                    <h1 style="color:white;font-size:clamp(1.6rem,3vw,2.2rem);
                                margin:0;">
                        <?php the_title(); ?>
                    </h1>
                    <?php if ($badge) : ?>
                        <span style="background:rgba(249,115,22,0.9);
                                     color:white;padding:4px 12px;
                                     border-radius:var(--fb-radius-full);
                                     font-size:0.75rem;font-weight:700;
                                     font-family:var(--fb-font);
                                     letter-spacing:0.05em;">
                            <?php echo esc_html($badge); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <?php if ($spec) : ?>
                    <p style="color:rgba(255,255,255,0.8);
                               font-family:var(--fb-font);
                               font-size:1rem;margin-bottom:12px;">
                        <?php echo esc_html($spec); ?>
                    </p>
                <?php endif; ?>

                <div style="display:flex;align-items:center;
                             gap:16px;flex-wrap:wrap;">
                    <?php if ($location) : ?>
                        <span style="color:rgba(255,255,255,0.7);
                                     font-size:0.88rem;
                                     font-family:var(--fb-font);
                                     display:flex;align-items:center;gap:4px;">
                            📍 <?php echo esc_html($location); ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($since) : ?>
                        <span style="color:rgba(255,255,255,0.7);
                                     font-size:0.88rem;
                                     font-family:var(--fb-font);
                                     display:flex;align-items:center;gap:4px;">
                            📅 Miembro desde <?php echo esc_html($since); ?>
                        </span>
                    <?php endif; ?>

                    <!-- Rating -->
                    <span style="display:flex;align-items:center;gap:6px;">
                        <?php echo freshbite_stars(floatval($rating)); ?>
                        <span style="color:rgba(255,255,255,0.8);
                                     font-size:0.85rem;
                                     font-family:var(--fb-font);">
                            <?php echo esc_html($rating); ?>
                            (<?php echo esc_html($reviews); ?> reseñas)
                        </span>
                    </span>
                </div>

                <!-- Servicios disponibles -->
                <div style="display:flex;gap:8px;margin-top:16px;flex-wrap:wrap;">
                    <?php if ($pickup) : ?>
                        <span style="background:rgba(255,255,255,0.15);
                                     border:1px solid rgba(255,255,255,0.25);
                                     color:white;padding:6px 14px;
                                     border-radius:var(--fb-radius-full);
                                     font-size:0.8rem;font-weight:600;
                                     font-family:var(--fb-font);">
                            🏪 Pickup disponible
                        </span>
                    <?php endif; ?>
                    <?php if ($delivery) : ?>
                        <span style="background:rgba(255,255,255,0.15);
                                     border:1px solid rgba(255,255,255,0.25);
                                     color:white;padding:6px 14px;
                                     border-radius:var(--fb-radius-full);
                                     font-size:0.8rem;font-weight:600;
                                     font-family:var(--fb-font);">
                            🚚 Delivery disponible
                        </span>
                    <?php endif; ?>
                    <?php if ($verified) : ?>
                        <span style="background:rgba(34,197,94,0.2);
                                     border:1px solid rgba(34,197,94,0.4);
                                     color:#4ADE80;padding:6px 14px;
                                     border-radius:var(--fb-radius-full);
                                     font-size:0.8rem;font-weight:600;
                                     font-family:var(--fb-font);">
                            ✅ Vendedor Verificado
                        </span>
                    <?php endif; ?>
                </div>

            </div><!-- /.fb-vendor-profile-info -->

            <!-- CTAs del perfil -->
            <div class="fb-vendor-profile-ctas">
                <a href="#fb-vendor-products"
                   class="fb-btn fb-btn-primary">
                    🛒 Ver Productos
                </a>
                <a href="#fb-reservation-section"
                   class="fb-btn fb-btn-white">
                    📅 Hacer Reserva
                </a>
                <?php if ($website) : ?>
                    <a href="<?php echo esc_url($website); ?>"
                       target="_blank"
                       rel="noopener"
                       class="fb-btn fb-btn-outline"
                       style="border-color:rgba(255,255,255,0.4);
                              color:white;">
                        🌐 Sitio Web
                    </a>
                <?php endif; ?>
            </div>

        </div><!-- /.fb-vendor-profile -->

        <!-- Stats bar -->
        <div class="fb-vendor-stats-bar">
            <?php
            $stats_bar = [
                [$products, 'Productos',    '🥬'],
                [$sales,    'Ventas',       '🛒'],
                [$reviews,  'Reseñas',      '⭐'],
                [$rating,   'Calificación', '🏆'],
            ];
            foreach ($stats_bar as [$val, $label, $icon]) :
            ?>
                <div class="fb-vendor-stat-bar-item">
                    <span class="fb-vendor-stat-bar-icon">
                        <?php echo $icon; ?>
                    </span>
                    <span class="fb-vendor-stat-bar-num">
                        <?php echo esc_html($val); ?>
                    </span>
                    <span class="fb-vendor-stat-bar-label">
                        <?php echo esc_html($label); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     LAYOUT PRINCIPAL — INFO + PRODUCTOS
     ============================================================ -->
<section style="background:var(--fb-bg);padding:48px 0;">
    <div class="fb-container">
        <div class="fb-vendor-single-layout">

            <!-- ── SIDEBAR ─────────────────────────────────── -->
            <aside class="fb-vendor-single-sidebar">

                <!-- Historia / Sobre nosotros -->
                <?php if ($story || get_the_content()) : ?>
                    <div class="fb-vendor-info-card">
                        <h4 class="fb-vendor-info-title">
                            🌾 Sobre Esta Granja
                        </h4>
                        <p style="font-size:0.88rem;color:var(--fb-gray-400);
                                   font-family:var(--fb-font);line-height:1.7;">
                            <?php echo esc_html(
                                $story ?: freshbite_truncate(
                                    get_the_content(), 280
                                )
                            ); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- Información de contacto -->
                <div class="fb-vendor-info-card">
                    <h4 class="fb-vendor-info-title">
                        📋 Información
                    </h4>
                    <ul class="fb-vendor-info-list">

                        <?php if ($location) : ?>
                            <li>
                                <span class="fb-vendor-info-icon">📍</span>
                                <div>
                                    <span class="fb-vendor-info-label">
                                        Ubicación
                                    </span>
                                    <span class="fb-vendor-info-value">
                                        <?php echo esc_html($location); ?>
                                    </span>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($schedule) : ?>
                            <li>
                                <span class="fb-vendor-info-icon">🕐</span>
                                <div>
                                    <span class="fb-vendor-info-label">
                                        Horario
                                    </span>
                                    <span class="fb-vendor-info-value">
                                        <?php echo esc_html($schedule); ?>
                                    </span>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($min_order) : ?>
                            <li>
                                <span class="fb-vendor-info-icon">💰</span>
                                <div>
                                    <span class="fb-vendor-info-label">
                                        Pedido Mínimo
                                    </span>
                                    <span class="fb-vendor-info-value">
                                        $<?php echo esc_html($min_order); ?>
                                    </span>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($since) : ?>
                            <li>
                                <span class="fb-vendor-info-icon">📅</span>
                                <div>
                                    <span class="fb-vendor-info-label">
                                        Miembro desde
                                    </span>
                                    <span class="fb-vendor-info-value">
                                        <?php echo esc_html($since); ?>
                                    </span>
                                </div>
                            </li>
                        <?php endif; ?>

                        <li>
                            <span class="fb-vendor-info-icon">🚚</span>
                            <div>
                                <span class="fb-vendor-info-label">
                                    Servicios
                                </span>
                                <span class="fb-vendor-info-value">
                                    <?php
                                    $servicios = [];
                                    if ($pickup)   $servicios[] = 'Pickup';
                                    if ($delivery) $servicios[] = 'Delivery';
                                    echo esc_html(
                                        !empty($servicios)
                                            ? implode(' · ', $servicios)
                                            : 'Consultar'
                                    );
                                    ?>
                                </span>
                            </div>
                        </li>

                        <?php if ($verified) : ?>
                            <li>
                                <span class="fb-vendor-info-icon">✅</span>
                                <div>
                                    <span class="fb-vendor-info-label">
                                        Estado
                                    </span>
                                    <span class="fb-vendor-info-value"
                                          style="color:var(--fb-secondary);">
                                        Verificado por FreshBite
                                    </span>
                                </div>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>

                <!-- Redes sociales -->
                <?php if ($website || $instagram) : ?>
                    <div class="fb-vendor-info-card">
                        <h4 class="fb-vendor-info-title">
                            🔗 Encuéntranos
                        </h4>
                        <div style="display:flex;flex-direction:column;gap:10px;">
                            <?php if ($website) : ?>
                                <a href="<?php echo esc_url($website); ?>"
                                   target="_blank"
                                   rel="noopener"
                                   style="display:flex;align-items:center;
                                          gap:10px;padding:10px 14px;
                                          background:var(--fb-bg);
                                          border-radius:var(--fb-radius-sm);
                                          text-decoration:none;
                                          color:var(--fb-dark);
                                          font-family:var(--fb-font);
                                          font-size:0.85rem;
                                          border:1px solid var(--fb-border-gray);
                                          transition:var(--fb-transition);"
                                   class="fb-social-link">
                                    🌐
                                    <span><?php echo esc_html($website); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if ($instagram) : ?>
                                <a href="<?php echo esc_url($instagram); ?>"
                                   target="_blank"
                                   rel="noopener"
                                   style="display:flex;align-items:center;
                                          gap:10px;padding:10px 14px;
                                          background:rgba(225,48,108,0.06);
                                          border-radius:var(--fb-radius-sm);
                                          text-decoration:none;
                                          color:var(--fb-dark);
                                          font-family:var(--fb-font);
                                          font-size:0.85rem;
                                          border:1px solid rgba(225,48,108,0.15);
                                          transition:var(--fb-transition);"
                                   class="fb-social-link">
                                    📸
                                    <span>Instagram</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- CTA reserva rápida -->
                <div class="fb-vendor-info-card"
                     style="background:linear-gradient(135deg,
                             var(--fb-primary),var(--fb-primary-dark));
                             border:none;">
                    <h4 style="color:white;font-family:var(--fb-font);
                                font-size:1rem;font-weight:700;
                                margin-bottom:8px;">
                        📅 ¿Listo para Pedir?
                    </h4>
                    <p style="color:rgba(255,255,255,0.8);
                               font-size:0.85rem;
                               font-family:var(--fb-font);
                               margin-bottom:16px;line-height:1.5;">
                        Haz una reserva de pickup o delivery
                        directamente con este vendedor.
                    </p>
                    <a href="#fb-reservation-section"
                       class="fb-btn fb-btn-white fb-btn-sm"
                       style="width:100%;justify-content:center;">
                        Hacer Reserva →
                    </a>
                </div>

            </aside>

            <!-- ── CONTENIDO PRINCIPAL ───────────────────── -->
            <main>

                <!-- Tabs de navegación -->
                <div class="fb-vendor-tabs">
                    <button class="fb-vendor-tab active"
                            data-tab="productos">
                        🛒 Productos
                        <span class="fb-tab-count">
                            <?php echo esc_html($products); ?>
                        </span>
                    </button>
                    <button class="fb-vendor-tab"
                            data-tab="historia">
                        🌾 Historia
                    </button>
                    <button class="fb-vendor-tab"
                            data-tab="resenas">
                        ⭐ Reseñas
                        <span class="fb-tab-count">
                            <?php echo esc_html($reviews); ?>
                        </span>
                    </button>
                </div>

                <!-- TAB: PRODUCTOS -->
                <div class="fb-tab-content active" id="tab-productos">

                    <div id="fb-vendor-products">

                        <?php if (class_exists('WooCommerce')) :

                            // Intentar obtener productos del autor
                            $vendor_products = new WP_Query([
                                'post_type'      => 'product',
                                'posts_per_page' => 9,
                                'author'         => get_the_author_meta('ID'),
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            ]);

                            if ($vendor_products->have_posts()) :
                        ?>
                                <div class="fb-product-grid"
                                     style="grid-template-columns:repeat(3,1fr);">
                                    <?php while ($vendor_products->have_posts()) :
                                        $vendor_products->the_post();
                                        global $product;
                                        if (!$product) continue;
                                    ?>
                                        <div class="fb-product-card">
                                            <div class="fb-product-image">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(
                                                            'freshbite-product'
                                                        ); ?>
                                                    </a>
                                                <?php else : ?>
                                                    <a href="<?php the_permalink(); ?>"
                                                       style="display:flex;
                                                              align-items:center;
                                                              justify-content:center;
                                                              height:100%;
                                                              font-size:4rem;">
                                                        <?php echo esc_html($emoji); ?>
                                                    </a>
                                                <?php endif; ?>
                                                <?php echo freshbite_product_badge($product); ?>
                                                <button class="fb-product-wishlist">♡</button>
                                            </div>
                                            <div class="fb-product-body">
                                                <a href="<?php the_permalink(); ?>"
                                                   class="fb-product-name">
                                                    <?php the_title(); ?>
                                                </a>
                                                <div class="fb-product-rating">
                                                    <?php echo freshbite_stars(
                                                        $product->get_average_rating() ?: 5
                                                    ); ?>
                                                    <span class="fb-rating-count">
                                                        (<?php echo $product->get_review_count(); ?>)
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="fb-product-footer">
                                                <div class="fb-product-price">
                                                    <?php if ($product->is_on_sale()) : ?>
                                                        <span class="fb-price-old">
                                                            <?php echo wc_price(
                                                                $product->get_regular_price()
                                                            ); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                    <span class="fb-price-current">
                                                        <?php echo wc_price(
                                                            $product->get_price()
                                                        ); ?>
                                                    </span>
                                                </div>
                                                <a href="<?php echo esc_url(
                                                       $product->add_to_cart_url()
                                                   ); ?>"
                                                   class="fb-add-to-cart">
                                                    🛒
                                                </a>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>

                        <?php
                            else :
                                // Fallback si no hay productos asignados
                        ?>
                                <div class="fb-vendor-no-products">
                                    <span>🌱</span>
                                    <p>
                                        Los productos de este vendedor
                                        estarán disponibles pronto.
                                    </p>
                                    <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                                       class="fb-btn fb-btn-primary">
                                        Ver Otros Productos
                                    </a>
                                </div>
                        <?php
                            endif;

                        else :
                            // Fallback sin WooCommerce
                            $fallback_prod = [
                                ['🍎', 'Manzanas Honeycrisp Orgánicas', '\$4.99',  '\$6.99', '/lb'],
                                ['🍅', 'Tomates Heirloom Mixtos',       '\$3.99',  '\$5.49', '/lb'],
                                ['🥕', 'Zanahorias de Temporada',       '\$2.99',  '',      '/lb'],
                                ['🫑', 'Pimientos Coloridos Mixtos',    '\$4.49',  '',      '/lb'],
                                ['🥬', 'Lechuga Romana Orgánica',       '\$2.49',  '',      '/unidad'],
                                ['🌽', 'Maíz Dulce de Temporada',       '\$0.99',  '',      '/oreja'],
                            ];
                        ?>
                            <div class="fb-product-grid"
                                 style="grid-template-columns:repeat(3,1fr);">
                                <?php foreach ($fallback_prod as [
                                    $em, $nom, $precio, $old, $unidad
                                ]) : ?>
                                    <div class="fb-product-card">
                                        <div class="fb-product-image"
                                             style="display:flex;
                                                    align-items:center;
                                                    justify-content:center;
                                                    font-size:4rem;">
                                            <?php echo $em; ?>
                                            <span class="fb-product-badge fb-badge-organic">
                                                Orgánico
                                            </span>
                                            <button class="fb-product-wishlist">♡</button>
                                        </div>
                                        <div class="fb-product-body">
                                            <span class="fb-product-vendor">
                                                <?php the_title(); ?>
                                            </span>
                                            <a href="<?php echo esc_url(
                                                   home_url('/tienda')
                                               ); ?>"
                                               class="fb-product-name">
                                                <?php echo esc_html($nom); ?>
                                            </a>
                                            <div class="fb-product-rating">
                                                <span class="fb-stars">★★★★★</span>
                                            </div>
                                        </div>
                                        <div class="fb-product-footer">
                                            <div class="fb-product-price">
                                                <?php if ($old) : ?>
                                                    <span class="fb-price-old">
                                                        <?php echo esc_html($old); ?>
                                                    </span>
                                                <?php endif; ?>
                                                <span class="fb-price-current">
                                                    <?php echo esc_html($precio); ?>
                                                </span>
                                                <span class="fb-price-unit">
                                                    <?php echo esc_html($unidad); ?>
                                                </span>
                                            </div>
                                            <a href="<?php echo esc_url(
                                                   home_url('/tienda')
                                               ); ?>"
                                               class="fb-add-to-cart">
                                                🛒
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div><!-- /#fb-vendor-products -->

                </div><!-- /#tab-productos -->

                <!-- TAB: HISTORIA -->
                <div class="fb-tab-content" id="tab-historia">

                    <div class="fb-vendor-story-content">

                        <!-- Historia completa -->
                        <div class="fb-vendor-story-block">
                            <h3>
                                Nuestra Historia
                            </h3>
                            <?php if (get_the_content()) :
                                the_content();
                            elseif ($story) : ?>
                                <p><?php echo esc_html($story); ?></p>
                            <?php else : ?>
                                <p style="color:var(--fb-gray-400);
                                           font-family:var(--fb-font);">
                                    Este vendedor aún no ha compartido
                                    su historia. ¡Próximamente!
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Certificaciones -->
                        <div class="fb-vendor-certifications">
                            <h3>Certificaciones y Prácticas</h3>
                            <div style="display:grid;
                                        grid-template-columns:repeat(2,1fr);
                                        gap:16px;margin-top:20px;">
                                <?php
                                $certs = [
                                    ['🌿', 'USDA Orgánico',        'Certificación oficial orgánica'],
                                    ['🐄', 'Bienestar Animal',     'Animales tratados con respeto'],
                                    ['💧', 'Agua Responsable',     'Riego eficiente y sostenible'],
                                    ['🌍', 'Carbono Neutro',       'Compensamos nuestras emisiones'],
                                ];
                                foreach ($certs as [$icon, $titulo, $desc]) :
                                ?>
                                    <div style="display:flex;gap:12px;
                                                padding:16px;
                                                background:var(--fb-bg);
                                                border-radius:var(--fb-radius-sm);
                                                border:1px solid var(--fb-border-gray);">
                                        <span style="font-size:1.4rem;
                                                     flex-shrink:0;">
                                            <?php echo $icon; ?>
                                        </span>
                                        <div>
                                            <strong style="font-family:var(--fb-font);
                                                           font-size:0.88rem;
                                                           color:var(--fb-dark);
                                                           display:block;
                                                           margin-bottom:2px;">
                                                <?php echo esc_html($titulo); ?>
                                            </strong>
                                            <span style="font-size:0.78rem;
                                                         color:var(--fb-gray-400);
                                                         font-family:var(--fb-font);">
                                                <?php echo esc_html($desc); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>

                </div><!-- /#tab-historia -->

                <!-- TAB: RESEÑAS -->
                <div class="fb-tab-content" id="tab-resenas">

                    <!-- Resumen de calificación -->
                    <div class="fb-reviews-summary">

                        <div class="fb-reviews-score">
                            <span class="fb-reviews-big-num">
                                <?php echo esc_html($rating); ?>
                            </span>
                            <div>
                                <?php echo freshbite_stars(floatval($rating)); ?>
                                <span style="font-size:0.82rem;
                                             color:var(--fb-gray-400);
                                             font-family:var(--fb-font);
                                             display:block;margin-top:4px;">
                                    Basado en
                                    <?php echo esc_html($reviews); ?> reseñas
                                </span>
                            </div>
                        </div>

                        <!-- Barras de calificación -->
                        <div class="fb-reviews-bars">
                            <?php
                            $bars = [
                                [5, 72],
                                [4, 18],
                                [3, 6],
                                [2, 3],
                                [1, 1],
                            ];
                            foreach ($bars as [$stars, $pct]) :
                            ?>
                                <div class="fb-review-bar-row">
                                    <span class="fb-review-bar-label">
                                        <?php echo $stars; ?> ★
                                    </span>
                                    <div class="fb-review-bar-track">
                                        <div class="fb-review-bar-fill"
                                             style="width:<?php echo $pct; ?>%;">
                                        </div>
                                    </div>
                                    <span class="fb-review-bar-pct">
                                        <?php echo $pct; ?>%
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <!-- Reseñas individuales -->
                    <div class="fb-reviews-list">
                        <?php
                        $resenas_fallback = [
                            [
                                '😊', 'María García',
                                'Chef en Casa · Miami, FL',
                                5,
                                'Los productos de esta granja son increíbles. Las manzanas llegan siempre frescas y con un sabor que no encontrarás en ningún supermercado. ¡Totalmente recomendado!',
                                'Hace 2 días',
                                'Manzanas Orgánicas',
                            ],
                            [
                                '👨‍🍳', 'Chef Marco R.',
                                'Restaurante · Nueva York',
                                5,
                                'Como chef profesional, necesito la mejor calidad. Esta granja nunca me decepciona. Los tomates heirloom son simplemente perfectos para mis platos.',
                                'Hace 1 semana',
                                'Tomates Heirloom',
                            ],
                            [
                                '🌱', 'Ana Martínez',
                                'Nutricionista · Portland',
                                4,
                                'Excelente calidad y frescura. El delivery siempre llega a tiempo y bien empacado. Solo le quitaría una estrella porque una vez tuve un pedido incompleto, aunque lo resolvieron muy rápido.',
                                'Hace 2 semanas',
                                'Verduras Mixtas',
                            ],
                        ];
                        foreach ($resenas_fallback as [
                            $av, $nombre, $rol,
                            $rat, $texto, $cuando, $producto
                        ]) :
                        ?>
                            <div class="fb-review-card">
                                <div class="fb-review-header">
                                    <div class="fb-review-avatar">
                                        <?php echo $av; ?>
                                    </div>
                                    <div class="fb-review-meta">
                                        <span class="fb-review-name">
                                            <?php echo esc_html($nombre); ?>
                                        </span>
                                        <span class="fb-review-role">
                                            <?php echo esc_html($rol); ?>
                                        </span>
                                    </div>
                                    <div style="margin-left:auto;text-align:right;">
                                        <?php echo freshbite_stars($rat); ?>
                                        <span style="font-size:0.75rem;
                                                     color:var(--fb-gray-300);
                                                     font-family:var(--fb-font);
                                                     display:block;">
                                            <?php echo esc_html($cuando); ?>
                                        </span>
                                    </div>
                                </div>
                                <p class="fb-review-text">
                                    "<?php echo esc_html($texto); ?>"
                                </p>
                                <span style="font-size:0.75rem;
                                             color:var(--fb-primary);
                                             font-family:var(--fb-font);
                                             font-weight:600;">
                                    🛒 Compró: <?php echo esc_html($producto); ?>
                                    · ✅ Compra verificada
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div><!-- /#tab-resenas -->

            </main><!-- /.main -->

        </div><!-- /.fb-vendor-single-layout -->
    </div><!-- /.fb-container -->
</section>

<!-- ============================================================
     SECCIÓN RESERVA — ESPECÍFICA DEL VENDEDOR
     ============================================================ -->
<section id="fb-reservation-section"
         style="background:linear-gradient(135deg,var(--fb-dark) 0%,
                #2D1B08 100%);padding:80px 0;">
    <div class="fb-container">
        <div class="fb-reservation-inner">

            <!-- Texto -->
            <div class="fb-reservation-content">
                <span class="fb-label"
                      style="color:rgba(255,255,255,0.7);">
                    Pedido Directo
                </span>
                <h2 style="color:white;margin-top:8px;">
                    Reserva con<br>
                    <span style="color:var(--fb-accent);">
                        <?php the_title(); ?>
                    </span>
                </h2>
                <p style="color:rgba(255,255,255,0.7);
                           margin-top:12px;font-size:1.05rem;
                           font-family:var(--fb-font);line-height:1.7;">
                    Haz tu pedido directamente con este vendedor.
                    Elige entre pickup en la granja o delivery a domicilio.
                </p>

                <div class="fb-reservation-features">
                    <?php
                    $features = [
                        ['🌿', '100% Fresco',          'Cosechado el mismo día de tu pedido'],
                        ['⚡', 'Confirmación Inmediata', 'Recibe tu email al instante'],
                        ['💯', 'Sin Costo de Reserva',   'Solo pagas tus productos'],
                    ];
                    foreach ($features as [$icon, $titulo, $desc]) :
                    ?>
                        <div class="fb-res-feature">
                            <span class="fb-res-feature-icon">
                                <?php echo $icon; ?>
                            </span>
                            <div>
                                <strong><?php echo esc_html($titulo); ?></strong>
                                <span><?php echo esc_html($desc); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Formulario -->
            <div class="fb-reservation-form-card">

                <h3 style="font-family:var(--fb-font);font-size:1.2rem;
                            font-weight:700;color:var(--fb-dark);
                            margin-bottom:4px;">
                    📅 Hacer una Reserva
                </h3>
                <p style="font-size:0.82rem;color:var(--fb-primary);
                           font-family:var(--fb-font);font-weight:600;
                           margin-bottom:20px;">
                    con <?php the_title(); ?>
                </p>

                <form id="fb-reservation-form">
                    <!-- Vendedor pre-seleccionado -->
                    <input type="hidden"
                           name="vendor"
                           value="<?php the_title(); ?>">

                    <div class="fb-form-row">
                        <div class="fb-form-group">
                            <label for="res-name">Nombre completo *</label>
                            <input type="text"
                                   id="res-name"
                                   name="name"
                                   placeholder="ej. María García"
                                   required>
                        </div>
                        <div class="fb-form-group">
                            <label for="res-email">Correo electrónico *</label>
                            <input type="email"
                                   id="res-email"
                                   name="email"
                                   placeholder="tu@correo.com"
                                   required>
                        </div>
                    </div>

                    <div class="fb-form-group">
                        <label>Tipo de servicio *</label>
                        <div class="fb-service-type-grid">

                            <?php if ($pickup) : ?>
                                <label class="fb-service-type-card">
                                    <input type="radio"
                                           name="type"
                                           value="pickup"
                                           checked>
                                    <div class="fb-service-type-content">
                                        <span class="fb-service-icon">🏪</span>
                                        <strong>Pickup</strong>
                                        <span>Recoge en la granja</span>
                                    </div>
                                </label>
                            <?php endif; ?>

                            <?php if ($delivery) : ?>
                                <label class="fb-service-type-card">
                                    <input type="radio"
                                           name="type"
                                           value="delivery"
                                           <?php echo !$pickup ? 'checked' : ''; ?>>
                                    <div class="fb-service-type-content">
                                        <span class="fb-service-icon">🚚</span>
                                        <strong>Delivery</strong>
                                        <span>Te lo llevamos a casa</span>
                                    </div>
                                </label>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="fb-form-row">
                        <div class="fb-form-group">
                            <label for="res-date-vendor">Fecha *</label>
                            <input type="date"
                                   id="res-date-vendor"
                                   name="date"
                                   min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                                   required>
                        </div>
                        <div class="fb-form-group">
                            <label for="res-time-vendor">Hora *</label>
                            <select id="res-time-vendor" name="time" required>
                                <option value="">Seleccionar</option>
                                <?php
                                $horas = [
                                    '8:00am','9:00am','10:00am',
                                    '11:00am','12:00pm','1:00pm',
                                    '2:00pm','3:00pm','4:00pm','5:00pm',
                                ];
                                foreach ($horas as $hora) :
                                ?>
                                    <option value="<?php echo $hora; ?>">
                                        <?php echo $hora; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="fb-form-group">
                        <label for="res-items-vendor">
                            Productos que deseas
                        </label>
                        <textarea id="res-items-vendor"
                                  name="items"
                                  rows="3"
                                  placeholder="ej. 2 lb manzanas, 1 docena huevos...">
                        </textarea>
                    </div>

                    <button type="submit"
                            id="fb-res-submit"
                            class="fb-btn fb-btn-primary"
                            style="width:100%;justify-content:center;">
                        📅 Confirmar Reserva
                    </button>

                    <p id="fb-reservation-msg"
                       style="text-align:center;margin-top:12px;
                              font-size:0.9rem;min-height:24px;
                              font-family:var(--fb-font);">
                    </p>

                </form>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     OTROS VENDEDORES
     ============================================================ -->
<section style="background:var(--fb-white);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-flex-between" style="margin-bottom:32px;">
            <div>
                <span class="fb-label">Explorar Más</span>
                <h2 style="margin-top:8px;">Otros Vendedores</h2>
            </div>
            <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
               class="fb-btn fb-btn-outline">
                Ver Todos →
            </a>
        </div>

        <?php
        $otros = new WP_Query([
            'post_type'      => 'fb_vendor',
            'posts_per_page' => 4,
            'post__not_in'   => [$pid],
            'orderby'        => 'rand',
        ]);

        $fallback_otros = [
            ['🍞', 'Artisan Bakes Co.',  'Pan Artesanal',          '5.0', 'Portland, OR'],
            ['🐄', 'Happy Cow Dairy',    'Lácteos Naturales',      '4.9', 'Vermont'],
            ['🍯', 'Blue Sky Apiaries',  'Miel y Productos Abeja', '4.8', 'Montana'],
            ['🥚', 'Sunny Side Farm',    'Huevos de Granja',       '5.0', 'Pennsylvania'],
        ];

        $tiene_otros = $otros->have_posts();
        ?>

        <div class="fb-grid-4">

            <?php if ($tiene_otros) : ?>
                <?php while ($otros->have_posts()) :
                    $otros->the_post();
                    $o_id    = get_the_ID();
                    $o_emoji = get_post_meta($o_id, 'fb_vendor_emoji',    true) ?: '🏪';
                    $o_spec  = get_post_meta($o_id, 'fb_vendor_specialty', true);
                    $o_rat   = get_post_meta($o_id, 'fb_vendor_rating',    true) ?: '5';
                    $o_loc   = get_post_meta($o_id, 'fb_vendor_location',  true);
                ?>
                    <div class="fb-vendor-card">
                        <div class="fb-vendor-avatar">
                            <?php if (has_post_thumbnail()) :
                                the_post_thumbnail('freshbite-thumb');
                            else :
                                echo $o_emoji;
                            endif; ?>
                        </div>
                        <h4 class="fb-vendor-name">
                            <?php the_title(); ?>
                        </h4>
                        <p style="font-size:0.82rem;
                                   color:var(--fb-gray-400);
                                   text-align:center;
                                   font-family:var(--fb-font);">
                            <?php echo esc_html($o_spec); ?>
                        </p>
                        <p style="font-size:0.75rem;
                                   color:var(--fb-gray-300);
                                   font-family:var(--fb-font);">
                            📍 <?php echo esc_html($o_loc); ?>
                        </p>
                        <?php echo freshbite_stars(floatval($o_rat)); ?>
                        <a href="<?php the_permalink(); ?>"
                           class="fb-btn fb-btn-outline fb-btn-sm"
                           style="width:100%;justify-content:center;
                                  margin-top:8px;">
                            Ver Tienda →
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php else : ?>
                <?php foreach ($fallback_otros as [
                    $em, $nom, $sp, $rat, $loc
                ]) : ?>
                    <div class="fb-vendor-card">
                        <div class="fb-vendor-avatar"><?php echo $em; ?></div>
                        <h4 class="fb-vendor-name">
                            <?php echo esc_html($nom); ?>
                        </h4>
                        <p style="font-size:0.82rem;
                                   color:var(--fb-gray-400);
                                   text-align:center;
                                   font-family:var(--fb-font);">
                            <?php echo esc_html($sp); ?>
                        </p>
                        <p style="font-size:0.75rem;
                                   color:var(--fb-gray-300);
                                   font-family:var(--fb-font);">
                            📍 <?php echo esc_html($loc); ?>
                        </p>
                        <?php echo freshbite_stars(floatval($rat)); ?>
                        <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                           class="fb-btn fb-btn-outline fb-btn-sm"
                           style="width:100%;justify-content:center;
                                  margin-top:8px;">
                            Ver Tienda →
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>
</section>

<?php get_footer(); ?>