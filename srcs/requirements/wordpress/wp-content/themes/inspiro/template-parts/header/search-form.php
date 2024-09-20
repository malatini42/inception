<?php
/**
 * The template for displaying search form
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
	<label for="search-form-input">
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'inspiro' ); ?></span>
		<input type="search" class="sb-search-input" placeholder="<?php esc_attr_e( 'Type your keywords and hit Enter...', 'inspiro' ); ?>" name="s" id="search-form-input" autocomplete="off" />
	</label>
	<button class="sb-search-button-open" aria-expanded="false">
		<span class="sb-icon-search">
			<?php echo inspiro_get_theme_svg( 'search' ); ?>
		</span>
	</button>
	<button class="sb-search-button-close" aria-expanded="false">
		<span class="sb-icon-search">
			<?php echo inspiro_get_theme_svg( 'cross' ); ?>
		</span>
	</button>
</form>
