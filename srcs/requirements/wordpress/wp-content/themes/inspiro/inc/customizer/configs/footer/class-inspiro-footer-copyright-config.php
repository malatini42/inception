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
 * todo: refactor this to a be included with framework load
 *
 */
class Inspiro_Footer_Copyright_Config {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_configuration' ), 10 );
	}

	/**
	 * Register configurations
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 *
	 * @return void
	 */
	public function register_configuration( $wp_customize ) {

		// Settings
		$wp_customize->add_setting(
			'footer_copyright_text_setting',
			array(
				'default'           => 'Copyright {copyright} {current-year} {site-title}',
				'sanitize_callback' => 'wp_kses_post', // Sanitize HTML content
				'transport'         => 'refresh', // Enable live preview
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Accordion_UI_Control(
				$wp_customize,
				'for_design_copyright_option',
				array(
					'type'             => 'accordion-section-ui-wrapper',
					'label'            => esc_html__( 'Copyright Text', 'inspiro' ),
					'settings'         => array(),
					'section'          => 'footer-area',
					'expanded'         => true,
					'controls_to_wrap' => 2,
				)
			)
		);

		// Custom WP Editor Control for Footer design Copyright setting
		$wp_customize->add_control(
			new Inspiro_Customize_Copyright_WP_Editor_Control(
				$wp_customize,
				'footer_copyright_editor',
				array(
					'type'        => 'copyright-wp-editor',
					'description' => esc_html__( 'You can insert the following tags: {copyright}, {current-year}, {site-title}', 'inspiro' ),
					'section'     => 'footer-area', // Link to the section
					'settings'    => 'footer_copyright_text_setting', // Link to the setting
				)
			)
		);
	}
}

new Inspiro_Footer_Copyright_Config();
