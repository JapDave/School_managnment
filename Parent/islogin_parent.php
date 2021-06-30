<?php
session_start();
error_reporting(0);
if($_SESSION['parent'] != "" || $_SESSION['parent'] != 0){
    header("location:../Parent/index.php");
}

?>