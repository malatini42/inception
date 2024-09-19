<?php
/**
 * Template part for displaying article post thumbnail for video post format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

<?php
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
	$content = apply_filters( 'the_content', get_the_content() );
	$video   = false;

	// Only get video from the content if a playlist isn't present.
if ( false === strpos( $content, 'wp-playlist-script' ) ) {
	$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
}
?>

<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $video ) ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'inspiro-loop' ); ?>
		</a>
	</div><!-- .post-thumbnail -->
<?php endif; ?>
