<?php
require_once("mylibr.php");
$obj=new lib();
$str="hello_spic";
$re=$obj->my_encode($str);
$re1=$obj->my_decode($re);
echo "re=$re<br/>";
echo "re1=$re1";
$re2="hello_spic";
$str1=$obj->my_encode($re2);
$re3=$obj->my_decode($str1);
if($re1==$re3)
{
	echo "match";
}
else
{
	echo "not match";
}
?>