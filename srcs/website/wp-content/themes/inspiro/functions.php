<?php
/**
 * Inspiro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Inspiro
 * @since Inspiro 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'INSPIRO_THEME_VERSION', '1.9.2' );
define( 'INSPIRO_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'INSPIRO_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'INSPIRO_THEME_ASSETS_URI', INSPIRO_THEME_URI . 'dist' );

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require INSPIRO_THEME_DIR . 'inc/back-compat.php';
}

/**
 * Recommended Plugins
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-tgm-plugin-activation.php';

/**
 * Setup helper functions.
 */
require INSPIRO_THEME_DIR . 'inc/common-functions.php';

/**
 * Setup theme media.
 */
require INSPIRO_THEME_DIR . 'inc/theme-media.php';

/**
 * Enqueues scripts and styles
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-enqueue-scripts.php';

/**
 * Functions and definitions.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-after-setup-theme.php';

/**
 * Handle SVG icons.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-svg-icons.php';

/**
 * Implement the Custom Header feature.
 */
require INSPIRO_THEME_DIR . 'inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require INSPIRO_THEME_DIR . 'inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require INSPIRO_THEME_DIR . 'inc/template-functions.php';

/**
 * Custom template shortcode tags for this theme
 */
// require INSPIRO_THEME_DIR . 'inc/shortcodes.php';

/**
 * Customizer additions.
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-font-family-manager.php';
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-fonts-manager.php';
require INSPIRO_THEME_DIR . 'inc/customizer-functions.php';
require INSPIRO_THEME_DIR . 'inc/customizer/class-inspiro-customizer-control-base.php';
require INSPIRO_THEME_DIR . 'inc/customizer/class-inspiro-customizer.php';

/**
 * SVG icons functions and filters.
 */
require INSPIRO_THEME_DIR . 'inc/icon-functions.php';

/**
 * Theme admin notices and info page
 */
if ( is_admin() ) {
	require INSPIRO_THEME_DIR . 'inc/admin-notice.php';
	require INSPIRO_THEME_DIR . 'inc/theme-info-page.php';

	if ( current_user_can( 'manage_options' ) ) {
		require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notices.php';
		require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notice-review.php';
	}
}

/**
 * Theme Upgrader
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-theme-upgrader.php';

/**
 * Inline theme css generated dynamically
 */
require INSPIRO_THEME_DIR . 'inc/dynamic-css/body.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/logo.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/headings.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-title.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-desc.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/hero-header-button.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/main-menu.php';
require INSPIRO_THEME_DIR . 'inc/dynamic-css/mobile-menu.php';
