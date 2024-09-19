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

add_filter( 'inspiro/dynamic_theme_css/selectors', 'inspiro_selector_mainmenu' );

if ( ! function_exists( 'inspiro_selector_mainmenu' ) ) {
	/**
	 * Set HTML selector for Main Menu
	 *
	 * @param array $selectors HTML selectors.
	 * @return array The array with HTML selectors.
	 */
	function inspiro_selector_mainmenu( $selectors ) {
		$selectors['typo-mainmenu']            = '.navbar-nav a';
		$selectors['mainmenu-font-size-media'] = '@media screen and (min-width: 782px)';
		return $selectors;
	}
}

add_filter( 'inspiro/dynamic_theme_css', 'inspiro_dynamic_theme_css_mainmenu' );

/**
 * Typography -> Menu -> Main Menu
 *
 * @param string $dynamic_css Dynamic CSS from Customizer.
 * @return string Generated dynamic CSS for Main Menu.
 */
function inspiro_dynamic_theme_css_mainmenu( $dynamic_css ) {
	$mainmenu_font_family    = inspiro_get_font_stacks( inspiro_get_theme_mod( 'mainmenu-font-family' ) );
	$mainmenu_font_size      = inspiro_get_theme_mod( 'mainmenu-font-size' );
	$mainmenu_font_weight    = inspiro_get_theme_mod( 'mainmenu-font-weight' );
	$mainmenu_text_transform = inspiro_get_theme_mod( 'mainmenu-text-transform' );
	$mainmenu_line_height    = inspiro_get_theme_mod( 'mainmenu-line-height' );

	$selectors   = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
	$selector    = inspiro_get_prop( $selectors, 'typo-mainmenu' );
	$media_query = inspiro_get_prop( $selectors, 'mainmenu-font-size-media' );

	$dynamic_css .= "{$selector} {\n";
	if ( ! empty( $mainmenu_font_family ) && 'inherit' !== $mainmenu_font_family ) {
		$dynamic_css .= "font-family: {$mainmenu_font_family};\n";
	}
	if ( ! empty( $mainmenu_font_weight ) && 'inherit' !== $mainmenu_font_weight ) {
		$dynamic_css .= "font-weight: {$mainmenu_font_weight};\n";
	}
	if ( ! empty( $mainmenu_text_transform ) && 'inherit' !== $mainmenu_text_transform ) {
		$dynamic_css .= "text-transform: {$mainmenu_text_transform};\n";
	}
	if ( ! empty( $mainmenu_line_height ) && 'inherit' !== $mainmenu_line_height ) {
		$dynamic_css .= "line-height: {$mainmenu_line_height};\n";
	}
	$dynamic_css .= "}\n";

	$dynamic_css .= "{$media_query} {\n";
	$dynamic_css .= "{$selector} {\n";
	if ( absint( $mainmenu_font_size ) >= 12 && absint( $mainmenu_font_size ) <= 32 ) {
		$dynamic_css .= "font-size: {$mainmenu_font_size}px;\n";
	}
	$dynamic_css .= "} }\n";

	return $dynamic_css;
}
