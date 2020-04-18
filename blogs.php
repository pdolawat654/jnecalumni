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
       }}
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
		* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
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
   .main
     {
     border: 2px solid black;
      margin-left: 300px;
      margin-right: 300px;
      margin-top: 60px;
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
			<img src="logo1.jpg" style="height: 150px; width:200px; float: left;">
			<h1 style="display: inline-block;font-size: 50px;">Jawaharlal Nehru Engineering College</h1>
			<img src="logo2.jpg" style="height: 160px;width:210px;float: right;" id="a1">
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
	<center><div class="main">
			<form action='blog-done.php' method="POST" enctype="multipart/form-data">
			
			<center>
				<h1>POST YOUR BLOG :</h1>
                <table>
        <tr><td>Title :</td><td><input type="text" name="title" placeholder="Enter message" name="title" required/></td></tr>
        <tr><td>Content :</td><td><input type="text" style="height: 80px;width: 280px;"" name="blog" placeholder="Enter message" name="blog" required/></td>
       <tr><td>Select image to upload:</td><td><input type="file" name="image"/></td></tr> 	  
        </tr>
        
       
        
        </table>
       <input style="height: 40px;width: 180px;color: white;background-color: green;margin-bottom: 50px;" type="submit" name="submit" value="POST"/>
    
		</form>
		

			</div>
			</center>
	<div class="menu">
			<button style="margin-left: 180px;">About Us</button>
			
			<button style="float: right;width: 120px;margin-right: 180px;">Contact Us</button>
		</div>

</body>
</html>
<script>
	var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

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
