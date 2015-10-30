<?php

/**
 * Custom image sizes to be generated whenever a new image is added
 * (or whenever Regenerate Thumbnails runs).
 */
function ameris_image_sizes() {
	
	add_image_size( 'news-home',        288,  169,  true );
	add_image_size( 'circle-icon',      119,  119,  true );
	add_image_size( 'leader',           332,  285,  true );
	add_image_size( 'landing-solution', 327,  197,  true );
	add_image_size( 'callout-box',      302,  430,  true );
	add_image_size( 'home-callout',     531,  313,  true );
	add_image_size( 'slide',            3300, 1700, true );
	add_image_size( 'landing-banner',   2400, 1300, true );
	
}
add_action( 'after_setup_theme', 'ameris_image_sizes' );

/**
 * Prevent users from selecting a featured image that's too small.
 *
 * Applicable to pages, posts, and slides.
 */
function ameris_prevent_puny_images( $meta_id, $object_id, $meta_key, $meta_value ) {

}
// add_action( 'update_postmeta', 'ameris_prevent_puny_images', 10, 4 );