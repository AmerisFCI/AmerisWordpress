<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ameris-bank
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	if ( function_exists( 'wp_pagenavi' ) )
		wp_pagenavi();
}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'ameris-bank' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'courage_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function courage_posted_on() {
	?>
	<span class="news-date"><?php the_time( 'm.d.Y' ); ?></span>
	<span class="news-topic"><?php the_category( ', ' ); ?></span>
	<?php
}
endif;

if ( ! function_exists( 'courage_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function courage_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'ameris-bank' ) );
		if ( $categories_list && courage_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ameris-bank' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'ameris-bank' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ameris-bank' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'ameris-bank' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'ameris-bank' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'ameris-bank' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'ameris-bank' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'ameris-bank' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'ameris-bank' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'ameris-bank' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'ameris-bank' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'ameris-bank' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'ameris-bank' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'ameris-bank' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'ameris-bank' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'ameris-bank' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'ameris-bank' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;  // WPCS: XSS OK.
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function courage_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'courage_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'courage_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so courage_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so courage_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in courage_categorized_blog.
 */
function courage_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'courage_categories' );
}
add_action( 'edit_category', 'courage_category_transient_flusher' );
add_action( 'save_post',     'courage_category_transient_flusher' );

/**
 * List all pages without the default title included.
 */
function ameris_list_pages() {
	wp_list_pages( array( 'title_li' => false ) );
}

/**
 * Logic for what to display in the left sidebar menus.
 *
 * Usually, it finds the top-level parent of the current page, and displays
 * all of its subpages.
 *
 * For the Business section, it finds the second-to-top level parent instead.
 *
 * Each possible menu can also be overridden with a custom nav menu.
 */
function ameris_sidebar_menu() {

	global $post;

	// get top-level parent
	$ancestors = get_post_ancestors( $post );
	if ( $ancestors ) {
		$top_level = array_pop( $ancestors );
	} else {
		$top_level = $post;
	}

	// grab object if you don't already have it
	$top_level = get_post( $top_level );
	
	// for business pages, get menu based on one level down
	if ( $top_level->post_name === 'business-banking' ) { // fix
		$second_level = array_pop( $ancestors );
		$second_level = get_post( $second_level );

		// display a custom menu for this location, or alternately, display all sub-pages
		wp_nav_menu( array(
			'theme_location'     => 'sidebar-business-' . $second_level->post_name,
			'fallback_cb'        => 'ameris_sidebar_menu_fallback',
			'ameris_menu_parent' => $second_level // gets passed to fallback function
		) );

	// for all other pages, get menu based on top level
	} else {

		wp_nav_menu( array(
			'theme_location'     => 'sidebar-' . $top_level->post_name,
			'fallback_cb'        => 'ameris_sidebar_menu_fallback',
			'ameris_menu_parent' => $top_level // gets passed to fallback function
		) );

	}

}

/**
 * This constructs the nav menu determined in ameris_sidebar_menu (unless you're
 * overriding it with a custom nav menu).
 */
function ameris_sidebar_menu_fallback( $args ) {
	
	$args = wp_parse_args( $args, array(
		'ameris_menu_parent' => ''
	) );
	$parent = $args['ameris_menu_parent'];

	wp_list_pages( array(
		'title_li' => '',
		'child_of' => $parent->ID,
		'depth'    => 2
	) );

}