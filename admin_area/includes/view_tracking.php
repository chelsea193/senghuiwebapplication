<div class="view_product_box">

<h2>View Record</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data" />



<table width="100%">
 <thead>
  <tr>
   <th>Remove</th>
   <th>ID</th>
   <th>IC</th>
   <th>Product</th>
   <th>Order Status</th>
   <th>Date</th>
   <th>Delete</th>
   <th>Edit</th>
  </tr>
 </thead>

 <?php 
 $all_record = mysqli_query($con,"SELECT * FROM tcustomer JOIN customerclass WHERE tcustomer.ostatus = customerclass.cid");
 
 $i = 1;
 
 while($row=mysqli_fetch_array($all_record)){
 ?>
 
 <tbody>
  <tr>
   <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['id'];?>" /></td>
   <td><?php echo $i; ?></td>
   <td><?php echo $row['sIC']; ?></td>
   <td><?php echo $row['pname']; ?></td>
   <td><?php echo $row['cname']; ?></td>
   <td><?php echo $row['tdate']; ?></td>

   <td><a href="index.php?action=view_tracking&delete_tracking=<?php echo $row['id'];?>">Delete</a></td>
   <td><a href="index.php?action=edit_tracking&id=<?php echo $row['id'];?>">Edit</a></td>
  </tr>
 </tbody>
 
 <?php $i++;} // End while loop ?>
 
<tr>
<td><input type="submit" name="delete_all" value="Remove" /></td>
</tr> 
</table>

</form>

</div><!-- /.view_product_box -->

<?php
// Delete Record

if(isset($_GET['delete_tracking'])){
  $delete_tracking = mysqli_query($con,"delete from tcustomer where id='$_GET[delete_tracking]' ");
  
  if($delete_tracking){
  echo "<script>alert('Record has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_tracking','_self')</script>";
  
  }
}

// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($con,"delete from tcustomer where id='$key'");
  
  if($run_remove){
  echo "<script>alert('Record selected have been removed successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_tracking','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";
  }
  }
}
 ?>