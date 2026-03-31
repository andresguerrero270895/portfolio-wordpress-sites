<?php
/**
 * FreshBite Theme — functions.php
 * Astra Child Theme + WooCommerce + Dokan
 * Idioma: Español
 */

defined('ABSPATH') || exit;

/* ============================================================
   1. ASTRA CHILD — ENQUEUE PARENT + CHILD STYLES
   ============================================================ */
add_action('wp_enqueue_scripts', 'freshbite_enqueue_styles');
function freshbite_enqueue_styles() {

    wp_enqueue_style(
        'astra-style',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme('astra')->get('Version')
    );

    wp_enqueue_style(
        'freshbite-style',
        get_stylesheet_directory_uri() . '/style.css',
        ['astra-style'],
        '1.0.0'
    );

    wp_enqueue_style(
        'freshbite-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap',
        [],
        null
    );

    // ── Cart CSS — cargado globalmente para evitar problemas de caché ──
    wp_enqueue_style(
        'freshbite-cart',
        get_stylesheet_directory_uri() . '/assets/css/cart.css',
        ['freshbite-style'],
        '1.0.1'
    );

    wp_enqueue_script(
        'freshbite-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        '1.0.0',
        true
    );

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
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ]);

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    add_image_size('freshbite-product', 480, 480, true);
    add_image_size('freshbite-vendor',  300, 300, true);
    add_image_size('freshbite-banner', 1280, 480, true);
    add_image_size('freshbite-thumb',   80,  80,  true);

    register_nav_menus([
        'primary' => __('Menú Principal',  'freshbite-theme'),
        'footer'  => __('Menú Pie',        'freshbite-theme'),
        'mobile'  => __('Menú Móvil',      'freshbite-theme'),
    ]);
}

/* ============================================================
   3. CUSTOM POST TYPES
   ============================================================ */
add_action('init', 'freshbite_register_cpts');
function freshbite_register_cpts() {

    // fb_vendor — Perfiles de agricultores/vendedores
    register_post_type('fb_vendor', [
        'labels' => [
            'name'          => 'Vendedores',
            'singular_name' => 'Vendedor',
            'add_new_item'  => 'Agregar Vendedor',
            'edit_item'     => 'Editar Vendedor',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'productores'],
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-store',
    ]);

    // fb_testimonial — Testimonios de clientes
    register_post_type('fb_testimonial', [
        'labels' => [
            'name'          => 'Testimonios',
            'singular_name' => 'Testimonio',
            'add_new_item'  => 'Agregar Testimonio',
        ],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-format-quote',
    ]);

    // fb_reservation — Reservas de pickup/delivery
    register_post_type('fb_reservation', [
        'labels' => [
            'name'          => 'Reservas',
            'singular_name' => 'Reserva',
            'add_new_item'  => 'Nueva Reserva',
            'edit_item'     => 'Editar Reserva',
        ],
        'public'       => false,
        'show_ui'      => true,
        'supports'     => ['title'],
        'show_in_rest' => false,
        'menu_icon'    => 'dashicons-calendar-alt',
        'capabilities' => [
            'create_posts' => 'do_not_allow',
        ],
        'map_meta_cap' => true,
    ]);
}

/* ============================================================
   4. CUSTOM TAXONOMIES
   ============================================================ */
add_action('init', 'freshbite_register_taxonomies');
function freshbite_register_taxonomies() {

    // Tipo de vendedor
    register_taxonomy('vendor_type', ['fb_vendor'], [
        'labels' => [
            'name'          => 'Tipos de Vendedor',
            'singular_name' => 'Tipo de Vendedor',
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'tipo-vendedor'],
        'show_in_rest' => true,
    ]);

    // Estado/Región del vendedor
    register_taxonomy('vendor_region', ['fb_vendor'], [
        'labels' => [
            'name'          => 'Regiones',
            'singular_name' => 'Región',
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'region'],
        'show_in_rest' => true,
    ]);
}

/* ============================================================
   5. META BOXES — VENDEDOR
   ============================================================ */
add_action('add_meta_boxes', 'freshbite_vendor_meta_boxes');
function freshbite_vendor_meta_boxes() {
    add_meta_box(
        'fb_vendor_details',
        'Detalles del Vendedor',
        'freshbite_vendor_meta_callback',
        'fb_vendor',
        'normal',
        'high'
    );
}

function freshbite_vendor_meta_callback($post) {
    wp_nonce_field('fb_vendor_nonce', 'fb_vendor_nonce_field');
    $fields = [
        'fb_vendor_specialty'  => ['Especialidad',          'text',     'ej. Frutas Orgánicas'],
        'fb_vendor_location'   => ['Ubicación',             'text',     'ej. California, USA'],
        'fb_vendor_since'      => ['Miembro desde',         'text',     'ej. 2020'],
        'fb_vendor_products'   => ['Total Productos',       'number',   '0'],
        'fb_vendor_rating'     => ['Calificación (1-5)',    'number',   '5'],
        'fb_vendor_reviews'    => ['Total Reseñas',         'number',   '0'],
        'fb_vendor_sales'      => ['Total Ventas',          'text',     'ej. 1.2k'],
        'fb_vendor_badge'      => ['Insignia',              'text',     'ej. Top Vendedor'],
        'fb_vendor_verified'   => ['Verificado (si/no)',    'text',     'si'],
        'fb_vendor_website'    => ['Sitio Web',             'url',      ''],
        'fb_vendor_instagram'  => ['Instagram URL',        'url',      ''],
        'fb_vendor_story'      => ['Historia corta',        'textarea', ''],
        'fb_vendor_emoji'      => ['Emoji de la tienda',    'text',     '🥬'],
        'fb_vendor_pickup'     => ['Ofrece Pickup (si/no)', 'text',     'si'],
        'fb_vendor_delivery'   => ['Ofrece Delivery (si/no)','text',    'si'],
        'fb_vendor_schedule'   => ['Horario',               'text',     'ej. Lun-Vie 8am-5pm'],
        'fb_vendor_min_order'  => ['Pedido Mínimo ($)',     'number',   '0'],
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
        'fb_vendor_specialty', 'fb_vendor_location',  'fb_vendor_since',
        'fb_vendor_products',  'fb_vendor_rating',    'fb_vendor_reviews',
        'fb_vendor_sales',     'fb_vendor_badge',     'fb_vendor_verified',
        'fb_vendor_website',   'fb_vendor_instagram', 'fb_vendor_story',
        'fb_vendor_emoji',     'fb_vendor_pickup',    'fb_vendor_delivery',
        'fb_vendor_schedule',  'fb_vendor_min_order',
    ];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

/* ============================================================
   6. META BOXES — TESTIMONIO
   ============================================================ */
add_action('add_meta_boxes', 'freshbite_testimonial_meta_boxes');
function freshbite_testimonial_meta_boxes() {
    add_meta_box(
        'fb_testimonial_details',
        'Detalles del Testimonio',
        'freshbite_testimonial_meta_callback',
        'fb_testimonial',
        'normal',
        'high'
    );
}

function freshbite_testimonial_meta_callback($post) {
    wp_nonce_field('fb_testimonial_nonce', 'fb_testimonial_nonce_field');
    $fields = [
        'fb_testimonial_author'   => ['Nombre del autor',       'text',   'Ana García'],
        'fb_testimonial_role'     => ['Rol / Ciudad',           'text',   'ej. Chef en casa, Miami'],
        'fb_testimonial_rating'   => ['Calificación (1-5)',     'number', '5'],
        'fb_testimonial_product'  => ['Producto comprado',      'text',   'ej. Manzanas Orgánicas'],
        'fb_testimonial_emoji'    => ['Emoji avatar',           'text',   '😊'],
        'fb_testimonial_verified' => ['Verificado (si/no)',     'text',   'si'],
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
   7. META BOXES — RESERVA
   ============================================================ */
add_action('add_meta_boxes', 'freshbite_reservation_meta_boxes');
function freshbite_reservation_meta_boxes() {
    add_meta_box(
        'fb_reservation_details',
        'Detalles de la Reserva',
        'freshbite_reservation_meta_callback',
        'fb_reservation',
        'normal',
        'high'
    );
}

function freshbite_reservation_meta_callback($post) {
    $fields = [
        'fb_res_name'       => 'Nombre del cliente',
        'fb_res_email'      => 'Email',
        'fb_res_phone'      => 'Teléfono',
        'fb_res_vendor'     => 'Vendedor',
        'fb_res_type'       => 'Tipo (pickup/delivery)',
        'fb_res_date'       => 'Fecha',
        'fb_res_time'       => 'Hora',
        'fb_res_items'      => 'Productos',
        'fb_res_total'      => 'Total ($)',
        'fb_res_status'     => 'Estado',
        'fb_res_notes'      => 'Notas',
    ];
    echo '<table class="form-table">';
    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<tr><th>' . $label . '</th><td>';
        echo '<input type="text" name="' . $key . '" value="' . esc_attr($value) . '" style="width:100%" readonly>';
        echo '</td></tr>';
    }
    echo '</table>';
}

/* ============================================================
   8. WOOCOMMERCE + ASTRA TWEAKS
   ============================================================ */
add_action('init', 'freshbite_woo_astra_tweaks');
function freshbite_woo_astra_tweaks() {
    remove_action('astra_woocommerce_before_main_content', 'astra_woo_breadcrumb', 10);
}

add_filter('is_active_sidebar', 'freshbite_disable_astra_sidebar', 10, 2);
function freshbite_disable_astra_sidebar($is_active, $index) {
    if (is_woocommerce()) return false;
    return $is_active;
}

add_filter('loop_shop_columns',  function() { return 3; });
add_filter('loop_shop_per_page', function() { return 12; });
add_filter('astra_header_enabled', '__return_false');
add_filter('astra_footer_enabled', '__return_false');

/* ============================================================
   9. AJAX — FORMULARIO DE CONTACTO
   ============================================================ */
add_action('wp_ajax_freshbite_contact',        'freshbite_handle_contact');
add_action('wp_ajax_nopriv_freshbite_contact', 'freshbite_handle_contact');

function freshbite_handle_contact() {
    check_ajax_referer('freshbite_nonce', 'nonce');

    $name    = sanitize_text_field($_POST['name']        ?? '');
    $email   = sanitize_email($_POST['email']             ?? '');
    $subject = sanitize_text_field($_POST['subject']      ?? '');
    $message = sanitize_textarea_field($_POST['message']  ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(['message' => 'Por favor completa todos los campos requeridos.']);
    }

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Por favor ingresa un correo electrónico válido.']);
    }

    $to      = get_option('admin_email');
    $subject = $subject ?: 'Nuevo mensaje de ' . $name . ' — FreshBite';
    $body    = "Nombre: {$name}\nEmail: {$email}\n\n{$message}";
    $headers = ['Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email];
    $sent    = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['message' => '¡Mensaje enviado! Te responderemos pronto. 🥦']);
    } else {
        wp_send_json_error(['message' => 'Algo salió mal. Por favor intenta de nuevo.']);
    }
}

/* ============================================================
   10. AJAX — NEWSLETTER
   ============================================================ */
add_action('wp_ajax_freshbite_newsletter',        'freshbite_handle_newsletter');
add_action('wp_ajax_nopriv_freshbite_newsletter', 'freshbite_handle_newsletter');

function freshbite_handle_newsletter() {
    check_ajax_referer('freshbite_nonce', 'nonce');

    $email = sanitize_email($_POST['email'] ?? '');

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Por favor ingresa un correo válido.']);
    }

    $subscribers = get_option('freshbite_subscribers', []);
    if (!in_array($email, $subscribers)) {
        $subscribers[] = $email;
        update_option('freshbite_subscribers', $subscribers);
    }

    wp_send_json_success(['message' => '¡Ya eres parte de FreshBite! Bienvenido 🎉']);
}

/* ============================================================
   11. AJAX — RESERVAS
   ============================================================ */
add_action('wp_ajax_freshbite_reservation',        'freshbite_handle_reservation');
add_action('wp_ajax_nopriv_freshbite_reservation', 'freshbite_handle_reservation');

function freshbite_handle_reservation() {
    check_ajax_referer('freshbite_nonce', 'nonce');

    $name   = sanitize_text_field($_POST['name']   ?? '');
    $email  = sanitize_email($_POST['email']        ?? '');
    $phone  = sanitize_text_field($_POST['phone']   ?? '');
    $vendor = sanitize_text_field($_POST['vendor']  ?? '');
    $type   = sanitize_text_field($_POST['type']    ?? 'pickup');
    $date   = sanitize_text_field($_POST['date']    ?? '');
    $time   = sanitize_text_field($_POST['time']    ?? '');
    $items  = sanitize_textarea_field($_POST['items'] ?? '');
    $notes  = sanitize_textarea_field($_POST['notes'] ?? '');

    if (empty($name) || empty($email) || empty($date) || empty($time)) {
        wp_send_json_error(['message' => 'Por favor completa los campos requeridos.']);
    }

    // Crear post de reserva
    $post_id = wp_insert_post([
        'post_type'   => 'fb_reservation',
        'post_title'  => 'Reserva — ' . $name . ' — ' . $date,
        'post_status' => 'publish',
    ]);

    if ($post_id) {
        $res_fields = [
            'fb_res_name'   => $name,
            'fb_res_email'  => $email,
            'fb_res_phone'  => $phone,
            'fb_res_vendor' => $vendor,
            'fb_res_type'   => $type,
            'fb_res_date'   => $date,
            'fb_res_time'   => $time,
            'fb_res_items'  => $items,
            'fb_res_notes'  => $notes,
            'fb_res_status' => 'pendiente',
            'fb_res_total'  => '0',
        ];
        foreach ($res_fields as $key => $val) {
            update_post_meta($post_id, $key, $val);
        }

        // Email de confirmación
        $subject = '¡Reserva confirmada! — FreshBite';
        $body    = "Hola {$name},\n\nTu reserva ha sido confirmada:\n\n"
                 . "Tipo: " . ($type === 'pickup' ? 'Pickup' : 'Delivery') . "\n"
                 . "Vendedor: {$vendor}\n"
                 . "Fecha: {$date}\n"
                 . "Hora: {$time}\n\n"
                 . "¡Gracias por elegir FreshBite! 🥬";

        wp_mail($email, $subject, $body);

        wp_send_json_success([
            'message'        => '¡Reserva confirmada! Revisa tu correo. 🎉',
            'reservation_id' => $post_id,
        ]);
    } else {
        wp_send_json_error(['message' => 'No se pudo crear la reserva. Intenta de nuevo.']);
    }
}

/* ============================================================
   12. HELPERS
   ============================================================ */

function freshbite_get_vendors($limit = 4) {
    return new WP_Query([
        'post_type'      => 'fb_vendor',
        'posts_per_page' => $limit,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]);
}

function freshbite_get_testimonials($limit = 3) {
    return new WP_Query([
        'post_type'      => 'fb_testimonial',
        'posts_per_page' => $limit,
        'orderby'        => 'rand',
    ]);
}

function freshbite_get_featured_products($limit = 8) {
    return new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'tax_query'      => [[
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
        ]],
        'orderby' => 'date',
        'order'   => 'DESC',
    ]);
}

function freshbite_get_new_products($limit = 8) {
    return new WP_Query([
        'post_type'      => 'product',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
}

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

function freshbite_vendor_meta($post_id, $key) {
    return esc_html(get_post_meta($post_id, $key, true));
}

function freshbite_truncate($text, $limit = 120) {
    $text = strip_tags($text);
    if (mb_strlen($text) <= $limit) return $text;
    return mb_substr($text, 0, $limit) . '...';
}

function freshbite_product_badge($product) {
    if (!$product) return '';
    if ($product->is_on_sale()) {
        return '<span class="fb-product-badge fb-badge-sale">Oferta</span>';
    }
    if ($product->is_featured()) {
        return '<span class="fb-product-badge fb-badge-organic">Destacado</span>';
    }
    $days = (time() - strtotime($product->get_date_created())) / DAY_IN_SECONDS;
    if ($days < 30) {
        return '<span class="fb-product-badge fb-badge-new">Nuevo</span>';
    }
    return '';
}

function freshbite_get_product_categories() {
    return get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'exclude'    => [get_option('default_product_cat')],
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);
}

function freshbite_category_emoji($slug) {
    $map = [
        'frutas'      => '🍎',
        'fruits'      => '🍎',
        'verduras'    => '🥦',
        'vegetables'  => '🥦',
        'lacteos'     => '🥛',
        'dairy'       => '🥛',
        'carnes'      => '🥩',
        'meat'        => '🥩',
        'mariscos'    => '🐟',
        'seafood'     => '🐟',
        'panaderia'   => '🍞',
        'bakery'      => '🍞',
        'bebidas'     => '🧃',
        'beverages'   => '🧃',
        'snacks'      => '🍿',
        'organico'    => '🌿',
        'organic'     => '🌿',
        'congelados'  => '❄️',
        'frozen'      => '❄️',
        'despensa'    => '🫙',
        'pantry'      => '🫙',
        'hierbas'     => '🌱',
        'herbs'       => '🌱',
        'default'     => '🛒',
    ];
    foreach ($map as $key => $emoji) {
        if (str_contains(strtolower($slug), $key)) return $emoji;
    }
    return $map['default'];
}

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
   13. BODY CLASSES
   ============================================================ */
add_filter('body_class', 'freshbite_body_classes');
function freshbite_body_classes($classes) {
    if (is_woocommerce())         $classes[] = 'fb-woo-page';
    if (is_shop())                $classes[] = 'fb-shop-page';
    if (is_product())             $classes[] = 'fb-product-page';
    if (is_cart())                $classes[] = 'fb-cart-page';
    if (is_checkout())            $classes[] = 'fb-checkout-page';
    if (is_singular('fb_vendor')) $classes[] = 'fb-vendor-page';
    return $classes;
}

/* ============================================================
   14. LIMPIAR WP_HEAD
   ============================================================ */
add_action('after_setup_theme', function() {
    if (!current_user_can('administrator')) {
        add_filter('show_admin_bar', '__return_false');
    }
});

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/* ============================================================
   15. WIDGETS
   ============================================================ */
add_action('widgets_init', 'freshbite_widgets_init');
function freshbite_widgets_init() {
    register_sidebar([
        'name'          => 'Barra lateral — Tienda',
        'id'            => 'freshbite-shop-sidebar',
        'before_widget' => '<div class="fb-filter-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="fb-filter-title">',
        'after_title'   => '</h4>',
    ]);
    register_sidebar([
        'name'          => 'Barra lateral — Blog',
        'id'            => 'freshbite-blog-sidebar',
        'before_widget' => '<div class="fb-widget-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="fb-widget-title">',
        'after_title'   => '</h4>',
    ]);
}

/* ============================================================
   16. FLUSH REWRITE RULES
   ============================================================ */
add_action('after_switch_theme', function() {
    freshbite_register_cpts();
    flush_rewrite_rules();
});

add_filter( 'theme_page_templates', function( $templates ) {
  $templates['page-about.php']    = 'Nosotros — FreshBite';
  $templates['page-contact.php']  = 'Contacto — FreshBite';
  $templates['page-vendors.php']  = 'Vendedores — FreshBite';
  $templates['page-shop.php']     = 'Tienda — FreshBite';
  return $templates;
} );

// ══════════════════════════════════════════════════════
// FRESHBITE — WooCommerce Customizations
// Agregar AL FINAL del functions.php existente
// ══════════════════════════════════════════════════════

// ─── 1. Ocultar imagen grande del carrito vacío ───────
add_action('wp_head', function() {
    if ( is_cart() ) {
        echo '<style>
            /* Ocultar imagen/SVG gigante del carrito vacío de WC */
            .woocommerce-cart .wc-empty-cart-message img,
            .woocommerce-cart .cart-empty-page img,
            .e-cart-empty-icon,
            .woocommerce-cart-form ~ .cart-empty + .return-to-shop,
            .wc-empty-cart-message svg,
            .woodmart-cart-img,
            body.woocommerce-cart .woocommerce > .cart-empty-page img,
            body.woocommerce-cart .entry-content > img,
            body.woocommerce-cart .page-content > img {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
            }
        </style>';
    }
});

// ─── 2. Estilizar TODOS los notices de WC globalmente ─
add_action('wp_head', function() {
    echo '<style>
    /* ════ WC NOTICES — FreshBite Global ════ */
    .woocommerce-message,
    .woocommerce-info,
    .woocommerce .woocommerce-message,
    .woocommerce .woocommerce-info {
        background: #D8F3DC !important;
        color: #1E5631 !important;
        border-top-color: #52B788 !important;
        border-radius: 10px !important;
        font-family: "Inter", sans-serif !important;
        font-size: 0.9rem !important;
        padding: 14px 20px !important;
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        box-shadow: none !important;
    }
    .woocommerce-message::before,
    .woocommerce-info::before {
        color: #2D6A4F !important;
    }
    .woocommerce-message a.button,
    .woocommerce-info a.button {
        background: #2D6A4F !important;
        color: #fff !important;
        border-radius: 50px !important;
        padding: 8px 20px !important;
        font-size: 0.82rem !important;
        font-weight: 600 !important;
        border: none !important;
        box-shadow: none !important;
        margin-left: auto !important;
        text-decoration: none !important;
        transition: background 0.2s !important;
    }
    .woocommerce-message a.button:hover {
        background: #52B788 !important;
    }
    /* Error */
    .woocommerce-error {
        background: #FFF5F5 !important;
        border-top-color: #FC8181 !important;
        border-radius: 10px !important;
    }
    .woocommerce-error li {
        color: #742A2A !important;
    }
    /* "View cart" button */
    .woocommerce-message a.wc-forward {
        background: #2D6A4F !important;
        color: #fff !important;
        border-radius: 50px !important;
        padding: 8px 20px !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        border: none !important;
        float: none !important;
        margin-left: auto !important;
        white-space: nowrap;
    }
    .woocommerce-message a.wc-forward:hover {
        background: #52B788 !important;
    }
    </style>';
});

// ─── 3. Traducir textos del carrito vacío ─────────────
add_filter('woocommerce_empty_cart_message', function($message) {
    return '<span class="fb-wc-empty">🛒 Tu carrito está vacío</span>';
});

// ─── 4. Redirigir "Return to shop" a la tienda ────────
add_filter('woocommerce_return_to_shop_redirect', function() {
    return wc_get_page_permalink('shop');
});

// ─── 5. Cambiar texto del botón "Return to shop" ──────
add_filter('woocommerce_return_to_shop_text', function() {
    return '🛍️ Explorar productos';
});

// ─── 6. Estilo inline para el empty cart de WC ────────
// (cuando WC renderiza su propio template y no el nuestro)
add_action('woocommerce_cart_is_empty', function() {
    ?>
    <style>
    /* Override completo del empty cart de WC */
    .woocommerce-cart .cart-empty,
    p.cart-empty {
        display: none !important;
    }
    .woocommerce-cart .return-to-shop {
        text-align: center !important;
        padding: 60px 24px !important;
        background: #FFFFFF !important;
        border-radius: 16px !important;
        border: 1px solid #D1E8D6 !important;
        box-shadow: 0 4px 24px rgba(45,106,79,0.10) !important;
        max-width: 560px !important;
        margin: 0 auto !important;
    }
    .woocommerce-cart .return-to-shop::before {
        content: "🛒";
        display: block;
        font-size: 4rem;
        margin-bottom: 16px;
        animation: wobble 2.5s ease infinite;
    }
    .woocommerce-cart .return-to-shop::after {
        content: "Descubre productos frescos y orgánicos directamente de nuestros productores locales";
        display: block;
        color: #6B7C6E;
        font-size: 0.9rem;
        margin: 8px 0 24px;
        line-height: 1.6;
        font-family: "Inter", sans-serif;
    }
    @keyframes wobble {
        0%,100% { transform: rotate(-8deg); }
        50%      { transform: rotate(8deg); }
    }
    .woocommerce-cart .return-to-shop .button,
    .return-to-shop a.wc-backward {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 14px 32px !important;
        background: #2D6A4F !important;
        color: #fff !important;
        border-radius: 50px !important;
        font-weight: 700 !important;
        font-size: 0.95rem !important;
        text-decoration: none !important;
        border: none !important;
        box-shadow: 0 4px 20px rgba(45,106,79,0.25) !important;
        transition: all 0.3s !important;
        font-family: "Inter", sans-serif !important;
    }
    .return-to-shop a.wc-backward:hover {
        background: #52B788 !important;
        transform: translateY(-2px) !important;
    }
    </style>

    <!-- Nuestro empty cart custom -->
    <div style="
        text-align:center;
        padding:80px 24px;
        background:#fff;
        border-radius:16px;
        border:1px solid #D1E8D6;
        box-shadow:0 4px 24px rgba(45,106,79,0.10);
        max-width:560px;
        margin:0 auto;
        font-family:'Inter',sans-serif;
    ">
        <span style="font-size:5rem;display:block;margin-bottom:20px;animation:wobble 2.5s ease infinite;">🛒</span>
        <h3 style="color:#2D6A4F;font-size:1.6rem;font-weight:700;margin-bottom:10px;">
            Tu carrito está vacío
        </h3>
        <p style="color:#6B7C6E;margin-bottom:32px;font-size:0.95rem;line-height:1.6;">
            Descubre productos frescos y orgánicos<br>
            directamente de nuestros productores locales.
        </p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>"
               style="
                display:inline-flex;align-items:center;gap:10px;
                padding:14px 32px;background:#2D6A4F;color:#fff;
                border-radius:50px;font-weight:700;text-decoration:none;
                font-size:0.95rem;box-shadow:0 4px 20px rgba(45,106,79,0.25);
                transition:all 0.3s;
               ">
                🛍️ Explorar productos
            </a>
            <a href="<?php echo esc_url( home_url('/') ); ?>"
               style="
                display:inline-flex;align-items:center;gap:10px;
                padding:14px 24px;background:transparent;color:#F4845F;
                border:2px solid #F4845F;border-radius:50px;
                font-weight:600;text-decoration:none;font-size:0.9rem;
               ">
                🏠 Ir al inicio
            </a>
        </div>

        <?php
        // Categorías sugeridas
        $cats = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'number'     => 6,
            'orderby'    => 'count',
            'order'      => 'DESC',
            'exclude'    => array( get_option('default_product_cat') ),
        ));
        if ( ! empty($cats) && ! is_wp_error($cats) ) : ?>
        <div style="margin-top:40px;">
            <p style="font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;color:#6B7C6E;margin-bottom:14px;">
                Categorías populares
            </p>
            <div style="display:flex;flex-wrap:wrap;gap:8px;justify-content:center;">
                <?php foreach ($cats as $cat) : ?>
                <a href="<?php echo esc_url(get_term_link($cat)); ?>"
                   style="
                    padding:7px 16px;background:#FEFAE0;
                    border:1.5px solid #D1E8D6;border-radius:50px;
                    font-size:0.82rem;color:#2D6A4F;font-weight:600;
                    text-decoration:none;transition:all 0.2s;
                   ">
                    <?php echo esc_html($cat->name); ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php
});