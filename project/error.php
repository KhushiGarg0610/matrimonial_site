<?php
session_start();
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
  require_once("mylibr.php");
	include ("header.php");
 
echo "<div class='row'>";
echo "<div class='col-md-12'>";

$msg=$_SESSION['ERROR_MSG'];
echo "<b>Error:</b>$msg";


echo "</div>";

echo "</div>";
	
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