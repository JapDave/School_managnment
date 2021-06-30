<?php
session_start();
error_reporting(0);
if($_SESSION['teachers'] != "" || $_SESSION['teachers'] != 0){
    header("location:../Teacher/index.php");
}

?>