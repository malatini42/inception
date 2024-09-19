<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main container-fluid" role="main">

	<?php
	// Start the Loop.
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/post/content', get_post_format() );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		$previous_post = get_previous_post();

		if ( $previous_post ) {
			$prev_image     = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID ), 'inspiro-featured-image' );
			$previous_cover = '';

			if ( $prev_image && isset( $prev_image[0] ) ) {
				$previous_cover = '<div class="previous-cover" style="background-image: url(' . esc_url( $prev_image[0] ) . ')"></div>';

				echo '<div class="previous-post-cover">';

				the_post_navigation(
					array(
						'prev_text' => '<div class="previous-info">' . $previous_cover . '<div class="previous-content"><span class="screen-reader-text">' . __( 'Previous', 'inspiro' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'inspiro' ) . '</span> <span class="nav-title">%title</span></div></div>',
						'next_text' => '',
					)
				);

				echo '</div><!-- .previous-post-cover -->';
			}
		}
	endwhile; // End the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
