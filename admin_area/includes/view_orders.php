
<link href="../users/css/purchase_history.css" rel="stylesheet" />

<style>
 .purchase_history_container{
     font-size:15px;
 }  

.image_title_box img{
  width:70px;
  height:60px;
} 
.set_status{
  position:relative;
  width:12%;
}
.set_status img{
  position:absolute;
  top:3px;
}
.set_status small{
  margin:0 0 0 17px;
}
.set_status a{
  text-decoration:none;
  color:blue;
}
</style>

<?php 
if(isset($_GET['status_invoice'])){
  $status_invoice = $_GET['status_invoice'];
  
  if(isset($_GET['status'])){
    $status = $_GET['status'];
	
	if($status == 'pending'){
	  $update_status = "update payments set payment_status='Completed' where invoice_id='$status_invoice' ";
	
	}else{
	  $update_status = "update payments set payment_status='pending' where invoice_id='$status_invoice' ";
	
	}
	
	$update_payment_status = mysqli_query($con,$update_status);
	
  }
}

?>
<div class="purchase_history_container">

<table>
    
 <thead>
   <tr>
     <th colspan="2"><h2>View Orders</h2></th>
     <th>Invoice</th>
     <th>Date</th>
     <th>Price</th>
     <th>Payment Type</th>
     <th>Receipt</th>
   </tr>
 </thead> 
 
 <tr><th colspan="8"><div class="border_bottom"></div></th></tr>
 
 <?php 
 $purchase_result = mysqli_query($con,"select * from payments order by payment_id DESC");
 
 while($fetch_payment = mysqli_fetch_array($purchase_result)){
  $select_product = mysqli_query($con, "select * from products where product_id='$fetch_payment[product_id]' ");
  
  $fetch_product = mysqli_fetch_array($select_product);
 ?>
 
 <tbody>
  <tr>
    <td colspan="2" width="35%">
     <div class="image_title_box">
       <div class="purchase_image">
        <img src="product_images/<?php echo $fetch_product['product_image']; ?>"  />  
       </div> 
       
       <div class="purchase_name">
        <p><a href="../details.php?pro_id=<?php echo $fetch_product['product_id'];?>" target="_blank"> <?php echo $fetch_product['product_title']; ?></a></p>   
       </div>
     </div>    
        
    </td>   
    <td><small><?php echo $fetch_payment['invoice_id']; ?></small></td>
    <td><small><?php echo $fetch_payment['date']; ?></small></td>
    <td><small><b>RM<?php echo $fetch_payment['product_price'].'.00'; ?></b></small></td>
    <td><?php echo $fetch_payment['type']; ?></td>

    <td><a href="index.php?action=view_receipt&invoice_id=<?php echo $fetch_payment['invoice_id']; ?>">Receipt</a></td>
  </tr> 

  <tr><td colspan="8"><div class="border_bottom"></div></td></tr>  
 </tbody>
 
 <?php } ?>
 
</table>
</div><!-- /.purchase_history_container -->
