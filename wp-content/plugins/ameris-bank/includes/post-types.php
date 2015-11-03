<?php

/**
 * Register the custom post types.
 */
function ameris_custom_post_types() {

	// Tools & Resources
	/* register_post_type( 'tool_resource', array(
		'labels' => array(
			'name'               => 'Tools & Resources',
			'singular_name'      => 'Tool/Resource',
			'all_items'          => 'All Tools & Resources',
			'add_new_item'       => 'Add New Tool/Resource',
			'edit_item'          => 'Edit Tool/Resource',
			'new_item'           => 'New Tool/Resource',
			'view_item'          => 'View Tool/Resource',
			'search_items'       => 'Search Tools & Resources',
			'not_found'          => 'No Tools & Resources Found',
			'not_found_in_trash' => 'No Tools & Resources Found in Trash'
		),
		'public'       => true,
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'tools-resources', 'with_front' => false ),
		'supports'     => array( 'title', 'editor', 'page-attributes', 'revisions', 'thumbnail' ),
		'menu_icon'    => 'dashicons-hammer'
	) ); */

	// Slides - for homepage slider
	register_post_type( 'slide', array(
		'labels' => array(
			'name'               => 'Slides',
			'singular_name'      => 'Slide',
			'all_items'          => 'All Slides',
			'add_new_item'       => 'Add New Slide',
			'edit_item'          => 'Edit Slide',
			'new_item'           => 'New Slide',
			'view_item'          => 'View Slide',
			'search_items'       => 'Search Slides',
			'not_found'          => 'No Slides Found',
			'not_found_in_trash' => 'No Slides Found in Trash'
		),
		'public'       => false,
		'show_ui'      => true,
		'supports'     => array( 'title', 'page-attributes', 'thumbnail' ),
		'menu_icon'    => 'dashicons-format-gallery'
	) );

	// Leadership - for Leadership Group page & bios
	register_post_type( 'leadership', array(
		'labels' => array(
			'name'               => 'Leadership',
			'singular_name'      => 'Leader',
			'all_items'          => 'Leadership',
			'add_new_item'       => 'Add New Leader',
			'edit_item'          => 'Edit Leader',
			'new_item'           => 'New Leader',
			'view_item'          => 'View Leader',
			'search_items'       => 'Search Leadership',
			'not_found'          => 'No Leaders Found',
			'not_found_in_trash' => 'No Leaders Found in Trash'
		),
		'public'       => true,
		'rewrite'      => array( 'slug' => 'about-us/leadership', 'with_front' => false ),
		'supports'     => array( 'title', 'thumbnail' ),
		'menu_icon'    => 'dashicons-groups'
	) );

}
add_action( 'init', 'ameris_custom_post_types' );