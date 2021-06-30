<?php

//session_start();
include "isauth_student.php";
include "../Admin/connection.php";

$query="select t1.*,t2.* from student as t1 
left join class as t2 on t1.class_id=t2.class_id 
where t1.student_id=".$_SESSION['student'];

$result=mysqli_query($conn,$query);
$rows=mysqli_fetch_array($result);
$classid=$rows['class_id'];


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
         
            <div id="display_record">
            <div class="row">
 <div class="col-12">
   <div class="card">
     <div class="card-header">
       <h4>Display ClassMates</h4>
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
           <thead>
             <tr>
             <th>Profile Picture</th>
             <th>Roll No</th>
             <th>Name</th>
             </tr>
           </thead>
           <tbody>
           <?php
                 
              
                  $displayquery="select * from student where class_id='$classid'";
                 $result = mysqli_query($conn,$displayquery);
                 if(mysqli_num_rows($result) <= 0){?>
                   
                  <tr>           
             <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center">Record Not Found</td>
             
                            </tr>
                <?php }else{
                 
                    while ($row=mysqli_fetch_array($result)) {?>
          <tr>    
           <td style="padding:20px"><img alt="image" src="../Admin/<?php echo $row['profile_photo_s']?>" class="rounded-circle author-box-picture" style="width:60px;height:60px"></td>       
             <td><?php echo $row['roll_no']?></td>
             <td><?php echo $row['first_name']." ".$row['last_name']?></td>
            </tr>
                   <?php } }?>
          </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>
</div>
            </div>       
          </div>
        </section>
        <!-- Modal with form -->
       
    </div>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>

$(document).ready(function() {
  $('#student_c').on('change', function() {
  var classteacher = $('#student_c').val();
    $.ajax({
        method: 'POST',
        url: 'import_table_result_teacher.php',
        data: { text1: classteacher},
        success: function(data) {
          $('#display_record').html(data);
        }
        
    });
    $('#exampleModal').modal('hide');
    
});

});
   
  
  
</script>
<?php include "footer_student.php";?>