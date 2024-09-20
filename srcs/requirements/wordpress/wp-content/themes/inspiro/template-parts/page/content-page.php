<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

$cover_height = inspiro_get_theme_mod( 'cover-size' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/*
	 * If a regular page, and not the front page, show the featured image as header cover image.
	 */
	if ( ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) && has_post_thumbnail( get_the_ID() ) ) {
        echo '<div class="entry-cover-image '.$cover_height.'">';
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_the_ID(), 'inspiro-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	}
	?>

	<header class="entry-header">

		<?php

		if ( ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) && has_post_thumbnail( get_the_ID() ) ) {
			echo '<div class="inner-wrap">';
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '</div><!-- .inner-wrap -->';
		} else {
			echo '<div class="inner-wrap">';
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '</div><!-- .inner-wrap -->';
		}

		?>

	</header><!-- .entry-header -->

	<?php
	if ( ( is_single() || ( is_page() && ! inspiro_is_frontpage() ) ) && has_post_thumbnail( get_the_ID() ) ) {
		echo '</div><!-- .entry-cover-image -->';
	}
	?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'inspiro' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
