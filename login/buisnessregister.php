<html>
<head>
<title>Buisness Registration</title>
<link rel="stylesheet" href="css/blogin.scss">
<script language="JavaScript" type="text/JavaScript" src="bcheckform.js"> 
</script>
</head>
<body style="overflow: auto;">
   <div style="text-align:center" class="form">
   <div align="center">
        <h1 align= "center">Buisness Registration</h1>
        <form action="process2.php" method="POST" onsubmit="return validate(this);">
            <label for="user">Username :</label>
            <input type="text" name="user"><span id="usernamemsg"></span>
            <br><label for="number">Contact No :</label>
            <input type="int" name="number"><span id="numbermsg"></span>
            <br><label for="Email">Email Id :</label>
            <input type="text" name="Email"><span id="emailmsg"></span>
            <br><label for="password">Enter password :</label>
            <input type="password"  name="password"><span id="passwordmsg"></span>
            <br><label for="conpassword">Confirm password :</label>
            <input type="password" name="conpassword"><span id="conpasswordmsg"></span>
            <br><label> Select Buisness Type :</label><br>
            <label for="seller">Seller</label>
            <input type="radio" class="rad" id="seller" value="seller" name="account">
            <label for="repair">Repair Service</label>
            <input type="radio" class="rad" id="repair" value="repair" name="account"><br><span id="Btypemsg"></span>
            <br><label style="font-weight: bold"> Buisness Information </label><br><br>
            <label for="Bname">Buisness Name :</label>
            <input type="text" name="Bname"><span id="Bnamemsg"></span>
            <br><label> Buisness Ownership : </label><br>
            <label for="sole">Sole proprietorship</label>
            <input type="radio" class="rad" id="sole" value="sole" name="Btype">
            <label for="other">Other</label>
            <input type="radio" class="rad" id="other" value="other" name="Btype"><br><br>
            <label for="address">Address :</label><br>
            <textarea id="address" name="address" rows="3" cols="30"></textarea><span id="Addressmsg"></span><br>
            <?php
                 session_start();
                 if(isset($_SESSION["flag"]))
                 {
                 if($_SESSION["flag"]=="true")
                 {
                    echo "Email or Username already exists";
                     unset($_SESSION["flag"]);
                 }
                }
            ?>
            <br><input class="submit" type="Submit" value="Submit" name="Submit">
            <input class="submit" type="reset" value="Reset">
            <!-- <?php echo $Invalid; ?> -->
        </form>
    </div>
    </div>
</body>
</html>