<?php 
session_start();
//require("include/nav.php");
$connection = mysqli_connect('localhost','root','','recyclebin_users');
$id = $_SESSION['user']['id'];
$query ="select * from user_info where id='". $id."'";
//echo $query;die;
$result= mysqli_query($connection, $query)  or die(mysqli_error($connection));
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
    //echo $msg;
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <title>contact us</title>
</head>


<body>



<?php 
    include('include/nav.php')
    ?>



    <div class="container" >
   

       
        <div class="contact">
            <h1 class="heading">Send Message</h1>
             <form class="form" action="contact.php" method="post" id="registrationForm">
                <span class="inputbox">
                    <input type="text" class="form-control" name="first_name" value="<?php echo $fname?>">
                    <span class="inputname">First Name</span>
                </span>
                <span class="inputbox">
                    <input type="text"class="form-control" name="last_name" value="<?php echo $lname;?>" />
                    <span class="inputname">Last Name</span>
                </span>
                <span class="inputbox">
                    <input type="text" value="<?php echo $email;?>" required />
                    <span class="inputname">Email Address</span>
                </span>
                <span class="inputbox">
                    <input type="text" value="<?php if(!empty($phn)) echo $phn;?>" />
                    <span class="inputname">Contact Number</span>
                </span>
                <span class="inputbox">
                    <textarea id="" name="msg" cols="30" rows="3" required></textarea>
                    <span class="textname">Write your message here</span> </span><br />
                <input type="submit" name="submit" class="submit" />
            </form>
        </div>
    </div>
</body>

</html> 

<?php 
    include('include/nav.php')
    ?>