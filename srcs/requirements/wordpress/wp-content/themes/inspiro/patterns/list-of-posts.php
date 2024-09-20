<?php
/**
 * Title: List of Posts
 * Slug: inspiro/list-of-posts
 * Description: 
 * Categories: inspiro, posts
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 * Custom Categories: Inspiro
 */
register_block_pattern_category( 'inspiro', [ 'label' => __( 'Inspiro', 'inspiro' ), 'pm_custom' => true ] );
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="news" class="wp-block-group"><!-- wp:spacer {"height":"151px"} -->
<div style="height:151px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"left","textColor":"secondary"} -->
<p class="has-text-align-left has-secondary-color has-text-color">FROM THE BLOG</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left"} -->
<h2 class="wp-block-heading has-text-align-left">News</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"46px"} -->
<div style="height:46px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":4,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":2}} -->
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|x-small"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-bottom:var(--wp--preset--spacing--x-small)"><!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:post-date /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","fontSize":"max-36"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"right","linkUrl":"#"} -->
<div class="wp-block-outermost-icon-block items-justified-right"><a class="icon-container" href="#" style="width:48px"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M42.0635 13.4921L6.84524 48.8095C6.05159 49.6032 5.10847 50 4.01587 50C2.92593 50 1.98413 49.6032 1.19047 48.8095C0.396824 48.0159 0 47.0727 0 45.9802C0 44.8902 0.396824 43.9484 1.19047 43.1548L36.5079 7.93651H6.34921C5.22487 7.93651 4.28175 7.55688 3.51984 6.79762C2.76058 6.03571 2.38095 5.09259 2.38095 3.96825C2.38095 2.84392 2.76058 1.90079 3.51984 1.13889C4.28175 0.37963 5.22487 0 6.34921 0H46.0317C47.1561 0 48.0979 0.37963 48.8571 1.13889C49.619 1.90079 50 2.84392 50 3.96825V43.6508C50 44.7751 49.619 45.7169 48.8571 46.4762C48.0979 47.2381 47.1561 47.619 46.0317 47.619C44.9074 47.619 43.9656 47.2381 43.2063 46.4762C42.4444 45.7169 42.0635 44.7751 42.0635 43.6508V13.4921Z" fill="currentColor"></path></svg></a></div>
<!-- /wp:outermost/icon-block --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"backgroundColor":"lightgrey","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-lightgrey-color has-alpha-channel-opacity has-lightgrey-background-color has-background is-style-wide"/>
<!-- /wp:separator -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"115px"} -->
<div style="height:115px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
