<?php
/**
 * woocommerce/myaccount/orders.php — FreshBite Marketplace
 * Lista completa de pedidos del cliente.
 * Idioma visual: Español
 *
 * @package FreshBite
 * @see     https://woocommerce.com/document/template-structure/
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders );

/* ── Mapa de estados en español ────────────────────────────── */
$status_labels = [
  'pending'    => [ 'label' => 'Pendiente de pago',  'class' => 'fb-status--pending'    ],
  'processing' => [ 'label' => 'En proceso',          'class' => 'fb-status--processing' ],
  'on-hold'    => [ 'label' => 'En espera',            'class' => 'fb-status--hold'       ],
  'completed'  => [ 'label' => 'Completado',           'class' => 'fb-status--completed'  ],
  'cancelled'  => [ 'label' => 'Cancelado',            'class' => 'fb-status--cancelled'  ],
  'refunded'   => [ 'label' => 'Reembolsado',          'class' => 'fb-status--refunded'   ],
  'failed'     => [ 'label' => 'Fallido',              'class' => 'fb-status--failed'     ],
];
?>

<div class="fb-account-orders">

  <!-- Cabecera de sección -->
  <div class="fb-account-orders__header">
    <h2 class="fb-account-orders__title">
      <svg width="22" height="22" viewBox="0 0 24 24"
           fill="none" stroke="currentColor" stroke-width="2"
           aria-hidden="true">
        <circle cx="9"  cy="21" r="1"/>
        <circle cx="20" cy="21" r="1"/>
        <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                 001.99-1.61L23 6H6"/>
      </svg>
      Mis pedidos
    </h2>

    <?php if ( $has_orders ) : ?>
      <span class="fb-account-orders__count">
        <?php
        $total = WC()->customer ? wc_get_customer_order_count( get_current_user_id() ) : 0;
        echo $total . ' ' . ( $total === 1 ? 'pedido' : 'pedidos' );
        ?>
      </span>
    <?php endif; ?>
  </div>

  <?php if ( $has_orders ) : ?>

    <!-- Tabla de pedidos -->
    <div class="fb-orders-table" role="region" aria-label="Mis pedidos">

      <!-- Cabecera -->
      <div class="fb-orders-table__head">
        <span class="fb-orders-table__th">Nº pedido</span>
        <span class="fb-orders-table__th">Fecha</span>
        <span class="fb-orders-table__th">Estado</span>
        <span class="fb-orders-table__th">Total</span>
        <span class="fb-orders-table__th" aria-hidden="true">Acciones</span>
      </div>

      <!-- Filas -->
      <?php foreach ( $customer_orders->orders as $customer_order ) :

        $order       = wc_get_order( $customer_order );
        $item_count  = $order->get_item_count() - $order->get_item_count_refunded();
        $status      = $order->get_status();
        $status_info = $status_labels[ $status ]
                    ?? [ 'label' => ucfirst( $status ), 'class' => 'fb-status--default' ];
      ?>

        <div class="fb-orders-table__row" role="row">

          <!-- Número de pedido + productos -->
          <div class="fb-orders-table__cell fb-orders-table__cell--number">
            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>"
               class="fb-orders-table__order-link"
               aria-label="Ver pedido #<?php echo $order->get_order_number(); ?>">
              #<?php echo esc_html( $order->get_order_number() ); ?>
            </a>
            <span class="fb-orders-table__item-count">
              <?php echo $item_count . ' ' . ( $item_count === 1 ? 'producto' : 'productos' ); ?>
            </span>
            <!-- Miniaturas de productos -->
            <div class="fb-orders-table__thumbs" aria-hidden="true">
              <?php
              $items = $order->get_items();
              $thumb_count = 0;
              foreach ( $items as $item ) :
                if ( $thumb_count >= 3 ) break;
                $product = $item->get_product();
                if ( $product && $product->get_image_id() ) :
                  echo wp_get_attachment_image(
                    $product->get_image_id(), [ 32, 32 ],
                    false,
                    [ 'class' => 'fb-orders-table__thumb', 'loading' => 'lazy' ]
                  );
                  $thumb_count++;
                endif;
              endforeach;
              if ( count( $items ) > 3 ) :
                echo '<span class="fb-orders-table__thumb-more">+'
                  . ( count( $items ) - 3 ) . '</span>';
              endif;
              ?>
            </div>
          </div>

          <!-- Fecha -->
          <div class="fb-orders-table__cell fb-orders-table__cell--date">
            <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>">
              <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?>
            </time>
          </div>

          <!-- Estado -->
          <div class="fb-orders-table__cell fb-orders-table__cell--status">
            <span class="fb-status-badge <?php echo esc_attr( $status_info['class'] ); ?>">
              <?php echo esc_html( $status_info['label'] ); ?>
            </span>
          </div>

          <!-- Total -->
          <div class="fb-orders-table__cell fb-orders-table__cell--total">
            <?php
            echo wp_kses_post(
              sprintf(
                '%s',
                $order->get_formatted_order_total()
              )
            );
            ?>
          </div>

          <!-- Acciones -->
          <div class="fb-orders-table__cell fb-orders-table__cell--actions">

            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>"
               class="fb-btn fb-btn--ghost fb-btn--xs"
               aria-label="Ver detalle del pedido #<?php echo $order->get_order_number(); ?>">
              <svg width="14" height="14" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
              Ver
            </a>

            <?php if ( $order->has_status( [ 'pending', 'failed' ] ) ) : ?>
              <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
                 class="fb-btn fb-btn--primary fb-btn--xs"
                 aria-label="Pagar pedido #<?php echo $order->get_order_number(); ?>">
                <svg width="14" height="14" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2.5">
                  <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                  <line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
                Pagar
              </a>
            <?php endif; ?>

            <?php if ( $order->has_status( 'completed' ) ) : ?>
              <?php
              $reorder_url = add_query_arg(
                [ 'order_again' => $order->get_id(), '_wpnonce' => wp_create_nonce( 'woocommerce-order_again' ) ],
                wc_get_cart_url()
              );
              ?>
              <a href="<?php echo esc_url( $reorder_url ); ?>"
                 class="fb-btn fb-btn--outline fb-btn--xs"
                 aria-label="Repetir pedido #<?php echo $order->get_order_number(); ?>">
                <svg width="14" height="14" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2.5">
                  <polyline points="1 4 1 10 7 10"/>
                  <path d="M3.51 15a9 9 0 102.13-9.36L1 10"/>
                </svg>
                Repetir
              </a>
            <?php endif; ?>

            <?php if ( $order->has_status( 'completed' ) && ! $order->has_status( 'refunded' ) ) : ?>
              <a href="<?php echo esc_url( wp_nonce_url(
                add_query_arg( [ 'cancel_order' => 'true', 'order' => $order->get_order_key(), 'order_id' => $order->get_id() ],
                  $order->get_cancel_endpoint()
                ),
                'woocommerce-cancel_order'
              ) ); ?>"
                 class="fb-btn fb-btn--ghost fb-btn--xs fb-btn--danger"
                 aria-label="Cancelar pedido #<?php echo $order->get_order_number(); ?>"
                 data-confirm="¿Seguro que deseas cancelar este pedido?">
                Cancelar
              </a>
            <?php endif; ?>

            <?php do_action( 'woocommerce_my_account_my_orders_actions', $order ); ?>

          </div>

        </div><!-- .fb-orders-table__row -->

      <?php endforeach; ?>

    </div><!-- .fb-orders-table -->

    <!-- Paginación -->
    <?php if ( 1 < $customer_orders->max_num_pages ) : ?>
      <nav class="fb-pagination" aria-label="Paginación de pedidos">
        <?php if ( 1 < $customer_orders->max_num_pages ) : ?>
          <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"
             class="fb-pagination__btn fb-pagination__btn--prev
               <?php echo $current_page <= 1 ? 'disabled' : ''; ?>"
             <?php echo $current_page <= 1 ? 'aria-disabled="true" tabindex="-1"' : ''; ?>>
            ← Anterior
          </a>
        <?php endif; ?>

        <span class="fb-pagination__info">
          Página <?php echo (int) $current_page; ?> de <?php echo (int) $customer_orders->max_num_pages; ?>
        </span>

        <?php if ( intval( $customer_orders->max_num_pages ) !== intval( $current_page ) ) : ?>
          <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"
             class="fb-pagination__btn fb-pagination__btn--next">
            Siguiente →
          </a>
        <?php endif; ?>
      </nav>
    <?php endif; ?>

  <?php else : ?>

    <!-- Sin pedidos -->
    <div class="fb-account-empty">
      <div class="fb-account-empty__icon" aria-hidden="true">
        <svg width="64" height="64" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="1.2">
          <circle cx="9"  cy="21" r="1"/>
          <circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                   001.99-1.61L23 6H6"/>
        </svg>
      </div>
      <h3 class="fb-account-empty__title">
        Todavía no has realizado ningún pedido
      </h3>
      <p class="fb-account-empty__desc">
        Explora nuestra tienda y encuentra productos frescos y orgánicos.
      </p>
      <a href="<?php echo esc_url( apply_filters(
        'woocommerce_return_to_shop_redirect',
        wc_get_page_permalink( 'shop' )
      ) ); ?>"
         class="fb-btn fb-btn--primary fb-btn--md">
        <svg width="16" height="16" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.5"
             aria-hidden="true">
          <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
          <line x1="3" y1="6" x2="21" y2="6"/>
          <path d="M16 10a4 4 0 01-8 0"/>
        </svg>
        Ir a la tienda
      </a>
    </div>

  <?php endif; ?>

</div><!-- .fb-account-orders -->

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>