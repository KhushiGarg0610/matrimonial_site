<!DOCTYPE html>
<html>
<head>
	<title>dynamic config</title>
    <?php include("linkfile.php");?>
</head>
<body style="background-color: darkgray;">
<div class="container-fluid">
	<?php
	 $con1=mysqli_connect("localhost","root","","information_schema"); /*for offline*/
   //$con1=mysqli_connect("sql301.ezyro.com","ezyro_28440259","3mfn7bs7n","ezyro_28440259_Modal"); /*for online*/
	 if($con1){
		// echo "connected";
	 }else {
		// echo "error";
	 }


	if(isset($_POST['submit'])){
	$server=$_POST['SERVER'];
	$db_user=$_POST['DB_USERID'];
	$db_password=$_POST['DB_PASSWORD'];
	$db_database=$_POST['DATABASE'];
	$project_name=$_POST['PROJECT_NAME'];
	$subtitle=$_POST['SUBTITLE'];
	$theme=$_POST['TEMPLATE'];
	$error=$_POST['ERRORPAGE'];

	// echo "$server";
	// echo "$db_user";
	// echo "$db_password";
	// echo "$db_database";

	 $f1=fopen("config.php","w");
	// fwrite($f1,"hello");
	
 	fwrite($f1, "<?php
 			define('SERVER','$server');
 			define('DB_USERID','$db_user');
 			define('DB_PASSWORD','$db_password');
 			define('DATABASE','$db_database');
			define('PROJECT_TITLE','$project_name');
			define('PROJECT_SUBTITLE','$subtitle');
			define('THEME','$theme');
			define('ERRORPAGE','$error');
 			?>");
 fclose($f1);
		
		 $query[0]="CREATE DATABASE $db_database";
		$query[1]="Use $db_database";
		$query[2]="CREATE TABLE IF NOT EXISTS `user` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`email` varchar(30) DEFAULT NULL,
			`password` varchar(20) NOT NULL,
			`category` varchar(20) NOT NULL,
			`name` varchar(30) NOT NULL,			
			`otp` varchar(5) DEFAULT NULL,
			`status` varchar(2) NOT NULL DEFAULT '0',
			`temp` varchar(1000) DEFAULT NULL,
			`usertype` varchar(10) NOT NULL,
			PRIMARY KEY (`id`)
		  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

		  ";
		  $query[3]="CREATE TABLE `m_regform` (
  `id` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `category` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `height` varchar(20) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `mother_tongue` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `mobileno` varchar(50) NOT NULL,
  `otp` varchar(5) DEFAULT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0',
  `temp` varchar(1000) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `zodiac` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `income` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL DEFAULT 'male',
  `profile_image` varchar(100) NOT NULL DEFAULT 'images/female.png',
  `view_count` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";
	$query[4]="CREATE TABLE `m_user_images` (
  `Auto_id` int(11) NOT NULL,
  `Profile_id` int(255) NOT NULL,
  `Image_url` varchar(500) NOT NULL,
  `pic_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
";
	$query[5]="CREATE TABLE `m_request` (
  `id` int(11) NOT NULL,
  `request_from` varchar(200) NOT NULL,
  `request_to` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `request_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	
	$query[6]="CREATE TABLE `m_refrence` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `add_ref` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";		
	$query[7]="CREATE TABLE `m_log_info` (
  `id` int(11) NOT NULL,
  `login_id` varchar(1000) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `log_out` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

	$query[8]="CREATE TABLE `m_contact_us` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

	$query[9]="CREATE TABLE `m_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
"; 
		  for($i=0;$i<count($query);$i++){
		    echo "query=$query[$i]<hr/>";
			mysqli_query($con1,$query[$i]);
		  }
		  header("location:index.php");


}
else

{
?>
<div class="row ">
<div class="col-md-offset-4 col-md-4">
<form method="POST" action="installed.php">
    <div class="row col-md-12"><h1 style="font-weight: bold;text-align: center;">Config File</h1></div>
    <div class="form-group row">
    <label class="col-md-4">SERVER</label>
    <div class="col-md-8">
    	<input type="text" name="SERVER"  class="form-control"></div></div>

	<div class="form-group row">
    <label class="col-md-4"> DB_USERID </label>
    <div class="col-md-8"><input type="text" name="DB_USERID" class="form-control"></div></div>
	
    <div class="form-group row">
    <label class="col-md-4">DB_PASSWORD</label>
    <div class="col-md-8"><input type="text" name="DB_PASSWORD" class="form-control"></div></div>
	<div class="form-group row">
    <label class="col-md-4">DATABASE  </label>
    <div class="col-md-8">   <input type="text" name="DATABASE" class="form-control"></div></div>
	<div class="form-group row">
    <label class="col-md-4">PROJECT_NAME </label>
    <div class="col-md-8"><input type="text" name="PROJECT_NAME" class="form-control"></div></div>
	  
    <div class="form-group row">
    <label class="col-md-4">SUBTITLE </label>
    <div class="col-md-8"><input type="text" name="SUBTITLE" class="form-control"></div></div>
	<div class="form-group row">
    <label class="col-md-4">ERRORPAGE</label>
    <div class="col-md-8">
    <input type="text" name="ERRORPAGE" class="form-control"></div></div>
	
	<div class="form-group row">
    <label class="col-md-4">TEMPLATE </label>
    <div class="col-md-8">
    <select name="TEMPLATE"  class="form-control">
    <?php
    $options = array(" ","Primary", "Secondary", "Warning", "Dark");
        foreach($options as $item){
            echo "<option value='$item'>$item</option>";
        }
        ?>    
   		</select>	</div></div>
    <div class="form-group row">
    <div class="col-md-12"><input type="submit" name="submit" value="Submit" class="btn2"></div></div>

</form>
</div>
</div>
<?php
}
?>
</div>
</body>
</html>