<?php
/**
 * FreshBite Theme — footer.php
 */
defined('ABSPATH') || exit;
?>

<!-- ============================================================
     NEWSLETTER SECTION
     ============================================================ -->
<section class="fb-newsletter">
    <div class="fb-container" style="position:relative;z-index:1;">

        <span class="fb-label" style="color:rgba(255,255,255,0.8);margin-bottom:16px;display:block;">
            Stay Fresh
        </span>

        <h2 style="color:var(--fb-white);margin-bottom:12px;">
            Get Weekly Fresh Deals
        </h2>

        <p style="color:rgba(255,255,255,0.85);font-size:1.05rem;margin-bottom:36px;">
            Join 50,000+ food lovers. Get exclusive offers, new vendor alerts<br>
            and seasonal recipes delivered to your inbox.
        </p>

        <form id="fb-newsletter-form" class="fb-newsletter-form">
            <input
                type="email"
                name="email"
                placeholder="Enter your email address..."
                required
                autocomplete="email"
            >
            <button type="submit">
                Subscribe 🎉
            </button>
        </form>

        <p id="fb-newsletter-msg" style="margin-top:16px;font-size:0.9rem;min-height:24px;"></p>

        <p style="margin-top:16px;font-size:0.8rem;color:rgba(255,255,255,0.5);">
            No spam, ever. Unsubscribe anytime. 🔒
        </p>

    </div>
</section>

<!-- ============================================================
     FOOTER
     ============================================================ -->
<footer class="fb-footer">
    <div class="fb-container">
        <div class="fb-footer-grid">

            <!-- COL 1 — BRAND -->
            <div class="fb-footer-brand">

                <a href="<?php echo esc_url(home_url('/')); ?>" class="fb-logo fb-footer-logo">
                    <div class="fb-logo-icon">🥬</div>
                    <span class="fb-logo-text">Fresh<span>Bite</span></span>
                </a>

                <p>
                    The freshest marketplace connecting local farmers,
                    artisan producers and food lovers since 2020.
                    Fresh food, fair prices, real people.
                </p>

                <!-- Social links -->
                <div class="fb-footer-socials">
                    <a href="#" class="fb-social-btn" aria-label="Instagram" title="Instagram">
                        📸
                    </a>
                    <a href="#" class="fb-social-btn" aria-label="Facebook" title="Facebook">
                        👥
                    </a>
                    <a href="#" class="fb-social-btn" aria-label="Twitter" title="Twitter">
                        🐦
                    </a>
                    <a href="#" class="fb-social-btn" aria-label="YouTube" title="YouTube">
                        ▶️
                    </a>
                    <a href="#" class="fb-social-btn" aria-label="Pinterest" title="Pinterest">
                        📌
                    </a>
                </div>

            </div><!-- /col 1 -->

            <!-- COL 2 — SHOP -->
            <div>
                <h4 class="fb-footer-title">Shop</h4>
                <ul class="fb-footer-links">
                    <li>
                        <a href="<?php echo esc_url(home_url('/shop')); ?>">
                            All Products
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/shop/?orderby=popularity')); ?>">
                            Best Sellers
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/shop/?orderby=date')); ?>">
                            New Arrivals
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/shop/?on_sale=1')); ?>">
                            On Sale 🔥
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/shop/?product_cat=organic')); ?>">
                            Organic
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/shop/?product_cat=local')); ?>">
                            Local Farm
                        </a>
                    </li>
                    <?php if (class_exists('WooCommerce')) : ?>
                        <li>
                            <a href="<?php echo esc_url(wc_get_cart_url()); ?>">
                                My Cart 🛒
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div><!-- /col 2 -->

            <!-- COL 3 — VENDORS -->
            <div>
                <h4 class="fb-footer-title">Vendors</h4>
                <ul class="fb-footer-links">
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendors')); ?>">
                            All Vendors
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendors/?type=farm')); ?>">
                            Local Farms
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendors/?type=artisan')); ?>">
                            Artisan Makers
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendors/?type=organic')); ?>">
                            Organic Certified
                        </a>
                    </li>
                    <?php if (class_exists('WeDevs_Dokan')) : ?>
                        <li>
                            <a href="<?php echo esc_url(dokan_get_page_url('myaccount')); ?>">
                                Become a Vendor
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(dokan_get_navigation_url()); ?>">
                                Vendor Dashboard
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo esc_url(home_url('/vendor-guidelines')); ?>">
                            Vendor Guidelines
                        </a>
                    </li>
                </ul>
            </div><!-- /col 3 -->

            <!-- COL 4 — COMPANY -->
            <div>
                <h4 class="fb-footer-title">Company</h4>
                <ul class="fb-footer-links">
                    <li>
                        <a href="<?php echo esc_url(home_url('/about')); ?>">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>">
                            Blog & Recipes
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/careers')); ?>">
                            Careers
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/press')); ?>">
                            Press & Media
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/sustainability')); ?>">
                            Sustainability 🌱
                        </a>
                    </li>
                </ul>
            </div><!-- /col 4 -->

            <!-- COL 5 — APP + TRUST -->
            <div>
                <h4 class="fb-footer-title">Get The App</h4>

                <a href="#" class="fb-app-btn">
                    <span class="fb-app-btn-icon">🍎</span>
                    <span>
                        <span class="fb-app-btn-sub">Download on the</span>
                        <span class="fb-app-btn-name">App Store</span>
                    </span>
                </a>

                <a href="#" class="fb-app-btn">
                    <span class="fb-app-btn-icon">▶️</span>
                    <span>
                        <span class="fb-app-btn-sub">Get it on</span>
                        <span class="fb-app-btn-name">Google Play</span>
                    </span>
                </a>

                <!-- Trust badges -->
                <div class="fb-trust-badges">
                    <h4 class="fb-footer-title" style="margin-top:24px;">
                        We Accept
                    </h4>
                    <div class="fb-payment-badges">
                        <span class="fb-payment-badge">💳 Visa</span>
                        <span class="fb-payment-badge">💳 MC</span>
                        <span class="fb-payment-badge">🅿️ PayPal</span>
                        <span class="fb-payment-badge">🍎 Pay</span>
                    </div>
                </div>

                <!-- Certifications -->
                <div class="fb-certifications" style="margin-top:20px;">
                    <span class="fb-cert-badge">🌿 USDA Organic</span>
                    <span class="fb-cert-badge">✅ SSL Secure</span>
                </div>

            </div><!-- /col 5 -->

        </div><!-- /.fb-footer-grid -->

        <!-- FOOTER BOTTOM -->
        <div class="fb-footer-bottom">
            <p>
                © <?php echo date('Y'); ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   style="color:rgba(255,255,255,0.5);">
                    FreshBite Marketplace
                </a>.
                All rights reserved. Made with 🧡 for fresh food lovers.
            </p>

            <div class="fb-footer-bottom-links">
                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">
                    Privacy Policy
                </a>
                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">
                    Terms of Service
                </a>
                <a href="<?php echo esc_url(home_url('/cookie-policy')); ?>">
                    Cookies
                </a>
                <a href="<?php echo esc_url(home_url('/sitemap')); ?>">
                    Sitemap
                </a>
            </div>
        </div><!-- /.fb-footer-bottom -->

    </div><!-- /.fb-container -->
</footer><!-- /.fb-footer -->

</div><!-- /#fb-page -->

<?php wp_footer(); ?>
</body>
</html>
