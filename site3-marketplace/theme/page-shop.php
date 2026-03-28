<?php
/**
 * Template Name: Tienda — FreshBite
 *
 * FreshBite Theme — page-shop.php
 * Página: Tienda
 *
 * @package FreshBite
 */
defined('ABSPATH') || exit;
get_header();
?>

<!-- ============================================================
     HERO DE TIENDA
     ============================================================ -->
<section style="background:linear-gradient(135deg,var(--fb-bg-2),var(--fb-bg-3));
                padding:48px 0;border-bottom:1px solid var(--fb-border-gray);">
    <div class="fb-container">
        <div class="fb-flex-between" style="flex-wrap:wrap;gap:24px;">

            <!-- Título -->
            <div>
                <span class="fb-label">Productos Frescos</span>
                <h1 style="margin-top:8px;font-size:clamp(1.8rem,3vw,2.5rem);">
                    Nuestra Tienda
                </h1>
                <p style="margin-top:8px;color:var(--fb-gray-400);
                           font-family:var(--fb-font);">
                    <?php
                    if (class_exists('WooCommerce')) {
                        $total = wp_count_posts('product')->publish;
                        echo esc_html($total . ' productos disponibles hoy');
                    } else {
                        echo 'Miles de productos frescos disponibles hoy';
                    }
                    ?>
                </p>
            </div>

            <!-- Buscador rápido -->
            <form method="get"
                  action="<?php echo esc_url(home_url('/tienda')); ?>"
                  class="fb-shop-search-form">
                <div class="fb-header-search" style="max-width:360px;width:100%;">
                    <span class="fb-search-icon">🔍</span>
                    <input
                        type="search"
                        name="s"
                        placeholder="Buscar en la tienda..."
                        value="<?php echo get_search_query(); ?>"
                        autocomplete="off"
                    >
                    <?php if (class_exists('WooCommerce')) : ?>
                        <input type="hidden" name="post_type" value="product">
                    <?php endif; ?>
                </div>
            </form>

        </div>

        <!-- Breadcrumb -->
        <div class="fb-breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
            <span>›</span>
            <span>Tienda</span>
        </div>

    </div>
</section>

<!-- ============================================================
     FILTROS RÁPIDOS (TAGS)
     ============================================================ -->
<section style="background:var(--fb-white);
                border-bottom:1px solid var(--fb-border-gray);
                padding:16px 0;">
    <div class="fb-container">
        <div class="fb-quick-filters">

            <span style="font-size:0.85rem;font-weight:600;
                         color:var(--fb-dark);font-family:var(--fb-font);
                         white-space:nowrap;">
                Filtrar por:
            </span>

            <?php
            $filtros = [
                ['todos',        'Todos',              ''],
                ['organico',     '🌿 Orgánicos',        'product_cat'],
                ['frutas',       '🍎 Frutas',           'product_cat'],
                ['verduras',     '🥦 Verduras',         'product_cat'],
                ['lacteos',      '🥛 Lácteos',          'product_cat'],
                ['panaderia',    '🍞 Panadería',        'product_cat'],
                ['on_sale',      '🔥 En Oferta',        'special'],
                ['featured',     '⭐ Destacados',       'special'],
            ];

            $active = $_GET['product_cat'] ?? $_GET['special'] ?? 'todos';

            foreach ($filtros as [$slug, $label, $type]) :
                if ($slug === 'todos') {
                    $url = home_url('/tienda');
                } elseif ($type === 'special') {
                    $url = home_url('/tienda/?' . $slug . '=1');
                } else {
                    $url = home_url('/tienda/?product_cat=' . $slug);
                }
            ?>
                <a href="<?php echo esc_url($url); ?>"
                   class="fb-quick-filter <?php echo ($active === $slug || ($slug === 'todos' && !$active)) ? 'active' : ''; ?>">
                    <?php echo esc_html($label); ?>
                </a>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- ============================================================
     LAYOUT PRINCIPAL — SIDEBAR + PRODUCTOS
     ============================================================ -->
<div class="fb-container">
    <div class="fb-shop-layout">

        <!-- ── SIDEBAR FILTROS ────────────────────────────── -->
        <aside class="fb-shop-sidebar">

            <!-- Filtro: Categorías -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Categorías</h4>
                <ul class="fb-filter-list">
                    <?php
                    $cats = freshbite_get_product_categories();
                    $cat_fallback = [
                        ['frutas',     'Frutas Frescas',   '124'],
                        ['verduras',   'Verduras',         '89'],
                        ['lacteos',    'Lácteos y Huevos', '67'],
                        ['carnes',     'Carnes y Aves',    '54'],
                        ['panaderia',  'Panadería',        '43'],
                        ['organico',   'Orgánicos',        '96'],
                        ['mariscos',   'Mariscos',         '38'],
                        ['bebidas',    'Bebidas',          '78'],
                        ['despensa',   'Despensa',         '112'],
                        ['congelados', 'Congelados',       '61'],
                    ];

                    $tiene_cats = !is_wp_error($cats) && !empty($cats);

                    if ($tiene_cats) :
                        foreach ($cats as $cat) :
                            $active_cat = $_GET['product_cat'] ?? '';
                    ?>
                            <li class="fb-filter-item">
                                <input type="checkbox"
                                       id="cat-<?php echo esc_attr($cat->slug); ?>"
                                       class="fb-cat-filter"
                                       data-slug="<?php echo esc_attr($cat->slug); ?>"
                                       <?php checked($active_cat, $cat->slug); ?>>
                                <label for="cat-<?php echo esc_attr($cat->slug); ?>">
                                    <?php echo esc_html($cat->name); ?>
                                </label>
                                <span class="fb-filter-count">
                                    <?php echo esc_html($cat->count); ?>
                                </span>
                            </li>
                    <?php
                        endforeach;
                    else :
                        foreach ($cat_fallback as [$slug, $name, $count]) :
                    ?>
                            <li class="fb-filter-item">
                                <input type="checkbox"
                                       id="cat-<?php echo esc_attr($slug); ?>"
                                       class="fb-cat-filter"
                                       data-slug="<?php echo esc_attr($slug); ?>">
                                <label for="cat-<?php echo esc_attr($slug); ?>">
                                    <?php echo esc_html($name); ?>
                                </label>
                                <span class="fb-filter-count">
                                    <?php echo esc_html($count); ?>
                                </span>
                            </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Filtro: Rango de precio -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Precio</h4>
                <div class="fb-price-range">
                    <input type="range"
                           id="fb-price-range"
                           min="0"
                           max="100"
                           value="100"
                           step="1">
                    <div class="fb-price-labels">
                        <span>\$0</span>
                        <span id="fb-price-val">\$100</span>
                    </div>
                </div>
                <a href="#"
                   id="fb-apply-price"
                   class="fb-btn fb-btn-outline fb-btn-sm"
                   style="margin-top:12px;width:100%;justify-content:center;">
                    Aplicar Filtro
                </a>
            </div>

            <!-- Filtro: Valoración -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Valoración</h4>
                <ul class="fb-filter-list">
                    <?php
                    $ratings = [5, 4, 3, 2, 1];
                    foreach ($ratings as $r) :
                    ?>
                        <li class="fb-filter-item">
                            <input type="checkbox"
                                   id="rating-<?php echo $r; ?>"
                                   class="fb-rating-filter"
                                   data-rating="<?php echo $r; ?>">
                            <label for="rating-<?php echo $r; ?>"
                                   style="display:flex;align-items:center;gap:4px;">
                                <?php echo str_repeat('★', $r); ?>
                                <?php echo str_repeat('☆', 5 - $r); ?>
                                <span style="font-size:0.78rem;">
                                    <?php echo $r === 5 ? 'Solo' : 'y más'; ?>
                                </span>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Filtro: Tipo de producto -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Tipo de Producto</h4>
                <ul class="fb-filter-list">
                    <?php
                    $tipos = [
                        ['organico',  '🌿 Orgánico Certificado'],
                        ['local',     '🏡 Producción Local'],
                        ['artesanal', '🤝 Artesanal'],
                        ['sin-gluten','🌾 Sin Gluten'],
                        ['vegano',    '🥗 Vegano'],
                        ['oferta',    '🔥 En Oferta'],
                    ];
                    foreach ($tipos as [$val, $label]) :
                    ?>
                        <li class="fb-filter-item">
                            <input type="checkbox"
                                   id="tipo-<?php echo esc_attr($val); ?>"
                                   class="fb-tipo-filter"
                                   data-tipo="<?php echo esc_attr($val); ?>">
                            <label for="tipo-<?php echo esc_attr($val); ?>">
                                <?php echo esc_html($label); ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Filtro: Vendedor -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Vendedor</h4>
                <ul class="fb-filter-list">
                    <?php
                    $vendors_q = freshbite_get_vendors(6);
                    $vendor_fallback = [
                        'Granja Green Valley',
                        'Artisan Bakes Co.',
                        'Happy Cow Dairy',
                        'Blue Sky Apiaries',
                        'Sunrise Gardens',
                        'Sunny Side Farm',
                    ];

                    if ($vendors_q->have_posts()) :
                        while ($vendors_q->have_posts()) :
                            $vendors_q->the_post();
                    ?>
                            <li class="fb-filter-item">
                                <input type="checkbox"
                                       id="vendor-<?php echo get_the_ID(); ?>"
                                       class="fb-vendor-filter">
                                <label for="vendor-<?php echo get_the_ID(); ?>">
                                    <?php the_title(); ?>
                                </label>
                            </li>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        foreach ($vendor_fallback as $i => $vname) :
                    ?>
                            <li class="fb-filter-item">
                                <input type="checkbox"
                                       id="vendor-<?php echo $i; ?>"
                                       class="fb-vendor-filter">
                                <label for="vendor-<?php echo $i; ?>">
                                    <?php echo esc_html($vname); ?>
                                </label>
                            </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Botón limpiar filtros -->
            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
               class="fb-btn fb-btn-outline"
               style="width:100%;justify-content:center;">
                🗑️ Limpiar Filtros
            </a>

        </aside>

        <!-- ── MAIN — GRID DE PRODUCTOS ──────────────────── -->
        <main class="fb-shop-main">

            <!-- Toolbar -->
            <div class="fb-shop-toolbar">
                <p class="fb-shop-count">
                    <?php if (class_exists('WooCommerce')) :
                        global $wp_query;
                        $total = $wp_query->found_posts ?? 0;
                    ?>
                        Mostrando <strong><?php echo esc_html($total); ?></strong> productos
                    <?php else : ?>
                        Mostrando <strong>24</strong> productos
                    <?php endif; ?>
                </p>

                <div style="display:flex;align-items:center;gap:12px;">

                    <!-- Ordenar -->
                    <select class="fb-sort-select" id="fb-sort-select">
                        <option value="date">Más Recientes</option>
                        <option value="popularity">Más Vendidos</option>
                        <option value="rating">Mejor Valorados</option>
                        <option value="price">Precio: Menor a Mayor</option>
                        <option value="price-desc">Precio: Mayor a Menor</option>
                    </select>

                    <!-- Vista grid/lista -->
                    <div class="fb-view-toggle">
                        <button class="fb-view-btn active"
                                data-view="grid"
                                title="Vista en cuadrícula">
                            ⊞
                        </button>
                        <button class="fb-view-btn"
                                data-view="list"
                                title="Vista en lista">
                            ☰
                        </button>
                    </div>

                </div>
            </div>

            <!-- Grid de productos -->
            <div class="fb-product-grid" id="fb-products-grid">

                <?php
                if (class_exists('WooCommerce')) :

                    $paged = get_query_var('paged') ?: 1;
                    $orderby = $_GET['orderby'] ?? 'date';

                    $args = [
                        'post_type'      => 'product',
                        'posts_per_page' => 12,
                        'paged'          => $paged,
                        'orderby'        => $orderby,
                        'order'          => 'DESC',
                    ];

                    // Filtro por categoría
                    if (!empty($_GET['product_cat'])) {
                        $args['tax_query'] = [[
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => sanitize_text_field($_GET['product_cat']),
                        ]];
                    }

                    // Filtro en oferta
                    if (!empty($_GET['on_sale'])) {
                        $args['meta_query'] = [[
                            'key'     => '_sale_price',
                            'value'   => 0,
                            'compare' => '>',
                            'type'    => 'NUMERIC',
                        ]];
                    }

                    $shop_query = new WP_Query($args);

                    if ($shop_query->have_posts()) :
                        while ($shop_query->have_posts()) :
                            $shop_query->the_post();
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
                <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                ?>
                        <!-- Sin resultados WooCommerce -->
                        <div class="fb-no-results" style="grid-column:1/-1;">
                            <span>🥬</span>
                            <h3>No encontramos productos</h3>
                            <p>
                                Intenta con otro filtro o búsqueda.
                            </p>
                            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                               class="fb-btn fb-btn-primary">
                                Ver Todos los Productos
                            </a>
                        </div>
                <?php
                    endif;

                else :
                    // Fallback sin WooCommerce
                    $fallback = [
                        ['🍎', 'Manzanas Honeycrisp Orgánicas', 'Granja Green Valley',   '\$4.99',  '\$6.99', '/lb',     'Orgánico', '★★★★★', '(128)'],
                        ['🥦', 'Corona de Brócoli Fresco',      'Lo Mejor de la Natura', '\$2.49',  '',      '/unidad', 'Local',    '★★★★★', '(94)'],
                        ['🥛', 'Leche Entera Natural',           'Happy Cow Dairy',       '\$5.99',  '',      '/galón',  'Orgánico', '★★★★★', '(203)'],
                        ['🍞', 'Pan de Masa Madre',              'Artisan Bakes Co.',     '\$7.99',  '',      '/unidad', 'Nuevo',    '★★★★★', '(167)'],
                        ['🍅', 'Tomates Heirloom',               'Jardines Sunrise',      '\$3.99',  '\$5.49', '/lb',     'Oferta',   '★★★★☆', '(88)'],
                        ['🥚', 'Huevos de Granja Libres',        'Sunny Side Farm',       '\$6.49',  '',      '/docena', 'Local',    '★★★★★', '(312)'],
                        ['🍯', 'Miel Silvestre Natural',         'Blue Sky Apiaries',     '\$12.99', '\$15.99','/16oz',   'Orgánico', '★★★★★', '(76)'],
                        ['🫐', 'Arándanos Frescos',              'Berry Good Farm',       '\$5.99',  '',      '/pinta',  'Nuevo',    '★★★★★', '(145)'],
                        ['🥕', 'Zanahorias de Temporada',        'Granja Green Valley',   '\$2.99',  '',      '/lb',     'Local',    '★★★★★', '(67)'],
                        ['🧀', 'Queso Artesanal Envejecido',     'Happy Cow Dairy',       '\$9.99',  '',      '/8oz',    'Artesanal','★★★★★', '(54)'],
                        ['🫑', 'Pimientos Coloridos Mixtos',     'Jardines Sunrise',      '\$4.49',  '\$5.99', '/lb',     'Oferta',   '★★★★☆', '(43)'],
                        ['🌽', 'Maíz Dulce de Temporada',        'Granja Green Valley',   '\$0.99',  '',      '/oreja',  'Local',    '★★★★★', '(189)'],
                    ];

                    foreach ($fallback as [
                        $emoji, $nombre, $vendedor,
                        $precio, $precio_old, $unidad,
                        $badge, $stars, $reviews
                    ]) :
                        $badge_class = match($badge) {
                            'Orgánico'  => 'fb-badge-organic',
                            'Oferta'    => 'fb-badge-sale',
                            'Nuevo'     => 'fb-badge-new',
                            'Local'     => 'fb-badge-local',
                            'Artesanal' => 'fb-badge-local',
                            default     => '',
                        };
                ?>
                        <div class="fb-product-card">

                            <div class="fb-product-image"
                                 style="display:flex;align-items:center;
                                        justify-content:center;font-size:4.5rem;">
                                <?php echo $emoji; ?>
                                <span class="fb-product-badge <?php echo $badge_class; ?>">
                                    <?php echo $badge; ?>
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
                                    <span class="fb-stars">
                                        <?php echo $stars; ?>
                                    </span>
                                    <span class="fb-rating-count">
                                        <?php echo $reviews; ?>
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
                <?php endforeach;
                endif; ?>

            </div><!-- /#fb-products-grid -->

            <!-- Paginación -->
            <?php if (class_exists('WooCommerce') && isset($shop_query)) : ?>
                <div class="fb-pagination">
                    <?php
                    echo paginate_links([
                        'total'     => $shop_query->max_num_pages,
                        'current'   => $paged,
                        'prev_text' => '← Anterior',
                        'next_text' => 'Siguiente →',
                        'type'      => 'list',
                    ]);
                    ?>
                </div>
            <?php else : ?>
                <div class="fb-pagination">
                    <ul>
                        <li><a class="current">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Siguiente →</a></li>
                    </ul>
                </div>
            <?php endif; ?>

        </main><!-- /.fb-shop-main -->

    </div><!-- /.fb-shop-layout -->
</div><!-- /.fb-container -->

<!-- ============================================================
     CTA — SECCIÓN INFERIOR
     ============================================================ -->
<section style="background:var(--fb-bg-2);
                padding:64px 0;
                border-top:1px solid var(--fb-border-gray);">
    <div class="fb-container" style="text-align:center;">
        <span class="fb-label">¿Eres Agricultor o Productor?</span>
        <h2 style="margin-top:12px;margin-bottom:16px;">
            Vende tus Productos en FreshBite
        </h2>
        <p style="max-width:560px;margin:0 auto 32px;font-size:1.05rem;">
            Únete a más de 200 vendedores verificados y lleva tus
            productos frescos a miles de familias cada semana.
        </p>
        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
            <?php if (class_exists('WeDevs_Dokan')) : ?>
                <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>"
                   class="fb-btn fb-btn-primary fb-btn-lg">
                    🏪 Comenzar a Vender
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/contacto')); ?>"
                   class="fb-btn fb-btn-primary fb-btn-lg">
                    🏪 Comenzar a Vender
                </a>
            <?php endif; ?>
            <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
               class="fb-btn fb-btn-outline fb-btn-lg">
                Ver Nuestros Vendedores
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>