<?php
/**
 * Template part for displaying single posts.
 *
 * @package ameris-bank
 */

?>

<div class="image-banner">
	<?php
		// find newsroom page
		$newsroom_id = get_option('page_for_posts', 0 );

		// use featured image from newsroom page
		echo get_the_post_thumbnail( $newsroom_id, 'full' );
	?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php courage_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ameris-bank' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php courage_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
