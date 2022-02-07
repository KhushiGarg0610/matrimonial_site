<?php
//echo "hello world";
//session_start();
include('connection.php');
require_once("mylibr.php");
$obj1=new lib();
//$time=time()+10;
?>
<!DOCTYPE html>
<html>
<head>
    <?php include ('linkfile.php'); ?>
    <script> 
    function updateUserStatus(){
        jQuery.ajax({
            url: 'friend_list_update.php',
            success: function(){

            }
        });
    }

    setInterval (function(){
        updateUserStatus();
    },1000);
</script>
</head>
<body>
<?php
echo "<div class='panel panel-primary'>";
echo "<div class='panel-heading'>";
echo "<h1>Connections</h1>";
// $col_list="name";
// $no_of_record=0;
//select name from m_regform where id in(SELECT request_from FROM `m_request` where request_to=1 and status=1);
$wh="select profile_image,name,last_login from m_regform where id in(SELECT request_from FROM `m_request` where request_to=$profile_id and status=1)";
$result=mysqli_query($con,$wh);
//echo $result;
while($row=mysqli_fetch_array($result)){
 echo $row['profile_image'];
 echo $row['name'];

}
echo "</div>";
echo"<div class='panel-body'>
<div class='row'><div class='col-md-12'>";
// while($row=mysqli_fetch_assoc($result)){
//     // $record_data=$obj->get_row($i);
//     $flag='offline';
//     $class='btn-danger';
//     echo $row['last_login'].'<hr/>';
//     if($row['last_login']>$time){
//         $flag='online';
//         $class='btn-success';
//     }
//     echo $row['name']."<button type='button' class='$class'>".$flag."</button>";
//     //echo ;
// }


// $result=$obj->find('m_regform',$col_list,$where_con);
// $no_of_record=$obj->get_num_rows();
// echo "no or recoreds:$no_of_record";


// for($i=0;$i<$no_of_record;$i++){
//     $record_data=$obj->get_row($i);
//     $flag='offline';
//     $class='btn-danger';
    // if($record_data[1]=='Unnati'){
    //     $flag='online';
    //     $class='btn-success';
    // }
//     echo " <h4>$record_data[1]</h4>";
//     echo "<button type='button' class='$class'>".$flag."</button>";

// }
echo "</div></div></div></div>";
?>


</body>
</html>
