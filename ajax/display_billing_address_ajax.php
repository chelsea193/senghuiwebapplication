

<?php 
session_start();

if(isset($_SESSION['user_id'])){

include '../includes/db.php';

$user_id = $_POST['post_user_id'];

$invoice_number = $_POST['invoice_number'];

$select_user = mysqli_query($con,"select * from users where id='$user_id' ");

$fetch_user = mysqli_fetch_array($select_user);

//echo $fetch_user['user_address'];

$select_note = mysqli_query($con,"select * from additional_notes where user_id='$user_id' ");

if(mysqli_num_rows($select_note) > 0){

  $update = mysqli_query($con,"update additional_notes set invoice_number='$invoice_number' where user_id='$user_id' ");
  
}else{
  $insert_note = mysqli_query($con,"insert into additional_notes (invoice_number, user_id, type, payment_type) values ('$invoice_number', '$user_id', 'offline', 'Offline Payment' ) ");
}

$fetch_note = mysqli_fetch_array($select_note);
?>

<div class="billing_address_box">
 <div class="billing_address_header">
  <h3>Owner Information</h3> <i class="fa fa-pencil"> Edit</i>
  
  <div class="billing_address_border_header"></div>
 </div>
 
 <div class="billing_address_content">
	 <p><strong><?php echo $fetch_user['name'];?></strong></p>
	 <p><?php echo $fetch_user['user_address']; ?></p>
	 <p>IC: <?php echo $fetch_user['IC']; ?></p>
	 <p>Contact: <?php echo $fetch_user['contact']; ?></p>
 
	 <div class="additional_info_box">
	  <p>Additional Notes </p>
	  
	  <textarea id="checkout_additional_editor" placeholder="You can enter any additional notes or information you want inclued with your order here..."><?php echo $fetch_note['note_content']; ?></textarea>
	 </div>
 
 </div>
</div>


<div class="billing_address_form_box" style="display:none">
 <div class="billing_address_header">
  <h3>Edit Owner Information</h3> <i class="fa fa-close"></i>
  
  <div class="billing_address_border_header"></div>
 </div>
 
 <div class="billing_address_content">
	 <p><input type="text" id="edit_name" value="<?php echo $fetch_user['name'];?>"></p>
	 <p><textarea id="edit_user_address"><?php echo $fetch_user['user_address']; ?></textarea></p>
	 <p><input type="text" id="edit_IC" value="<?php echo $fetch_user['IC']; ?>"></p>
	 <p><input type="text" id="edit_contact" value="<?php echo $fetch_user['contact']; ?>"></p>
 
	 <div class="additional_info_box">
	  <p>Additional Notes </p>
	  
	  <textarea id="checkout_additional_editor" class="checkout_additional_editor" placeholder="You can enter any additional notes or information you want inclued with your order here..."><?php echo $fetch_note['note_content']; ?></textarea>
	 </div>
     
	 <div class="edit_billing_address_btn_box">
	  <button id="update_billing_address_btn" data-user_id="<?php echo $user_id; ?>" data-invoice_number="<?php echo $invoice_number; ?>">Update</button>
	  
	  <button id="cancel_billing_address_btn">Cancel</button>
	 </div>
 </div>
</div>

<?php } ?>

