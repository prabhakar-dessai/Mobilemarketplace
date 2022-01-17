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
    margin-top: 200px;
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
}
input.subby {
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
<script language="JavaScript" type="text/JavaScript" src="ccheckform.js"> 
</script>
</head>
<body style="overflow: auto;">
    <?php
        include('topmenu.php');
    ?>
   <div style="text-align:center" class="form">
   <div align="center">
        <h1 align= "center">Repair Registration</h1>
        <form action="process.php" method="POST" onsubmit="return validate(this);">
            <label for="model_no">Model No :</label>
            <input type="int" name="model_no"><span id="model_nomsg"></span>
            <br><label for="model">Model :</label>
            <input type="text" name="model"><span id="modelmsg"></span>
            <br><label for="prob_desc">Describe your problem :</label>
            <textarea class="texty" name="prob_desc" id="prob_desc" rows=2 cols=30></textarea><span id="prob_descmsg"></span>
            <br><label for="yrs">Years Used :</label><br>
            <input type="int" name="yrs"><span id="yrsmsg"></span>
            <br><label class="select" for="repair_ser">Choose a Repair Service:</label>
            <select name="repair_ser" id="repair_ser">
            <?php
             $connect = mysqli_connect("localhost", "root", "", "project") or
             die("Please, check your server connection.");
             $query = "SELECT Shop_name,shop_id FROM repair_services";
             $results = mysqli_query($connect, $query); 
             while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                extract($row);
            echo "<option value=".$shop_id.">".$Shop_name."</option>";
             }
            ?>
            </select>
            <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                 }
                 if(isset($_SESSION["flag"]))
                 {
                 if($_SESSION["flag"]=="true")
                 {
                    echo "Error : Registration Failed";
                     unset($_SESSION["flag"]);
                 }
                }
            ?>
            <br><input class="subby" type="Submit" value="Submit" name="Submit">
            <input class="subby" type="reset" value="Reset">
        </form>
    </div>
    </div>
</body>
</html>