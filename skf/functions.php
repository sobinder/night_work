<?php
/**
 * skf functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skf
 */

if (!function_exists('skf_setup')): /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function skf_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on skf, use a find and replace
         * to change 'skf' to the name of your theme in all the template files.
         */
        load_theme_textdomain('skf', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'top-menu' => esc_html__('Top Menu', 'skf'),
			'main-menu-left' => esc_html__('Main Menu Left', 'skf'),
			'main-menu-right' => esc_html__('Main Menu Right', 'skf'),
            'footer-menu-left' => esc_html__('Footer Menu Left', 'skf'),
			'footer-menu-right' => esc_html__('Footer Menu Right', 'skf'),
			'my-account-menu' => esc_html__('My Account Menu', 'skf'),
			'glossary-menu' => esc_html__('Glossary Menu', 'skf'),
			'footer-menu' => esc_html__('Footer Menu', 'skf')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link'
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('skf_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => ''
        )));
    }
endif;
add_action('after_setup_theme', 'skf_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skf_content_width()
{
    $GLOBALS['content_width'] = apply_filters('skf_content_width', 640);
}
add_action('after_setup_theme', 'skf_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skf_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'skf'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'skf'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'skf_widgets_init');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skf_widgets_init_fixed()
{
    register_sidebar(array(
        'name' => esc_html__('Product Sidebar', 'skf'),
        'id' => 'product-sidebar',
       'description' => esc_html__('Add widgets here.', 'skf'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'skf_widgets_init_fixed');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skf_widgetss_init_fixed()
{
    register_sidebar(array(
        'name' => esc_html__('Search Products', 'skf'),
        'id' => 'search-products',
        'description' => esc_html__('Add widgets here.', 'skf'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init', 'skf_widgetss_init_fixed');


/**
 * Enqueue scripts and styles.
 */
function skf_scripts()
{
   // wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style('skf-style', get_stylesheet_uri());
	//wp_enqueue_style('owl-responsive', get_template_directory_uri() . '/responsive.css');
  	wp_enqueue_style('custom-css', get_template_directory_uri() . '/css/custom.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' );
    //wp_enqueue_script('magnific-popup-js', get_template_directory_uri() . '/js/magnific-popup.min.js' );
    //wp_enqueue_script('scrollUp-js', get_template_directory_uri() . '/js/jquery.scrollUp.js');
	//wp_enqueue_script('coockie-js', get_template_directory_uri() . '/js/jquery_cookie.min.js');
	// wp_enqueue_script('jquery-countdown-plugin', get_template_directory_uri() . '/js/jquery.plugin.min.js');
    // wp_enqueue_script('jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js');
	//wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.min.js');
	// wp_enqueue_script('ticker-js', get_template_directory_uri() . '/js/ticker.js');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js');
  	//wp_enqueue_script( 'api-key', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAjflA5-poOeXRpEgwcTjpjOeP25yfs-vM');

    wp_enqueue_script( 'date-picker',   get_template_directory_uri() . '/js/datepicker.js');


    // if ( 'locations' == get_post_type() ) {
    //   wp_enqueue_script( 'handlebars',   get_template_directory_uri() . '/store/assets/js/libs/handlebars.min.js');
    //   	wp_enqueue_script( 'map-api-custom-js',   get_template_directory_uri() . '/js/custom_map_api.js');
    // 	wp_enqueue_script( 'store-locator',   get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/jquery.storelocator.js');
    // 	wp_enqueue_script( 'store-cs',   get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/custom.js');
    //   }


    //   if ( is_page(134) ) {
    //   wp_enqueue_script( 'handlebars',   get_template_directory_uri() . '/store/assets/js/libs/handlebars.min.js');
    //   	wp_enqueue_script( 'map-api-custom-js',   get_template_directory_uri() . '/js/custom_map_api.js');
    // 	wp_enqueue_script( 'store-locator',   get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/jquery.storelocator.js');
    // 	wp_enqueue_script( 'store-cs',   get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/custom.js');
    //   }


    // 	if ( is_page(1563) ) {
    //     wp_enqueue_script( 'handlebars',   get_template_directory_uri() . '/store/assets/js/libs/handlebars.min.js');
    //   	wp_enqueue_script( 'map-api-custom-js',   get_template_directory_uri() . '/js/custom_map_api.js');
    // 	wp_enqueue_script( 'store-locator',   get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/jquery.storelocator.js');
    // 	wp_enqueue_script( 'store-cs',   get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/customs.js');
    //   }

    // Loading for all pages
    $customJs = is_page(1563) ? 'customs': 'custom';
    wp_enqueue_script( 'handlebars', get_template_directory_uri() .'/store/assets/js/libs/handlebars.min.js');
    wp_enqueue_script( 'map-api-custom-js', get_template_directory_uri() .'/js/custom_map_api.js', [''], time(), false );
    wp_enqueue_script( 'store-locator',  get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/jquery.storelocator.js', ['jquery','google-maps'], time(), false);
    wp_enqueue_script( 'store-cs', get_template_directory_uri() . '/store/assets/js/plugins/storeLocator/'.$customJs.'.js', ['jquery','handlebars','store-locator'], time(), false);

    // custom test.js
    //wp_enqueue_script('testing-js', get_template_directory_uri().'/test/testing.js', ['jquery','google-maps' ], time(), false);
}
add_action('wp_enqueue_scripts', 'skf_scripts');



add_filter('excerpt_more', '__return_false');


function create_post_type_sliders() {

        $labels = array(
            'name'               => __('Sliders'),
            'singular_name'      => __('Slider'),
            'menu_name'          => __('Sliders'),
            'parent_item_colon'  => __('Parent Sliders:'),
            'all_items'          => __('All Sliders'),
            'view_item'          => __('View Slider'),
            'add_new_item'       => __('Add New Slider'),
            'add_new'            => __('Add New Slider'),
            'edit_item'          => __('Edit Sliders'),
            'update_item'        => __('Update Sliders'),
            'search_items'       => __('Search Sliders'),
            'not_found'          => __('No Sliders found'),
            'not_found_in_trash' => __('No Slidersfound in Trash'),
        );
        $args   = array(
            'description'         => __('Sliders'),
            'labels'              => $labels,
            'supports'            => array('title', 'page-attributes', 'editor', 'thumbnail'),
            'taxonomies'          => array(''),
            'hierarchical'        => TRUE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => FALSE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-edit',
            'can_export'          => TRUE,
            'has_archive'         => false,
            'exclude_from_search' => FALSE,
            'publicly_queryable'  => TRUE,
            'capability_type'     => 'post',
        );


        register_post_type('sliders', $args);
}

// Hook into the 'init' action
add_action('init', 'create_post_type_sliders');




function create_post_type_videos() {

        $labels = array(
            'name'               => __('Videos'),
            'singular_name'      => __('Video'),
            'menu_name'          => __('Videos'),
            'parent_item_colon'  => __('Parent Videos:'),
            'all_items'          => __('All Videos'),
            'view_item'          => __('View Video'),
            'add_new_item'       => __('Add New Video'),
            'add_new'            => __('Add New Video'),
            'edit_item'          => __('Edit Videos'),
            'update_item'        => __('Update Videos'),
            'search_items'       => __('Search Videos'),
            'not_found'          => __('No Videos found'),
            'not_found_in_trash' => __('No Videosfound in Trash'),
        );
        $args   = array(
            'description'         => __('Videos'),
            'labels'              => $labels,
            'supports'            => array('title', 'page-attributes', 'editor', 'thumbnail'),
            'taxonomies'          => array(''),
            'hierarchical'        => TRUE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => FALSE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-edit',
            'can_export'          => TRUE,
            'has_archive'         => false,
            'exclude_from_search' => FALSE,
            'publicly_queryable'  => TRUE,
            'capability_type'     => 'post',
        );


        register_post_type('videos', $args);
}

// Hook into the 'init' action
add_action('init', 'create_post_type_videos');

// Fix youtube width
add_filter('embed_oembed_html', 'custom_oembed_filter', 10, 4);

function custom_oembed_filter($html, $url, $attr, $post_ID)
{
    $return = '<div class="video-container">' . $html . '</div>';
    return $return;
}


/**
* Implement the Custom Header feature.

require get_template_directory() . '/inc/custom-header.php';

* Custom template tags for this theme.

require get_template_directory() . '/inc/template-tags.php';


 * Custom functions that act independently of the theme templates.

require get_template_directory() . '/inc/extras.php';


 * Customizer additions.

require get_template_directory() . '/inc/customizer.php';


 * Load Jetpack compatibility file.

require get_template_directory() . '/inc/jetpack.php';
*/

// Woocommerce Products import
require get_template_directory() . '/inc/import-products.php';


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * @desc Remove in all product type
 */
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +

function woo_custom_cart_button_text() {

        return __( 'Add To Shopping List', 'woocommerce' );

}


function next_post_link_product($format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
    adjacent_post_link_product($format, $link, $in_same_cat, $excluded_categories, false);
}

function previous_post_link_product($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
    adjacent_post_link_product($format, $link, $in_same_cat, $excluded_categories, true);
}

function adjacent_post_link_product( $format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true ) {
    if ( $previous && is_attachment() )
        $post = get_post( get_post()->post_parent );
    else
        $post = get_adjacent_post_product( $in_same_cat, $excluded_categories, $previous );

    if ( ! $post ) {
        $output = '';
    } else {
        $title = $post->post_title;

        if ( empty( $post->post_title ) )
            $title = $previous ? __( 'Previous Post' ) : __( 'Next Post' );

        $title = apply_filters( 'the_title', $title, $post->ID );
        $date = mysql2date( get_option( 'date_format' ), $post->post_date );
        $rel = $previous ? 'prev' : 'next';

        $string = '<a href="' . get_permalink( $post ) . '" rel="'.$rel.'">';
        $inlink = str_replace( '%title', $title, $link );
        $inlink = str_replace( '%date', $date, $inlink );
        $inlink = $string . $inlink . '</a>';

        $output = str_replace( '%link', $inlink, $format );
    }

    $adjacent = $previous ? 'previous' : 'next';

    echo apply_filters( "{$adjacent}_post_link", $output, $format, $link, $post );
}

function get_adjacent_post_product( $in_same_cat = false, $excluded_categories = '', $previous = true ) {
    global $wpdb;

    if ( ! $post = get_post() )
        return null;

    $current_post_date = $post->post_date;

    $join = '';
    $posts_in_ex_cats_sql = '';
    if ( $in_same_cat || ! empty( $excluded_categories ) ) {
        $join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";

        if ( $in_same_cat ) {
            if ( ! is_object_in_taxonomy( $post->post_type, 'product_cat' ) )
                return '';
            $cat_array = wp_get_object_terms($post->ID, 'product_cat', array('fields' => 'ids'));
            if ( ! $cat_array || is_wp_error( $cat_array ) )
                return '';
            $join .= " AND tt.taxonomy = 'product_cat' AND tt.term_id IN (" . implode(',', $cat_array) . ")";
        }

        $posts_in_ex_cats_sql = "AND tt.taxonomy = 'product_cat'";
        if ( ! empty( $excluded_categories ) ) {
            if ( ! is_array( $excluded_categories ) ) {
                // back-compat, $excluded_categories used to be IDs separated by " and "
                if ( strpos( $excluded_categories, ' and ' ) !== false ) {
                    _deprecated_argument( __FUNCTION__, '3.3', sprintf( __( 'Use commas instead of %s to separate excluded categories.' ), "'and'" ) );
                    $excluded_categories = explode( ' and ', $excluded_categories );
                } else {
                    $excluded_categories = explode( ',', $excluded_categories );
                }
            }

            $excluded_categories = array_map( 'intval', $excluded_categories );

            if ( ! empty( $cat_array ) ) {
                $excluded_categories = array_diff($excluded_categories, $cat_array);
                $posts_in_ex_cats_sql = '';
            }

            if ( !empty($excluded_categories) ) {
                $posts_in_ex_cats_sql = " AND tt.taxonomy = 'product_cat' AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
            }
        }
    }

    $adjacent = $previous ? 'previous' : 'next';
    $op = $previous ? '<' : '>';
    $order = $previous ? 'DESC' : 'ASC';

    $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $posts_in_ex_cats_sql", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
    $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

    $query = "SELECT p.id FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5($query);
    $result = wp_cache_get($query_key, 'counts');
    if ( false !== $result ) {
        if ( $result )
            $result = get_post( $result );
        return $result;
    }

    $result = $wpdb->get_var( $query );
    if ( null === $result )
        $result = '';

    wp_cache_set($query_key, $result, 'counts');

    if ( $result )
        $result = get_post( $result );

    return $result;
}



function the_breadcrumb() {
                echo '<ul id="crumbs">';
        if (!is_home()) {
                echo '<li><a href="';
                echo get_option('home');
                echo '">';
                echo 'Home';
                echo "</a></li>";
                if (is_category() || is_single()) {
                        echo '<li>';
                        the_category(' </li><li> ');
                        if (is_single()) {
                                echo "</li><li>";
                                the_title();
                                echo '</li>';
                        }
                } elseif (is_page()) {
                        echo '<li>';
                        echo the_title();
                        echo '</li>';
                }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
        echo '</ul>';
}


// Breadcrumbs
function custom_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';


        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}

function wc_ninja_remove_password_strength() {
	if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
		wp_dequeue_script( 'wc-password-strength-meter' );
	}
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );






add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    li#toplevel_page_yit_plugin_panel, li#toplevel_page_bws_panel {
display:none !important;}
  </style>';
}

function create_post_type_locations() {

        $labels = array(
            'name'               => __('Locations'),
            'singular_name'      => __('Location'),
            'menu_name'          => __('Locations'),
            'parent_item_colon'  => __('Parent Locations:'),
            'all_items'          => __('All Locations'),
            'view_item'          => __('View Location'),
            'add_new_item'       => __('Add New Location'),
            'add_new'            => __('Add New Location'),
            'edit_item'          => __('Edit This Location'),
            'update_item'        => __('Update Location'),
            'search_items'       => __('Search Location'),
            'not_found'          => __('No Location found'),
            'not_found_in_trash' => __('No Location found in Trash'),
        );
        $args   = array(
            'description'         => __('Locations'),
            'labels'              => $labels,
            'supports'            => array('title', 'page-attributes', 'editor', 'thumbnail'),
            'taxonomies'          => array('',''),
            'hierarchical'        => TRUE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-edit',
            'can_export'          => TRUE,
            'has_archive'         => TRUE,
            'exclude_from_search' => FALSE,
            'publicly_queryable'  => TRUE,
            'capability_type'     => 'post',
        );


        register_post_type('locations', $args);
}

// Hook into the 'init' action
add_action('init', 'create_post_type_locations');

// Register Custom Taxonomy
/*
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'States', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'State', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'States', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'states', array( 'locations' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );
*/


add_filter('manage_locations_posts_columns', 'hs_locations_table_head');
function hs_locations_table_head( $columns ) {
    $columns['address']  = 'Address';
	$columns['phone']  = 'Phone';
	$columns['fax']  = 'Fax';
	$columns['email']  = 'Email';
	$columns['google']  = 'Google Plus';
    return $columns;
}
add_action( 'manage_locations_posts_custom_column', 'hs_locations_table_content', 10, 2 );

function hs_locations_table_content( $column_name, $post_id ) {
    if( $column_name == 'address' ) {
        $location = get_post_meta( $post_id, 'address', true );
		$plain_address = get_post_meta( $post_id, 'plain_address', true );
		if (get_field($plain_address))
		echo $plain_address;
		 else {
		$address = explode( "," , $location['address']);
echo $address[0].'<br/>'; //place name
echo $address[1].'<br/>'; // street address
echo $address[2].','.$address[3]; // city, state zip
}
}

if( $column_name == 'phone' ) {
        $phone = get_post_meta( $post_id, 'phone_number', true );
echo '<a href="tel:'.$phone.'">'.$phone.'</a>';
}

if( $column_name == 'fax' ) {
        $fax = get_post_meta( $post_id, 'fax_number', true );
echo '<a href="tel:'.$fax.'">'.$fax.'</a>';
}

if( $column_name == 'email' ) {
        $email = get_post_meta( $post_id, 'email_address', true );
echo '<a href="mailto:'.$email.'">'.$email.'</a>';
}

if( $column_name == 'google' ) {
        $google_plus = get_post_meta( $post_id, 'google_plus', true );
echo '<a href="'.$google_plus.'" target="_blank">'.$google_plus.'</a>';
}
}








if ( ! function_exists( 'yourtheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 * Based on paging nav function from Twenty Fourteen
 */

function yourtheme_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 3,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&laquo;', 'yourtheme' ),
		'next_text' => __( '&raquo;', 'yourtheme' ),
		'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<?php _e( 'Pages:', 'yourtheme' ); ?>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;




// Get URL of first image in a post
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];

// no image found display default image instead
if(empty($first_img)){
$first_img = "";
}
return $first_img;
}





function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAIRZAMZeIRiGwMG8mAX4wuE95njgwyoGk');
}
add_action('acf/init', 'my_acf_init');














add_action('acf/init', 'my_acf_init2');
function my_acf_init2() {
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));


	acf_add_options_sub_page(array(
		'page_title' 	=> 'Map Settings',
		'menu_title'	=> 'Map Settings',
		'parent_slug'	=> 'theme-general-settings',
	));



	acf_add_options_sub_page(array(
		'page_title' 	=> 'Product Video',
		'menu_title'	=> 'Product Video',
		'parent_slug'	=> 'theme-general-settings',
	));


}
}

/*-----------------------------------------------------
 * 				script load
*----------------------------------------------------*/
remove_action( 'wp_enqueue_scripts', 'wpmm_postgrid_scripts' );
remove_action( 'wp_enqueue_scripts', 'wpmm_featuresbox_scripts' );


add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ){
// add your extension to the array
$existing_mimes['vcf'] = 'text/x-vcard'; return $existing_mimes;
}




function is_tree($pid)
{
  global $post;

  $ancestors = get_post_ancestors($post->$pid);
  $root = count($ancestors) - 1;
  $parent = $ancestors[$root];

  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
  {
    return true;
  }
  else
  {
    return false;
  }
};







function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}





add_filter( 'woocommerce_cart_item_name', 'showing_sku_in_cart_items', 99, 3 );
function showing_sku_in_cart_items( $item_name, $cart_item, $cart_item_key  ) {
    // The WC_Product object
    $product = $cart_item['data'];
    // Get the  SKU
    $sku = $product->get_sku();

    // When sku doesn't exist
    if(empty($sku)) return $item_name;

    // Add the sku
    $item_name .= '<br><small class="product-sku">' . __( "SKU: ", "woocommerce") . $sku . '</small>';

    return $item_name;
}


// On cart page
add_action( 'woocommerce_cart_collaterals', 'remove_cart_totals', 9 );
function remove_cart_totals(){
    // Remove cart totals block
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );

    // Add back "Proceed to checkout" button (and hooks)
    echo '<div class="cart_totals">';
    do_action( 'woocommerce_before_cart_totals' );

    echo '<div class="wc-proceed-to-checkout">';
    // do_action( 'woocommerce_proceed_to_checkout' );
    echo '</div>';

    do_action( 'woocommerce_after_cart_totals' );
    echo '</div><br clear="all">';
}

remove_action( 'enqueue_block_assets', 'wp_enqueue_registered_block_scripts_and_styles' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );




add_action( 'woocommerce_before_shop_loop_item_title', 'ladiesfashion_show_product_size_loop', 15 );
function ladiesfashion_show_product_size_loop() {
    global $product;


$terms = wc_get_product_terms( $product->get_id(), 'pa_color');
echo '<div class="colors">';
foreach ( $terms as $term ) {
$image_id = get_term_meta( $term->term_id, 'image', true );
$image_data = wp_get_attachment_image_src( $image_id, 'thumbnail' );
$color = get_field('color_code', 'pa_color'.'_'.$term->term_id);
//echo '<div class="ingredient">';
//echo '<a href="'.get_term_link($term->slug, $term->taxonomy).'">';
//echo '<img src="' . esc_url( $image_data[0] ) . '">';
//echo "<caption>" . $term->name . "</caption>";
//echo '</a>';
//echo '</div>';
 echo '<span style="background:url('.$color.');"></span>';
//background: url(images/king-fireworks.jpg);
}
echo '</div>';
}


add_filter( 'woocommerce_get_price_html', 'custom_price_message' );
function custom_price_message( $price ) {
  $new_price = $price . ' <span class="custom-price-prefix">' . __('&bull; BOGO').'</span>';
  return $new_price;
}


add_action( 'woocommerce_after_shop_loop_item_title', 'avia_add_product_cat', 1);
function avia_add_product_cat()
{
    global $product;
    $product_cats = wp_get_post_terms($product->id, 'product_cat');
$terms = get_the_terms( $post->ID , 'product_cat' );
$first_term = $terms[0];
echo '<span class="category">'.$first_term->name.'</span>';

}

// disable srcset on frontend
function disable_wp_responsive_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');


/* Add the following code in the theme's functions.php and disable any unset function as required */
function remove_default_image_sizes( $sizes ) {

  /* Default WordPress */
  unset( $sizes[ 'thumbnail' ]);       // Remove Thumbnail (150 x 150 hard cropped)
  unset( $sizes[ 'medium' ]);          // Remove Medium resolution (300 x 300 max height 300px)
  unset( $sizes[ 'medium_large' ]);    // Remove Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
  unset( $sizes[ 'large' ]);           // Remove Large resolution (1024 x 1024 max height 1024px)

  /* With WooCommerce */
  unset( $sizes[ 'shop_thumbnail' ]);  // Remove Shop thumbnail (180 x 180 hard cropped)
  unset( $sizes[ 'shop_catalog' ]);    // Remove Shop catalog (300 x 300 hard cropped)
  unset( $sizes[ 'shop_single' ]);     // Shop single (600 x 600 hard cropped)

  return $sizes;
}

add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );


add_action( 'wp_enqueue_scripts', 'crunchify_disable_woocommerce_loading_css_js' );

function crunchify_disable_woocommerce_loading_css_js() {
			wp_dequeue_style('woocommerce-layout');
			wp_dequeue_style('woocommerce-general');
			wp_dequeue_style('woocommerce-smallscreen');

			wp_dequeue_script('wc-cart-fragments');
			wp_dequeue_script('woocommerce');
			wp_dequeue_script('wc-add-to-cart');

			wp_deregister_script( 'js-cookie' );
			wp_dequeue_script( 'js-cookie' );
}





// creat custom post for testimonial
function create_post_type_faqs() {

        $labels = array(
            'name'               => __('Faqs'),
            'singular_name'      => __('Faq'),
            'menu_name'          => __('Faqs'),
            'parent_item_colon'  => __('Parent Faqs:'),
            'all_items'          => __('All Faqs'),
            'view_item'          => __('View Faq'),
            'add_new_item'       => __('Add New Faq'),
            'add_new'            => __('Add New Faq'),
            'edit_item'          => __('Edit Faq'),
            'update_item'        => __('Update Faq'),
            'search_items'       => __('Search Faq'),
            'not_found'          => __('No Faq found'),
            'not_found_in_trash' => __('No Faq found in Trash'),
        );
        $args   = array(
            'description'         => __('faqs'),
            'labels'              => $labels,
            'supports'            => array('title', 'page-attributes', 'editor', 'thumbnail'),
            'taxonomies'          => array(''),
            'hierarchical'        => TRUE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => FALSE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-admin-home',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => FALSE,
            'publicly_queryable'  => TRUE,
            'capability_type'     => 'post',
        );


        register_post_type('faqs', $args);
}

// Hook into the 'init' action
add_action('init', 'create_post_type_faqs');


add_action('wp_footer', function(){
?>
    <div class="hidden d-none">
        <section class="section blog clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 post-content m-left">
                        <div class="clearfix">
                            <?php
                            $args = array(
                                'post_type'      => 'locations',
                                'posts_per_page' => 30,
                                'post_status'    => 'publish',
                                'meta_key'       => 'location_directory',
                                'meta_value'     => 'No'
                            );
                            $query = new WP_Query( $args );
                            $posts = $query->get_posts();
                            $output2 = array();
                            foreach( $posts as $post ) {
                                $location = get_field('address', $post->ID);
                                $email = get_field('email_address', $post->ID);
                                $phone = get_field('phone_number', $post->ID);
                                $fax = get_field('fax_number', $post->ID);
                                $google = get_field('google_plus', $post->ID);
                                $locations = get_field('address', $post->ID);
                                $locations = explode( "," , $locations['address']);

                                $place = $locations[0].''; //place name
                                $street = $locations[1].''; // street address
                                $city = $locations[2].''.$locations[3]; // city, state zip
                                $link = get_the_permalink();
                                $output2[] = array( 'place' => $place, 'street' => $street, 'city' => $city, 'id' =>$post->ID, 'name' =>$post->post_title, 'lat' =>$location['lat'], 'lng' =>$location['lng'],'address' =>$location['address'], 'email' =>$email, 'phone' =>$phone, 'fax' =>$fax, 'category' =>'page','link'=>$link,'web'=>$google);
                            }
                            ?>
                            <script id="listTemplate" type="text/x-handlebars-template">
                            {{#location}}
                            <li data-markerid="{{markerid}}" class="clearfix">
                                <div class="list-label" style="display:none;">{{marker}}</div>
                                <div class="list-details single-result clearfix">
                                    <div class="col-sm-4 nmp text-left">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                            <td valign="top" align="left" width="45"><img src="<?php echo get_template_directory_uri();?>/store/assets/img/crown.png"></td>
                                            <td valign="top" align="left">
                                            <h2>Sky King Of</h2>
                                            <p style="margin-bottom:0;"><strong><a href="{{link}}" style="font-size:21px;" class="title">{{name}}</a></strong><br>
                                            <div class="loc-addr">{{place}}<br>{{street}} {{city}}</div>
                                            {{#if phone}}<div class="loc-phone">Phone: <a href="tel:{{phone}}">{{phone}}</a></div>{{/if}}
                                            {{#if fax}}<div class="loc-fax">Fax: <a href="tel:{{fax}}">{{fax}}</a></div>{{/if}}
                                            {{#if email}}<div class="loc-email">Email: <a href="mailto:{{email}}">{{email}}</a></div>{{/if}}
                                            {{#if web}}Find us on <a href="{{web}}" target="_blank">Google Plus</a></td>{{/if}}
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <div class="col-sm-4 nmp text-left">
                                <h2>Distance</h2>

                                {{#if distance}}
                                            <div class="loc-dist">
                                            {{distance}} {{length}}
                                            <p style="margin-bottom:0;color:#ffb400;">Show on Map</p>
                                            </div>
                                            <div class="loc-directions"><a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
                                        {{/if}}
                                        </div>
                                <div class="col-sm-4 nmp text-left">
                                <h2>Details</h2>
                                <div class="loc-link"><a href="{{link}}">View this location</a></div>
                                </div>

                                    <div class="list-content hidden">
                                        <div class="loc-name">{{name}}</div>
                                        <div class="loc-addr">{{address}}</div>
                                        <div class="loc-addr2">{{address2}}</div>
                                        <div class="loc-addr3">{{city}}{{#if city}},{{/if}} {{state}} {{postal}}</div>
                                        <div class="loc-phone">Phone: <a href="tel:{{phone}}">{{phone}}</a></div>
                                        <div class="loc-fax">Fax: <a href="mailto:{{fax}}">{{fax}}</a></div>
                                        <div class="loc-email">Email: <a href="mailto:{{email}}">{{email}}</a></div>
                                        <div class="loc-link"><a href="{{link}}">More Details</a></div>
                                        <div class="loc-webs"><a href="{{web}}" target="_blank">{{web}}</a></div>
                                        {{#if distance}}
                                            <div class="loc-dist">{{distance}} {{length}}</div>
                                            <div class="loc-directions"><a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
                                        {{/if}}
                                    </div>
                                </div>
                            </li>
                            <option value="{{name}}">{{name}} {{distance}} {{length}}</option>
                            {{/location}}
                            </script>
                            <script id="infowindowTemplate" type="text/x-handlebars-template">
                            {{#location}}
                                <div class="list-details">
                                    <div class="list-content">
                                        <p style="margin-bottom:0;"><strong><a href="{{link}}" style="font-size:21px;" class="title">Skyking of {{name}}</a></strong><br>
                                        <div class="loc-addr">{{place}}<br>{{street}} {{city}}</div>
                                        {{#if phone}}<div class="loc-phone">Phone: <a href="tel:{{phone}}">{{phone}}</a></div>{{/if}}
                                        {{#if fax}}<div class="loc-fax">Fax: <a href="tel:{{fax}}">{{fax}}</a></div>{{/if}}
                                        {{#if email}}<div class="loc-email">Email: <a href="mailto:{{email}}">{{email}}</a></div>{{/if}}
                                        {{#if web}}Find us on <a href="{{web}}" target="_blank">Google Plus</a></td>{{/if}}
                                        {{#if distance}}
                                            <div class="loc-dist">Distance: {{distance}} {{length}}</div>
                                            <div class="loc-directions">Directions: <a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
                                        {{/if}}
                                        <div class="loc-link">Details: <a href="{{link}}">View this location</a></div>
                                    </div>
                            {{/location}}
                            </script>
                            <div class="bh-sl-container locator-form">
                                <div id="page-header">
                                    <h1 class="bh-sl-title hidden">20 LOCATIONS ACROSS FLORIDA, GEORGIA, PENNSYLVANIA & INDIANA</h1>
                                            <h2 class="bh-sl-title">Find a store</h2>
                                </div>

                                <div class="bh-sl-form-container simple-locator-form">
                                    <form id="bh-sl-user-location" method="post" action="#">
                                        <div class="form-input address-input form-field">
                                            <input type="text" id="bh-sl-address" name="bh-sl-address" placeholder="Enter a city and state or postal code" autocomplete="off" />
                                        </div>
                                        <select id="bh-sl-maxdistance" name="bh-sl-maxdistance">
                                            <option value="10000" selected="selected">10000 Miles</option>
                                        </select>
                                        <div class="submit">
                                        <button id="bh-sl-submit" type="submit">Find a store</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="bh-sl-map-container" class="bh-sl-map-container">
                                    <div id="bh-sl-map" class="bh-sl-map"></div>
                                    <div class="bh-sl-loc-list">
                                        <ul class="list"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        (function($) {
            $('#bh-sl-address').val('');
            $('#bh-sl-map-container').storeLocator({
                'mapSettings' : {
                    zoom :12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControl:true,
                    disableDoubleClickZoom:false,
                    scaleControl:true,
                    scrollwheel:true,
                    navigationControl: false,
                    draggable:true
                },
                'distanceAlert':500,
                callbackListClick: function(){
                 $('html, body').animate({scrollTop:$("#bh-sl-map-container").offset().top - 80}, 800);
                },
                'inlineDirections':false,
                'dataType': 'json',
                'dataRaw': <?php echo json_encode($output2); ?>,
                'querystringParams' : true,
                'listTemplateID': 'listTemplate',
                'infowindowTemplateID': 'infowindowTemplate',
                'slideMap' : false,
                'modal' :false,
                'maxDistance':true,
                'defaultLoc':false,
                'defaultLat': '44.9207462',
                'defaultLng' : '-93.3935366',
                'autoGeocode':false,
                'catMarkers' : {
                    'page': ['<?php echo the_field('map_crown', 'option');?>', 69, 86],
                }
            });
            // footer form type
            $(document).on('keyup', '#ftzip', function() {
                var leng = $(this).val().length;
                if(leng > 4) {
                    $('input#bh-sl-address').val($(this).val());
                    $('form#bh-sl-user-location').submit();
                    $("#ftziplocation").addClass("loading").find('option').remove();
                    setTimeout(function() {
                        $(".hidden.d-none ul.list option:lt(5)").each(function(i) {
                            $(this).clone().appendTo("#ftziplocation");
                            // location page changes
                            if( $('body').hasClass('post-type-archive') ){
                                $('#ftziplocation option').map(function(index, elem) {
                                    $(elem).removeClass('hide');
                                });
                            }
                        });
                    },2000);
                }
            });
        }(jQuery));
    </script>
    <style type="text/css">
        .hide {display: none; }
    </style>
<?php
}, 11);

// filter to update the subscriber tags
add_filter( 'mc4wp_subscriber_data', function(MC4WP_MailChimp_Subscriber $subscriber) {
    $title = $subscriber->merge_fields['STORE'];
    if( empty($title) ){
        return $subscriber;
    }
    $args = array(
        'post_type'      => 'locations',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'meta_key'       => 'location_directory',
        'meta_value'     => 'No',
        "s"              => $title
    );
    $query    = new WP_Query( $args );
    $posts    = $query->get_posts();
    $location = get_field('address', $posts[0]->ID);
    $address  = $location['address'];
    if( empty( $address ) ){
        return $subscriber;
    }
	
	$locations = explode( "," , $address);
	$statewdzip = $locations[2]; 
	$states = explode(" ", $statewdzip);
	$city = $locations[1].', '.$states[1]; // city, state 
    $subscriber->tags[] = $city;
    return $subscriber;
},100 , 1);
