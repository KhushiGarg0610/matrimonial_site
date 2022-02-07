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
echo "
  <div class='row'>
<div class='col-md-3'>";
include_once("profile_menu.php");
echo "</div>
<div class='col-md-9'>
<div class='panel panel-primary'>
<div class='panel-heading'><h1>Add Reference</h1></div>";

echo "<div class='panel-body'>";
if(isset($_REQUEST['act'])){
$act_value=$_REQUEST['act'];
if($act_value==1)  
echo"refrence add successfully <br/>";
else if($act_value==-1)
echo"email already registered <br/>";
else if($act_value==0)
echo"email already added <br/>";
}
echo"<div class='row'><div class='col-md-12'><br>";
echo"
<form method='POST' action='data.php' id='ref_table'>
<div class='form-group row'>
<label class='col-md-offset-1 col-md-3'><b> Enter Refrence Mail :</b> </label>
<div class='col-md-7'>
<input type='text' name='ref_mail' class='form-control' id='email' placeholder='Enter Refrence Mail...'></div>
</div>
<div class='btn-group-row'>
<div class='col-md-11'>
<button type='submit' name='add_ref' class='btn btn-success pull-right'>Add Refrence</button>
</div></div>
</form>";
echo "</div></div>";
$col_list="add_ref,status";
$where_con="profile_id=$profile_id";
$size=50;
$pageno=0;
$result=$obj->search('m_refrence',$col_list,$where_con,$size,$pageno,"add_refrence.php");
 $no_of_record=$obj->get_num_rows();
  echo "<hr>";

// echo "<h1>$no_of_record</h1>";
echo"<div class='row'><div class='col-md-offset-1 col-md-10'>";
echo "<table class='table table-hover'>";
echo"<tr class='info'><th> Refrences id</th><th> Status</th></tr>";
for($i=0;$i<$no_of_record;$i++){
$record_data=$obj->get_row($i);
  // print_r($record_data);
//  echo"<br/>";


echo "<tr><td> $record_data[0]</td><td> $record_data[1]</td></tr>";

}
echo "</table></div></div>";

//if(isset($_REQUEST['pnt'])){
 //   $point=$_REQUEST['pnt'];    
//echo "point is : $point<br/>";
//}
// echo "<div>
//     <h2><label>Refrences Point :</label>
// </div>";

echo "</div></div></div></div>";

	
include ("footer.php");

?>
</div>
<script src="assets/js/jquery-1.7.1.min.js"></script> 
<script src="assets/js/jquery.validate.js"></script>
<script>  
    $(document).ready(function(){
        $('#ref_table').validate({
            rules: {
            ref_mail:{
                required: true,
                email: true
            },

            
            }
        })
    })
</script>
</body>
</html>