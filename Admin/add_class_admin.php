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
          <form action="insert_data.php" method="POST" id="myform">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Class</h4>
                  </div>
                      <div class="col-md-4 col-md-offset-3" id="show_message">  
                        </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Class Name</label> <div id="show_error"></div>
                      <input type="text" class="form-control" name="class_name" id="class_n" required>
                    </div>                   
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="submit_class" name="submit_insert">
                    <input type="reset" class="btn btn-primary" value="Reset">
                  </div>
                </div>
    </div>
  </div>
  </form>
</section>

 <?php include "footer_admin.php";?>