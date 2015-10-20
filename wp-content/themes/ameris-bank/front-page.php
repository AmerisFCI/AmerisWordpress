<?php
/**
 * The template for displaying the front page.
 */

get_header(); ?>

	<div id="primary" class="content-area home-content-area">
		<main id="main" class="site-main" role="main">

			<div class="slides">
				<?php $slide_query = new WP_Query( array(
					'post_type'              => 'slide',
					'orderby'                => 'menu_order',
					'order'                  => 'ASC',
					'posts_per_page'         => 3,
					'no_found_rows'          => true,
					'update_post_term_cache' => false
				) );
				if ( $slide_query->have_posts() ) {
					while( $slide_query->have_posts() ) {
						$slide_query->the_post(); ?>
						
						<div class="slide">
							<?php the_post_thumbnail( 'full' ); ?>
							<div class="inner-wrap slide__inner-wrap">
								<div class="slide__text-wrap">
									<h2 class="slide__title kicker"><?php the_title(); ?></h2>
									<h3 class="slide__blurb"><?php the_field( 'blurb' ); ?></h3>
									<a class="button slide__cta" href="<?php the_field( 'link' ); ?>"><?php the_field( 'link_text' ); ?></a>
								</div>
							</div>
						</div>

					<?php }
				} ?>
			</div><!-- .slides -->

			<div class="inner-wrap homepage_inner-wrap">
				<?php get_template_part( 'template-parts/account-access' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="home-tools">
						<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
							<div class="tool">
								<?php echo wp_get_attachment_image( get_field( 'icon_' . $i ), 'circle-icon' ); ?>
								<h4 class="tool__title"><?php the_field( 'heading_' . $i ); ?></h4>
								<p class="tool__description"><?php the_field( 'blurb_' . $i ); ?></p>
								<a class="button tool__link" href="<?php echo get_permalink( get_field( 'button_link_' . $i ) ); ?>">
									<?php the_field( 'button_text_' . $i ); ?>
								</a>
							</div>
						<?php } ?>
					</div>

				<?php endwhile; // End of the loop. ?>


				<div class="callout-box callout-box--large">
					<div class="callout-box__header" style="background-image:url( '<?php $image = wp_get_attachment_image_src( get_field( 'callout_image' ), 'home-callout' ); echo $image[0]; ?>' );">
						<h2 class="kicker callout-box__kicker"><?php the_field( 'callout_title' ); ?></h2>
							<h3 class="callout-box__headline"><?php the_field( 'callout_headline' ); ?></h3>
					</div>
					<div class="callout-box__body">
						<div class="callout-box__description">
							<?php the_field( 'callout_description' ); ?>
						</div>
						<a class="button callout-box__button" href="<?php echo get_permalink( get_field( 'callout_link' ) ); ?>">
							<?php the_field( 'callout_button' ); ?>
						</a>
					</div>
				</div>

				<div class="latest-news">

					<h2 class="kicker">Latest News</h2>

					<?php $news_query = new WP_Query( array(
						'post_type'              => 'post',
						'posts_per_page'         => 3,
						'no_found_rows'          => true,
						'update_post_meta_cache' => false
					) );
					if ( $news_query->have_posts() ) {
						while( $news_query->have_posts() ) {
							$news_query->the_post(); ?>

							<div class="news-item">
								<a class="news-item__link" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'news-home' ); ?>
									<h3 class="news-item__title"><?php the_title(); ?></h3>
								</a>
								<div class="news-meta">
									<span class="news-meta__date"><?php the_time( 'm.d.Y' ); ?></span> | <span class="news-meta__topic"><?php the_category( ', ' ); ?></span>
								</div>
								<div class="news-item__excerpt"><?php the_excerpt(); ?></div>

							</div>

						<?php }
					}
					wp_reset_postdata(); // get global post back ?>
				</div>



			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>