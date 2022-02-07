<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include ("mylibr.php");
	$obj=new lib();
if(isset($_POST['submit'])){
	$dob=$_POST['date'];
	echo "dob=$dob";
	$result=$obj->age_cal($dob);
	
}
?>
	<form method="POST" action="age_cal.php">
	<input type="date" name="date">
	<input type="submit" name="submit">
</form>
</body>
</html>