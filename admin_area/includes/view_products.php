

<div class="view_product_box">

<h2>View Products</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data" />


<table width="100%">
 <thead>
  <tr>
   <th>Remove</th>
   <th>ID</th>
   <th>Title</th>
   <th>Price</th>
   <th>Image</th>
   <th>Delete</th>
   <th>Edit</th>
  </tr>
 </thead>
 
 <?php 
 $all_products = mysqli_query($con,"select * from products order by product_id DESC ");
 
 $i = 1;
 
 while($row=mysqli_fetch_array($all_products)){
 ?>
 
 <tbody>
  <tr>
   <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['product_id'];?>" /></td>
   <td><?php echo $i; ?></td>
   <td><?php echo $row['product_title']; ?></td>
   <td><?php echo $row['product_price']; ?></td>
   <td><img src="product_images/<?php echo $row['product_image']; ?>" width="70" height="50" /></td>
   <td><a href="index.php?action=view_pro&delete_product=<?php echo $row['product_id'];?>">Delete</a></td>
   <td><a href="index.php?action=edit_pro&product_id=<?php echo $row['product_id'];?>">Edit</a></td>
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
// Delete Product

if(isset($_GET['delete_product'])){
  $delete_product = mysqli_query($con,"delete from products where product_id='$_GET[delete_product]' ");
  
  if($delete_product){
  echo "<script>alert('Product has been deleted successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_pro','_self')</script>";
  
  }
}

// Remove items selected using foreach loop
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];
  
  foreach($remove as $key){
  $run_remove = mysqli_query($con,"delete from products where product_id='$key'");
  
  if($run_remove){
  echo "<script>alert('Items selected have been removed successfully!')</script>";
  
  echo "<script>window.open('index.php?action=view_pro','_self')</script>";
  }else{
  echo "<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";
  }
  }
}
 ?>



