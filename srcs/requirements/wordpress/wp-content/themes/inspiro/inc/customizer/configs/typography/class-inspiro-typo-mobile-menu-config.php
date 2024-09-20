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
class Inspiro_Typo_Mobile_Menu_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return array
	 */
	public static function config( $wp_customize ) {
		return array(
			'setting' => array(
				array(
					'id'   => 'mobilemenu-font-family',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => "'Montserrat', sans-serif",
					),
				),
				array(
					'id'   => 'mobilemenu-font-variant',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_variant',
						'default'           => '600',
					),
				),
				array(
					'id'   => 'mobilemenu-font-size',
					'args' => array(
						'default'           => 16,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'mobilemenu-font-weight',
					'args' => array(
						'default'           => '600',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'mobilemenu-text-transform',
					'args' => array(
						'default'           => 'uppercase',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'mobilemenu-line-height',
					'args' => array(
						'default'           => 1.8,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
			),
			'control' => array(
				// because was added Accordion UI
				// todo:clean
//				array(
//					'id'           => 'inspiro_typography_section_title_mobile_menu',
//					'control_type' => 'Inspiro_Customize_Title_Control',
//					'args'         => array(
//						'label'    => __( 'Mobile Menu', 'inspiro' ),
//						'section'  => 'inspiro_typography_section_menu',
//						'settings' => array(),
//					),
//				),
				array(
					'id' => 'for_typography_mobile_menu_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args' => array(
						'label'    => __( 'Mobile Menu', 'inspiro' ),
						'section' => 'inspiro_typography_section_menu',
						'settings' => array(),
						'controls_to_wrap' => 6,
					),
				),
				array(
					'id'           => 'mobilemenu-font-family',
					'control_type' => 'Inspiro_Customize_Typography_Control',
					'args'         => array(
						'label'   => __( 'Font Family', 'inspiro' ),
						'section' => 'inspiro_typography_section_menu',
						'connect' => 'mobilemenu-font-weight',
						'variant' => 'mobilemenu-font-variant',
					),
				),
				array(
					'id'           => 'mobilemenu-font-variant',
					'control_type' => 'Inspiro_Customize_Font_Variant_Control',
					'args'         => array(
						'label'       => __( 'Variants', 'inspiro' ),
						'description' => __( 'Only selected Font Variants will be loaded from Google Fonts.', 'inspiro' ),
						'section'     => 'inspiro_typography_section_menu',
						'connect'     => 'mobilemenu-font-family',
					),
				),
				array(
					'id'           => 'mobilemenu-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_menu',
						'input_attrs' => array(
							'min'  => 12,
							'max'  => 22,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'mobilemenu-font-weight',
					'args'             => array(
						'label'   => __( 'Font Weight', 'inspiro' ),
						'section' => 'inspiro_typography_section_menu',
						'type'    => 'select',
						'choices' => array(),
					),
					'callable_choices' => array(
						array( 'Inspiro_Font_Family_Manager', 'get_font_family_weight' ),
						array( 'mobilemenu-font-family', $wp_customize ),
					),
				),
				array(
					'id'   => 'mobilemenu-text-transform',
					'args' => array(
						'label'   => __( 'Text Transform', 'inspiro' ),
						'section' => 'inspiro_typography_section_menu',
						'type'    => 'select',
						'choices' => array(
							''           => _x( 'Inherit', 'text transform', 'inspiro' ),
							'none'       => _x( 'None', 'text transform', 'inspiro' ),
							'capitalize' => __( 'Capitalize', 'inspiro' ),
							'uppercase'  => __( 'Uppercase', 'inspiro' ),
							'lowercase'  => __( 'Lowercase', 'inspiro' ),
						),
					),
				),
				array(
					'id'           => 'mobilemenu-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'Line Height', 'inspiro' ),
						'section'     => 'inspiro_typography_section_menu',
						'input_attrs' => array(
							'min'  => 1,
							'max'  => 2,
							'step' => 0.1,
						),
					),
				),
			),
		);
	}
}
