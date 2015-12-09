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
				<?php get_template_part( 'template-parts/content', 'page-with-title' ); ?>
			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar( 'left-no-widgets' ); ?>

	<div class="content-below">
		<div class="leadership-grid">
			<h2 class="leadership-grid__heading">Executive Management</h2>
			<ul class="og-grid leadership-grid__management">
				<?php $management = get_field( 'executive_management' );
				if ( $management ) {
					foreach( $management as $post ) {
						setup_postdata( $post );
						?>
						<li id="post-<?php the_ID(); ?>-panel" <?php post_class( 'leadership-grid__panel panel' ); ?>>
							<a href="<?php the_permalink(); ?>"
								data-largesrc="<?php $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'leader' ); echo esc_attr( $largesrc[0] ); ?>"
								data-title="<?php echo esc_attr( get_the_title() ); ?>"
								data-position="<?php echo esc_attr( get_field( 'position' ) ); ?>"
								data-description="<?php echo esc_attr( get_field( 'bio' ) ); ?>">
								<div class="leadership-grid__panel-container">
									<?php the_post_thumbnail( 'leader' ); ?>
									<div class="leadership-grid__name-group">
										<h3 class="leadership-grid__name"><?php the_title(); ?></h3>
										<div class="leadership-grid__position"><?php the_field( 'position' ); ?></div>
									</div>
								</div>
							</a>
						</li><!-- #post-## -->
						<?php
					}
					wp_reset_postdata();
				} ?>
			</ul>

			<h2 class="leadership-grid__heading">Board of Directors</h2>

			<ul class="og-grid leadership-grid__board">
				<?php $directors = get_field( 'board_of_directors' );
				if ( $directors ) {
					foreach( $directors as $post ) {
						setup_postdata( $post );
						?>
						<li id="post-<?php the_ID(); ?>-panel" <?php post_class( 'leadership-grid__panel panel' ); ?>>
							<a href="<?php the_permalink(); ?>"
								data-largesrc="<?php $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'leader' ); echo esc_attr( $largesrc[0] ); ?>"
								data-title="<?php echo esc_attr( get_the_title() ); ?>"
								data-position="<?php echo esc_attr( get_field( 'position' ) ); ?>"
								data-company="<?php echo esc_attr( get_field( 'company' ) ); ?>"
								data-description="<?php echo esc_attr( get_field( 'bio' ) ); ?>">
								<div class="leadership-grid__panel-container">
									<?php the_post_thumbnail( 'leader' ); ?>
									<div class="leadership-grid__name-group">
										<h3 class="leadership-grid__name"><?php the_title(); ?></h3>
										<div class="leadership-grid__position"><?php the_field( 'position' ); ?></div>
										<div class="leadership-grid__company"><?php the_field( 'company' ); ?></div>
									</div>
								</div>
							</a>
						</li><!-- #post-## -->
						<?php
					}
					wp_reset_postdata();
				} ?>
			</ul>
		</div>
	</div><!-- .content-below -->

	<nav class="sidebar-menu mobile-only">
		<?php echo get_ameris_sidebar_menu(); ?>
	</nav>

</div>

<?php get_footer(); ?>