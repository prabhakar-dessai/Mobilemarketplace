<?php
session_start();
if(isset($_POST['save']))
{
$rno=$_SESSION['otp'];
$urno=$_POST['otpvalue'];
if(!strcmp($rno,$urno))
{
    $name = $_SESSION["name"]; 
    $inEmail = $_SESSION["email"];
    $inUsername = $_SESSION["username"];
    $inPassword = $_SESSION["password"];
    $password_encrypted = password_hash($inPassword, PASSWORD_DEFAULT);
     
     $conn= mysqli_connect("localhost", "root", "");
     $db= mysqli_select_db($conn, "project");
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }
       
       $sql = "INSERT INTO account(username,password1,name,email_id)
       VALUES ('$inUsername', '$password_encrypted', '$name', '$inEmail')";
       
       if ($conn->query($sql) === TRUE) { 
        header("Location: ../storefront/display.php");
       } 
       else {
          $_SESSION["flag"]="true";
          header("Location: customerregister.php");
       }
       
       $conn->close();
        }
}
//resend OTP
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