<?php
/**
 * Customize Font Presets Control class.
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
	 * Font presets control.
	 */
	class Inspiro_Customize_Font_Presets_Control extends WP_Customize_Control {
		/**
		 * Type.
		 *
		 * @var string
		 */
		public $type = 'inspiro-font-presets';

		/**
		 * Render the content of the font presets control.
		 */
		public function render_content() {
			$presets   = apply_filters( 'inspiro_font_presets', array() );
			$imagepath = INSPIRO_THEME_ASSETS_URI . '/images/font-presets/';
			?>

			<h4 class="inspiro-customize-section-title"><?php esc_html_e( 'Presets', 'inspiro' ); ?></h4>
			<p class="customize-control-description"><?php esc_html_e( 'Choosing a preset will override all the font settings.', 'inspiro' ); ?></p>

			<div class="inspiro-preset-panel">
				<h3 class="inspiro-preset-panel-title">
					<button type="button" class="inspiro-preset-panel-toggle" aria-expanded="false">
					<?php esc_html_e( 'View Presets', 'inspiro' ); ?>
					<span class="toggle-indicator" aria-hidden="true"></span>
					</button>
				</h3>
				<div class="inspiro-preset-list">
					<?php foreach ( $presets as $item ) { ?>
						<div class="inspiro-preset-item" tabindex="0" role="button" aria-label="<?php echo esc_attr( $item['name'] ); ?>" data-value="<?php echo esc_attr( $item['name'] ); ?>">
							<img src="<?php echo esc_url( $imagepath . $item['image'] ); ?>" alt="<?php echo esc_html( $item['name'] ); ?>"/>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}
}
