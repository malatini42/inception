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
class Inspiro_Color_Footer_Config {
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
				// 5. footer
				array(
					'id'   => 'color_footer_background',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#101010',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_footer_text',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#78787f',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_footer_copyright_text',
					'args' => array(
						'theme_supports'       => array( 'custom-header', 'header-text' ),
						'default'              => '#ffffff',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				// 5. premium single section
				array(
					'id'   => 'colors_premium',
					'args' => array(
						'default'           => null,
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
			),
			// Controls init
			'control' => array(
				// 4. footer section
				// hide because was added Accordion UI
				// todo:clean
//				array(
//					'id' => 'footer_color_subtitle',
//					'control_type' => 'Inspiro_Customize_Title_Control',
//					'args' => array(
//						'label' => esc_html__('Footer', 'inspiro'),
//						'section' => 'colors',
//					),
//				),
				array(
					'id'           => 'for_footer_color_options',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => esc_html__( 'Footer', 'inspiro' ),
						'section'          => 'colors',
						'settings'         => array(),
						'priority'         => 22,
						'controls_to_wrap' => 3,
					),
				),
				array(
					'id'           => 'color_footer_background',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Footer Background', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 22,
					),
				),
				array(
					'id'           => 'color_footer_text',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Footer Text Color', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 22,
					),
				),
				array(
					'id'           => 'color_footer_copyright_text',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Copyright Text Color', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 22,
					),
				),
				// 6. premium single section
				array(
					'id'           => 'colors_premium',
					'control_type' => 'Inspiro_Customize_Title_Control',
					'args'         => array(
						'label'       => esc_html__( '🎨 There are 68 more color & font options in Inspiro Premium!', 'inspiro' ),
						'description' => esc_html__( 'Unlock all customization options by upgrading to the Premium version of the theme. Customize colors, fonts, header, footer & much more!', 'inspiro' ),
						'pro_text'    => esc_html__( '👉 Unlock all customizations', 'inspiro' ),
						'pro_url'     => 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=customizer&utm_campaign=colorsbutton',
						'section'     => 'colors',
						'priority'    => 40,
					),
				),
			),
		);
	}
}
