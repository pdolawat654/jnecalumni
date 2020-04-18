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
    tr{
      
      height: 40px;

    }
    td{
      padding: 30px;
          // border: 2px solid black; 
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
      {
        $i=$ro['aid'];
        $n=$ro["name"];
        $e=$ro["email"];
        $p=$ro["phone"];
        $b=$ro["branch"];
        $pas=$ro["passout"];
        $w=$ro["working"];
        $r=$ro["relation"];
        ?>
    
		<div class="top">
			<center><img src="logo1.jpg" style="height: 120px; width:160px; float: left;">
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
    <center>
    <div class="Profile">
     
      <table>
        <h1><?php echo $n; ?></h1>     
        <tr><?php if(empty($ro['image']))
        echo "<h1>No Image Found</h1>";
        else
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $ro['image'] ).'" style="height:250px;width:250px;border-radius:125px;"/>';
        }
  }
  else{
    echo "0 results";
  }
  ?></div></tr>
        
        <tr><td>Email :</td><td><?php echo $e; ?></td></tr>
        <tr><td>Phone :</td><td><?php echo $p; ?></td></tr>
        <tr><td>Branch :</td><td><?php echo $b; ?></td></tr>
        <tr><td>Passout Year :</td><td><?php echo $pas; ?></td></tr>
        <tr><td>Working at :</td><td><?php echo $w; ?></td></tr>
        <tr><td>Relationship Status:</td><td><?php echo $r; ?></td></tr>
        
      </table>

      <a href="Update.php"><button style="margin: 20px;width: 180px;">Update Info</button></a>
      <button style="width: 190px;" onclick="adblog()">Add your own blog </button>


    </div>
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
function adblog()
{
 location.href="blogs.php"; 
}
</script>
