<?php
/**
 * footer.php — Andres Esteban Guerrero Rios
 * Full Stack Developer — Medellín, Colombia
 */
?>

<footer class="tf-footer">

    <!-- Top CTA Strip -->
    <div class="tf-footer-cta">
        <div class="tf-container">
            <div class="tf-footer-cta-inner">
                <div class="tf-footer-cta-content">
                    <span class="tf-badge tf-badge-green tf-badge-dot" style="margin-bottom:1rem;">
                        Available for Projects
                    </span>
                    <h2 class="tf-footer-cta-title">
                        Have a project in mind?<br>
                        <span class="tf-gradient-text">Let's build it together.</span>
                    </h2>
                    <p class="tf-footer-cta-desc">
                        From concept to launch — I build digital products that
                        perform, scale and stand out. WordPress, React, AI and more.
                    </p>
                </div>
                <div class="tf-footer-cta-actions">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                       class="tf-btn tf-btn-primary tf-btn-lg">
                        <span>Start a Project</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(home_url('/work/')); ?>"
                       class="tf-btn tf-btn-ghost">
                        View My Work
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="tf-footer-divider"></div>

    <!-- Main Footer -->
    <div class="tf-footer-main">
        <div class="tf-container">
            <div class="tf-footer-grid">

                <!-- Col 1: Brand -->
                <div class="tf-footer-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="tf-logo" style="margin-bottom:1.25rem;">
                        <div class="tf-logo-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <rect width="32" height="32" rx="8" fill="url(#tf-footer-grad)"/>
                                <text x="50%" y="50%" dominant-baseline="central" text-anchor="middle"
                                      fill="white" font-size="13" font-weight="800"
                                      font-family="'Sora',sans-serif">AG</text>
                                <defs>
                                    <linearGradient id="tf-footer-grad" x1="0" y1="0" x2="32" y2="32">
                                        <stop offset="0%" stop-color="#7C3AED"/>
                                        <stop offset="100%" stop-color="#06B6D4"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <span class="tf-logo-text">Andres<span>Dev</span></span>
                    </a>
                    <p class="tf-footer-brand-desc">
                        Full Stack Developer from Medellín, Colombia 🇨🇴
                        Building modern web solutions — WordPress, React, Node.js,
                        AI Automation and digital marketing strategies.
                    </p>
                    <!-- Social Links -->
                    <div class="tf-footer-social">
                        <a href="https://github.com/andresguerrero270895"
                           target="_blank"
                           class="tf-social-link"
                           aria-label="GitHub">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/andres-guerrero-00862a217/"
                           target="_blank"
                           class="tf-social-link"
                           aria-label="LinkedIn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="mailto:guerrero9510@hotmail.com"
                           class="tf-social-link"
                           aria-label="Email">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Services -->
                <div class="tf-footer-col">
                    <h4 class="tf-footer-col-title">Services</h4>
                    <ul class="tf-footer-links">
                        <li><a href="<?php echo esc_url(home_url('/services/#wordpress')); ?>">WordPress Development</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#design')); ?>">Web Design & UI/UX</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#ecommerce')); ?>">E-commerce</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#frontend')); ?>">Frontend / React</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#backend')); ?>">Backend Development</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#seo')); ?>">SEO Optimization</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#marketing')); ?>">Digital Marketing</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#automation')); ?>">AI Automation</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/#agents')); ?>">AI Agents</a></li>
                    </ul>
                </div>

                <!-- Col 3: Navigation -->
                <div class="tf-footer-col">
                    <h4 class="tf-footer-col-title">Navigation</h4>
                    <ul class="tf-footer-links">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About Me</a></li>
                        <li><a href="<?php echo esc_url(home_url('/work/')); ?>">My Work</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Services</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                    </ul>

                    <h4 class="tf-footer-col-title" style="margin-top:2rem;">Tech Stack</h4>
                    <ul class="tf-footer-links">
                        <li><a href="#">WordPress & WooCommerce</a></li>
                        <li><a href="#">React & JavaScript</a></li>
                        <li><a href="#">Node.js & PHP</a></li>
                        <li><a href="#">PostgreSQL</a></li>
                        <li><a href="#">Python & AI Tools</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact -->
                <div class="tf-footer-col">
                    <h4 class="tf-footer-col-title">Get In Touch</h4>
                    <ul class="tf-footer-contact-list">
                        <li>
                            <span class="tf-footer-contact-icon">✉️</span>
                            <a href="mailto:guerrero9510@hotmail.com">guerrero9510@hotmail.com</a>
                        </li>
                        <li>
                            <span class="tf-footer-contact-icon">💼</span>
                            <a href="https://www.linkedin.com/in/andres-guerrero-00862a217/" target="_blank">LinkedIn Profile</a>
                        </li>
                        <li>
                            <span class="tf-footer-contact-icon">💻</span>
                            <a href="https://github.com/andresguerrero270895" target="_blank">GitHub Profile</a>
                        </li>
                        <li>
                            <span class="tf-footer-contact-icon">📍</span>
                            <span>Medellín, Antioquia, Colombia 🇨🇴</span>
                        </li>
                        <li>
                            <span class="tf-footer-contact-icon">🕐</span>
                            <span>Mon–Fri, 8am–6pm COT</span>
                        </li>
                        <li>
                            <span class="tf-footer-contact-icon">🌎</span>
                            <span>Available worldwide (EN / ES)</span>
                        </li>
                    </ul>

                    <!-- Quick contact CTA -->
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                       class="tf-footer-contact-cta">
                        <span>💬 Let's talk about your project →</span>
                    </a>
                </div>

            </div><!-- /footer-grid -->
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="tf-footer-bottom">
        <div class="tf-container">
            <div class="tf-footer-bottom-inner">
                <p class="tf-footer-copy">
                    © <?php echo date('Y'); ?> Andres Esteban Guerrero Rios.
                    Built with <span style="color:#EF4444;">♥</span> and clean code
                    from Medellín, Colombia 🇨🇴
                </p>
                <div class="tf-footer-bottom-links">
                    <a href="<?php echo esc_url(home_url('/about/')); ?>">About</a>
                    <a href="<?php echo esc_url(home_url('/work/')); ?>">Work</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a>
                </div>
                <div class="tf-footer-status">
                    <span class="tf-status-dot"></span>
                    Available for new projects
                </div>
            </div>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>

<style>
/* ============================================================
   FOOTER CTA STRIP
============================================================ */
.tf-footer-cta {
    background: linear-gradient(135deg,
        rgba(124,58,237,0.12) 0%,
        rgba(6,182,212,0.08) 100%);
    border-top: 1px solid var(--tf-border-subtle);
    padding-block: 5rem;
}
.tf-footer-cta-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 3rem;
}
.tf-footer-cta-title {
    font-family: var(--tf-font-display);
    font-size: clamp(1.75rem, 3.5vw, 2.5rem);
    font-weight: 800;
    color: var(--tf-white);
    line-height: 1.2;
    margin-bottom: .75rem;
    letter-spacing: -0.025em;
}
.tf-footer-cta-desc {
    color: var(--tf-gray-400);
    font-size: 1rem;
    line-height: 1.7;
    max-width: 440px;
}
.tf-footer-cta-actions {
    display: flex;
    flex-direction: column;
    gap: .75rem;
    flex-shrink: 0;
}
.tf-btn-lg {
    padding: 1.1rem 2.25rem;
    font-size: 1rem;
}

/* ============================================================
   FOOTER DIVIDER
============================================================ */
.tf-footer-divider {
    height: 1px;
    background: linear-gradient(90deg,
        transparent 0%,
        var(--tf-border-subtle) 30%,
        var(--tf-border) 50%,
        var(--tf-border-subtle) 70%,
        transparent 100%
    );
}

/* ============================================================
   FOOTER MAIN
============================================================ */
.tf-footer-main {
    background: var(--tf-bg-2);
    padding-block: 4.5rem 3rem;
}
.tf-footer-grid {
    display: grid;
    grid-template-columns: 1.8fr 1.2fr 1fr 1.2fr;
    gap: 3rem;
}

/* Brand col */
.tf-footer-brand-desc {
    color: var(--tf-gray-500);
    font-size: .9rem;
    line-height: 1.75;
    margin-bottom: 1.75rem;
    max-width: 280px;
}

/* Social */
.tf-footer-social {
    display: flex;
    gap: .75rem;
}
.tf-social-link {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--tf-bg-card);
    border: 1px solid var(--tf-border-subtle);
    border-radius: 10px;
    color: var(--tf-gray-500);
    transition: all .25s var(--tf-ease);
    text-decoration: none;
}
.tf-social-link:hover {
    background: rgba(124,58,237,0.15);
    border-color: var(--tf-border);
    color: var(--tf-primary-light);
    transform: translateY(-2px);
}

/* Footer columns */
.tf-footer-col-title {
    font-size: .8rem;
    font-weight: 700;
    color: var(--tf-white);
    text-transform: uppercase;
    letter-spacing: .1em;
    margin-bottom: 1.25rem;
}
.tf-footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: .65rem;
}
.tf-footer-links a {
    color: var(--tf-gray-500);
    font-size: .875rem;
    text-decoration: none;
    transition: color .2s;
    display: inline-flex;
    align-items: center;
    gap: .4rem;
}
.tf-footer-links a:hover { color: var(--tf-white); }
.tf-footer-links a:hover::before {
    content: '→';
    font-size: .75rem;
    color: var(--tf-primary-light);
}

/* Contact list */
.tf-footer-contact-list {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem;
    display: flex;
    flex-direction: column;
    gap: .75rem;
}
.tf-footer-contact-list li {
    display: flex;
    align-items: center;
    gap: .6rem;
    font-size: .875rem;
    color: var(--tf-gray-500);
}
.tf-footer-contact-list a {
    color: var(--tf-gray-400);
    text-decoration: none;
    transition: color .2s;
}
.tf-footer-contact-list a:hover { color: var(--tf-primary-light); }
.tf-footer-contact-icon { font-size: .95rem; flex-shrink: 0; }

/* Quick contact CTA */
.tf-footer-contact-cta {
    display: block;
    background: rgba(124,58,237,.1);
    border: 1px solid rgba(124,58,237,.25);
    border-radius: 10px;
    padding: .85rem 1rem;
    color: var(--tf-primary-light);
    font-size: .85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all .25s;
    text-align: center;
}
.tf-footer-contact-cta:hover {
    background: rgba(124,58,237,.2);
    border-color: var(--tf-primary);
    transform: translateY(-2px);
    color: var(--tf-primary-light);
}

/* ============================================================
   FOOTER BOTTOM
============================================================ */
.tf-footer-bottom {
    background: var(--tf-bg);
    border-top: 1px solid var(--tf-border-subtle);
    padding-block: 1.25rem;
}
.tf-footer-bottom-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    flex-wrap: wrap;
}
.tf-footer-copy {
    font-size: .85rem;
    color: var(--tf-gray-500);
}
.tf-footer-bottom-links {
    display: flex;
    gap: 1.5rem;
}
.tf-footer-bottom-links a {
    font-size: .8rem;
    color: var(--tf-gray-500);
    text-decoration: none;
    transition: color .2s;
}
.tf-footer-bottom-links a:hover { color: var(--tf-white); }
.tf-footer-status {
    display: flex;
    align-items: center;
    gap: .5rem;
    font-size: .8rem;
    color: var(--tf-gray-500);
}
.tf-status-dot {
    width: 7px;
    height: 7px;
    background: var(--tf-green);
    border-radius: 50%;
    animation: pulse 2s infinite;
}

/* ============================================================
   RESPONSIVE
============================================================ */
@media (max-width: 1200px) {
    .tf-footer-grid { grid-template-columns: 1fr 1fr; gap: 2.5rem; }
}
@media (max-width: 768px) {
    .tf-footer-cta-inner   { flex-direction: column; text-align: center; }
    .tf-footer-cta-actions { width: 100%; align-items: center; }
    .tf-footer-grid        { grid-template-columns: 1fr 1fr; gap: 2rem; }
    .tf-footer-bottom-inner{ justify-content: center; text-align: center; }
    .tf-footer-bottom-links{ justify-content: center; }
    .tf-footer-status      { justify-content: center; }
}
@media (max-width: 480px) {
    .tf-footer-grid { grid-template-columns: 1fr; }
}
</style>

<script>
(function(){
    'use strict';

    /* Back to top on logo click */
    const footerLogo = document.querySelector('.tf-footer-brand .tf-logo');
    if(footerLogo){
        footerLogo.addEventListener('click', function(e){
            if(window.location.pathname === '/'){
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    }
})();
</script>