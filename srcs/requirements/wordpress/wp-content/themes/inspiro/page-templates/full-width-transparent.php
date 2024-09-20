<?php
/**
 * Template Name: Page Builder (Transparent Header, Without Title)
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

			<article id="post-<?php the_ID(); ?>">

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		</div><!-- .full-width -->

	<?php endwhile; // end of the loop. ?>

</main><!-- #main -->

<?php
get_footer();
