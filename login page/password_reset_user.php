<?php
session_start();

include "../Admin/connection.php";
if(isset($_POST['reset_p'])){


 $password=$_POST['password'];
 $cpassword=$_POST['c_password'];
 $emailsss= $_SESSION['mails'];
if($password == $cpassword){
    if(isset($_SESSION['user']) == $_SESSION['mails']){

    
    $updatepassword="UPDATE student SET password_s='$password' WHERE e_mail_s='$emailsss'";
    $result=mysqli_query($conn,$updatepassword);
    if($result){
        //echo "update successfully";
        $_SESSION['statuss']="Password Has Change";
        $_SESSION['status_codes']="success";
       header("location:login_page.php");
    }
    else{
       //echo "Password Is Not Change";
       $_SESSION['statuss']="Password Is Not Change";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
    }
 }elseif(isset($_SESSION['userp']) == $_SESSION['mails']){
    $updatepassword="UPDATE parent SET password_p='$password' WHERE e_mail_p='$emailsss'";
    $result=mysqli_query($conn,$updatepassword);
    if($result){
        //echo "update successfully";
        $_SESSION['statuss']="Password Has Change";
        $_SESSION['status_codes']="success";
       header("location:login_page.php");
    }
    else{
        $_SESSION['statuss']="Password Is Not Change";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
    }

 }elseif(isset($_SESSION['usert']) == $_SESSION['mails']){
    $updatepassword="UPDATE teacher SET password_t='$password' WHERE e_mail_t='$emailsss'";
    $result=mysqli_query($conn,$updatepassword);
    if($result){
        //echo "update successfully";
        $_SESSION['statuss']="Password Has Change";
        $_SESSION['status_codes']="success";
       header("location:login_page.php");
    }
    else{
        $_SESSION['statuss']="Password Is Not Change";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
    }

 }else{
    $_SESSION['statuss']="Error";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
 }
}
else{
    $_SESSION['statuss']="Password Is Not Matching";
        $_SESSION['status_codes']="error";
        header("location:password_reset_user.php");
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
                   <h2 class="title">Reset Password</h2>
                   
                   <div class="input-field">
                       <i class="fas fa-user"></i>
                       <input type="password" name="password" placeholder="New Password" required>
                   </div>
                   <div class="input-field">
                       <i class="fas fa-user"></i>
                       <input type="password" name="c_password" placeholder="Confirm Password" required>
                   </div>
                  
              <input type="submit" value="Login" name="reset_p" class="btn">
              
              
               </form>
           </div>
       </div>
       <div class="panel-container ">
         <div class="panel left-panel">
             <img src="./image/2.svg" alt="No Picture" class="image">
         </div> 
       </div>
   </div>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
  
?>

<script>
 swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok",
});
</script>
<?php
      unset($_SESSION['status']);
    }
   
   ?>
</body>
</html>