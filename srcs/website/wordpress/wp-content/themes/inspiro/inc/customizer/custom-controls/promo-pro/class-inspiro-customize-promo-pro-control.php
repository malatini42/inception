<?php
/**
 * Customize Image Select Control class.
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
	class Inspiro_Customize_Promo_Pro_Control extends WP_Customize_Control {

		/**
		 * Type.
		 *
		 * @var string
		 */
		public $type = 'promo-pro';

		/**
		 * Enqueue JS and Css for the image select control.
		 *
		 * @access public
		 * @since  1.3.0
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_style( 'wpzoom-image-select', get_template_directory_uri() . '/inc/customizer/custom-controls/assets/vendors/image-picker/image-picker.css' );
		}

		/**
		 * Add custom JSON parameters to use in the JS template.
		 *
		 * @access public
		 * @since  1.3.0
		 * @return void
		 */
		public function to_json() {
			parent::to_json();

			// Create the image URL. Replaces the %s placeholder with the URL to the customizer /images/ directory.
			foreach ( $this->choices as $value => $args ) {
				$this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri() . '/inc/customizer/custom-controls/assets/images/' ) );
			}

			$this->json['choices'] = $this->choices;
			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
		}

		/**
		 * Render a JS template for the content of the section title control.
		 */
		public function content_template() { ?>
			<# if ( ! data.choices ) {
				return;
			} #>
			<div class="wpzoom-promo-container">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>

			<# for ( key in data.choices ) { #>
				<label for="{{ data.id }}-{{ key }}">
					<div class="wpzoom-image-select-container">
						<span class="screen-reader-text">{{ data.choices[ key ]['label'] }}</span>
						<input type="radio" value="{{ key }}" name="_customize-{{ data.type }}-{{ data.id }}" id="{{ data.id }}-{{ key }}" {{{ data.link }}} disabled="disabled" />
						<img src="{{ data.choices[ key ]['url'] }}" alt="{{ data.choices[ key ]['label'] }}" title="{{ data.choices[ key ]['label'] }}" />
					</div>
				</label>
			<# } #>
			</div>
			<?php
		}
	}
}
