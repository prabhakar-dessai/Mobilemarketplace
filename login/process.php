<?php
session_start();
$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$_POST['email'];
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: mobileseller24x7@gmail.com" . "\r\n";
if(mail($to,$subject,$txt,$headers)){
if(isset($_POST['Submit']))
{
$_SESSION['name']=$_POST['name'];
$_SESSION['email']=$_POST['email'];
$_SESSION['password']=$_POST['password'];
$_SESSION['username']=$_POST['username'];
$_SESSION['otp']=$rndno;
header( "Location: otp.php" );
}} ?>