/**
 * FreshBite — main.js
 */
(function($) {
    'use strict';

    /* ── Mobile menu ─────────────────────────────────── */
    const hamburger = document.getElementById('fb-hamburger');
    const mobileMenu = document.getElementById('fb-mobile-menu');
    const overlay = document.getElementById('fb-mobile-overlay');

    function toggleMenu(open) {
        hamburger?.classList.toggle('open', open);
        mobileMenu?.classList.toggle('open', open);
        overlay?.classList.toggle('open', open);
        hamburger?.setAttribute('aria-expanded', open);
        mobileMenu?.setAttribute('aria-hidden', !open);
        document.body.style.overflow = open ? 'hidden' : '';
    }

    hamburger?.addEventListener('click', () => {
        const isOpen = mobileMenu?.classList.contains('open');
        toggleMenu(!isOpen);
    });

    overlay?.addEventListener('click', () => toggleMenu(false));

    /* ── Sticky header shadow ────────────────────────── */
    const header = document.getElementById('fb-header');
    window.addEventListener('scroll', () => {
        header?.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });

    /* ── Contact form AJAX ───────────────────────────── */
    $(document).on('submit', '#fb-contact-form', function(e) {
        e.preventDefault();
        const $form   = $(this);
        const $btn    = $form.find('.fb-form-submit');
        const $msg    = $form.find('.fb-form-message');

        $btn.prop('disabled', true).text('Sending...');
        $msg.removeClass('success error').text('');

        $.ajax({
            url:  freshbite_ajax.url,
            type: 'POST',
            data: {
                action:  'freshbite_contact',
                nonce:   freshbite_ajax.nonce,
                name:    $form.find('[name="name"]').val(),
                email:   $form.find('[name="email"]').val(),
                subject: $form.find('[name="subject"]').val(),
                message: $form.find('[name="message"]').val(),
            },
            success(res) {
                if (res.success) {
                    $msg.addClass('success').text(res.data.message);
                    $form[0].reset();
                } else {
                    $msg.addClass('error').text(res.data.message);
                }
            },
            error() {
                $msg.addClass('error').text('Something went wrong. Please try again.');
            },
            complete() {
                $btn.prop('disabled', false).text('Send Message');
            }
        });
    });

    /* ── Newsletter form AJAX ────────────────────────── */
    $(document).on('submit', '#fb-newsletter-form', function(e) {
        e.preventDefault();
        const $form = $(this);
        const $btn  = $form.find('button[type="submit"]');
        const $msg  = $('#fb-newsletter-msg');

        $btn.prop('disabled', true).text('Subscribing...');

        $.ajax({
            url:  freshbite_ajax.url,
            type: 'POST',
            data: {
                action: 'freshbite_newsletter',
                nonce:  freshbite_ajax.nonce,
                email:  $form.find('[name="email"]').val(),
            },
            success(res) {
                if (res.success) {
                    $msg.css('color','#fff').text(res.data.message);
                    $form[0].reset();
                } else {
                    $msg.css('color','#fca5a5').text(res.data.message);
                }
            },
            complete() {
                $btn.prop('disabled', false).text('Subscribe');
            }
        });
    });

    /* ── Product quantity buttons ────────────────────── */
    $(document).on('click', '.fb-qty-btn', function() {
        const $input = $(this).siblings('.fb-qty-input');
        let val = parseInt($input.val()) || 1;
        if ($(this).data('action') === 'plus')  val++;
        if ($(this).data('action') === 'minus') val = Math.max(1, val - 1);
        $input.val(val).trigger('change');
    });

    /* ── Animate on scroll ───────────────────────────── */
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fb-animate-up');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fb-observe').forEach(el => observer.observe(el));
    }

})(jQuery);