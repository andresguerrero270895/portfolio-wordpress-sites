<?php
/**
 * MedPractice USA Theme Functions
 * @package MedPractice
 * @version 1.0.0
 */

if (!defined('ABSPATH')) { exit; }

define('MP_THEME_VERSION', '1.0.0');
define('MP_THEME_DIR', get_stylesheet_directory());
define('MP_THEME_URI', get_stylesheet_directory_uri());

// 1. THEME SETUP
function medpractice_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array('height'=>80,'width'=>250,'flex-height'=>true,'flex-width'=>true));
    add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    register_nav_menus(array(
        'primary'=>__('Primary Menu','medpractice'),
        'footer'=>__('Footer Menu','medpractice'),
        'states'=>__('States Menu','medpractice'),
    ));
    add_image_size('mp-hero', 1920, 1080, true);
    add_image_size('mp-card', 600, 400, true);
    add_image_size('mp-thumbnail', 300, 200, true);
    add_image_size('mp-state-banner', 1200, 500, true);
}
add_action('after_setup_theme', 'medpractice_theme_setup');

// 2. ENQUEUE STYLES & SCRIPTS
function medpractice_enqueue_assets() {
    $version = MP_THEME_VERSION;
    $uri = MP_THEME_URI;
    wp_enqueue_style('medpractice-google-fonts','https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap',array(),null);
    wp_enqueue_style('astra-parent-style',get_template_directory_uri().'/style.css',array(),$version);
    wp_enqueue_style('medpractice-style',get_stylesheet_uri(),array('astra-parent-style'),$version);
    wp_enqueue_style('medpractice-components',$uri.'/assets/css/components.css',array('medpractice-style'),$version);
    if (is_singular('state_landing')) {
        wp_enqueue_style('medpractice-landing',$uri.'/assets/css/landing-page.css',array('medpractice-style'),$version);
    }
    wp_enqueue_script('medpractice-main',$uri.'/assets/js/main.js',array(),$version,true);
    wp_enqueue_script('medpractice-animations',$uri.'/assets/js/animations.js',array('medpractice-main'),$version,true);
    wp_enqueue_script('medpractice-navigation',$uri.'/assets/js/navigation.js',array(),$version,true);
    wp_enqueue_script('medpractice-counter',$uri.'/assets/js/counter.js',array(),$version,true);
    wp_localize_script('medpractice-main','medpracticeData',array(
        'ajaxUrl'=>admin_url('admin-ajax.php'),
        'nonce'=>wp_create_nonce('medpractice_nonce'),
        'siteUrl'=>home_url(),
        'themeUrl'=>$uri,
    ));
}
add_action('wp_enqueue_scripts', 'medpractice_enqueue_assets');

// 3. CUSTOM POST TYPES & TAXONOMIES
function medpractice_register_post_types() {
    register_post_type('state_landing', array(
        'labels'=>array(
            'name'=>__('State Landings','medpractice'),
            'singular_name'=>__('State Landing','medpractice'),
            'menu_name'=>__('State Landings','medpractice'),
            'add_new'=>__('Add New State','medpractice'),
            'add_new_item'=>__('Add New State Landing','medpractice'),
            'edit_item'=>__('Edit State Landing','medpractice'),
            'view_item'=>__('View State Landing','medpractice'),
            'all_items'=>__('All States','medpractice'),
            'search_items'=>__('Search States','medpractice'),
            'not_found'=>__('No states found','medpractice'),
        ),
        'public'=>true,'has_archive'=>true,
        'rewrite'=>array('slug'=>'states','with_front'=>false),
        'supports'=>array('title','editor','thumbnail','excerpt','custom-fields','revisions'),
        'menu_icon'=>'dashicons-location-alt','show_in_rest'=>true,
        'publicly_queryable'=>true,'show_ui'=>true,'show_in_menu'=>true,
        'query_var'=>true,'capability_type'=>'post','hierarchical'=>false,'menu_position'=>5,
    ));
    register_taxonomy('state_region','state_landing',array(
        'labels'=>array('name'=>__('Regions','medpractice'),'singular_name'=>__('Region','medpractice')),
        'hierarchical'=>true,'public'=>true,'show_in_rest'=>true,'show_admin_column'=>true,
        'rewrite'=>array('slug'=>'region','with_front'=>false),
    ));
    register_taxonomy('service_type','state_landing',array(
        'labels'=>array('name'=>__('Service Types','medpractice'),'singular_name'=>__('Service Type','medpractice')),
        'hierarchical'=>true,'public'=>true,'show_in_rest'=>true,'show_admin_column'=>true,
        'rewrite'=>array('slug'=>'service','with_front'=>false),
    ));
    register_post_type('testimonial',array(
        'labels'=>array(
            'name'=>__('Testimonials','medpractice'),
            'singular_name'=>__('Testimonial','medpractice'),
            'menu_name'=>__('Testimonials','medpractice'),
            'add_new'=>__('Add New Testimonial','medpractice'),
            'all_items'=>__('All Testimonials','medpractice'),
        ),
        'public'=>true,'has_archive'=>false,
        'rewrite'=>array('slug'=>'testimonials'),
        'supports'=>array('title','editor','thumbnail','custom-fields'),
        'menu_icon'=>'dashicons-format-quote','show_in_rest'=>true,'menu_position'=>6,
    ));
}
add_action('init','medpractice_register_post_types');

function medpractice_rewrite_flush() {
    medpractice_register_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme','medpractice_rewrite_flush');

// 4. CUSTOM META BOXES
function medpractice_add_meta_boxes() {
    add_meta_box('mp_state_details',__('State Details','medpractice'),'medpractice_state_details_callback','state_landing','normal','high');
    add_meta_box('mp_testimonial_details',__('Testimonial Details','medpractice'),'medpractice_testimonial_details_callback','testimonial','normal','high');
}
add_action('add_meta_boxes','medpractice_add_meta_boxes');

function medpractice_state_details_callback($post) {
    wp_nonce_field('mp_state_details_nonce','mp_state_nonce');
    $fields = array(
        'state_code'=>array('label'=>'State Code (e.g., CA, TX)','type'=>'text'),
        'state_capital'=>array('label'=>'State Capital','type'=>'text'),
        'state_population'=>array('label'=>'State Population','type'=>'text'),
        'practices_count'=>array('label'=>'Available Practices','type'=>'number'),
        'avg_price'=>array('label'=>'Average Practice Price ($)','type'=>'text'),
        'state_phone'=>array('label'=>'Local Phone Number','type'=>'tel'),
        'state_email'=>array('label'=>'Local Email','type'=>'email'),
        'hero_headline'=>array('label'=>'Hero Headline','type'=>'text'),
        'hero_subheadline'=>array('label'=>'Hero Subheadline','type'=>'textarea'),
        'cta_text'=>array('label'=>'CTA Button Text','type'=>'text'),
        'meta_description'=>array('label'=>'Meta Description (160 chars)','type'=>'textarea'),
        'schema_locality'=>array('label'=>'Schema.org Locality','type'=>'text'),
    );
    echo '<div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;">';
    foreach ($fields as $key => $field) {
        $value = get_post_meta($post->ID, '_mp_'.$key, true);
        $full = in_array($key, array('hero_headline','hero_subheadline','meta_description')) ? 'grid-column:1/-1;' : '';
        echo '<div style="'.$full.'margin-bottom:10px;">';
        echo '<label style="display:block;font-weight:600;margin-bottom:4px;">'.$field['label'].'</label>';
        if ($field['type'] === 'textarea') {
            echo '<textarea name="mp_'.$key.'" style="width:100%;padding:8px;border:1px solid #8c8f94;border-radius:4px;min-height:70px;">'.esc_textarea($value).'</textarea>';
        } else {
            echo '<input type="'.$field['type'].'" name="mp_'.$key.'" value="'.esc_attr($value).'" style="width:100%;padding:8px;border:1px solid #8c8f94;border-radius:4px;">';
        }
        echo '</div>';
    }
    echo '</div>';
}

function medpractice_save_state_meta($post_id) {
    if (!isset($_POST['mp_state_nonce'])||!wp_verify_nonce($_POST['mp_state_nonce'],'mp_state_details_nonce')) return;
    if (defined('DOING_AUTOSAVE')&&DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post',$post_id)) return;
    $fields = array('state_code','state_capital','state_population','practices_count','avg_price','state_phone','state_email','hero_headline','hero_subheadline','cta_text','meta_description','schema_locality');
    foreach ($fields as $field) {
        if (isset($_POST['mp_'.$field])) {
            update_post_meta($post_id,'_mp_'.$field,sanitize_text_field($_POST['mp_'.$field]));
        }
    }
}
add_action('save_post_state_landing','medpractice_save_state_meta');

function medpractice_testimonial_details_callback($post) {
    wp_nonce_field('mp_testimonial_nonce_action','mp_testimonial_nonce');
    $role = get_post_meta($post->ID,'_mp_author_role',true);
    $state = get_post_meta($post->ID,'_mp_author_state',true);
    $rating = get_post_meta($post->ID,'_mp_rating',true);
    echo '<div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:15px;">';
    echo '<div><label style="display:block;font-weight:600;margin-bottom:4px;">Author Role</label><input type="text" name="mp_author_role" value="'.esc_attr($role).'" style="width:100%;padding:8px;border:1px solid #8c8f94;border-radius:4px;"></div>';
    echo '<div><label style="display:block;font-weight:600;margin-bottom:4px;">Author State</label><input type="text" name="mp_author_state" value="'.esc_attr($state).'" style="width:100%;padding:8px;border:1px solid #8c8f94;border-radius:4px;"></div>';
    echo '<div><label style="display:block;font-weight:600;margin-bottom:4px;">Rating (1-5)</label><select name="mp_rating" style="width:100%;padding:8px;border:1px solid #8c8f94;border-radius:4px;">';
    for ($i=5;$i>=1;$i--) { echo '<option value="'.$i.'"'.selected($rating,$i,false).'>'.$i.' Stars</option>'; }
    echo '</select></div></div>';
}

function medpractice_save_testimonial_meta($post_id) {
    if (!isset($_POST['mp_testimonial_nonce'])||!wp_verify_nonce($_POST['mp_testimonial_nonce'],'mp_testimonial_nonce_action')) return;
    if (defined('DOING_AUTOSAVE')&&DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post',$post_id)) return;
    foreach (array('author_role','author_state','rating') as $field) {
        if (isset($_POST['mp_'.$field])) update_post_meta($post_id,'_mp_'.$field,sanitize_text_field($_POST['mp_'.$field]));
    }
}
add_action('save_post_testimonial','medpractice_save_testimonial_meta');

// 5. SHORTCODES
function medpractice_states_grid_shortcode($atts) {
    $atts = shortcode_atts(array('columns'=>5,'limit'=>30),$atts);
    $states = new WP_Query(array('post_type'=>'state_landing','posts_per_page'=>intval($atts['limit']),'orderby'=>'title','order'=>'ASC','post_status'=>'publish'));
    if (!$states->have_posts()) return '<p>No states found.</p>';
    ob_start();
    echo '<div class="mp-states-grid mp-stagger">';
    while ($states->have_posts()) { $states->the_post();
        $code = get_post_meta(get_the_ID(),'_mp_state_code',true);
        $practices = get_post_meta(get_the_ID(),'_mp_practices_count',true);
        echo '<a href="'.get_permalink().'" class="mp-state-card mp-fade-in"><span class="mp-state-card__code">'.esc_html($code).'</span><span class="mp-state-card__name">'.get_the_title().'</span><span class="mp-state-card__count">'.esc_html($practices?:' 50+').' practices</span></a>';
    }
    echo '</div>';
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('mp_states_grid','medpractice_states_grid_shortcode');

function medpractice_testimonials_shortcode($atts) {
    $atts = shortcode_atts(array('limit'=>6),$atts);
    $testimonials = new WP_Query(array('post_type'=>'testimonial','posts_per_page'=>intval($atts['limit']),'orderby'=>'rand','post_status'=>'publish'));
    if (!$testimonials->have_posts()) return '';
    ob_start();
    echo '<div class="mp-testimonials-grid mp-stagger">';
    while ($testimonials->have_posts()) { $testimonials->the_post();
        $role = get_post_meta(get_the_ID(),'_mp_author_role',true);
        $state = get_post_meta(get_the_ID(),'_mp_author_state',true);
        $rating = get_post_meta(get_the_ID(),'_mp_rating',true)?:5;
        $initials = mb_substr(get_the_title(),0,2);
        echo '<div class="mp-testimonial-card mp-fade-in"><div class="mp-testimonial-card__stars">'.str_repeat('★',$rating).'</div><p class="mp-testimonial-card__text">"'.wp_trim_words(get_the_content(),40).'"</p><div class="mp-testimonial-card__author"><div class="mp-testimonial-card__avatar">'.esc_html($initials).'</div><div><div class="mp-testimonial-card__name">'.get_the_title().'</div><div class="mp-testimonial-card__role">'.esc_html($role).' — '.esc_html($state).'</div></div></div></div>';
    }
    echo '</div>';
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('mp_testimonials_slider','medpractice_testimonials_shortcode');

// 6. SEO FUNCTIONS
function medpractice_seo_meta_tags() {
    if (is_singular('state_landing')) {
        global $post;
        $meta_desc = get_post_meta($post->ID,'_mp_meta_description',true);
        $state_code = get_post_meta($post->ID,'_mp_state_code',true);
        $locality = get_post_meta($post->ID,'_mp_schema_locality',true);
        if ($meta_desc) echo '<meta name="description" content="'.esc_attr($meta_desc).'">'."\n";
        echo '<meta property="og:title" content="'.esc_attr(get_the_title()).' - Medical Practices for Sale">'."\n";
        echo '<meta property="og:description" content="'.esc_attr($meta_desc?:get_the_excerpt()).'">'."\n";
        echo '<meta property="og:type" content="website">'."\n";
        echo '<meta property="og:url" content="'.esc_url(get_permalink()).'">'."\n";
        echo '<meta name="twitter:card" content="summary_large_image">'."\n";
        $schema = array('@context'=>'https://schema.org','@type'=>'MedicalBusiness','name'=>'MedPractice USA - '.get_the_title(),'url'=>get_permalink(),'address'=>array('@type'=>'PostalAddress','addressRegion'=>$state_code,'addressCountry'=>'US'));
        echo '<script type="application/ld+json">'.wp_json_encode($schema,JSON_UNESCAPED_SLASHES).'</script>'."\n";
    } elseif (is_front_page()) {
        echo '<meta name="description" content="MedPractice USA - Premium medical practices for sale across 30+ states.">'."\n";
        echo '<meta property="og:title" content="MedPractice USA - Medical Practices for Sale">'."\n";
        echo '<meta property="og:type" content="website">'."\n";
        $schema = array('@context'=>'https://schema.org','@type'=>'Organization','name'=>'MedPractice USA','url'=>home_url(),'description'=>'Premium medical practices for sale across the United States.');
        echo '<script type="application/ld+json">'.wp_json_encode($schema,JSON_UNESCAPED_SLASHES).'</script>'."\n";
    }
}
add_action('wp_head','medpractice_seo_meta_tags',1);

// 7. SECURITY
remove_action('wp_head','wp_generator');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','rsd_link');
add_filter('xmlrpc_enabled','__return_false');
function medpractice_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
add_action('send_headers','medpractice_security_headers');

// 8. AJAX HANDLERS
function medpractice_ajax_search_states() {
    check_ajax_referer('medpractice_nonce','nonce');
    $search = sanitize_text_field($_POST['search']??'');
    $query = new WP_Query(array('post_type'=>'state_landing','posts_per_page'=>30,'s'=>$search,'orderby'=>'title','order'=>'ASC'));
    $results = array();
    while ($query->have_posts()) { $query->the_post();
        $results[] = array('id'=>get_the_ID(),'title'=>get_the_title(),'url'=>get_permalink(),'code'=>get_post_meta(get_the_ID(),'_mp_state_code',true),'practices'=>get_post_meta(get_the_ID(),'_mp_practices_count',true));
    }
    wp_reset_postdata();
    wp_send_json_success($results);
}
add_action('wp_ajax_search_states','medpractice_ajax_search_states');
add_action('wp_ajax_nopriv_search_states','medpractice_ajax_search_states');

function medpractice_ajax_contact_form() {
    check_ajax_referer('medpractice_nonce','nonce');
    $name = sanitize_text_field($_POST['name']??'');
    $email = sanitize_email($_POST['email']??'');
    $phone = sanitize_text_field($_POST['phone']??'');
    $state = sanitize_text_field($_POST['state']??'');
    $message = sanitize_textarea_field($_POST['message']??'');
    if (empty($name)||empty($email)||empty($message)) { wp_send_json_error(array('message'=>'Please fill in all required fields.')); }
    if (!is_email($email)) { wp_send_json_error(array('message'=>'Please enter a valid email.')); }
    $sent = wp_mail(get_option('admin_email'),"New Inquiry from {$name}","Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nState: {$state}\nMessage: {$message}");
    if ($sent) { wp_send_json_success(array('message'=>'Thank you! We will get back to you within 24 hours.')); }
    else { wp_send_json_error(array('message'=>'Something went wrong. Please try again.')); }
}
add_action('wp_ajax_contact_form','medpractice_ajax_contact_form');
add_action('wp_ajax_nopriv_contact_form','medpractice_ajax_contact_form');

// 9. WIDGETS
function medpractice_register_widgets() {
    register_sidebar(array('name'=>__('State Landing Sidebar','medpractice'),'id'=>'state-landing-sidebar','before_widget'=>'<div class="mp-widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4 class="mp-widget__title">','after_title'=>'</h4>'));
    register_sidebar(array('name'=>__('Footer Column 1','medpractice'),'id'=>'footer-1','before_widget'=>'<div class="mp-footer-widget">','after_widget'=>'</div>','before_title'=>'<h4 class="mp-footer__title">','after_title'=>'</h4>'));
}
add_action('widgets_init','medpractice_register_widgets');

// 10. HELPER - States Data
function medpractice_get_states_array() {
    return array(
        array('name'=>'Alabama','code'=>'AL','slug'=>'alabama','region'=>'southeast','capital'=>'Montgomery','practices'=>45,'avg_price'=>'420,000'),
        array('name'=>'Arizona','code'=>'AZ','slug'=>'arizona','region'=>'west','capital'=>'Phoenix','practices'=>89,'avg_price'=>'650,000'),
        array('name'=>'California','code'=>'CA','slug'=>'california','region'=>'west','capital'=>'Sacramento','practices'=>250,'avg_price'=>'980,000'),
        array('name'=>'Colorado','code'=>'CO','slug'=>'colorado','region'=>'west','capital'=>'Denver','practices'=>72,'avg_price'=>'710,000'),
        array('name'=>'Connecticut','code'=>'CT','slug'=>'connecticut','region'=>'northeast','capital'=>'Hartford','practices'=>48,'avg_price'=>'720,000'),
        array('name'=>'Florida','code'=>'FL','slug'=>'florida','region'=>'southeast','capital'=>'Tallahassee','practices'=>210,'avg_price'=>'750,000'),
        array('name'=>'Georgia','code'=>'GA','slug'=>'georgia','region'=>'southeast','capital'=>'Atlanta','practices'=>120,'avg_price'=>'580,000'),
        array('name'=>'Illinois','code'=>'IL','slug'=>'illinois','region'=>'midwest','capital'=>'Springfield','practices'=>140,'avg_price'=>'620,000'),
        array('name'=>'Indiana','code'=>'IN','slug'=>'indiana','region'=>'midwest','capital'=>'Indianapolis','practices'=>65,'avg_price'=>'480,000'),
        array('name'=>'Kentucky','code'=>'KY','slug'=>'kentucky','region'=>'southeast','capital'=>'Frankfort','practices'=>42,'avg_price'=>'390,000'),
        array('name'=>'Louisiana','code'=>'LA','slug'=>'louisiana','region'=>'southeast','capital'=>'Baton Rouge','practices'=>55,'avg_price'=>'450,000'),
        array('name'=>'Maryland','code'=>'MD','slug'=>'maryland','region'=>'northeast','capital'=>'Annapolis','practices'=>78,'avg_price'=>'680,000'),
        array('name'=>'Massachusetts','code'=>'MA','slug'=>'massachusetts','region'=>'northeast','capital'=>'Boston','practices'=>95,'avg_price'=>'850,000'),
        array('name'=>'Michigan','code'=>'MI','slug'=>'michigan','region'=>'midwest','capital'=>'Lansing','practices'=>110,'avg_price'=>'520,000'),
        array('name'=>'Minnesota','code'=>'MN','slug'=>'minnesota','region'=>'midwest','capital'=>'Saint Paul','practices'=>68,'avg_price'=>'560,000'),
        array('name'=>'Missouri','code'=>'MO','slug'=>'missouri','region'=>'midwest','capital'=>'Jefferson City','practices'=>70,'avg_price'=>'460,000'),
        array('name'=>'Nevada','code'=>'NV','slug'=>'nevada','region'=>'west','capital'=>'Carson City','practices'=>48,'avg_price'=>'590,000'),
        array('name'=>'New Jersey','code'=>'NJ','slug'=>'new-jersey','region'=>'northeast','capital'=>'Trenton','practices'=>105,'avg_price'=>'780,000'),
        array('name'=>'New York','code'=>'NY','slug'=>'new-york','region'=>'northeast','capital'=>'Albany','practices'=>230,'avg_price'=>'920,000'),
        array('name'=>'North Carolina','code'=>'NC','slug'=>'north-carolina','region'=>'southeast','capital'=>'Raleigh','practices'=>115,'avg_price'=>'550,000'),
        array('name'=>'Ohio','code'=>'OH','slug'=>'ohio','region'=>'midwest','capital'=>'Columbus','practices'=>130,'avg_price'=>'490,000'),
        array('name'=>'Oregon','code'=>'OR','slug'=>'oregon','region'=>'west','capital'=>'Salem','practices'=>58,'avg_price'=>'630,000'),
        array('name'=>'Pennsylvania','code'=>'PA','slug'=>'pennsylvania','region'=>'northeast','capital'=>'Harrisburg','practices'=>145,'avg_price'=>'610,000'),
        array('name'=>'South Carolina','code'=>'SC','slug'=>'south-carolina','region'=>'southeast','capital'=>'Columbia','practices'=>52,'avg_price'=>'440,000'),
        array('name'=>'Tennessee','code'=>'TN','slug'=>'tennessee','region'=>'southeast','capital'=>'Nashville','practices'=>85,'avg_price'=>'510,000'),
        array('name'=>'Texas','code'=>'TX','slug'=>'texas','region'=>'south','capital'=>'Austin','practices'=>280,'avg_price'=>'720,000'),
        array('name'=>'Virginia','code'=>'VA','slug'=>'virginia','region'=>'southeast','capital'=>'Richmond','practices'=>95,'avg_price'=>'640,000'),
        array('name'=>'Washington','code'=>'WA','slug'=>'washington','region'=>'west','capital'=>'Olympia','practices'=>82,'avg_price'=>'700,000'),
        array('name'=>'Wisconsin','code'=>'WI','slug'=>'wisconsin','region'=>'midwest','capital'=>'Madison','practices'=>60,'avg_price'=>'470,000'),
        array('name'=>'Michigan','code'=>'MI','slug'=>'michigan','region'=>'midwest','capital'=>'Lansing','practices'=>110,'avg_price'=>'520,000'),
    );
}

// 11. AUTO-CREATE 30 STATE PAGES
function medpractice_create_default_states() {
    if (get_option('mp_states_created')) return;
    $states = medpractice_get_states_array();
    $regions = array('west'=>'West','midwest'=>'Midwest','northeast'=>'Northeast','southeast'=>'Southeast','south'=>'South');
    foreach ($regions as $slug=>$name) { if (!term_exists($slug,'state_region')) wp_insert_term($name,'state_region',array('slug'=>$slug)); }
    $services = array('general-practice'=>'General Practice','dental-practice'=>'Dental Practice','specialty-practice'=>'Specialty Practice','urgent-care'=>'Urgent Care');
    foreach ($services as $slug=>$name) { if (!term_exists($slug,'service_type')) wp_insert_term($name,'service_type',array('slug'=>$slug)); }
    foreach ($states as $state) {
        $existing = get_page_by_path($state['slug'],OBJECT,'state_landing');
        if ($existing) continue;
        $content = sprintf('<p>Discover premium medical practices for sale in %1$s. MedPractice USA connects physicians with verified practice opportunities across %1$s.</p><h2>Why Buy a Medical Practice in %1$s?</h2><p>%1$s offers a thriving healthcare market with %2$s+ practices currently available at an average price of $%3$s.</p><h2>Available Practice Types</h2><ul><li>General Medicine</li><li>Dental Practices</li><li>Specialty Practices</li><li>Urgent Care Centers</li></ul><h2>Our Process</h2><ol><li><strong>Consultation</strong> - Free initial call</li><li><strong>Search</strong> - We find matching practices</li><li><strong>Due Diligence</strong> - Financial review</li><li><strong>Negotiation</strong> - Best terms secured</li><li><strong>Transition</strong> - Seamless handover</li></ol>',$state['name'],$state['practices'],$state['avg_price']);
        $post_id = wp_insert_post(array('post_title'=>$state['name'],'post_content'=>$content,'post_status'=>'publish','post_type'=>'state_landing','post_name'=>$state['slug'],'post_excerpt'=>sprintf('Find medical practices for sale in %s. Browse %s+ listings.',$state['name'],$state['practices'])));
        if (!is_wp_error($post_id)) {
            update_post_meta($post_id,'_mp_state_code',$state['code']);
            update_post_meta($post_id,'_mp_state_capital',$state['capital']);
            update_post_meta($post_id,'_mp_practices_count',$state['practices']);
            update_post_meta($post_id,'_mp_avg_price',$state['avg_price']);
            update_post_meta($post_id,'_mp_state_phone','(800) 555-'.str_pad(rand(1000,9999),4,'0'));
            update_post_meta($post_id,'_mp_state_email',strtolower(str_replace(' ','',$state['slug'])).'@medpracticeusa.com');
            update_post_meta($post_id,'_mp_hero_headline','Medical Practices for Sale in '.$state['name']);
            update_post_meta($post_id,'_mp_hero_subheadline',sprintf('Discover %s+ verified medical practice opportunities in %s.',$state['practices'],$state['name']));
            update_post_meta($post_id,'_mp_cta_text','Browse '.$state['name'].' Practices');
            update_post_meta($post_id,'_mp_meta_description',sprintf('Find medical practices for sale in %s. Browse %s+ listings. Average price: $%s.',$state['name'],$state['practices'],$state['avg_price']));
            update_post_meta($post_id,'_mp_schema_locality',$state['name'].', US');
            wp_set_object_terms($post_id,$state['region'],'state_region');
        }
    }
    update_option('mp_states_created',true);
}
add_action('after_switch_theme','medpractice_create_default_states');
function medpractice_maybe_create_states() { if (!get_option('mp_states_created')&&current_user_can('manage_options')) medpractice_create_default_states(); }
add_action('init','medpractice_maybe_create_states',20);

// 12. ADMIN COLUMNS
function medpractice_state_columns($columns) {
    return array('cb'=>$columns['cb'],'title'=>$columns['title'],'state_code'=>__('Code','medpractice'),'practices'=>__('Practices','medpractice'),'avg_price'=>__('Avg Price','medpractice'),'taxonomy-state_region'=>__('Region','medpractice'),'date'=>$columns['date']);
}
add_filter('manage_state_landing_posts_columns','medpractice_state_columns');

function medpractice_state_column_content($column,$post_id) {
    switch($column) {
        case 'state_code': echo '<strong>'.esc_html(get_post_meta($post_id,'_mp_state_code',true)).'</strong>'; break;
        case 'practices': echo esc_html(get_post_meta($post_id,'_mp_practices_count',true)?:'—'); break;
        case 'avg_price': $p=get_post_meta($post_id,'_mp_avg_price',true); echo $p?'$'.esc_html($p):'—'; break;
    }
}
add_action('manage_state_landing_posts_custom_column','medpractice_state_column_content',10,2);

// 13. PERFORMANCE
function medpractice_preload_assets() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">'."\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'."\n";
}
add_action('wp_head','medpractice_preload_assets',0);

// 14. BREADCRUMBS
function medpractice_breadcrumbs() {
    if (is_front_page()) return;
    $output = '<nav class="mp-breadcrumbs" aria-label="Breadcrumb"><ol class="mp-breadcrumbs__list">';
    $output .= '<li class="mp-breadcrumbs__item"><a href="'.esc_url(home_url()).'">Home</a></li>';
    if (is_singular('state_landing')) {
        $output .= '<li class="mp-breadcrumbs__item"><a href="'.esc_url(home_url('/states/')).'">States</a></li>';
        $output .= '<li class="mp-breadcrumbs__item mp-breadcrumbs__item--active">'.esc_html(get_the_title()).'</li>';
    } elseif (is_page()) {
        $output .= '<li class="mp-breadcrumbs__item mp-breadcrumbs__item--active">'.esc_html(get_the_title()).'</li>';
    }
    $output .= '</ol></nav>';
    echo $output;
}
