<?php
/**
 * Template Name: Leadership Page
 * 
 * The template for displaying the main leadership page.
 *
 * @package ameris-bank
 */

get_header();
get_template_part( 'template-parts/page', 'wide-banner' ); ?>

<div class="inner-wrap content-inner-wrap ">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar( 'left-no-widgets' ); ?>

	<div class="content-below">
		<div class="leadership-grid">
			<h3 class="leadership-grid__heading">Executive Management</h3>
			<div class="leadership-grid__management">
				<?php $management = get_field( 'executive_management' );
				if ( $management ) {
					foreach( $management as $post ) {
						setup_postdata( $post );
						?>
						<div id="post-<?php the_ID(); ?>-panel" class="leadership-grid__panel panel" <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'leader' ); ?>
								<div>
									<h4 class="leadership-grid__name"><?php the_title(); ?></h4>
									<div class="leadership-grid__position"><?php the_field( 'position' ); ?></div>
								</div>
							</a>
						</div><!-- #post-## -->
						<?php
					}
					wp_reset_postdata();
				} ?>
			</div>

			<h3 class="leadership-grid__heading">Board of Directors</h3>

			<div class="leadership-grid__board">
				<?php $directors = get_field( 'board_of_directors' );
				if ( $directors ) {
					foreach( $directors as $post ) {
						setup_postdata( $post );
						?>
						<div id="post-<?php the_ID(); ?>-panel" class="leadership-grid__panel panel" <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'leader' ); ?>
								<div>
									<h4 class="leadership-grid__name"><?php the_title(); ?></h4>
									<div class="leadership-grid__position"><?php the_field( 'position' ); ?></div>
									<div class="leadership-grid__company"><?php the_field( 'company' ); ?></div>
								</div>
							</a>
						</div><!-- #post-## -->
						<?php
					}
					wp_reset_postdata();
				} ?>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>