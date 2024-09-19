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
class Inspiro_Homepage_Media_Media_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'header_image',
				'args' => array(
					'title'          => esc_html__( 'Media', 'inspiro' ),
					'theme_supports' => 'custom-header',
					'priority'       => 60,
					'panel'          => 'homepage_media_panel',
				),
			),
			'setting' => array(
				array(
					'id'   => 'external_header_video_full_height',
					'args' => array(
						'capability'        => 'edit_theme_options',
						'default'           => true,
						'sanitize_callback' => 'inspiro_sanitize_checkbox',
					),
				),
                array(
                    'id'   => 'hero_enable',
                    'args' => array(
                        'capability'        => 'edit_theme_options',
                        'default'           => true,
                        'sanitize_callback' => 'inspiro_sanitize_checkbox',
                    ),
                ),
                array(
                    'id'   => 'overlay_show',
                    'args' => array(
                        'capability'        => 'edit_theme_options',
                        'default'           => true,
                        'sanitize_callback' => 'inspiro_sanitize_checkbox',
                    ),
                ),
			),
			'control' => array(
                array(
                    'id'   => 'hero_enable',
                    'args' => array(
                        'type'    => 'checkbox',
                        'section' => 'header_image',
                        'label'   => esc_html__( 'Enable Hero Area on the Homepage', 'inspiro' ),
                        'priority'        => 5,
                    ),
                ),
				array(
					'id'   => 'external_header_video',
					'args' => array(
						'theme_supports'  => array( 'custom-header', 'video' ),
						'type'            => 'url',
						'label'           => esc_html__( 'External Header Video', 'inspiro' ),
						'description'     => esc_html__( 'Enter a YouTube or Vimeo URL:', 'inspiro' ),
						'section'         => 'header_image',
						'priority'        => 5,
						'active_callback' => 'inspiro_is_external_video_active',
					),
				),
				array(
					'id'   => 'external_header_video_full_height',
					'args' => array(
						'theme_supports'  => array( 'custom-header', 'video' ),
						'type'            => 'checkbox',
						'label'           => esc_html__( 'Full Height on Mobile Devices', 'inspiro' ),
						'description'     => esc_html__( 'Make the video full height to remove the black borders at the top and bottom (experimental option).', 'inspiro' ),
						'section'         => 'header_image',
						'priority'        => 6,
						'active_callback' => 'inspiro_is_external_video_active',
					),
				),
                array(
                    'id'   => 'overlay_show',
                    'args' => array(
                        'type'    => 'checkbox',
                        'section' => 'header_image',
                        'label'   => esc_html__( 'Show Dark Overlay', 'inspiro' ),
                        'priority'        => 6,
                    ),
                ),
			),
		);
	}
}
