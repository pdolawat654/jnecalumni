<?php	
			$conn=mysqli_connect("localhost","root","","test");
    		session_start();
    		$username=$_SESSION['email'];
			
    		$check = getimagesize($_FILES["image"]["tmp_name"]);
    		if($check !== false){
      	 	 $image = $_FILES['image']['tmp_name'];
       		 $imgContent = addslashes(file_get_contents($image));
			$blog=$_POST['blog'];
			$title=$_POST['title'];
			$q="select name from ainfo where email='$username'";
			$rest=mysqli_query($conn,$q);
			if(mysqli_num_rows($rest)>0){
  
     		 while($ro=mysqli_fetch_assoc($rest))
     		{
       		 $n=$ro["name"];
       		}
       		}
		

			$sql = "INSERT INTO blogs(`name`,`email`, `blog`, `flag`, `title`, `image`) VALUES ('$n','$username','$blog',1,'$title','$imgContent')";
			if(mysqli_query($conn,$sql))
			{
			header('location:Home.php');
			}

		}
		
?>