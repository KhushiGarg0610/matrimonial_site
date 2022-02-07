<?php
  // require_once('profile_info.php');
  // require_once("count_view.php");
  echo"
<html>
<body>
<h4>
<ul>
<img src='$profile_data[20]' class='img-circle' width='250px'>
<li><a href='profile.php'>My Profile</a></li>
<li><a href='registration_form.php' style='color: green'>Complete Your Profile</a></li>
<li><a href='request.php' style='color: black'>Received Request</a></li>
<li><a href='send_request.php' style='color: black'>Send Request</a></li>
<li><a href='add_refrence.php' style='color: black'>Add Refrence</a></li>
<li><a href='filaj.php' style='color: black'>Filter</a></li>
<li><a href='profile_demo_page.php' style='color: black'>Gallery</a></li>
<li style='color: black'>View Count :$view_count</li>
<li><a href='Logout.php' style='color: red'>Logout</a></li>
</ul></h4>
</body>
</html>";
