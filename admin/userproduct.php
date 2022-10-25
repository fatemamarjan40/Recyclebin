<?php
$connection = mysqli_connect('localhost','root','','recyclebin_users');
$con = mysqli_connect('localhost','root','','adminpanel');
?>

<?php
session_start();
if(isset($_GET['type']) && $_GET['type']!='')
{
    $type=$_GET['type'];
   // echo $type;
    if($type=='status')
    {
         $operation = $_GET['operation'];
        $id = $_GET['id'];
       
        if($operation=='deactive')
        {
            $status='0';

        }
        else
        {
             $status='1';

        }
       // echo $operation." ".$id." ".$status;
        $update_status ="update product set status='$status' where product_id = '$id'";
        mysqli_query($connection,$update_status);

    }
}

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>User Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>
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
<!-- page content start-->

<div class="container-fluid">
    <div class="card shadow mb-4">
         
              <div class="card">
                 <div class="card-header">
                     <h4 class="card-title text-center"> Product Information </h4>
                 </div>
                   <div class="card-boby">
                        <div class="row">
                           <div class="col-md-3">

                           <form action="userproduct.php" method="POST">
        
                             
                                
                                 <div class="form-group">
                                    <label>Product Category:</label>
                                      <select name="get_id">
                                     <option>Select A Category</option>
            <?php

            $get_cats = "select * from categories";
            $run_cats = mysqli_query($con, $get_cats);
            while($row_cats = mysqli_fetch_array($run_cats)){

            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];
            echo "<option value='$cat_title'>$cat_title</option>";
            }

         ?>
         </select>
     </div>
                               </div>
                             <button type="submit" name="search_by_category" class="btn btn-primary">SEARCH </button>      
                           
                           </form>
                           
                           </div>
                        </div>

                        <?php


                        if(isset($_POST['get_id']))
                        {
                           $name = $_POST['get_id'];
                           
                           $query="SELECT * FROM product where category='$name'";
                           $query_run=mysqli_query($connection, $query);
                        }
                        else
                        {
                            $query="SELECT * FROM product";
                            $query_run=mysqli_query($connection, $query);

                        }

                        if(isset($_POST['delete_btn']))
                        {
                             $id=$_POST['delete_id'];

                            $query="DELETE FROM product where product_id='$id'";
                            $qu=  mysqli_query($connection, $query);
                            if($qu)
                            {
                                echo "<script>alert('product has been deleted')</script>";
                                echo "<script>window.open('userproduct.php','_self')</script>";
                            }

                        }
                        
                    
                           
                        
                        ?>
                        <table class="table responsive">
                            <table class="table table-bordered">
    					<thead>
    						<tr>
                                
    							<th>ID</th>
    							<th>User Name</th>
    							<th>User Email</th>
                                <th>User Number</th>
    							<th>Category</th>
                                <th>Image</th>
    							<th>Product_Name</th>
    							<th>Price</th>
    							<th>Description</th>
                                <th>Condition</th> 
                                <th>Status</th>
                                <th>Delete</th> 
                                
                            </tr>
    					</thead>
    					<tbody>

                        
                        <?php
                           

                           while ($row= mysqli_fetch_assoc($query_run) ) 
                           {
                           
                       ?>
                        
                             <tr>

                                <td><?php echo $row['product_id']?></td>
    							<td><?php echo $row['product_Sname']?></td>
    							<td><?php echo $row['product_Semail']?></td>
                                <td><?php echo $row['product_Snumber']?></td>
    							<td><?php echo $row['category']?></td>
                                <td><?php echo '<image src="image/'.$row['product_image'].' " width="100px;" height="100px;" alt="image">'?></td> 
    							<td><?php echo $row['product_title']?></td>
                                <td><?php echo $row['product_price']?></td>
    							<td><?php echo $row['product_desc']?></td>
    							<td><?php echo $row['product_condition']?></td>
                            <td> 
                            <?php 
              if( $row['status']==1)
              echo "<a  class='badge badge-success' href='?type=status&operation=deactive&id=".$row['product_id']."'>Active</a>&nbsp";
              //echo ' <a href="?type=status&operation=deactive&id="'.$row['cat_id'].' class="badge badge-success badge-success-alt">Enable  </a>';
              else
              echo "<a class='badge badge-danger' href='?type=status&operation=active&id=".$row['product_id']."'>Block</a>&nbsp";
             // echo' <a href="?type=delete&operation=active&id="'.$row['cat_id'].'>Delete</a>';
              ?>
                            </td>
                           
                           
                            <td> 
                                 <form action="userproduct.php" method="POST">
                                 <input type="hidden" name="delete_id" value="<?php echo $row['product_id']?>">
                                 <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE </button>
                                 </form>
                            </td>
                               
                            </tr>

                            <?php   
                       }
                       ?>
    					</tbody>
    				</table>
                  </div>
               
           </div>
       </div>


<!-- page content end-->
  </main>
</div>

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>

</html>