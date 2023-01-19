        <title>All product | Seng Hui</title>
        <link rel="icon" href="img/favicon.ico"/>

<!------------ Header starts --------------------->
<?php include('includes/header.php'); ?>
<!------------ Header ends ----------------------->

<style>
.content_wrapper{
   width:100%;
   margin:20px 0 50px 0;
   position:relative;
   float:left;
   
  
}
.content_wrapper #sidebar{
   width:15%;
   background:transparent;
   float:left;
   height:auto;
   position:inherit;
   bottom:auto;
   left:auto;
   right:auto;
   margin:0 0 0 10px;
}
.content_wrapper .sidebar_box{
   width:90%;
   float:left;
   background:white;
   box-shadow: 0 1px 4px 0 rgba(0,0,0,0.1), 0 2px 10px 0 rgba(0,0,0,0.15);
   padding:20px 10px 15px 10px;
   border-left:1px solid rgba(0,0,0,0.1);
   
}
#sidebar #sidebar_title{
   background:white;
   color:black;
   font-size:25px;
   font-family:arial;
   
   text-align:left;
  
}
#sidebar #cats{
   text-align:left;  
}
#sidebar #cats li{
   list-style:none;
   margin:9.7px 0;
   padding:2px 0;
   box-shadow:none;}
#sidebar #cats li :hover{
   background:#93FFE8;
}


#sidebar #cats li a{
   margin-left:20px;
}

#sidebar #cats li a :hover{
   color:black;
}
#sidebar #cats a{
   color:black;
   text-align:left;
   font-size:20px;
   text-decoration:none;
   font-family:arial;
}

.content_wrapper #content_area{
   width:83%;
   float:left;
   background:rgba(255, 255, 255,0.8);
   //box-shadow: 0 1px 4px 0 rgba(0,0,0,0.2), 0 2px 10px 0 rgba(0,0,0,0.19);
   box-shadow: 0 1px 4px 0 rgba(0,0,0,0.1), 0 2px 10px 0 rgba(0,0,0,0.15);
   margin:0 10px 0 10px;   
   border-top:1px solid rgba(0,0,0,0.1);
   border-bottom:1px solid rgba(0,0,0,0.1);
   text-align:center;
}
#products_box{
   width:100%;
   display:inline-block;
   position:relative;
   right:-9px;
   top:9px;
   padding:0 0 13px 0;
   text-align:left;
}
#single_product{
   float:left;
   width:199px;
   padding:13.1px;
   margin:9px;
   //box-shadow: 0 1px 4px 0 rgba(0,0,0,0.2), 0 2px 10px 0 rgba(0,0,0,0.19);
   border:1px solid rgba(0,0,0,0.06);
   background:white;
}
#single_product a button{
   border:1px solid rgba(0,0,0,0.05);
   padding:10px;
   width:100%;
   display:inline-block;
   margin:25px 0 0 0;
   background:rgba(9, 74, 65,1);
   color:rgba(258,258,258,0.8);
}
#single_product a{
   width:100%;
   display:block;  
   text-align:left;
   margin:10px 0;
   text-decoration:none;
   color:gray;
}
#single_product img{
   width:100%;
   margin:10px 0 15px 0;
}
footer{
   text-align:center;
}

</style>

<!------------ Content wrapper starts -------------->
  <div class="content_wrapper">
    <div id="sidebar">
	<?php cart();?>
	  
	  <div id="sidebar_title "><p style="font-size:25px;">Brands<p></div>
	  <ul id="cats">
	    <?php 
		getBrands();
		?>
	  </ul>
	  
	</div><!-- /#sidebar -->
	


		
      <?php getPro();?>
		<?php get_pro_by_brand_id(); ?>
		
	  </div><!-- /#products_box -->
	</div><!-- /#content_area -->
	
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  
  <?php include ('includes/footer.php'); ?>
  
  