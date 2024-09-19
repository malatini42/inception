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

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_logo' );

if ( ! function_exists( 'inspiro_selector_logo' ) ) {
	/**
	 * Set HTML selector for Logo
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_logo( $selectors ) {
		$selectors['typo-logo']            = 'body:not(.wp-custom-logo) a.custom-logo-text';
		$selectors['logo-font-size-media'] = '@media screen and (min-width: 782px)';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_logo' );

/**
 * Typography -> Logo
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for Logo.
 */
function inspiro_dynamic_theme_css_logo( $dynamic_css ) {
	$logo_font_family    = inspiro_get_font_stacks( inspiro_get_theme_mod( 'logo-font-family' ) );
	$logo_font_size      = inspiro_get_theme_mod( 'logo-font-size' );
	$logo_font_weight    = inspiro_get_theme_mod( 'logo-font-weight' );
	$logo_text_transform = inspiro_get_theme_mod( 'logo-text-transform' );
	$logo_line_height    = inspiro_get_theme_mod( 'logo-line-height' );

	$selectors   = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector    = inspiro_get_prop( $selectors, 'typo-logo' );
	$media_query = inspiro_get_prop( $selectors, 'logo-font-size-media' );

	$dynamic_css .= "{$selector} {\n";
	if ( ! empty( $logo_font_family ) && 'inherit' !== $logo_font_family ) {
		$dynamic_css .= "font-family: {$logo_font_family};\n";
	}
	if ( ! empty( $logo_font_weight ) && 'inherit' !== $logo_font_weight ) {
		$dynamic_css .= "font-weight: {$logo_font_weight};\n";
	}
	if ( ! empty( $logo_text_transform ) && 'inherit' !== $logo_text_transform ) {
		$dynamic_css .= "text-transform: {$logo_text_transform};\n";
	}
	$dynamic_css .= "}\n";

	$dynamic_css .= "{$media_query} {\n";
	$dynamic_css .= "{$selector} {\n";
	if ( absint( $logo_font_size ) >= 12 && absint( $logo_font_size ) <= 42 ) {
		$dynamic_css .= "font-size: {$logo_font_size}px;\n";
	}
	if ( ! empty( $logo_line_height ) && 'inherit' !== $logo_line_height ) {
		$dynamic_css .= "line-height: {$logo_line_height};\n";
	}
	$dynamic_css .= "} }\n";

	return $dynamic_css;
}
