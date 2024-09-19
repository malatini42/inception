<?php
/**
 * Theme Info page
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * About Theme Page
 *
 * @return void
 */
function inspiro_theme_info_page() {
	add_theme_page(
		esc_html__( 'Inspiro Lite Theme Dashboard', 'inspiro' ),
		esc_html__( 'Inspiro Theme', 'inspiro' ),
		'edit_theme_options',
		'inspiro',
		'inspiro_display_theme_page',
        1
	);
}
add_action( 'admin_menu', 'inspiro_theme_info_page' );

/**
 * Display HTML page for Theme
 *
 * @return void
 */
function inspiro_display_theme_page() {

    $parent = wp_get_theme();

	?>


    <script>

      jQuery(document).ready(function($){

            $( function() {
              $( "#tabs" ).tabs();
            } );

      });

      </script>

    <div class="wpz-onboard_wrapper">
        <div id="tabs">

                <div class="wpz-onboard_header">
                    <div class="wpz-onboard_title-wrapper">
                        <h1 class="wpz-onboard_title"><svg width="30" height="30" viewBox="0 0 46 46" fill="none" xmlns="https://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23 46C35.7025 46 46 35.7025 46 23C46 10.2975 35.7025 0 23 0C10.2975 0 0 10.2975 0 23C0 35.7025 10.2975 46 23 46ZM19.4036 10.3152C19.4036 8.31354 21.0263 6.69091 23.0279 6.69091H26.2897C26.4899 6.69091 26.6521 6.85317 26.6521 7.05333V13.5025C26.6521 13.622 26.5884 13.7324 26.4848 13.7922L19.9055 17.5908C19.6824 17.7196 19.4036 17.5586 19.4036 17.3011V10.3152ZM19.5709 24.0613L26.1503 20.2627C26.3733 20.134 26.6521 20.2949 26.6521 20.5525V35.6849C26.6521 37.6865 25.0295 39.3091 23.0279 39.3091H19.7661C19.5659 39.3091 19.4036 39.1468 19.4036 38.9467V24.3511C19.4036 24.2316 19.4674 24.1211 19.5709 24.0613Z" fill="#242628"/></svg> Inspiro <span>Lite</span></h1>
                        <h2 class="wpz-onboard_framework-version">v <?php echo esc_html( $parent->get( 'Version' ) ); ?></h2>
                    </div>

                    <ul class="wpz-onboard_tabs">
                        <li class="wpz-onboard_tab wpz-onboard_tab-quick-start"><a href="#quick-start" title="Quick Start"><svg width="18" height="18" viewBox="0 0 13 15" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M0.166992 14.5V0.333332H7.66699L8.00033 2H12.667V10.3333H6.83366L6.50033 8.66667H1.83366V14.5H0.166992ZM8.20866 8.66667H11.0003V3.66667H6.62533L6.29199 2H1.83366V7H7.87533L8.20866 8.66667Z" fill="#000"></path></svg> <?php esc_html_e( 'Quick Start', 'inspiro' ); ?></a></li>

                        <li class="wpz-onboard_tab wpz-onboard_tab-theme-child"><a href="#vs-pro" title="Free vs. PRO"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M15 5.75C11.5482 5.75 8.75 8.54822 8.75 12C8.75 15.4518 11.5482 18.25 15 18.25C15.9599 18.25 16.8674 18.0341 17.6782 17.6489C18.0523 17.4712 18.4997 17.6304 18.6774 18.0045C18.8552 18.3787 18.696 18.8261 18.3218 19.0038C17.3141 19.4825 16.1873 19.75 15 19.75C10.7198 19.75 7.25 16.2802 7.25 12C7.25 7.71979 10.7198 4.25 15 4.25C19.2802 4.25 22.75 7.71979 22.75 12C22.75 12.7682 22.638 13.5115 22.429 14.2139C22.3108 14.6109 21.8932 14.837 21.4962 14.7188C21.0992 14.6007 20.8731 14.1831 20.9913 13.7861C21.1594 13.221 21.25 12.6218 21.25 12C21.25 8.54822 18.4518 5.75 15 5.75Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M5.25 5C5.25 4.58579 5.58579 4.25 6 4.25H15C15.4142 4.25 15.75 4.58579 15.75 5C15.75 5.41421 15.4142 5.75 15 5.75H6C5.58579 5.75 5.25 5.41421 5.25 5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M4.75 8.5C4.75 8.08579 5.08579 7.75 5.5 7.75H8.5C8.91421 7.75 9.25 8.08579 9.25 8.5C9.25 8.91421 8.91421 9.25 8.5 9.25H5.5C5.08579 9.25 4.75 8.91421 4.75 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M1.25 8.5C1.25 8.08579 1.58579 7.75 2 7.75H3.5C3.91421 7.75 4.25 8.08579 4.25 8.5C4.25 8.91421 3.91421 9.25 3.5 9.25H2C1.58579 9.25 1.25 8.91421 1.25 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M3.25 12.5C3.25 12.0858 3.58579 11.75 4 11.75H8C8.41421 11.75 8.75 12.0858 8.75 12.5C8.75 12.9142 8.41421 13.25 8 13.25H4C3.58579 13.25 3.25 12.9142 3.25 12.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M12.376 8.58397C12.5151 8.37533 12.7492 8.25 13 8.25H17C17.2508 8.25 17.4849 8.37533 17.624 8.58397L19.624 11.584C19.792 11.8359 19.792 12.1641 19.624 12.416L17.624 15.416C17.4849 15.6247 17.2508 15.75 17 15.75H13C12.7492 15.75 12.5151 15.6247 12.376 15.416L10.376 12.416C10.208 12.1641 10.208 11.8359 10.376 11.584L12.376 8.58397ZM13.4014 9.75L11.9014 12L13.4014 14.25H16.5986L18.0986 12L16.5986 9.75H13.4014Z" fill="black" fill-rule="evenodd"/></svg> <?php esc_html_e( 'Free vs. Premium', 'inspiro' ); ?></a></li>

                        <li class="wpz-onboard_tab wpz-onboard_tab-debug"><a href="#demos" title="Demos"><svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M34 0H14C12.4087 0 10.8826 0.632141 9.75736 1.75736C8.63214 2.88258 8 4.4087 8 6V8H6C4.4087 8 2.88258 8.63214 1.75736 9.75736C0.632141 10.8826 0 12.4087 0 14V34C0 35.5913 0.632141 37.1174 1.75736 38.2426C2.88258 39.3679 4.4087 40 6 40H26C27.5913 40 29.1174 39.3679 30.2426 38.2426C31.3679 37.1174 32 35.5913 32 34V32H34C35.5913 32 37.1174 31.3679 38.2426 30.2426C39.3679 29.1174 40 27.5913 40 26V6C40 4.4087 39.3679 2.88258 38.2426 1.75736C37.1174 0.632141 35.5913 0 34 0ZM28 34C28 34.5304 27.7893 35.0391 27.4142 35.4142C27.0391 35.7893 26.5304 36 26 36H6C5.46957 36 4.96086 35.7893 4.58579 35.4142C4.21071 35.0391 4 34.5304 4 34V20H28V34ZM28 16H4V14C4 13.4696 4.21071 12.9609 4.58579 12.5858C4.96086 12.2107 5.46957 12 6 12H26C26.5304 12 27.0391 12.2107 27.4142 12.5858C27.7893 12.9609 28 13.4696 28 14V16ZM36 26C36 26.5304 35.7893 27.0391 35.4142 27.4142C35.0391 27.7893 34.5304 28 34 28H32V14C31.9946 13.3177 31.8728 12.6413 31.64 12H36V26ZM36 8H12V6C12 5.46957 12.2107 4.96086 12.5858 4.58579C12.9609 4.21071 13.4696 4 14 4H34C34.5304 4 35.0391 4.21071 35.4142 4.58579C35.7893 4.96086 36 5.46957 36 6V8Z" fill="#242628"/></svg> <?php esc_html_e( 'Premium Demos', 'inspiro' ); ?></a></li>
                    </ul>
                </div>

                <div class="wpz-onboard_content-wrapper">
                    <div class="wpz-onboard_content">

                        <div class="wpz-onboard_content-main">
                            <div id="quick-start" class="wpz-onboard_content-main-tab">

                                <div class="theme-info-wrap welcome-section">

                                    <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Welcome to Inspiro!', 'inspiro' ); ?> 👋</h3>
                                    <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Thank you for installing the free version of our theme! Below you can find quick links to different sections in the Customizer where you can configure and customize the theme. The free version includes limited features and customization options, but if you need more flexibility and plan to take your website to the next level, make sure to check the Premium version.', 'inspiro' ); ?></p>

                                    <p class="section_footer">
                                        <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank" class="button button-primary">
                                            <?php esc_html_e( 'Customize Inspiro &rarr;', 'inspiro' ); ?>
                                        </a>

                                        <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium', 'inspiro' ) ); ?>" target="_blank" class="button button-secondary">
                                            <?php esc_html_e( 'Get Inspiro Premium &rarr;', 'inspiro' ); ?>
                                        </a>

                                    </p>

                                </div>

                                    <div class="theme-info-wrap">

                                        <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Customize & Configure', 'inspiro' ); ?></h3>

                                            <div class="wpz-grid-wrap">

                                                <?php /*
                                                <div class="section">
                                                    <h4>
                                                        <svg viewBox="0 0 32 32" width="26" height="26" xmlns="https://www.w3.org/2000/svg"><title/><g data-name="add, picture, images, gallery, selection, album, portfolio" id="add_picture_images_gallery_selection_album_portfolio"><path d="M29,6H3A1,1,0,0,0,2,7V25a1,1,0,0,0,1,1H29a1,1,0,0,0,1-1V7A1,1,0,0,0,29,6ZM28,24H4V8H28Z"/><path d="M7,22H25a1,1,0,0,0,.77-1.64l-5-6a1,1,0,0,0-.72-.36,1,1,0,0,0-.76.29l-1.13,1.14-3.33-5A1,1,0,0,0,14,10a1.07,1.07,0,0,0-.83.43l-7,10a1,1,0,0,0-.07,1A1,1,0,0,0,7,22Zm7-9.23,3.19,4.78a1,1,0,0,0,1.54.16l1.22-1.23L22.86,20H8.92Z"/><path d="M23,12h2a1,1,0,0,0,0-2H23a1,1,0,0,0,0,2Z"/></g></svg> <?php esc_html_e( 'Homepage Hero Area', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'The hero area appears automatically on your front page. In the Customizer, you will find a dedicated section where you can upload an image or a video and change the text or add a button.', 'inspiro' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=homepage_media_panel' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Configure &rarr;', 'inspiro' ); ?>
                                                        </a>

                                                    </p>
                                                </div>
                                                */ ?>

                                                <div class="section">
                                                    <h4>
                                                        <svg id="Icons" style="enable-background:new 0 0 32 32;" width="26" height="26" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><style type="text/css">
                                                            .st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                                                            .st1{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;}
                                                            .st2{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:6,6;}
                                                            .st3{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:4,4;}
                                                            .st4{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;}
                                                            .st5{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-dasharray:3.1081,3.1081;}
                                                            .st6{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:4,3;}
                                                        </style><circle class="st0" cx="13" cy="13" r="1"/><polyline class="st0" points="7,21 16,16 20,19 25,16 "/><polyline class="st0" points="30,25 7,25 7,2 "/><polyline class="st0" points="7,7 25,7 25,25 "/><line class="st0" x1="7" x2="2" y1="7" y2="7"/><line class="st0" x1="25" x2="25" y1="30" y2="25"/></svg> <?php esc_html_e( 'Site Logo', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'If you have a logo image, you can upload it in the Site Identity section in the Customizer, and it will appear in your website\'s header.', 'inspiro' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Customize &rarr;', 'inspiro' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg with="26" height="26" id="Lager_1" style="enable-background:new -265 388.9 64 64;" version="1.1" viewBox="-265 388.9 64 64" xml:space="preserve" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g><path d="M-244.5,411h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-242.9,410.3-243.6,411-244.5,411z"/><path d="M-228.1,411h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-226.4,410.3-227.2,411-228.1,411z"/><path d="M-211.6,411h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-210,410.3-210.7,411-211.6,411z"/><path d="M-244.5,427.5h-9.9c-0.9,0-1.6-0.7-1.6-1.6V416c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-242.9,426.7-243.6,427.5-244.5,427.5z"/><path d="M-228.1,427.5h-9.9c-0.9,0-1.6-0.7-1.6-1.6V416c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-226.4,426.7-227.2,427.5-228.1,427.5z"/><path d="M-211.6,427.5h-9.9c-0.9,0-1.6-0.7-1.6-1.6V416c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-210,426.7-210.7,427.5-211.6,427.5z"/><path d="M-244.5,443.9h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-242.9,443.2-243.6,443.9-244.5,443.9z"/><path d="M-228.1,443.9h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-226.4,443.2-227.2,443.9-228.1,443.9z"/><path d="M-211.6,443.9h-9.9c-0.9,0-1.6-0.7-1.6-1.6v-9.9c0-0.9,0.7-1.6,1.6-1.6h9.9c0.9,0,1.6,0.7,1.6,1.6v9.9   C-210,443.2-210.7,443.9-211.6,443.9z"/></g></svg> <?php esc_html_e( 'Portfolio', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Using the free version of our WPZOOM Portfolio plugin you can quickly create a Portfolio section on your website.', 'inspiro' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <?php if ( class_exists( 'WPZOOM_Portfolio_Custom_Posts' ) ) { ?>

                                                            <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=portfolio_item' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Add a Portfolio Post &rarr;', 'inspiro' ); ?>
                                                            </a>

                                                        <?php } else {  ?>

                                                            <a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=wpzoom%2520portfolio&tab=search&type=term' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Install WPZOOM Portfolio &rarr;', 'inspiro' ); ?>
                                                            </a>

                                                        <?php } ?>

                                                        <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/documentation/inspiro-lite/inspiro-lite-how-to-create-a-portfolio-section/', 'inspiro' ) ); ?>" target="_blank" class="button button-secondary">
                                                            <?php esc_html_e( 'How to Create a Portfolio?', 'inspiro' ); ?>
                                                        </a>
                                                    </p>
                                                </div>


                                                <div class="section">

                                                    <h4>
                                                        <span class="dashicons dashicons-cloud-upload"></span>
                                                        <?php esc_html_e( 'Demo Content', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Importing demo data (post, pages, images, etc.) is the quickest and easiest way to set up your new theme, and it allows you to simply edit everything instead of creating content and layouts from scratch.', 'inspiro' ); ?>
                                                    </p>

                                                    <?php if ( class_exists( 'OCDI_Plugin' ) ) { ?>

                                                        <p class="section_footer">

                                                            <a href="<?php echo esc_url( admin_url( 'themes.php?page=one-click-demo-import' ) ); ?>" class="button button-primary">
                                                                <?php esc_html_e( 'Import the Demo Content &rarr;', 'inspiro' ); ?>
                                                            </a>

                                                            <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/documentation/inspiro-lite/inspiro-lite-importing-the-demo-content/', 'inspiro' ) ); ?>" target="_blank" class="button button-secondary">
                                                                <?php esc_html_e( 'How it works?', 'inspiro' ); ?>
                                                            </a>

                                                        </p>

                                                    <?php } else { ?>

                                                        <p class="about">
                                                            <em><?php esc_html_e( 'Please install the One Click Demo Import plugin to use this feature.', 'inspiro' ); ?></em>
                                                        </p>
                                                        <p class="section_footer">
                                                            <a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>" target="_blank"  class="button button-primary">
                                                                <?php esc_html_e( 'Install One Click Demo Import &rarr;', 'inspiro' ); ?>
                                                            </a>

                                                            <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/documentation/inspiro-lite/inspiro-lite-importing-the-demo-content/', 'inspiro' ) ); ?>" target="_blank" class="button button-secondary">
                                                                <?php esc_html_e( 'How it works? &rarr;', 'inspiro' ); ?>
                                                            </a>
                                                        </p>

                                                    <?php } ?>

                                                    </div>


                                                <div class="section">
                                                    <h4>
                                                        <svg height="26" viewBox="0 0 21 21" width="26" xmlns="https://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="translate(3 3)"><path d="m14.4978951 12.4978973-.0105089-9.99999996c-.0011648-1.10374784-.8962548-1.99789734-2-1.99789734h-9.99999995c-1.0543629 0-1.91816623.81587779-1.99451537 1.85073766l-.00548463.151365.0105133 10.00000004c.0011604 1.1037478.89625045 1.9978973 1.99999889 1.9978973h9.99999776c1.0543618 0 1.9181652-.8158778 1.9945143-1.8507377z"/><path d="m4.5 4.5v9.817"/><path d="m7-2v14" transform="matrix(0 1 -1 0 12.5 -2.5)"/></g></svg> <?php esc_html_e( 'Header & Footer', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'In the Customizer, you will find separate sections to configure theme\'s Header and Footer. You can also add widgets in the Footer in the Widgets section in the Customizer.', 'inspiro' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header-area' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Header Options &rarr;', 'inspiro' ); ?>
                                                        </a>

                                                        <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer-area' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Footer Options &rarr;', 'inspiro' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                                <div class="section">
                                                    <h4>
                                                        <svg style="enable-background:new 0 0 16 16;" version="1.1" width="26" viewBox="0 0 16 16" xml:space="preserve" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g id="Guide"/><g id="Layer_2"><g><path d="M6,6c0-0.93-0.64-1.71-1.5-1.93V2.5C4.5,2.22,4.28,2,4,2S3.5,2.22,3.5,2.5v1.57C2.64,4.29,2,5.07,2,6s0.64,1.71,1.5,1.93    v5.57C3.5,13.78,3.72,14,4,14s0.5-0.22,0.5-0.5V7.93C5.36,7.71,6,6.93,6,6z M4,7C3.45,7,3,6.55,3,6s0.45-1,1-1s1,0.45,1,1    S4.55,7,4,7z"/><path d="M8.5,9.07V2.5C8.5,2.22,8.28,2,8,2S7.5,2.22,7.5,2.5v6.57C6.64,9.29,6,10.07,6,11s0.64,1.71,1.5,1.93v0.57    C7.5,13.78,7.72,14,8,14s0.5-0.22,0.5-0.5v-0.57c0.86-0.22,1.5-1,1.5-1.93S9.36,9.29,8.5,9.07z M8,12c-0.55,0-1-0.45-1-1    s0.45-1,1-1s1,0.45,1,1S8.55,12,8,12z"/><path d="M14,5c0-0.93-0.64-1.71-1.5-1.93V2.5C12.5,2.22,12.28,2,12,2s-0.5,0.22-0.5,0.5v0.57C10.64,3.29,10,4.07,10,5    s0.64,1.71,1.5,1.93v6.57c0,0.28,0.22,0.5,0.5,0.5s0.5-0.22,0.5-0.5V6.93C13.36,6.71,14,5.93,14,5z M12,6c-0.55,0-1-0.45-1-1    s0.45-1,1-1s1,0.45,1,1S12.55,6,12,6z"/></g></g></svg> <?php esc_html_e( 'Colors & Fonts', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Set up your global colors and fonts to match your site with your brand.', 'inspiro' ); ?>
                                                    </p>

                                                    <p class="section_footer">

                                                        <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=colors' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Customize Colors &rarr;', 'inspiro' ); ?>
                                                        </a>

                                                        <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=inspiro_typography_panel' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Typography Options &rarr;', 'inspiro' ); ?>
                                                        </a>

                                                    </p>
                                                </div>

                                            </div><!-- /.wpz-grid-wrap -->

                                    </div><!-- /.theme-info-wrap -->


                                    <div class="theme-info-wrap">

                                        <h3 class="wpz-onboard_content-main-title"><svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M15 5.75C11.5482 5.75 8.75 8.54822 8.75 12C8.75 15.4518 11.5482 18.25 15 18.25C15.9599 18.25 16.8674 18.0341 17.6782 17.6489C18.0523 17.4712 18.4997 17.6304 18.6774 18.0045C18.8552 18.3787 18.696 18.8261 18.3218 19.0038C17.3141 19.4825 16.1873 19.75 15 19.75C10.7198 19.75 7.25 16.2802 7.25 12C7.25 7.71979 10.7198 4.25 15 4.25C19.2802 4.25 22.75 7.71979 22.75 12C22.75 12.7682 22.638 13.5115 22.429 14.2139C22.3108 14.6109 21.8932 14.837 21.4962 14.7188C21.0992 14.6007 20.8731 14.1831 20.9913 13.7861C21.1594 13.221 21.25 12.6218 21.25 12C21.25 8.54822 18.4518 5.75 15 5.75Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M5.25 5C5.25 4.58579 5.58579 4.25 6 4.25H15C15.4142 4.25 15.75 4.58579 15.75 5C15.75 5.41421 15.4142 5.75 15 5.75H6C5.58579 5.75 5.25 5.41421 5.25 5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M4.75 8.5C4.75 8.08579 5.08579 7.75 5.5 7.75H8.5C8.91421 7.75 9.25 8.08579 9.25 8.5C9.25 8.91421 8.91421 9.25 8.5 9.25H5.5C5.08579 9.25 4.75 8.91421 4.75 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M1.25 8.5C1.25 8.08579 1.58579 7.75 2 7.75H3.5C3.91421 7.75 4.25 8.08579 4.25 8.5C4.25 8.91421 3.91421 9.25 3.5 9.25H2C1.58579 9.25 1.25 8.91421 1.25 8.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M3.25 12.5C3.25 12.0858 3.58579 11.75 4 11.75H8C8.41421 11.75 8.75 12.0858 8.75 12.5C8.75 12.9142 8.41421 13.25 8 13.25H4C3.58579 13.25 3.25 12.9142 3.25 12.5Z" fill="black" fill-rule="evenodd"/><path clip-rule="evenodd" d="M12.376 8.58397C12.5151 8.37533 12.7492 8.25 13 8.25H17C17.2508 8.25 17.4849 8.37533 17.624 8.58397L19.624 11.584C19.792 11.8359 19.792 12.1641 19.624 12.416L17.624 15.416C17.4849 15.6247 17.2508 15.75 17 15.75H13C12.7492 15.75 12.5151 15.6247 12.376 15.416L10.376 12.416C10.208 12.1641 10.208 11.8359 10.376 11.584L12.376 8.58397ZM13.4014 9.75L11.9014 12L13.4014 14.25H16.5986L18.0986 12L16.5986 9.75H13.4014Z" fill="black" fill-rule="evenodd"/></svg>  <?php esc_html_e( 'Premium Features', 'inspiro' ); ?></h3>

                                            <div class="wpz-grid-wrap">

                                                <div class="section premium-feature">
                                                    <h4><svg height="24" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 1069 1069" width="24" xml:space="preserve" xmlns="https://www.w3.org/2000/svg" xmlns:serif="https://www.serif.com/" xmlns:xlink="https://www.w3.org/1999/xlink"><rect height="1066.67" id="Video-player" style="fill:none;" width="1066.67" x="1.515" y="0.143"/><g><path d="M653.802,660.183c9.682,-5.579 15.648,-15.903 15.648,-27.077c0,-11.174 -5.966,-21.498 -15.648,-27.077c-0,0 -207.519,-119.571 -207.519,-119.571c-9.669,-5.571 -21.576,-5.563 -31.238,0.021c-9.662,5.584 -15.613,15.897 -15.613,27.056c-0,0 -0,239.142 -0,239.142c-0,11.159 5.951,21.472 15.613,27.056c9.662,5.584 21.569,5.592 31.238,0.021c0,-0 207.519,-119.571 207.519,-119.571Zm-78.196,-27.077l-113.674,65.498c-0,0.001 -0,-130.996 -0,-130.996l113.674,65.498Z" style="fill-opacity:0.5;"/><path d="M45.265,325.143l-0,458.333c-0,52.49 20.852,102.831 57.968,139.948c37.117,37.117 87.458,57.969 139.949,57.969c165.508,-0 417.825,-0 583.333,-0c52.491,-0 102.832,-20.852 139.948,-57.969c37.117,-37.117 57.969,-87.458 57.969,-139.948l-0,-458.333c-0,-52.49 -20.852,-102.831 -57.969,-139.948c-37.116,-37.117 -87.457,-57.969 -139.948,-57.969c-165.508,0 -417.825,0 -583.333,0c-52.491,0 -102.832,20.852 -139.949,57.969c-37.116,37.117 -57.968,87.458 -57.968,139.948Zm62.5,56.213l-0,402.12c-0,35.915 14.267,70.358 39.662,95.754c25.396,25.396 59.84,39.663 95.755,39.663c165.508,-0 417.825,-0 583.333,-0c35.915,-0 70.359,-14.267 95.754,-39.663c25.396,-25.396 39.663,-59.839 39.663,-95.754l-0,-458.333c-0,-35.915 -14.267,-70.358 -39.663,-95.754c-25.395,-25.396 -59.839,-39.663 -95.754,-39.663c-165.508,0 -417.825,0 -583.333,0c-35.915,0 -70.359,14.267 -95.755,39.663c-23.909,23.91 -37.955,55.84 -39.516,89.467l676.937,0c17.248,0 31.25,14.003 31.25,31.25c0,17.248 -14.002,31.25 -31.25,31.25l-677.083,0Zm123.177,-160.38c18.253,0 33.073,14.82 33.073,33.073c-0,18.254 -14.82,33.074 -33.073,33.074c-18.254,-0 -33.074,-14.82 -33.074,-33.074c0,-18.253 14.82,-33.073 33.074,-33.073Zm104.166,0c18.254,0 33.074,14.82 33.074,33.073c-0,18.254 -14.82,33.074 -33.074,33.074c-18.253,-0 -33.073,-14.82 -33.073,-33.074c0,-18.253 14.82,-33.073 33.073,-33.073Zm104.167,0c18.254,0 33.073,14.82 33.073,33.073c0,18.254 -14.819,33.074 -33.073,33.074c-18.254,-0 -33.073,-14.82 -33.073,-33.074c-0,-18.253 14.819,-33.073 33.073,-33.073Z"/></g></svg> <?php esc_html_e( 'Slideshow with YouTube & Vimeo Integration ', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'In the free version, you can have just a static hero on the homepage, while in the Premium version, you can create a fully working slideshow with multiple videos and images. The Slideshow of the Premium version provides more options and features, such as displaying a different video on mobile devices, adding a video popup, and more.', 'inspiro' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium', 'inspiro' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Get Inspiro Premium &rarr;', 'inspiro' ); ?>
                                                        </a>
                                                        <a href="<?php echo esc_url( __( 'https://demo.wpzoom.com/?theme=inspiro-demo', 'inspiro' ) ); ?>" target="_blank" class="button button-secondary">
                                                            <?php esc_html_e( 'View Demo &rarr;', 'inspiro' ); ?>
                                                        </a>
                                                    </p>
                                                </div>

                                                <div class="section premium-feature">
                                                    <h4><svg width="26" height="26" viewBox="0 0 30 30" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M21 12.405L13.5 8.07C13.0442 7.80682 12.5271 7.66821 12.0008 7.66807C11.4744 7.66794 10.9573 7.80629 10.5013 8.06923C10.0454 8.33217 9.66661 8.71045 9.40308 9.16607C9.13956 9.6217 9.00054 10.1386 9 10.665V19.335C9.00054 19.8611 9.13942 20.3778 9.4027 20.8332C9.66597 21.2887 10.0444 21.667 10.5 21.93C10.9561 22.1933 11.4734 22.3319 12 22.3319C12.5266 22.3319 13.0439 22.1933 13.5 21.93L21 17.595C21.4546 17.3313 21.832 16.9528 22.0943 16.4973C22.3566 16.0419 22.4947 15.5256 22.4947 15C22.4947 14.4744 22.3566 13.9581 22.0943 13.5027C21.832 13.0472 21.4546 12.6687 21 12.405ZM19.5 15L12 19.335V10.665L19.5 15ZM15 0C12.0333 0 9.13319 0.879734 6.66645 2.52796C4.19971 4.17618 2.27713 6.51885 1.14181 9.25974C0.00649926 12.0006 -0.290551 15.0166 0.288227 17.9263C0.867006 20.8361 2.29562 23.5088 4.3934 25.6066C6.49119 27.7044 9.16394 29.133 12.0736 29.7118C14.9834 30.2905 17.9994 29.9935 20.7403 28.8582C23.4811 27.7229 25.8238 25.8003 27.472 23.3335C29.1203 20.8668 30 17.9667 30 15C30 13.0302 29.612 11.0796 28.8582 9.25974C28.1044 7.43986 26.9995 5.78628 25.6066 4.3934C24.2137 3.00052 22.5601 1.89563 20.7403 1.14181C18.9204 0.387986 16.9698 0 15 0ZM15 27C12.6266 27 10.3066 26.2962 8.33316 24.9776C6.35977 23.659 4.8217 21.7849 3.91345 19.5922C3.0052 17.3995 2.76756 14.9867 3.23058 12.6589C3.69361 10.3311 4.83649 8.19295 6.51472 6.51472C8.19295 4.83649 10.3311 3.6936 12.6589 3.23058C14.9867 2.76755 17.3995 3.00519 19.5922 3.91344C21.7849 4.8217 23.6591 6.35977 24.9776 8.33315C26.2962 10.3065 27 12.6266 27 15C27 18.1826 25.7357 21.2348 23.4853 23.4853C21.2348 25.7357 18.1826 27 15 27Z" fill="#242628"></path></svg> <?php esc_html_e( 'Advanced Portfolio with Video Integration', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Inspiro Premium is perfect for showing off your portfolio, images and videos. The premium version includes multiple page templates to display your Portfolio posts and a custom Elementor Portfolio widget. You also get access to features such as Video Lightbox, Video Background on Hover, and more!', 'inspiro' ); ?>
                                                    </p>
                                                    <p class="section_footer">
                                                        <a href="<?php echo esc_url( __( 'https://demo.wpzoom.com/inspiro/portfolio/', 'inspiro' ) ); ?>" target="_blank" class="button button-primary">
                                                            <?php esc_html_e( 'Premium Portfolio Demo &rarr;', 'inspiro' ); ?>
                                                        </a>
                                                    </p>
                                                </div>

                                                <div class="section premium-feature">
                                                    <h4><svg height="26" preserveAspectRatio="xMidYMid" version="1.1" viewBox="0 0 256 153" width="26" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g><path d="M23.7586644,0 L232.137438,0 C245.324643,0 256,10.6753566 256,23.8625617 L256,103.404434 C256,116.591639 245.324643,127.266996 232.137438,127.266996 L157.409942,127.266996 L167.666657,152.385482 L122.558043,127.266996 L23.8633248,127.266996 C10.6761196,127.266996 0.000763038458,116.591639 0.000763038458,103.404434 L0.000763038458,23.8625617 C-0.10389732,10.7800169 10.5714592,0 23.7586644,0 L23.7586644,0 Z" fill="#9B5C8F"/><path d="M14.5781994,21.7495935 C16.0351099,19.7723577 18.2204758,18.7317073 21.1342969,18.5235772 C26.441614,18.1073171 29.4595002,20.604878 30.1879555,26.0162602 C33.4139717,47.7658537 36.9521831,66.1853659 40.6985246,81.2747967 L63.4887685,37.8796748 C65.5700693,33.9252033 68.1716953,31.8439024 71.2936465,31.6357724 C75.8725083,31.3235772 78.6822644,34.2373984 79.8269798,40.3772358 C82.4286059,54.2178862 85.7586872,65.9772358 89.7131587,75.9674797 C92.4188498,49.5349593 96.9977116,30.4910569 103.449744,18.7317073 C105.01072,15.8178862 107.300151,14.3609756 110.318037,14.1528455 C112.711533,13.9447154 114.896899,14.6731707 116.874134,16.2341463 C118.85137,17.795122 119.89202,19.7723577 120.100151,22.1658537 C120.204216,24.0390244 119.89202,25.6 119.0595,27.1609756 C115.000964,34.6536585 111.670882,47.2455285 108.965191,64.7284553 C106.363565,81.6910569 105.42698,94.9073171 106.05137,104.377236 C106.2595,106.978862 105.84324,109.268293 104.80259,111.245528 C103.553809,113.534959 101.680638,114.78374 99.2871424,114.99187 C96.5814514,115.2 93.7716953,113.95122 91.0660042,111.141463 C81.3879555,101.255285 73.6871424,86.4780488 68.0676303,66.8097561 C61.3034026,80.1300813 56.3082807,90.1203252 53.0822644,96.7804878 C46.942427,108.539837 41.739175,114.57561 37.3684433,114.887805 C34.5586872,115.095935 32.1651912,112.702439 30.0838904,107.707317 C24.7765733,94.0747967 19.0529961,67.7463415 12.9131587,28.7219512 C12.4968985,26.0162602 13.1212888,23.6227642 14.5781994,21.7495935 Z M238.213972,38.0878049 C234.46763,31.5317073 228.952183,27.5772358 221.563565,26.0162602 C219.586329,25.6 217.713159,25.3918699 215.944053,25.3918699 C205.953809,25.3918699 197.836736,30.595122 191.488768,41.001626 C186.077386,49.8471545 183.371695,59.6292683 183.371695,70.3479675 C183.371695,78.3609756 185.036736,85.2292683 188.366817,90.9528455 C192.113159,97.5089431 197.628606,101.463415 205.017224,103.02439 C206.99446,103.44065 208.86763,103.64878 210.636736,103.64878 C220.731045,103.64878 228.848118,98.4455285 235.09202,88.0390244 C240.503403,79.0894309 243.209094,69.3073171 243.209094,58.5886179 C243.313159,50.4715447 241.544053,43.7073171 238.213972,38.0878049 Z M225.101777,66.9138211 C223.644866,73.7821138 221.04324,78.8813008 217.192834,82.3154472 C214.174947,85.0211382 211.365191,86.1658537 208.763565,85.6455285 C206.266004,85.1252033 204.184703,82.9398374 202.623728,78.8813008 C201.374947,75.6552846 200.750557,72.4292683 200.750557,69.4113821 C200.750557,66.8097561 200.958687,64.2081301 201.479012,61.8146341 C202.415598,57.5479675 204.184703,53.3853659 206.99446,49.4308943 C210.428606,44.3317073 214.070882,42.2504065 217.817224,42.9788618 C220.314785,43.499187 222.396086,45.6845528 223.957061,49.7430894 C225.205842,52.9691057 225.830232,56.195122 225.830232,59.2130081 C225.830232,61.9186992 225.622102,64.5203252 225.101777,66.9138211 Z M173.069256,38.0878049 C169.322915,31.5317073 163.703403,27.5772358 156.41885,26.0162602 C154.441614,25.6 152.568443,25.3918699 150.799338,25.3918699 C140.809094,25.3918699 132.69202,30.595122 126.344053,41.001626 C120.932671,49.8471545 118.22698,59.6292683 118.22698,70.3479675 C118.22698,78.3609756 119.89202,85.2292683 123.222102,90.9528455 C126.968443,97.5089431 132.48389,101.463415 139.872508,103.02439 C141.849744,103.44065 143.722915,103.64878 145.49202,103.64878 C155.586329,103.64878 163.703403,98.4455285 169.947305,88.0390244 C175.358687,79.0894309 178.064378,69.3073171 178.064378,58.5886179 C178.064378,50.4715447 176.399338,43.7073171 173.069256,38.0878049 Z M159.852996,66.9138211 C158.396086,73.7821138 155.79446,78.8813008 151.944053,82.3154472 C148.926167,85.0211382 146.116411,86.1658537 143.514785,85.6455285 C141.017224,85.1252033 138.935923,82.9398374 137.374947,78.8813008 C136.126167,75.6552846 135.501777,72.4292683 135.501777,69.4113821 C135.501777,66.8097561 135.709907,64.2081301 136.230232,61.8146341 C137.166817,57.5479675 138.935923,53.3853659 141.745679,49.4308943 C145.179825,44.3317073 148.822102,42.2504065 152.568443,42.9788618 C155.066004,43.499187 157.147305,45.6845528 158.708281,49.7430894 C159.957061,52.9691057 160.581451,56.195122 160.581451,59.2130081 C160.685516,61.9186992 160.373321,64.5203252 159.852996,66.9138211 L159.852996,66.9138211 L159.852996,66.9138211 Z" fill="#FFFFFF"/></g></svg> <?php esc_html_e( 'WooCommerce Features', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'The Premium version of the theme includes unique WooCommerce features and additional options to customize the shop pages as you want.', 'inspiro' ); ?>
                                                    </p>
                                                </div>


                                                <div class="section premium-feature">
                                                    <h4><svg height="26" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="26" xml:space="preserve" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g id="_x31_09-elementor"><g><path d="M462.999,26.001H49c-12.731,0-22.998,10.268-22.998,23v413.998c0,12.732,10.267,23,22.998,23    h413.999c12.732,0,22.999-10.268,22.999-23V49.001C485.998,36.269,475.731,26.001,462.999,26.001" style="fill:#D63362;"/><rect height="204.329" style="fill:#FFFFFF;" width="40.865" x="153.836" y="153.836"/><rect height="40.866" style="fill:#FFFFFF;" width="122.7" x="235.566" y="317.299"/><rect height="40.865" style="fill:#FFFFFF;" width="122.7" x="235.566" y="235.566"/><rect height="40.865" style="fill:#FFFFFF;" width="122.7" x="235.566" y="153.733"/></g></g><g id="Layer_1"/></svg> <?php esc_html_e( 'Custom Elementor Modules', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'The Premium version will unlock Premium Elementor Modules such as Portfolio Showcase, Slideshow widget, and more!', 'inspiro' ); ?>
                                                    </p>

                                                </div>


                                                <div class="section premium-feature">

                                                      <h4><svg width="20" height="20" viewBox="0 0 40 40" fill="none" xmlns="https://www.w3.org/2000/svg"> <path d="M34 0H14C12.4087 0 10.8826 0.632141 9.75736 1.75736C8.63214 2.88258 8 4.4087 8 6V8H6C4.4087 8 2.88258 8.63214 1.75736 9.75736C0.632141 10.8826 0 12.4087 0 14V34C0 35.5913 0.632141 37.1174 1.75736 38.2426C2.88258 39.3679 4.4087 40 6 40H26C27.5913 40 29.1174 39.3679 30.2426 38.2426C31.3679 37.1174 32 35.5913 32 34V32H34C35.5913 32 37.1174 31.3679 38.2426 30.2426C39.3679 29.1174 40 27.5913 40 26V6C40 4.4087 39.3679 2.88258 38.2426 1.75736C37.1174 0.632141 35.5913 0 34 0ZM28 34C28 34.5304 27.7893 35.0391 27.4142 35.4142C27.0391 35.7893 26.5304 36 26 36H6C5.46957 36 4.96086 35.7893 4.58579 35.4142C4.21071 35.0391 4 34.5304 4 34V20H28V34ZM28 16H4V14C4 13.4696 4.21071 12.9609 4.58579 12.5858C4.96086 12.2107 5.46957 12 6 12H26C26.5304 12 27.0391 12.2107 27.4142 12.5858C27.7893 12.9609 28 13.4696 28 14V16ZM36 26C36 26.5304 35.7893 27.0391 35.4142 27.4142C35.0391 27.7893 34.5304 28 34 28H32V14C31.9946 13.3177 31.8728 12.6413 31.64 12H36V26ZM36 8H12V6C12 5.46957 12.2107 4.96086 12.5858 4.58579C12.9609 4.21071 13.4696 4 14 4H34C34.5304 4 35.0391 4.21071 35.4142 4.58579C35.7893 4.96086 36 5.46957 36 6V8Z" fill="#242628"/>
                                                        </svg> <?php esc_html_e( '15+ Starter Sites', 'inspiro' ); ?> </h4>
                                                        <p class="about">
                                                            <?php esc_html_e( 'With the built-in demo importer, you can quickly import fully configured demos to help you get started. The theme includes beautiful demos to create a business or portfolio website.', 'inspiro' ); ?>
                                                        </p>
                                                        <p class="section_footer">
                                                            <a href="<?php echo esc_url( __( 'https://demo.wpzoom.com/inspiro-demo', 'inspiro' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Inspiro Premium Demos &rarr;', 'inspiro' ); ?>
                                                            </a>

                                                            <a href="<?php echo esc_url( __( 'https://demo.wpzoom.com/inspiro-pro-demo', 'inspiro' ) ); ?>" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Inspiro PRO Demos &rarr;', 'inspiro' ); ?>
                                                            </a>

                                                        </p>
                                                </div>

                                                <div class="section premium-feature">

                                                      <h4><svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M32.8441 0H7.15594C3.21016 0 0 3.21016 0 7.15594V32.8441C0 36.7898 3.21016 40 7.15594 40H32.8441C36.7898 40 40 36.7898 40 32.8441V7.15594C40 3.21016 36.7898 0 32.8441 0ZM37.6562 32.8441C37.6562 35.4975 35.4975 37.6562 32.8441 37.6562H7.15594C4.5025 37.6562 2.34375 35.4975 2.34375 32.8441V7.15594C2.34375 4.5025 4.5025 2.34375 7.15594 2.34375H32.8441C35.4975 2.34375 37.6562 4.5025 37.6562 7.15594V32.8441Z" fill="#000"/><path d="M33.8079 8.78773H15.9594C15.4687 7.33031 14.0902 6.27734 12.4694 6.27734C10.8486 6.27734 9.47008 7.33031 8.97938 8.78773H6.19336C5.54617 8.78773 5.02148 9.31242 5.02148 9.95961C5.02148 10.6068 5.54617 11.1315 6.19336 11.1315H8.97945C9.47016 12.5889 10.8487 13.6419 12.4695 13.6419C14.0902 13.6419 15.4687 12.5889 15.9595 11.1315H33.808C34.4552 11.1315 34.9798 10.6068 34.9798 9.95961C34.9798 9.31242 34.4552 8.78773 33.8079 8.78773V8.78773ZM12.4694 11.2981C11.7313 11.2981 11.1309 10.6977 11.1309 9.95961C11.1309 9.22156 11.7313 8.62109 12.4694 8.62109C13.2074 8.62109 13.8079 9.22156 13.8079 9.95961C13.8079 10.6977 13.2074 11.2981 12.4694 11.2981Z" fill="#000"/><path d="M33.8079 18.8268H31.0218C30.5311 17.3694 29.1525 16.3164 27.5318 16.3164C25.9111 16.3164 24.5326 17.3694 24.0419 18.8268H6.19336C5.54617 18.8268 5.02148 19.3515 5.02148 19.9987C5.02148 20.6459 5.54617 21.1705 6.19336 21.1705H24.0419C24.5326 22.628 25.9112 23.6809 27.5319 23.6809C29.1526 23.6809 30.5312 22.628 31.0219 21.1705H33.808C34.4552 21.1705 34.9798 20.6459 34.9798 19.9987C34.9798 19.3515 34.4552 18.8268 33.8079 18.8268ZM27.5319 21.3372C26.7938 21.3372 26.1934 20.7367 26.1934 19.9987C26.1934 19.2606 26.7938 18.6602 27.5319 18.6602C28.2699 18.6602 28.8704 19.2606 28.8704 19.9987C28.8704 20.7367 28.2699 21.3372 27.5319 21.3372Z" fill="#000"/><path d="M33.8079 28.8698H20.9802C20.4895 27.4123 19.111 26.3594 17.4902 26.3594C15.8695 26.3594 14.4909 27.4123 14.0002 28.8698H6.19336C5.54617 28.8698 5.02148 29.3945 5.02148 30.0416C5.02148 30.6888 5.54617 31.2135 6.19336 31.2135H14.0002C14.4909 32.6709 15.8695 33.7239 17.4902 33.7239C19.111 33.7239 20.4895 32.6709 20.9802 31.2135H33.808C34.4552 31.2135 34.9798 30.6888 34.9798 30.0416C34.9798 29.3945 34.4552 28.8698 33.8079 28.8698ZM17.4902 31.3802C16.7522 31.3802 16.1517 30.7798 16.1517 30.0417C16.1517 29.3037 16.7522 28.7032 17.4902 28.7032C18.2283 28.7032 18.8288 29.3036 18.8288 30.0416C18.8288 30.7797 18.2283 31.3802 17.4902 31.3802V31.3802Z" fill="#000"/></svg> <?php esc_html_e( 'Theme Options Panel', 'inspiro' ); ?> </h4>
                                                        <p class="about">
                                                            <?php esc_html_e( 'Using the Theme Options panel, you can configure different features and functionalities in the theme as you want. Additional customization options are available in the Customizer, while different options for features like Portfolio can be found on the Theme Options page.', 'inspiro' ); ?>
                                                        </p>

                                                </div>

                                                <div class="section premium-feature">

                                                      <h4><svg width="26" height="26" viewBox="0 0 40 58" fill="none" xmlns="https://www.w3.org/2000/svg" fill="none"><rect x="9.23047" y="50.2578" width="7.69231" height="7.69231" transform="rotate(90 9.23047 50.2578)" fill="#3496FF"></rect><rect x="16.9219" y="50.2578" width="7.69231" height="7.69231" transform="rotate(90 16.9219 50.2578)" fill="#22BB66"></rect><rect x="24.6172" y="50.2578" width="7.69231" height="7.69231" transform="rotate(90 24.6172 50.2578)" fill="#F2DD19"></rect><rect x="32.3086" y="50.2578" width="7.69231" height="7.69231" transform="rotate(90 32.3086 50.2578)" fill="#F29B19"></rect><rect x="40" y="50.2578" width="7.69231" height="7.69231" transform="rotate(90 40 50.2578)" fill="#FF4141"></rect><path d="M8.23122 39.4166L5.81078 35.6272C5.51551 35.1649 5.01186 34.8887 4.46335 34.8887C3.91484 34.8887 3.41118 35.1649 3.11591 35.6268L0.695824 39.4166C-0.424861 41.1709 -0.169855 43.5126 1.30226 44.9844C2.14675 45.8289 3.2692 46.294 4.46335 46.294C5.65785 46.294 6.7803 45.8289 7.62479 44.9847C9.0969 43.5126 9.35191 41.1713 8.23122 39.4166ZM6.34623 43.7058C5.84328 44.2088 5.17468 44.4857 4.46335 44.4857C3.75237 44.4857 3.08377 44.2088 2.58082 43.7058C1.70419 42.8292 1.55232 41.4348 2.2195 40.39L4.46335 36.8768L6.70719 40.39C7.37437 41.4348 7.2225 42.8292 6.34623 43.7058Z" fill="#000"></path><path d="M37.9323 5.94885C37.9323 4.35983 37.3135 2.86582 36.1897 1.74231C35.0661 0.618796 33.5721 0 31.9831 0C30.3941 0 28.9004 0.618796 27.7766 1.74231L26.3525 3.16674C25.3042 2.29682 23.7417 2.35298 22.7598 3.33486C22.2551 3.83957 21.9775 4.51029 21.9775 5.22374C21.9775 5.85349 22.194 6.44968 22.5913 6.9279L7.83769 21.6812L6.1964 23.3225C5.62493 23.8939 5.39323 24.7356 5.59208 25.5193L6.01132 27.173C6.15931 27.7565 5.98695 28.3834 5.56135 28.809L4.58513 29.7852C4.10937 30.261 3.84766 30.8932 3.84766 31.566C3.84766 32.2389 4.10937 32.8714 4.58513 33.3468C5.06088 33.8226 5.69345 34.0847 6.36628 34.0847C7.03877 34.0847 7.67134 33.8226 8.14709 33.3468L9.12297 32.371C9.54856 31.9454 10.1755 31.773 10.759 31.9206L12.413 32.3402C13.1967 32.5384 14.0384 32.307 14.6095 31.7356L16.2494 30.096C16.2497 30.0953 16.2504 30.095 16.2511 30.0943L31.0044 15.341C31.4826 15.7383 32.0788 15.9548 32.7086 15.9548C33.422 15.9548 34.0927 15.6769 34.5975 15.1725C35.1018 14.6678 35.3798 13.9971 35.3798 13.2836C35.3798 12.6539 35.1633 12.0577 34.7659 11.5795L36.19 10.1554C37.3135 9.03188 37.9323 7.53787 37.9323 5.94885ZM19.4843 24.3036L13.6287 18.448L16.1695 15.9068L22.0252 21.7628L19.4843 24.3036ZM12.3497 19.7266L18.2054 25.5822L15.6115 28.1761L9.75589 22.3205L12.3497 19.7266ZM12.8573 30.5873L11.2033 30.1677C10.0052 29.864 8.7182 30.2182 7.8444 31.092L6.86817 32.0683C6.59127 32.3452 6.14059 32.3452 5.86404 32.0683C5.72983 31.9341 5.65601 31.7557 5.65601 31.566C5.65601 31.3764 5.72983 31.198 5.86404 31.0638L6.83992 30.0879C7.71407 29.2138 8.06797 27.9267 7.76423 26.7287L7.34499 25.0747C7.30225 24.9058 7.35205 24.7247 7.47531 24.6014L8.47733 23.5994L14.3329 29.455L13.3309 30.457C13.2077 30.5803 13.0261 30.6301 12.8573 30.5873ZM33.3185 13.8936C32.9819 14.2302 32.4348 14.2302 32.0982 13.8936L30.0547 11.85C29.7015 11.4972 29.1293 11.4972 28.7761 11.85C28.4229 12.2032 28.4229 12.7757 28.7761 13.1289L29.7174 14.0702L23.3037 20.4839L17.4481 14.6282L23.8618 8.21459L23.9727 8.32549C24.3255 8.67834 24.898 8.67834 25.2512 8.32549C25.6044 7.9723 25.6044 7.39977 25.2512 7.04658L24.0384 5.83371C23.7018 5.49747 23.7018 4.95002 24.0384 4.61342C24.3746 4.27718 24.922 4.27718 25.2586 4.61342L25.7181 5.07328C25.7192 5.07434 25.7203 5.0754 25.7213 5.07646L32.8555 12.211H32.8559L33.3185 12.6737C33.6551 13.0103 33.6551 13.5574 33.3185 13.8936ZM34.9111 8.87683L33.4951 10.2928L27.6395 4.43718L29.0555 3.02122C29.8375 2.23925 30.8773 1.80835 31.9831 1.80835C33.0893 1.80835 34.1291 2.23925 34.9111 3.02122C35.6931 3.8032 36.124 4.843 36.124 5.94885C36.124 7.05505 35.6931 8.09451 34.9111 8.87683Z" fill="#000"></path><path d="M27.1073 9.27539C26.6079 9.27539 26.2031 9.68015 26.2031 10.1796C26.2031 10.6786 26.6079 11.0837 27.1073 11.0837H27.1094C27.6088 11.0837 28.0125 10.6786 28.0125 10.1796C28.0125 9.68015 27.6067 9.27539 27.1073 9.27539Z" fill="#000"></path> </svg> <?php esc_html_e( 'Customize Every Detail', 'inspiro' ); ?> </h4>
                                                        <p class="about">
                                                            <?php esc_html_e( 'No more custom CSS! The Premium version gives you access to numerous customization options, and you can change the theme\'s color and font styles of each element.', 'inspiro' ); ?>
                                                        </p>

                                                </div>

                                                <div class="section premium-feature">
                                                    <h4><svg id="Icons" width="26" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><style type="text/css">.st0{fill:none;stroke:#000000;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><line class="st0" x1="3" x2="29" y1="11" y2="11"/><g><path d="M7,9C6.7,9,6.5,8.9,6.3,8.7C6.1,8.5,6,8.3,6,8c0-0.3,0.1-0.5,0.3-0.7c0,0,0.1-0.1,0.1-0.1c0.1,0,0.1-0.1,0.2-0.1   C6.7,7,6.7,7,6.8,7c0.1,0,0.3,0,0.4,0c0.1,0,0.1,0,0.2,0.1c0.1,0,0.1,0.1,0.2,0.1c0,0,0.1,0.1,0.1,0.1c0.1,0.1,0.2,0.2,0.2,0.3   C8,7.7,8,7.9,8,8c0,0.1,0,0.3-0.1,0.4C7.9,8.5,7.8,8.6,7.7,8.7C7.5,8.9,7.3,9,7,9z"/></g><g><path d="M10,9C9.7,9,9.5,8.9,9.3,8.7C9.1,8.5,9,8.3,9,8c0-0.1,0-0.3,0.1-0.4c0.1-0.1,0.1-0.2,0.2-0.3c0.1-0.1,0.2-0.2,0.3-0.2   C10,6.9,10.4,7,10.7,7.3c0.1,0.1,0.2,0.2,0.2,0.3C11,7.7,11,7.9,11,8c0,0.3-0.1,0.5-0.3,0.7C10.5,8.9,10.3,9,10,9z"/></g><g><path d="M13,9c-0.1,0-0.3,0-0.4-0.1c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.3C12,8.3,12,8.1,12,8c0-0.1,0-0.3,0.1-0.4   c0.1-0.1,0.1-0.2,0.2-0.3c0.4-0.4,1-0.4,1.4,0c0.1,0.1,0.2,0.2,0.2,0.3C14,7.7,14,7.9,14,8c0,0.1,0,0.3-0.1,0.4   c-0.1,0.1-0.1,0.2-0.2,0.3C13.5,8.9,13.3,9,13,9z"/></g><path class="st0" d="M27,5H5C3.9,5,3,5.9,3,7v18c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V7C29,5.9,28.1,5,27,5z"/><line class="st0" x1="3" x2="19" y1="19" y2="19"/><line class="st0" x1="19" x2="19" y1="11" y2="27"/></svg> <?php esc_html_e( 'Multiple Header & Footer Layouts', 'inspiro' ); ?>
                                                    </h4>
                                                    <p class="about">
                                                        <?php esc_html_e( 'Upgrading to the Premium version, you will get access to 6 Header Styles and 9 Footer Layouts.', 'inspiro' ); ?>
                                                    </p>

                                                </div>



                                            </div>

                                            <span class="many-more"><?php esc_html_e( 'And many other premium features...', 'inspiro' ); ?></span>

                                            <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-table', 'inspiro' ) ); ?>" target="_blank" class="button button-large button-primary">
                                                <?php esc_html_e( 'Get Inspiro Premium Today &rarr;', 'inspiro' ); ?>
                                            </a>

                                    </div>

                            </div>

                            <div id="vs-pro" class="wpz-onboard_content-main-tab">

                                <div class="theme-info-wrap">
                                <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Inspiro Lite vs. Inspiro Premium', 'inspiro' ); ?></h3>
                                <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Below is a comparison chart of the free and the premium versions.', 'inspiro' ); ?></p>

                                <div class="theme-comparison">

                                            <table>
                                                <thead class="theme-comparison-header">
                                                    <tr>
                                                        <th class="table-feature-title"><h3><?php esc_html_e( 'Feature', 'inspiro' ); ?></h3></th>
                                                        <th><h3><?php esc_html_e( 'Inspiro Lite', 'inspiro' ); ?></h3></th>
                                                        <th><h3><?php esc_html_e( 'Inspiro Premium', 'inspiro' ); ?></h3></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Responsive Layout', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Live Customizer', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Fullscreen Slideshow on Homepage', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Advanced WooCommerce Integration', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Elementor Integration', 'inspiro' ); ?></h3></td>
                                                        <td>Partial</td>
                                                        <td>Full</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><strong><?php esc_html_e( 'Custom Elementor Widgets', 'inspiro' ); ?></strong> <span class="table-new-promo">POPULAR FEATURE</span></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Demo Content Importer', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>

                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Starter Sites', 'inspiro' ); ?></h3></td>
                                                        <td>2</td>
                                                        <td>15+</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><strong><?php esc_html_e( 'Portfolio with Video Integration', 'inspiro' ); ?></strong> <span class="table-new-promo">POPULAR FEATURE</span></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Video Features', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Predefined Style Kits', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Video Backgrounds', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><strong><?php esc_html_e( 'Video Background on Hover', 'inspiro' ); ?></strong> <span class="table-new-promo">POPULAR FEATURE</span></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Video Headers in Pages & Posts', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Video & Image Lightbox for Portfolio Posts', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Multiple Blog & Posts Layouts', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Theme Options', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-no-alt"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Google Fonts (Hosted Locally)', 'inspiro' ); ?></h3></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Typography Options', 'inspiro' ); ?></h3></td>
                                                        <td>Limited</td>
                                                        <td><span class="dashicons dashicons-saved"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><?php esc_html_e( 'Support', 'inspiro' ); ?></h3></td>
                                                        <td><?php esc_html_e( 'Support Forum', 'inspiro' ); ?></td>
                                                        <td><?php esc_html_e( 'Fast Email Support', 'inspiro' ); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium" target="_blank" class="button button-primary">
                                                                <?php esc_html_e( 'Get Inspiro Premium Today!', 'inspiro' ); ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            </div>

                            <div id="demos" class="wpz-onboard_content-main-tab wpz-onboard_content-main-theme-child">

                                <div class="theme-info-wrap">

                                    <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Inspiro Premium Demos', 'inspiro' ); ?></h3>
                                    <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Below you can demos available in the Inspiro Premium theme. You can get access to all of them by purchasing the Premium version of the theme.', 'inspiro' ); ?></p>

                                    <ol class="wpz-onboard_content-main-steps">

                                        <li id="step-choose-design" class="wpz-onboard_content-main-step step-1 step-choose-design">
                                            <div class="wpz-onboard_content-main-step-content">

                                                <form method="post" action="#">

                                                    <ul>
                                                        <li class="design_default-elementor">
                                                            <figure title="Portfolio (Default)">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Premium Demo</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro/" target="_blank" rel="noopener" title="Live preview">Live preview</a>

                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                        <li class="design_video" data-design-id="inspiro-video">
                                                            <figure title="Video Production">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-video-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-video/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Video Production</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-video/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_video2" data-design-id="inspiro-video2">
                                                            <figure title="Video Production #2">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-video2-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-video2/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Video Production #2</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-video2/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_photography" data-design-id="inspiro-wedding-photography">
                                                            <figure title="Photography">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/wedding/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-wedding-photography/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Wedding Photography</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-wedding-photography/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_photography" data-design-id="inspiro-photography">
                                                            <figure title="Photography">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-photography-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-photography/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Photography</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-photography/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_agency-elementor" data-design-id="inspiro-agency">
                                                            <figure title="Agency / Business">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-agency-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-agency/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Agency / Business</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-agency/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                        <li class="design_hotel" data-design-id="inspiro-hotel">
                                                            <figure title="Hotel / Real Estate">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-hotel-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-hotel/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Hotel / Real Estate</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-hotel/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_events" data-design-id="inspiro-events">
                                                            <figure title="Shop / WooCommerce">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/shop-home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-shop/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Shop / WooCommerce</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-shop/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_events" data-design-id="inspiro-jewelry">
                                                            <figure title="Jewelry Shop / WooCommerce">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/shop2/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-jewelry2/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Jewelry Shop / WooCommerce</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-jewelry2/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_restaurant" data-design-id="inspiro-restaurant">
                                                            <figure title="Restaurant">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-restaurant-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-restaurant/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Restaurant</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-restaurant/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_events" data-design-id="inspiro-events">
                                                            <figure title="Events / Conference">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/demo-events.png')"><a href="https://demo.wpzoom.com/inspiro-event/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Events / Conference</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-event/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_wellness" data-design-id="inspiro-wellness">
                                                            <figure title="Wellness / Spa">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-wellness/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-wellness/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Wellness / Spa</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-wellness/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                        <li class="design_magazine" data-design-id="inspiro-magazine">
                                                            <figure title="Magazine">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-magazine/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-magazine/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Magazine</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-magazine/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                        <li class="design_magazine" data-design-id="inspiro-auto">
                                                            <figure title="Magazine">
                                                                <div class="preview-thumbnail" style="background-image:url('https://demo.wpzoom.com/inspiro-demo/wp-content/themes/inspiro-select/images/inspiro-rent.png')"><a href="https://demo.wpzoom.com/inspiro-auto/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Car Rental / Dealer</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-auto/" target="_blank" rel="noopener" title="Live preview">Live Preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                        <li class="design_magazine" data-design-id="inspiro-coach">
                                                            <figure title="Author">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-author/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-author/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Author / Coach</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-author/" target="_blank" rel="noopener" title="Live preview">Live Preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>

                                                        <li class="design_magazine" data-design-id="inspiro-church">
                                                            <figure title="Church">
                                                                <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-church/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-church/" target="_blank" class="button-select-template">View Demo</a></div>
                                                                <figcaption>
                                                                    <h5>Author / Coach</h5>

                                                                    <p>
                                                                        <a href="https://demo.wpzoom.com/inspiro-church/" target="_blank" rel="noopener" title="Live preview">Live Preview</a>
                                                                    </p>
                                                                </figcaption>
                                                            </figure>
                                                        </li>
                                                    </ul>

                                                </form>
                                            </div>
                                        </li>

                                    </ol>


                                    <br />
                                    <br />
                                    <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium', 'inspiro' ) ); ?>" target="_blank" class="button button-large button-primary">
                                        <?php esc_html_e( 'Get Inspiro Premium Today &rarr;', 'inspiro' ); ?>
                                    </a>

                                </div>

                                <div class="theme-info-wrap">

                                    <h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Inspiro PRO Demos', 'inspiro' ); ?></h3>
                                    <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Inspiro PRO is a newer version of the Inspiro theme, which can be purchased separately.', 'inspiro' ); ?></p>

                                    <ol class="wpz-onboard_content-main-steps">

                                        <li id="step-choose-design" class="wpz-onboard_content-main-step step-1 step-choose-design">
                                            <div class="wpz-onboard_content-main-step-content">

                                                <form method="post" action="#">

                                                <ul>
                                                    <li class="design_eccentric" data-design-id="inspiro-pro-eccentric">
                                                        <figure title="Eccentric">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/flow-1/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Eccentric</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_offbeat" data-design-id="inspiro-pro-offbeat">
                                                        <figure title="Offbeat">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/flow-2/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-2/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Offbeat</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-2/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_agency" data-design-id="inspiro-pro-agency">
                                                        <figure title="Agency">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/agency/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-agency/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Agency</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-agency/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_agency-dark" data-design-id="inspiro-pro-agency-dark">
                                                        <figure title="Agency (Dark)">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/agency-dark/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-agency-dark/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Agency (Dark)</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-agency-dark/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_business" data-design-id="inspiro-pro-business">
                                                        <figure title="Business">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/business/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-business/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Business</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-business/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_shop" data-design-id="inspiro-pro-shop">
                                                        <figure title="Shop">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/shop/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-shop/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Shop</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-shop/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_real-estate" data-design-id="inspiro-pro-real-estate">
                                                        <figure title="Real Estate">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/real-estate/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-real-estate/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Real Estate</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-real-estate/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_charity" data-design-id="inspiro-pro-charity">
                                                        <figure title="Charity / NGO">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/charity/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-charity/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Charity / NGO</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-charity/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_fitness" data-design-id="inspiro-pro-fitness">
                                                        <figure title="Fitness / Gym">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/fitness/fitness-home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-fitness/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Fitness / Gym</h5>
                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-fitness/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>

                                                    <li class="design_winery" data-design-id="inspiro-pro-winery">
                                                        <figure title="Winery">
                                                            <div class="preview-thumbnail" style="background-image:url('https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/winery/home-thumb.png')"><a href="https://demo.wpzoom.com/inspiro-pro-winery/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Winery</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-pro-winery/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="design_tech" data-design-id="inspiro-tech">
                                                        <figure title="Tech">
                                                            <div class="preview-thumbnail" style="background-image:url('https://demo.wpzoom.com/inspiro-pro-demo/wp-content/themes/inspiro-pro-select/images/site-layout_tech.png')"><a href="https://demo.wpzoom.com/inspiro-tech/" target="_blank" class="button-select-template">View Demo</a></div>
                                                            <figcaption>
                                                                <h5>Tech / Finance</h5>

                                                                <p>
                                                                    <a href="https://demo.wpzoom.com/inspiro-tech/" target="_blank" rel="noopener" title="Live preview">Live preview</a>
                                                                </p>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                </ul>
                                                </form>
                                            </div>
                                        </li>

                                    </ol>

                                    <br />
                                    <br />
                                    <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-pro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-pro', 'inspiro' ) ); ?>" target="_blank" class="button button-large button-primary">
                                        <?php esc_html_e( 'Get Inspiro PRO Today &rarr;', 'inspiro' ); ?>
                                    </a>

                                </div>

                            </div>

                        </div>

                        <div class="wpz-onboard_content-side">

                            <div class="wpz-onboard_content-side-section discover-premium">
                                <h3 class="wpz-onboard_content-side-section-title icon-docs">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg">
                                    <mask id="mask0_3409_3568" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                    <rect width="24" height="24" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_3409_3568)">
                                    <path d="M19 9L17.75 6.25L15 5L17.75 3.75L19 1L20.25 3.75L23 5L20.25 6.25L19 9ZM19 23L17.75 20.25L15 19L17.75 17.75L19 15L20.25 17.75L23 19L20.25 20.25L19 23ZM9 20L6.5 14.5L1 12L6.5 9.5L9 4L11.5 9.5L17 12L11.5 14.5L9 20ZM9 15.15L10 13L12.15 12L10 11L9 8.85L8 11L5.85 12L8 13L9 15.15Z" fill="white"/>
                                    </g>
                                    </svg> <?php esc_html_e( 'Inspiro Premium', 'inspiro' ); ?></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'Upgrade to the Premium version to get instant access to unique features and dozen of pre-built demos!', 'inspiro' ); ?></p>

                                <a href="https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium" title="Inspiro Premium" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-premium.png' ); ?>" width="300" alt="<?php echo esc_attr__( 'Inspiro Premium', 'inspiro' ); ?>" /></a>

                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium" title="Inspiro Premium" target="_blank" class="button"><?php esc_html_e( 'Discover the Premium Version &rarr;', 'inspiro' ); ?></a>
                                </div>

                            </div>

                            <div class="wpz-onboard_content-side-section discover-premium inspiro-block-version">
                                <h3 class="wpz-onboard_content-side-section-title icon-docs">
                                    <svg id="Icons" width="24" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><style type="text/css">.st20{fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><line class="st20" x1="3" x2="29" y1="11" y2="11"></line><g><path d="M7,9C6.7,9,6.5,8.9,6.3,8.7C6.1,8.5,6,8.3,6,8c0-0.3,0.1-0.5,0.3-0.7c0,0,0.1-0.1,0.1-0.1c0.1,0,0.1-0.1,0.2-0.1   C6.7,7,6.7,7,6.8,7c0.1,0,0.3,0,0.4,0c0.1,0,0.1,0,0.2,0.1c0.1,0,0.1,0.1,0.2,0.1c0,0,0.1,0.1,0.1,0.1c0.1,0.1,0.2,0.2,0.2,0.3   C8,7.7,8,7.9,8,8c0,0.1,0,0.3-0.1,0.4C7.9,8.5,7.8,8.6,7.7,8.7C7.5,8.9,7.3,9,7,9z"></path></g><g><path d="M10,9C9.7,9,9.5,8.9,9.3,8.7C9.1,8.5,9,8.3,9,8c0-0.1,0-0.3,0.1-0.4c0.1-0.1,0.1-0.2,0.2-0.3c0.1-0.1,0.2-0.2,0.3-0.2   C10,6.9,10.4,7,10.7,7.3c0.1,0.1,0.2,0.2,0.2,0.3C11,7.7,11,7.9,11,8c0,0.3-0.1,0.5-0.3,0.7C10.5,8.9,10.3,9,10,9z"></path></g><g><path d="M13,9c-0.1,0-0.3,0-0.4-0.1c-0.1-0.1-0.2-0.1-0.3-0.2c-0.1-0.1-0.2-0.2-0.2-0.3C12,8.3,12,8.1,12,8c0-0.1,0-0.3,0.1-0.4   c0.1-0.1,0.1-0.2,0.2-0.3c0.4-0.4,1-0.4,1.4,0c0.1,0.1,0.2,0.2,0.2,0.3C14,7.7,14,7.9,14,8c0,0.1,0,0.3-0.1,0.4   c-0.1,0.1-0.1,0.2-0.2,0.3C13.5,8.9,13.3,9,13,9z"></path></g><path class="st20" d="M27,5H5C3.9,5,3,5.9,3,7v18c0,1.1,0.9,2,2,2h22c1.1,0,2-0.9,2-2V7C29,5.9,28.1,5,27,5z"></path><line class="st20" x1="3" x2="19" y1="19" y2="19"></line><line class="st20" x1="19" x2="19" y1="11" y2="27"></line></svg>  <?php esc_html_e( 'Inspiro Blocks Theme', 'inspiro' ); ?> &nbsp;&nbsp;<svg width="57" height="25" viewBox="0 0 57 25" fill="none" xmlns="https://www.w3.org/2000/svg"><rect width="57" height="25" rx="12.5" fill="white"/><path opacity="0.9" d="M21.3714 7.81818V18H19.7308L14.9332 11.0646H14.8487V18H13.0043V7.81818H14.6548L19.4474 14.7585H19.5369V7.81818H21.3714ZM23.3812 18V7.81818H30.0034V9.36435H25.2257V12.1286H29.6603V13.6747H25.2257V16.4538H30.0431V18H23.3812ZM34.0279 18L31.1543 7.81818H33.138L34.9725 15.3004H35.0669L37.0257 7.81818H38.8304L40.7942 15.3054H40.8837L42.7182 7.81818H44.7019L41.8283 18H40.0087L37.9703 10.8558H37.8908L35.8475 18H34.0279Z" fill="#3496FF"/></svg></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'We have launched a new version of the Inspiro theme that is compatible with the new Site Editor. Experience the future of WordPress with our new block theme!', 'inspiro' ); ?></p>

                                <a href="https://www.wpzoom.com/themes/inspiro-blocks/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-blocks" title="Inspiro Premium" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-blocks.png' ); ?>" width="300" alt="<?php echo esc_attr__( 'Inspiro Premium', 'inspiro' ); ?>" /></a>

                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="<?php echo esc_url( admin_url( 'theme-install.php?search=inspiro%2Bblocks' ) ); ?>" title="Inspiro Blocks" target="_blank" class="button"><?php esc_html_e( 'Install Now', 'inspiro' ); ?> &nbsp;<svg class="feather feather-download" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="20" xmlns="https://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg></a>
                                </div>

                            </div>


                            <div class="wpz-onboard_content-side-section">
                                <h3 class="wpz-onboard_content-side-section-title icon-docs">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.96074 2H19.9019C20.9965 2 21.8921 2.9 21.8921 4V16C21.8921 17.1 20.9965 18 19.9019 18H7.96074C6.86614 18 5.97055 17.1 5.97055 16V4C5.97055 2.9 6.86614 2 7.96074 2ZM1.99017 6H3.98036V20H17.9117V22H3.98036C2.88576 22 1.99017 21.1 1.99017 20V6ZM19.9019 16H7.96075V4H19.9019V16ZM17.9117 9H9.95093V11H17.9117V9ZM9.95093 12H13.9313V14H9.95093V12ZM17.9117 6H9.95093V8H17.9117V6Z"></path>
                                    </svg> <?php esc_html_e( 'Need help?', 'inspiro' ); ?></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'Documentation is the place where you’ll find the information needed to setup the theme quickly, and other details about theme-specific features. You can also get in touch with our team by contacting us through our website or using the Support Forum.', 'inspiro' ); ?></p>
                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://www.wpzoom.com/documentation/inspiro-lite/" title="Read documentation" target="_blank" class="button"><?php esc_html_e( 'Documentation', 'inspiro' ); ?></a> <a href="https://wordpress.org/support/theme/inspiro/" title="Open Support Desk" target="_blank" class="button"><?php esc_html_e( 'Support Forums', 'inspiro' ); ?></a>

                                </div>

                            </div>

                            <div class="wpz-onboard_content-side-section">
                                <h3 class="wpz-onboard_content-side-section-title icon-assist">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9216 2H2.98533C2.43803 2 1.99023 2.45 1.99023 3V17L5.97062 13H15.9216C16.4689 13 16.9167 12.55 16.9167 12V3C16.9167 2.45 16.4689 2 15.9216 2ZM14.9265 4V11H5.14473L3.98047 12.17V4H14.9265ZM18.9068 6H20.897C21.4443 6 21.8921 6.45 21.8921 7V22L17.9117 18H6.96568C6.41837 18 5.97058 17.55 5.97058 17V15H18.9068V6Z"></path>
                                    </svg> <?php esc_html_e( 'Walkthrough Video', 'inspiro' ); ?></h3>
                                <p class="wpz-onboard_content-side-section-content"><?php esc_html_e( 'Below you can find a quick video tutorial that will guide you through configuring basic things in the theme after installing it. Please remember that this video was created in 2021, and since then, many things have improved in our theme.', 'inspiro' ); ?></p>

                                <iframe width="800" height="464" src="https://www.youtube.com/embed/ZltZDp2z0N8" title="INSPIRO Lite Free WordPress Theme - For Photographers, Videographers and Portfolios" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


                            </div>

                            <div class="wpz-onboard_content-side-section">
                            <div class="section">
                                <div class="inner-section">
                                    <?php
                                    $current_user = wp_get_current_user();
                                    ?>

                                    <h3 class="wpz-onboard_content-side-section-title">
                                        <svg viewBox="0 0 512 512" xmlns="https://www.w3.org/2000/svg" width="21"><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg> <?php esc_html_e( 'Subscribe for Tips & Tricks', 'inspiro' ); ?>
                                    </h3>
                                    <p class="about">
                                        <?php esc_html_e( 'To ease up the journey you’re starting with Inspiro, we’re sending you some useful tips & tricks to have the best experience building your website.', 'inspiro' ); ?>
                                    </p>
                                    <p>
                                        <div id="mlb2-5543648" class="ml-form-embedContainer ml-subscribe-form ml-subscribe-form-5543648">
                                          <div class="ml-form-align-center">
                                            <div class="ml-form-embedWrapper embedForm">
                                              <div class="ml-form-embedBody ml-form-embedBodyDefault row-form">
                                                <form class="ml-block-form" action="https://static.mailerlite.com/webforms/submit/f1v8a3" data-code="f1v8a3" method="post" target="_blank">
                                                    <input aria-label="email" aria-required="true" type="email" value="<?php echo esc_attr($current_user->user_email); ?>" class="form-control" data-inputmask="" name="fields[email]" placeholder="Email" autocomplete="email">
                                                  <input type="hidden" name="ml-submit" value="1">
                                                  <span class="ml-form-embedSubmit">
                                                    <button type="submit" class="button button-primary">Subscribe</button>
                                                    <button disabled="disabled" style="display:none" type="button" class="loading button-primary"> <div class="ml-form-embedSubmitLoad"></div> <span class="sr-only">Loading...</span> </button>
                                                  </span>
                                                  <input type="hidden" name="anticsrf" value="true">
                                                </form>
                                              </div>
                                              <div class="ml-form-successBody row-success" style="display:none">
                                                <div class="ml-form-successContent">
                                                  <h3>Thank you!</h3>
                                                  <p>You have successfully joined our subscriber list.</p>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <script>
                                          function ml_webform_success_5543648(){var r=ml_jQuery||jQuery;r(".ml-subscribe-form-5543648 .row-success").show(),r(".ml-subscribe-form-5543648 .row-form").hide()}
                                        </script>
                                        <img src="https://track.mailerlite.com/webforms/o/5543648/f1v8a3?v1646129865" width="1" height="1" style="max-width:1px;max-height:1px;visibility:hidden;padding:0;margin:0;display:block" alt="." border="0">
                                        <script src="https://static.mailerlite.com/js/w/webforms.min.js?v0c75f831c56857441820dcec3163967c" type="text/javascript"></script>                     </p>
                                </div>
                            </div>
                            </div>

                            <div class="wpz-onboard_content-side-section">
                                <h3 class="wpz-onboard_content-side-section-title icon-follow">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8971 9H14.618L15.5633 4.43L15.5932 4.11C15.5932 3.7 15.424 3.32 15.1553 3.05L14.1005 2L7.55281 8.59C7.18462 8.95 6.9657 9.45 6.9657 10V20C6.9657 21.1 7.86129 22 8.95589 22H17.9118C18.7377 22 19.4442 21.5 19.7427 20.78L22.7479 13.73C22.8375 13.5 22.8872 13.26 22.8872 13V11C22.8872 9.9 21.9917 9 20.8971 9ZM20.897 13L17.9117 20H8.95587V10L13.2746 5.66003L12.17 11H20.897V13ZM4.9755 10H0.995117V22H4.9755V10Z"></path>
                                    </svg> Follow WPZOOM
                                </h3>
                                <p class="wpz-onboard_content-side-section-content">Follow us on social media for news and updates on all your theme needs.</p>
                                <div class="wpz-onboard_content-side-section-button">
                                    <a href="https://twitter.com/wpzoom" target="_blank" title="Twitter" class="button button-smaller button-rounded"><span class="dashicons dashicons-twitter"></span> <span class="icon-text">Twitter</span></a>
                                    <a href="https://facebook.com/wpzoom" target="_blank" title="Facebook" class="button button-smaller button-rounded"><svg width="18" height="18" fill="#fff" role="img" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg> <span class="icon-text">Facebook</span></a>
                                    <a href="https://instagram.com/wpzoom" target="_blank" title="Instagram" class="button button-smaller button-rounded"><span class="dashicons dashicons-instagram"></span> <span class="icon-text">Instagram</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div> <!-- /#tabs -->

            <div class="wpz-onboard_footer">
                <h3 class="wpz-onboard_footer-logo"><a href="https://wpzoom.com/" title="WPZOOM">WPZOOM</a></h3>

                <ul class="wpz-onboard_footer-links">
                    <li class="wpz-onboard_footer-links-themes"><a href="https://www.wpzoom.com/themes/" target="_blank" title="Themes">Premium Themes</a></li>
                    <li class="wpz-onboard_footer-links-plugins"><a href="https://www.wpzoom.com/plugins/" target="_blank" title="Plugins">Plugins</a></li>
                    <li class="wpz-onboard_footer-links-blog"><a href="https://www.wpzoom.com/blog/" target="_blank" title="Blog">Our Blog</a></li>
                    <li class="wpz-onboard_footer-links-support"><a href="https://www.wpzoom.com/support/" target="_blank" title="Support">Support</a></li>
                </ul>
            </div>
        </div>

    <?php
}

?>