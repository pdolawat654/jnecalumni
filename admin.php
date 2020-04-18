<?php
    $conn=mysqli_connect("localhost","root","","test");
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
			  <button style="width:250px;">ADMIN PANEL</button>
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

         </center>
    <?php
    
    $s="select * from blogs where flag=1";

    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      {
        $i=$ro['bid'];
        $t=$ro["title"];
        $c=$ro["blog"];
        $n=$ro["name"];
        $f=$ro['flag'];
        $sq="select image from inf where name='$n'";
         $res=mysqli_query($conn,$sq);
         $rot=mysqli_fetch_assoc($res);
         
       

        if(empty($rot['image']))
        echo "<h1>No Image Found</h1>";
        else
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $rot['image'] ).'" style="height:50px;width:50px;border-radius:25px;margin-left:100px;margin-top:30px;"/>';
        
        ?></td><td><?php echo "<h2 style='display:inline-block;margin-left:25px;'>".$n."</h2>"; ?></td></tr>
        <tr><td><?php echo "<h3 style='margin-left:100px;'>ID :".$i."  ".$t."</h3>"; ?></td></tr>
        <tr><td><?php echo "<p style='margin-left:100px;border:2px solid black;margin-right:100px;padding:30px;'>".$c."</p>"; 
        }
      }

        ?>
          
        </td></tr>
      
      <center>
        <form style="border:2px solid black;margin: 100px;"action="show.php" method="POST">
          <h1>Enter the ID of blog to be deleted :</h1>
          <input style="height: 30px;border:2px solid black;width: 30px;" type="text" name="id">
          <input type="submit" style='margin-bottom:40px;margin-left: 100px;height: 50px;width:150px;background-color: red;color: white'>
        </form>
     </center>


   
  
	
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
