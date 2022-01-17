<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Mobile Marketplace</title>
<link rel="stylesheet" href="css/topmenu.css">
<style>
    ul {
        z-index: 999;
    }
 </style>   
</head>
<body>
<form method="post" action="search.php">
<ul>
<li><b>Mobile Marketplace</b></li>
<li><a href="display.php">Home</a></li>
<li><a href="orders.php">Orders and Reviews</a></li>
<li><a href="repair.php">Repairs</a></li>
<li class="top-search"><input  type="text" class="top-searchterm" size="60" placeholder="   Enter product name...." name="tosearch">
<input type="submit" class="top-submit" name="submit" value="Search"></li>
<li class="logout"><a href="..\login\login.php">Log Out</a></td></tr></li>
</ul>
<?php
include('logincheck.php');
?>
</form>
</body>
</html>
