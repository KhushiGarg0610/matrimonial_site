<?php
  ob_start();
?>

<!DOCTYPE html>
<html>
<head>
   <?php
   include ("linkfile2.php");
    include ("reg_script.php");
  ?>
  <script>
    function calling(){
      if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
     }
   }
    }
 function showUser(str)
 {
 if (str=="")
 {
 document.getElementById("txtHint").innerHTML="";
 return;
  } 
 calling();
 xmlhttp.open("GET","city_list.php?q="+str,true);
 xmlhttp.send();
 }



 </script>
</head>
<body>
<div class="container-fluid">
  <?php
  require_once("mylibr.php");
  include ("header.php");
  $connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}
?>


<!-- <div class="container mt-5"> -->
<div class="row d-flex justify-content-center align-items-center">
  <div class="col-md-offset-2 col-md-8">

  <form id="reg_form" action="data.php" method="POST">
  <h2 id="register">Registration</h2>
  <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
  
  <div class="tab">
  <p><h1>Basic information</h1></p>
        <p><label>Height</label></p>
         <p><select  name="height" id="txt1"> <?php
       $options = array(" ","4 feet 0 inch (1.83 mts)", "4 feet 1 inch (1.84 mts)", "4 feet 2 inch (1.88 mts)", "4 feet 3 inch (1.91 mts)",
        "4 feet 4 inch (1.93 mts)","4 feet 5 inch (1.96 mts)","4 feet 6 inch (1.98 mts)","4 feet 7 inch (2.01 mts)","4 feet 8 inch (2.03 mts)",
        "4 feet 9 inch (2.06 mts)","4 feet 10 inch (2.08 mts)"," 4 feet 11 inch (2.11 mts) ","5 feet 0 inch (1.83 mts)", "5 feet 1 inch (1.85 mts)",
         "5 feet 2 inch (1.88 mts)","5 feet 3 inch (1.91 mts)","5 feet 4 inch (1.93 mts)","5 feet 5 inch (1.96 mts)","5 feet 6 inch (1.98 mts)",
         "5 feet 7 inch (2.01 mts)","5 feet 8 inch (2.03 mts)","5 feet 9 inch(2.06 mts)","5 feet 10 inch(2.08 mts)"," 5 feet 11 inch(2.11 mts) ",
         " 6 feet 0 inch(1.83 mts)", " 6 feet 1 inch(1.85 mts)", " 6 feet 2 inch(1.88 mts)", "6 feet 3 inch(1.91 mts)","6 feet 4 inch(1.93 mts)",
         " 6 feet 5 inch(1.96 mts)"," 6 feet 6 inch(1.98 mts)"," 6 feet 7 inch(2.01 mts)","6 feet 8 inch(2.03 mts)"," 6 feet 9 inch(2.06 mts)",
         " 6 feet 10 inch(2.08 mts)","  6 feet 11 inch(2.11 mts) " );
          foreach($options as $item){
          echo "<option value='$item'>$item</option>";
          }?>
          </select></p>
    <p><label>Color Complexion</label></p>
         <p><select name="color" id="txt2">
         <?php
           $options = array(" ","White","Brown","Wheatish","Black");
           foreach($options as $item){
           echo "<option value='$item' >$item</option>";
          }
         ?>
       </select></p>

       </p><label>Marital status</label></p>
  <p><select name="marital_status" id="txt3">
 <?php
  $options = array(" ","Never Married","Married","Awaiting Divorce","Divorced","Widowed","Annulled");
  foreach($options as $item){
echo "<option value='$item'>$item</option>";
}
?>
</select></p>

  <p><label>Mother Tounge</label></p>
  <p><select name="mothertounge" id="txt4">
  <?php
  $options = array(" ","Hindi/Delhi","Hindi/Madhya Pradesh/Bundelkhand/Chattisgarhi","Hindi/U.P./Awadhi/Bhojpuri/Garhwali","Punjabi","Bihari/Maithili/Magahi","Rajasthani/Marwari/Malwi/Jaipuri","Haryanvi","Himachali/Pahari","Kashmiri/Dogri","Sindhi","Urdu","Marathi","Gujarati","Kutchi","Konkani","Sindhi","Tamil","Telugu","Kannada","Malayalam","Tulu","Bengali","Oriya","Assamese","Sikkim/Nepali/Lepcha/Bhutia/Limbu","English");
   foreach($options as $item){
  echo "<option value='$item'>$item</option>";
  }
  ?></select></p>

  </p><label>Weight</label></p>
  <p><input placeholder="Weight in kg" oninput="this.className = ''" name="weight" id="txt5"></p>

  <p><label>Home Town</label></p>
  <p>
 <!--    <input placeholder="Home Town(Country/State/City)" oninput="this.className = ''" name="hometown" id="txt6"> -->

    <?php

  $flag=include("connection.php");
if($flag)
{
$sql="select distinct(state) from tblcitylist";
$query=mysqli_query($con,$sql);
//echo "<form action='save.php' method='post'>";
echo"<select name='hometown' title='select' onchange='showUser(this.value)' id='txt6'>";
while($row=mysqli_fetch_array($query))
{
echo"<option value='$row[0]'>$row[0]</option>";
}
echo" </select>";
}
?>
<div id="txtHint"></div>
  </p>

  <p><label>Food</label></p>
  <p><select name="food" id="txt7">
   <?php
   $options = array(" ","Veg","Non-Veg","Occasionally Non-Veg","Eggetarian","Jain","Vegan");
  foreach($options as $item){
   echo "<option value='$item'>$item</option>";
  }?>
  </select></p>

  </div>

  <div class="tab">
  <p><h1>Community</h1></p>

   </p><label>Surname</label></p>
   <p><input placeholder="Surname" oninput="this.className = ''" name="surname" id="txt8"></p>
   </p><label>Religion</label></p>

   <p><select name="religion" id="txt9">
   <?php
   $options = array(" ","Hindu","Muslim","Sikh","Christian","Buddhist","Jain","Parsi","Jewish","Bahai");
   foreach($options as $item){
   echo "<option value='$item'>$item</option>";
   }
 ?>
  </select></p>

  </p><label>Zodiac Sign</label></p>
  <p><select name="zodiac" id="txt10">
 <?php
  $options = array(" ","Aries","Scorpio","Libra","Capricornus","Sagittarius","Taurus","Gemini","Cancer","Leo","Virgo","Aquarius","Pisces");
  foreach($options as $item){
echo "<option value='$item'>$item</option>";
}
?>
</select></p>

</div>

<div class="tab">
<p><h1>Education & prfession</h1></p>
<p><input placeholder="post graduation" oninput="this.className = ''" name="edu" id="txt11"></p>
<p><input placeholder="Working profession" oninput="this.className = ''" name="profession" id="txt12"></p>
<p><input placeholder="Income " oninput="this.className = ''" name="income" id="txt13"></p>
         
</div>
    
<!-- <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
  <h3>Thanks for your information!</h3> <span>Your information has been saved! we will contact you shortly!</span>
</div> -->
<div style="overflow:auto;" id="nextprevious">
<div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)" name="reg_submit">Next</button> 

</div>   
</div>
<div class="tab">      
<button type="submit" value="Submit" name="reg_submit" onclick="get_value('txt1','txt2','txt3','txt4','txt5','txt6','txt7','txt8','txt9','txt10','txt11','txt12','txt13')">Submit</button>
</div>
</form>
</div>
</div>
<!-- <div class="container mt-5"> -->
    


<?php  
  include ("footer.php");
?>
</div>

<script src="assets/js/jquery-1.7.1.min.js"></script> 

<script src="assets/js/jquery.validate.js"></script>
<script>
  
  $(document).ready(function(){

      $('#reg_form').validate({
        rules: {
          height:{
            required: true
          },

          color:{
            required: true
            },

          weight:
          {
            required: true
            
          },

         
         hometown:{
            required: true
          },

         marital_status:{
            required: true
          },

          mother_tongue:{
            required: true
          },

           food:{
            required: true
          },

           surname:{
            required: true
          },

           religion:{
            required: true
          },

           zodiac:{
            required: true
          },
           edu:{
            required: true
          },
           
           profession:{
            required: true
          },
          
           income:{
            required: true
          },
  

        

        }
      })
  })


  
</script>

</body>
</html>