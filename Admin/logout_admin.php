<?php
session_start();
include "connection.php";

$_SESSION['admin']="";
header("location:login.php");
?>