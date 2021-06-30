<?php
session_start();
include "isauth.php";
?>
<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
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
           <form action="insert_data.php" method="POST">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Teacher Attendance</h4>
                  </div>
                 
                  <div class="card-body">
                  <div><?php echo date("l jS  F Y");?></div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Teacher Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                           include "connection.php";
                           $teacher="select * from teacher";
                           $result=mysqli_query($conn,$teacher);
                           $counter=0;
                           while($row=mysqli_fetch_array($result)){
                          ?>
                          <tr>
                            <td><input type="hidden" value="<?php echo $row['teacher_id'];?>" name="teacher_name[]">
                            <?php echo $row['t_f_name']." ".$row['t_l_name'];?> 
                            </td>
                            <td class="align-middle">
                            <input type="radio" name="attendance_status[<?php echo $counter;?>]" value="present" required>Present
                            <input type="radio" name="attendance_status[<?php echo $counter;?>]" value="absent" required>Absent
                            </td>
                            
                          </tr>
                           <?php $counter++;  } ?>
                           
                           
                        </tbody>
                       
                      </table>
                      <input type="submit" name="attendance" value="Submit" class="btn btn-primary mr-30">
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
             </form>
          </div>
        </section>
        <?php include "footer_admin.php";?>