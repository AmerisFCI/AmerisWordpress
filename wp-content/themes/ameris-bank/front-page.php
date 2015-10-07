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
							<h2 class="slide-title"><?php the_title(); ?></h2>
							<h3 class="slide-blurb"><?php the_field( 'blurb' ); ?></h2>
							<a class="button" href="<?php the_field( 'link' ); ?>"><?php the_field( 'link_text' ); ?></a>
						</div>

					<?php }
				} ?>
			</div><!-- .slides -->

			<?php get_template_part( 'template-parts/account-access' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="home-link-panels">
					<?php for ( $i = 1; $i <= 4; $i++ ) { ?>
						<div class="panel">
							<?php echo wp_get_attachment_image( get_field( 'icon_' . $i ), 'circle-icon' ); ?>
							<h4><?php the_field( 'heading_' . $i ); ?></h4>
							<p><?php the_field( 'blurb_' . $i ); ?></p>
							<a class="button" href="<?php echo get_permalink( get_field( 'button_link_' . $i ) ); ?>">
								<?php the_field( 'button_text_' . $i ); ?>
							</a>
						</div>
					<?php } ?>
				</div>

			<?php endwhile; // End of the loop. ?>

			<div class="latest-news">
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
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'news-home' ); ?>
								<h2 class="news-title"><?php the_title(); ?></h2>
							</a>
							<div class="news-meta">
								<span class="news-date"><?php the_time( 'm.d.Y' ); ?></span>
								<span class="news-topic"><?php the_category( ', ' ); ?></span>
							</div>
							<div class="news-excerpt"><?php the_excerpt(); ?></div>
							
						</div>

					<?php }
				} ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>