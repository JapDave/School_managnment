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
          <form action="insert_data.php" method="POST">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Subject</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Subject Name</label>
                      <div id="show_error"></div>
                      <input type="text" class="form-control" name="sub_name" id="subject_name" required>
                    </div>
            
                    <div class="form-group">
                      <label>Select Class</label>
                      <div id="class_error"></div>
                      <select class="form-control" name="sub_class" id="subject_class" required>
                      <option value="">Select Class</option>
                      <?php
                       
                         $query="select * from class";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                          echo $class=$row['class'];
                      ?>
                     
                        <option value="<?php echo $row['class_id'];?>"><?php echo $class ;?></option>
                        <?php }?>
                      </select>
                    
                     
                    </div>
                   
                  
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="toastr-2"  name="sub_insert">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
     $('#toastr-2').click(function(){
         var subject_n=$('#subject_name').val();
         var class_s=$('#subject_class').val();
         if(subject_n == ""){
          $('#show_error').html("**Subject Name Must Be filled**");
         $('#show_error').css('color','red');
         $('#subject_name').focus();
          return false;
         }
         if(class_s == ""){
          $('#class_error').html("**Class Must Be filled**");
         $('#class_error').css('color','red');
          return false;
         }
     });
 });;
</script>
 <?php include "footer_admin.php";?>