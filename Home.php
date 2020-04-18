<?php
    $conn=mysqli_connect("localhost","root","","test");
    session_start();
    $username=$_SESSION['email'];

    if(empty($username))
    {
      header('location:Login.php');
    }
    
    $s="select * from inf where email='$username'";
    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      {
        $n=$ro["name"];

      
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style>
		p{
			display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;

		}
		.top{
			color: darkblue;			
			margin: 0px;
			padding: 10px;
		}
		#a1{
			display: inline-block;
		}
		.menu{
			color:white;
			background-color: brown; 
		}
		button{
			background-color: brown;
			color:white;
			border:none;
			height: 60px;
			width: 110px;
			font-size: 19px;
			padding-top: 10px;
			margin-top: 3px;
		}
		button:hover{
			background-color: red;
			cursor: pointer;
		}
    .Profile{
     border: 2px solid black;
      margin-left: 380px;
      margin-right: 380px;
      margin-top: 50px;
    }
    table{
      margin-left: 50px;
    }
    tr{
   
     // height: 40px;

    }
    td{
                

           font-size: 17px;
           font-style: italic;
           font-weight: bold;
    }
		.search-box{
        width: 200px;
        position: relative;
        display: inline-block;
        font-size: 14px;
        margin-left: 70px;
    }
    .search-box input[type="text"]{
        height: 32px;
        width: 200px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
        background-color: white;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        color: black;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
     .result p:hover{
        background: #f2f2f2;
    }
	</style>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>    
		<div class="top">
			<center>
			<img src="logo1.jpg" style="height: 120px; width:160px; float: left;">
			<h1 style="display: inline-block;font-size: 50px;">Jawaharlal Nehru Engineering College</h1>
			<img src="logo2.jpg" style="height: 120px;width:160px;float: right;" id="a1">
			</center>
		</div>
		<div class="menu">
			  <button style="width:250px;"><?php echo $n; ?></button>
      <button onClick="ab()">About Us</button>
      <button onClick="news()">News</button>
      <button onClick="blogs()">Blogs</button>
      <button onClick="contact()">Contact Us</button>
     
			 <div class="search-box">
        <form action="1.php" method="POST">
        <input type="text" autocomplete="off" placeholder="Search your batchmates..." name="name" />
        <div class="result"></div>
    </div>
    <input type='submit'>
    </form>
			<button onClick="log()" style="float: right;">Logout</button>
			<button onClick="pro()" style="float: right;">Profile</button>
		</div>
   
  <div style="float: left;background-color: plum;display: inline-block;width: 300px;margin: 0px;height: 620px;">
    <?php 
        if(empty($ro['image']))
        echo "<h1>No Image Found</h1>";
        else
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $ro['image'] ).'" style="margin:22px;height:250px;width:250px;border-radius:125px;"/>';
        if($ro['not']==1)
        {
          echo "<center><h1>New message :<br><br><a href='inbox.php'><img src='message.jpg' style='height:150px;width:150px;'/></a></h1><center>";
        }
        else
        {
          echo "<center><h1>No new message :<br><br><a href='inbox.php'><img src='message1.jpg' style='height:150px;width:150px;'/></a></h1><center>";
        }

        }
  }
  else{
    echo "0 results";
  }
  ?>
  </div>
    <div style="overflow-y: auto;margin: 0px;height:600px;background-color: lightblue;padding: 10px;">
    <?php
    
    $s="select * from blogs where flag=1";

    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      {
        $t=$ro["title"];
        $c=$ro["blog"];
        $n=$ro["name"];
        $sq="select image from inf where name='$n'";
         $res=mysqli_query($conn,$sq);
         $rot=mysqli_fetch_assoc($res);
         
       

        if(empty($rot['image']))
        echo "";
        else
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $rot['image'] ).'" style="height:50px;margin-left:25px;width:50px;border-radius:25px;margin-top:30px;margin-right:25px;"/>';
        
        ?></td><td><?php echo "<h2 style='display:inline-block;margin-left:25px;margin-right:25px;'>".$n."</h2>"; ?></td></tr>
        <tr><td><?php echo "<h2 style='margin-left:25px;margin-right:25px;'>".$t."</h2>"; ?></td></tr>
        <tr><td><?php if(empty($ro['image']))
        echo "";
        else echo '<img src="data:image/jpeg;base64,'.base64_encode( $ro['image'] ).'" style="height:250px;margin-left:25px;width:250px;margin-right:25px;"/>'; ?></td></tr>
      
        <tr><td><?php echo "<p style='background-color:lightyellow;border:2px solid black;padding:30px;margin-left:25px;margin-right:25px;'>".$c."</p>";  }}?></td></tr>

    

     </div>

  
   
  
	
	<div class="menu" style="margin-top: 0px;">
			<button style="margin-left: 180px;">About Us</button>
			
			<button style="float: right;width: 120px;margin-right: 180px;">Contact Us</button>
		</div>

</body>
</html>
<script>

  function log(){
  location.href="index.php";
}
function pro(){
  location.href="Profile.php";
}
function ab(){
  location.href="about.php";
}
function blogs(){
  location.href="Home.php";
}
function news(){
  location.href="news.php";
}
function contact(){
  location.href="contact.php";
}
</script>
