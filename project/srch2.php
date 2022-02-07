<?php
// session_start();
  require_once("profile_info.php");

  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php
 include ("linkfile.php");
?>
</head>
<body>
<div class="container-fluid">
<?php
include ("header.php");
$connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}
// $profile_id=$_SESSION['pid'];
//  echo "pid=$profile_id<br>";
//  exit();
require_once("mylibr.php");
$obj=new lib();


if(isset($_REQUEST['rto'])){
  echo "Request send";
}



$size=2;


echo"
<div class='row'>
<div class='col-md-offset-8 col-md-4'>
<form action='srch.php' method='POST'>
<div class='form-group row'>
<label class='col-md-4'><h4><b>Select Size : </b></h4></label>
<label class='col-md-6'><select name='size' class='form-control'>";
for($i=1;$i<6;$i++){
  if($i==$_SESSION['s'])
    $st="selected";
  else
    $st="";

    echo"<option value='$i' $st>$i</option>";
  }
echo"
</select>
 </label>
 <label><input type='submit' name='sizesub' value='GO' class='btn btn-success'/></label>
</div>
</form></div></div>";


if (isset($_POST['sizesub'])) {
 $size=$_POST['size'];
 $_SESSION['s']=$size;
}
else if (isset($_SESSION['s'])) {
 $size=$_SESSION['s'];
}

$where_con="";
$search_value="";

if(isset($_SESSION['pid']))
$where_con="id!=".$_SESSION['pid'];

if(isset($_POST['search']) || isset($_REQUEST['s'])){
 // echo "test";
 if(isset($_POST['search']))
  $search_value=$_POST['srch'];
  else
  $search_value=$_REQUEST['s'];
  $where_con="email like '%$search_value%' or id='$search_value' or mobileno='$search_value' and id!=$profile_id";
}


$pageno=0;
if(isset($_REQUEST['pageno'])) 
  $pageno=$_REQUEST['pageno'];

 // $size=2;
$col_list="email,id,name,hometown,dob,gender,profile_image";
$no_of_record=0;
 echo "where_con=$where_con<hr/>";
 $result=$obj->search('regform',$col_list,$where_con,$size,$pageno,"srch.php");
 $no_of_record=$obj->get_num_rows();
 echo "<br/>";



// echo "<h1>$no_of_record</h1>";
for($i=0;$i<$no_of_record;$i++){
$record_data=$obj->get_row($i);
// print_r($record_data);
 // echo "<br/>";


if(isset($_SESSION['pid']))
{
echo "<div class='col-md-3'>";
include_once("profile_menu.php");
echo "</div>
<div class='col-md-9'>";
}
else
echo "<div class='row'><div class='col-md-12'>";

echo "<div class='panel panel-danger'>
<div class='panel-heading'>
<h3>$record_data[1]/$record_data[0]</h3>";

if(isset($_SESSION['pid']))
{
  
$where_con="request_to=$record_data[1]";
//$obj1= new lib();
$entry=$obj->find('request','*',$where_con);
if($entry){
  $value=$obj->get_num_rows();
  //echo"<br/>$value";
  if($value==0){
    echo "<button class='btn btn-primary' name='request'>
    <a href='data.php?rec_id=$record_data[1]&pageno=$pageno' style='color:white' onclick=\"return confirm_msg('$record_data[0]')\">Send Request </a></button>";
    }
else{
  echo"<button class='btn btn-danger'>Already sent!!</button>";
}
}



}

// $_SESSION['rec_id']=$record_data[1] or $record_data[0];
// $c=$_SESSION['rec_id']=$record_data[1] or $record_data[0];
//  echo "c=$c";
echo"

</div>
<div class='panel-body'>

<div class='row'>
<div class='col-md-4'>
<img src='$record_data[6]' width=150/>
</div>
<div class='col-md-4'>
<h4>Name : $record_data[2]</h4>
<h4>Location : $record_data[3]</h4>
<h4>D.O.B/Age : $record_data[4]</h4>
<h4>Gender : $record_data[5]</h4>
</div>";
if(isset($_SESSION['pid']))
{
echo"
<div class='col-md-4'>
<h5 style='text-align: right'><a href='profile.php?pid=$record_data[1]'>click here to see all profile info</a></h5>
</div>";
}
else{
  echo"
<div class='col-md-4'>
<h5 style='text-align: right'><a href='index.php'>To see all Profile information,<b>Please Login</b></a></h5>
</div>";
}
echo"
</div>
</div>
</div>
</div>

  ";

}

// print_r($result);

echo "<div class='row'><div class='col-md-12'>";
include ("footer.php");
echo "</div></div>";
?>

<script>
function confirm_msg($email_id)
{
var v1= confirm("new request to -:"+$email_id);
  return v1;
}
</script>

</body>
</html>