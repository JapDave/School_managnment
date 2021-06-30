<?php

include "isauth_teacher.php";
include "../Admin/connection.php";
$id=$_GET['id'];
$query1="select * from student where student_id='$id'";
$results1=mysqli_query($conn,$query1);
while($row=mysqli_fetch_array($results1)){
    $sname=$row['first_name']." ".$row['last_name'];
    $address=$row['address_s'];
    $roll=$row['roll_no'];
    $phone=$row['phone_s'];
    $email=$row['e_mail_s'];
    $gender=$row['gender_s'];
    $religion=$row['religion_s'];
    $dob=$row['dob_s'];
    $age=$row['age_s'];
    $b_group=$row['blood_group_s'];
     $profile=$row['profile_photo_s'];
    
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
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/summernote/summernote-bs4.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../Admin/assets/css/style.css">
  <link rel="stylesheet" href="../Admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../Admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../Admin/assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "sidebar_teacher.php";?>
      <?php include "navbar_teacher.php"?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                   <a href="Student_details_teacher.php" class="btn btn-primary">Back</a>
                  </div>
              </div>
            </div>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="../Admin/<?php echo $profile; ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $sname;?></a>
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
                        <?php echo $dob;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                        <?php echo $phone;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                        <?php echo $email;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Blood Group
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $b_group;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Age
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $age;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Roll No
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $roll;?>
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
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">About</a>
                      </li>
                      
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted"><?php echo $sname;?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted"><?php echo $phone;?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $email;?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Gender</strong>
                            <br>
                            <p class="text-muted"><?php echo $gender;?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Religion</strong>
                            <br>
                            <p class="text-muted"><?php echo $religion;?></p>
                          </div>
                        </div>
                       
                        <div class="section-title">Address</div>
                        <ul>
                          <li><?php echo $address;?></li>
                        </ul>
                      
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
     
    </div>
  </div>
  <?php include "footer_teacher.php";?>