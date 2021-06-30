<?php
session_start();
include "../Admin/connection.php";

$_SESSION['teachers']="";
header("location:../Login Page/Login_page.php");
?>