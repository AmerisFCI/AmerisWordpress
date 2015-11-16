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
				<h5 class="latest-posts-heading">Latest Posts</h5>

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

	<div class="content-below">
		<div class="latest-updates">
		</div>
	</div>

</div><!-- .inner-wrap .content-inner-wrap -->

<?php get_footer(); ?>