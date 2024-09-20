<?php
/**
 * Additional shortcodes to allow including necessary elements in content.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.9.0
 */

// Add necessary init hook for shortcode registering.
function inspiro_register_custom_shortcodes() {

	// show sitename
//	add_shortcode( 'site_title', 'inspiro_show_sitename_shortcode' );

	function inspiro_show_sitename_shortcode() {
		// Start output buffering
		return get_bloginfo( 'name' );
	}

	// show copyright sign
//	add_shortcode( 'copyright', 'inspiro_show_copyright_sign_shortcode' );

	function inspiro_show_copyright_sign_shortcode() {
		// Start output buffering
		return '&#169';
	}

	// show current year text
//	add_shortcode( 'current_year', 'inspiro_show_current_year_shortcode' );

	function inspiro_show_current_year_shortcode() {
		// Start output buffering
		return date( 'Y' );
	}
}

add_action( 'init', 'inspiro_register_custom_shortcodes' );

