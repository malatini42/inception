<?php
/**
 * Inspiro Lite: Color Patterns
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

/**
 * Generate the CSS for the current custom color scheme.
 */
function inspiro_custom_colors_css() {
	$hex = inspiro_get_theme_mod( 'colorscheme_hex' );
	$css = '
/**
 * Inspiro Lite: Custom Color Scheme
 *
 */

:root {
    --inspiro-primary-color: ' . $hex . ';
}

body {
    --wp--preset--color--secondary: ' . $hex . ';
}
';

	/**
	 * Filters Inspiro Lite custom colors CSS.
	 *
	 * @since Inspiro 1.0.0
	 *
	 * @param string $css        Base theme colors CSS.
	 * @param string $hex        The user's selected color HEX.
	 */
	return apply_filters( 'inspiro_custom_colors_css', $css, $hex );
}
