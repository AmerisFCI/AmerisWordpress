<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ameris-bank
 */

?>

<div class="image-banner">
	<?php the_post_thumbnail( 'full' ); ?>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">Pages:',
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

