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
  require_once("mylibr.php");
	include ("header.php");
  $connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}

	
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