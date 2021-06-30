<?php
//session_start();
error_reporting(0);
include "isauth_student.php";
include "../Admin/connection.php";

$query="select t1.*,t2.* from student as t1 
left join class as t2 on t1.class_id=t2.class_id 
where t1.student_id=".$_SESSION['student'];

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$classname=$row['class'];


?>


<!DOCTYPE html>
<html lang="en">


<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
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
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Time Table</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                        <th>Time</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thrusday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                           $query1="select * from timetable8 where class='$classname'";
                           
                           $result1=mysqli_query($conn,$query1);
                           if(mysqli_num_rows($result1) <= 0){
                          ?>
                          <tr>
                            <td colspan="2" style="padding-left:100px;">Record Not Found</td>
                          </tr>
                          <?php }
                           else{

                           
                           while($rows=mysqli_fetch_array($result1)){
                            ?>

                            <tr>
                       
                            <td><?php echo  $rows['Time']?></td>       
                            <td><?php echo  $rows['Monday']?></td>
                            <td><?php echo  $rows['Tuesday']?></td>
                            <td><?php echo  $rows['Wednesday']?></td>
                            <td><?php echo  $rows['Thrusday']?></td>
                            <td><?php echo  $rows['Friday']?></td>
                            <td><?php echo  $rows['Saturday']?></td>
                        </tr>
                          <?php  }
                           }
                          
                          ?>
                        
                  
                      </tbody>
                    </table>
                  </div>
                </div>
               
               
               
              </div>
            
        </section>
</div>
  </div>
  <?php include "footer_student.php";?>