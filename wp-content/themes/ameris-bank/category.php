<?php
/**
 * The category archive view for the main blog listing page (newsroom).
 *
 * @package ameris-bank
 */

get_header();
get_template_part( 'template-parts/page', 'wide-banner' ); ?>

<div class="inner-wrap content-inner-wrap ">

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main" role="main">
			
			<div class="blog-intro">
				<h1 class="page-title"><?php the_archive_title(); ?></h1>
			</div>

			<div class="blog-wrap">
				<h2 class="latest-posts-heading">Latest Posts<?php
					if ( is_paged() ) {
						global $wp_query;
						echo ' - Page ' . $wp_query->query_vars['paged'];
					}
				?></h2>

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content' ); ?>
					<?php endwhile; ?>
					<?php the_posts_pagination(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>

		</main><!-- #main -->
	
		<?php get_sidebar( 'right' ); ?>
	
	</div><!-- #primary -->

	<?php get_sidebar( 'left-no-widgets' ); ?>



</div><!-- .inner-wrap .content-inner-wrap -->

	<div class="newsroom-content-below">
		<div class="latest-updates">
		<h2>Latest Updates</h2>
			<script async src="https://d36hc0p18k1aoc.cloudfront.net/public/js/modules/tintembed.js"></script><div class="tintup" data-id="amerisbanknewsfeed" data-columns="" data-mobilescroll="true"    data-clickformore="true" data-personalization-id="697150" style="height:640px;width:100%;"></div>
</div>
		</div>
	</div>

<?php get_footer(); ?>