<?php

/**
 * Register custom taxonomies.
 */
function ameris_custom_taxonomies() {

	// commented out - handling this through ACF fields on the main Leadership page instead

	// Leadership Type - to distinguish Executive Management and Board of Directors
	/* register_taxonomy( 'leadership_type', 'leadership', array(
		'labels' => array(
			'name'                  => 'Types',
			'singular_name'         => 'Type',
			'all_items'             => 'All Types',
			'edit_item'             => 'Edit Type',
			'view_item'             => 'View Type',
			'update_item'           => 'Update Type',
			'add_new_item'          => 'Add New Type',
			'new_item_name'         => 'New Type Name',
			'search_items'          => 'Search Types',
			'parent_item'           => 'Parent Type',
			'parent_item_colon'     => 'Parent Types:',
			'add_or_remove_items'   => 'Add or remove types',
			'choose_from_most_used' => 'Choose from the most used types',
			'not_found'             => 'No types found.'
		),
		'hierarchical'      => true,
		'show_tagcloud'     => false,
		'show_admin_column' => true,
		'public'            => false, // disable archive pages
		'query_var'         => false,
		'rewrite'           => false,
		'show_ui'           => true
	) ); */

}
// add_action( 'init', 'ameris_custom_taxonomies' );