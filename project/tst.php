<?php
require_once("mylibr.php");
// require ("profile_info.php");
$obj=new lib();
$c_list['login_id']=$empid;
				
$_SESSION['pid']=$empid;
echo "$empid";
$result=$obj1->insert_data("log_info",$c_list);
echo "result=$result";
?>