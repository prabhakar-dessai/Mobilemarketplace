<html>
<head>
<style>
body{
   overflow: scroll;
}
.outset {
   margin-top:20px;
   font-family: sans-serif;
	font-weight: 200;
   text-align: center;
   margin-bottom:20px;
   font-size: 18px;
   border-style: outset;
   border-width: 1px;
}
div.prod-dis {  
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width: 700px;
    margin-left: auto;
    margin-right: auto;
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    position:relative;
    padding:10px;
    top: 70px;
    background-color: white;
}

.product-description h1 {
  text-align: center;
  font-weight: 300;
  font-size: 30px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}

.price {
   text-align: center;
   width:50%;
   font-size: 16px;
  font-weight: 300;
  color: #43474D;
}

.submit {
   margin-top: -22.5px;
   margin-left: 250px;
  
}
input.i-submit{
 background-color: #7DC855;
  color: white;
  padding: 4px;
  border-radius: 6px;
  font-size: 4px;
  text-decoration: none;
  transition: all .5s;
  border: none;
} 
input.i-submit:hover {
  background-color: #64af3d;
}
</style>   
</head>
<body style="background-color: grey">
<?php
include('topmenu.php');
echo '<div class="prod-dis">';
$connect = mysqli_connect("localhost", "root", "", "project") or
die("Please, check your server connection.");
$code=$_REQUEST['itemcode'];
$query = "SELECT prod_id, name,model, description, imagename, price FROM products where prod_id like '$code'";
$results = mysqli_query($connect, $query); 
//or die(mysql_error()); // #1
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
echo "<br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"3px\">";
echo "<tr><td style=\ rowspan=\"6\" \" width=\"25%\">";
echo '<img src="images/' . $imagename . '" style=" max-width:300px;max-height:260px;width:auto;height:auto;"></img></td>';
echo "<td colspan=\"2\"  style=\"font-family:verdana;font-size:150%;\"><b>";
echo "<div class=product-description>";
echo '<h1>'.$name.' '.$model.'</h1>';
echo "</b></td></tr><tr>";
$itemname=urlencode($name);
$itemprice=$price;
$itemdescription=$description;
echo "<td>";
echo '<p >'.$itemdescription.'</p>';
echo "</div>";
echo "</td></tr>";
echo "<form  method=\"POST\" action=\"cart.php?action=buynow&icode=$prod_id\" onsubmit=\" return confirm('Do you want to purchase this item?')\">";
echo "<td style=\"font-family:verdana;\">";
echo '<div class="price">Price: ' . $itemprice;
echo "</div>";
echo '<div class="submit">';
echo "<input class=\"i-submit\" type=\"submit\"name=\"buynow\" value=\"Buy Now\" style=\"font-size:100%;\">";
echo "</div>";
echo" </form>";
echo "</td></tr></table>";
echo "<div class=\"outset\">Reviews</div>";
$connect = mysqli_connect("localhost", "root", "", "project") or die("Please, check your server connection.");
               $query = "SELECT review,reply,username FROM reviews inner join account on reviews.user_id=account.user_id where prod_id=$prod_id";
               $results = mysqli_query($connect, $query); 
               while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                extract($row);
               echo '<div style="margin-top:10px; background-color:rgb(248, 248, 248);">';
               echo "<div style=\"text-align: left;\">";
               echo "". $review."</div>";
               echo "<div style=\"text-align: left;margin-left:10px;\">By: ".$username ;
               echo "</div>";
               if($reply){
               echo '<div style="text-align:left;margin-left:20px;"><img src="images/arrow.png" style="max-width:20px;max-height:10px;"></img> Reply: '.$reply ;
               echo '</div>';
            }
               echo '</div>';
               
            }
echo "<form  method=\"POST\" action=\"review.php?icode=$prod_id\">";
echo '<div style="margin-top:20px;"><textarea id="review" name="review" rows="3" cols="91"></textarea></div>';
echo "<div style=\"text-align: left;margin-left: 10px;margin-top:10px;\"><input class=\"i-submit\" type=\"submit\"name=\"rev\" value=\"Write a Review\" style=\"font-size:100%;\"></div>";
echo" </form>";
?>
</div>
</body>
</html>