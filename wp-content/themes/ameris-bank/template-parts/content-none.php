<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ameris-bank
 */

?>

<article id="post-<?php the_ID(); ?>" class="no-results not-found">
	<header class="page-header">
		<h3><?php printf( esc_html__( 'Results for: %s', 'ameris-bank' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
	</header><!-- .page-header -->
	<div class="page-content">
		<?php if ( is_search() ) : ?>

			<p><?php esc_html_e( 'No results found. Please try again.', 'ameris-bank' ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'What you\'re looking for could not be found.', 'ameris-bank' ); ?></p>

		<?php endif; ?>
	</div><!-- .page-content -->
</article><!-- .no-results -->
