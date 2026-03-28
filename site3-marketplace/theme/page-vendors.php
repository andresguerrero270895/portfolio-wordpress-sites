<?php
/**
 * FreshBite Theme — page-vendors.php
 * Template: Directorio de vendedores / agricultores
 */
defined('ABSPATH') || exit;

get_header();
?>

<!-- ============================================================
     HERO DE VENDEDORES
     ============================================================ -->
<section class="fb-seller-hero">
    <div class="fb-container">

        <div style="text-align:center;max-width:640px;margin:0 auto;">
            <span class="fb-label">Nuestra Comunidad</span>
            <h1 style="margin-top:12px;margin-bottom:16px;">
                Conoce a Nuestros<br>
                <span style="color:var(--fb-primary);">Agricultores y Productores</span>
            </h1>
            <p style="font-size:1.1rem;color:var(--fb-gray-400);
                      font-family:var(--fb-font);line-height:1.7;">
                Cada producto que compras en FreshBite viene directamente
                de manos reales. Conoce a las personas detrás de tu comida.
            </p>
        </div>

        <!-- Stats de vendedores -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);
                    gap:24px;margin-top:48px;">
            <?php
            $stats = [
                ['🏪', '200+',    'Vendedores Activos'],
                ['🌎', '28',      'Estados de USA'],
                ['🌿', '85%',     'Certificados Orgánicos'],
                ['⭐', '4.9/5',   'Calificación Promedio'],
            ];
            foreach ($stats as [$icon, $num, $label]) :
            ?>
                <div style="text-align:center;padding:24px 16px;
                            background:var(--fb-white);
                            border-radius:var(--fb-radius);
                            border:1.5px solid var(--fb-border-gray);
                            box-shadow:var(--fb-shadow-sm);">
                    <div style="font-size:1.8rem;margin-bottom:8px;">
                        <?php echo $icon; ?>
                    </div>
                    <div style="font-size:1.6rem;font-weight:700;
                                color:var(--fb-primary);
                                font-family:var(--fb-font);line-height:1;">
                        <?php echo $num; ?>
                    </div>
                    <div style="font-size:0.82rem;color:var(--fb-gray-400);
                                font-family:var(--fb-font);margin-top:6px;">
                        <?php echo $label; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Breadcrumb -->
        <div class="fb-breadcrumb" style="justify-content:center;margin-top:24px;">
            <a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
            <span>›</span>
            <span>Vendedores</span>
        </div>

    </div>
</section>

<!-- ============================================================
     FILTROS RÁPIDOS
     ============================================================ -->
<section style="background:var(--fb-white);
                border-bottom:1px solid var(--fb-border-gray);
                padding:16px 0;">
    <div class="fb-container">
        <div class="fb-quick-filters">

            <span style="font-size:0.85rem;font-weight:600;
                         color:var(--fb-dark);font-family:var(--fb-font);
                         white-space:nowrap;">
                Filtrar:
            </span>

            <?php
            $filtros = [
                ['',           'Todos los Vendedores'],
                ['granja',     '🌾 Granjas'],
                ['artesanal',  '🤝 Artesanales'],
                ['organico',   '🌿 Orgánicos'],
                ['lacteos',    '🥛 Lácteos'],
                ['panaderia',  '🍞 Panadería'],
                ['apicultura', '🍯 Apicultura'],
                ['mariscos',   '🐟 Mariscos'],
            ];

            $active = $_GET['tipo'] ?? '';

            foreach ($filtros as [$slug, $label]) :
                $url = $slug
                    ? home_url('/vendedores/?tipo=' . $slug)
                    : home_url('/vendedores');
            ?>
                <a href="<?php echo esc_url($url); ?>"
                   class="fb-quick-filter <?php echo ($active === $slug) ? 'active' : ''; ?>">
                    <?php echo esc_html($label); ?>
                </a>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- ============================================================
     BUSCADOR DE VENDEDORES
     ============================================================ -->
<section style="background:var(--fb-bg);padding:32px 0;">
    <div class="fb-container">
        <div style="display:flex;gap:16px;flex-wrap:wrap;
                    align-items:center;justify-content:space-between;">

            <!-- Búsqueda -->
            <div style="position:relative;flex:1;max-width:480px;">
                <span style="position:absolute;left:16px;top:50%;
                             transform:translateY(-50%);
                             font-size:1rem;pointer-events:none;">
                    🔍
                </span>
                <input type="text"
                       id="fb-vendor-search"
                       placeholder="Buscar vendedor por nombre o especialidad..."
                       style="width:100%;padding:12px 16px 12px 44px;
                              border:1.5px solid var(--fb-border-gray);
                              border-radius:var(--fb-radius-full);
                              font-family:var(--fb-font);font-size:0.9rem;
                              color:var(--fb-dark);background:var(--fb-white);
                              outline:none;transition:var(--fb-transition);">
            </div>

            <!-- Ordenar -->
            <div style="display:flex;align-items:center;gap:12px;">
                <label style="font-size:0.85rem;color:var(--fb-gray-400);
                              font-family:var(--fb-font);">
                    Ordenar por:
                </label>
                <select id="fb-vendor-sort"
                        class="fb-sort-select">
                    <option value="default">Destacados</option>
                    <option value="rating">Mejor Calificados</option>
                    <option value="products">Más Productos</option>
                    <option value="newest">Más Nuevos</option>
                </select>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     GRID DE VENDEDORES
     ============================================================ -->
<section class="fb-section" style="background:var(--fb-bg);padding-top:0;">
    <div class="fb-container">

        <?php
        $vendors_query = new WP_Query([
            'post_type'      => 'fb_vendor',
            'posts_per_page' => 12,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ]);

        $fallback_vendors = [
            [
                'emoji'    => '🌾',
                'nombre'   => 'Granja Green Valley',
                'spec'     => 'Frutas y Verduras Orgánicas',
                'location' => 'Fresno, California',
                'state'    => 'California',
                'products' => '124',
                'rating'   => '4.9',
                'reviews'  => '203',
                'sales'    => '1.2k',
                'badge'    => 'Top Vendedor',
                'since'    => '2020',
                'verified' => true,
                'pickup'   => true,
                'delivery' => true,
                'story'    => 'Granja familiar de tercera generación especializada en frutas y verduras orgánicas certificadas.',
                'tags'     => ['Orgánico', 'Sin Pesticidas', 'Familiar'],
            ],
            [
                'emoji'    => '🍞',
                'nombre'   => 'Artisan Bakes Co.',
                'spec'     => 'Pan de Masa Madre y Repostería',
                'location' => 'Portland, Oregon',
                'state'    => 'Oregon',
                'products' => '48',
                'rating'   => '5.0',
                'reviews'  => '167',
                'sales'    => '890',
                'badge'    => 'Mejor Calificado',
                'since'    => '2021',
                'verified' => true,
                'pickup'   => true,
                'delivery' => true,
                'story'    => 'Panadería artesanal con masa madre de cultivo propio. Todo horneado fresco cada madrugada.',
                'tags'     => ['Artesanal', 'Sin Conservantes', 'Diario'],
            ],
            [
                'emoji'    => '🐄',
                'nombre'   => 'Happy Cow Dairy',
                'spec'     => 'Leche Natural, Quesos y Yogurt',
                'location' => 'Burlington, Vermont',
                'state'    => 'Vermont',
                'products' => '32',
                'rating'   => '4.9',
                'reviews'  => '312',
                'sales'    => '2.1k',
                'badge'    => 'Verificado',
                'since'    => '2019',
                'verified' => true,
                'pickup'   => true,
                'delivery' => false,
                'story'    => 'Vacas de pastoreo libre en 200 acres de pasto verde. Leche no homogeneizada, directa de la granja.',
                'tags'     => ['Pastoreo Libre', 'No Homogeneizado', 'Fresco Diario'],
            ],
            [
                'emoji'    => '🍯',
                'nombre'   => 'Blue Sky Apiaries',
                'spec'     => 'Miel Cruda y Productos de Abeja',
                'location' => 'Missoula, Montana',
                'state'    => 'Montana',
                'products' => '18',
                'rating'   => '4.8',
                'reviews'  => '76',
                'sales'    => '445',
                'badge'    => 'Cert. Orgánico',
                'since'    => '2018',
                'verified' => true,
                'pickup'   => false,
                'delivery' => true,
                'story'    => 'Apicultor desde 1998. Más de 300 colmenas distribuidas en prados silvestres sin tratar.',
                'tags'     => ['Cruda', 'Sin Filtrar', 'Sostenible'],
            ],
            [
                'emoji'    => '🍅',
                'nombre'   => 'Sunrise Gardens',
                'spec'     => 'Tomates Heirloom y Vegetales de Especialidad',
                'location' => 'Sonoma, California',
                'state'    => 'California',
                'products' => '67',
                'rating'   => '4.7',
                'reviews'  => '88',
                'sales'    => '567',
                'badge'    => 'Top Vendedor',
                'since'    => '2021',
                'verified' => true,
                'pickup'   => true,
                'delivery' => true,
                'story'    => 'Jardín boutique especializado en variedades heirloom raras y vegetales de temporada.',
                'tags'     => ['Heirloom', 'Temporada', 'Sin GMO'],
            ],
            [
                'emoji'    => '🥚',
                'nombre'   => 'Sunny Side Farm',
                'spec'     => 'Huevos de Gallinas Libres y Aves de Corral',
                'location' => 'Lancaster, Pennsylvania',
                'state'    => 'Pennsylvania',
                'products' => '12',
                'rating'   => '5.0',
                'reviews'  => '312',
                'sales'    => '3.4k',
                'badge'    => 'Más Vendido',
                'since'    => '2019',
                'verified' => true,
                'pickup'   => true,
                'delivery' => true,
                'story'    => 'Más de 500 gallinas de pastoreo en amplio espacio abierto. Huevos recogidos a mano cada mañana.',
                'tags'     => ['Gallinas Libres', 'Sin Hormonas', 'Fresco Diario'],
            ],
            [
                'emoji'    => '🐟',
                'nombre'   => 'Pacific Fresh Seafood',
                'spec'     => 'Pescados y Mariscos del Pacífico',
                'location' => 'Seattle, Washington',
                'state'    => 'Washington',
                'products' => '43',
                'rating'   => '4.8',
                'reviews'  => '134',
                'sales'    => '789',
                'badge'    => 'Verificado',
                'since'    => '2020',
                'verified' => true,
                'pickup'   => true,
                'delivery' => true,
                'story'    => 'Pescadores artesanales con más de 30 años en el Pacífico. Producto fresco o congelado en barco.',
                'tags'     => ['Pesca Sostenible', 'Sin Antibióticos', 'Certificado MSC'],
            ],
            [
                'emoji'    => '🥬',
                'nombre'   => 'Desert Bloom Farms',
                'spec'     => 'Microgreens, Hierbas y Germinados',
                'location' => 'Tucson, Arizona',
                'state'    => 'Arizona',
                'products' => '29',
                'rating'   => '4.9',
                'reviews'  => '92',
                'sales'    => '334',
                'badge'    => 'Nuevo',
                'since'    => '2022',
                'verified' => true,
                'pickup'   => false,
                'delivery' => true,
                'story'    => 'Granja vertical urbana especializada en microgreens y hierbas frescas cultivadas sin tierra.',
                'tags'     => ['Hidropónico', 'Microgreens', 'Local'],
            ],
        ];

        $tiene_vendors = $vendors_query->have_posts();
        ?>

        <!-- Contador -->
        <div class="fb-flex-between"
             style="margin-bottom:32px;flex-wrap:wrap;gap:12px;">
            <p style="font-family:var(--fb-font);color:var(--fb-gray-400);
                      font-size:0.9rem;">
                Mostrando
                <strong style="color:var(--fb-dark);">
                    <?php echo $tiene_vendors
                        ? $vendors_query->found_posts
                        : count($fallback_vendors); ?>
                </strong>
                vendedores verificados
            </p>
            <div style="display:flex;align-items:center;gap:8px;">
                <span style="font-size:0.8rem;color:var(--fb-gray-400);
                             font-family:var(--fb-font);">
                    ✅ Todos verificados por FreshBite
                </span>
            </div>
        </div>

        <!-- Grid -->
        <div class="fb-vendors-grid" id="fb-vendors-grid">

            <?php if ($tiene_vendors) : ?>

                <?php while ($vendors_query->have_posts()) :
                    $vendors_query->the_post();
                    $pid      = get_the_ID();
                    $emoji    = freshbite_vendor_meta($pid, 'fb_vendor_emoji')    ?: '🏪';
                    $spec     = freshbite_vendor_meta($pid, 'fb_vendor_specialty');
                    $location = freshbite_vendor_meta($pid, 'fb_vendor_location');
                    $products = freshbite_vendor_meta($pid, 'fb_vendor_products') ?: '0';
                    $rating   = freshbite_vendor_meta($pid, 'fb_vendor_rating')   ?: '5';
                    $reviews  = freshbite_vendor_meta($pid, 'fb_vendor_reviews')  ?: '0';
                    $sales    = freshbite_vendor_meta($pid, 'fb_vendor_sales')    ?: '0';
                    $badge    = freshbite_vendor_meta($pid, 'fb_vendor_badge');
                    $verified = freshbite_vendor_meta($pid, 'fb_vendor_verified') === 'si';
                    $pickup   = freshbite_vendor_meta($pid, 'fb_vendor_pickup')   === 'si';
                    $delivery = freshbite_vendor_meta($pid, 'fb_vendor_delivery') === 'si';
                    $story    = freshbite_vendor_meta($pid, 'fb_vendor_story');
                    $schedule = freshbite_vendor_meta($pid, 'fb_vendor_schedule');
                    $min      = freshbite_vendor_meta($pid, 'fb_vendor_min_order');
                ?>
                    <div class="fb-vendor-card-full" data-name="<?php the_title(); ?>">

                        <!-- Header de la tarjeta -->
                        <div class="fb-vendor-card-header">
                            <div class="fb-vendor-avatar-lg">
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
                        </div>

                        <!-- Cuerpo -->
                        <div class="fb-vendor-card-body">

                            <h3 class="fb-vendor-name">
                                <?php the_title(); ?>
                            </h3>

                            <p class="fb-vendor-spec">
                                <?php echo esc_html($spec); ?>
                            </p>

                            <?php if ($location) : ?>
                                <p class="fb-vendor-location">
                                    📍 <?php echo esc_html($location); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Rating -->
                            <div style="display:flex;align-items:center;
                                        gap:6px;margin:8px 0;">
                                <?php echo freshbite_stars(floatval($rating)); ?>
                                <span style="font-size:0.82rem;
                                             color:var(--fb-gray-400);
                                             font-family:var(--fb-font);">
                                    <?php echo esc_html($rating); ?>
                                    (<?php echo esc_html($reviews); ?> reseñas)
                                </span>
                            </div>

                            <!-- Historia corta -->
                            <?php if ($story) : ?>
                                <p style="font-size:0.85rem;
                                          color:var(--fb-gray-400);
                                          font-family:var(--fb-font);
                                          line-height:1.6;margin:8px 0;">
                                    <?php echo esc_html(
                                        freshbite_truncate($story, 100)
                                    ); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Servicios -->
                            <div style="display:flex;gap:6px;
                                        flex-wrap:wrap;margin:10px 0;">
                                <?php if ($pickup) : ?>
                                    <span class="fb-tag fb-tag-primary">
                                        🏪 Pickup
                                    </span>
                                <?php endif; ?>
                                <?php if ($delivery) : ?>
                                    <span class="fb-tag fb-tag-green">
                                        🚚 Delivery
                                    </span>
                                <?php endif; ?>
                                <?php if ($verified) : ?>
                                    <span class="fb-tag"
                                          style="color:var(--fb-secondary);">
                                        ✅ Verificado
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Stats -->
                            <div class="fb-vendor-card-stats">
                                <div class="fb-vendor-stat">
                                    <span class="fb-vendor-stat-num">
                                        <?php echo esc_html($products); ?>
                                    </span>
                                    <span class="fb-vendor-stat-text">
                                        Productos
                                    </span>
                                </div>
                                <div class="fb-vendor-stat">
                                    <span class="fb-vendor-stat-num">
                                        <?php echo esc_html($sales); ?>
                                    </span>
                                    <span class="fb-vendor-stat-text">
                                        Ventas
                                    </span>
                                </div>
                                <div class="fb-vendor-stat">
                                    <span class="fb-vendor-stat-num">
                                        <?php echo esc_html($rating); ?>
                                    </span>
                                    <span class="fb-vendor-stat-text">
                                        Calificación
                                    </span>
                                </div>
                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="fb-vendor-card-footer">
                            <a href="<?php the_permalink(); ?>"
                               class="fb-btn fb-btn-primary fb-btn-sm"
                               style="flex:1;justify-content:center;">
                                Ver Tienda →
                            </a>
                            <a href="<?php echo esc_url(home_url(
                                '/tienda/?vendor=' . get_the_ID()
                            )); ?>"
                               class="fb-btn fb-btn-outline fb-btn-sm"
                               style="flex:1;justify-content:center;">
                                🛒 Sus Productos
                            </a>
                        </div>

                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php else : ?>

                <?php foreach ($fallback_vendors as $v) : ?>
                    <div class="fb-vendor-card-full"
                         data-name="<?php echo esc_attr($v['nombre']); ?>">

                        <!-- Header -->
                        <div class="fb-vendor-card-header">
                            <div class="fb-vendor-avatar-lg">
                                <?php echo $v['emoji']; ?>
                            </div>
                            <span class="fb-vendor-tag">
                                <?php echo esc_html($v['badge']); ?>
                            </span>
                        </div>

                        <!-- Cuerpo -->
                        <div class="fb-vendor-card-body">

                            <h3 class="fb-vendor-name">
                                <?php echo esc_html($v['nombre']); ?>
                            </h3>

                            <p class="fb-vendor-spec">
                                <?php echo esc_html($v['spec']); ?>
                            </p>

                            <p class="fb-vendor-location">
                                📍 <?php echo esc_html($v['location']); ?>
                            </p>

                            <!-- Rating -->
                            <div style="display:flex;align-items:center;
                                        gap:6px;margin:8px 0;">
                                <?php echo freshbite_stars(floatval($v['rating'])); ?>
                                <span style="font-size:0.82rem;
                                             color:var(--fb-gray-400);
                                             font-family:var(--fb-font);">
                                    <?php echo $v['rating']; ?>
                                    (<?php echo $v['reviews']; ?> reseñas)
                                </span>
                            </div>

                            <!-- Historia -->
                            <p style="font-size:0.85rem;
                                      color:var(--fb-gray-400);
                                      font-family:var(--fb-font);
                                      line-height:1.6;margin:8px 0;">
                                <?php echo esc_html(
                                    freshbite_truncate($v['story'], 100)
                                ); ?>
                            </p>

                            <!-- Tags de especialidad -->
                            <div style="display:flex;gap:6px;
                                        flex-wrap:wrap;margin:10px 0;">
                                <?php foreach ($v['tags'] as $tag) : ?>
                                    <span class="fb-tag">
                                        <?php echo esc_html($tag); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                            <!-- Servicios -->
                            <div style="display:flex;gap:6px;
                                        flex-wrap:wrap;margin:6px 0;">
                                <?php if ($v['pickup']) : ?>
                                    <span class="fb-tag fb-tag-primary">
                                        🏪 Pickup
                                    </span>
                                <?php endif; ?>
                                <?php if ($v['delivery']) : ?>
                                    <span class="fb-tag fb-tag-green">
                                        🚚 Delivery
                                    </span>
                                <?php endif; ?>
                                <?php if ($v['verified']) : ?>
                                    <span class="fb-tag"
                                          style="color:var(--fb-secondary);">
                                        ✅ Verificado
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Stats -->
                            <div class="fb-vendor-card-stats">
                                <div class="fb-vendor-stat">
                                    <span class="fb-vendor-stat-num">
                                        <?php echo esc_html($v['products']); ?>
                                    </span>
                                    <span class="fb-vendor-stat-text">
                                        Productos
                                    </span>
                                </div>
                                <div class="fb-vendor-stat">
                                    <span class="fb-vendor-stat-num">
                                        <?php echo esc_html($v['sales']); ?>
                                    </span>
                                    <span class="fb-vendor-stat-text">
                                        Ventas
                                    </span>
                                </div>
                                <div class="fb-vendor-stat">
                                    <span class="fb-vendor-stat-num">
                                        <?php echo esc_html($v['rating']); ?>
                                    </span>
                                    <span class="fb-vendor-stat-text">
                                        Calificación
                                    </span>
                                </div>
                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="fb-vendor-card-footer">
                            <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                               class="fb-btn fb-btn-primary fb-btn-sm"
                               style="flex:1;justify-content:center;">
                                Ver Tienda →
                            </a>
                            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                               class="fb-btn fb-btn-outline fb-btn-sm"
                               style="flex:1;justify-content:center;">
                                🛒 Sus Productos
                            </a>
                        </div>

                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div><!-- /#fb-vendors-grid -->

        <!-- Sin resultados (oculto por JS) -->
        <div id="fb-no-vendors"
             style="display:none;text-align:center;padding:64px 24px;">
            <span style="font-size:3rem;">🔍</span>
            <h3 style="margin:16px 0 8px;">
                No encontramos vendedores
            </h3>
            <p style="color:var(--fb-gray-400);font-family:var(--fb-font);">
                Intenta con otro término de búsqueda.
            </p>
        </div>

    </div>
</section>

<!-- ============================================================
     MAPA DE VENDEDORES POR ESTADO
     ============================================================ -->
<section style="background:var(--fb-white);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-section-header">
            <span class="fb-label">Cobertura Nacional</span>
            <h2>Vendedores en Todo el País</h2>
            <p>
                Tenemos agricultores y productores en 28 estados de USA.
                Encuentra los más cercanos a ti.
            </p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(4,1fr);
                    gap:16px;">
            <?php
            $estados = [
                ['California',    '48', '🌞'],
                ['Oregon',        '22', '🌲'],
                ['Washington',    '19', '🍎'],
                ['Vermont',       '15', '🍁'],
                ['Pennsylvania',  '18', '🌾'],
                ['Montana',       '12', '🏔️'],
                ['Texas',         '25', '🤠'],
                ['Florida',       '21', '🌴'],
                ['New York',      '16', '🗽'],
                ['Colorado',      '14', '⛰️'],
                ['Michigan',      '11', '🌊'],
                ['Wisconsin',     '17', '🐄'],
            ];
            foreach ($estados as [$estado, $count, $icon]) :
            ?>
                <a href="<?php echo esc_url(home_url('/vendedores/?estado=' . urlencode($estado))); ?>"
                   class="fb-state-card">
                    <span class="fb-state-icon"><?php echo $icon; ?></span>
                    <div>
                        <span class="fb-state-name">
                            <?php echo esc_html($estado); ?>
                        </span>
                        <span class="fb-state-count">
                            <?php echo esc_html($count); ?> vendedores
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     CTA — ÚNETE COMO VENDEDOR
     ============================================================ -->
<section style="background:linear-gradient(135deg,var(--fb-primary),var(--fb-accent));
                padding:80px 0;text-align:center;position:relative;overflow:hidden;">

    <div style="position:absolute;inset:0;
                background:url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><text y=\".9em\" font-size=\"90\" opacity=\"0.04\">🥬</text></svg>') repeat;
                pointer-events:none;"></div>

    <div class="fb-container" style="position:relative;z-index:1;">

        <span class="fb-label"
              style="color:rgba(255,255,255,0.8);margin-bottom:16px;display:block;">
            ¿Eres Productor Local?
        </span>

        <h2 style="color:var(--fb-white);margin-bottom:16px;">
            Vende en FreshBite y<br>Llega a Miles de Familias
        </h2>

        <p style="color:rgba(255,255,255,0.85);font-size:1.1rem;
                  max-width:560px;margin:0 auto 40px;">
            Sin cuotas mensuales. Sin exclusividad. Tú pones el precio.
            Solo una pequeña comisión por venta realizada.
        </p>

        <!-- Beneficios -->
        <div style="display:grid;grid-template-columns:repeat(3,1fr);
                    gap:24px;max-width:720px;margin:0 auto 40px;text-align:left;">
            <?php
            $beneficios = [
                ['💰', 'Sin Cuota Mensual',      'Solo pagamos cuando vendes. Sin riesgos.'],
                ['📦', 'Gestión de Pedidos',      'Panel simple para gestionar tus pedidos.'],
                ['📊', 'Estadísticas en Tiempo Real', 'Ve tus ventas y clientes en tiempo real.'],
            ];
            foreach ($beneficios as [$icon, $titulo, $desc]) :
            ?>
                <div style="background:rgba(255,255,255,0.12);
                            border:1px solid rgba(255,255,255,0.2);
                            border-radius:var(--fb-radius);
                            padding:20px 16px;">
                    <div style="font-size:1.5rem;margin-bottom:10px;">
                        <?php echo $icon; ?>
                    </div>
                    <strong style="display:block;color:white;
                                   font-family:var(--fb-font);
                                   font-size:0.9rem;margin-bottom:6px;">
                        <?php echo esc_html($titulo); ?>
                    </strong>
                    <span style="color:rgba(255,255,255,0.7);
                                 font-family:var(--fb-font);
                                 font-size:0.82rem;line-height:1.5;">
                        <?php echo esc_html($desc); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
            <?php if (class_exists('WeDevs_Dokan')) : ?>
                <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>"
                   class="fb-btn fb-btn-white fb-btn-lg">
                    🏪 Registrarme como Vendedor
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/contacto')); ?>"
                   class="fb-btn fb-btn-white fb-btn-lg">
                    🏪 Registrarme como Vendedor
                </a>
            <?php endif; ?>
            <a href="<?php echo esc_url(home_url('/nosotros')); ?>"
               class="fb-btn fb-btn-outline"
               style="border-color:rgba(255,255,255,0.5);
                      color:white;font-size:1rem;padding:18px 36px;">
                Conocer Más
            </a>
        </div>

    </div>
</section>

<?php get_footer(); ?>