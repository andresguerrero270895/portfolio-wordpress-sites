<?php
/**
 * FreshBite Theme — 404.php
 * Template: Página no encontrada
 */
defined('ABSPATH') || exit;

get_header();
?>

<!-- ============================================================
     SECCIÓN 404
     ============================================================ -->
<section class="fb-404-section">
    <div class="fb-container">
        <div class="fb-404-inner">

            <!-- Animación visual -->
            <div class="fb-404-visual">
                <div class="fb-404-plate">
                    <span class="fb-404-emoji-main">🍽️</span>
                    <div class="fb-404-steam">
                        <span>~</span>
                        <span>~</span>
                        <span>~</span>
                    </div>
                </div>
                <div class="fb-404-floating-items">
                    <span class="fb-float-item f1">🥕</span>
                    <span class="fb-float-item f2">🍎</span>
                    <span class="fb-float-item f3">🥦</span>
                    <span class="fb-float-item f4">🍋</span>
                    <span class="fb-float-item f5">🫐</span>
                    <span class="fb-float-item f6">🥑</span>
                </div>
            </div>

            <!-- Contenido -->
            <div class="fb-404-content">

                <!-- Número 404 -->
                <div class="fb-404-number">
                    <span>4</span>
                    <span class="fb-404-zero">🥬</span>
                    <span>4</span>
                </div>

                <h1 class="fb-404-title">
                    ¡Oops! Esta página<br>
                    <span style="color:var(--fb-primary);">
                        no está en el menú
                    </span>
                </h1>

                <p class="fb-404-desc">
                    Parece que la página que buscas se fue al mercado
                    y no volvió. No te preocupes, tenemos muchas otras
                    cosas frescas esperándote.
                </p>

                <!-- Buscador -->
                <div class="fb-404-search">
                    <form method="get"
                          action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="fb-404-search-inner">
                            <span>🔍</span>
                            <input
                                type="search"
                                name="s"
                                placeholder="Buscar productos frescos..."
                                autocomplete="off"
                            >
                            <?php if (class_exists('WooCommerce')) : ?>
                                <input type="hidden"
                                       name="post_type"
                                       value="product">
                            <?php endif; ?>
                            <button type="submit">Buscar</button>
                        </div>
                    </form>
                </div>

                <!-- Links rápidos -->
                <div class="fb-404-links">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       class="fb-btn fb-btn-primary">
                        🏠 Ir al Inicio
                    </a>
                    <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                       class="fb-btn fb-btn-secondary">
                        🛒 Ver Tienda
                    </a>
                    <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                       class="fb-btn fb-btn-outline">
                        🏪 Ver Vendedores
                    </a>
                    <a href="<?php echo esc_url(home_url('/contacto')); ?>"
                       class="fb-btn fb-btn-outline">
                        ✉️ Contacto
                    </a>
                </div>

            </div><!-- /.fb-404-content -->

        </div><!-- /.fb-404-inner -->
    </div><!-- /.fb-container -->
</section>

<!-- ============================================================
     PRODUCTOS SUGERIDOS
     ============================================================ -->
<section style="background:var(--fb-white);padding:64px 0;
                border-top:1px solid var(--fb-border-gray);">
    <div class="fb-container">

        <div class="fb-section-header" style="margin-bottom:40px;">
            <span class="fb-label">Mientras Tanto</span>
            <h2>Productos que Podrían Gustarte</h2>
            <p>
                No encontraste lo que buscabas, pero aquí tienes
                algunos de nuestros productos más populares.
            </p>
        </div>

        <?php
        $productos = freshbite_get_new_products(4);

        $fallback = [
            ['🍎', 'Manzanas Orgánicas',     'Granja Green Valley',  '\$4.99', '/lb',     '★★★★★'],
            ['🥦', 'Brócoli Fresco',          'Lo Mejor de la Natura','\$2.49', '/unidad', '★★★★★'],
            ['🍯', 'Miel Silvestre Natural',  'Blue Sky Apiaries',    '\$12.99','/16oz',   '★★★★★'],
            ['🥚', 'Huevos de Granja Libres', 'Sunny Side Farm',      '\$6.49', '/docena', '★★★★★'],
        ];

        $tiene = $productos->have_posts();
        ?>

        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">

            <?php if ($tiene) : ?>

                <?php while ($productos->have_posts()) :
                    $productos->the_post();
                    global $product;
                    if (!$product) continue;
                ?>
                    <div class="fb-product-card">
                        <div class="fb-product-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('freshbite-product'); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>"
                                   style="display:flex;align-items:center;
                                          justify-content:center;
                                          height:100%;font-size:4rem;">
                                    🛒
                                </a>
                            <?php endif; ?>
                            <?php echo freshbite_product_badge($product); ?>
                            <button class="fb-product-wishlist">♡</button>
                        </div>
                        <div class="fb-product-body">
                            <span class="fb-product-vendor">
                                <?php echo esc_html(get_the_author()); ?>
                            </span>
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
                                    <?php echo wc_price($product->get_price()); ?>
                                </span>
                            </div>
                            <a href="<?php echo esc_url(
                                   $product->add_to_cart_url()
                               ); ?>"
                               class="fb-add-to-cart"
                               aria-label="Agregar al carrito">
                                🛒
                            </a>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php else : ?>

                <?php foreach ($fallback as [
                    $emoji, $nombre, $vendedor,
                    $precio, $unidad, $stars
                ]) : ?>
                    <div class="fb-product-card">
                        <div class="fb-product-image"
                             style="display:flex;align-items:center;
                                    justify-content:center;font-size:4.5rem;">
                            <?php echo $emoji; ?>
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
                            </div>
                        </div>
                        <div class="fb-product-footer">
                            <div class="fb-product-price">
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

        </div>

        <div style="text-align:center;margin-top:40px;">
            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
               class="fb-btn fb-btn-primary fb-btn-lg">
                Ver Todos los Productos →
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
     CATEGORÍAS RÁPIDAS
     ============================================================ -->
<section style="background:var(--fb-bg);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-section-header" style="margin-bottom:40px;">
            <span class="fb-label">Explora</span>
            <h2>Navega por Categorías</h2>
        </div>

        <div class="fb-category-grid"
             style="grid-template-columns:repeat(6,1fr);">
            <?php
            $cats = freshbite_get_product_categories();
            $fallback_cats = [
                ['🍎', 'Frutas',      'frutas'],
                ['🥦', 'Verduras',    'verduras'],
                ['🥛', 'Lácteos',     'lacteos'],
                ['🥩', 'Carnes',      'carnes'],
                ['🍞', 'Panadería',   'panaderia'],
                ['🌿', 'Orgánicos',   'organico'],
                ['🐟', 'Mariscos',    'mariscos'],
                ['🧃', 'Bebidas',     'bebidas'],
                ['🫙', 'Despensa',    'despensa'],
                ['❄️', 'Congelados',  'congelados'],
                ['🍿', 'Snacks',      'snacks'],
                ['🌱', 'Hierbas',     'hierbas'],
            ];

            $tiene_cats = !is_wp_error($cats) && !empty($cats);

            if ($tiene_cats) :
                foreach (array_slice($cats, 0, 12) as $i => $cat) :
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
                    </a>
            <?php
                endforeach;
            else :
                foreach ($fallback_cats as $i => [$emoji, $nombre, $slug]) :
            ?>
                    <a href="<?php echo esc_url(
                           home_url('/tienda/?product_cat=' . $slug)
                       ); ?>"
                       class="fb-category-card">
                        <div class="fb-category-icon"
                             style="background:<?php echo freshbite_category_color($i); ?>">
                            <?php echo $emoji; ?>
                        </div>
                        <span class="fb-category-name">
                            <?php echo esc_html($nombre); ?>
                        </span>
                    </a>
            <?php
                endforeach;
            endif;
            ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>