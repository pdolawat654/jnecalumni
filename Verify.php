 <html>
 <head>
 		<title>OTP Verification</title>
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
		<h1>VERIFY OTP</h1><br>
		<form method="POST">
<pre style="font-size: 16px;">

<h1>ENTER OTP :</h1> <input type="text" name="otp"><br><br><br>

</pre>
<input style="height: 40px;display: inline-block;color:white;width: 120px;background-color:green;border-radius: 5px;" type="submit" name="s">

</form>	


		</center>
</div>
</center>

 </body>
 </html>
 <?php
$f=1;
    $conn=mysqli_connect("localhost","root","","test");
    session_start();
    $username=$_SESSION['email'];
    $sql="select * from ainfo where email='$username'";
    	$re=mysqli_query($conn,$sql);
    	while($ro=mysqli_fetch_assoc($re))
    	{
    		$i=$ro['otp'];
    		$v=$ro['v'];
    	}
    	if($v==1)
    	{
    		header('location:Home.php');
    	}
    if(isset($_POST['s']))
    {
    	
    	
    	if($i==(int)$_POST['otp'])
    	{
    		$insert = $conn->query("update ainfo SET v='$f' where email='$username'");
    		
    		if($insert)
    		header('location:Update.php');
    		else
    		echo "NHI HUA BHAI";
    	}
    	else
    	{
    		echo 'Incorrect OTP';
    		echo $ro;
    	}
    }
?>