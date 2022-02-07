<?php
session_start();
ob_start();

require_once("mylibr.php");
$obj=new lib();
$profile_id=$_SESSION['pid'];
echo "profile_id=$profile_id<br>";
$rec_id=$_REQUEST['rec_id'];
echo "rec_id=$rec_id<br>";

$_SESSION['rec_id']=$_REQUEST['rec_id'];
$request_id=$_SESSION['rec_id'];
echo "request_id=$request_id<br>";

$col_list=array('id_send' =>$profile_id ,'id_received' =>$rec_id  );
$status=$obj->insert_data('request',$col_list);
if ($status) {
	echo "true";

}else{
	echo "errror";
}



?>