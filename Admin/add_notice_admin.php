<?php
session_start();
include "isauth.php";
 include "connection.php";
 
 $date=date('Y-m-d');
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
          <form action="insert_data.php" method="POST" name="insert_notice" enctype="multipart/form-data">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Notice</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" id="title" class="form-control" name="n_title" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Details</label>
                      <textarea class="form-control" id="details" name="n_details" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Posted By</label>
                      <input type="text" id="posted_by" class="form-control" name="n_posted" required>
                     </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="text" id="date" class="form-control" name="n_date" value="<?php echo $date; ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Poster</label>
                      <input type="file" id="poster" class="form-control" name="n_poster" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="toastr-2" name="i_notice">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>

 <?php include "footer_admin.php";?>