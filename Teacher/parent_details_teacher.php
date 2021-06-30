<?php
include "isauth_teacher.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- modal.html  21 Nov 2019 03:54:30 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/prism/prism.css">
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Select</button>
                  </div>
              </div>
            </div> 
            <div id="parent_record"></div>         
          </div>
        </section>
        <!-- Modal with form -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Filter Parent Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                <div class="form-group">
                      <label>Select Class</label>
                      <select class="form-control" id="student_c" name="data_class" required>
                          <option value="">Select One</option>
                      <?php
                        include "../Admin/connection.php";
                        $query="select * from class";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['class_id'];?>"><?php echo $row['class'];?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Select Student</label>
                      <select class="form-control" id="datatarget" name="data_student" required>
                        <option>Select One</option>
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

   
    $('#student_c').change(function(){
      var datavalue = $('#student_c').val();
       $.ajax({
             url:'import_table_result_teacher.php',
             method:'POST',
             data:{data:datavalue},
             success:function(result){
               $('#datatarget').html(result);
             }
       });
    });
    $('#datatarget').change(function(){
      var classid = $('#student_c').val();
        var studentid = $('#datatarget').val();
        
        $.ajax({
        method: 'POST',
        url: 'import_table_result_teacher.php',
        data: { classids:classid,studentids:studentid},
        success: function(data) {
          $('#parent_record').html(data);
        }
    });
    $('#exampleModal').modal('hide');
});

}); 
  
  
   
  </script>
  
  <?php include "footer_teacher.php";?>