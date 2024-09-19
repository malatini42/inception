<?php
/**
 * Displays top navigation
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

$search_show        = get_theme_mod( 'header_search_show', true ); // here must have default true value
$search_display     = $search_show ? 'block' : 'none';

$header_layout_type = inspiro_get_theme_mod( 'header-layout-type' );
$header_menu_style  = inspiro_get_theme_mod( 'header-menu-style' );
$header_hide_menu_option  = inspiro_get_theme_mod( 'header_hide_main_menu' );

?>
<div id="site-navigation" class="navbar">
	<div class="header-inner inner-wrap <?php echo sanitize_html_class( $header_layout_type ); ?> <?php echo sanitize_html_class( $header_menu_style ); ?>">

		<div class="header-logo-wrapper">
			<?php inspiro_custom_logo(); ?>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div class="header-navigation-wrapper">
				<?php if ( !$header_hide_menu_option ) : ?>
				<nav class="primary-menu-wrapper navbar-collapse collapse" aria-label="<?php echo esc_attr_x( 'Top Horizontal Menu', 'menu', 'inspiro' ); ?>" role="navigation">
					<?php
						wp_nav_menu(
							array(
								'menu_class'     => 'nav navbar-nav dropdown sf-menu',
								'theme_location' => 'primary',
								'container'      => '',
							)
						);
					?>
				</nav>
				<?php endif ?>
			</div>
		<?php endif ?>

		<div class="header-widgets-wrapper">
			<?php if ( is_active_sidebar( 'header_social' ) ) : ?>
				<div class="header_social">
					<?php dynamic_sidebar( 'header_social' ); ?>
				</div>
			<?php endif ?>

			<div id="sb-search" class="sb-search" style="display: <?php echo esc_attr( $search_display ); ?>;">
				<?php get_template_part( 'template-parts/header/search', 'form' ); ?>
			</div>

			<?php if ( has_nav_menu( 'primary' ) || is_active_sidebar( 'sidebar' ) ) : ?>
				<button type="button" class="navbar-toggle">
					<span class="screen-reader-text">
						<?php esc_html_e( 'Toggle sidebar &amp; navigation', 'inspiro' ); ?>
					</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<?php endif ?>
		</div>
	</div><!-- .inner-wrap -->
</div><!-- #site-navigation -->
