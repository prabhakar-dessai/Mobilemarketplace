<?php
$a=$_GET['ds'];
$b=$_GET['id'];
include("db_conn.php");
if($a==0){
    $q1="UPDATE purchases SET delivery_status=1 where purchase_id='$b'" ;
    mysqli_query($con,$q1) or die(mysqli_error($con));
    header('Location: SALES.php');
}
else{
    $q1="UPDATE purchases SET delivery_status=0 where purchase_id='$b'" ;
    mysqli_query($con,$q1) or die(mysqli_error($con));
    header('Location: SALES.php');
}
?>