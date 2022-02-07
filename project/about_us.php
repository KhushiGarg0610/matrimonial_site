<?php
session_start();
?>
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
    include("header.php");

// $profile_id=$_SESSION['pid'];
// echo "pid=$profile_id";

    ?>
        <div class="row">
     <h1 style="font-family: Trebuchet MS; text-align: center;text-shadow: 2px 2px cyan;font-weight: bold;">About Us</h1>
            <div class="col-sm-6"> <p style="font-size: 17px;">
            Marrige web application is one of the leading online matrimonial services offering various opportunities to people to meet their soul-mates on a single platform.
            The site is one of the fast growing matrimonial portals working towards creating the matrimony alliances and successful marriages. 
            The portal extends its services to people belonging to different backgrounds, regions, casts and religions. 
            The services are offered to privileged Indians from Hindu, Sikh, Muslims, Christians, Jain and other communities world-wide. 
            We are always ready to help people who are serious about marriage. 
            They can make use of our user-friendly portal, explore and choose as per their preferences and meet their life partner in few clicks. 
            The site offers various comprehensive features, which make searching your dream person a real-time fun. 
            In-depth analysis has been performed by our team of professionals to offer you better services as compared to other matrimonial services.
            <br/>
            That is not all but have much more then that stay connected and explore us.
           </p> </div>
            <div class="col-sm-6">
                <img src="images/img3.jpg" style="width: 600;height: 300;" class="img-responsive">
            </div>
        </div>      
        <br/>
        <br/>
        <br/>
        <div class="row">
            <div class="col-sm-6">
                <img src="images/img4.jpg" style="width: 600;height: 300;"  class="img-responsive">
            </div>
            
            <div class="col-sm-6">
                <p style="font-size: 17px;">
            Marrige web application is one of the leading online matrimonial services offering various opportunities to people to meet their soul-mates on a single platform.
            The site is one of the fast growing matrimonial portals working towards creating the matrimony alliances and successful marriages. 
            The portal extends its services to people belonging to different backgrounds, regions, casts and religions. 
            The services are offered to privileged Indians from Hindu, Sikh, Muslims, Christians, Jain and other communities world-wide. 
            We are always ready to help people who are serious about marriage. 
            They can make use of our user-friendly portal, explore and choose as per their preferences and meet their life partner in few clicks. 
            The site offers various comprehensive features, which make searching your dream person a real-time fun. 
            In-depth analysis has been performed by our team of professionals to offer you better services as compared to other matrimonial services.
            <br/>
            That is not all but have much more then that stay connected and explore us.
            </p></div>
        </div>     
        <hr>
        
        <div class="row">
     <h1 style="font-family: Trebuchet MS; text-align: center;text-shadow: 2px 2px cyan;font-weight: bold;">Our Team</h1>
         <br/>
            <div class="col-sm-4"><center>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top img-circle" src="images/unnati.jpg" alt="Card image cap" >
                <div class="card-body">
                <h5 class="card-title"><b>Unnati Sharma</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div></center>
            </div> 

            <div class="col-sm-4"><center>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top img-circle" src="images/kamal.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title"><b>Kamal Dhiman</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div></center>
            </div>    

            <div class="col-sm-4"><center>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top img-circle" src="images/khusi.jpg" alt="Card image cap" >
                <div class="card-body">
                <h5 class="card-title"><b>Khusi Garg</b></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div></center> 
            </div>    
</div>

    <?php
    include ('footer.php');
    ?>   
  
    </div>
</boby>
</html>
