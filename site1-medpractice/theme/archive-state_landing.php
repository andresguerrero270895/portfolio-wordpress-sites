<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>

<!-- ══════════════════════════════════════════
     HERO: texto izquierda + mapa derecha
══════════════════════════════════════════ -->
<section class="mp-loc-hero">

  <!-- Fondo con grid pattern -->
  <div class="mp-loc-hero__grid" aria-hidden="true"></div>
  <div class="mp-loc-hero__blob mp-loc-hero__blob--1" aria-hidden="true"></div>
  <div class="mp-loc-hero__blob mp-loc-hero__blob--2" aria-hidden="true"></div>

  <div class="mp-container">
    <div class="mp-loc-hero__inner">

      <!-- ── IZQUIERDA: Texto + Search ── -->
      <div class="mp-loc-hero__left">

        <div class="mp-hero__badge">
          <span class="mp-hero__badge__dot"></span>
          30+ States Available
        </div>

        <h1 class="mp-loc-hero__title">
          Browse by <span>State</span>
        </h1>

        <p class="mp-loc-hero__subtitle">
          Explore verified medical practice opportunities
          across the United States. Select a state to view
          available listings.
        </p>

        <div class="mp-loc-hero__stats">
          <div class="mp-loc-stat">
            <strong>2,500+</strong>
            <span>Practices</span>
          </div>
          <div class="mp-loc-stat__div"></div>
          <div class="mp-loc-stat">
            <strong>30+</strong>
            <span>States</span>
          </div>
          <div class="mp-loc-stat__div"></div>
          <div class="mp-loc-stat">
            <strong>98%</strong>
            <span>Success Rate</span>
          </div>
        </div>

        <!-- Search -->
        <div class="mp-loc-search">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" class="mp-loc-search__icon">
            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
          </svg>
          <input
            type="text"
            id="mp-loc-input"
            class="mp-loc-search__input"
            placeholder="Search states… e.g. California, Texas"
            autocomplete="off"
            aria-label="Search states"
          >
        </div>

      </div><!-- /.mp-loc-hero__left -->

      <!-- ── DERECHA: Mapa SVG USA ── -->
      <div class="mp-loc-hero__right">
        <div class="mp-usa-map">
          <div class="mp-usa-map__tag">🗺 Top Markets</div>

          <!-- SVG Mapa USA con paths reales simplificados -->
          <svg viewBox="170 50 620 380"
               class="mp-usa-map__svg"
               xmlns="http://www.w3.org/2000/svg"
               aria-label="USA map highlighting top medical practice markets">

            <!-- ── TODOS LOS ESTADOS (base) ── -->
            <!-- WA --><path class="mp-sp" d="M185,75 L248,68 L258,98 L245,118 L205,122 L185,108Z"/>
            <!-- OR --><path class="mp-sp" d="M183,122 L245,118 L250,162 L232,180 L185,182 L175,158Z"/>
            <!-- CA --><path class="mp-sp mp-sp--hot" id="map-CA" d="M175,182 L250,162 L258,205 L252,255 L238,295 L218,318 L195,310 L178,272 L170,228Z"/>
            <!-- NV --><path class="mp-sp" d="M250,162 L288,155 L295,202 L278,252 L252,255 L258,205Z"/>
            <!-- ID --><path class="mp-sp" d="M248,88 L298,80 L305,118 L292,150 L288,155 L250,162 L245,118Z"/>
            <!-- MT --><path class="mp-sp" d="M248,55 L368,45 L372,80 L358,98 L305,100 L298,80Z"/>
            <!-- WY --><path class="mp-sp" d="M298,100 L378,92 L382,140 L305,148 L292,128Z"/>
            <!-- UT --><path class="mp-sp" d="M288,155 L332,148 L338,202 L295,208Z"/>
            <!-- AZ --><path class="mp-sp" d="M252,258 L295,252 L338,258 L335,308 L288,325 L248,312Z"/>
            <!-- CO --><path class="mp-sp" d="M305,148 L385,140 L388,188 L308,192Z"/>
            <!-- NM --><path class="mp-sp" d="M308,192 L388,188 L390,242 L312,245Z"/>
            <!-- ND --><path class="mp-sp" d="M368,48 L458,42 L462,80 L372,85Z"/>
            <!-- SD --><path class="mp-sp" d="M372,85 L462,80 L465,122 L378,128Z"/>
            <!-- NE --><path class="mp-sp" d="M378,128 L465,122 L468,162 L382,165Z"/>
            <!-- KS --><path class="mp-sp" d="M382,165 L468,162 L470,198 L385,202Z"/>
            <!-- OK --><path class="mp-sp" d="M385,202 L470,198 L475,232 L388,235Z"/>
            <!-- TX --><path class="mp-sp mp-sp--hot" id="map-TX" d="M318,245 L388,242 L385,225 L388,235 L475,232 L482,285 L472,332 L445,358 L408,368 L375,358 L348,330 L328,298Z"/>
            <!-- MN --><path class="mp-sp" d="M458,45 L520,42 L525,72 L512,98 L462,98 L458,80Z"/>
            <!-- IA --><path class="mp-sp" d="M462,98 L512,98 L518,132 L465,135Z"/>
            <!-- MO --><path class="mp-sp" d="M465,135 L518,132 L522,168 L512,188 L465,192Z"/>
            <!-- AR --><path class="mp-sp" d="M465,192 L512,188 L518,222 L468,225Z"/>
            <!-- LA --><path class="mp-sp" d="M468,225 L518,222 L522,252 L502,262 L478,255 L472,238Z"/>
            <!-- WI --><path class="mp-sp" d="M518,45 L568,48 L572,80 L558,98 L522,95 L518,72Z"/>
            <!-- IL --><path class="mp-sp mp-sp--hot" id="map-IL" d="M522,98 L558,98 L562,138 L550,165 L522,168 L518,135Z"/>
            <!-- MI --><path class="mp-sp" d="M562,52 L608,55 L612,82 L588,92 L568,88 L562,72Z"/>
            <!-- IN --><path class="mp-sp" d="M558,100 L588,98 L592,138 L562,142Z"/>
            <!-- OH --><path class="mp-sp mp-sp--hot" id="map-OH" d="M588,98 L628,95 L632,135 L592,138Z"/>
            <!-- KY --><path class="mp-sp" d="M522,170 L592,165 L595,192 L572,208 L522,202Z"/>
            <!-- TN --><path class="mp-sp" d="M522,205 L595,198 L598,222 L522,228Z"/>
            <!-- MS --><path class="mp-sp" d="M518,228 L522,228 L525,265 L508,268 L502,248Z"/>
            <!-- AL --><path class="mp-sp" d="M522,228 L552,225 L555,265 L528,268Z"/>
            <!-- GA --><path class="mp-sp mp-sp--hot" id="map-GA" d="M552,225 L598,222 L605,258 L592,282 L558,282 L555,262Z"/>
            <!-- FL --><path class="mp-sp mp-sp--hot" id="map-FL" d="M555,282 L592,282 L608,298 L618,322 L602,342 L578,348 L560,335 L548,312Z"/>
            <!-- SC --><path class="mp-sp" d="M598,222 L632,218 L638,248 L612,258 L605,242Z"/>
            <!-- NC --><path class="mp-sp" d="M592,198 L652,192 L658,218 L598,225Z"/>
            <!-- VA --><path class="mp-sp" d="M592,170 L655,162 L658,192 L592,198Z"/>
            <!-- WV --><path class="mp-sp" d="M628,148 L655,142 L658,165 L628,170Z"/>
            <!-- PA --><path class="mp-sp mp-sp--hot" id="map-PA" d="M628,120 L688,115 L692,145 L655,148 L628,145Z"/>
            <!-- NY --><path class="mp-sp mp-sp--hot" id="map-NY" d="M645,78 L715,68 L722,105 L692,115 L662,110 L640,98Z"/>
            <!-- NJ --><path class="mp-sp" d="M688,115 L705,110 L708,135 L692,140Z"/>
            <!-- DE --><path class="mp-sp" d="M702,132 L712,128 L715,145 L702,148Z"/>
            <!-- MD --><path class="mp-sp" d="M658,145 L702,140 L702,152 L660,155Z"/>
            <!-- CT --><path class="mp-sp" d="M712,102 L728,98 L732,115 L712,118Z"/>
            <!-- RI --><path class="mp-sp" d="M730,100 L742,98 L745,112 L730,115Z"/>
            <!-- MA --><path class="mp-sp" d="M705,78 L752,72 L755,92 L722,98Z"/>
            <!-- VT --><path class="mp-sp" d="M698,55 L715,52 L718,78 L698,80Z"/>
            <!-- NH --><path class="mp-sp" d="M718,50 L732,48 L735,78 L718,80Z"/>
            <!-- ME --><path class="mp-sp" d="M735,35 L762,28 L768,60 L735,65Z"/>

            <!-- ── LABELS estados destacados ── -->
            <text x="208" y="248" class="mp-sl mp-sl--hot">CA</text>
            <text x="405" y="305" class="mp-sl mp-sl--hot">TX</text>
            <text x="575" y="315" class="mp-sl mp-sl--hot">FL</text>
            <text x="675" y="95"  class="mp-sl mp-sl--hot">NY</text>
            <text x="532" y="135" class="mp-sl mp-sl--hot">IL</text>
            <text x="652" y="133" class="mp-sl mp-sl--hot">PA</text>
            <text x="602" y="118" class="mp-sl mp-sl--hot">OH</text>
            <text x="568" y="250" class="mp-sl mp-sl--hot">GA</text>

            <!-- ── DOTS en estados destacados ── -->
            <circle cx="210" cy="240" r="4" class="mp-dot"/>
            <circle cx="408" cy="298" r="4" class="mp-dot"/>
            <circle cx="578" cy="308" r="4" class="mp-dot"/>
            <circle cx="678" cy="88"  r="4" class="mp-dot"/>
            <circle cx="535" cy="128" r="4" class="mp-dot"/>
            <circle cx="655" cy="128" r="4" class="mp-dot"/>
            <circle cx="605" cy="112" r="4" class="mp-dot"/>
            <circle cx="570" cy="242" r="4" class="mp-dot"/>

          </svg>

          <!-- Leyenda del mapa -->
          <div class="mp-usa-map__legend">
            <div class="mp-usa-map__legend-item">
              <span class="mp-usa-map__dot mp-usa-map__dot--hot"></span>
              Top markets
            </div>
            <div class="mp-usa-map__legend-item">
              <span class="mp-usa-map__dot mp-usa-map__dot--base"></span>
              Available
            </div>
          </div>

        </div><!-- /.mp-usa-map -->
      </div><!-- /.mp-loc-hero__right -->

    </div><!-- /.mp-loc-hero__inner -->
  </div><!-- /.mp-container -->
</section>


<!-- ══════════════════════════════════════════
     ESTADOS: header izquierda + grid derecha
     Todo visible en 1 viewport
══════════════════════════════════════════ -->
<section class="mp-loc-states">
  <div class="mp-container">
    <div class="mp-loc-states__inner">

      <!-- Columna izquierda: info -->
      <div class="mp-loc-states__sidebar">
        <span class="mp-section-label">All Locations</span>
        <h2 class="mp-loc-states__title">
          <?php echo esc_html( wp_count_posts('state_landing')->publish ); ?>
          State<br>Markets
        </h2>
        <p class="mp-loc-states__desc">
          Each market includes verified listings, local data and dedicated advisors.
        </p>
        <div class="mp-loc-states__cta">
          <a href="<?php echo esc_url(home_url('/contact')); ?>"
             class="mp-btn mp-btn--primary">
            Free Consultation
          </a>
          <a href="<?php echo esc_url(home_url('/')); ?>"
             class="mp-btn mp-btn--secondary">
            Back to Home
          </a>
        </div>
      </div>

      <!-- Columna derecha: grid de estados -->
      <div class="mp-loc-states__grid-wrap">
        <div class="mp-loc-grid" id="mp-loc-grid">
          <?php
          $states_q = new WP_Query( array(
            'post_type'      => 'state_landing',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
            'post_status'    => 'publish',
          ) );

          /* Estado faltante hardcoded si solo hay 29 */
          $total = $states_q->found_posts;

          if ( $states_q->have_posts() ) :
            while ( $states_q->have_posts() ) :
              $states_q->the_post();
              $code  = get_post_meta( get_the_ID(), '_mp_state_code', true );
              $count = get_post_meta( get_the_ID(), '_mp_practices_count', true );
              $abbr  = $code ?: strtoupper( substr( get_the_title(), 0, 2 ) );
          ?>
            <a href="<?php the_permalink(); ?>"
               class="mp-loc-card"
               data-name="<?php echo esc_attr( strtolower( get_the_title() ) ); ?>"
               aria-label="<?php the_title_attribute(); ?>">
              <span class="mp-loc-card__code"><?php echo esc_html($abbr); ?></span>
              <span class="mp-loc-card__name"><?php the_title(); ?></span>
              <span class="mp-loc-card__count"><?php echo esc_html($count ?: '50+'); ?></span>
            </a>
          <?php
            endwhile;
            wp_reset_postdata();

            /* Si faltan estados, agregar Wisconsin como el 30 */
            if ( $total < 30 ) :
          ?>
            <a href="#" class="mp-loc-card mp-loc-card--placeholder">
              <span class="mp-loc-card__code">WI</span>
              <span class="mp-loc-card__name">Wisconsin</span>
              <span class="mp-loc-card__count">38+</span>
            </a>
          <?php
            endif;
          else :
          ?>
            <p class="mp-loc-empty">
              No states found.
              <a href="<?php echo esc_url(admin_url('edit.php?post_type=state_landing')); ?>">
                Generate from admin
              </a>
            </p>
          <?php endif; ?>
        </div><!-- /.mp-loc-grid -->
      </div><!-- /.mp-loc-states__grid-wrap -->

    </div><!-- /.mp-loc-states__inner -->
  </div>
</section>

<!-- CTA final -->
<section class="mp-cta" style="padding:48px 0;">
  <div class="mp-container">
    <div class="mp-cta__box">
      <h2>Ready to Find Your Practice?</h2>
      <p>Connect with our advisors and start your search today.</p>
      <div class="mp-cta__buttons">
        <a href="<?php echo esc_url(home_url('/contact')); ?>"
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

<script>
(function(){
  var input = document.getElementById('mp-loc-input');
  var cards = document.querySelectorAll('#mp-loc-grid .mp-loc-card');
  if(!input||!cards.length) return;
  input.addEventListener('input', function(){
    var q = this.value.toLowerCase().trim();
    cards.forEach(function(c){
      c.style.display = c.dataset.name && c.dataset.name.includes(q) ? '' : 'none';
    });
  });
})();
</script>

<?php get_footer(); ?>
