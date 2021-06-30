<?php
//session_start();
error_reporting(0);
include "../Admin/connection.php";
include "isauth_student.php";
//teacher count for student
$query7="select * from student where student_id=".$_SESSION['student'];
$result7=mysqli_query($conn,$query7);
$rowss=mysqli_fetch_array($result7);
 $class_id=$rowss['class_id'];
$query3="select t1.*,count(t1.teacher_id),t2.*,t3.* from teacher as t1
        left join subject as t2 on t1.subject_id=t2.subject_id
        LEFT join class as t3 on t2.class_id=t3.class_id
        where t3.class_id='$class_id'";
$result3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($result3);

//notice count for student
$query4="select count(notice_id) from notice";
$result4=mysqli_query($conn,$query4);
$row4=mysqli_fetch_array($result4);

//subject count for student
$displayquery="select t1.*,t2.* from subject as t1
               left join class as t2 on t1.class_id=t2.class_id
                where t2.class_id='$class_id'";
$result1 = mysqli_query($conn,$displayquery);
$row3=mysqli_fetch_array($result1);

//classmate count for student
$query5="select t1.*,t2.* from student as t1 
left join class as t2 on t1.class_id=t2.class_id 
where t1.student_id=".$_SESSION['student'];

$result5=mysqli_query($conn,$query5);
$rows=mysqli_fetch_array($result5);
$classid=$rows['class_id'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
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
      <?php include "navbar_student.php";?>
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">ClassMates</h5>
                          <h2 class="mb-3 font-18"><?php echo $row6[0]?></h2>
                        
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../Admin/assets/img/banner/9.svg" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Teacher</h5>
                          <h2 class="mb-3 font-18"><?php echo $row3[0];?></h2>
                        
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../Admin/assets/img/banner/6.svg" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Subject</h5>
                          <h2 class="mb-3 font-18"><?php echo $row3[0];?></h2>
                         
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../Admin/assets/img/banner/1.svg" alt="asd">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Notice</h5>
                          <h2 class="mb-3 font-18"><?php echo $row4[0];?></h2>
                         
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../Admin/assets/img/banner/8.svg" alt="">
                        </div>
                      </div>
                    </div>
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