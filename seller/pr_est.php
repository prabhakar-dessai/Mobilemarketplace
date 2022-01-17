<html>
<head>
</head>
<?php
if(isset($_POST['submit'])){
	$yrs=$_POST['yrs'];
	$e_pr=$_POST['e_pr'];
	$comp=$_POST['comp'];
	$depr=0;
	$fn=0;
		switch(($comp)){
		case 1:
		$fn=0.1;
		break;
		case 2:
		$fn=0.15;
		break;
		case 3:
		$fn=0.2;
		break;
		case 4:
		$fn=0.25;
		break;
		default:
		$fn=0.35;
		break;
		
	}
	$a=pow((1-$fn),$yrs);
$depr=$e_pr*$a;

}
?>
<body>
<style>
	.container {
			background-color: rgb(239,243,246);
			width: 80%;
			margin: auto;
			margin-top: 20px;
			box-shadow: white -10px -10px 20px 5px, rgba(24,24,24,0.2) 10px 10px 20px 5px;
			padding: 10px;
		}
	body {
		width: 100%;
		height: 100vh;
	}
	body .form-container {
		width: 80%;
		margin: 40px auto;
	}
	form {
		width: 80%;
		margin: auto;
		/* text-align: center; */
	}
	.item {
		display: flex;
		flex-direction: row;
		padding: 20px 0;
	}
	.item label, .label {
		width: 30%;
		text-align: center;
		padding: 10px;
	}
	.item input, .item select, .item .input {
		width: 70%;
		border: none;
		outline: none;
		border-bottom: 1px solid blue;
	}
	.item .submit-btn {
		text-align:center;
		text-decoration:none;
		width: 50%;
		border: 1px solid black;
		border-radius: 6px;
		background: none;
		color: black;
		font-weight: bold;
		text-transform: uppercase;
		padding: 12px;
		margin-right: 10px;
	}
	.item .submit-btn:hover {
		background: cyan;
		transition: 250ms linear;
	}

</style>
<?php
session_start();
if(isset($_SESSION['sid'])){
$seller_id=$_SESSION['sid'];
?>
<div class="container">
<div class="form-container">
	<div style="text-align: center;font-size: 25px;">  Price Estimation </div>
	<form action="" method="post">
		<div class="item">
			<label for="years">Years Used: </label>
			<input type="number" name="yrs" id="years">
		</div>
		<div class="item">
			<label for="comp">Choose Company: </label>
			<select id="comp" name="comp">
			<option value="1" >Apple</option>
			<option value="2">Samsung</option>
			<option value="3">One Plus</option>
			<option value="4">Xiomi</option>
			<option value="5">Other</option>
			</select>
		</div>
		<div class="item">
			<label for="og-price">Enter Orignal price: </label>
			<input id="og-price" type="number" name="e_pr">
		</div>
		<div class="item">
			<p class="label">Estimated price: </p>
			<?php
				if(isset($depr) && $depr != 0) {
					echo "<p class='input'>".$depr."</p>";
				}
			?>
		</div>
		<hr>
		<div class="item">
			<input class="submit-btn" type="submit" value="Estimate" name="submit">
			<a  class="submit-btn" href="http://localhost/project/seller/choose.php"> Go back to Menu </a>
			<br>
			
		</div>
		
	</form>
</div>
</div>
</body>
</html>
<?php } ?>