<?php
session_start();
include "isauth.php";
 include "connection.php";
 
 ?>
<!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
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
          <form action="insert_data.php" method="POST" name="insert_parent" enctype="multipart/form-data">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Parents</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" name="f_name" required>
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="l_name" required>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone" required>
                     </div>
                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="e_mail" required>
                     </div>
            
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="gender" required>
                        <option></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>

                   
                    <div class="form-group">
                      <label>Occupation</label>
                      <input type="text" class="form-control" name="occupation" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="lock" required>
                     </div>
                     <div class="form-group">
                      <label>Birthday</label> 
                      <input type="date" class="form-control" name="dob" required>
                    </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" class="form-control" name="age" required>
                     </div>
                     <div class="form-group">
                      <label>Blood Group</label>
                      <input type="text" class="form-control" name="b_group" required>
                    </div>
                    <div class="form-group">
                      <label>Profile Photo</label>
                      <input type="file" class="form-control" name="p_photo" required> 
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="toastr-2" name="insert_p">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>
 <?php include "footer_admin.php";?>