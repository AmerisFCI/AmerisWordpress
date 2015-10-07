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

get_sidebar( 'left' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

			<h3>Resources &amp; Guides</h3>
			<?php if ( get_field( 'resources_guides' ) ) { ?>
				<div class="resources-rotator">
					<?php foreach( get_field( 'resources_guides' ) as $post ) {
						setup_postdata( $post ); ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'circle-icon' ); ?>
							<?php the_title(); ?>
						</a>
					<?php }
					wp_reset_postdata(); ?>
				</div>
			<?php } ?>

		</main><!-- #main -->

		<?php get_sidebar( 'right' ); ?>
		
	</div><!-- #primary -->

<?php get_footer(); ?>