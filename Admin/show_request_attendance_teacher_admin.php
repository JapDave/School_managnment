<?php
session_start();
include "connection.php";

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
      <?php include "sidebar_admin.php";?>
      <?php include "navbar_admin.php";?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
         <form action="" method="POST">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Request For Attendance From Teacher</h4>
                  </div>
                  <div id="display_record"></div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            
                            <th>Sr No</th>
                            <th>Teacher Name</th>
                            <th>Date</th>
                            <th>Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                          $query1="select t1.*,t2.* from teacher as t1 left join status_teacher as t2 on 
                                    t1.teacher_id=t2.teacher_id where t2.s_teacher='-1'";
                          $result1=mysqli_query($conn,$query1);
                         
                        
                      
                        $cont=1;
                        if(mysqli_num_rows($result1) <= 0){
                            ?>
                             <tr>
                            
                             <td colspan="4" style="text-align:center;font-size:15px;">No Request Found</td>
                             </tr>
                       <?php }else{
                           while($row=mysqli_fetch_array($result1)){
                             ?>
                            <tr>
                            
                            <td><?php echo $cont;?></td>
                            <td class="align-middle">
                              <?php echo $row['t_f_name']." ".$row['t_l_name'];?>
                            </td>
                            <td><?php echo $row['s_t_date'];?></td>
                            <td>
                          
                          <?php echo "<a href='send_attendance_teacher_admin.php?id=".$row['teacher_id']."&ryes=Yes'><i class='btn btn-icon btn-success'>Yes</i></a>"?>
                          <?php echo "<a href='send_attendance_teacher_admin.php?id=".$row['teacher_id']."&rno=No'><i class='btn btn-icon btn-danger'>No</i></a>"?>
                            </td>
                        
                          </tr>
                     <?php    
                      $cont++; }
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

 <?php include "footer_admin.php"?>