<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

<?php if ( have_comments() ) : ?>

	<h3><?php comments_number( __( 'No Comments', 'inspiro' ), __( 'One Comment', 'inspiro' ), __( '% Comments', 'inspiro' ) ); ?></h3>

	<ol class="commentlist">
		<?php
			/*
			 * Loop through and list the comments. Tell wp_list_comments()
			 * to use inspiro_comment() to format the comments.
			 * If you want to overload this in a child theme then you can
			 * define inspiro_comment() and that will be used instead.
			 * See inspiro_comment() in inc/common-functions.php for more.
			 */
			wp_list_comments( array( 'callback' => 'inspiro_comment' ) );
		?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="navigation">
			<?php
			paginate_comments_links(
				array(
					'prev_text' => '' . __( '<span class="meta-nav">&larr;</span> Older Comments', 'inspiro' ) . '',
					'next_text' => '' . __(
						'Newer Comments <span class="meta-nav">&rarr;</span>',
						'inspiro'
					) . '',
				)
			);
			?>
		</div><!-- .navigation -->
	<?php endif; // check for comment navigation. ?>


	<?php
	else : // or, if we don't have comments.

		/*
		 * If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */
		if ( ! comments_open() ) :
			?>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'inspiro' ); ?></p>
	<?php endif; ?>

<?php endif; // end have_comments(). ?>

<?php

$commenter = wp_get_current_commenter();
$req       = get_option( 'require_name_email' );
$aria_req  = ( $req ? " aria-required='true'" : '' );
$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

$custom_comment_form = array(
	'fields'             => apply_filters(
		'comment_form_default_fields',
		array(
			'author'  => '<div class="form_fields"><p class="comment-form-author">' .
					'<label for="author">' . __( 'Name:', 'inspiro' ) . '</label> ' .
					'<input id="author" name="author" type="text" value="' .
					esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="required" />' .
					'' .
					'</p>',
			'email'   => '<p class="comment-form-email">' .
					'<label for="email">' . __( 'Email Address:', 'inspiro' ) . '</label> ' .
					'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="required email" />' .
					'' .
					'</p>',
			'url'     => '<p class="comment-form-url">' .
					'<label for="url">' . __( 'Website:', 'inspiro' ) . '</label> ' .
					'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' />' .
					'</p></div><div class="clear"></div>',
			'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
						'<label for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.', 'inspiro' ) . '</label></p>',
		)
	),
	'comment_field'      => '<p class="comment-form-comment">' .
			'<label for="comment">' . __( 'Message:', 'inspiro' ) . '</label> ' .
			'<textarea id="comment" name="comment" cols="35" rows="5" aria-required="true" class="required"></textarea>' .
			'</p><div class="clear"></div>',
	/* translators: %1$s: admin url to profile %2$s: User identity %3$s: logout URL */
	'logged_in_as'       => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>', 'inspiro' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	'title_reply'        => __( 'Leave a Comment', 'inspiro' ),
	'cancel_reply_link'  => __( 'Cancel', 'inspiro' ),
	'label_submit'       => __( 'Post Comment', 'inspiro' ),
	'comment_form_after' => '<div class="clear"></div>',
);
comment_form( $custom_comment_form );
?>

</div><!-- #comments -->
