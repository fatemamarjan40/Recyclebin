<?php

$con = mysqli_connect("localhost","root","","recyclebin_users");
//getting the categories

function getcats()
{

    $connection = mysqli_connect("localhost","root","","adminpanel");
    $get_cats = "select * from categories";
    $run_cats = mysqli_query($connection, $get_cats);
    while($row_cats = mysqli_fetch_array($run_cats)){

        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        $status= $row_cats['status'];
          if( $status==1)
        echo "<li><a href='side2.php?cat=$cat_id'>$cat_title</a></li><br>";
    }
}

function getPro(){

    global $con;
    
    $get_pro = "select * from product order by RAND() LIMIT 0,6";
    $run_pro = mysqli_query($con, $get_pro);
    while($row_pro=mysqli_fetch_array($run_pro))
    {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        $pro_condition = $row_pro['product_condition'];

        echo '
        <div class="row">
      <!-- Product  -->
      <div class="col-md-4 product-grid">
        <div class="image">
          <a href="#">
          <img src = "product_images/$pro_image" class="w-100"/>
            <div class="overlay">
              <div class="detail">View Details</div>
            </div>
          </a>
        </div>
        <h5 class="text-center">$pro_title</h5>
        <h5 class="text-center">Price: $pro_price</h5>
      
      </div>
';
        
    }
}



?>
