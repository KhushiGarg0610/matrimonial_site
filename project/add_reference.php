<?php
  ob_start();
 
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
   include("profile_info.php"); 
  require_once("mylibr.php");
	include ("header.php");
  $connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}

if(isset($_REQUEST['act'])){
$act_value=$_REQUEST['act'];
if($act_value==1)  
echo"refrence as successfully <br/>";
else if($act_value==-1)
echo"email already registered <br/>";
else if($act_value==0)
echo"email already added <br/>";
}
echo"<div class='row'><div class='col-md-12'>";
echo "
<form method='POST' action='data.php'>
<div class='form-group row'>
<label class='col-sm-2'>Refrence Mail : </label>
<div class='col-md-8'>
<input type='email' name='ref_mail' class='form-control' id='email' placeholder='Enter your email..'></div>
</div>
<button type='submit' name='add_ref' class='btn btn-primary btn-lg'>Add Refrence</button>
</form>";
echo "</div></div>";
$col_list="add_ref,status";
$where_con="where profile_id=$profile_id";
$size=50;
$pageno=0;
$result=$obj->search('m_refrence',$col_list,$where_con,$size,$pageno,"add_refrence.php");
 $no_of_record=$obj->get_num_rows();
 echo "<br/>";
echo "<h1>$no_of_record</h1>";
echo "<table class='table table-hover'>";
for($i=0;$i<$no_of_record;$i++){
$record_data=$obj->get_row($i);
//  print_r($record_data);
//  echo"<br/>";
echo"<tr>";
echo "<td> $record_data[0]</td>";
echo "<td> $record_data[1]</td>";
echo "</tr>";
}
echo "</table>";

//if(isset($_REQUEST['pnt'])){
 //   $point=$_REQUEST['pnt'];    
//echo "point is : $point<br/>";
//}
echo "<div>
    <h2><label>Refrences Point :</label>
</div>";



	
include ("footer.php");
include ("modal.php");
?>
</div>
<script src="assets/js/jquery-1.7.1.min.js"></script> 
<script src="assets/js/jquery.validate.js"></script>
<script>  
    $(document).ready(function(){
        $('#reg_form').validate({
            rules: {
            age:{
                required: true
            },

            
            category:{
                required: true
            },

            
            mother_tongue:{
                required: true
            },

            religion:{
                required: true
            },
            }
        })
    })
</script>
</body>
</html>