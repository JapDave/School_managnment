<?php
session_start();
include "isauth.php";
include "connection.php";

$query="select * from admin_login where admin_id=".$_SESSION['admin'];
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
  $user=$row['username'];
  $email=$row['e_mails'];
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- profile.html  21 Nov 2019 03:49:30 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
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
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "navbar_admin.php";?>
         <?php include "sidebar_admin.php";?> 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="assets/img/profile1.jpg" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#" style="text-transform:uppercase;"><?php echo $user;?></a>
                      </div>
                      
                    </div>
            
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                          20-05-2000
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          (0123)123456789
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $email; ?>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <!-- <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="true">About</a>
                      </li> -->
                      <!-- <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Admin Details</a>
                      </li> -->
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      
                      <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form action="edit_password_admin.php" method="post" class="needs-validation">
                          <div class="card-header">
                            <h4>Change Password</h4>
                          </div>
                          <div class="card-body">
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
                            <div class="row">
                              <div class="form-group col-md-12 col-12">
                                <label>Current Password</label>
                                <input type="text" class="form-control" name="c_password" required>
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              
                             
                              </div>
                              <div class="form-group col-md-12 col-12">
                                <label>New Password</label>
                                <input type="text" class="form-control" name="n_password" required>
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              
                             
                              </div>
                            </div>
                             </div>
                          
                          <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
    </div>
  </div>
  <?php include "footer_admin.php";?>