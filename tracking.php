<?php include('includes/header.php'); ?>
<title>Tracking | Seng Hui</title>
        <link rel="icon" href="img/favicon.ico"/>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tracking | Seng Hui</title>
        <link rel="icon" href="img/favicon.ico"/>
</head>
<style>

h1 {
	text-align: center;
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
	width:33%;
	padding:14px 20px;
	margin: 20px 0px;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}

button[type=submit] {
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

button[type=submit]:hover {
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
footer{
	text-align:center;
}
</style>
<body>
	<header>
		<br><br><br><br>
		
	</header>
	<h1>Tracking</h1>
	<form name="Tracking" method="post" >

		<label style =margin-left: 36px>Customer IC: </label>
		<input type="text" name="sname"  required>
		

		<br>
		<div class="center">
		<button type="submit" name="submit">Search</button>
		</div>
	</form>
	<div class="center">
        <table class="w3-table-all w3-hoverable">
        <?php
        if(isset($_POST['submit'])){
            $sname=$_POST['sname'];

            $sql="SELECT * from tcustomer join customerclass on tcustomer.ostatus = customerclass.cid where tcustomer.sname='$sname'";

            $result=mysqli_query($con,$sql);

            if(mysqli_num_rows($result) > 0)  {
                ?>
                <table cellpadding="7px">
                    <thead>
                    <tr class="w3-light-grey">
                    <th>Id</th>
                    <th>IC</th>
                    <th>Product</th>
                    <th>Order Status</th>
                    <th>Date</th>
                    </thead>
            </tr>
                    <tbody>
                      <?php
                        while($row = mysqli_fetch_assoc($result)){
                      ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['sIC']; ?></td>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['tdate']; ?></td>
            
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
              <?php }else{
                echo "<script>alert('No Record Found!')</script>";
              }
            }?>
              </div>
            






 <footer>           

<?php include ('includes/footer.php'); ?>
        </footer>
</html>