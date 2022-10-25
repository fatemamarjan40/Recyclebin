

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
 
	 <!-- bootstrap css -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--style-->
        <link rel="stylesheet" href="css/style.css">
        <!--google font rancher-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ranchers&display=swap" rel="stylesheet">
    <!--font awsome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<header>
<?php
include('include/nav.php');  
 

?>
</header>
<body>
<section  class="container-fluid bg" id="register" >

          
           <div class="row d-flex justify-content-center" >
                    <div class="col-lg-3">
           
                    <div class="text-center justify-content-center" style="position:relative; top:-65px;">
            <h1 class=" text-dark" >Login</h1>
            <p class="p-1 m-0 font-ubutu text-black-50">Login and enjoy additional feature</p>
            <span>Create a new <a href="res.php">Acoount</a></span>
             </div>
          <div class=" form d-flex justify-content-center"  style="width: 450px; margin-top:40px; margin-left:10px; 
           background: #fff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0px 0px 10px 0px rgb(52, 51, 51);
          ">
              
                   <form action="loginPrev.php" method="post" enctype="multipart/form-data" id="reg-form">
          <!-- image -->

         
         
          
        
          <div class="form-row my-4">
              <div class="col">
                  <input type="email" required name="email" id="email" class="form-control" placeholder="Email*">
              </div>
          </div>
          <div class="form-row my-4">
              <div class="col">
                  <input type="password" required name="password" id="password" class="form-control" placeholder="password*">
                  <small id="confirm_error" class="text-denger"></small>
              </div>
          </div>
         
          <div class="submit-btn text-center my-5">
          <input type="submit" name="submit" value="login" class="btn btn-info rounded-pill text-dark px-5">

          </div>
        
      
      
      
      </form>
                   </div>

          </div>
       
						
							
					
                    </div>
                    </section>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>      
           
			<?php
include('footer.php');  
?>