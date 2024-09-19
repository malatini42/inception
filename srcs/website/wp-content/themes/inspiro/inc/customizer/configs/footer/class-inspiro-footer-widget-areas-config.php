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
class Inspiro_Footer_Widget_Areas_Config {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_configuration' ), 10 );
	}

	/**
	 * Register configurations
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register_configuration( $wp_customize ) {

		// Create sections
		$wp_customize->add_section(
			'footer-area',
			array(
				'title'    => esc_html__( 'Footer', 'inspiro' ),
				'priority' => 130, // Before Additional CSS.
			)
		);

		$wp_customize->add_setting(
			'footer-widget-areas',
			array(
				'default'           => 3,
				'sanitize_callback' => 'absint',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Accordion_UI_Control(
				$wp_customize,
				'for_footer_widget_areas',
				array(
					'type' => 'accordion-section-ui-wrapper',
					'label' => __('Footer Layout', 'inspiro'),
					'settings' => array(),
					'section' => 'footer-area',
					'expanded' => false,
					'controls_to_wrap' => 2,
				)
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Image_Select_Control(
				$wp_customize,
				'footer-widget-areas',
				array(
					'section' => 'footer-area',
					'description' => __('Select a layout', 'inspiro'),
					'choices'     => array(
						array(
							'label' => __( 'Don\'t display Widgets', 'inspiro' ),
							'url'   => '%sfooter-no-widgets.png'
						),
						array(
							'label' => esc_html__( 'One Column', 'inspiro' ),
							'url'   => '%sfooter-one-column.png'
						),
						array(
							'label' => esc_html__( 'Two Columns', 'inspiro' ),
							'url'   => '%sfooter-two-columns.png'
						),
						array(
							'label' => esc_html__( 'Three Columns', 'inspiro' ),
							'url'   => '%sfooter-three-columns.png'
						),
						array(
							'label' => esc_html__( 'Four Columns', 'inspiro' ),
							'url'   => '%sfooter-four-columns.png'
						)
					)
				)
			)
		);

		$wp_customize->add_setting(
			'footer-pro-styles',
			array(
				'default' => null,
				'sanitize_callback' => 'sanitize_key',
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Promo_Pro_Control(
				$wp_customize,
				'footer-pro-styles',
				array(
					'label'           => esc_html__( 'PRO', 'inspiro' ),
					'section'         => 'footer-area',
					'choices'     => array(
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro.png',
						),
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro-2.png',
						),
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro-3.png',
						),
						array(
							'label' => esc_html__( 'Footer Pro', 'inspiro' ),
							'url'   => '%sfooter-pro-4.png',
						),
					)
				)
			)
		);
	}
}
new Inspiro_Footer_Widget_Areas_Config();
