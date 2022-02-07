<?php
    session_start();
    ob_start();
    require_once("mylibr.php");
    $obj=new lib();
?>
<html>
<head>
      <?php include ("linkfile.php");?>
</head>
<body>
<?php
echo "
<div class='container-fluid'>
  <div class='row'><div class='col-md-12'>
<div class='bg-img'>
  <form action='admin_login.php' class='container' method='post'>
    <h1 style='font-weight: bold;'>Admin Login</h1>

    <label for='email'><b>Email</b></label>
    ";
   // if(!isset($_REQUEST['login_id']))
    echo"
    <input type='text' class='form-control' placeholder='Enter Email/Mobile No..' name='login_id' required >";

    //   echo"
    // <input type='hid' class='form-control' value='' name='login_id'><br>";
     echo"

    <label for='psw'><b>Password</b></label>
    <input type='password' class='form-control' placeholder='Enter Password...' name='login_password' required >

    <label><input type='checkbox'> Remember me</label>

    <button type='submit' class='btn2' name='login'>Login</button>
 
  </form>
</div></div></div></div>
<br>
";

if(isset($_POST['login'])){
 // echo "testing";
  // $login_id=$_POST['login_id'];
  // echo "<br/>login id=$login_id";
  $login_id=$where_info['email']=$_POST['login_id'];
  $where_info['id']=$_POST['login_id'];

  $user_info['password']=$_POST['login_password'];
  $user_info['status']=1234;
 // $where_info="email='$login_id'or id='$login_id'";

// print_r($where_info);
// echo "<br>";
// print_r($user_info);

$status=$obj->login('m_admin',$user_info,$where_info);
//echo "<br/>status:$status";

if($status){
	echo "</br>ok in calling ";
  header("location:installed.php");
} 
else{
//	echo " ";
    $error=$obj->get_error_num();
	
  if($error==101){
echo "<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>
  $error:User not Found,Please Enter Valid Data</h3>";
  }
  else if($error==102){
  echo "<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>
  $error:Password Mismatch</h3>";
  }  
  }
}
	
//	  $error=$obj->get_error_msg();
  
	 // $_SESSION['error']=$obj->get_error();
	 // $error=$_SESSION['error'];
	 // header("Location:index.php");
	 // echo "error :$error";
	// header("Location:index.php?login_id=$login_id&error_no=$error");



?>

<!-- <div class="form-group row">
    <label class="col-md-4">Email : </label>
    <div class="col-md-8">
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email.."></div>
  </div>
  <div class="form-group row">
    <label class="col-md-4">Password : </label>
    <div class="col-md-8">
    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password..."></div>
  </div> -->
</body>
</html>