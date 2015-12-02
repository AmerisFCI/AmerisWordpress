<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package ameris-bank
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function courage_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// get top-level ancestor of current page
	if ( is_page() ) {
		global $post;
		$ancestors = get_post_ancestors( $post );
		$highest = $ancestors ? array_pop( $ancestors ) : $post->ID;
		$classes[] = 'ancestor-pageid-' . $highest;
	}

	return $classes;
}
add_filter( 'body_class', 'courage_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function courage_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'ameris-bank' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'courage_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function courage_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'courage_render_title' );
endif;

/**
 * Modify post excerpt behavior.
 */
function ameris_homepage_news_excerpts( $excerpt ) {
	
	// force homepage posts with excerpts to do the same trimming that automated excerpts do
	if ( has_excerpt() && is_front_page() ) {
		$text = strip_shortcodes( $excerpt );
		$text = apply_filters( 'the_content', $excerpt );
		$text = str_replace(']]>', ']]&gt;', $excerpt);
		
		$length = apply_filters( 'excerpt_length', 20 );
		$more = apply_filters( 'excerpt_more', '&hellip;' );
		
		$excerpt = wp_trim_words( $text, $length, $more );
	}

	// newsroom page
	if ( is_home() ) {
		$excerpt .= ' <a class="read-more news-item__more" href="' . get_permalink() . '">Read More</a>';

	} else if ( is_search() ) { 
		$excerpt .= ' <a class="read-more search-item__more" href="' . get_permalink() . '">Read More</a>';

	}

	return $excerpt;

}
add_filter( 'get_the_excerpt', 'ameris_homepage_news_excerpts' );

/**
 * Remove the post excerpt trailing characters.
 */
function ameris_excerpt_trail( $trail ) {
	return '';
}
add_filter( 'excerpt_more', 'ameris_excerpt_trail' );

/**
 * Helper function to limit excerpts by character count.
 */
function ameris_limit_by_char( $text, $count ) {

	$text = strip_tags( $text );

	// if text is short enough, great
	if ( strlen( $text ) <= $count )
		return $text;
		
	// shorten text
	$short_text = substr( $text, 0, $count );

	// then shorten it to the last full word
	$new_text = substr( $short_text, 0, strrpos( $short_text, ' ' ) );

	// remove trailing commas because they look bad
	$new_text = rtrim( $new_text, ',' );

	return $new_text;

}

/**
 * Clean up excerpts.
 */
function ameris_trim_excerpt( $text, $num_words, $more, $original_text ) {
	global $post;
	$old_text = $text;

	if ( is_front_page() )
		$text = ameris_limit_by_char( $text, 140 );

	else
		$text = ameris_limit_by_char( $text, 150 );

	if ( $text !== $old_text )
		$text .= '&hellip;';

	return $text;

}
add_filter( 'wp_trim_words', 'ameris_trim_excerpt', 10, 4 );

/**
 * Don't strip HTML from nav menu descriptions, part 1.
 */
remove_filter( 'nav_menu_description', 'strip_tags' );

/**
 * Don't strip HTML from nav menu descriptions, part 2.
 */
function ameris_wp_setup_nav_menu_item( $menu_item ) {
	if ( $menu_item->description )
		$menu_item->description = apply_filters( 'nav_menu_description', $menu_item->post_content );
	return $menu_item;
}
add_filter( 'wp_setup_nav_menu_item', 'ameris_wp_setup_nav_menu_item' );

/**
 * Extend WordPress nav menus to allow menu item descriptions.
 */
class Ameris_Description_Walker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		parent::start_el( $output, $item, $depth, $args );
		if ( $item->description )
			$output .= sprintf( '<div class="item-description">%s</div>', $item->description );
	}
}

/**
 * Modify the breadcrumb trail output.
 */
function ameris_breadcrumb_trail_mods( $items, $args ) {
	$home = array_shift( $items ); // bump 'home' out
	return $items;
}
add_filter( 'breadcrumb_trail_items', 'ameris_breadcrumb_trail_mods', 10, 2 );

/**
 * Remove Ninja Forms default styling.
 */
remove_action( 'ninja_forms_display_css', 'ninja_forms_display_css');

/**
 * Adjust search result amount.
 */
function ameris_search_result_count( $query ) {
	if ( $query->is_search() )
		$query->set( 'posts_per_page', 10 );
}
add_action( 'pre_get_posts', 'ameris_search_result_count' );

/**
 * Conditional menu item classes.
 */
function ameris_conditional_menu_classes( $classes, $item ) {

	global $post;
	
	if ( is_singular( 'lending_expert' ) && $item->object_id === '29' )
		$classes[] = 'current_page_item';

	if ( is_singular( 'leadership' ) && $item->object_id === '530' )
		$classes[] = 'current_page_item';

	return $classes;

}
add_filter( 'nav_menu_css_class', 'ameris_conditional_menu_classes', 10, 2 );

/**
 * Add a wrapper around videos that have been oembedded.
 */
function ameris_embed_oembed_html( $html, $url, $attr, $post_id ) {
	return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'ameris_embed_oembed_html', 99, 4 );

/**
 * Set the max image width for srcsets to the real width of the image.
 */
function ameris_max_image_width( $width, $size_array ) {
	return $size_array[0];
}
add_filter( 'max_srcset_image_width', 'ameris_max_image_width', 10, 2 );

/**
 * Modify the srcsets used for responsive images.
 */
function ameris_srcsets( $sources, $size_array, $image_src, $image_meta, $attachment_id ) {
	
	// if image is big enough for a landing-banner, add that as a srcset too
	// that means for really big images, smaller screens will grab the 2400px width version
	// instead of the 3300 version
	if ( isset( $image_meta['sizes']['landing-banner']['file'] ) && !isset( $sources[2400] ) ) {
		$sources[2400] = array(
			'url' => dirname( $image_src ) . '/' . $image_meta['sizes']['landing-banner']['file'],
			'descriptor' => 'w',
			'value' => '2400'
		);
	}

	return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'ameris_srcsets', 10, 5 );