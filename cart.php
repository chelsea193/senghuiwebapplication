

<title>Cart | Seng Hui</title>
        <link rel="icon" href="img/favicon.ico"/>

		<?php include('includes/header.php'); ?>
<style>
	
	body, html{
	
		margin:auto;
		width: auto;
	}
	

	.content{
		
		background-image: url("back.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		padding:5% 10% 5% 10%;
		height: 100%;
		
		
	}
	
	.cart{
		
		background-color:#fff;
		padding: 30px;
		width: 80%;
		margin:auto;
	}
	
	.column1{
		
		float: left;
		width:65%;
		padding: 10px;
		
	}
	
	.column2{
		
		float: left;
		width:30%;
		padding: 10px;

		
	}
	
	.row:after{
		
		content:"";
		display: table;
		clear:both;
		
	}
	footer{
		
		text-align:center;
	}
	
	.cart_c{
		
		font-size:16px;
		font-family: Helvetica;
		display: flex;
		padding: 10px;
		
	}
	
	.product_image{
		
		margin:0px 20px 10px 10px;
		border-style: solid;
		border-color: grey;
		border-width: 0.1em;
		height: 70px;
		width:100px;
		
		
	}
	.add_btn{
		
		color:#151515;
		position:left;
		padding:0px;
		margin: 20px 0px 0px 80px;
		height:20px;
		width:20px;
		
		
		
	}
	
	.add_btn2{
		
		color:#151515;
		position:left;
		padding:0px;
		margin: 20px 0px 0px 10px;
		height:20px;
		width:20px;
		
		
	}
	
	a{
		text-decoration: none;
		color:#151515;
	}
	
	.quantity{
		
		border-style:solid;
		border-color:grey;
		border-width:0.1em;
		margin: 20px 0px 0px 0px;
		padding: 0px 20px;
		height:16px;
		
	}
	
	.subtotal{
		
		margin: 20px 0px 0px 15px;
	}
	
	.delete_p{
		margin:20px 0px 0px 20px;
	}
	
	.checkout{
		
		width:100%;
		height:50px;
		font-size:18px;
		font-family: helvetica;		
		background-color:#151515;
		color:#fff;
	}
	

	
	.lock{
		
		margin:10px 0px 0px 80px;
	}
	
	.secure_c{
		
		display: flex;
		
	}
	
	.cart_box{
		
		display:flex;
		
	}
	button{
		width:100%;
		height:50px;
		font-size:18px;
		font-family: helvetica;		
		background-color:#151515;
		color:#fff;
	}

	.error {color: #FF0000;}

    
</style>

<!------------ Header starts --------------------->

<!------------ Header ends ----------------------->

<link rel="stylesheet" href="styles/cart.css">

<!------------ Content wrapper starts -------------->
<body>
<div class = "content">

	<div class= "cart">
	
	<div class="row">
		<div class ="column1">
			<p style="font-family: helvetica; font-size: 24px"> My cart </p>
			<hr><br>
			<div class="cart_box">
	   		<form action="" method="post" enctype="multipart/form-data">
	   
	   		<div class="cart_table">
	       
	   		<table>
	   

		 
		 <tr><th colspan="5"><br></th></tr>
			<?php 
		 $total = 0;
   
   $ip = get_ip();
   
   $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");
   
   $count_cart = mysqli_num_rows($run_cart);
   
   if($count_cart > 1){
       $item_message = 'items';
   }else{
       $item_message = 'item';
   }
   
   
   while($fetch_cart = mysqli_fetch_array($run_cart)){
       
	   $product_id = $fetch_cart['product_id'];
	   
	   $qty = $fetch_cart['quantity'];
	   
	   $result_product = mysqli_query($con, "select * from products where product_id = '$product_id'");
	   	   
       while($fetch_product = mysqli_fetch_array($result_product)){
                
		$product_price = array($fetch_product['product_price']);

        $product_title = $fetch_product['product_title'];

        $product_image = $fetch_product['product_image'];
        
        $sing_price = $fetch_product['product_price'];
        
		$values = array_sum($product_price);
		
		$values_qty = $values * $qty;
		
		$total += $values_qty;
				
   
   ?>
		 <tr>
		  <td width="5%"><input type="checkbox" name="remove[]" value="<?php echo $product_id;?>" /></td>
		  <td><span>Remove</span>
		 <td colspan="2">
		   
	  
       <div class="cart_image">
        <img class="product_image"img src="admin_area/product_images/<?php echo $fetch_product['product_image']; ?>"  />  
       
       <td><a href="details.php?pro_id=<?php echo $fetch_product['product_id'];?>"> <?php echo $fetch_product['product_title']; ?></a></p></td>
		   <td><input class="qty_id" data-id="<?php echo $product_id; ?>" type="text" size="4" name="qty" value="<?php echo $qty; ?>" /></td>
		   <td><?php echo "RM" .number_format( $sing_price,2); ?></td>
     </div>    

		 </tr>

	<?php } } // End While  ?> 
		
		</div>
	   	
	    <tr align="center">
		   <td colspan="10"><input type="submit" name="update_cart" value="Update Cart" /></td>
		   <td colspan="10"><input class="continue"type="submit" name="continue" value="Continue Shopping" /></td>
		   <td></td>
		</tr>
		
		<tr><th colspan="10"><br></th></tr>
		
	   </table>
	   
	   </div><!--/.cart_table--->
	   </form>
       	   		
	<!--column 2-->
	<div class ="column2" >
		
		<p style="font-family: helvetica; font-size: 24px"> Order Summary </p><hr><br>
		
	<div id = "o_summary" style=" font-family: helvetica; font-size: 24px; ">	
	<p>Subtotal &nbsp&nbsp&nbsp&nbsp <?php total_price()?></p>

				<!--Checkout Button-->
				
		
	<a href="checkout.php?payment=process"><button class="checkout">Checkout</button></a>
	    
	 
	 <input type="hidden" class="hidden_ip" value="<?php echo $ip; ?>">
	 
	 <div class="load_ajax"></div>
	   
	   </div>
	   

	   
	 <script>
	  $(document).ready(function(){
	    
	   $(".qty_id").on("keyup", function(){
	    
	    var pro_id = $(this).data("id");
	    
	    var qty = $(this).val();
	    
	    var ip = $(".hidden_ip").val();
	    
	    //alert(ip);
	    
	    // Update product quantity in ajax and php
	    $.ajax({
	    url:'cart/update_qty_ajax.php',
	    type:'post',
	    data:{id:pro_id,quantity:qty,ip:ip},
	    dataType:'html',
	    success:function(update_qty){
	     
	     //alert(update_qty);
	     
	     if(update_qty == 1){
	       $(".load_ajax").html('Your quantity was updated successfully!');
	     }
	        
	    }
	    
	    });
	    
	   });
	   
	  });   
	     
	 </script>  
	   
	   <?php 
	   if(isset($_POST['remove'])){
	     
		 foreach($_POST['remove'] as $remove_id){
		   
		  $run_delete = mysqli_query($con,"delete from cart where product_id = '$remove_id' AND ip_address='$ip' ");
		 
		 if($run_delete){
		    echo "<script>window.open('cart.php','_self')</script>";
		 }
		 }
		 
	   }
	   
	   if(isset($_POST['continue'])){
	     echo "<script>window.open('all_products.php','_self')</script>";
	   }
	   
	   ?>

	   </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </body>
    
    <?php include ('includes/footer.php'); ?>

   