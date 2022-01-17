<?php 
session_start();



include_once('connection.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$adminname = test_input($_POST["adminname"]);
	$password = test_input($_POST["password"]);
	$query= mysqli_query($conn,"SELECT password FROM adminlogin WHERE adminname='$adminname'");
    $row = $query->fetch_assoc();
	$key=$row['password'];
	if(password_verify($password,$key))
	 {
		 $_SESSION['user']=$password;
		header("Location: adminpage.php");
		
	}
	else {
			echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			echo "</script>";
			if(1==1){
				header("Location: index.php");
			}
		}
	
}

?>
