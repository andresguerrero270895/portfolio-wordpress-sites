<?php
/**
 * 404 Error Page
 * TechFlow Agency
 */
get_header(); ?>

<section class="tf-404-section">
    <div class="tf-404-section__bg">
        <div class="tf-orb tf-orb--violet" style="top:10%;left:60%;width:600px;height:600px;opacity:0.15;"></div>
        <div class="tf-orb tf-orb--cyan"   style="bottom:10%;left:-5%;width:400px;height:400px;opacity:0.1;"></div>
        <div class="tf-grid-lines"></div>
    </div>

    <div class="tf-container">
        <div class="tf-404-inner">

            <!-- Terminal Visual -->
            <div class="tf-404-terminal">
                <div class="tf-404-terminal__header">
                    <span class="tf-terminal-dot tf-terminal-dot--red"></span>
                    <span class="tf-terminal-dot tf-terminal-dot--yellow"></span>
                    <span class="tf-terminal-dot tf-terminal-dot--green"></span>
                    <span class="tf-terminal-title">bash — error</span>
                </div>
                <div class="tf-404-terminal__body">
                    <div class="tf-terminal-line">
                        <span class="tf-terminal-prompt">$</span>
                        <span class="tf-terminal-cmd"> find / -name "page"</span>
                    </div>
                    <div class="tf-terminal-line tf-terminal-line--error">
                        <span>Error: Page not found (404)</span>
                    </div>
                    <div class="tf-terminal-line">
                        <span class="tf-terminal-prompt">$</span>
                        <span class="tf-terminal-cmd"> ls <?php echo esc_html( $_SERVER['REQUEST_URI'] ?? '/unknown' ); ?></span>
                    </div>
                    <div class="tf-terminal-line tf-terminal-line--error">
                        <span>No such file or directory</span>
                    </div>
                    <div class="tf-terminal-line">
                        <span class="tf-terminal-prompt">$</span>
                        <span class="tf-terminal-cmd tf-terminal-cursor"> _</span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="tf-404-content">
                <div class="tf-404-code">404</div>
                <h1 class="tf-404-title">
                    Page Not
                    <span class="tf-gradient-text">Found</span>
                </h1>
                <p class="tf-404-desc">
                    Looks like this page took an unplanned sprint to production 
                    and got lost along the way. Let's get you back on track.
                </p>

                <!-- Quick Links -->
                <div class="tf-404-links">
                    <a href="<?php echo home_url('/'); ?>" class="tf-btn tf-btn--primary tf-btn--lg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                        Go Home
                    </a>
                    <a href="<?php echo home_url('/contact'); ?>" class="tf-btn tf-btn--ghost tf-btn--lg">
                        Contact Us
                    </a>
                </div>

                <!-- Suggested Pages -->
                <div class="tf-404-suggestions">
                    <span class="tf-404-suggestions__label">Or try one of these:</span>
                    <div class="tf-404-suggestions__links">
                        <a href="<?php echo home_url('/services'); ?>" class="tf-404-pill">Services</a>
                        <a href="<?php echo home_url('/work'); ?>"     class="tf-404-pill">Our Work</a>
                        <a href="<?php echo home_url('/about'); ?>"    class="tf-404-pill">About Us</a>
                        <a href="<?php echo home_url('/blog'); ?>"     class="tf-404-pill">Blog</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>