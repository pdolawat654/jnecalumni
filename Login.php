<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style>
		body{
			//background-color: black; 
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
		<h1>Login</h1><br>
		<form method="POST">
<pre style="font-size: 16px;">

Email-ID : <input type="email" name="email"><br><br><br>

Password : <input type="Password" name="pass"><br><br>

</pre>
<input style="height: 40px;display: inline-block;color:white;width: 120px;background-color:green;border-radius: 5px;" type="submit" name="Login">

</form>	
<br>		<a href="Register.php" style="text-decoration: none;font-size: 20px;">Not registered?Register Now</a>

		</center>
</div>
</center>
</body>
</html>

<?php
if(isset($_POST['Login']))
{
	$conn=mysqli_connect("localhost","root","","test");
	$username=$_POST['email'];
	$password=$_POST['pass'];

			session_start();
			$_SESSION['email']=$username;

	$sql="select * from ainfo where email='$username' and pass='$password'";
	$res=mysqli_query($conn,$sql);
	  if(mysqli_num_rows($res)>0){
  
      while($ro=mysqli_fetch_assoc($res))
      { $i=$ro['v'];
        }
        if($i==1)
        {
	if($username=="admin@gmail.com" && $password=="admin")
	{
		header('location:admin.php');	
	}
	else if(!$res)
	{
		die(mysql_error());
		}
	else
	{
		$count=mysqli_num_rows($res);
		
		if($count==1)
		{
			header('location: Home.php');
			}
			
		else
		{
			echo "Check your details";
			}
		
				
		}
	}
	else
	{
		header('location:Verify.php');
	}
	}

	}
?>