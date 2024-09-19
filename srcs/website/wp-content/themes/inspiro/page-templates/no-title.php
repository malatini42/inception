<?php
/**
 * Template Name: Page without title
 */

get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php
    while ( have_posts() ) :
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; // End the loop.
    ?>

</main><!-- #main -->


<?php
get_footer();
