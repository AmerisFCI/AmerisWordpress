<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ameris-bank
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="footer-top">
			<div class="site-info">
				<img src="<?php echo get_template_directory_uri(); ?>/images/build/fdic.png" alt="Member FDIC" />
				<img src="<?php echo get_template_directory_uri(); ?>/images/build/ehl.png" alt="Equal Housing Lender" />
			</div>
			<form class="email-newsletter">
				<input type="text" name="s" placeholder="Enter your email address&hellip;" value="" />
				<input type="submit" value="Newsletter Signup" />
			</form>
			<div class="social-links">
			</div>
		</div>

		<div class="footer-bottom">
			
			<div class="copyright">&copy; <?php date( 'Y' ); ?> Ameris Bank &mdash; all rights reserved</div>
			
			<?php wp_nav_menu( array(
				'theme_location'  => 'footer-copyright',
				'fallback_cb'     => '',
				'container_class' => 'footer-copyright-links'
			) ); ?>

			<?php wp_nav_menu( array(
				'theme_location'  => 'footer-utility',
				'fallback_cb'     => '',
				'container'       => 'nav',
				'container_class' => 'footer-utility'
			) ); ?>

		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
