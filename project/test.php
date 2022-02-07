<?php

//require_once("mylibr.php");


if(isset($_POST['update']))
{

	$cnt_len=$_POST['cnt_len'];
	//echo "$cnt_len";
	$cnt_value_list;
	for($i=0;$i<$cnt_len;$i++)
	{
		$cnt_name="c".$i;
		$c_name="cnt_".$i;
		$cnt_name_list[$i]=$_POST[$c_name];
		if($i!=4)
		{
			$cnt_value_list[$i]=$_POST[$cnt_name];
	//	$len=$cnt_name_list[$i];
//$temp=$cnt_name_list[$i];	
	//	$len=  strlen( ltrim($temp));
	//	echo "len=$temp -".$len;
		}
		else
	$cnt_value_list[$i]=$_POST[$cnt_name]."php";
			
	}
	//print_r($cnt_value_list);
	//print_r($cnt_name_list);
	$file_data ="<?php";
	for($i=0;$i<$cnt_len;$i++)
	$file_data .="define('".$cnt_name_list[$i]."','".$cnt_value_list[$i]."');";

	$file_data .="?>";
	//echo "<hr/>";
	//echo $file_data;
	$f1=fopen("config.php","w");
	fwrite($f1,$file_data);
	/*
	for($i=0;$i<$cnt_len;$i++)
	{
		$data=ltrim($cnt_value_list[$i]);
		fwrite($f1,"define('$cnt_name_list[$i]','$data');");
	}
				fwrite($f1,"?> ");
				*/
	fclose($f1);
	echo "done";
}
else
{
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
}
//print_r($info);
//echo "<br/>";


echo "<form action='test.php' method='post'>";
echo "<table width=50%>";
//$cnt="";
for($j=0;$j<$count;$j++)
{
	$tempinfo=$info[$j];
//	echo "<hr/>";
	$tempinfo =explode(",", $tempinfo);
	//print_r($tempinfo);
	$cnt="c".$j;
echo "<tr><td>$tempinfo[0]</td><td>";
$cnt_name="cnt_".$j;
echo "<input type='hidden' value='$tempinfo[0]' name='$cnt_name'/>";
if($j<3)
echo "
<input type='hidden' value='$tempinfo[1]' name='$cnt'/>$tempinfo[1] ";
else
echo "<input type='text' value='$tempinfo[1]' name='$cnt'/> ";	

echo "</td><tr>";

}

echo "<input type='hidden' name='cnt_len' value='$count'/>";
echo "<tr><td><input type='submit' name='update' value='update'/></td></tr>";
echo "</table>";
echo "</form>";
}
?>
