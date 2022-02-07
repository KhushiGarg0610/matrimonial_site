<?php
session_start();
$profile_id=$_SESSION['pid'];
$time=time()+10;
$last_log=$time;
$col=array('last_login');
$where="'id'=$profile_id";
$qry="UPDATE m_regform SET last_login=$last_log where id=$profile_id";
$res=mysqli_query($con,$qry);
?>