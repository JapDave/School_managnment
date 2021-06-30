<?php
include "isauth_parent.php";
?>
<!DOCTYPE html>
<html lang="en">


<!-- card.html  21 Nov 2019 03:54:26 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/chocolat/dist/css/chocolat.css">
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
      <?php include "sidebar_parent.php";?>
      <?php include "navbar_parent.php"?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <h2 class="section-title" style="font-size:50px;">Exam</h2>
            <?php
              include "connection.php";
              $noticequery="select * from exam_student";
              $results=mysqli_query($conn,$noticequery);
              if(mysqli_num_rows($results)>0){
                 $number=1;
              while($row=mysqli_fetch_array($results)){
                  $title=$row['exam_name'];
                  $examyear=$row['exam_year'];
                  $timetable=$row['exam_time_table'];
                  
            ?>
            <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $title;?></h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse<?php echo $row['exam_id']?>" class="btn btn-icon btn-info" href="#<?php echo $row['exam_id'];?>"><i
                          class="fas fa-plus"></i></a>
                    </div>
                  </div>
                  <div class="collapse" id="mycard-collapse<?php echo $row['exam_id']?>">
                    <div class="card-body">
                     <?php echo $examyear;?>
                    </div>
                    <div class="card-footer">
                     <h6>Exam Time Table</h6>
                     <?php echo "<a  class='btn btn-icon btn-info' href='../Admin/download_time_table_exam.php?exam=".$row['exam_time_table']."'><i
                          class='fas fa-download'></i></a>"; ?>
                    </div>
                    
                  </div>
                </div>   
          </div>
              </div>
              <?php $number++; } } ?>
        </section>
        
    </div>
  </div>
  
 <?php include "footer_parent.php";?>