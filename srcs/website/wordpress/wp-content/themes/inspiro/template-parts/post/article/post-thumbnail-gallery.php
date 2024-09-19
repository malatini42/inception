<?php
/**
 * Template part for displaying article post thumbnail for gallery post format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && ! get_post_gallery() ) : ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'inspiro-loop' ); ?>
		</a>
	</div><!-- .post-thumbnail -->
<?php endif; ?>
