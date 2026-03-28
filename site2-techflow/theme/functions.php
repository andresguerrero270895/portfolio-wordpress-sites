<?php
/**
 * TechFlow Agency — functions.php
 * Premium WordPress Theme Functions
 */

// ============================================================
// THEME SETUP
// ============================================================
function techflow_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form','comment-form','comment-list',
        'gallery','caption','style','script'
    ]);
    add_theme_support( 'custom-logo' );
    add_theme_support( 'menus' );

    register_nav_menus([
        'primary'  => __( 'Primary Navigation', 'techflow-theme' ),
        'footer'   => __( 'Footer Navigation',  'techflow-theme' ),
        'services' => __( 'Services Menu',      'techflow-theme' ),
    ]);

    // Image sizes
    add_image_size( 'tf-project-thumb',  800, 540,  true );
    add_image_size( 'tf-project-hero',   1400, 700, true );
    add_image_size( 'tf-team-avatar',    400,  400,  true );
    add_image_size( 'tf-blog-thumb',     700,  420,  true );
}
add_action( 'after_setup_theme', 'techflow_setup' );

// ============================================================
// GOOGLE FONTS + ASSETS
// ============================================================
function techflow_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'tf-fonts',
        'https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'techflow-style',
        get_stylesheet_directory_uri() . '/style.css',
        ['tf-fonts'],
        filemtime( get_stylesheet_directory() . '/style.css' )
    );

    // CSS modules
    $css_files = [
        'tf-animations' => '/assets/css/animations.css',
        'tf-components' => '/assets/css/components.css',
    ];
    foreach ( $css_files as $handle => $path ) {
        $full = get_stylesheet_directory() . $path;
        if ( file_exists( $full ) ) {
            wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $path, ['techflow-style'], filemtime($full) );
        }
    }

    // JS files
    $js_files = [
        'tf-main'       => '/assets/js/main.js',
        'tf-cursor'     => '/assets/js/cursor.js',
        'tf-loader'     => '/assets/js/loader.js',
        'tf-animations' => '/assets/js/animations.js',
        'tf-typewriter' => '/assets/js/typewriter.js',
    ];
    foreach ( $js_files as $handle => $path ) {
        $full = get_stylesheet_directory() . $path;
        if ( file_exists( $full ) ) {
            wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $path, [], filemtime($full), true );
        }
    }

    // Localize AJAX
    wp_localize_script( 'tf-main', 'tfAjax', [
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'tf_nonce' ),
    ]);
}
add_action( 'wp_enqueue_scripts', 'techflow_enqueue_assets' );

// ============================================================
// CPT: PROJECTS (tf_project)
// ============================================================
function techflow_register_cpt_projects() {
    register_post_type( 'tf_project', [
        'labels' => [
            'name'               => 'Projects',
            'singular_name'      => 'Project',
            'add_new'            => 'Add New Project',
            'add_new_item'       => 'Add New Project',
            'edit_item'          => 'Edit Project',
            'view_item'          => 'View Project',
            'search_items'       => 'Search Projects',
            'not_found'          => 'No projects found',
        ],
        'public'       => true,
        'show_in_rest' => true,
        'has_archive'  => true,
        'rewrite' => [ 'slug' => 'projects' ],
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'taxonomies'   => [ 'tf_category', 'tf_tech' ],
    ]);
}
add_action( 'init', 'techflow_register_cpt_projects' );

// ============================================================
// CPT: SERVICES (tf_service)
// ============================================================
function techflow_register_cpt_services() {
    register_post_type( 'tf_service', [
        'labels' => [
            'name'          => 'Services',
            'singular_name' => 'Service',
            'add_new_item'  => 'Add New Service',
            'edit_item'     => 'Edit Service',
        ],
        'public'       => true,
        'show_in_rest' => true,
        'has_archive'  => false,
        'rewrite' => ['slug' => 'projects'],
        'menu_icon'    => 'dashicons-admin-tools',
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
    ]);
}
add_action( 'init', 'techflow_register_cpt_services' );

// ============================================================
// CPT: TESTIMONIALS (tf_testimonial)
// ============================================================
function techflow_register_cpt_testimonials() {
    register_post_type( 'tf_testimonial', [
        'labels' => [
            'name'          => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new_item'  => 'Add New Testimonial',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
    ]);
}
add_action( 'init', 'techflow_register_cpt_testimonials' );

// ============================================================
// CPT: TEAM (tf_team)
// ============================================================
function techflow_register_cpt_team() {
    register_post_type( 'tf_team', [
        'labels' => [
            'name'          => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new_item'  => 'Add New Team Member',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
    ]);
}
add_action( 'init', 'techflow_register_cpt_team' );

// ============================================================
// TAXONOMIES
// ============================================================
function techflow_register_taxonomies() {
    // Project Category
    register_taxonomy( 'tf_category', 'tf_project', [
        'labels'       => [
            'name'          => 'Project Categories',
            'singular_name' => 'Category',
            'add_new_item'  => 'Add New Category',
        ],
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'project-category' ],
    ]);

    // Tech Stack
    register_taxonomy( 'tf_tech', 'tf_project', [
        'labels'       => [
            'name'          => 'Technologies',
            'singular_name' => 'Technology',
            'add_new_item'  => 'Add New Technology',
        ],
        'hierarchical' => false,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'tech' ],
    ]);
}
add_action( 'init', 'techflow_register_taxonomies' );

// ============================================================
// META BOXES — PROJECTS
// ============================================================
function techflow_add_meta_boxes() {
    add_meta_box(
        'tf_project_details',
        'Project Details',
        'techflow_project_meta_callback',
        'tf_project',
        'normal',
        'high'
    );
    add_meta_box(
        'tf_testimonial_details',
        'Testimonial Details',
        'techflow_testimonial_meta_callback',
        'tf_testimonial',
        'normal',
        'high'
    );
    add_meta_box(
        'tf_team_details',
        'Team Member Details',
        'techflow_team_meta_callback',
        'tf_team',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'techflow_add_meta_boxes' );

// Project meta callback
function techflow_project_meta_callback( $post ) {
    wp_nonce_field( 'tf_project_nonce', 'tf_project_nonce_field' );
    $fields = [
        '_tf_project_url'      => [ 'label' => 'Live URL',           'type' => 'url',    'placeholder' => 'https://...' ],
        '_tf_project_github'   => [ 'label' => 'GitHub URL',         'type' => 'url',    'placeholder' => 'https://github.com/...' ],
        '_tf_project_client'   => [ 'label' => 'Client Name',        'type' => 'text',   'placeholder' => 'Acme Corp' ],
        '_tf_project_year'     => [ 'label' => 'Year',               'type' => 'text',   'placeholder' => '2024' ],
        '_tf_project_duration' => [ 'label' => 'Duration',           'type' => 'text',   'placeholder' => '3 months' ],
        '_tf_project_result'   => [ 'label' => 'Key Result',         'type' => 'text',   'placeholder' => '+340% conversion' ],
        '_tf_project_stack'    => [ 'label' => 'Tech Stack (comma)', 'type' => 'text',   'placeholder' => 'WordPress, React, Node.js' ],
        '_tf_project_featured' => [ 'label' => 'Featured (1=yes)',   'type' => 'text',   'placeholder' => '1' ],
        '_tf_project_color'    => [ 'label' => 'Accent Color (hex)', 'type' => 'color',  'placeholder' => '#7C3AED' ],
    ];
    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr><th><label for="' . esc_attr($key) . '">' . esc_html($field['label']) . '</label></th>';
        echo '<td><input type="' . esc_attr($field['type']) . '" id="' . esc_attr($key) . '"
            name="' . esc_attr($key) . '" value="' . esc_attr($value) . '"
            placeholder="' . esc_attr($field['placeholder']) . '"
            style="width:100%;max-width:400px"></td></tr>';
    }
    echo '</table>';
}

// Testimonial meta callback
function techflow_testimonial_meta_callback( $post ) {
    wp_nonce_field( 'tf_testimonial_nonce', 'tf_testimonial_nonce_field' );
    $fields = [
        '_tf_testimonial_name'    => [ 'label' => 'Client Name',    'placeholder' => 'John Smith' ],
        '_tf_testimonial_role'    => [ 'label' => 'Role & Company', 'placeholder' => 'CEO at Acme Corp' ],
        '_tf_testimonial_rating'  => [ 'label' => 'Rating (1-5)',   'placeholder' => '5' ],
        '_tf_testimonial_project' => [ 'label' => 'Project Name',   'placeholder' => 'E-Commerce Platform' ],
    ];
    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr><th><label for="' . esc_attr($key) . '">' . esc_html($field['label']) . '</label></th>';
        echo '<td><input type="text" id="' . esc_attr($key) . '"
            name="' . esc_attr($key) . '" value="' . esc_attr($value) . '"
            placeholder="' . esc_attr($field['placeholder']) . '"
            style="width:100%;max-width:400px"></td></tr>';
    }
    echo '</table>';
}

// Team meta callback
function techflow_team_meta_callback( $post ) {
    wp_nonce_field( 'tf_team_nonce', 'tf_team_nonce_field' );
    $fields = [
        '_tf_team_role'      => [ 'label' => 'Role',          'placeholder' => 'Lead Developer' ],
        '_tf_team_linkedin'  => [ 'label' => 'LinkedIn URL',  'placeholder' => 'https://linkedin.com/in/...' ],
        '_tf_team_github'    => [ 'label' => 'GitHub URL',    'placeholder' => 'https://github.com/...' ],
        '_tf_team_twitter'   => [ 'label' => 'Twitter/X URL', 'placeholder' => 'https://twitter.com/...' ],
        '_tf_team_skills'    => [ 'label' => 'Skills (comma)','placeholder' => 'WordPress, PHP, React' ],
        '_tf_team_order'     => [ 'label' => 'Display Order', 'placeholder' => '1' ],
    ];
    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr><th><label for="' . esc_attr($key) . '">' . esc_html($field['label']) . '</label></th>';
        echo '<td><input type="text" id="' . esc_attr($key) . '"
            name="' . esc_attr($key) . '" value="' . esc_attr($value) . '"
            placeholder="' . esc_attr($field['placeholder']) . '"
            style="width:100%;max-width:400px"></td></tr>';
    }
    echo '</table>';
}

// ============================================================
// SAVE META BOXES
// ============================================================
function techflow_save_meta_boxes( $post_id ) {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // Project fields
    if ( isset($_POST['tf_project_nonce_field']) &&
         wp_verify_nonce($_POST['tf_project_nonce_field'], 'tf_project_nonce') ) {
        $project_fields = [
            '_tf_project_url', '_tf_project_github', '_tf_project_client',
            '_tf_project_year', '_tf_project_duration', '_tf_project_result',
            '_tf_project_stack', '_tf_project_featured', '_tf_project_color',
        ];
        foreach ( $project_fields as $field ) {
            if ( isset($_POST[$field]) ) {
                update_post_meta( $post_id, $field, sanitize_text_field($_POST[$field]) );
            }
        }
    }

    // Testimonial fields
    if ( isset($_POST['tf_testimonial_nonce_field']) &&
         wp_verify_nonce($_POST['tf_testimonial_nonce_field'], 'tf_testimonial_nonce') ) {
        $t_fields = [
            '_tf_testimonial_name', '_tf_testimonial_role',
            '_tf_testimonial_rating', '_tf_testimonial_project',
        ];
        foreach ( $t_fields as $field ) {
            if ( isset($_POST[$field]) ) {
                update_post_meta( $post_id, $field, sanitize_text_field($_POST[$field]) );
            }
        }
    }

    // Team fields
    if ( isset($_POST['tf_team_nonce_field']) &&
         wp_verify_nonce($_POST['tf_team_nonce_field'], 'tf_team_nonce') ) {
        $team_fields = [
            '_tf_team_role', '_tf_team_linkedin', '_tf_team_github',
            '_tf_team_twitter', '_tf_team_skills', '_tf_team_order',
        ];
        foreach ( $team_fields as $field ) {
            if ( isset($_POST[$field]) ) {
                update_post_meta( $post_id, $field, sanitize_text_field($_POST[$field]) );
            }
        }
    }
}
add_action( 'save_post', 'techflow_save_meta_boxes' );

// ============================================================
// AJAX — CONTACT FORM
// ============================================================
function techflow_handle_contact() {
    check_ajax_referer( 'tf_nonce', 'nonce' );

    $name    = sanitize_text_field( $_POST['name']    ?? '' );
    $email   = sanitize_email(      $_POST['email']   ?? '' );
    $company = sanitize_text_field( $_POST['company'] ?? '' );
    $budget  = sanitize_text_field( $_POST['budget']  ?? '' );
    $service = sanitize_text_field( $_POST['service'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $name || ! $email || ! is_email($email) ) {
        wp_send_json_error( 'Please fill in all required fields.' );
    }

    $to      = get_option('admin_email');
    $subject = "New Project Inquiry from {$name} — TechFlow";
    $body    = "Name: {$name}\nEmail: {$email}\nCompany: {$company}\n";
    $body   .= "Budget: {$budget}\nService: {$service}\n\nMessage:\n{$message}";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}" ];

    $sent = wp_mail( $to, $subject, $body, $headers );
    if ( $sent ) {
        wp_send_json_success( 'Message sent successfully.' );
    } else {
        wp_send_json_error( 'Failed to send. Please try again.' );
    }
}
add_action( 'wp_ajax_tf_contact',        'techflow_handle_contact' );
add_action( 'wp_ajax_nopriv_tf_contact', 'techflow_handle_contact' );

// ============================================================
// AJAX — PORTFOLIO FILTER
// ============================================================
function techflow_filter_projects() {
    check_ajax_referer( 'tf_nonce', 'nonce' );

    $category = sanitize_text_field( $_POST['category'] ?? '' );
    $args = [
        'post_type'      => 'tf_project',
        'posts_per_page' => 12,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    if ( $category && $category !== 'all' ) {
        $args['tax_query'] = [[
            'taxonomy' => 'tf_category',
            'field'    => 'slug',
            'terms'    => $category,
        ]];
    }

    $projects = new WP_Query($args);
    $output   = [];

    if ( $projects->have_posts() ) {
        while ( $projects->have_posts() ) {
            $projects->the_post();
            $output[] = [
                'id'       => get_the_ID(),
                'title'    => get_the_title(),
                'excerpt'  => get_the_excerpt(),
                'url'      => get_permalink(),
                'thumb'    => get_the_post_thumbnail_url( get_the_ID(), 'tf-project-thumb' ),
                'result'   => get_post_meta( get_the_ID(), '_tf_project_result', true ),
                'stack'    => get_post_meta( get_the_ID(), '_tf_project_stack',  true ),
                'color'    => get_post_meta( get_the_ID(), '_tf_project_color',  true ) ?: '#7C3AED',
                'year'     => get_post_meta( get_the_ID(), '_tf_project_year',   true ),
            ];
        }
        wp_reset_postdata();
    }

    wp_send_json_success( $output );
}
add_action( 'wp_ajax_tf_filter_projects',        'techflow_filter_projects' );
add_action( 'wp_ajax_nopriv_tf_filter_projects', 'techflow_filter_projects' );

// ============================================================
// SEO — META TAGS
// ============================================================
function techflow_seo_meta() {
    global $post;

    $site_name   = get_bloginfo('name');
    $tagline     = get_bloginfo('description');
    $current_url = ( is_ssl() ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    // Title
    if ( is_front_page() ) {
        $title       = "{$site_name} — Premium WordPress & Software Agency";
        $description = "TechFlow builds high-performance digital products. Custom WordPress development, web apps, e-commerce and API integrations for ambitious brands.";
        $og_type     = 'website';
    } elseif ( is_singular('tf_project') ) {
        $title       = get_the_title() . " | Work — {$site_name}";
        $description = get_the_excerpt() ?: "Case study: " . get_the_title();
        $og_type     = 'article';
    } elseif ( is_singular() ) {
        $title       = get_the_title() . " | {$site_name}";
        $description = get_the_excerpt() ?: $tagline;
        $og_type     = 'article';
    } else {
        $title       = "{$site_name} | {$tagline}";
        $description = $tagline;
        $og_type     = 'website';
    }

    $og_image = get_template_directory_uri() . '/assets/images/og-default.jpg';
    if ( is_singular() && has_post_thumbnail() ) {
        $og_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    }

    echo "\n<!-- TechFlow SEO -->\n";
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="robots" content="index,follow">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($current_url) . '">' . "\n";

    // Open Graph
    echo '<meta property="og:type"        content="' . esc_attr($og_type)    . '">' . "\n";
    echo '<meta property="og:title"       content="' . esc_attr($title)       . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url"         content="' . esc_url($current_url)  . '">' . "\n";
    echo '<meta property="og:image"       content="' . esc_url($og_image)     . '">' . "\n";
    echo '<meta property="og:site_name"   content="' . esc_attr($site_name)   . '">' . "\n";

    // Twitter Card
    echo '<meta name="twitter:card"        content="summary_large_image">'            . "\n";
    echo '<meta name="twitter:title"       content="' . esc_attr($title)       . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="twitter:image"       content="' . esc_url($og_image)     . '">' . "\n";

    // Schema — Organization
    if ( is_front_page() ) {
        $schema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Organization',
            'name'        => $site_name,
            'url'         => home_url('/'),
            'description' => $description,
            'logo'        => get_template_directory_uri() . '/assets/images/logo.svg',
            'contactPoint' => [
                '@type'       => 'ContactPoint',
                'contactType' => 'customer service',
                'email'       => get_option('admin_email'),
            ],
            'sameAs' => [
                'https://github.com/techflow',
                'https://linkedin.com/company/techflow',
                'https://twitter.com/techflow',
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
    }

    // Schema — Project (Case Study)
    if ( is_singular('tf_project') ) {
        $schema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'CreativeWork',
            'name'        => get_the_title(),
            'description' => get_the_excerpt(),
            'url'         => get_permalink(),
            'author'      => [ '@type' => 'Organization', 'name' => $site_name ],
            'dateCreated' => get_the_date('Y-m-d'),
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'techflow_seo_meta', 1 );

// ============================================================
// PERFORMANCE
// ============================================================

// Remove emoji scripts
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script'    );
remove_action( 'wp_print_styles',     'print_emoji_styles'              );
remove_action( 'admin_print_styles',  'print_emoji_styles'              );
remove_filter( 'the_content_feed',    'wp_staticize_emoji'              );
remove_filter( 'comment_text_rss',    'wp_staticize_emoji'              );
remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email'    );

// Remove unnecessary head tags
remove_action( 'wp_head', 'wp_generator'                        );
remove_action( 'wp_head', 'wlwmanifest_link'                    );
remove_action( 'wp_head', 'rsd_link'                            );
remove_action( 'wp_head', 'wp_shortlink_wp_head'                );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Defer non-critical JS
function techflow_defer_scripts( $tag, $handle, $src ) {
    $defer_scripts = [ 'tf-cursor', 'tf-animations', 'tf-typewriter' ];
    if ( in_array( $handle, $defer_scripts ) ) {
        return str_replace( ' src', ' defer src', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'techflow_defer_scripts', 10, 3 );

// Preconnect Google Fonts
function techflow_preconnect_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'techflow_preconnect_fonts', 0 );

// ============================================================
// HELPER FUNCTIONS
// ============================================================

/**
 * Get featured projects
 */
function techflow_get_featured_projects( $limit = 3 ) {
    return new WP_Query([
        'post_type'      => 'tf_project',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'meta_query'     => [[
            'key'     => '_tf_project_featured',
            'value'   => '1',
            'compare' => '=',
        ]],
        'orderby' => 'date',
        'order'   => 'DESC',
    ]);
}

/**
 * Get testimonials
 */
function techflow_get_testimonials( $limit = 6 ) {
    return new WP_Query([
        'post_type'      => 'tf_testimonial',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'orderby'        => 'rand',
    ]);
}

/**
 * Get team members
 */
function techflow_get_team( $limit = 8 ) {
    return new WP_Query([
        'post_type'      => 'tf_team',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'orderby'        => 'meta_value_num',
        'meta_key'       => '_tf_team_order',
        'order'          => 'ASC',
    ]);
}

/**
 * Render star rating
 */
function techflow_stars( $rating = 5 ) {
    $rating = intval($rating);
    $html   = '<div class="tf-stars" aria-label="' . $rating . ' out of 5 stars">';
    for ( $i = 1; $i <= 5; $i++ ) {
        $class = $i <= $rating ? 'tf-star filled' : 'tf-star';
        $html .= '<span class="' . $class . '">★</span>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Render tech stack pills
 */
function techflow_stack_pills( $stack_string, $color = '#7C3AED' ) {
    if ( ! $stack_string ) return '';
    $techs = array_map( 'trim', explode( ',', $stack_string ) );
    $html  = '<div class="tf-stack-pills">';
    foreach ( $techs as $tech ) {
        $html .= '<span class="tf-stack-pill">' . esc_html($tech) . '</span>';
    }
    $html .= '</div>';
    return $html;
}

/**
 * Truncate text
 */
function techflow_truncate( $text, $limit = 120 ) {
    if ( strlen($text) <= $limit ) return $text;
    return substr( $text, 0, strrpos( substr($text, 0, $limit), ' ' ) ) . '…';
}

/**
 * Get project categories for filter
 */
function techflow_get_project_categories() {
    return get_terms([
        'taxonomy'   => 'tf_category',
        'hide_empty' => true,
        'orderby'    => 'name',
    ]);
}

// ============================================================
// ADMIN CUSTOMIZATION
// ============================================================

// Custom admin columns for projects
function techflow_project_columns( $columns ) {
    return [
        'cb'               => $columns['cb'],
        'title'            => 'Project',
        'tf_client'        => 'Client',
        'tf_result'        => 'Key Result',
        'tf_stack'         => 'Tech Stack',
        'tf_featured'      => 'Featured',
        'tf_year'          => 'Year',
        'date'             => 'Date',
    ];
}
add_filter( 'manage_tf_project_posts_columns', 'techflow_project_columns' );

function techflow_project_column_content( $column, $post_id ) {
    switch ( $column ) {
        case 'tf_client':
            echo esc_html( get_post_meta( $post_id, '_tf_project_client', true ) ?: '—' );
            break;
        case 'tf_result':
            $result = get_post_meta( $post_id, '_tf_project_result', true );
            echo $result ? '<span style="color:#10B981;font-weight:600">' . esc_html($result) . '</span>' : '—';
            break;
        case 'tf_stack':
            $stack = get_post_meta( $post_id, '_tf_project_stack', true );
            echo $stack ? '<small>' . esc_html($stack) . '</small>' : '—';
            break;
        case 'tf_featured':
            $featured = get_post_meta( $post_id, '_tf_project_featured', true );
            echo $featured === '1' ? '⭐ Yes' : '—';
            break;
        case 'tf_year':
            echo esc_html( get_post_meta( $post_id, '_tf_project_year', true ) ?: '—' );
            break;
    }
}
add_action( 'manage_tf_project_posts_custom_column', 'techflow_project_column_content', 10, 2 );

// Admin footer branding
function techflow_admin_footer() {
    echo '<span>TechFlow Theme — Built with ❤️ for the portfolio</span>';
}
add_filter( 'admin_footer_text', 'techflow_admin_footer' );

// ============================================================
// FLUSH REWRITE RULES ON ACTIVATION
// ============================================================
function techflow_flush_rewrites() {
    techflow_register_cpt_projects();
    techflow_register_cpt_services();
    techflow_register_cpt_testimonials();
    techflow_register_cpt_team();
    techflow_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'techflow_flush_rewrites' );


// DEBUG — borrar después
add_action('wp_footer', function() {
    if ( is_page() ) {
        echo '<!-- Template: ' . get_page_template() . ' -->';
        echo '<!-- Page: ' . get_queried_object()->post_name . ' -->';
    }
});