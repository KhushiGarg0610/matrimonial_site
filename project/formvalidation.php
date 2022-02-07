
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
            minlength: 6,
            maxlength: 6
          },

          

        

        }
      })
  })


  
</script>
