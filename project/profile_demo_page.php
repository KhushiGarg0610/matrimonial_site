<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
  require_once('profile_info.php');
//   require_once('freq.php');
  include ("linkfile.php");
  
  ?>
</head>
<body>
<div class="container-fluid">
	<?php
 // session_start();
	include ("header.php");



  // echo "<hr>";
  //$id=$_REQUEST['id'];
   //echo "id=$id";
  //echo "<hr>";
  //$login_id=$_SESSION['pid'];
// echo "profile_id=$profile_id";

  echo "
  <div class='row'>
<div class='col-md-3'>";
include_once("profile_menu.php");
echo "
</div>
<div class='col-md-9'>

<div class='panel panel-primary'>
<div class='panel-heading'>
<h1>";
// echo "$profile_id/";
  // print_r($profile_data);
 echo "$profile_data[1]/";
  echo "$profile_data[0]";
if(!isset($_SESSION['pid'])){
  echo "<button class='btn btn-success pull-right'><a href='index.php'>Login</a></button>";
}
else{
  $profile_id=$_SESSION['pid'];
//   echo "<button class='btn btn-danger pull-right'>
 //  <a href='logout.php' style='text-decoration: none;color: white'>$profile_data[0] Logout</a></button>";
 }

echo"</h1>
</div>


<div class='panel-body'>
<div class='row'>
<div class='col-md-12'>";
include_once("gallery.php");
// echo "$total_images";
echo"
</div>
</div>";
if($total_images<5){
echo"<br><form action='data.php' method='POST' enctype='multipart/form-data'>
<div class='form-group row'>
<label class='col-md-offset-3 col-md-2'>Upload Picture :</label>
<div class='col-md-4'><input type='file' name='pic' id='pic' /></div>
  <div class='col-md-2'>
  <input type='submit' name='upload_pic' class='btn btn-info'>
  </div>
</div>
</form>
";
}
// print_r($profile_data);
/*
echo "
<h3><a href='registration_form.php'>Complete Your Profile</a></h3>
</div>
</div>
</div>

</div>



</div>
<div class='col-md-4'>

<div class='panel panel-primary'>
<div class='panel-heading'>
<h3>Friend Request</h3>
</div>
<div class='panel-body'>
<div style='border-style: ridge;border-color: sky-blue;'>
<div class='row'><div class='col-md-offset-1 col-md-10'>


<h4>Name : $pro_data[0]</h4>
<h4>DOB : $pro_data[1]</h4>
<h4>Location : $pro_data[2]</h4>
<form action='data.php' method='POST'>
<button class='btn btn-success' name='accept'>Accept</button>
<button class='btn btn-danger' name='delete'>Delete</button>
</form>
<br>

</div></div></div>
</div></div>
</div>

</div>
";
*/



  echo "<div class='row'>";
	//include ("addwindow.php");
  echo "</div>";

 
	//include ("footer.php");


  
	?>

</div>
</body>
</html>