<!DOCTYPE html>
<html>
<head>
	<title>dynamic config</title>
	<?php include ("linkfile.php");?>
</head>
<body>
	<?php


	if(isset($_POST['submit'])){
	$server=$_POST['SERVER'];
	$db_user=$_POST['DB_USERID'];
	$db_password=$_POST['DB_PASSWORD'];
	$db_database=$_POST['DATABASE'];
	$project_name=$_POST['PROJECT_NAME'];
	$subtitle=$_POST['SUBTITLE'];
	$theme=$_POST['TEMPLATE'];
	$error=$_POST['ERRORPAGE'];

	// echo "$server";
	// echo "$db_user";
	// echo "$db_password";
	// echo "$db_database";

	 $f1=fopen("config.php","w");
	// fwrite($f1,"hello");
	
 	fwrite($f1, "<?php
 			define('SERVER','$server');
 			define('DB_USERID','$db_user');
 			define('DB_PASSWORD','$db_password');
 			define('DATABASE','$db_database');
			define('PROJECT_TITLE','$project_name');
			define('PROJECT_SUBTITLE','$subtitle');
			define('THEME','$theme');
			define('ERRORPAGE','$error');
 			?>");
 fclose($f1);
}
else

{
?>
<?php

$f1=fopen("config.php","r");
$file_size=filesize("config.php");
//echo "file_size=$file_size<br/>";
$fdata=fread($f1, $file_size);
//print_r($fdata);
$c=0;
$info=array("");
$temp="";
for($i=0;$i<$file_size;$i++)
{

	if($fdata[$i]=='<'||$fdata[$i]=='?'||$fdata[$i]=='>'||$fdata[$i]==" ")
	{

	}
	else
	{
	 if($fdata[$i]==";")
	{
		$info[$c]=$temp;
		$temp="";
		$c++;
	}
	else
	{
		$temp .=$fdata[$i];
	}	
		}
}


fclose($f1);

//echo $fdata;
//echo "<hr/>";
$count=count($info);
//print_r($info);
//echo "<br/>";
//echo "count=$count";
//echo "<br/>";
for($i=0;$i<$count;$i++)
{
	$temp=$info[$i];
	//print_r($temp);
	//echo "<hr/>";
	$temp=str_replace("define(", "", $temp);
		$temp=str_replace(")", "", $temp);
			$temp=str_replace("'", "", $temp);
	//echo "i=$i=$temp<br/>";
	$info[$i]=$temp;
	$temp1[$i]=explode(",",$info[$i]);
}
//print_r($temp1);
$s_value1=trim($temp1[0][1]);
$s_value2=trim($temp1[1][1]);
$s_value3=trim($temp1[2][1]);
$s_value4=trim($temp1[3][1]);
$s_value5=trim($temp1[4][1]);
$s_value6=trim($temp1[5][1]);
$s_value7=trim($temp1[6][1]);
$s_value8=trim($temp1[7][1]);


echo "
<form method='POST' action='setting.php'>
	SERVER :      <input type='text' name='SERVER' value='$s_value1'><br><br>
	DB_USERID :   <input type='text' name='DB_USERID' value='$s_value2'><br><br>
	DB_PASSWORD : <input type='text' name='DB_PASSWORD' value='$s_value3'><br><br>
	DATABASE :    <input type='text' name='DATABASE' value='$s_value4'><br><br>
	PROJECT_NAME :<input type='text' name='PROJECT_NAME' value='$s_value5'><br><br>
	SUBTITLE :   <input type='text' name='SUBTITLE' value='$s_value6'><br><br>
	
	
	TEMPLATE :  $s_value7 <select name='TEMPLATE'>
		<option value='' selected=''>Select</option>
					<option value='primary' >Primary</option>
					<option value='secondary' >Secondary</option>
					<option value='warning' >Warning</option>
					<option value='dark' >dark</option>
				</select>	<br>
	ERRORPAGE :<input type='text' name='ERRORPAGE' value='$s_value8'><br><br>
	<input type='submit' name='submit' value='Submit'>
</form>";
}
?>

</body>
</html>