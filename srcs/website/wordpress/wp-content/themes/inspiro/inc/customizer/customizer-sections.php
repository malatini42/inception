<?php
/**
 * Inspiro Lite: Customizer Sections.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$section_dir = INSPIRO_THEME_DIR . 'inc/customizer/custom-sections';

// phpcs:disable WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
require $section_dir . '/upgrade-pro/class-inspiro-customize-section-pro.php';
// phpcs:enable WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
