<?php
/**
 * The sidebar containing the instagram widget
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

if ( ! is_active_sidebar( 'footer_instagram_section' ) ) {
	return;
}
?>

<section class="site-widgetized-section section-footer">
	<div class="widgets clearfix">
		<?php dynamic_sidebar( 'footer_instagram_section' ); ?>
	</div>
</section><!-- .site-widgetized-section -->

