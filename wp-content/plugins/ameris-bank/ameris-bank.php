<?php
/*
Plugin Name: Ameris Bank Site Plugin
Description: Post types, widget areas, custom widgets, menus, and images sizes for Ameris Bank.
*/

$includes = plugin_dir_path( __FILE__ ) . '/includes/';

require_once( $includes . 'image-sizes.php' );
require_once( $includes . 'nav-menus.php' );
require_once( $includes . 'post-types.php' );
require_once( $includes . 'sidebars.php' );
require_once( $includes . 'taxonomies.php' );
require_once( $includes . 'tinymce.php' );

require_once( $includes . 'widget-account.php' );
require_once( $includes . 'widget-account-wholesale.php' );
require_once( $includes . 'widget-account-open.php' );
require_once( $includes . 'widget-callout.php' );
require_once( $includes . 'widget-callout-video.php' );
require_once( $includes . 'widget-recent-posts.php' );
require_once( $includes . 'widget-press-feed.php' );
require_once( $includes . 'widget-looking.php' );

// remove junk from WP Retina 2x dashboard
if ( !defined( 'WP_HIDE_DONATION_BUTTONS' ) )
	define( 'WP_HIDE_DONATION_BUTTONS', true );

// Override Easy Smooth Scroll Links use of the Cloudflare CDN
function ameris_essl_override() {
	wp_deregister_script( 'jquery-easing' );
	wp_register_script( 'jquery-easing', plugin_dir_url( __FILE__ ) . 'js/jquery.easing.min.js' );
	wp_enqueue_script( 'jquery-easing' );
}
add_action( 'wp_enqueue_scripts', 'ameris_essl_override', 1000 ); // must be over 999