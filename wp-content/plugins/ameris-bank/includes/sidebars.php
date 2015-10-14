<?php

/**
 * Register sidebars (widget areas), and also register this plugin's custom widgets.
 */
function ameris_widgets_init() {

	register_widget( 'ameris_account_widget' );
	register_widget( 'ameris_page_callout_widget' );
	
	register_sidebar( array(
		'name'          => 'Left Sidebar',
		'id'            => 'sidebar-left',
		'description'   => 'Widgets placed here appear under the left-hand title and submenu.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Right Sidebar',
		'id'            => 'sidebar-right',
		'description'   => 'Widgets placed here appear on the right-hand side of product pages.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'ameris_widgets_init' );