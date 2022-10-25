
<?php 
require("include/nav.php");
$connection = mysqli_connect('localhost','root','','recyclebin_users');
$con = mysqli_connect('localhost','root','','adminpanel');
$id=$_SESSION['user']['id'];
$query ="select * from user_info where id='". $id."'";
//echo $query;die;
$result= mysqli_query($connection, $query)  or die(mysqli_error($connection));
$row=mysqli_fetch_assoc($result);
 $fname=$row['FirstName'];
//echo " ";
 $lname=$row['lastName'];
//echo " ";
 $pass=$row['password'];
//echo " ";
 $email=$row['email'];
//echo " ";
 $pro_pic=$row['profile_pic'];
//echo " ";
 $loc=$row['location'];
//echo " ";
 $phn=$row['contactNo'];

if(isset($_POST['reset']))
{
  header("location:user_profile.php");
}


if(isset($_POST['save']))
{
  

    $edit_fname=$_POST['first_name'];
    $edit_lname=$_POST['last_name'];
    $edit_email=$_POST['email'];
    $edit_pass=$_POST['password'];
    $edit_loc=$_POST['location'];
    $phn =$_POST['phone'];
    $edit_member_image=$_FILES['pro_pic']['name'];
    if(!file_exists($edit_member_image))
    {
          $edit_member_image=$pro_pic;
    }
  
    


    $query="UPDATE user_info SET email='$edit_email',FirstName='$edit_fname',lastName='$edit_lname',password='$edit_pass',profile_pic='$edit_member_image',location='$edit_loc',
    contactNo='$phn'  where id='$id'";
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {   
    move_uploaded_file($_FILES['pro_pic']['tmp_name'], "profile pictures/".$_FILES['pro_pic']['name']);
    echo "updated";
    header('Location: user_profile.php');
    }
    else
    {
    
    $_SESSION['success'] = "Member not Updated";
    header('Location:user_profile.php');
    }
}



?>

<html>

<head>
  <title>user profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body style="background-color:rgb(241,241,241);">
<hr>
<div class="container bootstrap snippet">

    <div class="row">
  	  <div class="col-sm-3"><!--left col-->              
      <?php echo '<image src="assets/'.$pro_pic.'" width="200px;" height="200px;" class=" img-circle img-thumbnail" alt="avatar>'?> 
     
      
      
      <div class="col-sm-10 "><h1><?php  echo $fname." ".$lname;?></h1></div>
       
       
               
         
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#settings">Add Product</a></li>
              </ul>
        
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="user_profile.php" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value="<?php echo $fname;?>" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" value="<?php echo $lname;?>" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone"  value="<?php echo $phn;?>" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="mobile" placeholder="enter mobile email" value="<?php echo $email;?>" title="enter your email address.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="text" class="form-control" id="location" name="location" placeholder="somewhere" value="<?php echo $loc;?>" title="enter a location">
                          </div>
                      </div>
                        <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="text" class="form-control" name="password" id="password" placeholder="password"  value="<?php echo $pass;?>" title="enter your password.">
                          </div>
                      </div>
                      
                      <div class="form-group " action="user_profile.php">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" name="save" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" name="reset" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                      <br>
                      <br>
              	</form>
              
              <hr>
              
             </div>
             
             <!--/tab-pane-->
             
             <div class="tab-pane" id="settings">
             <title>POST AD</title>
  
  
  <div class="container">
   <h2 align="center">post your ad</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
   <form action ="user_profile.php" method="post" enctype="multipart/form-data">
  
     <br />
    
     <div class="form-group">
      <label>Product Title:</label>
     
      <input type="text" name="product_title" placeholder="Enter product title" class="form-control" />
     </div>
     <div class="form-group">
      <label>Product Category:</label>
      <select name="product_cat">
         <option>Select A Category</option>
         <?php

            $get_cats = "select * from categories";
            $run_cats = mysqli_query($con, $get_cats);
            while($row_cats = mysqli_fetch_array($run_cats)){

                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];
                 echo "<option value='$cat_id'>$cat_title</option>";
}

         ?>
         </select>
     </div>
     <div class="form-group">
      <label>Product Image:</label>
      <input type="file" name="product_image" />
     </div>
     <div class="form-group">
      <label>Product_condition:</label>
      <input type="text" name="product_condition"  placeholder="new or used" class="form-control"/>
     </div>
     <div class="form-group">
      <label>Product Price:</label>
      <input type="text" name="product_price"  placeholder="Enter product price" class="form-control"/>
     </div>
     <div class="form-group">
      <label>Product Description:</label>
      <textarea name="product_desc" class="form-control" placeholder="Add Description"></textarea>
     </div>
     <div class="form-group">
      <label>Product Keywords:</label>
      <input type="text" name="product_kwords"  class="form-control" placeholder="Enter Keywords"/>
     </div>
     <br/>
     <div font-bold>
      <label >Contact Details</label>
     </div>
     <br/>
     <div class="form-group">
      <label>Seller Number:</label>
      <input type="text" name="product_Snumber"  placeholder="Enter Number" value="<?php if(!empty($phn)) echo $phn ?>" class="form-control"/>
     </div>
     <div class="form-group">
      <label>Seller Name:</label>
      <input type="text" name="product_Sname"  placeholder="Enter Name"  value="<?php echo $fname." ".$lname ?>"class="form-control"/>
     </div>
     <div class="form-group">
      <label>Seller Email:</label>
      <input type="text" name="product_Semail"  placeholder="Enter Email"  value="<?php echo $email ?>" class="form-control"/>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="insert_post" class="btn btn-info" value="Post Now" />
     </div>
    </form>
   </div>
  </div>
            		
               	
                 
                
              </div>
               
            </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    <br>
                      <br>
<?php include('footer.php');?>
</body>


</html>

<?php

if(isset($_POST['insert_post'] )){

    //getting the text data from the fields
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_kwords = $_POST['product_kwords'];
    $product_condition = $_POST['product_condition'];
    $product_Snumber = $_POST['product_Snumber'];
    $product_Sname = $_POST['product_Sname'];
    $product_Semail = $_POST['product_Semail'];


    //category title
    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con, $get_cats);
    while($row_cats = mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['cat_id'];
    if($cat_id==$product_cat)
    $cat_title = $row_cats['cat_title'];
    echo "$cat_title";
}


    //getting image
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
   
    move_uploaded_file($product_image_tmp,"product_images/$product_image");

     $insert_product = "insert into product
    (product_cat,product_title,product_price,product_desc,product_image,product_kwords,product_condition,product_Snumber,product_Sname,product_Semail,category,status)values('$product_cat','$product_title ','$product_price','$product_desc','$product_image',' $product_kwords','$product_condition','$product_Snumber','$product_Sname','$product_Semail','$cat_title','1')";

    $insert_pro = mysqli_query($connection,$insert_product);

    if($insert_pro)
    {
        echo "<script>alert('product has been inserted')</script>";
        echo "<script>window.open('user_profile.php','_self')</script>";
    }
}

?>




