<?php
/**
 * The template used for displaying individual leader bio pages.
 *
 * @package ameris-bank
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'leadership leadership--single' ); ?>>
	<header class="entry-title">
		<h1 class="leadership__name"><?php the_title(); ?></h1>
		<?php if ( get_field( 'position' ) ) { ?>
			<div class="leadership__position"><?php the_field( 'position' ); ?></div>
		<?php } ?>
		<?php if ( get_field( 'company' ) ) { ?>
			<div class="leadership__company"><?php the_field( 'company' ); ?></div>
		<?php } ?>
	</header>
	<?php if ( get_field( 'bio' ) ) { ?>
		<div class="entry-content">
			<div class="leadership__bio"><?php the_field( 'bio' ); ?></div>
		</div><!-- .entry-content -->
	<?php } ?>
</article><!-- #post-## -->

