<?php
/**
 * Inspiro Lite: Adds settings, sections, controls to Customizer
 *
 * @package    Inspiro
 * @subpackage Inspiro_Lite
 * @since      Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PHP Class for Registering Customizer Configuration
 *
 * @since 1.3.0
 */
class Inspiro_Color_Hero_Config {
	/**
	 * Configurations
	 *
	 * @return array
	 * @since 1.4.0 Store configurations to class method.
	 *
	 *  Sections Loading Order
	 * 1. header settings
	 * 2. top menu settings
	 * 3. hero section
	 * 4. sidebar widget section
	 * 5. footer
	 * 6. premium single section
	 */
	public static function config() {
		return array(
			// Settings init
			'setting' => array(
				// 1. header settings
				// 2. top menu settings
				// hero section
				array(
					'id'   => 'color_only_hero_title', // was color_hero_site_title
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'header_button_textcolor',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#ffffff',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'header_button_textcolor_hover',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#ffffff',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'header_button_bgcolor_hover',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#0bb4aa',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_scroll_to_content_arrow',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'hero_gradient_opacity_control',
					'args' => array(
						'default'   => '0.3',
						'transport' => 'refresh',
					),
				),
			),
			// Controls init
			'control' => array(
				// 3. hero section
				array(
					'id'           => 'for_hero_section_color_options',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => esc_html__( 'Hero section', 'inspiro' ),
						'section'          => 'colors',
						'settings'         => array(),
						'priority'         => 12,
						'controls_to_wrap' => 7,
					),
				),
				array(
					'id'           => 'color_only_hero_title',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Hero Title Text Color', 'inspiro' ),
						'description' => 'Will overwrite Hero Text Color',
						'section'  => 'colors',
						'priority' => 13,
					),
				),
				// Header Text Color is missing here it's customized in class-inspiro-customizer.php file
				array(
					'id'           => 'header_button_textcolor',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Hero Button Text Color', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 13,
					),
				),
				array(
					'id'           => 'header_button_textcolor_hover',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Hero Button Text Color on Hover', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 13,
					),
				),
				array(
					'id'           => 'header_button_bgcolor_hover',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Hero Button Background Color on Hover', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 13,
					),
				),
				array(
					'id'           => 'color_scroll_to_content_arrow',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Scroll to Content Arrow', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 13,
					),
				),
				array(
					'id'   => 'hero_gradient_opacity_control',
					'args' => array(
						'type'        => 'range',
						'label'       => esc_html__( 'Adjust gradient opacity', 'inspiro' ),
//						'label'    => esc_html__( 'Set Hero Section Gradient Transparency', 'inspiro' ),
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 1,
							'step' => 0.1,
						),
						'section'     => 'colors',
						'priority'    => 14,
					),
				),
			),
		);
	}
}
