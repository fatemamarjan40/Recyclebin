<?php
$connection = mysqli_connect('localhost','root','','adminpanel');
$categories='';
/*if(isset($_POST['submit']))
{
    $categories=$_POST['cat'];
    mysqli_query($connection,"")
    

}*/
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
    }
    else
    {
        mysqli_query($connection,"insert into categories(cat_title,status) values ('$categories','1')");
    }
    header('location:category.php');
    die();
}

if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=$_GET['id'];
    $res=mysqli_query($connection,"select * from categories where cat_id='$id'");
    $row=mysqli_fetch_assoc($res);
    $categories=$row['cat_title'];

}
if(isset($_POST['submit'])){
    $categories=$_POST['cat'];
    if(isset($_GET['id'])  && $_GET['id']!='')
    {
        mysqli_query($connection,"update categories set cat_title='$categories' where cat_id='$id'");
    }
    else
    {
        mysqli_query($connection,"insert into categories(cat_title,status) values ('$categories','1')");
    }
    header('location:category.php');
    die();
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
require 'security.php';
?>

    <div class="container-fluid">
    	<div class="card shadow mb-4">
    		<div class="card header py-3">
    			<h6 class="m-0 font-weight-bold text-primary">Member Edit
                </h6>   
    		</div>
    	</div>
    	<div class="card-body">

    		<?php
              if(isset($_POST['edit_data']))
              {
	            $id = $_POST['edit_id'];
	            $query="SELECT * FROM teammember where id='$id'";
	            $query_run=mysqli_query($connection, $query);

	            foreach($query_run as $row)
	            {

            ?>

            <form action="insert.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">

                <div class="form-group">
                <label >Name</label>
                <input type="text" name="edit_name" value="<?php echo $row['name']?>" class="form-control">
            </div>

             <div class="form-group">
                <label >Role</label>
                <input type="text" name="edit_role" value="<?php echo $row['role']?>" class="form-control" >
            </div>

             <div class="form-group">
                <label >Description</label>
                <input type="text" name="edit_description" value="<?php echo $row['description']?>" class="form-control" >
            </div>

             <div class="form-group">
                <label >Upload Image</label>
                <input type="file" name="member_image" id="member_image" value="<?php echo $row['images']?>" class="form-control">
            </div>

            <a href="admin.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="mamber_update_btn" class="btn btn-primary">Update</button>
    			
    		</form>

            <?php
                } 
	        }
    		?>
    		
    		
    	</div>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          
</body>
</html>


       
          
