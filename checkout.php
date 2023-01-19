

<!------------ Header starts --------------------->
<?php include('includes/header.php');
error_reporting(0);
error_reporting(E_ERROR | E_PARSE); ?>
<!------------ Header ends ----------------------->
<link href="styles/checkout.css?v=<?php echo time();?>" rel="stylesheet" type="text/css" />
<!------------ Content wrapper starts -------------->

<title>Check out | Seng Hui</title>
<link rel="icon" href=".../img/favicon.ico"/>
<?php //if($_GET['payment'] != 'payment-successful'){ ?>

<?php if($_GET['payment'] == 'process'){ ?>

  <div class="content_wrapper">	  
	    
	  <?php 	  
      if(!isset($_SESSION['user_id'])){
	     include('login.php');
	  }else{
	  
	  $invoice_number = mt_rand();
	  
	  $ip = get_ip();
	  
	  $update_cart = mysqli_query($con,"update cart set buyer_id='$_SESSION[user_id]', invoice_number='$invoice_number' where ip_address='$ip' ");
	  ?>
	  
	  
	  
	  <div class="checkout_container">
	  

	  

	  
	  <div class="checkout_left_box">
	  <h3>Your Item </h3>
	  
	  <div class="checkout_left_item_border_bottom"></div>
	  
	  <?php 
	  $checkout_ip = get_ip();
	  
	  $sel_cart = mysqli_query($con,"select * from cart where ip_address='$checkout_ip' ");
	  
	  while($fetch_cart = mysqli_fetch_array($sel_cart)){
	  
	  $sel_product = mysqli_query($con,"select * from products where product_id='$fetch_cart[product_id]'");
	  
	  while($fetch_product = mysqli_fetch_array($sel_product)){
	  
	  ?>
	  
	  <div class="checkout_left_product_box">
	  <img src="admin_area/product_images/<?php echo $fetch_product['product_image']; ?>">
	  
	  <p class="checkout_left_title"><?php echo $fetch_product['product_title']; ?></p>
	  
	  <p style="color:green">$<?php echo $fetch_product['product_price']; ?></p>
	  </div><!-- /.checkout_left_product_box -->
	  
	  <?php } } ?>
	  </div><!--/.checkout_left_box -->
	  
	  </div><!-- /.checkout_left -->
	  
	  <div class="checkout_right">
	  
	  <div class="checkout_right_box">
	  
	  <div class="checkout_total_price">
	  <h1>Total: <?php total_price(); ?></h1>   

	  </div>
	  
	  <h4 style="margin:10px 0">Please choose your preferred method of payment.</h4>
	  
	 
		 
		</div><!--/.payment_method_body-->
		
	  </div><!--/.payment_method_box------->
	  </div><!---/.payment_method_container------------->
	  
	  
	   <div class="payment_method_container">
	  <div class="payment_method_box">
	    
		<div class="payment_method_header accordion-toggle payment_method_offline">
		<input type="radio" id="offline_payment_radio" name="offline_payment_radio" value="offline_payment"><span>Payment Methods</span>
		
		</div><!---/.payment_method_header-->
		
		<div class="payment_method_body payment_method_body_offline accordion-content" style="display:none">
		 
		<?php 
		 $select_offline_payment = mysqli_query($con,"select * from offline_payment where title='Bank Transfer' ");
		 $bank_transfer = mysqli_fetch_array($select_offline_payment);
		 $bank_transfer_content = $bank_transfer['content'];
		 
		 ?>
		 
		 <div class="offline_method_option_box">
		 
		 <div class="bank_transfer accordion_offline_option">
		 <input type="radio" name='r' id="bank_transfer_r" class="accordion_radio" value="bank_transfer">Bank Transfer<br>
		 
		 </div><!---/.accordion_offline_option--->
		 
		 <div class="accordion_offline_option_content bank_transfer_content" style="display:none">
		 <p class="offline_option_title">Payment Instructions</p>
		 <div class="offline_instructions">
		 
		 <?php 
		 
		 echo $bank_transfer_content;
		 ?>
		 
		 
         </div>		 
		 </div><!----/.accordion_offline_option_content--->
		 
		 <?php 
		 $select_cash = mysqli_query($con,"select * from offline_payment where title='Cash on Delivery' ");
		 $cash = mysqli_fetch_array($select_cash);
		 $cash_content = $cash['content'];
		 
		 ?> 

		 <div class="accordion_offline_option">
		 <input class="accordion_radio" id="cash_on_delivery_r" name='r' type="radio"  value="cash_on_delivery">Cash on Delivery
		 
		 </div><!--/.accordion_offline_option-->
		
		<div class="accordion_offline_option_content cash_on_delivery_content" style="display:none">
		 <p class="offline_option_title">Payment Instructions</p>
		<div class="offline_instructions">
		 <?php 
		 
		 echo $cash_content;
		 ?> 
		 </div>
		 </div><!--/.accordion_offline_option_content-->
		 <div class="accordion_offline_option">
		 <input class="accordion_radio" id="card_r" name='r' type="radio"  value="card">Credit/Debit Card
<br><br>
		 <label style="margin-right: 356px;" for="Card_Holder_Name"><i>Card holder's name: </i></label><br>
		<input type="text" name="Card_Holder_Name" id="Card_Holder_Name" required>
		
		<br>
		<label style="margin-right: 399px;" for="Card_Number"><i>Card Number: </i></label><br>
		<input type="text" name="Card_Number" id="Card_Number" required>

		
		<br>
		<div class="form-group" id="card-number-field">
		<label style="margin-right: 335px;" for="Expiry_Date"><i>Expiry Date (MM/YY): </i></label><br>
		<select name="month">
			<option value="01">January</option>
			<option value="02">February</option>
			<option value="03">March</option>
			<option value="04">April</option>
			<option value="05">May</option>
			<option value="06">June</option>
			<option value="07">July</option>
			<option value="08">August</option>
			<option value="09">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>

		<select name="year">
			<option value="20">2020</option>
			<option value="21">2021</option>
			<option value="22">2022</option>
			<option value="23">2023</option>
			<option value="24">2024</option>
			<option value="25">2025</option>
			<option value="26">2026</option>
			<option value="27">2027</option>
			<option value="28">2028</option>
			<option value="29">2029</option>
			<option value="30">2030</option>
		</select>
		</div>

		<br>
		<label style="margin-right: 470px;" for="cvv"><i>CVV. </i></label><br>
		<input type="tel" name="cvv" id="cvv" required>

		<br><br>
		 
		 </div><!--/.accordion_offline_option-->
		
		<div class="accordion_offline_option_content cash_on_delivery_content" style="display:none">
		 <p class="offline_option_title">Payment Instructions</p>

	  </div>

		 
	


		 
		 </div><!------------/.offline_method_option_box-->
		 

		 
		  <div class="payment_gateway_box">	     
		 
		 <p style="margin-left:27px">By completing your purchase, you agree to these <a href="#" target="_blank" style="text-decoration:none">Terms of Service.</a></p>
	     </div>
		 
		</div><!--/.payment_method_body-->
		
	  </div><!--/.payment_method_box------->
	  </div><!---/.payment_method_container------------->
	  
	  
	  
	  </div><!-- /.checkout_right_box -->
	  
	  </div><!-- /.checkout_right -->
	  
	  <div class="load_checkout_message"></div><!--/.load_checkout_message-->
	  
	  <div class="load_billing_address"></div><!--/.load_billing_address-->
	  
	  <!---- Complete order button of Offline payment starts--------------->
	  <div class="payment_offline_form_box" style="display:none">
		  <div class="payment_offline_btn_box">
		   <button id="payment_offline_btn">Complete Order <i class="fa fa-arrow-circle-right"></i></button>
		  </div>
	  </div><!--/.payment_offline_form_box-->
	  <!---- Complete order button of offline payment ends--------------->
	  

	  
	  </div><!-----/.checkout_container -->
	  
	  <?php   } ?>
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  
  <?php include ('includes/footer.php'); ?>
  
  <input type="hidden" id="checked_on_page_reload" value="<?php echo $_SESSION['checked_on_page_reload'];?>">
  
  <input type="hidden" id="checked_on_page_reload_offline_type" value="<?php echo $_SESSION['checked_on_page_reload_offline_type'];?>">
  
  <input type="hidden" id="get_user_id" value="<?php echo $_SESSION['user_id']; ?>">
  <input type="hidden" id="get_user_ip" value="<?php echo $ip; ?>">
  
  <input type="hidden" id="get_invoice_number" value="<?php echo $invoice_number; ?>">
  
  <div class="checkout_background_loading">
   <img src="images/spinner_loader.gif">
  </div>  






<?php }elseif($_GET['payment'] == 'payment-successful'){ ?>

<?php include 'payment-gateway-successful.php'; ?>

<?php } ?>
  
 <script>
		 $(document).on('click','.accordion_offline_option',function(){
		   if($(this).attr('class').indexOf('open_bank') ==-1){
		     $(this).toggleClass('open_bank').next().slideToggle('fast');
			
            // check radio button click on div tag			
			$(this).find('.accordion_radio').toggleClass('open_bank').prop('checked',true);
		   
		   }
		   // Hide the other panels
         $(".accordion_offline_option").not($(this)).removeClass("open_bank");
         $(".accordion_offline_option_content").not($(this).next()).slideUp('fast');
		
		var radio_val = $(this).find('.accordion_radio').val();
		//alert(radio_val);		
		
		$.ajax({
		url:'ajax/get_session_checked_offline_type.php',
		type:'post',
		data:{radio_val:radio_val},
		dataType:'html',
		success: function(radio_value){
		//alert(radio_value);
		}
		});
		
		 });
		
		 </script> 
  
<script>
  $(document).ready(function(){
  
    insert_offline_payment_data();
	
	display_billing_address();
	
	load_image_paypal();
  });
  
  /////// Hide menubar /////////////////////////////////
  $(".menubar").hide();
  
  ////// On click auto check or uncheck radio button ///
  $(".payment_method_paypal").on('click',function(){
    $("#paypal_radio").prop("checked", true);
	$("#offline_payment_radio").prop("checked", false);
	
	//Hide show complete order button
	$(".payment_paypal_form_box").show();
	$(".payment_offline_form_box").hide();
  });
  
  $(".payment_method_offline").on('click',function(){
    $("#paypal_radio").prop("checked", false);
	$("#offline_payment_radio").prop("checked", true);
	
	//Hide show complete order button
	$(".payment_paypal_form_box").hide();
	$(".payment_offline_form_box").show();
  });
  
  //////// On click auto hide or show accordion content ///////
  $(document).on('click','.accordion-toggle',function(){
  
   if($(this).attr('class').indexOf('open') == -1){
     $(this).toggleClass('open').next().slideToggle('fast');
   }
   
   // Hide the other panels
   $(".accordion-toggle").not($(this)).removeClass("open");
   $(".accordion-content").not($(this).next()).slideUp('fast');
  });
  
  //////// On page reload keep radio button checked ////////
  
  $(document).on("click",".accordion-toggle", function(){
    
	if($(this).hasClass('payment_method_offline')){
	  var radio_name = 'payment_method_offline';
	}else if($(this).hasClass('payment_method_paypal')){
	  var radio_name = 'payment_method_paypal';
	}
	
	$.ajax({
	  url:'ajax/get_session_checked_ajax.php',
	  type:'post',
	  data:{get_radio_name:radio_name},
	  dataType:'html',
	  success: function(get_session_checked){
	      //alert(get_session_checked);
	  }	  
	});	
  });
  
  $(document).ready(function(){
    
	var radio_name_page_reload_offline_type = $("#checked_on_page_reload_offline_type").val();
	//$("#bank_transfer_r").prop("checked", true);
	if(radio_name_page_reload_offline_type == 'bank_transfer'){
	 
	 $("#cash_on_delivery_r").prop("checked", false);
	 $("#card_r").prop("checked", false);
	 $("#bank_transfer_r").prop("checked", true);
	 
	 
	 // Hide show offline type content
	 $(".bank_transfer_content").show();
	}
	
	if(radio_name_page_reload_offline_type == 'cash_on_delivery'){
	 
	 $("#cash_on_delivery_r").prop("checked", true);
	 $("#bank_transfer_r").prop("checked", false);
	 $("#card_r").prop("checked", false);
	 
	 // Hide show offline type content
	 $(".cash_on_delivery_content").show();
	}

	if(radio_name_page_reload_offline_type == 'card'){
	$("#card_r").prop("checked", true);
	 $("#cash_on_delivery_r").prop("checked", false);
	 $("#bank_transfer_r").prop("checked", false);
	 
	 // Hide show offline type content
	 $(".cash_on_delivery_content").show();
	}
	
	var radio_name_page_reload = $("#checked_on_page_reload").val();
	
	if(radio_name_page_reload == 'payment_method_offline'){
     
	 $(".payment_method_offline").addClass('open');
	 
	 $("#paypal_radio").prop("checked", false);
	 $("#offline_payment_radio").prop("checked", true);
	 
	 $(".payment_method_body_offline").slideDown("fast");
	 $(".payment_method_body_paypal").slideUp('fast');
	 
	 //Hide show complete order button
	$(".payment_paypal_form_box").hide();
	$(".payment_offline_form_box").show();
	
	}
	
  });
  
  function send_mail_offline(tx_id){
      
     $.ajax({
      url:'ajax/send_mail_offline_ajax.php',
      type:'post',
      data:{tx_id:tx_id},
      dataType:'html',
      success: function(sendmail){
        if(sendmail ==1){
          alert('An email has been sent');
        }else{
          alert('An error occured while sending mail');
        }
        
      }
     });
  }
  
  function insert_offline_payment_data(){
    
	var user_id = $("#get_user_id").val();
	
	var user_ip = $("#get_user_ip").val();	
	
	$("#payment_offline_btn").on('click',function(){
	 
	  $.ajax({
	   url:'ajax/insert_offline_payment_data_ajax.php',
	   type:'post',
	   data:{userID:user_id,userIP:user_ip},
	   dataType:'json',
	   beforeSend: function(){
	    
		$(".checkout_background_loading img").css({"top":"40%"});
		
	    $(".checkout_background_loading").show();
		
	   },
	   success: function(insert_offline_payment){
	    
		//alert(insert_offline_payment[0]);		
		
		if(insert_offline_payment[0] == 'ok'){
		  //alert('You have purchased successfully !');
		  
		  setTimeout(function(){
		  
		  $(".load_checkout_message").html('<div class="success_message"><i class="fa fa-check"></i> You have purchased successfully ! <i class="fa fa-close"></i></div>');
		  
		  close_message_box();
		  
		  $(".checkout_background_loading").hide();
		  
		  },1000);	  
		  
		  ////////// Mail Starts //////////////////////////
		  
		  var tx_id = insert_offline_payment[2];
		  
		  send_mail_offline(tx_id);
		  
		  ////////// Mail Ends ////////////////////////////
		  
		  setTimeout(function(){
		  window.open('checkout.php?payment=payment-successful&code='+insert_offline_payment[2],'_self');
		  
		  }, 5000);
		  
		  
		  
		}else{
		  if(insert_offline_payment[1] == 'empty'){
		    //alert('Your cart is empty !');
			
			setTimeout(function(){
			
			 $(".load_checkout_message").html('<div class="error_message"><i class="fa fa-shopping-cart"></i> Your cart is empty ! <i class="fa fa-close"></i></div>');
			 
			 $(".checkout_background_loading").hide();
			 
			 close_message_box();
			 
			}, 2000);			
			
		  }
		  
		  if(insert_offline_payment[1] == 'offline type empty'){
		    //alert('Your cart is empty !');
			
			setTimeout(function(){
			
			 $(".load_checkout_message").html('<div class="error_message"><i class="fa fa-shopping-cart"></i> Please choose an offline payment method ! <i class="fa fa-close"></i></div>');
			 
			 $(".checkout_background_loading").hide();
			 
			 close_message_box();
			 
			}, 2000);			
			
		  }
		  
		  if(insert_offline_payment[0] == 'logged out'){
		  
		    setTimeout(function(){
			
			 $(".load_checkout_message").html('<a href="checkout.php?payment=process"><div class="error_message"><i class="fa fa-sign-in"></i> You have logged out. Please log in to complete order ! <i class="fa fa-close"></i></div></a>');
			 
			 $(".checkout_background_loading").hide();
			 
			 close_message_box();
			 
			}, 2000);
		    
		  }
		}
		
	   }
	   
	  });
	  
	});
	
  }
  
  function display_billing_address(){
    var user_id = $("#get_user_id").val();
	
	var invoice_number = $("#get_invoice_number").val();
	//alert(user_id);
	
	$.ajax({
	  url:'ajax/display_billing_address_ajax.php',
	  type:'post',
	  data:{post_user_id:user_id, invoice_number:invoice_number},
	  dataType:'html',
	  success: function(buyer_billing_address){
	   //alert(buyer_billing_address);
	  $(".load_billing_address").html(buyer_billing_address); 
	  
	  edit_billing_address();
	  
	  }
	});
  }
  
  function edit_billing_address(){
   
   $(".fa-close, #cancel_billing_address_btn").click(function(){
    $(".billing_address_box").show();
	
	$(".billing_address_form_box").hide();
   });
  
   $(".fa-pencil, #checkout_additional_editor").on("click",function(){
    
	$(".update_message").remove();
	
	$(".billing_address_box").hide();
	
	$(".billing_address_form_box").show();
	
	$("textarea").focus();
	
   });
    
   $("#update_billing_address_btn").on('click',function(){
     
	 var user_id = $(this).data("user_id");
	 
	 var invoice_number = $(this).data("invoice_number");	 
	 var name = $("#edit_name").val();
	 var user_address = $("#edit_user_address").val();
	 var IC = $("#edit_IC").val();
	 var contact = $("#edit_contact").val();
	 
	 var additional_content = $(".checkout_additional_editor").val();
	 
	 $.ajax({
	   url:'ajax/edit_billing_address_ajax.php',
	   type:'post',
	   data:{user_id:user_id, invoice_number:invoice_number, name:name, user_address:user_address, IC:IC, contact:contact, additional_content:additional_content},
	   dataType:'json',
	   beforeSend: function(){
	     $(".checkout_background_loading img").css({"top":"60%","height":"80px","width":"80px"});
		 $(".checkout_background_loading").show();
	   },
	   success: function(update_billing_address){
	    //alert(update_billing_address[0]);
		
		if(update_billing_address[0] == 'ok'){
		 
		 setTimeout(function(){
		   $(".checkout_background_loading").hide();
		   
		   $(".load_checkout_message").html('<div class="update_message" style="background:rgba(119,217,189,0.7);color:green"><i class="fa fa-check"></i> Your owner information was updated successfully ! <i class="fa fa-close"></i></div>');
		   
		   close_message_box();
		 
		 }, 1000);
		 
		 display_billing_address();
		 
		}
		
	   }
	   
	 });
	 
   });
	
  }
  
  function close_message_box(){
    $(".load_checkout_message .fa-close").on('click',function(){
	  $(this).parents(".load_checkout_message").find("div").hide();
	});
	
  }
  
 function load_image_paypal(){
   
   $("#payment_paypal_btn").on('click',function(){
       $(".checkout_background_loading img").css({"top":"40%"});
		
	   $(".checkout_background_loading").show();
	   
	   setTimeout(function(){
	    $(".checkout_background_loading").hide();   
	   },1000);
	   
   });
 }
  </script>

  
  
  
