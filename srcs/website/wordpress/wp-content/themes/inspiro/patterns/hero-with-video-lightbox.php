<?php
/**
 * Title: Hero with Video Lightbox
 * Slug: inspiro/hero-with-video-lightbox
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
<!-- wp:cover {"url":"https://demo.wpzoom.com/wp-content/Pexels-Videos-1409899-1.mp4?file=2022/03/Pexels-Videos-1409899-1.mp4","id":38,"dimRatio":40,"overlayColor":"black","backgroundType":"video","minHeightUnit":"px","contentPosition":"center center","isDark":false,"align":"full","style":{"border":{"radius":"0px"}},"className":"is-position-center-center"} -->
<div class="wp-block-cover alignfull is-light is-position-center-center" style="border-radius:0px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="https://demo.wpzoom.com/wp-content/Pexels-Videos-1409899-1.mp4?file=2022/03/Pexels-Videos-1409899-1.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#fffffa"},"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-text-color has-medium-font-size" style="color:#fffffa;text-transform:uppercase">Unleash your creativity with Inspiro</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white"} -->
<p class="has-text-align-center has-white-color has-text-color">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a placeholder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column -->

<!-- wp:column {"width":"120px"} -->
<div class="wp-block-column" style="flex-basis:120px"><!-- wp:wpzoom-video-popup-block/block {"url":"https://vimeo.com/298573214","text":"","icon":2,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","fontSize":"large"} -->
<a class="wp-block-wpzoom-video-popup-block-block wpzoom-video-popup-block has-white-color has-text-color has-link-color has-large-font-size" href="https://vimeo.com/298573214"><span class="wpzoom-video-popup-block_icon"><svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"><path d="m14.25 10.367c-1-0.57778-2.2504 0.14388-2.2504 1.2988v8.6674c0 1.155 1.2504 1.8766 2.2504 1.2988l8.2498-4.7666c0.3094-0.1786 0.4998-0.5088 0.4998-0.86588 0-0.35714-0.1904-0.68718-0.4998-0.86586zm-14.25 5.6326c0-8.8366 7.1634-16 16-16 8.8366 0 16 7.1634 16 16 0 8.8366-7.1634 16-16 16-8.8366 0-16-7.1634-16-16zm16-14c-7.732 0-14 6.268-14 14 0 7.732 6.268 14 14 14 7.732 0 14-6.268 14-14 0-7.732-6.268-14-14-14z" fill="currentColor"></path></svg></span></a>
<!-- /wp:wpzoom-video-popup-block/block --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"31px"} -->
<div style="height:31px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
