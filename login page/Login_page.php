<?php
session_start();
error_reporting(0);
//include "../Student/islogin_student.php";
//include "../Parent/islogin_parent.php";
//include "../Teacher/islogin_teacher.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>Login Page</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>

   <div class="conatiner">
       <div class="forms-conatiner">
           <div class="signin-signup">
               <form action="login_check.php" method="POST" class="sign-in-form">
                   <h2 class="title">Login</h2>
                  
                      <?php
                      if(isset($_SESSION['msg'])){
                          ?>
                          
                        <div class="alert alert-danger" role="alert">  
                           <?php  echo $_SESSION['msg'];?>
                        </div>
                      <?php 
                      unset($_SESSION['msg']);  
                    }
                      ?>
                  <div class="show_errors1"></div>
                   <div class="input-field" >
                    
                    <i class="fas fa-users"></i>
                     <select name="user_type"  class="option_users" required>

                     <option value="">Select Account</option>
                         <option value="student">Student</option>
                         <option value="parents">Parents</option>
                         <option value="teachers">Teacher</option>
                     </select>
                </div>
                   <div class="input-field">
                       <i class="fas fa-user"></i>
                       <input type="text" id="username" name="username" placeholder="UserName" style="border-radius:20px;" required>
                   </div>
                   <div class="input-field" >
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="lock" placeholder="Password" required>
                </div>
              <input type="submit" value="Login" name="login_s" class="btn" >
                <a href="forgot_password_user.php" id="forgot_password"><p style="color:#002">Forgot Password?</p></a>
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
    if(isset($_SESSION['statuss']) && $_SESSION['statuss'] !=''){
  
?>

<script>
 swal({
  title: "<?php echo $_SESSION['statuss']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_codes']; ?>",
  button: "Ok",
});
</script>
<?php
      unset($_SESSION['statuss']);
    }
   
   ?>
</body>
</html>