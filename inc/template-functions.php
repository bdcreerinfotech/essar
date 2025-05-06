<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package essar
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function essar_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'essar_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function essar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'essar_pingback_header' );

/**
 * Register footer menus.
 */
function essar_register_menus() {
    register_nav_menus(
        array(
            'top-footer-menu'    => __( 'Top Footer Menu', 'essar' ),
            'solutions-menu'     => __( 'Solutions Menu', 'essar' ),
            'markets-menu'       => __( 'Markets Menu', 'essar' ),
            'news-room-menu'  => __( 'Newsroom Menu', 'essar' ),
			'contact-us-menu'  => __( 'Contact Us Menu', 'essar' ),
            'social-menu'  => __( 'Social Menu', 'essar' ),
        )
    );
}
add_action( 'init', 'essar_register_menus' );

/**
 * Add custom class to body for specific page.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function add_custom_body_class_for_about_us( $classes ) {
	if ( is_page( 'about-us' )) {
		$classes[] = 'saf_page';
	}
	return $classes;
}
add_filter( 'body_class', 'add_custom_body_class_for_about_us' );


/**
 * Add custom class to body for specific page.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function add_custom_body_class_for_contact_us( $classes ) {
	if (  is_page( 'contact-us' )) {
		$classes[] = 'saf_page solution_page';
	}
	return $classes;
}
add_filter( 'body_class', 'add_custom_body_class_for_contact_us' );


/**
 * Conditionally enqueue homepage animation script.
 */
function enqueue_custom_homepage_script() {
	if ( is_front_page() ) {
		wp_enqueue_script(
			'custom-home-animation',
			get_template_directory_uri() . '/js/custom_script.js',
			array( 'jquery' ),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_homepage_script' );


/**
 * Enqueue 'about-us' page animation script.
 */
function enqueue_about_us_script_file() {
	if ( is_page( 'about-us' ) ) {
		wp_enqueue_script(
			'about-us-animation',
			get_template_directory_uri() . '/js/about-us.js',
			array(),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_about_us_script_file' );

/**
 * Register custom post type: Team.
 */
function essar_register_team_cpt() {
	register_post_type(
		'team',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Team', 'essar' ),
				'singular_name' => esc_html__( 'Team Member', 'essar' ),
			),
			'public'       => true,
			'menu_icon'    => 'dashicons-groups',
			'supports'     => array( 'title', 'thumbnail', 'editor' ),
			'has_archive'  => false,
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'essar_register_team_cpt' );
