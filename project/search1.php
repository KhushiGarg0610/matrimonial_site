<?php
session_start();
ob_start();
if(isset($_SESSION['pid'])){
  $profile_id=$_SESSION['pid'];
  require_once("get_data.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php
  //ob_start();
  include ("linkfile.php");
  ?>
</head>
<body>
<div class="container-fluid">
  <?php
  require_once("mylibr.php");
  $pageno=0;
  if(isset($_REQUEST['pageno']))
  $pageno=$_REQUEST['pageno'];
    // echo "<h1>pg=$pageno</h1>";
 
  if($pageno>0)
  require_once("header.php");

  $obj= new lib();
  $connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}
// if(isset($_REQUEST['reset']))
// {
//   unset($_SESSION['where_con']);
//   unset($_SESSION['wt_value']);
//   unset($_SESSION['colour_value']);
//   header('location:search1.php');
// }



$wt_value="";
$ht_value="";
$rel_value="";
$mth_value="";
$zdsign_value="";
$age_value="";
$where_con="";
 if(isset($_GET['chb']) or isset($_GET['hchb']) or isset($_GET['rel']) or isset($_GET['mth']) or isset($_GET['zdsign']) or isset($_GET['age'])){

  $wt_value=$_GET['chb'];
   $ht_value=$_GET['hchb'];
   $rel_value=$_GET['rel'];
   $mth_value=$_GET['mth'];
   $zdsign_value=$_GET['zdsign'];
   $age_value=$_GET['age'];
  // echo "$wt_value<br/>";
  $_SESSION['wt_value']=$wt_value;
   $_SESSION['ht_value']=$ht_value;
   $_SESSION['rel']=$rel_value;
   $_SESSION['mth']=$mth_value;
   $_SESSION['zdsign']=$zdsign_value;
   $_SESSION['age']=$age_value;
}else{
   if(isset($_SESSION['wt_value']))
    $wt_value=$_SESSION['wt_value'];
  if(isset($_SESSION['ht_value']))
    $ht_value=$_SESSION['ht_value'];
  if(isset($_SESSION['rel']))
    $rel_value=$_SESSION['rel'];
  if(isset($_SESSION['mth']))
    $mth_value=$_SESSION['mth'];
  if(isset($_SESSION['zdsign']))
    $zdsign_value=$_SESSION['zdsign'];
  if(isset($_SESSION['age']))
    $age_value=$_SESSION['age'];
 }

 // echo "height=$ht_value<br/>weight=$wt_value<br/>rel=$rel_value<br/>mth=$mth_value<br/>
 // zdsign_value=$zdsign_value<br/>age_value=$age_value<br/>";
// exit();
// $_SESSION['wt_value']=$wt_value;
  
  // print_r($wt_value);
  $weight_val=explode("/", $wt_value);
  $count1=count($weight_val);

  $height_val=explode("/", $ht_value);
  $count2=count($height_val);

  $religion_val=explode("/", $rel_value);
  $count3=count($religion_val);

  $mth_val=explode("-", $mth_value);
  $count4=count($mth_val);

  $zdsign_val=explode("-", $zdsign_value);
  $count5=count($zdsign_val);

  $age_val=explode("/", $age_value);
  $count6=count($age_val);
   // echo "<br>count=$count6<br>";
  // exit();
  // $colour_value=$_GET['col'];
  // $_SESSION['colour_value']=$colour_value;
  // $count2=count($colour_value);


   if($count6!=0)
   {
     $where_con6="( ";
     for($i=0;$i<$count6;$i++){
     $age=explode('-',$age_val[$i]);
     $where_con6.="age_in_y BETWEEN '$age[0]' AND '$age[1]'";
     if($i<$count6-1)
    {
      $where_con6.=" or ";
     }
    
   }
    $where_con6.=")";
     // echo"<br/>w6=$where_con6<br/>";
   }
  else $where_con6="";

  if($count5!=0)
  {
    $where_con5="(";
    for($i=0;$i<$count5;$i++){
    $where_con5.="zodiac='$zdsign_val[$i]'";
    if($i<$count5-1)
    {
      $where_con5.=" or ";
    }}
    $where_con5.=")";
    // echo"<br/>w4=$where_con5<br/>";
  }
  else $where_con5="";

  if($count4!=0)
  {
    $where_con4="(";
    for($i=0;$i<$count4;$i++){
    $where_con4.="mother_tongue='$mth_val[$i]'";
    if($i<$count4-1)
    {
      $where_con4.=" or ";
    }}
    $where_con4.=")";
    // echo"<br/>w4=$where_con4<br/>";
  }
  else $where_con4="";

  if($count3!=0)
  {
    $where_con3="(";
    for($i=0;$i<$count3;$i++){
    $where_con3.="religion='$religion_val[$i]'";
    if($i<$count3-1)
    {
      $where_con3.=" or ";
    }}
    $where_con3.=")";
    // echo"w3=$where_con3";
  }
  else $where_con3="";
  
  
  if($count2!=0)
  {
    $where_con2="(";
    for($i=0;$i<$count2;$i++){
    $where_con2.="height='$height_val[$i]'";
    if($i<$count2-1)
    {
      $where_con2.=" or ";
    }}
    $where_con2.=")";
    // echo"w2=$where_con2";

  }
  else $where_con2="";

   if($count1!=0)
   {
     $where_con1="( ";
     for($i=0;$i<$count1;$i++){
     $weight=explode('-',$weight_val[$i]);
     $where_con1.="weight BETWEEN '$weight[0]' AND '$weight[1]'";
     if($i<$count1-1)
    {
      $where_con1.=" or ";
     }
    
   }
    $where_con1.=")";
     // echo"<br/>$where_con1<br/>";
   }
  else $where_con1="";

  if($where_con1!='' && $where_con2 !='' && $where_con3!='' && $where_con4!='' && $where_con5!='' && $where_con6!='')
{
  $where_con=" $where_con2 OR $where_con1 OR $where_con3 OR $where_con4 OR $where_con5 OR $where_con6";
  // $where_con +="";
  // echo "<hr/>ww=$where_con<hr/>";
}
else
{
  $where_con=" $where_con2$where_con1$where_con3$where_con4$where_con5$where_con6";
}

if($where_con1="")
$_SESSION['where_con']=$where_con;
// }
// else{
//  $_SESSION['where_con']=""; 
// }

// $pageno=0;
$size=1;
if(isset($_REQUEST['pageno']))
  $pageno=$_REQUEST['pageno'];

// $_SESSION['pageno']=$pageno;
// echo "<hr>pgno=$pageno<hr>";
  if(isset($_SESSION['where_con']))
  $where_con=$_SESSION['where_con'];
// echo"where=$where_con1<hr>";
$col_list="email,id,name,hometown,dob,gender,profile_image";
  $result=$obj->search('m_regform',$col_list,$where_con,$size,$pageno,"search1.php");
  $no_of_record=$obj->get_num_rows();
//echo"no of record=$no_of_record";


for($i=0;$i<$no_of_record;$i++){
  $record_data=$obj->get_row($i);

   // print_r($record_data);
  echo "<br>";
  
  echo "<div class='row'>";
  
  // if(isset($_SESSION['pid']))
  // {
    echo "<div class='col-md-12'>";
// if($pageno!=0)
// include("filinclude.php");

  
  // echo "</div>
  // <div class='col-md-9'>";
  // }
  // else
  // echo "<div class='col-md-8'>";
  
  echo "<div class='panel panel-info'>
  <div class='panel-heading'>
  <h3>$record_data[1]/$record_data[0]</h3>";
  
  if(isset($_SESSION['pid']))
  {
    
  $where_con="request_to=$record_data[1]";
  //$obj1= new lib();
  $entry=$obj->find('m_request','*',$where_con);
  if($entry){
    $value=$obj->get_num_rows();
    // echo"<br/>$value";
    if($value==0){
      echo "<button class='btn btn-primary' name='request'>
      <a href='data.php?rec_id=$record_data[1]&pageno=$pageno' style='color:white' onclick=\"return confirm_msg('$record_data[0]')\">Send Request </a></button>";
      }
  else{
    echo"<button class='btn btn-danger'>Already sent!!</button>";
  }
  }
  
  
  
  }
  
  // $_SESSION['rec_id']=$record_data[1] or $record_data[0];
  // $c=$_SESSION['rec_id']=$record_data[1] or $record_data[0];
  //  echo "c=$c";
  echo"
  
  </div>
  <div class='panel-body'>
  
  <div class='row'>
  <div class='col-md-4'>
  <img src='$record_data[6]' width=150 class='img-circle'/>
  </div>
  <div class='col-md-5'>
  <table class='table-condensed'>
  <tr><h4><th>Name</th><th>:</th><td> $record_data[2]</td></h4></tr>
  <tr><h4><th>Location</th><th>:</th><td> $record_data[3]</td></h4></tr>
  <tr><h4><th>D.O.B/Age </th><th>:</th><td> $record_data[4]</td></h4></tr>
  <tr><h4><th>Gender</th><th>:</th><td> $record_data[5]</td></h4></tr>
  </table>
  </div>
  <div class='col-md-3'>
  <h5 style='text-align: right'><a href='profile.php?pid=$record_data[1]'>click here to see all profile info</a></h5>
  </div>
  </div>
  </div>
  </div>
  </div></div>";
} 


if($pageno!=0)  
 include_once("footer.php");
?>

</div>

</body>
</html>