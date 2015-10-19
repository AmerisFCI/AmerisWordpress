<?php

/**
 * Register nav menu locations.
 */
function ameris_nav_menus() {

	register_nav_menu( 'header-utility', 'Header - Utility Menu' );
	register_nav_menu( 'header-main',    'Header - Main Menu' );

	register_nav_menu( 'sidebar-personal',              'Sidebar - Personal' );
	register_nav_menu( 'sidebar-business-small',        'Sidebar - Business - Small Business' );
	register_nav_menu( 'sidebar-business-corporate',    'Sidebar - Business - Corporate & Commercial' );
	register_nav_menu( 'sidebar-business-municipal',    'Sidebar - Business - Municipal & Public Entities' );
	register_nav_menu( 'sidebar-business-associations', 'Sidebar - Business - Associations' );
	register_nav_menu( 'sidebar-business-agricultural', 'Sidebar - Business - Agricultural Businesses' );
	register_nav_menu( 'sidebar-sba',                   'Sidebar - SBA Financing' );
	register_nav_menu( 'sidebar-residential',           'Sidebar - Residential Financing' );
	register_nav_menu( 'sidebar-about',                 'Sidebar - About Us' );
	
	register_nav_menu( 'footer-social-links', 'Footer - Social Links' );
	register_nav_menu( 'footer-copyright',    'Footer - Left Menu' );
	register_nav_menu( 'footer-utility',      'Footer - Right Menu' );
	
	register_nav_menu( 'sitemap', 'Sitemap Menu' );

}
add_action( 'after_setup_theme', 'ameris_nav_menus' );