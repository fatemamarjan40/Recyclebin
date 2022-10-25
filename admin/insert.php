<?php
require 'security.php';


if(isset($_POST['save_member']))
{
	$name = $_POST['member_name'];
	$role = $_POST['member_role'];
    $description = $_POST['member_description'];
    $images = $_FILES["member_image"]["name"];
    $connection = mysqli_connect('localhost','root','','adminpanel');
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

    $query="INSERT INTO teammember(name,role,description,images) VALUES ('$name','$role','$description','$images')";
    $query_run=mysqli_query($connection, $query);

    

    
    
    if($query_run)
    {   
        move_uploaded_file($_FILES["member_image"]["tmp_name"], "image/".$_FILES["member_image"]["name"]);
    

        $_SESSION['success'] = "Member Added";
        header('Location: admin.php');
    }
    else
    {
        $_SESSION['success'] = "Member not Added";
        header('Location: admin.php');
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

    if(isset($_POST['mamber_update_btn']))
    {
        $edit_id=$_POST['edit_id'];
        $edit_name=$_POST['edit_name'];
        $edit_role=$_POST['edit_role'];
        $edit_description=$_POST['edit_description'];
      echo  $edit_member_image=$_FILES["member_image"]['name'];

    $default="images/joti.png";
    
    if(file_exists($edit_member_image))
    {
          $member_image=$edit_member_image;
    }
    else
    {
         $member_image=$default;
    }
        $connection = mysqli_connect('localhost','root','','adminpanel');


        $query="UPDATE teammember SET name='$edit_name',role='$edit_role',description='$edit_description',images='$edit_member_image' where id='$edit_id'";
        $query_run=mysqli_query($connection, $query);

        if($query_run)
        {   
        move_uploaded_file($_FILES["member_image"]["tmp_name"], "image/".$_FILES["member_image"]['name']);
        $_SESSION['success'] = "Member Updated";
        header('Location: admin.php');
        }
        else
        {
        $_SESSION['success'] = "Member not Updated";
        header('Location: admin.php');
        }
    }


    
    if(isset($_POST['delete_btn']))
    {
        $id=$_POST['delete_id'];
        $connection = mysqli_connect('localhost','root','','adminpanel');


        $query="DELETE FROM teammember where id='$id'";
        $query_run=mysqli_query($connection, $query);
    

    if($query_run)
        {   
       
        $_SESSION['success'] = "Member data is deleted";
        header('Location: admin.php');
        }
        else
        {
        $_SESSION['status'] = "Member data is not deleted";
        header('Location: admin.php');
        }
    }
 

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
 if(isset($_SESSION['success']) && $_SESSION['success']!='')
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

<script src="js/scripts.js"></script>     