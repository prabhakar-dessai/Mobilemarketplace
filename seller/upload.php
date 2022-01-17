<!doctype html>
<html>
<head>
<style>
td th {
	text-align: center;
	border: 1px black;
}
.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #FFF;
	margin: 0 auto;
	background: #1abc9c;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid black;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #109177;
}

a {
	text-decoration: none;
}
</style>
<title>SELLER</title>
    <?php
    include("db_conn.php");
    if(isset($_POST['but_upload'])){
		$pn=$_POST['ph_name'];
		$mn=$_POST['mod_name'];
		$price=$_POST['price'];
		$sid=$_POST['sid'];
		$desc=$_POST['desc'];
        $name = $_FILES['file']['name'];
        $target_dir = "../storefront/images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif","jfif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Upload file
            if(move_uploaded_file($_FILES['file']['tmp_name'],'../storefront/images/'.$name)){
    
                // Insert record
                $query = "Insert into products(description,price,seller_id,name,model,Imagename) values('$desc','$price','$sid','$pn','$mn','$name')";
               
                mysqli_query($con,$query) or die(mysqli_error($con));
				echo"<script> alert('record uploaded successfully') </script>";
				?><META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/project/seller/choose.php">
				<?php
				
            }

        }
		else{
			echo"<script> alert('file format invalid') </script>";
			?><META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/seller/choose.php">
				<?php
		}
    
    }
    ?>
	
<body>
<?php
session_start();
if(isset($_SESSION['sid'])){
$f_id=$_SESSION['sid'];
?>
    <div class="form-style-5">
    <fieldset>
<legend><span class="number">#</span> UPLOAD NEW PRODUCT </legend>
    <form method="post" action="" enctype='multipart/form-data' class="new">
COMPANY NAME:<input type='text' name="ph_name" required>
</br>
MODEL NAME:<input type='text' name="mod_name" required>
</br>
PHONE PRICE:<input type='text' name="price">
</br>
PHONE DESCRIPTION:<textarea rows="4" cols="10" name="desc"></textarea>
Choose file:<br><input type='hidden' value="<?php echo "$f_id"; ?>" name="sid" readonly>
<br>
        <input type='file' name='file' />
        <br><br><input type='submit' value='UPLOAD' name='but_upload'>
        
    </form>

</body>
</html>
<?php } ?>
