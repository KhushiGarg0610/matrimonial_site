<?php
session_start();
  ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<?php
include ("linkfile.php");
 ?>
</head>
<body>
<div class="container-fluid">
<?php

$pid=$_SESSION['pid'];
include ("header.php");
require_once("mylibr.php");
$obj=new lib();
if(isset($_REQUEST['id']))
{
$id=$_REQUEST['id'];
// echo "id=$id";
// echo "<br/>";
$temp=base64_decode($id);
// echo "id=$temp";

$where_con="id=$temp and status=0";
$col_list['status']=1;
$result=$obj->update('m_regform',$col_list,$where_con);
   if($result)
   {
    // echo "case 1<br/>";
     //exit;
     $num=$obj->get_num_rows();
     if($num==1){
    // echo "number = $num";
     $col_list="id";
      $where_con="add_ref=(SELECT email FROM regform where id=$temp)";
      $query=$obj->find('m_refrence',$col_list,$where_con);
      //recorde find 

      $data=$obj->get_data();
     // print_r($data);
      //exit;
      $data_id=$data[0];
      $col_list1['status']=1;
      $where_con1="id=$data_id";
      $result2=$obj->update('m_refrence',$col_list1,$where_con1);  
     // exit; 
      if($result2){
        $where_con2="id=$pid";
      //  echo "where 2= $where_con2";
        //exit;
        $result4=$obj->find('m_regform','view_count',$where_con2);
        $data4=$obj->get_data();
      //  echo "refrence point in regform = $data4[0]<br/>";
        $n1=$data4[0];
        $n1=$n1+3;
        $col_list2['view_count']=$n1;
        $where_con3="id=$pid";
        $result5=$obj->update('m_regform',$col_list2,$where_con3);
        if($result5)
         echo "";
        else 
        echo "error";
      
      }else{
      echo"error";
    }}
      echo "<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>Status updated</h3>";
    }
  else
   {
   echo "<br/>error";
     $err=$obj->get_error();
     echo $err;
    //echo "error update wali";
    }
}
else
{
  $temp="active.php?id=NjQ=";
  echo "<a href='$temp'>$temp</a>";
}




include ("footer.php");
include ("modal.php");
?>
</div>
</body>
</html>