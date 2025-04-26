<?php
/**
 * Custom walker for the Essar theme menu.
 *
 * @package Essar
 */

if ( ! class_exists( 'Essar_Walker_Nav_Menu' ) ) {

	/**
	 * Essar Walker Nav Menu Class.
	 */
	class Essar_Walker_Nav_Menu extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added.
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param object $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );

			// Add custom submenu classes based on depth.
			$submenu_class = ( 0 === $depth ) ? 'htmlCss-sub-menu sub-menu' : 'js-sub-menu sub-menu';

			$output .= "\n{$indent}<ul class=\"" . esc_attr( $submenu_class ) . "\">\n";
		}

		/**
		 * Starts the element output.
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param object $args   An object of wp_nav_menu() arguments.
		 * @param int    $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', array_filter( $classes ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$output .= $indent . '<li' . $class_names . '>';

			$atts = array(
				'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
				'target' => ! empty( $item->target ) ? $item->target : '',
				'rel'    => ! empty( $item->xfn ) ? $item->xfn : '',
				'href'   => ! empty( $item->url ) ? $item->url : '',
			);

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			// Add arrow icon if item has children.
			$title = apply_filters( 'the_title', $item->title, $item->ID );
			if ( in_array( 'menu-item-has-children', $classes, true ) ) {
				$title .= ' <i class="bx arrow"></i>';
			}

			// Safely handle $args: It may be object or array.
			$before      = ( is_object( $args ) && isset( $args->before ) ) ? $args->before : '';
			$link_before = ( is_object( $args ) && isset( $args->link_before ) ) ? $args->link_before : '';
			$link_after  = ( is_object( $args ) && isset( $args->link_after ) ) ? $args->link_after : '';
			$after       = ( is_object( $args ) && isset( $args->after ) ) ? $args->after : '';

			$item_output  = $before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $link_before . $title . $link_after;
			$item_output .= '</a>';
			$item_output .= $after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}
