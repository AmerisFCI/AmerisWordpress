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
			<h3 class="entry-title news-item__title"><?php the_title(); ?></h3>
		</a>
	</header><!-- .entry-header -->

	<div class="news-item__thumbnail">
		<?php the_post_thumbnail( 'newsroom-thumb' ); ?>
	</div>

	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="news-meta">
			<span class="news-meta__date"><?php the_time( 'm.d.Y' ); ?></span> | <span class="news-meta__topic"><?php the_category( ', ' ); ?></span>
		</div>
	<?php endif; ?>

	<div class="entry-content news-item__excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## .news-item -->
