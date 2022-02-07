<?php
require_once('mylibr.php');
$obj=new lib();

$where_con="id='$profile_id' or email='$profile_id'";
$status=$obj->find("m_regform","id,name,dob,category,height,marital_status,mother_tongue,religion,mobileno,color,weight,hometown,food,surname,zodiac,education,profession,income,email,gender,profile_image,view_count",$where_con);
$num=$obj->get_num_rows();
// echo "$num";
// $profile_data="";
$profile_data=$obj->get_row(0);
$view_count=$profile_data[21];
// echo "view_count=$view_count";

?>