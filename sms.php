<?php
	// Authorisation details.
session_start();
$phone=$_SESSION['phone'];
$otp=$_SESSION['otp'];

try{
	
	// Authorisation details.
	$username = "pdolawat654@gmail.com";
	$hash = "d8b8148050bbb5dedf0067b9f21f19c11a30007a2a75b45ae1ebe9eead1edfe4";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $phone; // A single number or a comma-seperated list of numbers
	$message = "OTP is '$otp'";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

}
finally{
	header('location:Login.php');
}
?>