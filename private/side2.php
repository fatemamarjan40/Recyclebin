<?php

include("include/nav.php");
?>



<!DOCTYPE html>
<?php
 include("functions.php");
 $connection = mysqli_connect("localhost","root","","adminpanel");
 $con = mysqli_connect("localhost","root","","recyclebin_users");
 
?>
<html lang="en">

<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="css/side2.css">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Service</title>
    
    <link rel="stylesheet" href="css/dashboard.css">
    <!--font awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
   
</head>
<body>



 <ul class="sidebar text-center" style="margin-top:0px;">
 <li id="cats">  
 <span class="font-weight-bold text-align">Category</span>

<a>
   <?php getcats(); ?></a>
</li>

 </ul>
 
 <div class="page-wrapper chiller-theme toggled">
        
<main class="page-content">

      <div class="container">
    <h1 class="text-center">RecycleB🚮n</h1>
    <hr>

    <div class="row">
      <!-- Product  -->
      <?php

      if(!isset($_GET['cat'])){

        global $con;
        $get_pro = "select * from product";
        $run_pro = mysqli_query($con, $get_pro);
        while($row_pro=mysqli_fetch_assoc($run_pro))
        {
            $pro_id = $row_pro['product_id'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];
            $pro_condition = $row_pro['product_condition'];
            $pro_desc = $row_pro['product_desc'];
            $product_Snumber = $row_pro['product_Snumber'];
            $product_Sname = $row_pro['product_Sname'];
            $product_Semail = $row_pro['product_Semail'];
            $status= $row_pro['status'];
            if($status==1)
            {
          ?>
          <div class="col-md-4 product-grid">
        <div class="image">
          <a href="#">
        <img src = "product_images/<?php echo $row_pro['product_image'];?>" class="w-100">
            <div class="overlay">
              <div class="detail">
              <?php echo "<a href ='details1.php?pro_id= ".$row_pro['product_id']."'> View Details</a>"?>
              </div> 
             
            </div>
          </a>
        </div>
        <h5 class="text-center"><?php echo $row_pro['product_title']; ?></h5>
        <h5 class="text-center">Price: <?php echo $row_pro['product_price']; ?></h5>
       
      </div>
      <!-- ./Product -->
<?php
            }
        
      }
    }
        ?>
       
        
        <?php
       
          if(isset($_GET['cat'])){
        
            $cat_id = $_GET['cat'];
            global $con;
            
            $get_cat_pro = "select * from product where product_cat='$cat_id'";
            $run_cat_pro = mysqli_query($con, $get_cat_pro);
         
            $count_cats = mysqli_num_rows($run_cat_pro);
            if($count_cats==0)
            {
              echo "<h2>There is no product in this category 😥</h2>";
            }
            while($row_cat_pro=mysqli_fetch_assoc($run_cat_pro))
            {
              $pro_id = $row_cat_pro['product_id'];
              $pro_price = $row_cat_pro['product_price'];
              $pro_image = $row_cat_pro['product_image'];
              $pro_condition = $row_cat_pro['product_condition'];
              $pro_desc = $row_cat_pro['product_desc'];
              $product_Snumber = $row_cat_pro['product_Snumber'];
              $product_Sname = $row_cat_pro['product_Sname'];
              $product_Semail = $row_cat_pro['product_Semail'];

              ?> 
            
                
                <div class="col-md-4 product-grid">
        <div class="image">
          <a href="#">
        <img src = "product_images/<?php echo $row_cat_pro['product_image'];?>" class="w-100">
            <div class="overlay">
            <div class="detail">
            <?php echo "<a href ='details1.php?pro_id= ".$row_cat_pro['product_id']."'> View Details</a>"?>
            </div>
            </div>
          </a>
        </div>
        <h5 class="text-center"><?php echo $row_cat_pro['product_title']; ?></h5>
        <h5 class="text-center">Price: <?php echo $row_cat_pro['product_price']; ?></h5>
       
      </div>
      <!-- ./Product -->
<?php
                
            }
        
        
      }
     
      ?>



 
   

    </div>

  </div>
  <div>
  
 
  </div>
  </main>

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
 
 
 <div>
  
  <?php 
 include("footer.php");
 ?>
 </div>
 </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


</body>
</html>