 <?php
    $conn=mysqli_connect("localhost","root","","test");
    session_start();
    $username=$_SESSION['email'];
    if(empty($username))
    {
      header('location:index.php');
    }
    
    $s="select * from inf where email='$username'";
    $re=mysqli_query($conn,$s);
      if(mysqli_num_rows($re)>0){
  
      while($ro=mysqli_fetch_assoc($re))
      {
        $n=$ro["name"];
        $e=$ro["email"];} }?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="">
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
      margin-left: 300px;
      margin-right: 380px;

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
      <button onClick="log()" style="float: right;">Logout</button>
      <button onClick="pro()" style="float: right;">Profile</button>
    </div>
    <center>
    <div class="Profile">
     
    <form method="post" enctype="multipart/form-data">
        <center>
        <h1>Update Details</h1> 
        <table>
        <tr><td>Select image to upload:</td><td><input type="file" name="image" required/></td></tr>
        <tr><td>Phone :</td><td><input type="text" name="phone" required/></td></tr>
        <tr><td>Branch :</td><td><input type="text" name="branch" required/></tr>
        <tr><td>Passout Year :</td><td><input type="text" name="passout" required/></td></tr>
        <tr><td>Working at :</td><td><input type="text" name="work" required/></td></tr>
        <tr><td>Relationship Status:</td><td><input type="text" name="relation" required/></td></tr>
        
        </table>
       
        <input style="height: 40px;width: 180px;color: white;background-color: green;margin-bottom: 10px;" type="submit" name="submit" value="UPLOAD"/>
    </form>
    </center>
  </div>
  <div class="menu">
      <button style="margin-left: 180px;">About Us</button>
      
      <button style="float: right;width: 120px;margin-right: 180px;">Contact Us</button>
    </div>

</body>
</html>
<?php

if(isset($_POST["submit"])){
$conn=mysqli_connect("localhost","root","","test");
    session_start();
    $username=$_SESSION['email'];
 
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $ph=$_POST['phone'];
        $br=$_POST['branch'];
        $pa=$_POST['passout'];
        $wo=$_POST['work'];
        $re=$_POST['relation'];
        $pas=$_POST['Password'];
      
 
      
        $insert = $conn->query("update inf SET image='$imgContent',branch='$br',phone='$ph',passout='$pa',working='$wo',relation='$re' where email='$username'");
        if($insert){
            header('location:Home.php');
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
   
}
?>
<script>
  function log(){
  location.href="Profile.php";
}
function pro(){
  location.href="index.php";
}
function ab(){
  location.href="about.php";
}
function blogs(){
  location.href="blogs.php";
}
function news(){
  location.href="news.php";
}
function contact(){
  location.href="contact.php";
}
</script>