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
      margin-top: 100px;
    }
    th{
      
     		 //height: 40px;
			font-size: 17px;
           font-style: italic;
           border: 2px solid black; 
           font-weight: bold;
    }
    td{
     		padding: 10px;
          
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
      <?php
    $conn=mysqli_connect("localhost","root","","test");
    session_start();
    $username=$_SESSION['email'];
    if(empty($username))
    {
      header('location:Login.php');
    }
   $s="select * from inf where email='$username'";
    $s1="update inf set `not`=0 where email='$username'";   
    $rm=mysqli_query($conn,$s1); 
    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      { $n1=$ro['name'];
		$id1=$ro['aid'];

		}}

        $i1="select image from inf where aid='$id1'";
         $res1=mysqli_query($conn,$i1);
         $rot1=mysqli_fetch_assoc($res1);
?>
<div class="top">
			<center>
<img src="logo1.jpg" style="height: 120px; width:160px; float: left;">
      <h1 style="display: inline-block;font-size: 50px;">Jawaharlal Nehru Engineering College</h1>
      <img src="logo2.jpg" style="height: 120px;width:160px;float: right;" id="a1">
			</center>
		</div>
		<div class="menu">
			<button style="width:250px;"><?php echo $n1; ?></button>
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
     <div style="float: left;display: inline-block;height:550px;background-color: plum;width: 300px;margin: 0px;">
    <?php 

     $s="select * from inf where email='$username'";
    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      { $n1=$ro['name'];
    $id1=$ro['aid'];

    
        if(empty($ro['image']))
        echo "<h1>No Image Found</h1>";
        else
        echo '<center><img src="data:image/jpeg;base64,'.base64_encode( $ro['image'] ).'" style="margin:22px;height:200px;width:200px;border-radius:100px;"/></center>';
        if($ro['not']==1)
        {
          echo "<center><h1>New message :<br><br><a href='inbox.php'><img src='message.jpg' style='height:120px;width:120px;'/></a></h1><cente/r>";
        }
        else
        {
          echo "<center><h1>No new message :<br><br><a href='inbox.php'><img src='message1.jpg' style='height:120px;width:120px;'/></a></h1><cente/r>";
        }

        }
  }
  else{
    echo "0 results";
  }
  ?>
  </div>
      
      	
	<div style="overflow: auto; height:550px;margin-top: 0px;background-color: lightblue;border: 5px solid grey;">
		<center><h1 style="padding:15px;margin: 0px;color:white;height:50px;background-color: purple;">INBOX</h1></center>
		<?php
		 $s1="select distinct sender from chat where reciever='$id1' order by `mid` desc";
		
    $re1=mysqli_query($conn,$s1);
   
      if(mysqli_num_rows($re)>0){
  
      while($ro1=mysqli_fetch_assoc($re1))
      {
        $s2="select * from inf where aid=".$ro1['sender'];
       
          $re2=mysqli_query($conn,$s2);
   
      if(mysqli_num_rows($re2)>0){
  
      while($ro2=mysqli_fetch_assoc($re2))
       {
        $n3=$ro2['name'];
        $a=$ro2['aid'];
        ?>
       
         <form method="POST">
          <?php   
         
          echo "<input type='hidden' name='a' value='$a'>
          <input style='height: 50px;width: 100%;background-color: lightgreen;border-bottom:5px solid black;color: black;margin: 0px;' name='s' type='submit' value='MESSAGE FROM :".$n3."'>";
       }
       } ?>
         
      </table>
 
      </form>
   
        
        <?php
       }
   		}
		?>
    <?php
      if(isset($_POST['s']))
      {
        $s14=$_POST['a'];
         $_SESSION['e2']=$s14;
        ?>
       
        <script>
      window.location.href = 'mess.php';
      </script>
      <?php
      }
    ?>
		</div>		
<center>

	
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
  
function mess(){
  $_SESSION['e2']=htmlentities($n3);
  location.href="mess.php";
}
</script>

