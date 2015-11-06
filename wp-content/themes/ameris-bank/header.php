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

<script src="https://use.typekit.net/bjg1fuq.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<script src="//ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script>
		WebFontConfig = {
			custom: {
				families: ['AvenirNextLTPro-Regular', 'AvenirNextLTPro-Bold']
			}


		};
	</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ameris-bank' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<div class="site-header__inner-wrap inner-wrap">

			<div class="site-branding">
				<div class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
						<img src="/wp-content/themes/ameris-bank/images/build/ameris-logo.svg" alt="AmerisBank Logo"/>
						<span class="element-invisible">
							<?php if ( is_front_page()) : ?><h1><?php endif; ?>
								AmerisBank
							<?php if ( is_front_page()) : ?></h1><?php endif; ?>
						</span>
					</a>
				</div>
			</div><!-- .site-branding -->

			<div class="nav-wrapper">

				<?php wp_nav_menu( array(
					'theme_location'  => 'header-utility',
					'container'       => 'nav',
					'container_class' => 'utility-navigation',
					'fallback_cb'     => false
				) ); ?>

				<form class="search-form">
					<input type="text" name="s" placeholder="What are you looking for?" value="<?php the_search_query(); ?>" />
					<input type="submit" value="Search" />
				</form>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle lines-button" aria-controls="primary-menu" aria-expanded="false"><span class="element-invisible"><?php esc_html_e( 'Menu', 'ameris-bank' ); ?></span><span class="lines"></span></button>
					<?php wp_nav_menu( array(
						'theme_location' => 'header-main',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => false,
						'walker'         => new Ameris_Description_Walker // enable item descriptions
					) ); ?>
				</nav><!-- #site-navigation -->



			</div>

		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
