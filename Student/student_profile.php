<?php
//session_start();
error_reporting(0);
include "isauth_student.php";
include "../Admin/connection.php";

$query="select * from student where student_id=".$_SESSION['student'];
$results=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($results)){
    $sname=$row['first_name']." ".$row['last_name'];
    $address=$row['address_s'];
    $phone=$row['phone_s'];
    $email=$row['e_mail_s'];
    $gender=$row['gender_s'];
    $religion=$row['religion_s'];
    $blood_group=$row['blood_group_s'];
    $dob=$row['dob_s'];
    $age=$row['age_s'];
     $pp=$row['profile_photo_s'];
     $roll=$row['roll_no'];
    
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
      <?php include "sidebar_student.php";?>
      <?php include "navbar_student.php"?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="../Admin/<?php echo $pp;?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                      <span style="text-transform:uppercase;"><?php echo $sname;?></span>
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
                          Roll No
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $roll;?>
                        </span>
                      </p>
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
                          Gender
                        </span>
                        <span class="float-right text-muted">
                          <a href="#" style="text-transform:capitalize;"><?php echo $gender;?></a>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Age
                        </span>
                        <span class="float-right text-muted">
                          <a href="#"><?php echo $age;?></a>
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
                            <strong>Location</strong>
                            <br>
                            <p class="text-muted"><?php echo $address;?></p>
                          </div>
                        </div>
                       
                        <div class="section-title">Religion</div>
                        <ul>
                          <li><?php echo $religion;?></li>
                     
                        </ul>
                        <div class="section-title">Blood Group</div>
                        <ul>
                          <li><?php echo $blood_group;?></li>
                        
                        </ul>
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
    </div>
  </div>
  <?php include "footer_student.php";?>