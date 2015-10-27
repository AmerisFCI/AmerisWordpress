<?php
/**
 * Template Name: Landing Page
 * 
 * The template for displaying landing pages.
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
					
				<h3 class="heading"><?php the_field( 'heading' ); ?></h3>

				<div class="select-container">
					<?php wp_dropdown_pages( array(
						'child_of'         => get_the_ID(),
						'name'             => 'select_subpage',
						'show_option_none' => 'Looking for something else?'
					) ); ?>
					<!-- </select> -->
				</div>

				<?php if ( get_field( 'featured_solutions' ) ) { ?>
					<div class="featured-solutions">
						<?php foreach( get_field( 'featured_solutions' ) as $post ) {
							setup_postdata( $post ); ?>
							<?php the_post_thumbnail( 'landing-solution' ); ?>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p>
								<?php the_field( 'short_description' ); ?>
								<a href="<?php the_permalink(); ?>">Learn More</a>
							</p>
						<?php }
						wp_reset_postdata(); ?>
					</div>
				<?php } ?>

				<?php get_template_part( 'template-parts/resources-guides' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>
