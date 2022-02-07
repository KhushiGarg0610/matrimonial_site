<?php
require_once('profile_info.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
  
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
<div class='col-md-3'>
";
include_once("profile_menu.php");
echo "
</div>
<div class='col-md-9'>
<div class='panel panel-primary'>
<div class='panel-heading'>
<h1>";
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
<div class='col-md-4'>
<img src='$profile_data[20]' class='img-responsive img-rounded'>
<table class='table'>
<tr class='active'><th style='font-weight:bold;font-size:20px'>
Name : $profile_data[1]</tr>
<tr class='danger'><th style='font-weight:bold;font-size:15px'>
<b>Address :</b> $profile_data[11]</tr><tr>";



$obj1=new lib();
$where_con1=" request_to=$profile_data[0] and request_from=$profile_id";
$obj1->find("request","id,status",$where_con1);
$request_data=$obj1->get_row(0);
// print_r($request_data);

// exit;

if(!isset($_REQUEST['pid']) or $request_data[1]==1){
echo"
<tr class='warning'><th style='font-weight:bold;font-size:15px'><b>Email : </b>$profile_data[18]</tr><tr>";
echo"<tr class='warning'><th style='font-weight:bold;font-size:15px'><b>Mobile No :</b> $profile_data[8]</tr><tr>";
}
else{
echo"<tr class='warning'><th style='font-weight:bold;font-size:15px'><b>Email :</b> ******@gmail.com</tr><tr>";
echo"<tr class='warning'><th style='font-weight:bold;font-size:15px'><b>Mobile No :</b> **********</tr><tr>";
}


echo"</th></tr></table>
</div>

<div class='col-md-8'>
<table class='table'>
<tr class='danger'><th style='font-weight:bold;color:#B40404;font-size:20px'>Basics & Lifestyle</th></tr>
</table>
<div class='col-md-offset-1 col-md-10'>
<table class='table-condensed'>
<tr><th>Age/Date of Birth </th><th>:</th><td> $profile_data[2]</td></tr>
<tr><th>Marital Status </th><th>:</th><td> $profile_data[5]</td></tr>
<tr><th>Height </th><th>:</th><td> $profile_data[4]</td></tr>
<tr><th>Weight </th><th>:</th><td> $profile_data[10] kg</td></tr>
<tr><th>Color Complextion </th><th>:</th><td> $profile_data[9]</td></tr>
<tr><th>Grew up in </th><th>:</th><td> $profile_data[11]</td></tr>
<tr><th>Diet </th><th>:</th><td> $profile_data[12]</td></tr>
<tr><th>Zodiac Sign </th><th>:</th><td> $profile_data[14]</td></tr>
</table>
<br>
</div>
<table class='table'>
<tr class='danger'><th style='font-weight:bold;color:#B40404;font-size:20px'>Religious & Family Background</th></tr>
</table>
<div class='col-md-offset-1 col-md-10'>
<table class='table-condensed'>
<tr><th>Religion </th><th>:</th><td> $profile_data[7]</td></tr>
<tr><th>Mother Tongue </th><th>:</th><td> $profile_data[6]</td></tr>
<tr><th>Surname </th><th>:</th><td> $profile_data[13]</td></tr>
<tr><th>Family Location </th><th>:</th><td> $profile_data[11]</td></tr>
</table>
<br>
</div>
<table class='table'>
<tr class='danger'><th style='font-weight:bold;color:#B40404;font-size:20px'>Education & Career</th></tr>
</table>
<div class='col-md-offset-1 col-md-10'>
<table class='table-condensed'>
<tr><th>Qualification </th><th>:</th><td> $profile_data[15]</td></tr></h4>
<tr><th>Working With </th><th>:</th><td> $profile_data[16]</td></tr>
<tr><th>Annual Income </th><th>:</th><td> $profile_data[17]</td></tr>
</table>
</div>
</div>
</div></div>
</div></div>
";

echo"</div>";
echo "<div class='row'>";
include ("addwindow.php");
echo"</div>";

echo "<div class='row'>";
echo "<div class='col-md-12'>";
include ("footer.php");
echo"</div></div>";
?>
</div>
</body>
</html>