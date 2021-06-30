<?php
session_start();
error_reporting(0);
include "isauth.php";
 include "connection.php";
 
 ?>
<!DOCTYPE html>
<html lang="en">


<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
 
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  
</head>

<body>
 
 <!-----------------------------new one ----------------------------------->
 <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "navbar_admin.php";?>
        <?php include "sidebar_admin.php";?>
    
      </div>
     
      <!-- Main Content -->
      <div class="main-content">
  
        <section class="section">
          <div class="section-body">
         
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Display Student</h4>
                  </div>
                 
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                          <th>Sr No</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Roll No</th>
                          <th>Gender</th>
                          <th>Age</th>
                          <th>DOB</th>
                          <th>Class</th>
                          <th>Parent</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Religion</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                              $displayquery="select t1.*,t2.*,t3.* from student as t1 left join class as t2 on t1.class_id=t2.class_id LEFT join parent as t3 on t1.parent_id=t3.parent_id";
                              $result = mysqli_query($conn,$displayquery);
                              if(mysqli_num_rows($result)>0){
                               $number=1;
                                 while ($row=mysqli_fetch_array($result)) {          
                          ?>
                          <tr>
                          <td><?php echo $number?></td>
                          <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                          <td><?php echo $row['address_s']?></td>
                          <td><?php echo $row['roll_no']?></td>
                          <td><?php echo $row['gender_s']?></td>
                          <td><?php echo $row['age_s']?></td>
                          <td><?php echo $row['dob_s']?></td>
                          <td><?php echo $row['class']?></td>
                          <td><?php echo $row['p_first_name']." ".$row['p_last_name'];?></td>
                          <td><?php echo $row['phone_s']?></td>
                          <td><?php echo $row['e_mail_s']?></td>
                          <td><?php echo $row['religion_s']?></td>
                          
                          <td><?php echo "<a href='update_student_admin.php?id=".$row['student_id']."'><i class='fas fa-edit'></i></a>"?>
                          <?php echo "<a href='delete_data.php?student_id=".$row['student_id']."'><i class='fas fa-trash'></i></a>"?></td>  
                          </tr>
                        
                          <?php $number++; }  }?>
                     
                  
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
    </div>
  </div>
  
  <!-----------------------------new one ----------------------------------->
  <?php include "footer_admin.php";?>