<<?php
/**
 * Template Name: Nosotros — FreshBite
 *
 * FreshBite Theme — page-about.php
 * Página: Quiénes Somos
 *
 * @package FreshBite
 */
defined('ABSPATH') || exit;
get_header();
?>

<!-- ============================================================
     HERO — NOSOTROS
     ============================================================ -->
<section class="fb-about-hero">
    <div class="fb-container">
        <div style="display:grid;grid-template-columns:1fr 1fr;
                    gap:64px;align-items:center;">

            <!-- Texto -->
            <div>
                <span class="fb-label">Nuestra Historia</span>
                <h1 style="margin-top:12px;margin-bottom:20px;line-height:1.15;">
                    Conectamos Familias<br>con
                    <span style="color:var(--fb-primary);">Comida Real</span>
                </h1>
                <p style="font-size:1.1rem;color:var(--fb-gray-400);
                           line-height:1.8;margin-bottom:24px;
                           font-family:var(--fb-font);">
                    FreshBite nació de una idea simple: las familias merecen
                    saber de dónde viene su comida. Hoy conectamos a más de
                    200 agricultores locales con 50,000 familias en todo el país.
                </p>
                <p style="font-size:1rem;color:var(--fb-gray-400);
                           line-height:1.8;font-family:var(--fb-font);">
                    Creemos que la comida fresca no debería ser un lujo.
                    Por eso trabajamos cada día para que los mejores
                    productos lleguen directo del campo a tu mesa,
                    apoyando a agricultores locales con precios justos.
                </p>

                <div style="display:flex;gap:16px;margin-top:36px;flex-wrap:wrap;">
                    <a href="<?php echo esc_url(home_url('/tienda')); ?>"
                       class="fb-btn fb-btn-primary fb-btn-lg">
                        🛒 Explorar la Tienda
                    </a>
                    <a href="<?php echo esc_url(home_url('/vendedores')); ?>"
                       class="fb-btn fb-btn-outline fb-btn-lg">
                        🌾 Nuestros Agricultores
                    </a>
                </div>
            </div>

            <!-- Visual -->
            <div style="position:relative;">
                <div style="background:linear-gradient(135deg,
                             var(--fb-bg-3),#D1FAE5);
                             border-radius:var(--fb-radius-xl);
                             height:420px;
                             display:flex;align-items:center;
                             justify-content:center;
                             font-size:7rem;
                             overflow:hidden;position:relative;">
                    🌾
                    <!-- Decorative circles -->
                    <div style="position:absolute;top:-40px;right:-40px;
                                width:200px;height:200px;
                                background:rgba(249,115,22,0.08);
                                border-radius:50%;"></div>
                    <div style="position:absolute;bottom:-40px;left:-40px;
                                width:160px;height:160px;
                                background:rgba(34,197,94,0.08);
                                border-radius:50%;"></div>
                </div>

                <!-- Floating cards -->
                <div style="position:absolute;bottom:32px;left:-24px;
                             background:white;border-radius:var(--fb-radius);
                             padding:14px 18px;
                             box-shadow:var(--fb-shadow-lg);
                             display:flex;align-items:center;gap:10px;">
                    <span style="font-size:1.4rem;">🌿</span>
                    <div>
                        <div style="font-weight:700;font-family:var(--fb-font);
                                    font-size:0.95rem;color:var(--fb-dark);">
                            100% Orgánico
                        </div>
                        <div style="font-size:0.75rem;color:var(--fb-gray-400);
                                    font-family:var(--fb-font);">
                            Certificado USDA
                        </div>
                    </div>
                </div>

                <div style="position:absolute;top:32px;right:-24px;
                             background:white;border-radius:var(--fb-radius);
                             padding:14px 18px;
                             box-shadow:var(--fb-shadow-lg);
                             display:flex;align-items:center;gap:10px;">
                    <span style="font-size:1.4rem;">🤝</span>
                    <div>
                        <div style="font-weight:700;font-family:var(--fb-font);
                                    font-size:0.95rem;color:var(--fb-dark);">
                            Comercio Justo
                        </div>
                        <div style="font-size:0.75rem;color:var(--fb-gray-400);
                                    font-family:var(--fb-font);">
                            Precios directos
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Breadcrumb -->
        <div class="fb-breadcrumb" style="margin-top:32px;">
            <a href="<?php echo esc_url(home_url('/')); ?>">Inicio</a>
            <span>›</span>
            <span>Nosotros</span>
        </div>

    </div>
</section>

<!-- ============================================================
     ESTADÍSTICAS
     ============================================================ -->
<section style="background:var(--fb-white);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-stats-row">
            <?php
            $stats = [
                ['🏪', '200+',    'Vendedores Activos',   'Agricultores y productores verificados'],
                ['😊', '50,000+', 'Familias Atendidas',   'Clientes satisfechos en todo el país'],
                ['🥬', '5,000+',  'Productos Disponibles','Frescos, orgánicos y artesanales'],
                ['🌎', '28',      'Estados Cubiertos',    'Presencia nacional en expansión'],
            ];
            foreach ($stats as [$icon, $num, $titulo, $desc]) :
            ?>
                <div class="fb-stat-block">
                    <span style="font-size:2rem;display:block;margin-bottom:12px;">
                        <?php echo $icon; ?>
                    </span>
                    <span class="fb-stat-num">
                        <?php echo esc_html($num); ?>
                    </span>
                    <strong style="display:block;font-family:var(--fb-font);
                                   font-size:0.95rem;color:var(--fb-dark);
                                   margin-bottom:6px;">
                        <?php echo esc_html($titulo); ?>
                    </strong>
                    <span class="fb-stat-label">
                        <?php echo esc_html($desc); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     NUESTRA HISTORIA
     ============================================================ -->
<section class="fb-section" style="background:var(--fb-bg);">
    <div class="fb-container">

        <div class="fb-section-header">
            <span class="fb-label">Cómo Empezamos</span>
            <h2>Una Historia de Comida Real</h2>
        </div>

        <!-- Timeline -->
        <div class="fb-timeline">

            <?php
            $hitos = [
                [
                    '2018',
                    '🌱',
                    'La Semilla',
                    'Nuestro fundador, cansado de los supermercados y sin saber de dónde venían los alimentos, comenzó a visitar granjas locales en California. La idea de un mercado directo nació en un campo de tomates.',
                    'var(--fb-primary)',
                ],
                [
                    '2019',
                    '🤝',
                    'Los Primeros Agricultores',
                    'Firmamos convenio con los primeros 12 agricultores de California y Oregon. Lanzamos la plataforma beta con solo 200 productos. La respuesta superó todas nuestras expectativas.',
                    'var(--fb-secondary)',
                ],
                [
                    '2020',
                    '🚀',
                    'Crecimiento Explosivo',
                    'La pandemia cambió la forma en que las familias compraban. FreshBite creció un 400% en un solo año. Pasamos de 12 a 80 vendedores y de 3 estados a 15.',
                    'var(--fb-accent)',
                ],
                [
                    '2021',
                    '🏆',
                    'Reconocimiento Nacional',
                    'Forbes nos incluyó en su lista "30 Startups to Watch". Lanzamos el programa de certificación orgánica y el panel de vendedores con estadísticas en tiempo real.',
                    'var(--fb-primary)',
                ],
                [
                    '2022',
                    '📱',
                    'FreshBite App',
                    'Lanzamos nuestra aplicación móvil para iOS y Android. Los usuarios pueden rastrear sus pedidos en tiempo real, ver el perfil de su agricultor y dejar reseñas verificadas.',
                    'var(--fb-secondary)',
                ],
                [
                    '2024',
                    '🌟',
                    'Hoy y el Futuro',
                    'Más de 200 vendedores, 50,000 familias felices y presencia en 28 estados. Seguimos creciendo con la misma misión: comida fresca, transparente y justa para todos.',
                    'var(--fb-accent)',
                ],
            ];
            foreach ($hitos as $i => [$year, $icon, $titulo, $desc, $color]) :
                $izquierda = $i % 2 === 0;
            ?>
                <div class="fb-timeline-item <?php echo $izquierda ? 'left' : 'right'; ?>">

                    <div class="fb-timeline-content">
                        <div class="fb-timeline-year"
                             style="color:<?php echo $color; ?>;">
                            <?php echo esc_html($year); ?>
                        </div>
                        <div class="fb-timeline-icon"
                             style="background:<?php echo $color; ?>22;
                                    border-color:<?php echo $color; ?>44;">
                            <?php echo $icon; ?>
                        </div>
                        <h3 class="fb-timeline-title">
                            <?php echo esc_html($titulo); ?>
                        </h3>
                        <p class="fb-timeline-desc">
                            <?php echo esc_html($desc); ?>
                        </p>
                    </div>

                    <div class="fb-timeline-dot"
                         style="background:<?php echo $color; ?>;
                                border-color:<?php echo $color; ?>44;">
                    </div>

                </div>
            <?php endforeach; ?>

        </div><!-- /.fb-timeline -->

    </div>
</section>

<!-- ============================================================
     MISIÓN, VISIÓN Y VALORES
     ============================================================ -->
<section style="background:var(--fb-white);padding:80px 0;">
    <div class="fb-container">

        <div class="fb-section-header">
            <span class="fb-label">Lo Que Nos Mueve</span>
            <h2>Nuestra Misión y Valores</h2>
        </div>

        <!-- Misión y Visión -->
        <div class="fb-grid-2" style="gap:32px;margin-bottom:64px;">

            <div style="background:linear-gradient(135deg,var(--fb-primary),var(--fb-primary-dark));
                         border-radius:var(--fb-radius-lg);padding:40px;
                         position:relative;overflow:hidden;">
                <div style="position:absolute;right:-20px;bottom:-20px;
                             font-size:6rem;opacity:0.1;">🎯</div>
                <span style="font-size:0.75rem;font-weight:700;
                              letter-spacing:0.1em;text-transform:uppercase;
                              color:rgba(255,255,255,0.7);font-family:var(--fb-font);">
                    Nuestra Misión
                </span>
                <h3 style="color:white;margin-top:12px;margin-bottom:16px;
                            font-size:1.4rem;">
                    Democratizar el Acceso a Comida Fresca
                </h3>
                <p style="color:rgba(255,255,255,0.85);font-family:var(--fb-font);
                           line-height:1.7;font-size:0.95rem;">
                    Hacer que los alimentos frescos, orgánicos y locales sean
                    accesibles para todas las familias, eliminando intermediarios
                    y conectando directamente al productor con el consumidor.
                </p>
            </div>

            <div style="background:linear-gradient(135deg,var(--fb-secondary),var(--fb-secondary-dark));
                         border-radius:var(--fb-radius-lg);padding:40px;
                         position:relative;overflow:hidden;">
                <div style="position:absolute;right:-20px;bottom:-20px;
                             font-size:6rem;opacity:0.1;">🔭</div>
                <span style="font-size:0.75rem;font-weight:700;
                              letter-spacing:0.1em;text-transform:uppercase;
                              color:rgba(255,255,255,0.7);font-family:var(--fb-font);">
                    Nuestra Visión
                </span>
                <h3 style="color:white;margin-top:12px;margin-bottom:16px;
                            font-size:1.4rem;">
                    Un Sistema Alimentario Más Justo
                </h3>
                <p style="color:rgba(255,255,255,0.85);font-family:var(--fb-font);
                           line-height:1.7;font-size:0.95rem;">
                    Ser el marketplace de referencia para la compra de alimentos
                    frescos en USA, donde cada productor local tiene la misma
                    visibilidad que las grandes marcas industriales.
                </p>
            </div>

        </div>

        <!-- Valores -->
        <div class="fb-grid-3" style="gap:24px;">
            <?php
            $valores = [
                ['🌿', 'Transparencia Total',
                 'Sabes exactamente de qué granja viene cada producto, cómo fue cultivado y quién lo cosechó. Sin secretos.',
                 'var(--fb-primary)'],
                ['🤝', 'Comercio Justo',
                 'Garantizamos que los agricultores reciben el 85% del precio de venta. Ellos ponen el trabajo, merecen la recompensa.',
                 'var(--fb-secondary)'],
                ['🌱', 'Sostenibilidad',
                 'Promovemos prácticas agrícolas sostenibles. El 85% de nuestros vendedores tiene certificación orgánica USDA.',
                 'var(--fb-accent)'],
                ['💚', 'Comunidad',
                 'No somos solo una tienda. Somos una comunidad de personas que creen en la comida real y en apoyar al productor local.',
                 'var(--fb-primary)'],
                ['⚡', 'Frescura Garantizada',
                 'Si un producto no cumple nuestros estándares de frescura, te devolvemos el dinero. Sin preguntas, sin trámites.',
                 'var(--fb-secondary)'],
                ['📊', 'Impacto Medible',
                 'En 2023 generamos \$12 millones en ingresos directos para agricultores locales. Cada compra tiene impacto real.',
                 'var(--fb-accent)'],
            ];
            foreach ($valores as [$icon, $titulo, $desc, $color]) :
            ?>
                <div style="background:var(--fb-bg);border:1.5px solid var(--fb-border-gray);
                             border-radius:var(--fb-radius-lg);padding:28px;
                             transition:var(--fb-transition);"
                     class="fb-value-card">
                    <div style="width:52px;height:52px;
                                background:<?php echo $color; ?>18;
                                border-radius:var(--fb-radius);
                                display:flex;align-items:center;
                                justify-content:center;
                                font-size:1.4rem;margin-bottom:16px;">
                        <?php echo $icon; ?>
                    </div>
                    <h4 style="font-family:var(--fb-font);font-size:1rem;
                                font-weight:700;color:var(--fb-dark);
                                margin-bottom:10px;">
                        <?php echo esc_html($titulo); ?>
                    </h4>
                    <p style="font-size:0.88rem;color:var(--fb-gray-400);
                               line-height:1.7;font-family:var(--fb-font);">
                        <?php echo esc_html($desc); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     EQUIPO
     ============================================================ -->
<section class="fb-section" style="background:var(--fb-bg);">
    <div class="fb-container">

        <div class="fb-section-header">
            <span class="fb-label">Las Personas Detrás</span>
            <h2>Nuestro Equipo</h2>
            <p>
                Un equipo apasionado por la comida real, la tecnología
                y el impacto social positivo.
            </p>
        </div>

        <div class="fb-grid-4" style="gap:24px;">
            <?php
            $equipo = [
                [
                    '👨‍💼',
                    'James Rivera',
                    'CEO y Co-Fundador',
                    'Ex agricultor de tercera generación convertido en emprendedor. Lleva 6 años construyendo el puente entre el campo y la ciudad.',
                    'California',
                ],
                [
                    '👩‍💻',
                    'Sarah Chen',
                    'CTO y Co-Fundadora',
                    'Ingeniera de software con experiencia en Amazon Fresh y Instacart. Diseñó toda la infraestructura técnica de FreshBite.',
                    'San Francisco',
                ],
                [
                    '👨‍🌾',
                    'Carlos Mendez',
                    'Director de Vendedores',
                    'Trabaja directamente con los agricultores para garantizar calidad y sostenibilidad. Visita más de 50 granjas al año.',
                    'Oregon',
                ],
                [
                    '👩‍🎨',
                    'Emily Park',
                    'Directora de Experiencia',
                    'Diseñadora de producto enfocada en hacer que comprar comida fresca sea tan simple y placentero como sea posible.',
                    'New York',
                ],
            ];
            foreach ($equipo as [$emoji, $nombre, $rol, $bio, $ciudad]) :
            ?>
                <div style="background:var(--fb-white);
                             border:1.5px solid var(--fb-border-gray);
                             border-radius:var(--fb-radius-lg);
                             overflow:hidden;
                             transition:var(--fb-transition);"
                     class="fb-team-card">

                    <!-- Avatar -->
                    <div style="background:linear-gradient(135deg,
                                 var(--fb-bg-2),var(--fb-bg-3));
                                 padding:32px;text-align:center;">
                        <div style="width:80px;height:80px;
                                    background:white;border-radius:50%;
                                    display:flex;align-items:center;
                                    justify-content:center;font-size:2.2rem;
                                    margin:0 auto;
                                    box-shadow:var(--fb-shadow);
                                    border:3px solid var(--fb-border-gray);">
                            <?php echo $emoji; ?>
                        </div>
                    </div>

                    <!-- Info -->
                    <div style="padding:20px;">
                        <h4 style="font-family:var(--fb-font);font-size:1rem;
                                    font-weight:700;color:var(--fb-dark);
                                    margin-bottom:4px;">
                            <?php echo esc_html($nombre); ?>
                        </h4>
                        <p style="font-size:0.82rem;color:var(--fb-primary);
                                   font-weight:600;font-family:var(--fb-font);
                                   margin-bottom:10px;">
                            <?php echo esc_html($rol); ?>
                        </p>
                        <p style="font-size:0.83rem;color:var(--fb-gray-400);
                                   line-height:1.6;font-family:var(--fb-font);
                                   margin-bottom:12px;">
                            <?php echo esc_html($bio); ?>
                        </p>
                        <span style="font-size:0.75rem;color:var(--fb-gray-300);
                                     font-family:var(--fb-font);">
                            📍 <?php echo esc_html($ciudad); ?>
                        </span>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align:center;margin-top:40px;">
            <a href="<?php echo esc_url(home_url('/empleo')); ?>"
               class="fb-btn fb-btn-outline">
                💼 Trabaja con Nosotros
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
     IMPACTO SOCIAL
     ============================================================ -->
<section style="background:var(--fb-bg-dark);padding:80px 0;">
    <div class="fb-container">

        <div class="fb-section-header">
            <span class="fb-label" style="color:var(--fb-primary);">
                Nuestro Impacto
            </span>
            <h2 style="color:var(--fb-white);">
                Números que Importan
            </h2>
            <p style="color:rgba(255,255,255,0.6);">
                Cada compra en FreshBite genera un impacto real y
                medible en las comunidades agrícolas de USA.
            </p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);
                    gap:32px;margin-bottom:64px;">
            <?php
            $impactos = [
                [
                    '\$12M+',
                    'Ingresos Generados',
                    'Pagados directamente a agricultores locales en 2023, sin intermediarios.',
                    '🌾',
                    'var(--fb-primary)',
                ],
                [
                    '340 Ton',
                    'Comida Orgánica Distribuida',
                    'De productos frescos y orgánicos llevados directamente del campo a familias.',
                    '🥬',
                    'var(--fb-secondary)',
                ],
                [
                    '2,400',
                    'Empleos Apoyados',
                    'Puestos de trabajo directos e indirectos en granjas asociadas a FreshBite.',
                    '🤝',
                    'var(--fb-accent)',
                ],
            ];
            foreach ($impactos as [$num, $titulo, $desc, $icon, $color]) :
            ?>
                <div style="background:rgba(255,255,255,0.04);
                             border:1px solid rgba(255,255,255,0.08);
                             border-radius:var(--fb-radius-lg);
                             padding:36px 28px;text-align:center;">
                    <div style="font-size:2.5rem;margin-bottom:16px;">
                        <?php echo $icon; ?>
                    </div>
                    <div style="font-size:2.2rem;font-weight:700;
                                color:<?php echo $color; ?>;
                                font-family:var(--fb-font);
                                line-height:1;margin-bottom:12px;">
                        <?php echo esc_html($num); ?>
                    </div>
                    <strong style="display:block;color:var(--fb-white);
                                   font-family:var(--fb-font);
                                   font-size:0.95rem;margin-bottom:10px;">
                        <?php echo esc_html($titulo); ?>
                    </strong>
                    <p style="color:rgba(255,255,255,0.5);
                               font-family:var(--fb-font);
                               font-size:0.85rem;line-height:1.6;">
                        <?php echo esc_html($desc); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Programas de impacto -->
        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:24px;">
            <?php
            $programas = [
                [
                    '🌱',
                    'Programa Granja Sostenible',
                    'Apoyamos a los agricultores en la transición hacia prácticas agrícolas sostenibles y certificación orgánica con asesoría gratuita.',
                    'Activo desde 2021 · 45 granjas participantes',
                ],
                [
                    '🎓',
                    'FreshBite Academy',
                    'Capacitamos a nuevos agricultores en gestión de ventas online, marketing digital y mejores prácticas de embalaje y envío.',
                    'Activo desde 2022 · 120 agricultores formados',
                ],
                [
                    '🍽️',
                    'FreshBite Solidario',
                    'Por cada \$100 vendidos, donamos una caja de verduras frescas a bancos de alimentos locales en las comunidades donde operamos.',
                    'Activo desde 2020 · 12,000 cajas donadas',
                ],
                [
                    '🌍',
                    'Huella Carbono Cero',
                    'Compensamos el 100% de las emisiones de carbono de nuestros envíos a través de programas de reforestación certificados.',
                    'Activo desde 2023 · 8,500 árboles plantados',
                ],
            ];
            foreach ($programas as [$icon, $titulo, $desc, $meta]) :
            ?>
                <div style="background:rgba(255,255,255,0.04);
                             border:1px solid rgba(255,255,255,0.08);
                             border-radius:var(--fb-radius);
                             padding:28px;
                             display:flex;gap:20px;align-items:flex-start;">
                    <div style="width:52px;height:52px;flex-shrink:0;
                                background:rgba(249,115,22,0.12);
                                border-radius:var(--fb-radius-sm);
                                display:flex;align-items:center;
                                justify-content:center;font-size:1.4rem;">
                        <?php echo $icon; ?>
                    </div>
                    <div>
                        <h4 style="color:var(--fb-white);font-family:var(--fb-font);
                                    font-size:0.95rem;font-weight:700;
                                    margin-bottom:8px;">
                            <?php echo esc_html($titulo); ?>
                        </h4>
                        <p style="color:rgba(255,255,255,0.55);
                                   font-family:var(--fb-font);
                                   font-size:0.85rem;line-height:1.6;
                                   margin-bottom:10px;">
                            <?php echo esc_html($desc); ?>
                        </p>
                        <span style="font-size:0.75rem;color:var(--fb-primary);
                                     font-family:var(--fb-font);font-weight:600;">
                            <?php echo esc_html($meta); ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     PRENSA Y RECONOCIMIENTOS
     ============================================================ -->
<section style="background:var(--fb-white);padding:64px 0;">
    <div class="fb-container">

        <div class="fb-section-header" style="margin-bottom:40px;">
            <span class="fb-label">Nos Han Hablado</span>
            <h2>FreshBite en los Medios</h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">
            <?php
            $prensa = [
                ['📰', 'Forbes',         '"Una de las 30 startups de alimentos más innovadoras de 2021"',  '#'],
                ['📺', 'TechCrunch',     '"FreshBite está redefiniendo cómo compramos comida local"',       '#'],
                ['📱', 'Fast Company',   '"La plataforma que los agricultores siempre necesitaron"',        '#'],
                ['🗞️', 'Food & Wine',    '"La revolución del mercado de productores está en línea"',       '#'],
            ];
            foreach ($prensa as [$icon, $medio, $quote, $url]) :
            ?>
                <div style="background:var(--fb-bg);
                             border:1.5px solid var(--fb-border-gray);
                             border-radius:var(--fb-radius);
                             padding:24px;text-align:center;
                             transition:var(--fb-transition);"
                     class="fb-press-card">
                    <div style="font-size:2rem;margin-bottom:12px;">
                        <?php echo $icon; ?>
                    </div>
                    <h4 style="font-family:var(--fb-font);font-size:1rem;
                                font-weight:700;color:var(--fb-dark);
                                margin-bottom:10px;">
                        <?php echo esc_html($medio); ?>
                    </h4>
                    <p style="font-size:0.82rem;color:var(--fb-gray-400);
                               line-height:1.5;font-family:var(--fb-font);
                               font-style:italic;">
                        <?php echo esc_html($quote); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============================================================
     CTA FINAL
     ============================================================ -->
<section style="background:linear-gradient(135deg,var(--fb-primary),var(--fb-accent));
                padding:80px 0;text-align:center;">
    <div class="fb-container">

        <h2 style="color:var(--fb-white);margin-bottom:16px;">
            ¿Listo para Comer Más Fresco?
        </h2>
        <p style="color:rgba(255,255,255,0.85);font-size:1.1rem;
                   max-width:520px;margin:0 auto 36px;
                   font-family:var(--fb-font);">
            Únete a más de 50,000 familias que ya disfrutan
            de alimentos frescos, locales y justos cada semana.
        </p>

        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo esc_url(home_url('/tienda')); ?>"
               class="fb-btn fb-btn-white fb-btn-lg">
                🛒 Comprar Ahora
            </a>
            <a href="<?php echo esc_url(home_url('/contacto')); ?>"
               class="fb-btn fb-btn-outline fb-btn-lg"
               style="border-color:rgba(255,255,255,0.5);color:white;">
                ✉️ Contáctanos
            </a>
        </div>

    </div>
</section>

<?php get_footer(); ?>