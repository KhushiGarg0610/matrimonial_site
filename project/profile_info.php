<?php
session_start();
ob_start();

// echo "<h1>helllllooo</h1>";

// $_SESSION['pid']=$profile_id;
// $profile_id=$_SESSION['pid'];
// echo "pr_id=$profile_id";

if(isset($_SESSION['pid']))
{

if(isset($_REQUEST['pid']))
{
	$profile_id=$_REQUEST['pid'];
}
else
{
$profile_id=$_SESSION['pid'];
}

require_once("get_data.php");

}
else
{
	//echo "errror";
	 header("Location:index.php");
}

?>