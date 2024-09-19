<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

get_header(); ?>

<div class="inner-wrap">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Latest Posts', 'inspiro' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				// Start the Loop.
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that
					 * will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );
					endwhile;

				the_posts_pagination(
					array(
						'prev_next' => false,
					)
				);
				else :
					get_template_part( 'template-parts/post/content', 'none' );
				endif;

				?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if ( 'side-right' === inspiro_get_theme_mod( 'layout_blog_page' ) && is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</aside>
	<?php endif ?>

</div><!-- .inner-wrap -->

<?php
get_footer();
