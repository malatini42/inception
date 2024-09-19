<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

$inspiro_widgets_columns = inspiro_get_theme_mod( 'footer-widget-areas' );

if( 0 !== $inspiro_widgets_columns && empty( $inspiro_widgets_columns ) ) {
	$inspiro_widgets_columns = 3;
}

if ( $inspiro_widgets_columns <= 0 ) {
	return;
}
?>

<?php
if ( is_active_sidebar( 'footer_1' ) || is_active_sidebar( 'footer_2' ) || is_active_sidebar( 'footer_3' ) || is_active_sidebar( 'footer_4' ) ) :
	?>

	<aside class="footer-widgets widgets widget-columns-<?php echo intval( $inspiro_widgets_columns ); ?>" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'inspiro' ); ?>">

		<?php
		for ( $i = 0; $i <= intval( $inspiro_widgets_columns ); $i++ ) { // phpcs:ignore Generic.CodeAnalysis.ForLoopWithTestFunctionCall.NotAllowed
			if ( is_active_sidebar( "footer_$i" ) ) {
				?>
					<div class="widget-column footer-widget-<?php echo esc_attr( $i ); ?>">
					<?php dynamic_sidebar( "footer_$i" ); ?>
					</div>
				<?php
			}
		}
		?>

	</aside><!-- .widget-area -->

	<div class="site-footer-separator"></div>

<?php endif; ?>
