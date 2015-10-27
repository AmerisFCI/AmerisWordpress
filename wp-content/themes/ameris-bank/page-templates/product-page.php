<?php
/**
 * Template Name: Product Page
 * 
 * The template for displaying product pages. Product pages have a right-hand sidebar
 * as weel as related tools & resources below the content.
 *
 * @package ameris-bank
 */

get_header();

get_template_part( 'template-parts/page', 'banner' ); ?>

<div class="inner-wrap">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

			<?php get_template_part( 'template-parts/resources-guides' ); ?>

		</main><!-- #main -->

		<?php get_sidebar( 'right' ); ?>
		
	</div><!-- #primary -->

	<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>