<?php
/**
 * Template Name: Contacto — FreshBite
 *
 * FreshBite Theme — page-contact.php
 * Página: Contacto
 *
 * @package FreshBite
 */
defined('ABSPATH') || exit;
get_header();
?>

<!-- ============================================================
     HERO — CONTACTO
     ============================================================ -->
<section style="background:linear-gradient(135deg,var(--fb-bg-2),var(--fb-bg-3));
                padding:64px 0;border-bottom:1px solid var(--fb-border-gray);">
    <div class="fb-container">
        <div style="text-align:center;max-width:600px;margin:0 auto;">
            <span class="fb-label">Estamos Aquí</span>
            <h1 style="margin-top:12px;margin-bottom:16px;">
                ¿Cómo Podemos<br>
                <span style="color:var(--fb-primary);">Ayudarte?</span>
            </h1>
            <p style="font-size:1.1rem;color:var(--fb-gray-400);
                       font-family:var(--fb-font);line-height:1.7;">
                Nuestro equipo está disponible de lunes a viernes de 8am a 6pm.
                Respondemos todos los mensajes en menos de 24 horas.
            </p>
        </div>

        <!-- Breadcrumb -->
        <div class="fb-breadcrumb" style="justify-content:center;margin-top:24px;">
            <a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
            <span>›</span>
            <span>Contacto</span>
        </div>

    </div>
</section>

<!-- ============================================================
     TARJETAS DE CONTACTO RÁPIDO
     ============================================================ -->
<section style="background:var(--fb-white);padding:48px 0;
                border-bottom:1px solid var(--fb-border-gray);">
    <div class="fb-container">
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
            <?php
            $contactos = [
                [
                    '📧',
                    'Correo Electrónico',
                    'hola@freshbite.com',
                    'Respuesta en menos de 24h',
                    'mailto:hola@freshbite.com',
                    'var(--fb-primary)',
                ],
                [
                    '📞',
                    'Teléfono',
                    '(800) 555-0199',
                    'Lun–Vie 8am–6pm EST',
                    'tel:+18005550199',
                    'var(--fb-secondary)',
                ],
                [
                    '💬',
                    'Chat en Vivo',
                    'Chat disponible',
                    'Tiempo real en horario laboral',
                    '#fb-chat',
                    'var(--fb-accent)',
                ],
                [
                    '🏪',
                    'Para Vendedores',
                    'vendedores@freshbite.com',
                    'Soporte dedicado para granjas',
                    'mailto:vendedores@freshbite.com',
                    'var(--fb-primary)',
                ],
            ];
            foreach ($contactos as [$icon, $titulo, $valor, $sub, $url, $color]) :
            ?>
                <a href="<?php echo esc_attr($url); ?>"
                   class="fb-contact-quick-card">
                    <div class="fb-contact-quick-icon"
                         style="background:<?php echo $color; ?>15;
                                color:<?php echo $color; ?>;">
                        <?php echo $icon; ?>
                    </div>
                    <h4><?php echo esc_html($titulo); ?></h4>
                    <strong><?php echo esc_html($valor); ?></strong>
                    <span><?php echo esc_html($sub); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     LAYOUT PRINCIPAL — FORMULARIO + SIDEBAR
     ============================================================ -->
<section style="background:var(--fb-bg);">
    <div class="fb-container">
        <div class="fb-contact-layout">

            <!-- ── SIDEBAR ─────────────────────────────────── -->
            <aside>

                <!-- Horarios -->
                <div class="fb-contact-info-card">
                    <h4 class="fb-contact-info-title">
                        🕐 Horarios de Atención
                    </h4>
                    <ul class="fb-schedule-list">
                        <?php
                        $horarios = [
                            ['Lunes – Viernes',  '8:00am – 6:00pm EST', true],
                            ['Sábados',          '9:00am – 2:00pm EST', true],
                            ['Domingos',         'Cerrado',             false],
                        ];
                        foreach ($horarios as [$dia, $hora, $abierto]) :
                        ?>
                            <li class="fb-schedule-item">
                                <span><?php echo esc_html($dia); ?></span>
                                <span style="color:<?php echo $abierto
                                    ? 'var(--fb-secondary)'
                                    : 'var(--fb-gray-300)'; ?>;
                                    font-weight:600;font-family:var(--fb-font);
                                    font-size:0.85rem;">
                                    <?php echo esc_html($hora); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div style="margin-top:16px;padding:12px;
                                background:rgba(34,197,94,0.08);
                                border-radius:var(--fb-radius-sm);
                                border:1px solid rgba(34,197,94,0.2);
                                display:flex;align-items:center;gap:8px;">
                        <span>🟢</span>
                        <span style="font-size:0.82rem;color:var(--fb-secondary);
                                     font-family:var(--fb-font);font-weight:600;">
                            Ahora estamos disponibles
                        </span>
                    </div>
                </div>

                <!-- Preguntas frecuentes -->
                <div class="fb-contact-info-card">
                    <h4 class="fb-contact-info-title">
                        ❓ Preguntas Frecuentes
                    </h4>
                    <div class="fb-faq-list">
                        <?php
                        $faqs = [
                            [
                                '¿Cuándo llega mi pedido?',
                                'Pedidos antes de las 11am se entregan el mismo día en áreas metropolitanas. Resto del país: 1-3 días hábiles.',
                            ],
                            [
                                '¿Cómo sé que es orgánico?',
                                'Todos nuestros vendedores certificados muestran su número de certificación USDA en su perfil.',
                            ],
                            [
                                '¿Puedo devolver un producto?',
                                'Sí. Garantía de frescura total. Si no estás satisfecho, te devolvemos el dinero en 24h.',
                            ],
                            [
                                '¿Cómo me convierto en vendedor?',
                                'Regístrate como vendedor, completa tu perfil y pasa nuestro proceso de verificación. Es gratis.',
                            ],
                        ];
                        foreach ($faqs as [$pregunta, $respuesta]) :
                        ?>
                            <div class="fb-faq-item">
                                <button class="fb-faq-question">
                                    <span><?php echo esc_html($pregunta); ?></span>
                                    <span class="fb-faq-arrow">›</span>
                                </button>
                                <div class="fb-faq-answer">
                                    <p><?php echo esc_html($respuesta); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?php echo esc_url(home_url('/ayuda')); ?>"
                       class="fb-btn fb-btn-outline fb-btn-sm"
                       style="width:100%;justify-content:center;margin-top:16px;">
                        Ver Todas las Preguntas →
                    </a>
                </div>

                <!-- Redes sociales -->
                <div class="fb-contact-info-card">
                    <h4 class="fb-contact-info-title">
                        📱 Síguenos
                    </h4>
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        <?php
                        $redes = [
                            ['📸', 'Instagram',  '@freshbite_usa',  '#', 'rgba(225,48,108,0.08)',  'rgba(225,48,108,0.6)'],
                            ['👥', 'Facebook',   'FreshBite USA',   '#', 'rgba(24,119,242,0.08)',   'rgba(24,119,242,0.6)'],
                            ['🐦', 'Twitter/X',  '@freshbite',      '#', 'rgba(29,161,242,0.08)',   'rgba(29,161,242,0.6)'],
                            ['▶️', 'YouTube',    'FreshBite Channel','#','rgba(255,0,0,0.08)',      'rgba(255,0,0,0.5)'],
                        ];
                        foreach ($redes as [$icon, $red, $handle, $url, $bg, $color]) :
                        ?>
                            <a href="<?php echo esc_url($url); ?>"
                               style="display:flex;align-items:center;gap:12px;
                                      padding:10px 14px;
                                      background:<?php echo $bg; ?>;
                                      border-radius:var(--fb-radius-sm);
                                      text-decoration:none;
                                      transition:var(--fb-transition);"
                               class="fb-social-link">
                                <span style="font-size:1.2rem;"><?php echo $icon; ?></span>
                                <div>
                                    <span style="display:block;font-size:0.85rem;
                                                 font-weight:600;color:var(--fb-dark);
                                                 font-family:var(--fb-font);">
                                        <?php echo esc_html($red); ?>
                                    </span>
                                    <span style="display:block;font-size:0.75rem;
                                                 color:<?php echo $color; ?>;
                                                 font-family:var(--fb-font);">
                                        <?php echo esc_html($handle); ?>
                                    </span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            </aside>

            <!-- ── FORMULARIO PRINCIPAL ───────────────────── -->
            <div class="fb-contact-form-card">

                <div style="margin-bottom:28px;">
                    <h2 style="font-family:var(--fb-font);font-size:1.4rem;
                                font-weight:700;color:var(--fb-dark);
                                margin-bottom:8px;">
                        ✉️ Envíanos un Mensaje
                    </h2>
                    <p style="color:var(--fb-gray-400);font-family:var(--fb-font);
                               font-size:0.9rem;">
                        Completa el formulario y te responderemos en menos de 24 horas.
                    </p>
                </div>

                <form id="fb-contact-form">

                    <!-- Fila 1 -->
                    <div class="fb-form-row">
                        <div class="fb-form-group">
                            <label for="contact-name">
                                Nombre completo *
                            </label>
                            <input type="text"
                                   id="contact-name"
                                   name="name"
                                   placeholder="ej. María García"
                                   required>
                        </div>
                        <div class="fb-form-group">
                            <label for="contact-email">
                                Correo electrónico *
                            </label>
                            <input type="email"
                                   id="contact-email"
                                   name="email"
                                   placeholder="tu@correo.com"
                                   required>
                        </div>
                    </div>

                    <!-- Fila 2 -->
                    <div class="fb-form-row">
                        <div class="fb-form-group">
                            <label for="contact-phone">Teléfono</label>
                            <input type="tel"
                                   id="contact-phone"
                                   name="phone"
                                   placeholder="(555) 000-0000">
                        </div>
                        <div class="fb-form-group">
                            <label for="contact-type">
                                Tipo de consulta *
                            </label>
                            <select id="contact-type"
                                    name="subject"
                                    required>
                                <option value="">
                                    Selecciona una opción
                                </option>
                                <option value="Consulta sobre pedido">
                                    📦 Consulta sobre mi pedido
                                </option>
                                <option value="Problema con producto">
                                    🥬 Problema con un producto
                                </option>
                                <option value="Quiero ser vendedor">
                                    🏪 Quiero ser vendedor
                                </option>
                                <option value="Soporte técnico">
                                    💻 Soporte técnico
                                </option>
                                <option value="Facturación y pagos">
                                    💳 Facturación y pagos
                                </option>
                                <option value="Prensa y medios">
                                    📰 Prensa y medios
                                </option>
                                <option value="Alianzas comerciales">
                                    🤝 Alianzas comerciales
                                </option>
                                <option value="Otro">
                                    ❓ Otro
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Número de pedido (condicional) -->
                    <div class="fb-form-group" id="order-number-group"
                         style="display:none;">
                        <label for="contact-order">
                            Número de pedido
                        </label>
                        <input type="text"
                               id="contact-order"
                               name="order_number"
                               placeholder="ej. FB-2024-00123">
                    </div>

                    <!-- Mensaje -->
                    <div class="fb-form-group">
                        <label for="contact-message">
                            Mensaje *
                        </label>
                        <textarea id="contact-message"
                                  name="message"
                                  rows="5"
                                  placeholder="Describe tu consulta con el mayor detalle posible..."
                                  required></textarea>
                    </div>

                    <!-- Cómo prefiere ser contactado -->
                    <div class="fb-form-group">
                        <label>¿Cómo prefieres que te contactemos?</label>
                        <div style="display:flex;gap:12px;flex-wrap:wrap;
                                    margin-top:8px;">
                            <?php
                            $preferencias = [
                                ['email',    '📧 Por correo'],
                                ['phone',    '📞 Por teléfono'],
                                ['whatsapp', '💬 Por WhatsApp'],
                            ];
                            foreach ($preferencias as $i => [$val, $label]) :
                            ?>
                                <label style="display:flex;align-items:center;
                                              gap:8px;cursor:pointer;
                                              font-family:var(--fb-font);
                                              font-size:0.88rem;
                                              color:var(--fb-dark);">
                                    <input type="radio"
                                           name="contact_preference"
                                           value="<?php echo esc_attr($val); ?>"
                                           <?php echo $i === 0 ? 'checked' : ''; ?>
                                           style="accent-color:var(--fb-primary);">
                                    <?php echo esc_html($label); ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Adjuntar imagen (info) -->
                    <div class="fb-form-group">
                        <label for="contact-attachment">
                            Adjuntar imagen (opcional)
                        </label>
                        <div class="fb-file-upload" id="fb-file-upload">
                            <span style="font-size:1.5rem;">📎</span>
                            <p style="font-size:0.85rem;color:var(--fb-gray-400);
                                       font-family:var(--fb-font);margin:4px 0 0;">
                                Arrastra una imagen o
                                <span style="color:var(--fb-primary);
                                             cursor:pointer;">
                                    haz clic aquí
                                </span>
                            </p>
                            <p style="font-size:0.75rem;color:var(--fb-gray-300);
                                       font-family:var(--fb-font);">
                                PNG, JPG hasta 5MB
                            </p>
                        </div>
                    </div>

                    <!-- Checkbox términos -->
                    <div class="fb-form-group">
                        <label style="display:flex;align-items:flex-start;
                                      gap:10px;cursor:pointer;">
                            <input type="checkbox"
                                   name="terms"
                                   required
                                   style="accent-color:var(--fb-primary);
                                          margin-top:2px;flex-shrink:0;">
                            <span style="font-size:0.85rem;color:var(--fb-gray-400);
                                         font-family:var(--fb-font);line-height:1.5;">
                                Acepto la
                                <a href="<?php echo esc_url(home_url('/politica-privacidad')); ?>"
                                   style="color:var(--fb-primary);">
                                    Política de Privacidad
                                </a>
                                y el tratamiento de mis datos personales
                                para gestionar esta consulta.
                            </span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="fb-btn fb-btn-primary fb-btn-lg"
                            id="fb-contact-submit"
                            style="width:100%;justify-content:center;">
                        ✉️ Enviar Mensaje
                    </button>

                    <!-- Mensaje respuesta -->
                    <div id="fb-contact-msg"
                         style="margin-top:16px;padding:12px 16px;
                                border-radius:var(--fb-radius-sm);
                                font-family:var(--fb-font);font-size:0.9rem;
                                min-height:24px;display:none;">
                    </div>

                </form>

            </div><!-- /.fb-contact-form-card -->

        </div><!-- /.fb-contact-layout -->
    </div><!-- /.fb-container -->
</section>

<!-- ============================================================
     MAPA / UBICACIÓN
     ============================================================ -->
<section style="background:var(--fb-white);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-section-header" style="margin-bottom:40px;">
            <span class="fb-label">Encuéntranos</span>
            <h2>Nuestra Oficina Principal</h2>
            <p>
                Aunque somos principalmente una plataforma digital,
                tenemos oficina física en San Francisco para reuniones
                y visitas de vendedores.
            </p>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1.5fr;
                    gap:40px;align-items:start;">

            <!-- Info de ubicación -->
            <div style="display:flex;flex-direction:column;gap:20px;">

                <?php
                $oficinas = [
                    [
                        '🏢',
                        'Oficina Principal',
                        '123 Market Street, Suite 400<br>San Francisco, CA 94105',
                        'Sede Central',
                        'var(--fb-primary)',
                    ],
                    [
                        '🌾',
                        'Centro de Distribución',
                        '456 Valley Road<br>Fresno, CA 93701',
                        'Operaciones Logísticas',
                        'var(--fb-secondary)',
                    ],
                    [
                        '📦',
                        'Hub Este',
                        '789 Commerce Ave<br>Burlington, VT 05401',
                        'Distribución Costa Este',
                        'var(--fb-accent)',
                    ],
                ];
                foreach ($oficinas as [$icon, $titulo, $dir, $tipo, $color]) :
                ?>
                    <div style="display:flex;gap:16px;padding:20px;
                                background:var(--fb-bg);
                                border-radius:var(--fb-radius);
                                border:1.5px solid var(--fb-border-gray);">
                        <div style="width:48px;height:48px;flex-shrink:0;
                                    background:<?php echo $color; ?>15;
                                    border-radius:var(--fb-radius-sm);
                                    display:flex;align-items:center;
                                    justify-content:center;font-size:1.3rem;">
                            <?php echo $icon; ?>
                        </div>
                        <div>
                            <h4 style="font-family:var(--fb-font);
                                        font-size:0.95rem;font-weight:700;
                                        color:var(--fb-dark);margin-bottom:4px;">
                                <?php echo esc_html($titulo); ?>
                            </h4>
                            <p style="font-size:0.85rem;color:var(--fb-gray-400);
                                       font-family:var(--fb-font);
                                       line-height:1.5;margin-bottom:6px;">
                                <?php echo $dir; ?>
                            </p>
                            <span style="font-size:0.75rem;
                                         color:<?php echo $color; ?>;
                                         font-weight:600;
                                         font-family:var(--fb-font);">
                                <?php echo esc_html($tipo); ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Mapa placeholder -->
            <div class="fb-map-placeholder">
                <div class="fb-map-inner">
                    <span style="font-size:4rem;">🗺️</span>
                    <h3>San Francisco, CA</h3>
                    <p>123 Market Street, Suite 400</p>
                    <a href="https://maps.google.com"
                       target="_blank"
                       rel="noopener"
                       class="fb-btn fb-btn-primary"
                       style="margin-top:16px;">
                        📍 Abrir en Google Maps
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ============================================================
     SOPORTE PARA VENDEDORES
     ============================================================ -->
<section style="background:var(--fb-bg);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-section-header" style="margin-bottom:40px;">
            <span class="fb-label">Para Agricultores</span>
            <h2>¿Quieres Vender en FreshBite?</h2>
            <p>
                Tenemos un equipo dedicado exclusivamente a ayudar
                a nuevos vendedores a comenzar.
            </p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
            <?php
            $pasos = [
                [
                    '1',
                    '📝',
                    'Regístrate',
                    'Crea tu cuenta de vendedor en menos de 5 minutos. Solo necesitas tu información básica y datos de tu granja.',
                    'Comenzar registro →',
                    class_exists('WeDevs_Dokan')
                        ? dokan_get_page_url('myaccount')
                        : home_url('/contacto'),
                ],
                [
                    '2',
                    '✅',
                    'Verificación',
                    'Nuestro equipo revisa tu perfil y certifica la calidad de tus productos. El proceso toma 2-3 días hábiles.',
                    'Ver requisitos →',
                    home_url('/guia-vendedores'),
                ],
                [
                    '3',
                    '🚀',
                    'Empieza a Vender',
                    'Una vez verificado, sube tus productos y comienza a recibir pedidos. Sin cuota mensual, solo comisión por venta.',
                    'Hablar con un asesor →',
                    'mailto:vendedores@freshbite.com',
                ],
            ];
            foreach ($pasos as [$num, $icon, $titulo, $desc, $cta, $url]) :
            ?>
                <div style="background:var(--fb-white);
                             border:1.5px solid var(--fb-border-gray);
                             border-radius:var(--fb-radius-lg);
                             padding:32px 24px;text-align:center;
                             position:relative;overflow:hidden;">

                    <!-- Número de fondo -->
                    <div style="position:absolute;top:-10px;right:10px;
                                font-size:5rem;font-weight:900;
                                color:var(--fb-primary);opacity:0.06;
                                font-family:var(--fb-font);line-height:1;">
                        <?php echo $num; ?>
                    </div>

                    <div style="width:64px;height:64px;
                                background:rgba(249,115,22,0.1);
                                border-radius:var(--fb-radius);
                                display:flex;align-items:center;
                                justify-content:center;font-size:1.8rem;
                                margin:0 auto 20px;">
                        <?php echo $icon; ?>
                    </div>

                    <div style="display:inline-flex;align-items:center;
                                justify-content:center;
                                width:28px;height:28px;
                                background:var(--fb-primary);
                                color:white;border-radius:50%;
                                font-size:0.8rem;font-weight:700;
                                font-family:var(--fb-font);
                                margin-bottom:12px;">
                        <?php echo $num; ?>
                    </div>

                    <h3 style="font-family:var(--fb-font);font-size:1.1rem;
                                font-weight:700;color:var(--fb-dark);
                                margin-bottom:12px;">
                        <?php echo esc_html($titulo); ?>
                    </h3>

                    <p style="font-size:0.88rem;color:var(--fb-gray-400);
                               line-height:1.6;font-family:var(--fb-font);
                               margin-bottom:20px;">
                        <?php echo esc_html($desc); ?>
                    </p>

                    <a href="<?php echo esc_url($url); ?>"
                       class="fb-btn fb-btn-outline fb-btn-sm"
                       style="width:100%;justify-content:center;">
                        <?php echo esc_html($cta); ?>
                    </a>

                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align:center;margin-top:32px;
                    padding:24px;background:rgba(249,115,22,0.06);
                    border-radius:var(--fb-radius);
                    border:1px solid rgba(249,115,22,0.15);">
            <p style="font-family:var(--fb-font);color:var(--fb-gray-400);
                       font-size:0.9rem;margin-bottom:0;">
                ¿Tienes dudas? Escríbenos directamente a
                <a href="mailto:vendedores@freshbite.com"
                   style="color:var(--fb-primary);font-weight:600;">
                    vendedores@freshbite.com
                </a>
                o llámanos al
                <a href="tel:+18005550199"
                   style="color:var(--fb-primary);font-weight:600;">
                    (800) 555-0199
                </a>
                — respondemos en menos de 2 horas.
            </p>
        </div>

    </div>
</section>

<?php get_footer(); ?>