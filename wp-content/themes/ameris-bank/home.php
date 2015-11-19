<?php
/**
 * The main blog listing page (newsroom).
 *
 * @package ameris-bank
 */

get_header();
get_template_part( 'template-parts/page', 'wide-banner' );

// needed to grab Newsroom fields
$blog_home_id = get_option( 'page_for_posts' ); ?>

<div class="inner-wrap content-inner-wrap ">

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main" role="main">
			
			<div class="blog-intro">
				<h1 class="page-title"><?php
					if ( get_field( 'descriptive_title', $blog_home_id ) )
						echo the_field( 'descriptive_title', $blog_home_id );
					else
						echo get_the_title( $blog_home_id );
				?></h1>
				<?php the_field( 'introduction', $blog_home_id ); ?>
			</div>

			<div class="blog-wrap">
				<h2 class="latest-posts-heading">Latest Posts</h2>

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content' ); ?>
					<?php endwhile; ?>
					<?php the_posts_pagination(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>

			<div class="after-blog">
				<?php the_field( 'below_articles', $blog_home_id ); ?>
			</div>

		</main><!-- #main -->
	
		<?php get_sidebar( 'right' ); ?>
	
	</div><!-- #primary -->

	<?php get_sidebar( 'left-no-widgets' ); ?>



</div><!-- .inner-wrap .content-inner-wrap -->

	<div class="newsroom-content-below">
		<div class="latest-updates">
		<h2>Latest Updates</h2>
			<script async src="https://d36hc0p18k1aoc.cloudfront.net/public/js/modules/tintembed.js"></script><div class="tintup" data-id="amerisbanknewsfeed" data-columns="" data-mobilescroll="true"    data-infinitescroll="true" data-personalization-id="697150" style="height:800px;width:100%;"></div>
</div>
		</div>
	</div>

<?php get_footer(); ?>