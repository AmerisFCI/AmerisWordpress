<?php
/**
 * Template Name: Wide Page
 * 
 * The template for displaying generic About Us section pages.
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

</div><!-- .inner-wrap .content-winner-wrap -->

<?php get_footer(); ?>