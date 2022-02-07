<?php
session_start();
ob_start();
require_once("mylibr.php");
$obj=new lib();
 
// $time=time("H:i:s");
// echo "time=$time";
// echo(date("Y-m-d",$time));
// exit();
//date_default_timezone_set("America/New_York");
$c_list['log_out']=date('Y-m-d H:i:s');
$id=$_SESSION['pid'];
//echo $c_list['log_out'];
//echo "<br/>".date('h:i');
//$dt = new DateTime();
 //   echo $dt->format('Y-m-d H:i:s');
//exit;

// echo "pid=$id";
 $where_con="login_id='$id'";
 $result=$obj->update("m_log_info",$c_list,$where_con);
 // echo "result=$result";
 if ($result) {
 	unset($_SESSION['pid']);
 	// echo "ok";
 	 header("Location:index.php");
 }
 else{
 	echo "error";
 }
// header("Location:index.php");


?>