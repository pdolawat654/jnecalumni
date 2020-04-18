<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style>
		body{
		//	background-color: black; 
		}
		.Register{
			margin-top: 120px;
			border: 2px solid black;
			width: 300px;
			font-size: 16px;	
			font-style: italic;	
			border-radius: 5px;	
			background-color:white;
			padding-bottom: 20px;
			 
		}
		input{
			border: 2px solid black;
			border-radius: 5px; 
		}

	</style>
</head>
<body>
<center>
<div class="Register">
		<center>
		<h1>Register</h1><br>
		<form method="POST">
<pre style="font-size: 16px;">
Name 	 : <input type="text" name="name"><br><br><br>
Phone 	 : <input type="text" name="phone"><br><br><br>
Email-ID : <input type="email" name="email"><br><br><br>
Password : <input type="Password" name="pass"><br><br>

</pre>
<input style="height: 40px;display: inline-block;color:white;width: 120px;background-color:green;border-radius: 5px;" type="submit" name="Register">

</form>	
<br>		<a href="Login.php" style="text-decoration: none;font-size: 20px;">Already registered?Login</a>

		</center>
</div>
</center>
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['Register']))
{

$email=$_POST['email'];
$pass=$_POST['pass'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$otp=rand(1000,9999);
$conn=mysqli_connect("localhost","root","","test");

$sql2 = "select * from inf where email='$email'";
$re=mysqli_query($conn,$sql2);
if($ro=mysqli_num_rows($re)==0)
{
$sql = "INSERT INTO ainfo(`name`,`email`, `pass`, `otp`) VALUES ('$name','$email','$pass','$otp')";
$sql1 = "INSERT INTO inf(`name`,`email`,`phone`) VALUES ('$name','$email','$phone')";

require 'C:/Users/Prashant/vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'alumnijnec@gmail.com';                     // SMTP username
    $mail->Password   = 'jnec1234!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no-reply_jnecalumni@gmail.org', 'JNEC Alumni Cell');
    $mail->addAddress($email);     // Add a recipient
   
  
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'REGISTRATION SUCESSFUL';
    $mail->Body    = "<b>Thank you for registering at JNEC ALUMNI PORTAL!!!!</b><br><b>Your OTP is '$otp'</b>";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
} catch (Exception $e) {
	 header('location:Register.php');
}
if (mysqli_query($conn,$sql) && mysqli_query($conn,$sql1))
 { 
 		session_start();
			$_SESSION['phone']=$phone;   
			$_SESSION['otp']=$otp;   
    header('location:sms.php');
  }

else 
   {
        echo '<script>alert("Email-ID already exists")</script>';

    }
}
else
echo '<script>alert("Email-ID already exists")</script>';
mysqli_close($conn);
}
?>