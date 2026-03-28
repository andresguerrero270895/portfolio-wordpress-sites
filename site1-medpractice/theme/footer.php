<?php if (!defined('ABSPATH')) { exit; } ?>
</main>

<footer class="mp-footer" id="site-footer" role="contentinfo">
    <div class="mp-container">
        <div class="mp-footer__grid">
            <div class="mp-footer__col">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mp-logo" style="margin-bottom:8px;">
                    <div class="mp-logo__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7V17L12 22L22 17V7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M12 8V16M8 12H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                    </div>
                    <span class="mp-logo__text"><strong>Med</strong>Practice</span>
                </a>
                <p class="mp-footer__brand-desc">The nation's leading marketplace for medical practice sales. We connect physicians with verified practice opportunities across 30+ states.</p>
                <div style="display:flex;gap:12px;margin-top:20px;">
                    <a href="#" aria-label="LinkedIn" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;transition:background 0.3s;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="#" aria-label="Twitter" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;transition:background 0.3s;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" aria-label="Facebook" style="width:36px;height:36px;border-radius:50%;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;transition:background 0.3s;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                </div>
            </div>
            <div class="mp-footer__col">
                <h4 class="mp-footer__title">Quick Links</h4>
                <ul class="mp-footer__links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#services')); ?>">Our Services</a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('state_landing')); ?>">Browse States</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#process')); ?>">Our Process</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#testimonials')); ?>">Testimonials</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a></li>
                </ul>
            </div>
            <div class="mp-footer__col">
                <h4 class="mp-footer__title">Popular States</h4>
                <ul class="mp-footer__links">
                    <?php
                    $popular = array('california','texas','florida','new-york','pennsylvania','illinois','ohio','georgia');
                    foreach ($popular as $slug) {
                        $post = get_page_by_path($slug,OBJECT,'state_landing');
                        if ($post) echo '<li><a href="'.esc_url(get_permalink($post->ID)).'">'.esc_html($post->post_title).'</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="mp-footer__col">
                <h4 class="mp-footer__title">Contact Us</h4>
                <ul class="mp-footer__links">
                    <li style="display:flex;gap:8px;margin-bottom:12px;">📍 <span>123 Medical Plaza Dr.<br>Miami, FL 33101</span></li>
                    <li style="display:flex;gap:8px;margin-bottom:12px;">📞 <a href="tel:+18005551234">(800) 555-1234</a></li>
                    <li style="display:flex;gap:8px;margin-bottom:12px;">✉️ <a href="mailto:info@medpracticeusa.com">info@medpracticeusa.com</a></li>
                    <li style="display:flex;gap:8px;">🕐 <span>Mon-Fri: 8AM-6PM EST</span></li>
                </ul>
            </div>
        </div>
        <div class="mp-footer__bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <div style="display:flex;gap:20px;">
                <a href="#" style="color:rgba(255,255,255,0.5);font-size:0.8rem;">Privacy Policy</a>
                <a href="#" style="color:rgba(255,255,255,0.5);font-size:0.8rem;">Terms</a>
                <a href="#" style="color:rgba(255,255,255,0.5);font-size:0.8rem;">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

<button id="backToTop" aria-label="Back to top" style="position:fixed;bottom:30px;right:30px;width:48px;height:48px;border-radius:50%;background:var(--mp-primary);color:white;border:none;cursor:pointer;display:none;align-items:center;justify-content:center;z-index:100;box-shadow:var(--mp-shadow-lg);transition:all 0.3s;">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 15l-6-6-6 6"/></svg>
</button>
<script>
(function(){var b=document.getElementById('backToTop');if(!b)return;window.addEventListener('scroll',function(){if(window.scrollY>500){b.style.display='flex';b.style.opacity='1'}else{b.style.opacity='0';setTimeout(function(){if(window.scrollY<=500)b.style.display='none'},300)}});b.addEventListener('click',function(){window.scrollTo({top:0,behavior:'smooth'})})})();
</script>
<?php wp_footer(); ?>
</body>
</html>
