<?php
/**
 * Content template for flexible content blocks
 *
 *
 * @package Portfolio
 */

if ( have_rows( 'flexible_content' ) ) :

	// Count rows
	$i = 0;

	while ( have_rows( 'flexible_content' ) ) :

		the_row();

		// Increment the count
		$i++;

		// Get the generic values
		$title            = get_sub_field( 'title' );
		$content          = get_sub_field( 'content' );
		$row_color        = get_sub_field( 'row_color' );
		$image            = get_sub_field( 'image' );
		$padding          = get_sub_field( 'padding' );
		$margin           = get_sub_field( 'margin' );

		// Set up the row layout
		$row_layout = preg_replace( '/_/', '-', get_row_layout() );

		// Create classes for the row
		$content_row_class       = "content-row-$row_layout";
		$content_row_count_class = "content-row-$i";

		// Construct the path to the expected template file
		$file = get_template_directory() . '/template-parts/flexible-content-' . $row_layout . '.php';

		// Check if the flexible content template directory file exists
		if ( file_exists( $file ) && is_file( $file ) ) {

			// Include the template file
			include $file;
		}

	endwhile;
endif;
