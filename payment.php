
<?php 
$ip = get_ip();
$sel_cart = mysqli_query($con,"select * from cart where ip_address='$ip'");

$row_cart = mysqli_fetch_array($sel_cart);

$result_p = mysqli_query($con,"select * from products where product_id='$row_cart[product_id]' ");

$row_p = mysqli_fetch_array($result_p);
?>


<?php if(mysqli_num_rows($sel_cart) == 1){ ?>

<!-- Real Payment just Using this url: https://www.paypal.com/cgi-bin/webscr -->
<!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post">-->

<!-- Testing environment jus Using this url: https://www.sandbox.paypal.com/cgi-bin/webscr -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="metrixcodetest3@gmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $row_p['product_title']; ?>">
  <input type="hidden" name="item_number" value="<?php echo $row_p['product_id']; ?>">
  <input type="hidden" name="amount" value="<?php echo $row_p['product_price']; ?>">
  <input type="hidden" name="currency_code" value="RM">  
  
  <input type="hidden" name="quantity" value="<?php echo $row_cart['quantity']; ?>">
  
  <input type="hidden" name="return" value="<?php echo $base_url;?>payment-successful.php">
  <input type="hidden" name="cancel_return" value="<?php echo $base_url;?>">
  
 
  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="images/checkout-logo-small.png"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>

<?php }elseif(mysqli_num_rows($sel_cart) > 1){ ?>


<?php 

function get_cart_list(){
    global $con;
    global $ip;
    
    $sel_cart = mysqli_query($con,"select * from cart where ip_address='$ip'");
    
    $return = array();
    
    while($fetch_cart = mysqli_fetch_array($sel_cart)){
        
        $return[] = $fetch_cart;
    }
    return $return;
}

$cart_list = get_cart_list();

$paypal_form = '';

$paypal_form .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="business" value="metrixcodetest3@gmail.com">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="return" value="'.$base_url.'payment-successful.php">
  <input type="hidden" name="cancel_return" value="'.$base_url.'">';
  
  $i = 0;
  
  foreach($cart_list as $each_item){
  $i++;
  
  $item_name = $each_item['product_title'];
  $product_id = $each_item['product_id'];
  $price = $each_item['product_price'];
  $quantity = $each_item['quantity'];
  
  $paypal_form .='<input type="hidden" name="item_name_'.$i.'" value="'.$item_name.'">
  <input type="hidden" name="item_number_'.$i.'" value="'.$product_id.'">
  <input type="hidden" name="amount_'.$i.'" value="'.$price.'">
  <input type="hidden" name="quantity_'.$i.'" value="'.$quantity.'">
  ';
  
  }
  
   $paypal_form .='<input type="hidden" name="currency_code" value="RM"> 
  <input type="image" name="submit" border="0"
  src="images/checkout-logo-small.png"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>';

echo $paypal_form;

?>

<?php } ?>





