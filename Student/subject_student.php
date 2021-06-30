<?php
//session_start();
include "isauth_student.php";
 include "../Admin/connection.php";
    $query="select * from student where student_id=".$_SESSION['student'];
 $result=mysqli_query($conn,$query);
 $rowid=mysqli_fetch_array($result);
  $class_id=$rowid['class_id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../Admin/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../Admin/assets/css/style.css">
  <link rel="stylesheet" href="../Admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../Admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../Admin/assets/img/favicon.ico' />
</head>
<body>
  <!-------------------------new one------------------------------------------>
  <!-- <div class="loader"></div> -->
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "sidebar_student.php";?>
      <?php include "navbar_student.php";?>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header"> 
                    <h4>Display Subject</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                          <th>Sr No</th>
                          <th>Subject Name</th>
                          <th>Syllabus</th>
                     
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                              $displayquery="select t1.*,t2.* from subject as t1
                              left join class as t2 on t1.class_id=t2.class_id
                              where t2.class_id='$class_id'";
                              $result1 = mysqli_query($conn,$displayquery);
                              if(mysqli_num_rows($result1)>0){
                               $number=1;
                                 while ($row=mysqli_fetch_array($result1)) {
                          ?>
                          <tr>
                          <td><?php echo $number;?></td> 
                          <td style="text-transform:capitalize"><?php echo $row['subject_name'];?></td> 
                          <td><?php echo "<a href='download_syllabus_student.php?id=".$row['student_id']."'><i class='fas fa-download'></i></a>"?></td>
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
  <!-------------------------new one------------------------------------------>
  <script>
      function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}

    </script>
  <?php include "footer_student.php";?>