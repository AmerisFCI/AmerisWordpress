<?php
/**
 * Template Name: History Page
 * 
 * The template for displaying the history/timeline page.
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
			<?php if ( get_field( 'timeline_heading' ) ) { ?>
				<h2 class="timeline-heading"><?php the_field( 'timeline_heading' ); ?></h2>
			<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar( 'left-no-widgets' ); ?>

	<div class="content-below">
		<div class="timeline">

			<?php $first = true;
			$previous_dates = array();
			if ( have_rows( 'timeline_items' ) ) : while( have_rows( 'timeline_items' ) ) : the_row();

				$large = get_sub_field( 'large' );
				$image_id = get_sub_field( 'image' );
				if ( $image_id )
					$image_size = $large ? 'timeline-big' : 'timeline-thumb';

				$classes = array( 'timeline-item' );
				$classes[] = 'timeline-item--' . get_sub_field( 'position' );
				$classes[] = 'timeline-item--' . ( $large ? 'large' : 'small' ); 
				if ( $first )
					$classes[] = 'timeline-item--first';
				if ( $image_id )
					$classes[] = 'timeline-item--has-image';
				$classes = implode( ' ', $classes );

				$date = get_sub_field( 'date' );
				if ( in_array( $date, $previous_dates ) )
					$date .= '-2';
				?>

				<div id="date-<?php echo esc_attr( $date ); ?>" class="<?php echo $classes; ?>">
					
					<?php if ( get_sub_field( 'large' ) ) { ?>
					
						<?php if ( $image_id ) { ?>
							<div class="timeline-item__image">
								<?php echo wp_get_attachment_image( $image_id, $image_size ); ?>
							</div>
						<?php } ?>
						<div class="timeline-item__content">
							<div class="timeline-item__date"><?php the_sub_field( 'date' ); ?></div>
							<div class="timeline-item__inner-content">
								<h3 class="timeline-item__title"><?php the_sub_field( 'title' ); ?></h3>
								<div class="timeline-item__description"><?php the_sub_field( 'description' ); ?></div>
							</div>
						</div>
						<div class="timeline-item__dot"></div>
					
					<?php } else { ?>

						<div class="timeline-item__date"><?php the_sub_field( 'date' ); ?></div>
						<div class="timeline-item__dot"></div>
						<div class="timeline-item__content">
							<?php if ( $image_id ) { ?>
								<div class="timeline-item__image">
									<?php echo wp_get_attachment_image( $image_id, $image_size ); ?>
								</div>
							<?php } ?>
							<h3 class="timeline-item__title"><?php the_sub_field( 'title' ); ?></h3>
							<div class="timeline-item__description"><?php the_sub_field( 'description' ); ?></div>
						</div>

					<?php } ?>

				</div>

				<?php
				$previous_dates[] = get_sub_field( 'date' );
				$first = false;

			endwhile; endif;

			if ( get_field( 'last_date' ) ) {
				$date = get_field( 'last_date' );
				if ( in_array( $date, $previous_dates ) )
					$date .= '-2'; ?>
				<div id="date-<?php echo esc_attr( $date ); ?>" class="timeline-item">
					<div class="timeline-item__dot"></div>
				</div>
			<?php } ?>

		</div><!-- .timeline -->

		<?php if ( get_field( 'last_date' ) ) { ?>
			<div class="timeline-item timeline-item--wide timeline-item--last">
				<div class="timeline-item__date"><?php the_field( 'last_date' ); ?></div>
			</div>
		<?php } ?>

	</div><!-- .content-below -->

	<nav class="sidebar-menu mobile-only">
		<?php echo get_ameris_sidebar_menu(); ?>
	</nav>

</div><!-- .inner-wrap .content-winner-wrap -->

<?php get_footer(); ?>