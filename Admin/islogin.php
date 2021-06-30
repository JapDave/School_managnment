<?php
session_start();
error_reporting(0);
/*******************************************login security for admin****************************************************/
if($_SESSION['admin'] != "" || $_SESSION['admin'] != 0){
    header("location:index.php");
}
?>