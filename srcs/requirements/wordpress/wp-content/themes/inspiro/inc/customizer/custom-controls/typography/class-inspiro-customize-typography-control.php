<?php
/**
 * Customize Typography Control class.
 *
 * @link https://github.com/brainstormforce/astra/
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
	 * Typography control.
	 */
	class Inspiro_Customize_Typography_Control extends WP_Customize_Control {

		/**
		 * Used to connect controls to each other.
		 *
		 * @since 1.3.0
		 * @var bool $connect
		 */
		public $connect = false;

		/**
		 * Option name.
		 *
		 * @since 1.3.0
		 * @var string $name
		 */
		public $name = '';

		/**
		 * Option label.
		 *
		 * @since 1.3.0
		 * @var string $label
		 */
		public $label = '';

		/**
		 * Option description.
		 *
		 * @since 1.3.0
		 * @var string $description
		 */
		public $description = '';

		/**
		 * Control type.
		 *
		 * @since 1.3.0
		 * @var string $type
		 */
		public $type = 'inspiro-font-family';

		/**
		 * Used to connect variant controls to each other.
		 *
		 * @since 1.5.2
		 * @var bool $variant
		 */
		public $variant = false;

		/**
		 * Used to set the mode for code controls.
		 *
		 * @since 1.3.0
		 * @var bool $mode
		 */
		public $mode = 'html';

		/**
		 * Used to set the default font options.
		 *
		 * @since 1.3.0
		 * @var string $inspiro_inherit
		 */
		public $inspiro_inherit = '';

		/**
		 * If true, the preview button for a control will be rendered.
		 *
		 * @since 1.3.0
		 * @var bool $preview_button
		 */
		public $preview_button = false;

		/**
		 * Set the default font options.
		 *
		 * @since 1.3.0
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    Default parent's arguments.
		 */
		public function __construct( $manager, $id, $args = array() ) {
			$this->inspiro_inherit = __( 'Inherit', 'inspiro' );
			parent::__construct( $manager, $id, $args );
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['label']       = esc_html( $this->label );
			$this->json['description'] = $this->description;
			$this->json['id']          = $this->id;
			$this->json['name']        = $this->name;
			$this->json['value']       = $this->value();
			$this->json['connect']     = $this->connect;
			$this->json['variant']     = $this->variant;
			$this->json['link']        = $this->get_link();
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function content_template() {
			?>

<label>
	<# if ( data.label ) { #>
		<span class="customize-control-title">{{{data.label}}}</span>
		<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{data.description}}}</span>
				<# } #>

</label>

<select data-inherit="<?php echo esc_attr( $this->inspiro_inherit ); ?>" <?php $this->link(); ?> class="{{ data.font_type }}" data-name="{{ data.id }}" data-value="{{data.value}}" <# if ( data.connect ) { #>data-connected-control={{ data.connect }}<# } #> <# if ( data.variant ) { #>data-connected-variant="{{data.variant}}"<# } #>>
</select>

			<?php
		}
	}

}
