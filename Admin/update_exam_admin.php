<!---------------php display form for update start-------------->

<?php
session_start();
include "isauth.php";
                   include "connection.php";
                   $id=$_GET['id'];
                   $displayquery="select * from exam_student where exam_id='$id'";
                   $result = mysqli_query($conn,$displayquery);
	                   while ($row=mysqli_fetch_array($result)) {
                      $exam_id=$row['exam_id'];
                      $exam_name=$row['exam_name'];
                      $exam_year=$row['exam_year'];
                      $e_t_t=$row['exam_time_table'];
                     
                     }
                ?>

               <!---------------php display form for update end-------------->
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
          <form action="update_data.php" method="POST" name="edit_exam" enctype="multipart/form-data">
          <input type="hidden" name="exam_hidden" value="<?php echo $exam_id; ?>">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Exam</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Exam Name</label>
                      <input type="text" class="form-control" name="e_exam_name" value="<?php echo $exam_name;?>" required>
                    </div>
                    <div class="form-group">
                      <label>Exam Year</label>
                      <input type="text" class="form-control" name="e_exam_year" value="<?php echo $exam_year;?>" required>
                    </div>
                    <div class="form-group">
                      <label>Exam Time Table</label>
                      <input type="file" class="form-control" name="e_exam_time_table">
                      <input type="hidden" name="exam_old" value="<?php echo $e_t_t; ?>">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="toastr-2" name="e_exam">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>
  <?php include "footer_admin.php";?>