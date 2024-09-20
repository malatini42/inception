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

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_body' );

if ( ! function_exists( 'inspiro_selector_body' ) ) {
	/**
	 * Set HTML selector for Body
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_body( $selectors ) {
		$selectors['typo-body']            = 'body, button, input, select, textarea';
		$selectors['body-font-size-media'] = '@media screen and (min-width: 782px)';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_body' );

/**
 * Typography -> Body
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for Body.
 */
function inspiro_dynamic_theme_css_body( $dynamic_css ) {
	

	$body_font_family    = inspiro_get_font_stacks( inspiro_get_theme_mod( 'body-font-family' ) );
	$body_font_size      = inspiro_get_theme_mod( 'body-font-size' );
	$body_font_weight    = inspiro_get_theme_mod( 'body-font-weight' );
	$body_text_transform = inspiro_get_theme_mod( 'body-text-transform' );
	$body_line_height    = inspiro_get_theme_mod( 'body-line-height' );
	$selectors   = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector    = inspiro_get_prop( $selectors, 'typo-body' );
	$media_query = inspiro_get_prop( $selectors, 'body-font-size-media' );

	$dynamic_css .= "{$selector} {\n";
	if ( ! empty( $body_font_family ) && 'inherit' !== $body_font_family ) {
		$dynamic_css .= "font-family: {$body_font_family};\n";
	}
	if ( ! empty( $body_font_weight ) && 'inherit' !== $body_font_weight ) {
		$dynamic_css .= "font-weight: {$body_font_weight};\n";
	}
	if ( ! empty( $body_text_transform ) && 'inherit' !== $body_text_transform ) {
		$dynamic_css .= "text-transform: {$body_text_transform};\n";
	}
	$dynamic_css .= "}\n";

	$dynamic_css .= "{$media_query} {\n";
	$dynamic_css .= "{$selector} {\n";
	if ( absint( $body_font_size ) >= 12 && absint( $body_font_size ) <= 36 ) {
		$dynamic_css .= "font-size: {$body_font_size}px;\n";
	}
	if ( ! empty( $body_line_height ) && 'inherit' !== $body_line_height ) {
		$dynamic_css .= "line-height: {$body_line_height};\n";
	}
	$dynamic_css .= "} }\n";

	return $dynamic_css;
}
