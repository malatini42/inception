<?php
/**
 * Title: Portfolio
 * Slug: wpzoom/portfolio
 * Description: 
 * Categories: inspiro, portfolio, pages
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 * Custom Categories: Inspiro
 */
register_block_pattern_category( 'inspiro', [ 'label' => __( 'Inspiro', 'inspiro' ), 'pm_custom' => true ] );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0px"}}},"backgroundColor":"black","className":"portfolio-dark","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull portfolio-dark has-black-background-color has-background" id="portfolio" style="margin-top:0px"><!-- wp:spacer {"height":"122px"} -->
<div style="height:122px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"left","style":{"typography":{"letterSpacing":"1px"},"color":{"text":"#0bb4aa"}}} -->
<p class="has-text-align-left has-text-color" style="color:#0bb4aa;letter-spacing:1px">FROM THE PORTFOLIO</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"left","textColor":"white","fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-left has-white-color has-text-color has-large-font-size">Our Work</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"44px"} -->
<div style="height:44px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:wpzoom-blocks/portfolio {"align":"full","showCategoryFilter":false} /-->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
