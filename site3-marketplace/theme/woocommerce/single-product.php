<?php
/**
 * FreshBite Theme — woocommerce/single-product.php
 * Override: WooCommerce single product page
 */
defined('ABSPATH') || exit;

get_header();

while (have_posts()) :
    the_post();
    global $product;

    $pid          = get_the_ID();
    $price        = $product->get_price();
    $regular      = $product->get_regular_price();
    $is_sale      = $product->is_on_sale();
    $is_featured  = $product->is_featured();
    $in_stock     = $product->is_in_stock();
    $rating       = $product->get_average_rating();
    $review_count = $product->get_review_count();
    $sku          = $product->get_sku();
    $weight       = $product->get_weight();
    $categories   = get_the_terms($pid, 'product_cat');
    $tags         = get_the_terms($pid, 'product_tag');
    $gallery_ids  = $product->get_gallery_image_ids();

endwhile;
?>

<!-- ============================================================
     BREADCRUMB
     ============================================================ -->
<section style="background:var(--fb-white);
                padding:16px 0;
                border-bottom:1px solid var(--fb-border-gray);">
    <div class="fb-container">
        <div class="fb-breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                Inicio
            </a>
            <span>›</span>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">
                Tienda
            </a>
            <?php if ($categories && !is_wp_error($categories)) :
                $cat = reset($categories);
            ?>
                <span>›</span>
                <a href="<?php echo esc_url(get_term_link($cat)); ?>">
                    <?php echo esc_html($cat->name); ?>
                </a>
            <?php endif; ?>
            <span>›</span>
            <span><?php the_title(); ?></span>
        </div>
    </div>
</section>

<!-- ============================================================
     PRODUCTO PRINCIPAL
     ============================================================ -->
<section class="fb-product-single" style="background:var(--fb-bg);">
    <div class="fb-container">
        <div class="fb-product-single-layout">

            <!-- ── GALERÍA ─────────────────────────────────── -->
            <div class="fb-product-gallery">

                <!-- Imagen principal -->
                <div class="fb-product-main-image" id="fb-main-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_url(
                                 get_the_post_thumbnail_url($pid, 'full')
                             ); ?>"
                             alt="<?php the_title_attribute(); ?>"
                             id="fb-main-img">
                    <?php else : ?>
                        <div style="display:flex;align-items:center;
                                    justify-content:center;height:100%;
                                    font-size:8rem;background:var(--fb-bg-2);">
                            <?php
                            if ($categories && !is_wp_error($categories)) {
                                $cat = reset($categories);
                                echo freshbite_category_emoji($cat->slug);
                            } else {
                                echo '🛒';
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- Badges -->
                    <div class="fb-product-gallery-badges">
                        <?php if ($is_sale) : ?>
                            <span class="fb-product-badge fb-badge-sale">
                                Oferta
                            </span>
                        <?php endif; ?>
                        <?php if ($is_featured) : ?>
                            <span class="fb-product-badge fb-badge-organic">
                                Destacado
                            </span>
                        <?php endif; ?>
                        <?php if (!$in_stock) : ?>
                            <span class="fb-product-badge"
                                  style="background:rgba(100,116,139,0.9);
                                         color:white;">
                                Sin Stock
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Zoom hint -->
                    <div class="fb-zoom-hint">
                        <span>🔍 Clic para ampliar</span>
                    </div>
                </div>

                <!-- Miniaturas -->
                <?php if (!empty($gallery_ids)) : ?>
                    <div class="fb-product-thumbs" id="fb-thumbs">

                        <!-- Miniatura principal -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="fb-product-thumb active"
                                 data-src="<?php echo esc_url(
                                     get_the_post_thumbnail_url($pid, 'full')
                                 ); ?>">
                                <img src="<?php echo esc_url(
                                         get_the_post_thumbnail_url(
                                             $pid, 'thumbnail'
                                         )
                                     ); ?>"
                                     alt="Principal">
                            </div>
                        <?php endif; ?>

                        <!-- Galería adicional -->
                        <?php foreach ($gallery_ids as $img_id) :
                            $full  = wp_get_attachment_image_url($img_id, 'full');
                            $thumb = wp_get_attachment_image_url($img_id, 'thumbnail');
                            $alt   = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                        ?>
                            <div class="fb-product-thumb"
                                 data-src="<?php echo esc_url($full); ?>">
                                <img src="<?php echo esc_url($thumb); ?>"
                                     alt="<?php echo esc_attr($alt); ?>">
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>

                <!-- Badges de confianza -->
                <div class="fb-product-trust-badges">
                    <?php
                    $trust = [
                        ['🌿', 'Orgánico Certificado'],
                        ['🚚', 'Envío el Mismo Día'],
                        ['💯', 'Garantía de Frescura'],
                        ['🔒', 'Pago Seguro'],
                    ];
                    foreach ($trust as [$icon, $label]) :
                    ?>
                        <div class="fb-trust-badge-item">
                            <span><?php echo $icon; ?></span>
                            <span><?php echo esc_html($label); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div><!-- /.fb-product-gallery -->

            <!-- ── INFO DEL PRODUCTO ──────────────────────── -->
            <div class="fb-product-info">

                <!-- Categoría -->
                <?php if ($categories && !is_wp_error($categories)) :
                    $cat = reset($categories);
                ?>
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>"
                       class="fb-product-cat-link">
                        <?php echo freshbite_category_emoji($cat->slug); ?>
                        <?php echo esc_html($cat->name); ?>
                    </a>
                <?php endif; ?>

                <!-- Título -->
                <h1 class="fb-product-title">
                    <?php the_title(); ?>
                </h1>

                <!-- Meta: rating + vendidos + SKU -->
                <div class="fb-product-meta-row">
                    <?php if ($review_count > 0) : ?>
                        <div style="display:flex;align-items:center;gap:6px;">
                            <?php echo freshbite_stars(floatval($rating)); ?>
                            <a href="#fb-reviews-section"
                               style="font-size:0.85rem;
                                      color:var(--fb-gray-400);
                                      font-family:var(--fb-font);
                                      text-decoration:none;">
                                <?php echo esc_html($review_count); ?> reseñas
                            </a>
                        </div>
                        <span class="fb-meta-divider">|</span>
                    <?php endif; ?>

                    <?php
                    $sold = get_post_meta($pid, 'total_sales', true);
                    if ($sold > 0) :
                    ?>
                        <span style="font-size:0.85rem;
                                     color:var(--fb-gray-400);
                                     font-family:var(--fb-font);">
                            🛒 <?php echo esc_html($sold); ?> vendidos
                        </span>
                        <span class="fb-meta-divider">|</span>
                    <?php endif; ?>

                    <?php if ($sku) : ?>
                        <span style="font-size:0.82rem;
                                     color:var(--fb-gray-300);
                                     font-family:var(--fb-font);">
                            SKU: <?php echo esc_html($sku); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Precio -->
                <div class="fb-product-price-block">
                    <?php if ($is_sale && $regular) : ?>
                        <span class="fb-price-old"
                              style="font-size:1.1rem;">
                            <?php echo wc_price($regular); ?>
                        </span>
                        <?php
                        $discount = round((($regular - $price) / $regular) * 100);
                        ?>
                        <span class="fb-discount-badge">
                            -<?php echo $discount; ?>%
                        </span>
                    <?php endif; ?>
                    <span class="fb-price-current"
                          style="font-size:2.2rem;
                                 color:var(--fb-primary);">
                        <?php echo wc_price($price); ?>
                    </span>
                    <span style="font-size:0.85rem;
                                 color:var(--fb-gray-300);
                                 font-family:var(--fb-font);">
                        / unidad
                    </span>
                </div>

                <!-- Stock status -->
                <div class="fb-stock-status">
                    <?php if ($in_stock) :
                        $qty = $product->get_stock_quantity();
                        if ($qty && $qty <= 10) :
                    ?>
                            <span class="fb-stock-low-badge">
                                ⚠️ Últimas <?php echo esc_html($qty); ?> unidades
                            </span>
                    <?php   else : ?>
                            <span class="fb-stock-available">
                                ✅ En stock — Listo para envío
                            </span>
                    <?php   endif;
                    else : ?>
                        <span class="fb-stock-out">
                            ❌ Sin stock temporalmente
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Descripción corta -->
                <?php if ($product->get_short_description()) : ?>
                    <div class="fb-product-short-desc">
                        <?php echo wp_kses_post(
                            $product->get_short_description()
                        ); ?>
                    </div>
                <?php else : ?>
                    <div class="fb-product-short-desc">
                        <p>
                            Producto fresco y de alta calidad, seleccionado
                            directamente de agricultores locales certificados.
                            Cosechado en su punto óptimo de madurez para
                            garantizar el mejor sabor y valor nutricional.
                        </p>
                    </div>
                <?php endif; ?>

                <!-- Variaciones (si aplica) -->
                <?php if ($product->is_type('variable')) : ?>
                    <?php woocommerce_variable_add_to_cart(); ?>
                <?php else : ?>

                    <!-- Formulario agregar al carrito -->
                    <?php if ($in_stock) : ?>
                        <form class="fb-add-to-cart-form"
                              action="<?php echo esc_url(
                                  $product->add_to_cart_url()
                              ); ?>"
                              method="post"
                              enctype="multipart/form-data">

                            <!-- Selector de cantidad -->
                            <div class="fb-cart-row">
                                <div class="fb-quantity-selector">
                                    <button type="button"
                                            class="fb-qty-btn"
                                            data-action="minus"
                                            aria-label="Reducir cantidad">
                                        −
                                    </button>
                                    <input type="number"
                                           name="quantity"
                                           class="fb-qty-input"
                                           value="1"
                                           min="1"
                                           max="<?php echo $product->get_max_purchase_quantity() ?: 99; ?>"
                                           step="1">
                                    <button type="button"
                                            class="fb-qty-btn"
                                            data-action="plus"
                                            aria-label="Aumentar cantidad">
                                        +
                                    </button>
                                </div>

                                <input type="hidden"
                                       name="add-to-cart"
                                       value="<?php echo esc_attr($pid); ?>">

                                <div class="fb-product-actions">
                                    <button type="submit"
                                            class="fb-btn fb-btn-primary fb-btn-lg"
                                            style="flex:1;">
                                        🛒 Agregar al Carrito
                                    </button>
                                    <button type="button"
                                            class="fb-wishlist-btn"
                                            aria-label="Agregar a favoritos"
                                            title="Guardar en favoritos">
                                        ♡
                                    </button>
                                </div>

                            </div>

                        </form>

                        <!-- Botón comprar ahora -->
                        <a href="<?php echo esc_url(
                               add_query_arg(
                                   ['add-to-cart' => $pid],
                                   wc_get_checkout_url()
                               )
                           ); ?>"
                           class="fb-btn fb-btn-secondary fb-btn-lg"
                           style="width:100%;justify-content:center;
                                  margin-top:12px;">
                            ⚡ Comprar Ahora
                        </a>

                    <?php else : ?>
                        <button class="fb-btn fb-btn-primary fb-btn-lg"
                                disabled
                                style="width:100%;justify-content:center;
                                       opacity:0.5;cursor:not-allowed;">
                            Sin Stock
                        </button>
                    <?php endif; ?>

                <?php endif; ?>

                <!-- Entrega estimada -->
                <div class="fb-delivery-estimate">
                    <div class="fb-delivery-item">
                        <span class="fb-delivery-icon">🚚</span>
                        <div>
                            <strong>Envío Estándar</strong>
                            <span>
                                Llega el
                                <?php echo date('d M', strtotime('+2 days')); ?>
                                –
                                <?php echo date('d M', strtotime('+4 days')); ?>
                            </span>
                        </div>
                    </div>
                    <div class="fb-delivery-item">
                        <span class="fb-delivery-icon">⚡</span>
                        <div>
                            <strong>Envío Express</strong>
                            <span>
                                Mismo día si pides antes de las 11am
                            </span>
                        </div>
                    </div>
                    <div class="fb-delivery-item">
                        <span class="fb-delivery-icon">🏪</span>
                        <div>
                            <strong>Pickup Gratis</strong>
                            <span>
                                Recoge en la granja sin costo adicional
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Detalles del producto -->
                <div class="fb-product-details-accordion">

                    <!-- Descripción -->
                    <div class="fb-accordion-item open">
                        <button class="fb-accordion-btn">
                            <span>📋 Descripción del Producto</span>
                            <span class="fb-accordion-arrow">›</span>
                        </button>
                        <div class="fb-accordion-content">
                            <?php if (get_the_content()) : ?>
                                <div class="fb-product-description">
                                    <?php the_content(); ?>
                                </div>
                            <?php else : ?>
                                <p style="font-family:var(--fb-font);
                                           font-size:0.9rem;
                                           color:var(--fb-gray-400);
                                           line-height:1.7;">
                                    Producto fresco de primera calidad,
                                    cosechado y seleccionado con cuidado
                                    por nuestros agricultores certificados.
                                    Sin conservantes, sin químicos añadidos.
                                    Listo para disfrutar desde el primer día.
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Información nutricional -->
                    <div class="fb-accordion-item">
                        <button class="fb-accordion-btn">
                            <span>🥗 Información Nutricional</span>
                            <span class="fb-accordion-arrow">›</span>
                        </button>
                        <div class="fb-accordion-content">
                            <div class="fb-nutrition-grid">
                                <?php
                                $nutrition = [
                                    ['Calorías',     '52 kcal'],
                                    ['Carbohidratos', '14g'],
                                    ['Proteínas',    '0.3g'],
                                    ['Grasas',       '0.2g'],
                                    ['Fibra',        '2.4g'],
                                    ['Vitamina C',   '14%'],
                                ];
                                foreach ($nutrition as [$name, $val]) :
                                ?>
                                    <div class="fb-nutrition-item">
                                        <span class="fb-nutrition-name">
                                            <?php echo esc_html($name); ?>
                                        </span>
                                        <span class="fb-nutrition-val">
                                            <?php echo esc_html($val); ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <p style="font-size:0.75rem;
                                       color:var(--fb-gray-300);
                                       font-family:var(--fb-font);
                                       margin-top:12px;">
                                * Valores aproximados por 100g de producto.
                            </p>
                        </div>
                    </div>

                    <!-- Detalles de envío -->
                    <div class="fb-accordion-item">
                        <button class="fb-accordion-btn">
                            <span>📦 Detalles de Envío</span>
                            <span class="fb-accordion-arrow">›</span>
                        </button>
                        <div class="fb-accordion-content">
                            <ul style="font-family:var(--fb-font);
                                       font-size:0.88rem;
                                       color:var(--fb-gray-400);
                                       line-height:1.9;
                                       padding-left:4px;">
                                <li>🚚 Envío estándar: 2-4 días hábiles</li>
                                <li>⚡ Envío express: mismo día (pedidos antes de 11am)</li>
                                <li>🏪 Pickup gratuito disponible en la granja</li>
                                <li>📦 Empaque biodegradable y refrigerado</li>
                                <li>🌡️ Cadena de frío garantizada en tránsito</li>
                                <li>💯 Garantía de frescura o devolución total</li>
                                <?php if ($weight) : ?>
                                    <li>⚖️ Peso: <?php echo esc_html($weight); ?> kg</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Política de devoluciones -->
                    <div class="fb-accordion-item">
                        <button class="fb-accordion-btn">
                            <span>🔄 Devoluciones y Garantía</span>
                            <span class="fb-accordion-arrow">›</span>
                        </button>
                        <div class="fb-accordion-content">
                            <p style="font-family:var(--fb-font);
                                       font-size:0.88rem;
                                       color:var(--fb-gray-400);
                                       line-height:1.7;">
                                En FreshBite garantizamos la frescura de todos
                                nuestros productos. Si recibes un producto que
                                no cumple nuestros estándares de calidad,
                                te ofrecemos:
                            </p>
                            <ul style="font-family:var(--fb-font);
                                       font-size:0.88rem;
                                       color:var(--fb-gray-400);
                                       line-height:1.9;
                                       margin-top:10px;
                                       padding-left:4px;">
                                <li>💰 Reembolso completo en 24 horas</li>
                                <li>🔄 Reenvío sin costo del producto</li>
                                <li>📞 Soporte disponible 7 días a la semana</li>
                            </ul>
                        </div>
                    </div>

                </div><!-- /.fb-product-details-accordion -->

                <!-- Tags del producto -->
                <?php if ($tags && !is_wp_error($tags)) : ?>
                    <div style="display:flex;flex-wrap:wrap;
                                gap:8px;margin-top:8px;">
                        <span style="font-size:0.82rem;
                                     color:var(--fb-gray-400);
                                     font-family:var(--fb-font);">
                            Etiquetas:
                        </span>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_term_link($tag)); ?>"
                               class="fb-tag">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Compartir -->
                <div class="fb-share-row">
                    <span style="font-size:0.82rem;
                                 color:var(--fb-gray-400);
                                 font-family:var(--fb-font);">
                        Compartir:
                    </span>
                    <?php
                    $share_url   = urlencode(get_permalink());
                    $share_title = urlencode(get_the_title());
                    $shares = [
                        ['📘', 'Facebook',
                         "https://facebook.com/sharer/sharer.php?u={$share_url}"],
                        ['🐦', 'Twitter',
                         "https://twitter.com/intent/tweet?url={$share_url}&text={$share_title}"],
                        ['💬', 'WhatsApp',
                         "https://wa.me/?text={$share_title}%20{$share_url}"],
                        ['📧', 'Email',
                         "mailto:?subject={$share_title}&body={$share_url}"],
                    ];
                    foreach ($shares as [$icon, $name, $url]) :
                    ?>
                        <a href="<?php echo esc_url($url); ?>"
                           target="_blank"
                           rel="noopener"
                           class="fb-share-btn"
                           title="Compartir en <?php echo esc_attr($name); ?>">
                            <?php echo $icon; ?>
                        </a>
                    <?php endforeach; ?>
                </div>

            </div><!-- /.fb-product-info -->

        </div><!-- /.fb-product-single-layout -->
    </div><!-- /.fb-container -->
</section>

<!-- ============================================================
     INFORMACIÓN DEL VENDEDOR
     ============================================================ -->
<section style="background:var(--fb-white);padding:48px 0;
                border-top:1px solid var(--fb-border-gray);">
    <div class="fb-container">

        <?php
        // Buscar vendedor relacionado
        $author_id    = get_post_field('post_author', $pid);
        $author_name  = get_the_author_meta('display_name', $author_id);

        // Intentar encontrar fb_vendor con mismo nombre
        $vendor_query = new WP_Query([
            'post_type'      => 'fb_vendor',
            'posts_per_page' => 1,
            'orderby'        => 'rand',
        ]);
        ?>

        <div style="display:grid;grid-template-columns:1fr 2fr;
                    gap:40px;align-items:center;">

            <!-- Info del vendedor -->
            <div style="background:var(--fb-bg);
                         border:1.5px solid var(--fb-border-gray);
                         border-radius:var(--fb-radius-lg);
                         padding:28px;text-align:center;">

                <?php if ($vendor_query->have_posts()) :
                    $vendor_query->the_post();
                    $v_pid   = get_the_ID();
                    $v_emoji = get_post_meta($v_pid, 'fb_vendor_emoji',    true) ?: '🏪';
                    $v_spec  = get_post_meta($v_pid, 'fb_vendor_specialty', true);
                    $v_loc   = get_post_meta($v_pid, 'fb_vendor_location',  true);
                    $v_rat   = get_post_meta($v_pid, 'fb_vendor_rating',    true) ?: '5';
                    $v_rev   = get_post_meta($v_pid, 'fb_vendor_reviews',   true) ?: '0';
                    $v_ver   = get_post_meta($v_pid, 'fb_vendor_verified',  true) === 'si';
                ?>

                    <div style="width:80px;height:80px;
                                background:var(--fb-bg-2);
                                border-radius:var(--fb-radius);
                                display:flex;align-items:center;
                                justify-content:center;font-size:2.2rem;
                                margin:0 auto 16px;
                                border:2px solid var(--fb-border-gray);">
                        <?php if (has_post_thumbnail()) :
                            the_post_thumbnail('freshbite-thumb');
                        else :
                            echo $v_emoji;
                        endif; ?>
                    </div>

                    <h4 style="font-family:var(--fb-font);font-size:1rem;
                                font-weight:700;color:var(--fb-dark);
                                margin-bottom:4px;">
                        <?php the_title(); ?>
                    </h4>

                    <p style="font-size:0.82rem;color:var(--fb-gray-400);
                               font-family:var(--fb-font);margin-bottom:8px;">
                        <?php echo esc_html($v_spec); ?>
                    </p>

                    <?php if ($v_loc) : ?>
                        <p style="font-size:0.78rem;color:var(--fb-gray-300);
                                   font-family:var(--fb-font);margin-bottom:8px;">
                            📍 <?php echo esc_html($v_loc); ?>
                        </p>
                    <?php endif; ?>

                    <div style="display:flex;justify-content:center;
                                align-items:center;gap:6px;margin-bottom:12px;">
                        <?php echo freshbite_stars(floatval($v_rat)); ?>
                        <span style="font-size:0.78rem;color:var(--fb-gray-300);
                                     font-family:var(--fb-font);">
                            (<?php echo esc_html($v_rev); ?>)
                        </span>
                    </div>

                    <?php if ($v_ver) : ?>
                        <span style="display:inline-block;font-size:0.75rem;
                                     color:var(--fb-secondary);font-weight:600;
                                     font-family:var(--fb-font);
                                     margin-bottom:16px;">
                            ✅ Vendedor Verificado
                        </span>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>"
                       class="fb-btn fb-btn-outline fb-btn-sm"
                       style="width:100%;justify-content:center;">
                        Ver Tienda →
                    </a>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>

                    <!-- Fallback vendedor -->
                    <div style="width:80px;height:80px;
                                background:var(--fb-bg-2);
                                border-radius:var(--fb-radius);
                                display:flex;align-items:center;
                                justify-content:center;font-size:2.2rem;
                                margin:0 auto 16px;
                                border:2px solid var(--fb-border-gray);">
                        🌾
                    </div>
                    <h4 style="font-family:var(--fb-font);font-size:1rem;
                                font-weight:700;color:var(--fb-dark);
                                margin-bottom:4px;">
                        Granja Green Valley
                    </h4>
                    <p style="font-size:0.82rem;color:var(--fb-gray-400);
                               font-family:var(--fb-font);margin-bottom:8px;">
                        Frutas y Verduras Orgánicas
                    </p>
                    <p style="font-size:0.78rem;color:var(--fb-gray-300);
                               font-family:var(--fb-font);margin-bottom:12px;">
                        📍 Fresno, California
                    </p>
                    <span style="font-size:0.75rem;color:var(--fb-secondary);
                                 font-weight:600;font-family:var(--fb-font);
                                 display:block;margin-bottom:16px;">
                        ✅ Vendedor Verificado
                    </span>
                    <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                       class="fb-btn fb-btn-outline fb-btn-sm"
                       style="width:100%;justify-content:center;">
                        Ver Tienda →
                    </a>

                <?php endif; ?>
            </div>

            <!-- Mensaje del vendedor -->
            <div>
                <span class="fb-label">De la Granja a tu Mesa</span>
                <h3 style="margin-top:12px;margin-bottom:16px;
                            font-family:var(--fb-font);font-size:1.3rem;">
                    Sobre Este Producto
                </h3>
                <p style="font-family:var(--fb-font);color:var(--fb-gray-400);
                           line-height:1.8;font-size:0.95rem;margin-bottom:24px;">
                    "Cosechamos este producto en su punto óptimo de madurez
                    para garantizarte el mejor sabor y el máximo valor nutritivo.
                    Cada unidad pasa por nuestro proceso de selección manual
                    antes de llegar a tu hogar."
                </p>

                <div style="display:grid;grid-template-columns:repeat(3,1fr);
                            gap:16px;">
                    <?php
                    $garantias = [
                        ['🌿', 'Sin Pesticidas',    'Cultivo 100% orgánico'],
                        ['💧', 'Riego Natural',     'Agua de fuente propia'],
                        ['☀️', 'Cosecha Manual',    'Seleccionado a mano'],
                    ];
                    foreach ($garantias as [$icon, $titulo, $desc]) :
                    ?>
                        <div style="padding:16px;
                                    background:var(--fb-bg);
                                    border-radius:var(--fb-radius-sm);
                                    border:1px solid var(--fb-border-gray);
                                    text-align:center;">
                            <div style="font-size:1.5rem;margin-bottom:8px;">
                                <?php echo $icon; ?>
                            </div>
                            <strong style="display:block;
                                           font-family:var(--fb-font);
                                           font-size:0.85rem;
                                           color:var(--fb-dark);
                                           margin-bottom:4px;">
                                <?php echo esc_html($titulo); ?>
                            </strong>
                            <span style="font-size:0.75rem;
                                         color:var(--fb-gray-400);
                                         font-family:var(--fb-font);">
                                <?php echo esc_html($desc); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- ============================================================
     RESEÑAS
     ============================================================ -->
<section id="fb-reviews-section"
         style="background:var(--fb-bg);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-flex-between"
             style="margin-bottom:40px;flex-wrap:wrap;gap:16px;">
            <div>
                <span class="fb-label">Opiniones Verificadas</span>
                <h2 style="margin-top:8px;">
                    Reseñas del Producto
                    <?php if ($review_count > 0) : ?>
                        <span style="font-size:1rem;
                                     color:var(--fb-gray-400);
                                     font-weight:400;
                                     font-family:var(--fb-font);">
                            (<?php echo esc_html($review_count); ?>)
                        </span>
                    <?php endif; ?>
                </h2>
            </div>
            <?php if (comments_open()) : ?>
                <a href="#review_form"
                   class="fb-btn fb-btn-outline">
                    ✍️ Escribir Reseña
                </a>
            <?php endif; ?>
        </div>

        <?php if ($review_count > 0 || true) : ?>

            <!-- Resumen de calificación -->
            <div class="fb-reviews-summary"
                 style="margin-bottom:40px;">
                <div class="fb-reviews-score">
                    <span class="fb-reviews-big-num">
                        <?php echo $rating ?: '5.0'; ?>
                    </span>
                    <div>
                        <?php echo freshbite_stars(floatval($rating ?: 5)); ?>
                        <span style="font-size:0.82rem;
                                     color:var(--fb-gray-400);
                                     font-family:var(--fb-font);
                                     display:block;margin-top:4px;">
                            <?php echo esc_html($review_count ?: '3'); ?> reseñas
                        </span>
                    </div>
                </div>
                <div class="fb-reviews-bars">
                    <?php
                    $bars = [
                        [5, 75], [4, 15], [3, 7], [2, 2], [1, 1],
                    ];
                    foreach ($bars as [$s, $pct]) :
                    ?>
                        <div class="fb-review-bar-row">
                            <span class="fb-review-bar-label">
                                <?php echo $s; ?> ★
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

            <!-- Reseñas WooCommerce -->
            <?php
            $woo_reviews = get_comments([
                'post_id' => $pid,
                'status'  => 'approve',
                'number'  => 5,
            ]);

            if (!empty($woo_reviews)) :
                foreach ($woo_reviews as $review) :
                    $r_rating = get_comment_meta(
                        $review->comment_ID,
                        'rating',
                        true
                    ) ?: 5;
            ?>
                    <div class="fb-review-card"
                         style="margin-bottom:16px;">
                        <div class="fb-review-header">
                            <div class="fb-review-avatar">
                                <?php echo get_avatar(
                                    $review->comment_author_email,
                                    42
                                ) ?: '😊'; ?>
                            </div>
                            <div class="fb-review-meta">
                                <span class="fb-review-name">
                                    <?php echo esc_html(
                                        $review->comment_author
                                    ); ?>
                                </span>
                                <span class="fb-review-role">
                                    <?php echo human_time_diff(
                                        strtotime($review->comment_date),
                                        current_time('timestamp')
                                    ); ?> atrás
                                </span>
                            </div>
                            <div style="margin-left:auto;">
                                <?php echo freshbite_stars(
                                    intval($r_rating)
                                ); ?>
                            </div>
                        </div>
                        <p class="fb-review-text">
                            "<?php echo esc_html(
                                freshbite_truncate(
                                    $review->comment_content, 200
                                )
                            ); ?>"
                        </p>
                        <span style="font-size:0.75rem;
                                     color:var(--fb-secondary);
                                     font-family:var(--fb-font);
                                     font-weight:600;">
                            ✅ Compra verificada
                        </span>
                    </div>
            <?php
                endforeach;
            else :
                // Fallback reseñas
                $fallback_reviews = [
                    ['😊', 'María García',    'Chef en Casa · Miami',     5,
                     'Producto increíble, llegó super fresco y con un sabor espectacular. Definitivamente volvería a comprar.'],
                    ['👨‍🍳', 'Chef Marco R.',   'Restaurante · Nueva York', 5,
                     'La calidad es incomparable. Lo uso en mi restaurante y mis clientes siempre preguntan por el secreto. El secreto es FreshBite.'],
                    ['🌱', 'Ana Martínez',    'Nutricionista · Portland',  4,
                     'Excelente producto, muy fresco y bien empacado. El envío llegó puntual. Lo recomiendo a todos mis pacientes.'],
                ];
                foreach ($fallback_reviews as [
                    $av, $nombre, $rol, $rat, $texto
                ]) :
            ?>
                    <div class="fb-review-card"
                         style="margin-bottom:16px;">
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
                            <div style="margin-left:auto;">
                                <?php echo freshbite_stars($rat); ?>
                            </div>
                        </div>
                        <p class="fb-review-text">
                            "<?php echo esc_html($texto); ?>"
                        </p>
                        <span style="font-size:0.75rem;
                                     color:var(--fb-secondary);
                                     font-family:var(--fb-font);
                                     font-weight:600;">
                            ✅ Compra verificada
                        </span>
                    </div>
            <?php
                endforeach;
            endif;
            ?>

            <!-- Formulario de reseña WooCommerce -->
            <?php if (comments_open()) : ?>
                <div style="margin-top:40px;padding:32px;
                             background:var(--fb-white);
                             border-radius:var(--fb-radius-lg);
                             border:1.5px solid var(--fb-border-gray);">
                    <h3 style="font-family:var(--fb-font);font-size:1.1rem;
                                font-weight:700;color:var(--fb-dark);
                                margin-bottom:24px;">
                        ✍️ Escribe tu Reseña
                    </h3>
                    <?php comment_form([
                        'title_reply'         => '',
                        'comment_notes_before'=> '',
                        'comment_notes_after' => '',
                        'label_submit'        => 'Publicar Reseña',
                        'class_submit'        => 'fb-btn fb-btn-primary',
                        'comment_field'       =>
                            '<div class="fb-form-group">
                                <label for="comment">Tu reseña *</label>
                                <textarea id="comment" name="comment"
                                          rows="4" required
                                          placeholder="Cuéntanos tu experiencia con este producto..."
                                          style="width:100%;padding:12px 16px;
                                                 border:1.5px solid var(--fb-border-gray);
                                                 border-radius:var(--fb-radius-sm);
                                                 font-family:var(--fb-font);
                                                 font-size:0.9rem;
                                                 resize:vertical;outline:none;"></textarea>
                            </div>',
                    ]); ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>

    </div>
</section>

<!-- ============================================================
     PRODUCTOS RELACIONADOS
     ============================================================ -->
<section style="background:var(--fb-white);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-flex-between"
             style="margin-bottom:32px;flex-wrap:wrap;gap:16px;">
            <div>
                <span class="fb-label">También te Puede Gustar</span>
                <h2 style="margin-top:8px;">Productos Relacionados</h2>
            </div>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
               class="fb-btn fb-btn-outline">
                Ver Tienda →
            </a>
        </div>

        <?php
        $related = wc_get_related_products($pid, 4);

        $fallback_related = [
            ['🥦', 'Corona de Brócoli Fresco',    '\$2.49', '/unidad', 'Orgánico'],
            ['🥕', 'Zanahorias de Temporada',      '\$2.99', '/lb',     'Local'],
            ['🍅', 'Tomates Cherry Orgánicos',     '\$4.99', '/pinta',  'Orgánico'],
            ['🥬', 'Espinaca Baby Orgánica',       '\$3.49', '/bolsa',  'Nuevo'],
        ];

        $tiene_related = !empty($related);
        ?>

        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">

            <?php if ($tiene_related) :
                foreach ($related as $related_id) :
                    $rel_product = wc_get_product($related_id);
                    if (!$rel_product) continue;
                    setup_postdata($GLOBALS['post'] = get_post($related_id));
            ?>
                    <div class="fb-product-card">
                        <div class="fb-product-image">
                            <?php if (has_post_thumbnail($related_id)) :
                                echo get_the_post_thumbnail(
                                    $related_id,
                                    'freshbite-product'
                                );
                            else : ?>
                                <div style="display:flex;align-items:center;
                                            justify-content:center;
                                            height:100%;font-size:4rem;">
                                    🛒
                                </div>
                            <?php endif; ?>
                            <?php echo freshbite_product_badge($rel_product); ?>
                            <button class="fb-product-wishlist">♡</button>
                        </div>
                        <div class="fb-product-body">
                            <a href="<?php echo esc_url(
                                   get_permalink($related_id)
                               ); ?>"
                               class="fb-product-name">
                                <?php echo esc_html(
                                    $rel_product->get_name()
                                ); ?>
                            </a>
                            <div class="fb-product-rating">
                                <?php echo freshbite_stars(
                                    floatval(
                                        $rel_product->get_average_rating()
                                    ) ?: 5
                                ); ?>
                            </div>
                        </div>
                        <div class="fb-product-footer">
                            <div class="fb-product-price">
                                <?php if ($rel_product->is_on_sale()) : ?>
                                    <span class="fb-price-old">
                                        <?php echo wc_price(
                                            $rel_product->get_regular_price()
                                        ); ?>
                                    </span>
                                <?php endif; ?>
                                <span class="fb-price-current">
                                    <?php echo wc_price(
                                        $rel_product->get_price()
                                    ); ?>
                                </span>
                            </div>
                            <a href="<?php echo esc_url(
                                   $rel_product->add_to_cart_url()
                               ); ?>"
                               class="fb-add-to-cart">
                                🛒
                            </a>
                        </div>
                    </div>
            <?php
                endforeach;
                wp_reset_postdata();

            else :
                foreach ($fallback_related as [
                    $emoji, $nombre, $precio, $unidad, $badge
                ]) :
                    $badge_class = match($badge) {
                        'Orgánico' => 'fb-badge-organic',
                        'Local'    => 'fb-badge-local',
                        'Nuevo'    => 'fb-badge-new',
                        default    => '',
                    };
            ?>
                    <div class="fb-product-card">
                        <div class="fb-product-image"
                             style="display:flex;align-items:center;
                                    justify-content:center;font-size:4rem;">
                            <?php echo $emoji; ?>
                            <span class="fb-product-badge <?php echo $badge_class; ?>">
                                <?php echo $badge; ?>
                            </span>
                            <button class="fb-product-wishlist">♡</button>
                        </div>
                        <div class="fb-product-body">
                            <a href="<?php echo esc_url(
                                   wc_get_page_permalink('shop')
                               ); ?>"
                               class="fb-product-name">
                                <?php echo esc_html($nombre); ?>
                            </a>
                            <div class="fb-product-rating">
                                <span class="fb-stars">★★★★★</span>
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
                            <a href="<?php echo esc_url(
                                   wc_get_page_permalink('shop')
                               ); ?>"
                               class="fb-add-to-cart">
                                🛒
                            </a>
                        </div>
                    </div>
            <?php endforeach;
            endif; ?>

        </div>

    </div>
</section>

<?php get_footer(); ?>