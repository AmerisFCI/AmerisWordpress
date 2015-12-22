<?php
/**
 * Template part for displaying the Account Access form.
 *
 * @package ameris-bank
 */

// grab vars from widget or postmeta
global $account_access_args;
$wholesale = false;
if ( !empty( $account_access_args ) ) {
	$title = $account_access_args['title'];
	$text_below = stripslashes( $account_access_args['text_below'] );
	if ( isset( $account_access_args['wholesale'] ) )
		$wholesale = $account_access_args['wholesale'];
} else {
	global $post;
	$title = get_field( 'account_access_title' );
	$text_below = get_field( 'account_access_text_below' );
} ?>

<div class="account-access">
	<h2><?php echo $title; ?></h2>
	<form class="account-access__form" method="post" name="lgnform" id="lgnform" action="https://cibng.ibanking-services.com/EamWeb/Remote/RemoteLoginAPI.aspx?FIORG=466&amp;orgId=466_061201754&amp;FIFID=061201754&amp;brand=466_061201754&amp;appId=ceb">
		<label for="switch-login" class="element-invisible">Choose account type</label>
		<select id="switch-login" name="switch_login_type">
			<?php if ( !$wholesale ) { ?>
			<option value="Personal Online Banking">Personal Online Banking</option>
			<option value="Business Online Banking">Business Online Banking</option>
			<option value="Ameris Bank Credit Card Access">Ameris Bank Credit Card</option>
			<option value="Merchant Service Access">Merchant Service Access</option>
			<option value="Investor Access">Investor Access</option>
			<?php } ?>
			<option value="Columbia Partner">Correspondent/Wholesale (Columbia Team Partner)</option>
			<option value="Georgia Partner">Correspondent/Wholesale (Georgia Team Partner)</option>
		</select>

		<label for="_textBoxUserId" class="element-invisible removable">User ID</label>
		<input id="_textBoxUserId" type="text" value="" name="_textBoxUserId" placeholder="User ID">
		<input id="_textBoxCompanyId" type="hidden" value="466_061201754" name="_textBoxCompanyId">

		<span class="account-access__submit-wrapper">
			<input class="account-access__submit" type="submit" value="Sign In" />
		</span>

	</form>


	<p><?php echo $text_below; ?></p>
</div>