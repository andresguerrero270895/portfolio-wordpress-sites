<?php
/**
 * FreshBite Theme — woocommerce/archive-product.php
 * Override: WooCommerce shop/category archive
 */
defined('ABSPATH') || exit;

get_header();

$current_term = get_queried_object();
$is_category  = $current_term instanceof WP_Term;
$cat_name     = $is_category ? $current_term->name        : 'Tienda';
$cat_desc     = $is_category ? $current_term->description : '';
$cat_emoji    = $is_category
    ? freshbite_category_emoji($current_term->slug)
    : '🛒';
?>

<!-- ============================================================
     HERO DE ARCHIVO
     ============================================================ -->
<section style="background:linear-gradient(135deg,var(--fb-bg-2),var(--fb-bg-3));
                padding:48px 0;border-bottom:1px solid var(--fb-border-gray);">
    <div class="fb-container">
        <div class="fb-flex-between" style="flex-wrap:wrap;gap:24px;">

            <!-- Título -->
            <div style="display:flex;align-items:center;gap:16px;">
                <?php if ($is_category) : ?>
                    <div style="width:64px;height:64px;
                                background:<?php echo freshbite_category_color(0); ?>;
                                border-radius:var(--fb-radius);
                                display:flex;align-items:center;
                                justify-content:center;font-size:2rem;
                                flex-shrink:0;">
                        <?php echo $cat_emoji; ?>
                    </div>
                <?php endif; ?>
                <div>
                    <span class="fb-label">
                        <?php echo $is_category
                            ? 'Categoría'
                            : 'Productos Frescos'; ?>
                    </span>
                    <h1 style="margin-top:6px;
                                font-size:clamp(1.6rem,3vw,2.2rem);">
                        <?php echo esc_html($cat_name); ?>
                    </h1>
                    <?php if ($cat_desc) : ?>
                        <p style="margin-top:6px;color:var(--fb-gray-400);
                                   font-family:var(--fb-font);font-size:0.9rem;">
                            <?php echo esc_html($cat_desc); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Buscador rápido -->
            <form method="get"
                  action="<?php echo esc_url(home_url('/tienda')); ?>">
                <div class="fb-header-search"
                     style="max-width:320px;width:100%;">
                    <span class="fb-search-icon">🔍</span>
                    <input
                        type="search"
                        name="s"
                        placeholder="Buscar productos..."
                        value="<?php echo get_search_query(); ?>"
                        autocomplete="off"
                    >
                    <input type="hidden"
                           name="post_type"
                           value="product">
                </div>
            </form>

        </div>

        <!-- Breadcrumb -->
        <div class="fb-breadcrumb" style="margin-top:20px;">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                Inicio
            </a>
            <span>›</span>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">
                Tienda
            </a>
            <?php if ($is_category) : ?>
                <span>›</span>
                <span><?php echo esc_html($cat_name); ?></span>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     FILTROS RÁPIDOS
     ============================================================ -->
<section style="background:var(--fb-white);
                border-bottom:1px solid var(--fb-border-gray);
                padding:14px 0;">
    <div class="fb-container">
        <div class="fb-quick-filters">

            <span style="font-size:0.85rem;font-weight:600;
                         color:var(--fb-dark);font-family:var(--fb-font);
                         white-space:nowrap;">
                Filtrar:
            </span>

            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
               class="fb-quick-filter <?php echo !$is_category ? 'active' : ''; ?>">
                Todos
            </a>

            <?php
            $product_cats = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'number'     => 8,
                'exclude'    => [get_option('default_product_cat')],
            ]);

            if (!is_wp_error($product_cats)) :
                foreach ($product_cats as $cat) :
                    $is_active = $is_category
                        && $current_term->term_id === $cat->term_id;
            ?>
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>"
                       class="fb-quick-filter <?php echo $is_active ? 'active' : ''; ?>">
                        <?php echo freshbite_category_emoji($cat->slug); ?>
                        <?php echo esc_html($cat->name); ?>
                    </a>
            <?php
                endforeach;
            else :
                $fallback_quick = [
                    ['frutas',   '🍎 Frutas'],
                    ['verduras', '🥦 Verduras'],
                    ['lacteos',  '🥛 Lácteos'],
                    ['carnes',   '🥩 Carnes'],
                    ['panaderia','🍞 Panadería'],
                    ['organico', '🌿 Orgánicos'],
                ];
                foreach ($fallback_quick as [$slug, $label]) :
            ?>
                    <a href="<?php echo esc_url(
                           home_url('/tienda/?product_cat=' . $slug)
                       ); ?>"
                       class="fb-quick-filter">
                        <?php echo esc_html($label); ?>
                    </a>
            <?php
                endforeach;
            endif;
            ?>

            <!-- Filtros especiales -->
            <a href="<?php echo esc_url(
                   add_query_arg('on_sale', '1',
                   wc_get_page_permalink('shop'))
               ); ?>"
               class="fb-quick-filter <?php echo isset($_GET['on_sale']) ? 'active' : ''; ?>">
                🔥 En Oferta
            </a>

            <a href="<?php echo esc_url(
                   add_query_arg('orderby', 'popularity',
                   wc_get_page_permalink('shop'))
               ); ?>"
               class="fb-quick-filter <?php echo (($_GET['orderby'] ?? '') === 'popularity') ? 'active' : ''; ?>">
                ⭐ Más Vendidos
            </a>

        </div>
    </div>
</section>

<!-- ============================================================
     LAYOUT PRINCIPAL
     ============================================================ -->
<div class="fb-container">
    <div class="fb-shop-layout">

        <!-- ── SIDEBAR ─────────────────────────────────── -->
        <aside class="fb-shop-sidebar">

            <!-- Categorías -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Categorías</h4>
                <ul class="fb-filter-list">
                    <li class="fb-filter-item">
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                           style="font-size:0.88rem;
                                  color:<?php echo !$is_category
                                      ? 'var(--fb-primary)'
                                      : 'var(--fb-gray-400)'; ?>;
                                  font-family:var(--fb-font);
                                  font-weight:<?php echo !$is_category
                                      ? '600' : '400'; ?>;
                                  text-decoration:none;
                                  display:flex;justify-content:space-between;
                                  width:100%;">
                            Todos los Productos
                            <span class="fb-filter-count">
                                <?php echo wp_count_posts('product')->publish; ?>
                            </span>
                        </a>
                    </li>
                    <?php
                    $sidebar_cats = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                        'exclude'    => [get_option('default_product_cat')],
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                    ]);

                    if (!is_wp_error($sidebar_cats)) :
                        foreach ($sidebar_cats as $scat) :
                            $is_scat_active = $is_category
                                && $current_term->term_id === $scat->term_id;
                    ?>
                            <li class="fb-filter-item">
                                <a href="<?php echo esc_url(get_term_link($scat)); ?>"
                                   style="font-size:0.88rem;
                                          color:<?php echo $is_scat_active
                                              ? 'var(--fb-primary)'
                                              : 'var(--fb-gray-400)'; ?>;
                                          font-family:var(--fb-font);
                                          font-weight:<?php echo $is_scat_active
                                              ? '600' : '400'; ?>;
                                          text-decoration:none;
                                          display:flex;justify-content:space-between;
                                          width:100%;
                                          transition:var(--fb-transition);">
                                    <?php echo freshbite_category_emoji($scat->slug); ?>
                                    <?php echo esc_html($scat->name); ?>
                                    <span class="fb-filter-count">
                                        <?php echo esc_html($scat->count); ?>
                                    </span>
                                </a>
                            </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Rango de precio -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Precio</h4>
                <div class="fb-price-range">
                    <input type="range"
                           id="fb-price-range"
                           min="0"
                           max="100"
                           value="<?php echo isset($_GET['max_price'])
                               ? intval($_GET['max_price'])
                               : 100; ?>"
                           step="1">
                    <div class="fb-price-labels">
                        <span>\$0</span>
                        <span id="fb-price-val">
                            $<?php echo isset($_GET['max_price'])
                                ? intval($_GET['max_price'])
                                : 100; ?>
                        </span>
                    </div>
                </div>
                <a href="#"
                   id="fb-apply-price"
                   class="fb-btn fb-btn-outline fb-btn-sm"
                   style="margin-top:12px;width:100%;
                          justify-content:center;">
                    Aplicar Precio
                </a>
            </div>

            <!-- Tipo de producto -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Tipo de Producto</h4>
                <ul class="fb-filter-list">
                    <?php
                    $tipos = [
                        ['on_sale',  '🔥 En Oferta'],
                        ['featured', '⭐ Destacados'],
                    ];
                    foreach ($tipos as [$param, $label]) :
                        $is_tipo_active = isset($_GET[$param]);
                        $tipo_url = $is_tipo_active
                            ? remove_query_arg($param)
                            : add_query_arg($param, '1');
                    ?>
                        <li class="fb-filter-item">
                            <input type="checkbox"
                                   id="tipo-<?php echo esc_attr($param); ?>"
                                   onclick="window.location='<?php echo esc_url($tipo_url); ?>'"
                                   <?php checked($is_tipo_active); ?>>
                            <label for="tipo-<?php echo esc_attr($param); ?>">
                                <?php echo esc_html($label); ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Valoración -->
            <div class="fb-filter-card">
                <h4 class="fb-filter-title">Valoración Mínima</h4>
                <ul class="fb-filter-list">
                    <?php foreach ([5, 4, 3] as $r) : ?>
                        <li class="fb-filter-item">
                            <input type="checkbox"
                                   id="rating-<?php echo $r; ?>"
                                   class="fb-rating-filter"
                                   data-rating="<?php echo $r; ?>">
                            <label for="rating-<?php echo $r; ?>"
                                   style="display:flex;
                                          align-items:center;gap:4px;">
                                <?php echo str_repeat('★', $r); ?>
                                <?php echo str_repeat('☆', 5 - $r); ?>
                                <span style="font-size:0.75rem;
                                             color:var(--fb-gray-300);">
                                    y más
                                </span>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Limpiar filtros -->
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
               class="fb-btn fb-btn-outline"
               style="width:100%;justify-content:center;">
                🗑️ Limpiar Filtros
            </a>

        </aside>

        <!-- ── MAIN CONTENT ────────────────────────────── -->
        <main>

            <?php if (woocommerce_product_loop()) : ?>

                <!-- Toolbar -->
                <div class="fb-shop-toolbar">
                    <p class="fb-shop-count">
                        <?php
                        global $wp_query;
                        $total = $wp_query->found_posts;
                        $paged = max(1, get_query_var('paged'));
                        $per   = wc_get_default_products_per_row()
                               * wc_get_default_product_rows_per_page();
                        $from  = (($paged - 1) * $per) + 1;
                        $to    = min($total, $paged * $per);
                        ?>
                        Mostrando
                        <strong><?php echo esc_html($from . '–' . $to); ?></strong>
                        de
                        <strong><?php echo esc_html($total); ?></strong>
                        productos
                    </p>

                    <div style="display:flex;align-items:center;gap:12px;">

                        <!-- Ordenar por -->
                        <form method="get" id="fb-orderby-form">
                            <?php
                            // Preserve existing query params
                            foreach ($_GET as $key => $val) :
                                if ($key === 'orderby') continue;
                            ?>
                                <input type="hidden"
                                       name="<?php echo esc_attr($key); ?>"
                                       value="<?php echo esc_attr($val); ?>">
                            <?php endforeach; ?>
                            <select name="orderby"
                                    class="fb-sort-select"
                                    onchange="document.getElementById(
                                        'fb-orderby-form'
                                    ).submit()">
                                <option value="menu_order"
                                        <?php selected(
                                            $_GET['orderby'] ?? '',
                                            'menu_order'
                                        ); ?>>
                                    Orden Predeterminado
                                </option>
                                <option value="popularity"
                                        <?php selected(
                                            $_GET['orderby'] ?? '',
                                            'popularity'
                                        ); ?>>
                                    Más Vendidos
                                </option>
                                <option value="rating"
                                        <?php selected(
                                            $_GET['orderby'] ?? '',
                                            'rating'
                                        ); ?>>
                                    Mejor Valorados
                                </option>
                                <option value="date"
                                        <?php selected(
                                            $_GET['orderby'] ?? '',
                                            'date'
                                        ); ?>>
                                    Más Recientes
                                </option>
                                <option value="price"
                                        <?php selected(
                                            $_GET['orderby'] ?? '',
                                            'price'
                                        ); ?>>
                                    Precio: Menor a Mayor
                                </option>
                                <option value="price-desc"
                                        <?php selected(
                                            $_GET['orderby'] ?? '',
                                            'price-desc'
                                        ); ?>>
                                    Precio: Mayor a Menor
                                </option>
                            </select>
                        </form>

                        <!-- Vista toggle -->
                        <div class="fb-view-toggle">
                            <button class="fb-view-btn active"
                                    data-view="grid"
                                    title="Cuadrícula">
                                ⊞
                            </button>
                            <button class="fb-view-btn"
                                    data-view="list"
                                    title="Lista">
                                ☰
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Grid de productos -->
                <div class="fb-product-grid" id="fb-products-grid">

                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        global $product;
                        if (!$product) continue;
                        ?>

                        <div class="fb-product-card">

                            <!-- Imagen -->
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
                                              height:100%;font-size:4rem;">
                                        <?php echo freshbite_category_emoji(
                                            $is_category
                                                ? $current_term->slug
                                                : 'default'
                                        ); ?>
                                    </a>
                                <?php endif; ?>

                                <?php echo freshbite_product_badge($product); ?>

                                <!-- Wishlist -->
                                <?php if (class_exists('WC_Wishlists')) : ?>
                                    <?php do_action('woocommerce_after_shop_loop_item_title'); ?>
                                <?php else : ?>
                                    <button class="fb-product-wishlist"
                                            aria-label="Agregar a favoritos">
                                        ♡
                                    </button>
                                <?php endif; ?>
                            </div>

                            <!-- Cuerpo -->
                            <div class="fb-product-body">

                                <!-- Categoría -->
                                <?php
                                $terms = get_the_terms(
                                    get_the_ID(),
                                    'product_cat'
                                );
                                if ($terms && !is_wp_error($terms)) :
                                    $first = reset($terms);
                                ?>
                                    <a href="<?php echo esc_url(
                                           get_term_link($first)
                                       ); ?>"
                                       style="font-size:0.72rem;
                                              color:var(--fb-gray-300);
                                              font-family:var(--fb-font);
                                              text-decoration:none;
                                              letter-spacing:0.05em;
                                              text-transform:uppercase;
                                              display:block;
                                              margin-bottom:2px;">
                                        <?php echo esc_html($first->name); ?>
                                    </a>
                                <?php endif; ?>

                                <!-- Nombre -->
                                <a href="<?php the_permalink(); ?>"
                                   class="fb-product-name">
                                    <?php the_title(); ?>
                                </a>

                                <!-- Rating -->
                                <div class="fb-product-rating">
                                    <?php
                                    $avg = $product->get_average_rating();
                                    echo freshbite_stars($avg ?: 5);
                                    ?>
                                    <span class="fb-rating-count">
                                        (<?php echo $product->get_review_count(); ?>)
                                    </span>
                                </div>

                                <!-- Stock -->
                                <?php if (!$product->is_in_stock()) : ?>
                                    <span style="font-size:0.75rem;
                                                 color:var(--fb-red);
                                                 font-family:var(--fb-font);
                                                 font-weight:600;">
                                        Sin stock
                                    </span>
                                <?php elseif ($product->get_stock_quantity()
                                              && $product->get_stock_quantity() <= 5) : ?>
                                    <span style="font-size:0.75rem;
                                                 color:var(--fb-accent);
                                                 font-family:var(--fb-font);
                                                 font-weight:600;">
                                        ⚠️ Últimas
                                        <?php echo $product->get_stock_quantity(); ?>
                                        unidades
                                    </span>
                                <?php endif; ?>

                            </div>

                            <!-- Pie -->
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

                                <?php if ($product->is_in_stock()) : ?>
                                    <a href="<?php echo esc_url(
                                           $product->add_to_cart_url()
                                       ); ?>"
                                       class="fb-add-to-cart"
                                       data-product-id="<?php echo get_the_ID(); ?>"
                                       aria-label="Agregar al carrito">
                                        🛒
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>"
                                       class="fb-add-to-cart"
                                       style="background:var(--fb-gray-300);">
                                        👁️
                                    </a>
                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endwhile; ?>

                </div><!-- /.fb-product-grid -->

                <!-- Paginación -->
                <div class="fb-pagination" style="margin-top:48px;">
                    <?php
                    $big = 999999999;
                    echo paginate_links([
                        'base'      => str_replace(
                            $big, '%#%', esc_url(get_pagenum_link($big))
                        ),
                        'format'    => '?paged=%#%',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $wp_query->max_num_pages,
                        'prev_text' => '← Anterior',
                        'next_text' => 'Siguiente →',
                        'type'      => 'list',
                    ]);
                    ?>
                </div>

            <?php else : ?>

                <!-- Sin resultados -->
                <div class="fb-no-results">
                    <span>🥬</span>
                    <h3>No encontramos productos</h3>
                    <p>
                        Intenta con otra categoría o quita algunos filtros.
                    </p>
                    <div style="display:flex;gap:12px;flex-wrap:wrap;
                                justify-content:center;margin-top:8px;">
                        <a href="<?php echo esc_url(
                               wc_get_page_permalink('shop')
                           ); ?>"
                           class="fb-btn fb-btn-primary">
                            Ver Todos los Productos
                        </a>
                        <a href="<?php echo esc_url(home_url('/contacto')); ?>"
                           class="fb-btn fb-btn-outline">
                            Contactar Soporte
                        </a>
                    </div>
                </div>

            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        </main><!-- /main -->

    </div><!-- /.fb-shop-layout -->
</div><!-- /.fb-container -->

<!-- ============================================================
     CTA INFERIOR
     ============================================================ -->
<section style="background:var(--fb-bg-2);padding:64px 0;
                border-top:1px solid var(--fb-border-gray);
                margin-top:48px;">
    <div class="fb-container">
        <div style="display:grid;grid-template-columns:repeat(3,1fr);
                    gap:24px;">
            <?php
            $ctas = [
                [
                    '🚚',
                    'Envío Gratis',
                    'En pedidos mayores a \$35',
                    home_url('/tienda'),
                    'Ver Tienda',
                    'var(--fb-primary)',
                ],
                [
                    '🌿',
                    'Garantía Orgánica',
                    '100% certificado USDA Organic',
                    home_url('/nosotros'),
                    'Conocer Más',
                    'var(--fb-secondary)',
                ],
                [
                    '🏪',
                    '¿Eres Agricultor?',
                    'Vende tus productos aquí',
                    home_url('/vendedores'),
                    'Empezar a Vender',
                    'var(--fb-accent)',
                ],
            ];
            foreach ($ctas as [$icon, $titulo, $desc, $url, $cta, $color]) :
            ?>
                <div style="background:var(--fb-white);
                             border-radius:var(--fb-radius);
                             padding:28px 24px;
                             border:1.5px solid var(--fb-border-gray);
                             display:flex;align-items:center;gap:16px;">
                    <div style="width:52px;height:52px;flex-shrink:0;
                                background:<?php echo $color; ?>18;
                                border-radius:var(--fb-radius);
                                display:flex;align-items:center;
                                justify-content:center;font-size:1.5rem;">
                        <?php echo $icon; ?>
                    </div>
                    <div style="flex:1;">
                        <strong style="display:block;
                                       font-family:var(--fb-font);
                                       font-size:0.95rem;
                                       color:var(--fb-dark);
                                       margin-bottom:4px;">
                            <?php echo esc_html($titulo); ?>
                        </strong>
                        <p style="font-size:0.82rem;
                                   color:var(--fb-gray-400);
                                   font-family:var(--fb-font);
                                   margin-bottom:10px;">
                            <?php echo esc_html($desc); ?>
                        </p>
                        <a href="<?php echo esc_url($url); ?>"
                           style="font-size:0.82rem;
                                  color:<?php echo $color; ?>;
                                  font-weight:600;
                                  font-family:var(--fb-font);
                                  text-decoration:none;">
                            <?php echo esc_html($cta); ?> →
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>