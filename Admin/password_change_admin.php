<?php
session_start();
include "connection.php";

$password=$_POST['password'];
$cpassword=$_POST['c_password'];
$emailsss=$_SESSION['mail'];
if($password == $cpassword){
    
    $updatepassword="UPDATE admin_login SET password ='$password' WHERE e_mails='$emailsss'";
    $result=mysqli_query($conn,$updatepassword);
    if($result){
        //echo "update successfully";
        $_SESSION['msg']="Password Has Change";
        header("location:login.php");
    }
    else{
        $_SESSION['msg']="update not successfully";
        header("location:new_password_admin.php");
    }
}
else{
    $_SESSION['msg']="password is not matching";
    header("location:new_password_admin.php");
}


?>