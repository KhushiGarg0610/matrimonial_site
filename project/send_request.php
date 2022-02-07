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
echo "$profile_data[1]/";
  echo "$profile_data[0]";

echo "</h1>
</div>
<div class='panel-body'>";
// <div class='row'><div class='col-md-12'>
// ";
// // echo "$profile_id/";
// // print_r($profile_data);
 

$obj1=new lib();
$pageno=0;
if(isset($_REQUEST['pageno'])) 
  $pageno=$_REQUEST['pageno'];
  $size=2;
$col_list="email,id,name,hometown,dob";
$no_of_record=0;
$where_con="id in(SELECT request_to FROM `m_request` where request_from=$profile_id)";
//echo "where_con=$where_con<hr/>";
 $result=$obj->search('m_regform',$col_list,$where_con,$size,$pageno,"send_request.php");
 $no_of_record=$obj->get_num_rows();
//echo "no of record=".$no_of_record;
echo "<br>";
for($i=0;$i<$no_of_record;$i++){
    $record_data=$obj->get_row($i);
    echo "<div class='col-md-offset-2 col-md-8'> 
    <div class='panel panel-info'>
    <div class='panel-heading'>
    <h3><a href='profile.php?pid=$record_data[1]'>$record_data[1]/$record_data[0]</a></h3>";    
    echo"</div>
    <div class='panel-body'>
    <h4>Name : $record_data[2]</h4>
    <h4>Location : $record_data[3]</h4>
    <h4>D.O.B/Age : $record_data[4]</h4>
    <h5 style='text-align: right'><a href='profile.php?pid=$record_data[1]'>click here to see all profile info</a></h5>
    <form action='data.php' method='POST'>
    <input type='submit' class='btn btn-success' name='requested' value='Requested'>
    <input type='submit' class='btn btn-danger' name='undo' value='Undo'>
    </form>
    </div></div></div>";
}

   
    
    


echo "</div></div></div></div>";


  echo "<div class='row'>";
	include ("addwindow.php");
  echo "</div>";

 
	include ("footer.php");


  
	?>

</div>
</body>
</html>