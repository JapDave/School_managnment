
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="Style.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous">
    </script>
</head>
<body>

   <div class="conatiner">
       <div class="forms-conatiner">
           <div class="signin-signup">
               <form action="forgot_mail_checked.php" method="POST" class="sign-in-form">
                   <h2 class="title">Reset Password</h2>
                  
                   <div class="input-field" >
                    <i class="fas fa-users"></i>
                     <select name="user_types" class="option_users" required>
                      <option value="">Select One</option>
                         <option value="student">Student</option>
                         <option value="parents">Parents</option>
                         <option value="teachers">Teacher</option>
                     </select>
                </div>
                   <div class="input-field">
                       <i class="fas fa-user"></i>
                       <input type="text" name="e_mails" placeholder="Email" required>
                   </div>
                  
              <input type="submit" value="Send Mail" name="login_s" class="btn" id="sendmail">
              
              
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