<?php
session_start();
include "isauth.php";
include "connection.php";
$id=$_GET['id'];
$displayquery="select * from notice where notice_id='$id'";
$result = mysqli_query($conn,$displayquery);
    while ($row=mysqli_fetch_array($result)) {
   
        $n_id=$row['notice_id'];
        $n_title=$row['notice_title'];
        $n_details=$row['notice_details'];
        $n_posted=$row['notice_posted_by'];
        $n_date=$row['notice_date'];
        $n_image=$row['notice_poster'];
  }

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
          <form action="update_data.php" method="POST" name="e_notice" enctype="multipart/form-data">
          <input type="hidden" name="notice_hidden" value="<?php echo $n_id; ?>">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Notice</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="e_title" value="<?php echo $n_title;?>" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Details</label>
                      <textarea class="form-control" name="e_details"  required><?php echo $n_details;?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Posted By</label>
                      <input type="text" class="form-control" name="e_posted" value="<?php echo $n_posted;?>" required>
                     </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" name="e_date" value="<?php echo $n_date;?>" required>
                    </div>
                    <div class="form-group">
                      <label>Profile Photo</label>
                      <input type="file" class="form-control" name="e_poster">
                      <input type="hidden" name="notice_old" value="<?php echo $n_image; ?>">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Update" name="e_notice">
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>
 <?php include "footer_admin.php";?>