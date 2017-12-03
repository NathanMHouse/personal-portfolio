<?php
/**
 * Footer Contact Form Handler - mail processing script (server side).
 *
 * @package Portfolio
 */

// Vars
$expected      = array(
	'name',
	'email',
	'message',
	'portfolio_message_wp_nonce',
	'_wp_http_referer',
	'action',
);

$temp           = array();
$errors         = array();
$pattern        = '/Content-type:|Bcc:|Cc:|<script/i';
$myemail        = 'nathanmhouse.webdev@gmail.com';
$name           = ( isset( $_POST['name'], $_POST['portfolio_message_wp_nonce'] ) // Input var okay.
				  && wp_verify_nonce( sanitize_key( $_POST['portfolio_message_wp_nonce'] ), 'portfolio_send_message' ) ) // Input var okay.
				  ? filter_var( wp_unslash( $_POST['name'] ), FILTER_SANITIZE_STRING ) // Input var okay.
				  : '';
$sender_email   = ( isset( $_POST['email'] ) ) // Input var okay.
				  ? filter_var( wp_unslash( $_POST['email'] ), FILTER_SANITIZE_EMAIL ) // Input var okay.
				  : '';
$message        = ( isset( $_POST['message'] ) ) // Input var okay.
				  ? filter_var( html_entity_decode( sanitize_text_field( $_POST['message'] ) ), FILTER_SANITIZE_STRING ) // Input var okay.
				  : '';

//Create/run function to check for suspect patterns/unknown inputs
function portfolio_suspect_check( $value, $pattern, &$errors, $expected ) {

	if ( is_array( $value ) ) :
		foreach ( $value as $item => $item_value ) :
			if ( ! in_array( $item, $expected, true ) ) :
				$errors['suspect'] = true;
			else :
				portfolio_suspect_check( $item_value, $pattern, $errors, $expected );
			endif;
		endforeach;
	else :
		if ( preg_match( $pattern, $value ) ) :
			$errors['suspect'] = true;
		endif;
	endif;
}
portfolio_suspect_check( $_POST, $pattern, $errors, $expected ); // Input var okay.

// If email field empty, create error
if ( empty( $_POST['email'] ) || // Input var okay.
	! filter_var( $sender_email, FILTER_VALIDATE_EMAIL ) ) :
	$errors['email'] = true;
endif;

// If $errors array empty, build email, mail, and create response
if ( ! $errors ) :
	$to             = $myemail;
	$email_subject  = "Contact Form Submission: $name";
	$email_body     = "\n Name: $name";
	$email_body    .= "\n Email Address: $sender_email";
	$email_body    .= "\n Message: $message";
	$headers        = "From: $myemail";
	$headers       .= "\n Reply-To: $sender_email";

	// Send mail
	mail( $to, $email_subject, $email_body, $headers );
endif;

// Build response
$response = $errors;
echo wp_json_encode( $response );
