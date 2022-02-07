<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
	<script src="js\jquery.min.js"></script>
	<script src="js\bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();
ob_start();
require_once('mylibr.php');
$obj=new lib();

if (isset($_POST['new_pass_submit'])) {
	$new_password=$_POST['password'];
	//echo "$new_password";
	$col_list['password']=$new_password;
	 $where_con= $_SESSION['where_con'];
	$result=$obj->update('regform',$col_list,$where_con);
	if ($result) {
		echo " successfully saved";
	}
	else{
		echo " error";
	}
}

else if (isset($_POST['otp_check'])) {
	$otp_value=$_POST['otp_value'];
	//echo "$otp_value";
	$db_otp_value=$_POST['db_otp_value'];
	//echo "$db_otp_value";
	if ($otp_value==$db_otp_value) {
		//echo "matched";
		echo"
			<div class='container'>
	<div class='row'>
		<div class='col-md-offset-4 col-md-4'>
		<form id='form1' action='forgetpass.php' method='post'>
			<br>
			<div class='form-group row'>
		<label class='col-md-4'>Enter New Password</label>
		<div class='col-md-8'>
			<input type='password' name='password' class='form-control'>
			</div>
		</div>
		<div class='form-group row'>
		<label class='col-md-4'>Re-Type Password</label>
		<div class='col-md-8'>
			<input type='password' name='re_password' class='form-control'>
			</div>
		</div>
	
	<div class='btn-group row'>
 		<div class='col-md-12'>
		<input type='submit' name='new_pass_submit' class='btn btn-info' ></div>
		</div>
	</form>
	</div>
</div></div>
			";

	}else
	echo " Enter OTP value is incorrect ,error";
}

else if (isset($_POST['forget_pass'])) {
	$user_input=$_POST['user_input'];
	$col_list="id,email";
	$where_con="email='$user_input' or id='$user_input'";
	$_SESSION['where_con']=$where_con;

	// echo "$user_input";
	$result=$obj->find('regform',$col_list,$where_con);
	if ($result) {
		//echo "done";
		$rand_num=rand(11111,99999);
		//echo "$rand_num";
		$c_list['otp']=$rand_num;
		$result=$obj->update('regform',$c_list,$where_con);
		if ($result) {
			//echo "done done";
			$url="your otp value is $rand_num which is send to your email";
			echo "$url";
			echo"
			<div class='container'>
	<div class='row'>
		<div class='col-md-offset-4 col-md-4'>
		<form action='forgetpass.php' method='post'>

			<div class='form-group row'>
		<label class='col-md-4'>Enter OTP</label>
		<div class='col-md-8'>
			<input type='text' name='otp_value' class='form-control'>
			<input type='hidden' name='db_otp_value' class='form-control' value='$rand_num'></div>
		</div>
	
	<div class='btn-group row'>
 		<div class='col-md-12'>
		<input type='submit' name='otp_check' class='btn btn-info' ></div>
		</div>
	</form>
	</div>
</div></div>
			";
		}
		else{
			echo "error";
		}
	}
	else{
		echo "error";
	}
}
else{
echo"
<div class='container'>
	<div class='row'>
		<div class='col-md-offset-4 col-md-4'>
			<h2 style='text-align: center;font-weight: bold'>FORGET PASSWORD</h2><br>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-offset-4 col-md-4'>
		<form action='forgetpass.php' method='post'>

			<div class='form-group row'>
		<label class='col-md-4'>Enter Email</label>
		<div class='col-md-8'>
			<input type='text' name='user_input' class='form-control'></div>
		</div>
	
	<div class='btn-group row'>
 		<div class='col-md-12'>
		<input type='submit' name='forget_pass' class='btn btn-info' ></div>
		</div>
	</form>
	</div>
</div>";



echo "</div>";
}
?>


<script src="assets/js/jquery-1.7.1.min.js"></script> 
<script src="assets/js/jquery.validate.js"></script>
<script>
  $(document).ready(function(){
	$('#form1').validate({
        rules: {
          

          password:{
            required: true,
            minlength: 6,
            maxlength: 6
          },
          re_password:
          {
          	required: true,
          	 minlength: 6,
            maxlength: 6,
            equalTo: "#password"
            
         
          }
		}
      })
  })
</script>
</body>
</html>