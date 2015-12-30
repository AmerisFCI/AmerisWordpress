<?php
/**
 * The template used for displaying individual leader bio pages.
 *
 * @package ameris-bank
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'leadership leadership--single leadership--lending-expert' ); ?>>
	<header class="entry-title">
		<h1 class="leadership__name"><?php
			if ( get_field( 'descriptive_title' ) )
				the_field( 'descriptive_title' );
			else
				the_title();
		?></h1>

		<?php $meta = ( get_field( 'area' ) || get_field( 'position/title' ) || get_field( 'phone' ) || get_field( 'email' ) || get_field( 'address' ) ) ? true : false;
		if ( $meta ) { ?>
			<div class="leadership__meta">
		<?php } ?>

			<?php if ( get_field( 'area' ) ) { ?>
				<div class="leadership__area"><?php the_field( 'area' ); ?></div>
			<?php } ?>
			
			<?php if ( get_field( 'position/title' ) ) { ?>
				<div class="leadership__position"><?php the_field( 'position/title' ); ?></div>
			<?php } ?>
			
			<?php if ( get_field( 'phone' ) ) { ?>
				<div class="leadership__phone"><?php the_field( 'phone' ); ?></div>
			<?php } ?>

			<?php if ( get_field( 'email' ) ) { ?>
				<div class="leadership__email"><a href="mailto:<?php the_field( 'email' ); ?>"><?php the_field( 'email' ); ?></a></div>
			<?php } ?>

			<?php if ( get_field( 'address' ) ) { ?>
				<div class="leadership__address"><?php the_field( 'address' ); ?></div>
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

