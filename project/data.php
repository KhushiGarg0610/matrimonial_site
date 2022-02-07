<?php 
session_start();
ob_start();

require_once("mylibr.php");
$obj=new lib();

if(isset($_REQUEST['approvel_action'])){
	$action=$_REQUEST['approvel_action'];
	if($action==1){
		$col_list['pic_status']=1;
		$id=$_REQUEST['image'];
		$where_con="Auto_id='$id'";
		$status=$obj->update('m_user_images',$col_list,$where_con);
		if($status){
			header('location:img_approve.php');
		}
		else{
			echo "error";
		}
	}
	else {
		$col_list['pic_status']=-1;
		$id=$_REQUEST['image'];
		$where_con="Auto_id='$id'";
		$status=$obj->update('m_user_images',$col_list,$where_con);
		if($status){
			header('location:img_approve.php');
		}
		else{
			echo "error";
		}
	}

}
//gallery start
else if(isset($_REQUEST['image_action'])){
	$action=$_REQUEST['image_action'];
	if($action==1){
		$image_path=$_REQUEST['image'];
		$id=$_SESSION['pid'];
		$col_list['profile_image']=$image_path;
		$where_con="id=$id";
		$status=$obj->update('m_regform',$col_list,$where_con);
		if($status){
			$_SESSION['dp']=$image_path;
			header('location:profile_demo_page.php?msg=5');
		}
		else header('location:profile_demo_page.php?msg=4');
	}
	else if($action){
		$image_path=$_REQUEST['image'];
		$where="Image_url='$image_path'";
		$col_list='Auto_id';
		$status=$obj->find('m_user_images',$col_list,$where);
		$no=$obj->get_num_rows();
		echo"$no";
		$data=$obj->get_data();
		$id=$_SESSION['pid'];
		$where_con="Auto_id='$data[0]'";
		$status=$obj->delete('m_user_images',$where_con);
		// Use unlink() function to delete a file
		if (!unlink($image_path)) {
			header('location:profile_demo_page.php?msg=2');
		}
		else {
			header('location:profile_demo_page.php?msg=1');
		}
	}
}

else if(isset($_POST['upload_pic'])){
$file=$_FILES['pic'];
// echo "file=$file";
$directory='images/user';
$col_name='Image_url';
$id=$_SESSION['pid'];
$where_con="id=$id";
$col_list['Profile_id']=$_SESSION['pid'];
echo "<br>col_list=$col_list";
$file_where_con="Auto_id";
$insert_status=$obj->insert_data('m_user_images',$col_list,$file,$directory,$col_name,$file_where_con);
if($insert_status){
	$col_list='profile_image';
 	$check=$obj->find('m_regform',$col_list,$where_con);
	$data=$obj->get_num_rows();

if($data>0){
$data_value=$obj->get_data();
echo"$data_value[0]";
if($data_value[0]=='images/female.png'||$data_value[0]=='images/male.png')
{	$name=$obj->file_path[0];
	$col_list=array('profile_image'=>$name);
	$where_con="id=$id";
	$update_status=$obj->update('m_regform',$col_list,$where_con);
	$_SESSION['dp']=$name;
}
else{}


}
else{}
header("location:profile_demo_page.php?msg=1");
}



}
//gallery ends


else if (isset($_REQUEST['rec_id'])) {
echo "new request";
$request_to=$_REQUEST['rec_id'];
echo "$request_to";
$request_from=$_SESSION['pid'];
echo "<br/>request from=$request_from ";
$page_no=$_REQUEST['pageno'];
echo "$page_no";
$col_list=array('request_from' =>$request_from ,'request_to' =>$request_to  );
$status=$obj->insert_data('m_request',$col_list);
if ($status) {
	header("location:srch.php?pageno=$page_no&rto=$request_to");
}else{
	echo "errror";
}



}
else if (isset($_POST['submit'])) {
$email=$_POST['email'];
$password=$_POST['password'];

//$encrypt_password=base64_encode($password);
$encrypt_password=$obj->my_encode($password);

$category=$_POST['category'];
$name=$_POST['name'];
$dob=$_POST['dob'];
//$code=$_POST['cntcode'];
//echo "country code = $code";
$result=$obj->age_cal($dob);
 //echo "result=$result";
 $age=$result;
if($result>=18){


$mobileno=$_POST['mobileno'];
$gender=$_POST['gender'];
$profile_image="images/".$gender.".png";
$col_list=array("email" => $email,"password" => $encrypt_password,"category" => $category,"name" => $name,"dob" => $dob,"mobileno" => $mobileno,"gender" => $gender,"profile_image" => $profile_image,"age_in_y" => $age);
//$status=$obj->insert('regform',$col_list);
$status=$obj->insert_data('m_regform',$col_list,'email',true);


if($status){
	echo " saved";
	//header("Location:demo2.php");

	 $_SESSION['msg']="<h3>Verification link has been send to your email,Please click on this link to active your account</h3>";
	
	$id=$obj->get_autoid();
	// echo "$id";
	$temp=base64_encode($id);
	// echo "<br>";
	// echo "$temp";
	$col_list['temp']=$temp;
	$where_con="id=$id";
	$status=$obj->update('m_regform',$col_list,$where_con);
	if($status){

	
	// echo "<br>update_status=$status";
	$url="active.php?id=$temp";
	header("location:index.php?msg=1");
//	echo "<br>url=$url";
	}
	else{
		echo"activation link error";
	}
}

else {




	$_SESSION['ERROR_MSG']=$obj->get_error();
// echo $_SESSION['ERROR_MSG'];
 header("Location:".ERRORPAGE);
//	echo "ERROR PAGE=".ERRORPAGE;
}

}
else{
	$_SESSION['ERROR_MSG']=$obj->get_error();
// echo $_SESSION['ERROR_MSG'];
 header("Location:".ERRORPAGE);
}
}


else if(isset($_POST['login'])){
	 

$login_id=$where_info['email']=$_POST['login_id'];
$login_id=$where_info['id']=$_POST['login_id'];
$user_info['password']=$_POST['login_password'];
$user_info['status']=1234;
$return_col_name="id";

//$status=$obj->login('regform',$user_info);
$status=$obj->login('m_regform',$user_info,$where_info,$return_col_name);
if($status!=""){
	// echo "ok in calling ";
	$_SESSION['pid']=$status;

	$pid=$_SESSION['pid'];
	  echo "pid=$pid";
	 $c_list['login_id']=$pid;
	 $c_list['login_time']=date('Y-m-d H:i:s');

	$result=$obj->insert_data("m_log_info",$c_list);
	// echo "result=$result";
	if ($result) {
		 // echo "ok";
		header("Location:profile.php");
	}
	// header("Location:profile.php");
} 
else{
	//echo " error in calling".
	 $error=$obj->get_error_num();
	// echo "error".$error;
//	  $error=$obj->get_error_msg();
  
	 // $_SESSION['error']=$obj->get_error();
	 // $error=$_SESSION['error'];
	 // header("Location:index.php");
	  // echo "error :$error";
	 header("Location:index.php?login_id=$login_id&error_no=$error");

}


}

else if(isset($_POST['contact_us_sub'])){
	$email=$_POST['email'];
	$name=$_POST['name'];
	$mobileno=$_POST['mobileno'];
	$message=$_POST['message'];
	// echo "$email,$name,$mobileno,$message";
	$col_list= array('email' =>$email,'name' =>$name,'mobileno' =>$mobileno,'message' =>$message);
	$status=$obj->insert_data('m_contact_us',$col_list);
	// echo "status=$status";
	if($status){
		echo "Saved";
		
	}
	else
	{
		// $error=$obj->get_error();
		// echo "error=$error";
		$_SESSION['ERROR_MSG']=$obj->get_error();
 // echo "Error=".$_SESSION['ERROR_MSG'];
  header("Location:".ERRORPAGE);
	}
}

else if(isset($_POST['reg_submit'])){
	$height=$_POST['height'];
	$color=$_POST['color'];
	$marital_status=$_POST['marital_status'];
	$mother_tongue=$_POST['mothertounge'];
	$weight=$_POST['weight'];
	$hometown=$_POST['hometown'];
	$food=$_POST['food'];
	$surname=$_POST['surname'];
	$religion=$_POST['religion'];
	$zodiac=$_POST['zodiac'];
	$edu=$_POST['edu'];
	$profession=$_POST['profession'];
	$income=$_POST['income'];
	$id=$_SESSION['pid'];
	$where_con="email='$id' or id='$id'";
	// echo "wherecon: '$where_con'";
	
	$col_list=array("height"=>$height,"color"=>$color,"marital_status"=>$marital_status,"mother_tongue"=>$mother_tongue,"weight"=>$weight,"hometown"=>$hometown,"food"=>$food,"surname"=>$surname,"religion"=>$religion,"zodiac"=>$zodiac,"education"=>$edu,"profession"=>$profession,"income"=>$income);
	print_r($col_list);
	$status=$obj->update('m_regform',$col_list,$where_con);
	if($status){
	//	$url="active.php?id=$temp";
	header("location:profile.php");
	//echo "true";
	}
	else {
		header("Location:".ERRORPAGE);
	}
}

else if(isset($_REQUEST['request_id'])){
	$request_id=$_REQUEST['request_id'];
	$new_status=$_REQUEST['c'];
	$where_con="id=$request_id";
	$col_list['status']=$new_status;
	$status=$obj->update('m_request',$col_list,$where_con);
	if ($status) {
			if($status==true && $new_status==1)
			{
				// echo "case 1";
				$uid=$_REQUEST['uid'];
				$where_con="id=$uid";
				$sql=$obj->find('m_regform','view_count',$where_con);
				$number=$obj->get_num_rows($sql);
				// echo "num=$number";
				if($number>0){
				$data=$obj->get_data();
				// print_r($data);
				// exit();
				if($data[0]>0){
					$num=$data[0];
					$num--;
					$col_list['view_count']=$num;
					$status=$obj->update('m_regform',$col_list,$where_con);
					if($status)
					header("location:request.php");
					else
					header("location:".ERRORPAGE."?ERR=105");
					//$data1=$obj->get_data();
       				//$_SESSION['count_value']=$data1;
        			//$data_val=$_SESSION['count_value'];
				}
			 }
			}
			else
			{
		 header("location:request.php");
			}
		}
	  else {
		echo "Error";
				 header("location:".ERRORPAGE);
	  }
}

else if(isset($_POST['requested'])){
	echo "testing";
}

else if (isset($_POST['undo'])){
	echo "testing";
// 	$request_id=$_SESSION['pid'];
// 	$request_of=$_REQUEST['delete_id'];
// //	echo "rec=$request_of<hr/>";
// 	//echo 
// 	//exit;
// //	echo "request id $request_id<hr/>";
// 	$where_con="request_from='$request_of' AND request_to='$request_id'";
// //	echo "where : $where_con</hr>";

// 	$col_list['status']=-1;
// 	$status=$obj->delete('request',$where_con);
// 		if($status){
// 			header("location:request.php");
// 				}
// 	  else{
// 		echo "Error";
// 	  }
}

else if(isset($_POST['add_ref'])){
	$num1;
	$ref_mail=$_POST['ref_mail'];
	$pid=$_SESSION['pid'];
	$where_con="email='$ref_mail'";
	$query=$obj->find('m_regform','email',$where_con);
	if($query){
		$num=$obj->get_num_rows();
		if($num>0){
			header("location: add_refrence.php?act=-1");
		}else{
			$col_list=array("profile_id"=>$pid,"add_ref"=>$ref_mail);
			// print_r($col_list);
			$primary_col="add_ref";
			$result=$obj->unique_insert('m_refrence',$col_list,$primary_col,true);
			// exit();
			if($result==1)
			header("location: add_refrence.php?act=1");
			else 
			header("location: add_refrence.php?act=0");
			echo "result=$result<br/>";
		}
		
	}else {
		echo "error";
	}
}

else {
	$_SESSION['ERROR_MSG']=$obj->get_error();
//echo $_SESSION['ERROR_MSG'];
	header("Location:".ERRORPAGE);
//	echo "ERROR PAGE=".ERRORPAGE;
}



?>