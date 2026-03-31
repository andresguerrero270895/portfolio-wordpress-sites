<?php
/**
 * FreshBite Marketplace - Cart Page
 */
defined('ABSPATH') || exit;

$fb_sym      = html_entity_decode( get_woocommerce_currency_symbol(), ENT_QUOTES, 'UTF-8' );
$fb_decimals = (int) wc_get_price_decimals();
$fb_dec_sep  = wc_get_price_decimal_separator();
$fb_thou_sep = wc_get_price_thousand_separator();
?>
<style>
:root{
  --fb-green:#2D6A4F;--fb-gl:#52B788;--fb-gp:#D8F3DC;
  --fb-orange:#F4845F;--fb-od:#E06640;
  --fb-cream:#FEFAE0;--fb-text:#1B2D23;--fb-muted:#6B7C6E;
  --fb-border:#D1E8D6;--fb-white:#fff;
  --fb-shadow:0 4px 24px rgba(45,106,79,.10);
  --fb-r:16px;--fb-rs:10px;
}
.fb-cart-page{background:var(--fb-cream);min-height:80vh;padding:40px 0 80px;font-family:'Inter','Segoe UI',sans-serif;}
.fb-wrap{max-width:1100px;margin:0 auto;padding:0 24px;}
.fb-cart-title{font-size:clamp(1.5rem,3vw,2rem);font-weight:700;color:var(--fb-green);margin-bottom:6px;display:flex;align-items:center;gap:10px;}
.fb-cart-title svg{width:28px;height:28px;flex-shrink:0;}
.fb-cart-sub{color:var(--fb-muted);margin-bottom:28px;font-size:.9rem;}
.fb-grid{display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;}
@media(max-width:900px){.fb-grid{grid-template-columns:1fr;}}
.fb-main{background:var(--fb-white);border-radius:var(--fb-r);box-shadow:var(--fb-shadow);overflow:hidden;border:1px solid var(--fb-border);}

/* TABLE HEADER */
.fb-thead{display:flex;padding:13px 20px;background:var(--fb-green);color:#fff;font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.07em;align-items:center;gap:0;}
.fb-th-img  {width:72px;flex-shrink:0;}
.fb-th-name {flex:1;}
.fb-th-price{width:90px;text-align:center;flex-shrink:0;}
.fb-th-qty  {width:130px;text-align:center;flex-shrink:0;}
.fb-th-sub  {width:90px;text-align:right;flex-shrink:0;}
.fb-th-del  {width:48px;flex-shrink:0;}
@media(max-width:640px){.fb-thead{display:none;}}

/* ROW */
.fb-row{display:flex;align-items:center;padding:14px 20px;border-bottom:1px solid var(--fb-border);transition:background .2s;gap:0;flex-wrap:nowrap;overflow:hidden;}
.fb-row:last-child{border-bottom:none;}
.fb-row:hover{background:#f7fdf8;}
.fb-row > .fb-c-img  {width:72px;flex-shrink:0;}
.fb-row > .fb-c-info {flex:1;min-width:0;overflow:hidden;padding-right:8px;}
.fb-row > .fb-c-price{width:90px;text-align:center;flex-shrink:0;}
.fb-row > .fb-c-qty  {width:130px;text-align:center;flex-shrink:0;}
.fb-row > .fb-c-sub  {width:90px;text-align:right;flex-shrink:0;}
.fb-row > .fb-c-del  {width:48px;flex-shrink:0;display:flex;align-items:center;justify-content:center;}
@media(max-width:700px){
  .fb-row{flex-wrap:wrap;gap:8px;}
  .fb-row > .fb-c-img{width:56px;}
  .fb-row > .fb-c-info{flex:1;}
  .fb-row > .fb-c-price,.fb-row > .fb-c-qty,
  .fb-row > .fb-c-sub,.fb-row > .fb-c-del{width:auto;}
}

/* Thumbnail */
.fb-thumb{width:64px;height:64px;border-radius:var(--fb-rs);overflow:hidden;border:2px solid var(--fb-border);background:var(--fb-cream);display:flex;align-items:center;justify-content:center;}
.fb-thumb img{width:100%;height:100%;object-fit:cover;display:block;}
.fb-thumb span{font-size:1.6rem;line-height:1;}

/* Info */
.fb-pname{font-weight:600;color:var(--fb-text);font-size:.88rem;line-height:1.3;margin-bottom:3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.fb-pname a{color:inherit;text-decoration:none;}
.fb-pname a:hover{color:var(--fb-green);}
.fb-pmeta{font-size:.7rem;color:var(--fb-muted);}
.fb-uprice{font-weight:600;color:var(--fb-green);font-size:.9rem;}

/* Stepper */
.fb-stepper{display:inline-flex;align-items:center;border:2px solid var(--fb-border);border-radius:50px;background:var(--fb-cream);height:36px;overflow:hidden;}
button.fb-qbtn{all:unset!important;width:32px!important;height:32px!important;display:flex!important;align-items:center!important;justify-content:center!important;cursor:pointer!important;font-size:1.1rem!important;font-weight:700!important;color:var(--fb-green)!important;background:transparent!important;border:none!important;padding:0!important;margin:0!important;line-height:1!important;flex-shrink:0!important;transition:background .18s,color .18s!important;}
button.fb-qbtn:hover{background:var(--fb-green)!important;color:#fff!important;}
input.fb-qnum{all:unset!important;width:34px!important;text-align:center!important;font-size:.9rem!important;font-weight:700!important;color:var(--fb-text)!important;background:transparent!important;border:none!important;padding:0!important;-moz-appearance:textfield!important;}
input.fb-qnum::-webkit-outer-spin-button,input.fb-qnum::-webkit-inner-spin-button{-webkit-appearance:none!important;}

/* Subtotal fila */
.fb-isub{font-weight:700;color:var(--fb-orange);font-size:.92rem;}

/* Delete */
a.fb-del-btn{display:flex!important;align-items:center!important;justify-content:center!important;width:34px!important;height:34px!important;border-radius:50%!important;background:#FEF2F2!important;border:2px solid #FECACA!important;text-decoration:none!important;font-size:14px!important;line-height:1!important;transition:background .2s,transform .2s!important;cursor:pointer!important;box-sizing:border-box!important;flex-shrink:0!important;}
a.fb-del-btn:hover{background:#DC2626!important;border-color:#DC2626!important;transform:scale(1.1)!important;}

/* Actions */
.fb-actions{padding:20px;background:var(--fb-cream);border-top:1px solid var(--fb-border);}
.fb-ctog{display:inline-flex;align-items:center;gap:8px;cursor:pointer;font-size:.87rem;font-weight:600;color:var(--fb-green);user-select:none;padding:6px 0;transition:color .2s;}
.fb-ctog:hover{color:var(--fb-orange);}
.fb-ctog svg.chev{width:15px;height:15px;transition:transform .3s;}
.fb-ctog.open svg.chev{transform:rotate(180deg);}
.fb-cfrm{display:none;margin-top:12px;gap:10px;flex-wrap:wrap;align-items:center;}
.fb-cfrm.show{display:flex;animation:fbSlide .22s ease;}
@keyframes fbSlide{from{opacity:0;transform:translateY(-5px)}to{opacity:1;transform:translateY(0)}}
.fb-cwrap{flex:1;min-width:180px;position:relative;}
.fb-cinput{width:100%;padding:11px 14px 11px 38px;border:2px solid var(--fb-border);border-radius:50px;font-size:.86rem;color:var(--fb-text);background:#fff;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;}
.fb-cinput:focus{border-color:var(--fb-gl);box-shadow:0 0 0 3px rgba(82,183,136,.15);}
.fb-cinput::placeholder{color:#aab8ad;}
.fb-cico{position:absolute;left:13px;top:50%;transform:translateY(-50%);font-size:.87rem;pointer-events:none;}
.fb-btn-apply{padding:11px 22px;background:var(--fb-green);color:#fff;border:none;border-radius:50px;font-size:.86rem;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;gap:6px;white-space:nowrap;transition:all .2s;}
.fb-btn-apply:hover{background:var(--fb-gl);}
.fb-btn-update{display:inline-flex;align-items:center;gap:8px;padding:10px 20px;background:transparent;color:var(--fb-green);border:2px solid var(--fb-green);border-radius:50px;font-size:.84rem;font-weight:600;cursor:pointer;transition:all .2s;margin-top:12px;white-space:nowrap;}
.fb-btn-update:hover{background:var(--fb-green);color:#fff;}
.fb-btn-update svg{width:14px;height:14px;transition:transform .4s;}
.fb-btn-update:hover svg{transform:rotate(360deg);}
.fb-continue{display:inline-flex;align-items:center;gap:7px;color:var(--fb-orange);text-decoration:none;font-size:.86rem;font-weight:600;padding:8px 0;margin-top:6px;transition:all .2s;border-bottom:2px solid transparent;}
.fb-continue:hover{color:var(--fb-od);border-bottom-color:var(--fb-orange);}
.fb-continue svg{width:13px;height:13px;}

/* Sidebar */
.fb-sidebar{position:sticky;top:24px;}
.fb-scard{background:var(--fb-white);border-radius:var(--fb-r);box-shadow:var(--fb-shadow);overflow:hidden;border:1px solid var(--fb-border);}
.fb-shead{background:var(--fb-green);padding:17px 22px;color:#fff;}
.fb-shead h3{font-size:.97rem;font-weight:700;margin:0;display:flex;align-items:center;gap:8px;}
.fb-sbody{padding:20px;}
.fb-srow{display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px dashed var(--fb-border);font-size:.87rem;}
.fb-srow:last-of-type{border-bottom:none;}
.fb-srow .l{color:var(--fb-muted);font-weight:500;}
.fb-srow .v{font-weight:600;color:var(--fb-text);}
.fb-stotal{display:flex;justify-content:space-between;align-items:center;padding:13px 0 0;margin-top:6px;border-top:2px solid var(--fb-gp);}
.fb-stotal .l{font-size:.92rem;font-weight:700;color:var(--fb-text);}
.fb-stotal .v{font-size:1.3rem;font-weight:800;color:var(--fb-green);}
.fb-trust{display:flex;flex-direction:column;gap:7px;margin:16px 0;padding:13px;background:var(--fb-cream);border-radius:var(--fb-rs);}
.fb-ti{display:flex;align-items:center;gap:8px;font-size:.79rem;color:var(--fb-muted);font-weight:500;}
.fb-ti svg{width:13px;height:13px;color:var(--fb-gl);flex-shrink:0;}
.fb-btn-co{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:14px 20px;background:linear-gradient(135deg,var(--fb-orange),var(--fb-od));color:#fff;border:none;border-radius:50px;font-size:.95rem;font-weight:700;cursor:pointer;text-decoration:none;transition:all .25s;box-shadow:0 4px 16px rgba(244,132,95,.36);margin-bottom:12px;}
.fb-btn-co:hover{transform:translateY(-2px);color:#fff;}
.fb-pay{display:flex;align-items:center;justify-content:center;gap:7px;padding-top:10px;border-top:1px solid var(--fb-border);flex-wrap:wrap;}
.fb-pay-l{font-size:.7rem;color:var(--fb-muted);width:100%;text-align:center;margin-bottom:2px;}
.fb-badge{display:inline-flex;align-items:center;gap:3px;padding:4px 10px;border-radius:5px;font-size:.7rem;font-weight:700;letter-spacing:.04em;border:1.5px solid;}
.fb-badge.visa{background:#1A1F71;color:#fff;border-color:#1A1F71;}
.fb-badge.mc{background:#fff;color:#333;border-color:#ddd;}
.fb-badge.pp{background:#003087;color:#009CDE;border-color:#003087;}

/* Empty */
.fb-empty{text-align:center;padding:70px 24px;background:var(--fb-white);border-radius:var(--fb-r);box-shadow:var(--fb-shadow);border:1px solid var(--fb-border);max-width:500px;margin:0 auto;}
.fb-empty-ico{font-size:4rem;display:block;margin-bottom:16px;animation:fbWob 2.5s ease infinite;}
@keyframes fbWob{0%,100%{transform:rotate(-8deg)}50%{transform:rotate(8deg)}}
.fb-empty h3{color:var(--fb-green);font-size:1.4rem;font-weight:700;margin-bottom:8px;}
.fb-empty p{color:var(--fb-muted);margin-bottom:26px;font-size:.9rem;line-height:1.6;}
.fb-empty-btns{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;}
.fb-btn-shop{display:inline-flex;align-items:center;gap:7px;padding:12px 26px;background:var(--fb-green);color:#fff;border-radius:50px;font-weight:700;text-decoration:none;transition:all .25s;font-size:.9rem;}
.fb-btn-shop:hover{background:var(--fb-gl);transform:translateY(-2px);color:#fff;}
.fb-btn-home{display:inline-flex;align-items:center;gap:7px;padding:12px 20px;background:transparent;color:var(--fb-orange);border:2px solid var(--fb-orange);border-radius:50px;font-weight:600;text-decoration:none;transition:all .25s;font-size:.87rem;}
.fb-btn-home:hover{background:var(--fb-orange);color:#fff;}
.fb-chips{display:flex;flex-wrap:wrap;gap:7px;justify-content:center;margin-top:28px;}
.fb-chip{padding:6px 13px;background:var(--fb-cream);border:1.5px solid var(--fb-border);border-radius:50px;font-size:.78rem;color:var(--fb-green);font-weight:600;text-decoration:none;transition:all .18s;}
.fb-chip:hover{background:var(--fb-green);color:#fff;border-color:var(--fb-green);}

/* WC notices */
.fb-cart-page .woocommerce-notices-wrapper{margin-bottom:18px;}
.fb-cart-page .woocommerce-message,.fb-cart-page .woocommerce-info{all:unset;display:flex!important;align-items:center;gap:10px;padding:12px 18px!important;background:var(--fb-gp)!important;color:#1E5631!important;border-left:4px solid var(--fb-gl)!important;border-radius:var(--fb-rs)!important;font-size:.86rem!important;font-family:'Inter',sans-serif!important;margin-bottom:12px!important;}
.fb-cart-page .woocommerce-message a{margin-left:auto!important;color:var(--fb-green)!important;font-weight:700!important;background:rgba(45,106,79,.12)!important;padding:3px 11px!important;border-radius:50px!important;font-size:.78rem!important;text-decoration:none!important;}
.fb-cart-page p.cart-empty,.fb-cart-page .return-to-shop{display:none!important;}
.fb-spin{width:14px;height:14px;border:2px solid rgba(255,255,255,.4);border-top-color:#fff;border-radius:50%;animation:fbSpin .5s linear infinite;display:inline-block;vertical-align:middle;}
@keyframes fbSpin{to{transform:rotate(360deg)}}
.fb-loading{opacity:.65;pointer-events:none;}
</style>

<div class="fb-cart-page">
<div class="fb-wrap">

  <?php wc_print_notices(); ?>

  <?php if ( WC()->cart->is_empty() ) : ?>

    <div class="fb-empty">
      <span class="fb-empty-ico">🛒</span>
      <h3>Tu carrito está vacío</h3>
      <p>Descubre productos frescos y orgánicos<br>de nuestros productores locales.</p>
      <div class="fb-empty-btns">
        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="fb-btn-shop">🛍️ Explorar productos</a>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="fb-btn-home">🏠 Inicio</a>
      </div>
      <?php
      $cats     = get_terms(['taxonomy'=>'product_cat','hide_empty'=>true,'number'=>6,'orderby'=>'count','order'=>'DESC','exclude'=>[get_option('default_product_cat')]]);
      $fallback = ['🥑 Aguacates','🫐 Berries','🥦 Verduras','🍯 Miel','🌿 Hierbas','🧀 Lácteos'];
      $items    = (!empty($cats)&&!is_wp_error($cats)) ? $cats : $fallback;
      ?>
      <div class="fb-chips">
        <?php foreach($items as $c):
          $url  = is_object($c) ? get_term_link($c)  : wc_get_page_permalink('shop');
          $name = is_object($c) ? esc_html($c->name) : $c;
        ?>
        <a href="<?php echo esc_url($url); ?>" class="fb-chip"><?php echo $name; ?></a>
        <?php endforeach; ?>
      </div>
    </div>

  <?php else : ?>

    <h1 class="fb-cart-title">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
        <path d="M1 1h4l2.68 13.39a2 2 0 001.99 1.61H19.4a2 2 0 001.98-1.73l1.1-8.27H6"/>
      </svg>
      Mi Carrito
    </h1>
    <p class="fb-cart-sub">
      <?php
      $n = WC()->cart->get_cart_contents_count();
      echo $n === 1 ? "1 producto en tu pedido" : "{$n} productos en tu pedido";
      ?>
    </p>

    <form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post" class="fb-grid" id="fbCartForm">

      <div class="fb-main">

        <div class="fb-thead">
          <div class="fb-th-img"></div>
          <div class="fb-th-name">Producto</div>
          <div class="fb-th-price">Precio</div>
          <div class="fb-th-qty">Cantidad</div>
          <div class="fb-th-sub">Total</div>
          <div class="fb-th-del"></div>
        </div>

        <?php
        foreach ( WC()->cart->get_cart() as $key => $item ):
          $_p  = apply_filters('woocommerce_cart_item_product', $item['data'], $item, $key);
          $pid = apply_filters('woocommerce_cart_item_product_id', $item['product_id'], $item, $key);
          if(!$_p||!$_p->exists()||$item['quantity']<=0) continue;
          if(!apply_filters('woocommerce_cart_item_visible',true,$item,$key)) continue;

          $link       = apply_filters('woocommerce_cart_item_permalink', $_p->is_visible()?$_p->get_permalink($item):'', $item, $key);
          $thumb      = apply_filters('woocommerce_cart_item_thumbnail', $_p->get_image([64,64]), $item, $key);
          $price_html = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_p), $item, $key);

          // Precio exacto que WC usa internamente — igual al que usa para calcular totales
          $unit_price = (float) wc_get_price_to_display( $_p );

          // String limpio para data-unit con decimales exactos de WC
          $unit_price_str = number_format( $unit_price, $fb_decimals, '.', '' );

          $qty     = (int) $item['quantity'];
          $del_url = esc_url( wc_get_cart_remove_url($key) );
        ?>
        <div class="fb-row" data-key="<?php echo esc_attr($key); ?>">

          <div class="fb-c-img">
            <div class="fb-thumb">
              <?php echo $thumb ?: '<span>🥦</span>'; ?>
            </div>
          </div>

          <div class="fb-c-info">
            <div class="fb-pname">
              <?php if($link): ?>
                <a href="<?php echo esc_url($link); ?>"><?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name',$_p->get_name(),$item,$key)); ?></a>
              <?php else: echo wp_kses_post(apply_filters('woocommerce_cart_item_name',$_p->get_name(),$item,$key)); endif; ?>
            </div>
            <?php echo wc_get_formatted_cart_item_data($item); ?>
            <div class="fb-pmeta">SKU: <?php echo esc_html($_p->get_sku()?:'FB-'.$pid); ?></div>
          </div>

          <div class="fb-c-price fb-uprice"><?php echo $price_html; ?></div>

          <div class="fb-c-qty">
            <div class="fb-stepper">
              <button type="button" class="fb-qbtn fb-minus" aria-label="Menos">−</button>
              <input
                type="number"
                class="fb-qnum input-text qty"
                name="cart[<?php echo esc_attr($key); ?>][qty]"
                value="<?php echo esc_attr($qty); ?>"
                min="0" max="99" step="1"
                data-unit="<?php echo esc_attr($unit_price_str); ?>"
              />
              <button type="button" class="fb-qbtn fb-plus" aria-label="Más">+</button>
            </div>
          </div>

          <div class="fb-c-sub fb-isub" data-isub>
            <?php echo wc_price( $unit_price * $qty ); ?>
          </div>

          <div class="fb-c-del">
            <a href="<?php echo $del_url; ?>"
               class="fb-del-btn"
               aria-label="Eliminar producto"
               data-product_id="<?php echo esc_attr($pid); ?>">🗑️</a>
          </div>

        </div>
        <?php endforeach; ?>

        <div class="fb-actions">

          <?php if(wc_coupons_enabled()): ?>
          <div class="fb-ctog" id="fbCtog" role="button" tabindex="0" aria-expanded="false">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
              <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
              <line x1="7" y1="7" x2="7.01" y2="7"/>
            </svg>
            ¿Tienes un cupón de descuento?
            <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="15" height="15">
              <polyline points="6 9 12 15 18 9"/>
            </svg>
          </div>
          <div class="fb-cfrm" id="fbCfrm">
            <div class="fb-cwrap">
              <span class="fb-cico">🏷️</span>
              <input type="text" name="coupon_code" id="coupon_code"
                     class="fb-cinput" placeholder="Ingresa tu código..."
                     autocomplete="off" value=""/>
            </div>
            <button type="submit" name="apply_coupon" value="Aplicar cupón"
                    class="fb-btn-apply" id="fbApply">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="13" height="13">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              Aplicar
            </button>
          </div>
          <?php endif; ?>

          <button type="submit" name="update_cart" value="1" class="fb-btn-update" id="fbUpdate">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="23 4 23 10 17 10"/>
              <polyline points="1 20 1 14 7 14"/>
              <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15"/>
            </svg>
            Actualizar carrito
          </button>

          <br>

          <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="fb-continue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="15 18 9 12 15 6"/>
            </svg>
            Seguir comprando
          </a>

        </div>
      </div><!-- /fb-main -->

      <!-- SIDEBAR -->
      <div class="fb-sidebar">
        <div class="fb-scard">
          <div class="fb-shead">
            <h3>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="17" height="17">
                <rect x="1" y="4" width="22" height="16" rx="2"/>
                <line x1="1" y1="10" x2="23" y2="10"/>
              </svg>
              Resumen del pedido
            </h3>
          </div>
          <div class="fb-sbody">

            <div class="fb-srow">
              <span class="l">Subtotal</span>
              <span class="v" id="fbSubtotal"><?php wc_cart_totals_subtotal_html(); ?></span>
            </div>

            <?php foreach(WC()->cart->get_coupons() as $code=>$coupon): ?>
            <div class="fb-srow">
              <span class="l">🏷️ <?php echo esc_html(strtoupper($code)); ?>
                <a href="<?php echo esc_url(add_query_arg('remove_coupon',urlencode($code),wc_get_cart_url())); ?>"
                   style="font-size:.7rem;color:#E53E3E;margin-left:5px;font-weight:400;">✕ Quitar</a>
              </span>
              <span class="v">−<?php wc_cart_totals_coupon_html($coupon); ?></span>
            </div>
            <?php endforeach; ?>

            <?php if(WC()->cart->needs_shipping()&&WC()->cart->show_shipping()): ?>
            <div class="fb-srow">
              <span class="l">Envío</span>
              <span class="v"><?php woocommerce_cart_totals_shipping_html(); ?></span>
            </div>
            <?php endif; ?>

            <?php foreach(WC()->cart->get_fees() as $fee): ?>
            <div class="fb-srow">
              <span class="l"><?php echo esc_html($fee->name); ?></span>
              <span class="v"><?php echo wc_price($fee->total); ?></span>
            </div>
            <?php endforeach; ?>

            <?php if(wc_tax_enabled()&&!WC()->cart->display_prices_including_tax()): ?>
            <div class="fb-srow">
              <span class="l">Impuestos</span>
              <span class="v"><?php wc_cart_totals_taxes_total_html(); ?></span>
            </div>
            <?php endif; ?>

            <div class="fb-stotal">
              <span class="l">Total</span>
              <span class="v" id="fbTotal"><?php wc_cart_totals_order_total_html(); ?></span>
            </div>

            <div class="fb-trust">
              <div class="fb-ti">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                Pago 100% seguro
              </div>
              <div class="fb-ti">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Garantía de frescura
              </div>
              <div class="fb-ti">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h5l3 3v5h-8V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                Entrega en 24-48 h
              </div>
            </div>

            <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="fb-btn-co">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              Finalizar pedido
            </a>

            <div class="fb-pay">
              <span class="fb-pay-l">Métodos de pago aceptados</span>
              <span class="fb-badge visa">VISA</span>
              <span class="fb-badge mc">
                <span style="color:#EB001B;font-size:.9rem;line-height:1;">●</span>
                <span style="color:#F79E1B;font-size:.9rem;line-height:1;margin-left:-5px;">●</span>
                MC
              </span>
              <span class="fb-badge pp">PayPal</span>
            </div>

          </div>
        </div>
      </div><!-- /sidebar -->

      <?php wp_nonce_field('woocommerce-cart','woocommerce-cart-nonce'); ?>

    </form>

  <?php endif; ?>

</div>
</div>

<script>
(function(){
'use strict';

/* ── CONFIG desde PHP ── */
var SYM      = <?php echo json_encode( $fb_sym ); ?>;
var DEC      = <?php echo (int) wc_get_price_decimals(); ?>;
var DEC_SEP  = <?php echo json_encode( wc_get_price_decimal_separator() ); ?>;
var THOU_SEP = <?php echo json_encode( wc_get_price_thousand_separator() ); ?>;

/* ── Formatear igual que WooCommerce ── */
function fmt(n){
  var num = parseFloat(n);
  if(isNaN(num)) num = 0;

  var fixed    = num.toFixed(DEC);
  var parts    = fixed.split('.');
  var intPart  = parts[0];
  var decPart  = parts.length > 1 ? parts[1] : '';

  /* separador de miles */
  if(THOU_SEP !== ''){
    intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, THOU_SEP);
  }

  var result = DEC > 0 ? intPart + DEC_SEP + decPart : intPart;
  return SYM + result;
}

/* ── Recalcular todos los totales ── */
function updateAll(){
  var grand = 0;
  var rows  = document.querySelectorAll('.fb-row');

  for(var i = 0; i < rows.length; i++){
    var inp  = rows[i].querySelector('.fb-qnum');
    var isub = rows[i].querySelector('[data-isub]');
    if(!inp) continue;

    var unit = parseFloat(inp.getAttribute('data-unit'));
    var qty  = parseInt(inp.value, 10);

    if(isNaN(unit) || isNaN(qty) || qty < 0) continue;

    var sub = unit * qty;
    grand  += sub;

    if(isub){
      isub.textContent = fmt(sub);
      isub.style.color = '#F4845F';
      clearTimeout(isub._t);
      isub._t = (function(el){
        return setTimeout(function(){ el.style.color = ''; }, 400);
      })(isub);
    }
  }

  var elS = document.getElementById('fbSubtotal');
  var elT = document.getElementById('fbTotal');
  if(elS) elS.textContent = fmt(grand);
  if(elT) elT.textContent = fmt(grand);
}

/* ── Stepper +/- ── */
var rows = document.querySelectorAll('.fb-row');
for(var i = 0; i < rows.length; i++){
  (function(row){
    var inp  = row.querySelector('.fb-qnum');
    var btnM = row.querySelector('.fb-minus');
    var btnP = row.querySelector('.fb-plus');
    if(!inp) return;

    if(btnM){
      btnM.addEventListener('click', function(){
        var v = parseInt(inp.value, 10);
        if(isNaN(v)) v = 1;
        if(v > 0) inp.value = v - 1;
        updateAll();
      });
    }

    if(btnP){
      btnP.addEventListener('click', function(){
        var v = parseInt(inp.value, 10);
        if(isNaN(v)) v = 0;
        inp.value = v + 1;
        updateAll();
      });
    }

    inp.addEventListener('change', function(){
      var v = parseInt(inp.value, 10);
      if(isNaN(v) || v < 0) inp.value = 0;
      updateAll();
    });

  })(rows[i]);
}

/* ── Delete ── */
var dels = document.querySelectorAll('.fb-del-btn');
for(var d = 0; d < dels.length; d++){
  dels[d].addEventListener('click', function(e){
    e.preventDefault();
    var url = this.getAttribute('href');
    if(!url) return;
    var row = this.closest('.fb-row');
    if(row){
      row.style.transition = 'opacity .25s, transform .25s';
      row.style.opacity    = '0';
      row.style.transform  = 'translateX(20px)';
      setTimeout(function(){ window.location.href = url; }, 270);
    } else {
      window.location.href = url;
    }
  });
}

/* ── Coupon accordion ── */
var ctog = document.getElementById('fbCtog');
var cfrm = document.getElementById('fbCfrm');
if(ctog && cfrm){
  ctog.addEventListener('click', function(){
    var open = cfrm.classList.toggle('show');
    ctog.classList.toggle('open', open);
    ctog.setAttribute('aria-expanded', String(open));
  });
}

/* ── Apply coupon loading ── */
var applyBtn = document.getElementById('fbApply');
if(applyBtn){
  applyBtn.addEventListener('click', function(){
    var c = document.getElementById('coupon_code');
    if(!c || !c.value.trim()){
      if(c){ c.focus(); c.style.borderColor = '#FC8181'; setTimeout(function(){ c.style.borderColor = ''; }, 2000); }
      return;
    }
    this.innerHTML = '<span class="fb-spin"></span> Aplicando...';
    this.classList.add('fb-loading');
  });
}

/* ── Update cart loading ── */
var updBtn = document.getElementById('fbUpdate');
if(updBtn){
  updBtn.addEventListener('click', function(){
    this.innerHTML = '<span class="fb-spin"></span> Actualizando...';
    this.classList.add('fb-loading');
  });
}

/* ── Animate rows in ── */
var allRows = document.querySelectorAll('.fb-row');
for(var r = 0; r < allRows.length; r++){
  (function(el, idx){
    el.style.opacity   = '0';
    el.style.transform = 'translateY(8px)';
    setTimeout(function(){
      el.style.transition = 'opacity .3s ease, transform .3s ease';
      el.style.opacity    = '1';
      el.style.transform  = 'translateY(0)';
    }, idx * 70);
  })(allRows[r], r);
}

})();
</script>