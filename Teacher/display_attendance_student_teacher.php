<?php
session_start();
error_reporting(0);
include "isauth_teacher.php";
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
      <?php include "sidebar_teacher.php";?>
      <?php include "navbar_teacher.php"?>
        <!-- Main Content -->
        <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Attendance</button>
                  </div>
              </div>
            </div>   
            <div id="display_record"></div>       
          </div>
        </section>
        <!-- Modal with form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Student Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="insert_time_table_admin.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                      
                      <div id="show_result" class="form-group">
                         <label style="margin-top:20px;" >Select Date</label>
                        <input type="date" id="value_attendance_date" name="attendance_date" class="form-control" required>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>


  $(document).ready(function(){
     $('#value_attendance_date').change(function(){
         

         
       var attendancedate=$('#value_attendance_date').val();
     
        $.ajax({
            method:'POST',
            url:'import_table_result_teacher.php',
            data:{attdates:attendancedate},
            success:function(data){
               $('#display_record').html(data);
            }
        });
        $('#exampleModal').modal('hide');
 
     });
  });
</script>
   

<!-- General JS Scripts -->
<script src="../Admin/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../Admin/assets/bundles/datatables/datatables.min.js"></script>
  <script src="../Admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../Admin/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../Admin/assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="../Admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../Admin/assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>