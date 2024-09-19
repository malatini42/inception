<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

if ( ! function_exists( 'inspiro_single_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function inspiro_single_entry_meta() {
		$catlinks = '';

		/* translators: Used between list items, there is a space after the comma. */
		$separate_meta = __( ', ', 'inspiro' );

		// Get Categories for posts.
		$categories_list = get_the_category_list( $separate_meta );

		if ( inspiro_categorized_blog() && $categories_list ) {
			$catlinks = sprintf(
				'<span class="entry-categories cat-links">%s %s</span>',
				__( 'in', 'inspiro' ),
				$categories_list
			);
		}

		$byline = inspiro_author_link();

		$datetime = sprintf(
			'<span class="entry-date">%s %s</span>',
			__( 'on', 'inspiro' ),
			inspiro_time_link()
		);

		// Finally, let's write all of this to the page.
		echo wp_kses(
			$byline . $catlinks . $datetime,
			array(
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'class' => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
				'span' => array(
					'class' => array(),
				),
			) 
		);
	}
endif;

if ( ! function_exists( 'inspiro_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function inspiro_entry_meta() {
		$catlinks = '';

		/* translators: Used between list items, there is a space after the comma. */
		$separate_meta = __( ', ', 'inspiro' );

		// Get Categories for posts.
		$categories_list = get_the_category_list( $separate_meta );

		if ( inspiro_categorized_blog() && $categories_list ) {
			$catlinks = sprintf(
				'<span class="entry-categories cat-links">%s</span>',
				$categories_list
			);
		}

		$byline = inspiro_author_link();

		$datetime = sprintf(
			'<span class="entry-date">%s</span>',
			inspiro_time_link( false )
		);

		// Finally, let's write all of this to the page.
		echo wp_kses(
			$byline . $catlinks . $datetime,
			array(
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'class' => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
				'span' => array(
					'class' => array(),
				),
			) 
		);

		inspiro_comments_link();
		inspiro_edit_link();
	}
endif;

if ( ! function_exists( 'inspiro_author_link' ) ) {
	/**
	 * Get the author name; wrap it in a link.
	 */
	function inspiro_author_link() {
		return sprintf(
			'<span class="entry-author">%s <a class="url fn n" href="%s">%s</a></span>',
			__( 'by', 'inspiro' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}
}

if ( ! function_exists( 'inspiro_comments_link' ) ) {
	/**
	 * Displays the link to the comments for the current post.
	 */
	function inspiro_comments_link() {
		echo '<span class="entry-comments">';
		comments_popup_link(
			__( 'No Comments', 'inspiro' ),
			__( 'One Comment', 'inspiro' ),
			__( '% Comments', 'inspiro' ),
			'',
			__( 'Comments are Disabled', 'inspiro' )
		);
		echo '</span>';
	}
}

if ( ! function_exists( 'inspiro_time_link' ) ) :
	/**
	 * Gets a nicely formatted string for the published date
	 *
	 * @param boolean $link Display time as a link.
	 * @return string
	 */
	function inspiro_time_link( $link = true ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);

		if ( ! $link ) {
			return sprintf(
				/* translators: %s: Post date. */
				__( '<span class="screen-reader-text">Posted on</span> %s', 'inspiro' ),
				$time_string
			);
		}

		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: Post date. */
			__( '<span class="screen-reader-text">Posted on</span> %s', 'inspiro' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
endif;


if ( ! function_exists( 'inspiro_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags, share buttons and author.
	 */
	function inspiro_entry_footer() {
		echo '<footer class="entry-footer">';

		if ( 'post' === get_post_type() ) {
			the_tags(
				'<div class="tags-links"><h4 class="section-title">' . __( 'Tags', 'inspiro' ) . '</h4>',
				'<span class="separator">,</span>',
				'</div>'
			);

			echo sprintf(
				'<div class="post-author"><h4 class="section-title">%s</h4>%s<span>%s</span>%s</div>',
				esc_html__( 'Post author', 'inspiro' ),
				get_avatar( get_the_author_meta( 'ID' ), 65 ),
				esc_html__( 'Written by', 'inspiro' ),
				wp_kses_post( get_the_author_posts_link() )
			);
		}

		inspiro_edit_link();

		echo '</footer> <!-- .entry-footer -->';
	}
endif;


if ( ! function_exists( 'inspiro_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function inspiro_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Post title. */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'inspiro' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function inspiro_categorized_blog() {
	$category_count = get_transient( 'inspiro_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'inspiro_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}


/**
 * Flush out the transients used in inspiro_categorized_blog.
 */
function inspiro_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'inspiro_categories' );
}
add_action( 'edit_category', 'inspiro_category_transient_flusher' );
add_action( 'save_post', 'inspiro_category_transient_flusher' );

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backward compatibility to support pre-5.2.0 WordPress versions.
	 *
	 * @since Inspiro 1.0.0
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 * @since Inspiro 1.0.0
		 */
		do_action( 'wp_body_open' );
	}
endif;
