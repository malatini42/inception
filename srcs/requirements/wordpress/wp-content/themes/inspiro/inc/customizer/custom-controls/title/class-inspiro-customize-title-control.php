<?php
/**
 * Customize Section Title Control class.
 *
 * @package Inspiro
 * @since Inspiro 1.3.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

if (class_exists('WP_Customize_Control')) {

	/**
	 * Title control.
	 */
	class Inspiro_Customize_Title_Control extends WP_Customize_Control
	{
		/**
		 * Type.
		 *
		 * @var string
		 */
		public $type = 'section-title';

		/**
		 * Custom button text to output.
		 *
		 * @since  1.2.2
		 * @access public
		 * @var    string
		 */
		public $pro_text = '';

		/**
		 * Custom pro button URL.
		 *
		 * @since  1.2.2
		 * @access public
		 * @var    string
		 */
		public $pro_url = '';

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @return array
		 * @since  1.2.2
		 * @access public
		 */
		public function json()
		{
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url'] = esc_url($this->pro_url);
			$json['section_id'] = $this->id;

			return $json;
		}

		/**
		 * Render a JS template for the content of the section title control.
		 */
		public function content_template()
		{ ?>
			<# if ( typeof data.id === 'undefined' ) { data.id = data.section_id } #>

			<div id="accordion-section-{{ data.id }}"
				 class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<# if ( data.label ) { #>
				<h3 class="accordion-section-title">{{{ data.label }}}
					<# } #>
					<# if ( data.description ) { #>
					<span class="customize-action">{{{ data.description }}}</span>
					<# } #>

					<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary" target="_blank">{{ data.pro_text }}</a>
					<# } #>

				</h3>
			</div>
			<?php
		}
	}
}
