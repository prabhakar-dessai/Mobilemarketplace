<?php
include('logincheck.php');
	$model_no = $_POST["model_no"];
	$model = $_POST["model"];
     $prob_desc = $_POST["prob_desc"];
	 $repair_ser = $_POST["repair_ser"];
	 $yrs = $_POST["yrs"];
    $conn= mysqli_connect("localhost", "root", "");
    $db= mysqli_select_db($conn, "project");
    $sql = "INSERT INTO repair_devices VALUES ('$model_no','$model', '$prob_desc', '$yrs',null, 0,'$sess_id','$repair_ser',0)";
    if ($conn->query($sql) === TRUE) {
        header("Location: repair.php");
     } 
    else 
    {
    $_SESSION["flag"]="true";
    header("Location: repairreg.php");
    }
    $conn->close();
  ?>