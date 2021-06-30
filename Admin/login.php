
<?php
session_start();
error_reporting(0);
include "connection.php";
include "islogin.php";


if(isset($_POST['login_admin'])){
$username=$_POST['email'];
$password=$_POST['password'];
  
 $query="select * from admin_login where username='$username'and password='$password'";
  
$result=mysqli_query($conn,$query);

 $row=mysqli_num_rows($result);

 if($row > 0){
      $row=mysqli_fetch_assoc($result);
     
        $_SESSION['admin']=$row['admin_id'];
        
        header("location:index.php");
       

     }
     else{
        // echo "password enter is wrong";
        $_SESSION['msg']="Username or Password Enter is Wrong";
        //  header("location:login.php");
     }
     
 
}

?> 
<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
            
                     <?php 
                       if(isset($_SESSION['msg'])){
                         ?>
                         <div class="alert alert-danger">
                           <?php echo $_SESSION['msg']?>
                        </div>
                       <?php unset($_SESSION['msg']);
                       }
                     ?>
                  
            
              <div class="card-body">
                <form method="POST" class="needs-validation">
                  <div class="form-group">
                  <div id="show_error"></div>
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="email" tabindex="1" autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                    <div id="show_errors"></div>
                      <label for="password" class="control-label" name="password">Password</label>
                      <div class="float-right">
                        <a href="forget_password_admin.php" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2">
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="admin_l" name="login_admin" value="Login">
                    <!-- <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="login_admin">
                      Login
                    </button> -->
                  </div>
                </form>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
    $('#admin_l').click(function(){
    
      
      var $username=$('#email').val();
       var $password=$('#password').val();
       if($username == ""){
         $('#show_error').html('**Username Must Be Filled**');
         $('#show_error').css('color','red');
         return false;
       }
       else{
         $('#show_error').hide();
       }

       if($password == ""){
         $('#show_errors').html('**Password Must Be Filled**');
         $('#show_errors').css('color','red');
         return false;
       }
       else{
         $('#show_errors').hide();
       }
    });
 });
</script>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>