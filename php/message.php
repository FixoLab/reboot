<?php
// Variables
$name = trim(stripslashes($_POST['name']));
$email = trim(stripslashes($_POST['email']));
$subject = trim(stripslashes($_POST['subject']));
$message = trim(stripslashes($_POST['message']));


if( isset($name) && isset($email) ) {

	// Avoid Email Injection and Mail Form Script Hijacking

	    if ( preg_match( "/[\r\n]/", $name ) || preg_match( "/[\r\n]/", $email ) ) {
		exit;
	}

	// Email will be send
	$to = "sakhawathossain7969@gmail.com"; // Change with your email address
	$sub = "$subject"; // You can define email subject
	// HTML Elements for Email Body
	$body = <<<EOD
	<strong>Name:</strong> $name <br>
	<strong>Email:</strong> <a href="mailto:$email?subject=feedback" "email me">$email</a> <br> <br>
	<strong>Message:</strong> $message <br>
EOD;
//Must end on first column
	
	$headers = "From: $name <$email>\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// PHP email sender
	mail($to, $sub, $body, $headers);
}


?>
