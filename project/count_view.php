<?php
require_once("profile_info.php");
// session_start();
 // ob_start();
require_once("mylibr.php");
$obj=new lib();
$id=$_SESSION['pid'];
$where_con="id=$id";
$result=$obj->find('m_regform','view_count',$where_con);
if($result){
	$num=$obj->get_num_rows();
// echo "num=$num";
	if($num>0){
$data=$obj->get_data();
$view_data=$data[0];
}
}
 // echo "<h1>$view_data</h1>";
// $_SESSION['view_count']=$view_data;
// $view_count=$_SESSION['view_count'];
// echo "$view_count";

// if($num>0){
//     if($data1[1]==1){
//       //  $num1=$num-1;
//         $col_list['view_count']="$num1";
//        // $query=$obj->update('request',$col_list,$where_con);
//         $data=$obj->get_data();
//         $_SESSION['data']=$data;
//         $data_val=$_SESSION['data'];
//     }
//     else{
//         $data1[0]=5;
//     }
// }

?>