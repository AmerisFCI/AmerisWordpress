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
	return $excerpt;

}
add_filter( 'get_the_excerpt', 'ameris_homepage_news_excerpts' );

/**
 * Modify the post excerpt length.
 */
function ameris_excerpt_length( $length ) {

	if ( is_front_page() )
		$length = 20;

	return $length;

}
add_filter( 'excerpt_length', 'ameris_excerpt_length' );

/**
 * Modify the post excerpt trailing characters.
 */
function ameris_excerpt_trail( $trail ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'ameris_excerpt_trail' );

/**
 * Don't strip HTML from nav menu descriptions, part 1.
 */
remove_filter( 'nav_menu_description', 'strip_tags' );

/**
 * Don't strip HTML from nav menu descriptions, part 2.
 */
function ameris_wp_setup_nav_menu_item( $menu_item ) {
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
		$output .= sprintf( '<div class="item-description">%s</div>', $item->description );
	}
}