<?php
/**
 * Template Name: Flexible Content
 *
 *
 * @package Portfolio
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :

		the_post();

		// The title module
		get_template_part( 'template-parts/module', 'title' );

		// The flexible content rows
		get_template_part( 'template-parts/content', 'flexible-content' );

	endwhile;
endif;

get_footer();
