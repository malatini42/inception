<?php
/**
 * Displays header button
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.2.5
 * @version 1.2.5
 */

?>
<div class="custom-header-button-wrapper">
	<?php
		$button_title     = inspiro_get_theme_mod( 'header_button_title' );
		$button_url       = inspiro_get_theme_mod( 'header_button_url' );
		$button_link_open = inspiro_get_theme_mod( 'header_button_link_open' );
		$button_target    = $button_link_open ? '_blank' : '_self';
		$button_display   = 'none';

	if ( ! empty( $button_title ) && ! empty( $button_url ) ) {
		$button_display = 'inline-block';
	}
	?>
	<a class="custom-header-button button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>" rel="nofollow" style="display: <?php echo esc_attr( $button_display ); ?>;">
		<?php echo esc_html( $button_title ); ?>
	</a>
</div><!-- .custom-header-button -->
