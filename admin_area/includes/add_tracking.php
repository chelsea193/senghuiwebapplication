<div class="form_box">

<form action="" method="post" enctype="multipart/form-data">
  
  <table align="center" width="100%">
    
    <tr>
      <td colspan="7">
      <h2>Add New Record</h2>
      <div class="border_bottom"></div><!--/.border_bottom -->
      </td>
    </tr>
    
    <tr>
      <td><b>IC:</b></td>
      <td><input type="text" name="sIC" size="60" required/></td>
    </tr>
    
    <tr>
      <td><b>Product Name:</b></td>
      <td><input type="text" name="pname" size="60" required/></td>
    </tr>
    
    <tr>
      <td><b>Order Status:</b></td>
      <td>
       <select name="ostatus">
         <option>Select a Status</option>
       <?php
         $get_status = "select * from customerclass";
   
   $run_status = mysqli_query($con, $get_status);
   
   while($row_status = mysqli_fetch_array($run_status)){
        $cid = $row_status['cid'];
        
        $cname = $row_status['cname'];
        
        echo "<option value='$cid'>$cname</option>";
   }
   
   ?>
       </select>
      </td>
      
    </tr>
   
    <tr>
     <td><b>Date: </b></td>
     <td><input type="text" name="tdate" required/></td>
   </tr>

   <tr>
      <td></td>
      <td colspan="7"><input type="submit" name="insert_post"value="Add Record" /></td>
   </tr>
  </table>
  
</form>

</div><!-- /.form_box -->

<?php 

if(isset($_POST['insert_post'])){
$sIC = $_POST['sIC'];
$pname = $_POST['pname'];
$ostatus = $_POST['ostatus'];
$tdate = $_POST['tdate'];


$insert_record = " insert into tcustomer (sIC,pname,ostatus,tdate) 
values ('$sIC','$pname','$ostatus','$tdate') ";

$insert_rec = mysqli_query($con, $insert_record);

if($insert_rec){
echo "<script>alert('Record Has Been inserted successfully!')</script>";

//echo "<script>window.open('index.php?insert_product','_self')</script>";
}

}
?>