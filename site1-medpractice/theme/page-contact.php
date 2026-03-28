<?php
/**
 * Template Name: Contact Page
 * MedPractice USA — Contact
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>

<section class="mp-contact-page">

  <!-- Fondo -->
  <div class="mp-contact-page__bg" aria-hidden="true"></div>
  <div class="mp-contact-page__blob mp-contact-page__blob--1" aria-hidden="true"></div>
  <div class="mp-contact-page__blob mp-contact-page__blob--2" aria-hidden="true"></div>

  <div class="mp-container">
    <div class="mp-contact-page__inner">

      <!-- ── COLUMNA IZQUIERDA: Info ── -->
      <div class="mp-contact-page__left">

        <span class="mp-section-label" style="color:rgba(255,255,255,0.6);">
          Get In Touch
        </span>

        <h1 class="mp-contact-page__title">
          Find Your Perfect<br><span>Practice Today</span>
        </h1>

        <p class="mp-contact-page__subtitle">
          Schedule a free 30-minute consultation with our practice
          acquisition experts. No obligation — just expert guidance.
        </p>

        <!-- Info items -->
        <div class="mp-contact-info">

          <div class="mp-contact-info__item">
            <div class="mp-contact-info__icon">📞</div>
            <div class="mp-contact-info__text">
              <strong>Call Us</strong>
              <a href="tel:+18005551234">(800) 555-1234</a>
            </div>
          </div>

          <div class="mp-contact-info__item">
            <div class="mp-contact-info__icon">✉️</div>
            <div class="mp-contact-info__text">
              <strong>Email Us</strong>
              <a href="mailto:info@medpracticeusa.com">info@medpracticeusa.com</a>
            </div>
          </div>

          <div class="mp-contact-info__item">
            <div class="mp-contact-info__icon">📍</div>
            <div class="mp-contact-info__text">
              <strong>Office</strong>
              <span>123 Medical Plaza Dr, Miami, FL 33101</span>
            </div>
          </div>

          <div class="mp-contact-info__item">
            <div class="mp-contact-info__icon">🕐</div>
            <div class="mp-contact-info__text">
              <strong>Hours</strong>
              <span>Mon–Fri: 8AM – 6PM EST</span>
            </div>
          </div>

        </div><!-- /.mp-contact-info -->

        <!-- Stats -->
        <div class="mp-contact-page__stats">
          <div class="mp-contact-page__stat">
            <strong>2,500+</strong><span>Practices Sold</span>
          </div>
          <div class="mp-contact-page__stat-sep"></div>
          <div class="mp-contact-page__stat">
            <strong>98%</strong><span>Success Rate</span>
          </div>
          <div class="mp-contact-page__stat-sep"></div>
          <div class="mp-contact-page__stat">
            <strong>30+</strong><span>States</span>
          </div>
        </div>

      </div><!-- /.mp-contact-page__left -->

      <!-- ── COLUMNA DERECHA: Formulario ── -->
      <div class="mp-contact-page__right">
        <div class="mp-contact-form-card">

          <div class="mp-contact-form-card__header">
            <h2>Schedule Free Consultation</h2>
            <p>Fill out the form and we'll get back to you within 24 hours.</p>
          </div>

          <?php
          /* Mostrar mensaje de éxito si se envió */
          if ( isset( $_GET['sent'] ) && $_GET['sent'] === '1' ) : ?>
            <div class="mp-contact-form__success">
              ✅ Thank you! We'll contact you within 24 hours.
            </div>
          <?php endif; ?>

          <form
            class="mp-contact-form"
            id="mp-contact-form"
            method="post"
            action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
            novalidate
          >
            <?php wp_nonce_field( 'mp_contact_form', 'mp_contact_nonce' ); ?>
            <input type="hidden" name="action" value="mp_contact_submit">

            <!-- Row: nombre + apellido -->
            <div class="mp-form-row mp-form-row--2col">
              <div class="mp-form-group">
                <label for="cf-first">First Name *</label>
                <input type="text" id="cf-first" name="first_name"
                       placeholder="John" required autocomplete="given-name">
              </div>
              <div class="mp-form-group">
                <label for="cf-last">Last Name *</label>
                <input type="text" id="cf-last" name="last_name"
                       placeholder="Smith" required autocomplete="family-name">
              </div>
            </div>

            <!-- Email + Phone -->
            <div class="mp-form-row mp-form-row--2col">
              <div class="mp-form-group">
                <label for="cf-email">Email *</label>
                <input type="email" id="cf-email" name="email"
                       placeholder="john@example.com" required autocomplete="email">
              </div>
              <div class="mp-form-group">
                <label for="cf-phone">Phone</label>
                <input type="tel" id="cf-phone" name="phone"
                       placeholder="(555) 000-0000" autocomplete="tel">
              </div>
            </div>

            <!-- Specialty + State -->
            <div class="mp-form-row mp-form-row--2col">
              <div class="mp-form-group">
                <label for="cf-specialty">Medical Specialty *</label>
                <select id="cf-specialty" name="specialty" required>
                  <option value="">Select specialty…</option>
                  <option>Family Medicine</option>
                  <option>Internal Medicine</option>
                  <option>Pediatrics</option>
                  <option>Cardiology</option>
                  <option>Dermatology</option>
                  <option>Dental Practice</option>
                  <option>Orthopedics</option>
                  <option>Psychiatry</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="mp-form-group">
                <label for="cf-state">Preferred State *</label>
                <select id="cf-state" name="preferred_state" required>
                  <option value="">Select state…</option>
                  <?php
                  $states = array('Alabama','Arizona','California','Colorado',
                    'Connecticut','Florida','Georgia','Illinois','Indiana',
                    'Kentucky','Louisiana','Maryland','Massachusetts','Michigan',
                    'Minnesota','Missouri','Nevada','New Jersey','New York',
                    'North Carolina','Ohio','Oregon','Pennsylvania',
                    'South Carolina','Tennessee','Texas','Virginia',
                    'Washington','Wisconsin');
                  foreach ($states as $st) :
                  ?>
                    <option><?php echo esc_html($st); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Budget -->
            <div class="mp-form-row">
              <div class="mp-form-group">
                <label for="cf-budget">Budget Range</label>
                <select id="cf-budget" name="budget">
                  <option value="">Select budget…</option>
                  <option>Under \$250K</option>
                  <option>\$250K – \$500K</option>
                  <option>\$500K – \$1M</option>
                  <option>\$1M – \$2M</option>
                  <option>Over \$2M</option>
                </select>
              </div>
            </div>

            <!-- Message -->
            <div class="mp-form-row">
              <div class="mp-form-group">
                <label for="cf-message">Message</label>
                <textarea id="cf-message" name="message" rows="2"
                          placeholder="Tell us about your practice acquisition goals…"></textarea>
              </div>
            </div>

            <button type="submit" class="mp-btn mp-btn--accent mp-btn--large mp-form__submit">
              Schedule Free Consultation →
            </button>

            <p class="mp-form__disclaimer">
              🔒 Your information is 100% confidential. No spam, ever.
            </p>

          </form>
        </div><!-- /.mp-contact-form-card -->
      </div><!-- /.mp-contact-page__right -->

    </div><!-- /.mp-contact-page__inner -->
  </div><!-- /.mp-container -->

</section>

<?php get_footer(); ?>
