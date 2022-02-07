 
<?php
  include ("linkfile.php");
  $connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}

  ?>
  <div class="container-fluid">
  <div class="jumbotron">
 <form role="form" action="loginform.php" method="post">
  <div class="form-group row">
    <label for="email">Email address:</label>
    <input type="text" name="email" class="form-control"  placeholder="Enter Email id...">
  </div>
  <div class="form-group row">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password...">
  </div>
  <div class="checkbox row">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <div class="btn-group row">
  <button type="submit" class="btn btn-success" name="find" value="Submit">Submit</button></div>
</form>
<?php

if(isset($_POST['find']))
{
  $email=$_POST['email'];
  //echo "email=$email";
  $query="SELECT * FROM `regform` WHERE email='$email'";
  $query_result=mysqli_query($con,$query);
  //echo "$query_result";
  $row_count=mysqli_num_rows($query_result);
  echo"row=$row_count";
  if ($row_count>0) {
    $row_info=mysqli_fetch_row($query_result);
    echo "id=$row_info[0],email=$row_info[1],password=$row_info[2],category=$row_info[3],height=$row_info[5],marital_status=$row_info[6],mother_tongue=$row_info[7]";
  }
  else{
  echo"not found<br>$query";

}
}
?>


</div></div>