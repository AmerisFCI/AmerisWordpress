<?php
/**
 * The template for displaying all single news posts.
 *
 * @package ameris-bank
 */

get_header(); ?>

<div class="inner-wrap content-inner-wrap ">

	<header class="single-article__header entry-header">

		<?php $newsroom_id = get_option( 'page_for_posts' ); ?>
		<a class="back-to-newsroom" href="<?php echo get_permalink( $newsroom_id ); ?>">
			Back to <?php echo get_the_title( $newsroom_id ); ?>
		</a>

		<h1 class="single-article__title entry-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'single' ); ?>
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar( 'right' ); ?>

</div>

<?php get_footer(); ?>