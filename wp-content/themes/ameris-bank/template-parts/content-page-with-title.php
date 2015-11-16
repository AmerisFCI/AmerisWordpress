<?php
/**
 * The template used for displaying page content whenever you need the title to be included.
 *
 * @package ameris-bank
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="page-title"><?php 
			if ( get_field( 'descriptive_title' ) )
				the_field( 'descriptive_title' );
			else
				the_title();
		?></h1>
	</header>
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

