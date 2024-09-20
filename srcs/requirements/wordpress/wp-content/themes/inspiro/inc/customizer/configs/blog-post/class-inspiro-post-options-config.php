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
class Inspiro_Post_Options_Config {
	/**
	 * Configurations
	 *
	 * @since 1.4.0 Store configurations to class method.
	 * @return array
	 */
	public static function config() {
		return array(
			'section' => array(
				'id'   => 'blog_post_options',

				'args' => array(
					'title'      => esc_html__( 'Post Options', 'inspiro' ),
					'capability' => 'edit_theme_options',
					'panel'      => 'blog_post_options_panel',
				),
			),
			'setting' => array(
                array(
    				'id'   => 'display_content',
    				'args' => array(
    					'default'           => 'excerpt',
    					'sanitize_callback' => 'inspiro_sanitize_display_content',
    					'transport'         => 'refresh',
    				),
                ),
                array(
                    'id'   => 'display_featured_image',
                    'args' => array(
                        'default'           => true,
                        'sanitize_callback' => 'inspiro_sanitize_checkbox',
                        'transport'         => 'refresh',
                    ),
                ),
                array(
                    'id'   => 'blog_options_upgrade',
                    'args' => array(
                        'default' => null,
                        'sanitize_callback' => 'sanitize_text_field',
                    ),
                ),
			),
			'control' => array(
                array(
    				'id'   => 'display_content',
    				'args' => array(
    					'label'   => esc_html__( 'Content to Display in Archive Pages', 'inspiro' ),
    					'section' => 'blog_post_options',
    					'type'    => 'radio',
    					'choices' => array(
    						'excerpt'      => esc_html__( 'Excerpt', 'inspiro' ),
    						'full-content' => esc_html__( 'Full Content', 'inspiro' ),
    						'none'         => esc_html__( 'None', 'inspiro' ),
    					),
    				),
                ),
                array(
                    'id'   => 'display_featured_image',
                    'args' => array(
                        'label'   => esc_html__( 'Display the Featured Image in the Header', 'inspiro' ),
                        'section' => 'blog_post_options',
                        'type'    => 'checkbox',
                        'description' => esc_html__( 'Choose if you want to show the Featured Image in the header', 'inspiro' ),
                    ),
                ),
                array(
                    'id'           => 'blog_options_upgrade',
                    'control_type' => 'Inspiro_Customize_Title_Control',
                    'args'         => array(
                        'label' => esc_html__( '⚙️ You can control every detail in your theme with Inspiro Premium!', 'inspiro' ),
                        'description' => esc_html__( 'Unlock all customization and post options by upgrading to the Premium version of the theme. Disable specific elements and features, customize colors, fonts, header, footer & much more!', 'inspiro' ),
                        'pro_text'    => esc_html__( '👉 Unlock all options and features', 'inspiro' ),
                        'pro_url'     => 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=customizer&utm_campaign=blogpostbutton',
                        'section' => 'blog_post_options',
                    ),
                ),
			),
		);
	}
}
