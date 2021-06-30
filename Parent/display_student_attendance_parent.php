<?php
session_start();
error_reporting(0);
include "isauth_parent.php";
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
            <div class="row">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Show Attendance</button>
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
                <h5 class="modal-title" id="formModal">Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="insert_marks_student_teacher.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Select Student</label>
                      <select class="form-control" id="student_ids_parent"  name="data_class">
                       <option value="">Select One</option>\
                       <?php
                        $query="select * from student where parent_id=".$_SESSION['parent'];
                        $result=mysqli_query($conn,$query);
                        while($rowss=mysqli_fetch_array($result)){?>
                          <option value="<?php echo $rowss['student_id'];?>"><?php echo $rowss['first_name']."-".$rowss['last_name'];?></option>
                       <?php }
                       
                       ?>
                      </select>
                     
                    </div>
                    <div class="form-group">
                      <label>From Date</label>
                        <input type="date" name="from_date" id="from_date_attendance" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>To Date</label>
                        <input type="date" name="to_date" id="to_date_attendance" class="form-control">
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
     $('#student_ids_parent').change(function(){
         $('#from_date_attendance').change(function(){
             $('#to_date_attendance').change(function(){

            
       var studentname=$('#student_ids_parent').val();
       var fromdatess=$('#from_date_attendance').val();
       var todatess=$('#to_date_attendance').val();
        $.ajax({
            method:'POST',
            url:'import_student_detail_parent.php',
            data:{text10:studentname,text11:fromdatess,text12:todatess},
            success:function(data){
               $('#display_record').html(data);
            }
        });
        $('#exampleModal').modal('hide');
         });
       });
     });
  });
</script>
   
  
  
<?php include "footer_parent.php";?>