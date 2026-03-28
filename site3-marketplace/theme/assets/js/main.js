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

        /* ── Reservation form AJAX ───────────────────────── */
    $(document).on('submit', '#fb-reservation-form', function(e) {
        e.preventDefault();
        const $form = $(this);
        const $btn  = $('#fb-res-submit');
        const $msg  = $('#fb-reservation-msg');

        $btn.prop('disabled', true).text('Enviando...');
        $msg.removeClass('success error').text('');

        $.ajax({
            url:  freshbite_ajax.url,
            type: 'POST',
            data: {
                action:  'freshbite_reservation',
                nonce:   freshbite_ajax.nonce,
                name:    $form.find('[name="name"]').val(),
                email:   $form.find('[name="email"]').val(),
                phone:   $form.find('[name="phone"]').val(),
                vendor:  $form.find('[name="vendor"]').val(),
                type:    $form.find('[name="type"]:checked').val(),
                date:    $form.find('[name="date"]').val(),
                time:    $form.find('[name="time"]').val(),
                items:   $form.find('[name="items"]').val(),
                notes:   $form.find('[name="notes"]').val(),
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
                $msg.addClass('error').text('Algo salió mal. Por favor intenta de nuevo.');
            },
            complete() {
                $btn.prop('disabled', false).text('📅 Confirmar Reserva');
            }
        });
    });

        /* ── Shop: sort select ───────────────────────────── */
    document.getElementById('fb-sort-select')?.addEventListener('change', function() {
        const url = new URL(window.location.href);
        url.searchParams.set('orderby', this.value);
        window.location.href = url.toString();
    });

    /* ── Shop: view toggle ───────────────────────────── */
    document.querySelectorAll('.fb-view-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.fb-view-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const grid = document.getElementById('fb-products-grid');
            if (this.dataset.view === 'list') {
                grid?.classList.add('list-view');
            } else {
                grid?.classList.remove('list-view');
            }
        });
    });

    /* ── Shop: price range ───────────────────────────── */
    const priceRange = document.getElementById('fb-price-range');
    const priceVal   = document.getElementById('fb-price-val');

    priceRange?.addEventListener('input', function() {
        priceVal.textContent = '$' + this.value;
    });

    document.getElementById('fb-apply-price')?.addEventListener('click', function(e) {
        e.preventDefault();
        const url = new URL(window.location.href);
        url.searchParams.set('max_price', priceRange.value);
        window.location.href = url.toString();
    });

    /* ── Shop: category checkboxes ───────────────────── */
    document.querySelectorAll('.fb-cat-filter').forEach(cb => {
        cb.addEventListener('change', function() {
            const url = new URL(window.location.href);
            if (this.checked) {
                url.searchParams.set('product_cat', this.dataset.slug);
            } else {
                url.searchParams.delete('product_cat');
            }
            window.location.href = url.toString();
        });
    });

        /* ── Vendor search filter ────────────────────────── */
    const vendorSearch = document.getElementById('fb-vendor-search');
    const vendorCards  = document.querySelectorAll('.fb-vendor-card-full');
    const noVendors    = document.getElementById('fb-no-vendors');

    vendorSearch?.addEventListener('input', function() {
        const term    = this.value.toLowerCase().trim();
        let   visible = 0;

        vendorCards.forEach(card => {
            const name = card.dataset.name?.toLowerCase() || '';
            const text = card.textContent.toLowerCase();
            const match = !term || name.includes(term) || text.includes(term);
            card.style.display = match ? '' : 'none';
            if (match) visible++;
        });

        if (noVendors) {
            noVendors.style.display = visible === 0 ? 'block' : 'none';
        }
    });

        /* ── Contact form — show order field conditionally ── */
    const contactType  = document.getElementById('contact-type');
    const orderGroup   = document.getElementById('order-number-group');

    contactType?.addEventListener('change', function() {
        const show = this.value === 'Consulta sobre pedido'
                  || this.value === 'Problema con producto';
        if (orderGroup) {
            orderGroup.style.display = show ? 'block' : 'none';
        }
    });

    /* ── Contact form submit button text ─────────────── */
    $(document).on('submit', '#fb-contact-form', function() {
        $('#fb-contact-submit').text('Enviando...');
    });

    /* ── FAQ accordion ───────────────────────────────── */
    document.querySelectorAll('.fb-faq-question').forEach(btn => {
        btn.addEventListener('click', function() {
            const item    = this.closest('.fb-faq-item');
            const isOpen  = item.classList.contains('open');

            // Close all
            document.querySelectorAll('.fb-faq-item').forEach(i => {
                i.classList.remove('open');
            });

            // Open clicked if was closed
            if (!isOpen) {
                item.classList.add('open');
            }
        });
    });

    /* ── File upload drag & drop visual ──────────────── */
    const fileUpload = document.getElementById('fb-file-upload');

    fileUpload?.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.style.borderColor = 'var(--fb-primary)';
        this.style.background  = 'rgba(249,115,22,0.04)';
    });

    fileUpload?.addEventListener('dragleave', function() {
        this.style.borderColor = '';
        this.style.background  = '';
    });

    fileUpload?.addEventListener('drop', function(e) {
        e.preventDefault();
        this.style.borderColor = '';
        this.style.background  = '';
        const file = e.dataTransfer.files[0];
        if (file) {
            const p = this.querySelector('p');
            if (p) p.textContent = '✅ ' + file.name;
        }
    });

        /* ── Vendor profile tabs ─────────────────────────── */
    document.querySelectorAll('.fb-vendor-tab').forEach(tab => {
        tab.addEventListener('click', function() {

            // Remove active from all tabs
            document.querySelectorAll('.fb-vendor-tab').forEach(t => {
                t.classList.remove('active');
            });

            // Hide all tab content
            document.querySelectorAll('.fb-tab-content').forEach(c => {
                c.classList.remove('active');
            });

            // Activate clicked tab
            this.classList.add('active');

            // Show corresponding content
            const tabId = 'tab-' + this.dataset.tab;
            const content = document.getElementById(tabId);
            if (content) content.classList.add('active');
        });
    });

    /* ── Smooth scroll to reservation ───────────────── */
    document.querySelectorAll('a[href="#fb-reservation-section"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.getElementById('fb-reservation-section');
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    /* ── Smooth scroll to products ───────────────────── */
    document.querySelectorAll('a[href="#fb-vendor-products"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.getElementById('fb-vendor-products');
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    /* ============================================================
   SINGLE PRODUCT PAGE — FreshBite main.js
   ============================================================ */

  /* ----------------------------------------------------------
     PRODUCT IMAGE GALLERY
     ---------------------------------------------------------- */
  function initProductGallery() {
    const mainImage   = document.querySelector('.fb-product-main-image img');
    const thumbItems  = document.querySelectorAll('.fb-product-thumb-item');

    if (!mainImage || !thumbItems.length) return;

    thumbItems.forEach(thumb => {
      thumb.addEventListener('click', function () {
        const newSrc    = this.dataset.fullSrc  || this.querySelector('img')?.src;
        const newSrcset = this.dataset.srcset   || '';
        const newAlt    = this.dataset.alt      || this.querySelector('img')?.alt || '';

        /* Fade swap */
        mainImage.style.opacity = '0';
        mainImage.style.transition = 'opacity 0.25s ease';

        setTimeout(() => {
          mainImage.src = newSrc;
          if (newSrcset) mainImage.srcset = newSrcset;
          mainImage.alt = newAlt;
          mainImage.style.opacity = '1';
        }, 250);

        /* Active state */
        thumbItems.forEach(t => t.classList.remove('active'));
        this.classList.add('active');
      });

      /* Keyboard support */
      thumb.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          this.click();
        }
      });
    });

    /* Zoom on hover (desktop only) */
    if (window.matchMedia('(hover: hover)').matches) {
      const wrapper = document.querySelector('.fb-product-main-image');
      if (wrapper) {
        wrapper.addEventListener('mousemove', function (e) {
          const rect   = this.getBoundingClientRect();
          const xPct   = ((e.clientX - rect.left) / rect.width  * 100).toFixed(2);
          const yPct   = ((e.clientY - rect.top)  / rect.height * 100).toFixed(2);
          mainImage.style.transformOrigin = `${xPct}% ${yPct}%`;
        });

        wrapper.addEventListener('mouseenter', () => {
          mainImage.style.transform  = 'scale(1.35)';
          mainImage.style.transition = 'transform 0.3s ease';
        });

        wrapper.addEventListener('mouseleave', () => {
          mainImage.style.transform = 'scale(1)';
          mainImage.style.transformOrigin = 'center center';
        });
      }
    }
  }

  /* ----------------------------------------------------------
     QUANTITY CONTROLS (completando lo que faltó)
     ---------------------------------------------------------- */
  function initQuantityControls() {
    const qtyWrappers = document.querySelectorAll('.fb-qty-wrapper');

    qtyWrappers.forEach(wrapper => {
      const input   = wrapper.querySelector('.fb-qty-input');
      const btnMinus = wrapper.querySelector('.fb-qty-btn[data-action="minus"]');
      const btnPlus  = wrapper.querySelector('.fb-qty-btn[data-action="plus"]');

      if (!input) return;

      const min = parseInt(input.min) || 1;
      const max = parseInt(input.max) || 99;
      const step = parseInt(input.step) || 1;

      function updateButtons(val) {
        if (btnMinus) btnMinus.disabled = val <= min;
        if (btnPlus)  btnPlus.disabled  = val >= max;
      }

      function clamp(val) {
        return Math.min(Math.max(val, min), max);
      }

      if (btnMinus) {
        btnMinus.addEventListener('click', () => {
          const current = parseInt(input.value) || min;
          input.value   = clamp(current - step);
          input.dispatchEvent(new Event('change'));
          updateButtons(parseInt(input.value));
        });
      }

      if (btnPlus) {
        btnPlus.addEventListener('click', () => {
          const current = parseInt(input.value) || min;
          input.value   = clamp(current + step);
          input.dispatchEvent(new Event('change'));
          updateButtons(parseInt(input.value));
        });
      }

      input.addEventListener('input', function () {
        let val = parseInt(this.value);
        if (isNaN(val)) val = min;
        this.value = clamp(val);
        updateButtons(parseInt(this.value));
      });

      /* Sync price display when qty changes */
      input.addEventListener('change', function () {
        const qty       = parseInt(this.value) || 1;
        const basePrice = parseFloat(
          document.querySelector('.fb-product-price')?.dataset.price || 0
        );
        const totalEl   = document.querySelector('.fb-price-total');

        if (totalEl && basePrice > 0) {
          totalEl.textContent = '$' + (basePrice * qty).toFixed(2);
        }
      });

      updateButtons(parseInt(input.value) || min);
    });
  }

  /* ----------------------------------------------------------
     ADD TO CART — AJAX (single product)
     ---------------------------------------------------------- */
  function initSingleAddToCart() {
    const form = document.querySelector('.fb-single-product-form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const btn       = this.querySelector('.fb-btn-add-to-cart');
      const productId = this.dataset.productId || this.querySelector('[name="product_id"]')?.value;
      const qtyInput  = this.querySelector('.fb-qty-input');
      const qty       = qtyInput ? parseInt(qtyInput.value) || 1 : 1;
      const nonce     = fbData?.nonce || '';

      if (!productId || !btn) return;

      /* Loading state */
      const originalHTML = btn.innerHTML;
      btn.disabled       = true;
      btn.innerHTML      = `
        <span class="fb-btn-spinner"></span>
        <span>Adding...</span>`;
      btn.classList.add('fb-btn--loading');

      fetch(fbData.ajaxUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action:     'fb_add_to_cart',
          product_id: productId,
          quantity:   qty,
          nonce:      nonce
        })
      })
        .then(r => r.json())
        .then(data => {
          if (data.success) {
            /* Success state */
            btn.innerHTML = `
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2.5">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              <span>Added!</span>`;
            btn.classList.remove('fb-btn--loading');
            btn.classList.add('fb-btn--success');

            /* Update cart count badge */
            updateCartCount(data.data?.cart_count ?? null);

            /* Mini-cart flyout */
            if (data.data?.cart_html) {
              updateMiniCart(data.data.cart_html);
              openMiniCart();
            }

            /* Reset button after 2.5s */
            setTimeout(() => {
              btn.innerHTML = originalHTML;
              btn.classList.remove('fb-btn--success');
              btn.disabled  = false;
            }, 2500);

          } else {
            showProductError(btn, data.data?.message || 'Could not add item. Try again.');
            resetBtn(btn, originalHTML);
          }
        })
        .catch(() => {
          showProductError(btn, 'Network error. Please try again.');
          resetBtn(btn, originalHTML);
        });
    });

    function resetBtn(btn, html) {
      btn.innerHTML = html;
      btn.classList.remove('fb-btn--loading', 'fb-btn--success');
      btn.disabled  = false;
    }

    function showProductError(btn, msg) {
      let errEl = document.querySelector('.fb-product-error');
      if (!errEl) {
        errEl = document.createElement('p');
        errEl.className = 'fb-product-error';
        btn.closest('.fb-single-product-actions')?.insertAdjacentElement('afterend', errEl);
      }
      errEl.textContent = msg;
      errEl.style.display = 'block';
      setTimeout(() => { errEl.style.display = 'none'; }, 4000);
    }
  }

  /* ----------------------------------------------------------
     PRODUCT TABS (Description / Nutrition / Reviews)
     ---------------------------------------------------------- */
  function initProductTabs() {
    const tabNav   = document.querySelector('.fb-product-tabs-nav');
    const tabPanes = document.querySelectorAll('.fb-product-tab-pane');

    if (!tabNav || !tabPanes.length) return;

    tabNav.querySelectorAll('.fb-tab-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const target = this.dataset.tab;

        /* Nav active */
        tabNav.querySelectorAll('.fb-tab-btn').forEach(b => {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        this.classList.add('active');
        this.setAttribute('aria-selected', 'true');

        /* Pane active */
        tabPanes.forEach(pane => {
          const isTarget = pane.dataset.tab === target;
          pane.classList.toggle('active', isTarget);
          pane.setAttribute('aria-hidden', String(!isTarget));

          if (isTarget) {
            pane.style.animation = 'fbFadeIn 0.3s ease forwards';
          }
        });
      });
    });

    /* Activate first tab on load */
    const firstBtn = tabNav.querySelector('.fb-tab-btn');
    if (firstBtn) firstBtn.click();
  }

  /* ----------------------------------------------------------
     STAR RATING (review form)
     ---------------------------------------------------------- */
  function initStarRating() {
    const ratingWrappers = document.querySelectorAll('.fb-star-rating-input');

    ratingWrappers.forEach(wrapper => {
      const stars  = wrapper.querySelectorAll('.fb-star-input-btn');
      const hidden = wrapper.querySelector('input[type="hidden"]');

      stars.forEach((star, idx) => {
        star.addEventListener('mouseenter', () => highlightStars(stars, idx));
        star.addEventListener('mouseleave', () => {
          const current = parseInt(hidden?.value || 0);
          highlightStars(stars, current - 1);
        });
        star.addEventListener('click', () => {
          if (hidden) hidden.value = idx + 1;
          highlightStars(stars, idx);
          stars.forEach(s => s.classList.remove('selected'));
          for (let i = 0; i <= idx; i++) stars[i].classList.add('selected');
        });
      });
    });

    function highlightStars(stars, upToIdx) {
      stars.forEach((s, i) => {
        s.classList.toggle('hovered', i <= upToIdx);
      });
    }
  }

  /* ----------------------------------------------------------
     REVIEW FORM — AJAX SUBMIT
     ---------------------------------------------------------- */
  function initReviewForm() {
    const reviewForm = document.querySelector('.fb-review-form');
    if (!reviewForm) return;

    reviewForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const btn       = this.querySelector('.fb-review-submit-btn');
      const productId = this.dataset.productId;
      const rating    = this.querySelector('[name="rating"]')?.value;
      const comment   = this.querySelector('[name="comment"]')?.value?.trim();
      const name      = this.querySelector('[name="author_name"]')?.value?.trim();
      const email     = this.querySelector('[name="author_email"]')?.value?.trim();

      if (!rating || rating === '0') {
        showFormMsg(reviewForm, 'Please select a star rating.', 'error');
        return;
      }
      if (!comment) {
        showFormMsg(reviewForm, 'Please write a review.', 'error');
        return;
      }

      const originalText = btn.textContent;
      btn.disabled    = true;
      btn.textContent = 'Submitting…';

      fetch(fbData.ajaxUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action:      'fb_submit_review',
          product_id:  productId,
          rating,
          comment,
          author_name:  name,
          author_email: email,
          nonce:        fbData.nonce
        })
      })
        .then(r => r.json())
        .then(data => {
          if (data.success) {
            reviewForm.reset();
            showFormMsg(reviewForm,
              '✅ Thank you! Your review is pending approval.',
              'success');
          } else {
            showFormMsg(reviewForm,
              data.data?.message || 'Submission failed. Try again.',
              'error');
          }
        })
        .catch(() => showFormMsg(reviewForm, 'Network error.', 'error'))
        .finally(() => {
          btn.disabled    = false;
          btn.textContent = originalText;
        });
    });

    function showFormMsg(form, msg, type) {
      let msgEl = form.querySelector('.fb-form-msg');
      if (!msgEl) {
        msgEl = document.createElement('p');
        msgEl.className = 'fb-form-msg';
        form.insertAdjacentElement('afterend', msgEl);
      }
      msgEl.textContent = msg;
      msgEl.className   = `fb-form-msg fb-form-msg--${type}`;
      msgEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      setTimeout(() => { msgEl.style.opacity = '0'; }, 5000);
    }
  }

  /* ----------------------------------------------------------
     WISHLIST TOGGLE (single product)
     ---------------------------------------------------------- */
  function initWishlistBtn() {
    const wishlistBtn = document.querySelector('.fb-wishlist-btn');
    if (!wishlistBtn) return;

    wishlistBtn.addEventListener('click', function () {
      const productId = this.dataset.productId;
      const isActive  = this.classList.contains('active');

      this.classList.toggle('active');
      this.setAttribute('aria-pressed', String(!isActive));
      this.title = isActive ? 'Add to Wishlist' : 'Remove from Wishlist';

      fetch(fbData.ajaxUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action:     'fb_toggle_wishlist',
          product_id: productId,
          action_type: isActive ? 'remove' : 'add',
          nonce:      fbData.nonce
        })
      })
        .then(r => r.json())
        .then(data => {
          if (!data.success) {
            /* Revert toggle on failure */
            this.classList.toggle('active');
            this.setAttribute('aria-pressed', String(isActive));
          }
          /* Update wishlist count in nav */
          const countEl = document.querySelector('.fb-wishlist-count');
          if (countEl && data.data?.count !== undefined) {
            countEl.textContent = data.data.count;
            countEl.style.display = data.data.count > 0 ? 'flex' : 'none';
          }
        })
        .catch(() => {
          this.classList.toggle('active');
        });
    });
  }

  /* ----------------------------------------------------------
     STICKY ADD-TO-CART BAR (aparece al hacer scroll)
     ---------------------------------------------------------- */
  function initStickyProductBar() {
    const stickyBar   = document.querySelector('.fb-sticky-product-bar');
    const productTop  = document.querySelector('.fb-single-product-top');

    if (!stickyBar || !productTop) return;

    const observer = new IntersectionObserver(
      ([entry]) => {
        stickyBar.classList.toggle('visible', !entry.isIntersecting);
      },
      { threshold: 0, rootMargin: '-80px 0px 0px 0px' }
    );

    observer.observe(productTop);

    /* Clone add-to-cart into sticky bar */
    const originalBtn = productTop.querySelector('.fb-btn-add-to-cart');
    const stickySlot  = stickyBar.querySelector('.fb-sticky-btn-slot');

    if (originalBtn && stickySlot) {
      const cloneBtn = originalBtn.cloneNode(true);
      cloneBtn.classList.add('fb-sticky-atc-btn');
      stickySlot.appendChild(cloneBtn);

      cloneBtn.addEventListener('click', () => {
        /* Trigger original form submit */
        document.querySelector('.fb-single-product-form')?.requestSubmit();
      });
    }
  }

  /* ----------------------------------------------------------
     INIT ALL SINGLE-PRODUCT FUNCTIONS
     ---------------------------------------------------------- */
  function initSingleProduct() {
    if (!document.body.classList.contains('single-product')) return;

    initProductGallery();
    initQuantityControls();
    initSingleAddToCart();
    initProductTabs();
    initStarRating();
    initReviewForm();
    initWishlistBtn();
    initStickyProductBar();
  }

  /* ============================================================
     SHARED HELPERS (usados por múltiples secciones)
     ============================================================ */

  /* Cart count badge */
  function updateCartCount(count) {
    if (count === null || count === undefined) return;
    document.querySelectorAll('.fb-cart-count').forEach(el => {
      el.textContent = count;
      el.style.display = count > 0 ? 'flex' : 'none';
    });
  }

  /* Mini-cart HTML update */
  function updateMiniCart(html) {
    const miniCart = document.querySelector('.fb-mini-cart-body');
    if (miniCart) miniCart.innerHTML = html;
  }

  /* Open mini-cart panel */
  function openMiniCart() {
    const panel = document.querySelector('.fb-mini-cart');
    const overlay = document.querySelector('.fb-cart-overlay');
    if (panel) {
      panel.classList.add('open');
      panel.setAttribute('aria-hidden', 'false');
    }
    if (overlay) overlay.classList.add('visible');
    document.body.classList.add('fb-cart-open');
  }

  /* ============================================================
     GLOBAL INIT — DOMContentLoaded
     ============================================================ */
  document.addEventListener('DOMContentLoaded', () => {
    initSingleProduct();

    /* Mini-cart close buttons */
    document.querySelectorAll('.fb-mini-cart-close, .fb-cart-overlay').forEach(el => {
      el.addEventListener('click', () => {
        document.querySelector('.fb-mini-cart')?.classList.remove('open');
        document.querySelector('.fb-cart-overlay')?.classList.remove('visible');
        document.body.classList.remove('fb-cart-open');
      });
    });
  });

/* ============================================================
   END main.js
   ============================================================ */

})(jQuery);