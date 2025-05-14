<?php
/**
 * Essar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package essar
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function essar_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'essar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'essar' ),
		)
	);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
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
			'essar_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for core custom logo.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size( 'custom-thumb-340x200', 340, 200, true );
	
}
add_action( 'after_setup_theme', 'essar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function essar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'essar_content_width', 640 );
}
add_action( 'after_setup_theme', 'essar_content_width', 0 );

/**
 * Register widget area.
 */
function essar_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'essar' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'essar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'essar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function essar_scripts() {
	wp_enqueue_style( 'essar-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'essar-font', get_template_directory_uri() . '/css/font.css', array(), _S_VERSION );
	wp_enqueue_style( 'essar-menu', get_template_directory_uri() . '/css/menu.css', array(), _S_VERSION );
	wp_enqueue_style( 'essar-custom', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'essar-responsive', get_template_directory_uri() . '/css/responsive.css', array(), _S_VERSION );
	wp_enqueue_style( 'essar-boxicons', 'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css', array(), '2.0.7' );
	wp_enqueue_style( 'essar-accordion', get_template_directory_uri() . '/css/accordion.css', array(), _S_VERSION );
	wp_enqueue_style( 'essar-easy-responsive-tabs', get_template_directory_uri() . '/css/easy-responsive-tabs.css', array(), _S_VERSION );
	wp_enqueue_style( 'essar-aos-css', get_template_directory_uri() . '/css/aos.css', array(), _S_VERSION );
	wp_enqueue_style( 'essar-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;600;700;800&display=swap', array(), null );

	wp_enqueue_script( 'essar-jquery-latest', get_template_directory_uri() . '/js/jquery-latest.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'essar-menu', get_template_directory_uri() . '/js/menu.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'essar-parallax', get_template_directory_uri() . '/js/parallax.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'essar-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'essar-accordion', get_template_directory_uri() . '/js/accordion.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'essar-aos', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true );

	// GSAP plugins and animations.
	wp_enqueue_script( 'gsap-scrollto', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollToPlugin.min.js', array(), '3.12.7', true );
	wp_enqueue_script( 'gsap-text', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/TextPlugin.min.js', array(), '3.12.7', true );
	wp_enqueue_script( 'gsap-easepack', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/EasePack.min.js', array(), '3.12.7', true );
	wp_enqueue_script( 'gsap-tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js', array(), '1.20.2', true );
	wp_enqueue_script( 'gsap-core', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array(), '3.12.2', true );

	// Lenis Smooth Scroll.
	wp_enqueue_script( 'lenis', 'https://unpkg.com/lenis@1.2.3/dist/lenis.min.js', array(), '1.2.3', true );

	//wp_enqueue_script( 'essar-navigation', get_template_directory_uri() . '/js/custom_script.js', array(), _S_VERSION, true );
	//wp_enqueue_script( 'about-us-script', get_template_directory_uri() . '/js/about-us.js', array(), _S_VERSION, true );

	// Enable threaded comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'essar_scripts' );

/**
 * Include additional files.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/class-essar-walker-nav-menu.php';
require get_template_directory() . '/inc/class-social-walker.php';
