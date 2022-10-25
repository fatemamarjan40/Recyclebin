<?php

$connection = mysqli_connect('localhost','root','','recyclebin_users');

if(isset($_POST['save_user']))
{
  $firstName=$_POST['user_fname'];
    $lastName=$_POST['user_lname'];
    $email=$_POST['user_email'];
    $images = $_FILES["user_image"]["name"];
   
    /*if(!$connection)
    {
       die("Not connected.".mysqli_error($connection));

    }
     $query="INSERT INTO member(name,role,description,images) VALUES ('$name','$role','$description','$images')";
    $query_run=mysqli_query($connection, $query);
    if(!$query_run)
    {
          die("Not inserted".mysqli_error($connection));
    }*/

    $query="INSERT INTO user_info(FirstName,lastName,email,profile_pic) VALUES ('$firstName','$lastName','$email','$images')";
    $query_run=mysqli_query($connection, $query);

    

   
    
    if($query_run)
    {   
        move_uploaded_file($_FILES["user_image"]["tmp_name"], "image/".$_FILES["user_image"]["name"]);
    

        $_SESSION['success'] = "User Added";
        header('Location: user.php');
    }
    else
    {
        $_SESSION['success'] = "User not Added";
        header('Location: user.php');
    }

    /*if($query_run)
    {   
        move_uploaded_file($_FILES["member_image"]["tmp_name"], "upload/".$_FILES["member_image"]["name"]);
        $_SESSION['success'] = "Member Added";
        header('Location: admin.php');
    }
    else
    {
        $_SESSION['success'] = "Member not Added";
        header('Location: admin.php');
    }*/
    
    }

   

    
    if(isset($_POST['delete_user']))
    {
        $id=$_POST['delete_iduser'];
        $connection = mysqli_connect('localhost','root','','recyclebin_users');


        $query="DELETE FROM user_info where id='$id'";
        $query_run=mysqli_query($connection, $query);
    

    if($query_run)
        {   
       
        $_SESSION['success'] = "User data is deleted";
        header('Location: user.php');
        }
        else
        {
        $_SESSION['status'] = "User data is not deleted";
        header('Location: user.php');
        }
    }
 
?>

<!DOCTYPE html>
<html>
<head>
     
     <script src="https://kit.fontawesome.com/290a1a6c66.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="css/style.php" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
</head> 

<body>
<?php
include('security.php'); 
?>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="user.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      	   <div class="form-group">
                <label >First Name</label>
                <input type="text" name="user_fname" class="form-control" placeholder="Enter FirstName" required>
            </div>

             <div class="form-group">
                <label >Last Name</label>
                <input type="text" name="user_lname"  class="form-control" placeholder="Enter LastName"required>
            </div>

             <div class="form-group">
                <label >Email</label>
                <input type="text" name="user_email"  class="form-control" placeholder="Enter Email"required>
            </div>

             <div class="form-group">
                <label >Upload Image</label>
                <input type="file" name="user_image" id="user_image"class="form-control">
            </div>

            
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save_user"class="btn btn-primary">Save </button>
      </div>
     </form>
    </div>
  </div>
</div>



    <div class="container-fluid">
    	<div class="card shadow mb-4">
    		<div class="card header py-3">
    			<h6 class="m-0 font-weight-bold text-primary">Total registered Users
    				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">ADD User
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
                    $connection = mysqli_connect('localhost','root','','recyclebin_users');
                    $query="SELECT * FROM user_info";
                    $query_run=mysqli_query($connection, $query);
                    

                    
                       
                    ?>

    				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    					<thead>
    						<tr>
                                
    							<th>ID</th>
    							<th>First Name</th>
    							<th>Last Name</th>
    							<th>Email</th>
    							<th>Image</th>
    							<th>DELETE</th>
    						</tr>
    					</thead>
    					<tbody>
                            <?php
                           

                            while ($row= mysqli_fetch_assoc($query_run)) 
                            {
                        ?>

                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['FirstName']?></td>
                            <td><?php echo $row['lastName']?></td> 
                            <td><?php echo $row['email']?> </td> 
                            <td><?php echo '<image src="image/'.$row['profile_pic'].' " width="100px;" height="100px;" alt="image">'?></td> 

                            <td> 
                                 <form action="user.php" method="POST">
                                 <input type="hidden" name="delete_iduser" value="<?php echo $row['id']?>">
                                 <button type="submit" name="delete_user" class="btn btn-danger"> DELETE </button>
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
    </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          
</body>
</html>
