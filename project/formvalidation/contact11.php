<?php 
include('../database.php');
ob_start();
$obj=new database();

?>
<!DOCTYPE html>
<html>
<head>
<?php //include("script.php");?>


  <link rel="stylesheet" href="dist/css/formValidation.css"/>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/formValidation.js"></script>
    <script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
   <script src="bootstrap.min.js"></script>

    <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
	  height:200px;
  }

  </style>
  </head>
<body>

<div class='container'>
 
  <?php include('../head.php');?>
 <div class='row'>
  <div class='col-sm-3'>
  
<?php
include('left_menu.php');
?>
	</div>
	
  <div class='col-sm-9'>
  
   <div class='panel panel-info'>
   
      <div class='panel-heading'>Contact</div>
	  
      <div class='panel-body'>
	  Contact us
We're happy to answer any questions you have or provide you with an estimate. Just send us a message in the form below with any questions you may have.
	  <div class='row'>
	  <div class='col-sm-4'>
	    
		
		<?php
		if(isset($_REQUEST['act']))
		{
		$c1=$_POST['c1'];
		$c2=$_POST['c2'];
		$c3=$_POST['c3'];
		$c4=$_POST['c4'];
		$c5=$_POST['c5'];
		//echo "c1=$c1 c2=$c2 c3=$c3 c4=$c4";// c5=$c5 c6=$c6 c7=$c7 c8=$c8 c9=$c9 c10=$c10 c11=$c11 c12=$c12" ;
		$obj->set_table_name("contact_us");
		$obj->set_col_name("name,email,phoneno,subject,message");
		$obj->set_val_list("$c1,$c2,$c3,$c4,$c5");
		$flag=$obj->insertdata();
		if($flag)
		{
		echo "Record Saved Successfully";
		//header("Location:f_detail.php");
		}
		else
		{
		echo "error";
		}
		}
		echo "
   <form role='form' action='contact.php?act=1' id='contact_frm' method='post'>
  <div class='form-group'>
    <label for='name'>Your Name(required):</label>
    <input type='text' class='form-control' id='name' name='c1'>
  </div>
	<div class='form-group'>
    <label for='email'>Email address:</label>
    <input type='email' class='form-control' id='email' name='c2'>
  </div>
  <div class='form-group'>
    <label for='Phoneno'>Phone no:</label>
    <input type='phone' class='form-control' id='email' name='c3'>
  </div>
  <div class='form-group'>
    <label for='Subject'>Subject:</label>
    <input type='text' class='form-control' id='subject' name='c4'>
  </div>
  <div class='form-group'>
    <label for='Subject'>Your Message(required)</label>
    
	<textarea  class='form-control' id='message' rows=5 cols=35 name='c5'></textarea>
  </div>
   <input type='submit' name='submit' value='Send' class='btn btn-primary' /> &nbsp;<input type='reset' value='Clear' class='btn btn-primary'/>
   </form> ";
   ?>
	  	</div>
		</div>

	  
	  
	  </div>
    </div>
	</div>

	</div>
	<?php
  include('footer.php');
  ?>
  
  
  
  
</div>
  





<script type="text/javascript">
$(document).ready(function() {
    $('#contact_frm')
        .formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                c1: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The username is required and can\'t be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 10,
                            message: 'The username must be more than 6 and less than 10 characters long'
                        },
                        /*remote: {
                            url: 'remote.php',
                            message: 'The username is not available'
                        },*/
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: 'The username can only consist of alphabetical, number, dot and underscore'
                        }
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the FormValidation instance
            var bv = $form.data('formValidation');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>
</body>
</html>