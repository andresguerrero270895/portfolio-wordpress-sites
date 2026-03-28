<?php
/**
 * home.php — FreshBite Marketplace
 * Índice del blog. WordPress lo usa cuando "Posts page"
 * está configurada en Ajustes → Lectura.
 * Idioma visual: Español
 *
 * @package FreshBite
 */

defined( 'ABSPATH' ) || exit;

get_header();

/* ── Variables globales ───────────────────────────────────── */
$paged         = max( 1, get_query_var( 'paged' ) );
$all_cats      = get_categories( [ 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC' ] );
$current_cat   = get_query_var( 'cat' ) ?: 0;
$sticky_posts  = get_option( 'sticky_posts' );
?>

<main id="fb-main" class="fb-main-content fb-blog-page" role="main">

  <!-- ═══ HERO DEL BLOG ════════════════════════════════════ -->
  <section class="fb-blog-hero">
    <div class="fb-container">
      <div class="fb-blog-hero__inner">

        <div class="fb-blog-hero__text">
          <span class="fb-blog-hero__eyebrow">
            <svg width="16" height="16" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
            </svg>
            Nuestro Blog
          </span>
          <h1 class="fb-blog-hero__title">
            Recetas, consejos<br>
            <span class="fb-blog-hero__title-accent">y vida saludable</span>
          </h1>
          <p class="fb-blog-hero__desc">
            Descubre recetas con ingredientes frescos, guías de nutrición,
            consejos de temporada y lo mejor de nuestra comunidad de productores.
          </p>

          <!-- Buscador inline -->
          <form role="search" method="get" class="fb-blog-hero__search"
                action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label class="screen-reader-text" for="fb-blog-hero-search">
              Buscar en el blog:
            </label>
            <div class="fb-blog-hero__search-row">
              <svg width="20" height="20" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2"
                   class="fb-blog-hero__search-icon" aria-hidden="true">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
              </svg>
              <input type="search"
                     id="fb-blog-hero-search"
                     class="fb-blog-hero__search-input"
                     name="s"
                     value="<?php echo esc_attr( get_search_query() ); ?>"
                     placeholder="Buscar recetas, consejos, ingredientes…"
                     autocomplete="off">
              <button type="submit" class="fb-blog-hero__search-btn">
                Buscar
              </button>
            </div>
          </form>
        </div><!-- .fb-blog-hero__text -->

        <!-- Stats del blog -->
        <div class="fb-blog-hero__stats">
          <?php
          $total_posts = wp_count_posts()->publish;
          $total_cats  = count( $all_cats );
          $total_tags  = wp_count_terms( 'post_tag', [ 'hide_empty' => true ] );
          ?>
          <div class="fb-blog-stat">
            <span class="fb-blog-stat__number">
              <?php echo (int) $total_posts; ?>
            </span>
            <span class="fb-blog-stat__label">Artículos</span>
          </div>
          <div class="fb-blog-stat__sep" aria-hidden="true"></div>
          <div class="fb-blog-stat">
            <span class="fb-blog-stat__number">
              <?php echo (int) $total_cats; ?>
            </span>
            <span class="fb-blog-stat__label">Categorías</span>
          </div>
          <div class="fb-blog-stat__sep" aria-hidden="true"></div>
          <div class="fb-blog-stat">
            <span class="fb-blog-stat__number">
              <?php echo (int) $total_tags; ?>
            </span>
            <span class="fb-blog-stat__label">Etiquetas</span>
          </div>
        </div>

      </div><!-- .fb-blog-hero__inner -->
    </div><!-- .fb-container -->
  </section><!-- .fb-blog-hero -->


  <!-- ═══ FILTRO POR CATEGORÍAS ════════════════════════════ -->
  <?php if ( $all_cats ) : ?>
    <section class="fb-blog-filters">
      <div class="fb-container">
        <nav class="fb-blog-filter-nav"
             aria-label="Filtrar por categoría"
             role="navigation">

          <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"
             class="fb-blog-filter-btn <?php echo ! $current_cat ? 'active' : ''; ?>">
            <svg width="15" height="15" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            Todos
          </a>

          <?php foreach ( $all_cats as $cat ) : ?>
            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
               class="fb-blog-filter-btn
                 <?php echo (int) $current_cat === (int) $cat->term_id ? 'active' : ''; ?>">
              <?php echo esc_html( $cat->name ); ?>
              <span class="fb-blog-filter-btn__count">
                <?php echo (int) $cat->count; ?>
              </span>
            </a>
          <?php endforeach; ?>

        </nav>
      </div>
    </section>
  <?php endif; ?>


  <!-- ═══ POST DESTACADO (sticky) ══════════════════════════ -->
  <?php
  if ( $paged === 1 && ! empty( $sticky_posts ) && ! $current_cat ) :
    $featured_query = new WP_Query( [
      'post__in'            => $sticky_posts,
      'posts_per_page'      => 1,
      'ignore_sticky_posts' => false,
      'orderby'             => 'date',
      'order'               => 'DESC',
    ] );

    if ( $featured_query->have_posts() ) :
      $featured_query->the_post();
  ?>
    <section class="fb-blog-featured">
      <div class="fb-container">

        <div class="fb-featured-post">

          <!-- Imagen -->
          <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>"
               class="fb-featured-post__thumb"
               tabindex="-1" aria-hidden="true">
              <?php the_post_thumbnail( 'large', [
                'class'   => 'fb-featured-post__img',
                'loading' => 'eager',
                'alt'     => get_the_title(),
              ] ); ?>
              <div class="fb-featured-post__overlay"></div>
            </a>
          <?php endif; ?>

          <!-- Contenido -->
          <div class="fb-featured-post__body">

            <div class="fb-featured-post__badges">
              <span class="fb-featured-badge">
                <svg width="13" height="13" viewBox="0 0 24 24"
                     fill="currentColor" aria-hidden="true">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02
                                   12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                Destacado
              </span>
              <?php
              $feat_cats = get_the_category();
              if ( $feat_cats ) :
              ?>
                <a href="<?php echo esc_url( get_category_link( $feat_cats[0]->term_id ) ); ?>"
                   class="fb-tag-pill fb-tag-pill--green">
                  <?php echo esc_html( $feat_cats[0]->name ); ?>
                </a>
              <?php endif; ?>
            </div>

            <h2 class="fb-featured-post__title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <p class="fb-featured-post__excerpt">
              <?php
              $source = has_excerpt() ? get_the_excerpt() : get_the_content();
              echo esc_html( wp_trim_words( $source, 28, '…' ) );
              ?>
            </p>

            <div class="fb-featured-post__meta">
              <?php echo get_avatar( get_the_author_meta( 'ID' ), 36, '', get_the_author(),
                [ 'class' => 'fb-featured-post__avatar' ] ); ?>
              <div>
                <span class="fb-featured-post__author"><?php the_author(); ?></span>
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"
                      class="fb-featured-post__date">
                  <?php echo esc_html( get_the_date( 'j \d\e F, Y' ) ); ?>
                </time>
              </div>
              <?php
              $feat_words    = str_word_count( wp_strip_all_tags( get_the_content() ) );
              $feat_read_min = max( 1, (int) round( $feat_words / 200 ) );
              ?>
              <span class="fb-featured-post__read-time">
                · <?php echo $feat_read_min === 1 ? '1 min' : "{$feat_read_min} min"; ?> de lectura
              </span>
            </div>

            <a href="<?php the_permalink(); ?>"
               class="fb-btn fb-btn--primary fb-btn--md fb-featured-post__cta">
              Leer artículo completo
              <svg width="16" height="16" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                <path d="M5 12h14M12 5l7 7-7 7"/>
              </svg>
            </a>

          </div><!-- .fb-featured-post__body -->
        </div><!-- .fb-featured-post -->

      </div><!-- .fb-container -->
    </section><!-- .fb-blog-featured -->

  <?php
      wp_reset_postdata();
    endif;
  endif;
  ?>


  <!-- ═══ GRID PRINCIPAL DE POSTS ══════════════════════════ -->
  <section class="fb-blog-main">
    <div class="fb-container">
      <div class="fb-blog-layout">

        <!-- ── LOOP ──────────────────────────────────────── -->
        <div class="fb-blog-content">

          <!-- Cabecera del listado -->
          <div class="fb-blog-content__header">
            <?php if ( $current_cat ) : ?>
              <h2 class="fb-blog-content__heading">
                <?php echo esc_html( get_cat_name( $current_cat ) ); ?>
              </h2>
            <?php elseif ( $paged > 1 ) : ?>
              <h2 class="fb-blog-content__heading">
                Todos los artículos
                <span class="fb-blog-content__page-num">
                  — Página <?php echo (int) $paged; ?>
                </span>
              </h2>
            <?php else : ?>
              <h2 class="fb-blog-content__heading">Últimos artículos</h2>
            <?php endif; ?>

            <!-- Selector de vista: grid / lista -->
            <div class="fb-blog-view-toggle" role="group" aria-label="Cambiar vista">
              <button class="fb-view-btn active" data-view="grid"
                      aria-pressed="true" aria-label="Vista en cuadrícula">
                <svg width="18" height="18" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="3" width="7" height="7"/>
                  <rect x="14" y="3" width="7" height="7"/>
                  <rect x="3" y="14" width="7" height="7"/>
                  <rect x="14" y="14" width="7" height="7"/>
                </svg>
              </button>
              <button class="fb-view-btn" data-view="list"
                      aria-pressed="false" aria-label="Vista en lista">
                <svg width="18" height="18" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="8" y1="6" x2="21" y2="6"/>
                  <line x1="8" y1="12" x2="21" y2="12"/>
                  <line x1="8" y1="18" x2="21" y2="18"/>
                  <line x1="3" y1="6" x2="3.01" y2="6"/>
                  <line x1="3" y1="12" x2="3.01" y2="12"/>
                  <line x1="3" y1="18" x2="3.01" y2="18"/>
                </svg>
              </button>
            </div>
          </div><!-- .fb-blog-content__header -->


          <?php if ( have_posts() ) : ?>

            <div class="fb-posts-grid" id="fb-posts-container">
              <?php while ( have_posts() ) : the_post(); ?>

                <?php
                /* Saltar sticky posts en pág 1 si ya se mostró el featured */
                if ( $paged === 1 && is_sticky() && ! $current_cat ) continue;

                $post_cats  = get_the_category();
                $post_words = str_word_count( wp_strip_all_tags( get_the_content() ) );
                $post_min   = max( 1, (int) round( $post_words / 200 ) );
                ?>

                <article id="post-<?php the_ID(); ?>"
                         <?php post_class( 'fb-post-card' ); ?>>

                  <!-- Miniatura -->
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>"
                       class="fb-post-card__thumb"
                       tabindex="-1" aria-hidden="true">
                      <?php the_post_thumbnail( 'medium_large', [
                        'class'   => 'fb-post-card__img',
                        'loading' => 'lazy',
                        'alt'     => get_the_title(),
                      ] ); ?>
                      <?php if ( $post_cats ) : ?>
                        <span class="fb-post-card__cat-badge">
                          <?php echo esc_html( $post_cats[0]->name ); ?>
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
                          <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16
                                   m-2-2l1.586-1.586a2 2 0 012.828 0L20 14
                                   M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0
                                   00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                      </div>
                    </a>
                  <?php endif; ?>

                  <!-- Cuerpo -->
                  <div class="fb-post-card__body">

                    <!-- Meta -->
                    <div class="fb-post-card__meta">
                      <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"
                            class="fb-post-card__date">
                        <svg width="13" height="13" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                          <rect x="3" y="4" width="18" height="18" rx="2"/>
                          <line x1="16" y1="2" x2="16" y2="6"/>
                          <line x1="8"  y1="2" x2="8"  y2="6"/>
                          <line x1="3"  y1="10" x2="21" y2="10"/>
                        </svg>
                        <?php echo esc_html( get_the_date() ); ?>
                      </time>
                      <span class="fb-post-card__read-time">
                        <svg width="13" height="13" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2">
                          <circle cx="12" cy="12" r="10"/>
                          <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <?php echo $post_min === 1 ? '1 min' : "{$post_min} min"; ?>
                      </span>
                      <?php if ( comments_open() ) : ?>
                        <span class="fb-post-card__comments">
                          <svg width="13" height="13" viewBox="0 0 24 24"
                               fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0
                                     012-2h14a2 2 0 012 2z"/>
                          </svg>
                          <?php echo (int) get_comments_number(); ?>
                        </span>
                      <?php endif; ?>
                    </div>

                    <!-- Título -->
                    <h2 class="fb-post-card__title">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <!-- Extracto -->
                    <p class="fb-post-card__excerpt">
                      <?php
                      $source = has_excerpt() ? get_the_excerpt() : get_the_content();
                      echo esc_html( wp_trim_words( $source, 18, '…' ) );
                      ?>
                    </p>

                    <!-- Pie de tarjeta -->
                    <div class="fb-post-card__footer">
                      <div class="fb-post-card__author">
                        <?php echo get_avatar(
                          get_the_author_meta( 'ID' ), 26, '', get_the_author(),
                          [ 'class' => 'fb-post-card__avatar' ]
                        ); ?>
                        <span class="fb-post-card__author-name">
                          <?php the_author(); ?>
                        </span>
                      </div>
                      <a href="<?php the_permalink(); ?>"
                         class="fb-post-card__readmore"
                         aria-label="Leer más: <?php echo esc_attr( get_the_title() ); ?>">
                        Leer más
                        <svg width="14" height="14" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2.5">
                          <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                      </a>
                    </div>

                  </div><!-- .fb-post-card__body -->
                </article><!-- .fb-post-card -->

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
              <nav class="fb-pagination" aria-label="Paginación del blog">
                <?php echo $links; // phpcs:ignore ?>
              </nav>
            <?php endif; ?>

          <?php else : ?>

            <!-- Sin posts -->
            <div class="fb-no-results">
              <div class="fb-no-results__icon" aria-hidden="true">
                <svg width="64" height="64" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.2">
                  <path d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                </svg>
              </div>
              <h2 class="fb-no-results__title">Aún no hay artículos</h2>
              <p class="fb-no-results__desc">
                Estamos preparando contenido fresco para ti. ¡Vuelve pronto!
              </p>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                 class="fb-btn fb-btn--primary fb-btn--sm">
                ← Volver al inicio
              </a>
            </div>

          <?php endif; ?>

        </div><!-- .fb-blog-content -->


        <!-- ── BARRA LATERAL ─────────────────────────────── -->
        <aside class="fb-blog-sidebar" role="complementary"
               aria-label="Barra lateral del blog">

          <!-- Widget: Buscador -->
          <div class="fb-sidebar-widget fb-sidebar-search">
            <h3 class="fb-sidebar-widget__title">Buscar</h3>
            <form role="search" method="get" class="fb-search-form"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <label class="screen-reader-text" for="fb-blog-sidebar-search">
                Buscar:
              </label>
              <div class="fb-search-form__row">
                <input type="search"
                       id="fb-blog-sidebar-search"
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
          <?php if ( $all_cats ) : ?>
            <div class="fb-sidebar-widget fb-sidebar-categories">
              <h3 class="fb-sidebar-widget__title">Categorías</h3>
              <ul class="fb-sidebar-cat-list">
                <li class="fb-sidebar-cat-item <?php echo ! $current_cat ? 'fb-sidebar-cat-item--active' : ''; ?>">
                  <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"
                     class="fb-sidebar-cat-link">
                    <span>Todos los artículos</span>
                    <span class="fb-sidebar-cat-count">
                      <?php echo (int) wp_count_posts()->publish; ?>
                    </span>
                  </a>
                </li>
                <?php foreach ( $all_cats as $cat ) : ?>
                  <li class="fb-sidebar-cat-item
                    <?php echo (int) $current_cat === (int) $cat->term_id
                      ? 'fb-sidebar-cat-item--active' : ''; ?>">
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

          <!-- Widget: Artículos más vistos -->
          <?php
          $popular = new WP_Query( [
            'posts_per_page'      => 4,
            'orderby'             => 'comment_count',
            'order'               => 'DESC',
            'ignore_sticky_posts' => true,
          ] );
          if ( $popular->have_posts() ) :
          ?>
            <div class="fb-sidebar-widget fb-sidebar-popular">
              <h3 class="fb-sidebar-widget__title">
                <svg width="16" height="16" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                  <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                  <polyline points="17 6 23 6 23 12"/>
                </svg>
                Lo más popular
              </h3>
              <ol class="fb-sidebar-popular-list">
                <?php
                $pop_num = 1;
                while ( $popular->have_posts() ) :
                  $popular->the_post();
                ?>
                  <li class="fb-sidebar-popular-item">
                    <span class="fb-sidebar-popular-num">
                      <?php echo sprintf( '%02d', $pop_num ); ?>
                    </span>
                    <div class="fb-sidebar-popular-info">
                      <a href="<?php the_permalink(); ?>"
                         class="fb-sidebar-popular-title">
                        <?php the_title(); ?>
                      </a>
                      <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"
                            class="fb-sidebar-popular-date">
                        <?php echo esc_html( get_the_date() ); ?>
                      </time>
                    </div>
                  </li>
                <?php
                  $pop_num++;
                endwhile;
                wp_reset_postdata();
                ?>
              </ol>
            </div>
          <?php endif; ?>

          <!-- Widget: Artículos recientes -->
          <?php
          $recent = get_posts( [
            'numberposts'      => 3,
            'post_status'      => 'publish',
            'suppress_filters' => true,
          ] );
          if ( $recent ) :
          ?>
            <div class="fb-sidebar-widget fb-sidebar-recent">
              <h3 class="fb-sidebar-widget__title">Artículos recientes</h3>
              <ul class="fb-sidebar-recent-list">
                <?php foreach ( $recent as $rp ) : ?>
                  <li class="fb-sidebar-recent-item">
                    <?php if ( has_post_thumbnail( $rp->ID ) ) : ?>
                      <a href="<?php echo esc_url( get_permalink( $rp->ID ) ); ?>"
                         class="fb-sidebar-recent-thumb"
                         tabindex="-1" aria-hidden="true">
                        <?php echo get_the_post_thumbnail( $rp->ID, 'thumbnail', [
                          'class'   => 'fb-sidebar-recent-img',
                          'loading' => 'lazy',
                        ] ); ?>
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
            'number'     => 18,
          ] );
          if ( $tags ) :
          ?>
            <div class="fb-sidebar-widget fb-sidebar-tags">
              <h3 class="fb-sidebar-widget__title">Etiquetas populares</h3>
              <div class="fb-sidebar-tag-cloud">
                <?php foreach ( $tags as $tag ) : ?>
                  <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                     class="fb-tag-pill fb-tag-pill--sm">
                    <?php echo esc_html( $tag->name ); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- Widget: Newsletter -->
          <div class="fb-sidebar-widget fb-sidebar-newsletter">
            <div class="fb-sidebar-newsletter__inner">
              <div class="fb-sidebar-newsletter__icon" aria-hidden="true">
                <svg width="32" height="32" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4
                           c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                  <polyline points="22,6 12,13 2,6"/>
                </svg>
              </div>
              <h4 class="fb-sidebar-newsletter__title">
                Recetas frescas en tu correo
              </h4>
              <p class="fb-sidebar-newsletter__desc">
                Suscríbete y recibe las mejores recetas de temporada cada semana.
              </p>
              <form class="fb-sidebar-newsletter__form"
                    id="fb-blog-newsletter-form"
                    novalidate>
                <label class="screen-reader-text" for="fb-blog-newsletter-email">
                  Tu correo electrónico:
                </label>
                <input type="email"
                       id="fb-blog-newsletter-email"
                       class="fb-sidebar-newsletter__input"
                       name="email"
                       placeholder="tu@correo.com"
                       required
                       autocomplete="email">
                <button type="submit" class="fb-btn fb-btn--primary fb-btn--sm fb-btn--full">
                  Suscribirme gratis
                </button>
                <p class="fb-sidebar-newsletter__legal">
                  Sin spam. Cancela cuando quieras.
                </p>
              </form>
            </div>
          </div><!-- .fb-sidebar-newsletter -->

          <!-- Widget: Banner promo -->
          <div class="fb-sidebar-widget fb-sidebar-promo">
            <div class="fb-sidebar-promo__inner">
              <span class="fb-sidebar-promo__label">Solo esta semana</span>
              <h4 class="fb-sidebar-promo__title">Caja Orgánica Fresca</h4>
              <p class="fb-sidebar-promo__desc">
                15% de descuento en tu primer pedido.
                Usa el código <strong>FRESCO15</strong>.
              </p>
              <a href="<?php echo esc_url(
                wc_get_page_permalink( 'shop' ) ?: home_url( '/tienda/' )
              ); ?>"
                 class="fb-btn fb-btn--primary fb-btn--sm fb-btn--full">
                Ir a la tienda
              </a>
            </div>
          </div>

          <!-- Sidebar dinámico WP -->
          <?php if ( is_active_sidebar( 'freshbite-blog-sidebar' ) ) : ?>
            <div class="fb-sidebar-widget fb-sidebar-dynamic">
              <?php dynamic_sidebar( 'freshbite-blog-sidebar' ); ?>
            </div>
          <?php endif; ?>

        </aside><!-- .fb-blog-sidebar -->

      </div><!-- .fb-blog-layout -->
    </div><!-- .fb-container -->
  </section><!-- .fb-blog-main -->

</main><!-- #fb-main -->

<?php get_footer(); ?>