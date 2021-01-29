<?php
/**
 * The template for displaying image archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Portfolio
 */

get_header();
if ( have_posts() ) :
    ?>
    <div class="content-section container">
        <div class="images">
            <?php
            while ( have_posts() ) :
            
                the_post();
                get_template_part( 'template-parts/content-pp_images' );

            endwhile;
            ?>
        </div>

        <?php
        if ( get_previous_posts_link() || get_next_posts_link() ) {
            ?>
            <div class="site-pagination">
                <span class="site-pagination__button site-pagination__button--previous-posts"><?php previous_posts_link( '&laquo;' ); ?></span>
                <span class="site-pagination__button site-pagination__button--next-posts"><?php next_posts_link( '&raquo;' ); ?></span>
            </div>
            <?php
        }
        ?>
    </div>

    <?php

else :

    get_template_part( 'template-parts/content', 'none' );

endif;
get_footer();
