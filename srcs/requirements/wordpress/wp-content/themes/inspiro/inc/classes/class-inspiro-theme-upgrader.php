<?php
/**
 * Theme Upgrader: Helps to set all settings needed to upgrade to premium version
 *
 * @package    Inspiro
 * @subpackage Upgrader
 * @since      Inspiro 1.4.0
 */

/**
 * Theme Upgrader class for the Inspiro theme.
 *
 * @since 1.4.0
 */
class Inspiro_Theme_Upgrader {
	/**
	 * WP_Upgrader instance
	 *
	 * @var WP_Upgrader
	 */
	private $wp_upgrader;

	/**
	 * Current theme data
	 *
	 * @var array
	 */
	private $old_theme_data = array();

	/**
	 * Message strings
	 *
	 * @var array
	 */
	public $strings = array();

	/**
	 * Uploaded premium version.
	 *
	 * @var boolean
	 */
	private $uploaded_premium = false;

	/**
	 * Store attributes to insert new custom post type slider
	 *
	 * @var array
	 */
	public $slide_post_attr = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->generic_strings();

		add_filter( 'upgrader_source_selection', array( $this, 'set_upgrader_instance' ), 10, 4 );
		add_filter( 'upgrader_source_selection', array( $this, 'start_upgrader_process' ), 11, 4 );
		add_filter( 'install_theme_overwrite_comparison', array( $this, 'theme_overwrite_table' ), 10, 3 );
		add_filter( 'install_theme_overwrite_comparison', array( $this, 'multisite_overwrite' ), 11, 3 );
		add_filter( 'install_theme_overwrite_actions', array( $this, 'theme_overwrite_actions' ), 10, 3 );

		add_filter( 'install_theme_complete_actions', array( $this, 'set_inspiro_pro_theme' ), 10, 4 );

	}

	/**
	 * Check if the uploaded theme is Inspiro PRO.
	 *
	 */
	public function set_inspiro_pro_theme( $install_actions, $api, $stylesheet, $theme_info ) {

		if ( 'wpzoom-inspiro-pro' === $theme_info->template ) {
			$this->migrate_customizer_settings();
			$this->setup_slider_item();
			$this->set_upgrader_option();
		}

		return $install_actions;
	}

	/**
	 * Filters the source file location for the upgrade package.
	 *
	 * @param   string       $source         File source location.
	 * @param   string       $remote_source  Remote file source location.
	 * @param   WP_Upgrader  $upgrader       WP_Upgrader instance.
	 * @param   array        $hook_extra     Extra arguments passed to hooked filters.
	 */
	public function set_upgrader_instance( $source, $remote_source, $upgrader, $hook_extra ) {
		if ( isset( $hook_extra['type'] ) && 'theme' === $hook_extra['type'] ) {
			$this->wp_upgrader = $upgrader;
		}

		return $source;
	}

	/**
	 * Check new theme version to make sure we have premium version uploaded
	 *
	 * @param   array  $data  New theme data.
	 *
	 * @return boolean
	 */
	public function check_new_theme_version( $data ) {
		$whitelist_premium = array( 'Inspiro', 'Inspiro PRO' );
		if ( ! in_array( $data['Name'], $whitelist_premium ) ) {
			$this->uploaded_premium = false;

			return $this->uploaded_premium;
		}
		if ( version_compare( $data['Version'], '1.4.4', '>=' ) ) {
			$this->uploaded_premium = true;
		}

		return $this->uploaded_premium;
	}

	/**
	 * Add the generic strings.
	 */
	public function generic_strings() {
		$this->strings['migrate_customizer_settings'] = __( 'Migrate the Customizer settings to Inspiro Premium', 'inspiro' ) . '&hellip;';
		/* translators: %s: New slide title */
		$this->strings['setup_slider_item']           = __( 'Setup a new slider item with title: <strong>%s</strong>', 'inspiro' ) . '&hellip;';
		$this->strings['setup_slider_item_error']     = __( 'Something went wrong to create a new slider item!', 'inspiro' );
		$this->strings['create_temporary_slider_cpt'] = __( 'Create temporary custom post type Slider', 'inspiro' ) . '&hellip;';
	}

	/**
	 * Adds a new option after theme upgrader
	 * We may need to use it later in premium version
	 *
	 * @return void
	 */
	public function set_upgrader_option() {
		add_option( 'wpzoom_inspiro_upgrader_from_free', true );
	}

	/**
	 * The compare table output for overwriting a theme package on upload.
	 *
	 * @param   string  $table               The output table with Name, Version, Author, RequiresWP, and RequiresPHP info.
	 * @param   array   $current_theme_data  Array with current theme data.
	 * @param   array   $new_theme_data      Array with uploaded theme data.
	 *
	 * @return string The compare table output.
	 * @see WordPress Theme_Installer_Skin
	 *
	 */
	public function theme_overwrite_table( $table, $current_theme_data, $new_theme_data ) {
		$this->old_theme_data = $current_theme_data;

		if ( ! $this->check_new_theme_version( $new_theme_data ) ) {
			return $table;
		}

		$table .= '<h2 class="update-from-upload-heading">' . esc_html__( 'Click the "Replace active with uploaded" button below to complete the installation', 'inspiro' ) . '</h2>';
		/* translators: %1$s: Documentation URL. %2$s: Link title. */
		$table .= '<p class="update-from-upload-notice"><strong>' . esc_html__( 'Note:', 'inspiro' ) . '</strong> ' . sprintf( __( 'If you\'re having issues with your front page or the hero area after the upgrade, make sure to check the theme <a href="%1$s" target="_blank" title="%2$s">documentation</a> for setup instructions.', 'inspiro' ), 'https://www.wpzoom.com/documentation/inspiro/', esc_attr__( 'Open the Documentation', 'inspiro' ) ) . '</p>';

		return $table;
	}

	/**
	 * The compare table output for overwriting a theme package on upload.
	 *
	 * @param   string  $table               The output table with Name, Version, Author, RequiresWP, and RequiresPHP info.
	 * @param   array   $current_theme_data  Array with current theme data.
	 * @param   array   $new_theme_data      Array with uploaded theme data.
	 *
	 * @return string The compare table output.
	 * @see WordPress Theme_Installer_Skin
	 *
	 */
	public function multisite_overwrite( $table, $current_theme_data, $new_theme_data ) {
		// Check if user has uploaded .zip file from About Inspiro page.
		$display_select_network = isset( $_GET['payload'] ) && 'about-inspiro' === $_GET['payload']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( ! is_multisite() ) {
			return $table;
		}
		if ( ! $display_select_network || ! $this->check_new_theme_version( $new_theme_data ) ) {
			return $table;
		}

		$current_blog_id      = get_current_blog_id();
		$current_blog_details = get_blog_details( $current_blog_id );

		if ( ! empty( $current_blog_details ) ) {
			$table .= '<h2 class="update-from-upload-heading">' . esc_html__( 'Migrate settings for following blog site:', 'inspiro' ) . '</h2>';
			$table .= '<table class="update-from-upload-comparison"><tbody>';
			$table .= '<tr><th>' . __( 'Blogname', 'inspiro' ) . '</th><th>' . __( 'Site URL', 'inspiro' ) . '</th><th>' . __( 'Able to migrate', 'inspiro' ) . '</th></tr>';
			$table .= '<tr>';
			$table .= '<td>' . esc_html( $current_blog_details->blogname ) . '</td>';
			$table .= '<td><a href="' . esc_url( $current_blog_details->siteurl ) . '" target="_blank">' . esc_url( $current_blog_details->siteurl ) . '</a></td>';
			$table .= '<td>' . ( $current_blog_details->public ? '<span class="dashicons dashicons-yes"></span>' : '<span class="dashicons dashicons-no"></span>' ) . '</td>';
			$table .= '</tr>';
			$table .= '</tbody></table>';
		}

		return $table;
	}

	/**
	 * Filters the list of action links available following a single theme installation failure
	 * when overwriting is allowed.
	 *
	 * @param   string[]  $install_actions  Array of theme action links.
	 * @param   object    $api              Object containing WordPress.org API theme data.
	 * @param   array     $new_theme_data   Array with uploaded theme data.
	 */
	public function theme_overwrite_actions( $install_actions, $api, $new_theme_data ) {
		// Check if user has uploaded .zip file from About Inspiro page.
		$display_select_network = isset( $_GET['payload'] ) && 'about-inspiro' === $_GET['payload']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( ! is_multisite() ) {
			return $install_actions;
		}
		if ( ! $display_select_network || ! $this->check_new_theme_version( $new_theme_data ) ) {
			return $install_actions;
		}

		// TODO: maybe we will need some custom actions here.

		return $install_actions;
	}

	/**
	 * Filters the source file location for the upgrade package.
	 *
	 * @param   string       $source         File source location.
	 * @param   string       $remote_source  Remote file source location.
	 * @param   WP_Upgrader  $upgrader       WP_Upgrader instance.
	 * @param   array        $hook_extra     Extra arguments passed to hooked filters.
	 */
	public function start_upgrader_process( $source, $remote_source, $upgrader, $hook_extra ) {
		$overwrite = isset( $_GET['overwrite'] ) ? sanitize_text_field( wp_unslash( $_GET['overwrite'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( ( isset( $hook_extra['type'] ) && 'theme' === $hook_extra['type'] ) && 'update-theme' === $overwrite ) {
			// Allow migration only if premium version is overwrite.
			if ( $this->check_new_theme_version( $this->wp_upgrader->new_theme_data ) ) {
				$this->migrate_customizer_settings();
				$this->setup_slider_item();
				$this->set_upgrader_option();
			}
		}

		return $source;
	}

	/**
	 * Migrate Customizer settings to Inspiro Premium
	 *
	 * @return void
	 */
	public function migrate_customizer_settings() {
		global $_wp_default_headers;

		show_message( $this->strings['migrate_customizer_settings'] );

		$customizer_data      = Inspiro_Customizer::$customizer_data;
		$theme_mods           = get_theme_mods();
		$header_image_data    = inspiro_get_prop( $theme_mods, 'header_image_data' );
		$default_header_image = inspiro_get_prop( $_wp_default_headers, 'default-image' );
		$header_video_url     = get_header_video_url();
		$header_textcolor     = get_header_textcolor();

		if ( ! $header_image_data && $default_header_image ) {
			$url           = inspiro_get_prop( $default_header_image, 'url' );
			$thumbnail_url = inspiro_get_prop( $default_header_image, 'thumbnail_url' );
			$description   = inspiro_get_prop( $default_header_image, 'description' );

			// Receive absolute path url.
			$url = $url ? get_parent_theme_file_path( str_replace( '%s', '', $url ) ) : '';

			// Receive full path url.
			$thumbnail_url = $thumbnail_url ? get_parent_theme_file_uri( str_replace( '%s', '', $thumbnail_url ) ) : '';

			$header_image_data = array(
				'url'           => $url,
				'thumbnail_url' => $thumbnail_url,
				'description'   => $description,
			);
		} else {
			if ( is_array( $header_image_data ) ) {
				/**
				 * User has selected header image from registered default headers.
				 * In this case we need to convert 'url' to absolute path.
				 */
				$url = inspiro_get_prop( $header_image_data, 'url' );

				/**
				 * Removes the http or https protocols and the template directory domain.
				 * Keeps only root theme path with '/' at the beginning.
				 */
				$clear_url = str_replace( INSPIRO_THEME_URI, '/', $url );

				// Convert full URL path to absolute path.
				$url = get_parent_theme_file_path( $clear_url );

				$header_image_data['url'] = $url;
			}
		}

		// Hero Text Color for two options in Premium
		if ( 'blank' !== $header_textcolor ) {
			set_theme_mod( 'color-slider-title', maybe_hash_hex_color( $header_textcolor ) );
			set_theme_mod( 'color-slider-description', maybe_hash_hex_color( $header_textcolor ) );
		}


		// migrate options values
		foreach ( $customizer_data as $name => $args ) {
			$default       = inspiro_get_prop( $args, 'default' );
			$saved_setting = inspiro_get_prop( $theme_mods, $name );
			$theme_mod     = get_theme_mod( $name, $default );
			$name          = $this->sanitize_option_name( $name );

			if ( ! $saved_setting ) {
				set_theme_mod( $name, $theme_mod );
			}
			if ( strpos( $name, 'font-family' ) !== false ) {
				$font_family = Inspiro_Font_Family_Manager::clean_google_fonts( $theme_mod );
				set_theme_mod( $name, $font_family );
			}
			if ( strpos( $name, 'font-weight' ) !== false && '400' === $theme_mod ) {
				set_theme_mod( $name, 'normal' );
			}

			// --- Site Identity --- //
			if ( 'custom_logo_text' === $name ) {
				update_option( 'blogname', $theme_mod );
			}

			// --- Homepage Hero Area --- //
			// todo: check if it's ok
			// Hero Title
			if ( 'header_site_title' === $name ) {
				$this->slide_post_attr['post_title'] = $theme_mod;
			}
			// Hero Description
			if ( 'header_site_description' === $name ) {
				$this->slide_post_attr['post_content'] = $theme_mod;
			}
			// Hero Button Text
			if ( 'header_button_title' === $name ) {
				$this->slide_post_attr['wpzoom_slide_button_title'] = $theme_mod;
			}
			// Hero Button URL
			if ( 'header_button_url' === $name ) {
				$this->slide_post_attr['wpzoom_slide_url']        = $theme_mod;
				$this->slide_post_attr['wpzoom_slide_button_url'] = $theme_mod;
			}
			// Open link on new tab
			if ( 'header_button_link_open' === $name ) {
				$this->slide_post_attr['wpzoom_slide_button_url_open'] = $theme_mod;
			}


			// --- Colors Panel --- //
			// Colorscheme
			if ( 'colorscheme' === $name ) {
				if ( 'light' === $theme_mod ) {
					set_theme_mod( 'color-background', '#ffffff' );
					set_theme_mod( 'color-body-text', '#444444' );
				} elseif ( 'dark' === $theme_mod ) {
					set_theme_mod( 'color-background', '#222222' );
					set_theme_mod( 'color-body-text', '#eeeeee' );
					set_theme_mod( 'color-post-meta', '#777777' );
					set_theme_mod( 'color-post-meta-link', '#dddddd' );
					set_theme_mod( 'color-post-title', '#dddddd' );
				} elseif ( 'custom' === $theme_mod ) {
					$custom_color_hex = inspiro_get_theme_mod( 'colorscheme_hex' );
					set_theme_mod( 'color-accent', maybe_hash_hex_color( $custom_color_hex ) );
				}
			}

			// - General section - //
			// Page title
			if ( 'color_general_page_title' === $name ) {
				set_theme_mod( 'color-single-title', maybe_hash_hex_color( $theme_mod ) );
			}
			// Post title
			if ( 'color_general_post_title' === $name ) {
				set_theme_mod( 'color-post-title', maybe_hash_hex_color( $theme_mod ) );
			}
			// Post and Page text content
			if ( 'color_general_entry_content_text' === $name ) {
				set_theme_mod( 'color-single-content', maybe_hash_hex_color( $theme_mod ) );
			}
			// Content Link color
			if ( 'color_general_link_content' === $name ) {
				set_theme_mod( 'control-color-link', maybe_hash_hex_color( $theme_mod ) );
			}
			// Link color on hover
			if ( 'color_general_link_hover_content' === $name ) {
				set_theme_mod( 'color-link-hover', maybe_hash_hex_color( $theme_mod ) );
			}

			// - Header section - //
			// Custom Logo Text
			if ( 'color_header_custom_logo_text' === $name ) {
				set_theme_mod( 'color-logo', maybe_hash_hex_color( $theme_mod ) );
			}
			// Custom Logo Text on Hover
			if ( 'color_header_custom_logo_hover_text' === $name ) {
				set_theme_mod( 'color-logo-hover', maybe_hash_hex_color( $theme_mod ) );
			}
			// Search Icon Color
//			if ( 'color_menu_search_icon_btn' === $name ) {
//				set_theme_mod( 'color-menu-link', $theme_mod );
//			}
			// Hamburger Icon Color
			if ( 'color_menu_hamburger_btn' === $name ) {
				set_theme_mod( 'color-menu-hamburger', maybe_hash_hex_color( $theme_mod ) );
			}

			// - Header Menu section - //
			// Menu Background
			if ( 'color_menu_background' === $name ) {
				set_theme_mod( 'color-menu-background', maybe_hash_hex_color( $theme_mod ) );
			}
			// Menu Background on Scroll
			if ( 'menu-background-scroll' === $name ) {
				set_theme_mod( 'menu-background-scroll', maybe_hash_hex_color( $theme_mod ) );
			}

			// - Hero section - //
			// these values are transferred from hero to slider section
			// set only Hero Title Text Color
			if ( 'color_only_hero_title' === $name && 'color_only_hero_title' !== 'blank' ) {
				set_theme_mod( 'color-slider-title', maybe_hash_hex_color( $theme_mod ) );
			}
			// Hero Button Text Color
			if ( 'header_button_textcolor' === $name ) {
				set_theme_mod( 'color-slider-button-text', maybe_hash_hex_color( $theme_mod ) );
				set_theme_mod( 'color-slider-button-border', maybe_hash_hex_color( $theme_mod ) );
			}
			// Hero Button Text Color on Hover
			if ( 'header_button_textcolor_hover' === $name ) {
				set_theme_mod( 'color-slider-button-text-hover', maybe_hash_hex_color( $theme_mod ) );
			}
			// Hero Button Background Color on Hover
			if ( 'header_button_bgcolor_hover' === $name ) {
				set_theme_mod( 'color-slider-button-background-hover', maybe_hash_hex_color( $theme_mod ) );
				set_theme_mod( 'color-slider-button-border-hover', maybe_hash_hex_color( $theme_mod ) );
			}
			// Scroll to Content Arrow
			if ( 'color_scroll_to_content_arrow' === $name ) {
				set_theme_mod( 'color-slider-arrows', maybe_hash_hex_color( $theme_mod ) );
			}


			// - Sidebar and Widgets - //
			// Sidebar Background
			if ( 'color_sidebar_widgets_background' === $name ) {
				set_theme_mod( 'color-sidebar-background', maybe_hash_hex_color( $theme_mod ) );
			}
			// Widget Title
//			if ( '' === $name ) {
//				set_theme_mod( '', $theme_mod );
//			}
			// Widget Text
			if ( 'color_sidebar_widgets_text' === $name ) {
				set_theme_mod( 'color-sidebar-text', maybe_hash_hex_color( $theme_mod ) );
			}
			// Widget Link
			if ( 'color_sidebar_widgets_link' === $name ) {
				set_theme_mod( 'color-sidebar-link', maybe_hash_hex_color( $theme_mod ) );
			}

			// - Footer - //
			// Footer Background
			if ( 'color_footer_background' === $name ) {
				set_theme_mod( 'footer-background-color', maybe_hash_hex_color( $theme_mod ) );
			}
			// Footer Text Color
			if ( 'color_footer_text' === $name ) {
				set_theme_mod( 'footer-text-color', maybe_hash_hex_color( $theme_mod ) );
			}
			// Copyright Text Color
//			if ( 'color_footer_copyright_text' === $name ) {
//				set_theme_mod( '', $theme_mod );
//			}

		}

		if ( is_array( $header_image_data ) ) {
			$this->slide_post_attr['post_thumbnail_path_url'] = $header_image_data['url'];
		} elseif ( is_object( $header_image_data ) ) {
			$this->slide_post_attr['post_thumbnail_id'] = $header_image_data->attachment_id;
		}


		/**
		 * Check for external header video.
		 */
		if ( $header_video_url ) {
			$header_video_settings = get_header_video_settings();

			// Get header video mimeType.
			$mime_type = inspiro_get_prop( $header_video_settings, 'mimeType' );

			$this->slide_post_attr['wpzoom_slide_play_button']           = true;
			$this->slide_post_attr['wpzoom_slide_autoplay_video_action'] = true;

			if ( 'video/x-youtube' === $mime_type ) {
				$this->slide_post_attr['wpzoom_home_slider_video_type']         = 'external_hosted';
				$this->slide_post_attr['wpzoom_home_slider_video_external_url'] = $header_video_url;
			} elseif ( 'video/x-vimeo' === $mime_type ) {
				$this->slide_post_attr['wpzoom_home_slider_video_type']      = 'vimeo_pro';
				$this->slide_post_attr['wpzoom_home_slider_video_vimeo_pro'] = $header_video_url;
			} elseif ( 'video/mp4' === $mime_type ) {
				$this->slide_post_attr['wpzoom_home_slider_video_type']       = 'self_hosted';
				$this->slide_post_attr['wpzoom_home_slider_video_bg_url_mp4'] = $header_video_url;
			}
		}
	}

	/**
	 * Convert custom header media to custom post type slider
	 * This is necessary because premium version use slider items in header section on homepage
	 *
	 * @return void
	 */
	public function setup_slider_item() {
		$slider_cpt = $this->create_temporary_slider_cpt();

		if ( is_wp_error( $slider_cpt ) ) {
			show_message( $slider_cpt );

			return;
		}

		if ( empty( $this->slide_post_attr ) ) {
			return;
		}

		$slide_title              = inspiro_get_prop( $this->slide_post_attr, 'post_title' );
		$slide_content            = inspiro_get_prop( $this->slide_post_attr, 'post_content' );
		$slide_thumbnail_path_url = inspiro_get_prop( $this->slide_post_attr, 'post_thumbnail_path_url' );
		$slide_thumbnail_id       = inspiro_get_prop( $this->slide_post_attr, 'post_thumbnail_id' );

		show_message( sprintf( $this->strings['setup_slider_item'], $slide_title ) );

		$defaults = array(
			'post_title'   => '',
			'post_content' => '',
			'post_type'    => 'slider',
			'post_status'  => 'publish',
		);

		$data     = wp_parse_args( $this->slide_post_attr, $defaults );
		$slide_id = wp_insert_post( $data );

		if ( 0 === $slide_id ) {
			show_message( $this->strings['setup_slider_item_error'] );

			return;
		}

		/**
		 * Loop all Inspiro Premium slide meta settings.
		 */
		foreach ( $data as $meta_key => $meta_value ) {
			if ( strpos( $meta_key, 'wpzoom_' ) !== false ) {
				add_post_meta( $slide_id, $meta_key, $meta_value );
			}
		}

		if ( $slide_thumbnail_id ) {
			set_post_thumbnail( $slide_id, $slide_thumbnail_id );
		}
		if ( $slide_thumbnail_path_url ) {
			$this->set_slide_thumbnail( $slide_thumbnail_path_url, $slide_id );
		}
	}

	/**
	 * Set slide thumbnail
	 *
	 * @param   string      $image_url       The absolute path url to a default custom header image.
	 * @param   string|int  $parent_post_id  The ID of the post this attachment is for.
	 *
	 * @return void
	 */
	public function set_slide_thumbnail( $image_url, $parent_post_id ) {
		global $wp_filesystem;

		require_once ABSPATH . '/wp-admin/includes/file.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		WP_Filesystem();

		if ( ! $wp_filesystem->exists( $image_url ) ) {
			return;
		}

		// Get image data.
		$image_data = $wp_filesystem->get_contents( $image_url );

		$filename = basename( $image_url );

		// Check the type of file. We'll use this as the 'post_mime_type'.
		$wp_filetype = wp_check_filetype( basename( $filename ), null );

		// Get the path to the upload directory.
		$wp_upload_dir = wp_upload_dir();

		// Prepare an array of post data for the attachment.
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title'     => sanitize_file_name( $filename ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		);

		if ( wp_mkdir_p( $wp_upload_dir['path'] ) ) {
			$file = $wp_upload_dir['path'] . '/' . $filename;
		} else {
			$file = $wp_upload_dir['basedir'] . '/' . $filename;
		}

		$wp_filesystem->put_contents( $file, $image_data );

		// Insert the attachment.
		$attach_id = wp_insert_attachment( $attachment, $file, $parent_post_id );

		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		require_once ABSPATH . 'wp-admin/includes/image.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

		// Generate the metadata for the attachment, and update the database record.
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
		wp_update_attachment_metadata( $attach_id, $attach_data );

		set_post_thumbnail( $parent_post_id, $attach_id );
	}

	/**
	 * Create custom post type Slider
	 *
	 * @return WP_Post_Type|WP_Error The registered post type object on success, WP_Error object on failure.
	 */
	private function create_temporary_slider_cpt() {
		show_message( $this->strings['create_temporary_slider_cpt'] );

		$args = array(
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-slides',
			'show_in_rest'       => true,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'         => array( 'slide-category' ),
		);

		return call_user_func_array( 'register_post_type', array( 'slider', $args ) );
	}

	/**
	 * Sanitize customizer data option name
	 *
	 * @param   string  $option_name  Theme mod option name.
	 *
	 * @return string
	 */
	private function sanitize_option_name( $option_name ) {
		$logo_whitelist = array(
			'logo-font-family',
			'logo-font-variant',
			'logo-font-size',
			'logo-font-weight',
			'logo-text-transform',
			'logo-line-height'
		);
		if ( in_array( $option_name, $logo_whitelist ) ) {
			$option_name = str_replace( 'logo-', 'title-', $option_name );
		}

		return $option_name;
	}
}

new Inspiro_Theme_Upgrader();
