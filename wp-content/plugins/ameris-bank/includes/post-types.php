<?php

/**
 * Register the custom post types.
 */
function ameris_custom_post_types() {

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

	// Lending Experts
	register_post_type( 'lending_expert', array(
		'labels' => array(
			'name'               => 'Lending Experts',
			'singular_name'      => 'Lending Expert',
			'all_items'          => 'Lending Experts',
			'add_new_item'       => 'Add New Lending Expert',
			'edit_item'          => 'Edit Lending Expert',
			'new_item'           => 'New Lending Expert',
			'view_item'          => 'View Lending Expert',
			'search_items'       => 'Search Lending Experts',
			'not_found'          => 'No Lending Experts Found',
			'not_found_in_trash' => 'No Lending Experts Found in Trash'
		),
		'public'       => true,
		'rewrite'      => array( 'slug' => 'sba-financing/lending-experts', 'with_front' => false ),
		'supports'     => array( 'title', 'thumbnail' ),
		'menu_icon'    => 'dashicons-groups'
	) );

	register_post_type( 'advisor', array(
		'labels' => array(
			'name'               => 'Advisors',
			'singular_name'      => 'Advisor',
			'all_items'          => 'Advisors',
			'add_new_item'       => 'Add New Advisor',
			'edit_item'          => 'Edit Advisor',
			'new_item'           => 'New Advisor',
			'view_item'          => 'View Advisor',
			'search_items'       => 'Search Advisors',
			'not_found'          => 'No Advisors Found',
			'not_found_in_trash' => 'No Advisors Found in Trash'
		),
		'public'       => true,
		'rewrite'      => array( 'slug' => 'personal-banking/advisory-services/speak-with-an-advisor', 'with_front' => false ),
		'supports'     => array( 'title', 'thumbnail' ),
		'menu_icon'    => 'dashicons-groups'
	) );

	register_post_type( 'warehouse_lender', array(
		'labels' => array(
			'name'               => 'Warehouse Lenders',
			'singular_name'      => 'Warehouse Lender',
			'all_items'          => 'Warehouse Lenders',
			'add_new_item'       => 'Add New Warehouse Lender',
			'edit_item'          => 'Edit Warehouse Lender',
			'new_item'           => 'New Warehouse Lender',
			'view_item'          => 'View Warehouse Lender',
			'search_items'       => 'Search Warehouse Lenders',
			'not_found'          => 'No Warehouse Lenders Found',
			'not_found_in_trash' => 'No Warehouse Lenders Found in Trash'
		),
		'public'       => true,
		'rewrite'      => array( 'slug' => 'residential-financing/warehouse-participation-funding/partnering-with-us', 'with_front' => false ),
		'supports'     => array( 'title', 'thumbnail' ),
		'menu_icon'    => 'dashicons-groups'
	) );

}
add_action( 'init', 'ameris_custom_post_types' );