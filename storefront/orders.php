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
    font-size: 18px;
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
  margin-top: 10px;
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

a {
    text-decoration: none;
}
</style>
</body>
<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "project") or 
die("Please, check your server connection.");
$query = "SELECT purchases.prod_id,name,model,price,purchase_date,delivery_status FROM purchases inner join products on purchases.prod_id=products.prod_id WHERE purchases.user_id ='$sess_id'";
$results = mysqli_query($connect, $query);
if(mysqli_num_rows($results)==0)
{
echo "<div style=\"width:200px; margin:auto; margin-top: 75px;\">You have not placed any orders!</div> ";
}
else
{
?>
<div class=page>
<table>
<tr><th colspan="5"> Orders </th></tr>
<tr><td>Product Name</td><td>Price</td><td>Purchase Date</td><td>Delivery Status</td><td>Cancellation</td></tr>
<?php
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
extract($row);
echo "<tr><td>";
echo "<a href=itemdetails.php?itemcode=$prod_id>";
echo $name." ".$model;
echo "</a>";
echo "</td><td>";
echo $price;
echo "</td><td>";
echo $purchase_date;
echo "</td><td>";
if($delivery_status=="1")
echo "Delivered";
else
echo "Delivery Pending";
echo "</td><td>";
echo "<form method=\"POST\" action=\"cart.php?action=delete&&icode=$prod_id\" onsubmit=confirm(\"Are you sure you want to delete?\")>";
echo "<div ><input class=\"i-submit\" type=\"submit\" name=\"Submit\" value=\"Remove Order\"></div></form>
</td></tr>";
}
echo "</tr>";
echo "</table><br>";
?>
<?php
}
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "project") or 
die("Please, check your server connection.");
$query = "select review,reply,products.prod_id,name,model FROM reviews inner join products on reviews.prod_id=products.prod_id WHERE reviews.user_id ='$sess_id'";
$results = mysqli_query($connect, $query);
if(mysqli_num_rows($results)==0)
{
echo "<div style=\"width:200px; margin:auto; margin-top:150px;\">You have not reviewed any products!</div> ";
}
else
{
?>
<table>
<tr><th colspan="4"> Reviews </th></tr>
<tr><td>Product Name</td><td>Review</td><td>Reply</td><td>Delete</td></tr>
<?php
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
extract($row);
echo "<tr><td>";
echo "<a href=itemdetails.php?itemcode=$prod_id>";
echo $name." ".$model;
echo "</a>";
echo "</td><td>";
echo $review;
echo "</td><td>";
echo $reply;
echo "</td><td>";
echo "<form method=\"POST\" action=\"cart.php?action=deleterev&&icode=$prod_id\" onsubmit=confirm(\"Are you sure you want to delete?\")>";
echo "<input class=\"i-submit\" type=\"submit\" name=\"Submit\" value=\"Remove Review\" ></form>
</td></tr>";
}
echo "</tr>";
echo "</table><br>";
echo "</div>"
?>
<?php
}
?>
</body>
</html>