<?php
/**
 * Helper class for load google fonts to front-end
 *
 * @package Inspiro
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Inspiro_Fonts_Manager' ) ) {

	/**
	 * Fonts class manager
	 */
	class Inspiro_Fonts_Manager {

		/**
		 * Fonts to load
		 *
		 * @var array
		 */
		public static $fonts = array();

		/**
		 * Google Font URL
		 *
		 * @var string
		 */
		public static $google_font_url = '';

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
			add_action( 'init', array( $this, 'add_theme_fonts' ) );
		}

		/**
		 * Localize Fonts
		 */
		public static function js() {
			$system = wp_json_encode( Inspiro_Font_Family_Manager::get_system_fonts() );
			$google = wp_json_encode( Inspiro_Font_Family_Manager::get_google_fonts() );

			return 'var InspiroFontFamilies = { system: ' . $system . ', google: ' . $google . ' };';
		}

		/**
		 * Register all Fonts
		 *
		 * @return void
		 */
		public function add_theme_fonts() {
			/**
			 * Body
			 */

			$body_font_family   = inspiro_get_theme_mod( 'body-font-family' );
			$body_font_variants = inspiro_get_theme_mod( 'body-font-variant' );
			self::add_font( $body_font_family, $body_font_variants );

            /**
             * Logo
             */

            $body_font_family   = inspiro_get_theme_mod( 'logo-font-family' );
            $body_font_variants = inspiro_get_theme_mod( 'logo-font-variant' );
            self::add_font( $body_font_family, $body_font_variants );

			/**
			 * Headings
			 */

			$headings_font_family   = inspiro_get_theme_mod( 'headings-font-family' );
			$headings_font_variants = inspiro_get_theme_mod( 'headings-font-variant' );
			self::add_font( $headings_font_family, $headings_font_variants );

			/**
			 * Hero Header Title
			 */

			$hero_header_title_font_family   = inspiro_get_theme_mod( 'slider-title-font-family' );
			$hero_header_title_font_variants = inspiro_get_theme_mod( 'slider-title-font-variant' );
			self::add_font( $hero_header_title_font_family, $hero_header_title_font_variants );

			/**
			 * Hero Header Description
			 */

			$hero_header_desc_font_family   = inspiro_get_theme_mod( 'slider-text-font-family' );
			$hero_header_desc_font_variants = inspiro_get_theme_mod( 'slider-text-font-variant' );
			self::add_font( $hero_header_desc_font_family, $hero_header_desc_font_variants );

			/**
			 * Hero Header Button
			 */

			$hero_header_button_font_family   = inspiro_get_theme_mod( 'slider-button-font-family' );
			$hero_header_button_font_variants = inspiro_get_theme_mod( 'slider-button-font-variant' );
			self::add_font( $hero_header_button_font_family, $hero_header_button_font_variants );

			/**
			 * Main Menu
			 */

			$mainmenu_font_family   = inspiro_get_theme_mod( 'mainmenu-font-family' );
			$mainmenu_font_variants = inspiro_get_theme_mod( 'mainmenu-font-variant' );
			self::add_font( $mainmenu_font_family, $mainmenu_font_variants );

			/**
			 * Mobile Menu
			 */

			$mobilemenu_font_family   = inspiro_get_theme_mod( 'mobilemenu-font-family' );
			$mobilemenu_font_variants = inspiro_get_theme_mod( 'mobilemenu-font-variant' );
			self::add_font( $mobilemenu_font_family, $mobilemenu_font_variants );

			/**
			 * Other Font Variants
			 */

			$other_font_family   = array( "'Inter', sans-serif", "'Montserrat', sans-serif" );
			$other_font_variants = array( '200,300,500,600', '700' );

			foreach ( $other_font_family as $key => $font_name ) {
				self::add_font( $font_name, inspiro_get_prop( $other_font_variants, $key ) );
			}
		}

		/**
		 * Adds data to the $fonts array for a font to be rendered.
		 *
		 * @since 1.3.0
		 * @param string $name The name key of the font to add.
		 * @param array  $variants An array of weight variants.
		 * @return void
		 */
		public static function add_font( $name, $variants = array() ) {
			if ( 'inherit' == $name ) {
				return;
			}
			if ( ! is_array( $variants ) ) {
				// For multiple variant selectons for fonts.
				$variants = explode( ',', str_replace( 'italic', 'i', $variants ) );
			}

			if ( is_array( $variants ) ) {
				$key = array_search( 'inherit', $variants );
				if ( false !== $key ) {
					unset( $variants[ $key ] );

					if ( ! in_array( 400, $variants ) ) {
						$variants[] = 400;
					}
				}
			} elseif ( 'inherit' == $variants ) {
				$variants = 400;
			}

			if ( isset( self::$fonts[ $name ] ) ) {
				foreach ( (array) $variants as $variant ) {
					if ( ! in_array( $variant, self::$fonts[ $name ]['variants'] ) ) {
						self::$fonts[ $name ]['variants'][] = $variant;
					}
				}
			} else {
				self::$fonts[ $name ] = array(
					'variants' => (array) $variants,
				);
			}
		}

		/**
		 * Get fonts
		 *
		 * @return array
		 */
		public static function get_fonts() {
			do_action( 'inspiro/get_fonts' );
			return apply_filters( 'inspiro/add_fonts', self::$fonts );
		}

		/**
		 * Get google font url
		 *
		 * @return string
		 */
		public static function get_google_font_url() {
			return self::$google_font_url;
		}

		/**
		 * Renders the <link> tag for all fonts in the $fonts array.
		 *
		 * @since 1.3.0
		 * @return void
		 */
		public static function render_fonts() {

			global $wp_customizer;

			$enable_local_google_fonts = apply_filters( 'inspiro/local_google_fonts', true );

			$font_list = apply_filters( 'inspiro/render_fonts', self::get_fonts() );

			$google_fonts = array();
			$font_subset  = array();

			$system_fonts = Inspiro_Font_Family_Manager::get_system_fonts();

			foreach ( $font_list as $name => $font ) {
				if ( ! empty( $name ) && ! isset( $system_fonts[ $name ] ) ) {

					// Add font variants.
					$google_fonts[ $name ] = $font['variants'];

					// Add Subset.
					$subset = apply_filters( 'inspiro/font_subset', '', $name );
					if ( ! empty( $subset ) ) {
						$font_subset[] = $subset;
					}
				}
			}

			require_once get_theme_file_path( 'inc/classes/class-inspiro-wptt-webfont-loader.php' );

			self::$google_font_url = self::google_fonts_url( $google_fonts, $font_subset );

			$local_google_fonts_url = wptt_get_webfont_url( self::$google_font_url );

			if( $enable_local_google_fonts && ! $wp_customizer ) {
				wp_enqueue_style( 'inspiro-google-fonts', $local_google_fonts_url, array(), INSPIRO_THEME_VERSION, 'all' );
			}
			else {
				wp_enqueue_style( 'inspiro-google-fonts', self::$google_font_url, array(), INSPIRO_THEME_VERSION, 'all' );
			}

			
		}

		/**
		 * Google Font URL
		 * Combine multiple google font in one URL
		 *
		 * @link https://shellcreeper.com/?p=1476
		 * @param array $fonts      Google Fonts array.
		 * @param array $subsets    Font's Subsets array.
		 *
		 * @return string
		 */
		public static function google_fonts_url( $fonts, $subsets = array() ) {

			/* URL */
			$base_url  = 'https://fonts.googleapis.com/css';
			$font_args = array();
			$family    = array();

			$fonts = apply_filters( 'inspiro/google_fonts_selected', $fonts );

			/* Format Each Font Family in Array */
			foreach ( $fonts as $font_name => $font_weight ) {
				$font_name = str_replace( ' ', '+', $font_name );
				if ( ! empty( $font_weight ) ) {
					if ( is_array( $font_weight ) ) {
						$font_weight = implode( ',', $font_weight );
					}
					$font_family = explode( ',', $font_name );
					$font_family = str_replace( "'", '', inspiro_get_prop( $font_family, 0 ) );
					$family[]    = trim( $font_family . ':' . rawurlencode( trim( $font_weight ) ) );
				} else {
					$family[] = trim( $font_name );
				}
			}

			/* Only return URL if font family defined. */
			if ( ! empty( $family ) ) {

				/* Make Font Family a String */
				$family = implode( '|', $family );

				/* Add font family in args */
				$font_args['family'] = $family;

				/* Add font subsets in args */
				if ( ! empty( $subsets ) ) {

					/* format subsets to string */
					if ( is_array( $subsets ) ) {
						$subsets = implode( ',', $subsets );
					}

					$font_args['subset'] = rawurlencode( trim( $subsets ) );
				}

				$font_args['display'] = 'swap';

				$args = add_query_arg( $font_args, $base_url );

				return $args;
			}

			return '';
		}

	}

}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Inspiro_Fonts_Manager::get_instance();
