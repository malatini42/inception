<?php
/**
 * Custom header implementation
 *
 * @link       https://codex.wordpress.org/Custom_Headers
 *
 * @package    Inspiro
 * @subpackage Inspiro_Lite
 * @since      Inspiro 1.0.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses inspiro_header_style()
 */
function inspiro_custom_header_setup() {
	add_theme_support(
		'custom-header',
		/**
		 * Filters Inspiro Lite custom-header support arguments.
		 *
		 * @param   array  $args              {
		 *                                    An array of custom-header support arguments.
		 *
		 * @type string    $default           -image    Default image of the header.
		 * @type int       $width             Width in pixels of the custom header image. Default 954.
		 * @type int       $height            Height in pixels of the custom header image. Default 1300.
		 * @type string    $flex              -height      Flex support for height of header.
		 * @type string    $video             Video support for header.
		 * @type string    $wp                -head-callback Callback function used to styles the header image and text
		 *                                    displayed on the blog.
		 *                                    }
		 * @since Inspiro 1.0.0
		 *
		 */
		apply_filters(
			'inspiro_custom_header_args',
			array(
				'default-image' => get_parent_theme_file_uri('/assets/images/StockSnap_M6D1GS9PSL.jpg'),
				'width' => 2000,
				'height' => 1200,
				'flex-height' => true,
				'video' => true,
				'wp-head-callback' => 'inspiro_header_style',
			)
		)
	);

	register_default_headers(
		array(
			'default-image' => array(
				'url'           => '%s/assets/images/StockSnap_ECZV5RZKSZ.jpg',
				'thumbnail_url' => '%s/assets/images/StockSnap_ECZV5RZKSZ.jpg',
				'description'   => __( 'Default Header Image', 'inspiro' ),
			),
			'old-image'     => array(
				'url'           => '%s/assets/images/StockSnap_M6D1GS9PSL.jpg',
				'thumbnail_url' => '%s/assets/images/StockSnap_M6D1GS9PSL.jpg',
				'description'   => __( 'Ocean Header Image', 'inspiro' ),
			),
		)
	);
}

add_action( 'after_setup_theme', 'inspiro_custom_header_setup' );

if ( ! function_exists( 'inspiro_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see inspiro_custom_header_setup().
	 */
	function inspiro_header_style() {
		// general
		$color_general_h_tags = inspiro_get_theme_mod( 'color_general_h_tags' );
		$color_general_h1_tag = inspiro_get_theme_mod( 'color_general_h1_tag' );
		$color_general_h2_tag = inspiro_get_theme_mod( 'color_general_h2_tag' );
		$color_general_h3_tag = inspiro_get_theme_mod( 'color_general_h3_tag' );
		$color_general_h4_tag = inspiro_get_theme_mod( 'color_general_h4_tag' );
		$color_general_h5_tag = inspiro_get_theme_mod( 'color_general_h5_tag' );
		$color_general_h6_tag = inspiro_get_theme_mod( 'color_general_h6_tag' );

		$color_general_page_title = inspiro_get_theme_mod( 'color_general_page_title' );
		$color_general_post_title = inspiro_get_theme_mod( 'color_general_post_title' );
//		$color_general_entry_title        = inspiro_get_theme_mod( 'color_general_entry_title' ); // hidden for future ideea, create for all entry classes?
		$color_general_underline_text     = ''; //deactivated inspiro_get_theme_mod( 'color_general_underline_text' );
		$color_general_link_content       = inspiro_get_theme_mod( 'color_general_link_content' );
		$color_general_link_hover_content = inspiro_get_theme_mod( 'color_general_link_hover_content' );
		$color_general_entry_excerpt_text = inspiro_get_theme_mod( 'color_general_entry_excerpt_text' );
		$color_general_entry_content_text = inspiro_get_theme_mod( 'color_general_entry_content_text' );

		// header
		$color_header_custom_logo_text       = inspiro_get_theme_mod( 'color_header_custom_logo_text' );
		$color_header_custom_logo_hover_text = inspiro_get_theme_mod( 'color_header_custom_logo_hover_text' );
		$color_menu_search_icon_btn          = inspiro_get_theme_mod( 'color_menu_search_icon_btn' );
		$color_menu_hamburger_btn            = inspiro_get_theme_mod( 'color_menu_hamburger_btn' );
		$color_menu_background               = inspiro_get_theme_mod( 'color_menu_background' );
		$color_menu_background_scroll        = inspiro_get_theme_mod( 'color-menu-background-scroll' );
		$color_navbar_menu_background        = ''; // deactivated inspiro_get_theme_mod( 'color_navbar_menu_background' );

		// hero section
		$header_text_color              = get_header_textcolor(); // from old code, all Hero presentation text color
		$hero_color_only_hero_title     = inspiro_get_theme_mod( 'color_only_hero_title' );
		$header_button_text_color       = inspiro_get_theme_mod( 'header_button_textcolor' );
		$header_button_text_color_hover = inspiro_get_theme_mod( 'header_button_textcolor_hover' );
		$header_button_bg_color_hover   = inspiro_get_theme_mod( 'header_button_bgcolor_hover' );
		$hero_gradient_opacity_control  = inspiro_get_theme_mod( 'hero_gradient_opacity_control' );
		$color_scroll_to_content_arrow  = inspiro_get_theme_mod( 'color_scroll_to_content_arrow' );

		// sidebar
		$color_sidebar_widgets_background = inspiro_get_theme_mod( 'color_sidebar_widgets_background' );
		$color_sidebar_widgets_title      = inspiro_get_theme_mod( 'color_sidebar_widgets_title' );
		$color_sidebar_widgets_text       = inspiro_get_theme_mod( 'color_sidebar_widgets_text' );
		$color_sidebar_widgets_link       = inspiro_get_theme_mod( 'color_sidebar_widgets_link' );

		// footer
		$color_footer_background     = inspiro_get_theme_mod( 'color_footer_background' );
		$color_footer_text           = inspiro_get_theme_mod( 'color_footer_text' );
		$color_footer_copyright_text = inspiro_get_theme_mod( 'color_footer_copyright_text' );

		?>
		<style id="inspiro-custom-header-styles" type="text/css">
			<?php
			// Has the text been hidden?
			if ( 'blank' === $header_text_color ) : ?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php else : // If the user has set a custom color for the text use that. ?>
			.site-title a,
			.colors-dark .site-title a,
			.site-title a,
			body.has-header-image .site-title a,
			body.has-header-video .site-title a,
			body.has-header-image.colors-dark .site-title a,
			body.has-header-video.colors-dark .site-title a,
			body.has-header-image .site-title a,
			body.has-header-video .site-title a,
			.site-description,
			.colors-dark .site-description,
			.site-description,
			body.has-header-image .site-description,
			body.has-header-video .site-description,
			body.has-header-image.colors-dark .site-description,
			body.has-header-video.colors-dark .site-description,
			body.has-header-image .site-description,
			body.has-header-video .site-description {
				color: <?php echo maybe_hash_hex_color( $header_text_color ); ?>;
			}

			<?php endif; ?>

			<?php if ( 'blank' !== $header_button_text_color ) : ?>
			.custom-header-button {
				color: <?php echo maybe_hash_hex_color( $header_button_text_color ); ?>;
				border-color: <?php echo maybe_hash_hex_color( $header_button_text_color ); ?>;
			}

			<?php endif; ?>

			<?php if ( 'blank' !== $header_button_text_color_hover ) : ?>
			.custom-header-button:hover {
				color: <?php echo maybe_hash_hex_color( $header_button_text_color_hover ); ?>;
			}

			<?php endif; ?>

			<?php if ( '#0bb4aa' !== $header_button_bg_color_hover ) : ?>
			.custom-header-button:hover {
				background-color: <?php echo maybe_hash_hex_color( $header_button_bg_color_hover ); ?> !important;
				border-color: <?php echo maybe_hash_hex_color( $header_button_bg_color_hover ); ?> !important;
			}

			<?php endif; ?>

			<?php if ( '' !== $hero_color_only_hero_title ) : ?>
			.site-title a,
			.site-branding-text .site-title a,
			body.has-header-image .site-title a {
				color: <?php echo maybe_hash_hex_color( $hero_color_only_hero_title ); ?>
			}

			<?php endif; ?>

			<?php if ( '#101010' !== $color_menu_background ) : ?>
			.navbar {
				background-color: <?php echo maybe_hash_hex_color( $color_menu_background ); ?>;
			}

			<?php endif; ?>

			<?php if ( 'blank' !== $color_menu_background_scroll ) : ?>
			.headroom--not-top .navbar,
			.has-header-image.home.blog .headroom--not-top .navbar,
			.has-header-image.inspiro-front-page .headroom--not-top .navbar,
			.has-header-video.home.blog .headroom--not-top .navbar,
			.has-header-video.inspiro-front-page .headroom--not-top .navbar {
				background-color: <?php echo maybe_hash_hex_color( $color_menu_background_scroll ); ?>;
			}

			<?php endif; ?>

			<?php if ( '#ffffff' !== $color_menu_search_icon_btn ) : ?>
			.sb-search .sb-search-button-open .sb-icon-search .svg-icon,
			.sb-search .sb-search-button-close .sb-icon-search .svg-icon {
				fill: <?php echo $color_menu_search_icon_btn; ?>;
			}

			<?php endif; ?>

			<?php if ( '#ffffff' !== $color_menu_hamburger_btn ) : ?>
			.navbar-toggle .icon-bar {
				background: <?php echo $color_menu_hamburger_btn; ?>;
			}

			<?php endif; ?>

			<?php if ( '#ffffff' !== $color_header_custom_logo_text && inspiro_get_theme_mod( 'custom_logo_text' ) !== '' ) : ?>
			a.custom-logo-text {
				color: <?php echo $color_header_custom_logo_text; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_header_custom_logo_hover_text  ) : ?>
			a.custom-logo-text:hover {
				color: <?php echo $color_header_custom_logo_hover_text; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_navbar_menu_background ) : ?>
			.primary-menu-wrapper {
				background: <?php echo $color_navbar_menu_background; ?>;
			}

			<?php endif; ?>


			/* hero section */
			<?php if ( '' !== $color_scroll_to_content_arrow ) : ?>
			#scroll-to-content:before {
				border-color: <?php echo $color_scroll_to_content_arrow; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $hero_gradient_opacity_control ) : ?>
			.has-header-image .custom-header-media:before {
				background-image: linear-gradient(to bottom,
				rgba(0, 0, 0, <?php echo $hero_gradient_opacity_control ?>) 0%,
				rgba(0, 0, 0, 0.5) 100%);

				/*background-image: linear-gradient(to bottom, rgba(0, 0, 0, .7) 0%, rgba(0, 0, 0, 0.5) 100%)*/
			}


			<?php endif; ?>


			/* content */
			<?php if ( '' !== $color_general_link_content ) : ?>
			.entry-content a:not(.wp-element-button),
			.entry-summary a, .comment-content a, .posts-navigation a {
				color: <?php echo $color_general_link_content; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_link_hover_content ) : ?>
			.entry-content a:not(.wp-element-button):hover,
			.entry-summary a:hover, .comment-content a:hover, .posts-navigation a:hover {
				color: <?php echo $color_general_link_hover_content; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_underline_text ) : ?>
			.entry-content a:not(.wp-element-button),
			.entry-summary a, .comment-content a, .posts-navigation a {
				text-decoration-color: <?php echo $color_general_underline_text; ?>;
			}

			<?php endif; ?>


			/* sidebar */
			<?php if ( '#101010' !== $color_sidebar_widgets_background ) : ?>
			.side-nav__scrollable-container {
				background: <?php echo $color_sidebar_widgets_background; ?>;
			}

			<?php endif; ?>

			<?php if ( '#78787f' !== $color_sidebar_widgets_text  ) : ?>
			.side-nav__scrollable-container {
				color: <?php echo $color_sidebar_widgets_text; ?>;
			}

			<?php endif; ?>

			<?php if ( '#ffffff' !== $color_sidebar_widgets_title  ) : ?>
			.side-nav h2.wp-block-heading,
			.side-nav .widget .title {
				color: <?php echo $color_sidebar_widgets_title; ?>;
			}

			<?php endif; ?>

			<?php if ( '#0bb4aa' !== $color_sidebar_widgets_link  ) : ?>
			:root :where(.side-nav__wrap a:where(:not(.wp-element-button))) {
				color: <?php echo $color_sidebar_widgets_link; ?>;
			}

			<?php endif; ?>


			/* footer */
			<?php if ( '#101010' !== $color_footer_background ) : ?>
			.site-footer {
				background-color: <?php echo maybe_hash_hex_color( $color_footer_background ); ?>;
			}

			<?php endif; ?>

			<?php if ( '#78787f' !== $color_footer_text ) : ?>
			.site-footer {
				color: <?php echo maybe_hash_hex_color( $color_footer_text ); ?>;
			}

			<?php endif; ?>

			<?php if ( '#ffffff' !== $color_footer_copyright_text  ) : ?>
			.site-footer .copyright span:first-child {
				color: <?php echo $color_footer_copyright_text; ?>;
			}

			<?php endif; ?>


			/* general */
			<?php if ( '' !== $color_general_h_tags  ) : ?>
			h1, h2, h3, h4, h5, h6 {
				color: <?php echo $color_general_h_tags; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_h1_tag  ) : ?>
			h1 {
				color: <?php echo $color_general_h1_tag; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_h2_tag  ) : ?>
			h2 {
				color: <?php echo $color_general_h2_tag; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_h3_tag  ) : ?>
			h3 {
				color: <?php echo $color_general_h3_tag; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_h4_tag  ) : ?>
			h4 {
				color: <?php echo $color_general_h4_tag; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_h5_tag  ) : ?>
			h5 {
				color: <?php echo $color_general_h5_tag; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_h6_tag  ) : ?>
			h6 {
				color: <?php echo $color_general_h6_tag; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_page_title  ) : ?>
			.page .entry-title,
			.page.colors-dark .entry-title,
			.page.colors-custom .entry-title {
				color: <?php echo $color_general_page_title; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_post_title  ) : ?>
			.single-post .entry-title,
			.single-post.colors-dark .entry-title,
			.single-post.colors-custom .entry-title {
				color: <?php echo $color_general_post_title; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_entry_excerpt_text  ) : ?>
			.entry-summary > p {
				color: <?php echo $color_general_entry_excerpt_text; ?>;
			}

			<?php endif; ?>

			<?php if ( '' !== $color_general_entry_content_text  ) : ?>
			.entry-content {
				color: <?php echo $color_general_entry_content_text; ?>;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif; // End of inspiro_header_style().

/**
 * Customize video play/pause button in the custom header.
 *
 * @param   array  $settings  Video settings.
 *
 * @return array The filtered video settings.
 */
function inspiro_video_controls( $settings ) {
	$settings['l10n']['play']  = '<span class="screen-reader-text">' . __( 'Play background video', 'inspiro' ) . '</span>' . inspiro_get_theme_svg( 'play' );
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'inspiro' ) . '</span>' . inspiro_get_theme_svg( 'pause' );

	/**
	 * Change the minimum screen size to use the video header.
	 *
	 * @since 1.3.1
	 */
	$settings['minWidth']  = 100;
	$settings['minHeight'] = 100;

	/**
	 * Adds support for Vimeo to the video in the custom header.
	 *
	 * @see https://github.com/bradyvercher/custom-header-vimeo
	 */
	if ( preg_match( '#^https?://(.+\.)?vimeo\.com/.*#', $settings['videoUrl'] ) ) {
		$settings['mimeType'] = 'video/x-vimeo';
	}

	return $settings;
}

add_filter( 'header_video_settings', 'inspiro_video_controls' );

/**
 * Maybe enqueue custom header vimeo scripts
 */
function inspiro_maybe_enqueue_vimeo_handler() {
	if ( wp_script_is( 'wp-custom-header' ) ) {
		wp_enqueue_script(
			'wp-custom-header-vimeo',
			inspiro_get_assets_uri( 'custom-header-vimeo', 'js' ),
			array( 'wp-custom-header' ),
			INSPIRO_THEME_VERSION,
			true
		);
	}
}

add_action( 'wp_footer', 'inspiro_maybe_enqueue_vimeo_handler' );

/**
 * Filter extenal header video settting validity
 *
 * @param   boolean  $validity  Validity.
 * @param   string   $value     Video setting value.
 *
 * @return boolean
 */
function inspiro_filter_external_header_video_setting_validity( $validity, $value ) {
	if ( preg_match( '#^https?://(.+\.)?vimeo\.com/.*#', $value ) ) {
		return true;
	}

	return $validity;
}

add_filter( 'customize_validate_external_header_video', 'inspiro_filter_external_header_video_setting_validity', 11, 2 );

