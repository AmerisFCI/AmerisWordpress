<?php

/**
 * Custom image sizes to be generated whenever a new image is added
 * (or whenever Regenerate Thumbnails runs).
 */
function ameris_image_sizes() {
	
	add_image_size( 'news-home',        288,  169,  true );
	add_image_size( 'newsroom-thumb',   250,  171,  true );
	add_image_size( 'circle-icon',      119,  119,  true );
	add_image_size( 'leader',           332,  420,  true );
	add_image_size( 'landing-solution', 327,  197,  true );
	add_image_size( 'callout-box',      302,  430,  true );
	add_image_size( 'home-callout',     531,  313,  true );
	add_image_size( 'slide',            3300, 1700, true );
	add_image_size( 'landing-banner',   2400, 1300, true );
	add_image_size( 'product-banner',   2400, 1100, true );
	add_image_size( 'wide-banner',      1680, 525,  true );
	
}
add_action( 'after_setup_theme', 'ameris_image_sizes' );

/**
 * Add instructions in Featured Image admin box.
 */
function ameris_featured_image_notes( $content ) {
	global $post;
	
	if ( !$post ) {
		$post_id = isset( $_REQUEST['post_id'] ) ? (int) $_REQUEST['post_id'] : '';
		if ( !$post_id )
			return $content;
		$post = get_post( $post_id );
	}

	if ( !in_array( $post->post_type, array( 'post', 'page', 'slide' ) ) )
		return $content;

	switch ( $post->post_type ) {
		case 'page' :
		case 'post' :
			$size = '2400x1300';
			break;
		case 'slide' :
			$size = '3300x1700';
			break;
	}

	ob_start(); ?>
	<p>Featured images for <?php echo $post->post_type; ?>s should not be smaller than <?php echo $size; ?> pixels.</p>
	<?php return $content . ob_get_clean();

}
add_filter( 'admin_post_thumbnail_html', 'ameris_featured_image_notes' );