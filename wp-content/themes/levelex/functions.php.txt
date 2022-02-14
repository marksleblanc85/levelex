<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support( 'post-thumbnails', array('post','page', 'tribe_events') );
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('square', 300, 300, false); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation

function html5blank_nav_full()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => 'Main Menu',
        'menu_id'         => '3'
        )
    );
}

function html5blank_nav_left()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu-left',
		'menu'            => 'Main Menu Left',
		'menu_id'         => '2'
		)
	);
}
function html5blank_nav_right()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu-right',
        'menu'            => 'Main Menu Right',
        'menu_id'         => '3'
        )
    );
}
class Wdm_Custom_Nav_Walker extends Walker_Nav_Menu {
public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
/* -Wdm changes- */
//Getting post id of current page
    $wdm_postid    = url_to_postid( $item->url );
//$have_children var keeps record of the children of the current page
    $have_children    = false;
//wdm_has_children() function is a function I've written in functions.php, that checks the children of a post from its post id.
    if ( wdm_has_children( $wdm_postid ) ) {
       $have_children = true;
    }
//If the current page has a child, I assign my own CSS class- wdm-has-child.
    if ( $have_children ) {
       $classes[] = 'wdm-has-child menu-item-' . $item->ID;
    } else {
       $classes[] = 'menu-item-' . $item->ID;
    }
    /* -End of Wdm changes- */
    $class_names    = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names    = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id    = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
    $id    = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    $output .= $indent . '<li' . $id . $class_names . '>';
    $atts            = array();
    $atts[ 'title' ]    = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts[ 'target' ]    = ! empty( $item->target ) ? $item->target : '';
    $atts[ 'rel' ]        = ! empty( $item->xfn ) ? $item->xfn : '';
    $page_name = apply_filters( 'the_title', $item->title, $item->ID );
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
       if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
       }
    }
/* -Wdm changes- */
//Bootstrap icons - right arrow and down arrow.
    $wdm_right_arrow = ' <span class="glyphicon glyphicon-chevron-right"></span>';
    $wdm_down_arrow = ' <span class="glyphicon glyphicon-chevron-down"></span>';
/* -End of Wdm changes- */
    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    /** This filter is documented in wp-includes/post-template.php */
    /* -Wdm changes- */
    if( $have_children && 'Home' != $page_name ) {
//If the page title is Architectural, I assign to it a right arrow.
       if( 'Architectural' == $page_name ) {
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $wdm_right_arrow . $args->link_after;
       }else{
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $wdm_down_arrow .$args->link_after;
       }
    }else{
       $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    }
    /* -End of Wdm changes- */
    $item_output .= '</a>';
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
   }
public function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
   }
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');
        wp_enqueue_script('conditionizr'); 

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1');
        wp_enqueue_script('modernizr'); 

        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');

        wp_register_script('jquery', '//code.jquery.com/jquery-1.11.0.min.js', array(), '1.11.1');
        wp_enqueue_script('jquery'); 

        wp_register_script('jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), '1.2.1');
        wp_enqueue_script('jquery-migrate'); 

        wp_register_script('slickslider', get_template_directory_uri() . '/js/lib/slick.js', array('jquery'), '1.4');
        wp_enqueue_script('slickslider'); 

        wp_register_script('customscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); 
        wp_enqueue_script('customscripts'); 
    }
}

function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); 
        wp_enqueue_script('scriptname'); 
    }
}
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); 

    wp_register_style('slick', get_template_directory_uri() . '/css/slick.css', array(), '5.6.3', 'all');
    wp_enqueue_style('slick');

    wp_register_style('slicktheme', get_template_directory_uri() . '/css/slick-theme.css', array(), '5.6.3', 'all');
    wp_enqueue_style('slicktheme');

    wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), '5.6.3', 'all');
    wp_enqueue_style('fontawesome');

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); 
   
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu-left' => __('Header Menu Left', 'html5blank'), // Main Navigation
        'header-menu-right' => __('Header Menu Right', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.


// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

function remove_menus(){

    remove_menu_page( 'index.php' );                 
    remove_menu_page( 'jetpack' );                                                     
    remove_menu_page( 'edit-comments.php' );            
  
}
add_action( 'admin_menu', 'remove_menus' );

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/
// Register Custom Post Type
function post_type_careers() {

    $labels = array(
        'name'                  => _x( 'Job Listings', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Job Listing', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Careers', 'text_domain' ),
        'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
        'archives'              => __( 'Job Archives', 'text_domain' ),
        'attributes'            => __( 'Job Attributes', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Job Listing', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array( 'career-categories' ),
        'menu_icon'           => 'dashicons-businessman',
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'careers', $args );

}
add_action( 'init', 'post_type_careers', 0 );

function careers_taxonomy() {  
    register_taxonomy(  
        'career-categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'careers',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Job Types',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'jobs', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'careers_taxonomy');

function post_type_team() {

    $labels = array(
        'name'                  => _x( 'Team', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Team', 'text_domain' ),
        'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
        'archives'              => __( 'Team Members', 'text_domain' ),
        'attributes'            => __( 'Team Attributes', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Team Member', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'menu_icon'           => 'dashicons-groups',
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'team', $args );

}
add_action( 'init', 'post_type_team', 1 );

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}




?>
