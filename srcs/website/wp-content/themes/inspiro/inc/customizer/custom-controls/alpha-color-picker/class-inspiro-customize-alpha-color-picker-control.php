<?php
/**
 * Customize Alpha Color Picker Control class.
 *
 * @package Inspiro
 * @since Inspiro 1.3.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Title control.
	 */
	class Inspiro_Customize_Alpha_Color_Picker_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @since 1.8.5
		 *
		 * @var string
		 */
		public $type = 'inspiro-alpha-color-picker';

		/**
		 * Enqueue JS and Css for the image select control.
		 *
		 * @access public
		 * @since  1.3.0
		 * @return void
		 */
		public function enqueue() {

			wp_enqueue_script( 
				'alpha-color-picker', 
				get_template_directory_uri() . '/inc/customizer/custom-controls/assets/vendors/alpha-color-picker/alpha-color-picker.js', 
				array( 'jquery', 'wp-color-picker' ),
				false, 
				true 
			);

			wp_enqueue_style( 
				'alpha-color-picker', 
				get_template_directory_uri() . '/inc/customizer/custom-controls/assets/vendors/alpha-color-picker/alpha-color-picker.css',
				array( 'wp-color-picker' )

			);

		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @since 1.7.1.
		 * @uses WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['defaultValue'] = $this->setting->default;
			$this->json['showOpacity']  = 'true';
			$this->json['palette']      = ! empty( $this->choices ) ? implode( '|', $this->choices ) : 'true';
			$this->json['value']        = $this->value();
		}

		/**
		 * Render a JS template for the content of the color picker control.
		 *
		 * @since 1.8.5
		 */
		public function content_template() { ?>

			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<div class="zoom-color-picker-container">
				<label>
					<input type="text" class="color-picker-hex zoom-alpha-color-picker" value="{{ data.value }}" data-palette="{{ data.palette }}" data-default-color="{{ data.defaultValue }}" data-show-opacity="{{ data.showOpacity }}" data-customize-setting-link="{{ data.settings.default }}" />
				</label>
			</div>

			<?php
		}
	
	}

}