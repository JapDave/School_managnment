<?php
session_start();
if($_SESSION['parent'] == "" || $_SESSION['parent'] == 0){
    echo "successfully";
    header("location:../login page/login_page.php");
}

?>