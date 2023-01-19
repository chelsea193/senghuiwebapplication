

<div class="view_product_box">

<h2>View Offline Payments</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data" />



<table width="100%">
 <thead>
  <tr>
   <th>ID</th>
   <th>Title</th>
   <th>Value</th>   
   <th>Content</th>
   <th></th>
   <th>Edit</th>
  </tr>
 </thead>
 
 <?php 
 $all_categories = mysqli_query($con,"select * from offline_payment order by id ASC ");
 
 $i = 1;
 
 while($row=mysqli_fetch_array($all_categories)){
 ?>
 
 <tbody>
  <tr>
   
   <td><?php echo $i; ?></td>
   <td><?php echo $row['title']; ?></td>
   <td><?php echo $row['value']; ?></td>
   <td colspan="2" width="35%"><p><?php echo $row['content']; ?></p><br></td> 
   
   <td><a href="index.php?action=edit_offline_payment_content&id=<?php echo $row['id'];?>">Edit</a></td>
  </tr>
 </tbody>
 
 <?php $i++;} // End while loop ?>
 

</table>

</form>

</div><!-- /.view_product_box -->





