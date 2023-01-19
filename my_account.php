

<!------------ Header starts --------------------->
<?php include('includes/header.php'); ?>
<!------------ Header ends ----------------------->

  
<!------------ Navigation Bar ends -------------->  

<!------------ Content wrapper starts -------------->
  <div class="content_wrapper">
  
  <?php if(isset($_SESSION['user_id'])){ ?>
  
  <div class="user_container">
  
  <?php if($_GET['action'] !='purchase_history' && $_GET['action'] !='view_receipt' ){ ?>
  
  <div class="user_content">
  
  <?php 
  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }else{
    $action = '';
  }
  

  /*if($_GET['action'] == 'edit_account'){
  echo $action;
  }*/
  
  ?>
 
  
  <?php }elseif($_GET['action'] == 'purchase_history'){ ?>
  
  <?php include 'users/purchase_history.php'; ?>
  
  <?php }elseif($_GET['action'] == 'view_receipt'){ ?>
  
  <?php include 'users/receipt.php'; ?>
  
  <?php } ?>
  
  </div><!-- /.user_container-->
  
  <?php }else{ ?>
  
  <h1>Account Setting Page</h1>
  
  <h5><a href="index.php?action=login">Log In </a> to Your Account!</h5>
  
  <?php } ?>
  
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  
  <?php include ('includes/footer.php'); ?>
  
  
