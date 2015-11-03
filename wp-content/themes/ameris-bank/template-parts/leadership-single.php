<?php
/**
 * The template used for displaying individual leader bio pages.
 *
 * @package ameris-bank
 */

?>

<div class="image-banner">
	<?php
		// find leadership page
		$leadership = get_post_type_object( 'leadership' );
		$parent = get_page_by_path( $leadership->rewrite['slug'] );

		// use featured image from leadership page
		echo get_the_post_thumbnail( $parent->ID, 'full' );
	?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-title">
		<h1><?php the_title(); ?></h1>
		<div class="position"><?php the_field( 'position' ); ?></div>
		<?php if ( get_field( 'company' ) ) { ?>
			<div class="company"><?php the_field( 'company' ); ?></div>
		<?php } ?>
	</header>
	<div class="entry-content">
		<?php the_field( 'bio' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

