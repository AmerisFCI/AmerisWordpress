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
		
		<div class="inner-wrap footer_inner-wrap">
			<div class="footer-top">
				<div class="site-info">
					<span id="Member_FDIC" class="footer__logo"><span class="element-invisible">Member FDIC</span></span>
					<span id="Equal_Housing_Lender" class="footer__logo"><span class="element-invisible">Equal Housing Lender</span></span>
				</div>

				<?php wp_nav_menu( array(
					'theme_location'  => 'footer-social-links',
					'fallback_cb'     => '',
					'container_class' => 'social-links'
				) ); ?>

				<form class="newsletter-signup">
					<label class="element-invisible" id="email">Enter Your Email Address to Sign up for the Newsletter</label>
					<input class="newsletter-signup__email" aria-labelledby="email" type="text" name="s" placeholder="Enter your email address&hellip;" value="" />
					<label class="element-invisible" id="email-submit">Enter Your Email Address to Sign up for the Newsletter</label>
					<span class="newsletter-signup__submit__icon"><input class="newsletter-signup__submit" type="submit" aria-labelledby="email-submit" value="Newsletter Signup" /></span>
				</form>

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
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
