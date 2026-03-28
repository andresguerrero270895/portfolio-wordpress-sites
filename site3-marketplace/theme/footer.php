<?php
/**
 * FreshBite Theme — footer.php
 * Idioma: Español
 */
defined('ABSPATH') || exit;
?>

<!-- ============================================================
     SECCIÓN RESERVAS — PICKUP / DELIVERY
     ============================================================ -->
<section class="fb-reservation-section">
    <div class="fb-container">

        <div class="fb-reservation-inner">

            <!-- Texto izquierda -->
            <div class="fb-reservation-content">
                <span class="fb-label" style="color:var(--fb-white);opacity:0.8;">
                    Rápido y Fácil
                </span>
                <h2 style="color:var(--fb-white);margin-top:8px;">
                    Reserva tu Pedido<br>
                    <span style="color:var(--fb-accent);">Pickup o Delivery</span>
                </h2>
                <p style="color:rgba(255,255,255,0.7);margin-top:12px;font-size:1.05rem;">
                    Elige tu agricultor favorito, selecciona tus productos
                    y recógelos frescos del día o recíbelos en casa.
                    Sin sorpresas, sin demoras.
                </p>

                <div class="fb-reservation-features">
                    <div class="fb-res-feature">
                        <span class="fb-res-feature-icon">🌿</span>
                        <div>
                            <strong>100% Fresco</strong>
                            <span>Cosechado el mismo día</span>
                        </div>
                    </div>
                    <div class="fb-res-feature">
                        <span class="fb-res-feature-icon">⚡</span>
                        <div>
                            <strong>Confirmación Inmediata</strong>
                            <span>Recibe tu email al instante</span>
                        </div>
                    </div>
                    <div class="fb-res-feature">
                        <span class="fb-res-feature-icon">💯</span>
                        <div>
                            <strong>Sin Costo de Reserva</strong>
                            <span>Solo pagas tus productos</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario reserva -->
            <div class="fb-reservation-form-card">

                <h3 style="font-family:var(--fb-font);font-size:1.2rem;font-weight:700;color:var(--fb-dark);margin-bottom:24px;">
                    📅 Hacer una Reserva
                </h3>

                <form id="fb-reservation-form">

                    <div class="fb-form-row">
                        <div class="fb-form-group">
                            <label for="res-name">Nombre completo *</label>
                            <input type="text"
                                   id="res-name"
                                   name="name"
                                   placeholder="ej. María García"
                                   required>
                        </div>
                        <div class="fb-form-group">
                            <label for="res-email">Correo electrónico *</label>
                            <input type="email"
                                   id="res-email"
                                   name="email"
                                   placeholder="tu@correo.com"
                                   required>
                        </div>
                    </div>

                    <div class="fb-form-row">
                        <div class="fb-form-group">
                            <label for="res-phone">Teléfono</label>
                            <input type="tel"
                                   id="res-phone"
                                   name="phone"
                                   placeholder="(555) 000-0000">
                        </div>
                        <div class="fb-form-group">
                            <label for="res-vendor">Vendedor / Granja *</label>
                            <select id="res-vendor" name="vendor" required>
                                <option value="">Selecciona un vendedor</option>
                                <?php
                                $vendors = freshbite_get_vendors(20);
                                if ($vendors->have_posts()) :
                                    while ($vendors->have_posts()) :
                                        $vendors->the_post(); ?>
                                        <option value="<?php the_title(); ?>">
                                            <?php the_title(); ?>
                                        </option>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                else : ?>
                                    <option value="Green Valley Farm">🌾 Green Valley Farm</option>
                                    <option value="Artisan Bakes Co.">🍞 Artisan Bakes Co.</option>
                                    <option value="Happy Cow Dairy">🐄 Happy Cow Dairy</option>
                                    <option value="Blue Sky Apiaries">🍯 Blue Sky Apiaries</option>
                                    <option value="Sunrise Gardens">🍅 Sunrise Gardens</option>
                                    <option value="Sunny Side Farm">🥚 Sunny Side Farm</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Tipo de servicio -->
                    <div class="fb-form-group">
                        <label>Tipo de servicio *</label>
                        <div class="fb-service-type-grid">
                            <label class="fb-service-type-card">
                                <input type="radio"
                                       name="type"
                                       value="pickup"
                                       checked>
                                <div class="fb-service-type-content">
                                    <span class="fb-service-icon">🏪</span>
                                    <strong>Pickup</strong>
                                    <span>Recoge en la granja</span>
                                </div>
                            </label>
                            <label class="fb-service-type-card">
                                <input type="radio"
                                       name="type"
                                       value="delivery">
                                <div class="fb-service-type-content">
                                    <span class="fb-service-icon">🚚</span>
                                    <strong>Delivery</strong>
                                    <span>Te lo llevamos a casa</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="fb-form-row">
                        <div class="fb-form-group">
                            <label for="res-date">Fecha *</label>
                            <input type="date"
                                   id="res-date"
                                   name="date"
                                   min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                                   required>
                        </div>
                        <div class="fb-form-group">
                            <label for="res-time">Hora *</label>
                            <select id="res-time" name="time" required>
                                <option value="">Selecciona hora</option>
                                <option value="8:00am">8:00 am</option>
                                <option value="9:00am">9:00 am</option>
                                <option value="10:00am">10:00 am</option>
                                <option value="11:00am">11:00 am</option>
                                <option value="12:00pm">12:00 pm</option>
                                <option value="1:00pm">1:00 pm</option>
                                <option value="2:00pm">2:00 pm</option>
                                <option value="3:00pm">3:00 pm</option>
                                <option value="4:00pm">4:00 pm</option>
                                <option value="5:00pm">5:00 pm</option>
                            </select>
                        </div>
                    </div>

                    <div class="fb-form-group">
                        <label for="res-items">Productos que deseas</label>
                        <textarea id="res-items"
                                  name="items"
                                  rows="3"
                                  placeholder="ej. 2 lb manzanas orgánicas, 1 docena huevos, 1 pan de masa madre..."></textarea>
                    </div>

                    <div class="fb-form-group">
                        <label for="res-notes">Notas adicionales</label>
                        <input type="text"
                               id="res-notes"
                               name="notes"
                               placeholder="ej. Alergias, preferencias, instrucciones de entrega...">
                    </div>

                    <button type="submit"
                            class="fb-btn fb-btn-primary"
                            style="width:100%;justify-content:center;font-size:1rem;"
                            id="fb-res-submit">
                        📅 Confirmar Reserva
                    </button>

                    <p id="fb-reservation-msg"
                       style="text-align:center;margin-top:12px;font-size:0.9rem;min-height:24px;font-family:var(--fb-font);">
                    </p>

                </form>

            </div><!-- /.fb-reservation-form-card -->

        </div><!-- /.fb-reservation-inner -->

    </div><!-- /.fb-container -->
</section>

<!-- ============================================================
     NEWSLETTER
     ============================================================ -->
<section class="fb-newsletter">
    <div class="fb-container" style="position:relative;z-index:1;">

        <span class="fb-label"
              style="color:rgba(255,255,255,0.8);margin-bottom:16px;display:block;">
            Mantente al Día
        </span>

        <h2 style="color:var(--fb-white);margin-bottom:12px;">
            Recibe Ofertas Frescas Cada Semana
        </h2>

        <p style="color:rgba(255,255,255,0.85);font-size:1.05rem;margin-bottom:36px;">
            Únete a más de 50,000 amantes de la comida fresca. Recibe ofertas<br>
            exclusivas, alertas de nuevos vendedores y recetas de temporada.
        </p>

        <form id="fb-newsletter-form" class="fb-newsletter-form">
            <input
                type="email"
                name="email"
                placeholder="Ingresa tu correo electrónico..."
                required
                autocomplete="email"
            >
            <button type="submit">
                Suscribirme 🎉
            </button>
        </form>

        <p id="fb-newsletter-msg"
           style="margin-top:16px;font-size:0.9rem;min-height:24px;">
        </p>

        <p style="margin-top:16px;font-size:0.8rem;color:rgba(255,255,255,0.5);">
            Sin spam, nunca. Cancela cuando quieras. 🔒
        </p>

    </div>
</section>

<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="fb-footer">
    <div class="fb-container">
        <div class="fb-footer-grid">

            <!-- COL 1 — MARCA -->
            <div class="fb-footer-brand">

                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="fb-logo fb-footer-logo">
                    <div class="fb-logo-icon">🥬</div>
                    <span class="fb-logo-text">
                        Fresh<span>Bite</span>
                    </span>
                </a>

                <p>
                    El marketplace más fresco que conecta agricultores
                    locales, productores artesanales y amantes de la comida
                    desde 2020. Comida fresca, precios justos, personas reales.
                </p>

                <!-- Redes sociales -->
                <div class="fb-footer-socials">
                    <a href="#" class="fb-social-btn"
                       aria-label="Instagram" title="Instagram">📸</a>
                    <a href="#" class="fb-social-btn"
                       aria-label="Facebook" title="Facebook">👥</a>
                    <a href="#" class="fb-social-btn"
                       aria-label="Twitter" title="Twitter">🐦</a>
                    <a href="#" class="fb-social-btn"
                       aria-label="YouTube" title="YouTube">▶️</a>
                    <a href="#" class="fb-social-btn"
                       aria-label="Pinterest" title="Pinterest">📌</a>
                </div>

            </div><!-- /col 1 -->

            <!-- COL 2 — TIENDA -->
            <div>
                <h4 class="fb-footer-title">Tienda</h4>
                <ul class="fb-footer-links">
                    <li>
                        <a href="<?php echo esc_url(home_url('/tienda')); ?>">
                            Todos los Productos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/tienda/?orderby=popularity')); ?>">
                            Más Vendidos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/tienda/?orderby=date')); ?>">
                            Nuevos Productos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/tienda/?on_sale=1')); ?>">
                            En Oferta 🔥
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/tienda/?product_cat=organico')); ?>">
                            Orgánicos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/tienda/?product_cat=local')); ?>">
                            Granja Local
                        </a>
                    </li>
                    <?php if (class_exists('WooCommerce')) : ?>
                        <li>
                            <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
                                Mi Carrito 🛒
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div><!-- /col 2 -->

            <!-- COL 3 — VENDEDORES -->
            <div>
                <h4 class="fb-footer-title">Vendedores</h4>
                <ul class="fb-footer-links">
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendedores')); ?>">
                            Todos los Vendedores
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendedores/?tipo=granja')); ?>">
                            Granjas Locales
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendedores/?tipo=artesanal')); ?>">
                            Productores Artesanales
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendedores/?tipo=organico')); ?>">
                            Certificados Orgánicos
                        </a>
                    </li>
                    <?php if (class_exists('WeDevs_Dokan')) : ?>
                        <li>
                            <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>">
                                Conviértete en Vendedor
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(dokan_get_navigation_url()); ?>">
                                Panel de Vendedor
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo esc_url(home_url('/guia-vendedores')); ?>">
                            Guía para Vendedores
                        </a>
                    </li>
                </ul>
            </div><!-- /col 3 -->

            <!-- COL 4 — EMPRESA -->
            <div>
                <h4 class="fb-footer-title">Empresa</h4>
                <ul class="fb-footer-links">
                    <li>
                        <a href="<?php echo esc_url(home_url('/nosotros')); ?>">
                            Quiénes Somos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>">
                            Blog y Recetas
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/contacto')); ?>">
                            Contáctanos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/empleo')); ?>">
                            Trabaja con Nosotros
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/prensa')); ?>">
                            Prensa y Medios
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/sostenibilidad')); ?>">
                            Sostenibilidad 🌱
                        </a>
                    </li>
                </ul>
            </div><!-- /col 4 -->

            <!-- COL 5 — APP + CONFIANZA -->
            <div>
                <h4 class="fb-footer-title">Descarga la App</h4>

                <a href="#" class="fb-app-btn">
                    <span class="fb-app-btn-icon">🍎</span>
                    <span>
                        <span class="fb-app-btn-sub">Disponible en</span>
                        <span class="fb-app-btn-name">App Store</span>
                    </span>
                </a>

                <a href="#" class="fb-app-btn">
                    <span class="fb-app-btn-icon">▶️</span>
                    <span>
                        <span class="fb-app-btn-sub">Disponible en</span>
                        <span class="fb-app-btn-name">Google Play</span>
                    </span>
                </a>

                <!-- Medios de pago -->
                <div class="fb-trust-badges">
                    <h4 class="fb-footer-title" style="margin-top:24px;">
                        Métodos de Pago
                    </h4>
                    <div class="fb-payment-badges">
                        <span class="fb-payment-badge">💳 Visa</span>
                        <span class="fb-payment-badge">💳 MC</span>
                        <span class="fb-payment-badge">🅿️ PayPal</span>
                        <span class="fb-payment-badge">🍎 Pay</span>
                    </div>
                </div>

                <!-- Certificaciones -->
                <div class="fb-certifications" style="margin-top:20px;">
                    <span class="fb-cert-badge">🌿 USDA Orgánico</span>
                    <span class="fb-cert-badge">✅ SSL Seguro</span>
                </div>

            </div><!-- /col 5 -->

        </div><!-- /.fb-footer-grid -->

        <!-- PIE DEL FOOTER -->
        <div class="fb-footer-bottom">
            <p>
                © <?php echo date('Y'); ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   style="color:rgba(255,255,255,0.5);">
                    FreshBite Marketplace
                </a>.
                Todos los derechos reservados.
                Hecho con 🧡 para los amantes de la comida fresca.
            </p>

            <div class="fb-footer-bottom-links">
                <a href="<?php echo esc_url(home_url('/politica-privacidad')); ?>">
                    Política de Privacidad
                </a>
                <a href="<?php echo esc_url(home_url('/terminos-servicio')); ?>">
                    Términos de Servicio
                </a>
                <a href="<?php echo esc_url(home_url('/cookies')); ?>">
                    Cookies
                </a>
                <a href="<?php echo esc_url(home_url('/mapa-sitio')); ?>">
                    Mapa del Sitio
                </a>
            </div>
        </div><!-- /.fb-footer-bottom -->

    </div><!-- /.fb-container -->
</footer><!-- /.fb-footer -->

</div><!-- /#fb-page -->

<?php wp_footer(); ?>
</body>
</html>