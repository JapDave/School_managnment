<?php
//session_start();
error_reporting(0);
include "isauth_student.php";
include "../Admin/connection.php";

?>
<!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/izitoast/css/iziToast.min.css">
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
          <div class="section-body">
            <div class="row" id="show_data">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Request For Attendance</button>
                
                  </div>
              </div>
            </div>   
            <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Student Attendance</h4>
            </div>
            <?php
            $student_id=$_SESSION['student'];
             $fetch="select t1.*,t2.* from status as t1 
                    left join student as t2 on t1.student_id = t2.student_id 
                    where  t1.student_id='$student_id'";
             $fetchresult=mysqli_query($conn,$fetch);
             $frows=mysqli_fetch_array($fetchresult);
            
             if(mysqli_num_rows($fetchresult) <=0){
               ?>
              <h6 style="padding-left:25px;color:gray;">Request To get attendence</h6>
            <?php }
            elseif($frows['requested']=='No')
              {
               ?>
              <h6 style="padding-left:25px;color:red;">Request Is Rejected </h6>
              <?php
                  $fetch4 = "delete  from status where student_id='$student_id'";
                  $fetchresult4 = mysqli_query($conn,$fetch4);
               }
            elseif($frows['requested']=='pending')
               {
               ?>
                 <h6 style="padding-left:25px;color:pink;">Request Is Pending </h6>
                 <?php
                 
               }


            else{ 
                   
              ?>
              <h6 style="padding-left:25px;color:Green;">Request Is Accepted</h6>
                 <h6 style="padding-left:25px;color:black;">Student Name: <?php echo $frows['first_name']." ".$frows['last_name']; ?></h6>
                 <h6 style="padding-left:25px;color:black;">Roll No: <?php echo $frows['roll_no'];?></h6>
                 <h6 style="padding-left:25px;color:black;">Class:  <?php echo $frows['class_id'];?></h6> 
                 <?php
                 $fetch2="select count(*) from student_attendance where student_id='$student_id'";
             $fetchresult2=mysqli_query($conn,$fetch2);
             $frow1=mysqli_fetch_array($fetchresult2);

             $fetch3="select * from student_attendance where student_id='$student_id' and attendance_status='present'";
             $fetchresult3=mysqli_query($conn,$fetch3);
             $frow3=mysqli_num_rows($fetchresult3);
             if(mysqli_num_rows($fetchresult2) & mysqli_num_rows($fetchresult3) <= 0){?>
              <h6 style="padding-left:25px;color:red;">Attendance Not Found</h6>
            <?php  }else{
               $total = $frow3 * 100 /$frow1[0];
            
                if(time()-$_SESSION["login_time_stamp"] < 60) {
             ?>
              <h6 style="padding-left:25px;color:black;">Attendance:  <?php echo (int)$total;?>%</h6>
           <?php 
                  }
                  else{

                 $fetch4 = "delete  from status where student_id='$student_id'";
                  $fetchresult4 = mysqli_query($conn,$fetch4);
                   unset($_SESSION["login_time_stamp"]);
                  }
                }

              }
           ?>
            <div class="card-body">
            </div>
            </div>
            </div>
          </div>
        </section>
        <!-- Modal with form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Request For Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="send_request_teacher_student.php" method="POST">
                <div class="form-group">
                      <label>Request</label>
                        <input type="text" id="requested_attendance" class="form-control" value="Requesting For Attendance" disabled>
                    </div>
                    <div class="form-group">
                      
                        <input type="submit" name="send_requested_to" id="send_request" class="btn btn-primary" value="Send Request">
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
<?php include "footer_student.php";?>