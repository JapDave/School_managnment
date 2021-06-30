<?php
//session_start();
include "isauth_student.php";
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
      <?php include "sidebar_student.php";?>
      <?php include "navbar_student.php"?>
        <!-- Main Content -->
        <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Show Result</button>
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
                <h5 class="modal-title" id="formModal">Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="insert_marks_student_teacher.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                      <label>Select Exam</label>
                      <select class="form-control" id="exam_change_id"  name="data_class">
                       <option value="">Select One</option>\
                       <?php
                        $query_exam="select * from exam_student";
                        $result_exam=mysqli_query($conn,$query_exam);
                        while($rowss=mysqli_fetch_array($result_exam)){?>
                          <option value="<?php echo $rowss['exam_id'];?>"><?php echo $rowss['exam_name']."-".$rowss['exam_year'];?></option>
                       <?php }
                       
                       ?>
                      </select>
                     
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
     $('#exam_change_id').change(function(){
       var examname=$('#exam_change_id').val();
        $.ajax({
            method:'POST',
            url:'import_data.php',
            data:{exam:examname},
            success:function(data){
               $('#display_record').html(data);
            }
        });
        $('#exampleModal').modal('hide');
     });
  });
</script>
   
  
  
<?php include "footer_student.php";?>