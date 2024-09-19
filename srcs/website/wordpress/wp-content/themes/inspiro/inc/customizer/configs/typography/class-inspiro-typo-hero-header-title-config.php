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
class Inspiro_Typo_Hero_Header_Title_Config {
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
			'section' => array(
				'id'   => 'inspiro_typography_section_hero_header',
				'args' => array(
					'title' => __( 'Homepage Hero Header', 'inspiro' ),
					'panel' => 'inspiro_typography_panel',
				),
			),
			'setting' => array(
				array(
					'id'   => 'slider-title-font-family',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => "'Inter', sans-serif",
					),
				),
				array(
					'id'   => 'slider-title-font-variant',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_variant',
						'default'           => '700',
					),
				),
				array(
					'id'   => 'slider-title-font-size',
					'args' => array(
						'default'           => 80,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'slider-title-font-weight',
					'args' => array(
						'default'           => '700',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'slider-title-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'slider-title-line-height',
					'args' => array(
						'default'           => 1.25,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_float',
					),
				),
			),
			'control' => array(
				// todo:clean
//				array(
//					'id'           => 'for_typography_header_section',
//					'control_type' => 'Inspiro_Customize_Title_Control',
//					'args'         => array(
//						'label'    => __( 'Header Title', 'inspiro' ),
//						'section'  => 'inspiro_typography_section_hero_header',
//						'settings' => array(),
//					),
//				),
				array(
					'id' => 'for_typography_hero_header_title_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args' => array(
						'label'    	=> __( 'Hero Title', 'inspiro' ),
						'section' 	=> 'inspiro_typography_section_hero_header',
						'settings'	=> array(),
						'controls_to_wrap' => 6,
					),
				),
				array(
					'id'           => 'slider-title-font-family',
					'control_type' => 'Inspiro_Customize_Typography_Control',
					'args'         => array(
						'label'   => __( 'Font Family', 'inspiro' ),
						'section' => 'inspiro_typography_section_hero_header',
						'connect' => 'slider-title-font-weight',
						'variant' => 'slider-title-font-variant',
					),
				),
				array(
					'id'           => 'slider-title-font-variant',
					'control_type' => 'Inspiro_Customize_Font_Variant_Control',
					'args'         => array(
						'label'       => __( 'Variants', 'inspiro' ),
						'description' => __( 'Only selected Font Variants will be loaded from Google Fonts.', 'inspiro' ),
						'section'     => 'inspiro_typography_section_hero_header',
						'connect'     => 'slider-title-font-family',
					),
				),
				array(
					'id'           => 'slider-title-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_hero_header',
						'input_attrs' => array(
							'min'  => 56,
							'max'  => 120,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'slider-title-font-weight',
					'args'             => array(
						'label'   => __( 'Font Weight', 'inspiro' ),
						'section' => 'inspiro_typography_section_hero_header',
						'type'    => 'select',
						'choices' => array(),
					),
					'callable_choices' => array(
						array( 'Inspiro_Font_Family_Manager', 'get_font_family_weight' ),
						array( 'slider-title-font-family', $wp_customize ),
					),
				),
				array(
					'id'   => 'slider-title-text-transform',
					'args' => array(
						'label'   => __( 'Text Transform', 'inspiro' ),
						'section' => 'inspiro_typography_section_hero_header',
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
					'id'           => 'slider-title-line-height',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'Line Height', 'inspiro' ),
						'section'     => 'inspiro_typography_section_hero_header',
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
