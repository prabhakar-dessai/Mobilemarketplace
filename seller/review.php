<html>
<style>
  h2{
    text-align:center;
   padding: 10px 10px; 
  }
    input {
  width: 90%;
  
  margin: 5px 5px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 20px;
  box-sizing: border-box;
}
table td{
    text-align: center;
    font-family: cursive;
}
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
      margin-top: 45px;
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
			border:1px solid blue;
			padding: 12px 16px;
			background: white;


		}

  .button {
    font-family: "Roboto Mono", monospace;
  border-radius: 30px;
  background-color: black;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 12px;
  padding: 5px;
  width: 70px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


</style>
<body>


<body>

<?php
session_start();
include("db_conn.php");
if(isset($_SESSION['sid'])){ ?>
    <table class="header">
			<th><p><a href="pr_est.php">PRICE ESTIMATION</a></p></th>
			<th><p><a href="upload.php">UPLOAD NEW PRODUCT</a></p></th>
			<th><p><a href="SALES.php">SALES REPORT</a></p></th>
			<th><p><a href="choose.php?">YOUR PRODUCTS</a></p></th>
			<th><p><a href="logout.php">LOGOUT</a></p></th>
		</table> <?php
    $a=$_SESSION['sid'];
    $q1="SELECT products.Imagename, products.prod_id, products.name,products.model,reviews.reply ,reviews.review FROM products INNER JOIN reviews ON reviews.prod_id=products.prod_id  WHERE products.seller_id='$a'";
    $res=mysqli_query($con,$q1);
	if(mysqli_num_rows($res)>0){
    ?>
        <div class="table-container">
		<table border = "1">
		<tr>
		<th>Phone name</th>
		<th>Model name</th>
		<th>Phone image</th>
        <th>Review</th>
        <th>Reply</th> </tr>
        <?php
        
        while($row=mysqli_fetch_assoc($res))
    {
		$image = $row['Imagename'];
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
		echo "<td>".$row['model']."</td>";
			?>
	
	<td><img src="../storefront/images/<?=$image ?>" width="100px" height="100px"  ></td> 
        <td><form action="review2.php" method="get">
    <?php echo $row['review'] ?></td>
    <input type="hidden" name="review" value="<?php echo $row['review'];?>" />
    <input type="hidden" name="pid" value="<?php echo $row['prod_id'];?>" />
    <?php
    if($row['reply']==null){
    ?>
    <td><input type="textbox" name="reply" value="<?php echo $row['reply'];?>" />
    <button class="button" type="submit"  name="submit"><span>REPLY</span></button>
     

<?php
    }
    else{
echo '<td>'.$row['reply'];
} 
?>
</form></td></tr>
<?php
}
}
else{
    echo"<h2>Yet to recieve reviews</h2>";
}

}
?>
</table> </div>
</body></html>