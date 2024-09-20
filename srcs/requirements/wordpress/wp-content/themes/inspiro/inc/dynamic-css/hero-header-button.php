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

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_hero_header_button' );

if ( ! function_exists( 'inspiro_selector_hero_header_button' ) ) {
	/**
	 * Set HTML selector for Hero Header Button
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_hero_header_button( $selectors ) {
		$selectors['typo-slider-button']            = '.custom-header-button';
		$selectors['slider-button-font-size-media'] = '@media screen and (min-width: 782px)';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_hero_header_button' );

/**
 * Typography -> Homepage Hero Header -> Header Button
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for Header Button.
 */
function inspiro_dynamic_theme_css_hero_header_button( $dynamic_css ) {
	$hero_header_button_font_family    = inspiro_get_font_stacks( inspiro_get_theme_mod( 'slider-button-font-family' ) );
	$hero_header_button_font_size      = inspiro_get_theme_mod( 'slider-button-font-size' );
	$hero_header_button_font_weight    = inspiro_get_theme_mod( 'slider-button-font-weight' );
	$hero_header_button_text_transform = inspiro_get_theme_mod( 'slider-button-text-transform' );
	$hero_header_button_line_height    = inspiro_get_theme_mod( 'slider-button-line-height' );

	$selectors   = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector    = inspiro_get_prop( $selectors, 'typo-slider-button' );
	$media_query = inspiro_get_prop( $selectors, 'slider-button-font-size-media' );

	$dynamic_css .= "{$selector} {\n";
	if ( ! empty( $hero_header_button_font_family ) && 'inherit' !== $hero_header_button_font_family ) {
		$dynamic_css .= "font-family: {$hero_header_button_font_family};\n";
	}
	if ( ! empty( $hero_header_button_font_weight ) && 'inherit' !== $hero_header_button_font_weight ) {
		$dynamic_css .= "font-weight: {$hero_header_button_font_weight};\n";
	}
	if ( ! empty( $hero_header_button_text_transform ) && 'inherit' !== $hero_header_button_text_transform ) {
		$dynamic_css .= "text-transform: {$hero_header_button_text_transform};\n";
	}
	if ( ! empty( $hero_header_button_line_height ) && 'inherit' !== $hero_header_button_line_height ) {
		$dynamic_css .= "line-height: {$hero_header_button_line_height};\n";
	}
	$dynamic_css .= "}\n";

	$dynamic_css .= "{$media_query} {\n";
	$dynamic_css .= "{$selector} {\n";
	if ( absint( $hero_header_button_font_size ) >= 12 && absint( $hero_header_button_font_size ) <= 22 ) {
		$dynamic_css .= "font-size: {$hero_header_button_font_size}px;\n";
	}
	$dynamic_css .= "} }\n";

	return $dynamic_css;
}
