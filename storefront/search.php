<html>
       <head>
       <style>
                    div.product-dis {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 260px;
    max-height: 240px;
    font-family: georgia;
    text-align: center;
    position:relative;
    padding:10px;
    top:40px;
    left: 125px;
    
  }
  .pname {
   display: block;
    color: black;
    text-align: center;
}
a:link {
  text-decoration: none;
}
.price {
  color: grey;
  font-size: 16px;
}

  table {
        border-collapse: separate;
        border-spacing: 0 30px;
      }
          </style>
      </head>
      <body>
<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "", "project") or
die("Please, check your server connection.");
$tosearch=$_POST['tosearch'];
$query = "select * from products where ";
$query_fields = Array();
$sql = "SHOW COLUMNS FROM products"; // #1
$columnlist = mysqli_query($connect, $sql) or die(mysql_error()); // #2
while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)){ // #3
extract($arr);
$query_fields[] = $Field . " like('%". $tosearch . "%')";
}
$query .= implode(" OR ", $query_fields);
$results = mysqli_query($connect, $query) or die(mysql_error());
echo "<br/><table width=84%>";
$x=1;
echo "<tr>";
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
if ($x <= 3)
{
$x = $x + 1;
extract($row);
echo '<td width=28%>';
echo '<div class="product-dis">';
echo "<a href=itemdetails.php?itemcode=$prod_id>";
echo '<img src="images/'. $Imagename .'" style="width:220px;height:160px;"></img><br/>';
echo '<p style="max-width:220px;"><div class="pname">'.$name ." ".$model ;
echo '</div><br>';
echo "</a>";
echo '<div class="price">Rs '.$price .'</div></p><br/>';
echo "</div>";
echo "</td>";
}
else
{
$x=1;
echo "</tr><tr>";
}
}
echo "</table>";
?>
</body>
</html>