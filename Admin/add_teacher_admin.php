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

   <!-------Search input--------->
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" ></script>
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
          <form action="insert_data.php" method="POST" name="insert_teacher" enctype="multipart/form-data">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Teachers</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" name="t_f_name" required>
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="t_l_name" required>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="t_address" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="t_phone" required>
                     </div>
                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="t_email" required>
                     </div>
            
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="t_gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>

                   
                    <div class="form-group">
                      <label>Qualification</label>
                      <input type="text" class="form-control" name="t_qualification" required>
                    </div>
                    <div class="form-group">
                      <label>Experience</label>
                      <input type="text" class="form-control" name="t_experience" required>
                    </div>
                    <div class="form-group">
                      <label>Subject</label>
                      <select class="form-control" id="chosen"  style="text-transform:uppercase;" name="t_subject" required>
                      <option value="">Select Subject</option>
                      <?php
                     
                         $query="select * from subject";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                           $subject_name=$row['subject_name'];
                           $subject_class=$row['subject_id'];
                           $class_i=$row['class_id'];
                           $classquery="select * from class where class_id='$class_i'";
                           $resultquery=mysqli_query($conn,$classquery);
                           while($rows=mysqli_fetch_array($resultquery)){

                            $classname=$rows['class'];
                          
                          
                      ?>
                        <option  value="<?php echo $subject_class; ?>"><?php echo $subject_name." - ".$classname;?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="t_password" required>
                     </div>
                     <div class="form-group">
                      <label>Birthday</label>
                      <input type="date" class="form-control" name="t_birthday" required>
                    </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" class="form-control" name="t_age" required>
                     </div>
                     <div class="form-group">
                      <label>Religion</label>
                      <input type="text" class="form-control" name="t_religion" required>
                     </div>
                    <div class="form-group">
                      <label>Profile Photo</label>
                      <input type="file" class="form-control" name="t_profile_photo" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="toastr-2" name="i_teacher">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>

  <?php include "footer_admin.php";?>