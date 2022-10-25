<?php

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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>login</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
 
