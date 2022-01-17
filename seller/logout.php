
<style>
    h1{
        text-align:center;
        color:grey;
    }
</style>
<?php
session_start();

if(isset($_SESSION['sid'])){
    session_destroy();


?>


<h1>LOGGED OUT SUCCESSFULLY</h1>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/project/login/login.php">
<?php } ?>