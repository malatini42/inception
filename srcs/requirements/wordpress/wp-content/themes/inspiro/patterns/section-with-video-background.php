<?php
/**
 * Title: Section with Video Background
 * Slug: wpzoom/section-with-video-background
 * Description: 
 * Categories: inspiro, header, featured
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 * Custom Categories: Inspiro
 */
register_block_pattern_category( 'inspiro', [ 'label' => __( 'Inspiro', 'inspiro' ), 'pm_custom' => true ] );
?>
<!-- wp:cover {"url":"https://demo.wpzoom.com/inspiro-lite/files/2022/03/Pexels-Videos-1409899-1.mp4","id":6672,"dimRatio":20,"backgroundType":"video","minHeight":700,"contentPosition":"center center","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light" style="min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="https://demo.wpzoom.com/inspiro-lite/files/2022/03/Pexels-Videos-1409899-1.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","style":{"typography":{"fontSize":"70px","fontStyle":"normal","fontWeight":"900"}},"textColor":"white"} -->
<p class="has-text-align-center has-white-color has-text-color" style="font-size:70px;font-style:normal;font-weight:900"><strong>Create. Amaze. Inspire.</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"1px"}},"textColor":"white","fontSize":"medium"} -->
<p class="has-text-align-center has-white-color has-text-color has-medium-font-size" style="letter-spacing:1px">Inspiro is a Portfolio &amp; Photography WordPress Theme. This area supports self-hosted videos as well as videos from YouTube and Vimeo.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"71px"} -->
<div style="height:71px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","style":{"border":{"radius":"0px"}},"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#" style="border-radius:0px">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
