<?php
/**
 * Template Name: Full-width (Page Builder)
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<div class="builder-wrap full-width">

			<?php get_template_part( 'template-parts/page/content', 'page' ); ?>

		</div><!-- .full-width -->

	<?php endwhile; // end of the loop. ?>

</main><!-- #main -->

<?php
get_footer();
