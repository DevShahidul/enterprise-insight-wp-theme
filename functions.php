<?php
/**
 * enterprise-insight functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package enterprise-insight
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function enterprise_insight_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on enterprise-insight, use a find and replace
		* to change 'enterprise-insight' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'enterprise-insight', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'enterprise-insight' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'enterprise_insight_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'enterprise_insight_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function enterprise_insight_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'enterprise_insight_content_width', 640 );
}
add_action( 'after_setup_theme', 'enterprise_insight_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function enterprise_insight_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'enterprise-insight' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'enterprise-insight' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'enterprise_insight_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function enterprise_insight_scripts() {
	wp_enqueue_style( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' ); // Slick slider css
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), null ); // Google fonts css
	wp_enqueue_style( 'bootstrap-grid-only', 'https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css', array(), '1.0.0' ); // Bootstrap grid css
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css', array(), null ); // Main theme css

	wp_enqueue_style( 'enterprise-insight-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'enterprise-insight-style', 'rtl', 'replace' );

	wp_enqueue_script( 'enterprise-insight-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sweetalert-script', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js', array(), '2.1.2', true ); // sweetalert script
	wp_enqueue_script( 'jquery-cdn', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true ); // jQuery cdn
	wp_enqueue_script( 'formatphonenumber', get_template_directory_uri() .'/assets/libs/jquery.formatphonenumber.js', array('jquery-cdn'), null, true ); // formatphonenumber
	wp_enqueue_script( 'slick-slider', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery-cdn'), '1.8.1', true ); // slick-slider
	wp_enqueue_script( 'main-script', get_template_directory_uri() .'/js/main.js', array('jquery-cdn'), null, true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'enterprise_insight_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );
// define( 'MY_ACF_JSON_PATH', get_stylesheet_directory() . '/includes/acf-json' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }

// Exporting ACF Fields (via JSON sync)
add_filter('acf/settings/save_json', 'set_acf_json_save_folder');
function set_acf_json_save_folder( $path ) {
    $path = dirname(__FILE__) . '/includes/acf-json';
    return $path;
}
add_filter('acf/settings/load_json', 'add_acf_json_load_folder');
function add_acf_json_load_folder( $paths ) {
    unset($paths[0]);
    $paths[] = dirname(__FILE__) . '/includes/acf-json';
    return $paths;
}

// Automatting the SYNC Process ACF fields
function article_gamification_sync_acf_fields() {
    // vars
    $groups = acf_get_field_groups();
    $sync   = array();
    // bail early if no field groups
    if( empty( $groups ) )
        return;
    // find JSON field groups which have not yet been imported
    foreach( $groups as $group ) {

        // vars
        $local      = acf_maybe_get( $group, 'local', false );
        $modified   = acf_maybe_get( $group, 'modified', 0 );
        $private    = acf_maybe_get( $group, 'private', false );
        // ignore DB / PHP / private field groups
        if( $local !== 'json' || $private ) {

            // do nothing

        } elseif( ! $group[ 'ID' ] ) {

            $sync[ $group[ 'key' ] ] = $group;

        } elseif( $modified && $modified > get_post_modified_time( 'U', true, $group[ 'ID' ], true ) ) {

            $sync[ $group[ 'key' ] ]  = $group;
        }
    }
    // bail if no sync needed
    if( empty( $sync ) )
        return;
    if( ! empty( $sync ) ) { //if( ! empty( $keys ) ) {

        // vars
        $new_ids = array();

        foreach( $sync as $key => $v ) { //foreach( $keys as $key ) {

            // append fields
            if( acf_have_local_fields( $key ) ) {

                $sync[ $key ][ 'fields' ] = acf_get_local_fields( $key );

            }
            // import
            $field_group = acf_import_field_group( $sync[ $key ] );
        }
    }
}
add_action( 'admin_init', 'article_gamification_sync_acf_fields' );

// Create options page with acf
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
	
}
