<?php
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
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
require_once("mylibr.php");
$obj=new lib();
$search_value="";
$where_con="";
if(isset($_POST['search']))
{
  $search_value=$_POST['srch'];
  // echo "search_value=$search_value<br>";
  $where_con="WHERE email like '%$search_value%' or id='$search_value' or mobileno='$search_value'";
}
if(isset($_REQUEST['s'])){
   $search_value=$_REQUEST['s'];
   $where_con="WHERE email like '%$search_value%' or id='$search_value' or mobileno='$search_value'";
 }
 
$pageno=0;
if (isset($_REQUEST['page'])) 
  $pageno=$_REQUEST['page'];

$size=2;
$offset=$pageno*$size;
echo "offset=$offset pageno=$pageno size=$size<br>";
$main_query="SELECT id,email,name,hometown,dob FROM m_regform $where_con ";
$main_query_result=mysqli_query($con,$main_query);
$total_no_records=mysqli_num_rows($main_query_result);
$total_pages=$total_no_records/$size;
$temp=explode(".", $total_pages);
$len=count($temp);
if ($len==2) {
  $total_pages=$temp[0]+1;
}
echo "lenght=$len<br/>";
echo "total_pages=$total_pages<br>";
echo "total_no_records=$total_no_records<br/>";


$query=$main_query." LIMIT $offset,$size";
// echo "query=$query<br>";
$query_result=mysqli_query($con,$query);
$no_of_records=mysqli_num_rows($query_result);

// echo "no of records=$no_of_records<br/>";

if($no_of_records>0){
  $num=$pageno*$size+1;
while($data=mysqli_fetch_row($query_result)){
  echo "  <div class='row'>
<div class='col-md-offset-4 col-md-4'>
<div class='panel panel-info'>
<div class='panel-heading'>
<h4>Record=$num</h4>
<h3>$data[1]/$data[0]</h3>
</div>
<div class='panel-body'>
<h4>Name : $data[2]</h4>
<h4>Location : $data[3]</h4>
<h4>D.O.B/Age : $data[4]</h4>

</div>
</div>
</div></div>

  ";
  $num++;
}

echo"
<div class='row'>
<div class='col-md-offset-4 col-md-4'>
<center>";

if($pageno>0){
  echo "<button class='btn btn-info' onclick='history.go(-1)'>Previous</button>";
}
// echo "current page = $pageno<br/>";
for($j=0,$k=1;$j<$total_pages;$j++,$k++){
 // echo "<a href='search.php?$pageno[$i]'>$i</a>";
  if($j==$pageno)
echo "<a href='search.php?page=".$j."'>"."<b><font size=8px>".$k."</font></b></a>&nbsp;&nbsp;";
else
echo "<a href='search.php?page=".$j."'>"." ".$k."</a>&nbsp;&nbsp;";
 }
if($pageno<$total_pages-1){
 $pageno++; 
echo "<a href='search.php?page=$pageno&s=$search_value'> <button class='btn btn-info'>Next</button></a>&nbsp;&nbsp;";
}
echo "</center></div></div>";
}

else{
  echo "<h3 style='background-color: #81F7F3;width: 100%;padding: 20px;text-align: center;font-weight: bold'>No Record Found</h3>";
}

echo "<br/>";
include ("footer.php");
?>
</body>
</html>