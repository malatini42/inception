<?php
/**
 * Title: Fullscreen Hero
 * Slug: wpzoom/fullscreen-hero
 * Description: 
 * Categories: inspiro, featured, header
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 * Custom Categories: Inspiro
 */
register_block_pattern_category( 'inspiro', [ 'label' => __( 'Inspiro', 'inspiro' ), 'pm_custom' => true ] );
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/StockSnap_ECZV5RZKSZ.jpg","id":5,"hasParallax":true,"dimRatio":50,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light has-parallax" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div role="img" class="wp-block-cover__image-background wp-image-5 has-parallax" style="background-position:50% 50%;background-image:url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/StockSnap_ECZV5RZKSZ.jpg)"></div><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"typography":{"fontSize":"70px","fontStyle":"normal","fontWeight":"900"}},"textColor":"white"} -->
<p class="has-text-align-center has-white-color has-text-color" style="font-size:70px;font-style:normal;font-weight:900"><strong>Create. Amaze. Inspire.</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"1px"}},"textColor":"white","fontSize":"medium"} -->
<p class="has-text-align-center has-white-color has-text-color has-medium-font-size" style="letter-spacing:1px">Inspiro is a Portfolio &amp; Photography WordPress Theme. This area supports self-hosted videos as well as videos from YouTube and Vimeo.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","style":{"border":{"radius":"0px"}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#" style="border-radius:0px">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
