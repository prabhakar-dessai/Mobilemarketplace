<?php

$conn = "";

	$servername = "localhost:3306";
	$dbname = "loginPage";
	$username = "root";
	$password = "";

	$conn= mysqli_connect("localhost", "root", "");
    $db= mysqli_select_db($conn, "project");

if($conn->connect_error){
	die("connection failed".$conn->connect_error);
}

?>
