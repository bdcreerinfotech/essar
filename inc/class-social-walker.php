<?php
/**
 * Custom Walker Class for Social Menu with Icon.
 *
 * @package Essar
 */

class Essar_Social_Walker extends Walker_Nav_Menu {

    /**
     * Start the element output.
     *
     * @param string   $output Passed by reference. Used to append additional content.
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

        $icon_id  = get_field( 'menu_item_icon', $item );
        $icon_url = $icon_id ? wp_get_attachment_image_url( $icon_id, 'full' ) : '';

        $output .= '<li>';

        $output .= '<a href="' . esc_url( $item->url ) . '" target="_blank" rel="noopener noreferrer">';

        if ( ! empty( $icon_url ) ) {
            $output .= '<span class="socio-img"><img src="' . esc_url( $icon_url ) . '" alt="' . esc_attr( $item->title ) . '" /></span>';
        }

        $output .= '<span class="socio-text">' . esc_html( $item->title ) . '</span>';

        $output .= '</a>';

        $output .= '</li>';
    }
}
