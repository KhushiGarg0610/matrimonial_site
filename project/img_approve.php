<!DOCTYPE html>
<html>
<head>
  <title></title>
  <?php
  require_once('profile_info.php');
//   require_once('freq.php');
  include ("linkfile.php");
  ?>
</head>
<body>
<div class="container-fluid">
  <?php
 // session_start();
  include ("header.php");
  require_once('mylibr.php');
  $obj=new lib();



  // echo "<hr>";
  //$id=$_REQUEST['id'];
   //echo "id=$id";
  //echo "<hr>";
  //$login_id=$_SESSION['pid'];
// echo "profile_id=$profile_id";

  echo "
  <div class='row'>
<div class='col-md-3'>";
include_once("profile_menu.php");
echo "
</div>
<div class='col-md-9'>

<div class='panel panel-primary'>
<div class='panel-heading'>
<h1>";
// echo "$profile_id/";
  // print_r($profile_data);
 echo "$profile_data[1]/";
  echo "$profile_data[0]";
if(!isset($_SESSION['pid'])){
  echo "<button class='btn btn-success pull-right'><a href='index.php'>Login</a></button>";
}
else{
  $profile_id=$_SESSION['pid'];
//   echo "<button class='btn btn-danger pull-right'>
 //  <a href='logout.php' style='text-decoration: none;color: white'>$profile_data[0] Logout</a></button>";
 }

echo"</h1>
</div>


<div class='panel-body'>
<table class='table'>
<tr><th>Profile id</th><th>Image</th><th>Approve con.</th></tr>";
$col_list="Auto_id,Profile_id,Image_url";
$where_con="pic_status='0'";
$query=$obj->search('m_user_images',$col_list,$where_con,10,0,'img_approve.php');
// echo "status=$query";
$no_of_record=$obj->get_num_rows();
echo "<br>num=$no_of_record";
for($i=0;$i<$no_of_record;$i++){
     // echo "<div class='row'>";
     $data=$obj->get_row($i);
     // print_r($data);
     // echo "<hr>";
     echo "<tr><td>$data[1]</td>
     <td><img src='$data[2]' width='100px' height='100px' class='img-circle'/></td>
     <td><button class='btn btn-info' name='accept' > 
     <a href='data.php?image=$data[0]&approvel_action=1' style='color:white;font-size:12px;'>Approved </a>
     </button>
     <button class='btn btn-danger' name='delete'>
    <a href='data.php?image=$data[0]&approvel_action=-1' style='color:white;font-size:12px;'> Decline</a>
    </button>
  </td></tr>";
   }




echo"
</table>




</div>
</div></div></div>
";

// print_r($profile_data);
/*
echo "
<h3><a href='registration_form.php'>Complete Your Profile</a></h3>
</div>
</div>
</div>

</div>



</div>
<div class='col-md-4'>

<div class='panel panel-primary'>
<div class='panel-heading'>
<h3>Friend Request</h3>
</div>
<div class='panel-body'>
<div style='border-style: ridge;border-color: sky-blue;'>
<div class='row'><div class='col-md-offset-1 col-md-10'>


<h4>Name : $pro_data[0]</h4>
<h4>DOB : $pro_data[1]</h4>
<h4>Location : $pro_data[2]</h4>
<form action='data.php' method='POST'>
<button class='btn btn-success' name='accept'>Accept</button>
<button class='btn btn-danger' name='delete'>Delete</button>
</form>
<br>

</div></div></div>
</div></div>
</div>

</div>
";
*/



  echo "<div class='row'>";
  include ("addwindow.php");
  echo "</div>";

 
  include ("footer.php");


  
  ?>

</div>
</body>
</html>