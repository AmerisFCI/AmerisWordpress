<?php get_header();
get_template_part( 'template-parts/page', 'banner' ); ?>

<div class="inner-wrap content-inner-wrap ">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<div class="leadership-grid leadership-grid--experts">
					<div class="og-grid-container">
						<ul class="og-grid leadership-grid__management">
							<?php $experts = get_field( 'related_people' );
							if ( $experts ) {
								foreach( $experts as $post ) {
									setup_postdata( $post );
									?>
									<li id="post-<?php the_ID(); ?>-panel" class="leadership-grid__panel panel" <?php post_class(); ?>>
										<a href="<?php the_permalink(); ?>"
											data-largesrc="<?php $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'leader' ); echo esc_attr( $largesrc[0] ); ?>"
											data-title="<?php echo esc_attr( get_the_title() ); ?>"
											data-area="<?php echo esc_attr( get_field( 'area' ) ); ?>"
											data-position="<?php echo esc_attr( get_field( 'position/title' ) ); ?>"
											data-phone="<?php echo esc_attr( get_field( 'phone' ) ); ?>"
											data-email="<?php echo esc_attr( get_field( 'email' ) ); ?>"
											data-address="<?php echo esc_attr( get_field( 'address' ) ); ?>"
											data-description="<?php echo esc_attr( get_field( 'bio' ) ); ?>">
											<div class="leadership-grid__panel-container">
												<?php the_post_thumbnail( 'leader' ); ?>
												<div class="leadership-grid__name-group">
													<h4 class="leadership-grid__name"><?php the_title(); ?></h4>
													<div class="leadership-grid__position"><?php the_field( 'position/title' ); ?></div>
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
				</div>

				<?php if ( get_field( 'content_bottom' ) ) { ?>
					<div class="content-bottom">
						<?php the_field( 'content_bottom' ); ?>
					</div>
				<?php } ?>

			<?php endwhile; // End of the loop. ?>

			<?php get_template_part( 'template-parts/resources-guides' ); ?>

		</main><!-- #main -->

	</div><!-- #primary -->

	<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>