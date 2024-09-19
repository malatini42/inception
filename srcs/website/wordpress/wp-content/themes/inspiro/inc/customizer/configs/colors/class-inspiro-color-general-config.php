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
class Inspiro_Color_General_Config {
	/**
	 * Configurations
	 *
	 * @return array
	 * @since 1.4.0 Store configurations to class method.
	 */
	public static function config() {
		return array(
			// Settings init
			'setting' => array(
				array(
					'id'   => 'color_general_h_tags',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_h1_tag',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_h2_tag',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_h3_tag',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_h4_tag',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_h5_tag',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_h6_tag',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_page_title',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_post_title',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_entry_excerpt_text',
					'args' => array(
						'default'              => '',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_entry_content_text',
					'args' => array(
						'default'              => '',
						'transport'            => 'postMessage',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
//				array(
//					'id'   => 'color_general_underline_text',
//					'args' => array(
//						'default'              => '',
//						'transport'            => 'refresh',
//						'sanitize_callback'    => 'sanitize_hex_color',
//						'sanitize_js_callback' => 'maybe_hash_hex_color',
//					),
//				),
				array(
					'id'   => 'color_general_link_content',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
				array(
					'id'   => 'color_general_link_hover_content',
					'args' => array(
						'default'              => '',
						'transport'            => 'refresh',
						'sanitize_callback'    => 'sanitize_hex_color',
						'sanitize_js_callback' => 'maybe_hash_hex_color',
					),
				),
			),
			// Controls init
			'control' => array(
				array(
					'id'           => 'for_general_color_options',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => esc_html__( 'General', 'inspiro' ),
						'section'          => 'colors',
						'settings'         => array(),
						'priority'         => 11,
						'controls_to_wrap' => 6,
					),
				),
//				array(
//					'id'           => 'sub_menu_for_color_h_tags',
//					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
//					'args'         => array(
//						'label'            => esc_html__( 'Headings ', 'inspiro' ),
//						'section'          => 'colors',
//						'settings'         => array(),
//						'priority'         => 11,
//						'controls_to_wrap' => 7,
//						'apply_child_item_class' => true,
//					),
//				),
				array(
					'id'           => 'color_general_page_title',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Page title', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_post_title',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Post title', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_entry_excerpt_text',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Excerpt text', 'inspiro' ),
						'description' => esc_html__( 'This text appears on the Blog page.', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_entry_content_text',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Post and Page text content', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
//				array(
//					'id'           => 'color_general_underline_text',
//					'control_type' => 'WP_Customize_Color_Control',
//					'args'         => array(
//						'label'    => esc_html__( 'Underline color', 'inspiro' ),
//						'section'  => 'colors',
//						'priority' => 11,
//					),
//				),
				array(
					'id'           => 'color_general_link_content',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Content Link color', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_link_hover_content',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Link color on hover', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				// Headers section
				array(
					'id'           => 'for_headers_section_color_options',
					'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
					'args'         => array(
						'label'            => esc_html__( 'Headings', 'inspiro' ),
						'section'          => 'colors',
						'settings'         => array(),
						'priority'         => 11,
						'controls_to_wrap' => 7,
					),
				),
				array(
					'id'           => 'color_general_h_tags',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'       => esc_html__( 'All Headings (H1-H6)', 'inspiro' ),
						'description' => esc_html__( 'For headings in the content only. To return to the default option, please publish the changes first.', 'inspiro' ),
						'section'     => 'colors',
						'priority'    => 11,
					),
				),
				array(
					'id'           => 'color_general_h1_tag',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Heading H1', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_h2_tag',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Heading H2', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_h3_tag',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Heading H3', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_h4_tag',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Heading H4', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_h5_tag',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Heading H5', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
				array(
					'id'           => 'color_general_h6_tag',
					'control_type' => 'WP_Customize_Color_Control',
					'args'         => array(
						'label'    => esc_html__( 'Heading H6', 'inspiro' ),
						'section'  => 'colors',
						'priority' => 11,
					),
				),
			)
		);
	}
}
