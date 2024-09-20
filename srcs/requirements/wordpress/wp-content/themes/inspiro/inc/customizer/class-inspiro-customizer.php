<?php
/**
 * Inspiro Lite: Customizer Class
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! class_exists( 'Inspiro_Customizer' ) ) {

	/**
	 * Help class for Customizer
	 */
	class Inspiro_Customizer {
		/**
		 * Store all customizer data
		 *
		 * @since 1.4.0
		 * @var array
		 */
		public static $customizer_data = array();

		/**
		 * Store all configuration class names
		 *
		 * @since 1.4.0
		 *
		 * @var array
		 */
		public $config_class_names = array();

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'store_customizer_data' ), 1 );

			add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );

			add_action( 'customize_register', array( $this, 'register_control_types' ), 2 );
			add_action( 'customize_register', array( $this, 'autoload_configuration_files' ), 3 );
			add_action( 'customize_register', array( $this, 'register_configurations' ), 10 );

			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ) );

			add_action( 'customize_controls_print_footer_scripts', array( $this, 'print_footer_scripts' ) );
		}

		/**
		 * Set customizer data
		 *
		 * @since 1.4.0
		 *
		 * @param string $setting_id Customizer setting id.
		 * @param array  $setting_args Customizer setting args.
		 * @return boolean
		 */
		public function set_customizer_data( $setting_id, $setting_args ) {
			if ( ! $setting_id || ! $setting_args ) {
				return false;
			}

			if ( ! isset( self::$customizer_data[ $setting_id ] ) ) {
				self::$customizer_data[ $setting_id ] = $setting_args;
			}

			return true;
		}

		/**
		 * Retrieves theme modification default value for the passed theme modification name.
		 *
		 * @since 1.4.0
		 *
		 * @param string $name Theme modification name.
		 * @return mixed
		 */
		public static function get_theme_mod_default_value( $name ) {
			if ( ! isset( self::$customizer_data[ $name ] ) ) {
				return false;
			}
			$default = inspiro_get_prop( self::$customizer_data[ $name ], 'default' );
			return $default;
		}

		/**
		 * All configuration files
		 *
		 * @since 1.4.0 Moved to class method all configuration files.
		 *
		 * @return array
		 */
		public static function configuration_files() {
			return array(
				'blog-post'      => array(
					'blog-post-panel',
					'post-options',
				),
				'colors'         => array(
					'color-general',
					'color-scheme',
					'color-header',
//					'header-button-color',
					'color-hero',
					'color-footer',
					'color-sidebar-widgets'
				),
                'header'         => array(
                    'header-area',
					'header_hamburger_icon_color'
                ),
				'footer'         => array(
//					'footer-design',
					'footer-widget-areas',
					'footer-copyright',
				),
				'homepage-media' => array(
					'homepage-media-panel',
					'homepage-media-media',
					'homepage-media-content',
				),
				'logo'           => array(
					'custom-logo-text',
				),
				'theme-layout'   => array(
					'theme-layout',
				),
				'typography'     => array(
					'typo-panel',
					'typo-body',
					'typo-logo',
					'typo-headings',
					// phpcs:disable Squiz.PHP.CommentedOutCode.Found
					// TODO: Enable all panels in the next update
					// 'typo-h1',
					// 'typo-h2',
					// 'typo-h3',
					// 'typo-h4',
					// 'typo-h5',
					// 'typo-h6'.
					// phpcs:enable Squiz.PHP.CommentedOutCode.Found
					'typo-main-menu',
					'typo-mobile-menu',
					'typo-hero-header-title',
					'typo-hero-header-desc',
					'typo-hero-header-button',
				),
			);
		}

		/**
		 * Register custom control types.
		 *
		 * @since 1.3.0
		 *
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 */
		public function register_control_types( $wp_customize ) {
			// phpcs:disable WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require INSPIRO_THEME_DIR . 'inc/customizer/customizer-sections.php';
			require INSPIRO_THEME_DIR . 'inc/customizer/customizer-controls.php';
			// phpcs:enable WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			/**
			 * Register sections
			 */
			$wp_customize->register_section_type( 'Inspiro_Customize_Section_Pro' );

			/**
			 * Add controls
			 */
			Inspiro_Customizer_Control_Base::register_custom_control(
				'inspiro-alpha-color-picker',
				array(
					'callback' => 'Inspiro_Customize_Alpha_Color_Picker_Control',
				)
			);

            Inspiro_Customizer_Control_Base::register_custom_control(
                'inspiro-pro-upsell',
                array(
                    // 'callback' => 'Inspiro_Customize_Pro_Upsell',
                )
            );

			Inspiro_Customizer_Control_Base::register_custom_control(
				'inspiro-range',
				array(
					'callback' => 'Inspiro_Customize_Range_Control',
				)
			);

			Inspiro_Customizer_Control_Base::register_custom_control(
				'inspiro-title',
				array(
					'callback' => 'Inspiro_Customize_Title_Control',
				)
			);

			Inspiro_Customizer_Control_Base::register_custom_control(
				'image-select',
				array(
					'callback' => 'Inspiro_Customize_Image_Select_Control',
				)
			);

			Inspiro_Customizer_Control_Base::register_custom_control(
				'promo-pro',
				array(
					'callback' => 'Inspiro_Customize_Promo_Pro_Control',
				)
			);

			Inspiro_Customizer_Control_Base::register_custom_control(
				'inspiro-typography',
				array(
					'callback'          => 'Inspiro_Customize_Typography_Control',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			Inspiro_Customizer_Control_Base::register_custom_control(
				'inspiro-font-variant',
				array(
					'callback'          => 'Inspiro_Customize_Font_Variant_Control',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			Inspiro_Customizer_Control_Base::register_custom_control(
				'accordion-section-ui-wrapper',
				array(
					'callback'          => 'Inspiro_Customize_Accordion_UI_Control',
				)
			);

			Inspiro_Customizer_Control_Base::register_custom_control(
				'custom-wp-editor',
				array(
					'callback' => 'Inspiro_Customize_Copyright_WP_Editor_Control',
				)
			);
		}

		/**
		 * Register all configurations for Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 */
		public function register_configurations( $wp_customize ) {
			/**
			 * Upgrade to Inspiro Premium
			 */
			$wp_customize->add_section(
				new Inspiro_Customize_Section_Pro(
					$wp_customize,
					'inspiro_upgrade_pro',
					array(
//						'title'       => esc_html__( 'Inspiro PRO Features', 'inspiro' ),
						'title'       => esc_html__( 'Upgrade to Inspiro Premium', 'inspiro' ),
						 'description' => esc_html__( 'Unlock premium features: 7 Style Kits, Video Backgrounds, Portfolio Integration, Premium Support and much more...', 'inspiro' ),
						'pro_text'    => esc_html__( 'View Inspiro Premium', 'inspiro' ),
//						'pro_text'    => esc_html__( 'Learn More', 'inspiro' ),
						'pro_url'     => 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=customizer&utm_campaign=bluebutton',
//						'demo_link_text'    => esc_html__( 'View Demos', 'inspiro' ),
//						'demo_link_url'     => '/wp-admin/themes.php?page=inspiro#demos',
						'priority'    => 10,
					)
				)
			);


			/**
			 * Custom changes of Core Settings
			 *
			 * @since 1.9.0
			 */
			// Change transport type for Header Text color.
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			// Change label text, was 'Header Text Color'
			$wp_customize->get_control( 'header_textcolor' )->label = 'Hero Text Color';

			// Change order priority
			$wp_customize->get_control( 'header_textcolor' )->priority = 13;
			$wp_customize->get_section( 'static_front_page' )->priority = 20;


			/**
			 * Fires to register all customizer custom panels, settings and controls
			 *
			 * @since 1.3.0
			 */
			do_action( 'inspiro/customize_register', $wp_customize, $this->config_class_names );
		}

		/**
		 * Autoload all customizer configuration files
		 *
		 * @since 1.4.0
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @return void
		 */
		public function autoload_configuration_files( $wp_customize ) {
			$configuration_files = self::configuration_files();

			// phpcs:disable WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			foreach ( $configuration_files as $folder_name => $files ) {
				foreach ( $files as $file_name ) {
					$class_name = str_replace( '-', '_', ucwords( "inspiro-{$file_name}-config", '-' ) ); // phpcs:ignore PHPCompatibility.FunctionUse.NewFunctionParameters.ucwords_delimitersFound

					if ( ! class_exists( $class_name ) ) {
						if ( file_exists( INSPIRO_THEME_DIR . "inc/customizer/configs/{$folder_name}/class-inspiro-{$file_name}-config.php" ) ) {
							require INSPIRO_THEME_DIR . "inc/customizer/configs/{$folder_name}/class-inspiro-{$file_name}-config.php";

							if ( method_exists( $class_name, 'config' ) && ! isset( $this->config_class_names[ $class_name ] ) ) {
								$this->config_class_names[ $class_name ] = (object) call_user_func_array( array( $class_name, 'config' ), array( $wp_customize ) ); // Call a callback with an array of parameters.
							}
						}
					}
				}
			}
			// phpcs:enable WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			/**
			 * Fires after all customizer configuration files are loaded.
			 * Pass array with configuration class names.
			 *
			 * @since 1.4.0
			 */
			do_action( 'inspiro/configuration-files-loaded', $this->config_class_names );
		}

		/**
		 * Store customizer data to static class variable
		 *
		 * @since 1.4.0
		 * @return array Array of customizer data.
		 */
		public function store_customizer_data() {
			global $wp_customize;

			// Only the execution of the action 'inspiro/configuration-files-loaded' is not fired.
			if ( 0 === did_action( 'inspiro/configuration-files-loaded' ) ) {
				$this->autoload_configuration_files( $wp_customize );
			}

			if ( ! is_array( $this->config_class_names ) || empty( $this->config_class_names ) ) {
				return;
			}

			foreach ( $this->config_class_names as $class_name => $configs ) {
				$setting = isset( $configs->setting ) ? $configs->setting : false;

				if ( ! $setting ) {
					continue;
				}

				$setting_id   = inspiro_get_prop( $setting, 'id' );
				$setting_args = inspiro_get_prop( $setting, 'args' );

				if ( $setting_id && $setting_args ) {
					$this->set_customizer_data( $setting_id, $setting_args );
				} else {
					foreach ( $setting as $_setting ) {
						$setting_id   = inspiro_get_prop( $_setting, 'id' );
						$setting_args = inspiro_get_prop( $_setting, 'args' );
						$this->set_customizer_data( $setting_id, $setting_args );
					}
				}
			}

			return apply_filters( 'inspiro/store_customizer_data', self::$customizer_data );
		}

		/**
		 * Bind JS handlers to instantly live-preview changes.
		 *
		 * @return void
		 */
		public function customize_preview_js() {
			wp_enqueue_script(
				'inspiro-customize-preview',
				inspiro_get_assets_uri( 'customize-preview', 'js' ),
				array( 'customize-preview' ),
				INSPIRO_THEME_VERSION,
				true
			);

			$selectors      = apply_filters( 'inspiro/dynamic_theme_css/selectors', array() );
			$localize_array = array(
				'googleFonts' => Inspiro_Font_Family_Manager::get_google_fonts(),
				'systemFonts' => Inspiro_Font_Family_Manager::get_system_fonts(),
				'selectors'   => $selectors,
			);

			wp_localize_script( 'inspiro-customize-preview', 'inspiroCustomizePreview', $localize_array );
		}

		/**
		 * Load dynamic logic for the customizer controls area.
		 *
		 * @return void
		 */
		public function enqueue_control_scripts() {
			wp_enqueue_script(
				'inspiro-customize-controls',
				inspiro_get_assets_uri( 'customize-controls', 'js' ),
				array( 'customize-controls' ),
				INSPIRO_THEME_VERSION,
				true
			);

			wp_enqueue_style(
				'inspiro-customize-controls',
				inspiro_get_assets_uri( 'customize-controls', 'css' ),
				array(),
				INSPIRO_THEME_VERSION
			);

			wp_localize_script(
				'inspiro-customize-controls',
				'inspiroCustomControl',
				apply_filters(
					'inspiro/customizer/js_localize',
					array(
						'customizer'  => array(
							'settings' => array(
								'google_fonts' => $this->generate_font_dropdown(),
							),
						),
						'font_weight' => Inspiro_Font_Family_Manager::get_all_font_weight(),
						'strings'     => array(
							'inherit' => __( 'Inherit', 'inspiro' ),
						),
					)
				)
			);
		}

		/**
		 * Generates HTML for font dropdown
		 *
		 * @link https://github.com/brainstormforce/astra/blob/663761d3419f25640af9b59e64384bd07f810bc4/inc/customizer/class-astra-customizer.php#L1265
		 *
		 * @return string
		 */
		public function generate_font_dropdown() {
			ob_start();

			?>

			<option value="inherit"><?php esc_html_e( 'Default System Font', 'inspiro' ); ?></option>
			<optgroup label="<?php esc_attr_e( 'System Fonts', 'inspiro' ); ?>">

			<?php

			$system_fonts = Inspiro_Font_Family_Manager::get_system_fonts();
			$google_fonts = Inspiro_Font_Family_Manager::get_google_fonts();

			foreach ( $system_fonts as $name => $variants ) {
				?>

				<option value="<?php echo esc_attr( $name ); ?>" ><?php echo esc_html( $name ); ?></option>
				<?php
			}

			?>
			<optgroup label="Google">

			<?php
			foreach ( $google_fonts as $name => $single_font ) {
				$variants = isset( $single_font[0] ) ? $single_font[0] : null;
				$category = isset( $single_font[1] ) ? $single_font[1] : null;

				?>
				<option value="<?php echo "'" . esc_attr( $name ) . "', " . esc_attr( $category ); ?>"><?php echo esc_html( $name ); ?></option>

				<?php
			}

			return ob_get_clean();
		}

		/**
		 * Print Footer Scripts
		 *
		 * @link https://github.com/brainstormforce/astra/blob/663761d3419f25640af9b59e64384bd07f810bc4/inc/customizer/class-astra-customizer.php#L286
		 *
		 * @since 1.3.0
		 * @return void
		 */
		public function print_footer_scripts() {
			$output  = '<script type="text/javascript">';
			$output .= Inspiro_Fonts_Manager::js();
			$output .= '</script>';

			echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

	}

}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Inspiro_Customizer::get_instance();
