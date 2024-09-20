<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'inspiro' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
	</header><!-- #masthead -->

    <?php
        $hero_show = inspiro_get_theme_mod( 'hero_enable' );
    ?>

	<?php
	// Display custom header only on first page.

    if (!is_page_template( 'page-templates/homepage-no-hero.php' )) {
    	if ( isset( $paged ) && $paged < 2 && $hero_show ) {
    		if ( is_front_page() && is_home() ) { // Default homepage.
    			get_template_part( 'template-parts/header/header', 'image' );
    		} elseif ( is_front_page() ) { // static homepage.
    			get_template_part( 'template-parts/header/header', 'image' );
    		} elseif ( is_page() && inspiro_is_frontpage()) {
    			get_template_part( 'template-parts/header/header', 'image' );
    		} elseif ( is_page_template( 'page-templates/homepage-builder-bb.php' ) ) {
    			get_template_part( 'template-parts/header/header', 'image' );
    		}
    	}
    }
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
