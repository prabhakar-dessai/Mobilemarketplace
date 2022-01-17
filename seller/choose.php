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
			width: 80%;
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
			margin: auto;
			margin-top: 20px;
			box-shadow: white -10px -10px 20px 5px, rgba(24,24,24,0.2) 10px 10px 20px 5px;
		}
		table {
			width: 90%;
			margin: auto;
			border-collapse: collapse;
		}
		.desc {
			text-align: center;
		}
		table th{
			
			text-transform:capitalize;
			border:1px solid black;
			padding: 12px 16px;
			background: white;

		}
	</style>
<?php
include('db_conn.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['sid'])){
	$num=$_SESSION['sid'];
}
else{
	$sessname= $_SESSION['username'];
	$conn= mysqli_connect("localhost", "root", "");
	$db= mysqli_select_db($conn, "project");
	$query= mysqli_query($conn, "SELECT seller_id FROM seller where username='$sessname'");
	$row = $query->fetch_assoc();
	$num=$row['seller_id'];
	$_SESSION['sid']=$num;
}
?>
		<table width=100% class="header">
			<th><p><a href="pr_est.php">PRICE ESTIMATION</a></p></th>
			<th><p><a href="upload.php">UPLOAD NEW PRODUCT</a></p></th>
			<th><p><a href="SALES.php">SALES REPORT</a></p></th>
			<th><p><a href="review.php?">PRODUCT REVIEWS</a></p></th>
			<th><p><a href="logout.php">LOGOUT</a></p></th>
		</table>

<?php
	$q1="SELECT * from products where seller_id='$num'";
	$res=mysqli_query($con,$q1);
	if(mysqli_num_rows($res)>0){
		?>
		<div class="table-container">
		<table border = "1">
		<tr>
		<th>Phone name</th>
		<th>Model name</th>
		<th>Phone image</th>
		<!--<th>p img</th> -->
		<th>ACTION</th>
		<th>PRICE</th>
		<th>DESCRIPTION</th>
		</li></tr>
		<?php
		while($row=mysqli_fetch_assoc($res))
		{ ?> 
		<tr>
		<?php 
			$filename = $row['Imagename'];
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['model']."</td>";
			?>
			<!-- Image -->
	<td><img src="../storefront/images/<?= $filename ?>" width="100px" height="100px" ></td>
			<td><a id="deltbtn" style="margin:5px;" href="delete.php?id=<?php echo $row['prod_id'] ?>" onclick='return checkdelete()' >DELETE</a>
			<hr>
			<a id="editbtn" style="margin:5px;" href="edit.php?id=<?php echo $row['prod_id'] ?>&nm=<?php echo $row['name'] ?>&em=<?php echo $row['model'] ?>&desc=<?php echo $row['description'] ?>&price=<?php echo $row['price'] ?>" onclick='return checkedit()'>EDIT</a>
			</td>
			<?php
			echo "<td>".$row['price']."</td>";
			echo "<td>".$row['description']."</td>";
			?>
			</tr>
		<?php
		 }?> 
		 </table>
		</div>
		<?php
	}
	else{
		echo '<p>(Yet to upload products)</p>';
		
	}
 ?>
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
</body>
</html>