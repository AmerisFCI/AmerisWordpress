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

				<div class="footer-top__side">

					<?php if ( get_field( 'signup_form_footer', 'option' ) ){ ?>
						<form action="http://cl.exct.net/subscribe.aspx?lid=22305" name="subscribeForm" method="post" class="newsletter-signup">
							<!-- <input type="hidden" name="err" value="YOUR ERROR PAGE HERE" />-->
							<input type="hidden" name="thx" value="http://pages.s7.exacttarget.com/page.aspx?QS=5c591a8916642e733b4b7bc6e8c5f6d029ee596a4317b48768c74d46464fdc54" />
							<input class="element-invisible" type="radio" name="SubAction" value="sub_add_update" checked="checked" />
							<input class="element-invisible" type="radio" name="Email Type" value="HTML" checked="checked" />
							<input type="hidden" name="MID" value="7217005" />
							<label class="element-invisible" id="email">Enter Your Email Address to Sign up for the Newsletter</label>
							<input class="newsletter-signup__email" aria-labelledby="email" type="text" placeholder="Enter your email address&hellip;" value="" name="Email Address"/>
							<label class="element-invisible" id="email-submit">Submit to Sign up for the Newsletter</label>
							<span class="newsletter-signup__submit__icon"><input class="newsletter-signup__submit" type="submit" aria-labelledby="email-submit" value="Newsletter Signup" placeholder="Newsletter Signup" /></span>
						</form>
					<?php } ?>


					<?php wp_nav_menu( array(
						'theme_location'  => 'footer-social-links',
						'fallback_cb'     => '',
						'container_class' => 'social-links'
					) ); ?>

				</div><!-- .footer-top__side -->

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
