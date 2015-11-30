<?php
/**
 * Template Name: About Us
 * 
 * The template for displaying the About Us main page.
 *
 * @package ameris-bank
 */

get_header();
get_template_part( 'template-parts/page', 'wide-banner' ); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="inner-wrap content-inner-wrap">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h1 class="element-invisible"><?php the_title(); ?></h1>
			
			<div class="about-panels">
				<div class="about-panels__column">
					<div class="about-our-story">
						<?php the_content(); ?>
					</div>
					<div class="about-newsroom-wrapper">
						<div class="about-newsroom">
							<?php $news = new WP_Query( array( 'posts_per_page' => 3, 'post_type' => 'post' ) );
							if ( $news->have_posts() ) {
								while( $news->have_posts() ) {
									$news->the_post();
									$background = wp_get_attachment_image_src( get_post_thumbnail_id(), 'about-news' );
									$background_url = $background[0]; ?>

									<div class="about-news-item" style="background-image:url( '<?php echo $background_url; ?>' );">
										<h2 class="kicker about-news-item__kicker">From the Newsroom</h2>
										<div class="about-news-item__content">
											<h3 class="about-news-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
									</div>

								<?php }
							}
							wp_reset_postdata(); ?>
						</div>
						<div class="about-newsroom-arrows"></div>
					</div>
				</div>
				<div class="about-panels__column">
					<?php
						$image = wp_get_attachment_image_src( get_field( 'video_callout_image' ), 'about-video' );
						$image_url = $image[0];
					?>
					<div class="about-video" style="background-image:url( '<?php echo $image_url; ?>' );">
						<a class="about-video__wrap-link" href="<?php the_field( 'video_callout_link' ); ?>">
							<div class="about-video__body">
								<h2 class="about-video__title"><?php the_field( 'video_callout_title' ); ?></h2>
								<p class="about-video__blurb"><?php the_field( 'video_callout_blurb' ); ?></p>
								<a class="about-video__link more-link" href="<?php the_field( 'video_callout_link' ); ?>"><?php the_field( 'video_callout_link_text' ); ?></a>
							</div>
						</a>
					</div>
					<div class="about-small-panels-container">
						<?php
							$image = wp_get_attachment_image_src( get_field( 'history_callout_image' ), 'about-callout' );
							$image_url = $image[0];
						?>
						<div class="about-history about-small-panels__column" style="background-image:url( '<?php echo $image_url; ?>' );">
							<div class="about-history__content">
								<h2 class="about-history__kicker kicker"><?php the_field( 'history_callout_title' ); ?></h2>
								<div class="about-history__lower">
									<h3 class="about-history__headline"><?php the_field( 'history_callout_headline' ); ?></h3>
									<a class="about-history__link more-link" href="<?php the_field( 'history_callout_link' ); ?>"><?php the_field( 'history_callout_link_text' ); ?></a>
								</div>
							</div>
						</div>
						<?php
							$image = wp_get_attachment_image_src( get_field( 'careers_callout_image' ), 'about-callout' );
							$image_url = $image[0];
						?>
						<div class="about-careers about-small-panels__column" style="background-image:url( '<?php echo $image_url; ?>' );">
							<div class="about-careers__content">
								<h2 class="about-careers__kicker kicker"><?php the_field( 'careers_callout_title' ); ?></h2>
								<div class="about-careers__lower">
									<h3 class="about-careers__headline"><?php the_field( 'careers_callout_headline' ); ?></h3>
									<a class="about-careers__link more-link" href="<?php the_field( 'careers_callout_link' ); ?>"><?php the_field( 'careers_callout_link_text' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .about-panels -->

		</main>
	</div><!-- #primary -->
</div><!-- .inner-wrap -->

<div class="latest-updates">
	<h2>Latest Updates</h2>
	<script async src="https://d36hc0p18k1aoc.cloudfront.net/public/js/modules/tintembed.js"></script><div class="tintup" data-id="amerisbanknewsfeed" data-columns="" data-mobilescroll="true"    data-infinitescroll="true" data-personalization-id="697150" style="height:800px;width:100%;"></div>
</div>

<div class="inner-wrap content-inner-wrap">
		<div class="about-panels-lower">
			<?php wp_nav_menu( array( 'theme_location' => 'sidebar-61', 'walker' => new Ameris_Walker_Nav_Menu ) ); ?>


				<?php
					$image = wp_get_attachment_image_src( get_field( 'leadership_callout_image' ), 'about-leaders' );
					$image_url = $image[0];
					?>
			<div class="about-leadership">
				<div class="about-leadership__image" style="background-image:url( '<?php echo $image_url; ?>' );">
					<h2 class="about-leadership__kicker kicker"><?php the_field( 'leadership_callout_title' ); ?></h2>
				</div>

				<div class="about-leadership__body">
					<h3 class="about-leadership__headline"><?php the_field( 'leadership_callout_headline' ); ?></h3>
					<a class="about-leadership__button more-link" href="<?php the_field( 'leadership_callout_link' ); ?>"><?php the_field( 'leadership_callout_link_text' ); ?></a>
				</div>
			</div>

			<div class="about-investor">
				<h2 class="about-investor__kicker kicker"><?php the_field( 'investor_callout_title' ); ?></h2>
				<h3 class="about-investor__headline"><?php the_field( 'investor_callout_headline' ); ?></h3>
				<div class="about-investor__description"><?php the_field( 'investor_callout_description' ); ?></div>
				<a class="about-investor__link more-link" href="<?php the_field( 'investor_callout_link' ); ?>"><?php the_field( 'investor_callout_link_text' ); ?></a>
			</div>

			<!--<div class="about-recent-press widget_ameris_press_feed_widget">
				<h2 class="widget-title">Recent Press</h2>
				<?php get_template_part( 'template-parts/press-feed' ); ?>
			</div>-->
		</div>
</div><!-- .inner-wrap -->

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>