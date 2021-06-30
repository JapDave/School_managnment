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
          <form action="insert_data.php" method="POST" name="insert_c_teacher" enctype="multipart/form-data">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Class Teacher</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Teacher Name</label>
                      <select class="form-control" id="chosen" style="text-transform:uppercase;" name="t_name" required>
                      <option value="">Select Teacher</option>
                      <?php
                      
                         $query="select t1.*,t2.* from class_teacher as t1 right join teacher as t2 on t1.teacher_id =t2.teacher_id where t1.teacher_id is null";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                           $t_f_name=$row['t_f_name'];
                           $t_l_name=$row['t_l_name'];
                           $teacher_id=$row['teacher_id'];
                        //    $classquery="select * from class where class_id='$subject_class'";
                        //    $resultquery=mysqli_query($conn,$classquery);
                          
                          
                      ?>
                       
                     <option  value="<?php echo $teacher_id; ?>"><?php echo $t_f_name." ".$t_l_name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Class</label>
                      <select class="form-control"  style="text-transform:uppercase;" name="t_class" required>
                      <option value="">Select Class</option>
                      <?php
                      
                         $query1="select * from class";
                         $result1=mysqli_query($conn,$query1);
                         while($row1=mysqli_fetch_array($result1)){
                            $class_id=$row1['class_id'];
                             $c_name=$row1['class'];
                          
                      ?>
                     
                     <option  value="<?php echo $class_id; ?>"><?php echo $c_name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit"  name="class_teacher_add">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>

  <?php include "footer_admin.php";?>