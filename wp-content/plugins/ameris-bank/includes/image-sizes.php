<?php

/**
 * Custom image sizes to be generated whenever a new image is added
 * (or whenever Regenerate Thumbnails runs).
 */
function ameris_image_sizes() {
	
	add_image_size( 'news-home',        288, 169, true );
	add_image_size( 'circle-icon',      119, 119, true );
	add_image_size( 'leader',           332, 285, true );
	add_image_size( 'landing-solution', 327, 197, true );
	
}
add_action( 'after_setup_theme', 'ameris_image_sizes' );