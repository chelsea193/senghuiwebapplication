<title>Home | Seng Hui</title>
        <link rel="icon" href="img/favicon.ico"/>

<!------------ Header starts --------------------->
<?php include('includes/header.php'); ?>
<!------------ Header ends ----------------------->

<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<!------------ Navigation Bar ends -------------->  

<!------------ Content wrapper starts -------------->
  <div class="content_wrapper">
  
  <?php if(!isset($_GET['action'])){ ?>
 
<section>
    <div class="s1">
        <div class="text1">
            <h1>Seng Hui</h1>
            <h2>Intro</h2>
            <p>At My Site we make sure to offer our clients
                the best selection of vehicle and auto parts,<br> as well
                as provide them with superb customer service. Our staff
                works with our customers to find exactly the right path they
                need for the right place.<br> We're here to help
                inform you about our products, so that you only buy 
                what is absolutely necessary for your vehicle.<br> Contact us today
                to learn about what we do.</p>
        </div>
        <img src="img/dash.jpg">
    </div>
  <div class="container">
    <div class="main-card">
        <div class="cards">
            <div class="card">
                <div class="content">
                    <div class="img">
                    
                        <img src="img/135LCFI.png" alt=""> 
                    </div>
                    <div class="details">
                        <div class="name">Yamaha 135LC FI</div>
                        <div class="price">RM4,320.00</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="img">
                        <img src="img/dash125i.png" alt=""> 
                    </div>
                    <div class="details">
                        <div class="name">Honda Dash 125i</div>
                        <div class="price">RM4,100.00</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="img">
                        <img src="img/wavealpha.png" alt=""> 
                    </div>
                    <div class="details">
                        <div class="name">Honda Wave Alpha</div>
                        <div class="price">RM3,400.00</div>
                    </div>
                </div>
            </div>
        </div>
            <div class="cards">
            <div class="card">
                <div class="content">
                    <div class="img">
                        <img src="img/vario.png" alt=""> 
                    </div>
                    <div class="details">
                        <div class="name">Honda Vario</div>
                        <div class="price">RM5,100.00</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="img">
                        <img src="img/Kriss110.png" alt=""> 
                    </div>
                    <div class="details">
                        <div class="name">KRISS 110</div>
                        <div class="price">RM3,750.00</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div class="img">
                        <img src="img/krissmr2.png" alt=""> 
                    </div>
                    <div class="details">
                        <div class="name">KRISS MR2</div>
                        <div class="price">RM3,850.00</div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>
	


<?php }else{ ?>

<?php 
include('login.php'); 
} 
?>

	
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  
  <?php include ('includes/footer.php'); ?>
  
  
