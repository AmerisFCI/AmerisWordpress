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

<script src="https://use.typekit.net/woc7stt.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<script src="//ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
	<script>
		WebFontConfig = {
			custom: {
				families: ['AvenirNextLTPro-Regular', 'AvenirNextLTPro-Bold']
			}


		};
	</script>

	<!--[if lt IE 9]>
	<script src="wp-content/themes/ameris-bank/js/libraries/html5shiv.min.js"></script>
	<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WN3V8Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WN3V8Z');</script>
<!-- End Google Tag Manager -->

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

				<form class="search-form" action="<?php echo site_url(); ?>">
					<label class="element-invisible" id="search-terms">Enter Your Search Terms</label>
					<input type="text" name="s" aria-labelledby="search-terms" placeholder="What are you looking for?" title="Enter Your Search Terms" value="<?php the_search_query(); ?>" />
					<label class="element-invisible" id="search-submit">Submit Your Search</label>
					<input type="submit" aria-labelledby="search-submit" value="Search" />
				</form>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle lines-button" aria-controls="primary-menu" aria-expanded="false"><span class="element-invisible"><?php esc_html_e( 'Menu', 'ameris-bank' ); ?></span><span class="lines"></span></button>
					<?php wp_nav_menu( array(
						'theme_location' => 'header-main',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu primary-menu',
						'fallback_cb'    => false,
						'walker'         => new Ameris_Description_Walker // enable item descriptions
					) ); ?>
				</nav><!-- #site-navigation -->



			</div>

		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
