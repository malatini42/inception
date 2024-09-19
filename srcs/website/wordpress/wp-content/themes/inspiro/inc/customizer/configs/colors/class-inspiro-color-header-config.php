<?php
/**
 * Inspiro Lite: Adds settings, sections, controls to Customizer
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PHP Class for Registering Customizer Configuration
 *
 * @since 1.3.0
 */
class Inspiro_Color_Header_Config {
	/**
	 * Configurations
	 *
	 * @return array
	 * @since 1.4.0 Store configurations to class method.
	 *
	 * Sections Loading Order
	 * 1. header settings
	 * 2. top menu settings
	 * 3. hero section
	 * 4. sidebar widget section
	 * 5. footer
	 * 6. premium single section
 */
	public static function config() {
		// todo: check if array( 'custom-header', 'header-text' ) is needed
		return array(
			// Settings init
			'setting' => array(
				// 1. header settings
				array(
					'id'   => 'color_header_custom_logo_text',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#ffffff',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_header_custom_logo_hover_text',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#ffffff',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				// 2. top menu settings
//				array(
//					'id'   => 'color_navbar_menu_background',
//					'args' => array(
//						'theme_supports'       => array( 'custom-header', 'header-text' ),
//						'default'              => '',
//						'transport'            => 'refresh',
//						'sanitize_callback'    => 'sanitize_hex_color',
//						'sanitize_js_callback' => 'maybe_hash_hex_color',
//					),
//				),
				array(
					// all header navbar but not navigation properly
					'id'   => 'color_menu_background',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#101010',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color-menu-background-scroll',
					'args' => array(
						'theme_supports'    => array( 'custom-header', 'header-text' ),
						'default'           => 'rgba(0,0,0,0.9)',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_menu_search_icon_btn',
					'args' => array(
						'theme_supports'       => array( 'custom-header' ),
						'default'              => '#ffffff',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_menu_hamburger_btn',
					'args' => array(
						'theme_supports'       => array( 'custom-header' ),
						'default'              => '#ffffff',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
			),
			// Controls init
			'control' => array(
				array(
					'id'           => 'for_color_header_options',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => esc_html__( 'Header', 'inspiro' ),
						'section'          => 'colors',
						'settings'         => array(),
						'priority'         => 11,
						'controls_to_wrap' => 4,
					),
				),
				// 1. header settings
				array(
					'id'           => 'color_header_custom_logo_text',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Custom Logo Text', 'inspiro' ), // 'Site Title Color'
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_header_custom_logo_hover_text',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Custom Logo Text on Hover', 'inspiro' ), //  'Site Title Color'
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_menu_search_icon_btn',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Search Icon Color', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_menu_hamburger_btn',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Hamburger Icon Color', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				// 2. top menu section
				array(
					'id'           => 'for_color_header_navbar_menu_options',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => esc_html__( 'Header Menu', 'inspiro' ), // 'Top Navigation Menu'
						'section'          => 'colors',
						'settings'         => array(),
						'priority'         => 12,
						'controls_to_wrap' => 2,
					),
				),
//				array(
//					'id'           => 'color_navbar_menu_background',
//					'control_type' => 'WP_Customize_Color_Control',
//					'args'         => array(
//						'label'    => esc_html__( 'Navigation Background Color', 'inspiro' ), // 'Primary Navigation Background Color'
//						'section'  => 'colors',
//						'priority' => 12,
//					),
//				),
				array(
					'id'           => 'color_menu_background',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Menu Background', 'inspiro' ),
						'description' => esc_html__( "On Homepage works only when the Hero Area is disabled or not shown", 'inspiro' ), // "Works only when the homepage is set to display the latest posts."
						'section'  => 'colors',
						'priority' => 12,
					),
				),
				array(
					'id'           => 'color-menu-background-scroll',
					'control_type' => 'Inspiro_Customize_Alpha_Color_Picker_Control',
					'args'         => array(
						'label'    => esc_html__( 'Menu Background on Scroll', 'inspiro' ),
//						'description' => esc_html__( "Work only with Hero Image Selected", 'inspiro' ),
						'section'  => 'colors',
						'priority' => 12,
					),
				),
			),
		);
	}
}
