<META Http-Equiv="Cache-Control" Content="no-cache"/>
<META Http-Equiv="Pragma" Content="no-cache"/>
<META Http-Equiv="Expires" Content="0"/>
<?php 
session_start();
if(isset($_SESSION['user'])){
   session_destroy();
   
   echo "<script> location.href='index.php' </script>";
}
else{
	echo "<script> location.href='index.php' </script>";
}

