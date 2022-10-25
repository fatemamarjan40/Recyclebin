<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
 
	 <!-- bootstrap css -->
     <script src="https://kit.fontawesome.com/290a1a6c66.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--style-->
        <link rel="stylesheet" type="text/css" href="css/navcss.php" />
        <!--google font rancher-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ranchers&display=swap" rel="stylesheet">
<!--font awsome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

        <body>
    
                    
                    <nav class="navbar navbar-expand-md ">
                       
                        
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/logo.png" width="07%" height="50%">
                            <span class="binfont font-weight-bolder">RecycleB🚮n</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars navbar-icon"></i></span>
                          </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			
                            <ul class="navbar-nav mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="user_profile.php" class="trigger-btn" ><nobr> <strong><?php echo $_SESSION['user']['name']." ".$_SESSION['user']['lname']?></strong></nobr></a></li>
                                <li class="nav-item active"><a class="nav-link" href="index.php">HOME</a></li>
                                <li class="nav-item active"><a class="nav-link" href="aboutus.php" ><nobr>ABOUT US</nobr></a></li>
                                <li class="nav-item active"><a class="nav-link" href="side2.php" >PRODUCT</a></li>
                                <li class="nav-item active"><a class="nav-link" href="teampage.php" >TEAM</i></a></li>
                                <li class="nav-item active"><a class="nav-link" href="contactus.php">CONTACT</a></li>
                                <li class="nav-item active"><a class="nav-link" href="logOut.php" >LOGOUT</a></li>
								
                                
                            </ul>
                        </div>
                      </nav>


 

 <!-- bootstrap js -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
 integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
 integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
 integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<?php

?></body>
 </html>