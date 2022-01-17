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
if (isset($_REQUEST['review'])) {
    $review = $_REQUEST['review'];
}
$query2= mysqli_query($conn, "SELECT seller_id FROM products where prod_id='$prod_id'");
$row = $query2->fetch_assoc();
$sell_id=$row['seller_id'];
$query = "INSERT INTO reviews VALUES (default,'$review',default,'$sell_id','$sess_id','$prod_id')";
$results = mysqli_query($connect, $query);
echo '<script> window.location.replace("itemdetails.php?itemcode='.$prod_id.'"); </script>'
?>
</html>