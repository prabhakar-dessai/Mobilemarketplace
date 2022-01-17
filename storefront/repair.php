<html>
    <head>
        <style>

.re-body {
	margin: 0;
	background: linear-gradient(0deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;
}
 table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
    margin-left:auto;
    margin-right:auto;
    margin-top: 30px;
}

th,td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}

thead th {
		background-color: rgba(255,255,255,0.2);
        text-align: center;
	}

tbody tr:hover {
	
			background-color: rgba(255,255,255,0.3);
		
	}
tbody td {
		position: relative;
}
tbody td:hover:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}

div.reg-button{
    margin-top: 85px;
    margin-left: 240px;
    display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  padding: 12px 30px;
  transition: all .5s;
}

a {
    text-decoration: none;
    color: white;
}

input.i-submit{
 background-color: #7DC855;
  color: white;
  padding: 8px;
  border-radius: 6px;
  font-size: 12px;
  text-decoration: none;
  transition: all .5s;
  border: none;
} 
input.i-submit:hover {
  background-color: #64af3d;
}
</style>
</head>
    <body class="re-body">
    
<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "project") or 
die("Please, check your server connection.");
$query = "SELECT Model_no,model,Shop_name,quoted_price,cust_accept_status,rs_accept_status FROM repair_devices inner join repair_services on repair_devices.shop_id=repair_services.shop_id WHERE repair_devices.user_id ='$sess_id'";
$results = mysqli_query($connect, $query);
if(mysqli_num_rows($results)==0)
{
echo '<div class=reg-button><a href="repairreg.php">Register a new device</a></div>';
echo "<div style=\"width:200px; margin:auto;\">You have not placed any orders!</div> ";
}
else
{
?>
<div class=reg-button><a href="repairreg.php">Register a new device</a></div>
<table>
<tr><thead><th colspan=6> Registered Devices </th></thead></tr>
<tr><th>Model No:</th><th>Product Name</th><th>Repair Service</th><th>Order Status</th><th>Quoted Price</th><th>Approve</th>
<?php
echo "<tbody>";
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
extract($row);
echo "<tr><td>";
echo $Model_no;
echo "</td><td>";
echo $model;
echo "</td><td>";
echo $Shop_name;
echo "</td><td>";
if($rs_accept_status=="1")
echo "Order accepted";
else
echo "Order Pending";
echo "</td><td>";
if($quoted_price==NULL)
echo "Not quoted";
else
echo $quoted_price;
echo "</td><td>";
if($quoted_price==NULL)
echo "Price not quoted yet";
else if($cust_accept_status==0){
echo "<form method=\"POST\" action=\"repairaccept.php?icode=$Model_no\">";
echo "<input class=\"i-submit\" type=\"submit\" name=\"Submit\" value=\"Accept Price\"></form>";
}
else
echo "Approved";
echo "</td></tr>";
}
echo "</tr>";
echo "</tbody>";
echo "</table><br>";
?>
<?php
}
?>
</body>
</html>