<?php
session_start();
if(isset($_POST['save'])){
  $rno=$_SESSION['otp'];
  $urno=$_POST['otpvalue'];
  if(!strcmp($rno,$urno)){
	$inUsername = $_SESSION["username"];
	$contact = $_SESSION["number"];
     $inPassword = $_SESSION["password"];
	 $inEmail = $_SESSION["email"];
	 $Bname = $_SESSION["Bname"];
     $Btype = $_SESSION["Btype"]; 
	 $Address = $_SESSION["address"];
   $account = $_SESSION["account"];
	 
   $password_encrypted = password_hash($inPassword, PASSWORD_DEFAULT);
    
    $conn= mysqli_connect("localhost", "root", "");
    $db= mysqli_select_db($conn, "project");
    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);
      
    if($account=="seller"){
      $sql = "INSERT INTO seller VALUES (default,'$inUsername', '$password_encrypted', '$Bname','$Btype', '$inEmail', '$contact', '$Address')";
      }
    else
      {
      $sql = "INSERT INTO repair_services VALUES (default,'$inUsername', '$password_encrypted', '$Bname','$Btype', '$inEmail', '$contact', '$Address')";
      }
    if ($conn->query($sql) === TRUE) {
      if($account=="seller")
        header("Location: ../seller/choose.php");
      else
      header("Location: ../repair/repairserv.php");
  } else {
        $_SESSION["flag"]="true";
        header("Location: buisnessregister.php");
      }
      
      $conn->close();
    }
  }

  if(isset($_POST['resend']))
  {
  $message="<p class='w3-text-green'>Sucessfully send OTP to your mail.</p>";
  $rno=$_SESSION['otp'];
  $to=$_SESSION['email'];
  $subject = "OTP";
  $txt = "OTP: ".$rno."";
  $headers = "From: otp@studentstutorial.com" . "\r\n";
  mail($to,$subject,$txt,$headers);
  $message="<p class='w3-text-green w3-center'><b>Sucessfully resend OTP to your mail.</b></p>";
  }
  
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>OTP</title>
  <link rel="stylesheet" href="css/login.css">
  <head>
  <body>
  <div  class="form">
  <form method="post" action="">
  <input  type="password" placeholder="OTP" name="otpvalue"><br>
  <button  style="width:100%;height:40px" name="save">Submit</button><br><br>
  <button  style="width:100%;height:40px" name="resend">Resend</button>
  </form>
  <div class="submit">
  <?php if(isset($message)) { echo $message; } ?>
  </div>
  </div>
  <br>
  </body>
  </html>
