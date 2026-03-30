<?php
/**
 * Page Template: Work / Portfolio
 * Developer: Andres Esteban Guerrero Rios
 */
get_header(); ?>

<!-- ============================================================
     HERO — WORK
============================================================ -->
<section class="tf-page-hero">
  <div class="tf-page-hero__bg">
    <div class="tf-hero__grid"></div>
    <div class="tf-page-hero__glow"></div>
  </div>
  <div class="tf-container">
    <div class="tf-page-hero__inner" data-aos="fade-up">
      <span class="tf-section-tag">Portfolio</span>
      <h1 class="tf-page-hero__title">
        My <span class="tf-gradient">Work</span>
      </h1>
      <p class="tf-page-hero__subtitle">
        A selection of real projects — from medical platforms and marketplaces 
        to React SPAs, financial software and AI tools.
      </p>
    </div>
  </div>
</section>

<!-- ============================================================
     FILTER BAR
============================================================ -->
<section class="tf-work-filter">
  <div class="tf-container">
    <div class="tf-work-filter__bar" data-aos="fade-up">
      <button class="tf-filter-btn tf-filter-btn--active" data-filter="all">
        All Projects
      </button>
      <button class="tf-filter-btn" data-filter="wordpress">
        WordPress
      </button>
      <button class="tf-filter-btn" data-filter="react">
        React / SPA
      </button>
      <button class="tf-filter-btn" data-filter="ecommerce">
        E-commerce
      </button>
      <button class="tf-filter-btn" data-filter="marketing">
        Marketing
      </button>
      <button class="tf-filter-btn" data-filter="ai">
        AI / Automation
      </button>
    </div>
  </div>
</section>

<!-- ============================================================
     PROJECTS GRID
============================================================ -->
<section class="tf-work-grid-section">
  <div class="tf-container">
    <div class="tf-work-grid" id="projectsGrid">

      <?php
      // Query CPT projects
      $projects = new WP_Query([
        'post_type'      => 'tf_project',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
      ]);

      if ( $projects->have_posts() ) :
        while ( $projects->have_posts() ) : $projects->the_post();
          $stack    = get_post_meta( get_the_ID(), '_tf_project_stack',    true );
          $result   = get_post_meta( get_the_ID(), '_tf_project_result',   true );
          $url      = get_post_meta( get_the_ID(), '_tf_project_url',      true );
          $year     = get_post_meta( get_the_ID(), '_tf_project_year',     true );
          $color    = get_post_meta( get_the_ID(), '_tf_project_color',    true ) ?: '#7C3AED';
          $featured = get_post_meta( get_the_ID(), '_tf_project_featured', true );
          $cats     = get_the_terms( get_the_ID(), 'tf_category' );
          $cat_slug = $cats ? $cats[0]->slug : '';
          $cat_name = $cats ? $cats[0]->name : '';
      ?>
        <article class="tf-work-card <?php echo $featured === '1' ? 'tf-work-card--featured' : ''; ?>"
                 data-category="<?php echo esc_attr($cat_slug); ?>"
                 data-aos="fade-up">
          <div class="tf-work-card__thumb">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('tf-project-thumb', ['class' => 'tf-work-card__img']); ?>
            <?php else : ?>
              <div class="tf-work-card__placeholder" style="--card-color: <?php echo esc_attr($color); ?>">
                <span><?php echo strtoupper(substr(get_the_title(), 0, 2)); ?></span>
              </div>
            <?php endif; ?>
            <?php if ( $featured === '1' ) : ?>
              <div class="tf-work-card__featured-badge">⭐ Featured</div>
            <?php endif; ?>
            <div class="tf-work-card__overlay">
              <a href="<?php the_permalink(); ?>" class="tf-work-card__btn">
                View Case Study →
              </a>
              <?php if ( $url ) : ?>
                <a href="<?php echo esc_url($url); ?>" target="_blank" class="tf-work-card__btn tf-work-card__btn--outline">
                  Live Site ↗
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="tf-work-card__body">
            <div class="tf-work-card__meta">
              <?php if ( $cat_name ) : ?>
                <span class="tf-work-card__cat"><?php echo esc_html($cat_name); ?></span>
              <?php endif; ?>
              <?php if ( $year ) : ?>
                <span class="tf-work-card__year"><?php echo esc_html($year); ?></span>
              <?php endif; ?>
            </div>
            <h3 class="tf-work-card__title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="tf-work-card__excerpt">
              <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
            </p>
            <?php if ( $result ) : ?>
              <div class="tf-work-card__result">
                <span class="tf-work-card__result-icon">📈</span>
                <?php echo esc_html($result); ?>
              </div>
            <?php endif; ?>
            <?php if ( $stack ) : ?>
              <div class="tf-work-card__stack">
                <?php foreach ( array_slice(explode(',', $stack), 0, 4) as $tech ) : ?>
                  <span><?php echo trim($tech); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </article>

      <?php
        endwhile;
        wp_reset_postdata();

      else :
        // ── Fallback — Static projects while CPT is empty ──
        $static_projects = [
          [
            'init'     => 'MP',
            'color'    => '#1a6db5',
            'cat'      => 'WordPress / Healthcare',
            'filter'   => 'wordpress',
            'title'    => 'MedPractice USA',
            'excerpt'  => 'Medical practice platform with state-specific landing pages, appointment system, chat popup and healthcare-focused UX built on WordPress.',
            'result'   => 'Custom CPT + State Landing Pages',
            'stack'    => ['WordPress', 'PHP', 'JavaScript', 'CSS'],
            'url'      => 'http://med-practice-usa.local/',
            'year'     => '2024',
            'featured' => true,
          ],
          [
            'init'     => 'TF',
            'color'    => '#7C3AED',
            'cat'      => 'Agency / Developer Portfolio',
            'filter'   => 'wordpress',
            'title'    => 'TechFlow Agency',
            'excerpt'  => 'Full-stack developer portfolio with dark UI, animated hero, services showcase, pricing and contact form. Built as a real freelance site.',
            'result'   => 'Full Portfolio Site',
            'stack'    => ['WordPress', 'PHP', 'CSS', 'JavaScript'],
            'url'      => 'http://techflow-agency.local/',
            'year'     => '2024',
            'featured' => true,
          ],
          [
            'init'     => 'FB',
            'color'    => '#2D6A4F',
            'cat'      => 'E-commerce / Marketplace',
            'filter'   => 'ecommerce',
            'title'    => 'FreshBite Marketplace',
            'excerpt'  => 'WooCommerce marketplace connecting local food producers with consumers. Custom checkout, producer profiles and product catalog.',
            'result'   => 'Full WooCommerce Marketplace',
            'stack'    => ['WooCommerce', 'PHP', 'WordPress', 'CSS'],
            'url'      => 'http://freshbite-marketplace.local/',
            'year'     => '2024',
            'featured' => true,
          ],
          [
            'init'     => 'LP',
            'color'    => '#F59E0B',
            'cat'      => 'Marketing / Landing Page',
            'filter'   => 'marketing',
            'title'    => 'Marketing Landing Pages',
            'excerpt'  => 'High-converting landing pages for digital marketing campaigns. Optimized for Google Ads and Meta Ads with A/B testing ready structure.',
            'result'   => 'High-converting campaigns',
            'stack'    => ['HTML', 'CSS', 'JavaScript', 'Google Ads'],
            'url'      => '#',
            'year'     => '2023',
            'featured' => false,
          ],
          [
            'init'     => 'SP',
            'color'    => '#06B6D4',
            'cat'      => 'React / SPA',
            'filter'   => 'react',
            'title'    => 'React SPA Dashboard',
            'excerpt'  => 'Single Page Application with real-time data, interactive charts, user authentication and REST API integration.',
            'result'   => 'Full SPA with Auth',
            'stack'    => ['React', 'Node.js', 'PostgreSQL', 'JWT'],
            'url'      => '#',
            'year'     => '2023',
            'featured' => false,
          ],
          [
            'init'     => 'FS',
            'color'    => '#10B981',
            'cat'      => 'Financial Software',
            'filter'   => 'react',
            'title'    => 'Financial Management System',
            'excerpt'  => 'Custom financial software with transaction tracking, reports, budget management and multi-user access control.',
            'result'   => 'Full financial platform',
            'stack'    => ['React', 'Node.js', 'PostgreSQL', 'CSS'],
            'url'      => '#',
            'year'     => '2022',
            'featured' => false,
          ],
        ];

        foreach ( $static_projects as $p ) : ?>
          <article class="tf-work-card <?php echo $p['featured'] ? 'tf-work-card--featured' : ''; ?>"
                   data-category="<?php echo $p['filter']; ?>"
                   data-aos="fade-up">
            <div class="tf-work-card__thumb">
              <div class="tf-work-card__placeholder" style="--card-color: <?php echo $p['color']; ?>">
                <span><?php echo $p['init']; ?></span>
              </div>
              <?php if ( $p['featured'] ) : ?>
                <div class="tf-work-card__featured-badge">⭐ Featured</div>
              <?php endif; ?>
              <div class="tf-work-card__overlay">
                <?php if ( $p['url'] !== '#' ) : ?>
                  <a href="<?php echo $p['url']; ?>" target="_blank" class="tf-work-card__btn">
                    Live Site ↗
                  </a>
                <?php else : ?>
                  <span class="tf-work-card__btn tf-work-card__btn--disabled">
                    Private Project
                  </span>
                <?php endif; ?>
              </div>
            </div>
            <div class="tf-work-card__body">
              <div class="tf-work-card__meta">
                <span class="tf-work-card__cat"><?php echo $p['cat']; ?></span>
                <span class="tf-work-card__year"><?php echo $p['year']; ?></span>
              </div>
              <h3 class="tf-work-card__title"><?php echo $p['title']; ?></h3>
              <p class="tf-work-card__excerpt"><?php echo $p['excerpt']; ?></p>
              <div class="tf-work-card__result">
                <span class="tf-work-card__result-icon">📈</span>
                <?php echo $p['result']; ?>
              </div>
              <div class="tf-work-card__stack">
                <?php foreach ( $p['stack'] as $tech ) : ?>
                  <span><?php echo $tech; ?></span>
                <?php endforeach; ?>
              </div>
            </div>
          </article>
        <?php endforeach;
      endif; ?>

    </div>

    <!-- No results message -->
    <div class="tf-work-empty" id="noResults" style="display:none;">
      <span>🔍</span>
      <p>No projects found in this category yet.</p>
    </div>

  </div>
</section>

<!-- ============================================================
     CTA
============================================================ -->
<section class="tf-cta-section">
  <div class="tf-container">
    <div class="tf-cta-section__inner" data-aos="fade-up">
      <div class="tf-cta-section__glow"></div>
      <h2 class="tf-cta-section__title">
        Like what you see? Let's build something <span class="tf-gradient">together</span>
      </h2>
      <p class="tf-cta-section__text">
        I'm available for new projects. Tell me about yours.
      </p>
      <div class="tf-cta-section__actions">
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
          Start a Project
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('services')); ?>" class="tf-btn tf-btn--ghost tf-btn--lg">
          View Services
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SCRIPTS
============================================================ -->
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ── Filter ────────────────────────────────────────────────
  const filterBtns = document.querySelectorAll('.tf-filter-btn');
  const cards      = document.querySelectorAll('.tf-work-card');
  const noResults  = document.getElementById('noResults');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      // Active state
      filterBtns.forEach(b => b.classList.remove('tf-filter-btn--active'));
      this.classList.add('tf-filter-btn--active');

      const filter = this.dataset.filter;
      let visible  = 0;

      cards.forEach(card => {
        const cat = card.dataset.category;
        const show = filter === 'all' || cat === filter || cat.includes(filter);

        if (show) {
          card.style.display = '';
          card.style.animation = 'fadeInUp .4s ease forwards';
          visible++;
        } else {
          card.style.display = 'none';
        }
      });

      noResults.style.display = visible === 0 ? 'flex' : 'none';
    });
  });

  // ── AOS ───────────────────────────────────────────────────
  const aosEls = document.querySelectorAll('[data-aos]');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const delay = e.target.dataset.aosDelay || 0;
        setTimeout(() => e.target.classList.add('aos-animate'), parseInt(delay));
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  aosEls.forEach(el => obs.observe(el));

});
</script>

<?php get_footer(); ?>