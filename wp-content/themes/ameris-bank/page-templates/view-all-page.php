<?php
/**
 * Template Name: View All
 * 
 * The template for displaying View All pages. Similar to landing pages but without the righthand
 * dropdown, and maybe with content above the product grid.
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
					
				<h2 class="landing-heading"><?php the_field( 'heading' ); ?></h2>

				<?php if ( get_field( 'featured_solutions' ) ) { ?>
					<div class="featured-solutions">
						<?php foreach( get_field( 'featured_solutions' ) as $post ) {
							setup_postdata( $post ); ?>
							<div class="solution">
								<?php the_post_thumbnail( 'landing-solution' ); ?>
								<h3 class="solution__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="solution__description">
									<?php
										$desc = get_field( 'short_description' );
										echo wp_trim_words( $desc );
									?>
									<a class="solution__link" href="<?php the_permalink(); ?>">Learn More</a>
								</p>
							</div>
						<?php }
						wp_reset_postdata(); ?>
					</div>
				<?php } ?>

				<?php get_template_part( 'template-parts/resources-guides' ); ?>
				
				<?php get_template_part( 'template-parts/featured-video' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>
