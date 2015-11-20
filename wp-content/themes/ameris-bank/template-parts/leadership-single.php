<?php
/**
 * The template used for displaying individual leader bio pages.
 *
 * @package ameris-bank
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'leadership leadership--single' ); ?>>
	<header class="entry-header">
		<h1 class="page-title leadership__name"><?php 
			if ( get_field( 'descriptive_title' ) )
				the_field( 'descriptive_title' );
			else
				the_title();
		?></h1>

		<?php $meta = ( get_field( 'position' ) || get_field( 'company' ) ) ? true : false;
		if ( $meta ) { ?>
			<div class="leadership__meta">
		<?php } ?>

			<?php if ( get_field( 'company' ) ) { ?>
				<div class="leadership__company"><?php the_field( 'company' ); ?></div>
			<?php } ?>
			<?php if ( get_field( 'position' ) ) { ?>
				<div class="leadership__position"><?php the_field( 'position' ); ?></div>
			<?php } ?>

		<?php if ( $meta ) { ?>
			</div><!-- .leadership__meta -->
		<?php } ?>

	</header>
	<?php if ( get_field( 'bio' ) ) { ?>
		<div class="entry-content">
			<div class="leadership__bio"><?php the_field( 'bio' ); ?></div>
		</div><!-- .entry-content -->
	<?php } ?>
</article><!-- #post-## -->