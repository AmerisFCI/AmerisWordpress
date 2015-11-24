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
	<div class="page-content">
		<p><?php esc_html_e( 'No results found. Please try again.', 'ameris-bank' ); ?></p>
	</div><!-- .page-content -->
</article><!-- .no-results -->
