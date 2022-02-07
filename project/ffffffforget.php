<html>
<head>
<script src="assets/js/jquery-1.7.1.min.js"></script> 

<script src="assets/js/jquery.validate.js"></script>
<?php
  //ob_start();
  include ("linkfile.php");
  ?>
</head>

<body>



<?php
session_start();
ob_start();
 ?>

<div class="container-fluid">
	<?php
  require_once("mylibr.php");
  $obj=new lib();
	include ("header.php");
  $connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}

//   if (isset($_REQUEST['error_no'])) {
//     $error_no=$_REQUEST['error_no'];
//     $obj=new lib();
//     $err_msg=$obj->get_error_msg($error_no);
//     echo "<b>Error:$err_msg</b>";
//     if(isset($_REQUEST['login_id']))
//       $login_id=$_REQUEST['login_id'];
//   }
if(isset($_POST['update_pass'])){
        echo "update ";
        $new_pass=$_POST['re_password'];
        $col_list['password']=$new_pass;
    
        $where_con= $_SESSION['where_con'];
        $result=$obj->update('regform',$col_list,$where_con);
        if($result){
            echo "changed";
          //  header("location:demo2.php");////doesnot  take to another page
            header('location:index.php');
           // header(Location:'demo2.php');
        
        }
        else{
            echo "error";
        } 
    }
else if(isset($_POST['otp_check'])){
        $user_otp_value=$_POST['otp_value'];
        echo $user_otp_value;
        $db_otp_value=$_POST['db_otp_value'];
        echo $db_otp_value;
        if($user_otp_value==$db_otp_value){
            ?>
                 <form method="POST" action="forget.php">
                 <label>New Password</label>
                 <input type="password" name="password" class="form-control">
                 <label>cinform password</label>
                 <input type="password" name="re_password" class="form-control">
                 <input type="submit" name="update_pass" class="btn2">
             <?php 
        }
        else {
            echo "unmatched";
            header('Location:forget.php');
        }
        
    }
    
else if(isset($_POST['forget'])){ 
    echo "forget";
    $user_input=$_POST['user_input']; 
    $col_list="id,email";
    $where_con="email='$user_input' or id='$user_input'";//session 
    $_SESSION['where_con']=$where_con;

    $result=$obj->find('regform',$col_list,$where_con);

    if($result){
        $num=$obj->get_num_rows();
        echo $num;
        //echo "done";
        if($num==1){
            $rnum=rand(11111,99999);
           $col_list['otp']=$rnum;
           // echo "$rnum";
            $res=$obj->update('regform',$col_list, $where_con);
            //khushi
            if($res){
                $url="generate email link with otp value $rnum and send to email";
 echo "$url";
echo "<form action='forget.php' method='post'> 
OTP:
 <input type='text' name='otp_value'>
 <input type='hidden' name='db_otp_value' value='$rnum' >
 <input type='submit' name='otp_check'></form>";
 //"kamal"


            }else{
                $err=$obj->get_error();
                echo $err;
            }
         

        }
        else{
    //      $x="Email not registered";

          echo '<script type="text/javascript">';
          echo ' alert("Email not registered")';  //not showing an alert box.
      //    echo 'window.location.href = "index.php"';
          echo '</script>';
          // echo "<script  type='text/javascript'>alert('$x');</script>"; /////not working
           header("location:index.php");

           
        }
    }
    else {
        $err=$obj->get_error();
        echo $err;
        //echo "error";
    }

}
else {
echo "
  <div class='row'><div class='col-md-12'>
<div class='bg-img'>
  <form action='forget.php' class='container' method='post'>
    <h1 style='font-weight: bold;'>Forget Password</h1>

    <label for='email'><b>Email</b></label>
    <input type='text' class='form-control' placeholder='Enter Email/Mobile No..' name='user_input' required >
   
    <input type='submit' name='forget' class='btn2' value='Submit'>
    </form>
    </div></div></div>
    <br>";
} 
   































// //require('mylibr.php');
// $obj=new lib();
// if(isset($_POST['update_pass'])){
//     echo "update ";
//     $new_pass=$_POST['re_password'];
//     $col_list['password']=$new_pass;

//     $where_con= $_SESSION['where_con'];
//     $result=$obj->update('regform',$col_list,$where_con);
//     if($result){
//         echo "changed";
//         header("location:demo2.php");////doesnot  take to another page
//         //header(location:'demo2.php');
//        // header(Location:'demo2.php');
    
//     }
//     else{
//         echo "error";
//     } 
// }
// else if(isset($_POST['otp_check'])){
//     $user_otp_value=$_POST['otp_value'];
//     echo $user_otp_value;
//     $db_otp_value=$_POST['db_otp_value'];
//     echo $db_otp_value;
//     if($user_otp_value==$db_otp_value){
        // 
         // <form method="POST" action="forget.php">
        //     <label>New Password</label>
        //     <input type="password" name="password">
        //     <label>cinform password</label>
        //     <input type="password" name="re_password">
        //     <input type="submit" name="update_pass"> -->
        // 
//     }
//     else {
//         echo "unmatched";
//     }
    
// }

// else if(isset($_POST['forget'])){ 
//     $user_input=$_POST['user_input']; 
//     $where_con="email='$user_input' or id='$user_input'";//session 
//     $_SESSION['where_con']=$where_con;

//     $result=$obj->find('regform','*',$where_con);

//     if($result){
//         $num=$obj->get_num_rows();
//         echo $num;
//         //echo "done";
//         if($num==1){
//             $rnum=rand(11111,99999);
//            $col_list['otp']=$rnum;
//            // echo "$rnum";
//             $res=$obj->update('regform',$col_list, $where_con);
//             //khushi
//             if($res){
//                 $url="generate email link with otp value $rnum and send to email";
//  echo "$url";
// echo "<form action='forget.php' method='post'> 
// OTP:
//  <input type='text' name='otp_value'>
//  <input type='hidden' name='db_otp_value' value='$rnum' >
//  <input type='submit' name='otp_check'></form>";
//  //"kamal"


//             }else{
//                 //echo "error";
//                 $err=$obj->get_error();
//                 echo $err;
//             }
//             //unnati

//         }
//         else{
//             echo "user not found";
//         }
//     }
//     else {
//         $err=$obj->get_error();
//         echo $err;
//         //echo "error";
//     }

// }

// else {


// ?>

<!-- // <form method="POST" action ="">
// <input type="text" name="user_input">
// <input type="submit" name="forget">
// </form> -->
// <?php
// }

// ?>

// <script>
  
//   $(document).ready(function(){

//       $('#form2').validate({
//         rules: {
//           password:{
//             required: true,
//             minlength: 6,
//             maxlength: 6
//           },

//           re_password:
//           {
//           	required: true,
//           	 minlength: 6,
//             maxlength: 6,
            
         
//           }

//         }
//       })
//   })
// </script>
// <?php
include ("footer.php");


  include ("modal.php");
  ?>
</body>
</html>