<?php
/**
 * Template Name: Vendedores — FreshBite
 *
 * FreshBite Theme — page-vendors.php
 * Página: Directorio de Vendedores
 *
 * @package FreshBite
 */
defined('ABSPATH') || exit;

get_header();

/*
 * ⚠️ FIX CRÍTICO — Child theme de Astra:
 * NO usar have_posts()/the_loop().
 * Renderizar el contenido directamente para
 * evitar que Astra inyecte content-none.php
 */

/* ── Vendedores registrados ───────────────────────────── */
$vendors = new WP_Query([
  'post_type'      => 'fb_vendor',
  'posts_per_page' => 12,
  'post_status'    => 'publish',
  'orderby'        => 'title',
  'order'          => 'ASC',
]);

/* ── Si no hay CPT fb_vendor, usamos usuarios con rol vendor */
$vendor_users = get_users([
  'role__in' => [ 'vendor', 'seller', 'administrator' ],
  'number'   => 12,
]);
?>

<main id="fb-main" class="fb-main-content fb-vendors-page" role="main">

  <!-- ═══ HERO ═════════════════════════════════════════════ -->
  <section class="fb-vendors-hero">
    <div class="fb-container">
      <div class="fb-vendors-hero__inner">

        <nav class="fb-breadcrumbs" aria-label="Migas de pan">
          <a href="<?php echo esc_url( home_url('/') ); ?>">Inicio</a>
          <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
          <span class="fb-breadcrumbs__current">Vendedores</span>
        </nav>

        <span class="fb-vendors-hero__eyebrow">
          🌿 Productores locales
        </span>
        <h1 class="fb-vendors-hero__title">
          Conoce a nuestros<br>
          <span class="fb-vendors-hero__accent">Vendedores</span>
        </h1>
        <p class="fb-vendors-hero__desc">
          Conectamos directamente con agricultores y productores locales
          que cultivan con amor y responsabilidad. Compra directo del campo
          a tu mesa, sin intermediarios.
        </p>

        <!-- Stats -->
        <div class="fb-vendors-hero__stats">
          <div class="fb-vendors-stat">
            <span class="fb-vendors-stat__num">+50</span>
            <span class="fb-vendors-stat__label">Productores</span>
          </div>
          <div class="fb-vendors-stat__sep" aria-hidden="true"></div>
          <div class="fb-vendors-stat">
            <span class="fb-vendors-stat__num">5</span>
            <span class="fb-vendors-stat__label">Regiones</span>
          </div>
          <div class="fb-vendors-stat__sep" aria-hidden="true"></div>
          <div class="fb-vendors-stat">
            <span class="fb-vendors-stat__num">100%</span>
            <span class="fb-vendors-stat__label">Orgánico</span>
          </div>
        </div>

      </div>
    </div>
  </section><!-- .fb-vendors-hero -->


  <!-- ═══ FILTROS ══════════════════════════════════════════ -->
  <section class="fb-vendors-filters">
    <div class="fb-container">
      <div class="fb-vendors-filters__inner">

        <!-- Búsqueda -->
        <div class="fb-vendors-search">
          <svg width="18" height="18" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2"
               aria-hidden="true">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
          </svg>
          <input type="search"
                 id="fb-vendor-search-input"
                 class="fb-vendors-search__input"
                 placeholder="Buscar vendedor o producto…"
                 autocomplete="off">
        </div>

        <!-- Filtros por tipo -->
        <div class="fb-vendors-filter-tabs"
             role="group" aria-label="Filtrar vendedores">
          <button class="fb-vendors-filter-btn active" data-filter="all">
            Todos
          </button>
          <button class="fb-vendors-filter-btn" data-filter="frutas">
            🍎 Frutas
          </button>
          <button class="fb-vendors-filter-btn" data-filter="verduras">
            🥦 Verduras
          </button>
          <button class="fb-vendors-filter-btn" data-filter="lacteos">
            🥛 Lácteos
          </button>
          <button class="fb-vendors-filter-btn" data-filter="organico">
            🌿 Orgánico
          </button>
        </div>

        <!-- Ordenar -->
        <div class="fb-vendors-sort">
          <label for="fb-vendor-sort" class="screen-reader-text">
            Ordenar por:
          </label>
          <select id="fb-vendor-sort" class="fb-field fb-field-select">
            <option value="nombre">Ordenar por nombre</option>
            <option value="rating">Mejor valorados</option>
            <option value="productos">Más productos</option>
          </select>
        </div>

      </div>
    </div>
  </section><!-- .fb-vendors-filters -->


  <!-- ═══ GRID DE VENDEDORES ════════════════════════════════ -->
  <section class="fb-vendors-main">
    <div class="fb-container">

      <?php if ( $vendors->have_posts() ) : ?>

        <!-- Vendedores desde CPT fb_vendor -->
        <div class="fb-vendors-grid" id="fb-vendors-grid">
          <?php while ( $vendors->have_posts() ) : $vendors->the_post();

            $vendor_id     = get_the_ID();
            $vendor_loc    = get_post_meta( $vendor_id, 'fb_vendor_location', true );
            $vendor_rating = (float) get_post_meta( $vendor_id, 'fb_vendor_rating', true );
            $vendor_prods  = (int) get_post_meta( $vendor_id, 'fb_vendor_products', true );
            $vendor_badge  = get_post_meta( $vendor_id, 'fb_vendor_badge', true );
            $vendor_tags   = wp_get_post_terms( $vendor_id, 'fb_vendor_category', [ 'fields' => 'names' ] );
          ?>

            <article class="fb-vendor-card"
                     data-filter="<?php echo esc_attr( implode( ' ', (array) $vendor_tags ) ); ?>">

              <!-- Imagen de portada -->
              <div class="fb-vendor-card__cover">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'medium_large', [
                    'class'   => 'fb-vendor-card__cover-img',
                    'loading' => 'lazy',
                    'alt'     => get_the_title(),
                  ] ); ?>
                <?php else : ?>
                  <div class="fb-vendor-card__cover-placeholder">
                    🌿
                  </div>
                <?php endif; ?>

                <?php if ( $vendor_badge ) : ?>
                  <span class="fb-vendor-card__badge">
                    <?php echo esc_html( $vendor_badge ); ?>
                  </span>
                <?php endif; ?>
              </div>

              <!-- Contenido -->
              <div class="fb-vendor-card__body">

                <div class="fb-vendor-card__header">
                  <h2 class="fb-vendor-card__name">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                    </a>
                  </h2>

                  <?php if ( $vendor_loc ) : ?>
                    <span class="fb-vendor-card__location">
                      <svg width="13" height="13" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2"
                           aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                      </svg>
                      <?php echo esc_html( $vendor_loc ); ?>
                    </span>
                  <?php endif; ?>
                </div>

                <!-- Extracto -->
                <p class="fb-vendor-card__desc">
                  <?php echo esc_html( wp_trim_words( get_the_excerpt(), 16, '…' ) ); ?>
                </p>

                <!-- Tags de productos -->
                <?php if ( ! is_wp_error( $vendor_tags ) && $vendor_tags ) : ?>
                  <div class="fb-vendor-card__tags">
                    <?php foreach ( array_slice( $vendor_tags, 0, 3 ) as $vtag ) : ?>
                      <span class="fb-tag-pill fb-tag-pill--sm fb-tag-pill--green">
                        <?php echo esc_html( $vtag ); ?>
                      </span>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>

                <!-- Rating -->
                <?php if ( $vendor_rating > 0 ) : ?>
                  <div class="fb-vendor-card__rating">
                    <div class="fb-stars" aria-label="<?php echo $vendor_rating; ?> de 5 estrellas">
                      <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                        <svg width="14" height="14" viewBox="0 0 24 24"
                             fill="<?php echo $i <= $vendor_rating ? 'currentColor' : 'none'; ?>"
                             stroke="currentColor" stroke-width="2"
                             class="fb-star <?php echo $i <= $vendor_rating ? 'fb-star--filled' : ''; ?>">
                          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14
                                           18.18 21.02 12 17.77 5.82 21.02
                                           7 14.14 2 9.27 8.91 8.26 12 2"/>
                        </svg>
                      <?php endfor; ?>
                    </div>
                    <span class="fb-vendor-card__rating-num">
                      <?php echo number_format( $vendor_rating, 1 ); ?>
                    </span>
                  </div>
                <?php endif; ?>

                <!-- Footer -->
                <div class="fb-vendor-card__footer">
                  <?php if ( $vendor_prods > 0 ) : ?>
                    <span class="fb-vendor-card__prods">
                      <svg width="13" height="13" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2"
                           aria-hidden="true">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 01-8 0"/>
                      </svg>
                      <?php echo $vendor_prods . ' ' . ( $vendor_prods === 1 ? 'producto' : 'productos' ); ?>
                    </span>
                  <?php endif; ?>

                  <a href="<?php the_permalink(); ?>"
                     class="fb-btn fb-btn--primary fb-btn--sm">
                    Ver tienda
                    <svg width="14" height="14" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         aria-hidden="true">
                      <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                  </a>
                </div>

              </div><!-- .fb-vendor-card__body -->
            </article><!-- .fb-vendor-card -->

          <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- .fb-vendors-grid -->

      <?php else : ?>

        <!-- ── Sin CPT, mostrar placeholder visual ──────── -->
        <div class="fb-vendors-grid" id="fb-vendors-grid">

          <?php
          /* Vendedores de ejemplo (placeholder para el portfolio) */
          $placeholder_vendors = [
            [
              'nombre'    => 'Granja El Roble',
              'location'  => 'Valle Central',
              'desc'      => 'Especialistas en frutas de temporada cultivadas sin pesticidas. Más de 20 años de tradición familiar.',
              'emoji'     => '🍎',
              'badge'     => '⭐ Destacado',
              'tags'      => [ 'Frutas', 'Orgánico' ],
              'rating'    => 4.9,
              'productos' => 24,
            ],
            [
              'nombre'    => 'Huerta La Esperanza',
              'location'  => 'Sierra Norte',
              'desc'      => 'Verduras frescas recogidas cada mañana. Cultivo hidropónico y en tierra con técnicas sostenibles.',
              'emoji'     => '🥬',
              'badge'     => '🌿 Orgánico',
              'tags'      => [ 'Verduras', 'Hidropónico' ],
              'rating'    => 4.7,
              'productos' => 18,
            ],
            [
              'nombre'    => 'Lácteos Don Pedro',
              'location'  => 'Región Sur',
              'desc'      => 'Quesos artesanales, yogures y leche fresca de vacas criadas en pastoreo libre y natural.',
              'emoji'     => '🧀',
              'badge'     => '🐄 Pastoreo libre',
              'tags'      => [ 'Lácteos', 'Artesanal' ],
              'rating'    => 4.8,
              'productos' => 12,
            ],
            [
              'nombre'    => 'Apícola El Pinar',
              'location'  => 'Montaña Alta',
              'desc'      => 'Miel artesanal y productos de la colmena. Apicultura responsable que cuida las abejas y el ecosistema.',
              'emoji'     => '🍯',
              'badge'     => null,
              'tags'      => [ 'Miel', 'Orgánico' ],
              'rating'    => 5.0,
              'productos' => 8,
            ],
            [
              'nombre'    => 'Finca Los Nogales',
              'location'  => 'Valle Fértil',
              'desc'      => 'Frutos secos y aceites prensados en frío. Producción artesanal con certificación ecológica.',
              'emoji'     => '🫒',
              'badge'     => '✅ Certificado',
              'tags'      => [ 'Frutos secos', 'Aceites' ],
              'rating'    => 4.6,
              'productos' => 15,
            ],
            [
              'nombre'    => 'Jardín de Hierbas',
              'location'  => 'Altiplano',
              'desc'      => 'Hierbas aromáticas frescas y secas. Cultivo sin agroquímicos, perfectas para tus recetas.',
              'emoji'     => '🌿',
              'badge'     => null,
              'tags'      => [ 'Hierbas', 'Especias' ],
              'rating'    => 4.5,
              'productos' => 30,
            ],
          ];
          ?>

          <?php foreach ( $placeholder_vendors as $v ) : ?>
            <article class="fb-vendor-card">

              <div class="fb-vendor-card__cover">
                <div class="fb-vendor-card__cover-placeholder">
                  <?php echo $v['emoji']; ?>
                </div>
                <?php if ( $v['badge'] ) : ?>
                  <span class="fb-vendor-card__badge">
                    <?php echo esc_html( $v['badge'] ); ?>
                  </span>
                <?php endif; ?>
              </div>

              <div class="fb-vendor-card__body">

                <div class="fb-vendor-card__header">
                  <h2 class="fb-vendor-card__name">
                    <a href="#"><?php echo esc_html( $v['nombre'] ); ?></a>
                  </h2>
                  <span class="fb-vendor-card__location">
                    <svg width="13" height="13" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         aria-hidden="true">
                      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                      <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <?php echo esc_html( $v['location'] ); ?>
                  </span>
                </div>

                <p class="fb-vendor-card__desc">
                  <?php echo esc_html( $v['desc'] ); ?>
                </p>

                <div class="fb-vendor-card__tags">
                  <?php foreach ( $v['tags'] as $t ) : ?>
                    <span class="fb-tag-pill fb-tag-pill--sm fb-tag-pill--green">
                      <?php echo esc_html( $t ); ?>
                    </span>
                  <?php endforeach; ?>
                </div>

                <div class="fb-vendor-card__rating">
                  <div class="fb-stars">
                    <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                      <svg width="14" height="14" viewBox="0 0 24 24"
                           fill="<?php echo $i <= $v['rating'] ? 'currentColor' : 'none'; ?>"
                           stroke="currentColor" stroke-width="2"
                           class="fb-star <?php echo $i <= $v['rating'] ? 'fb-star--filled' : ''; ?>">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14
                                         18.18 21.02 12 17.77 5.82 21.02
                                         7 14.14 2 9.27 8.91 8.26 12 2"/>
                      </svg>
                    <?php endfor; ?>
                  </div>
                  <span class="fb-vendor-card__rating-num">
                    <?php echo number_format( $v['rating'], 1 ); ?>
                  </span>
                </div>

                <div class="fb-vendor-card__footer">
                  <span class="fb-vendor-card__prods">
                    <svg width="13" height="13" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2"
                         aria-hidden="true">
                      <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                      <line x1="3" y1="6" x2="21" y2="6"/>
                      <path d="M16 10a4 4 0 01-8 0"/>
                    </svg>
                    <?php echo $v['productos'] . ' productos'; ?>
                  </span>

                  <a href="#"
                     class="fb-btn fb-btn--primary fb-btn--sm">
                    Ver tienda
                    <svg width="14" height="14" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         aria-hidden="true">
                      <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                  </a>
                </div>

              </div><!-- .fb-vendor-card__body -->
            </article>
          <?php endforeach; ?>

        </div><!-- .fb-vendors-grid -->

        <!-- CTA para unirse como vendedor -->
        <div class="fb-vendors-join">
          <div class="fb-vendors-join__inner">
            <span class="fb-vendors-join__eyebrow">¿Eres productor?</span>
            <h3 class="fb-vendors-join__title">
              Únete a nuestra red de vendedores
            </h3>
            <p class="fb-vendors-join__desc">
              Llega a miles de clientes que buscan productos frescos y de calidad.
              Sin comisiones abusivas, con soporte completo.
            </p>
            <a href="<?php echo esc_url( home_url('/contacto/') ); ?>"
               class="fb-btn fb-btn--primary fb-btn--lg">
              <svg width="18" height="18" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2.5"
                   aria-hidden="true">
                <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <line x1="19" y1="8" x2="19" y2="14"/>
                <line x1="22" y1="11" x2="16" y2="11"/>
              </svg>
              Quiero ser vendedor
            </a>
          </div>
        </div>

      <?php endif; ?>

    </div><!-- .fb-container -->
  </section><!-- .fb-vendors-main -->

</main><!-- #fb-main -->

<?php get_footer(); ?>