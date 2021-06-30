<?php
session_start();
if($_SESSION['teachers'] == "" || $_SESSION['teachers'] == 0){
    echo "successfully";
    header("location:../login page/login_page.php");

    
}


?>