<?php
/**
 * woocommerce/cart/cart.php — FreshBite Marketplace
 * Override del template de carrito de WooCommerce.
 * ⚠️ Este archivo NO lleva get_header()/get_footer()
 * WooCommerce lo inyecta dentro del template de página.
 * Idioma visual: Español
 *
 * @package FreshBite
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' );
?>

<div class="fb-cart-page">

  <!-- ═══ CABECERA ════════════════════════════════════════ -->
  <div class="fb-page-header fb-page-header--cart">
    <div class="fb-container">

      <!-- Migas de pan -->
      <nav class="fb-breadcrumbs" aria-label="Migas de pan">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Tienda</a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
        <span class="fb-breadcrumbs__current">Mi carrito</span>
      </nav>

      <h1 class="fb-page-header__title">
        <svg width="28" height="28" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <circle cx="9"  cy="21" r="1"/>
          <circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                   001.99-1.61L23 6H6"/>
        </svg>
        Mi carrito
      </h1>

      <!-- Pasos del proceso -->
      <div class="fb-checkout-steps" aria-label="Pasos del proceso de compra">
        <div class="fb-checkout-step fb-checkout-step--active">
          <span class="fb-checkout-step__num">1</span>
          <span class="fb-checkout-step__label">Carrito</span>
        </div>
        <div class="fb-checkout-step__line" aria-hidden="true"></div>
        <div class="fb-checkout-step">
          <span class="fb-checkout-step__num">2</span>
          <span class="fb-checkout-step__label">Datos</span>
        </div>
        <div class="fb-checkout-step__line" aria-hidden="true"></div>
        <div class="fb-checkout-step">
          <span class="fb-checkout-step__num">3</span>
          <span class="fb-checkout-step__label">Confirmación</span>
        </div>
      </div>

    </div>
  </div><!-- .fb-page-header -->


  <!-- ═══ CONTENIDO DEL CARRITO ════════════════════════════ -->
  <div class="fb-cart-main">
    <div class="fb-container">

      <?php do_action( 'woocommerce_before_cart_table' ); ?>

      <?php if ( WC()->cart->is_empty() ) : ?>

        <!-- ── CARRITO VACÍO ──────────────────────────── -->
        <div class="fb-cart-empty">
          <div class="fb-cart-empty__icon" aria-hidden="true">
            <svg width="80" height="80" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="1">
              <circle cx="9"  cy="21" r="1"/>
              <circle cx="20" cy="21" r="1"/>
              <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                       001.99-1.61L23 6H6"/>
            </svg>
          </div>
          <h2 class="fb-cart-empty__title">Tu carrito está vacío</h2>
          <p class="fb-cart-empty__desc">
            Aún no has añadido productos. ¡Descubre nuestra selección
            de productos frescos y orgánicos!
          </p>
          <div class="fb-cart-empty__actions">
            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
               class="fb-btn fb-btn--primary fb-btn--lg">
              <svg width="18" height="18" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2.5"
                   aria-hidden="true">
                <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                <line x1="3" y1="6" x2="21" y2="6"/>
                <path d="M16 10a4 4 0 01-8 0"/>
              </svg>
              Explorar la tienda
            </a>
            <?php if ( is_user_logged_in() ) : ?>
              <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>"
                 class="fb-btn fb-btn--outline fb-btn--lg">
                Ver mis pedidos anteriores
              </a>
            <?php endif; ?>
          </div>

          <!-- Productos sugeridos -->
          <?php
          $suggested = wc_get_products( [
            'limit'   => 4,
            'orderby' => 'rand',
            'status'  => 'publish',
          ] );
          if ( $suggested ) :
          ?>
            <div class="fb-cart-suggested">
              <h3 class="fb-cart-suggested__title">Quizás te interese…</h3>
              <div class="fb-cart-suggested__grid">
                <?php foreach ( $suggested as $sp ) : ?>
                  <div class="fb-suggested-card">
                    <a href="<?php echo esc_url( $sp->get_permalink() ); ?>"
                       class="fb-suggested-card__thumb">
                      <?php echo $sp->get_image( 'medium', [
                        'class'   => 'fb-suggested-card__img',
                        'loading' => 'lazy',
                      ] ); ?>
                    </a>
                    <div class="fb-suggested-card__body">
                      <a href="<?php echo esc_url( $sp->get_permalink() ); ?>"
                         class="fb-suggested-card__name">
                        <?php echo esc_html( $sp->get_name() ); ?>
                      </a>
                      <span class="fb-suggested-card__price">
                        <?php echo wp_kses_post( $sp->get_price_html() ); ?>
                      </span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

        </div><!-- .fb-cart-empty -->

      <?php else : ?>

        <!-- ── CARRITO CON PRODUCTOS ──────────────────── -->
        <div class="fb-cart-layout">

          <!-- COLUMNA IZQUIERDA -->
          <div class="fb-cart-items-col">

            <?php wc_print_notices(); ?>

            <div class="fb-cart-table-wrapper">
              <form class="woocommerce-cart-form fb-cart-form"
                    action="<?php echo esc_url( wc_get_cart_url() ); ?>"
                    method="post">

                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <!-- Cabecera tabla -->
                <div class="fb-cart-table-head">
                  <div class="fb-cart-head-cell fb-cart-head-cell--product">Producto</div>
                  <div class="fb-cart-head-cell fb-cart-head-cell--price">Precio</div>
                  <div class="fb-cart-head-cell fb-cart-head-cell--qty">Cantidad</div>
                  <div class="fb-cart-head-cell fb-cart-head-cell--subtotal">Subtotal</div>
                  <div class="fb-cart-head-cell fb-cart-head-cell--remove" aria-hidden="true"></div>
                </div>

                <!-- Items -->
                <div class="fb-cart-items" id="fb-cart-items">
                  <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :

                    $_product      = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id    = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0
                      && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key )
                    ) :

                      $product_permalink = apply_filters(
                        'woocommerce_cart_item_permalink',
                        $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '',
                        $cart_item, $cart_item_key
                      );
                      $thumbnail = apply_filters(
                        'woocommerce_cart_item_thumbnail',
                        $_product->get_image( 'woocommerce_thumbnail', [ 'loading' => 'lazy' ] ),
                        $cart_item, $cart_item_key
                      );
                  ?>

                    <div class="fb-cart-item
                      <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>"
                      data-key="<?php echo esc_attr( $cart_item_key ); ?>">

                      <!-- Imagen -->
                      <div class="fb-cart-item__thumb">
                        <?php if ( $product_permalink ) : ?>
                          <a href="<?php echo esc_url( $product_permalink ); ?>"
                             aria-label="<?php echo esc_attr( $product_name ); ?>">
                            <?php echo wp_kses_post( $thumbnail ); ?>
                          </a>
                        <?php else : ?>
                          <?php echo wp_kses_post( $thumbnail ); ?>
                        <?php endif; ?>
                      </div>

                      <!-- Nombre -->
                      <div class="fb-cart-item__info">
                        <div class="fb-cart-item__name">
                          <?php if ( $product_permalink ) : ?>
                            <a href="<?php echo esc_url( $product_permalink ); ?>">
                              <?php echo esc_html( $product_name ); ?>
                            </a>
                          <?php else : ?>
                            <?php echo esc_html( $product_name ); ?>
                          <?php endif; ?>
                        </div>
                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore ?>
                      </div>

                      <!-- Precio unitario -->
                      <div class="fb-cart-item__price" data-label="Precio">
                        <?php
                        echo apply_filters(
                          'woocommerce_cart_item_price',
                          WC()->cart->get_product_price( $_product ),
                          $cart_item, $cart_item_key
                        ); // phpcs:ignore
                        ?>
                      </div>

                      <!-- Cantidad -->
                      <div class="fb-cart-item__qty" data-label="Cantidad">
                        <?php if ( $_product->is_sold_individually() ) : ?>
                          <div class="fb-cart-item__qty-single">
                            1
                            <input type="hidden"
                                   name="cart[<?php echo esc_attr( $cart_item_key ); ?>][qty]"
                                   value="1"/>
                          </div>
                        <?php else : ?>
                          <div class="fb-qty-wrapper">
                            <button type="button" class="fb-qty-btn"
                                    data-action="minus"
                                    aria-label="Reducir cantidad">
                              <svg width="14" height="14" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="2.5">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                              </svg>
                            </button>
                            <?php
                            $product_quantity = woocommerce_quantity_input(
                              [
                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                'input_value'  => $cart_item['quantity'],
                                'max_value'    => $_product->get_max_purchase_quantity(),
                                'min_value'    => '1',
                                'product_name' => $product_name,
                                'classes'      => [ 'fb-qty-input' ],
                              ],
                              $_product,
                              false
                            );
                            echo apply_filters(
                              'woocommerce_cart_item_quantity',
                              $product_quantity,
                              $cart_item_key,
                              $cart_item
                            ); // phpcs:ignore
                            ?>
                            <button type="button" class="fb-qty-btn"
                                    data-action="plus"
                                    aria-label="Aumentar cantidad">
                              <svg width="14" height="14" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="2.5">
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5"  y1="12" x2="19" y2="12"/>
                              </svg>
                            </button>
                          </div>
                        <?php endif; ?>
                      </div>

                      <!-- Subtotal -->
                      <div class="fb-cart-item__subtotal" data-label="Subtotal">
                        <?php
                        echo apply_filters(
                          'woocommerce_cart_item_subtotal',
                          WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ),
                          $cart_item, $cart_item_key
                        ); // phpcs:ignore
                        ?>
                      </div>

                      <!-- Eliminar -->
                      <div class="fb-cart-item__remove">
                        <?php
                        echo apply_filters(
                          'woocommerce_cart_item_remove_link',
                          sprintf(
                            '<a href="%s"
                                class="fb-cart-remove-btn"
                                aria-label="%s"
                                data-product_id="%s"
                                data-product_sku="%s"
                                data-cart_item_key="%s">
                               <svg width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2.5">
                                 <polyline points="3 6 5 6 21 6"/>
                                 <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                                 <path d="M10 11v6M14 11v6"/>
                                 <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                               </svg>
                             </a>',
                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            esc_attr( sprintf( 'Eliminar %s del carrito', $product_name ) ),
                            esc_attr( $product_id ),
                            esc_attr( $_product->get_sku() ),
                            esc_attr( $cart_item_key )
                          ),
                          $cart_item_key
                        ); // phpcs:ignore
                        ?>
                      </div>

                    </div><!-- .fb-cart-item -->

                  <?php
                    endif;
                  endforeach;
                  ?>
                </div><!-- .fb-cart-items -->

                <?php do_action( 'woocommerce_cart_contents' ); ?>

                <!-- Acciones -->
                <div class="fb-cart-actions">

                  <?php if ( wc_coupons_enabled() ) : ?>
                    <div class="fb-cart-coupon">
                      <div class="fb-cart-coupon__toggle" id="fb-coupon-toggle">
                        <svg width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             aria-hidden="true">
                          <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                          <line x1="7" y1="7" x2="7.01" y2="7"/>
                        </svg>
                        ¿Tienes un cupón de descuento?
                        <svg width="14" height="14" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2.5"
                             class="fb-coupon-toggle-arrow" aria-hidden="true">
                          <polyline points="6 9 12 15 18 9"/>
                        </svg>
                      </div>
                      <div class="fb-cart-coupon__form" id="fb-coupon-form">
                        <label for="coupon_code" class="screen-reader-text">
                          Código de cupón:
                        </label>
                        <div class="fb-cart-coupon__row">
                          <input type="text"
                                 name="coupon_code"
                                 id="coupon_code"
                                 class="fb-cart-coupon__input"
                                 value=""
                                 placeholder="Ingresa tu código…"
                                 autocomplete="off">
                          <button type="submit"
                                  class="fb-btn fb-btn--outline fb-btn--md"
                                  name="apply_coupon"
                                  value="Aplicar cupón">
                            Aplicar
                          </button>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php do_action( 'woocommerce_cart_actions' ); ?>

                  <button type="submit"
                          class="fb-btn fb-btn--ghost fb-btn--md fb-cart-update-btn"
                          name="update_cart"
                          value="Actualizar carrito"
                          id="fb-update-cart">
                    <svg width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         aria-hidden="true">
                      <polyline points="23 4 23 10 17 10"/>
                      <polyline points="1 20 1 14 7 14"/>
                      <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/>
                    </svg>
                    Actualizar carrito
                  </button>

                  <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

                </div><!-- .fb-cart-actions -->

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>

              </form>
            </div><!-- .fb-cart-table-wrapper -->

            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
               class="fb-cart-continue-link">
              <svg width="16" height="16" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2.5"
                   aria-hidden="true">
                <path d="M19 12H5M12 5l-7 7 7 7"/>
              </svg>
              Seguir comprando
            </a>

          </div><!-- .fb-cart-items-col -->


          <!-- COLUMNA DERECHA: resumen -->
          <div class="fb-cart-summary-col">
            <div class="fb-cart-summary" id="fb-cart-summary">

              <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

              <h2 class="fb-cart-summary__title">Resumen del pedido</h2>

              <div class="fb-cart-totals">

                <div class="fb-cart-totals__row">
                  <span class="fb-cart-totals__label">Subtotal</span>
                  <span class="fb-cart-totals__value">
                    <?php wc_cart_totals_subtotal_html(); ?>
                  </span>
                </div>

                <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                  <div class="fb-cart-totals__row fb-cart-totals__row--coupon">
                    <span class="fb-cart-totals__label">
                      <svg width="13" height="13" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2"
                           aria-hidden="true">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                      </svg>
                      Cupón:
                      <span class="fb-cart-totals__coupon-code">
                        <?php echo esc_html( strtoupper( $code ) ); ?>
                      </span>
                      <a href="<?php echo esc_url( add_query_arg(
                        'remove_coupon', rawurlencode( $code ), wc_get_cart_url()
                      ) ); ?>"
                         class="fb-cart-totals__remove-coupon"
                         aria-label="Eliminar cupón <?php echo esc_attr( $code ); ?>">
                        ✕
                      </a>
                    </span>
                    <span class="fb-cart-totals__value fb-cart-totals__value--discount">
                      -<?php wc_cart_totals_coupon_html( $coupon ); ?>
                    </span>
                  </div>
                <?php endforeach; ?>

                <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                  <div class="fb-cart-totals__row fb-cart-totals__row--shipping">
                    <span class="fb-cart-totals__label">
                      <svg width="14" height="14" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2"
                           aria-hidden="true">
                        <rect x="1" y="3" width="15" height="13"/>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                        <circle cx="5.5"  cy="18.5" r="2.5"/>
                        <circle cx="18.5" cy="18.5" r="2.5"/>
                      </svg>
                      Envío
                    </span>
                    <span class="fb-cart-totals__value">
                      <?php woocommerce_shipping_calculator(); ?>
                    </span>
                  </div>
                <?php endif; ?>

                <div class="fb-cart-totals__separator" aria-hidden="true"></div>

                <div class="fb-cart-totals__row fb-cart-totals__row--total">
                  <span class="fb-cart-totals__label fb-cart-totals__label--total">Total</span>
                  <span class="fb-cart-totals__value fb-cart-totals__value--total">
                    <?php wc_cart_totals_order_total_html(); ?>
                  </span>
                </div>

              </div><!-- .fb-cart-totals -->

              <!-- Badges de confianza -->
              <div class="fb-cart-trust">
                <div class="fb-cart-trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2"
                       aria-hidden="true">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                  </svg>
                  <span>Pago 100% seguro</span>
                </div>
                <div class="fb-cart-trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2"
                       aria-hidden="true">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                  </svg>
                  <span>Garantía de frescura</span>
                </div>
                <div class="fb-cart-trust-item">
                  <svg width="18" height="18" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2"
                       aria-hidden="true">
                    <rect x="1" y="3" width="15" height="13"/>
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                    <circle cx="5.5"  cy="18.5" r="2.5"/>
                    <circle cx="18.5" cy="18.5" r="2.5"/>
                  </svg>
                  <span>Entrega en 24–48 h</span>
                </div>
              </div>

              <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

              <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
                 class="fb-btn fb-btn--primary fb-btn--lg fb-btn--full fb-cart-checkout-btn">
                <svg width="18" height="18" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2.5"
                     aria-hidden="true">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
                Finalizar pedido
              </a>

              <!-- Métodos de pago -->
              <div class="fb-cart-payment-icons"
                   aria-label="Métodos de pago aceptados">
                <span class="fb-payment-icon-text">💳 Visa</span>
                <span class="fb-payment-icon-text">💳 Mastercard</span>
                <span class="fb-payment-icon-text">🅿️ PayPal</span>
              </div>

              <?php do_action( 'woocommerce_cart_collaterals' ); ?>

            </div><!-- .fb-cart-summary -->
          </div><!-- .fb-cart-summary-col -->

        </div><!-- .fb-cart-layout -->

        <?php do_action( 'woocommerce_after_cart_table' ); ?>

        <!-- Upsells -->
        <?php
        $upsell_ids = [];
        foreach ( WC()->cart->get_cart() as $cart_item ) {
          $upsell_ids = array_merge( $upsell_ids, $cart_item['data']->get_upsell_ids() );
        }
        $upsell_ids = array_unique( array_filter( $upsell_ids ) );

        if ( ! empty( $upsell_ids ) ) :
          $upsells = wc_get_products( [
            'include' => $upsell_ids,
            'limit'   => 4,
            'status'  => 'publish',
          ] );
          if ( $upsells ) :
        ?>
          <div class="fb-cart-upsells">
            <div class="fb-cart-upsells__header">
              <h3 class="fb-cart-upsells__title">También te puede gustar</h3>
            </div>
            <div class="fb-cart-upsells__grid">
              <?php foreach ( $upsells as $up ) : ?>
                <div class="fb-upsell-card">
                  <a href="<?php echo esc_url( $up->get_permalink() ); ?>"
                     class="fb-upsell-card__thumb">
                    <?php echo $up->get_image( 'medium', [
                      'class' => 'fb-upsell-card__img', 'loading' => 'lazy',
                    ] ); ?>
                  </a>
                  <div class="fb-upsell-card__body">
                    <a href="<?php echo esc_url( $up->get_permalink() ); ?>"
                       class="fb-upsell-card__name">
                      <?php echo esc_html( $up->get_name() ); ?>
                    </a>
                    <span class="fb-upsell-card__price">
                      <?php echo wp_kses_post( $up->get_price_html() ); ?>
                    </span>
                    <?php if ( $up->is_in_stock() ) : ?>
                      <a href="<?php echo esc_url( add_query_arg(
                        [ 'add-to-cart' => $up->get_id() ], wc_get_cart_url()
                      ) ); ?>"
                         class="fb-btn fb-btn--outline fb-btn--sm fb-upsell-card__btn">
                        + Agregar
                      </a>
                    <?php else : ?>
                      <span class="fb-upsell-card__out-of-stock">Agotado</span>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php
          endif;
        endif;
        ?>

      <?php endif; /* cart not empty */ ?>

    </div><!-- .fb-container -->
  </div><!-- .fb-cart-main -->

</div><!-- .fb-cart-page -->

<?php do_action( 'woocommerce_after_cart' ); ?>