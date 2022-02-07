<?php  
session_start();
ob_start();
$file_status=file_exists("config.php");

if($file_status!=1){
  header("location:installed.php");
}
?>
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
  require_once("mylibr.php");
	include ("header.php");
 
// if(isset($_REQUEST['msg']))
// {
// $msg=$_SESSION['msg'];
// echo "<h3>$msg</h3>";

// } 
if (isset($_REQUEST['error_no'])) 
 {
    $error_no=$_REQUEST['error_no'];
    $obj=new lib();
    $err_msg=$obj->get_error_msg($error_no);
    echo "<b>Error:$err_msg</b>";
    if(isset($_REQUEST['login_id']))
      $login_id=$_REQUEST['login_id'];
  }
  echo "
  <div class='row'><div class='col-md-12'>
<div class='bg-img'>
  <form action='data.php' class='container' method='post'>
    <h1 style='font-weight: bold;'>Login</h1>

    <label for='email'><b>Email</b></label>
    ";
    if(!isset($_REQUEST['login_id']) or $error_no==101)
    echo"
    <input type='text' class='form-control' placeholder='Enter Email/Mobile No..' name='login_id' required >";
    else
      echo"
    <input type='hidden' class='form-control' value='$login_id' name='login_id'>$login_id<br>";
    echo"

    <label for='psw'><b>Password</b></label>
    <input type='password' class='form-control' placeholder='Enter Password...' name='login_password' required >

    <label><input type='checkbox'> Remember me</label>

    <button type='submit' class='btn2' name='login'>Login</button>
    <a href='forget1.php' style='color:black;text-align: center;'>Forget Password 
    </a>
  </form>
</div></div></div>
<br>
";


/*
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
*/




/*
echo "<div class='row'>";
echo "<div class='col-md-3'>";
include ("loginform.php");
echo "</div>";

echo "<div class='col-md-9'>";
echo "
 <div id='myCarousel' class='carousel slide' data-ride='carousel'>
    <!-- Indicators -->
    <ol class='carousel-indicators'>
      <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
      <li data-target='#myCarousel' data-slide-to='1'></li>
      <li data-target='#myCarousel' data-slide-to='2'></li>
      <li data-target='#myCarousel' data-slide-to='3'></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class='carousel-inner' role='listbox'>
      <div class='item active'>
        <img src='images/12.jpg' alt='Chania'>
      </div>

      <div class='item'>
        <img src='images/10.jpeg' alt='Chania'>
      </div>
    
      <div class='item'>
        <img src='images/9.jpg' alt='Flower'>
      </div>

      <div class='item'>
        <img src='images/8.jpeg' alt='Flower'>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'>
      <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
      <span class='sr-only'>Previous</span>
    </a>
    <a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'>
      <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
      <span class='sr-only'>Next</span>
    </a>
  </div>
  
";

echo "</div>";
echo "</div>";
*/

echo "
<div class='row'><div class='col-md-12'>
<div class='jumbotron'>
<div class='row'>
<div class='col-md-12'>
<p style='font-size: 30px; font-weight: bold;font-family: Garamond'>Matches Within Your Community</p>
</div></div>
<form id='reg_form' method='post' action='modal'>
<div class='row'>
<div class='col-md-3'>
<label style='font-family: Garamond;font-size: 17px;'>I'm looking for</label>
<select name='category' class='form-control'>
         <option value='' selected='selected'>Please Select</option>
          <option value='self'>Self</option>
          <option value='son'>Son</option>
          <option value='daughter'>Daughter</option>
          <option value='relative/friend'>Relative/Friend</option>
           <option value='brother'>Brother</option>
            <option value='sister'>Sister</option>
             <option value='son'>Son</option>
        </select></div>

<div class='col-md-2'>
<label style='font-family: Garamond;font-size: 17px;'>Aged</label>
<select name='age' class='form-control'>
          <option value='' selected='selected'>Please Select</option>
          <option value='18'>18</option>
          <option value='19'>19</option>
          <option value='20'>20</option>
          <option value='21'>21</option>
          <option value='22'>22</option>
          <option value='23'>23</option>
          <option value='24'>24</option>
          <option value='25'>25</option>
          <option value='26'>26</option>
          <option value='27'>27</option>
          <option value='28'>28</option>
          <option value='29'>29</option>
          <option value='30'>30</option>
          <option value='31'>31</option>
          <option value='32'>32</option>
          <option value='33'>33</option>
          <option value='34'>34</option>
          <option value='35'>35</option>
          <option value='36'>36</option>
          <option value='37-42'>37-42</option>
          <option value='42-50'>42-50</option>
      </select></div>

        <div class='col-md-1'><p style='font-family: Garamond;font-size: 17px;font-weight: bold;'>To</p></div>

<div class='col-md-2'>
<label><p></p></label>
<select name='age' class='form-control'>
          <option value='' selected='selected'>Please Select</option>
          <option value='18'>18</option>
          <option value='19'>19</option>
          <option value='20'>20</option>
          <option value='21'>21</option>
          <option value='22'>22</option>
          <option value='23'>23</option>
          <option value='24'>24</option>
          <option value='25'>25</option>
          <option value='26'>26</option>
          <option value='27'>27</option>
          <option value='28'>28</option>
          <option value='29'>29</option>
          <option value='30'>30</option>
          <option value='31'>31</option>
          <option value='32'>32</option>
          <option value='33'>33</option>
          <option value='34'>34</option>
          <option value='35'>35</option>
          <option value='36'>36</option>
           <option value='37-42'>37-42</option>
          <option value='42-50'>42-50</option>
      </select></div>

<div class='col-md-2'>
<label style='font-family: Garamond;font-size: 17px;'>of Religion</label>
<select name='religion' class='form-control'>
          <option value='' selected='selected'>Please Select</option>
          <option value='hindu'>Hindu</option>
            <option value='muslim'>Muslim</option>
            <option value='sikh'>Sikh</option>
            <option value='chirstian'>Christian</option>
            <option value='buddhist'>Buddhist</option>
            <option value='jain'>Jain</option>
            <option value='parsi'>Parsi</option>
            <option value='jewish'>Jewish</option>
            <option value='bahai'>Bahai</option>
    </select></div>

<div class='col-md-2'>
<label  style='font-family: Garamond;font-size: 17px;'>and Mother Tongue</label>
<select name='mother_tongue' class='form-control'>
          <option value='' selected='selected'>Please Select</option>
        <optgroup label='&nbsp;'></optgroup>
<optgroup label='North'><option value='10'>Hindi/ Delhi</option>
<option value='19'>Hindi /Madhya Pradesh / Bundelkhand / Chattisgarhi</option>
<option value='33'>Hindi/U.P./Awadhi/ Bhojpuri/Garhwali</option>
<option value='27'>Punjabi</option>
<option value='7'>Bihari/Maithili/Magahi</option>
<option value='28'>Rajasthani / Marwari / Malwi / Jaipuri</option>
<option value='13'>Haryanvi</option>
<option value='14'>Himachali/Pahari</option>
<option value='15'>Kashmiri/Dogri</option>
<option value='30'>Sindhi</option>
<option value='36'>Urdu</option></optgroup>
<optgroup label='&nbsp;&nbsp;'></optgroup>
<optgroup label='West'><option value='20'>Marathi</option>
<option value='12'>Gujarati</option>
<option value='38'>Kutchi</option>
<option value='19'>Hindi /Madhya Pradesh / Bundelkhand / Chattisgarhi</option>
<option value='34'>Konkani</option>
<option value='30'>Sindhi</option></optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;'></optgroup>
<optgroup label='South'><option value='31'>Tamil</option>
<option value='3'>Telugu</option>
<option value='16'>Kannada</option>
<option value='17'>Malayalam</option>
<option value='35'>Tulu</option>
<option value='36'>Urdu</option></optgroup>
<optgroup label='&nbsp;&nbsp;&nbsp;&nbsp;'></optgroup>
<optgroup label='East'><option value='6'>Bengali</option>
<option value='25'>Oriya</option>
<option value='5'>Assamese</option>
<option value='29'>Sikkim/ Nepali/ Lepcha/ Bhutia/ Limbu</option></optgroup>
<optgroup label='---------'><option value='37'>English</option></optgroup>

</select></div>
</div>
</form><br>
<div class='row'>
 <div class='col-md-12'>
<label></label>
 <button class='btn btn-success pull-right' id='btn3' data-toggle='modal' data-target='#myModal'>Let's Begin</button></div></div>


</div>
</div></div>
";


echo<<<html_code
<div class='row'>
  <div class='col-md-offset-1 col-md-10'>
    <div class='well'>
    <div class='row'>
    <div class='col-md-12'><p style='font-size: 35px;text-align: center;font-weight: bold;font-family: Garamond'>Why Choose Sangam</p><hr>
    </div></div>
    <div class='row'>
    <div class='col-md-12'><p style='text-align: center;font-size:12px;font-family: Verdana'>Sangam is different from other matchmaking sites because of some unique benefits that every parent will find highly useful</p>
    </div>
    </div>
      <div class='row'>
        <div class='col-md-4'><img src='images/6.png' class='img-circle'>
          <p style='font-size: 15px;text-align: center;font-weight: bold;color: black;font-family: Verdana'>
          Get Complete Family Information</p>
          <p style='text-align: center;color: black;font-family: Verdana;font-size:12px;'>You will find detailed family information in every profile. Knowing the family will help you take the next step with confidence.</p>
        </div>
          <div class='col-md-4'><img src='images/4.jpg' class='img-circle'>
            <p style='font-size: 15px;text-align: center;font-weight: bold;color: black;font-family: Verdana'>
            Verification by Personal Visit</p>
            <p style='text-align: center;color: black;font-family: Verdana;font-size:12px;'>Special listing of profiles verified by our agents through personal visits</p>

          </div>
          <div class='col-md-4'><img src='images/5.jpg' class='img-circle'>
            <p style='font-size: 15px;text-align: center;font-weight: bold;color: black;font-family: Verdana'>
            Connect Directly with Matches</p>
            <p style='text-align: center;color: black;font-family: Verdana;font-size:12px;'>Thousands of profiles await you, so be ready to get directly connected with such profiles.</p>
          </div>
      </div>
    </div>
  </div>
</div>
html_code;
//echo "<br>";

echo "
<div class='row'>
<div class='col-md-12'>
<div class='jumbotron'>
<p style='font-size: 37px;text-align: center;font-weight: bold;font-family: Garamond'>How We Work</p>
<p style='text-align: center;color: black;font-family: Verdana;font-size:14px;'>Bespoke Matrimony is one of the best matrimonial service provider committed to help people establish meaningful connections leading to a blessed, blissful, passionate and fairy-tale married life.</p>
<hr>
<ul style='list-style-type:none;'>
<li style='font-size: 15px;'><i class='far fa-handshake'></i>
We will Fill Your Profile Details & OfCross-Platform Membership Forms.</li>
<li style='font-size: 15px;'><i class='far fa-star'></i>
 Expert Advice By Our Dedicated Matchmakers.</li>
<li style='font-size: 15px;'><i class='far fa-user-circle'></i>
Personal Assistance.</li>
<li style='font-size: 15px;'><i class='fas fa-lock'></i>
100% Verified Profiles With Detailed Background Check.</li>
<li style='font-size: 15px;'><i class='fas fa-user-check'></i>
 Customized Match-making Facility.</li>
<li style='font-size: 15px;'><i class='far fa-comments'></i>
 Message And Chat With Unlimited Users.</li>

</ul>
</div>
</div>
</div>
";





  echo "<div class='row'>";
	include ("addwindow.php");
  echo "</div>";

  echo "<div class='row'> <div class='col-md-12'>
  <div class='row'>
    <div class='col-md-12'>
      <p style='font-size: 35px;text-align: center;font-weight: bold;font-family: Garamond'>About us</p>
    </div></div>
    <div class='row'>
    <div class='col-md-offset-2 col-md-8'>
      <p style='font-size: 19px;text-align: center;font-family: Garamond'>Sangam is a matchmaking service created for parents who are looking for a life partner for their loved ones. Unlike other Matrimonial services, we focus on providing detailed family and background information to help you take the next step with confidence. With over 80+ community sites, you can find a match from your own community. Sangam is part of Shaadi.com (sometimes mis-spelt as Shadi), the World's No. 1 Matchmaking service.</p>
    </div></div>
</div></div>
";
	
	include ("footer.php");


  include ("modal.php");
	?>

</div>


  <script src="assets/js/jquery-1.7.1.min.js"></script> 

<script src="assets/js/jquery.validate.js"></script>
<script>
  
  $(document).ready(function(){

      $('#reg_form').validate({
        rules: {
          age:{
            required: true
          },

        
         category:{
            required: true
          },

          
          mother_tongue:{
            required: true
          },

           religion:{
            required: true
          },

          

          

        

        }
      })
  })


  
</script>

</body>
</html>