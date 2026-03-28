<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="mp-skip-link mp-sr-only" href="#main-content">Skip to main content</a>

<header class="mp-header" id="site-header" role="banner">
  <div class="mp-header__inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url('/') ); ?>"
       class="mp-logo"
       aria-label="MedPractice USA - Home">
      <div class="mp-logo__icon">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
          <path d="M12 2L2 7V17L12 22L22 17V7L12 2Z"
                stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
          <path d="M12 8V16M8 12H16"
                stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </div>
      <span class="mp-logo__text">
        <strong>Med</strong>Practice <span class="mp-logo__usa">USA</span>
      </span>
    </a>

    <!-- Nav desktop -->
    <nav class="mp-nav"
         id="primary-navigation"
         role="navigation"
         aria-label="Primary Navigation">

      <ul class="mp-nav__list">
        <li>
          <a href="<?php echo esc_url( home_url('/') ); ?>"
             class="mp-nav__link">
            Home
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url('/#services') ); ?>"
             class="mp-nav__link">
            Services
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url('/#locations') ); ?>"
             class="mp-nav__link">
            Locations
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url('/#process') ); ?>"
             class="mp-nav__link">
            Process
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url('/#testimonials') ); ?>"
             class="mp-nav__link">
            Testimonials
          </a>
        </li>
        <li>
          <a href="<?php echo esc_url( home_url('/#cta') ); ?>"
             class="mp-nav__link">
            Contact
          </a>
        </li>
      </ul>

      <a href="<?php echo esc_url( home_url('/#cta') ); ?>"
         class="mp-btn mp-btn--accent">
        Free Consultation
      </a>

    </nav>

    <!-- Mobile toggle -->
    <button class="mp-menu-toggle"
            id="menu-toggle"
            aria-label="Toggle navigation menu"
            aria-controls="primary-navigation"
            aria-expanded="false">
      <span class="mp-menu-toggle__bar"></span>
      <span class="mp-menu-toggle__bar"></span>
      <span class="mp-menu-toggle__bar"></span>
    </button>

  </div>
</header>

<main id="main-content" class="mp-main" role="main">
