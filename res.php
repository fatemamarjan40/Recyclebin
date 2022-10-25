<?php

$connection = mysqli_connect('localhost','root','','recyclebin_users');
    if(isset($_POST['submit']))
    {
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $Cpassword=$_POST['confirm_pwd'];
        $query ="select * from user_info where email='". $email."'";
        $result= mysqli_query($connection, $query)  or die(mysqli_error($connection));
        $no_of_data = mysqli_num_rows($result);
        if($no_of_data)
        {
            $_SESSION['Wrong_status']="This email is already in use";
            $_SESSION['Wrong_status_code']="error";
        }
        else
        {
            if($password!=$Cpassword)
            {
                $_SESSION['Wrong_status']="Password Not Matched";
                $_SESSION['Wrong_status_code']="error";
    
            }
            else
            {
                $name = $_FILES['file']['name'];
               $target_dir = "private/assets/";
               $target_file = $target_dir . basename($_FILES["file"]["name"]);
           
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
            if(!empty($name))
            {
                 // Check extension
                if( in_array($imageFileType,$extensions_arr) ){
    
                    
           
                    // Insert record
                     $query = "INSERT INTO user_info (email,profile_pic, password,FirstName,lastName) VALUES ('$email','$name','$password','$firstName','$lastName')";
                     $result=mysqli_query($connection,$query);
                     if(!$result)
                     {
                         die("Not inserted".mysqli_error($connection));
                     }
                     else
                     {
                         $_SESSION['status']="Registerd Successfully";
                         $_SESSION['status_code']="success";
                     }
                 
                    // Upload file
                    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                    
                
                 }
                 
    
            }
            else
            {
                $query = "INSERT INTO user_info (email,profile_pic, password,FirstName,lastName) VALUES ('$email','profile.jpg','$password','$firstName','$lastName')";
                $result=mysqli_query($connection,$query);
                if(!$result)
                {
                    die("Not inserted".mysqli_error($connection));
                }
                else
                {
                    $_SESSION['status']="Registerd Successfully";
                    $_SESSION['status_code']="success";
                }
            }

    
            }


            
        }
       
        

    }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
 
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
           
           <div class="text-center justify-content-center" style="position:relative; top:-10px; margin-left:70px; " >
           <h1 class=" text-dark" >Registration</h1>
           <p class="p-1 m-0 font-ubutu text-black-50">Register and enjoy additional feature</p>
           <span>I already have <a href="loginPrev.php">Login</a></span>
            </div>
          <div class=" form d-flex justify-content-center"  style="width: 450px; margin-top:40px; margin-left:10px; 
           background: #fff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0px 0px 10px 0px rgb(52, 51, 51);
          ">
              
                   <form action="res.php" method="post" enctype="multipart/form-data" id="reg-form">
          <!-- image -->

          <div class="upload-profile-image d-flex justify-content-center " >
             
               <div class="text-center">
                   <img src="assets/profile.jpg" class="img rounded-circle " style="width:200px; height:200px; margin-top:40px;" alt="profile" id="ProfileDisplay">
                   <small class="form-text text-black-50" style="position: relative; top:-85px">Choose Image</small>
                   <input type="file" class="form-control-file" name ="file" id="upload-profile" />

                   <!--  <input type="file" class="form-control" name="upload_book">-->
                      <!-- <span class="text-danger"> <//?php echo $uploadbook_error;?></span>-->
               </div>
           </div>
            <!-- image -->
         
                       <div class="form-row" >
                           <div class="col">
                               <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                           </div>
                           <div class="col">
                               <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                           </div>
                       </div>
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
                       <div class="form-row my-4">
                           <div class="col">
                               <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm password*">
                           </div>
                       </div>
                       <div class="form-check form-check-inline">
                           <input type="checkbox" name="agreement" class="form-check-input" required>
                           <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="# "> term,conditions,and policy</a>(*)</label>
                       </div>
                       <div class="submit-btn text-center my-5">
                       <input type="submit" name="submit" class="btn btn-info rounded-pill text-dark px-5">

                       </div>
                     
                   
                   
                   
                   </form>
                   </div>

          </div>
       
						
							
					
                    </div>
                    </section>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/sweetAlert.js"></script>
<script src="js/scripts.js"></script>
<?php
 if(isset($_SESSION['status']) && $_SESSION['status']!='')
 {
     ?>
     <script>
     swal({
     title: "<?php echo $_SESSION['status']; ?>",
     icon: "<?php echo $_SESSION['status_code']; ?>",
     button: "OK DONE !",
     });
     </script>

     <?php
     unset($_SESSION['status']);
 }
 if(isset($_SESSION['Wrong_status']) && $_SESSION['Wrong_status']!='')
 {
     ?>
     <script>
     swal({
     title: "<?php echo $_SESSION['Wrong_status']; ?>",
     icon: "<?php echo $_SESSION['Wrong_status_code']; ?>",
     button: "Try Again!",
     });
     </script>

     <?php
     unset($_SESSION['Wrong_status']);
 }
 

?>
</body>
</html>      
           
			<?php
include('footer.php');  
?>