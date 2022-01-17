<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Mobile Marketplace</title>
<style>
    ul {
        z-index: 999;
    }
    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
  }
  
  li {
    float: left;
  }
  
  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 17px 19px;
    text-decoration: none;
  }
  
  /* Change the link color to #111 (black) on hover */
  li a:hover {
    background-color: #111;
  }

  li {
    border-right: 1px solid #bbb;
  }
  
  li.logout {
    border-left: 1px solid #bbb;  
    border-right: none;
    position: fixed;
    right: 0;
  }

  ul {
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
  }

li b {
    display: block;
    text-align: center;
    padding: 17px 19px;
    position: relative;
  /* font-size: 10em; */
  color:grey;
  letter-spacing: 3px;
  text-transform: uppercase;
  text-shadow: 2px 2px black;
}
 </style>   
</head>
<body>
<form method="post" action="search.php">
<ul>
<li><b>Mobile Marketplace</b></li>
<li class="logout"><a href="..\login\login.php">Log Out</a></td></tr></li>
</ul>
<?php
include('logincheck.php');
?>
</form>
</body>
</html>
