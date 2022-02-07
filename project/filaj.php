<?php
session_start();
 $connection_status = require_once("connection.php");
if ($connection_status!=1) {
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include ("linkfile.php"); ?>
<script>



function filter(marCheckbox,marCheckbox2,marSelectbox3,marSelectbox4,marSelectbox5,marSelectbox6)
{
    // alert(marCheckbox4);
var xmlhttp;
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
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }

    var Checkboxlist = document.getElementsByName(marCheckbox);
    // var Checkboxlist = document.getElementById('weight1').value;
    // alert("testing"+Checkboxlist.length);
    var selchbvalue="";
    // var len=count(Checkboxlist);
    // alert(len);
    // var le=count(Checkboxlist[i].checked);
    // alert(le);
    for(var i=0;i<Checkboxlist.length;i++)
    {
      if(Checkboxlist[i].checked){
      selchbvalue +=Checkboxlist[i].value;
       // if(i<Checkboxlist.length-1)
       if(i<Checkboxlist.length-1){
      selchbvalue +="/";
       }
      }

    }
      alert(selchbvalue);


      var Checkboxlist2 = document.getElementsByName(marCheckbox2);
      var selchbvalue2="";
    for(var i=0;i<Checkboxlist2.length;i++)
    {
      if(Checkboxlist2[i].checked){
      selchbvalue2 +=Checkboxlist2[i].value;
       // if(i<Checkboxlist.length-1)
       if(i<Checkboxlist2.length-1){
      selchbvalue2 +="/";
       }
      }

    }
    alert(selchbvalue2);

     var r = document.getElementById(marSelectbox3);
    // alert(r);
    // var le =x.options.length;
    // alert(le);
      var selchbvalue3="";
      
    for(var i=0;i<r.options.length;i++)
    {
      if(r.options[i].selected){
      selchbvalue3 +=r.options[i].value;
     
       if(i<r.options.length-1){
      selchbvalue3 +="/";
       }
      }

    }
    alert(selchbvalue3);

    var x = document.getElementById(marSelectbox4);
    // alert(x);
    // var le =x.options.length;
    // alert(le);
      var selchbvalue4="";
      
    for(var i=0;i<x.options.length;i++)
    {
      if(x.options[i].selected){
      selchbvalue4 +=x.options[i].value;
     
       if(i<x.options.length-1){
      selchbvalue4 +="-";
       }
      }

    }
    alert(selchbvalue4);

    var y = document.getElementById(marSelectbox5);
    // alert(x);
    // var le =x.options.length;
    // alert(le);
      var selchbvalue5="";
      
    for(var i=0;i<y.options.length;i++)
    {
      if(y.options[i].selected){
      selchbvalue5 +=y.options[i].value;
     
       if(i<y.options.length-1){
      selchbvalue5 +="-";
       }
      }

    }
    alert(selchbvalue5);

    var a = document.getElementById(marSelectbox6);
    // alert(x);
    // var le =x.options.length;
    // alert(le);
      var selchbvalue6="";
      
    for(var i=0;i<a.options.length;i++)
    {
      if(a.options[i].selected){
      selchbvalue6 +=a.options[i].value;
     
       if(i<a.options.length-1){
      selchbvalue6 +="/";
       }
      }

    }
    alert(selchbvalue6);


      var queryString ="?chb="+selchbvalue;
queryString +="&hchb="+selchbvalue2+"&rel="+selchbvalue3+"&mth="+selchbvalue4+"&zdsign="+selchbvalue5+"&age="+selchbvalue6;
 xmlhttp.open("GET", "search1.php"+queryString, true);
 xmlhttp.send();
}

// function hfilter(hmarCheckbox)
// {
//  // alert(marCheckbox);
// var xmlhttp;
// if (window.XMLHttpRequest)
//   {// code for IE7+, Firefox, Chrome, Opera, Safari
//   xmlhttp=new XMLHttpRequest();
//   }
// else
//   {// code for IE6, IE5
//   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
// xmlhttp.onreadystatechange=function()
//   {
//   if (xmlhttp.readyState==4 && xmlhttp.status==200)
//     {
//     document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
//     }
//   }

//     var Checkboxlist1 = document.getElementsByName(hmarCheckbox);
//     // var Checkboxlist = document.getElementById('weight1').value;
//     // alert("testing"+Checkboxlist.length);
//     var selchbvalue1="";
//     // var len=count(Checkboxlist);
//     // alert(len);
//     // var le=count(Checkboxlist[i].checked);
//     // alert(le);
//     for(var i=0;i<Checkboxlist1.length;i++)
//     {
//       if(Checkboxlist1[i].checked){
//       selchbvalue1 +=Checkboxlist1[i].value;
//        // if(i<Checkboxlist.length-1)
//        if(i<Checkboxlist1.length-1){
//       selchbvalue1 +="/";
//        }
//       }

//     }
//       alert(selchbvalue1);
 
//  xmlhttp.open("GET", "search1.php?hchb="+selchbvalue1, true);
//  xmlhttp.send();
// }
</script>
</head>
<body>
<div class="container-fluid">
<?php include ("header.php");?>

<!-- <br/> -->
<div class="row">
  <div class="col-md-12">
<!-- <div class="row">
  <label class="col-md-12">Weight<br/>
  
    <input type="checkbox" name="chb" id="weight1" value="30-40"/> 30-40<br/>
    <input type="checkbox" name="chb" id="weight2" value="40-50"/> 40-50<br/>
    <input type="checkbox" name="chb" id="weight3" value="50-60"/> 50-60<br/>
    <input type="checkbox" name="chb" id="weight4" value="60-70"/> 60-70<br/>
  </label>
</div> -->
<p style="font-weight: bold;font-size: 50px;">Filter</p>
<div class="well" style="background-color: #E6E6E6;padding: 20px;">
<div class="row">
  <label class="col-md-2"><h3>Weight</h3>

    <?php
    $weight_list=array("40-50","50-60","60-70","70-90","90-above");
for($i=0;$i<count($weight_list);$i++){
//   $temp=$weight_list[$i];
  $status="";
//   if($wt_value!=""){
//   if(in_array($temp,$wt_value)){
//   $status="checked";
//   }
// }
  echo"<input type='checkbox' value='$weight_list[$i]' $status name='chb'> $weight_list[$i]</br>";
}
?>
  </label>
<!-- </div>

<div class="row"> -->
  <label class="col-md-2"><h3>Height</h3>

    <?php
    $height_list=array("4","5","6","7","8");
for($i=0;$i<count($height_list);$i++){
//   $temp=$weight_list[$i];
  $status="";
//   if($wt_value!=""){
//   if(in_array($temp,$wt_value)){
//   $status="checked";
//   }
// }
  echo"<input type='checkbox' value='$height_list[$i]' $status name='hchb'> $height_list[$i] feet</br>";
}
?>
  </label>
  <label class="col-md-2"><h3>Religion</h3>
    <select name="religion" id="rel" size="5" multiple="multiple" class="form-control">
   <?php
   $options = array("Hindu","Muslim","Sikh","Christian","Buddhist","Jain","Parsi","Jewish","Bahai");
   foreach($options as $item){
echo "<option value='$item'>$item</option>";
}
 
?>
</select>
  </label>
   <label class="col-md-3"><h3>Mother Tongue</h3>
  <select name="mother_ton" id="mth" size="5" multiple="multiple" class="form-control">
  <?php
  $options = array("Hindi/Delhi","Hindi/Madhya Pradesh/Bundelkhand/Chattisgarhi","Hindi/U.P./Awadhi/Bhojpuri/Garhwali","Punjabi","Bihari/Maithili/Magahi","Rajasthani/Marwari/Malwi/Jaipuri","Haryanvi","Himachali/Pahari","Kashmiri/Dogri","Sindhi","Urdu","Marathi","Gujarati","Kutchi","Konkani","Sindhi","Tamil","Telugu","Kannada","Malayalam","Tulu","Bengali","Oriya","Assamese","Sikkim/Nepali/Lepcha/Bhutia/Limbu","English");
   foreach($options as $item){
  echo "<option value='$item'>$item</option>";
  }
  ?></select>
  </label>

   <label class="col-md-3"><h3>Zodiac Sign</h3>
  <select name="zodiac" id="zdsign" size="5" multiple="multiple" class="form-control">
 <?php
  $options = array("Aries","Scorpio","Libra","Capricornus","Sagittarius","Taurus","Gemini","Cancer","Leo","Virgo","Aquarius","Pisces");
  foreach($options as $item){
echo "<option value='$item'>$item</option>";
}
?>
</select>
  </label>


</div>
<div class="row">
  <label class="col-md-3"><h3>Age</h3>
    <select name="age" id="age" size="5" multiple="multiple" class="form-control">
 <?php
  $options = array("18-20","20-22","22-24","24-26","26-28","28-30","30-35","35-40","40 above");
  foreach($options as $item){
echo "<option value='$item'>$item Year's old</option>";
}
?>
</select> 
  </label>
</div>

</div>


<div class="row">
  <div class="col-md-offset-4 col-md-4">
  <input type="submit" name="submit" value="Apply Filter" id="sub" onclick="filter('chb','hchb','rel','mth','zdsign','age')" class="btn btn2">
  </div>
</div>

</div>
</div>
<div class="row">
<div class="col-md-12">
  <div id="myDiv">

   </div>
</div></div>

<!-- </div> -->

<?php include ("footer.php");?>
</div>

</body>
</html>