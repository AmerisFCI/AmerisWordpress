<?php
/**
 * Template part for displaying posts within the blog listing page (newsroom).
 *
 * @package ameris-bank
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-item news-item--newsroom' ); ?>>
	
	<header class="entry-header">
		<a class="news-item__link" href="<?php the_permalink(); ?>" rel="bookmark">
			<h2 class="entry-title news-item__title"><?php the_title(); ?></h2>
		</a>
	</header><!-- .entry-header -->

	<div class="news-item__thumbnail">
		<?php the_post_thumbnail( 'newsroom-thumb' ); ?>
	</div>

	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta news-meta news-item__meta">
			<?php courage_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content news-item__excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## .news-item -->
