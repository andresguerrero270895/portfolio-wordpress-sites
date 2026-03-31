<?php
/**
 * FreshBite Marketplace - Cart Page
 * Variables CSS: --fb-green: #2D6A4F | --fb-green-light: #52B788
 *                --fb-orange: #F4845F | --fb-cream: #FEFAE0
 */
defined('ABSPATH') || exit;
?>

<style>
/* ═══════════════════════════════════════════════
   FRESHBITE CART — Complete Styles
   ═══════════════════════════════════════════════ */

:root {
  --fb-green:        #2D6A4F;
  --fb-green-light:  #52B788;
  --fb-green-pale:   #D8F3DC;
  --fb-orange:       #F4845F;
  --fb-orange-dark:  #E06640;
  --fb-cream:        #FEFAE0;
  --fb-cream-dark:   #F5F0C8;
  --fb-text:         #1B2D23;
  --fb-text-muted:   #6B7C6E;
  --fb-border:       #D1E8D6;
  --fb-white:        #FFFFFF;
  --fb-shadow:       0 4px 24px rgba(45,106,79,0.10);
  --fb-radius:       16px;
  --fb-radius-sm:    10px;
}

/* Page wrapper */
.fb-cart-page {
  background: var(--fb-cream);
  min-height: 100vh;
  padding: 40px 0 80px;
  font-family: 'Inter', 'Segoe UI', sans-serif;
}

.fb-cart-container {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 24px;
}

/* Page title */
.fb-cart-title {
  font-size: clamp(1.6rem, 3vw, 2.2rem);
  font-weight: 700;
  color: var(--fb-green);
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  gap: 12px;
}

.fb-cart-title svg {
  width: 32px;
  height: 32px;
  color: var(--fb-orange);
}

.fb-cart-subtitle {
  color: var(--fb-text-muted);
  margin-bottom: 36px;
  font-size: 0.95rem;
}

/* Layout grid */
.fb-cart-layout {
  display: grid;
  grid-template-columns: 1fr 360px;
  gap: 28px;
  align-items: start;
}

@media (max-width: 900px) {
  .fb-cart-layout {
    grid-template-columns: 1fr;
  }
}

/* ─── MAIN CART TABLE ─── */
.fb-cart-main {
  background: var(--fb-white);
  border-radius: var(--fb-radius);
  box-shadow: var(--fb-shadow);
  overflow: hidden;
  border: 1px solid var(--fb-border);
}

.fb-cart-header-row {
  display: grid;
  grid-template-columns: 80px 1fr 120px 100px 80px 44px;
  gap: 12px;
  padding: 16px 24px;
  background: var(--fb-green);
  color: var(--fb-white);
  font-size: 0.78rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  align-items: center;
}

@media (max-width: 640px) {
  .fb-cart-header-row { display: none; }
}

/* Cart items */
.fb-cart-items {
  divide-color: var(--fb-border);
}

.fb-cart-item {
  display: grid;
  grid-template-columns: 80px 1fr 120px 100px 80px 44px;
  gap: 12px;
  padding: 20px 24px;
  align-items: center;
  border-bottom: 1px solid var(--fb-border);
  transition: background 0.2s ease;
}

.fb-cart-item:last-child {
  border-bottom: none;
}

.fb-cart-item:hover {
  background: var(--fb-cream);
}

@media (max-width: 640px) {
  .fb-cart-item {
    grid-template-columns: 70px 1fr 44px;
    grid-template-rows: auto auto auto;
    gap: 8px;
    padding: 16px;
  }
}

/* Product image */
.fb-product-thumb {
  width: 72px;
  height: 72px;
  border-radius: var(--fb-radius-sm);
  overflow: hidden;
  border: 2px solid var(--fb-border);
  background: var(--fb-cream);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.fb-product-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.fb-product-thumb-placeholder {
  font-size: 28px;
}

/* Product info */
.fb-product-info {}

.fb-product-name {
  font-weight: 600;
  color: var(--fb-text);
  font-size: 0.95rem;
  line-height: 1.4;
  margin-bottom: 4px;
}

.fb-product-name a {
  color: inherit;
  text-decoration: none;
  transition: color 0.2s;
}

.fb-product-name a:hover {
  color: var(--fb-green);
}

.fb-product-meta {
  font-size: 0.78rem;
  color: var(--fb-text-muted);
}

/* Price */
.fb-product-price {
  font-weight: 600;
  color: var(--fb-green);
  font-size: 0.95rem;
}

/* Quantity input */
.fb-qty-wrapper {
  display: flex;
  align-items: center;
  gap: 6px;
  background: var(--fb-cream);
  border: 2px solid var(--fb-border);
  border-radius: 50px;
  padding: 4px 8px;
  width: fit-content;
}

.fb-qty-btn {
  width: 28px;
  height: 28px;
  border: none;
  background: var(--fb-white);
  border-radius: 50%;
  cursor: pointer;
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--fb-green);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
  line-height: 1;
}

.fb-qty-btn:hover {
  background: var(--fb-green);
  color: var(--fb-white);
}

.fb-qty-input {
  width: 40px;
  text-align: center;
  border: none;
  background: transparent;
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--fb-text);
  outline: none;
  -moz-appearance: textfield;
}

.fb-qty-input::-webkit-outer-spin-button,
.fb-qty-input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

/* Subtotal */
.fb-product-subtotal {
  font-weight: 700;
  color: var(--fb-orange);
  font-size: 1rem;
}

/* Remove button */
.fb-remove-btn {
  width: 36px;
  height: 36px;
  border: 2px solid #FED7D7;
  background: #FFF5F5;
  border-radius: 50%;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
  text-decoration: none;
  color: #E53E3E;
  font-size: 0.9rem;
}

.fb-remove-btn:hover {
  background: #E53E3E;
  border-color: #E53E3E;
  color: var(--fb-white);
  transform: scale(1.1);
}

/* ─── COUPON + UPDATE ROW ─── */
.fb-cart-actions {
  padding: 24px;
  background: var(--fb-cream);
  border-top: 1px solid var(--fb-border);
}

/* Coupon accordion trigger */
.fb-coupon-toggle {
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  font-size: 0.9rem;
  font-weight: 600;
  color: var(--fb-green);
  margin-bottom: 0;
  user-select: none;
  width: fit-content;
  padding: 8px 0;
  transition: color 0.2s;
}

.fb-coupon-toggle:hover {
  color: var(--fb-orange);
}

.fb-coupon-toggle svg {
  width: 18px;
  height: 18px;
  transition: transform 0.3s ease;
  flex-shrink: 0;
}

.fb-coupon-toggle.open svg.chevron {
  transform: rotate(180deg);
}

/* Coupon form */
.fb-coupon-form {
  display: none;
  margin-top: 16px;
  animation: slideDown 0.25s ease;
}

.fb-coupon-form.visible {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  align-items: stretch;
}

@keyframes slideDown {
  from { opacity: 0; transform: translateY(-8px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* Coupon input */
.fb-coupon-input-wrapper {
  flex: 1;
  min-width: 200px;
  position: relative;
}

.fb-coupon-input {
  width: 100%;
  padding: 13px 18px 13px 44px;
  border: 2px solid var(--fb-border);
  border-radius: 50px;
  font-size: 0.9rem;
  color: var(--fb-text);
  background: var(--fb-white);
  outline: none;
  transition: border-color 0.2s, box-shadow 0.2s;
  box-sizing: border-box;
}

.fb-coupon-input:focus {
  border-color: var(--fb-green-light);
  box-shadow: 0 0 0 4px rgba(82,183,136,0.15);
}

.fb-coupon-input::placeholder {
  color: #aab5ad;
}

.fb-coupon-icon {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--fb-text-muted);
  font-size: 1rem;
  pointer-events: none;
}

/* ─── BUTTONS ─── */

/* Aplicar button */
.fb-btn-apply {
  padding: 13px 28px;
  background: var(--fb-green);
  color: var(--fb-white);
  border: none;
  border-radius: 50px;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
  letter-spacing: 0.02em;
}

.fb-btn-apply:hover {
  background: var(--fb-green-light);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(45,106,79,0.30);
}

.fb-btn-apply:active {
  transform: translateY(0);
}

/* Actualizar carrito button */
.fb-btn-update {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 12px 24px;
  background: transparent;
  color: var(--fb-green);
  border: 2px solid var(--fb-green);
  border-radius: 50px;
  font-size: 0.88rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease;
  margin-top: 16px;
  white-space: nowrap;
}

.fb-btn-update:hover {
  background: var(--fb-green);
  color: var(--fb-white);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(45,106,79,0.25);
}

.fb-btn-update svg {
  width: 16px;
  height: 16px;
  transition: transform 0.4s ease;
}

.fb-btn-update:hover svg {
  transform: rotate(360deg);
}

/* Seguir comprando link */
.fb-continue-shopping {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: var(--fb-orange);
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 600;
  padding: 10px 0;
  margin-top: 8px;
  transition: all 0.2s;
  border-bottom: 2px solid transparent;
}

.fb-continue-shopping:hover {
  color: var(--fb-orange-dark);
  border-bottom-color: var(--fb-orange);
  gap: 12px;
}

.fb-continue-shopping svg {
  width: 16px;
  height: 16px;
  transition: transform 0.2s;
}

.fb-continue-shopping:hover svg {
  transform: translateX(-4px);
}

/* ─── ORDER SUMMARY SIDEBAR ─── */
.fb-cart-sidebar {
  position: sticky;
  top: 24px;
}

.fb-summary-card {
  background: var(--fb-white);
  border-radius: var(--fb-radius);
  box-shadow: var(--fb-shadow);
  overflow: hidden;
  border: 1px solid var(--fb-border);
}

.fb-summary-header {
  background: var(--fb-green);
  padding: 20px 24px;
  color: var(--fb-white);
}

.fb-summary-header h3 {
  font-size: 1.1rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 10px;
}

.fb-summary-body {
  padding: 24px;
}

/* Rows */
.fb-summary-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;
  border-bottom: 1px dashed var(--fb-border);
  font-size: 0.9rem;
}

.fb-summary-row:last-of-type {
  border-bottom: none;
}

.fb-summary-row .label {
  color: var(--fb-text-muted);
  font-weight: 500;
}

.fb-summary-row .value {
  font-weight: 600;
  color: var(--fb-text);
}

.fb-summary-row.discount .value {
  color: var(--fb-green-light);
}

.fb-summary-total {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 16px 0 0;
  margin-top: 8px;
  border-top: 2px solid var(--fb-green-pale);
}

.fb-summary-total .label {
  font-size: 1rem;
  font-weight: 700;
  color: var(--fb-text);
}

.fb-summary-total .value {
  font-size: 1.4rem;
  font-weight: 800;
  color: var(--fb-green);
}

/* Trust badges */
.fb-trust-badges {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin: 20px 0;
  padding: 16px;
  background: var(--fb-cream);
  border-radius: var(--fb-radius-sm);
}

.fb-trust-badge {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.82rem;
  color: var(--fb-text-muted);
  font-weight: 500;
}

.fb-trust-badge svg {
  width: 16px;
  height: 16px;
  color: var(--fb-green-light);
  flex-shrink: 0;
}

/* Checkout button */
.fb-btn-checkout {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  padding: 16px 24px;
  background: linear-gradient(135deg, var(--fb-orange) 0%, var(--fb-orange-dark) 100%);
  color: var(--fb-white);
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 700;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.3s ease;
  letter-spacing: 0.02em;
  box-shadow: 0 4px 20px rgba(244,132,95,0.40);
  margin-bottom: 16px;
}

.fb-btn-checkout:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 30px rgba(244,132,95,0.55);
  color: var(--fb-white);
}

.fb-btn-checkout:active {
  transform: translateY(-1px);
}

/* Payment methods */
.fb-payment-methods {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding-top: 12px;
  border-top: 1px solid var(--fb-border);
  flex-wrap: wrap;
}

.fb-payment-label {
  font-size: 0.75rem;
  color: var(--fb-text-muted);
  width: 100%;
  text-align: center;
  margin-bottom: 4px;
}

.fb-payment-badge {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 5px 12px;
  border-radius: 6px;
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  border: 1.5px solid;
}

.fb-payment-badge.visa {
  background: #1A1F71;
  color: #fff;
  border-color: #1A1F71;
}

.fb-payment-badge.mastercard {
  background: #fff;
  color: #EB001B;
  border-color: #ddd;
}

.fb-payment-badge.mastercard span.mc-dot2 {
  color: #F79E1B;
}

.fb-payment-badge.paypal {
  background: #003087;
  color: #009CDE;
  border-color: #003087;
}

/* ─── EMPTY CART ─── */
.fb-cart-empty {
  text-align: center;
  padding: 80px 24px;
  background: var(--fb-white);
  border-radius: var(--fb-radius);
  box-shadow: var(--fb-shadow);
  border: 1px solid var(--fb-border);
}

.fb-cart-empty-icon {
  font-size: 5rem;
  margin-bottom: 16px;
  display: block;
  animation: wobble 2s ease infinite;
}

@keyframes wobble {
  0%,100% { transform: rotate(-5deg); }
  50%      { transform: rotate(5deg); }
}

.fb-cart-empty h3 {
  color: var(--fb-green);
  font-size: 1.5rem;
  margin-bottom: 8px;
}

.fb-cart-empty p {
  color: var(--fb-text-muted);
  margin-bottom: 28px;
}

.fb-btn-shop {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 14px 32px;
  background: var(--fb-green);
  color: var(--fb-white);
  border-radius: 50px;
  font-weight: 700;
  text-decoration: none;
  transition: all 0.3s;
  font-size: 0.95rem;
}

.fb-btn-shop:hover {
  background: var(--fb-green-light);
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(45,106,79,0.30);
  color: var(--fb-white);
}

/* Notices */
.fb-notice {
  padding: 14px 20px;
  border-radius: var(--fb-radius-sm);
  font-size: 0.88rem;
  font-weight: 500;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.fb-notice.success {
  background: #D8F3DC;
  color: #1E5631;
  border-left: 4px solid var(--fb-green-light);
}

.fb-notice.error {
  background: #FED7D7;
  color: #742A2A;
  border-left: 4px solid #FC8181;
}

/* Loading state */
.fb-btn-apply.loading,
.fb-btn-update.loading {
  opacity: 0.7;
  pointer-events: none;
}

.fb-spinner {
  width: 16px;
  height: 16px;
  border: 2px solid rgba(255,255,255,0.4);
  border-top-color: #fff;
  border-radius: 50%;
  animation: spin 0.6s linear infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
</style>

<div class="fb-cart-page">
  <div class="fb-cart-container">

    <?php
    // ── WooCommerce notices ──────────────────────
    wc_print_notices();

    // Custom notices from session
    if ( WC()->session ) {
      $fb_notice = WC()->session->get('fb_cart_notice');
      if ( $fb_notice ) {
        echo '<div class="fb-notice ' . esc_attr($fb_notice['type']) . '">
                <span>' . ($fb_notice['type'] === 'success' ? '✅' : '❌') . '</span>
                ' . esc_html($fb_notice['message']) . '
              </div>';
        WC()->session->set('fb_cart_notice', null);
      }
    }
    ?>

    <?php if ( WC()->cart->is_empty() ) : ?>

      <!-- ─── EMPTY CART ─── -->
      <div class="fb-cart-empty">
        <span class="fb-cart-empty-icon">🛒</span>
        <h3><?php esc_html_e( 'Tu carrito está vacío', 'freshbite' ); ?></h3>
        <p><?php esc_html_e( 'Agrega productos frescos y deliciosos de nuestros productores locales.', 'freshbite' ); ?></p>
        <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="fb-btn-shop">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2.5" width="18" height="18">
            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
            <path d="M16 10a4 4 0 01-8 0"/>
          </svg>
          <?php esc_html_e( 'Explorar productos', 'freshbite' ); ?>
        </a>
      </div>

    <?php else : ?>

      <!-- Page title -->
      <h1 class="fb-cart-title">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61H19.4a2 2 0 001.98-1.73l1.1-8.27H6"/>
        </svg>
        <?php esc_html_e( 'Mi Carrito', 'freshbite' ); ?>
      </h1>
      <p class="fb-cart-subtitle">
        <?php
        $count = WC()->cart->get_cart_contents_count();
        printf(
          _n( '%d producto en tu pedido', '%d productos en tu pedido', $count, 'freshbite' ),
          $count
        );
        ?>
      </p>

      <form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" class="fb-cart-layout">

        <!-- ════ LEFT: CART TABLE ════ -->
        <div class="fb-cart-main">

          <!-- Table header -->
          <div class="fb-cart-header-row">
            <span></span>
            <span><?php esc_html_e('Producto', 'freshbite'); ?></span>
            <span><?php esc_html_e('Precio', 'freshbite'); ?></span>
            <span><?php esc_html_e('Cantidad', 'freshbite'); ?></span>
            <span><?php esc_html_e('Total', 'freshbite'); ?></span>
            <span></span>
          </div>

          <!-- Cart items -->
          <div class="fb-cart-items">
            <?php
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
              $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
              $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

              if ( $_product && $_product->exists() && $cart_item['quantity'] > 0
                   && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :

                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( array(80,80) ), $cart_item, $cart_item_key );
                $price             = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                $subtotal          = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
            ?>
            <div class="fb-cart-item <?php echo esc_attr( apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key) ); ?>">

              <!-- Thumbnail -->
              <div class="fb-product-thumb">
                <?php if ( $thumbnail ) : ?>
                  <?php echo $thumbnail; ?>
                <?php else : ?>
                  <span class="fb-product-thumb-placeholder">🥦</span>
                <?php endif; ?>
              </div>

              <!-- Product info -->
              <div class="fb-product-info">
                <div class="fb-product-name">
                  <?php if ( $product_permalink ) : ?>
                    <a href="<?php echo esc_url($product_permalink); ?>">
                      <?php echo wp_kses_post( apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) ); ?>
                    </a>
                  <?php else : ?>
                    <?php echo wp_kses_post( apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) ); ?>
                  <?php endif; ?>
                </div>
                <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                <div class="fb-product-meta">
                  SKU: <?php echo $_product->get_sku() ?: 'FB-' . $product_id; ?>
                </div>
              </div>

              <!-- Unit price -->
              <div class="fb-product-price">
                <?php echo $price; ?>
              </div>

              <!-- Quantity -->
              <div>
                <?php
                if ( $_product->is_sold_individually() ) {
                  $min_qty = 1; $max_qty = 1;
                } else {
                  $min_qty = 0; $max_qty = $_product->get_max_purchase_quantity();
                }
                ?>
                <div class="fb-qty-wrapper">
                  <button type="button" class="fb-qty-btn fb-qty-minus" aria-label="Reducir cantidad">−</button>
                  <input
                    type="number"
                    class="fb-qty-input input-text qty"
                    name="cart[<?php echo esc_attr($cart_item_key); ?>][qty]"
                    value="<?php echo esc_attr($cart_item['quantity']); ?>"
                    min="<?php echo esc_attr($min_qty); ?>"
                    max="<?php echo esc_attr($max_qty === -1 ? '' : $max_qty); ?>"
                    step="1"
                    aria-label="<?php esc_attr_e('Cantidad', 'freshbite'); ?>"
                  />
                  <button type="button" class="fb-qty-btn fb-qty-plus" aria-label="Aumentar cantidad">+</button>
                </div>
              </div>

              <!-- Subtotal -->
              <div class="fb-product-subtotal">
                <?php echo $subtotal; ?>
              </div>

              <!-- Remove -->
              <div>
                <?php
                echo apply_filters( 'woocommerce_cart_item_remove_link',
                  sprintf(
                    '<a href="%s" class="fb-remove-btn" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                           stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                           stroke-linejoin="round" width="16" height="16">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                        <path d="M10 11v6M14 11v6"/>
                        <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                      </svg>
                    </a>',
                    esc_url( wc_get_cart_remove_url($cart_item_key) ),
                    esc_attr__( 'Eliminar producto', 'freshbite' ),
                    esc_attr($product_id),
                    esc_attr($_product->get_sku())
                  ),
                  $cart_item_key
                );
                ?>
              </div>

            </div>
            <?php
              endif;
            endforeach;
            ?>
          </div><!-- /fb-cart-items -->

          <!-- ─── COUPON + ACTIONS ─── -->
          <div class="fb-cart-actions">

            <?php if ( wc_coupons_enabled() ) : ?>
            <!-- Coupon accordion -->
            <div class="fb-coupon-toggle" id="fbCouponToggle" role="button" tabindex="0"
                 aria-expanded="false" aria-controls="fbCouponForm">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round"
                   stroke-linejoin="round">
                <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                <line x1="7" y1="7" x2="7.01" y2="7"/>
              </svg>
              <?php esc_html_e( '¿Tienes un cupón de descuento?', 'freshbite' ); ?>
              <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2.5"
                   stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"/>
              </svg>
            </div>

            <div class="fb-coupon-form" id="fbCouponForm" role="region">
              <div class="fb-coupon-input-wrapper">
                <span class="fb-coupon-icon">🏷️</span>
                <input
                  type="text"
                  name="coupon_code"
                  id="coupon_code"
                  class="fb-coupon-input"
                  value=""
                  placeholder="<?php esc_attr_e('Ingresa tu código...', 'freshbite'); ?>"
                  autocomplete="off"
                />
              </div>
              <button type="submit" class="fb-btn-apply" name="apply_coupon"
                      value="<?php esc_attr_e('Aplicar cupón', 'freshbite'); ?>"
                      id="fbApplyCoupon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                     stroke-linejoin="round" width="16" height="16">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
                <?php esc_html_e('Aplicar', 'freshbite'); ?>
              </button>
            </div>
            <?php endif; ?>

            <!-- Update cart button -->
            <button type="submit" class="fb-btn-update" name="update_cart"
                    value="1" id="fbUpdateCart">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                   stroke-linejoin="round">
                <polyline points="23 4 23 10 17 10"/>
                <polyline points="1 20 1 14 7 14"/>
                <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/>
              </svg>
              <?php esc_html_e('Actualizar carrito', 'freshbite'); ?>
            </button>

            <!-- Continue shopping -->
            <br>
            <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>"
               class="fb-continue-shopping">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                   stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
              </svg>
              <?php esc_html_e('Seguir comprando', 'freshbite'); ?>
            </a>

          </div><!-- /fb-cart-actions -->

        </div><!-- /fb-cart-main -->

        <!-- ════ RIGHT: ORDER SUMMARY ════ -->
        <div class="fb-cart-sidebar">
          <div class="fb-summary-card">

            <div class="fb-summary-header">
              <h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" width="20" height="20">
                  <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                  <line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
                <?php esc_html_e('Resumen del pedido', 'freshbite'); ?>
              </h3>
            </div>

            <div class="fb-summary-body">

              <!-- Subtotal -->
              <div class="fb-summary-row">
                <span class="label"><?php esc_html_e('Subtotal', 'freshbite'); ?></span>
                <span class="value"><?php wc_cart_totals_subtotal_html(); ?></span>
              </div>

              <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
              <div class="fb-summary-row discount">
                <span class="label">
                  🏷️ <?php echo esc_html(strtoupper($code)); ?>
                  <a href="<?php echo esc_url( add_query_arg('remove_coupon', urlencode($code), wc_get_cart_url()) ); ?>"
                     style="font-size:0.75rem; color:#E53E3E; margin-left:8px; font-weight:400;">
                    ✕ Quitar
                  </a>
                </span>
                <span class="value">-<?php wc_cart_totals_coupon_html($coupon); ?></span>
              </div>
              <?php endforeach; ?>

              <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
              <div class="fb-summary-row">
                <span class="label"><?php esc_html_e('Envío', 'freshbite'); ?></span>
                <span class="value">
                  <?php woocommerce_cart_totals_shipping_html(); ?>
                </span>
              </div>
              <?php endif; ?>

              <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
              <div class="fb-summary-row">
                <span class="label"><?php echo esc_html($fee->name); ?></span>
                <span class="value"><?php echo wc_price($fee->total); ?></span>
              </div>
              <?php endforeach; ?>

              <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
              <div class="fb-summary-row">
                <span class="label"><?php esc_html_e('Impuestos', 'freshbite'); ?></span>
                <span class="value"><?php wc_cart_totals_taxes_total_html(); ?></span>
              </div>
              <?php endif; ?>

              <!-- TOTAL -->
              <div class="fb-summary-total">
                <span class="label"><?php esc_html_e('Total', 'freshbite'); ?></span>
                <span class="value"><?php wc_cart_totals_order_total_html(); ?></span>
              </div>

              <!-- Trust badges -->
              <div class="fb-trust-badges">
                <div class="fb-trust-badge">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                  </svg>
                  <?php esc_html_e('Pago 100% seguro', 'freshbite'); ?>
                </div>
                <div class="fb-trust-badge">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                  </svg>
                  <?php esc_html_e('Garantía de frescura', 'freshbite'); ?>
                </div>
                <div class="fb-trust-badge">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13" rx="1"/>
                    <path d="M16 8h5l3 3v5h-8V8z"/>
                    <circle cx="5.5" cy="18.5" r="2.5"/>
                    <circle cx="18.5" cy="18.5" r="2.5"/>
                  </svg>
                  <?php esc_html_e('Entrega en 24-48 h', 'freshbite'); ?>
                </div>
              </div>

              <!-- Checkout CTA -->
              <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
                 class="fb-btn-checkout">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                     stroke-linejoin="round" width="18" height="18">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
                <?php esc_html_e('Finalizar pedido', 'freshbite'); ?>
              </a>

              <!-- Payment methods -->
              <div class="fb-payment-methods">
                <span class="fb-payment-label">
                  <?php esc_html_e('Métodos de pago aceptados', 'freshbite'); ?>
                </span>
                <span class="fb-payment-badge visa">
                  <svg width="18" height="12" viewBox="0 0 24 16" fill="none">
                    <rect width="24" height="16" rx="2" fill="#1A1F71"/>
                    <text x="3" y="12" font-family="Arial" font-weight="bold"
                          font-size="10" fill="white" letter-spacing="0">VISA</text>
                  </svg>
                  VISA
                </span>
                <span class="fb-payment-badge mastercard">
                  <span style="color:#EB001B;font-size:1.1rem">●</span>
                  <span class="mc-dot2" style="color:#F79E1B;font-size:1.1rem;margin-left:-8px">●</span>
                  MC
                </span>
                <span class="fb-payment-badge paypal">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="#009CDE">
                    <path d="M7.076 21.337H2.47a.641.641 0 01-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106z"/>
                  </svg>
                  PayPal
                </span>
              </div>

            </div><!-- /fb-summary-body -->
          </div><!-- /fb-summary-card -->
        </div><!-- /fb-cart-sidebar -->

        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

      </form>

    <?php endif; ?>

  </div><!-- /fb-cart-container -->
</div><!-- /fb-cart-page -->

<script>
(function() {
  'use strict';

  // ─── COUPON ACCORDION ────────────────────────
  const toggle = document.getElementById('fbCouponToggle');
  const form   = document.getElementById('fbCouponForm');

  if (toggle && form) {
    function openCoupon() {
      form.classList.add('visible');
      toggle.classList.add('open');
      toggle.setAttribute('aria-expanded', 'true');
      const input = document.getElementById('coupon_code');
      if (input) setTimeout(() => input.focus(), 50);
    }
    function closeCoupon() {
      form.classList.remove('visible');
      toggle.classList.remove('open');
      toggle.setAttribute('aria-expanded', 'false');
    }
    function toggleCoupon() {
      form.classList.contains('visible') ? closeCoupon() : openCoupon();
    }

    toggle.addEventListener('click', toggleCoupon);
    toggle.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleCoupon(); }
    });

    // Auto-open if there's a coupon error
    <?php if ( wc_notice_count('error') > 0 ) : ?>
    openCoupon();
    <?php endif; ?>
  }

  // ─── QUANTITY BUTTONS ────────────────────────
  document.querySelectorAll('.fb-cart-item').forEach(item => {
    const input   = item.querySelector('.fb-qty-input');
    const btnMinus = item.querySelector('.fb-qty-minus');
    const btnPlus  = item.querySelector('.fb-qty-plus');

    if (!input) return;

    function updateQty(val) {
      const min = parseInt(input.min) || 0;
      const max = parseInt(input.max) || 999;
      const newVal = Math.min(Math.max(val, min), max);
      input.value = newVal;

      // Visual feedback
      input.style.color = 'var(--fb-orange)';
      input.style.fontWeight = '800';
      setTimeout(() => {
        input.style.color = '';
        input.style.fontWeight = '';
      }, 400);

      // Enable update button
      const updateBtn = document.getElementById('fbUpdateCart');
      if (updateBtn) {
        updateBtn.style.background = 'var(--fb-green)';
        updateBtn.style.color = '#fff';
        updateBtn.classList.add('fb-pulse');
      }
    }

    if (btnMinus) {
      btnMinus.addEventListener('click', () => {
        updateQty(parseInt(input.value) - 1);
      });
    }
    if (btnPlus) {
      btnPlus.addEventListener('click', () => {
        updateQty(parseInt(input.value) + 1);
      });
    }
    input.addEventListener('change', () => {
      updateQty(parseInt(input.value) || 1);
    });
  });

  // ─── APPLY COUPON — Loading state ────────────
  const applyBtn = document.getElementById('fbApplyCoupon');
  if (applyBtn) {
    applyBtn.closest('form')?.addEventListener('submit', function(e) {
      const name = document.activeElement?.getAttribute('name');
      if (name === 'apply_coupon') {
        const input = document.getElementById('coupon_code');
        if (!input?.value.trim()) {
          e.preventDefault();
          input.focus();
          input.style.borderColor = '#FC8181';
          input.style.boxShadow = '0 0 0 4px rgba(252,129,129,0.25)';
          setTimeout(() => {
            input.style.borderColor = '';
            input.style.boxShadow = '';
          }, 2000);
          return;
        }
        applyBtn.innerHTML = '<span class="fb-spinner"></span> Aplicando...';
        applyBtn.classList.add('loading');
      }
    });
  }

  // ─── UPDATE CART — Loading state ─────────────
  const updateBtn = document.getElementById('fbUpdateCart');
  if (updateBtn) {
    updateBtn.addEventListener('click', function() {
      this.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
             stroke-linejoin="round" style="animation:spin 0.6s linear infinite">
          <polyline points="23 4 23 10 17 10"/>
          <polyline points="1 20 1 14 7 14"/>
          <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/>
        </svg>
        Actualizando...
      `;
      this.classList.add('loading');
    });
  }

  // ─── REMOVE ITEM — Confirm ───────────────────
  document.querySelectorAll('.fb-remove-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
      const row = this.closest('.fb-cart-item');
      if (row) {
        row.style.transition = 'all 0.3s ease';
        row.style.opacity    = '0.4';
        row.style.transform  = 'translateX(20px)';
      }
    });
  });

  // ─── ANIMATE IN ──────────────────────────────
  const items = document.querySelectorAll('.fb-cart-item');
  items.forEach((item, i) => {
    item.style.opacity   = '0';
    item.style.transform = 'translateY(12px)';
    setTimeout(() => {
      item.style.transition = 'all 0.35s ease';
      item.style.opacity    = '1';
      item.style.transform  = 'translateY(0)';
    }, i * 80);
  });

})();
</script>