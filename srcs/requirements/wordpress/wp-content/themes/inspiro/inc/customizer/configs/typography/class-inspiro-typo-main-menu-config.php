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
class Inspiro_Typo_Main_Menu_Config {
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
				'id'   => 'inspiro_typography_section_menu',
				'args' => array(
					'title' => __( 'Menu', 'inspiro' ),
					'panel' => 'inspiro_typography_panel',
				),
			),
			'setting' => array(
				array(
					'id'   => 'mainmenu-font-family',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
						'default'           => "'Montserrat', sans-serif",
					),
				),
				array(
					'id'   => 'mainmenu-font-variant',
					'args' => array(
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_variant',
						'default'           => '500',
					),
				),
				array(
					'id'   => 'mainmenu-font-size',
					'args' => array(
						'default'           => 16,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_integer',
					),
				),
				array(
					'id'   => 'mainmenu-font-weight',
					'args' => array(
						'default'           => '500',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_font_weight',
					),
				),
				array(
					'id'   => 'mainmenu-text-transform',
					'args' => array(
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'inspiro_sanitize_choices',
					),
				),
				array(
					'id'   => 'mainmenu-line-height',
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
//					'id'           => 'inspiro_typography_section_title_main_menu',
//					'control_type' => 'Inspiro_Customize_Title_Control',
//					'args'         => array(
//						'label'    => __( 'Main Menu', 'inspiro' ),
//						'section'  => 'inspiro_typography_section_menu',
//						'settings' => array(),
//					),
//				),
				array(
					'id' => 'for_typography_main_menu_section',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args' => array(
						'label'    	=> __( 'Main Menu', 'inspiro' ),
						'section' 	=> 'inspiro_typography_section_menu',
						'settings'	=> array(),
						'controls_to_wrap' => 6,
					),
				),
				array(
					'id'           => 'mainmenu-font-family',
					'control_type' => 'Inspiro_Customize_Typography_Control',
					'args'         => array(
						'label'   => __( 'Font Family', 'inspiro' ),
						'section' => 'inspiro_typography_section_menu',
						'connect' => 'mainmenu-font-weight',
						'variant' => 'mainmenu-font-variant',
					),
				),
				array(
					'id'           => 'mainmenu-font-variant',
					'control_type' => 'Inspiro_Customize_Font_Variant_Control',
					'args'         => array(
						'label'       => __( 'Variants', 'inspiro' ),
						'description' => __( 'Only selected Font Variants will be loaded from Google Fonts.', 'inspiro' ),
						'section'     => 'inspiro_typography_section_menu',
						'connect'     => 'mainmenu-font-family',
					),
				),
				array(
					'id'           => 'mainmenu-font-size',
					'control_type' => 'Inspiro_Customize_Range_Control',
					'args'         => array(
						'label'       => __( 'Font Size (px)', 'inspiro' ),
						'section'     => 'inspiro_typography_section_menu',
						'input_attrs' => array(
							'min'  => 12,
							'max'  => 32,
							'step' => 1,
						),
					),
				),
				array(
					'id'               => 'mainmenu-font-weight',
					'args'             => array(
						'label'   => __( 'Font Weight', 'inspiro' ),
						'section' => 'inspiro_typography_section_menu',
						'type'    => 'select',
						'choices' => array(),
					),
					'callable_choices' => array(
						array( 'Inspiro_Font_Family_Manager', 'get_font_family_weight' ),
						array( 'mainmenu-font-family', $wp_customize ),
					),
				),
				array(
					'id'   => 'mainmenu-text-transform',
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
					'id'           => 'mainmenu-line-height',
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
