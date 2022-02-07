<?php include('connection.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script>
    function verify_link(){
      alert("verification link has been send to your email,please click on this link to active your account");
    }
  </script>
</head>
<body>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-weight: bold;text-align: center;">Registration form</h4>
        </div>
        <div class="modal-body">
           <form id="reg_form" action="data.php" method="post" enctype="multipart/form-data" onsubmit="verify_link()">
  <div class="form-group row">
    <label class="col-md-4">Email : </label>
    <div class="col-md-8">
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email.."></div>
  </div>
  <div class="form-group row">
    <label class="col-md-4">Password : </label>
    <div class="col-md-8">
    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password..."></div>
  </div>

  <div class='form-group row'>
      <label class='col-md-4'>Gender </label>
      <div class='col-md-8'>
        <select name="gender" class="form-control">
          <option value="male" selected="selected">Male</option>
          <option value="female">Female</option>
          
        </select>
      </div>
    </div>



  <div class='form-group row'>
      <label class='col-md-4'>Create Profile For : </label>
      <div class='col-md-8'>
        <select name="category" class="form-control">
          <option value="" selected="selected">Please select</option>
          <option value="self">Self</option>
          <option value="son">Son</option>
          <option value="daughter">Daughter</option>
          <option value="relative/friend">Relative/Friend</option>
           <option value="brother">Brother</option>
            <option value="sister">Sister</option>
             <option value="son">Son</option>
        </select>
      </div>
    </div>


   <div class="form-group row">
    <label class="col-md-4">Name : </label>
    <div class="col-md-8">
    <input type="text" name="name" class="form-control" id="name"></div>
  </div>


   <div class="form-group row">
    <label class="col-md-4">Date of Birth : </label>
    <div class="col-md-8">
    <input type="date" name="dob" class="form-control" id="dob"></div>
  </div>


  <div class="form-group row">
    <label class="col-md-4">Mobile Number : </label>
    <div class="col-md-2">
    <?php
            $query="SELECT phone_code FROM `m_countrycode`";           
            $result=mysqli_query($con,$query);
            if ($result) {
            $num_rows=mysqli_num_rows($result);
            if($num_rows>0){
            echo"<select id='txt2' class='form-control' name='cntcode'>";
            $r=0;
              while ($data=mysqli_fetch_array($result)) {
              $record[$r]=$data;
              echo"<option value='$data[0]' > $data[0]</option>";
              $r++;
            }
            echo"</select>";
            }	 
            }
	?>
  </div>
    <div class="col-md-6">
    <input type="number" name="mobileno" class="form-control" id="num" placeholder="Enter your mobile no...."></div>
  </div>


  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
	
        </div>
        
      </div>
      
    </div>
  </div>

  <script src="assets/js/jquery-1.7.1.min.js"></script> 

<script src="assets/js/jquery.validate.js"></script>
<script>
  
  $(document).ready(function(){

      $('#reg_form').validate({
        rules: {
          name:{
            required: true
          },

          email:{
            required: true,
            email: true
          },

          mobileno:
          {
            required: true,
            minlength: 10,
            maxlength: 10
          },

         
         category:{
            required: true
          },

          dob:{
            required: true
          },

          height:{
            required: true
          },

          marital_status:{
            required: true
          },

          mother_tongue:{
            required: true
          },

           religion:{
            required: true
          },

          password:{
            required: true,
            minlength: 6

          },

          

        

        }
      })
  })


  
</script>

  </body>
</html>