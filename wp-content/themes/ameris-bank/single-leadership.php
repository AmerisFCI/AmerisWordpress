<?php
/**
 * The template for displaying a single leader from the leadership post type.
 *
 * @package ameris-bank
 */

get_header();
get_template_part( 'template-parts/page', 'wide-banner' ); ?>

<div class="inner-wrap content-inner-wrap ">

	<div id="primary" class="content-area">

		<div class="sidebar-right">
			<div class="leadership__portrait-bumper"><?php the_post_thumbnail( 'leader' ); ?></div>
		</div>

		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/leadership', 'single' ); ?>
			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar( 'left' ); ?>

</div>


<?php get_footer(); ?>
