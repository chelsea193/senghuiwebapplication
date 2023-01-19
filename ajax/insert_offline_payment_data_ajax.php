

<?php 

session_start();

include '../includes/db.php'; 

$message = '';

$error = '';

$tx_id = '';

if(isset($_SESSION['user_id'])){

 $select_cart = mysqli_query($con,"select * from cart where ip_address='$_POST[userIP]' and buyer_id='$_POST[userID]' ");
 
 // Getting buyer additional notes
 $select_additional = mysqli_query($con,"select * from additional_notes where user_id='$_POST[userID]' ");
 
 if(mysqli_num_rows($select_additional) > 0){
   $fetch_additional = mysqli_fetch_array($select_additional);
   
   $additional_content = $fetch_additional['note_content'];
   
 }else{
   $additional_content = '';
 }
 
 if(mysqli_num_rows($select_cart) > 0){
 
 if(isset($_SESSION['checked_on_page_reload_offline_type'])){
 
 $tx_id .= uniqid();
  
 //$offline_payment_type = $_POST['offline_payment_type']; 
  $offline_payment_type = $_SESSION['checked_on_page_reload_offline_type'];
  
  while($fetch_cart = mysqli_fetch_array($select_cart)){
    $quantity = $fetch_cart['quantity'];
	
	$date = date("y/m/d");
	
	// Insert offline payment data to database
	$insert_payment = mysqli_query($con,"insert into payments (tx_id,product_id, product_price, buyer_id, invoice_id, currency_code,  payer_email, quantity, amount, date, type, payment_type, additional_notes) values ('$tx_id','$fetch_cart[product_id]','$fetch_cart[product_price]','$fetch_cart[buyer_id]','$fetch_cart[invoice_number]','RM','$_SESSION[email]','$quantity','$fetch_cart[product_price]','$date','$offline_payment_type','Offline Payment', '$additional_content')");  
  }
  
 if($insert_payment){
// Deleting products from the cart 
$remove_cart = mysqli_query($con,"delete from cart where buyer_id='$_POST[userID]' and ip_address='$_POST[userIP]' ");

// Removing additional notes

$remove_addition = mysqli_query($con,"delete from additional_notes where user_id='$_POST[userID]'");

$message .= "ok";
} 
}else{
$error .= "offline type empty";
}
  
}else{
  $error .= "empty";
  
  $tx_id .= 0;
}


}else{
 $message .= "logged out";
}

$array = array($message,$error,$tx_id);

echo json_encode($array);

?>