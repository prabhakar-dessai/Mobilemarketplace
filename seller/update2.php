<?php
if(isset($_POST['submit'])){
    session_start();
    include('db_conn.php');
    $x=$_SESSION['sid'];
            $n=$_POST['em'];
            $o=$_POST['pn'];
            $p=$_POST['bn'];
            $q2="UPDATE seller SET email='$n', ph_no='$o', b_name='$p' WHERE id='$x'";
            $data=mysqli_query($con,$q2);
            if($data){
                echo"<script> alert('record updated') </script>";
            ?><META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/seller/choose.php">
            <?php }
            else{
                echo"<script>alert('update unsuccessful')<script>";
            }
         }
         
         ?><META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/seller/choose.php">
      