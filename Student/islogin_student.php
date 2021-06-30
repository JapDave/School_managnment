<?php
session_start();
error_reporting(0);
if($_SESSION['student'] != "" || $_SESSION['student'] != 0){
    header("location:../Student/index.php");
}

?>