<?php session_start();

if(isset($_SESSION['user'])){
?>

<html>
<head>
<title>ADMIN</title>
<h1 align="center">WELCOME ADMIN</h1>
<td><a href="seller.php" class="a1">SELLERS</a></td>
<td><a href="adminpage.php" class="a1">CUSTOMMERS</a></td>
<td><a href="rep.php" class="a1">FEEDBACK/REPORTS</a></td>
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
  padding: 10px 45px;
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
	border: 1px solid black;
	padding:5px;
}

.col, .row{
	border: 1px solid black
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
	$sql="select * from account where email_id like '%$str%' or username like '%$str%' or user_id like '%$str%'";
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
			<table style="width:100%" class="tab">
			<tr class="col">
			
			<td class="col"><?php echo "Name";?></td>
			<td class="col"><?php echo "email";?></td>
			<td class="col"><?php echo "ID";?></td>
			</tr>
			<?php
		while($row=mysqli_fetch_assoc($res))
		{?>
			<tr class="col">
			<?php $x=$row['user_id'];?>
			<td class="col"><?php echo $row['username'];?></td>
			<td class="col"><?php echo $row['email_id'];?></td>
			<td class="col"><?php echo $row['user_id'];?></td>
			</td>
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
}

else{
	echo "<script> location.href='index.php' </script>";
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
