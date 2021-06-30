<?php
session_start();
error_reporting(0);
include "isauth_teacher.php";
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
  <!-- <div class="loader"></div> -->
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "sidebar_teacher.php";?>
      <?php include "navbar_teacher.php";?>
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
              <h4>Teacher Attendance</h4>
            </div>
            <?php
            $teacher_id=$_SESSION['teachers'];
             $fetch="select t1.*,t2.* from status_teacher as t1 
                    left join teacher as t2 on t1.teacher_id = t2.teacher_id 
                    where t1.teacher_id='$teacher_id'";
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
                 $fetch4 = "delete  from status_teacher where teacher_id='$teacher_id'";
                 $fetchresult4 = mysqli_query($conn,$fetch4);
              }
           elseif($frows['requested']=='pending')
              {
              ?>
                <h6 style="padding-left:25px;color:pink;">Request Is Pending </h6>
                <?php
                
              }
               
             else{ ?>
              <h6 style="padding-left:25px;color:Green;">Request Is Accepted</h6>
                 <h6 style="padding-left:25px;color:black;">Teacher Name: <?php echo $frows['t_f_name']." ".$frows['t_l_name']; ?></h6>
                 <?php
                 $fetch2="select count(*) from teacher_attendance where teacher_id='$teacher_id'";
             $fetchresult2=mysqli_query($conn,$fetch2);
             $frow1=mysqli_fetch_array($fetchresult2);

             $fetch3="select * from teacher_attendance where teacher_id='$teacher_id' and attendance_status='present'";
             $fetchresult3=mysqli_query($conn,$fetch3);
             $frow3=mysqli_num_rows($fetchresult3);
             if(mysqli_num_rows($fetchresult2) & mysqli_num_rows($fetchresult3) <= 0){?>
              <h6 style="padding-left:25px;color:red;">Attendance Not Found</h6>
            <?php  }else{
               $total = $frow3 * 100 /$frow1[0];
               if(time()-$_SESSION["login_time_stampt"] < 60) {
                ?>
                 <h6 style="padding-left:25px;color:black;">Attendance:  <?php echo (int)$total;?>%</h6>
              <?php 
                     }
                     else{
   
                    $fetch4 = "delete  from status_teacher where teacher_id='$teacher_id'";
                     $fetchresult4 = mysqli_query($conn,$fetch4);
                      unset($_SESSION["login_time_stampt"]);
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
                <form action="send_request_admin_teacher.php" method="POST">
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
<?php include "footer_teacher.php";?>