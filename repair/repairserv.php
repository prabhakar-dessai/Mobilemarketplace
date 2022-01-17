<html>
    <head>
        <style>
            table {
    font-family: futura-pt, sans-serif;
    font-weight: 400;
    font-style: normal;
    width: 800px;
	border-collapse: collapse;
	overflow: hidden;
    background-color: white;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(114, 114, 113, 0.5);
}

th {
    font-size: 16px;
    font-weight: 600;
    margin-left: auto;
    margin-right: auto;
    padding: 10px 10px 10px 10px;
}

tr:nth-child(even) {
    background-color: #eff2f5;
}

tr:not(:first-child):hover {
    background-color: rgba(114, 114, 113, 0.2);
}
.page{
    margin-top: 80px;
}  

.i-submit{
 background-color: #7DC855;
  color: white;
  margin-top: 0px;
  padding: 4px;
  border-radius: 6px;
  font-size: 16px;
  text-decoration: none;
  transition: all .5s;
  border: none;
} 
.i-submit:hover {
  background-color: #64af3d;
}
.input {
    background: hsl(0deg 0% 100%);
    box-shadow: 0 0 0.5em hsl(231deg 62% 94%);
    padding: 1em;
    display: flex;
    flex-direction: column;
    gap: 0.5em;
    border-radius: 20px;
    margin-top: 1em;
}

a {
    text-decoration: none;
}
            </style>
</head>
    <body>
<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "project") or 
die("Please, check your server connection.");
$query = "SELECT Model_no,model,prob_desc,quoted_price,cust_accept_status,rs_accept_status FROM repair_devices inner join repair_services on repair_devices.shop_id=repair_services.shop_id WHERE repair_devices.shop_id ='$sess_id'";
$results = mysqli_query($connect, $query);
echo "<div class=\"page\">";
if(mysqli_num_rows($results)==0)
{
echo "<div style=\"width:200px; margin:auto;\">You have not recieved any orders!</div> ";
}
else
{
?>
<table>
<tr><th colspan=6 style="font-size: 18px;">Repair Orders </th></tr>
<tr><th>Model No:</th><th>Product Name</th><th>Problem Description</th><th>Quote Price</th><th>Approve Order</th><th>Customer Approval Status</th>
<?php
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
extract($row);
echo "<tr><td>";
echo $Model_no;
echo "</td><td>";
echo $model;
echo "</td><td>";
echo $prob_desc;
echo "</td><td>";
if($quoted_price==NULL){
echo "<form method=\"POST\" action=\"process.php?icode=$Model_no\">";
echo "<input class=\"input\" type=\"text\" name=\"quoted_price\">";
}
else
echo $quoted_price;
echo "</td><td>";
if($rs_accept_status=="1")
echo "Order Approved";
else
{
echo "<input class=\"i-submit\" type=\"submit\" name=\"Submit\" value=\"Accept Order\"></form>";
}
echo "</td><td>";
if($cust_accept_status==0){
echo "Not Approved yet";
}
else
echo "Approved";
echo "</td></tr>";
}
echo "</div>";
echo "</tr>";
echo "</table><br>";
?>
<?php
}
?>
</body>
</html>