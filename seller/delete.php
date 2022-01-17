
<style>
	h1{
		text-align:center;
		color:gery;
	}
</style>

<?php
include('db_conn.php');
$id=$_GET['id'];
$query="DELETE FROM products where prod_id='$id'";
$data=mysqli_query($con, $query);
if($data)
{
	echo"<script>alert('Record deleted')</script>";
}
else
{
	echo"attempt unsuccessful";
}
?>
<META HTTP-EQUIV="Refresh" CONTENT="2; URL=http://localhost/project/seller/choose.php">