<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="bootstrap.min.js"></script>
  


<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
    height:310px;
  }
 
  .modal-dialog{
  position: absolute;
  left:35%;
  height: 800px;
  top: 20%;
} 

div.well{

  background-color:  white;
  border: none;
}
  
div.well img{
  padding: 5px;
  height: 120px;
  margin-left: 100px;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("images/10.jpeg");

  /* Control the height of the image */
  min-height: 500px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.bg-img2 {
  /* The image used */
  background-image: url("images/11.jpg");

  /* Control the height of the image */
  min-height: 500px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  left: 0;
  bottom: 0;
  margin: 20px;
  max-width: 290px;
  padding: 20px;
  background-color: white;
}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 10px 0;
  /*border: none;
  background: #f1f1f1;*/
}
/*
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}*/

/* Set a style for the submit button */
.btn2 {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn2:hover {
  opacity: 1;
}

h4,h3{
  font-family: New Century Schoolbook, TeX Gyre Schola, serif;
}

.column {
  float: left;
  /*flex: 25%;*/
  max-width: 20%;
  /*padding: 0 4px;*/
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}
@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    flex: 100%;
    max-width: 50%;
  }







</style>

