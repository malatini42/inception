<?php
/**
 * Create Customized WP Editor Control
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.9.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

if (class_exists('WP_Customize_Control')) {

	/**
	 * WP Editor Control.
	 */
	class Inspiro_Customize_Copyright_WP_Editor_Control extends WP_Customize_Control
	{
		/**
		 * Control type.
		 *
		 * @since 1.9.0
		 * @var string $type
		 */
		public $type = 'copyright-wp-editor';

		/**
		 * Send data to _s
		 *
		 * @return array
		 * @see WP_Customize_Control::to_json()
		 */
		public function json()
		{
			$json = parent::json();
			$this->json['value'] = $this->value();

			return $json;
		}

		/**
		 * Prepare Custom WP Editor function
		 * @return mixed
		 *
		 * todo: improve to work without prepare_and_return_wp_editor_content(), directly in render or true JS
		 */
		public function prepare_and_return_wp_editor_content()
		{
			// If the editor is not already loaded, load it.
			if (!function_exists('wp_editor')) {
				require_once(ABSPATH . WPINC . '/class-wp-editor.php');
			}

			$settings = array(
				//	'textarea_name' => $this->id,
				'media_buttons' => false, // Show media upload buttons
				'textarea_rows' => 4,
				'teeny' => true, // Output the minimal editor config
				'quicktags' => true, // Show Quicktags (Text Mode),
				'tinymce' => array(
					'toolbar1' => 'bold,italic,underline,|,link,unlink', // Customize the toolbar
					'toolbar2' => '', // Leave empty to remove the second toolbar
					'wpautop' => false, // Disable auto-paragraphs, don't had effect
				),
			);
			return wp_editor(get_theme_mod('footer_copyright_text_setting'), 'footer_copyright_editor', $settings);
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
		protected function content_template()
		{
			?>

			<label>
				<span class="customize-control-title">{{ data.label }}</span>
			</label>

			<?php $this->prepare_and_return_wp_editor_content(); ?>
			<p class="description customize-control-description">
				{{ data.description }}
			</p>
			<?php
		}
	}
}
