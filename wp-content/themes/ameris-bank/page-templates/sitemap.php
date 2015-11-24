<?php
/**
 * Template Name: Sitemap Page
 * 
 * The template for displaying the sitemap.
 *
 * Below the content, the sitemap menu is displayed. If there's no custom sitemap menu,
 * a list of all pages is displayed.
 *
 * @package ameris-bank
 */


get_header();

get_template_part( 'template-parts/page', 'banner' ); ?>

<div class="inner-wrap content-inner-wrap ">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; ?>

			<?php ob_start();

			wp_nav_menu( array(
				'container'      => false,
				'menu_class'     => 'ameris-page-list',
				'theme_location' => 'sitemap',
				'fallback_cb'    => 'ameris_list_pages'
			) );

			$menu = ob_get_clean();

			echo str_replace( 'sub-menu', '', $menu ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>
