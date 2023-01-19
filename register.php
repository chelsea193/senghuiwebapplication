<title>Register | Seng Hui</title>
        <link rel="icon" href="img/favicon.ico"/>

<!------------ Header starts --------------------->
<?php include('includes/header.php'); ?>
<!------------ Header ends ----------------------->

<!------------ Content wrapper starts -------------->
  <div class="content_wrapper">
    
<script>
 $(document).ready(function(){
  
  $("#password_confirm2").on('keyup',function(){   
   
   var password_confirm1 = $("#password_confirm1").val();
   
   var password_confirm2 = $("#password_confirm2").val();
   
   //alert(password_confirm2);
   
   if(password_confirm1 == password_confirm2){
   
    $("#status_for_confirm_password").html('<strong style="color:green">Password match</strong>');
   
   }else{
    $("#status_for_confirm_password").html('<strong style="color:red">Password do not match</strong>');
   
   }
   
  });
  
 });
</script>
<style>
	footer{
		text-align:center;
	}


p {
	font-family: Verdana, Arial, sans-serif;
}

form {
	width: 70%;
	height: auto;
	margin: auto;
	font-family: arial;
	padding: 15px 15px;
}

input[type=text], input[type=email], input[type=password], input[type=tel] {
	width:100%;
	padding:14px 20px;
	margin: 20px 0px;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}

input[type=submit] {
	width:15%;
	padding:14px 20px;
	margin: 20px 0px;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 8px;
	box-sizing: border-box;
	color: white;
	background-color: black;
}

input[type=submit]:hover {
	background-color: #93FFE8;
}

.center {
	display: flex;
  justify-content: center;
  align-items: center; 
}

i {
	margin-left: 10px;
	font-size: 16px;
	margin-top: 20px;

}
h1{
	text-align:center;
}
	</style>	
<div class="register_box">

  <form method = "post" action="" enctype="multipart/form-data">
    
	<table align="center" width="70%">
	
	  <tr align="center">	   
	   <td colspan="4">
	   <br><br><br><br>

<h1>Registration</h1>

	   </td>	   
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Name:</b></td>
	   <td colspan="3"><input type="text" name="name" required placeholder="Name" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Email:</b></td>
	   <td colspan="3"><input type="text" name="email" required placeholder="Email" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm1" name="password" required placeholder="Password" />
	   <br><i>*must contain at least ONE Uppercase, ONE</i><br>
<i>&nbsp;Lowercase, ONE Special Character, ONE</i><br>
<i >&nbsp;Number and NO Space</i><br>
	</td>
	   <td>
	  </tr>
	  <tr>
		
	  
	  <tr>
	   <td width="15%"><b>Confirm Password:</b></td>
	   <td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password" />
	   <p id="status_for_confirm_password"></p><!-- Showing validate password here -->
	   </td>
	  </tr>
	  

	  
	  <tr>
	   <td width="15%"><b>IC:</b></td>
	   <td colspan="3"><input type="text" name="IC" required placeholder="IC" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Contact:</b></td>
	   <td colspan="3"><input type="text" name="contact" required placeholder="Contact" /></td>
	  </tr>
	  
	  <tr>
	   <td width="15%"><b>Address:</b></td>
	   <td colspan="3"><input type="text" name="address" required placeholder="Address" /></td>
	  </tr>
	  
	  <tr align="center">
	   <td></td>
	   <td colspan="4">
	   <input type="submit" name="register" value="Register" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>

</div>

<?php 
if(isset($_POST['register'])){  
  
  if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])){
   $ip = get_ip();
   $name = $_POST['name'];
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $confirm_password = trim($_POST['confirm_password']);
   $IC= $_POST['IC'];
   $contact = $_POST['contact'];
   $address = $_POST['address'];
   
   $check_exist = mysqli_query($con,"select * from users where email = '$email'");
   
   $email_count = mysqli_num_rows($check_exist);
   
   $row_register = mysqli_fetch_array($check_exist);
   
   if($email_count > 0){
   echo "<script>alert('Sorry, your email $email address already exist in our database !')</script>";
   
   }elseif($row_register['email'] !=$email && $password == $confirm_password ){
   
    move_uploaded_file($image_tmp,"upload-files/$image");
	
    $run_insert = mysqli_query($con,"insert into users (ip_address,name,email,password,IC,contact,user_address) values ('$ip','$name','$email','$password','$IC','$contact','$address') ");
    
	if($run_insert){
	$sel_user = mysqli_query($con,"select * from users where email='$email' ");
	$row_user = mysqli_fetch_array($sel_user);
	
	$_SESSION['user_id'] = $row_user['id'] ."<br>";
	$_SESSION['role'] = $row_user['role'];	
	}
	
	$run_cart = mysqli_query($con,"select * from cart where ip_address='$ip'");
	
	$check_cart = mysqli_num_rows($run_cart);
	
	if($check_cart == 0){
	
	$_SESSION['email'] = $email;
	
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('index.php','_self')</script>";
	
	}else{
	
	$_SESSION['email'] = $email;
	
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('checkout.php','_self')</script>";
	
	}
	
   }
   
  }
  
}

?>






	
	
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  

  
  
