<html background-image:>
<head>
<title>ADMIN</title>
<h1 align="center">WELCOME ADMIN</h1>
<td><a href="SEL" class="a1">SELLERS</a></td>
<td><a href="adminpage.php" class="a1">CUSTOMMERS</a></td>
<td><a href="rep" class="a1">FEEDBACK/REPORTS</a></td>
<td><a href="product.php" class="a1">PRODUCTS</a></td>
<td><a href="logout.php" class="a1" onclick='conflog()'>LOGOUT</a></td>
<style>

p{
	text-align: center;
	font-family: "Lucida Console", "Courier New", monospace;
	font-size:20;
	font-weight:bold;
	background-color:blue;
	color:white;
	

}
.a1:link {
  color: blue;
  background-color: orange;
  text-decoration: none;
  padding: 10px 40px;
  font-family: Copperplate, Papyrus, fantasy;
  font-size: 18;
  font-weight: bold;
}
a:visited {
  color: blue;
  background-color: transparent;
  text-decoration: none;
}

.a1:hover {
  color: white;
  background-color: black;
  text-decoration: underline;
  
}

a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
.boxContainer{
	margin:auto;
	margin-top:5%;
	position:relative;
	width:300px;
	height:42px;
	border:4px solid #2980b0;
	padding:0px 10px;
	border-radius: 50px;
}

.elementsContainer{
	width:100px;
	height:100px;
	vertical-align:middle;
	

}
.search{
	width:100px;
	height:100px;
	border:none;
	padding:0px 5px;
	border-radius: 50px;
	font-size:18px;
	font-family:"Nunito";
	color:#424242;
	font-weight:500;
}
.serach:focus{
	outline:none;
	
}
.material-icons{
	font-size:26;
	collor:#2980b9;
}
.src{
bg-co;	
border:none;
outline:none;
font-size:20px;
text-align: center;
 background-color: transparent;
}

body {
  background-image: url('https://fullscreenbackgroundimages.com/wp-content/uploads/2019/05/Website-Background-Image-5.jpg');
  background-size: 2000px 1000px;
}
.tab{
	background-color: white;
	border: none;
	padding:5px;
	text-align:center;
	font-family: "Lucida Console", Courier, monospace;
}

.col, .row{
	border: 1px solid black;
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
			border:none;
			text-transform:capitalize;
			border:1px solid blue;
			padding: 12px 16px;
			background: white;

		}
		

</style>
</head>
<body>
<div class="boxContainer">
<table class="elementsContainer">
<tr>
<td>
<form method="post">
	<input type="text" name="str"  placeholder="ENTER DETAILS" class="src" required/>
	<input type="submit" name="submit" style="background-image: url('https://d29fhpw069ctt2.cloudfront.net/icon/image/84452/preview.svg')" value='' class="search"/>
</form>
</td>
<td>

</td>
</tr>
</td>
</table>
</div>
</body>
</html>
<?php
include('db.php');
if(isset($_POST['submit'])){
	$str=mysqli_real_escape_string($con,$_POST['str']); }
	else{
		$str="";
	}
	$sql="select * from products where name like '%$str%' or model like '%$str%' or prod_id like '%$str%'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			?>
			<table style="width:90%" class="tab">
			<tr class="col">
			
			<td class="col"><?php echo "Company Name";?></td>
			<td class="col"><?php echo "Model";?></td>
			<td class="col"><?php echo "ID";?></td>
			<td class="col"><?php echo "phone image";?></td>
			<td class="col"><?php echo "Description";?></td>
			
			</tr>
			<?php
		while($row=mysqli_fetch_assoc($res))
		{?>
			<tr class="col">
			<?php 
			$image = $row['Imagename'];
			$x=$row['prod_id'];?>
			<td class="col"><?php echo $row['name'];?></td>
			<td class="col"><?php echo $row['model'];?></td>
			<td class="col"><?php echo $row['prod_id'];?></td>
			<td class="col"><img src="../storefront/images/<?= $image ?>" width="100px" height="100px"  ></td>
			<td class="col"><?php echo $row['description'];?></td>
			</tr>


 <?php  }?> </table>
 <?php
	}else{
		echo"</br>";
		echo"</br>";
		echo"</br>";
		echo"</br>";
		echo"</br>";
		echo"</br>";
		echo "<p>No data found</p>";
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
