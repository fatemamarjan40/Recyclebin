<?php
include("include/nav.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<?php
 include("functions.php");
 
 $con = mysqli_connect("localhost","root","","recyclebin_users");
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Service</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/viewcss.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>

    
  <!-- sidebar-wrapper  -->

  
      <div class="container">
   
    <hr>
   
      <!-- Product  -->
      <?php
     
    

      if(isset($_GET['pro_id'])){

        $product_id = $_GET['pro_id'];
        global $con;
        $get_pro = "select * from product where product_id = '$product_id'";
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
          ?>
         
        
        
          <a href="#">
        <img src = "product_images/<?php echo $row_pro['product_image'];?>" weight="50%" height="40%">
          
          </a>
        
        <!--
        <h5 class="text-center"><?php echo $row_pro['product_title']; ?></h5>
        <h5 class="text-center">Price: <?php echo $row_pro['product_price']; ?></h5>
        -->
        </span>
<article class="card-body p-5">
	<h3 class="title mb-3"><?php echo $row_pro['product_title']; ?></h3>

<p class="price-detail-wrap"> 
	<span class="price h3 text-warning"> 
		<span >PRICE :</span><span><?php echo $row_pro['product_price']; ?>TK</span>
	</span> 
	
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p><?php echo $row_pro['product_desc'];?></p></dd>
</dl>
<dl class="param param-feature">
  <dt>Product Condition</dt>
  <dd><p><?php echo $row_pro['product_condition'];?></p></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Seller Info :</dt>
  
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Seller Name :</dt>
  <dd><p><?php echo $row_pro['product_Sname'];?></p></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Seller Contact:</dt>
  <dd><p><?php echo $row_pro['product_Snumber'];?></p></dd>
</dl>

</article> <!-- card-body.// -->
		</span> <!-- col.// -->
      </div>
      
      <!-- ./Product -->
        
      <!-- ./Product -->
<?php
     
        
      }
    }
        ?>
       
        
        



 
   

    </div>

  </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>

</html>
<?php
include("footer.php");
?>