<?php
/**
 * The template used for displaying individual leader bio pages.
 *
 * @package ameris-bank
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'lending-expert lending-expert--single' ); ?>>
	<header class="entry-title">
		<h1 class="lending-expert__name"><?php the_title(); ?></h1>
		<?php if ( get_field( 'position' ) ) { ?>
			<div class="lending-expert__position"><?php the_field( 'position' ); ?></div>
		<?php } ?>
		
		<?php if ( get_field( 'phone' ) ) { ?>
			<div class="lending-expert__phone"><?php the_field( 'phone' ); ?></div>
		<?php } ?>

		<?php if ( get_field( 'email' ) ) { ?>
			<div class="lending-expert__email"><?php the_field( 'email' ); ?></div>
		<?php } ?>
	</header>
	<?php if ( get_field( 'bio' ) ) { ?>
		<div class="entry-content">
			<div class="lending-expert__bio"><?php the_field( 'bio' ); ?></div>
		</div><!-- .entry-content -->
	<?php } ?>
</article><!-- #post-## -->

