<?php
/**
 * Template Name: Lending Experts Page
 * 
 * The template for displaying the main Lending Experts page in SBA Financing.
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

				<?php if ( get_field( 'lending_experts_heading' ) ) { ?>
					<h2 class="lending-experts-heading"><?php the_field( 'lending_experts_heading' ); ?></h2>
				<?php } ?>

				<div class="leadership-grid leadership-grid--experts">
					<ul class="og-grid leadership-grid__management">
						<?php $experts = get_field( 'lending_experts' );
						if ( $experts ) {
							foreach( $experts as $post ) {
								setup_postdata( $post );
								?>
								<li id="post-<?php the_ID(); ?>-panel" class="leadership-grid__panel panel" <?php post_class(); ?>>
									<a href="<?php the_permalink(); ?>"
										data-largesrc="<?php $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'leader' ); echo esc_attr( $largesrc[0] ); ?>"
										data-title="<?php echo esc_attr( get_the_title() ); ?>"
										data-position="<?php echo esc_attr( get_field( 'position/title' ) ); ?>"
										data-phone="<?php echo esc_attr( get_field( 'phone' ) ); ?>"
										data-email="<?php echo esc_attr( get_field( 'email' ) ); ?>"
										data-description="<?php echo esc_attr( get_field( 'bio' ) ); ?>">
										<?php the_post_thumbnail( 'leader' ); ?>
										<div class="leadership-grid__name-group">
											<h4 class="leadership-grid__name"><?php the_title(); ?></h4>
											<div class="leadership-grid__position"><?php the_field( 'position/title' ); ?></div>
										</div>
									</a>
								</li><!-- #post-## -->
								<?php
							}
							wp_reset_postdata();
						} ?>
					</ul>
				</div>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->

		<?php // display right sidebar if no child pages
		global $post;
		if ( $post->post_name !== 'lending-experts' )
			get_sidebar( 'right' ); ?>

	</div><!-- #primary -->

	<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>