<?php
/**
 * index.php — FreshBite Marketplace
 * Template fallback. Cubre: archivo genérico, búsqueda, blog index.
 *
 * @package FreshBite
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="fb-main" class="fb-main-content fb-index-page" role="main">

  <!-- ═══ CABECERA DE PÁGINA ═══════════════════════════════ -->
  <section class="fb-page-header">
    <div class="fb-container">

      <?php if ( is_search() ) : ?>
        <span class="fb-page-header__eyebrow">Resultados de búsqueda</span>
        <h1 class="fb-page-header__title">
          Resultados para:
          <span class="fb-search-term">"<?php echo esc_html( get_search_query() ); ?>"</span>
        </h1>
        <?php if ( $GLOBALS['wp_query']->found_posts ) : ?>
          <p class="fb-page-header__sub">
            <?php
            $found = (int) $GLOBALS['wp_query']->found_posts;
            echo $found === 1
              ? '1 resultado encontrado'
              : $found . ' resultados encontrados';
            ?>
          </p>
        <?php endif; ?>

      <?php elseif ( is_archive() ) : ?>
        <span class="fb-page-header__eyebrow">
          <?php
          if      ( is_category() )          echo 'Categoría';
          elseif  ( is_tag() )               echo 'Etiqueta';
          elseif  ( is_author() )            echo 'Autor';
          elseif  ( is_date() )              echo 'Archivo';
          elseif  ( is_post_type_archive() ) echo 'Archivo';
          else                               echo 'Explorar';
          ?>
        </span>
        <h1 class="fb-page-header__title"><?php the_archive_title(); ?></h1>
        <?php
        $archive_desc = get_the_archive_description();
        if ( $archive_desc ) :
        ?>
          <div class="fb-page-header__desc">
            <?php echo wp_kses_post( $archive_desc ); ?>
          </div>
        <?php endif; ?>

      <?php elseif ( is_home() ) : ?>
        <span class="fb-page-header__eyebrow">Directo de nuestra cocina</span>
        <h1 class="fb-page-header__title">
          <?php echo is_front_page() ? 'Noticias y Recetas' : single_post_title( '', false ); ?>
        </h1>

      <?php else : ?>
        <h1 class="fb-page-header__title">
          <?php echo is_404() ? 'Página no encontrada' : get_the_title(); ?>
        </h1>
      <?php endif; ?>

      <!-- Migas de pan -->
      <nav class="fb-breadcrumbs" aria-label="Migas de pan">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>

        <?php if ( is_search() ) : ?>
          <span>Búsqueda</span>
        <?php elseif ( is_category() || is_tag() || is_tax() ) : ?>
          <span><?php single_term_title(); ?></span>
        <?php elseif ( is_author() ) : ?>
          <span><?php the_author(); ?></span>
        <?php elseif ( is_archive() ) : ?>
          <span><?php the_archive_title( '', '' ); ?></span>
        <?php elseif ( is_home() ) : ?>
          <span>Blog</span>
        <?php else : ?>
          <span><?php the_title(); ?></span>
        <?php endif; ?>
      </nav>

    </div>
  </section><!-- .fb-page-header -->


  <!-- ═══ LAYOUT PRINCIPAL ══════════════════════════════════ -->
  <section class="fb-index-layout">
    <div class="fb-container">
      <div class="fb-index-grid">

        <!-- ── LOOP DE POSTS ──────────────────────────────── -->
        <div class="fb-index-main">

          <?php if ( have_posts() ) : ?>

            <?php if ( is_search() ) : ?>
              <div class="fb-search-meta">
                <?php
                global $wp_query;
                $paged    = max( 1, get_query_var( 'paged' ) );
                $per_page = (int) $wp_query->query_vars['posts_per_page'];
                $from     = ( $paged - 1 ) * $per_page + 1;
                $to       = min( $paged * $per_page, (int) $wp_query->found_posts );
                $total    = (int) $wp_query->found_posts;
                echo "Mostrando {$from}–{$to} de {$total} resultados";
                ?>
              </div>
            <?php endif; ?>

            <div class="fb-posts-grid">
              <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>"
                         <?php post_class( 'fb-post-card' ); ?>>

                  <!-- Miniatura -->
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>"
                       class="fb-post-card__thumb"
                       tabindex="-1" aria-hidden="true">
                      <?php
                      the_post_thumbnail( 'medium_large', [
                        'class'   => 'fb-post-card__img',
                        'loading' => 'lazy',
                        'alt'     => get_the_title(),
                      ] );
                      ?>
                      <?php
                      $cats = get_the_category();
                      if ( $cats ) :
                      ?>
                        <span class="fb-post-card__cat-badge">
                          <?php echo esc_html( $cats[0]->name ); ?>
                        </span>
                      <?php endif; ?>
                    </a>
                  <?php else : ?>
                    <a href="<?php the_permalink(); ?>"
                       class="fb-post-card__thumb fb-post-card__thumb--placeholder"
                       tabindex="-1" aria-hidden="true">
                      <div class="fb-post-card__no-img">
                        <svg width="40" height="40" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.5">
                          <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                      </div>
                    </a>
                  <?php endif; ?>

                  <!-- Cuerpo de la tarjeta -->
                  <div class="fb-post-card__body">

                    <!-- Meta: fecha + tiempo de lectura -->
                    <div class="fb-post-card__meta">
                      <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"
                            class="fb-post-card__date">
                        <svg width="14" height="14" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                          <line x1="16" y1="2" x2="16" y2="6"/>
                          <line x1="8" y1="2" x2="8" y2="6"/>
                          <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <?php echo esc_html( get_the_date() ); ?>
                      </time>

                      <?php
                      $words    = str_word_count( wp_strip_all_tags( get_the_content() ) );
                      $read_min = max( 1, (int) round( $words / 200 ) );
                      ?>
                      <span class="fb-post-card__read-time">
                        <svg width="14" height="14" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                          <circle cx="12" cy="12" r="10"/>
                          <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <?php echo $read_min === 1 ? '1 min de lectura' : "{$read_min} min de lectura"; ?>
                      </span>
                    </div>

                    <!-- Título -->
                    <h2 class="fb-post-card__title">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <!-- Extracto -->
                    <p class="fb-post-card__excerpt">
                      <?php
                      $source = has_excerpt() ? get_the_excerpt() : get_the_content();
                      echo esc_html( wp_trim_words( $source, 20, '…' ) );
                      ?>
                    </p>

                    <!-- Pie: autor + leer más -->
                    <div class="fb-post-card__footer">
                      <div class="fb-post-card__author">
                        <?php
                        echo get_avatar(
                          get_the_author_meta( 'ID' ), 28, '', get_the_author(),
                          [ 'class' => 'fb-post-card__avatar' ]
                        );
                        ?>
                        <span class="fb-post-card__author-name">
                          <?php the_author(); ?>
                        </span>
                      </div>

                      <a href="<?php the_permalink(); ?>"
                         class="fb-post-card__readmore"
                         aria-label="Leer más: <?php echo esc_attr( get_the_title() ); ?>">
                        Leer más
                        <svg width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2.5">
                          <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                      </a>
                    </div>

                  </div><!-- .fb-post-card__body -->
                </article>

              <?php endwhile; ?>
            </div><!-- .fb-posts-grid -->

            <!-- Paginación -->
            <?php
            $links = paginate_links( [
              'mid_size'           => 2,
              'prev_text'          => '← Anterior',
              'next_text'          => 'Siguiente →',
              'before_page_number' => '<span class="fb-page-num">',
              'after_page_number'  => '</span>',
            ] );
            if ( $links ) :
            ?>
              <nav class="fb-pagination" aria-label="Paginación de artículos">
                <?php echo $links; // phpcs:ignore ?>
              </nav>
            <?php endif; ?>

          <?php else : ?>

            <!-- Sin resultados -->
            <div class="fb-no-results">
              <div class="fb-no-results__icon" aria-hidden="true">
                <svg width="72" height="72" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.2">
                  <circle cx="11" cy="11" r="8"/>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                  <line x1="8" y1="11" x2="14" y2="11"/>
                </svg>
              </div>

              <?php if ( is_search() ) : ?>
                <h2 class="fb-no-results__title">Sin resultados</h2>
                <p class="fb-no-results__desc">
                  No encontramos nada para
                  "<strong><?php echo esc_html( get_search_query() ); ?></strong>".
                  Intenta con otras palabras o explora nuestras categorías.
                </p>
              <?php else : ?>
                <h2 class="fb-no-results__title">Aún no hay contenido aquí</h2>
                <p class="fb-no-results__desc">
                  Esta sección se está llenando de contenido fresco. ¡Vuelve pronto!
                </p>
              <?php endif; ?>

              <!-- Buscador -->
              <div class="fb-no-results__search">
                <form role="search" method="get" class="fb-search-form fb-search-form--inline"
                      action="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <label class="screen-reader-text" for="fb-no-results-search">
                    Buscar en el sitio:
                  </label>
                  <div class="fb-search-form__row">
                    <input type="search"
                           id="fb-no-results-search"
                           class="fb-search-form__input"
                           name="s"
                           value="<?php echo esc_attr( get_search_query() ); ?>"
                           placeholder="Buscar…"
                           autocomplete="off">
                    <button type="submit" class="fb-search-form__btn">
                      <svg width="20" height="20" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                      </svg>
                      <span class="screen-reader-text">Buscar</span>
                    </button>
                  </div>
                </form>
              </div>

              <!-- Accesos rápidos -->
              <div class="fb-no-results__links">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                   class="fb-btn fb-btn--primary fb-btn--sm">
                  ← Volver al inicio
                </a>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ?: home_url( '/tienda/' ) ); ?>"
                   class="fb-btn fb-btn--outline fb-btn--sm">
                  Explorar el mercado
                </a>
              </div>

            </div><!-- .fb-no-results -->

          <?php endif; ?>

        </div><!-- .fb-index-main -->


        <!-- ── BARRA LATERAL ─────────────────────────────── -->
        <aside class="fb-index-sidebar" role="complementary" aria-label="Barra lateral">

          <!-- Widget: Buscador -->
          <div class="fb-sidebar-widget fb-sidebar-search">
            <h3 class="fb-sidebar-widget__title">Buscar</h3>
            <form role="search" method="get" class="fb-search-form"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <label class="screen-reader-text" for="fb-sidebar-search">
                Buscar:
              </label>
              <div class="fb-search-form__row">
                <input type="search"
                       id="fb-sidebar-search"
                       class="fb-search-form__input"
                       name="s"
                       value="<?php echo esc_attr( get_search_query() ); ?>"
                       placeholder="Recetas, consejos…"
                       autocomplete="off">
                <button type="submit" class="fb-search-form__btn">
                  <svg width="18" height="18" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2.5">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                  </svg>
                </button>
              </div>
            </form>
          </div>

          <!-- Widget: Categorías -->
          <?php
          $categories = get_categories( [
            'orderby'    => 'count',
            'order'      => 'DESC',
            'hide_empty' => true,
            'number'     => 8,
          ] );
          if ( $categories ) :
          ?>
            <div class="fb-sidebar-widget fb-sidebar-categories">
              <h3 class="fb-sidebar-widget__title">Categorías</h3>
              <ul class="fb-sidebar-cat-list">
                <?php foreach ( $categories as $cat ) : ?>
                  <li class="fb-sidebar-cat-item
                    <?php echo is_category( $cat->term_id ) ? 'fb-sidebar-cat-item--active' : ''; ?>">
                    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                       class="fb-sidebar-cat-link">
                      <span><?php echo esc_html( $cat->name ); ?></span>
                      <span class="fb-sidebar-cat-count">
                        <?php echo (int) $cat->count; ?>
                      </span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- Widget: Artículos recientes -->
          <?php
          $recent_posts = get_posts( [
            'numberposts'      => 5,
            'post_status'      => 'publish',
            'suppress_filters' => true,
          ] );
          if ( $recent_posts ) :
          ?>
            <div class="fb-sidebar-widget fb-sidebar-recent">
              <h3 class="fb-sidebar-widget__title">Artículos recientes</h3>
              <ul class="fb-sidebar-recent-list">
                <?php foreach ( $recent_posts as $rp ) : ?>
                  <li class="fb-sidebar-recent-item">
                    <?php if ( has_post_thumbnail( $rp->ID ) ) : ?>
                      <a href="<?php echo esc_url( get_permalink( $rp->ID ) ); ?>"
                         class="fb-sidebar-recent-thumb"
                         tabindex="-1" aria-hidden="true">
                        <?php
                        echo get_the_post_thumbnail( $rp->ID, 'thumbnail', [
                          'class'   => 'fb-sidebar-recent-img',
                          'loading' => 'lazy',
                        ] );
                        ?>
                      </a>
                    <?php endif; ?>
                    <div class="fb-sidebar-recent-info">
                      <a href="<?php echo esc_url( get_permalink( $rp->ID ) ); ?>"
                         class="fb-sidebar-recent-title">
                        <?php echo esc_html( get_the_title( $rp->ID ) ); ?>
                      </a>
                      <time datetime="<?php echo esc_attr( get_the_date( 'c', $rp->ID ) ); ?>"
                            class="fb-sidebar-recent-date">
                        <?php echo esc_html( get_the_date( '', $rp->ID ) ); ?>
                      </time>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- Widget: Etiquetas populares -->
          <?php
          $tags = get_tags( [
            'orderby'    => 'count',
            'order'      => 'DESC',
            'hide_empty' => true,
            'number'     => 20,
          ] );
          if ( $tags ) :
          ?>
            <div class="fb-sidebar-widget fb-sidebar-tags">
              <h3 class="fb-sidebar-widget__title">Etiquetas populares</h3>
              <div class="fb-sidebar-tag-cloud">
                <?php foreach ( $tags as $tag ) : ?>
                  <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                     class="fb-tag-pill
                       <?php echo is_tag( $tag->slug ) ? 'fb-tag-pill--active' : ''; ?>">
                    <?php echo esc_html( $tag->name ); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- Widget: Banner promocional -->
          <div class="fb-sidebar-widget fb-sidebar-promo">
            <div class="fb-sidebar-promo__inner">
              <span class="fb-sidebar-promo__label">Solo esta semana</span>
              <h4 class="fb-sidebar-promo__title">Caja Orgánica Fresca</h4>
              <p class="fb-sidebar-promo__desc">
                15% de descuento en tu primer pedido de suscripción.
                Usa el código <strong>FRESCO15</strong> al pagar.
              </p>
              <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ?: home_url( '/tienda/' ) ); ?>"
                 class="fb-btn fb-btn--primary fb-btn--sm fb-btn--full">
                Ir a la tienda
              </a>
            </div>
          </div>

          <!-- Sidebar dinámico de WordPress -->
          <?php if ( is_active_sidebar( 'freshbite-main-sidebar' ) ) : ?>
            <div class="fb-sidebar-widget fb-sidebar-dynamic">
              <?php dynamic_sidebar( 'freshbite-main-sidebar' ); ?>
            </div>
          <?php endif; ?>

        </aside><!-- .fb-index-sidebar -->

      </div><!-- .fb-index-grid -->
    </div><!-- .fb-container -->
  </section>

</main><!-- #fb-main -->

<?php get_footer(); ?>