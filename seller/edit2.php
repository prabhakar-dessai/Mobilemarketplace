<?php
include('db_conn.php');
	$v0=$_GET['id'];
	$v1=$_GET['NAME'];
	$v2=$_GET['MODEL'];
	$v3=$_GET['DESC'];
	$v4=$_GET['PR'];
	$q1="UPDATE products SET name='$v1', model='$v2',description='$v3', price='$v4' where prod_id='$v0'";
	$data=mysqli_query($con,$q1);
	if($data){
		echo"<script> alert('record updated') </script>";
		?><META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/project/seller/choose.php">
<?php	}
	else{
		echo"<script> alert('update failed') </script>";
		
	}

?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/project/seller/choose.php">