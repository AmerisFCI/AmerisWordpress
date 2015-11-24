<?php
/**
 * The template for displaying search results pages.
 *
 * @package ameris-bank
 */

get_header(); ?>

<div class="inner-wrap content-inner-wrap">

	<header class="search-results__header entry-header">

		<h1 class="search-results__title entry-title">
			Results <?php if ( get_search_query() ) { ?> for: <span><?php echo get_search_query(); ?></span><?php } ?>
		</h1>

	</header><!-- .entry-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'search' ); ?>
				<?php endwhile; ?>

				<?php the_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>

<?php get_footer(); ?>