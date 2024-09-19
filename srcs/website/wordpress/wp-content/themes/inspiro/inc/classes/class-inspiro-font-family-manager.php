<?php
/**
 * Helper class for font settings
 *
 * @package Inspiro
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Inspiro_Font_Family_Manager' ) ) {

	/**
	 * Font Family class manager
	 */
	class Inspiro_Font_Family_Manager {

		/**
		 * System fonts
		 *
		 * @var array
		 */
		public static $system_fonts = array();

		/**
		 * Google fonts
		 *
		 * @var array
		 */
		public static $google_fonts = array();

		/**
		 * All available font weight
		 *
		 * @var array
		 */
		public static $font_weight = array();

		/**
		 * Font presets
		 *
		 * @var array
		 */
		public static $font_presets = array();

		/**
		 * Get System Fonts
		 *
		 * @return array All system fonts
		 */
		public static function get_system_fonts() {
			if ( empty( self::$system_fonts ) ) {
				self::$system_fonts = array(
                    'System Font Stack (sans-serif)'      => array(
                        'stack' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
                        'weights'  => array(
                            '100',
                            '200',
                            '300',
                            '400',
                            '500',
                            '600',
                            '700',
                            '800',
                            '900',
                        ),
                    ),
                    'Serif'           => array(
                        'stack' => '"Georgia", Times, "Times New Roman", serif',
                        'weights'  => array(
                            '400',
                            '500',
                            '600',
                            '700',
                            '800',
                        ),
                    ),
					'Arial'     => array(
						'stack' => 'Arial, Helvetica, sans-serif  ',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
					'Arial Black'     => array(
						'stack' => '"Arial Black", Arial, sans-serif',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
                    'Courier'   => array(
                        'stack' => 'Courier, monospace',
                        'weights'  => array(
                            '300',
                            '400',
                            '700',
                        ),
                    ),
                    'Courier New'     => array(
                        'stack' => '"Courier New", Courier, monospace',
                        'weights'  => array(
                            '400',
                            '700',
                        ),
                    ),
                    'Georgia'   => array(
                        'stack' => 'Georgia, serif',
                        'weights'  => array(
                            '300',
                            '400',
                            '700',
                        ),
                    ),
                    'Impact'          => array(
                        'stack' => 'Impact, Charcoal, sans-serif',
                        'weights'  => array(
                            '700',
                        ),
                    ),
					'Lucida Console'  => array(
                        'stack' => '"Lucida Console", Monaco, monospace',
                        'weights'  => array(
                            '400',
                            '700',
                        ),
                    ),
                    'Palatino Linotype'        => array(
                        'stack' => '"Palatino Linotype", Palatino, "Book Antiqua", serif',
                        'weights'  => array(
                            '400',
                            '700',
                        ),
                    ),
					'Times New Roman'     => array(
						'stack' => '"Times New Roman", Times, serif',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
					'Tahoma'          => array(
						'stack' => 'Tahoma, Geneva, sans-serif',
						'weights'  => array(
							'400',
							'700',
						),
					),
					'Trebuchet MS'    => array(
						'stack' => '"Trebuchet MS", Helvetica, sans-serif',
						'weights'  => array(
							'400',
							'700',
						),
					),
                    'Verdana'   => array(
                        'stack' => 'Verdana, Arial, sans-serif',
                        'weights'  => array(
                            '300',
                            '400',
                            '700',
                        ),
                    )
				);
			}

			return apply_filters( 'inspiro/system-fonts', self::$system_fonts );
		}

		/**
		 * Get Google Fonts
		 * Array is generated from the google-fonts.json file
		 *
		 * @return array All Google Fonts
		 */
		public static function get_google_fonts() {
			if ( empty( self::$google_fonts ) ) {
				$google_fonts_file = apply_filters( 'inspiro/google-fonts/php_file', INSPIRO_THEME_DIR . 'inc/google-fonts.php' );

				if ( ! file_exists( $google_fonts_file ) ) {
					return array();
				}

				$google_fonts_arr = include $google_fonts_file;// phpcs:ignore: WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

				foreach ( $google_fonts_arr as $key => $font ) {
					$name = key( $font );
					foreach ( $font[ $name ] as $font_key => $single_font ) {
						if ( 'variants' === $font_key ) {
							foreach ( $single_font as $variant_key => $variant ) {
								if ( 'regular' == $variant ) {
									$font[ $name ][ $font_key ][ $variant_key ] = '400';
								}
							}
						}

						self::$google_fonts[ $name ] = array_values( $font[ $name ] );
					}
				}
			}

			return apply_filters( 'inspiro/google-fonts', self::$google_fonts );
		}

		/**
		 * Get all font weight
		 *
		 * @return array Array of all font weight
		 */
		public static function get_all_font_weight() {
			if ( empty( self::$font_weight ) ) {
				self::$font_weight = array(
					'100'       => __( 'Thin 100', 'inspiro' ),
					'100italic' => __( '100 Italic', 'inspiro' ),
					'200'       => __( 'Extra-Light 200', 'inspiro' ),
					'200italic' => __( '200 Italic', 'inspiro' ),
					'300'       => __( 'Light 300', 'inspiro' ),
					'300italic' => __( '300 Italic', 'inspiro' ),
					'400'       => __( 'Normal 400', 'inspiro' ),
					'italic'    => __( '400 Italic', 'inspiro' ),
					'500'       => __( 'Medium 500', 'inspiro' ),
					'500italic' => __( '500 Italic', 'inspiro' ),
					'600'       => __( 'Semi-Bold 600', 'inspiro' ),
					'600italic' => __( '600 Italic', 'inspiro' ),
					'700'       => __( 'Bold 700', 'inspiro' ),
					'700italic' => __( '700 Italic', 'inspiro' ),
					'800'       => __( 'Extra-Bold 800', 'inspiro' ),
					'800italic' => __( '800 Italic', 'inspiro' ),
					'900'       => __( 'Ultra-Bold 900', 'inspiro' ),
					'900italic' => __( '900 Italic', 'inspiro' ),
				);
			}

			return apply_filters( 'inspiro/font-weight', self::$font_weight );
		}

		/**
		 * Get font weight for selected Font Family passed by setting key
		 *
		 * @param string               $setting_key The setting key name for Font Family control.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @return array
		 */
		public static function get_font_family_weight( $setting_key, $wp_customize ) {
			$font_family_weight = array(
				'' => __( 'Inherit', 'inspiro' ),
			);

			if ( ! is_object( $wp_customize->get_setting( $setting_key ) ) ) {
				return $font_family_weight;
			}

			$default            = $wp_customize->get_setting( $setting_key )->default;
			$select_font_family = get_theme_mod( $setting_key, $default );
			$font_family        = self::clean_google_fonts( $select_font_family );
			$all_font_weight    = self::get_all_font_weight();

			if ( isset( self::$google_fonts[ $font_family ][0] ) && is_array( self::$google_fonts[ $font_family ][0] ) ) {
				foreach ( self::$google_fonts[ $font_family ][0] as $font_weight ) {
					// Skip font variants (italic, i).
					if ( strpos( $font_weight, 'italic' ) === false || strpos( $font_weight, 'i' ) === false ) {
						$font_family_weight[ $font_weight ] = $all_font_weight[ $font_weight ];
					}
				}
			}

			return $font_family_weight;
		}

		/**
		 * Get font presets
		 *
		 * @return array Array of all font presets for Inspiro theme
		 */
		public static function get_font_presets() {
			if ( empty( self::$font_presets ) ) {
				self::$font_presets = array(
					array(
						'name'  => 'Default',
						'image' => 'system.png',
						'mods'  => array(
							'body-font-family'    => '',
							'body-font-size'      => '16',
							'body-font-weight'    => '400',
							'body-text-transform' => '',
							'body-line-height'    => '1.8',
							// TODO: add all settings here.
						),
					),
				); // TODO: add font presets.
			}

			return apply_filters( 'inspiro/font-presets', self::$font_presets );
		}

		/**
		 * Clean font name.
		 *
		 * Google Fonts are saved as {'Font Name', Category}. This function cleanes this up to retreive only the {Font Name}.
		 *
		 * @since  1.3.0
		 * @param string $font_value Name of the font.
		 *
		 * @return string Font name where commas and inverted commas are removed if the font is a Google Font.
		 */
		public static function clean_google_fonts( $font_value ) {
			// Bail if fontVAlue does not contain a comma.
			if ( strpos( $font_value, ',' ) === false ) {
				return $font_value;
			}

			$split_font        = explode( ',', $font_value );
			$google_font_value = str_replace( "'", '', $split_font[0] );

			// Check if the cleaned font exists in the Google fonts array.
			$google_fonts = self::get_google_fonts();
			if ( isset( $google_fonts[ $google_font_value ] ) ) {
				$font_value = $google_font_value;
			}

			return $font_value;
		}

	}

}
