<?php
/**
 * Displays header site branding
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>
<div class="site-branding">
	<div class="inner-wrap">
		<?php
			$site_title       = inspiro_get_theme_mod( 'header_site_title' );
			$description      = inspiro_get_theme_mod( 'header_site_description' );
			$button_url       = inspiro_get_theme_mod( 'header_button_url' );
			$button_link_open = inspiro_get_theme_mod( 'header_button_link_open' );
			$button_target    = $button_link_open ? '_blank' : '_self';
		?>

		<div class="site-branding-text">
			<?php
			$query['autofocus[panel]'] = 'homepage_media_panel';
			$section_link              = add_query_arg( $query, admin_url( 'customize.php' ) );
			?>

			<?php if ( ! is_customize_preview() && ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) ) { ?>
				<small class="edit-link"><a href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( '[Edit]', 'inspiro' ); ?></a></small>
			<?php } ?>

			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $site_title ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $site_title ); ?></a></p>
			<?php endif; ?>

			<?php
			if ( $description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div><!-- .site-branding-text -->

		<?php get_template_part( 'template-parts/header/header', 'button' ); ?>

	</div><!-- .inner-wrap -->
</div><!-- .site-branding -->
