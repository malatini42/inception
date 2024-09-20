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
class Inspiro_Homepage_Media_Content_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'header_content',
				'args' => array(
					'title'          => esc_html__( 'Content', 'inspiro' ),
					'theme_supports' => 'custom-header',
					'priority'       => 70,
					'panel'          => 'homepage_media_panel',
				),
			),
			'setting' => array(
				array(
					'id'   => 'header_site_title',
					'args' => array(
						'default'           => get_bloginfo( 'name' ),
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
				array(
					'id'   => 'header_site_description',
					'args' => array(
						'default'           => get_bloginfo( 'description' ),
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_textarea_field',
					),
				),
				array(
					'id'   => 'header_button_title',
					'args' => array(
						'theme_supports'    => 'custom-header',
						'default'           => '',
						'transport'         => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
				array(
					'id'   => 'header_button_url',
					'args' => array(
						'theme_supports'    => 'custom-header',
						'default'           => '',
						'transport'         => 'refresh',
						'sanitize_callback' => 'inspiro_sanitize_header_button_url',
					),
				),
				array(
					'id'   => 'header_button_link_open',
					'args' => array(
						'capability'        => 'edit_theme_options',
						'default'           => true,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
					),
				),
			),
			'control' => array(
				array(
					'id'   => 'header_site_title',
					'args' => array(
						'theme_supports'  => array( 'custom-header' ),
						'type'            => 'text',
						'label'           => esc_html__( 'Hero Title', 'inspiro' ),
						'section'         => 'header_content',
						'priority'        => 1,
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_site_description',
					'args' => array(
						'theme_supports'  => array( 'custom-header' ),
						'type'            => 'textarea',
						'label'           => esc_html__( 'Hero Description', 'inspiro' ),
						'section'         => 'header_content',
						'priority'        => 1,
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_button_title',
					'args' => array(
						'theme_supports'  => 'custom-header',
						'type'            => 'text',
						'label'           => esc_html__( 'Hero Button Text', 'inspiro' ),
						'section'         => 'header_content',
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_button_url',
					'args' => array(
						'theme_supports'  => 'custom-header',
						'type'            => 'url',
						'label'           => esc_html__( 'Hero Button URL', 'inspiro' ),
						'section'         => 'header_content',
						'active_callback' => 'is_header_video_active',
					),
				),
				array(
					'id'   => 'header_button_link_open',
					'args' => array(
						'type'    => 'checkbox',
						'section' => 'header_content',
						'label'   => esc_html__( 'Open link on new tab', 'inspiro' ),
					),
				),
			),
		);
	}
}
