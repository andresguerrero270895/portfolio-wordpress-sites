<?php
/**
 * index.php — FreshBite Marketplace
 * Fallback template. WordPress lo usa cuando ningún otro
 * template más específico aplica para la request actual.
 *
 * Cubre: archive genérico, search, fallback de blog, etc.
 *
 * @package FreshBite
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="fb-main" class="fb-main-content fb-index-page" role="main">

  <?php /* ── Hero / Page Header ───────────────────────────── */ ?>
  <section class="fb-page-header">
    <div class="fb-container">

      <?php if ( is_search() ) : ?>
        <span class="fb-page-header__eyebrow">Search Results</span>
        <h1 class="fb-page-header__title">
          <?php
          /* translators: %s search term */
          printf(
            esc_html__( 'Results for: "%s"', 'freshbite' ),
            '<span class="fb-search-term">' . esc_html( get_search_query() ) . '</span>'
          );
          ?>
        </h1>
        <?php if ( $GLOBALS['wp_query']->found_posts ) : ?>
          <p class="fb-page-header__sub">
            <?php
            printf(
              esc_html( _n(
                '%d result found',
                '%d results found',
                $GLOBALS['wp_query']->found_posts,
                'freshbite'
              ) ),
              (int) $GLOBALS['wp_query']->found_posts
            );
            ?>
          </p>
        <?php endif; ?>

      <?php elseif ( is_archive() ) : ?>
        <span class="fb-page-header__eyebrow">
          <?php
          if ( is_category() )          esc_html_e( 'Category', 'freshbite' );
          elseif ( is_tag() )           esc_html_e( 'Tag', 'freshbite' );
          elseif ( is_author() )        esc_html_e( 'Author', 'freshbite' );
          elseif ( is_date() )          esc_html_e( 'Archive', 'freshbite' );
          elseif ( is_post_type_archive() ) esc_html_e( 'Archive', 'freshbite' );
          else                          esc_html_e( 'Browse', 'freshbite' );
          ?>
        </span>
        <h1 class="fb-page-header__title">
          <?php the_archive_title(); ?>
        </h1>
        <?php
        $archive_desc = get_the_archive_description();
        if ( $archive_desc ) :
        ?>
          <div class="fb-page-header__desc">
            <?php echo wp_kses_post( $archive_desc ); ?>
          </div>
        <?php endif; ?>

      <?php elseif ( is_home() ) : ?>
        <span class="fb-page-header__eyebrow">
          <?php esc_html_e( 'Fresh from our kitchen', 'freshbite' ); ?>
        </span>
        <h1 class="fb-page-header__title">
          <?php
          if ( is_front_page() ) {
            esc_html_e( 'Latest News & Recipes', 'freshbite' );
          } else {
            single_post_title();
          }
          ?>
        </h1>

      <?php else : ?>
        <h1 class="fb-page-header__title">
          <?php
          if ( is_404() ) {
            esc_html_e( 'Page Not Found', 'freshbite' );
          } else {
            the_title();
          }
          ?>
        </h1>
      <?php endif; ?>

      <?php /* Breadcrumbs simples */ ?>
      <nav class="fb-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'freshbite' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php esc_html_e( 'Home', 'freshbite' ); ?>
        </a>
        <span class="fb-breadcrumbs__sep" aria-hidden="true">›</span>

        <?php if ( is_search() ) : ?>
          <span><?php esc_html_e( 'Search', 'freshbite' ); ?></span>

        <?php elseif ( is_category() || is_tag() || is_tax() ) : ?>
          <span><?php single_term_title(); ?></span>

        <?php elseif ( is_author() ) : ?>
          <span><?php the_author(); ?></span>

        <?php elseif ( is_archive() ) : ?>
          <span><?php the_archive_title( '', '' ); ?></span>

        <?php elseif ( is_home() ) : ?>
          <span><?php esc_html_e( 'Blog', 'freshbite' ); ?></span>

        <?php else : ?>
          <span><?php the_title(); ?></span>
        <?php endif; ?>
      </nav>

    </div><!-- .fb-container -->
  </section><!-- .fb-page-header -->


  <?php /* ── Main Layout ──────────────────────────────────── */ ?>
  <section class="fb-index-layout">
    <div class="fb-container">
      <div class="fb-index-grid">

        <?php /* ────── Posts Loop ────── */ ?>
        <div class="fb-index-main">

          <?php if ( have_posts() ) : ?>

            <?php
            /* Search results bar */
            if ( is_search() ) : ?>
              <div class="fb-search-meta">
                <?php
                global $wp_query;
                printf(
                  esc_html__( 'Showing %1$d–%2$d of %3$d results', 'freshbite' ),
                  (int) ( ( get_query_var( 'paged' ) > 1 ? get_query_var( 'paged' ) - 1 : 0 ) * $wp_query->query_vars['posts_per_page'] + 1 ),
                  (int) min( get_query_var( 'paged' ) * $wp_query->query_vars['posts_per_page'] ?: $wp_query->post_count, $wp_query->found_posts ),
                  (int) $wp_query->found_posts
                );
                ?>
              </div>
            <?php endif; ?>

            <div class="fb-posts-grid">
              <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>"
                         <?php post_class( 'fb-post-card' ); ?>>

                  <?php /* Thumbnail */ ?>
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>"
                       class="fb-post-card__thumb"
                       tabindex="-1"
                       aria-hidden="true">
                      <?php
                      the_post_thumbnail(
                        'medium_large',
                        [
                          'class'   => 'fb-post-card__img',
                          'loading' => 'lazy',
                          'alt'     => get_the_title(),
                        ]
                      );
                      ?>

                      <?php
                      /* Badge de categoría sobre la imagen */
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
                       tabindex="-1"
                       aria-hidden="true">
                      <div class="fb-post-card__no-img">
                        <svg width="40" height="40" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.5"
                             aria-hidden="true">
                          <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                      </div>
                    </a>
                  <?php endif; ?>

                  <?php /* Card Body */ ?>
                  <div class="fb-post-card__body">

                    <?php /* Meta: fecha + tiempo de lectura */ ?>
                    <div class="fb-post-card__meta">
                      <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"
                            class="fb-post-card__date">
                        <svg width="14" height="14" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             aria-hidden="true">
                          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                          <line x1="16" y1="2" x2="16" y2="6"/>
                          <line x1="8" y1="2" x2="8" y2="6"/>
                          <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <?php echo esc_html( get_the_date() ); ?>
                      </time>

                      <?php
                      /* Estimado de lectura */
                      $words    = str_word_count( wp_strip_all_tags( get_the_content() ) );
                      $read_min = max( 1, (int) round( $words / 200 ) );
                      ?>
                      <span class="fb-post-card__read-time">
                        <svg width="14" height="14" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             aria-hidden="true">
                          <circle cx="12" cy="12" r="10"/>
                          <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <?php
                        printf(
                          /* translators: %d minutes */
                          esc_html( _n( '%d min read', '%d min read', $read_min, 'freshbite' ) ),
                          (int) $read_min
                        );
                        ?>
                      </span>
                    </div>

                    <?php /* Title */ ?>
                    <h2 class="fb-post-card__title">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h2>

                    <?php /* Excerpt */ ?>
                    <p class="fb-post-card__excerpt">
                      <?php
                      if ( has_excerpt() ) {
                        echo esc_html( wp_trim_words( get_the_excerpt(), 20, '…' ) );
                      } else {
                        echo esc_html( wp_trim_words( get_the_content(), 20, '…' ) );
                      }
                      ?>
                    </p>

                    <?php /* Footer: autor + tags */ ?>
                    <div class="fb-post-card__footer">
                      <div class="fb-post-card__author">
                        <?php
                        echo get_avatar(
                          get_the_author_meta( 'ID' ),
                          28,
                          '',
                          get_the_author(),
                          [ 'class' => 'fb-post-card__avatar' ]
                        );
                        ?>
                        <span class="fb-post-card__author-name">
                          <?php the_author(); ?>
                        </span>
                      </div>

                      <a href="<?php the_permalink(); ?>"
                         class="fb-post-card__readmore"
                         aria-label="<?php
                           printf(
                             esc_attr__( 'Read more: %s', 'freshbite' ),
                             esc_attr( get_the_title() )
                           );
                         ?>">
                        <?php esc_html_e( 'Read more', 'freshbite' ); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2.5"
                             aria-hidden="true">
                          <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                      </a>
                    </div><!-- .fb-post-card__footer -->

                  </div><!-- .fb-post-card__body -->
                </article><!-- .fb-post-card -->

              <?php endwhile; ?>
            </div><!-- .fb-posts-grid -->

            <?php /* Paginación */ ?>
            <?php
            $pagination_args = [
              'mid_size'           => 2,
              'prev_text'          => sprintf(
                '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                   <path d="M19 12H5M12 5l-7 7 7 7"/>
                 </svg><span class="screen-reader-text">%s</span>',
                esc_html__( 'Previous', 'freshbite' )
              ),
              'next_text'          => sprintf(
                '<span class="screen-reader-text">%s</span>
                 <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                   <path d="M5 12h14M12 5l7 7-7 7"/>
                 </svg>',
                esc_html__( 'Next', 'freshbite' )
              ),
              'before_page_number' => '<span class="fb-page-num">',
              'after_page_number'  => '</span>',
            ];

            $links = paginate_links( $pagination_args );
            if ( $links ) :
            ?>
              <nav class="fb-pagination" aria-label="<?php esc_attr_e( 'Posts pagination', 'freshbite' ); ?>">
                <?php echo $links; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
              </nav>
            <?php endif; ?>

          <?php else : ?>
            <?php /* No results */ ?>
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
                <h2 class="fb-no-results__title">
                  <?php esc_html_e( 'No results found', 'freshbite' ); ?>
                </h2>
                <p class="fb-no-results__desc">
                  <?php
                  printf(
                    esc_html__( 'We couldn\'t find anything matching "%s". Try different keywords or browse our categories below.', 'freshbite' ),
                    '<strong>' . esc_html( get_search_query() ) . '</strong>'
                  );
                  ?>
                </p>
              <?php else : ?>
                <h2 class="fb-no-results__title">
                  <?php esc_html_e( 'Nothing here yet', 'freshbite' ); ?>
                </h2>
                <p class="fb-no-results__desc">
                  <?php esc_html_e( 'Looks like this section is still being filled with fresh content. Come back soon!', 'freshbite' ); ?>
                </p>
              <?php endif; ?>

              <?php /* Search form */ ?>
              <div class="fb-no-results__search">
                <form role="search"
                      method="get"
                      class="fb-search-form fb-search-form--inline"
                      action="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <label class="screen-reader-text"
                         for="fb-no-results-search">
                    <?php esc_html_e( 'Search site:', 'freshbite' ); ?>
                  </label>
                  <div class="fb-search-form__row">
                    <input type="search"
                           id="fb-no-results-search"
                           class="fb-search-form__input"
                           name="s"
                           value="<?php echo esc_attr( get_search_query() ); ?>"
                           placeholder="<?php esc_attr_e( 'Try searching…', 'freshbite' ); ?>"
                           autocomplete="off">
                    <button type="submit" class="fb-search-form__btn">
                      <svg width="20" height="20" viewBox="0 0 24 24"
                           fill="none" stroke="currentColor" stroke-width="2.5"
                           aria-hidden="true">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                      </svg>
                      <span class="screen-reader-text">
                        <?php esc_html_e( 'Search', 'freshbite' ); ?>
                      </span>
                    </button>
                  </div>
                </form>
              </div>

              <?php /* Quick links */ ?>
              <div class="fb-no-results__links">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                   class="fb-btn fb-btn--primary fb-btn--sm">
                  <?php esc_html_e( '← Back to Home', 'freshbite' ); ?>
                </a>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ?: home_url( '/shop/' ) ); ?>"
                   class="fb-btn fb-btn--outline fb-btn--sm">
                  <?php esc_html_e( 'Browse the Market', 'freshbite' ); ?>
                </a>
              </div>

            </div><!-- .fb-no-results -->
          <?php endif; ?>

        </div><!-- .fb-index-main -->


        <?php /* ────── Sidebar ────── */ ?>
        <aside class="fb-index-sidebar" role="complementary"
               aria-label="<?php esc_attr_e( 'Sidebar', 'freshbite' ); ?>">

          <?php /* Widget: Search */ ?>
          <div class="fb-sidebar-widget fb-sidebar-search">
            <h3 class="fb-sidebar-widget__title">
              <?php esc_html_e( 'Search', 'freshbite' ); ?>
            </h3>
            <form role="search"
                  method="get"
                  class="fb-search-form"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <label class="screen-reader-text" for="fb-sidebar-search">
                <?php esc_html_e( 'Search:', 'freshbite' ); ?>
              </label>
              <div class="fb-search-form__row">
                <input type="search"
                       id="fb-sidebar-search"
                       class="fb-search-form__input"
                       name="s"
                       value="<?php echo esc_attr( get_search_query() ); ?>"
                       placeholder="<?php esc_attr_e( 'Search recipes, tips…', 'freshbite' ); ?>"
                       autocomplete="off">
                <button type="submit" class="fb-search-form__btn">
                  <svg width="18" height="18" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2.5"
                       aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                  </svg>
                </button>
              </div>
            </form>
          </div>

          <?php /* Widget: Categorías */ ?>
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
              <h3 class="fb-sidebar-widget__title">
                <?php esc_html_e( 'Categories', 'freshbite' ); ?>
              </h3>
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

          <?php /* Widget: Posts Recientes */ ?>
          <?php
          $recent_posts = get_posts( [
            'numberposts'      => 5,
            'post_status'      => 'publish',
            'suppress_filters' => true,
          ] );

          if ( $recent_posts ) :
          ?>
            <div class="fb-sidebar-widget fb-sidebar-recent">
              <h3 class="fb-sidebar-widget__title">
                <?php esc_html_e( 'Recent Posts', 'freshbite' ); ?>
              </h3>
              <ul class="fb-sidebar-recent-list">
                <?php foreach ( $recent_posts as $rp ) : ?>
                  <li class="fb-sidebar-recent-item">
                    <?php if ( has_post_thumbnail( $rp->ID ) ) : ?>
                      <a href="<?php echo esc_url( get_permalink( $rp->ID ) ); ?>"
                         class="fb-sidebar-recent-thumb"
                         tabindex="-1" aria-hidden="true">
                        <?php
                        echo get_the_post_thumbnail(
                          $rp->ID,
                          'thumbnail',
                          [ 'class' => 'fb-sidebar-recent-img', 'loading' => 'lazy' ]
                        );
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

          <?php /* Widget: Tags */ ?>
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
              <h3 class="fb-sidebar-widget__title">
                <?php esc_html_e( 'Popular Tags', 'freshbite' ); ?>
              </h3>
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

          <?php /* Widget: Mini-Banner Promo */ ?>
          <div class="fb-sidebar-widget fb-sidebar-promo">
            <div class="fb-sidebar-promo__inner">
              <span class="fb-sidebar-promo__label">
                <?php esc_html_e( 'This week only', 'freshbite' ); ?>
              </span>
              <h4 class="fb-sidebar-promo__title">
                <?php esc_html_e( 'Fresh Organic Box', 'freshbite' ); ?>
              </h4>
              <p class="fb-sidebar-promo__desc">
                <?php esc_html_e( '15% off your first subscription order. Use code FRESH15 at checkout.', 'freshbite' ); ?>
              </p>
              <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ?: home_url( '/shop/' ) ); ?>"
                 class="fb-btn fb-btn--primary fb-btn--sm fb-btn--full">
                <?php esc_html_e( 'Shop Now', 'freshbite' ); ?>
              </a>
            </div>
          </div>

          <?php /* Dynamic Sidebar (si hay widgets de WP registrados) */ ?>
          <?php if ( is_active_sidebar( 'freshbite-main-sidebar' ) ) : ?>
            <div class="fb-sidebar-widget fb-sidebar-dynamic">
              <?php dynamic_sidebar( 'freshbite-main-sidebar' ); ?>
            </div>
          <?php endif; ?>

        </aside><!-- .fb-index-sidebar -->

      </div><!-- .fb-index-grid -->
    </div><!-- .fb-container -->
  </section><!-- .fb-index-layout -->

</main><!-- #fb-main -->

<?php get_footer(); ?>
