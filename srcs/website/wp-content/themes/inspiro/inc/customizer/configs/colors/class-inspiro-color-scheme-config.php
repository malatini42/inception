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
 *
 * Sections Loading Order
 * 1. header settings
 * 2. top menu settings
 * 3. hero section
 * 4. sidebar widget section
 * 5. footer
 * 6. premium single section
 */
class Inspiro_Color_Scheme_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'setting' => array(
				array(
					'id'   => 'colorscheme',
					'args' => array(
						'default'           => 'light',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_colorscheme',
					),
				),
				array(
					'id'   => 'colorscheme_hex',
					'args' => array(
						'default'           => '#0bb4aa',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_hex_color',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'colorscheme',
					'args' => array(
						'type'     => 'radio',
						'label'    => esc_html__( 'Color Scheme', 'inspiro' ),
						'choices'  => array(
							'light'  => esc_html__( 'Light', 'inspiro' ),
							'dark'   => esc_html__( 'Dark', 'inspiro' ),
							'custom' => esc_html__( 'Custom', 'inspiro' ),
						),
						'section'  => 'colors',
						'priority' => 5,
					),
				),
				array(
					'id'           => 'colorscheme_hex',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'section'  => 'colors',
						'priority' => 6,
					),
				),
			),
		);
	}
}
