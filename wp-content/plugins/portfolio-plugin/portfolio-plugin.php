<?php
/*
Plugin Name: Portfolio Plugin
Plugin URI: nathanmhouse.com
Description: The Portfolio Plugin adds functionality to the portfolio theme.
Version: 0.1
Author: Nathan M. House
Author URI:
Text Domain: portfolio-plugin
Copyright: Nathan M. House
License:
*/

/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
1.0 Custom Post-type Registration
2.0 Custom Post-type Redirect

*/


/**
 * 1.0 Custom Post-type Registration
 *
**/
add_action( 'init', 'pp_register_post_types' );
function pp_register_post_types() {

	// Register Examples post type
	register_post_type(
		'pp_examples',
		array(
			'label'       => __( 'Examples', 'portfolio-plugin' ),
			'description' => __( 'Portfolio work pieces.', 'portfolio-plugin' ),
			'labels'      => array(
				'name'                  => _x( 'Examples', 'Post Type General Name', 'portfolio-plugin' ),
				'singular_name'         => _x( 'Example', 'Post Type Singular Name', 'portfolio-plugin' ),
				'menu_name'             => __( 'Examples', 'portfolio-plugin' ),
				'name_admin_bar'        => __( 'Example', 'portfolio-plugin' ),
				'archives'              => __( 'Example Archives', 'portfolio-plugin' ),
				'parent_item_colon'     => __( 'Parent Example:', 'portfolio-plugin' ),
				'all_items'             => __( 'All Examples', 'portfolio-plugin' ),
				'add_new_item'          => __( 'Add New Example', 'portfolio-plugin' ),
				'add_new'               => __( 'Add New', 'portfolio-plugin' ),
				'new_item'              => __( 'New Example', 'portfolio-plugin' ),
				'edit_item'             => __( 'Edit Example', 'portfolio-plugin' ),
				'update_item'           => __( 'Update Example', 'portfolio-plugin' ),
				'view_item'             => __( 'View Example', 'portfolio-plugin' ),
				'search_items'          => __( 'Search Example', 'portfolio-plugin' ),
				'not_found'             => __( 'Not found', 'portfolio-plugin' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'portfolio-plugin' ),
				'featured_image'        => __( 'Featured Image', 'portfolio-plugin' ),
				'set_featured_image'    => __( 'Set featured image', 'portfolio-plugin' ),
				'remove_featured_image' => __( 'Remove featured image', 'portfolio-plugin' ),
				'use_featured_image'    => __( 'Use as featured image', 'portfolio-plugin' ),
				'insert_into_item'      => __( 'Insert into example', 'portfolio-plugin' ),
				'uploaded_to_this_item' => __( 'Uploaded to this example', 'portfolio-plugin' ),
				'items_list'            => __( 'Example list', 'portfolio-plugin' ),
				'items_list_navigation' => __( 'Examples list navigation', 'portfolio-plugin' ),
				'filter_items_list'     => __( 'Filter examples list', 'portfolio-plugin' ),
			),
			'supports' => array(
				'title',
				'revisions',
				'page-attributes',
			),
			'taxonomies'            => array(),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-media-code',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => array(
				'slug'       => 'examples',
				'with_front' => false,
				'pages'      => false,
				'feeds'      => false,
			),
			'capability_type'       => 'post',
		)
	);

	// Register Testimonials post type
	register_post_type(
		'pp_testimonials',
		array(
			'label'       => __( 'Testimonials', 'portfolio-plugin' ),
			'description' => __( 'Recommendations and references.', 'portfolio-plugin' ),
			'labels'      => array(
				'name'                  => _x( 'Testimonials', 'Post Type General Name', 'portfolio-plugin' ),
				'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'portfolio-plugin' ),
				'menu_name'             => __( 'Testimonials', 'portfolio-plugin' ),
				'name_admin_bar'        => __( 'Testimonial', 'portfolio-plugin' ),
				'archives'              => __( 'Testimonial Archives', 'portfolio-plugin' ),
				'parent_item_colon'     => __( 'Parent Testimonial:', 'portfolio-plugin' ),
				'all_items'             => __( 'All Testimonials', 'portfolio-plugin' ),
				'add_new_item'          => __( 'Add New Testimonial', 'portfolio-plugin' ),
				'add_new'               => __( 'Add New', 'portfolio-plugin' ),
				'new_item'              => __( 'New Testimonial', 'portfolio-plugin' ),
				'edit_item'             => __( 'Edit Testimonial', 'portfolio-plugin' ),
				'update_item'           => __( 'Update Testimonial', 'portfolio-plugin' ),
				'view_item'             => __( 'View Testimonial', 'portfolio-plugin' ),
				'search_items'          => __( 'Search Testimonial', 'portfolio-plugin' ),
				'not_found'             => __( 'Not found', 'portfolio-plugin' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'portfolio-plugin' ),
				'featured_image'        => __( 'Featured Image', 'portfolio-plugin' ),
				'set_featured_image'    => __( 'Set featured image', 'portfolio-plugin' ),
				'remove_featured_image' => __( 'Remove featured image', 'portfolio-plugin' ),
				'use_featured_image'    => __( 'Use as featured image', 'portfolio-plugin' ),
				'insert_into_item'      => __( 'Insert into testimonial', 'portfolio-plugin' ),
				'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'portfolio-plugin' ),
				'items_list'            => __( 'Testimonial list', 'portfolio-plugin' ),
				'items_list_navigation' => __( 'Testimonials list navigation', 'portfolio-plugin' ),
				'filter_items_list'     => __( 'Filter testimonials list', 'portfolio-plugin' ),
			),
			'supports' => array(
				'editor',
				'title',
				'revisions',
				'page-attributes',
			),
			'taxonomies'            => array(),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-heart',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => array(
				'slug'       => 'testimonials',
				'with_front' => false,
				'pages'      => false,
				'feeds'      => false,
			),
			'capability_type'       => 'post',
		)
	);
}


/**
 * 2.0 Custom Post-type Redirect
 *
**/
add_action( 'template_redirect', 'portfolio_custom_post_type_template_redirect' );
function portfolio_custom_post_type_template_redirect() {

	// Get the queried custom post type
	$queried_post_type = get_query_var( 'post_type' );

	// Check if we're on a single and the queried post type is one of our custom post types
	if ( is_single()
	   && ( 'pp_examples' === $queried_post_type
	   || 'pp_testimonials' === $queried_post_type ) ) {
		wp_safe_redirect(
			home_url(),
			301
		);
		exit;
	}
}
