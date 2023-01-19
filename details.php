<?php include('includes/header.php'); ?>
<style>
img {  
    width: 350px; 
    float: left; 
    margin-right: 10px; 
  } 
.right-column{ 
    float: left; 
    margin-left:200px;
    width: calc(100% - 350px - 10px); 
  } 

/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}

/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}

.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}

.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}
.main_container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
}
footer{
    text-align:center;
}
</style> 
<body>
<?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
} 

$product_id = $_GET['pro_id'];
		  
$run_query_by_pro_id = mysqli_query($con, "SELECT * from products  where product_id='$product_id' ");

while($row_pro = mysqli_fetch_array($run_query_by_pro_id)){

    $pro_id = $row_pro['product_id'];
    $pro_brand = $row_pro['product_brand'];
    $pro_name = $row_pro['product_title'];
    $pro_price = $row_pro['product_price'];
    $pro_image = $row_pro['product_image'];	
    $pro_desc=$row_pro['product_desc']	;

echo"

<div class='main_container'>
<div class='left-column'>
<img src='admin_area/product_images/$pro_image'  />
</div>

<div class='right-column'>
<div class='product-description'>
<h1>$pro_name</h1>
<p>$pro_desc </p>
</div>

<div class='product-price'>
  <span>RM$pro_price</span>
  <a href='all_products.php?add_cart=$pro_id' class='cart-btn'>Add to cart</a>
</div>
</div>
</div>";



};

?>

</body> 

  <?php include ('includes/footer.php'); ?>
  
  