<?php
require_once("config.php");
class lib
{
	public $con="";
	public $file_path;
	public $auto_id;
	public $error;
	public $num_rows;
	public $row_data;
	public $table_name;
	public $key;
	

//public static $i;
//public $j


/*function  set_value($a,$b)
{
self::$i=$a;
$this->j=$b;

}

function get_value()
{

$temp=self::$i;
	echo "static i=".$temp;
	echo "<br/> non static j=".$this->j;
}
*/
	function __construct(){
//		self::$i=0;
//		$this->j=0;
		//echo "mylibr";
		/*$SERVER="localhost";
		$DB_USERID="root";
		$DB_PASSWORD="";
		$DATABASE="modal";*/
		$key="bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3";
		$this->con=mysqli_connect(SERVER,DB_USERID,DB_PASSWORD,DATABASE);
		if ($this->con) {
			//echo " server connected ";
			return true;
			}
		else{
			echo " disconneted ";
			return false;
			}
		}

	function excute_query($query_string){
		//$this->connection();
		if(mysqli_query($this->con,$query_string))
		{
			echo "<br>saved";
		}
		else{
			echo "error";
		}
	}

	function insert_query($table_name,$c_list,$c_value){
		//$this->connection();
		$query_string="INSERT INTO $table_name($c_list) VALUES ($c_value)";
		if(mysqli_query($this->con,$query_string))
		{
			return true;
		}
		else{
			return false;
		}
	}

	function unique_insert($table_name,$c_list,$case){
		$col_list;
		$col_value;
		$col_list=$col_value="";
		$count=count($c_list);
		$i=0;
		foreach ($c_list as $c_name => $c_value) {
			//echo "$c_name=".$c_value."<br/>";
			if($c_name=='email'){
				$temp1=$c_value;
				//echo "$temp1</br>";
			}
			if($c_name=='mobileno'){
				$temp2=$c_value;
				//echo "$temp2</br>";
			}
			$col_list .=$c_name;
			$col_value .="'".$c_value."'";	
				if($i<$count-1)
				{
					$col_list .=",";
					$col_value .=",";
				$i++;
				}
		}
		if($case){
	$where_con= "email='$temp1' or mobileno='$temp2'";
	$ct='id';
	$result=$this->find($table_name,$ct,$where_con);
$num;	
 if($result){
	$num=$this->get_num_rows();
	if($num==0)
 	{
	
		$query="INSERT INTO $table_name($col_list) VALUES($col_value)";
		insertquery($query);
	}
	 else {


	 $this->error= "user found";
	
		 return false;
	 }
}
}
else {
	$query="INSERT INTO $table_name($col_list) VALUES($col_value)";

	insertquery($query);
 }

	

	}

function insertquery($query)
{
	

	//echo "$query";
	//$this->connection();
	if(mysqli_query($this->con,$query))
	{
		$this->auto_id=mysqli_insert_id($this->con);
		return true;
	}
	else
	{$this->error=$query;
		return false;}
}

	function insert($table_name,$c_list){

		$col_list;
		$col_value;
		$col_list=$col_value="";
		$count=count($c_list);
		$i=0;
		foreach ($c_list as $c_name => $c_value) {
			//echo "$c_name=".$c_value."<br/>";
			$col_list .=$c_name;
			$col_value .="'".$c_value."'";	
				if($i<$count-1)
				{
					$col_list .=",";
					$col_value .=",";
				$i++;
				}
		}
		$query="INSERT INTO $table_name($col_list) VALUES($col_value)";
		//echo "$query";
		//$this->connection();
		if(mysqli_query($this->con,$query))
		{
			$this->auto_id=mysqli_insert_id($this->con);
			return true;
		}
		else
		return false;
	}

	function get_autoid()
	{
		return $this->auto_id;
	}

	function file_upload($file,$dir_name,$file_name)
	{
		echo "file uploading function<br/>";
		
		//echo "file info.$file";
//		print_r($file);
		$len=count($file['name']);
	echo "<br/>count=$len<br/>";	
	$status=false;
	
	if($len==1)
	{
		$fname=$file['name'];
		$temp=explode(".",$fname);
		$count=count($temp);
		$file_path=$file['tmp_name'];
		$new_path=$dir_name."/".$file_name.".".$temp[$count-1];
		if(move_uploaded_file($file_path,$new_path))
		{	
		$this->file_path[0]=$new_path;
	//	echo "file path->".$this->file_path[0];
		return true;
		}
		else
		{
			$this->error=$new_path;
		return false;
		}
	}
	else
	{		
	for($i=0;$i<$len;$i++)
	{
		echo "File no :$i<br/>";
		$fname=$file['name'][$i];
		$temp=explode(".",$fname);
		$count=count($temp);
		$file_path=$file['tmp_name'][$i];
		$new_path=$dir_name."/".$file_name."_$i.".$temp[$count-1];
		if(move_uploaded_file($file_path,$new_path))
		{	
	$status=true;
			$this->file_path[$i]=$new_path;
			//echo "uploaded file no $i-".$this->file_path[$i];

		}
		else{
			
			$status=false;
			echo "uploading error";
		}
		
	}
	return $status;
	}
	/*	$fname=$file['name'];
		$temp=explode(".",$fname);
		$count=count($temp);

		
		
		if(move_uploaded_file($file_path,$new_path))
		{	
	echo "done";
	$this->file_path=$new_path;
			return true;
		}else
		{echo "Error->".$new_path;	
			return false;
		}

		
		*/
	}

	function file_upload_update($file,$dir_name,$file_name,$table_name,$col_name,$where_col_name)
	{
		
		//echo "file uploading function<br/>";
		//echo "file info.$file";
		$fname=$file['name'];
		$temp=explode(".",$fname);
		$count=count($temp);

		$file_path=$file['tmp_name'];
		$new_path=$dir_name."/".$file_name.".".$temp[$count-1];
		
		if(move_uploaded_file($file_path,$new_path))
		{	$this->file_path=$new_path;
		//	return true;
			//update empinfo set empimage='new path value' where empid=101;
			$sql="update $table_name set $col_name='$new_path' where $where_col_name='$file_name'";
			if(mysqli_query($this->con,$sql))
					return true;
			else
			{
				$this->error=$sql;
				return false;
			}
		}
		else
		{	
			echo "new_path=$new_path";
			$this->error=$new_path;
			return false;
		}
		
//		echo "file name=$file_name<br/>";
//				echo "file path=$file_path<br/>";
	}

	/*function get_filepath($file_no)
	{
		
		return $this->file_path[$file_no];
	}*/

	function update($table_name,$col_list,$where_con)
	 {
	 	//$sql="update $table_name set empname='amit',empsalary='2000' where empid=101"
	 	$query="update $table_name set ";
	 	$update_col_value="";
	 	$i=0;
	 	$count=count($col_list);
	 	foreach ($col_list as $c_name => $c_value) {
	 		$update_col_value .=$c_name;
	 		$update_col_value .="='".$c_value."'";
	 		if ($i<$count-1) {
	 			$update_col_value .=",";
	 			$i++;
	 		}
	 	}
	 	$query .=$update_col_value." where ".$where_con;
	 	//echo "$query";exit();
	 	if (mysqli_query($this->con,$query)) {
	 		return true;

	 	}else{
	 		$this->error=$query;
	 	return false;}
	 }


	function delete($table_name,$where_con){
	 	//$sql=DELETE FROM `insertdata2` WHERE 0
	 	$query="delete from $table_name where $where_con";
	 	if (mysqli_query($this->con,$query)) {
	 		return true;
	 	}
	 	else{
	 		$this->error=$query;
	 	return false;
	 	//echo "$query";
	 	}
	 }

	 function find($table_name,$col_list,$where_con){
	 	//$sql =SELECT `id` FROM `insertdata2` WHERE 1
	 	$query="select $col_list from $table_name where $where_con";
	 	 // echo "$query";
	 	// exit();
	 	$query_result=mysqli_query($this->con,$query);
	 	if ($query_result) {
	 		$this->num_rows=mysqli_num_rows($query_result);
	 		// echo "num_rows=$this->num_rows";
	 		if ($this->num_rows>0) {
	 			$this->row_data=mysqli_fetch_row($query_result);
	 			 // print_r($this->row_data);
				return true;
	 		}
	 		else{
				// echo "not found";
				return true;
		 		}

	 	}
	 	else
	 	 {
	 	 	$this->error=$query;
	 	  return false;
	 	 }
	 }

	 function get_num_rows(){
	 	return $this->num_rows;
	 }

	 function get_data(){
	 	return $this->row_data;
	 }

 	function get_error_num()
	 {
	 return $this->error;

	 }
	 function get_error()
	 {

$err_type=gettype($this->error);
	if($err_type=="integer")
	{
	return	$error_msg=$this->get_error_msg($this->error);
		//echo " integer case";
		
	}
	else
	{
		return $this->error;
	}

	 }


	 function __call($fname,$arglist){
	 	$len=count($arglist);
	 	if($fname=="insert_data")
		{

	 	//echo "<br>len=$len<br>";
	 	switch ($len) {
	 		case 2:
	 			//echo "case 2<br>";
	 			$status=$this->insert($arglist[0],$arglist[1]);
	 			break;
	 			case 3:
				$status=$this->unique_insert($arglist[0],$arglist[1],$arglist[2]);
				break;
	 			case 4:
	 				echo "insert case with file<br>";
	 				$status=$this->insert($arglist[0],$arglist[1]);
					$auto_id=$this->auto_id;
					if($auto_id==0)
					$auto_id=rand(9999,99999);
				
				$status=$this->file_upload($arglist[2],$arglist[3],$auto_id);
	 				
	 				break;
	 				case 5: 
					echo "insert case with file<br>";
					$status=$this->insert($arglist[0],$arglist[1]);
					$auto_id=$this->auto_id;
					if($auto_id==0)
					$auto_id=rand(9999,99999);
				
				$status=$this->file_upload($arglist[2],$arglist[3],$auto_id);
				
				$col_name=$arglist[4];
				$col_list[$col_name]="$this->file_path";
				$where_con="id=$auto_id";
				//$status=$this->update($arglist[0],$col_list,$where_con);
				$status=$this->update($arglist[0],$col_list,$where_con);
				break;
	 		
	 		
	 	}
	 }
	 else if($fname=="get_filepath")
		{
			switch($len)
			{
				case 0: 
				$status=$this->file_path[0];
				break;
				case 1: 
				
			$status=$this->file_path[$arglist[0]];
					
				break;
				
			}
			
		}
	
	 	return $status;
	 }


	 	function my_encode($str)
{
	  $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
	
    //echo "Key size: " . $key_size . "\n";
    // $plaintext = "This string was AES-256 / CBC / ZeroBytePadding encrypted.";
	//echo "plaintext=$str<br/>";
    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $str, MCRYPT_MODE_CBC, $iv);

    # prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);
    return  $ciphertext_base64 . "\n";
}




function my_decode($temp)
{
	$key = pack('H*',"bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    $key_size =  strlen($key);
	
  //  echo "Key size: " . $key_size . "\n";
//     $plaintext = "spic123#";
	//echo "plaintext=$plaintext<br/>";
    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
   // $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$plaintext, MCRYPT_MODE_CBC, $iv);
//echo "temp=$temp<br/>";
$ciphertext_dec = base64_decode($temp);
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);


    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    
    return $plaintext_dec ;

}


	 function get_error_msg($error_no)
	{
			$err_msg="";
	switch($error_no)
	{
		case  101:$err_msg="User not found,Please enter valid Data "; break;
		case  102:$err_msg="password miss match,Please enter valid Password"; break;
		case  103:$err_msg="User not active "; break;
		case  104:$err_msg="User de-activate "; break;	


	}
return $err_msg;		
	}


	function login($table_name,$user_info,$where_info)
	{
		$count=count($user_info);
		// print_r($user_info);
	//	echo "$count";
		$i=0;
		$login_id="";
		$user_password="";
		$status="";
		$where_con="";
		$col_list="";
	foreach ($user_info as $key => $user_value) {
		
//			 echo "i=$i<br/>".$key."<br/>";
		if($i==0)
			$user_password=$user_value;
		$col_list .=$key;
		if($i<$count-1)
		$col_list .=",";

	
$i++;
		}
		$where_count=count($where_info);
		
		$i=0;
		foreach ($where_info as $key => $user_value) {
		
			// echo "i=$i<br/>".$key."<br/>";
			$where_con .="$key='$user_value'";



		if($i<$where_count-1)
		$where_con .=" or ";	
$i++;
		}
		
//	echo "where count=$where_count<br/>";

//	echo $where_con;
//	echo "<br/>";
//	echo "col_list=$col_list";
//	echo "<br/>";
//	echo "user_password=$user_password<br>";
	$status=$this->find('regform',$col_list,$where_con);
	if ($status) {
	//echo " login";
	 $num=$this->get_num_rows();
//	  echo "<br>num=$num";
if($num==0)
	 {
	 	$this->error=101;
	return false;
//		echo " <br>user not found";
		//header("Location:demo2.php?error_no=101");
	 }

else if ($num==1) 
	{
		 $data=$this->get_data();
		 // echo "$data[1]";
		 // print_r($data);
		 $db_password=$data[0];
		//$id=$data[0];
		//$name=$data[4];

		if($user_password==$db_password)
		 {
//			echo " <br>login";

		 	$data_count=count($data);
		 	echo "data count=$data_count";
		 	if($data_count>1)
		 	{
		 		$status=$data[1];
		 		echo "status=$status";
		 		if($data[1]==0)
		 		{

		 			$this->error=103;
		 			return false;
		 		}
		 		else if($data[1]==-1)
		 		{

		 			$this->error=104;
		 			return false;
		 		}
		 		else if($data[1]==1)
		 		{

		 		return true;
		 			
		 		}
		 		
		 	}





			//header("Location:profile.php?id=$id");
		 }
		else
		 {
		 		 	$this->error=102;

//			echo " <br>password miss match";
			return false;
			//header("Location:demo2.php?error_no=102&login_id=$login_id");
		 }
	}

}
else{
//	echo " error";
	return false;
}


	// exit();
/*		
$col1_list="id,email,password";
$where_con="email='$login_id' or id='$login_id'";
$status=$this->find('regform',$col1_list,$where_con);
if ($status) {
	//echo " login";
	$num=$this->get_num_rows();
	if ($num==0)
	 {
		echo " <br>user not found";
		//header("Location:demo2.php?error_no=101");
	 }
	elseif ($num==1) 
	{
		$data=$this->get_data();
		//print_r($data);
		$db_password=$data[2];
		$id=$data[0];
		//$name=$data[4];

		if ($login_password==$db_password)
		 {
			echo " <br>login";
			//$_SESSION['pid']=$id;
			//header("Location:profile.php?id=$id");
		 }
		else
		 {
			echo " <br>password miss match";
			//header("Location:demo2.php?error_no=102&login_id=$login_id");
		 }
	}
	
}
else{
	echo "error123";
}



// echo "<br>login_id=$login_id<br>login_password=$login_password<br>";


*/
	}

}
?>