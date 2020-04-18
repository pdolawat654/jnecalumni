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

    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      { $n1=$ro['name'];
		$id1=$ro['aid'];

		}}
   	$id2=$_SESSION['e2'];


      $s="select * from inf where aid='$id2'";
    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      {
        $n2=$ro['name'];
       }}

        $i1="select image from inf where aid='$id1'";
         $res1=mysqli_query($conn,$i1);
         $rot1=mysqli_fetch_assoc($res1);
          $i2="select image from inf where aid='$id2'";
         $res2=mysqli_query($conn,$i2);
         $rot2=mysqli_fetch_assoc($res2);
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
      <center>
      	<h1 style="background-color: brown;color: white;margin-right: 400px;margin-left: 400px; "><?php echo $n2; ?></h1></center>
      	<div style="
  display:flex;
  flex-direction:column;
  height:100%;
  ">
	<div style=" overflow: auto;
  display: flex;
  flex-direction: column-reverse; height:400px;margin-top: 30px;margin-left: 400px;margin-right: 400px;">
		<h1 style="background-color: brown;color: white;margin-right: 400px;margin-left: 400px;height: 50px; "><?php echo $n2; ?></h1></center>
		<?php
		 $s1="select * from chat where (sender='$id1' and reciever='$id2') or (sender='$id2' and reciever='$id1') order by `mid` desc";
		
    $re1=mysqli_query($conn,$s1);
   
      if(mysqli_num_rows($re)>0){
  
      while($ro1=mysqli_fetch_assoc($re1))
      {
        $s=$ro1['sender'];
        $m1=$ro1['message'];
        
        ?>
   
        <table>
        <td style="float: left;width: 380px;"><?php 
        if($s==$id1){
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $rot1['image'] ).'" style="height:50px;width:50px;float:right;border-radius:25px;margin-right:0px;margin-left:0px;"/>';
        echo "<h3 style='text-align:center;border-radius:10px;margin:0px;padding:0px;width:320px;float:left;background-color:lightblue;height:auto;'>".$m1."</h3>";

       ?></td><td style="float: right;">
       	<?php }else
        {
        	echo '<img src="data:image/jpeg;base64,'.base64_encode( $rot2['image'] ).'" style="height:50px;float:left;width:50px;border-radius:25px;margin:0px;"/>';
       echo "<h3 style='text-align:center;border-radius:10px;margin:0px;padding:0px;height:auto;width:320px;float:right;background-color:lightgreen;'>".$m1."</h3>";
    	}?></td>
       </table>
     
        <?php
       }
   		}
		?>
		</div>		</div>
<center>

		<div style="margin-top: 30px;margin-left: 400px;margin-right: 400px;margin-top: 0px;"><form method="POST">
		<center><input style='height: 30px;border: 2px solid black;width: 423px;padding-left: 2px;' placeholder="type to chat.." type="text" name="message" required>
		<input style='height: 30px;border: 2px solid black;width: 100px;background-color: lightgreen;margin-bottom: 30px;' type="submit" onclick='ref()' name="sub" value="Send"></center>
		</form>
		</center>
		<?php
		if(isset($_POST['sub']))
		{
			$me=$_POST['message'];
			
			$s12="insert into chat(`sender` ,`reciever`, `message`) VALUES ('$id1','$id2','$me')";
      $s13="update `inf` set `not`=1 where aid='$id2'";
      mysqli_query($conn,$s13);
			$rs=mysqli_query($conn,$s12);
			if($rs)
			{
					?>
			<script>
			window.location.href = 'mess.php';
			</script>
			<?php
			}
		}
		?>
	</div>
	<div class="menu">
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

