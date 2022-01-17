<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$Invalid="";
if(isset($_POST['Submit']))
{
    $user=$_POST['user'];
    $_SESSION['username']=$_POST['user'];
    $pass=$_POST['password'];
    $acctype=$_POST['acctype'];
    $conn= mysqli_connect("localhost", "root", "");
    $db= mysqli_select_db($conn, "project");
if($acctype=="buyer"){
    $query= mysqli_query($conn, "SELECT password1 FROM account WHERE username='$user'");
    $row = $query->fetch_assoc();
    $key=$row['password1'];
    if(password_verify($pass,$key)){
        header("Location: ../storefront/display.php");
    }
    else
    {
        $Invalid = "Incorrect Password";
        // echo $Invalid;
    }
}
else if($acctype=="repair_service"){
    $query= mysqli_query($conn, "SELECT password1 FROM repair_services WHERE username='$user'");
    $row = $query->fetch_assoc();
    $key=$row['password1'];
    if(password_verify($pass,$key)){
    header("Location: ../repair/repairserv.php");   
    }
    else
    {
        $Invalid = "Incorrect Password";
        //echo $Invalid;
    }
}
else{
    $query= mysqli_query($conn, "SELECT password1 FROM seller WHERE username='$user'");
    $row = $query->fetch_assoc();
    $key=$row['password1'];
    if(password_verify($pass,$key)){
        header("Location: ../seller/choose.php");
    }
    else
    {
        $Invalid = "Incorrect Password";
        // echo $Invalid;
    }
}
    mysqli_close($conn);
}
?>
<html>
<head>
<style>
        * { 
    font-family: 'Poppins';
}

body {
	user-select: none;
	display: flex;
	justify-content: center;
	align-items: center;
	background: hsl(218deg 50% 91%);
	height: 100vh;
    overflow-y:scroll;
}

div.form {
    background: hsl(0deg 0% 100%);
    box-shadow: 0 0 2em hsl(231deg 62% 94%);
    padding: 1em;
    display: inline;
     flex-direction: column;
    gap: 0.5em;
    border-radius: 20px;
    margin-top: 40px;
}

.form input {
    background: hsl(0deg 0% 100%);
    box-shadow: 0 0 0.5em hsl(231deg 62% 94%);
    padding: 1em;
    display: flex;
    flex-direction: column;
    gap: 0.5em;
    border-radius: 20px;
    margin-top: 1em;
    margin-left: auto;
    margin-right: auto;
}
.subby {
    padding: 1em;
            background: rgb(99, 204, 236);
            color: hsl(0 0 100);
            border: none;
            display: inline;
            border-radius: 30px;
            font-weight: 600;
}
  
textarea.texty {
    background: hsl(0deg 0% 100%);
    box-shadow: 0 0 0.5em hsl(231deg 62% 94%);
    padding: 1em;
    display: flex;
    flex-direction: column;
    border: 2px solid;
    gap: 0.5em;
    border-radius: 20px;
    margin-top: 1em;
}
select{
    padding: 7px 40px 7px 12px;
    width:50%;
    margin-top: 15px;
    margin-bottom: 10px;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #E8EAED;
    border-radius: 5px;
    background: white;
    box-shadow: 0 1px 3px -2px #9098A9;
    font-family: inherit;
    font-size: 16px;
}
option {
    color: #223254;
}

</style>
<title> Login </title>
</head>
<body>
<div style="text-align:center" class="form">
   <div align="center">
        <h1 align= "center">Login</h1>
        <form action=" " method="POST" style="text-align:center; ">
        
            <input type="text" placeholder="username" id="user" name="user">
            <input type="password" placeholder="password" id="password" name="password">
        <label for="acctype">Select Account Type:</label>
        <select name="acctype" id="acctype">
        <option value="buyer">Customer</option>
        <option value="seller">Seller</option>
        <option value="repair_service">Repair Service</option>
        </select>
        <input type="Submit" value="Submit" name="Submit">
        </form>
        <button class="subby"  onclick="document.location='customerregister.php'">Customer Registration</button>
        <button class="subby" onclick="document.location='buisnessregister.php'">Buisness Registration</button>
</div>   
</div>
</body>
</html>