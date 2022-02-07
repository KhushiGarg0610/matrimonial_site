<!DOCTYPE html>
<html>
<head>
	<title>dynamic config</title>
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

	if($fdata[$i]=='<'||$fdata[$i]=='?'||$fdata[$i]=='p'||$fdata[$i]=='h'||$fdata[$i]=='p'||$fdata[$i]=='>'||$fdata[$i]==" ")
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
	$temp=str_replace("define(", "", $temp);
		$temp=str_replace(")", "", $temp);
			$temp=str_replace("'", "", $temp);
	//echo "i=$i=$temp<br/>";
	$info[$i]=$temp;
	$temp1[$i]=explode(",",$info[$i]);
}
//print_r($temp1);
$s_value=trim($temp1[0][0]);
echo "
<form method='POST' action='installed.php'>
	SERVER :      <input type='text' name='SERVER' value='$s_value'><br><br>
	DB_USERID :   <input type='text' name='DB_USERID'><br><br>
	DB_PASSWORD : <input type='text' name='DB_PASSWORD'><br><br>
	DATABASE :    <input type='text' name='DATABASE'><br><br>
	PROJECT_NAME :<input type='text' name='PROJECT_NAME'><br><br>
	SUBTITLE :   <input type='text' name='SUBTITLE'><br><br>
	ERRORPAGE :<input type='text' name='ERRORPAGE'><br><br>
	
	TEMPLATE :   <select name='TEMPLATE'>
		<option value='' selected=''>Select</option>
					<option value='primary'>Primary</option>
					<option value='secondary'>Secondary</option>
					<option value='warning'>Warning</option>
					<option value='dark'>dark</option>
				</select>	<br>

	<input type='submit' name='submit' value='Submit'>
</form>";

}
?>
</body>
</html>