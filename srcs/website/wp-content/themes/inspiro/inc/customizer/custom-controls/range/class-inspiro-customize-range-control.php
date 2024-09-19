<?php
/**
 * Customize Range Control class.
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
	 * Range control with input.
	 */
	class Inspiro_Customize_Range_Control extends WP_Customize_Control {
		/**
		 * Type.
		 *
		 * @var string
		 */
		public $type = 'inspiro-range';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 */
		public function to_json() {
			parent::to_json();
			$this->json['defaultValue'] = $this->setting->default;
			$this->json['id']           = $this->id;
			$this->json['value']        = $this->value();
			$this->json['link']         = $this->get_link();
			$this->json['input_attrs']  = $this->input_attrs;
		}

		/**
		 * Render a JS template for the content of the range control.
		 */
		public function content_template() { ?>
			<label>
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
				<div class="customize-control-content">
					<input type="range" class="inspiro-control-range" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.value }}"/>
					<input type="number" class="inspiro-control-range-value" <# for (key in data.input_attrs) { #> {{ key }}="{{ data.input_attrs[ key ] }}" <# } #> value="{{ data.value }}" {{{ data.link }}} />
				</div>
			</label>
			<?php
		}
	}
}
