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