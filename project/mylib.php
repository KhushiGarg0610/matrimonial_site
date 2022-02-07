<?php
require_once("config.php");
class mylib
{
	
	public $auto_id;
	public $file_path;
	public $error;
	public $num_rows;
	public $row_data;
	public $key;
	public $con;
	function __construct()
	{
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
	
	function exec_query($query_string)
	{
		if(mysql_query($query_string))
		{
			echo "<br/>saved";
		}
		else{
			
			echo "error";
		}
	}
	
	function insert($table_name,$c_list)
	{
	//	echo "table_name=$table_name<br/>";
		$col_list;
		$col_value;
		$col_list=$col_value="";
	$count=count($c_list);
	

		$i=0;
		foreach($c_list as $c_name=>$c_value)
		{
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
		
		$query="insert into $table_name($col_list) values($col_value)";
		//echo $query;
//	$this->connection();
	if(mysql_query($query))
	{		
			$this->auto_id=mysql_insert_id();

			return true;
	}else
		return false;

		
	}
	
	
	function update($table_name,$col_list,$where_con)
	{
	echo "update case<br/>";
	
	$query="update $table_name set ";
	$update_col_value="";
	$i=0;
	$count=count($col_list);
//	print_r($col_list);
	//exit;
		foreach($col_list as $c_name=>$c_value)
		{
			$update_col_value .=$c_name;
			$update_col_value .="='".$c_value."'";

			if($i<$count-1)
			{
				$update_col_value .=",";
			}
			$i++;
			
		}
		
	$query .=$update_col_value." where ".$where_con;
	if(mysql_query($query))
	{
//		echo "query=$query";
		return true;
	}else
	{
		$this->error=$query;
		return false;	
	}
	
	
	}	
	
		function delete($table_name,$where_con)
		{
			
			$query="delete from $table_name $where_con";
			if(mysql_query($query))
				return true;
			else
			{
				$this->error=$query;
				return false;
			}
		}
	
	function find($table_name,$col_list,$where_con)
	{
		$query ="select $col_list from $table_name where $where_con";
		$query_result=mysql_query($query);
	//	echo $query;
		if($query_result)
		{
			$this->num_rows=mysql_num_rows($query_result);
				if($this->num_rows==1)
				$this->row_data=mysql_fetch_row($query_result);	
				else if($this->num_rows>1)
				{
					
				}	
					
			return true;
		}			
		else{
			$this->error=$query;
			return false;
		}
		
		
	}
	
	function get_num_rows()
	{
		return $this->num_rows;
	}
	function get_autoid()
	{
		return $this->auto_id;
	}
	function get_data()
	{
		return $this->row_data;
		
	}
	
	function file_upload($file,$dir_name,$file_name)
	{
		
		echo "file uploading function<br/>";
		
		echo "file info.$file";
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
			if(mysql_query($sql))
			return true;
			else
			{
				$this->error=$sql;
				return false;
			}
		}else
		{	//echo "new_path=$new_path";
			$this->error=$new_path;
	return false;
		}
//		echo "file name=$file_name<br/>";
//				echo "file path=$file_path<br/>";
	}
	
	
	/*function get_filepath($file_no)
	{
		
		return $this->file_path[$file_no];
	}
	*/
	function get_error()
	{
		return $this->error;
	}
	
	
	function __Call($fname,$arglist)
	{
		$len=count($arglist);
		$status;
		if($fname=="insert_data")
		{
			
			switch($len)
			{
				case 2:
				$status=$this->insert($arglist[0],$arglist[1]);
				
				
				break;
					
				break;
				case 4: 
					echo "insert case with file";
					$status=$this->insert($arglist[0],$arglist[1]);
					$auto_id=$this->auto_id;
					if($auto_id==0)
					$auto_id=rand(9999,99999);		
				$status=$this->file_upload($arglist[2],$arglist[3],$auto_id);
				
				break;
				case 5: 
					echo "insert case with file";
					$status=$this->insert($arglist[0],$arglist[1]);
					$auto_id=$this->auto_id;
					if($auto_id==0)
					$auto_id=rand(9999,99999);
				
				$status=$this->file_upload($arglist[2],$arglist[3],$auto_id);
				
				$col_name=$arglist[4];
				$col_list[$col_name]="$this->file_path";
				$where_con="empid=$auto_id";
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
	
	
	function  my_encode($str)
{
	  $key = pack('H*', $this->key);
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
	echo phpinfo();
    echo "Key size: " . $key_size . "\n";
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
	$key = pack('H*', $this->key);
    
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
		case  101:$err_msg="User not found"; break;
		case  102:$err_msg="password miss match"; break;	

	}
return $err_msg;		
	}
	
}
?>