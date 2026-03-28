<?php
/**
 * MedPractice USA - Front Page
 * Orden: hero → services → locations → process → testimonials → cta
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>

<!-- ══════════════ HERO ══════════════ -->
<section class="mp-hero" id="hero" aria-label="Hero">
  <div class="mp-hero__grid-pattern" aria-hidden="true"></div>
  <div class="mp-hero__float mp-hero__float--1" aria-hidden="true"></div>
  <div class="mp-hero__float mp-hero__float--2" aria-hidden="true"></div>

  <div class="mp-hero__content">
    <div class="mp-container">

      <div class="mp-hero__badge">
        <span class="mp-hero__badge__dot"></span>
        Trusted by 2,500+ Physicians Nationwide
      </div>

      <h1 class="mp-hero__title">
        Find Your Perfect<br><span>Medical Practice</span>
      </h1>

      <p class="mp-hero__subtitle">
        The nation's premier marketplace connecting physicians with verified
        medical practice opportunities across 30+ states. Expert guidance
        from search to closing.
      </p>

      <div class="mp-hero__cta">
        <a href="#locations" class="mp-btn mp-btn--accent mp-btn--large">Browse Practices</a>
        <a href="#process"   class="mp-btn mp-btn--outline mp-btn--large">How It Works</a>
      </div>

      <div class="mp-hero__stats">
        <div class="mp-hero__stat">
          <span class="mp-hero__stat-number"><span class="mp-counter" data-count="2500">2,500</span>+</span>
          <span class="mp-hero__stat-label">Practices Sold</span>
        </div>
        <div class="mp-hero__stat-divider" aria-hidden="true"></div>
        <div class="mp-hero__stat">
          <span class="mp-hero__stat-number"><span class="mp-counter" data-count="30">30</span>+</span>
          <span class="mp-hero__stat-label">States Covered</span>
        </div>
        <div class="mp-hero__stat-divider" aria-hidden="true"></div>
        <div class="mp-hero__stat">
          <span class="mp-hero__stat-number"><span class="mp-counter" data-count="98">98</span>%</span>
          <span class="mp-hero__stat-label">Success Rate</span>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════ SERVICES ══════════════ -->
<section class="mp-section mp-services" id="services" aria-label="Services">
  <div class="mp-container">

    <div class="mp-section-header">
      <span class="mp-section-label">What We Offer</span>
      <h2 class="mp-section-title">Comprehensive Practice<br>Acquisition Services</h2>
      <p class="mp-section-desc">
        From initial consultation to closing day, we provide end-to-end
        support for physicians looking to buy or sell medical practices.
      </p>
    </div>

    <div class="mp-services__grid">

      <div class="mp-service-card">
        <div class="mp-service-card__icon">🔍</div>
        <h3 class="mp-service-card__title">Practice Search</h3>
        <p class="mp-service-card__desc">Access our exclusive database of verified medical practices for sale across 30+ states. Filter by specialty, location, and price range.</p>
      </div>

      <div class="mp-service-card">
        <div class="mp-service-card__icon">📊</div>
        <h3 class="mp-service-card__title">Valuation &amp; Analysis</h3>
        <p class="mp-service-card__desc">Get accurate practice valuations backed by comprehensive financial analysis, patient demographics, and market comparisons.</p>
      </div>

      <div class="mp-service-card">
        <div class="mp-service-card__icon">📋</div>
        <h3 class="mp-service-card__title">Due Diligence</h3>
        <p class="mp-service-card__desc">Our team conducts thorough operational, financial, and legal reviews to ensure you make an informed investment decision.</p>
      </div>

      <div class="mp-service-card">
        <div class="mp-service-card__icon">🤝</div>
        <h3 class="mp-service-card__title">Negotiation Support</h3>
        <p class="mp-service-card__desc">Expert negotiators work on your behalf to secure the best possible terms, price, and transition arrangements.</p>
      </div>

      <div class="mp-service-card">
        <div class="mp-service-card__icon">💰</div>
        <h3 class="mp-service-card__title">Financing Guidance</h3>
        <p class="mp-service-card__desc">We connect you with healthcare-specialized lenders and guide you through SBA loans, conventional financing, and seller financing.</p>
      </div>

      <div class="mp-service-card">
        <div class="mp-service-card__icon">🔄</div>
        <h3 class="mp-service-card__title">Transition Planning</h3>
        <p class="mp-service-card__desc">Seamless ownership transition with patient retention strategies, staff management, and operational continuity planning.</p>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════ LOCATIONS ══════════════ -->
<section class="mp-locations-section" id="locations" aria-label="Locations">

  <!-- ── HERO: 2 columnas (texto | mapa) ── -->
  <div class="mp-loc-top">
    <div class="mp-loc-top__grid" aria-hidden="true"></div>
    <div class="mp-loc-top__blob mp-loc-top__blob--1" aria-hidden="true"></div>
    <div class="mp-loc-top__blob mp-loc-top__blob--2" aria-hidden="true"></div>

    <div class="mp-container">
      <div class="mp-loc-top__inner">

        <!-- Izquierda: texto + search -->
        <div class="mp-loc-top__left">
          <div class="mp-hero__badge">
            <span class="mp-hero__badge__dot"></span>
            30+ States Available
          </div>
          <h2 class="mp-loc-top__title">
            Browse by <span>State</span>
          </h2>
          <p class="mp-loc-top__subtitle">
            Explore verified medical practice opportunities across the
            United States. Select a state to view available listings.
          </p>
          <div class="mp-loc-stats">
            <div class="mp-loc-stat"><strong>2,500+</strong><span>Practices</span></div>
            <div class="mp-loc-stat__sep"></div>
            <div class="mp-loc-stat"><strong>30+</strong><span>States</span></div>
            <div class="mp-loc-stat__sep"></div>
            <div class="mp-loc-stat"><strong>98%</strong><span>Success</span></div>
          </div>
          <div class="mp-loc-search-wrap">
            <div class="mp-loc-search">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
              <input type="text" id="mp-state-search" class="mp-loc-search__input"
                     placeholder="Search states… e.g. California, Texas"
                     aria-label="Search states" autocomplete="off">
            </div>
            <!-- Resultados inline -->
            <div class="mp-loc-results" id="mp-loc-results" role="listbox" aria-label="Search results">
              <div class="mp-loc-results__header">Results</div>
              <div id="mp-loc-results-list"></div>
            </div>
          </div>
        </div>

        <!-- Derecha: Mapa SVG USA -->
        <div class="mp-loc-top__right">
          <div class="mp-usa-map">
            <div class="mp-usa-map__badge">🗺 Top Markets</div>
            <svg viewBox="155 40 640 390" class="mp-usa-map__svg"
                 xmlns="http://www.w3.org/2000/svg"
                 aria-label="USA map with top medical practice markets">

              <!-- Base states -->
              <path class="mp-sp" d="M185,75 L248,68 L258,98 L245,118 L205,122 L185,108Z"/>
              <path class="mp-sp" d="M183,122 L245,118 L250,162 L232,180 L185,182 L175,158Z"/>
              <path class="mp-sp mp-sp--hot" d="M175,182 L250,162 L258,205 L252,255 L238,295 L218,318 L195,310 L178,272 L170,228Z"/>
              <path class="mp-sp" d="M250,162 L288,155 L295,202 L278,252 L252,255 L258,205Z"/>
              <path class="mp-sp" d="M248,88 L298,80 L305,118 L292,150 L288,155 L250,162 L245,118Z"/>
              <path class="mp-sp" d="M248,55 L368,45 L372,80 L358,98 L305,100 L298,80Z"/>
              <path class="mp-sp" d="M298,100 L378,92 L382,140 L305,148 L292,128Z"/>
              <path class="mp-sp" d="M288,155 L332,148 L338,202 L295,208Z"/>
              <path class="mp-sp" d="M252,258 L295,252 L338,258 L335,308 L288,325 L248,312Z"/>
              <path class="mp-sp" d="M305,148 L385,140 L388,188 L308,192Z"/>
              <path class="mp-sp" d="M308,192 L388,188 L390,242 L312,245Z"/>
              <path class="mp-sp" d="M368,48 L458,42 L462,80 L372,85Z"/>
              <path class="mp-sp" d="M372,85 L462,80 L465,122 L378,128Z"/>
              <path class="mp-sp" d="M378,128 L465,122 L468,162 L382,165Z"/>
              <path class="mp-sp" d="M382,165 L468,162 L470,198 L385,202Z"/>
              <path class="mp-sp" d="M385,202 L470,198 L475,232 L388,235Z"/>
              <path class="mp-sp mp-sp--hot" d="M318,245 L388,242 L385,225 L388,235 L475,232 L482,285 L472,332 L445,358 L408,368 L375,358 L348,330 L328,298Z"/>
              <path class="mp-sp" d="M458,45 L520,42 L525,72 L512,98 L462,98 L458,80Z"/>
              <path class="mp-sp" d="M462,98 L512,98 L518,132 L465,135Z"/>
              <path class="mp-sp" d="M465,135 L518,132 L522,168 L512,188 L465,192Z"/>
              <path class="mp-sp" d="M465,192 L512,188 L518,222 L468,225Z"/>
              <path class="mp-sp" d="M468,225 L518,222 L522,252 L502,262 L478,255 L472,238Z"/>
              <path class="mp-sp" d="M518,45 L568,48 L572,80 L558,98 L522,95 L518,72Z"/>
              <path class="mp-sp mp-sp--hot" d="M522,98 L558,98 L562,138 L550,165 L522,168 L518,135Z"/>
              <path class="mp-sp" d="M562,52 L608,55 L612,82 L588,92 L568,88 L562,72Z"/>
              <path class="mp-sp" d="M558,100 L588,98 L592,138 L562,142Z"/>
              <path class="mp-sp mp-sp--hot" d="M588,98 L628,95 L632,135 L592,138Z"/>
              <path class="mp-sp" d="M522,170 L592,165 L595,192 L572,208 L522,202Z"/>
              <path class="mp-sp" d="M522,205 L595,198 L598,222 L522,228Z"/>
              <path class="mp-sp" d="M518,228 L522,228 L525,265 L508,268 L502,248Z"/>
              <path class="mp-sp" d="M522,228 L552,225 L555,265 L528,268Z"/>
              <path class="mp-sp mp-sp--hot" d="M552,225 L598,222 L605,258 L592,282 L558,282 L555,262Z"/>
              <path class="mp-sp mp-sp--hot" d="M555,282 L592,282 L608,298 L618,322 L602,342 L578,348 L560,335 L548,312Z"/>
              <path class="mp-sp" d="M598,222 L632,218 L638,248 L612,258 L605,242Z"/>
              <path class="mp-sp" d="M592,198 L652,192 L658,218 L598,225Z"/>
              <path class="mp-sp" d="M592,170 L655,162 L658,192 L592,198Z"/>
              <path class="mp-sp" d="M628,148 L655,142 L658,165 L628,170Z"/>
              <path class="mp-sp mp-sp--hot" d="M628,120 L688,115 L692,145 L655,148 L628,145Z"/>
              <path class="mp-sp mp-sp--hot" d="M645,78 L715,68 L722,105 L692,115 L662,110 L640,98Z"/>
              <path class="mp-sp" d="M688,115 L705,110 L708,135 L692,140Z"/>
              <path class="mp-sp" d="M702,132 L712,128 L715,145 L702,148Z"/>
              <path class="mp-sp" d="M658,145 L702,140 L702,152 L660,155Z"/>
              <path class="mp-sp" d="M712,102 L728,98 L732,115 L712,118Z"/>
              <path class="mp-sp" d="M705,78 L752,72 L755,92 L722,98Z"/>
              <path class="mp-sp" d="M698,55 L715,52 L718,78 L698,80Z"/>
              <path class="mp-sp" d="M718,50 L732,48 L735,78 L718,80Z"/>
              <path class="mp-sp" d="M735,35 L762,28 L768,60 L735,65Z"/>

              <!-- Labels destacados -->
              <text x="208" y="248" class="mp-sl mp-sl--hot">CA</text>
              <text x="405" y="305" class="mp-sl mp-sl--hot">TX</text>
              <text x="575" y="318" class="mp-sl mp-sl--hot">FL</text>
              <text x="675" y="95"  class="mp-sl mp-sl--hot">NY</text>
              <text x="532" y="133" class="mp-sl mp-sl--hot">IL</text>
              <text x="652" y="133" class="mp-sl mp-sl--hot">PA</text>
              <text x="602" y="118" class="mp-sl mp-sl--hot">OH</text>
              <text x="568" y="250" class="mp-sl mp-sl--hot">GA</text>

              <!-- Dots pulsantes -->
              <circle cx="210" cy="240" r="4" class="mp-dot"/>
              <circle cx="408" cy="298" r="4" class="mp-dot"/>
              <circle cx="578" cy="310" r="4" class="mp-dot"/>
              <circle cx="678" cy="88"  r="4" class="mp-dot"/>
              <circle cx="535" cy="126" r="4" class="mp-dot"/>
              <circle cx="655" cy="127" r="4" class="mp-dot"/>
              <circle cx="605" cy="112" r="4" class="mp-dot"/>
              <circle cx="570" cy="242" r="4" class="mp-dot"/>
            </svg>
            <div class="mp-usa-map__legend">
              <span class="mp-usa-map__dot mp-usa-map__dot--hot"></span>Top markets
              <span class="mp-usa-map__dot mp-usa-map__dot--base" style="margin-left:12px;"></span>Available
            </div>
          </div>
        </div>

      </div>
    </div>
  </div><!-- /.mp-loc-top -->

  <!-- ── GRID DE ESTADOS ── -->
  <div class="mp-loc-bottom">
    <div class="mp-container">
      <div class="mp-loc-bottom__inner">

        <!-- Sidebar info izquierda -->
        <div class="mp-loc-bottom__sidebar">
          <span class="mp-section-label">All Locations</span>
          <h3 class="mp-loc-bottom__title">
            <?php echo esc_html( wp_count_posts('state_landing')->publish ); ?><br>State Markets
          </h3>
          <p class="mp-loc-bottom__desc">
            Verified listings with local market data and dedicated advisors.
          </p>
          <a href="<?php echo esc_url( home_url('/contact') ); ?>"
             class="mp-btn mp-btn--primary" style="margin-top:.5rem;">
            Free Consultation
          </a>
        </div>

        <!-- Grid 6 columnas de estados -->
        <div class="mp-loc-grid" id="mp-states-grid">
          <?php
          $sq = new WP_Query( array(
            'post_type'      => 'state_landing',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
            'post_status'    => 'publish',
          ) );
          $found = $sq->found_posts;
          if ( $sq->have_posts() ) :
            while ( $sq->have_posts() ) :
              $sq->the_post();
              $code  = get_post_meta( get_the_ID(), '_mp_state_code', true );
              $count = get_post_meta( get_the_ID(), '_mp_practices_count', true );
              $abbr  = $code ?: strtoupper( substr( get_the_title(), 0, 2 ) );
          ?>
            <a href="<?php the_permalink(); ?>"
               class="mp-loc-card"
               data-state="<?php echo esc_attr( strtolower( get_the_title() ) ); ?>"
               aria-label="<?php the_title_attribute(); ?>">
              <span class="mp-loc-card__code"><?php echo esc_html($abbr); ?></span>
              <span class="mp-loc-card__name"><?php the_title(); ?></span>
              <span class="mp-loc-card__count"><?php echo esc_html($count ?: '50+'); ?> practices</span>
            </a>
          <?php
            endwhile;
            wp_reset_postdata();
            if ( $found < 30 ) :
          ?>
            <a href="#" class="mp-loc-card mp-loc-card--soon">
              <span class="mp-loc-card__code">WI</span>
              <span class="mp-loc-card__name">Wisconsin</span>
              <span class="mp-loc-card__count">38+ practices</span>
            </a>
          <?php
            endif;
          else: ?>
            <p style="grid-column:1/-1;text-align:center;color:var(--mp-medium-gray);">
              State pages are loading. Please refresh.
            </p>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div><!-- /.mp-loc-bottom -->

</section>


<!-- ══════════════ PROCESS ══════════════ -->
<section class="mp-section mp-process-section" id="process" aria-label="Process">
  <div class="mp-container">

    <div class="mp-section-header">
      <span class="mp-section-label">How It Works</span>
      <h2 class="mp-section-title">Your Path to Practice Ownership</h2>
      <p class="mp-section-desc">
        A proven 5-step process that has helped thousands of physicians find
        and acquire their ideal medical practice.
      </p>
    </div>

    <div class="mp-process-grid">

      <div class="mp-process-card">
        <h4 class="mp-process-card__title">Consultation</h4>
        <p class="mp-process-card__desc">Free 30-minute call to understand your goals, budget, preferred location, and specialty requirements.</p>
      </div>

      <div class="mp-process-card">
        <h4 class="mp-process-card__title">Search &amp; Match</h4>
        <p class="mp-process-card__desc">We identify practices matching your criteria from our database of 3,000+ active listings nationwide.</p>
      </div>

      <div class="mp-process-card">
        <h4 class="mp-process-card__title">Due Diligence</h4>
        <p class="mp-process-card__desc">Comprehensive review of financials, operations, patient base, equipment, and lease agreements.</p>
      </div>

      <div class="mp-process-card">
        <h4 class="mp-process-card__title">Negotiation</h4>
        <p class="mp-process-card__desc">Our experts negotiate purchase price, terms, non-compete clauses, and transition timelines on your behalf.</p>
      </div>

      <div class="mp-process-card">
        <h4 class="mp-process-card__title">Closing &amp; Transition</h4>
        <p class="mp-process-card__desc">We manage the closing process and provide 90-day transition support for a seamless handover.</p>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════ TESTIMONIALS ══════════════ -->
<section class="mp-section mp-testimonials" id="testimonials" aria-label="Testimonials">
  <div class="mp-container">

    <div class="mp-section-header">
      <span class="mp-section-label">Testimonials</span>
      <h2 class="mp-section-title">What Our Clients Say</h2>
      <p class="mp-section-desc">
        Hear from physicians who found their perfect practice through MedPractice USA.
      </p>
    </div>

    <div class="mp-testimonials-grid">

      <div class="mp-testimonial-card">
        <div class="mp-testimonial-card__stars">★★★★★</div>
        <p class="mp-testimonial-card__text">"MedPractice USA made finding and acquiring my family practice in California incredibly smooth. Their team handled everything from valuation to closing."</p>
        <div class="mp-testimonial-card__author">
          <div class="mp-testimonial-card__avatar">DR</div>
          <div>
            <div class="mp-testimonial-card__name">Dr. Robert Chen</div>
            <div class="mp-testimonial-card__role">Family Medicine — California</div>
          </div>
        </div>
      </div>

      <div class="mp-testimonial-card">
        <div class="mp-testimonial-card__stars">★★★★★</div>
        <p class="mp-testimonial-card__text">"I was overwhelmed by the process of buying a practice until I found MedPractice. They matched me with the perfect dental practice in Texas within 3 months."</p>
        <div class="mp-testimonial-card__author">
          <div class="mp-testimonial-card__avatar">SM</div>
          <div>
            <div class="mp-testimonial-card__name">Dr. Sarah Mitchell</div>
            <div class="mp-testimonial-card__role">Dental Practice — Texas</div>
          </div>
        </div>
      </div>

      <div class="mp-testimonial-card">
        <div class="mp-testimonial-card__stars">★★★★★</div>
        <p class="mp-testimonial-card__text">"The due diligence process saved me from a bad investment. Their team identified issues I never would have found on my own. Ended up finding an even better practice."</p>
        <div class="mp-testimonial-card__author">
          <div class="mp-testimonial-card__avatar">JW</div>
          <div>
            <div class="mp-testimonial-card__name">Dr. James Wilson</div>
            <div class="mp-testimonial-card__role">Cardiology — New York</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════ CTA ══════════════ -->
<section class="mp-section mp-cta" id="cta" aria-label="Call to action">
  <div class="mp-container">
    <div class="mp-cta__box">

      <span class="mp-section-label" style="color:rgba(255,255,255,0.6);">
        Get Started Today
      </span>
      <h2>Ready to Find<br>Your Perfect Practice?</h2>
      <p>
        Schedule a free 30-minute consultation with our practice acquisition
        experts. No obligation — just expert guidance tailored to your goals.
      </p>

      <div class="mp-cta__buttons">
        <a href="<?php echo esc_url( home_url('/contact') ); ?>"
           class="mp-btn mp-btn--accent mp-btn--large">
          Schedule Free Consultation
        </a>
        <a href="tel:+18005551234"
           class="mp-btn mp-btn--outline-white mp-btn--large">
          📞 (800) 555-1234
        </a>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
