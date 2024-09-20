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
class Inspiro_Typo_Panel_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'panel' => array(
				'id'   => 'inspiro_typography_panel',
				'args' => array(
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'title'      => esc_html__( 'Typography', 'inspiro' ),
				),
			),
		);
	}
}
