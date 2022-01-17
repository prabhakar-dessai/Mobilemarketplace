<?php
session_start();
$y=$_SESSION['sid'];
$z=$_GET['pid'];
include('db_conn.php');
$x=$_GET['reply'];
$a=$_GET['review'];
$q1="UPDATE reviews SET reply='$x' WHERE prod_id='$z' AND review='$a'";
$data=mysqli_query($con,$q1);
	if($data){
		echo"<script> alert('review updated') </script>";
		?><META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/project/seller/review.php">
<?php	}
	else{
		echo"update failed";
    }
?>