<?php
session_start();
$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$_POST['Email'];
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: mobileseller24x7@gmail.com" . "\r\n";
if(mail($to,$subject,$txt,$headers)){
if(isset($_POST['Submit']))
{
$_SESSION['email']=$_POST['Email'];
$_SESSION['password']=$_POST['password'];
$_SESSION['username']=$_POST['user'];
$_SESSION['number']=$_POST['number'];
$_SESSION['Btype']=$_POST['Btype'];
$_SESSION['Bname']=$_POST['Bname'];
$_SESSION['address']=$_POST['address'];
$_SESSION['account']=$_POST['account'];
$_SESSION['otp']=$rndno;
header( "Location: selleraccess.php" );
}} ?>