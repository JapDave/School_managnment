<?php
session_start();
error_reporting(0);
include "isauth_teacher.php";
include "../Admin/connection.php";
$class_id=$_POST['data_class'];
$student_id=$_POST['data_student'];
$query="select t1.*,t2.*,t3.* from student as t1 left join class as t2 on
        t1.class_id=t2.class_id LEFT join parent as t3 on 
        t1.parent_id=t3.parent_id where t1.class_id='$class_id' and t1.student_id='$student_id'";
$results=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($results)){
    $pname=$row['p_first_name']." ".$row['p_last_name'];
    $address=$row['address'];
    $phone=$row['phone'];
    $email=$row['e_mails'];
    $gender=$row['gender'];
    $occupation=$row['occupation'];
    $dob=$row['dob'];
    $age=$row['age'];
    $b_group=$row['blood_group'];
     $profile=$row['profile_photo'];
    
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
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="../Admin/<?php echo $profile; ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $pname;?></a>
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
                          <a href="#"><?php echo $b_group;?></a>
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
                            <p class="text-muted"><?php echo $pname;?></p>
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