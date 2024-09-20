<?php
/**
 * Title: Contact Card with Social Links
 * Slug: inspiro/contact-card-with-social-links
 * Description: 
 * Categories: contact, inspiro
 * Keywords: 
 * Viewport Width: 1280
 * Block Types: 
 * Post Types: 
 * Inserter: true
 * Custom Categories: Inspiro
 */
register_block_pattern_category( 'inspiro', [ 'label' => __( 'Inspiro', 'inspiro' ), 'pm_custom' => true ] );
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"border":{"radius":"8px","width":"1px"}},"borderColor":"primary","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-primary-border-color" style="border-width:1px;border-radius:8px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"}},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"0px","bottomRight":"0px"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:image {"align":"center","id":57,"width":"214px","height":"auto","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/team4.png" alt="" class="wp-image-57" style="aspect-ratio:1;object-fit:cover;width:214px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxx-small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"textColor":"white","className":"wp-block-heading"} -->
<h3 class="wp-block-heading has-text-align-center has-white-color has-text-color">John Doe</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"x-small"} -->
<p class="has-text-align-center has-white-color has-text-color has-x-small-font-size">Product Designer at WPZOOM</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","right":"var:preset|spacing|large","left":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"secondary","width":100,"style":{"border":{"radius":"99px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" style="border-radius:99px">Facebook</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"secondary","width":100,"style":{"border":{"radius":"99px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" style="border-radius:99px">Instagram</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"secondary","width":100,"style":{"border":{"radius":"99px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" style="border-radius:99px">Linkedin</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"secondary","width":100,"style":{"border":{"radius":"99px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button" style="border-radius:99px">X</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
