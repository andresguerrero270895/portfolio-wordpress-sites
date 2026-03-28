<?php
/**
 * FreshBite Theme — functions.php
 * Astra Child Theme + WooCommerce + Dokan
 */

defined('ABSPATH') || exit;

/* ============================================================
   1. ASTRA CHILD — ENQUEUE PARENT + CHILD STYLES
   ============================================================ */
add_action('wp_enqueue_scripts', 'freshbite_enqueue_styles');
function freshbite_enqueue_styles() {

    // Parent Astra style
    wp_enqueue_style(
        'astra-style',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme('astra')->get('Version')
    );

    // Child theme style
    wp_enqueue_style(
        'freshbite-style',
        get_stylesheet_directory_uri() . '/style.css',
        ['astra-style'],
        '1.0.0'
    );

    // Google Fonts
    wp_enqueue_style(
        'freshbite-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap',
        [],
        null
    );

    // Main JS
    wp_enqueue_script(
        'freshbite-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        '1.0.0',
        true
    );

    // AJAX para contact form
    wp_localize_script('freshbite-main', 'freshbite_ajax', [
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('freshbite_nonce'),
    ]);
}

/* ============================================================
   2. THEME SETUP
   ============================================================ */
add_action('after_setup_theme', 'freshbite_setup');
function freshbite_setup() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Image sizes
    add_image_size('freshbite-product',  480, 480, true);
    add_image_size('freshbite-vendor',   300, 300, true);
    add_image_size('freshbite-banner',  1280, 480, true);
    add_image_size('freshbite-thumb',    80,   80, true);

    // Nav menus
    register_nav_menus([
        'primary'  => __('Primary Menu',  'freshbite-theme'),
        'footer'   => __('Footer Menu',   'freshbite-theme'),
        'mobile'   => __('Mobile Menu',   'freshbite-theme'),
    ]);
}

/* ============================================================
   3. CUSTOM POST TYPES
   ============================================================ */
add_action('init', 'freshbite_register_cpts');
function freshbite_register_cpts() {

    // fb_vendor — Vendor profiles (complementa Dokan)
    register_post_type('fb_vendor', [
        'labels' => [
            'name'          => 'Vendors',
            'singular_name' => 'Vendor',
            'add_new_item'  => 'Add New Vendor',
            'edit_item'     => 'Edit Vendor',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'vendors'],
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-store',
    ]);

    // fb_testimonial
    register_post_type('fb_testimonial', [
        'labels' => [
            'name'          => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new_item'  => 'Add New Testimonial',
        ],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-format-quote',
    ]);
}

/* ============================================================
   4. CUSTOM TAXONOMIES
   ============================================================ */
add_action('init', 'freshbite_register_taxonomies');
function freshbite_register_taxonomies() {

    // Vendor category
    register_taxonomy('vendor_type', ['fb_vendor'], [
        'labels' => [
            'name'          => 'Vendor Types',
            'singular_name' => 'Vendor Type',
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'vendor-type'],
        'show_in_rest' => true,
    ]);
}

/* ============================================================
   5. META BOXES — VENDOR
   ============================================================ */
add_action('add_meta_boxes', 'freshbite_vendor_meta_boxes');
function freshbite_vendor_meta_boxes() {
    add_meta_box(
        'fb_vendor_details',
        'Vendor Details',
        'freshbite_vendor_meta_callback',
        'fb_vendor',
        'normal',
        'high'
    );
}

function freshbite_vendor_meta_callback($post) {
    wp_nonce_field('fb_vendor_nonce', 'fb_vendor_nonce_field');
    $fields = [
        'fb_vendor_specialty'    => ['Specialty / Category', 'text',   'e.g. Organic Fruits'],
        'fb_vendor_location'     => ['Location',             'text',   'e.g. California, USA'],
        'fb_vendor_since'        => ['Member Since',         'text',   'e.g. 2020'],
        'fb_vendor_products'     => ['Total Products',       'number', '0'],
        'fb_vendor_rating'       => ['Rating (1-5)',         'number', '5'],
        'fb_vendor_reviews'      => ['Total Reviews',        'number', '0'],
        'fb_vendor_sales'        => ['Total Sales',          'text',   'e.g. 1.2k'],
        'fb_vendor_badge'        => ['Badge',                'text',   'e.g. Top Seller'],
        'fb_vendor_verified'     => ['Verified (yes/no)',    'text',   'yes'],
        'fb_vendor_website'      => ['Website URL',          'url',    ''],
        'fb_vendor_instagram'    => ['Instagram URL',        'url',    ''],
        'fb_vendor_story'        => ['Short Story',          'textarea',''],
        'fb_vendor_emoji'        => ['Store Emoji',          'text',   '🥬'],
    ];
    echo '<table class="form-table">';
    foreach ($fields as $key => [$label, $type, $placeholder]) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr><th><label for="' . $key . '">' . $label . '</label></th><td>';
        if ($type === 'textarea') {
            echo '<textarea id="' . $key . '" name="' . $key . '" rows="3" style="width:100%">' . esc_textarea($value) . '</textarea>';
        } else {
            echo '<input type="' . $type . '" id="' . $key . '" name="' . $key . '" value="' . esc_attr($value) . '" placeholder="' . esc_attr($placeholder) . '" style="width:100%">';
        }
        echo '</td></tr>';
    }
    echo '</table>';
}

add_action('save_post_fb_vendor', 'freshbite_save_vendor_meta');
function freshbite_save_vendor_meta($post_id) {
    if (!isset($_POST['fb_vendor_nonce_field'])) return;
    if (!wp_verify_nonce($_POST['fb_vendor_nonce_field'], 'fb_vendor_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = [
        'fb_vendor_specialty', 'fb_vendor_location', 'fb_vendor_since',
        'fb_vendor_products',  'fb_vendor_rating',   'fb_vendor_reviews',
        'fb_vendor_sales',     'fb_vendor_badge',    'fb_vendor_verified',
        'fb_vendor_website',   'fb_vendor_instagram','fb_vendor_story',
        'fb_vendor_emoji',
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

/* ============================================================
   6. META BOXES — TESTIMONIAL
   ============================================================ */
add_action('add_meta_boxes', 'freshbite_testimonial_meta_boxes');
function freshbite_testimonial_meta_boxes() {
    add_meta_box(
        'fb_testimonial_details',
        'Testimonial Details',
        'freshbite_testimonial_meta_callback',
        'fb_testimonial',
        'normal',
        'high'
    );
}

function freshbite_testimonial_meta_callback($post) {
    wp_nonce_field('fb_testimonial_nonce', 'fb_testimonial_nonce_field');
    $fields = [
        'fb_testimonial_author'   => ['Author Name',     'text',   'Jane Doe'],
        'fb_testimonial_role'     => ['Role / Location', 'text',   'e.g. Home Chef, NYC'],
        'fb_testimonial_rating'   => ['Rating (1-5)',    'number', '5'],
        'fb_testimonial_product'  => ['Product Bought',  'text',   'e.g. Organic Apples'],
        'fb_testimonial_emoji'    => ['Avatar Emoji',    'text',   '😊'],
        'fb_testimonial_verified' => ['Verified (yes/no)','text',  'yes'],
    ];
    echo '<table class="form-table">';
    foreach ($fields as $key => [$label, $type, $placeholder]) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr><th><label for="' . $key . '">' . $label . '</label></th><td>';
        echo '<input type="' . $type . '" id="' . $key . '" name="' . $key . '" value="' . esc_attr($value) . '" placeholder="' . esc_attr($placeholder) . '" style="width:100%">';
        echo '</td></tr>';
    }
    echo '</table>';
}

add_action('save_post_fb_testimonial', 'freshbite_save_testimonial_meta');
function freshbite_save_testimonial_meta($post_id) {
    if (!isset($_POST['fb_testimonial_nonce_field'])) return;
    if (!wp_verify_nonce($_POST['fb_testimonial_nonce_field'], 'fb_testimonial_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = [
        'fb_testimonial_author', 'fb_testimonial_role',
        'fb_testimonial_rating', 'fb_testimonial_product',
        'fb_testimonial_emoji',  'fb_testimonial_verified',
    ];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

/* ============================================================
   7. WOOCOMMERCE — ASTRA OVERRIDE
   ============================================================ */
// Remover breadcrumbs de Astra en WooCommerce
add_action('init', 'freshbite_woo_astra_tweaks');
function freshbite_woo_astra_tweaks() {
    remove_action('astra_woocommerce_before_main_content', 'astra_woo_breadcrumb', 10);
}

// Desactivar sidebar de Astra en shop
add_filter('is_active_sidebar', 'freshbite_disable_astra_sidebar', 10, 2);
function freshbite_disable_astra_sidebar($is_active, $index) {
    if (is_woocommerce()) {
        return false;
    }
    return $is_active;
}

// Cambiar columnas de productos WooCommerce
add_filter('loop_shop_columns', function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });

// Desactivar header/footer de Astra para usar los nuestros
add_filter('astra_header_enabled', '__return_false');
add_filter('astra_footer_enabled', '__return_false');

/* ============================================================
   8. AJAX — CONTACT FORM
   ============================================================ */
add_action('wp_ajax_freshbite_contact',        'freshbite_handle_contact');
add_action('wp_ajax_nopriv_freshbite_contact', 'freshbite_handle_contact');

function freshbite_handle_contact() {
    check_ajax_referer('freshbite_nonce', 'nonce');

    $name    = sanitize_text_field($_POST['name']    ?? '');
    $email   = sanitize_email($_POST['email']         ?? '');
    $subject = sanitize_text_field($_POST['subject']  ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(['message' => 'Please fill in all required fields.']);
    }

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Please enter a valid email address.']);
    }

    $to      = get_option('admin_email');
    $subject = $subject ?: 'New message from ' . $name . ' — FreshBite';
    $body    = "Name: {$name}\nEmail: {$email}\n\n{$message}";
    $headers = ['Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email];

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['message' => 'Message sent! We\'ll get back to you soon. 🥦']);
    } else {
        wp_send_json_error(['message' => 'Something went wrong. Please try again.']);
    }
}

/* ============================================================
   9. AJAX — NEWSLETTER SUBSCRIBE
   ============================================================ */
add_action('wp_ajax_freshbite_newsletter',        'freshbite_handle_newsletter');
add_action('wp_ajax_nopriv_freshbite_newsletter', 'freshbite_handle_newsletter');

function freshbite_handle_newsletter() {
    check_ajax_referer('freshbite_nonce', 'nonce');

    $email = sanitize_email($_POST['email'] ?? '');

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Please enter a valid email.']);
    }

    // Guardar en options (simulado para portafolio)
    $subscribers = get_option('freshbite_subscribers', []);
    if (!in_array($email, $subscribers)) {
        $subscribers[] = $email;
        update_option('freshbite_subscribers', $subscribers);
    }

    wp_send_json_success(['message' => 'You\'re in! Welcome to FreshBite 🎉']);
}

/* ============================================================
   10. HELPER FUNCTIONS
   ============================================================ */

/**
 * Get featured vendors
 */
function freshbite_get_vendors($limit = 4) {
    return new WP_Query([
        'post_type'      => 'fb_vendor',
        'posts_per_page' => $limit,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]);
}

/**
 * Get testimonials
 */
function freshbite_get_testimonials($limit = 3) {
    return new WP_Query([
        'post_type'      => 'fb_testimonial',
        'posts_per_page' => $limit,
        'orderby'        => 'rand',
    ]);
}

/**
 * Get featured WooCommerce products
 */
function freshbite_get_featured_products($limit = 8) {
    return new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'tax_query'      => [[
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
        ]],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}

/**
 * Get products on sale
 */
function freshbite_get_sale_products($limit = 4) {
    return new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'meta_query'     => [[
            'key'     => '_sale_price',
            'value'   => 0,
            'compare' => '>',
            'type'    => 'NUMERIC',
        ]],
    ]);
}

/**
 * Get newest products
 */
function freshbite_get_new_products($limit = 8) {
    return new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}

/**
 * Render star rating
 */
function freshbite_stars($rating = 5) {
    $rating  = floatval($rating);
    $full    = floor($rating);
    $half    = ($rating - $full) >= 0.5;
    $empty   = 5 - $full - ($half ? 1 : 0);
    $output  = '<span class="fb-stars">';
    $output .= str_repeat('★', $full);
    $output .= $half ? '½' : '';
    $output .= str_repeat('☆', $empty);
    $output .= '</span>';
    return $output;
}

/**
 * Vendor meta shortcut
 */
function freshbite_vendor_meta($post_id, $key) {
    return esc_html(get_post_meta($post_id, $key, true));
}

/**
 * Product price formatted
 */
function freshbite_price($product) {
    if (!$product) return '';
    return $product->get_price_html();
}

/**
 * Truncate text
 */
function freshbite_truncate($text, $limit = 120) {
    $text = strip_tags($text);
    if (mb_strlen($text) <= $limit) return $text;
    return mb_substr($text, 0, $limit) . '...';
}

/**
 * Get product badge
 */
function freshbite_product_badge($product) {
    if (!$product) return '';
    if ($product->is_on_sale()) {
        return '<span class="fb-product-badge fb-badge-sale">Sale</span>';
    }
    if ($product->is_featured()) {
        return '<span class="fb-product-badge fb-badge-organic">Featured</span>';
    }
    $days_old = (time() - strtotime($product->get_date_created())) / DAY_IN_SECONDS;
    if ($days_old < 30) {
        return '<span class="fb-product-badge fb-badge-new">New</span>';
    }
    return '';
}

/**
 * WooCommerce product categories
 */
function freshbite_get_product_categories() {
    return get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'exclude'    => [get_option('default_product_cat')],
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);
}

/**
 * Category emojis map
 */
function freshbite_category_emoji($slug) {
    $map = [
        'fruits'       => '🍎',
        'vegetables'   => '🥦',
        'dairy'        => '🥛',
        'meat'         => '🥩',
        'seafood'      => '🐟',
        'bakery'       => '🍞',
        'beverages'    => '🧃',
        'snacks'       => '🍿',
        'organic'      => '🌿',
        'frozen'       => '❄️',
        'pantry'       => '🫙',
        'herbs'        => '🌱',
        'default'      => '🛒',
    ];
    foreach ($map as $key => $emoji) {
        if (str_contains(strtolower($slug), $key)) {
            return $emoji;
        }
    }
    return $map['default'];
}

/**
 * Category background colors
 */
function freshbite_category_color($index) {
    $colors = [
        'rgba(249,115,22,0.1)',
        'rgba(34,197,94,0.1)',
        'rgba(234,179,8,0.1)',
        'rgba(239,68,68,0.1)',
        'rgba(59,130,246,0.1)',
        'rgba(168,85,247,0.1)',
        'rgba(20,184,166,0.1)',
        'rgba(249,115,22,0.15)',
    ];
    return $colors[$index % count($colors)];
}

/* ============================================================
   11. BODY CLASSES
   ============================================================ */
add_filter('body_class', 'freshbite_body_classes');
function freshbite_body_classes($classes) {
    if (is_woocommerce())        $classes[] = 'fb-woo-page';
    if (is_shop())               $classes[] = 'fb-shop-page';
    if (is_product())            $classes[] = 'fb-product-page';
    if (is_cart())               $classes[] = 'fb-cart-page';
    if (is_checkout())           $classes[] = 'fb-checkout-page';
    if (is_singular('fb_vendor')) $classes[] = 'fb-vendor-page';
    return $classes;
}

/* ============================================================
   12. DISABLE ASTRA ELEMENTS
   ============================================================ */
// Quitar admin bar en frontend para visitantes
add_action('after_setup_theme', function() {
    if (!current_user_can('administrator')) {
        add_filter('show_admin_bar', '__return_false');
    }
});

// Limpiar wp_head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/* ============================================================
   13. WIDGETS
   ============================================================ */
add_action('widgets_init', 'freshbite_widgets_init');
function freshbite_widgets_init() {
    register_sidebar([
        'name'          => 'Shop Sidebar',
        'id'            => 'freshbite-shop-sidebar',
        'before_widget' => '<div class="fb-filter-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="fb-filter-title">',
        'after_title'   => '</h4>',
    ]);

    register_sidebar([
        'name'          => 'Blog Sidebar',
        'id'            => 'freshbite-blog-sidebar',
        'before_widget' => '<div class="fb-widget-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="fb-widget-title">',
        'after_title'   => '</h4>',
    ]);
}

/* ============================================================
   14. FLUSH REWRITE RULES (solo primera vez)
   ============================================================ */
add_action('after_switch_theme', function() {
    freshbite_register_cpts();
    flush_rewrite_rules();
});