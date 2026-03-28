<?php
/**
 * woocommerce/myaccount/dashboard.php — FreshBite Marketplace
 * Panel principal de Mi Cuenta.
 * Idioma visual: Español
 *
 * @package FreshBite
 * @see     https://woocommerce.com/document/template-structure/
 */

defined( 'ABSPATH' ) || exit;

$current_user = wp_get_current_user();

/* ── Datos del usuario ─────────────────────────────────────── */
$order_count    = wc_get_customer_order_count( $current_user->ID );
$total_spent    = wc_get_customer_total_spent( $current_user->ID );
$member_since   = gmdate( 'Y', strtotime( $current_user->user_registered ) );
$current_year   = gmdate( 'Y' );
$years_member   = (int) $current_year - (int) $member_since;

/* ── Último pedido ─────────────────────────────────────────── */
$last_orders = wc_get_orders( [
  'customer' => $current_user->ID,
  'limit'    => 3,
  'orderby'  => 'date',
  'order'    => 'DESC',
  'status'   => array_keys( wc_get_order_statuses() ),
] );
$last_order = ! empty( $last_orders ) ? $last_orders[0] : null;

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

<div class="fb-dashboard">

  <!-- ── TARJETAS DE RESUMEN ─────────────────────────────── -->
  <div class="fb-dashboard-stats">

    <div class="fb-dashboard-stat-card">
      <div class="fb-dashboard-stat-card__icon fb-dashboard-stat-card__icon--orders"
           aria-hidden="true">
        <svg width="24" height="24" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="9"  cy="21" r="1"/>
          <circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                   001.99-1.61L23 6H6"/>
        </svg>
      </div>
      <div class="fb-dashboard-stat-card__data">
        <span class="fb-dashboard-stat-card__num">
          <?php echo (int) $order_count; ?>
        </span>
        <span class="fb-dashboard-stat-card__label">
          <?php echo $order_count === 1 ? 'Pedido realizado' : 'Pedidos realizados'; ?>
        </span>
      </div>
      <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>"
         class="fb-dashboard-stat-card__link"
         aria-label="Ver mis pedidos">
        <svg width="16" height="16" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
      </a>
    </div>

    <div class="fb-dashboard-stat-card">
      <div class="fb-dashboard-stat-card__icon fb-dashboard-stat-card__icon--spent"
           aria-hidden="true">
        <svg width="24" height="24" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2">
          <line x1="12" y1="1" x2="12" y2="23"/>
          <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
        </svg>
      </div>
      <div class="fb-dashboard-stat-card__data">
        <span class="fb-dashboard-stat-card__num">
          <?php echo wp_kses_post( wc_price( $total_spent ) ); ?>
        </span>
        <span class="fb-dashboard-stat-card__label">Total gastado</span>
      </div>
    </div>

    <div class="fb-dashboard-stat-card">
      <div class="fb-dashboard-stat-card__icon fb-dashboard-stat-card__icon--member"
           aria-hidden="true">
        <svg width="24" height="24" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2">
          <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0
                   00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
        </svg>
      </div>
      <div class="fb-dashboard-stat-card__data">
        <span class="fb-dashboard-stat-card__num">
          <?php echo $years_member > 0
            ? $years_member . ' ' . ( $years_member === 1 ? 'año' : 'años' )
            : 'Nuevo';
          ?>
        </span>
        <span class="fb-dashboard-stat-card__label">
          Cliente desde <?php echo esc_html( $member_since ); ?>
        </span>
      </div>
    </div>

    <div class="fb-dashboard-stat-card">
      <div class="fb-dashboard-stat-card__icon fb-dashboard-stat-card__icon--address"
           aria-hidden="true">
        <svg width="24" height="24" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
          <circle cx="12" cy="10" r="3"/>
        </svg>
      </div>
      <div class="fb-dashboard-stat-card__data">
        <?php
        $billing_city = get_user_meta( $current_user->ID, 'billing_city', true );
        ?>
        <span class="fb-dashboard-stat-card__num">
          <?php echo $billing_city
            ? esc_html( $billing_city )
            : '—'; ?>
        </span>
        <span class="fb-dashboard-stat-card__label">Ciudad de entrega</span>
      </div>
      <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>"
         class="fb-dashboard-stat-card__link"
         aria-label="Editar dirección">
        <svg width="16" height="16" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
          <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
        </svg>
      </a>
    </div>

  </div><!-- .fb-dashboard-stats -->


  <!-- ── ÚLTIMOS PEDIDOS ─────────────────────────────────── -->
  <div class="fb-dashboard-section">
    <div class="fb-dashboard-section__header">
      <h2 class="fb-dashboard-section__title">
        <svg width="20" height="20" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             aria-hidden="true">
          <circle cx="9"  cy="21" r="1"/>
          <circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                   001.99-1.61L23 6H6"/>
        </svg>
        Últimos pedidos
      </h2>
      <?php if ( $order_count > 3 ) : ?>
        <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>"
           class="fb-dashboard-section__link">
          Ver todos
          <svg width="14" height="14" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </a>
      <?php endif; ?>
    </div>

    <?php if ( ! empty( $last_orders ) ) : ?>

      <div class="fb-dashboard-orders">

        <!-- Cabecera -->
        <div class="fb-dashboard-orders__head">
          <span>Nº pedido</span>
          <span>Fecha</span>
          <span>Estado</span>
          <span>Total</span>
          <span aria-hidden="true"></span>
        </div>

        <?php foreach ( $last_orders as $order ) :
          $status      = $order->get_status();
          $status_info = $status_labels[ $status ]
                      ?? [ 'label' => ucfirst( $status ), 'class' => 'fb-status--default' ];
        ?>
          <div class="fb-dashboard-order-row">

            <span class="fb-dashboard-order-row__number">
              <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>"
                 aria-label="Ver pedido #<?php echo $order->get_order_number(); ?>">
                #<?php echo esc_html( $order->get_order_number() ); ?>
              </a>
            </span>

            <span class="fb-dashboard-order-row__date">
              <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>">
                <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?>
              </time>
            </span>

            <span class="fb-dashboard-order-row__status">
              <span class="fb-status-badge <?php echo esc_attr( $status_info['class'] ); ?>">
                <?php echo esc_html( $status_info['label'] ); ?>
              </span>
            </span>

            <span class="fb-dashboard-order-row__total">
              <?php
              echo wp_kses_post( $order->get_formatted_order_total() );
              echo '<span class="fb-order-qty"> · '
                . $order->get_item_count()
                . ' ' . ( $order->get_item_count() === 1 ? 'producto' : 'productos' )
                . '</span>';
              ?>
            </span>

            <span class="fb-dashboard-order-row__actions">
              <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>"
                 class="fb-btn fb-btn--ghost fb-btn--xs"
                 aria-label="Ver detalle del pedido #<?php echo $order->get_order_number(); ?>">
                Ver
              </a>
              <?php if ( $order->has_status( [ 'pending', 'failed' ] ) ) : ?>
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
                   class="fb-btn fb-btn--primary fb-btn--xs">
                  Pagar
                </a>
              <?php endif; ?>
            </span>

          </div><!-- .fb-dashboard-order-row -->
        <?php endforeach; ?>

      </div><!-- .fb-dashboard-orders -->

    <?php else : ?>

      <div class="fb-dashboard-empty">
        <div class="fb-dashboard-empty__icon" aria-hidden="true">
          <svg width="48" height="48" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="1.2">
            <circle cx="9"  cy="21" r="1"/>
            <circle cx="20" cy="21" r="1"/>
            <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                     001.99-1.61L23 6H6"/>
          </svg>
        </div>
        <p class="fb-dashboard-empty__text">
          Aún no has realizado ningún pedido.
        </p>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
           class="fb-btn fb-btn--primary fb-btn--md">
          Empezar a comprar
        </a>
      </div>

    <?php endif; ?>

  </div><!-- .fb-dashboard-section (pedidos) -->


  <!-- ── DIRECCIONES GUARDADAS ───────────────────────────── -->
  <div class="fb-dashboard-section">
    <div class="fb-dashboard-section__header">
      <h2 class="fb-dashboard-section__title">
        <svg width="20" height="20" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             aria-hidden="true">
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
          <circle cx="12" cy="10" r="3"/>
        </svg>
        Mis direcciones
      </h2>
      <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>"
         class="fb-dashboard-section__link">
        Gestionar
        <svg width="14" height="14" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
      </a>
    </div>

    <div class="fb-dashboard-addresses">

      <?php foreach ( [ 'billing' => 'Facturación', 'shipping' => 'Entrega' ] as $type => $type_label ) :

        $address = $type === 'billing'
          ? WC()->countries->get_formatted_address( [
              'first_name' => get_user_meta( $current_user->ID, 'billing_first_name', true ),
              'last_name'  => get_user_meta( $current_user->ID, 'billing_last_name',  true ),
              'address_1'  => get_user_meta( $current_user->ID, 'billing_address_1',  true ),
              'address_2'  => get_user_meta( $current_user->ID, 'billing_address_2',  true ),
              'city'       => get_user_meta( $current_user->ID, 'billing_city',       true ),
              'state'      => get_user_meta( $current_user->ID, 'billing_state',      true ),
              'postcode'   => get_user_meta( $current_user->ID, 'billing_postcode',   true ),
              'country'    => get_user_meta( $current_user->ID, 'billing_country',    true ),
            ] )
          : WC()->countries->get_formatted_address( [
              'first_name' => get_user_meta( $current_user->ID, 'shipping_first_name', true ),
              'last_name'  => get_user_meta( $current_user->ID, 'shipping_last_name',  true ),
              'address_1'  => get_user_meta( $current_user->ID, 'shipping_address_1',  true ),
              'address_2'  => get_user_meta( $current_user->ID, 'shipping_address_2',  true ),
              'city'       => get_user_meta( $current_user->ID, 'shipping_city',       true ),
              'state'      => get_user_meta( $current_user->ID, 'shipping_state',      true ),
              'postcode'   => get_user_meta( $current_user->ID, 'shipping_postcode',   true ),
              'country'    => get_user_meta( $current_user->ID, 'shipping_country',    true ),
            ] );
      ?>

        <div class="fb-dashboard-address-card">
          <div class="fb-dashboard-address-card__header">
            <span class="fb-dashboard-address-card__type">
              <?php echo esc_html( $type_label ); ?>
            </span>
            <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address/' . $type ) ); ?>"
               class="fb-dashboard-address-card__edit"
               aria-label="Editar dirección de <?php echo esc_attr( strtolower( $type_label ) ); ?>">
              <svg width="14" height="14" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
              </svg>
              Editar
            </a>
          </div>
          <div class="fb-dashboard-address-card__body">
            <?php if ( $address ) : ?>
              <address class="fb-dashboard-address-card__address">
                <?php echo wp_kses_post( $address ); ?>
              </address>
            <?php else : ?>
              <p class="fb-dashboard-address-card__empty">
                No has guardado ninguna dirección de
                <?php echo esc_html( strtolower( $type_label ) ); ?> todavía.
              </p>
              <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address/' . $type ) ); ?>"
                 class="fb-btn fb-btn--outline fb-btn--xs">
                + Añadir dirección
              </a>
            <?php endif; ?>
          </div>
        </div>

      <?php endforeach; ?>

    </div><!-- .fb-dashboard-addresses -->
  </div><!-- .fb-dashboard-section (direcciones) -->


  <!-- ── ACCESOS RÁPIDOS ─────────────────────────────────── -->
  <div class="fb-dashboard-section">
    <div class="fb-dashboard-section__header">
      <h2 class="fb-dashboard-section__title">
        <svg width="20" height="20" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             aria-hidden="true">
          <rect x="3" y="3" width="7" height="7"/>
          <rect x="14" y="3" width="7" height="7"/>
          <rect x="3" y="14" width="7" height="7"/>
          <rect x="14" y="14" width="7" height="7"/>
        </svg>
        Accesos rápidos
      </h2>
    </div>

    <div class="fb-dashboard-quick-links">

      <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>"
         class="fb-quick-link">
        <div class="fb-quick-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="9"  cy="21" r="1"/>
            <circle cx="20" cy="21" r="1"/>
            <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                     001.99-1.61L23 6H6"/>
          </svg>
        </div>
        <span>Mis pedidos</span>
      </a>

      <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>"
         class="fb-quick-link">
        <div class="fb-quick-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
        </div>
        <span>Mis direcciones</span>
      </a>

      <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'payment-methods' ) ); ?>"
         class="fb-quick-link">
        <div class="fb-quick-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2">
            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
            <line x1="1" y1="10" x2="23" y2="10"/>
          </svg>
        </div>
        <span>Métodos de pago</span>
      </a>

      <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-account' ) ); ?>"
         class="fb-quick-link">
        <div class="fb-quick-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
          </svg>
        </div>
        <span>Mis datos</span>
      </a>

      <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
         class="fb-quick-link">
        <div class="fb-quick-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2">
            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
            <path d="M16 10a4 4 0 01-8 0"/>
          </svg>
        </div>
        <span>Ir a la tienda</span>
      </a>

      <a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"
         class="fb-quick-link">
        <div class="fb-quick-link__icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
          </svg>
        </div>
        <span>Ayuda y soporte</span>
      </a>

    </div><!-- .fb-dashboard-quick-links -->
  </div>


  <!-- ── ACCIÓN DE WooCommerce (hooks adicionales) ──────── -->
  <?php
  /**
   * Hook de WooCommerce para contenido adicional del dashboard.
   * Los plugins pueden inyectar aquí su propio contenido.
   */
  do_action( 'woocommerce_account_dashboard' );

  /**
   * Deprecated: mantener compatibilidad.
   */
  do_action( 'woocommerce_before_my_account' );
  do_action( 'woocommerce_after_my_account' );
  ?>

</div><!-- .fb-dashboard -->