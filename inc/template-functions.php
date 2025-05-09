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


/**
 * Remove <span class="wpcf7-form-control-wrap"> from Contact Form 7 output.
 *
 * @param string $content The form HTML.
 * @return string Modified form HTML without span wrappers.
 */
function remove_cf7_control_wrap_spans( $content ) {
	// Remove opening span tag with class wpcf7-form-control-wrap
	$content = preg_replace( '/<span class="wpcf7-form-control-wrap[^"]*">/', '', $content );

	// Remove closing span tags
	$content = str_replace( '</span>', '', $content );

	return $content;
}
add_filter( 'wpcf7_form_elements', 'remove_cf7_control_wrap_spans' );

add_filter( 'wpcf7_autop_or_not', '__return_false' );


/**
 * Register Custom Post Type: Our Solutions
 */
function essar_register_our_solutions_post_type() {
	register_post_type(
		'our_solutions',
		array(
			'labels'             => array(
				'name'               => __( 'Our Solutions', 'essar' ),
				'singular_name'      => __( 'Solution', 'essar' ),
				'add_new'            => __( 'Add New', 'essar' ),
				'add_new_item'       => __( 'Add New Solution', 'essar' ),
				'edit_item'          => __( 'Edit Solution', 'essar' ),
				'new_item'           => __( 'New Solution', 'essar' ),
				'view_item'          => __( 'View Solution', 'essar' ),
				'search_items'       => __( 'Search Solutions', 'essar' ),
				'not_found'          => __( 'No Solutions found', 'essar' ),
				'not_found_in_trash' => __( 'No Solutions found in Trash', 'essar' ),
			),
			'public'             => true,
			'show_in_menu'       => true,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-lightbulb',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'        => true,
			'rewrite'            => array( 'slug' => 'our-solutions' ),
			'show_in_rest'       => true,
		)
	);
}
add_action( 'init', 'essar_register_our_solutions_post_type' );


/**
 * Enqueue JS only on single Our Solutions posts.
 */
function essar_enqueue_our_solutions_js() {
	if ( is_singular( 'our_solutions' ) ) {
		wp_enqueue_script(
			'our-solutions-custom-js',
			get_template_directory_uri() . '/js/our_solutions.js',
			array( 'jquery' ),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'essar_enqueue_our_solutions_js' );

/**
 * Add custom body classes for Our Solutions post type.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function essar_add_our_solutions_body_class( $classes ) {
	if ( is_singular( 'our_solutions' ) ) {
		$classes[] = 'saf_page';
	}
	return $classes;
}
add_filter( 'body_class', 'essar_add_our_solutions_body_class' );

/**
 * Add custom body class for 'industries' slug.
 */
add_filter( 'body_class', 'essar_add_custom_body_class_for_industries' );

if ( ! function_exists( 'essar_add_custom_body_class_for_industries' ) ) {
	/**
	 * Adds 'saf_page' and 'solution_page' classes to body if slug is 'industries'.
	 *
	 * @param array $classes Existing body classes.
	 * @return array Modified body classes.
	 */
	function essar_add_custom_body_class_for_industries( $classes ) {
		if ( is_singular() ) {
			global $post;
			if ( isset( $post->post_name ) && 'industries' === $post->post_name || 'geographies' === $post->post_name  ) {
				$classes[] = 'saf_page';
				$classes[] = 'solution_page';
			}
		}
		return $classes;
	}
}

/**
 * Enqueue JS on specific page slug.
 */
function enqueue_industries_js() {
	if ( is_page() ) {
		global $post;
		if ( isset( $post->post_name ) && 'industries' === $post->post_name ) {
			wp_enqueue_script(
				'industries-custom-js',
				get_template_directory_uri() . '/js/industries.js',
				array(),
				'1.0.0',
				true
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_industries_js' );

/**
 * Enqueue custom script for 'geographies' page.
 */
function enqueue_geographies_script() {
	if ( is_page( 'geographies' ) ) {
		wp_enqueue_script(
			'custom-geographies-script',
			get_template_directory_uri() . '/js/geographies.js',
			array(),
			null,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_geographies_script' );