<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     8.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<div class="inner-wrap">

	<main id="main" class="site-main" role="main">

		<?php woocommerce_breadcrumb(); ?>

		<h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>

		<div class="shop-wrapper">

			<?php do_action( 'woocommerce_archive_description' ); ?>

			<?php

				do_action( 'woocommerce_output_content_wrapper' );
			?>


			<?php if ( have_posts() ) : ?>

				<?php
					/**
					 * woocommerce_before_shop_loop hook
					 *
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
				?>


				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php 
					while ( have_posts() ) :
						the_post(); 
						?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php
					/**
					 * woocommerce_after_shop_loop hook
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				?>

				<?php 
			elseif ( ! woocommerce_product_subcategories(
				array(
					'before' => woocommerce_product_loop_start( false ),
					'after'  => woocommerce_product_loop_end( false ),
				) 
			) ) : 
				?>

				<?php wc_get_template( 'loop/no-products-found.php' ); ?>

			<?php endif; ?>

		</div>

	</main><!-- /#main -->

</div><!-- .inner-wrap -->

<?php get_footer( 'shop' ); ?>
