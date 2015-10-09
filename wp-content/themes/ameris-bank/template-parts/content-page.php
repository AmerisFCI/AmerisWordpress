<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ameris-bank
 */

?>

<div class="image-banner">
	<?php the_post_thumbnail( 'full' ); ?>
	<?php if ( get_field( 'banner_blurb' ) ) { ?>
		<div class="blurb"><?php the_field( 'banner_blurb' ); ?></div>
	<?php } ?>
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

