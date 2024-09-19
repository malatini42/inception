<?php
/**
 * Generate inline css based on Customizer settings value
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_mobilemenu' );

if ( ! function_exists( 'inspiro_selector_mobilemenu' ) ) {
	/**
	 * Set HTML selector for Mobile Menu
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_mobilemenu( $selectors ) {
		$selectors['typo-mobilemenu-media'] = '@media screen and (max-width: 64em)';
		$selectors['typo-mobilemenu']       = '.navbar-nav li a';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_mobilemenu' );

/**
 * Typography -> Menu -> Mobile Menu
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for Mobile Menu.
 */
function inspiro_dynamic_theme_css_mobilemenu( $dynamic_css ) {
	$mobilemenu_font_family    = inspiro_get_font_stacks( inspiro_get_theme_mod( 'mobilemenu-font-family' ) );
	$mobilemenu_font_size      = inspiro_get_theme_mod( 'mobilemenu-font-size' );
	$mobilemenu_font_weight    = inspiro_get_theme_mod( 'mobilemenu-font-weight' );
	$mobilemenu_text_transform = inspiro_get_theme_mod( 'mobilemenu-text-transform' );
	$mobilemenu_line_height    = inspiro_get_theme_mod( 'mobilemenu-line-height' );

	$selectors   = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector    = inspiro_get_prop( $selectors, 'typo-mobilemenu' );
	$media_query = inspiro_get_prop( $selectors, 'typo-mobilemenu-media' );

	$dynamic_css .= "{$media_query} {\n";
	$dynamic_css .= "{$selector} {\n";
	if ( ! empty( $mobilemenu_font_family ) && 'inherit' !== $mobilemenu_font_family ) {
		$dynamic_css .= "font-family: {$mobilemenu_font_family};\n";
	}
	if ( absint( $mobilemenu_font_size ) >= 12 && absint( $mobilemenu_font_size ) <= 22 ) {
		$dynamic_css .= "font-size: {$mobilemenu_font_size}px;\n";
	}
	if ( ! empty( $mobilemenu_font_weight ) && 'inherit' !== $mobilemenu_font_weight ) {
		$dynamic_css .= "font-weight: {$mobilemenu_font_weight};\n";
	}
	if ( ! empty( $mobilemenu_text_transform ) && 'inherit' !== $mobilemenu_text_transform ) {
		$dynamic_css .= "text-transform: {$mobilemenu_text_transform};\n";
	}
	if ( ! empty( $mobilemenu_line_height ) && 'inherit' !== $mobilemenu_line_height ) {
		$dynamic_css .= "line-height: {$mobilemenu_line_height};\n";
	}
	$dynamic_css .= "} }\n";

	return $dynamic_css;
}
