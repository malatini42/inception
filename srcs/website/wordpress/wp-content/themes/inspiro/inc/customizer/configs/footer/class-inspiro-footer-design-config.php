<?php
/**
 * Inspiro Lite: Adds settings, sections, controls to Customizer
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * PHP Class for Registering Customizer Configuration
 *
 * @since 1.3.0
 */
class Inspiro_Footer_Design_Config
{
	/**
	 * Configurations
	 *
	 * @return array
	 * @since 1.4.0 Store configurations to class method.
	 */
	public static function config() {

		var_dump('string');

//		return array(
//
//			'setting' => array(
//				array(
//					'id' => 'footer_design_copyright_text',
//					'args' => array(
//						'default' => 'Lorem Ipsum Dolor Sit amet',
//						'sanitize_callback' => 'sanitize_textarea_field',
//					),
//				),
//			),
//			'control' => array(
//				array(
//					'id' => 'footer_design_copyright_option',
//					'control_type' => 'WP_Customize_Control',
//					'args' => array(
//						'label' => __( 'Custom Text Area', 'inspiro'),
//						'type' => 'text',
//						'description' => __( 'This is a custom textarea.' ),
//						'settings' => 'footer_design_copyright_text',
//						'section' => 'footer-area',
//					),
//				),
//			)
//		);
	}
}
