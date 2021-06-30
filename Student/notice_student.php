<?php

include "isauth_student.php";
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
      <?php include "sidebar_student.php";?>
      <?php include "navbar_student.php"?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <h2 class="section-title" style="font-size:50px;">Notice</h2>
            <?php
              include "../Admin/connection.php";
              $noticequery="select * from notice";
              $results=mysqli_query($conn,$noticequery);
              if(mysqli_num_rows($results)>0){
                 $number=1;
              while($row=mysqli_fetch_array($results)){
                  $title=$row['notice_title'];
                  $details=$row['notice_details'];
                  $postedby=$row['notice_posted_by'];
                  $date=$row['notice_date'];
            ?>
            <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4><?php echo $title;?></h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse<?php echo $row['notice_id'];?>" class="btn btn-icon btn-info" href="<?php echo $row['notice_id'];?>"><i
                          class="fas fa-plus"></i></a>
                    </div>
                  </div>
                  <div class="collapse" id="mycard-collapse<?php echo $row['notice_id'];?>">
                    <div class="card-body">
                     <?php echo $details;?>
                    </div>
                    <div class="card-footer">
                     <?php echo $postedby;?>
                    </div>
                    <div class="card-footer">
                     <?php echo $date;?>
                    <?php echo "<a  class='btn btn-icon btn-info' href='../Admin/download_time_table_notice.php?notice=".$row['notice_poster']."'><i
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
  
  <?php include "footer_student.php";?>