<?php
/**
 * single.php — FreshBite Marketplace
 * Template para posts individuales del blog.
 * Idioma visual: Español
 *
 * @package FreshBite
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="fb-main" class="fb-main-content fb-single-post" role="main">

  <?php while ( have_posts() ) : the_post(); ?>

    <!-- ═══ HERO DEL POST ════════════════════════════════════ -->
    <section class="fb-post-hero
      <?php echo has_post_thumbnail() ? 'fb-post-hero--with-image' : 'fb-post-hero--no-image'; ?>">

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="fb-post-hero__bg">
          <?php the_post_thumbnail( 'full', [
            'class' => 'fb-post-hero__bg-img',
            'alt'   => '',
            'aria-hidden' => 'true',
          ] ); ?>
          <div class="fb-post-hero__overlay"></div>
        </div>
      <?php endif; ?>

      <div class="fb-container">
        <div class="fb-post-hero__inner">

          <!-- Migas de pan -->
          <nav class="fb-breadcrumbs fb-breadcrumbs--light" aria-label="Migas de pan">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
            <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
            <?php
            $cats = get_the_category();
            if ( $cats ) :
            ?>
              <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
              <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>">
                <?php echo esc_html( $cats[0]->name ); ?>
              </a>
            <?php endif; ?>
            <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>
            <span class="fb-breadcrumbs__current">
              <?php echo esc_html( wp_trim_words( get_the_title(), 6, '…' ) ); ?>
            </span>
          </nav>

          <!-- Categorías / etiquetas -->
          <?php if ( $cats ) : ?>
            <div class="fb-post-hero__cats">
              <?php foreach ( array_slice( $cats, 0, 3 ) as $cat ) : ?>
                <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                   class="fb-tag-pill fb-tag-pill--green">
                  <?php echo esc_html( $cat->name ); ?>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <!-- Título -->
          <h1 class="fb-post-hero__title"><?php the_title(); ?></h1>

          <!-- Meta del post -->
          <div class="fb-post-hero__meta">

            <!-- Autor -->
            <div class="fb-post-hero__author">
              <?php
              echo get_avatar(
                get_the_author_meta( 'ID' ), 44, '', get_the_author(),
                [ 'class' => 'fb-post-hero__avatar' ]
              );
              ?>
              <div class="fb-post-hero__author-info">
                <span class="fb-post-hero__author-label">Escrito por</span>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                   class="fb-post-hero__author-name">
                  <?php the_author(); ?>
                </a>
              </div>
            </div>

            <div class="fb-post-hero__meta-divider" aria-hidden="true"></div>

            <!-- Fecha -->
            <div class="fb-post-hero__date">
              <svg width="16" height="16" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
              </svg>
              <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date( 'j \d\e F, Y' ) ); ?>
              </time>
            </div>

            <!-- Tiempo de lectura -->
            <?php
            $words    = str_word_count( wp_strip_all_tags( get_the_content() ) );
            $read_min = max( 1, (int) round( $words / 200 ) );
            ?>
            <div class="fb-post-hero__read-time">
              <svg width="16" height="16" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 6 12 12 16 14"/>
              </svg>
              <?php echo $read_min === 1 ? '1 min de lectura' : "{$read_min} min de lectura"; ?>
            </div>

            <!-- Comentarios -->
            <?php if ( comments_open() ) : ?>
              <div class="fb-post-hero__comments">
                <svg width="16" height="16" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                  <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                </svg>
                <?php
                $count = get_comments_number();
                echo $count === '0' ? 'Sin comentarios'
                  : ( $count === '1' ? '1 comentario' : $count . ' comentarios' );
                ?>
              </div>
            <?php endif; ?>

          </div><!-- .fb-post-hero__meta -->

        </div><!-- .fb-post-hero__inner -->
      </div><!-- .fb-container -->
    </section><!-- .fb-post-hero -->


    <!-- ═══ LAYOUT: CONTENIDO + SIDEBAR ══════════════════════ -->
    <section class="fb-post-layout">
      <div class="fb-container">
        <div class="fb-post-grid">

          <!-- ── CONTENIDO PRINCIPAL ──────────────────────── -->
          <article class="fb-post-content-area">

            <!-- Barra de progreso de lectura -->
            <div class="fb-reading-progress" aria-hidden="true">
              <div class="fb-reading-progress__bar" id="fb-reading-bar"></div>
            </div>

            <!-- Contenido del post -->
            <div class="fb-post-content fb-prose">
              <?php the_content(); ?>
            </div>

            <!-- Paginación del contenido (<!--nextpage-->) -->
            <?php
            wp_link_pages( [
              'before'      => '<nav class="fb-post-pages" aria-label="Páginas del artículo"><span class="fb-post-pages__label">Páginas:</span>',
              'after'       => '</nav>',
              'link_before' => '<span class="fb-post-pages__link">',
              'link_after'  => '</span>',
            ] );
            ?>

            <!-- Tags del post -->
            <?php
            $post_tags = get_the_tags();
            if ( $post_tags ) :
            ?>
              <div class="fb-post-tags">
                <span class="fb-post-tags__label">
                  <svg width="16" height="16" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                    <line x1="7" y1="7" x2="7.01" y2="7"/>
                  </svg>
                  Etiquetas:
                </span>
                <div class="fb-post-tags__list">
                  <?php foreach ( $post_tags as $tag ) : ?>
                    <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                       class="fb-tag-pill fb-tag-pill--sm">
                      <?php echo esc_html( $tag->name ); ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

            <!-- Compartir -->
            <div class="fb-post-share">
              <span class="fb-post-share__label">Compartir este artículo:</span>
              <div class="fb-post-share__btns">

                <?php
                $post_url   = urlencode( get_permalink() );
                $post_title = urlencode( get_the_title() );
                ?>

                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
                   class="fb-share-btn fb-share-btn--facebook"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="Compartir en Facebook">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                  </svg>
                  <span>Facebook</span>
                </a>

                <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>"
                   class="fb-share-btn fb-share-btn--twitter"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="Compartir en X (Twitter)">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M4 4l16 16M4 20L20 4"/>
                  </svg>
                  <span>X</span>
                </a>

                <a href="https://wa.me/?text=<?php echo $post_title; ?>%20<?php echo $post_url; ?>"
                   class="fb-share-btn fb-share-btn--whatsapp"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="Compartir por WhatsApp">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                  </svg>
                  <span>WhatsApp</span>
                </a>

                <button class="fb-share-btn fb-share-btn--copy"
                        data-url="<?php echo esc_url( get_permalink() ); ?>"
                        aria-label="Copiar enlace">
                  <svg width="18" height="18" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                    <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/>
                  </svg>
                  <span>Copiar enlace</span>
                </button>

              </div>
            </div><!-- .fb-post-share -->


            <!-- ── CAJA DEL AUTOR ────────────────────────── -->
            <?php
            $author_id   = get_the_author_meta( 'ID' );
            $author_bio  = get_the_author_meta( 'description' );
            $author_url  = get_author_posts_url( $author_id );
            ?>
            <div class="fb-author-box">
              <div class="fb-author-box__avatar">
                <?php echo get_avatar( $author_id, 80, '', get_the_author(),
                  [ 'class' => 'fb-author-box__img' ] ); ?>
              </div>
              <div class="fb-author-box__info">
                <span class="fb-author-box__label">Sobre el autor</span>
                <h3 class="fb-author-box__name">
                  <a href="<?php echo esc_url( $author_url ); ?>">
                    <?php the_author(); ?>
                  </a>
                </h3>
                <?php if ( $author_bio ) : ?>
                  <p class="fb-author-box__bio">
                    <?php echo esc_html( $author_bio ); ?>
                  </p>
                <?php endif; ?>
                <a href="<?php echo esc_url( $author_url ); ?>"
                   class="fb-author-box__link">
                  Ver todos sus artículos
                  <svg width="14" height="14" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                  </svg>
                </a>
              </div>
            </div><!-- .fb-author-box -->


            <!-- ── NAVEGACIÓN ENTRE POSTS ────────────────── -->
            <nav class="fb-post-navigation" aria-label="Navegación entre artículos">
              <?php
              $prev_post = get_previous_post();
              $next_post = get_next_post();
              ?>

              <?php if ( $prev_post ) : ?>
                <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>"
                   class="fb-post-nav-item fb-post-nav-item--prev">
                  <span class="fb-post-nav-item__direction">
                    <svg width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5">
                      <path d="M19 12H5M12 5l-7 7 7 7"/>
                    </svg>
                    Anterior
                  </span>
                  <span class="fb-post-nav-item__title">
                    <?php echo esc_html( wp_trim_words( $prev_post->post_title, 8, '…' ) ); ?>
                  </span>
                </a>
              <?php endif; ?>

              <?php if ( $next_post ) : ?>
                <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>"
                   class="fb-post-nav-item fb-post-nav-item--next">
                  <span class="fb-post-nav-item__direction">
                    Siguiente
                    <svg width="16" height="16" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5">
                      <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                  </span>
                  <span class="fb-post-nav-item__title">
                    <?php echo esc_html( wp_trim_words( $next_post->post_title, 8, '…' ) ); ?>
                  </span>
                </a>
              <?php endif; ?>

            </nav><!-- .fb-post-navigation -->


            <!-- ── POSTS RELACIONADOS ────────────────────── -->
            <?php
            $related_cats = wp_get_post_categories( get_the_ID(), [ 'fields' => 'ids' ] );
            if ( $related_cats ) :
              $related = new WP_Query( [
                'category__in'        => $related_cats,
                'post__not_in'        => [ get_the_ID() ],
                'posts_per_page'      => 3,
                'orderby'             => 'rand',
                'ignore_sticky_posts' => true,
              ] );
            ?>
              <?php if ( $related->have_posts() ) : ?>
                <div class="fb-related-posts">
                  <h3 class="fb-related-posts__title">
                    <svg width="20" height="20" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <path d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                    Artículos relacionados
                  </h3>

                  <div class="fb-related-posts__grid">
                    <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                      <article class="fb-related-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                          <a href="<?php the_permalink(); ?>"
                             class="fb-related-card__thumb"
                             tabindex="-1" aria-hidden="true">
                            <?php the_post_thumbnail( 'medium', [
                              'class'   => 'fb-related-card__img',
                              'loading' => 'lazy',
                              'alt'     => get_the_title(),
                            ] ); ?>
                          </a>
                        <?php endif; ?>
                        <div class="fb-related-card__body">
                          <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"
                                class="fb-related-card__date">
                            <?php echo esc_html( get_the_date() ); ?>
                          </time>
                          <h4 class="fb-related-card__title">
                            <a href="<?php the_permalink(); ?>">
                              <?php the_title(); ?>
                            </a>
                          </h4>
                          <p class="fb-related-card__excerpt">
                            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 15, '…' ) ); ?>
                          </p>
                        </div>
                      </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                  </div>
                </div><!-- .fb-related-posts -->
              <?php endif; ?>
            <?php endif; ?>


            <!-- ── COMENTARIOS ───────────────────────────── -->
            <?php
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
            ?>

          </article><!-- .fb-post-content-area -->


          <!-- ── BARRA LATERAL ─────────────────────────── -->
          <aside class="fb-post-sidebar" role="complementary" aria-label="Barra lateral">

            <!-- Widget: Buscador -->
            <div class="fb-sidebar-widget fb-sidebar-search">
              <h3 class="fb-sidebar-widget__title">Buscar</h3>
              <form role="search" method="get" class="fb-search-form"
                    action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label class="screen-reader-text" for="fb-post-sidebar-search">Buscar:</label>
                <div class="fb-search-form__row">
                  <input type="search"
                         id="fb-post-sidebar-search"
                         class="fb-search-form__input"
                         name="s"
                         placeholder="Buscar recetas, consejos…"
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

            <!-- Widget: Tabla de contenidos (generada por JS) -->
            <div class="fb-sidebar-widget fb-sidebar-toc" id="fb-toc-widget">
              <h3 class="fb-sidebar-widget__title">
                <svg width="16" height="16" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                  <line x1="8" y1="6" x2="21" y2="6"/>
                  <line x1="8" y1="12" x2="21" y2="12"/>
                  <line x1="8" y1="18" x2="21" y2="18"/>
                  <line x1="3" y1="6" x2="3.01" y2="6"/>
                  <line x1="3" y1="12" x2="3.01" y2="12"/>
                  <line x1="3" y1="18" x2="3.01" y2="18"/>
                </svg>
                Contenido
              </h3>
              <nav class="fb-toc" id="fb-toc" aria-label="Tabla de contenidos">
                <!-- Generado por JS en main.js -->
              </nav>
            </div>

            <!-- Widget: Categorías -->
            <?php
            $cats_sidebar = get_categories( [
              'orderby'    => 'count',
              'order'      => 'DESC',
              'hide_empty' => true,
              'number'     => 7,
            ] );
            if ( $cats_sidebar ) :
            ?>
              <div class="fb-sidebar-widget fb-sidebar-categories">
                <h3 class="fb-sidebar-widget__title">Categorías</h3>
                <ul class="fb-sidebar-cat-list">
                  <?php foreach ( $cats_sidebar as $cat ) : ?>
                    <li class="fb-sidebar-cat-item
                      <?php echo in_category( $cat->term_id ) ? 'fb-sidebar-cat-item--active' : ''; ?>">
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

            <!-- Widget: Posts recientes -->
            <?php
            $recent = get_posts( [
              'numberposts'      => 4,
              'post_status'      => 'publish',
              'post__not_in'     => [ get_the_ID() ],
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
            $sidebar_tags = get_tags( [
              'orderby'    => 'count',
              'order'      => 'DESC',
              'hide_empty' => true,
              'number'     => 15,
            ] );
            if ( $sidebar_tags ) :
            ?>
              <div class="fb-sidebar-widget fb-sidebar-tags">
                <h3 class="fb-sidebar-widget__title">Etiquetas populares</h3>
                <div class="fb-sidebar-tag-cloud">
                  <?php foreach ( $sidebar_tags as $tag ) : ?>
                    <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                       class="fb-tag-pill fb-tag-pill--sm
                         <?php echo has_tag( $tag->slug ) ? 'fb-tag-pill--active' : ''; ?>">
                      <?php echo esc_html( $tag->name ); ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

            <!-- Widget: Banner promo -->
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

            <!-- Sidebar dinámico WP -->
            <?php if ( is_active_sidebar( 'freshbite-post-sidebar' ) ) : ?>
              <div class="fb-sidebar-widget fb-sidebar-dynamic">
                <?php dynamic_sidebar( 'freshbite-post-sidebar' ); ?>
              </div>
            <?php endif; ?>

          </aside><!-- .fb-post-sidebar -->

        </div><!-- .fb-post-grid -->
      </div><!-- .fb-container -->
    </section><!-- .fb-post-layout -->

  <?php endwhile; ?>

</main><!-- #fb-main -->

<?php get_footer(); ?>