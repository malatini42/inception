<?php
/**
 * Template part for displaying video posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/post/article/header' ); ?>

	<?php
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
		$content = apply_filters( 'the_content', get_the_content() );
		$video   = false;

		// Only get video from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) {
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
	}
	?>

	<div class="entry-content">

		<?php
		if ( ! is_single() ) {

			// If not a single post, highlight the video file.
			if ( ! empty( $video ) ) {
				foreach ( $video as $video_html ) {
					echo '<div class="entry-video">';
						echo wp_kses_post( $video_html );
					echo '</div>';
				}
			};
		};

		if ( is_single() || empty( $video ) ) {
			the_content(
				sprintf(
					/* translators: %s: Post title. */
					__( 'Read more<span class="screen-reader-text"> "%s"</span>', 'inspiro' ),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'inspiro' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				)
			);
		};
		?>

	</div><!-- .entry-content -->

	<?php if ( is_single() && 'side-right' === inspiro_get_theme_mod( 'layout_single_post' ) && is_active_sidebar( 'blog-sidebar' ) ) : ?>

		<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</aside>

	<?php endif ?>

	<?php
	if ( is_single() ) {
		inspiro_entry_footer();
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
