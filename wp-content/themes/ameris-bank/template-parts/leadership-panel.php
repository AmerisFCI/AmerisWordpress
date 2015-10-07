<?php
/**
 * The template used for displaying leaders within the main leadership page.
 *
 * @package ameris-bank
 */
?>

<div id="post-<?php the_ID(); ?>-panel" class="panel" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'leader' ); ?>
		<div>
			<h4><?php the_title(); ?></h4>
			<div class="position"><?php the_field( 'position' ); ?></div>
		</div>
	</a>
</div><!-- #post-## -->

