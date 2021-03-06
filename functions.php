<?php
/**
 * Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio
 */

if ( ! function_exists( 'portfolio_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function portfolio_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Portfolio, use a find and replace
		 * to change 'portfolio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'portfolio' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'portfolio_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'portfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'portfolio_widgets_init' );

/**
 * Enqueue WordPress jQuery in footer.
 */
function portfolio_enqueue_jquery_in_footer( &$scripts ) {
	if ( ! is_admin() ) {
		$scripts->add_data( 'jquery', 'group', 1 );
		$scripts->add_data( 'jquery-core', 'group', 1 );
		$scripts->add_data( 'jquery-migrate', 'group', 1 );
	}
}
add_action( 'wp_default_scripts', 'portfolio_enqueue_jquery_in_footer' );

/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {

	// Enqueue nav styles
	wp_enqueue_style( 'portfolio-styles-nav',  get_template_directory_uri() . '/assets/css/portfolio-styles-nav.min.css' );

	// Enqueue WordPress styles
	wp_enqueue_style( 'portfolio-styles', get_template_directory_uri() . '/style.min.css' );

	// Enqueue Slick styles
	wp_enqueue_style( 'portfolio-styles-slick', get_template_directory_uri() . '/assets/css/slick.css' );

	// Enqueue custom styles
	wp_enqueue_style( 'portfolio-styles-custom', get_template_directory_uri() . '/assets/css/portfolio-styles.min.css' );

	// Enqueue grid styles (Bootstrap)
	wp_enqueue_style( 'portfolio-styles-grid', get_template_directory_uri() . '/assets/css/portfolio-styles-grid.min.css' );

	// Enqueue icon styles (Font-awesome)
	wp_enqueue_style( 'portfolio-styles-icon', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	// Enqueue image pop-up styles (Magnific)
	wp_enqueue_style( 'portfolio-styles-magnific', get_template_directory_uri() . '/assets/css/magnific-popup.min.css' );

	// Enqueue responsive nav script
	if ( is_front_page() ) {
		wp_enqueue_script( 'portfolio-responsive-nav', get_template_directory_uri() . '/assets/js/responsive-nav.min.js', array(), null, true );
	}

	// Enqueue slick script
	wp_enqueue_script( 'portfolio-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), null, true );

	// Enqueue fastclick script
	wp_enqueue_script( 'portfolio-fastclick', get_template_directory_uri() . '/assets/js/fastclick.min.js', array(), null, true );

	// Enqueue scroll script
	wp_enqueue_script( 'portfolio-scroll', 'https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0/dist/smooth-scroll.polyfills.min.js', array(), null, true );

	// Enqueue image pop-up scripts (Magnific)
	wp_enqueue_script( 'portfolio-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), null, true );

	// Enqueue fixed responsive nav script
	if ( is_front_page() ) {
		wp_enqueue_script( 'portfolio-fixed-responsive-nav', get_template_directory_uri() . '/assets/js/fixed-responsive-nav.min.js', array(), null, true );
	}

	// Enqueue modal scripts (Bootstrap)
	wp_enqueue_script( 'portfolio-modal', get_template_directory_uri() . '/assets/js/modal.min.js', array( 'jquery' ), null, true );

	// Enqueue custom scripts
	$ajax_url = admin_url( 'admin-ajax.php' );
	wp_enqueue_script( 'portfolio-scripts', get_template_directory_uri() . '/assets/js/portfolio-scripts.min.js', array( 'jquery' ), null, true );
	wp_localize_script( 'portfolio-scripts', 'ajaxUrl', $ajax_url );

	wp_enqueue_script( 'portfolio-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom Plugin
 */

/**
 * Set Data-toggle Attribute on Nav Items.
 */
add_filter( 'nav_menu_link_attributes', 'add_smooth_scroll_attribute', 10, 3 );
function add_smooth_scroll_attribute( $atts, $item, $arg ) {
	$atts['data-scroll'] = true;
	return $atts;
}

/**
 * Create Settings Page - via ACF.
 */

//
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title'    => 'Portfolio Settings',
			'menu_title'    => 'Portfolio Settings',
			'menu_slug'     => 'portfolio-settings',
			'parent_slug'   => 'options-general.php',
			'capavility'    => 'manage_options',
			'redirect'      => 'false',
		)
	);
}

/**
 * Link Form Submission to Form Handler
 */
add_action( 'admin_post_portfolio_trigger_form_handler', 'portfolio_trigger_form_handler' );
add_action( 'admin_post_nopriv_portfolio_trigger_form_handler', 'portfolio_trigger_form_handler' );
add_action( 'wp_ajax_portfolio_trigger_form_handler', 'portfolio_trigger_form_handler' );
add_action( 'wp_ajax_nopriv_portfolio_trigger_form_handler', 'portfolio_trigger_form_handler' );
function portfolio_trigger_form_handler() {

	// Require form handler
	require 'footer-contact-form-handler.php';
	wp_die();

}

/**
 * Alter Images Post Type Query
 */
add_action( 'pre_get_posts', 'portfolio_alter_images_query' );
function portfolio_alter_images_query( $query ) {
	if ( is_admin() ) {
		return;
	}

	if ( ! $query->is_main_query() ) {
		return;
	}

	if ( is_post_type_archive( 'pp_images' ) ) {
		$query->set( 'posts_per_page', 50 );
		return;
	}
}

/**
 * 
 */
add_filter( 'getarchives_where', 'modify_getarchives_where', 10, 2 );
function modify_getarchives_where( $where, $args ) {
	if ( isset( $args['post_type'] ) ) {
		$where = "WHERE post_type = '$args[post_type]' AND post_status = 'publish'";
	}

	return $where;
} 

add_filter( 'generate_rewrite_rules', 'generate_pp_images_rewrite_rules' );
function generate_pp_images_rewrite_rules( $wp_rewrite ) {
	$pp_images_rules = array(
		'art/?$' => 'index.php?post_type=pp_images',
		'art/([0-9]{4})/?$' => 'index.php?post_type=pp_images&year=$matches[1]',
		'art/([0-9]{4})/page/([0-9])/?$' => 'index.php?post_type=pp_images&year=$matches[1]&paged=$matches[2]',
	);

	$wp_rewrite->rules = $pp_images_rules + $wp_rewrite->rules;
}

add_filter( 'get_archives_link', 'modify_pp_images_archives_link', 10, 2 );
function modify_pp_images_archives_link( $link_url ) {
	global $post;

	if ( $post->post_type !== 'pp_images' ) {
		var_dump( 'foo' );
		return;
	}

	return preg_replace( '/notes\/([0-9]{4})\/\?post_type=pp_images\/?/', 'art/${1}/', $link_url );
}