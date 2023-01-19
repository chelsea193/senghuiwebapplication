<style>
		body {
			text-align: center;
			font-size: 20px;
		}

		a {
			color: white;
			font-size: 17px;
		}

		.container{
			margin-left: 25%;
			margin-right: 25%;
			margin-top: 5%;
			padding-bottom: 6%;
			justify-content: center;
			align-items: center;
			background-color: black;
			color: white;
		}

		input[type=email], input[type=password] {
			width:40%;
			padding:14px 20px;
			margin: 8px 0px;
			display: inline-block;
			border: 1px solid white;
			box-sizing: border-box;
			background-color: black;
			color: white;
			
		}

		::placeholder{
			color: white;
		}

		button[type=login] {
			width:22%;
			padding:10px 20px;
			margin: 20px 0px;
			display: inline-block;
			border: 1px solid;
			box-sizing: border-box;
			background-color: white;
			font-family: Times New Roman;
			font-size: 17px;
		}

		button[type=login]:hover{
			background-color: grey;
			color: white;
		}
	</style>

<div class="container">
<form method = "post" action="">
  
<title>Login | Seng Hui</title>
 <link rel="icon" href="img/favicon.ico"/>
	 
<h1>Log In</h1>
	<a href="register.php">New to this site? Sign Up </a>
	<br><br>


	  
	  <label style="margin-right: 233px;" for="email">Email *</label><br>
		<input type="email" name="email" placeholder="Email" id="email" required><br><br>

		<label style="margin-right: 203px;" for="password">Password *</label><br>
		<input type="password" name="password" placeholder="Password" id="password" required><br>

		<a href="" style="margin-right: 173px;">Forgot password? </a><br><br><br>


	
		<button type="login" name="login"value="login">Login</button>
	

  
  </table>
  
  
</form>
</div>
</div>

<?php 
if(isset($_POST['login'])){

$email = trim($_POST['email']);
$password = trim($_POST['password']);


$run_login = mysqli_query($con, "select * from users where password='$password' AND email='$email' " );

$check_login = mysqli_num_rows($run_login);

$row_login = mysqli_fetch_array($run_login);

if($check_login == 0){
 echo "<script>alert('Password or email is incorrect, please try again!')</script>";
 exit();
}
$ip = get_ip();

$run_cart = mysqli_query($con, "select * from cart where ip_address='$ip'");

$check_cart = mysqli_num_rows($run_cart);

if($check_login > 0 AND $check_cart==0){

$_SESSION['user_id'] = $row_login['id'];

$_SESSION['role'] = $row_login['role'];

$_SESSION['email'] = $email;
echo "<script>alert('You have logged in successfully !')</script>";
echo "<script>window.open('index.php','_self')</script>";

}else{
$_SESSION['user_id'] = $row_login['id'];

$_SESSION['role'] = $row_login['role'];

$_SESSION['email'] = $email;
echo "<script>alert('You have logged in successfully !')</script>";
echo "<script>window.open('checkout.php?payment=process','_self')</script>";
}

}

?>