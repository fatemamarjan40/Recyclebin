<!-- <div style="background: rgb(35 , 9 , 40); color: white; padding: 5px 8px;">Replaceable</div> -->

<?php 
$connection = mysqli_connect('localhost','root','','recyclebin_users');
require("include/nav.php");



$id = $_SESSION['user']['id'];
$qu ="select * from user_info where id='". $id."'";
//echo $query;die;
$result= mysqli_query($connection, $qu)  or die(mysqli_error($connection));
$row=mysqli_fetch_assoc($result);
 $fname=$row['FirstName'];
 $lname=$row['lastName'];
 $email=$row['email'];
 $loc=$row['location'];
//echo " ";
 $phn=$row['contactNo'];

if(isset($_POST['submit']))
{
    //echo "eidike kisu pay na ken";
    $msg=$_POST['msg'];
   // echo $msg;
    if(!empty($phn))
    $query = "INSERT INTO contact (First_Name,LastName,Email,Phone,Message) VALUES ('$fname ','$lname','$email','$phn','$msg')";
    else
    $query = "INSERT INTO contact (First_Name,LastName,Email,Message) VALUES ('$fname ','$lname','$email','$msg')";

    $result=mysqli_query($connection,$query);

    

}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Contract form</title>
    <link rel="stylesheet" href="css/contactus.css">
</head>

<body style="background-color: rgb(241,241,241);">
    <div class="wrapper">
        <div id="contact">
            <div class="info con-box">
                <div class="con">
                    <h2>Contact Us</h2>
                    <!-- .address>div>i+p -->
                    <ul>
                        <li><span><i class="material-icons">place</i></span> <span>225 New Elephant Road,Dhaka-1205</span><br /></li>
                        <li><span><i class="material-icons">email</i></span> recyclebin@gmail.com</li>
                        <li><span><i class="material-icons">phone</i></span><span>703-947-5853</span></li>
                        <li> &nbsp &nbsp To know more connect us...</li>
                    </ul>
                  
                    <div class="social-media">
                        <ul>
                            <li><i id="social-icon" class="fa fa-facebook-official"></i></li>
                            <li><i id="social-icon" class="fa fa-linkedin"></i></li>
                            <li> <i id="social-icon" class="fa fa-pinterest-square"></i></li>
                            <li><i id="social-icon" class="fa fa-youtube-play"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <br>
            <br>
            <br>
            <br>
            <br> -->
            <div class="con-form con-box">
                <div class="con">
                    <h2>Get in touch</h2>
                    <form class="form" action="contactus.php"  method="post">
                        <input type="name" value="<?php echo $fname." ".$lname;?>" placeholder="Enter your name">
                        <input type="email" value="<?php echo $email;?>" placeholder="Enter your email">
                        <input type="text"  value="<?php if(!empty($phn)) echo $phn;?>" placeholder="phone">
                        <textarea type="text" name ="msg" placeholder="Enter your message here......" id="message"></textarea>
                        <input type="submit" name="submit" value="Send" id="sbmt-btn">
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>

<?php
include('footer.php');  
?>
