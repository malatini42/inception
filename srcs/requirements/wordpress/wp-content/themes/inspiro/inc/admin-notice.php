<?php
/**
 * Admin notice after Theme activation
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'inspiro_admin_notice' ) ) {
	/**
	 * Welcome Notice after Theme Activation
	 *
	 * @return void
	 */
	function inspiro_admin_notice() {
		global $pagenow, $inspiro_version;

		$welcome_notice        = get_option( 'inspiro_notice_welcome' );
		$current_user_can      = current_user_can( 'edit_theme_options' );
		$should_display_notice = ( $current_user_can && 'index.php' === $pagenow && ! $welcome_notice ) || ( $current_user_can && 'themes.php' === $pagenow && isset( $_GET['activated'] ) && ! $welcome_notice ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( $should_display_notice ) {
			wp_enqueue_style(
				'inspiro-admin-notice',
				inspiro_get_assets_uri( 'welcome-notice', 'css' ),
				array(),
				INSPIRO_THEME_VERSION
			);

			inspiro_welcome_notice();
		}
	}
}
add_action( 'admin_notices', 'inspiro_admin_notice' );

if ( ! function_exists( 'inspiro_hide_notice' ) ) {
	/**
	 * Hide Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function inspiro_hide_notice() {
		if ( isset( $_GET['inspiro-hide-notice'] ) && isset( $_GET['_inspiro_notice_nonce'] ) ) {
			if ( ! check_admin_referer( 'inspiro_hide_notices_nonce', '_inspiro_notice_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'inspiro' ) );
			}

			if ( ! current_user_can( 'edit_theme_options' ) ) {
				wp_die( esc_html__( 'You do not have the necessary permission to perform this action.', 'inspiro' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['inspiro-hide-notice'] ) );
			update_option( 'inspiro_notice_' . $hide_notice, 1 );
		}
	}
}
add_action( 'wp_loaded', 'inspiro_hide_notice' );

if ( ! function_exists( 'inspiro_welcome_notice' ) ) {
	/**
	 * Content of Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function inspiro_welcome_notice() {
		?>
		<div class="notice wpz-welcome-notice">
			<a class="notice-dismiss wpz-welcome-notice-hide" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'inspiro-hide-notice', 'welcome' ) ), 'inspiro_hide_notices_nonce', '_inspiro_notice_nonce' ) ); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__( 'Dismiss this notice.', 'inspiro' ); ?>
				</span>
			</a>

            <div class="wpz-notice-image">
                <a href="https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=adminnotice&utm_campaign=welcome-banner" title="Inspiro Premium" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-top.png' ); ?>" width="233" alt="<?php echo esc_attr__( 'Inspiro Premium', 'inspiro' ); ?>" /></a>
            </div>

            <div class="wpz-notice-text">

                <h3><?php echo esc_html__( 'Discover Inspiro Lite!', 'inspiro' ); ?></h3>
    			<p>
    			<?php
    			/* translators: %1$s: Inspiro theme %2$s: anchor tag open %3$s: anchor tag close */
    			printf( esc_html__( 'Thank you for installing %1$s Lite theme! To get started please make sure you visit the new %2$swelcome page%3$s.', 'inspiro' ), 'Inspiro', '<a href="' . esc_url( admin_url( 'themes.php?page=inspiro' ) ) . '">', '</a>' );
    			?>
    			</p>
    			<div class="wpz-welcome-notice-button">
    				<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=inspiro' ) ); ?>">
    					<?php
    					/* translators: %s: Inspiro theme */
    					printf( esc_html__( '%s Lite Dashboard &rarr;', 'inspiro' ), 'Inspiro' );
    					?>
    				</a>
    				<a class="button button-secondary" href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=adminnotice&utm_campaign=welcome-banner', 'inspiro' ) ); ?>" target="_blank">
    					<?php esc_html_e( 'Discover Inspiro Premium &rarr;', 'inspiro' ); ?>
    				</a>
    			</div>
            </div>
		</div>
		<?php
	}
}
