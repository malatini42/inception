<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function inspiro_body_classes( $classes ) {
	global $paged;

	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'inspiro-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'inspiro-front-page';
	}

	if ( $paged < 2 ) {

        $hero_show = inspiro_get_theme_mod( 'hero_enable' );


		// Add a class if there is a custom header.
		if ( is_front_page() && is_home() && $hero_show ) { // Default homepage.
			$classes[] = 'has-header-image';
		} elseif ( is_front_page() && $hero_show ) { // static homepage.
			$classes[] = 'has-header-image';
		} elseif ( is_page() && inspiro_is_frontpage() && $hero_show ) {
			$classes[] = 'has-header-image';
		}
		if ( is_page_template( 'page-templates/full-width-transparent.php' ) ) {
			$classes[] = 'has-header-image';
		}
		if ( is_page_template( 'page-templates/homepage-builder-bb.php' )  ) {
			$classes[] = 'has-header-image';
		}
	}

	// Add class if is single page and has post thumbnail.
	if ( is_page()  && has_post_thumbnail() ) {
		$classes[] = 'has-header-image';
	}

    $featured_image_show = inspiro_get_theme_mod( 'display_featured_image' );

    // Add class if is single post and has post thumbnail.
    if ( ( ( is_single() && 'post' === get_post_type() ) || ( is_single() && 'portfolio_item' === get_post_type() ) ) && has_post_thumbnail() && $featured_image_show ) {
        $classes[] = 'has-header-image';
    }

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'blog-sidebar' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}
	if ( is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'inspiro--with-page-nav';
	}

	// Add class for full width or sidebar right page layouts.
	if ( is_front_page() || is_home() ) {
		if ( 'full' === inspiro_get_theme_mod( 'layout_blog_page' ) ) {
			$classes[] = 'page-layout-full-width';
		} elseif ( 'side-right' === inspiro_get_theme_mod( 'layout_blog_page' ) && is_active_sidebar( 'blog-sidebar' ) ) {
			$classes[] = 'page-layout-sidebar-right';
		}
	}

	if ( is_single() ) {
		if ( 'full' === inspiro_get_theme_mod( 'layout_single_post' ) ) {
			$classes[] = 'page-layout-full-width';
		} elseif ( 'side-right' === inspiro_get_theme_mod( 'layout_single_post' ) && is_active_sidebar( 'blog-sidebar' ) ) {
			$classes[] = 'page-layout-sidebar-right';
		}
	}

	// Add class for display content.
	if ( inspiro_get_theme_mod( 'display_content' ) ) {
		$classes[] = 'post-display-content-' . esc_attr( inspiro_get_theme_mod( 'display_content' ) );
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	// Add class if has the archive descrption.
	if ( get_the_archive_description() ) {
		$classes[] = 'has-archive-description';
	}

	if ( inspiro_is_external_video_active() && inspiro_get_theme_mod( 'external_header_video_full_height' ) ) {
		$classes[] = 'full-height-iframe-video';
	}

	// Get the colorscheme or the default if there isn't one.
	$colors    = inspiro_sanitize_colorscheme( inspiro_get_theme_mod( 'colorscheme' ) );
	$classes[] = 'colors-' . $colors;

	return $classes;
}
add_filter( 'body_class', 'inspiro_body_classes' );

/**
 * Displays the class names for the footer element.
 *
 * @since 1.0.0
 * @see https://core.trac.wordpress.org/browser/tags/5.5.1/src/wp-includes/post-template.php#L586
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function inspiro_footer_class( $class = '' ) {
	// Separates class names with a single space, collates class names for footer element.
	echo 'class="' . esc_attr( join( ' ', inspiro_get_footer_class( $class ) ) ) . '"';
}

/**
 * Retrieves an array of the class names for the footer element.
 *
 * @since 1.0.0
 * @see https://core.trac.wordpress.org/browser/tags/5.5.1/src/wp-includes/post-template.php#L608
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function inspiro_get_footer_class( $class = '' ) {
	$classes            = array( 'site-footer' );
	$widgets_columns    = inspiro_get_theme_mod( 'footer-widget-areas' );
	$has_footer_widgets = false;

	if ( $widgets_columns > 0 ) {
		for ( $i = 0; $i <= intval( $widgets_columns ); $i++ ) { // phpcs:ignore Generic.CodeAnalysis.ForLoopWithTestFunctionCall.NotAllowed
			if ( $has_footer_widgets ) {
				$classes[] = 'has-footer-widgets';
				break;
			}
			$has_footer_widgets = is_active_sidebar( "footer_$i" );
		}
	}

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS footer class names.
	 *
	 * @since 1.0.0
	 *
	 * @param string[] $classes An array of footer class names.
	 * @param string[] $class   An array of additional class names added to the footer.
	 */
	$classes = apply_filters( 'inspiro_footer_class', $classes, $class );

	return array_unique( $classes );
}

/**
 * Render Footer Copyright Markup!
 */
function get_footer_copyright_text() {

	$site_title = get_bloginfo( 'name' );
	$current_year = date( 'Y' );

	// It’s essential to include a default value here,
	// which should match the one defined in class-inspiro-footer-copyright-config.php for consistency.
	$raw_content = get_theme_mod( 'footer_copyright_text_setting', 'Copyright {copyright} {current-year} {site-title}' );

	$raw_content = str_replace( '{copyright}', '&copy;', $raw_content );
	$raw_content = str_replace( '{current-year}', $current_year, $raw_content );
	$prepared_content = str_replace( '{site-title}', $site_title, $raw_content );

	return $prepared_content;
}

/**
 * Checks to see if we're on the front page or not.
 */
function inspiro_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @since 1.0.0
 *
 * @return void
 */
function inspiro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'inspiro_pingback_header' );
