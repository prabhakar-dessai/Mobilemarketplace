<html>

<style>
body{
	background-color: rgb(239,243,246);
	padding:30px 0px;
}
a{
	color:grey;
	text-decoration: none;
	
	/* text-decoration:underline; */
}
a:visited {
  color: grey;
  text-decoration: underline;
}

a:hover {
  color: blue;
  text-decoration: underline;
  /* background-color: black; */
  /* text-decoration: underline; */
  
}
p {
	font-size:18px;
	color:grey;
	text-align:center

}
#editbtn{
	background-color:green;
	color:white;
	width:100px;
	font-size:18px;
	height:30px:
}

#deltbtn{
	background-color:red;
	color:white;
	width:100px;
	font-size:18px;
	height:30px:
}

</style>
<body>
	<style>
		.header {
			width: 100%;
			margin: auto;
			border:none;
			border-radius:6px;
			box-shadow: white -10px -10px 20px 5px, rgba(24,24,24,0.2) 10px 10px 20px 5px;
		}
		.header th {
			border: none;
		}
		.table-container {
			background-color: rgb(239,243,246);
			width: 80%;
			padding: 20px;
			margin: auto;
			box-shadow: white -10px -10px 20px 5px, rgba(24,24,24,0.2) 10px 10px 20px 5px;
		}
		table {
			width: 80%;
			margin: auto;
			border-collapse: collapse;
		}
		.desc {
			text-align: center;
		}
		table th{
			
			text-transform:capitalize;
			border:1px solid blue;
			padding: 12px 16px;
			background: white;

		}
	</style>
<?php
include('db_conn.php');
session_start();

if(isset($_SESSION['sid'])){
	$num=$_SESSION['sid'];
?>
		<table class="header">
			<th><p><a href="pr_est.php">PRICE ESTIMATION</a></p></th>
			<th><p><a href="upload.php">UPLOAD NEW PRODUCT</a></p></th>
			<th><p><a href="choose.php">YOUR PRODUCTS</a></p></th>
			<th><p><a href="review.php">PRODUCT REVIEWS</a></p></th>
			<th><p><a href="logout.php">LOGOUT</a></p></th>
		</table>
		<h4 class="desc">Your SOLD products are displayed below</h4>
<?php
	$q1="SELECT * FROM products inner join purchases on products.prod_id=purchases.prod_id where products.seller_id='$num'";
	$res=mysqli_query($con,$q1);
	if(mysqli_num_rows($res)>0){
		?>
		<div class="table-container">
		<table border = "1">
		<tr>
		<th>Phone name</th>
		<th>Model name</th>
	<!--	<th>Phone image</th>
		<th>p img</th> -->
		<th>PRICE</th>
		<th>DELIVERY STATUS</th>
		<th>EDIT DELIVERY STATUS</th>
		
		</li></tr>
		<?php
		while($row=mysqli_fetch_assoc($res))
		{ ?> 
		<tr>
		<?php 
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['model']."</td>";
			echo "<td>".$row['price']."</td>";
			if($row['delivery_status']==0){
				echo "<td>DELIVERY PENDING</td>";
			}
			else{
				echo "<td>DELIVERED</td>";
			}
			$ds=$row['delivery_status'];
			$id=$row['purchase_id'];
			?>
		<td><a id="editbtn" style="margin:5px;" href="edit_p.php?ds=<?=$ds?>&id=<?=$id?>" onclick='return checkedit()'>EDIT</a></td></tr>
		<?php
		 }?> </table>
		</div>
		<?php
		$q2="SELECT sum(products.price) AS total FROM purchases inner join products on purchases.prod_id=products.prod_id WHERE seller_id='$num'";
		$res1=mysqli_query($con,$q2);
		$row1=mysqli_fetch_assoc($res1);
		$price= $row1['total'];
		echo'<p style="color:black;">Total sales this month: Rs '.$price.'</p>';
	}
	else{
		echo '<p>(Yet to SELL products)</p>';
		
	}
	}
?>
	</body>
	</html>
<script>
function checkdelete()
{
	return confirm('are you sure you want to delete this record');
}
function checkedit()
{
	return confirm('are you sure you want to edit this record');
}
function conflog()
{
	return confirm('are you sure you want to logout of this account');
}
</script>
