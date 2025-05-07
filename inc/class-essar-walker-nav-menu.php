<?php
/**
 * Custom Walker Nav Menu Class for Essar Theme.
 */

if ( ! class_exists( 'Essar_Walker_Nav_Menu' ) ) {

	/**
	 * Extends Walker_Nav_Menu to customize menu output.
	 */
	class Essar_Walker_Nav_Menu extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added.
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments. @see wp_nav_menu()
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent        = str_repeat( "\t", $depth );
			$submenu_class = ( 0 === $depth ) ? 'htmlCss-sub-menu sub-menu' : 'js-sub-menu sub-menu';
			$output       .= "\n" . $indent . '<ul class="' . esc_attr( $submenu_class ) . '">' . "\n";
		}

		/**
		 * Starts the element output.
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item.
		 * @param array  $args   An array of arguments. @see wp_nav_menu()
		 * @param int    $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
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

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			// Get arrow icon for top-level parents.
			$arrow_icon = '';
			if ( 0 === $depth && in_array( 'menu-item-has-children', $classes, true ) ) {
				if ( stripos( $title, 'Solutions' ) !== false ) {
					$arrow_icon = ' <i class="bx arrow htmlcss-arrow"></i>';
				} elseif ( stripos( $title, 'Markets' ) !== false ) {
					$arrow_icon = ' <i class="bx arrow js-arrow"></i>';
				} else {
					$arrow_icon = ' <i class="bx arrow"></i>';
				}
			}

			// Get image from ACF for submenu items.
			$image_html = '';
			if ( $depth > 0 && function_exists( 'get_field' ) ) {
				$image_url = get_field( 'menu_item_icon', $item );
				if ( $image_url ) {
					$image_src  = wp_get_attachment_image_url( $image_url, 'full' );
					$image_html = '<span class="SM_img"><img src="' . esc_url( $image_src ) . '" alt="" /></span>';
				}
			}

			// Construct final menu item output.
			$item_output  = '<a' . $attributes . '>';

			if ( 0 === $depth ) {
				$item_output .= esc_html( $title ) . $arrow_icon;
			} else {
				$item_output .= $image_html;
				$item_output .= '<span class="SM_txt">' . esc_html( $title ) . '</span>';
			}

			$item_output .= '</a>';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}
