<?php
session_start();
if($_SESSION['student'] == "" || $_SESSION['student'] == 0){
    echo "successfully";
    header("location:../login page/login_page.php");
}

?>