<?php
/**
 * Add upsell section to Customizer
 *
 * @package Inspiro
 * @since Inspiro 1.2.2
 */

/**
 * Pro customizer section.
 *
 * @since  1.2.2
 * @access public
 */
class Inspiro_Customize_Section_Pro extends WP_Customize_Section
{

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.2.2
	 * @access public
	 * @var    string
	 */
	public $type = 'upgrade-pro';

	/**
	 * Custom description text to output.
	 *
	 * @since  1.2.2
	 * @access public
	 * @var    string
	 */
	public $description = '';

	/**
	 * Custom buttons text to output.
	 *
	 * @since  1.2.2
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';
	public $demo_link_text = '';

	/**
	 * Custom buttons URL.
	 *
	 * @since  1.2.2
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';
	public $demo_link_url = '';

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

		$json['desription'] = $this->description;
		$json['pro_text'] = $this->pro_text;
		$json['pro_url'] = esc_url($this->pro_url);
		$json['demo_link_text'] = $this->demo_link_text;
		$json['demo_link_url'] = $this->demo_link_url;

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @return void
	 * @since  1.2.2
	 * @access public
	 */
	protected function render_template()
	{ ?>

		<li id="accordion-section-{{ data.id }}"
			class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.description ) { #>
				<span class="customize-action">{{ data.description }}</span>
				<# } #>

				<# if ( data.pro_text && data.pro_url ) { #>
				<a href="{{ data.pro_url }}" class="button button-primary" target="_blank">{{ data.pro_text }}</a>
				<# } #>

				<# if ( data.demo_link_text && data.demo_link_url ) { #>
				<a href="{{ data.demo_link_url }}" class="button view-demo-btn-link" target="_blank">
					{{ data.demo_link_text }}
				</a>
				<# } #>
			</h3>

		</li>
		<?php
	}
}
