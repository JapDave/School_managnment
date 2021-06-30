<?php
//session_start();
include "isauth_student.php";
include "../Admin/connection.php";
                        $query1="select * from student where student_id=".$_SESSION['student'];
                        $result1=mysqli_query($conn,$query1);
                        $row2=mysqli_fetch_array($result1);
                         $class_id=$row2['class_id'];
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
      <?php include "navbar_student.php";?>
        <!-- Main Content -->
        <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row" id="show_data">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Select</button>
                
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
                <h5 class="modal-title" id="formModal">Select Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                <div class="form-group">
                      <label>Select Teacher</label>
                      <select class="form-control"  id="teacher_name" name="data_class" required>
                          <option value="">Select One</option>
                      <?php
                        
                        
                            $query="select t1.*,t2.*,t3.* from teacher as t1
                            left join subject as t2 on t1.subject_id=t2.subject_id
                            LEFT join class as t3 on t2.class_id=t3.class_id
                            where t3.class_id='$class_id'";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['teacher_id'];?>"><?php echo $row['t_f_name']." ".$row['t_l_name'];?></option>
                      <?php } ?>
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

$(document).ready(function() {
  $('#teacher_name').on('change', function() {
  var teacherstudent = $('#teacher_name').val();
    $.ajax({
        method: 'POST',
        url: 'import_data.php',
        data: { txt5: teacherstudent},
        success: function(data) {
          $('#display_record').html(data);
        }
        
    });
    $('#exampleModal').modal('hide');
    
});

});
   
  
  
</script>
<?php include "footer_student.php";?>