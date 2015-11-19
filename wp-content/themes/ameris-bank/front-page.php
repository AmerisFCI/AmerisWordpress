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
							<?php the_post_thumbnail( 'slide' ); ?>
							<div class="inner-wrap slide__inner-wrap">
								<div class="slide__text-wrap">
									<h2 class="slide__title kicker"><?php the_title(); ?></h2>
									<h3 class="slide__blurb"><?php the_field( 'blurb' ); ?></h3>
									<a class="button slide__cta" href="<?php the_field( 'link' ); ?>"><?php the_field( 'link_text' ); ?></a>
								</div>
							</div>
						</div>

					<?php }
				}
				wp_reset_postdata(); ?>
			</div><!-- .slides -->

			<div class="inner-wrap homepage_inner-wrap">
				<?php get_template_part( 'template-parts/account-access' ); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="home-tools">
						<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
							<div class="tool">
								<?php echo wp_get_attachment_image( get_field( 'icon_' . $i ), 'circle-icon' ); ?>
								<h2 class="tool__title"><?php the_field( 'heading_' . $i ); ?></h2>
								<p class="tool__description"><?php the_field( 'blurb_' . $i ); ?></p>
								<a class="button tool__link" href="<?php echo get_permalink( get_field( 'button_link_' . $i ) ); ?>">
									<?php the_field( 'button_text_' . $i ); ?>
								</a>
							</div>
						<?php } ?>
					</div>

				<?php endwhile; // End of the loop. ?>


				<div class="callout-box callout-box--large home-callout-box">
					<div class="callout-box__header callout-box--large__header home-callout-box__header" style="background-image:url( '<?php $image = wp_get_attachment_image_src( get_field( 'callout_image' ), 'home-callout' ); echo $image[0]; ?>' );">
						<h2 class="kicker callout-box__kicker callout-box--large__kicker home-callout-box__kicker"><?php the_field( 'callout_title' ); ?></h2>
							<h3 class="callout-box__headline callout-box--large__headline home-callout-box__headline"><?php the_field( 'callout_headline' ); ?></h3>
					</div>
					<div class="callout-box__body home-callout-box__body callout-box--large__body">
						<div class="callout-box__description home-callout-box__description callout-box--large__description">
							<?php the_field( 'callout_description' ); ?>
						</div>
						<a class="button callout-box__button home-callout-box__button callout-box--large__button" href="<?php echo get_permalink( get_field( 'callout_link' ) ); ?>">
							<?php the_field( 'callout_button' ); ?>
						</a>
					</div>
				</div>

				<div class="latest-news">

					<div class="latest-news__kicker-wrap">
						<h2 class="kicker latest-news__kicker">Latest News</h2>
					</div>

					<?php $news_query = new WP_Query( array(
						'post_type'              => 'post',
						'posts_per_page'         => 3,
						'no_found_rows'          => true,
						'update_post_meta_cache' => false
					) );
					if ( $news_query->have_posts() ) {
						while( $news_query->have_posts() ) {
							$news_query->the_post(); ?>

							<div class="news-item news-item--home">
								<div class="news-item__header">
									<?php the_post_thumbnail( 'news-home' ); ?>
								</div>
								<div class="news-item__body">
									<a class="news-item__link" href="<?php the_permalink(); ?>">
										<h3 class="news-item__title"><?php the_title(); ?></h3>
									</a>
									<div class="news-meta">
										<span class="news-meta__date"><?php the_time( 'm.d.Y' ); ?></span> | <span class="news-meta__topic"><?php the_category( ', ' ); ?></span>
									</div>
									<div class="news-item__excerpt"><?php the_excerpt(); ?></div>
								</div>

							</div>

						<?php }
					}
					wp_reset_postdata(); // get global post back ?>
				</div>



			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>