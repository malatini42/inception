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
class Inspiro_Homepage_Media_Panel_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'panel' => array(
				'id'   => 'homepage_media_panel',
				'args' => array(
					'capability'      => 'edit_theme_options',
					'title'           => esc_html__( 'Homepage Hero Area', 'inspiro' ),
					'active_callback' => 'is_header_video_active',
					'priority'        => 40,
				),
			),
		);
	}
}
