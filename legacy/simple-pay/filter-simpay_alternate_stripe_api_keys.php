<?php

// Use alternate Stripe accounts (API keys) on specific pages.
// Get this as a single file custom plugin at https://github.com/moonstonemedia/WP-Simple-Pay-Library/blob/master/custom-plugins/wp-simple-pay-alternate-stripe-api-keys.php

function simpay_alt_stripe_api_secret_key( $secret_key, $test_mode ) {

	// In this example, the specified alternate Stripe API keys will be used on the PAGE with the slug "alt-payment-page".
	// Add specific payment success and failure page slugs that will use the alternate Stripe API keys if custom redirect pages are used.
	// Replace with conditional logic you require.
	// Available WP conditional tags: https://codex.wordpress.org/Conditional_Tags
	if ( is_page( 'alt-payment-page' ) ) {
		if ( true == $test_mode ) {
			$secret_key = 'sk_test_XXX';
		} else {
			$secret_key = 'sk_live_XXX';
		}
	}

	// Repeat if using even more Stripe accounts.

	return $secret_key;
}
add_filter( 'simpay_secret_key', 'simpay_alt_stripe_api_secret_key', 10, 2 );

function simpay_alt_stripe_api_publishable_key( $publishable_key, $test_mode ) {

	// Match conditional check from simpay_alt_stripe_api_secret_key().
	if ( is_page( 'alt-payment-page' ) ) {
		if ( true == $test_mode ) {
			$publishable_key = 'pk_test_XXX';
		} else {
			$publishable_key = 'pk_live_XXX';
		}
	}

	// Repeat if using even more Stripe accounts.

	return $publishable_key;
}
add_filter( 'simpay_publishable_key', 'simpay_alt_stripe_api_publishable_key', 10, 2 );
