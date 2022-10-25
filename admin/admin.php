
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
    <title>Dashboard</title>
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
<?php
include('security.php');  
?>
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
<!-- Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="insert.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      	   <div class="form-group">
                <label >Name</label>
                <input type="text" name="member_name" class="form-control" placeholder="Enter Name" required>
            </div>

             <div class="form-group">
                <label >Role</label>
                <input type="text" name="member_role"  class="form-control" placeholder="Enter Role"required>
            </div>

             <div class="form-group">
                <label >Description</label>
                <input type="text" name="member_description"  class="form-control" placeholder="Enter Description"required>
            </div>

             <div class="form-group">
                <label >Upload Image</label>
                <input type="file" name="member_image" id="member_image"class="form-control">
            </div>

            
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save_member"class="btn btn-primary">Save </button>
      </div>
     </form>
    </div>
  </div>
</div>



    <div class="container-fluid">
    	<div class="card shadow mb-4">
    		<div class="card header py-3">
    			<h6 class="m-0 font-weight-bold text-primary"> Team Members
    				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamModal">ADD
                    </button>
                 </h6>   
    		</div>

    		<div class="card-body">

    		<?php
    		if(isset($_SESSION['success']) && $_SESSION['success']!='')
    		{
    			echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
    			unset($_SESSION['success']);
    		}

    		if(isset($_SESSION['status']) && $_SESSION['status']!='')
    		{
    			echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
    			unset($_SESSION['status']);
    		}
    		?>
    			<div class="table-responsive">
                    <?php
                    $query="SELECT *FROM teammember";
                    $query_run=mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run)>0)
                    {
                       
                    ?>

    				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    					<thead>
    						<tr>
                                
    							<th>ID</th>
    							<th>Name</th>
    							<th>Role</th>
    							<th>Description</th>
    							<th>Image</th>
    							<th>EDIT</th>
    							<th>DELETE</th>
    						</tr>
    					</thead>
    					<tbody>
                            <?php
                            while ($row= mysqli_fetch_assoc(  $query_run)) 
                       { 
                        ?>

                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['role']?></td> 
                            <td><?php echo $row['description']?> </td> 
                            <td><?php echo '<image src="image/'.$row['images'].' " width="100px;" height="100px;" alt="image">'?></td> 
                            <td> 
                                <form action="member_edit.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                                <button type="submit" name="edit_data" class="btn btn-success"> EDIT </button>
                                </form>
                            </td>
                            <td> 
                                 <form action="insert.php" method="POST">
                                 <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                                 <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE </button>
                                 </form>
                            </td>
                                
                            </tr>
                        <?php   
                       }
                       ?>
    					</tbody>
    				</table>


                       <?php
                    }
                    else
                    {
                        echo "No Record Found";
                    }
                    ?>
    			
                </div>
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