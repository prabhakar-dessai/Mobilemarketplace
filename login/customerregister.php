
<html>
<head>
<link rel="stylesheet" href="css/login.css">
<script language="JavaScript" type="text/JavaScript" src="checkform.js"> 
</script>
</head>        
<body>
<div style="text-align:center" class="form"><h1>Account Registration</h1>
<div align="center">
<form method="post" action="process.php" onsubmit="return validate(this);" >
<input type="text" placeholder="Full Name" name="name"><br><span id="namemsg"></span>
<input type="text" placeholder="Email" name="email" ><br><span id="emailmsg"></span>
<input type="text" placeholder="Username" name="username" ><br><span id="usernamemsg"></span>
<input type="password" placeholder="Password" name="password" ><br><span id="passwordmsg"></span>
<input type="password" placeholder="Confirm Password" name="conpassword" ><br><span id="conpasswordmsg"></span><br>
<?php
    session_start();
    if(isset($_SESSION["flag"]))
    {
    if($_SESSION["flag"]=="true")
    {
        echo "Email or username already exists";
        unset($_SESSION["flag"]);
    }
}
?>
<br><input class="submit" type="submit" value="Submit" name="Submit">&nbsp;
<input class="submit" type="reset" value="Reset">
</div>
</div>
</form>
</body>
</html>