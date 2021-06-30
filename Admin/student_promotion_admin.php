<?php
session_start();
include "isauth.php";
include "connection.php";
$query_p="select * from class";
$result_p=mysqli_query($conn,$query_p);
while($row3=mysqli_fetch_array($result_p)){
  $class_id=$row3['class_id'];
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- dropdown.html  21 Nov 2019 03:51:00 GMT -->
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
        <form action="update_data.php" method="POST" name="update_student_promotion" enctype="multipart/form-data">
        <input type="hidden" name="student_promotion_hidden" value="<?php echo $class_id; ?>">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Student Promotion</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Current Class</label>
                      <div id="display_message"></div>
                      <select class="form-control" name="p_class" id="current_class" required>
                      <option value="">Select One</option>
                      <?php
                      
                         $query="select * from class";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                           $class_no=$row['class'];
                      ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $class_no;?></option>
                         <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Promotion Class</label>
                      <select class="form-control" name="p_p_class" required>
                      <option value="">Select One</option>
                      <?php
                      
                         $query="select * from class";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                           $class_no=$row['class'];
                      ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $class_no;?></option>
                         <?php } ?>
                      </select>
                    </div>
                   
                   
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="submit_class" name="i_student">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
        </section>
      
   
  </div>

 <?php include "footer_admin.php";?>