
<?php 
$edit_content = mysqli_query($con,"select * from offline_payment where id='$_GET[id]'");

$fetch_content = mysqli_fetch_array($edit_content);

?>


    <div class="form_box">

	 <form action="" method="post" enctype="multipart/form-data">
	   
	   <table align="center" width="100%">
	     
		 <tr>
		   <td colspan="7">
		   <h2>Edit Offline Payment Content</h2>
		   <div class="border_bottom"></div><!--/.border_bottom -->
		   </td>
		 </tr>
		 
		 <tr>
		   <td width="150"><b>Edit Content:</b></td>
		   <td>
		   <textarea id="edit_content" rows="4" style="margin-top:15px;width:100%" name="product_cat"><?php echo $fetch_content['content']; ?></textarea>
		   </td>
		 </tr>	 
		
		<tr>
		   <td></td>
		   <td colspan="7"><input style="margin-top:15px" type="submit" name="edit_content" value="Save"/></td>
		</tr>
	   </table>
	   
	 </form>
	 
  </div><!-- /.form_box -->

<?php 

if(isset($_POST['edit_content'])){   
   
   $content = mysqli_real_escape_string($con,$_POST['product_cat']);
   
   $edit_content = mysqli_query($con,"update offline_payment set content='$content' where id='$_GET[id]'");
   
   if($edit_content){
    echo "<script>alert('The Content was updated successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>



<script type="text/javascript" src="tinymce_custom/tinymce.min.js"></script>

<script>
tinymce.init({
  selector: 'textarea#edit_content',
  auto_focus: 'edit_content',
  height: false,
  menubar: false,
  branding: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code codesample",
   image_advtab: true ,
 
  setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
    
});
</script>




