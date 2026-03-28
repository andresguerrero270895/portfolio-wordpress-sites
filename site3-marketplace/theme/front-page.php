<?php
/**
 * FreshBite Theme — front-page.php
 * Idioma: Español
 * 7 secciones: Hero, Stats, Categorías, Productos,
 * Banner Promo, Vendedores, Testimonios
 */
defined('ABSPATH') || exit;

get_header();
?>

<!-- ============================================================
     SECCIÓN 1 — HERO
     ============================================================ -->
<section class="fb-hero">
    <div class="fb-container">
        <div class="fb-hero-inner">

            <!-- IZQUIERDA — Texto + Buscador -->
            <div class="fb-hero-content">

                <div class="fb-hero-label">
                    🌿 100% Fresco y Local
                </div>

                <h1>
                    Tu Mercado de<br>
                    <span>Comida Fresca</span><br>
                    Local
                </h1>

                <p class="fb-hero-desc">
                    Compra directamente de agricultores locales, productores
                    artesanales y especialistas en alimentos. Ingredientes frescos
                    entregados en tu puerta, apoyando comunidades con cada pedido.
                </p>

                <!-- Buscador hero -->
                <div class="fb-hero-search">
                    <select name="product_cat" aria-label="Categoría">
                        <option value="">Todas las Categorías</option>
                        <?php
                        $cats = freshbite_get_product_categories();
                        if (!is_wp_error($cats) && !empty($cats)) :
                            foreach ($cats as $cat) :
                        ?>
                            <option value="<?php echo esc_attr($cat->slug); ?>">
                                <?php echo esc_html($cat->name); ?>
                            </option>
                        <?php
                            endforeach;
                        else :
                        ?>
                            <option value="frutas">🍎 Frutas</option>
                            <option value="verduras">🥦 Verduras</option>
                            <option value="lacteos">🥛 Lácteos</option>
                            <option value="carnes">🥩 Carnes</option>
                            <option value="panaderia">🍞 Panadería</option>
                            <option value="organico">🌿 Orgánicos</option>
                        <?php endif; ?>
                    </select>
                    <form method="get"
                          action="<?php echo esc_url(home_url('/tienda')); ?>"
                          style="flex:1;display:flex;">
                        <input
                            type="search"
                            name="s"
                            placeholder="Buscar frutas, verduras, lácteos..."
                            autocomplete="off"
                            style="flex:1;"
                        >
                        <input type="hidden" name="post_type" value="product">
                        <button type="submit">🔍 Buscar</button>
                    </form>
                </div>

                <!-- Búsquedas populares -->
                <div class="fb-hero-tags">
                    <span>Popular:</span>
                    <?php
                    $populares = [
                        'Manzanas Orgánicas',
                        'Ensaladas Frescas',
                        'Pan Artesanal',
                        'Huevos de Granja',
                        'Miel Natural',
                    ];
                    foreach ($populares as $tag) :
                    ?>
                        <a href="<?php echo esc_url(home_url('/tienda/?s=' . urlencode($tag))); ?>"
                           class="fb-hero-tag">
                            <?php echo esc_html($tag); ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- CTAs hero -->
                <div style="display:flex;gap:16px;margin-top:32px;flex-wrap:wrap;">
                    <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                       class="fb-btn fb-btn-primary fb-btn-lg">
                        🛒 Comprar Ahora
                    </a>
                    <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                       class="fb-btn fb-btn-outline fb-btn-lg">
                        🏪 Ver Vendedores
                    </a>
                </div>

            </div><!-- /.fb-hero-content -->

            <!-- DERECHA — Visual -->
            <div class="fb-hero-visual">

                <div class="fb-hero-image">🥗</div>

                <!-- Tarjeta stat 1 -->
                <div class="fb-hero-stats-card card-1">
                    <div class="fb-hero-stat-icon orange">🏪</div>
                    <div>
                        <div class="fb-hero-stat-value">200+</div>
                        <div class="fb-hero-stat-label">Vendedores Locales</div>
                    </div>
                </div>

                <!-- Tarjeta stat 2 -->
                <div class="fb-hero-stats-card card-2">
                    <div class="fb-hero-stat-icon green">⭐</div>
                    <div>
                        <div class="fb-hero-stat-value">4.9/5</div>
                        <div class="fb-hero-stat-label">Calificación Clientes</div>
                    </div>
                </div>

            </div><!-- /.fb-hero-visual -->

        </div><!-- /.fb-hero-inner -->
    </div><!-- /.fb-container -->
</section>

<!-- ============================================================
     SECCIÓN 2 — BARRA DE ESTADÍSTICAS
     ============================================================ -->
<section style="background:var(--fb-primary);padding:20px 0;">
    <div class="fb-container">
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:24px;text-align:center;">
            <?php
            $stats = [
                ['🥬', '5,000+',  'Productos Frescos'],
                ['🏪', '200+',    'Vendedores Locales'],
                ['😊', '50,000+', 'Clientes Felices'],
                ['🚚', '24h',     'Entrega Rápida'],
            ];
            foreach ($stats as [$icon, $num, $label]) :
            ?>
                <div style="color:white;">
                    <div style="font-size:1.5rem;margin-bottom:4px;">
                        <?php echo $icon; ?>
                    </div>
                    <div style="font-size:1.4rem;font-weight:700;font-family:var(--fb-font);line-height:1;">
                        <?php echo $num; ?>
                    </div>
                    <div style="font-size:0.82rem;opacity:0.8;font-family:var(--fb-font);margin-top:4px;">
                        <?php echo $label; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SECCIÓN 3 — CATEGORÍAS
     ============================================================ -->
<section class="fb-categories">
    <div class="fb-container">

        <div class="fb-section-header" style="margin-bottom:40px;">
            <span class="fb-label">Explorar</span>
            <h2>Compra por Categoría</h2>
            <p>
                Encuentra exactamente lo que buscas en nuestras
                categorías de alimentos frescos
            </p>
        </div>

        <?php
        $categorias = freshbite_get_product_categories();

        $fallback_cats = [
            ['🍎', 'Frutas Frescas',    'frutas',    '124 productos'],
            ['🥦', 'Verduras',          'verduras',  '89 productos'],
            ['🥛', 'Lácteos y Huevos',  'lacteos',   '67 productos'],
            ['🥩', 'Carnes y Aves',     'carnes',    '54 productos'],
            ['🍞', 'Panadería',         'panaderia', '43 productos'],
            ['🫙', 'Despensa',          'despensa',  '112 productos'],
            ['🧃', 'Bebidas',           'bebidas',   '78 productos'],
            ['🌿', 'Orgánicos',         'organico',  '96 productos'],
            ['🐟', 'Mariscos',          'mariscos',  '38 productos'],
            ['❄️', 'Congelados',        'congelados','61 productos'],
            ['🍿', 'Snacks Naturales',  'snacks',    '85 productos'],
            ['🌱', 'Hierbas y Especias','hierbas',   '47 productos'],
        ];

        $tiene_cats = !is_wp_error($categorias) && !empty($categorias);
        ?>

        <div class="fb-category-grid"
             style="grid-template-columns:repeat(6,1fr);">

            <?php if ($tiene_cats) : ?>
                <?php foreach (array_slice($categorias, 0, 12) as $i => $cat) :
                    $link  = get_term_link($cat);
                    $emoji = freshbite_category_emoji($cat->slug);
                    $color = freshbite_category_color($i);
                ?>
                    <a href="<?php echo esc_url($link); ?>"
                       class="fb-category-card">
                        <div class="fb-category-icon"
                             style="background:<?php echo $color; ?>">
                            <?php echo $emoji; ?>
                        </div>
                        <span class="fb-category-name">
                            <?php echo esc_html($cat->name); ?>
                        </span>
                        <span class="fb-category-count">
                            <?php echo esc_html($cat->count); ?> productos
                        </span>
                    </a>
                <?php endforeach; ?>

            <?php else : ?>
                <?php foreach ($fallback_cats as $i => [$emoji, $name, $slug, $count]) : ?>
                    <a href="<?php echo esc_url(home_url('/tienda/?product_cat=' . $slug)); ?>"
                       class="fb-category-card">
                        <div class="fb-category-icon"
                             style="background:<?php echo freshbite_category_color($i); ?>">
                            <?php echo $emoji; ?>
                        </div>
                        <span class="fb-category-name">
                            <?php echo esc_html($name); ?>
                        </span>
                        <span class="fb-category-count">
                            <?php echo esc_html($count); ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <div style="text-align:center;margin-top:32px;">
            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
               class="fb-btn fb-btn-outline">
                Ver Todas las Categorías →
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
     SECCIÓN 4 — PRODUCTOS DESTACADOS
     ============================================================ -->
<section class="fb-section" style="background:var(--fb-bg);">
    <div class="fb-container">

        <div class="fb-flex-between"
             style="margin-bottom:40px;flex-wrap:wrap;gap:16px;">
            <div>
                <span class="fb-label">Selección Especial</span>
                <h2 style="margin-top:8px;">Productos Destacados</h2>
            </div>
            <div style="display:flex;gap:8px;flex-wrap:wrap;">
                <a href="<?php echo esc_url(home_url('/tienda/?orderby=popularity')); ?>"
                   class="fb-btn fb-btn-outline fb-btn-sm">
                    Más Vendidos
                </a>
                <a href="<?php echo esc_url(home_url('/tienda/?orderby=date')); ?>"
                   class="fb-btn fb-btn-outline fb-btn-sm">
                    Nuevos
                </a>
                <a href="<?php echo esc_url(home_url('/tienda/?on_sale=1')); ?>"
                   class="fb-btn fb-btn-secondary fb-btn-sm">
                    🔥 En Oferta
                </a>
            </div>
        </div>

        <?php
        $productos = freshbite_get_featured_products(8);

        $fallback_productos = [
            ['🍎', 'Manzanas Honeycrisp Orgánicas', 'Granja Green Valley',   '4.9', '(128)', '\$4.99',  '\$6.99', '/lb',       'Orgánico', true],
            ['🥦', 'Corona de Brócoli Fresco',      'Lo Mejor de la Natura', '4.8', '(94)',  '\$2.49',  '',      '/unidad',   'Local',    false],
            ['🥛', 'Leche Entera Natural',           'Dairy Happy Cow',       '5.0', '(203)', '\$5.99',  '',      '/galón',    'Orgánico', false],
            ['🍞', 'Pan de Masa Madre Artesanal',    'Artisan Bakes Co.',     '4.9', '(167)', '\$7.99',  '',      '/unidad',   'Nuevo',    false],
            ['🍅', 'Tomates Heirloom',               'Jardines Sunrise',      '4.7', '(88)',  '\$3.99',  '\$5.49', '/lb',       'Oferta',   true],
            ['🥚', 'Huevos de Granja Libres',        'Sunny Side Farm',       '5.0', '(312)', '\$6.49',  '',      '/docena',   'Local',    false],
            ['🍯', 'Miel Silvestre Natural',         'Blue Sky Apiaries',     '4.9', '(76)',  '\$12.99', '\$15.99','/16oz',     'Orgánico', true],
            ['🫐', 'Arándanos Frescos',              'Berry Good Farm',       '4.8', '(145)', '\$5.99',  '',      '/pinta',    'Nuevo',    false],
        ];

        $tiene_productos = $productos->have_posts();
        ?>

        <div class="fb-product-grid"
             style="grid-template-columns:repeat(4,1fr);">

            <?php if ($tiene_productos) : ?>

                <?php while ($productos->have_posts()) :
                    $productos->the_post();
                    global $product;
                    if (!$product) continue;
                ?>
                    <div class="fb-product-card">

                        <!-- Imagen -->
                        <div class="fb-product-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('freshbite-product'); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>"
                                   style="display:flex;align-items:center;
                                          justify-content:center;height:100%;
                                          font-size:4rem;">
                                    🛒
                                </a>
                            <?php endif; ?>

                            <?php echo freshbite_product_badge($product); ?>

                            <button class="fb-product-wishlist"
                                    aria-label="Agregar a favoritos">
                                ♡
                            </button>
                        </div>

                        <!-- Cuerpo -->
                        <div class="fb-product-body">
                            <span class="fb-product-vendor">
                                <?php echo esc_html(get_the_author()); ?>
                            </span>
                            <a href="<?php the_permalink(); ?>"
                               class="fb-product-name">
                                <?php the_title(); ?>
                            </a>
                            <div class="fb-product-rating">
                                <?php
                                $rating = $product->get_average_rating();
                                echo freshbite_stars($rating ?: 5);
                                ?>
                                <span class="fb-rating-count">
                                    (<?php echo $product->get_review_count(); ?>)
                                </span>
                            </div>
                        </div>

                        <!-- Pie -->
                        <div class="fb-product-footer">
                            <div class="fb-product-price">
                                <?php if ($product->is_on_sale()) : ?>
                                    <span class="fb-price-old">
                                        <?php echo wc_price($product->get_regular_price()); ?>
                                    </span>
                                <?php endif; ?>
                                <span class="fb-price-current">
                                    <?php echo wc_price($product->get_price()); ?>
                                </span>
                            </div>
                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                               class="fb-add-to-cart"
                               aria-label="Agregar al carrito">
                                🛒
                            </a>
                        </div>

                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php else : ?>

                <?php foreach ($fallback_productos as [
                    $emoji, $nombre, $vendedor, $rating,
                    $resenas, $precio, $precio_old,
                    $unidad, $tipo_badge, $show
                ]) :
                    $badge_class = match($tipo_badge) {
                        'Orgánico' => 'fb-badge-organic',
                        'Oferta'   => 'fb-badge-sale',
                        'Nuevo'    => 'fb-badge-new',
                        'Local'    => 'fb-badge-local',
                        default    => '',
                    };
                ?>
                    <div class="fb-product-card">

                        <div class="fb-product-image"
                             style="display:flex;align-items:center;
                                    justify-content:center;font-size:4.5rem;">
                            <?php echo $emoji; ?>
                            <span class="fb-product-badge <?php echo $badge_class; ?>">
                                <?php echo $tipo_badge; ?>
                            </span>
                            <button class="fb-product-wishlist">♡</button>
                        </div>

                        <div class="fb-product-body">
                            <span class="fb-product-vendor">
                                <?php echo esc_html($vendedor); ?>
                            </span>
                            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                               class="fb-product-name">
                                <?php echo esc_html($nombre); ?>
                            </a>
                            <div class="fb-product-rating">
                                <span class="fb-stars">★★★★★</span>
                                <span class="fb-rating-count">
                                    <?php echo $rating; ?> <?php echo $resenas; ?>
                                </span>
                            </div>
                        </div>

                        <div class="fb-product-footer">
                            <div class="fb-product-price">
                                <?php if ($precio_old) : ?>
                                    <span class="fb-price-old">
                                        <?php echo esc_html($precio_old); ?>
                                    </span>
                                <?php endif; ?>
                                <span class="fb-price-current">
                                    <?php echo esc_html($precio); ?>
                                </span>
                                <span class="fb-price-unit">
                                    <?php echo esc_html($unidad); ?>
                                </span>
                            </div>
                            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                               class="fb-add-to-cart">
                                🛒
                            </a>
                        </div>

                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div><!-- /.fb-product-grid -->

        <div style="text-align:center;margin-top:40px;">
            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
               class="fb-btn fb-btn-primary fb-btn-lg">
                Ver Todos los Productos →
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
     SECCIÓN 5 — BANNER PROMOCIONAL
     ============================================================ -->
<section class="fb-promo-section">
    <div class="fb-container">

        <div class="fb-promo-grid">

            <!-- Banner principal -->
            <div class="fb-promo-card main">
                <span class="fb-promo-label">Oferta por Tiempo Limitado</span>
                <h3 class="fb-promo-title">
                    30% de Descuento<br>en tu Primer Pedido
                </h3>
                <p class="fb-promo-desc">
                    Usa el código <strong>FRESCO30</strong> al pagar.<br>
                    Válido solo para nuevos clientes.
                </p>
                <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                   class="fb-promo-btn">
                    Comprar Ahora →
                </a>
                <span class="fb-promo-emoji">🥕</span>
            </div>

            <!-- Banner 2 -->
            <div class="fb-promo-card green">
                <span class="fb-promo-label">Especial de Fin de Semana</span>
                <h3 class="fb-promo-title">
                    Envío Gratis<br>en Pedidos +\$35
                </h3>
                <p class="fb-promo-desc">
                    Todos los fines de semana, pedidos mayores a \$35.
                </p>
                <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                   class="fb-promo-btn">
                    Más Info →
                </a>
                <span class="fb-promo-emoji">🚚</span>
            </div>

            <!-- Banner 3 -->
            <div class="fb-promo-card dark">
                <span class="fb-promo-label">Únete como Vendedor</span>
                <h3 class="fb-promo-title">
                    Vende tus<br>Productos Aquí
                </h3>
                <p class="fb-promo-desc">
                    Más de 200 vendedores ya generan ingresos con FreshBite.
                </p>
                <?php if (class_exists('WeDevs_Dokan')) : ?>
                    <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>"
                       class="fb-promo-btn">
                        Empezar a Vender →
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/contacto')); ?>"
                       class="fb-promo-btn">
                        Empezar a Vender →
                    </a>
                <?php endif; ?>
                <span class="fb-promo-emoji">🏪</span>
            </div>

        </div><!-- /.fb-promo-grid -->

    </div>
</section>

<!-- ============================================================
     SECCIÓN 6 — VENDEDORES DESTACADOS
     ============================================================ -->
<section class="fb-section" style="background:var(--fb-white);">
    <div class="fb-container">

        <div class="fb-section-header">
            <span class="fb-label">Nuestra Comunidad</span>
            <h2>Conoce a Nuestros Mejores Vendedores</h2>
            <p>
                Agricultores, panaderos y productores reales que traen
                los alimentos más frescos directamente a tu mesa.
            </p>
        </div>

        <?php
        $vendedores = freshbite_get_vendors(4);

        $fallback_vendedores = [
            ['🌾', 'Granja Green Valley',   'Frutas y Verduras Orgánicas', 'California, USA', '1.2k', '4.9', '3 años',  'Top Vendedor'],
            ['🍞', 'Artisan Bakes Co.',      'Pan de Masa Madre y Pasteles','Portland, OR',    '456',  '5.0', '2 años',  'Mejor Calificado'],
            ['🐄', 'Happy Cow Dairy',        'Leche Natural y Quesos',      'Vermont, USA',    '289',  '4.9', '4 años',  'Verificado'],
            ['🍯', 'Blue Sky Apiaries',      'Miel y Productos de Abeja',   'Montana, USA',    '134',  '4.8', '5 años',  'Cert. Orgánico'],
        ];

        $tiene_vendedores = $vendedores->have_posts();
        ?>

        <div class="fb-grid-4">

            <?php if ($tiene_vendedores) : ?>

                <?php while ($vendedores->have_posts()) :
                    $vendedores->the_post();
                    $pid      = get_the_ID();
                    $emoji    = freshbite_vendor_meta($pid, 'fb_vendor_emoji')    ?: '🏪';
                    $spec     = freshbite_vendor_meta($pid, 'fb_vendor_specialty');
                    $location = freshbite_vendor_meta($pid, 'fb_vendor_location');
                    $products = freshbite_vendor_meta($pid, 'fb_vendor_products') ?: '0';
                    $rating   = freshbite_vendor_meta($pid, 'fb_vendor_rating')   ?: '5';
                    $badge    = freshbite_vendor_meta($pid, 'fb_vendor_badge');
                    $verified = freshbite_vendor_meta($pid, 'fb_vendor_verified') === 'si';
                    $sales    = freshbite_vendor_meta($pid, 'fb_vendor_sales')    ?: '0';
                    $pickup   = freshbite_vendor_meta($pid, 'fb_vendor_pickup')   === 'si';
                    $delivery = freshbite_vendor_meta($pid, 'fb_vendor_delivery') === 'si';
                ?>
                    <div class="fb-vendor-card">

                        <div class="fb-vendor-avatar">
                            <?php if (has_post_thumbnail()) :
                                the_post_thumbnail('freshbite-vendor');
                            else :
                                echo $emoji;
                            endif; ?>
                        </div>

                        <?php if ($badge) : ?>
                            <span class="fb-vendor-tag">
                                <?php echo esc_html($badge); ?>
                            </span>
                        <?php endif; ?>

                        <h4 class="fb-vendor-name"><?php the_title(); ?></h4>

                        <p style="font-size:0.85rem;color:var(--fb-gray-400);
                                  text-align:center;font-family:var(--fb-font);">
                            <?php echo esc_html($spec); ?>
                        </p>

                        <?php if ($location) : ?>
                            <p style="font-size:0.78rem;color:var(--fb-gray-300);
                                      font-family:var(--fb-font);">
                                📍 <?php echo esc_html($location); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Servicios disponibles -->
                        <div style="display:flex;gap:8px;flex-wrap:wrap;
                                    justify-content:center;">
                            <?php if ($pickup) : ?>
                                <span class="fb-tag fb-tag-primary">🏪 Pickup</span>
                            <?php endif; ?>
                            <?php if ($delivery) : ?>
                                <span class="fb-tag fb-tag-green">🚚 Delivery</span>
                            <?php endif; ?>
                        </div>

                        <div class="fb-vendor-stats">
                            <div class="fb-vendor-stat">
                                <span class="fb-vendor-stat-num">
                                    <?php echo esc_html($products); ?>
                                </span>
                                <span class="fb-vendor-stat-text">Productos</span>
                            </div>
                            <div class="fb-vendor-stat">
                                <span class="fb-vendor-stat-num">
                                    <?php echo esc_html($rating); ?>
                                </span>
                                <span class="fb-vendor-stat-text">Calificación</span>
                            </div>
                            <div class="fb-vendor-stat">
                                <span class="fb-vendor-stat-num">
                                    <?php echo esc_html($sales); ?>
                                </span>
                                <span class="fb-vendor-stat-text">Ventas</span>
                            </div>
                        </div>

                        <?php if ($verified) : ?>
                            <span class="fb-vendor-verified">
                                ✅ Vendedor Verificado
                            </span>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>"
                           class="fb-btn fb-btn-outline fb-btn-sm"
                           style="width:100%;justify-content:center;margin-top:8px;">
                            Ver Tienda →
                        </a>

                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php else : ?>

                <?php foreach ($fallback_vendedores as [
                    $emoji, $nombre, $spec, $location,
                    $productos, $rating, $desde, $badge
                ]) : ?>
                    <div class="fb-vendor-card">

                        <div class="fb-vendor-avatar"><?php echo $emoji; ?></div>

                        <span class="fb-vendor-tag">
                            <?php echo esc_html($badge); ?>
                        </span>

                        <h4 class="fb-vendor-name">
                            <?php echo esc_html($nombre); ?>
                        </h4>

                        <p style="font-size:0.85rem;color:var(--fb-gray-400);
                                  text-align:center;font-family:var(--fb-font);">
                            <?php echo esc_html($spec); ?>
                        </p>

                        <p style="font-size:0.78rem;color:var(--fb-gray-300);
                                  font-family:var(--fb-font);">
                            📍 <?php echo esc_html($location); ?>
                        </p>

                        <div style="display:flex;gap:8px;flex-wrap:wrap;
                                    justify-content:center;">
                            <span class="fb-tag fb-tag-primary">🏪 Pickup</span>
                            <span class="fb-tag fb-tag-green">🚚 Delivery</span>
                        </div>

                        <div class="fb-vendor-stats">
                            <div class="fb-vendor-stat">
                                <span class="fb-vendor-stat-num">
                                    <?php echo esc_html($productos); ?>
                                </span>
                                <span class="fb-vendor-stat-text">Productos</span>
                            </div>
                            <div class="fb-vendor-stat">
                                <span class="fb-vendor-stat-num">
                                    <?php echo $rating; ?>
                                </span>
                                <span class="fb-vendor-stat-text">Calificación</span>
                            </div>
                            <div class="fb-vendor-stat">
                                <span class="fb-vendor-stat-num">
                                    <?php echo $desde; ?>
                                </span>
                                <span class="fb-vendor-stat-text">Miembro</span>
                            </div>
                        </div>

                        <span class="fb-vendor-verified">
                            ✅ Vendedor Verificado
                        </span>

                        <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                           class="fb-btn fb-btn-outline fb-btn-sm"
                           style="width:100%;justify-content:center;margin-top:8px;">
                            Ver Tienda →
                        </a>

                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div><!-- /.fb-grid-4 -->

        <div style="text-align:center;margin-top:40px;">
            <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
               class="fb-btn fb-btn-primary">
                Ver Todos los Vendedores →
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
     SECCIÓN 7 — TESTIMONIOS
     ============================================================ -->
<section class="fb-testimonials">
    <div class="fb-container">

        <div class="fb-section-header">
            <span class="fb-label" style="color:var(--fb-primary);">
                Lo que Dicen Nuestros Clientes
            </span>
            <h2 style="color:var(--fb-white);">
                Miles de Familias<br>Confían en FreshBite
            </h2>
            <p style="color:rgba(255,255,255,0.6);">
                Únete a miles de familias que compran fresco cada semana.
            </p>
        </div>

        <?php
        $testimonios = freshbite_get_testimonials(3);

        $fallback_testimonios = [
            [
                '😊',
                'María García',
                'Chef en casa, Miami FL',
                5,
                'FreshBite cambió completamente la forma en que hago mis compras. Los productos son mucho más frescos que el supermercado y me encanta saber exactamente de qué granja vienen. ¡El pan de Artisan Bakes es increíble!',
                'Manzanas Orgánicas + Pan Artesanal',
            ],
            [
                '👨‍🍳',
                'Chef Marco Rodríguez',
                'Dueño de Restaurante, NYC',
                5,
                'Como chef profesional, los ingredientes de calidad lo son todo. FreshBite me da acceso a los mejores productores locales a precios justos. Los tomates heirloom de Sunrise Gardens no tienen comparación.',
                'Tomates Heirloom + Hierbas Frescas',
            ],
            [
                '🌱',
                'Ana Martínez',
                'Nutricionista, Portland',
                5,
                'Recomiendo FreshBite a todos mis clientes. La transparencia sobre las prácticas agrícolas, las certificaciones orgánicas y la frescura son incomparables. Además la entrega siempre llega a tiempo.',
                'Miel Natural + Huevos de Granja',
            ],
        ];

        $tiene_testimonios = $testimonios->have_posts();
        ?>

        <div class="fb-grid-3">

            <?php if ($tiene_testimonios) : ?>

                <?php while ($testimonios->have_posts()) :
                    $testimonios->the_post();
                    $pid     = get_the_ID();
                    $autor   = freshbite_vendor_meta($pid, 'fb_testimonial_author');
                    $rol     = freshbite_vendor_meta($pid, 'fb_testimonial_role');
                    $rating  = freshbite_vendor_meta($pid, 'fb_testimonial_rating') ?: 5;
                    $emoji   = freshbite_vendor_meta($pid, 'fb_testimonial_emoji')  ?: '😊';
                    $product = freshbite_vendor_meta($pid, 'fb_testimonial_product');
                ?>
                    <div class="fb-testimonial-card">
                        <div class="fb-testimonial-quote">"</div>
                        <div style="margin-bottom:12px;">
                            <?php echo freshbite_stars($rating); ?>
                        </div>
                        <p class="fb-testimonial-text">
                            <?php echo esc_html(
                                freshbite_truncate(get_the_content(), 220)
                            ); ?>
                        </p>
                        <?php if ($product) : ?>
                            <p style="font-size:0.78rem;color:var(--fb-primary);
                                      margin-bottom:16px;font-family:var(--fb-font);">
                                🛒 Compró: <?php echo esc_html($product); ?>
                            </p>
                        <?php endif; ?>
                        <div class="fb-testimonial-author">
                            <div class="fb-testimonial-avatar">
                                <?php echo $emoji; ?>
                            </div>
                            <div>
                                <div class="fb-testimonial-name">
                                    <?php echo esc_html($autor ?: get_the_title()); ?>
                                </div>
                                <div class="fb-testimonial-role">
                                    <?php echo esc_html($rol); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php else : ?>

                <?php foreach ($fallback_testimonios as [
                    $emoji, $nombre, $rol, $rating, $texto, $producto
                ]) : ?>
                    <div class="fb-testimonial-card">
                        <div class="fb-testimonial-quote">"</div>
                        <div style="margin-bottom:12px;">
                            <?php echo freshbite_stars($rating); ?>
                        </div>
                        <p class="fb-testimonial-text">
                            <?php echo esc_html($texto); ?>
                        </p>
                        <p style="font-size:0.78rem;color:var(--fb-primary);
                                  margin-bottom:16px;font-family:var(--fb-font);">
                            🛒 Compró: <?php echo esc_html($producto); ?>
                        </p>
                        <div class="fb-testimonial-author">
                            <div class="fb-testimonial-avatar">
                                <?php echo $emoji; ?>
                            </div>
                            <div>
                                <div class="fb-testimonial-name">
                                    <?php echo esc_html($nombre); ?>
                                </div>
                                <div class="fb-testimonial-role">
                                    <?php echo esc_html($rol); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div><!-- /.fb-grid-3 -->

        <!-- Barra de confianza -->
        <div style="margin-top:64px;padding-top:48px;
                    border-top:1px solid rgba(255,255,255,0.08);
                    display:grid;grid-template-columns:repeat(4,1fr);
                    gap:32px;text-align:center;">
            <?php
            $confianza = [
                ['🌿', 'Certificado Orgánico',      'El 100% de nuestras granjas cumple estrictos estándares orgánicos'],
                ['🚚', 'Entrega el Mismo Día',       'Pide antes de las 11am y recibe tus productos frescos del día'],
                ['💯', 'Garantía de Frescura',       '¿No estás satisfecho? Reembolso completo, sin preguntas'],
                ['🤝', 'Comercio Justo',             'Garantizamos precios justos para cada uno de nuestros vendedores'],
            ];
            foreach ($confianza as [$icon, $titulo, $desc]) :
            ?>
                <div>
                    <div style="font-size:2rem;margin-bottom:12px;">
                        <?php echo $icon; ?>
                    </div>
                    <h4 style="color:var(--fb-white);font-size:0.95rem;
                               font-family:var(--fb-font);margin-bottom:8px;
                               font-weight:600;">
                        <?php echo esc_html($titulo); ?>
                    </h4>
                    <p style="font-size:0.82rem;color:rgba(255,255,255,0.45);
                              font-family:var(--fb-font);">
                        <?php echo esc_html($desc); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>