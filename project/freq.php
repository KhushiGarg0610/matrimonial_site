<?php
// session_start();
require_once("mylibr.php");
$obj=new lib();

$request_id=$_SESSION['rec_id'];
	// $_SESSION['rec_id'];
// echo "request_id=$request_id<br>";
$col_list="name,dob,hometown";
$where_con="id='$request_id'";
$status=$obj->find('regform',$col_list,$where_con);
// if($status){
// 	echo "true";
// }else{
// 	echo "error";
// }
$num=$obj->get_num_rows();
 // echo "$num";

$pro_data=$obj->get_data();
// print_r($pro_data);


?>
	
