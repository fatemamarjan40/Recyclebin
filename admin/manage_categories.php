<?php
session_start();
$connection = mysqli_connect('localhost','root','','adminpanel');
$categories='';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=$_GET['id'];
    $res=mysqli_query($connection,"select * from categories where cat_id='$id'");
    $row=mysqli_fetch_assoc($res);
    $categories=$row['cat_title'];

}
if(isset($_GET['submit'])){
    $categories=$_GET['cat'];
    if(isset($_GET['id'])  && $_GET['id']!='')
    {
        mysqli_query($connection,"update categories set cat_title='$categories' where cat_id='$id'");
        header("location:category.php");
    }
    else
    {
        mysqli_query($connection,"insert into categories(cat_title,status) values ('$categories','1')");
        header("location:category.php");
    }
   
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Update Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>
    <link rel="stylesheet" href="css/category.css">
    <link rel="stylesheet" href="css/dashboard.css">
 

</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="dashboard.php"> RecycleB🚮n</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-info">
          <span class="user-name">Hey, 
            <strong><?php echo $_SESSION['admin']['name']?></strong>
          </span>
         <!-- <span class="user-role">Administrator</span> -->
          
        </div>
      </div>
      <!-- sidebar-header  -->
      
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          
          <li>
            <a href="dashboard.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
         
          <li>
            <a href="category.php">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
              <span>Categories</span>
            </a>
          </li>
          <li>
            <a href="userproduct.php">
            <i class="fa fa-archive" aria-hidden="true"></i>
              <span>Products</span>
            </a>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fas fa-users"></i>
              <span>Users</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="adminUser.php">Admin Users
                  </a>
                </li>
                <li>
                  <a href="user.php">Website Users</a>
                </li>
              </ul>
            </div>
          </li>

          
          <li>
            <a href="contactAdmin.php">
            <i class="fa fa-phone" aria-hidden="true"></i>
              <span>Contact</span>
            </a>
          </li>
          
          <li>
            <a href="aboutAdmin.php">
            <i class="fas fa-user "></i>
              <span>About</span>
            </a>
          </li>

          <li>
            <a href="admin.php">
            <i class="fas fa-user "></i>
              <span>Our Team</span>
            </a>
          </li>

          <li class="header-menu">
            <span>Extra</span>
          </li>
         
         

          <li>
            <a href="logOut.php">
            <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
  </nav>
  <div><h1 class="text-center" >RecycleB🚮n</h1></div>
    <hr style="background-color: rgb(242,242,242);">
  <main class="page-content">
  
      <div class="container" >
      <div class="container">
  <div class="row py-5">
    <div class="col-12">
    <h5 class="box-title text-center">Category</h5>
     
<form>
  <div class="form-group">
   
    <input type="text" class="form-control" name="cat"  placeholder="Enter categories name" value="<?php echo $categories ?>">
    
  </div>
  <button type="submit" name="submit" class="btn btn-block btn-primary disabled">update</button>
</form>

    </div>
  </div>
</div>
      
  

   

  </div>
  </main>
</div>

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>

</html>