<?php
/**
 * woocommerce/checkout/form-checkout.php — FreshBite Marketplace
 * Override del template de checkout de WooCommerce.
 * Idioma visual: Español
 *
 * @package FreshBite
 * @see     https://woocommerce.com/document/template-structure/
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_checkout_form', $checkout );

get_header();
?>

<main id="fb-main" class="fb-main-content fb-checkout-page" role="main">

  <!-- ═══ CABECERA ════════════════════════════════════════ -->
  <section class="fb-page-header fb-page-header--checkout">
    <div class="fb-container">

      <!-- Migas de pan -->
      <nav class="fb-breadcrumbs" aria-label="Migas de pan">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Tienda</a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">Carrito</a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
        <span class="fb-breadcrumbs__current">Finalizar pedido</span>
      </nav>

      <h1 class="fb-page-header__title">
        <svg width="26" height="26" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
        Finalizar pedido
      </h1>

      <!-- Pasos del proceso -->
      <div class="fb-checkout-steps" aria-label="Pasos del proceso de compra">
        <div class="fb-checkout-step fb-checkout-step--done">
          <span class="fb-checkout-step__num">
            <svg width="14" height="14" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="3">
              <polyline points="20 6 9 17 4 12"/>
            </svg>
          </span>
          <span class="fb-checkout-step__label">Carrito</span>
        </div>
        <div class="fb-checkout-step__line fb-checkout-step__line--done"
             aria-hidden="true"></div>
        <div class="fb-checkout-step fb-checkout-step--active">
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
  </section>


  <!-- ═══ CONTENIDO PRINCIPAL ══════════════════════════════ -->
  <section class="fb-checkout-main">
    <div class="fb-container">

      <!-- Notificaciones WooCommerce -->
      <?php wc_print_notices(); ?>

      <?php do_action( 'woocommerce_before_checkout_form_cart_notices' ); ?>

      <!-- ── AVISO: carrito vacío ──────────────────────── -->
      <?php if ( WC()->cart->is_empty() ) : ?>
        <div class="fb-checkout-empty">
          <div class="fb-checkout-empty__icon" aria-hidden="true">
            <svg width="64" height="64" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="1">
              <circle cx="9"  cy="21" r="1"/>
              <circle cx="20" cy="21" r="1"/>
              <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                       001.99-1.61L23 6H6"/>
            </svg>
          </div>
          <h2 class="fb-checkout-empty__title">Tu carrito está vacío</h2>
          <p class="fb-checkout-empty__desc">
            No puedes completar el pedido sin productos en el carrito.
          </p>
          <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
             class="fb-btn fb-btn--primary fb-btn--lg">
            Volver a la tienda
          </a>
        </div>

      <?php else : ?>

        <!-- ── LOGIN / REGISTRO (si no está logueado) ─── -->
        <?php if ( ! is_user_logged_in() ) : ?>
          <div class="fb-checkout-auth">

            <?php if ( 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) : ?>
              <div class="fb-checkout-auth-card fb-checkout-auth-card--login">
                <button class="fb-checkout-auth-toggle" type="button"
                        aria-expanded="false"
                        aria-controls="fb-checkout-login-form">
                  <svg width="16" height="16" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2"
                       aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                  </svg>
                  ¿Ya tienes cuenta?
                  <strong>Inicia sesión para comprar más rápido</strong>
                  <svg width="14" height="14" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2.5"
                       class="fb-auth-toggle-arrow" aria-hidden="true">
                    <polyline points="6 9 12 15 18 9"/>
                  </svg>
                </button>

                <div class="fb-checkout-auth-body" id="fb-checkout-login-form"
                     hidden>
                  <?php do_action( 'woocommerce_login_form_start' ); ?>

                  <form class="fb-login-form woocommerce-form woocommerce-form-login"
                        action="<?php echo esc_url( wc_get_page_permalink( 'checkout' ) ); ?>"
                        method="post">

                    <?php do_action( 'woocommerce_login_form' ); ?>

                    <div class="fb-form-row fb-form-row--half">
                      <div class="fb-field-group">
                        <label for="fb-login-username">
                          Usuario o correo electrónico
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <input type="text"
                               id="fb-login-username"
                               class="fb-field"
                               name="username"
                               autocomplete="username"
                               required>
                      </div>
                      <div class="fb-field-group">
                        <label for="fb-login-password">
                          Contraseña
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <div class="fb-field-password-wrap">
                          <input type="password"
                                 id="fb-login-password"
                                 class="fb-field"
                                 name="password"
                                 autocomplete="current-password"
                                 required>
                          <button type="button"
                                  class="fb-field-password-toggle"
                                  aria-label="Mostrar/ocultar contraseña">
                            <svg width="16" height="16" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2">
                              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                              <circle cx="12" cy="12" r="3"/>
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="fb-login-form__footer">
                      <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                      <input type="hidden" name="redirect" value="<?php echo esc_url( wc_get_checkout_url() ); ?>">

                      <button type="submit" class="fb-btn fb-btn--primary fb-btn--md"
                              name="login" value="Iniciar sesión">
                        Iniciar sesión
                      </button>

                      <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"
                         class="fb-login-form__lost-pass">
                        ¿Olvidaste tu contraseña?
                      </a>
                    </div>

                    <?php do_action( 'woocommerce_login_form_end' ); ?>

                  </form>
                </div><!-- #fb-checkout-login-form -->
              </div>
            <?php endif; ?>

          </div><!-- .fb-checkout-auth -->
        <?php endif; ?>


        <!-- ── CUPÓN RÁPIDO ──────────────────────────── -->
        <?php if ( wc_coupons_enabled() ) : ?>
          <div class="fb-checkout-coupon-bar">
            <button type="button"
                    class="fb-checkout-coupon-toggle"
                    aria-expanded="false"
                    aria-controls="fb-checkout-coupon-form">
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
            </button>

            <div class="fb-checkout-coupon-form" id="fb-checkout-coupon-form" hidden>
              <form class="checkout_coupon woocommerce-form-coupon"
                    action="<?php echo esc_url( wc_get_checkout_url() ); ?>"
                    method="post">
                <div class="fb-coupon-row">
                  <label for="fb-checkout-coupon-code" class="screen-reader-text">
                    Código de cupón:
                  </label>
                  <input type="text"
                         id="fb-checkout-coupon-code"
                         class="fb-field"
                         name="coupon_code"
                         placeholder="Ingresa tu código aquí…"
                         autocomplete="off">
                  <button type="submit"
                          class="fb-btn fb-btn--outline fb-btn--md"
                          name="apply_coupon"
                          value="Aplicar cupón">
                    Aplicar cupón
                  </button>
                  <input type="hidden" name="woocommerce-login-nonce"
                         value="<?php echo wp_create_nonce( 'woocommerce-login' ); ?>">
                </div>
              </form>
            </div>
          </div><!-- .fb-checkout-coupon-bar -->
        <?php endif; ?>


        <!-- ── FORMULARIO PRINCIPAL ──────────────────── -->
        <form name="checkout"
              class="checkout woocommerce-checkout fb-checkout-form"
              action="<?php echo esc_url( wc_get_checkout_url() ); ?>"
              method="post"
              enctype="multipart/form-data"
              novalidate>

          <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

          <div class="fb-checkout-layout">

            <!-- ════ COLUMNA IZQUIERDA — Datos del cliente ════ -->
            <div class="fb-checkout-customer-col">

              <?php do_action( 'woocommerce_checkout_billing' ); ?>

              <!-- ── DATOS DE FACTURACIÓN ─────────────── -->
              <div class="fb-checkout-section" id="fb-billing-section">
                <h2 class="fb-checkout-section__title">
                  <svg width="20" height="20" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2"
                       aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                  </svg>
                  Datos de facturación
                </h2>

                <div class="fb-checkout-fields">

                  <!-- Nombre y apellidos -->
                  <div class="fb-form-row fb-form-row--half">
                    <div class="fb-field-group">
                      <label for="billing_first_name">
                        Nombre
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <input type="text"
                             id="billing_first_name"
                             class="fb-field <?php echo ! empty( $checkout->get_value( 'billing_first_name' ) ) ? 'has-value' : ''; ?>"
                             name="billing_first_name"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_first_name' ) ); ?>"
                             autocomplete="given-name"
                             placeholder="Tu nombre"
                             required>
                    </div>
                    <div class="fb-field-group">
                      <label for="billing_last_name">
                        Apellidos
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <input type="text"
                             id="billing_last_name"
                             class="fb-field"
                             name="billing_last_name"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_last_name' ) ); ?>"
                             autocomplete="family-name"
                             placeholder="Tus apellidos"
                             required>
                    </div>
                  </div>

                  <!-- Empresa (opcional) -->
                  <div class="fb-form-row">
                    <div class="fb-field-group fb-field-group--optional">
                      <label for="billing_company">
                        Empresa
                        <span class="fb-field-optional">(opcional)</span>
                      </label>
                      <input type="text"
                             id="billing_company"
                             class="fb-field"
                             name="billing_company"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_company' ) ); ?>"
                             autocomplete="organization"
                             placeholder="Nombre de tu empresa">
                    </div>
                  </div>

                  <!-- País -->
                  <div class="fb-form-row">
                    <div class="fb-field-group">
                      <label for="billing_country">
                        País
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <div class="fb-field-select-wrap">
                        <?php
                        $countries_obj = new WC_Countries();
                        $countries     = $countries_obj->get_allowed_countries();
                        $current_country = $checkout->get_value( 'billing_country' )
                          ?: WC()->customer->get_billing_country()
                          ?: 'ES';
                        ?>
                        <select id="billing_country"
                                class="fb-field fb-field-select"
                                name="billing_country"
                                autocomplete="country"
                                required>
                          <?php foreach ( $countries as $code => $name ) : ?>
                            <option value="<?php echo esc_attr( $code ); ?>"
                              <?php selected( $current_country, $code ); ?>>
                              <?php echo esc_html( $name ); ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                        <svg width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2.5"
                             class="fb-field-select-arrow" aria-hidden="true">
                          <polyline points="6 9 12 15 18 9"/>
                        </svg>
                      </div>
                    </div>
                  </div>

                  <!-- Dirección -->
                  <div class="fb-form-row">
                    <div class="fb-field-group">
                      <label for="billing_address_1">
                        Dirección
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <input type="text"
                             id="billing_address_1"
                             class="fb-field"
                             name="billing_address_1"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_address_1' ) ); ?>"
                             autocomplete="address-line1"
                             placeholder="Calle y número"
                             required>
                    </div>
                  </div>

                  <div class="fb-form-row">
                    <div class="fb-field-group fb-field-group--optional">
                      <label for="billing_address_2">
                        Dirección 2
                        <span class="fb-field-optional">(opcional)</span>
                      </label>
                      <input type="text"
                             id="billing_address_2"
                             class="fb-field"
                             name="billing_address_2"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_address_2' ) ); ?>"
                             autocomplete="address-line2"
                             placeholder="Piso, puerta, bloque…">
                    </div>
                  </div>

                  <!-- Ciudad / CP / Provincia -->
                  <div class="fb-form-row fb-form-row--three">
                    <div class="fb-field-group">
                      <label for="billing_postcode">
                        Código postal
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <input type="text"
                             id="billing_postcode"
                             class="fb-field"
                             name="billing_postcode"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_postcode' ) ); ?>"
                             autocomplete="postal-code"
                             placeholder="28001"
                             required>
                    </div>
                    <div class="fb-field-group">
                      <label for="billing_city">
                        Ciudad
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <input type="text"
                             id="billing_city"
                             class="fb-field"
                             name="billing_city"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_city' ) ); ?>"
                             autocomplete="address-level2"
                             placeholder="Madrid"
                             required>
                    </div>
                    <div class="fb-field-group">
                      <label for="billing_state">
                        Provincia
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <input type="text"
                             id="billing_state"
                             class="fb-field"
                             name="billing_state"
                             value="<?php echo esc_attr( $checkout->get_value( 'billing_state' ) ); ?>"
                             autocomplete="address-level1"
                             placeholder="Madrid"
                             required>
                    </div>
                  </div>

                  <!-- Teléfono / Email -->
                  <div class="fb-form-row fb-form-row--half">
                    <div class="fb-field-group">
                      <label for="billing_phone">
                        Teléfono
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <div class="fb-field-icon-wrap">
                        <svg width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             class="fb-field-icon" aria-hidden="true">
                          <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0
                                   01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0
                                   01-3.07-8.67A2 2 0 012 .99h3a2 2 0 012 1.72c.127.96.361
                                   1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0
                                   012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                        <input type="tel"
                               id="billing_phone"
                               class="fb-field fb-field--with-icon"
                               name="billing_phone"
                               value="<?php echo esc_attr( $checkout->get_value( 'billing_phone' ) ); ?>"
                               autocomplete="tel"
                               placeholder="+34 600 000 000"
                               required>
                      </div>
                    </div>
                    <div class="fb-field-group">
                      <label for="billing_email">
                        Correo electrónico
                        <abbr class="required" title="obligatorio">*</abbr>
                      </label>
                      <div class="fb-field-icon-wrap">
                        <svg width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             class="fb-field-icon" aria-hidden="true">
                          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4
                                   c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                          <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <input type="email"
                               id="billing_email"
                               class="fb-field fb-field--with-icon"
                               name="billing_email"
                               value="<?php echo esc_attr( $checkout->get_value( 'billing_email' ) ); ?>"
                               autocomplete="email"
                               placeholder="tu@correo.com"
                               required>
                      </div>
                    </div>
                  </div>

                  <?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>

                </div><!-- .fb-checkout-fields -->
              </div><!-- #fb-billing-section -->


              <!-- ── DIRECCIÓN DE ENVÍO ────────────────── -->
              <?php if ( WC()->cart->needs_shipping_address() ) : ?>
                <div class="fb-checkout-section" id="fb-shipping-section">
                  <div class="fb-checkout-section__header">
                    <h2 class="fb-checkout-section__title">
                      <svg width="20" height="20" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2"
                           aria-hidden="true">
                        <rect x="1" y="3" width="15" height="13"/>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                        <circle cx="5.5"  cy="18.5" r="2.5"/>
                        <circle cx="18.5" cy="18.5" r="2.5"/>
                      </svg>
                      Dirección de entrega
                    </h2>

                    <!-- Toggle: mismo que facturación -->
                    <label class="fb-checkout-same-address" for="fb-same-address">
                      <input type="checkbox"
                             id="fb-same-address"
                             name="ship_to_different_address"
                             class="fb-checkbox"
                             value="1"
                             <?php checked( 1, apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ) ); ?>>
                      <span class="fb-checkbox-label">
                        Enviar a una dirección diferente
                      </span>
                    </label>
                  </div>

                  <div class="fb-checkout-fields fb-checkout-shipping-fields">

                    <div class="fb-form-row fb-form-row--half">
                      <div class="fb-field-group">
                        <label for="shipping_first_name">
                          Nombre
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <input type="text"
                               id="shipping_first_name"
                               class="fb-field"
                               name="shipping_first_name"
                               value="<?php echo esc_attr( $checkout->get_value( 'shipping_first_name' ) ); ?>"
                               autocomplete="given-name"
                               placeholder="Nombre del destinatario">
                      </div>
                      <div class="fb-field-group">
                        <label for="shipping_last_name">
                          Apellidos
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <input type="text"
                               id="shipping_last_name"
                               class="fb-field"
                               name="shipping_last_name"
                               value="<?php echo esc_attr( $checkout->get_value( 'shipping_last_name' ) ); ?>"
                               autocomplete="family-name"
                               placeholder="Apellidos del destinatario">
                      </div>
                    </div>

                    <div class="fb-form-row">
                      <div class="fb-field-group">
                        <label for="shipping_address_1">
                          Dirección de entrega
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <input type="text"
                               id="shipping_address_1"
                               class="fb-field"
                               name="shipping_address_1"
                               value="<?php echo esc_attr( $checkout->get_value( 'shipping_address_1' ) ); ?>"
                               autocomplete="address-line1"
                               placeholder="Calle y número de entrega">
                      </div>
                    </div>

                    <div class="fb-form-row">
                      <div class="fb-field-group fb-field-group--optional">
                        <label for="shipping_address_2">
                          Dirección 2
                          <span class="fb-field-optional">(opcional)</span>
                        </label>
                        <input type="text"
                               id="shipping_address_2"
                               class="fb-field"
                               name="shipping_address_2"
                               value="<?php echo esc_attr( $checkout->get_value( 'shipping_address_2' ) ); ?>"
                               autocomplete="address-line2"
                               placeholder="Piso, puerta, bloque…">
                      </div>
                    </div>

                    <div class="fb-form-row fb-form-row--three">
                      <div class="fb-field-group">
                        <label for="shipping_postcode">
                          Código postal
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <input type="text"
                               id="shipping_postcode"
                               class="fb-field"
                               name="shipping_postcode"
                               value="<?php echo esc_attr( $checkout->get_value( 'shipping_postcode' ) ); ?>"
                               autocomplete="postal-code"
                               placeholder="28001">
                      </div>
                      <div class="fb-field-group">
                        <label for="shipping_city">
                          Ciudad
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <input type="text"
                               id="shipping_city"
                               class="fb-field"
                               name="shipping_city"
                               value="<?php echo esc_attr( $checkout->get_value( 'shipping_city' ) ); ?>"
                               autocomplete="address-level2"
                               placeholder="Madrid">
                      </div>
                      <div class="fb-field-group">
                        <label for="shipping_state">
                          Provincia
                          <abbr class="required" title="obligatorio">*</abbr>
                        </label>
                        <input type="text"
                               id="shipping_state"
                               class="fb-field"
                               name="shipping_state"
                               value="<?php echo esc_attr( $checkout->get_value( 'shipping_state' ) ); ?>"
                               autocomplete="address-level1"
                               placeholder="Madrid">
                      </div>
                    </div>

                    <!-- Nota de entrega -->
                    <div class="fb-form-row">
                      <div class="fb-field-group fb-field-group--optional">
                        <label for="shipping_note">
                          Nota para la entrega
                          <span class="fb-field-optional">(opcional)</span>
                        </label>
                        <textarea id="shipping_note"
                                  class="fb-field fb-field-textarea"
                                  name="order_comments"
                                  rows="3"
                                  placeholder="Instrucciones especiales, horario preferido, portería…"><?php echo esc_textarea( $checkout->get_value( 'order_comments' ) ); ?></textarea>
                      </div>
                    </div>

                    <?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

                  </div><!-- .fb-checkout-shipping-fields -->
                </div><!-- #fb-shipping-section -->
              <?php endif; ?>


              <!-- ── NOTA DEL PEDIDO (si no hay envío) ── -->
              <?php if ( ! WC()->cart->needs_shipping_address() ) : ?>
                <div class="fb-checkout-section" id="fb-order-notes-section">
                  <h2 class="fb-checkout-section__title">
                    <svg width="20" height="20" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         aria-hidden="true">
                      <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                      <polyline points="14 2 14 8 20 8"/>
                      <line x1="16" y1="13" x2="8" y2="13"/>
                      <line x1="16" y1="17" x2="8" y2="17"/>
                      <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Notas del pedido
                    <span class="fb-field-optional">(opcional)</span>
                  </h2>
                  <div class="fb-form-row">
                    <div class="fb-field-group">
                      <label for="order_comments" class="screen-reader-text">
                        Notas del pedido:
                      </label>
                      <textarea id="order_comments"
                                class="fb-field fb-field-textarea"
                                name="order_comments"
                                rows="4"
                                placeholder="Cualquier nota especial sobre tu pedido…"><?php echo esc_textarea( $checkout->get_value( 'order_comments' ) ); ?></textarea>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

            </div><!-- .fb-checkout-customer-col -->


            <!-- ════ COLUMNA DERECHA — Resumen y pago ════ -->
            <div class="fb-checkout-summary-col">

              <div class="fb-checkout-summary" id="fb-order-review">

                <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                <h2 class="fb-checkout-summary__title">
                  <svg width="20" height="20" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2"
                       aria-hidden="true">
                    <circle cx="9"  cy="21" r="1"/>
                    <circle cx="20" cy="21" r="1"/>
                    <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61h9.72a2 2 0
                             001.99-1.61L23 6H6"/>
                  </svg>
                  Tu pedido
                </h2>

                <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                <!-- Lista de productos -->
                <div class="fb-order-review-items">

                  <!-- Cabecera -->
                  <div class="fb-order-review-head">
                    <span>Producto</span>
                    <span>Subtotal</span>
                  </div>

                  <?php
                  foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                    $_product  = apply_filters(
                      'woocommerce_cart_item_product',
                      $cart_item['data'], $cart_item, $cart_item_key
                    );
                    $product_name = apply_filters(
                      'woocommerce_cart_item_name',
                      $_product->get_name(), $cart_item, $cart_item_key
                    );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0
                      && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key )
                    ) :
                  ?>
                    <div class="fb-order-review-item
                      <?php echo esc_attr( apply_filters(
                        'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key
                      ) ); ?>">

                      <div class="fb-order-review-item__info">
                        <?php echo wp_kses_post( $_product->get_image( [ 48, 48 ], [ 'loading' => 'lazy' ] ) ); ?>
                        <div>
                          <span class="fb-order-review-item__name">
                            <?php echo wp_kses_post( $product_name ); ?>
                          </span>
                          <span class="fb-order-review-item__qty">
                            × <?php echo (int) $cart_item['quantity']; ?>
                          </span>
                          <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore ?>
                        </div>
                      </div>

                      <span class="fb-order-review-item__subtotal">
                        <?php
                        echo apply_filters(
                          'woocommerce_cart_item_subtotal',
                          WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ),
                          $cart_item,
                          $cart_item_key
                        ); // phpcs:ignore
                        ?>
                      </span>
                    </div>
                  <?php
                    endif;
                  endforeach;
                  ?>
                </div><!-- .fb-order-review-items -->


                <!-- Totales -->
                <div class="fb-order-review-totals">

                  <div class="fb-order-review-total-row">
                    <span>Subtotal</span>
                    <span><?php wc_cart_totals_subtotal_html(); ?></span>
                  </div>

                  <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                    <div class="fb-order-review-total-row fb-order-review-total-row--coupon">
                      <span>
                        Cupón:
                        <em><?php echo esc_html( strtoupper( $code ) ); ?></em>
                      </span>
                      <span class="fb-discount-value">
                        -<?php wc_cart_totals_coupon_html( $coupon ); ?>
                      </span>
                    </div>
                  <?php endforeach; ?>

                  <?php if ( WC()->cart->needs_shipping() ) : ?>
                    <div class="fb-order-review-total-row">
                      <span>
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
                      <span><?php woocommerce_shipping_calculator(); ?></span>
                    </div>
                  <?php endif; ?>

                  <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

                  <div class="fb-order-review-total-row fb-order-review-total-row--grand">
                    <span>Total</span>
                    <span><?php wc_cart_totals_order_total_html(); ?></span>
                  </div>

                </div><!-- .fb-order-review-totals -->


                <!-- ── MÉTODOS DE PAGO ──────────────── -->
                <div class="fb-payment-methods" id="payment">

                  <?php if ( WC()->cart->needs_payment() ) : ?>

                    <h3 class="fb-payment-methods__title">
                      <svg width="18" height="18" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2"
                           aria-hidden="true">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                      </svg>
                      Método de pago
                    </h3>

                    <ul class="fb-payment-methods__list wc_payment_methods payment_methods methods">
                      <?php
                      if ( ! empty( $checkout->get_checkout_fields() ) ) :
                        do_action( 'woocommerce_review_order_before_payment' );

                        $available_gateways = WC()->payment_gateways->get_available_payment_gateways();

                        if ( $available_gateways ) :
                          foreach ( $available_gateways as $gateway ) :
                      ?>
                        <li class="fb-payment-method wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
                          <label class="fb-payment-method__label"
                                 for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
                            <input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>"
                                   type="radio"
                                   class="fb-radio input-radio"
                                   name="payment_method"
                                   value="<?php echo esc_attr( $gateway->id ); ?>"
                                   <?php checked( $gateway->id, WC()->session->get( 'chosen_payment_method' ) ); ?>>
                            <span class="fb-payment-method__name">
                              <?php echo esc_html( $gateway->get_title() ); ?>
                            </span>
                            <?php if ( $gateway->get_icon() ) : ?>
                              <span class="fb-payment-method__icons">
                                <?php echo wp_kses_post( $gateway->get_icon() ); ?>
                              </span>
                            <?php endif; ?>
                          </label>

                          <?php if ( $gateway->get_description() ) : ?>
                            <div class="fb-payment-method__desc">
                              <?php echo wp_kses_post( wpautop( wptexturize( $gateway->get_description() ) ) ); ?>
                            </div>
                          <?php endif; ?>

                          <?php do_action( 'woocommerce_payment_fields_' . $gateway->id ); ?>

                        </li>
                      <?php
                          endforeach;
                        else :
                      ?>
                        <li class="fb-no-payment-methods">
                          <p>
                            Lo sentimos, parece que no hay métodos de pago disponibles
                            en tu zona. Por favor, contáctanos si necesitas ayuda.
                          </p>
                        </li>
                      <?php
                        endif;

                        do_action( 'woocommerce_review_order_after_payment' );
                      endif;
                      ?>
                    </ul><!-- .fb-payment-methods__list -->

                  <?php endif; ?>

                  <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

                  <!-- Términos y condiciones -->
                  <?php if ( wc_get_page_id( 'terms' ) > 0 ) : ?>
                    <div class="fb-checkout-terms">
                      <label class="fb-checkout-terms__label" for="terms">
                        <input type="checkbox"
                               id="terms"
                               class="fb-checkbox"
                               name="terms"
                               value="1">
                        <span>
                          He leído y acepto los
                          <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'terms' ) ) ); ?>"
                             target="_blank" rel="noopener noreferrer">
                            términos y condiciones
                          </a>
                          <abbr class="required" title="obligatorio">*</abbr>
                        </span>
                      </label>
                    </div>
                  <?php endif; ?>

                  <!-- Botón confirmar pedido -->
                  <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
                  <input type="hidden" id="woocommerce-process-checkout-nonce"
                         name="woocommerce-process-checkout-nonce"
                         value="<?php echo wp_create_nonce( 'woocommerce-process_checkout' ); ?>">
                  <input type="hidden" name="_wp_http_referer"
                         value="<?php echo esc_attr( wp_unslash( $_SERVER['REQUEST_URI'] ) ); ?>">

                  <button type="submit"
                          class="fb-btn fb-btn--primary fb-btn--lg fb-btn--full
                                 fb-checkout-submit-btn button alt"
                          name="woocommerce_checkout_place_order"
                          id="place_order"
                          data-value="Confirmar pedido">
                    <svg width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         aria-hidden="true">
                      <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Confirmar pedido
                  </button>

                  <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

                </div><!-- #payment .fb-payment-methods -->

                <!-- Badges de seguridad -->
                <div class="fb-checkout-trust">
                  <div class="fb-checkout-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         aria-hidden="true">
                      <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                      <path d="M7 11V7a5 5 0 0110 0v4"/>
                    </svg>
                    Pago 100% seguro
                  </div>
                  <div class="fb-checkout-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         aria-hidden="true">
                      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    Datos protegidos
                  </div>
                  <div class="fb-checkout-trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         aria-hidden="true">
                      <polyline points="23 4 23 10 17 10"/>
                      <polyline points="1 20 1 14 7 14"/>
                      <path d="M3.51 9a9 9 0 0114.85-3.36L23 10
                               M1 14l4.64 4.36A9 9 0 0020.49 15"/>
                    </svg>
                    Devolución fácil
                  </div>
                </div>

                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

              </div><!-- .fb-checkout-summary -->

            </div><!-- .fb-checkout-summary-col -->

          </div><!-- .fb-checkout-layout -->

          <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

        </form><!-- .fb-checkout-form -->

      <?php endif; /* cart not empty */ ?>

    </div><!-- .fb-container -->
  </section><!-- .fb-checkout-main -->

</main><!-- #fb-main -->

<?php
do_action( 'woocommerce_after_checkout_form', $checkout );
get_footer();
?>