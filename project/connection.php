<?php 
$server="localhost";
$db_userid="root";
$db_password="";
$database="matrimonial_project";
$con=mysqli_connect($server,$db_userid,$db_password,$database);
if ($con) {
//	echo "server connected";
	return true;
}
else{
//	echo "disconneted";
	return false;
}

 ?>