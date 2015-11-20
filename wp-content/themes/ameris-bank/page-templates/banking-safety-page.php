<?php
/**
 * Template Name: Banking Safety Page
 *
 * @package ameris-bank
 */

get_header();

get_template_part( 'template-parts/page', 'banner' ); ?>

<div class="inner-wrap content-inner-wrap ">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="safety-grid">
					<?php if ( have_rows( 'banking_safety_links' ) ) : while( have_rows( 'banking_safety_links' ) ) : the_row(); ?>

						<div class="safety-grid__column safety-item">
							<div class="safety-item__icon">
								<a href="<?php the_sub_field( 'link' ); ?>"><?php echo wp_get_attachment_image( (int) get_sub_field( 'icon' ), 'circle-icon' ); ?></a>
							</div>
							<div class="safety-item__label">
								<a href="<?php the_sub_field( 'link' ); ?>"><?php the_sub_field( 'label' ); ?></a>
							</div>
							<div class="safety-item__blurb"><?php the_sub_field( 'blurb' ); ?></div>
						</div>

					<?php endwhile; endif; ?>
				</div>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar( 'left' ); ?>

</div>

<?php get_footer(); ?>
