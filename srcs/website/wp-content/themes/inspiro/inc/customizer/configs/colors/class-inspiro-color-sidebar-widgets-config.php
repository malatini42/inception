<?php
/**
 * Inspiro Lite: Adds settings, sections, controls to Customizer
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PHP Class for Registering Customizer Configuration
 *
 * @since 1.3.0
 */
class Inspiro_Color_Sidebar_Widgets_Config {
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
		return array(
			// Settings init
			'setting' => array(
				// 4. sidebar widgets section
				array(
					'id'   => 'color_sidebar_widgets_background',
					'args' => array(
						'default'           => '#101010',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',

					),
				),
				array(
					'id'   => 'color_sidebar_widgets_title',
					'args' => array(
						'default'           => '#ffffff',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_sidebar_widgets_text',
					'args' => array(
						'default'           => '#78787f',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_sidebar_widgets_link',
					'args' => array(
						'default'           => '#0bb4aa',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
			),
			// Controls init
			'control' => array(
				// 4. sidebar widget section
				array(
					'id'           => 'for_sidebar_widgets_options',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => esc_html__( 'Sidebar and Widgets', 'inspiro' ),
						'section'          => 'colors',
						'settings'         => array(),
						'priority'         => 20,
						'controls_to_wrap' => 4,
					),
				),
				array(
					'id'           => 'color_sidebar_widgets_background',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Sidebar Background', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 21,
					),
				),
				array(
					'id'           => 'color_sidebar_widgets_title',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Widget Title', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 21,
					),
				),
				array(
					'id'           => 'color_sidebar_widgets_text',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Widget Text', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 21,
					),
				),
				array(
					'id'           => 'color_sidebar_widgets_link',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Widget Link', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 21,
					),
				),
			),
		);
	}
}
