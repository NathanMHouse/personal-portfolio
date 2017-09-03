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

*/


/**
 * 1.0 Custom Post-type Registration
 *
 * 
 *
**/

// Create function
function pp_register_post_type( $singular, $plural, $text_domain, $description, $menu_position, $icon ) {

	// create labels array
	$labels = array(
		'name'                  => _x( $plural, 'Post Type General Name', 
	                                   $text_domain ),
	    'singular_name'         => _x( $singular, 'Post Type Singular Name',
	                                   $text_domain ),
	    'menu_name'             => __( $plural, 
	                                   $text_domain ),
	    'name_admin_bar'        => __( $singular, 
	                                   $text_domain ),
	    'archives'              => __( $singular . ' Archives', 
	                                   $text_domain ),
	    'parent_item_colon'     => __( 'Parent ' . $singular . ':', 
	                                   $text_domain ),
	    'all_items'             => __( 'All ' . $plural, 
	                                   $text_domain ),
	    'add_new_item'          => __( 'Add New ' . $singular, 
	                                   $text_domain ),
	    'add_new'               => __( 'Add New', 
	                                   $text_domain ),
	    'new_item'              => __( 'New ' . $singular, 
	                                   $text_domain ),
	    'edit_item'             => __( 'Edit ' . $singular, 
	                                   $text_domain ),
	    'update_item'           => __( 'Update ' . $singular, 
	                                   $text_domain ),
	    'view_item'             => __( 'View ' . $singular, 
	                                   $text_domain ),
	    'search_items'          => __( 'Search ' . $singular, 
	                                   $text_domain ),
	    'not_found'             => __( 'Not found',
	                                   $text_domain ),
	    'not_found_in_trash'    => __( 'Not found in Trash', 
	                                   $text_domain ),
	    'featured_image'        => __( 'Featured Image', 
	                                   $text_domain ),
	    'set_featured_image'    => __( 'Set featured image', 
	                                   $text_domain ),
	    'remove_featured_image' => __( 'Remove featured image', 
	                                   $text_domain ),
	    'use_featured_image'    => __( 'Use as featured image', 
	                                   $text_domain ),
	    'insert_into_item'      => __( 'Insert into ' . strtolower( $singular ), 
	                                   $text_domain ),
	    'uploaded_to_this_item' => __( 'Uploaded to this ' . strtolower( $singular ), 
	                                   $text_domain ),
	    'items_list'            => __( $singular . ' list', 
	                                   $text_domain ),
	    'items_list_navigation' => __( $plural . ' list navigation', 
	                                   $text_domain ),
	    'filter_items_list'     => __( 'Filter '. strtolower( $plural ) . ' list', 
	                                   $text_domain ),
	);

	// Create rewrite array
	$rewrite = array(
	    'slug'                  => strtolower( $plural ),
	    'with_front'            => false,
	    'pages'                 => false,
	    'feeds'                 => false,
	);

	// Create final args list
	 $args = array(
	    'label'                 => __( $plural, 
	                                   $text_domain ),
	    'description'           => __( $description,
	                                   $text_domain ),
	    'labels'                => $labels,
	    'supports'              => array(
	                                'title',
	                                'editor',
	                                'excerpt',
	                                'thumbnail',
	                                'revisions',
	                                'page-attributes',
	                             ),
	    'taxonomies'            => array(),
	    'hierarchical'          => false,
	    'public'                => true,
	    'show_ui'               => true,
	    'show_in_menu'          => true,
	    'menu_position'         => $menu_position,
	    'menu_icon'             => $icon,
	    'show_in_admin_bar'     => true,
	    'show_in_nav_menus'     => true,
	    'can_export'            => true,
	    'has_archive'           => false,
	    'exclude_from_search'   => false,
	    'publicly_queryable'    => true,
	    'rewrite'               => $rewrite,
	    'capability_type'       => 'post',
	);

	// Create namespaced post type name
	$post_type_name = 'pp_' . strtolower( $plural );

	// Register the post type
	register_post_type( $post_type_name, $args );
}

// Excecute function and create needed post types
function pp_register_post_types() {
	pp_register_post_type( 
							'Example', 
							'Examples', 
							'portfolio-plugin', 
							'Portfolio work pieces.',
							5,
							'dashicons-media-code' 
						);
	pp_register_post_type( 
							'Testimonial',
							'Testimonials',
							'portfolio-plugin',	
							'Recommendations and references.',
							6,
							'dashicons-heart' 
						);
}
add_action( 'init', 'pp_register_post_types');