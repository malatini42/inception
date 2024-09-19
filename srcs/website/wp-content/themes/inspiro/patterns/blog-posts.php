<?php
/**
 * Title: Blog Posts
 * Slug: inspiro/blog-posts
 * Description: 
 * Categories: posts
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="news" class="wp-block-group"><!-- wp:spacer {"height":"108px"} -->
<div style="height:108px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"left","textColor":"secondary"} -->
<p class="has-text-align-left has-secondary-color has-text-color">FROM THE BLOG</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left","className":"wp-block-heading"} -->
<h2 class="wp-block-heading has-text-align-left">Latest News</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"33px"} -->
<div style="height:33px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":4,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"240px","style":{"border":{"radius":"5px"},"spacing":{"margin":{"bottom":"var:preset|spacing|x-small"}}}} /-->

<!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"tertiary"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|x-small"}}}} /-->

<!-- wp:post-excerpt {"excerptLength":38,"style":{"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary"} /-->

<!-- wp:read-more {"style":{"border":{"width":"2px"},"spacing":{"padding":{"right":"var:preset|spacing|x-small","left":"var:preset|spacing|x-small","top":"10px","bottom":"10px"}},"typography":{"textTransform":"uppercase"}},"textColor":"foreground"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"85px"} -->
<div style="height:85px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
