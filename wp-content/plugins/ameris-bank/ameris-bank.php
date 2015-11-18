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
require_once( $includes . 'widget-callout.php' );
require_once( $includes . 'widget-recent-posts.php' );
require_once( $includes . 'widget-press-feed.php' );