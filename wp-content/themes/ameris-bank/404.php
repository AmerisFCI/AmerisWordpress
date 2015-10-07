<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ameris-bank
 */

get_header();

get_sidebar( 'left' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="page-content">
					<h2>404 Error</h2>
					<p>Nothing was found at this location.</p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
