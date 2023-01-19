

<?php 

session_start();

$_SESSION['checked_on_page_reload_offline_type'] = $_POST['radio_val'];

echo $_SESSION['checked_on_page_reload_offline_type'];

?>