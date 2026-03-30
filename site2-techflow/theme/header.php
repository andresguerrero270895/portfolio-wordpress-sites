<?php
/**
 * header.php — Andres Guerrero | Full Stack Developer
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('tf-site'); ?>>
<?php wp_body_open(); ?>

<!-- PAGE LOADER -->
<div id="tf-loader" class="tf-loader">
    <div class="tf-loader-inner">
        <div class="tf-loader-logo">
            <span class="tf-loader-logo-text">Andres<span>Dev</span></span>
        </div>
        <div class="tf-loader-bar">
            <div class="tf-loader-progress"></div>
        </div>
        <div class="tf-loader-count">0%</div>
    </div>
</div>

<!-- CUSTOM CURSOR -->
<div id="tf-cursor"       class="tf-cursor"></div>
<div id="tf-cursor-trail" class="tf-cursor-trail"></div>

<!-- HEADER -->
<header id="tf-header" class="tf-header">
    <div class="tf-header-inner tf-container">

        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="tf-logo" aria-label="Andres Guerrero Home">
            <div class="tf-logo-icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <rect width="32" height="32" rx="8" fill="url(#tf-logo-grad)"/>
                    <text x="50%" y="50%" dominant-baseline="central" text-anchor="middle"
                          fill="white" font-size="13" font-weight="800"
                          font-family="'Sora',sans-serif">AG</text>
                    <defs>
                        <linearGradient id="tf-logo-grad" x1="0" y1="0" x2="32" y2="32">
                            <stop offset="0%" stop-color="#7C3AED"/>
                            <stop offset="100%" stop-color="#06B6D4"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <span class="tf-logo-text">Andres<span>Dev</span></span>
        </a>

        <!-- Nav Desktop -->
        <nav class="tf-nav" aria-label="Primary navigation">
            <ul class="tf-nav-list">
                <li class="tf-nav-item tf-has-dropdown">
                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="tf-nav-link">
                        Services
                        <svg class="tf-nav-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 9l6 6 6-6"/>
                        </svg>
                    </a>
                    <div class="tf-dropdown tf-mega-menu">
                        <div class="tf-mega-grid">
                            <?php
                            $services = [
                                ['icon'=>'🌐','title'=>'WordPress Development', 'desc'=>'Custom themes, plugins & full site builds',  'anchor'=>'wordpress'],
                                ['icon'=>'🎨','title'=>'Web Design & UI/UX',    'desc'=>'Modern, conversion-focused interfaces',      'anchor'=>'design'],
                                ['icon'=>'🛒','title'=>'E-commerce',            'desc'=>'WooCommerce stores & custom shops',          'anchor'=>'ecommerce'],
                                ['icon'=>'⚛️','title'=>'Frontend / React',      'desc'=>'SPAs and interactive UIs',                  'anchor'=>'frontend'],
                                ['icon'=>'⚙️','title'=>'Backend Development',   'desc'=>'Node.js, PHP & PostgreSQL APIs',            'anchor'=>'backend'],
                                ['icon'=>'📈','title'=>'SEO Optimization',      'desc'=>'Rankings, speed & Core Web Vitals',         'anchor'=>'seo'],
                                ['icon'=>'🚀','title'=>'Digital Marketing',     'desc'=>'Landing pages, ads & social media',         'anchor'=>'marketing'],
                                ['icon'=>'🤖','title'=>'AI Automation',         'desc'=>'Workflows, chatbots & pipelines',           'anchor'=>'automation'],
                                ['icon'=>'🧠','title'=>'AI Agents',             'desc'=>'Custom intelligent agents & RAG',           'anchor'=>'agents'],
                            ];
                            foreach($services as $s): ?>
                            <a href="<?php echo esc_url(home_url('/services/#' . $s['anchor'])); ?>" class="tf-mega-item">
                                <span class="tf-mega-icon"><?php echo $s['icon']; ?></span>
                                <div>
                                    <div class="tf-mega-title"><?php echo esc_html($s['title']); ?></div>
                                    <div class="tf-mega-desc"><?php echo esc_html($s['desc']); ?></div>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="tf-mega-footer">
                            <span>🟢 Available for new projects</span>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                               class="tf-btn tf-btn-accent"
                               style="padding:.5rem 1.25rem;font-size:.85rem;">
                                Start a Project →
                            </a>
                        </div>
                    </div>
                </li>
                <li class="tf-nav-item">
                    <a href="<?php echo esc_url(home_url('/work/')); ?>"    class="tf-nav-link">Work</a>
                </li>
                <li class="tf-nav-item">
                    <a href="<?php echo esc_url(home_url('/about/')); ?>"   class="tf-nav-link">About</a>
                </li>
                <li class="tf-nav-item">
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>"    class="tf-nav-link">Blog</a>
                </li>
            </ul>
        </nav>

        <!-- Actions -->
        <div class="tf-header-actions">
            <!-- ✅ AGREGAR ESTO -->
             <button class="tf-theme-toggle" id="themeToggle" aria-label="Toggle theme" title="Toggle light/dark mode">
                <span class="tf-theme-toggle__icon tf-theme-toggle__icon--dark">🌙</span>
                <span class="tf-theme-toggle__icon tf-theme-toggle__icon--light" style="display:none">☀️</span>
            </button>
            
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="tf-btn tf-btn-ghost tf-nav-contact">
            Let's Talk</a>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="tf-btn tf-btn-primary">
            <span>Start Project</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
    </a>
    <button class="tf-mobile-toggle" id="tf-mobile-toggle" aria-label="Toggle menu">
        <span></span><span></span><span></span>
    </button>
</div>

    </div>

    <!-- Mobile Menu -->
    <div class="tf-mobile-menu" id="tf-mobile-menu">
        <nav class="tf-mobile-nav">
            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="tf-mobile-link">Services</a>
            <a href="<?php echo esc_url(home_url('/work/')); ?>"     class="tf-mobile-link">Work</a>
            <a href="<?php echo esc_url(home_url('/about/')); ?>"    class="tf-mobile-link">About</a>
            <a href="<?php echo esc_url(home_url('/blog/')); ?>"     class="tf-mobile-link">Blog</a>
        </nav>
        <div class="tf-mobile-actions">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
               class="tf-btn tf-btn-primary"
               style="width:100%;justify-content:center;">
                Start a Project →
            </a>
        </div>
        <div class="tf-mobile-badge">
            <span class="tf-badge tf-badge-green tf-badge-dot">Available for Projects</span>
        </div>
    </div>

</header>

<style>
/* ============================================================
   LOADER
============================================================ */

/* ============================================================
   THEME TOGGLE BUTTON
============================================================ */
.tf-theme-toggle {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--tf-bg-card);
    border: 1px solid var(--tf-border);
    border-radius: 10px;
    cursor: pointer;
    transition: all .25s;
    font-size: 1.1rem;
    flex-shrink: 0;
}
.tf-theme-toggle:hover {
    background: rgba(124,58,237,.15);
    border-color: var(--tf-primary);
    transform: translateY(-2px);
}

/* ============================================================
   LIGHT THEME VARIABLES
============================================================ */
body.tf-light {
    --tf-bg:             #F8FAFC;
    --tf-bg-2:           #F1F5F9;
    --tf-bg-card:        #FFFFFF;
    --tf-bg-card-hover:  #F8FAFC;
    --tf-primary:        #6D28D9;
    --tf-primary-light:  #7C3AED;
    --tf-primary-glow:   rgba(109,40,217,0.2);
    --tf-accent:         #0284C7;
    --tf-accent-2:       #D97706;
    --tf-green:          #059669;
    --tf-white:          #0F172A;
    --tf-gray-400:       #475569;
    --tf-gray-500:       #64748B;
    --tf-border:         rgba(109,40,217,0.2);
    --tf-border-subtle:  rgba(0,0,0,0.08);
}

/* Light theme overrides */
body.tf-light .tf-header.scrolled {
    background: rgba(248,250,252,0.92);
    border-bottom-color: rgba(0,0,0,0.08);
}
body.tf-light .tf-hero__grid {
    background-image:
        linear-gradient(rgba(109,40,217,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(109,40,217,.04) 1px, transparent 1px);
}
body.tf-light .tf-hero__glow--1 {
    opacity: .12;
}
body.tf-light .tf-hero__glow--2 {
    opacity: .10;
}
body.tf-light .tf-hero__card {
    box-shadow: 0 20px 60px rgba(0,0,0,.08);
}
body.tf-light .tf-service-card {
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
}
body.tf-light .tf-pricing-card--featured {
    background: linear-gradient(160deg, #fff 60%, rgba(109,40,217,.05));
}
body.tf-light .tf-mega-menu {
    background: rgba(255,255,255,0.97);
    box-shadow: 0 24px 64px rgba(0,0,0,.15);
}
body.tf-light .tf-mega-title  { color: #0F172A; }
body.tf-light .tf-mega-desc   { color: #64748B; }
body.tf-light .tf-mobile-menu {
    background: rgba(248,250,252,0.98);
}
body.tf-light .tf-mobile-link { color: #475569; }
body.tf-light .tf-mobile-link:hover { color: #0F172A; }
body.tf-light .tf-footer-main {
    background: #F1F5F9;
}
body.tf-light .tf-footer-cta {
    background: linear-gradient(135deg,
        rgba(109,40,217,.08) 0%,
        rgba(2,132,199,.06) 100%);
}
body.tf-light .tf-footer-bottom {
    background: #E2E8F0;
}
body.tf-light .tf-social-link {
    background: #fff;
    border-color: rgba(0,0,0,.08);
}
body.tf-light .tf-form-group input,
body.tf-light .tf-form-group select,
body.tf-light .tf-form-group textarea {
    background: #F8FAFC;
    border-color: #CBD5E1;
    color: #0F172A;
}
body.tf-light .tf-form-group input::placeholder,
body.tf-light .tf-form-group textarea::placeholder {
    color: #94A3B8;
}
body.tf-light .tf-contact__card {
    background: #fff;
}
body.tf-light .tf-work-card,
body.tf-light .tf-project-card {
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
}
body.tf-light .tf-faq__item {
    background: #fff;
}
body.tf-light .tf-timeline__list::before {
    opacity: .6;
}
body.tf-light .tf-skills-group {
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
}
body.tf-light .tf-value-card {
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
}
body.tf-light .tf-pricing-card {
    box-shadow: 0 2px 16px rgba(0,0,0,.06);
}
body.tf-light .tf-cta-section__inner {
    background: #fff;
    box-shadow: 0 4px 24px rgba(0,0,0,.08);
}
body.tf-light .tf-theme-toggle {
    background: #fff;
    border-color: #CBD5E1;
}
body.tf-light .tf-footer-newsletter-input {
    background: #fff;
    border-color: #CBD5E1;
    color: #0F172A;
}
body.tf-light .tf-about-intro__info-card {
    box-shadow: 0 2px 12px rgba(0,0,0,.06);
}

/* Smooth transition for theme switch */
body {
    transition:
        background-color .3s ease,
        color .3s ease;
}
body * {
    transition:
        background-color .3s ease,
        border-color .3s ease,
        color .3s ease,
        box-shadow .3s ease;
}

/* ❌ ANTES — se cierra con scroll porque depende de :hover */
.tf-has-dropdown:hover .tf-dropdown {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translateX(-50%) translateY(0);
}
.tf-has-dropdown:hover .tf-nav-chevron {
    transform: rotate(180deg);
}

/* ✅ DESPUÉS — controlado por clase JS */
.tf-has-dropdown.tf-mega--open .tf-dropdown {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translateX(-50%) translateY(0);
}
.tf-has-dropdown.tf-mega--open .tf-nav-chevron {
    transform: rotate(180deg);
}

.tf-loader {
    position: fixed;
    inset: 0;
    background: var(--tf-bg);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: opacity .5s ease, visibility .5s ease;
}
.tf-loader.hidden {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}
.tf-loader-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
}
.tf-loader-logo-text {
    font-family: var(--tf-font-display);
    font-size: 2rem;
    font-weight: 800;
    color: var(--tf-white);
    letter-spacing: -0.03em;
}
.tf-loader-logo-text span {
    background: linear-gradient(135deg, var(--tf-primary-light), var(--tf-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.tf-loader-bar {
    width: 200px;
    height: 2px;
    background: var(--tf-border-subtle);
    border-radius: 2px;
    overflow: hidden;
}
.tf-loader-progress {
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, var(--tf-primary), var(--tf-accent));
    border-radius: 2px;
    transition: width .05s linear;
}
.tf-loader-count {
    font-family: var(--tf-font-mono);
    font-size: .85rem;
    color: var(--tf-gray-500);
}

/* ============================================================
   CUSTOM CURSOR
============================================================ */
.tf-cursor,
.tf-cursor-trail {
    position: fixed;
    border-radius: 50%;
    pointer-events: none;
    z-index: 9998;
}
.tf-cursor {
    width: 10px;
    height: 10px;
    background: var(--tf-primary-light);
    transform: translate(-50%, -50%);
    transition: transform .1s var(--tf-ease), background .2s;
}
.tf-cursor-trail {
    width: 36px;
    height: 36px;
    border: 1.5px solid rgba(124,58,237,0.5);
    transform: translate(-50%, -50%);
    transition: transform .25s var(--tf-ease), width .25s, height .25s, border-color .25s;
}
.tf-cursor.hovering {
    transform: translate(-50%,-50%) scale(2.5);
    background: var(--tf-accent);
}
.tf-cursor-trail.hovering {
    width: 60px;
    height: 60px;
    border-color: var(--tf-accent);
    opacity: .4;
}
@media (hover: none) {
    .tf-cursor, .tf-cursor-trail { display: none; }
}

/* ============================================================
   HEADER BASE
============================================================ */
.tf-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    padding-block: 1.25rem;
    transition: all .3s var(--tf-ease);
}
.tf-header.scrolled {
    padding-block: .875rem;
    background: rgba(5,7,15,0.88);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 1px solid var(--tf-border-subtle);
    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
}
.tf-header-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
}

/* ============================================================
   LOGO
============================================================ */
.tf-logo {
    display: flex;
    align-items: center;
    gap: .75rem;
    text-decoration: none;
    flex-shrink: 0;
}
.tf-logo-icon { flex-shrink: 0; }
.tf-logo-text {
    font-family: var(--tf-font-display);
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--tf-white);
    letter-spacing: -0.02em;
}
.tf-logo-text span {
    background: linear-gradient(135deg, var(--tf-primary-light), var(--tf-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* ============================================================
   NAV DESKTOP
============================================================ */
.tf-nav { flex: 1; display: flex; justify-content: center; }
.tf-nav-list {
    display: flex;
    align-items: center;
    gap: .25rem;
    list-style: none;
    margin: 0;
    padding: 0;
}
.tf-nav-item { position: relative; }
.tf-nav-link {
    display: flex;
    align-items: center;
    gap: .3rem;
    padding: .5rem .9rem;
    border-radius: 8px;
    color: var(--tf-gray-400);
    font-size: .9rem;
    font-weight: 500;
    transition: all .2s var(--tf-ease);
    white-space: nowrap;
    text-decoration: none;
}
.tf-nav-link:hover {
    color: var(--tf-white);
    background: rgba(255,255,255,0.05);
}
.tf-nav-item.active .tf-nav-link { color: var(--tf-white); }
.tf-nav-chevron { transition: transform .2s var(--tf-ease); }
.tf-has-dropdown:hover .tf-nav-chevron { transform: rotate(180deg); }

/* ============================================================
   MEGA MENU
============================================================ */
.tf-dropdown {
    position: absolute;
    top: calc(100% + 1rem);
    left: 50%;
    transform: translateX(-50%) translateY(-8px);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: all .25s var(--tf-ease);
}
.tf-has-dropdown:hover .tf-dropdown {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translateX(-50%) translateY(0);
}
.tf-mega-menu {
    width: 560px;
    background: rgba(10,14,26,0.97);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid var(--tf-border-subtle);
    border-radius: var(--tf-radius-lg);
    padding: 1.25rem;
    box-shadow: 0 24px 64px rgba(0,0,0,0.6),
                0 0 0 1px var(--tf-border-subtle);
}
.tf-mega-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: .5rem;
    margin-bottom: 1rem;
}
.tf-mega-item {
    display: flex;
    align-items: flex-start;
    gap: .75rem;
    padding: .85rem;
    border-radius: var(--tf-radius-sm);
    transition: background .2s;
    text-decoration: none;
}
.tf-mega-item:hover { background: rgba(124,58,237,0.1); }
.tf-mega-icon { font-size: 1.25rem; flex-shrink: 0; }
.tf-mega-title {
    font-size: .82rem;
    font-weight: 600;
    color: var(--tf-white);
    margin-bottom: .2rem;
}
.tf-mega-desc {
    font-size: .72rem;
    color: var(--tf-gray-500);
    line-height: 1.4;
}
.tf-mega-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 1rem;
    border-top: 1px solid var(--tf-border-subtle);
    font-size: .8rem;
    color: var(--tf-gray-500);
}

/* ============================================================
   HEADER ACTIONS
============================================================ */
.tf-header-actions {
    display: flex;
    align-items: center;
    gap: .75rem;
    flex-shrink: 0;
}

/* ============================================================
   MOBILE TOGGLE
============================================================ */
.tf-mobile-toggle {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: .5rem;
}
.tf-mobile-toggle span {
    display: block;
    width: 24px;
    height: 2px;
    background: var(--tf-white);
    border-radius: 2px;
    transition: all .3s var(--tf-ease);
}
.tf-mobile-toggle.active span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
.tf-mobile-toggle.active span:nth-child(2) { opacity: 0; transform: scaleX(0); }
.tf-mobile-toggle.active span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }

/* ============================================================
   MOBILE MENU
============================================================ */
.tf-mobile-menu {
    display: none;
    padding: 1.5rem var(--tf-px) 2rem;
    border-top: 1px solid var(--tf-border-subtle);
    background: rgba(5,7,15,0.98);
    backdrop-filter: blur(20px);
}
.tf-mobile-menu.open { display: block; }
.tf-mobile-nav {
    display: flex;
    flex-direction: column;
    gap: .25rem;
    margin-bottom: 1.5rem;
}
.tf-mobile-link {
    display: block;
    padding: .85rem 1rem;
    color: var(--tf-gray-400);
    font-weight: 500;
    border-radius: var(--tf-radius-sm);
    font-size: 1.05rem;
    transition: all .2s;
    text-decoration: none;
}
.tf-mobile-link:hover {
    color: var(--tf-white);
    background: rgba(255,255,255,0.05);
}
.tf-mobile-actions { margin-bottom: 1rem; }
.tf-mobile-badge   { display: flex; justify-content: center; }

/* ============================================================
   STARS
============================================================ */
.tf-stars     { display: flex; gap: .2rem; }
.tf-star      { color: var(--tf-border-subtle); font-size: 1rem; }
.tf-star.filled { color: var(--tf-accent-2); }

/* ============================================================
   STACK PILLS
============================================================ */
.tf-stack-pills { display: flex; flex-wrap: wrap; gap: .4rem; }
.tf-stack-pill {
    display: inline-block;
    padding: .25rem .7rem;
    background: rgba(124,58,237,0.1);
    border: 1px solid rgba(124,58,237,0.2);
    border-radius: 50px;
    font-size: .75rem;
    font-weight: 600;
    color: var(--tf-primary-light);
    font-family: var(--tf-font-mono);
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 1024px) {
    .tf-nav-contact { display: none; }
}
@media (max-width: 768px) {
    .tf-nav           { display: none; }
    .tf-mobile-toggle { display: flex; }
    .tf-header-actions > a:not(.tf-mobile-toggle) { display: none; }
}
@media (max-width: 480px) {
    .tf-header-actions > a { display: none; }
}
</style>

<script>


(function(){
'use strict';


/* ============================================================
   MEGA MENU — Click toggle (fix scroll close)
============================================================ */
const megaParent = document.querySelector('.tf-has-dropdown');
const megaMenu   = document.querySelector('.tf-dropdown');

if (megaParent && megaMenu) {
    // Click en el nav link abre/cierra
    const navLink = megaParent.querySelector('.tf-nav-link');

    navLink.addEventListener('click', function(e) {
        e.preventDefault();
        const isOpen = megaParent.classList.contains('tf-mega--open');

        // Cerrar todos
        document.querySelectorAll('.tf-has-dropdown').forEach(el => {
            el.classList.remove('tf-mega--open');
        });

        // Abrir si estaba cerrado
        if (!isOpen) {
            megaParent.classList.add('tf-mega--open');
        } else {
            // Si ya estaba abierto — navegar a services
            window.location.href = navLink.getAttribute('href') || '/services/';
        }
    });

    // Cerrar al hacer click fuera
    document.addEventListener('click', function(e) {
        if (!megaParent.contains(e.target)) {
            megaParent.classList.remove('tf-mega--open');
        }
    });

    // Cerrar al hacer scroll
    // ✅ NO cerrar en scroll — ese es el fix!
    // Removemos el cierre por scroll
}

/* PAGE LOADER */
const loader   = document.getElementById('tf-loader');
const progress = loader ? loader.querySelector('.tf-loader-progress') : null;
const count    = loader ? loader.querySelector('.tf-loader-count')    : null;

if(loader){
    let pct = 0;
    const interval = setInterval(()=>{
        pct += Math.random() * 15;
        if(pct >= 100){
            pct = 100;
            clearInterval(interval);
            if(progress) progress.style.width = '100%';
            if(count)    count.textContent    = '100%';
            setTimeout(()=>{
                loader.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        } else {
            if(progress) progress.style.width = pct + '%';
            if(count)    count.textContent    = Math.floor(pct) + '%';
        }
    }, 80);
    document.body.style.overflow = 'hidden';
}

/* CUSTOM CURSOR */
const cursor      = document.getElementById('tf-cursor');
const cursorTrail = document.getElementById('tf-cursor-trail');

if(cursor && cursorTrail && window.matchMedia('(hover:hover)').matches){
    let mouseX = 0, mouseY = 0;
    let trailX = 0, trailY = 0;

    document.addEventListener('mousemove', e =>{
        mouseX = e.clientX;
        mouseY = e.clientY;
        cursor.style.left = mouseX + 'px';
        cursor.style.top  = mouseY + 'px';
    });

    function animateTrail(){
        trailX += (mouseX - trailX) * 0.12;
        trailY += (mouseY - trailY) * 0.12;
        cursorTrail.style.left = trailX + 'px';
        cursorTrail.style.top  = trailY + 'px';
        requestAnimationFrame(animateTrail);
    }
    animateTrail();

    const hoverEls = document.querySelectorAll('a, button, .tf-card, .tf-btn, input, textarea');
    hoverEls.forEach(el =>{
        el.addEventListener('mouseenter', ()=>{
            cursor.classList.add('hovering');
            cursorTrail.classList.add('hovering');
        });
        el.addEventListener('mouseleave', ()=>{
            cursor.classList.remove('hovering');
            cursorTrail.classList.remove('hovering');
        });
    });

    document.addEventListener('mouseleave', ()=>{
        cursor.style.opacity      = '0';
        cursorTrail.style.opacity = '0';
    });
    document.addEventListener('mouseenter', ()=>{
        cursor.style.opacity      = '1';
        cursorTrail.style.opacity = '1';
    });
}

/* HEADER SCROLL */
const header = document.getElementById('tf-header');
if(header){
    let lastScroll = 0;
    window.addEventListener('scroll', ()=>{
        const scrollY = window.scrollY;
        if(scrollY > 50){
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        if(scrollY > 300){
            if(scrollY > lastScroll + 5){
                header.style.transform = 'translateY(-100%)';
            } else if(scrollY < lastScroll - 5){
                header.style.transform = 'translateY(0)';
            }
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScroll = scrollY;
    }, { passive: true });
}

/* MOBILE MENU */
const mobileToggle = document.getElementById('tf-mobile-toggle');
const mobileMenu   = document.getElementById('tf-mobile-menu');

if(mobileToggle && mobileMenu){
    mobileToggle.addEventListener('click', ()=>{
        const isOpen = mobileMenu.classList.contains('open');
        mobileMenu.classList.toggle('open');
        mobileToggle.classList.toggle('active');
        document.body.style.overflow = isOpen ? '' : 'hidden';
    });

    mobileMenu.querySelectorAll('.tf-mobile-link').forEach(link =>{
        link.addEventListener('click', ()=>{
            mobileMenu.classList.remove('open');
            mobileToggle.classList.remove('active');
            document.body.style.overflow = '';
        });
    });

    document.addEventListener('click', e =>{
        if(!header.contains(e.target)){
            mobileMenu.classList.remove('open');
            mobileToggle.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
}

/* ACTIVE NAV */
const navLinks    = document.querySelectorAll('.tf-nav-link, .tf-mobile-link');
const currentPath = window.location.pathname;

navLinks.forEach(link =>{
    const href = link.getAttribute('href');
    if(href && href !== '#' && currentPath.includes(href.replace(window.location.origin,''))){
        link.closest('.tf-nav-item')?.classList.add('active');
        link.style.color = 'var(--tf-white)';
    }
});

/* SCROLL REVEAL */
const revealEls = document.querySelectorAll('.tf-reveal');
if('IntersectionObserver' in window && revealEls.length){
    const io = new IntersectionObserver((entries)=>{
        entries.forEach(e =>{
            if(e.isIntersecting){
                e.target.classList.add('visible');
                io.unobserve(e.target);
            }
        });
    },{ threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    revealEls.forEach(el => io.observe(el));
} else {
    revealEls.forEach(el => el.classList.add('visible'));
}

/* SMOOTH SCROLL */
document.querySelectorAll('a[href^="#"]').forEach(link =>{
    link.addEventListener('click', function(e){
        const target = document.querySelector(this.getAttribute('href'));
        if(!target) return;
        e.preventDefault();
        const offset = 80;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
    });
});

/* ============================================================
   THEME TOGGLE — Dark / Light
============================================================ */
const themeToggle   = document.getElementById('themeToggle');
const iconDark      = document.querySelector('.tf-theme-toggle__icon--dark');
const iconLight     = document.querySelector('.tf-theme-toggle__icon--light');
const savedTheme    = localStorage.getItem('tf-theme') || 'dark';

// Apply saved theme on load
function applyTheme(theme) {
    if (theme === 'light') {
        document.body.classList.add('tf-light');
        if (iconDark)  iconDark.style.display  = 'none';
        if (iconLight) iconLight.style.display = 'block';
    } else {
        document.body.classList.remove('tf-light');
        if (iconDark)  iconDark.style.display  = 'block';
        if (iconLight) iconLight.style.display = 'none';
    }
}

applyTheme(savedTheme);

if (themeToggle) {
    themeToggle.addEventListener('click', function() {
        const isLight = document.body.classList.contains('tf-light');
        const newTheme = isLight ? 'dark' : 'light';
        localStorage.setItem('tf-theme', newTheme);
        applyTheme(newTheme);

        // Animate button
        this.style.transform = 'scale(0.85) rotate(20deg)';
        setTimeout(() => {
            this.style.transform = '';
        }, 200);
    });
}

})();
</script>