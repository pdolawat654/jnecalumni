<?php
	$i = $_REQUEST['id'];
	$conn=mysqli_connect("localhost","root","","test");
	$s="delete from blogs where bid='$i'";
	$r=mysqli_query($conn,$s);
	if($r)
	{
		header('location:admin.php');
	}
?>