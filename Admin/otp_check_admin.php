<?php
session_start();
include "connection.php";

$s_otp=$_POST['otp'];
 $o_otp= $_SESSION['otp'];
if($s_otp == $o_otp){
    header("location:new_password_admin.php");
}
else{
   $_SESSION['msg']="OTP is Wrong";
   header("location:reset_password_admin.php");
}


?>