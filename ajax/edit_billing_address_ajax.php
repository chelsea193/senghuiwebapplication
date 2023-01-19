

<?php
session_start();

$message = '';

if(isset($_SESSION['user_id'])){

include '../includes/db.php';

$user_id = $_POST['user_id'];

$update_user = mysqli_query($con,"update users set name='$_POST[name]', user_address='$_POST[user_address]', IC='$_POST[IC]', contact='$_POST[contact]' where id='$user_id' ");

  if($update_user){
   
   $update_additional = mysqli_query($con,"update additional_notes set note_content='$_POST[additional_content]' where user_id='$user_id' ");
   
   $message .= "ok";
  }else{
   $message .= "failed to update";
  }
  
}else{
  $message .= "logged out";
  
  //$message = $message . "logged out";
}

$array = array($message);

echo json_encode($array);

 ?>