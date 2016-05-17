<?php
/**
 * Barrier Reef Orchestra functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Barrier_Reef_Orchestra
 */

if ( ! function_exists( 'barrier_reef_orchestra_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function barrier_reef_orchestra_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Barrier Reef Orchestra, use a find and replace
	 * to change 'barrier-reef-orchestra' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'barrier-reef-orchestra', get_template_directory() . '/languages' );

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
        set_post_thumbnail_size(980, 720, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'barrier-reef-orchestra' ),
                
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'barrier_reef_orchestra_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'barrier_reef_orchestra_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function barrier_reef_orchestra_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'barrier_reef_orchestra_content_width', 640 );
}
add_action( 'after_setup_theme', 'barrier_reef_orchestra_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function barrier_reef_orchestra_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'barrier-reef-orchestra' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'barrier-reef-orchestra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'barrier_reef_orchestra_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function barrier_reef_orchestra_scripts() {
	wp_enqueue_style( 'barrier-reef-orchestra-style', get_stylesheet_uri() );
        
        //Add Google Fonts
        wp_enqueue_style('barrier-reef-orchestra-google-fonts','https://fonts.googleapis.com/css?family=Pontano+Sans|Merriweather+Sans:400,700,700italic');
        
        //Add Font Awesome
        wp_enqueue_style('barrier-reef-orchestra-fontawesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');
        
	wp_enqueue_script( 'barrier-reef-orchestra-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
        wp_localize_script( 'barrier-reef-orchestra-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'barrier-reef-orchestra' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'barrier-reef-orchestra') . '</span>',
	) );
        
	wp_enqueue_script( 'barrier-reef-orchestra-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'barrier_reef_orchestra_scripts' );

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
