


<?php 

$select_payment = mysqli_query($con,"select * from payments where tx_id='$_GET[code]' ");

$fetch_invoice = mysqli_fetch_array($select_payment);

$checkout_invoice = $fetch_invoice['invoice_id'];

$select_user = mysqli_query($con,"select * from users where id='$fetch_invoice[buyer_id]'");

$fetch_user = mysqli_fetch_array($select_user);

?>

<div class="checkout_container">
	  
  <div class="checkout_header">
  
  <div class="checkout_header_box">
  <h1><i class="fa fa-check"></i> Checkout</h1>
  </div><!-- /.checkout_header_box -->
  
  </div><!---/.checkout_header -->
  
  <div class="payment_successful_container">
   <div class="payment_successful_box">
    
	<div class="payment_successful_left">
	 <div class="payment_successful_left_box">
	  <img src="images/payment_successful.png">
	</div><!--/.payment_successful_left_box------->
	</div><!--/.payment_successful_left------------->
	
	<div class="payment_successful_right">
	 <div class="payment_successful_right_box">
	  <div class="thank_you_box">
	   <i class="fa fa-check"></i> Thank you. Your order was completed successfully!
	  </div>
	  
	  <div class="checkout_invoice_box">
	  <?php echo $checkout_invoice; ?> <a href="my_account.php?action=view_receipt&invoice_id=<?php echo $checkout_invoice;?>" target="_blank"><i class="fa fa-angle-right"></i></a>
	  </div>
	  
	  <?php 
	  $select_payment_by_invoice = mysqli_query($con,"select * from payments where invoice_id='$checkout_invoice' ");
	  
	  while($row_payment = mysqli_fetch_array($select_payment_by_invoice)){
	   
	   $select_product = mysqli_query($con,"select * from products where product_id='$row_payment[product_id]' ");
	   
	   $row_product = mysqli_fetch_array($select_product);
	  ?>
	  
	  <p><?php echo $row_payment['quantity'];?> x <?php echo $row_product['product_title'];?></p>
	  
	  <?php } ?>
	  
	  <p>The details of the order have been sent to an email address <span style="color:orange"> <?php echo $fetch_user['email'];?></span>. If you do not receive this email please check your <b>Spam</b> or <b>Junk</b> mail folder.</p>
	  
	</div><!--/.payment_successful_right_box------->
	</div><!--/.payment_successful_right------------->
	
   </div><!--/.payment_successful_box------------------->
  </div><!--/.payment_successful_container----------------->
  
</div><!--/.checkout_container-------------------------------->