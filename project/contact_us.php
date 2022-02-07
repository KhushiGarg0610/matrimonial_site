<!DOCTYPE html>
<html>
<head>
	<?php include ("linkfile.php"); ?>
	
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
?>
	
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="well" style="background-color: #E6E6E6;padding: 20px;">
	<form id="contact_form" action="data.php" method="post">
		<div class="row"><div class="col-md-12">
			<h1 style="font-weight: bold;color: #4CAF50;">Contact us</h1>
		</div></div>
			<div class="row"><div class="col-md-12">
			<h4>Use the form below to share your questions, ideas, comments and feedback</h4>
		</div></div>
  <div class="form-group row">
  	<div class="col-md-12">
	<label>Email : </label>
	<input type="text" name="email" class="form-control" id="email" placeholder="Enter your email..">
	</div></div>
    <!-- <label>Password : </label> -->
   	<!-- <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password..."> -->
   	<div class="form-group row">
   			<div class="col-md-12">
	<label>Name : </label>
  	<input type="text" name="name" class="form-control" id="name" placeholder="Enter your name..">
  </div></div>
   
   		<div class="form-group row">
   			<div class="col-md-12">
    <label>Mobile Number : </label>
	<input type="number" name="mobileno" class="form-control" id="num" placeholder="Enter your mobile no...."></div></div>

	<div class="form-group row">
   			<div class="col-md-12">
	 <label>Message : </label>
	<textarea id="message" placeholder="Enter your message" name="message" class="form-control" rows="4"></textarea></div></div>



<button type="submit" name="contact_us_sub" class="btn2">Submit</button>
</form>
</div></div>

<!-- <div class="col-md-6">
	<?php 
	// include ("addwindow.php"); 
	?>
</div> -->
</div>
<?php
include ("footer.php");
	?>
</div>



<script src="assets/js/jquery-1.7.1.min.js"></script> 

<script src="assets/js/jquery.validate.js"></script>
<script>
  
  $(document).ready(function(){

      $('#contact_form').validate({
        rules: {
          name:{
            required: true
          },

          email:{
            required: true,
            email: true
          },

          mobileno:
          {
            required: true,
            minlength: 10,
            maxlength: 10
          },

          message:
          {
          	required: true
          }
      }
      })
  })


  
</script>

</body>
</html>