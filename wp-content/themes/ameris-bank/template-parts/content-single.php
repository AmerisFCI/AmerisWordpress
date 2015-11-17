<?php
/**
 * Template part for displaying single posts.
 *
 * @package ameris-bank
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>

	<div class="single-article__meta entry-meta">
		<span class="single-article__date news-date"><?php the_time( 'M j, Y' ); ?></span> | <span class="single-article__category news-topic"><?php the_category( ', ' ); ?></span>
	</div><!-- .entry-meta -->

	<div class="single-article__image image-banner">
		<?php the_post_thumbnail( 'newsroom-single' ); ?>
	</div>
	
	<div class="single-article__content entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ameris-bank' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
