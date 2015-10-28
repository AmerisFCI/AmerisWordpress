<?php

/**
 * Register nav menu locations.
 */
function ameris_nav_menus() {

	register_nav_menu( 'header-utility', 'Header - Utility Menu' );
	register_nav_menu( 'header-main',    'Header - Main Menu' );

	register_nav_menu( 'sidebar-11',          'Sidebar - Personal' );
	register_nav_menu( 'sidebar-20',          'Sidebar - Business' );
	register_nav_menu( 'sidebar-business-21', 'Sidebar - Business - Small Business' );
	register_nav_menu( 'sidebar-business-22', 'Sidebar - Business - Corporate & Commercial' );
	register_nav_menu( 'sidebar-business-23', 'Sidebar - Business - Municipal & Public Entities' );
	register_nav_menu( 'sidebar-business-24', 'Sidebar - Business - Associations' );
	register_nav_menu( 'sidebar-business-25', 'Sidebar - Business - Agricultural Businesses' );
	register_nav_menu( 'sidebar-27',          'Sidebar - SBA Financing' );
	register_nav_menu( 'sidebar-33',          'Sidebar - Residential Financing' );
	register_nav_menu( 'sidebar-61',          'Sidebar - About Us' );
	
	register_nav_menu( 'footer-social-links', 'Footer - Social Links' );
	register_nav_menu( 'footer-copyright',    'Footer - Left Menu' );
	register_nav_menu( 'footer-utility',      'Footer - Right Menu' );
	
	register_nav_menu( 'sitemap', 'Sitemap Menu' );

}
add_action( 'after_setup_theme', 'ameris_nav_menus' );