<!DOCTYPE html>
<html>
<head>
  <?php
include ("linkfile.php");
  ?>
</head>
<body>
<div class='container-fluid'>
<?php
  session_start();
  ob_start();
   require_once('mylibr.php');
  $obj=new lib();
  // echo "";
  include ("header.php");
 

if (isset($_POST['new_pass_submit'])) {
  $new_password=$_POST['password'];
  $encrypt_pass=$obj->my_encode($new_password);
  // echo "new_password";
  $col_list['password']=$encrypt_pass;
  $where_con= $_SESSION['where_con'];
  $result=$obj->update('m_regform',$col_list,$where_con);
    if ($result) {
      echo "
      <h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>
      Successfully saved</h3>";
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
      
     <div class='row'>
  <div class='col-md-12'>
  <div class='bg-img2'>
    <form id='form1' action='forget1.php' class='container' method='post'>
    <h1 style='font-weight: bold;'>Password</h1>
      <label>Enter New Password</label>
        <input type='password' name='password' class='form-control'>
    <label>Re-Type Password</label>
        <input type='password' name='re_password' class='form-control'>
    <input type='submit' name='new_pass_submit' class='btn2' >
   </form>
    </div>
  </div></div>
      ";

  }
  else
  echo "
<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>
ERROR : Enter OTP value is incorrect</h3>";
}


else if (isset($_POST['forget_pass'])) {
  $user_input=$_POST['user_input'];
  $col_list="id,email";
  $where_con="email='$user_input' or id='$user_input'";
  $_SESSION['where_con']=$where_con;

  // echo "$user_input";exit();
  $result=$obj->find('m_regform',$col_list,$where_con);
  if ($result) {
     $num=$obj->get_num_rows();
     // echo "num=$num";
     if ($num==0) {
       echo "<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>ERROR : Enter email/id/mobile no. is not found</h3>";
     }
    // exit();
    //echo "done";
     else if($num>0){
    $rand_num=rand(11111,99999);
    //echo "$rand_num";
    $c_list['otp']=$rand_num;
    $result=$obj->update('m_regform',$c_list,$where_con);
    if ($result) {
      //echo "done done";
      $url="your otp value is $rand_num which is send to your email";
      echo "$url";
      echo"
      <div class='row'>
  <div class='col-md-12'>
  <div class='bg-img2'>
      <form action='forget1.php' class='container' method='post'>
      <h1 style='font-weight: bold;'>Enter OTP</h1>
     <label><b>OTP</b></label>
  <input type='text' name='otp_value' class='form-control'>
        <input type='hidden' name='db_otp_value' class='form-control' value='$rand_num'>
    <input type='submit' name='otp_check' class='btn2' >
      </form>
      </div>
      </div></div>
      ";
    }
    else{
      echo "<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>ERROR : otp is not send to your email</h3>";
    }
  }
  }
  else{
    echo "<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>ERROR : Enter email/id/mobile no. is not found</h3>";
  }
}
else{
echo"

  <div class='row'>
  <div class='col-md-12'>
  <div class='bg-img2'>
    <form id='form1' action='forget1.php' class='container' method='post'>
    <h1 style='font-weight: bold;'>Forget Password</h1>
     <label for='email'><b>Email</b></label>
      <input type='text' name='user_input' class='form-control' placeholder='Enter email...' required>
      <input type='submit' name='forget_pass' class='btn2' value='Submit'>
    </form>
  </div></div></div>
";

}

echo"<br>";
  include("addwindow.php");

echo "</div>";
?>


<?php
  include("footer.php");
  // echo "</div>";
?>
</div>

<script src="assets/js/jquery-1.7.1.min.js"></script> 
<script src="assets/js/jquery.validate.js"></script>
<script>
  $(document).ready(function(){
  $('#form1').validate({
        rules: {

          user_input:{
            required: true,
            email: true
          },
          

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
            // equalTo: "#password"
            
         
          }
    }
      })
  })
</script>


</body>
</html>