<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
  include ("linkfile.php");
  ?>
</head>
<body>
<div class="container-fluid">
	<?php
	include ("header.php");

$connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}

echo "
<div class='row'><div class='col-md-offset-4'>
<form action='find_user.php' method='post'>
  <table>
    <tr><td>Id</td>
      <td><input type='text' name='id' class='form-control'></td>
      <td><input type='submit' name='find' value='find' class='btn btn-info'></td></tr>
  </table>
</form></div></div>
";

if(isset($_POST['find']))
{
$id=$_POST['id'];
//echo"id=$id";
$query="SELECT * FROM `filedata` WHERE id=$id";
//echo"<br>$query";
$query_result=mysqli_query($con,$query);
$row_count=mysqli_num_rows($query_result);
//echo"row=$row_count";
if($row_count>0)
{
  $row_info=mysqli_fetch_row($query_result);
  echo "id=$row_info[0], name=$row_info[1], password=$row_info[2], dob=$row_info[3], gender=$row_info[4], subject=$row_info[5], qualification=$row_info[6], file uploaded=$row_info[7]";
}
else{
  echo"not found";
}
}


?>


	
<!--


<div class="bg-img">
  <form action="/action_page.php" class="container">
    <h1 style="font-weight: bold;">Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email..." name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password..." name="psw" required>

    <label><input type="checkbox"> Remember me</label>

    <button type="submit" class="btn2">Login</button>
  </form>
</div>

<br>-->

<?php
  include ("footer.php");
  ?>
</div>
</body>
</html>