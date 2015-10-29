<?php
/**
 * Template Name: Leadership Page
 * 
 * The template for displaying the main leadership page.
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

				<div class="leadership-grid">
					<h3>Executive Management</h3>
					<?php $management = get_field( 'executive_management' );
					foreach( $management as $post ) {
						setup_postdata( $post );
						get_template_part( 'template-parts/leadership', 'panel' );
					}
					wp_reset_postdata(); ?>

					<h3>Board of Directors</h3>
					<?php $directors = get_field( 'board_of_directors' );
					foreach( $directors as $post ) {
						setup_postdata( $post );
						get_template_part( 'template-parts/leadership', 'panel' );
					}
					wp_reset_postdata(); ?>
				</div>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>