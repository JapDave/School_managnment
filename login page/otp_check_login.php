<?php
session_start();
error_reporting(0);
include "../Admin/connection.php";

if(isset($_POST['otp_s'])){


$s_otp=$_POST['otp'];
 $o_otp= $_SESSION['otp'];
if($s_otp == $o_otp){
    header("location:password_reset_user.php");
}
else{
   // $msg="OTP Enter Is Wrong";
    $_SESSION['status']="OTP Enter Is Wrong";
    $_SESSION['status_code']="error";
    header("location:otp_check_login.php");
}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Login Page</title>
  
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
</head>
<body>

   <div class="conatiner">
       <div class="forms-conatiner">
           <div class="signin-signup">
               <form action="" method="POST" class="sign-in-form">
                   <h2 class="title">OTP</h2>
                   <p style="color:green;font-size:20px;"><?php echo $_SESSION['msgs'];?></p>
                    
                   <div class="input-field">
                       <i class="fas fa-user"></i>
                       <input type="number" name="otp" placeholder="Enter OTP" required>
                   </div>
                  
              <input type="submit" value="Login" name="otp_s" class="btn">
              
              
               </form>
           </div>
       </div>
       <div class="panel-container ">
         <div class="panel left-panel">
             <img src="./image/2.svg" alt="No Picture" class="image">
         </div> 
       </div>
   </div>
   
 
</body>
</html>