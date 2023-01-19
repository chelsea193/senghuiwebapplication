
<?php

	error_reporting(E_ERROR | E_PARSE);
	
	
	$Err=$m=$y=$month=$year="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		
		
		if (empty($_POST["month"])||empty($_POST["year"])) {
			$Err = "Please enter the month and month";
		
		}  
		
		if (!empty($_POST["month"])&&!empty($_POST["year"])) {
			
			$month = $_POST['month'];
			$year = $_POST['year'];
			$m = $month;
			$y = $year;
			header('index.php?action=m_report');
		}  
	}




?>



<!DOCTYPE html>
<html>
<head>
  
<style>
.error {color: #FF0000;}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

th{
	background-color: skyblue;
}

tr {
  background-color: #fff;
}

.report{
	margin:10px;
	background-color:#fff;
	padding:20px;
}

.column {
  float: left;
  padding: 10px;
  width:15%;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.report{
	
	border: solid;
	
}

.error {color: #FF0000;}

</style>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monthly Report</title>
</head>
<body>


	<br><br>
	<div class="card" style="border-style: solid; border-color: grey; border-width: 0.1em; padding:20px;">
	<h1> Generate Monthly Report</h1>
	<hr>
	<h4> Enter the month (eg. 1 = January)</h4>
	<br>
	
	<form  action="index.php?action=m_report" method="POST" name="month" >
    <div class="box">
 
	  <label for="fname">Month </label>
      <input type="text" placeholder="Month..." name="month">
	  <br><br>
	  
	<h4> Enter the year (eg. 2023)</h4><br>
	  <label for="fname">Year </label>
      <input type="text" placeholder="year..." name="year">
    </div>
	<br>
	<input type="submit" value="Generate">
	<br><span class="error"> <?php echo $Err;?></span>
	</form>
	
	</div>
	<br><br>


<hr>
<div class="report">

<div class="row">
	<div class="column">
	  <img src="../img/logo.jpg" alt="Logo" width="130" height="100">
	</div>
	<div class="column2">

	  <h2><br>Seng Hui Company</h2>
	  <h4> Song Sarawak </h4>
	</div>

</div>
<hr>

<center> 	
<h2>Sale Report</h2>
</center>
<br><br>
<center>
	  <table class="tableDisplay" style="width:95%">
		  <tr>
			<th>Payment ID</th>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Date</th>
		  </tr>
		  <?php

  
				  $sql = "SELECT payments.payment_id, payments.product_id, payments.quantity,payments.amount, SUM(payments.amount) AS psum,
				  payments.date, products.product_id, products.product_title, SUM(payments.quantity) AS qsum 
				  FROM payments
				  LEFT JOIN products ON payments.product_id = products. product_id
				  WHERE MONTH(payments.date) = '$m' AND YEAR(payments.date) = '$y'
				  GROUP BY payments.payment_id";


				  $result = $con->query($sql);

				  if ($result->num_rows > 0) {
					// output data of each row
				  while($row = $result->fetch_assoc()) {
						echo "<tr>
						<td>".$row['payment_id']."</td>
						<td>".$row['product_id']."</td>
						 <td>".$row['product_title']."</td>
						<td>".$row['quantity']."</td>
						<td> RM ".$row['amount']."</td>
						<td>".$row['date']."</td>
						</tr>";
					}
					
				  }
				  else {
					echo "<h4 style='color:red';>*No record is found! Please enter the month and year</h4>";
				  }
				    

?>
		</table>
		
</center>

<?php
		
		$sql = "SELECT payments.date, payments.quantity,payments.amount, SUM(payments.amount) AS psum,SUM(payments.quantity) AS qsum FROM payments  
		WHERE MONTH(payments.date) = '$m' AND YEAR(payments.date) = '$y'";
		
		$result = $con->query($sql);
		
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){

		echo "<br><br><h4> The total motorcycle are sold: ".$row['qsum']."</h4>";
		echo "<h4> The total sale: RM ".$row['psum']."</h4>";
		}
		}
		else {
		
		echo "<br><br><h4> The total motorcycle are sold: 0 </h4>";
		echo "<h4> The total sale: RM 0 </h4>";
		
		
		}
		?>

<br>
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
echo "Generate on " . date("Y/m/d H:m:s") . "<br>";
?>

<hr>
<footer> 
<center>
<h4> This Report is generate by Seng Hui Web Application (SHWA)</h4>
</center>

</footer>
</div>
</body>
</html>