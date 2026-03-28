<?php
/**
 * woocommerce/myaccount/my-account.php — FreshBite Marketplace
 * Override del template de Mi Cuenta de WooCommerce.
 * Idioma visual: Español
 *
 * @package FreshBite
 * @see     https://woocommerce.com/document/template-structure/
 */

defined( 'ABSPATH' ) || exit;

get_header();

$current_user     = wp_get_current_user();
$current_endpoint = WC()->query->get_current_endpoint();
$account_menu     = wc_get_account_menu_items();

/* ── Mapa de iconos por endpoint ──────────────────────────── */
$endpoint_icons = [
  'dashboard'       => '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
  'orders'          => '<circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0 001.99-1.61L23 6H6"/>',
  'downloads'       => '<path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>',
  'edit-address'    => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>',
  'payment-methods' => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
  'edit-account'    => '<path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>',
  'customer-logout' => '<path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>',
];

/* ── Traducciones de endpoints ────────────────────────────── */
$endpoint_labels = [
  'dashboard'       => 'Resumen',
  'orders'          => 'Mis pedidos',
  'downloads'       => 'Mis descargas',
  'edit-address'    => 'Mis direcciones',
  'payment-methods' => 'Métodos de pago',
  'edit-account'    => 'Mis datos',
  'customer-logout' => 'Cerrar sesión',
];
?>

<main id="fb-main" class="fb-main-content fb-myaccount-page" role="main">

  <!-- ═══ CABECERA ════════════════════════════════════════ -->
  <section class="fb-page-header fb-page-header--account">
    <div class="fb-container">

      <!-- Migas de pan -->
      <nav class="fb-breadcrumbs" aria-label="Migas de pan">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
        <span class="fb-breadcrumbs__current">Mi cuenta</span>
      </nav>

      <!-- Bienvenida -->
      <div class="fb-account-header">
        <div class="fb-account-header__avatar">
          <?php echo get_avatar(
            $current_user->ID, 72, '',
            esc_attr( $current_user->display_name ),
            [ 'class' => 'fb-account-header__avatar-img' ]
          ); ?>
          <span class="fb-account-header__avatar-badge" aria-hidden="true">
            <svg width="14" height="14" viewBox="0 0 24 24"
                 fill="currentColor" stroke="none">
              <polyline points="20 6 9 17 4 12"/>
            </svg>
          </span>
        </div>
        <div class="fb-account-header__info">
          <span class="fb-account-header__greeting">¡Hola de nuevo!</span>
          <h1 class="fb-account-header__name">
            <?php echo esc_html( $current_user->display_name ); ?>
          </h1>
          <span class="fb-account-header__email">
            <svg width="14" height="14" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 aria-hidden="true">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4
                       c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
              <polyline points="22,6 12,13 2,6"/>
            </svg>
            <?php echo esc_html( $current_user->user_email ); ?>
          </span>
        </div>

        <!-- Acceso rápido a la tienda -->
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
           class="fb-btn fb-btn--outline fb-btn--md fb-account-header__shop-btn">
          <svg width="16" height="16" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2"
               aria-hidden="true">
            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
            <path d="M16 10a4 4 0 01-8 0"/>
          </svg>
          Ir a la tienda
        </a>
      </div><!-- .fb-account-header -->

    </div>
  </section><!-- .fb-page-header -->


  <!-- ═══ LAYOUT PRINCIPAL ══════════════════════════════════ -->
  <section class="fb-myaccount-layout">
    <div class="fb-container">
      <div class="fb-myaccount-grid">

        <!-- ── NAVEGACIÓN LATERAL ─────────────────────── -->
        <nav class="fb-account-nav"
             aria-label="Navegación de mi cuenta">

          <!-- Stats rápidas del usuario -->
          <?php
          $order_count = wc_get_customer_order_count( $current_user->ID );
          $total_spent = wc_price( wc_get_customer_total_spent( $current_user->ID ) );
          ?>
          <div class="fb-account-nav__stats">
            <div class="fb-account-nav-stat">
              <span class="fb-account-nav-stat__num">
                <?php echo (int) $order_count; ?>
              </span>
              <span class="fb-account-nav-stat__label">
                <?php echo $order_count === 1 ? 'Pedido' : 'Pedidos'; ?>
              </span>
            </div>
            <div class="fb-account-nav-stat__sep" aria-hidden="true"></div>
            <div class="fb-account-nav-stat">
              <span class="fb-account-nav-stat__num">
                <?php echo wp_kses_post( $total_spent ); ?>
              </span>
              <span class="fb-account-nav-stat__label">Total gastado</span>
            </div>
          </div>

          <!-- Menú de navegación -->
          <ul class="fb-account-nav__list" role="list">
            <?php foreach ( $account_menu as $endpoint => $label ) :

              $is_active = ( $endpoint === $current_endpoint )
                        || ( $endpoint === 'dashboard' && empty( $current_endpoint ) );
              $is_logout = ( $endpoint === 'customer-logout' );
              $icon_path = $endpoint_icons[ $endpoint ]
                        ?? '<circle cx="12" cy="12" r="10"/>';
              $nav_label = $endpoint_labels[ $endpoint ] ?? $label;

              $item_url  = 'customer-logout' === $endpoint
                ? wc_logout_url( wc_get_page_permalink( 'myaccount' ) )
                : wc_get_account_endpoint_url( $endpoint );
            ?>
              <li class="fb-account-nav__item
                <?php echo $is_active ? 'fb-account-nav__item--active' : ''; ?>
                <?php echo $is_logout ? 'fb-account-nav__item--logout' : ''; ?>">

                <a href="<?php echo esc_url( $item_url ); ?>"
                   class="fb-account-nav__link"
                   <?php echo $is_active ? 'aria-current="page"' : ''; ?>
                   <?php echo $is_logout ? 'data-confirm="¿Seguro que deseas cerrar sesión?"' : ''; ?>>

                  <svg width="18" height="18" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2"
                       class="fb-account-nav__icon" aria-hidden="true">
                    <?php echo $icon_path; // phpcs:ignore ?>
                  </svg>

                  <span class="fb-account-nav__label">
                    <?php echo esc_html( $nav_label ); ?>
                  </span>

                  <?php if ( $is_active ) : ?>
                    <span class="fb-account-nav__active-dot"
                          aria-hidden="true"></span>
                  <?php endif; ?>

                  <?php
                  /* Badge contador para pedidos */
                  if ( $endpoint === 'orders' && $order_count > 0 ) :
                  ?>
                    <span class="fb-account-nav__badge">
                      <?php echo (int) $order_count; ?>
                    </span>
                  <?php endif; ?>

                </a>
              </li>

            <?php endforeach; ?>
          </ul><!-- .fb-account-nav__list -->

          <!-- Bloque de ayuda -->
          <div class="fb-account-nav__help">
            <svg width="20" height="20" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 aria-hidden="true">
              <circle cx="12" cy="12" r="10"/>
              <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/>
              <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
            <div>
              <span class="fb-account-nav__help-title">¿Necesitas ayuda?</span>
              <a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"
                 class="fb-account-nav__help-link">
                Contactar soporte
              </a>
            </div>
          </div>

        </nav><!-- .fb-account-nav -->


        <!-- ── CONTENIDO PRINCIPAL ──────────────────── -->
        <div class="fb-account-content">

          <!-- Notificaciones WooCommerce -->
          <?php wc_print_notices(); ?>

          <?php
          /**
           * WooCommerce inyecta aquí el contenido del endpoint activo:
           * dashboard, orders, downloads, edit-address,
           * payment-methods, edit-account, etc.
           */
          do_action( 'woocommerce_account_content' );
          ?>

        </div><!-- .fb-account-content -->

      </div><!-- .fb-myaccount-grid -->
    </div><!-- .fb-container -->
  </section><!-- .fb-myaccount-layout -->

</main><!-- #fb-main -->

<?php get_footer(); ?>