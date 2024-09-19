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
 * PHP Class for Registering Customizer Confugration
 *
 * @since 1.3.0
 */
class Inspiro_Typo_H2_Config {
	/**
	 * Register configurations
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register_configuration( $wp_customize ) {
		$wp_customize->add_control(
			new Inspiro_Customize_Title_Control(
				$wp_customize,
				'inspiro_typography_section_title_h2',
				array(
					'label'    => __( 'Heading 2', 'inspiro' ),
					'section'  => 'inspiro_typography_section_headings',
					'settings' => array(),
				)
			)
		);

		$wp_customize->add_setting(
			'heading2-font-size',
			array(
				'default'           => 30,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'inspiro_sanitize_integer',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Range_Control(
				$wp_customize,
				'heading2-font-size',
				array(
					'label'       => __( 'Font Size (px)', 'inspiro' ),
					'section'     => 'inspiro_typography_section_headings',
					'input_attrs' => array(
						'min'  => 20,
						'max'  => 58,
						'step' => 1,
					),
				)
			)
		);

		$wp_customize->add_setting(
			'heading2-font-weight',
			array(
				'default'           => '700',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'inspiro_sanitize_font_weight',
			)
		);

		$wp_customize->add_control(
			'heading2-font-weight',
			array(
				'label'   => __( 'Font Weight', 'inspiro' ),
				'section' => 'inspiro_typography_section_headings',
				'type'    => 'select',
				'choices' => Inspiro_Font_Family_Manager::get_font_family_weight( 'headings-font-family', $wp_customize ),
			)
		);

		$wp_customize->add_setting(
			'heading2-text-transform',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'inspiro_sanitize_choices',
			)
		);

		$wp_customize->add_control(
			'heading2-text-transform',
			array(
				'label'   => __( 'Text Transform', 'inspiro' ),
				'section' => 'inspiro_typography_section_headings',
				'type'    => 'select',
				'choices' => array(
					''           => _x( 'Inherit', 'text transform', 'inspiro' ),
					'none'       => _x( 'None', 'text transform', 'inspiro' ),
					'capitalize' => __( 'Capitalize', 'inspiro' ),
					'uppercase'  => __( 'Uppercase', 'inspiro' ),
					'lowercase'  => __( 'Lowercase', 'inspiro' ),
				),
			)
		);

		$wp_customize->add_setting(
			'heading2-line-height',
			array(
				'default'           => 1.4,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'inspiro_sanitize_float',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Range_Control(
				$wp_customize,
				'heading2-line-height',
				array(
					'label'       => __( 'Line Height', 'inspiro' ),
					'section'     => 'inspiro_typography_section_headings',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 2,
						'step' => 0.1,
					),
				)
			)
		);
	}
}

new Inspiro_Typo_H2_Config();
