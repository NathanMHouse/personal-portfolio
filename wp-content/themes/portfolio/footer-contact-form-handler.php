<?php
/**
 * Footer Contact Form Handler - mail processing script (server side).
 *
 * @package Portfolio
 */

// Vars

$expected		= array(
	'name',
	'email',
	'message',
);

$temp 			= array();
$errors 		= array();
$pattern		= '/Content-type:|Bcc:|Cc:|<script/i';
$myemail 		= 'nathanmhouse.webdev@gmail.com';
$name 			= filter_var( $_POST['name'], FILTER_SANITIZE_STRING );
$sender_email 	= filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL );
$message 		= filter_var( html_entity_decode( $_POST['message'] ), FILTER_SANITIZE_STRING );

//Create/run function to check for suspect patterns/unknown inputs
function isSuspect( $value, $pattern ) {
	global $expected;
	global $errors;
	if ( is_array( $value ) ) :
		foreach ( $value as $item => $item_value ):
			if ( !in_array( $item, $expected ) ):
				$errors['suspect'] = true;
			else: 
			isSuspect( $item_value, $pattern );
			endif;
		endforeach;
	else:
		if ( preg_match( $pattern, $value ) ):
			$errors['suspect'] = true;
		endif;
	endif;
}
isSuspect( $_POST, $pattern );

// If email field empty, create error
if ( empty( $_POST['email'] ) || 
	!filter_var( $sender_email, FILTER_VALIDATE_EMAIL ) ):
	$errors['email'] = true;
endif;

// If $errors array empty, build email, mail, and create response
if ( !$errors ):
	$to 				= $myemail;
	$email_subject 	 	= "Contact Form Submission: $name";
	$email_body		 	= "\n Name: $name";
	$email_body		   .= "\n Email Address: $sender_email";
	$email_body		   .= "\n Message: $message";
	$headers		    = "From: $myemail";
	$headers		   .= "\n Reply-To: $sender_email";

	// Send mail
	mail( $to, $email_subject, $email_body, $headers );	
endif;

// Build response
$response		= $errors;
echo json_encode( $response );