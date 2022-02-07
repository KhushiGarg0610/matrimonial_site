<?php
require_once('profile_info.php');
include_once('linkfile.php');
require_once("mylibr.php");
// require_once("config.php");
// $con=mysqli_connect(SERVER,DB_USERID,DB_PASSWORD,DATABASE);
$obj=new lib();
// $profile_id=$_SESSION['pid'];
if(isset($_REQUEST['msg'])){
$message=$_REQUEST['msg'];
if($message==5){
echo"<b class='text-info'>Profile Picture Updated Successfully</b>";
}
else if($message==4)
{
 echo"Error";
}
else if($message==1)
{
 echo"<b class='text-info'>Image Delete Successfully</b>";
}
else if($message==2)
{
 echo"Error occuring while deleting the image";
}
}
//echo"$profile_id<br>";
$col_list="Image_url,pic_status";
//$where_con=" Profile_id=$profile_id";
$where_con="Profile_id=$profile_id";
 $status=$obj->search('m_user_images',$col_list,$where_con,10,0,'gallery.php');
 //$status=$obj->find('user_images',$col_list,$where_con);
 $total_images=$obj->get_num_rows();
 echo "<hr>";
 
 
 echo"<div class='row'><div class='col-md-12'>";
 echo"<div class='gallery'>";
 for($i=0;$i<$total_images;$i++){
     $dp_name=$_SESSION['dp'];
     // echo "<div class='row'>";
     $data=$obj->get_row($i);
     // print_r($data);
     echo"
     <div class='column'>
     <img src='$data[0]' width='150px' height='140px' class='img-circle'/> ";
     echo "<br/><br/>";
     if($dp_name!=$data[0] && $data[1]==0){
     // if($dp_name!=$data[0]){
        // if($data[1]==0){
            echo " <b class='text-success'>Waiting For Approval...</b>";
        }
        else if($data[1]==-1){
            echo " <b class='text-danger'>Approval Decline!</b>";
           echo " <button class='btn btn-danger' name='delete'>
    <a href='data.php?image=$data[0]&image_action=-1' style='color:white;font-size:12px;'> Delete </a>
    </button>
        "; 
        }
        else if ($data[1]==1) {
           
        echo"<div class='row'><label class='col-md-12'>";
     echo"<button class='btn btn-info' name='accept' > 
     <a href='data.php?image=$data[0]&image_action=1' style='color:white;font-size:12px;'> Set as default </a>
     </button>";
     echo " <button class='btn btn-danger' name='delete'>
    <a href='data.php?image=$data[0]&image_action=-1' style='color:white;font-size:12px;'> Delete </a>
    </button>
        ";
    
         echo "</label></div>";
    }
    
    echo "</div>";

    // print_r($data);
 }
 echo"</div></div></div>";


// $data=$obj->get_data();
// $no_of_record=$obj->get_num_rows();
// $query="select $col_list from user_images where $where_con";
// echo"<div class='gallery'>";
// $query_res=mysqli_query($con,$query);
// While($row=mysqli_fetch_row($query_res))
// {
//     echo"<img src='$row[0]' class='img-thumbnail' height='100%' width='100%'/>  ";
// }
// echo"</div>";

?>