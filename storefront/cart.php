<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('logincheck.php');
$connect = mysqli_connect("localhost", "root", "", "project") or 
die("Please, check your server connection.");
$message = "";
$action="";
if (isset($_REQUEST['icode'])) {
    $prod_id = $_REQUEST['icode']; 
    }
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}
switch ($action) {
    case "buynow":
        $query = "INSERT INTO purchases  VALUES ('0', default, '$prod_id', '$sess_id', default)";
        $message = "<div align=\"center\"><strong>Item purchased.</strong></div>";
        break;
    
        case "delete":
        $query = "DELETE FROM purchases WHERE user_id ='$sess_id' and prod_id='$prod_id'";
        $message= "<div style=\"width:200px; margin:auto;\">Order deleted</div>";
        break;
    
        case "deleterev":
        $query = "DELETE FROM reviews WHERE user_id ='$sess_id' and prod_id='$prod_id'";
        $message= "<div style=\"width:200px; margin:auto;\">Review deleted</div>";
        break;
    }
if($query !="")
{
$results = mysqli_query($connect, $query);
echo $message;
}
include('orders.php');
?>