<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ameris-bank
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ameris-bank' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<div class="site-branding">
			<div class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/images/build/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
			</div>
		</div><!-- .site-branding -->

		<?php wp_nav_menu( array(
			'theme_location'  => 'header-utility',
			'container'       => 'nav',
			'container_class' => 'utility-navigation',
			'fallback_cb'     => false
		) ); ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ameris-bank' ); ?></button>
			<?php wp_nav_menu( array(
				'theme_location' => 'header-main',
				'menu_id'        => 'primary-menu',
				'fallback_cb'    => false,
				'walker'         => new Ameris_Description_Walker // enable item descriptions
			) ); ?>
		</nav><!-- #site-navigation -->

		<form class="search-form">
			<input type="text" name="s" placeholder="What are you looking for?" value="<?php the_search_query(); ?>" />
			<input type="submit" value="Search" />
		</form>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
