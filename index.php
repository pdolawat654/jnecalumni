<?php
session_start();

session_destroy();
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
	</style>
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
			<button>Home</button>
			<button>About Us</button>
			<button>News</button>
			<button>Blogs</button>
			<button>Contact Us</button>
			<button onClick="log()" style="float: right;">Login</button>
			<button onClick="reg()" style="float: right;">Register</button>
		</div>
		<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="img1.jpg" style="width:100%;height: 450px;">
    
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="img2.jpg" style="width:100%;height: 450px;">
    
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="img3.jpg" style="width:100%;height: 450px;">
    
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
	<div>
		<h1 style="color: darkgoldenrod;
    padding-left: 150px;
    font-size: 50px;
    font-style: oblique;
    font-weight: bolder;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;">Welcome to JNEC Alumni Portal</h1>
		<h2 style="color: goldenrod;
    padding-left: 150px;
    padding-right: 70px;
    font-size: 22px;
    font-weight: bold;
    text-align: justify-all;
    font-family: Georgia, "Times New Roman", Times, serif;
}">Let's keep in touch..</h2>
		<p style="    padding-left: 150px;
    padding-right: 170px;
    text-align: justify;
    font-size: 21px;
    font-family: Georgia, "Times New Roman", Times, serif;
    line-height: 1.5;">Are you missing them? Your coursemates, your squad, your friends who stood up all night with you for assignments, gathering, events and so on. Come and join JNEC Alumni to keep in touch with your friends that you miss!<br><br>

Welcome back dearest alumni. Genuinely, one of our greatest assets is our global network of alumni. This page is to celebrate your achievements and provides you an access to our alumni community. Let's discover how to get involved and connect with the University and its supporters. Learn about the events we hold, and our services for our dearest alumni. We’re currently in touch with over 150,000 of our alumni from across India and the world, and we’re still looking for those we’ve lost contact with. Do you currently receive mailings from us? Have you recently changed address and need to let us know? JNEC Alumni maintains a database of tens of thousands of JNEC graduates, but we do not have accurate contact details for everyone. Please help us to keep in touch with you.</p>
<h1 style="color: darkgoldenrod;
    padding-left: 150px;
    font-size: 50px;
    font-style: oblique;
    font-weight: bolder;
    font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;">Register right now : </h1>
    <center><button style="background-color: goldenrod;color: white;width: 200px;font-size: 25px;">Registration</button></center>
	</div>	
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
	location.href="Login.php";
}
function reg(){
	location.href="Register.php";
}
</script>
