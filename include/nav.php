<?php
session_start();

$connection = mysqli_connect('localhost','root','','recyclebin_users');
    if(isset($_POST['submit']))
    {
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query ="select * from user_info where email='". $email."'";
        //echo $query;die;
        $result= mysqli_query($connection, $query)  or die(mysqli_error($connection));
        $no_of_data = mysqli_num_rows($result);
        if($no_of_data)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if($row['email']==$email && $password ==$row['password'])
                {
                    $_SESSION['user'] = array(
                        "id"=>$row['id'],
                        "name"=>$row['FirstName'],
                        "lname"=>$row['lastName'],
                        "email"=>$row['email'],
                        "pass"=>$row['password'],
                        "pro_pic"=>$row['profile_pic']
                    );
					header('Location:private/index.php');

                }
                else if($row['email']==$email  && $password !=$row['password'])
                {
                    $_SESSION['Wrong_status']="Wrong Password";
                    $_SESSION['Wrong_status_code']="error";
                }
                else if($row['email']!=$email )
                {
                    echo "Please Enter Correct Email !";
                    $_SESSION['Wrong_status']="Please Enter Correct Email !";
                }
            }
        }
        else 
                {
                    $_SESSION['Wrong_status']="Please Enter Correct Email !";
                }
        
      
    }
   

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
<style>
body {
	font-family: 'Varela Round', sans-serif;
}
.modal-login {		
	color: #636363;
	width: 350px;
}
.modal-login .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
}
.modal-login .modal-header {
	border-bottom: none;   
	position: relative;
	justify-content: center;
}
.modal-login h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -15px;
}
.modal-login .form-control:focus {
	border-color: #70c5c0;
}
.modal-login .form-control, .modal-login .btn {
	min-height: 40px;
	border-radius: 3px; 
}
.modal-login .close {
	position: absolute;
	top: -5px;
	right: -5px;
}	
.modal-login .modal-footer {
	background: #ecf0f1;
	border-color: #dee4e7;
	text-align: center;
	justify-content: center;
	margin: 0 -20px -20px;
	border-radius: 5px;
	font-size: 13px;
}
.modal-login .modal-footer a {
	color: #999;
}		
.modal-login .avatar {
	position: absolute;
	margin: 0 auto;
	left: 20px;
	right: 0;
	top: -70px;
	width: 95px;
	height: 95px;
	border-radius: 90%;
	z-index: 9;

	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-login .avatar img {
	width: 100%;
    height: 100%;
}
.modal-login.modal-dialog {
	margin-top: 80px;
}
.modal-login .btn, .modal-login .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1 !important;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
}
.modal-login .btn:hover, .modal-login .btn:focus {
	background: #45aba6 !important;
	outline: none;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}
</style> 


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
                                
                            <li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-home">HOME</i></a></li>
                                <li class="nav-item active"><a class="nav-link" href="aboutus.php" ><nobr><i class="fa fa-user-o">ABOUT US</i></nobr></a></li>
                                <li class="nav-item active"><a class="nav-link" href="#myModal" class="trigger-btn" data-toggle="modal"><nobr><i class="fa fa-user-circle">USER PROFILE</i></nobr></a></li>
                                <li class="nav-item active"><a class="nav-link" href="side2.php" ><i class="fa fa-briefcase">PRODUCT</i></a></li>
                                <li class="nav-item active"><a class="nav-link" href="teampage.php" ><i class="fas fa-users">TEAM</i></a></li>
                                
                            </ul>
                        </div>
                      </nav>


 <!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="assets/circle-cropped.png" height="1000px" width="1000px" alt="Avatar">
				</div>				
				<h4 class="modal-title">Member Login</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form  method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Username" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
                <span>Have you Any account?</span>
				<a href="res.php">Register Here</a>
			</div>
		</div>
	</div>
</div>   

      






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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




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
 