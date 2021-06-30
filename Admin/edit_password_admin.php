<?php
session_start();
include "connection.php";

$oldpassword=$_POST['c_password'];
$newpassword=$_POST['n_password'];

$adminquery="select * from admin_login where admin_id=".$_SESSION['admin'];
$adminresult=mysqli_query($conn,$adminquery);
while($row=mysqli_fetch_array($adminresult)){
    $adminpassword=$row['password'];

if($oldpassword == $adminpassword){

    $e_query="update admin_login set password='$newpassword' where admin_id=".$_SESSION['admin'];
    $r_query=mysqli_query($conn,$e_query);
    if($r_query){
        // echo "update successfully";
        $_SESSION['status']="Password Is Change";
        $_SESSION['status_code']="success";
        header("location:admin_profile.php");
        
    }
    else{
        // echo "update not successfully";
        $_SESSION['status']="Password Is Not Change";
        $_SESSION['status_code']="error";
        header("location:admin_profile.php");
    }
    
}
else{
    // echo "old password is wrong";
    $_SESSION['status']="Old Password Is Wrong";
    $_SESSION['status_code']="error";
    header("location:admin_profile.php");
    
}
header("location:admin_profile.php");

}





?>