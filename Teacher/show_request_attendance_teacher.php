<?php
session_start();

include "../Admin/connection.php";

?>
<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/datatables/datatables.min.css">

  <link rel="stylesheet" href="../Admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
      <?php include "navbar_teacher.php";?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
         <form action="" method="POST">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Request For Attendance From Student</h4>
                  </div>
                  <div id="display_record"></div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            
                            <th>Roll No</th>
                            <th>Student Name</th>
                            <th>Date</th>
                            <th>Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                          $query1="select t1.*,t2.*,t3.* from teacher as t1 left join subject as t2 on 
                                    t1.subject_id=t2.subject_id left join class as t3 on t2.class_id=t3.class_id where t1.teacher_id=".$_SESSION['teachers'];
                          $result1=mysqli_query($conn,$query1);
                          $rows=mysqli_fetch_array($result1);
                          $class_id=$rows['class_id'];
                        $query="select t1.*,t2.* from status as t1 right join student as t2 on t1.student_id=t2.student_id where t1.status='-1' and  t2.class_id='$class_id'";
                        $result=mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) <= 0){
                            ?>
                             <tr>
                            
                             <td colspan="4" style="text-align:center;font-size:15px;">No Request Found</td>
                             </tr>
                       <?php }else{
                           while($row=mysqli_fetch_array($result)){
                             ?>
                            <tr>
                            
                            <td><?php echo $row['roll_no'];?></td>
                            <td class="align-middle">
                              <?php echo $row['first_name']." ".$row['last_name'];?>
                            </td>
                            <td><?php echo $row['s_date'];?></td>
                            <td>
                          
                          <?php echo "<a href='send_attendance_student_teacher.php?id=".$row['student_id']."&ryes=Yes'><i class='btn btn-icon btn-success'>Yes</i></a>"?>
                          <?php echo "<a href='send_attendance_student_teacher.php?id=".$row['student_id']."&rno=No'><i class='btn btn-icon btn-danger'>No</i></a>"?>
                            </td>
                        
                          </tr>
                     <?php    
                       }
                       }
                        
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                      </form> 
          </div>
        </section>
        
    </div>
  </div>

 <?php include "footer_teacher.php"?>