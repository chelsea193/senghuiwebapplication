<?php 
$edit_tracking = mysqli_query($con,"select * from tcustomer where id='$_GET[id]' ");

$fetch_edit = mysqli_fetch_array($edit_tracking);
?>
<div class="form_box">

<form action="" method="post" enctype="multipart/form-data">
  
  <table align="center" width="100%">
    
    <tr>
      <td colspan="7">
      <h2>Edit New Record</h2>
      <div class="border_bottom"></div><!--/.border_bottom -->
      </td>
    </tr>
    
    <tr>
      <td><b>Customer IC:</b></td>
      <td><input type="text" name="sIC" value="<?php echo $fetch_edit['sIC'];  ?>"size="60" required/></td>
    </tr>
    
    <tr>
      <td><b>Product Name:</b></td>
      <td><input type="text" name="pname" value="<?php echo $fetch_edit['pname'];  ?>"size="60" required/></td>
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
     <td><input type="text" name="tdate"value="<?php echo $fetch_edit['tdate'];  ?>" required/></td>
   </tr>

   <tr>
      <td></td>
      <td colspan="7"><input type="submit" name="edit_tracking" /></td>
   </tr>
  </table>
  
</form>

</div><!-- /.form_box -->

<?php 

if(isset($_POST['edit_tracking'])){   

    $sIC = $_POST['sIC'];
    $pname = $_POST['pname'];
    $ostatus = $_POST['ostatus'];
    $tdate = $_POST['tdate'];
   
    $update_status = mysqli_query($con,"update tcustomer set sIC='$sIC', pname='$pname', ostatus='$ostatus', tdate='$tdate'where id='$_GET[id]' ");
   

   
   if($update_status){
    echo "<script>alert('Record was updated successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>



