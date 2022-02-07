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
  <div class='panel-heading'>";
echo "<h1>$profile_data[1]/";
echo "$profile_data[0]</h1>";

echo"  </div>
  <div class='panel-body'>";
// echo "$profile_id/";
  $obj1=new lib();
$pageno=0;

 if(isset($_REQUEST['pageno'])) 
  $pageno=$_REQUEST['pageno'];
  $size=2;
$col_list="email,id,name,hometown,dob,gender,profile_image";
$no_of_record=0;
$where_con="id in(SELECT request_from FROM `m_request` where request_to=$profile_id)";
//echo "where_con=$where_con<hr/>";
 $result=$obj->search('m_regform ',$col_list,$where_con,$size,$pageno,"request.php");
 $no_of_record=$obj->get_num_rows();
//echo "no of record=".$no_of_record;

for($i=0;$i<$no_of_record;$i++){
    $record_data=$obj->get_row($i);
 //    print_r($record_data);
     echo "<br><br>";
    
    
    echo "  <div class='row'>
    <div class='col-md-12'>
    
    <div class='panel panel-danger'>
    <div class='panel-heading'>
    <div class='row'>
   <div class='col-md-4'> <h5><a href='profile.php?pid=$record_data[1]'>$record_data[1]/$record_data[0]</a></h5>
</div>
  <div class='col-md-4 pull-right'>
<h5 style='text-align: right'><a href='profile.php?pid=$record_data[1]'>click here to see all profile info</a>
</div>
</h5>

</div>
    </div>";
    echo"

  
    <div class='panel-body'>
    <div class='row'>
    <div class='col-md-4'>
   <img src='$record_data[6]' width=150/>
    </div>
    <div class='col-md-4'>
    <h4>Name : $record_data[2]</h4>
    <h4>Location : $record_data[3]</h4>
    <h4>D.O.B/Age : $record_data[4]</h4>
    </div>

    ";
  

  $obj1=new lib();

$where_con1=" request_to=$profile_id and request_from=$record_data[1]";
  $obj1->find("request","id,status",$where_con1);
$request_data=$obj1->get_data(0);
 echo "<div class='col-md-4'>Profile Status:";
  if($request_data[1]==0)
  {
   echo "

    <button class='btn btn-success' name='accept' > 
    <a href='data.php?request_id=$request_data[0]&c=1&uid=$record_data[1]' style='color:white' onclick=\"return confirm_msg('$record_data[0]')\">Accept </a> </button>";
   
        echo " <button class='btn btn-danger' name='delete'>
       <a href='data.php?request_id=$request_data[0]&c=-1' style='color:white' onclick=\"return confirm_msg1('$record_data[0]')\"> Delete </a></button>";
   
   }
   else if($request_data[1]==1){
    echo " <b class='text-success'>Accepted</b>";
    
   }
   else if($request_data[1]==-1){
    echo " <b class='text-danger'>Rejected</b>";
   }
   
    echo"</div>
    </div>";

  //  echo "$record_data[1]<hr/>";
  echo "</div>";
      echo"
    </div>
    </div>
    </div>";
}
    
echo"</div>
</div>";  


echo "</div></div>";

  echo "<div class='row'>";
	include ("addwindow.php");
  echo "</div>";

 
	include ("footer.php");


  
	?>
<script>
  function confirm_msg($email_id)
{
var v1= confirm("Are you sure to accept the request -:"+$email_id);
  return v1;
}

  function confirm_msg1($email_id)
{
var v1= confirm("delete request of -:"+$email_id);
  return v1;
}
</script>
</div>
</body>
</html>