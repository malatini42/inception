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
	 * Variant control.
	 */
	class Inspiro_Customize_Font_Variant_Control extends WP_Customize_Control {

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
		public $type = 'inspiro-font-variant';

		/**
		 * Used to connect variant controls to each other.
		 *
		 * @since 1.3.0
		 * @var bool $variant
		 */
		public $variant = false;

		/**
		 * Used to set the default font options.
		 *
		 * @since 1.3.0
		 * @var string $inspiro_inherit
		 */
		public $inspiro_inherit = '';

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
		 * @since 1.3.0
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
		 * COntent Template for the Control rendering.
		 *
		 * @see WP_Customize_Control::print_template()
		 * @since 1.3.0
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
		<select data-inherit="<?php echo esc_attr( $this->inspiro_inherit ); ?>" <?php $this->link(); ?>  multiple data-name="{{ data.id }}"
		data-value="{{data.value}}"

		<# if ( data.connect ) { #>
			data-connected-control={{ data.connect }}
		<# } #>
		<# if ( data.variant ) { #>
			data-connected-variant="{{data.variant}}"
		<# } #>

		>
			<?php
			$values = isset( $this->value ) ? explode( ',', $this->value() ) : array();
			foreach ( $values as $key => $value ) {
				echo '<option value="' . esc_attr( $value ) . '" selected="selected" >' . esc_html( $value ) . '</option>';
			}
			?>
		<input class="inspiro-font-variant-hidden-value" type="hidden" value="{{data.value}}">
		</select>
			<?php
		}
	}

}
