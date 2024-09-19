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
 * PHP Class for Registering Customizer Confugration
 *
 * @since 1.3.0
 */
class Inspiro_Header_Area_Config
{

	/**
	 * Constructor
	 */
	public function __construct()
	{
		add_action('customize_register', array($this, 'register_configuration'), 10);
	}

	/**
	 * Register configurations
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 * @return void
	 */
	public function register_configuration($wp_customize)
	{

		// Create sections
		$wp_customize->add_section(
			'header-area',
			array(
				'title' => esc_html__('Header', 'inspiro'),
				'priority' => 70,
			)
		);

		// Add settings
		// todo:clean
//		$wp_customize->add_setting(
//			'header_area_accordion_ui_wrapper_layout',
//			array(
//				'default' => 'accordion-ui-wrapper',
//			)
//		);
//
//		$wp_customize->add_setting(
//			'header_area_accordion_ui_wrapper_options',
//			array(
//				'default' => 'accordion-ui-wrapper',
//			)
//		);

		$wp_customize->add_setting(
			'header-menu-style',
			array(
				'default' => 'wpz_menu_normal',
				'sanitize_callback' => 'sanitize_key'
			)
		);

		$wp_customize->add_setting(
			'header-menu-pro-style',
			array(
				'default' => null,
				'sanitize_callback' => 'sanitize_key'
			)
		);

		$wp_customize->add_setting(
			'header-layout-type',
			array(
				'sanitize_callback' => 'sanitize_key',
				'default' => 'wpz_layout_narrow'
			)
		);

		$wp_customize->add_setting(
			'cover-size',
			array(
				'sanitize_callback' => 'sanitize_key',
				'default' => 'cover_fixed_height'
			)
		);

		$wp_customize->add_setting(
			'header_title_subsection',
			array(
				'default' => null,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_setting(
			'header_search_show',
			array(
				'capability' => 'edit_theme_options',
				'default' => true,
				'transport' => 'refresh',
				'sanitize_callback' => 'inspiro_sanitize_checkbox',
			)
		);

		// was moved in Color Panel
		// todo:clean
//		$wp_customize->add_setting(
//			'header_hamburger_icon_color',
//			array(
//				'default' => '#ffffff',
//				'sanitize_callback' => 'sanitize_hex_color',
//			));

		$wp_customize->add_setting(
			'header_hide_main_menu',
			array(
				'default' => false,
				'sanitize_callback' => 'inspiro_sanitize_checkbox',
			));


		// Add Controls
		$wp_customize->add_control(
			new Inspiro_Customize_Accordion_UI_Control(
				$wp_customize,
				'for-predefined-layout',
				array(
					'type' => 'accordion-section-ui-wrapper',
					'label' => esc_html__('Header Layout', 'inspiro'),
					'settings' => array(),
					'section' => 'header-area',
					'accordion' => true,
					'expanded' => false,
					'controls_to_wrap' => 2,
				)
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Image_Select_Control(
				$wp_customize,
				'header-menu-style',
				array(
//					'label'           => esc_html__( 'Header Layout', 'inspiro' ),
					'description' => esc_html__('Select the header layout. The hamburger icon appears on the desktop if the Sidebar has at least one widget. On mobile devices, the main menu is displayed in the sidebar.', 'inspiro'),
					'section' => 'header-area',
					'choices' => array(
						'wpz_menu_normal' => array(
							'label' => esc_html__('Default Style', 'inspiro'),
							'url' => '%sheader-default.png'
						),
						'wpz_menu_left' => array(
							'label' => esc_html__('Menu on left side', 'inspiro'),
							'url' => '%sheader-left-menu.png'
						),
						'wpz_menu_center' => array(
							'label' => esc_html__('Menu on center', 'inspiro'),
							'url' => '%sheader-center-menu.png'
						),
						'wpz_menu_hamburger' => array(
							'label' => esc_html__('Hidden menu', 'inspiro'),
							'url' => '%sheader-hidden-menu.png'
						),
					)
				)
			)
		);

		$wp_customize->add_control(
			new Inspiro_Customize_Promo_Pro_Control(
				$wp_customize,
				'header-menu-pro-style',
				array(
					'label' => esc_html__('PRO', 'inspiro'),
					'section' => 'header-area',
					'choices' => array(
						'wpz_menu_left_logo_center' => array(
							'label' => esc_html__('Left menu with Logo Center', 'inspiro'),
							'url' => '%sheader-pro.png',
						),
						'wpz_menu_center_logo_center' => array(
							'label' => esc_html__('Center menu with Logo Center', 'inspiro'),
							'url' => '%sheader-pro-2.png',
						),
					)
				)
			)
		);

		// Add Controls
		$wp_customize->add_control(
			new Inspiro_Customize_Accordion_UI_Control(
				$wp_customize,
				'for-design-options',
				array(
					'type' => 'accordion-section-ui-wrapper',
					'label' => esc_html__('Header options', 'inspiro'),
					'settings' => array(),
					'section' => 'header-area',
					'accordion' => true,
					'controls_to_wrap' => 4,
				)
			)
		);

		$wp_customize->add_control(
			'header-layout-type',
			array(
				'label' => esc_html__('Header Menu Width', 'inspiro'),
				'type' => 'radio',
				'section' => 'header-area',
				'choices' => array(
					'wpz_layout_narrow' => esc_html__('Narrow', 'inspiro'),
					'wpz_layout_full' => esc_html__('Full-width', 'inspiro')
				),
			)
		);

		$wp_customize->add_control(
			'cover-size',
			array(
				'label' => esc_html__('Featured Image Height in Posts and Pages', 'inspiro'),
				'type' => 'radio',
				'section' => 'header-area',
				'choices' => array(
					'cover_fixed_height' => esc_html__('Fixed height', 'inspiro'),
					'cover_fullscreen' => esc_html__('Fullscreen', 'inspiro')
				),
			)
		);

		$wp_customize->add_control(
			'header_search_show',
			array(
				'type' => 'checkbox',
				'section' => 'header-area',
				'label' => esc_html__('Show Search Icon', 'inspiro'),
				'description' => esc_html__('Show search icon and search form in the header', 'inspiro'),
				'settings' => 'header_search_show',
			)
		);

		$wp_customize->add_control(
			'header_hide_main_menu',
			array(
				'type' => 'checkbox',
				'section' => 'header-area',
				'label' => esc_html__('Hide the top main menu', 'inspiro'),
				'description' => esc_html__('Hide the top main menu in desktop mode, displaying only the Hamburger icon', 'inspiro'),
				'settings' => 'header_hide_main_menu',
			)
		);

		// was moved in Color Panel
		// todo:clean
//		$wp_customize->add_control(
//			new WP_Customize_Color_Control(
//				$wp_customize,
//				'header_hamburger_icon_color',
//				array(
//					'label' => esc_html__('Hamburger Icon Color', 'inspiro'),
//					'section' => 'header-area',
//					'settings' => 'header_hamburger_icon_color',
//				)
//			)
//		);

//		$wp_customize->add_control(
//			new Inspiro_Customize_Title_Control(
//				$wp_customize,
//				'header_title_subsection',
//				array(
//					'label' => esc_html__('Elements', 'inspiro'),
//					'section' => 'header-area',
//				)
//			)
//		);

	}
}

new Inspiro_Header_Area_Config();
