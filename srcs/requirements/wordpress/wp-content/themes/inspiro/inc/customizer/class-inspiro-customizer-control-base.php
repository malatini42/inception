<?php
/**
 * Inspiro Lite: Customizer Control Base
 *
 * @link https://github.com/brainstormforce/astra/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Base Class for Registering Customizer Controls.
 *
 * @since 1.3.0
 */
if ( ! class_exists( 'Inspiro_Customizer_Control_Base' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Inspiro_Customizer_Control_Base {

		/**
		 * Registered Controls.
		 *
		 * @since 1.3.0
		 * @var Array
		 */
		private static $controls;

		/**
		 * Registered Panels.
		 *
		 * @since 1.4.0
		 * @var Array
		 */
		private static $panels;

		/**
		 * Registered Sections.
		 *
		 * @since 1.4.0
		 * @var Array
		 */
		private static $sections;

		/**
		 * Registered Settings.
		 *
		 * @since 1.4.0
		 * @var Array
		 */
		private static $settings;

		/**
		 *  Constructor
		 */
		public function __construct() {
			add_action( 'inspiro/customize_register', array( $this, 'customize_controls_register_configs' ), 10, 2 );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Enqueue Admin Scripts
		 *
		 * @since 1.3.0
		 */
		public function enqueue_scripts() {
			wp_enqueue_style(
				'inspiro-custom-control-style',
				inspiro_get_assets_uri( 'custom-controls', 'css', 'inc/customizer/custom-controls/assets/' ),
				null,
				INSPIRO_THEME_VERSION
			);

			wp_enqueue_style(
				'select-woo',
				INSPIRO_THEME_URI . 'inc/customizer/custom-controls/typography/selectWoo.css',
				null,
				INSPIRO_THEME_VERSION
			);

			// Enqueue Customizer script.
			$custom_controls_deps = array(
				'jquery',
				'customize-base',
				'jquery-ui-tabs',
				'jquery-ui-sortable',
				'wp-i18n',
				'wp-components',
				'wp-element',
				'wp-media-utils',
				'wp-block-editor',
			);

			wp_enqueue_script(
				'inspiro-custom-control-script',
				inspiro_get_assets_uri( 'custom-controls', 'js', 'inc/customizer/custom-controls/assets/' ),
				$custom_controls_deps,
				INSPIRO_THEME_VERSION,
				true
			);
		}

		/**
		 * Add Control to self::$controls and Register control to WordPress Customizer.
		 *
		 * @param String $name Slug for the control.
		 * @param Array  $atts Control Attributes.
		 * @return void
		 */
		public static function register_custom_control( $name, $atts ) {
			global $wp_customize;
			self::$controls[ $name ] = $atts;

			if ( isset( $atts['callback'] ) ) {
				/**
				 * Register controls
				 */
				$wp_customize->register_control_type( $atts['callback'] );
			}
		}

		/**
		 * Returns control instance
		 *
		 * @param  string $control_type control type.
		 * @since 1.3.0
		 * @return string
		 */
		public static function get_control_instance( $control_type ) {
			$control_class = self::get_control( $control_type );

			if ( isset( $control_class['callback'] ) ) {
				return class_exists( $control_class['callback'] ) ? $control_class['callback'] : false;
			}

			return false;
		}

		/**
		 * Returns setting and its attributes
		 *
		 * @since 1.4.0
		 * @param  string $setting_id Setting id.
		 * @return array
		 */
		public static function get_setting( $setting_id ) {
			if ( isset( self::$controls[ $setting_id ] ) ) {
				return self::$controls[ $setting_id ];
			}

			return array();
		}

		/**
		 * Returns control and its attributes
		 *
		 * @param  string $control_type control type.
		 * @since 1.3.0
		 * @return array
		 */
		public static function get_control( $control_type ) {
			if ( isset( self::$controls[ $control_type ] ) ) {
				return self::$controls[ $control_type ];
			}

			return array();
		}

		/**
		 * Returns Santize callback for control
		 *
		 * @param  string $control control.
		 * @since 1.3.0
		 * @return string
		 */
		public static function get_sanitize_call( $control ) {
			if ( isset( self::$controls[ $control ]['sanitize_callback'] ) ) {
				return self::$controls[ $control ]['sanitize_callback'];
			}

			return false;
		}

		/**
		 * Register panels, sections, settings, controls.
		 *
		 * @since 1.4.0
		 *
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @param array                $configs All customize controls configs.
		 *
		 * @return void
		 */
		public function customize_controls_register_configs( $wp_customize, $configs ) {
			foreach ( $configs as $config ) {
				if ( ! is_object( $config ) ) {
					return;
				}
				if ( isset( $config->panel ) && is_array( $config->panel ) ) {
					$this->add_panel( $wp_customize, $config->panel['id'], $config->panel['args'] );
				}
				if ( isset( $config->section ) && is_array( $config->section ) ) {
					$this->add_section( $wp_customize, $config->section['id'], $config->section['args'] );
				}
				if ( isset( $config->setting ) && is_array( $config->setting ) ) {
					$this->add_settings( $wp_customize, $config->setting );
				}
				if ( isset( $config->control ) && is_array( $config->control ) ) {
					$this->add_controls( $wp_customize, $config->control );
				}
			}
		}

		/**
		 * Register Customizer panel.
		 *
		 * @since 1.4.0
		 *
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @param string               $panel_id Panel id.
		 * @param array                $panel_args Panel arguments.
		 * @return void
		 */
		public function add_panel( WP_Customize_Manager $wp_customize, $panel_id, $panel_args ) {
			if ( ! $panel_id || ! is_array( $panel_args ) ) {
				return;
			}

			self::$panels[ $panel_id ] = $panel_args;

			// Add panel.
			$wp_customize->add_panel(
				$panel_id,
				$panel_args
			);
		}

		/**
		 * Register Customizer section.
		 *
		 * @since 1.4.0
		 *
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @param string               $section_id Section id.
		 * @param array                $section_args Section arguments.
		 * @return void
		 */
		public function add_section( WP_Customize_Manager $wp_customize, $section_id, $section_args ) {
			if ( ! $section_id || ! is_array( $section_args ) ) {
				return;
			}

			self::$sections[ $section_id ] = $section_args;

			// Add section.
			$wp_customize->add_section(
				$section_id,
				$section_args
			);
		}

		/**
		 * Register Customizer settings.
		 *
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @param array                $settings Settings array.
		 * @return void
		 */
		private function add_settings( WP_Customize_Manager $wp_customize, $settings ) {
			if ( ! is_array( $settings ) ) {
				return;
			}

			$defaults = array(
				'type'                 => 'theme_mod',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '',
				'transport'            => 'postMessage',
				'sanitize_callback'    => '',
				'sanitize_js_callback' => '',
			);

			// Is not multidimensional array.
			if ( isset( $settings['id'] ) && isset( $settings['args'] ) ) {
				$setting_id   = $settings['id'];
				$setting_args = wp_parse_args( $settings['args'], $defaults );

				self::$settings[ $setting_id ] = $setting_args;

				// Add the setting arguments inline so Theme Check can verify the presence of sanitize_callback.
				$wp_customize->add_setting(
					$setting_id,
					array(
						'type'                 => $setting_args['type'],
						'capability'           => $setting_args['capability'],
						'theme_supports'       => $setting_args['theme_supports'],
						'default'              => $setting_args['default'],
						'transport'            => $setting_args['transport'],
						'sanitize_callback'    => $setting_args['sanitize_callback'],
						'sanitize_js_callback' => $setting_args['sanitize_js_callback'],
					)
				);
			} else {
				foreach ( $settings as $setting ) {
					$setting_id   = $setting['id'];
					$setting_args = wp_parse_args( $setting['args'], $defaults );

					self::$settings[ $setting_id ] = $setting_args;

					// Add the setting arguments inline so Theme Check can verify the presence of sanitize_callback.
					$wp_customize->add_setting(
						$setting_id,
						array(
							'type'                 => $setting_args['type'],
							'capability'           => $setting_args['capability'],
							'theme_supports'       => $setting_args['theme_supports'],
							'default'              => $setting_args['default'],
							'transport'            => $setting_args['transport'],
							'sanitize_callback'    => $setting_args['sanitize_callback'],
							'sanitize_js_callback' => $setting_args['sanitize_js_callback'],
						)
					);
				}
			}
		}

		/**
		 * Register Customizer controls.
		 *
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @param array                $controls Controls array.
		 * @return void
		 */
		private function add_controls( WP_Customize_Manager $wp_customize, $controls ) {
			if ( ! is_array( $controls ) ) {
				return;
			}

			// Is not multidimensional array.
			if ( isset( $controls['id'] ) && isset( $controls['args'] ) ) {
				$control_id   = $controls['id'];
				$control_args = $controls['args'];

				// Custom callback to get choices for control.
				if ( isset( $controls['callable_choices'] ) ) {
					/* callable_choices: callable function, function parameters */
					$control_args['choices'] = call_user_func_array( $controls['callable_choices'][0], $controls['callable_choices'][1] );
				}

				self::$controls[ $control_id ] = $control_args;

				// Check for a specialized control class.
				if ( isset( $controls['control_type'] ) ) {
					$class = $controls['control_type'];

					self::$controls[ $control_id ]['control_type'] = $class;

					// Attempt to autoload the class.
					$reflection = new ReflectionClass( $class );

					// If the class successfully loaded, create an instance in a PHP 5.2 compatible way.
					if ( class_exists( $class ) ) {
						// Dynamically generate a new class instance.
						$class_instance = $reflection->newInstanceArgs( array( $wp_customize, $control_id, $control_args ) );

						$wp_customize->add_control( $class_instance );
					}
				} else {
					$wp_customize->add_control( $control_id, $control_args );
				}
			} else {
				foreach ( $controls as $control ) {
					$control_id   = $control['id'];
					$control_args = $control['args'];

					// Custom callback to get choices for control.
					if ( isset( $control['callable_choices'] ) ) {
						/* callable_choices: callable function, function parameters */
						$control_args['choices'] = call_user_func_array( $control['callable_choices'][0], $control['callable_choices'][1] );
					}

					self::$controls[ $control_id ] = $control_args;

					// Check for a specialized control class.
					if ( isset( $control['control_type'] ) ) {
						$class = $control['control_type'];

						self::$controls[ $control_id ]['control_type'] = $class;

						// Attempt to autoload the class.
						$reflection = new ReflectionClass( $class );

						// If the class successfully loaded, create an instance in a PHP 5.2 compatible way.
						if ( class_exists( $class ) ) {
							// Dynamically generate a new class instance.
							$class_instance = $reflection->newInstanceArgs( array( $wp_customize, $control_id, $control_args ) );

							$wp_customize->add_control( $class_instance );
						}
					} else {
						$wp_customize->add_control( $control_id, $control_args );
					}
				}
			}
		}
	}
}

new Inspiro_Customizer_Control_Base();
