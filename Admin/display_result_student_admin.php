<?php
include "isauth.php";
?>
<!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
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
      <?php include "navbar_admin.php"?>
        <!-- Main Content -->
        <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Show Result</button>
                  </div>
              </div>
            </div>   
            <div id="display_record"></div>       
          </div>
        </section>
        <!-- Modal with form -->
       
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Show Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                <div class="form-group">
                <label style="margin-top:20px;">Select Exam</label>
                  <select class="form-control" id="show_exam_result"  name="class_marks"  required> 
                
                  <option value="">Select One</option>
                  <?php
                  echo $query_exam="select * from exam_student";
                  $result_exam=mysqli_query($conn,$query_exam);
                  while($rows=mysqli_fetch_array($result_exam)){?>
                    <option value="<?php echo $rows['exam_id']?>"><?php echo $rows['exam_name']."-".$rows['exam_year'];?></option>
                  <?php  }
                  ?>
              </select>
              </div>
                <div class="form-group">
                <label style="margin-top:20px;">Select Class</label>
                  <select class="form-control" id="show_result_class"  name="class_marks"  required> 
                
                  <option value="">Select One</option>
                  <?php
                  echo $query_class="select * from class";
                  $result_marks=mysqli_query($conn,$query_class);
                  while($mar=mysqli_fetch_array($result_marks)){?>
                    <option value="<?php echo $mar['class_id']?>"><?php echo $mar['class'];?></option>
                  <?php  }
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
    $('#show_exam_result').change(function(){

    
     $('#show_result_class').change(function(){
         var classresult=$('#show_result_class').val();
         var examshow=$('#show_exam_result').val();
         
         $.ajax({
             method:'POST',
             url:'../Teacher/import_table_result_teacher.php',
             data:{text6:classresult,text7:examshow},
             success:function(data){
               $('#display_record').html(data);
               
             }
         });
         $('#exampleModal1').modal('hide');
     });
    });
  });
</script>
   
  
  

<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>