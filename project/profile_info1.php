<?php
session_start();
ob_start();
if(isset($_SESSION['pid']))
{
require_once('mylibr.php');
$profile_id=$_SESSION['pid'];

$obj=new lib();
$where_con="id='$profile_id' or email='$profile_id'";
$status=$obj->find("regform","id,name,dob,category,height,marital_status,mother_tongue,religion,mobileno,color,weight,hometown,food,surname,zodiac,education,profession,income,email",$where_con);
// echo "$status";
$num=$obj->get_num_rows();
// echo "$num";

$profile_data=$obj->get_data();
// print_r($profile_data);
}
else
{
	header("Location:index.php");
}

?>