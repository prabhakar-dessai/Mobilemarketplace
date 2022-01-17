<html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('logincheck.php');
$connect = mysqli_connect("localhost", "root", "", "project") or 
die("Please, check your server connection.");
if (isset($_REQUEST['icode'])) {
    $prod_id = $_REQUEST['icode']; 
    }
$query = "UPDATE repair_devices SET cust_accept_status=1 where model_no='$prod_id'";
$results = mysqli_query($connect, $query);
echo '<script> window.location.replace("repair.php"); </script>'
?>
</html>