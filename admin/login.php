<?php
session_start();
$connection = mysqli_connect('localhost','root','','adminpanel');

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $sql ="select * from admin_user where username='$username' and password='$pass'";
    $res=mysqli_query($connection,$sql);
    $count=mysqli_num_rows($res);
    if($count)
    {
      while($row=mysqli_fetch_assoc($res))
      {
          if($row['username']==$username && $pass ==$row['password'])
          {
            $_SESSION['admin'] = array(
              "id"=>$row['id'],
              "name"=>$row['username'],
              "pass"=>$row['password']
            );
              
              header('Location:dashboard.php');

          }
          else if(($row['username']==$username   && $pass!=$row['password']))
          {
              $_SESSION['Wrong_status']="Wrong Password";
              $_SESSION['Wrong_status_code']="error";
          }
          else if($row['username']!=$username )
          {
              echo "Please Enter Correct Email !";
              $_SESSION['Wrong_status']="Please Enter Correct Email !";
          }
      }
     
   
    header('dashboard.php');
    }
    else
    {
        echo "Please Enter correct login details";
    }

}


?>


<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/login.css">
</head>
<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
<title>Admin Login</title>
  <br> <h1>Admin Login</h1><br>

    <!-- Login Form -->
    <form action="login.php" method="post" enctype="multipart/form-data" >
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" require>
      <div class="fadeIn third" style="margin-top:10px;margin-bottom:10px;">
      <input type="password"  id="password"  name="pass" placeholder="password" require style="height:50px; width:386px;">

      </div>
    
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
     
    </div>

  </div>
</div>

</body>
</html>
