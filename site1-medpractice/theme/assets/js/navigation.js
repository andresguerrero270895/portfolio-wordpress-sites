/**
 * MedPractice Navigation v5
 * Mapeo por ID de sección → texto del link (no por índice)
 */
(function () {
  'use strict';

  const header     = document.getElementById('site-header');
  const menuToggle = document.getElementById('menu-toggle');

  /* ── Offset header + admin bar ── */
  function getOffset() {
    const bar = document.getElementById('wpadminbar');
    return (header ? header.offsetHeight : 72) +
           (bar    ? bar.offsetHeight    :  0) + 4;
  }

  /* ─────────────────────────────────
     1. SCROLL → header .scrolled
  ───────────────────────────────── */
  function onScroll() {
    if (!header) return;
    header.classList.toggle('scrolled', window.scrollY > 30);
    checkBottom();
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ─────────────────────────────────
     2. ACTIVE NAV
     Mapeo por TEXT CONTENT del link
     → independiente del orden en el DOM
  ───────────────────────────────── */

  /*
   * Mapeo: id de sección → texto EXACTO del link en el nav
   * (en minúsculas, sin espacios extra)
   */
  const SECTION_TO_NAVTEXT = {
    'hero'        : 'home',
    'services'    : 'services',
    'process'     : 'process',
    'locations'   : 'locations',
    'testimonials': 'testimonials',
    'cta'         : 'contact',
  };

  function clearActive() {
    document.querySelectorAll('.mp-nav__link')
      .forEach(l => l.classList.remove('mp-nav__link--active'));
  }

  function setActiveByText(navText) {
    if (!navText) return;
    clearActive();
    document.querySelectorAll('.mp-nav__link').forEach(function(link) {
      const text = link.textContent.trim().toLowerCase();
      if (text === navText.toLowerCase()) {
        link.classList.add('mp-nav__link--active');
      }
    });
  }

  /* Intersection Observer */
  const sections = document.querySelectorAll('section[id]');

  if (sections.length && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver(
      function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            const navText = SECTION_TO_NAVTEXT[entry.target.id];
            if (navText) setActiveByText(navText);
          }
        });
      },
      {
        rootMargin: '-15% 0px -80% 0px',
        threshold : 0,
      }
    );
    sections.forEach(s => io.observe(s));
  }

  /* Al llegar al fondo → Contact activo */
  function checkBottom() {
    const scrolled = window.scrollY + window.innerHeight;
    const total    = document.documentElement.scrollHeight;
    if (scrolled >= total - 100) {
      setActiveByText('contact');
    }
  }

  /* ─────────────────────────────────
     3. Páginas distintas a HOME
  ───────────────────────────────── */
  const isHome = document.body.classList.contains('home') ||
                 document.body.classList.contains('front-page');

  if (!isHome) {
    clearActive();

    /* Archive / single state_landing → Locations */
    if (
      document.body.classList.contains('post-type-archive-state_landing') ||
      document.body.classList.contains('single-state_landing')
    ) {
      setActiveByText('locations');
      return;
    }

    /* Página contact */
    if (window.location.href.includes('contact')) {
      setActiveByText('contact');
      return;
    }

    /* Cualquier otra página: comparar URL */
    const cur = window.location.href.replace(/\/$/, '');
    document.querySelectorAll('.mp-nav__link').forEach(function(link) {
      const href = (link.getAttribute('href') || '').replace(/\/$/, '');
      if (href && !href.includes('#') && cur === href) {
        clearActive();
        link.classList.add('mp-nav__link--active');
      }
    });
  }

  /* ─────────────────────────────────
     4. SMOOTH SCROLL
  ───────────────────────────────── */
  document.addEventListener('click', function(e) {
    const anchor = e.target.closest('a[href*="#"]');
    if (!anchor) return;

    const href    = anchor.getAttribute('href') || '';
    const hashIdx = href.indexOf('#');
    if (hashIdx === -1) return;

    const hash   = href.slice(hashIdx + 1);
    if (!hash) return;

    const target = document.getElementById(hash);
    if (!target) return;

    const linkBase = href.slice(0, hashIdx);
    if (linkBase && linkBase !== '/' &&
        !window.location.href.includes(linkBase)) return;

    e.preventDefault();

    const top = target.getBoundingClientRect().top +
                window.scrollY - getOffset();

    window.scrollTo({ top: Math.max(0, top), behavior: 'smooth' });
    history.pushState(null, '', '#' + hash);

    const navText = SECTION_TO_NAVTEXT[hash];
    if (navText) setActiveByText(navText);

    closeMobileMenu();
  });

  /* ─────────────────────────────────
     5. MOBILE MENU
  ───────────────────────────────── */
  let mobileNav = null;

  function buildMobileNav() {
    const src    = document.getElementById('primary-navigation');
    const drawer = document.createElement('nav');
    drawer.id    = 'mobile-nav';
    drawer.classList.add('mp-mobile-nav');
    drawer.setAttribute('aria-label', 'Mobile navigation');
    if (src) drawer.innerHTML = src.innerHTML;
    document.body.appendChild(drawer);
    return drawer;
  }

  function closeMobileMenu() {
    if (!mobileNav) return;
    mobileNav.classList.remove('is-open');
    if (menuToggle) {
      menuToggle.classList.remove('is-active');
      menuToggle.setAttribute('aria-expanded', 'false');
    }
    document.body.style.overflow = '';
  }

  if (menuToggle) {
    menuToggle.addEventListener('click', function() {
      const open = menuToggle.classList.toggle('is-active');
      menuToggle.setAttribute('aria-expanded', String(open));
      if (!mobileNav) mobileNav = buildMobileNav();
      mobileNav.classList.toggle('is-open', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
  }

  document.addEventListener('click', function(e) {
    if (!mobileNav || !mobileNav.classList.contains('is-open')) return;
    if (header && header.contains(e.target)) return;
    if (mobileNav.contains(e.target)) return;
    closeMobileMenu();
  });

})();
