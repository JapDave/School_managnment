<?php
session_start();
error_reporting(0);
include "isauth_teacher.php";
include "../Admin/connection.php";


if(isset($_POST['student_attendance'])){
  
  foreach($_POST['attendance_status'] as $id=>$attendance_status){
    $studentid=$_POST['student_name'][$id];
       $date=date("Y-m-d");
   $id1="select * from student_attendance where student_id='$studentid' and s_a_date='$date' ";
    $result1=mysqli_query($conn,$id1);
    $row1=mysqli_num_rows($result1);

   if($row1 > 0)
   {
       $_SESSION['status']="Attendance Already Taken";
      $_SESSION['status_code']="info";
      
   }
 else{
     $finalquery="insert into student_attendance(s_a_date,attendance_status,student_id)
                 values('$date','$attendance_status','$studentid')";
   $finalresult=mysqli_query($conn,$finalquery);
   if($finalresult){
            
    //  echo "insert";
   
    header("location:insert_attendance_teacher.php");
    
      }
    
  else{
    //  echo "insert not";
    $_SESSION['status']="Attendance Not Taken";
    $_SESSION['status_code']="error";
    header("location:insert_attendance_teacher.php");
    
  }
  
  }
  
 }
  
}



 
?>
<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../Admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../Admin/assets/css/style.css">
  <link rel="stylesheet" href="../Admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../Admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../Admin/assets/img/favicon.ico' />
</head>

<body>
  <!-- <div class="loader"></div> -->
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        <?php include "sidebar_teacher.php";?>
        <?php include "navbar_teacher.php";?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
           <form action="" method="POST">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Student Attendance</h4>
                  </div>
                 
                  <div class="card-body">
                  <div><?php echo date("l jS  F Y");?></div>
                    <div class="table-responsive">
                  
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                          <th>Roll No</th>
                            <th>Student Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $querys="select t1.*,t2.* from teacher as t1 
                          right join class_teacher as t2 on t1.teacher_id=t2.teacher_id where t1.teacher_id=".$_SESSION['teachers'];
                          $results=mysqli_query($conn,$querys);
                          $rowss=mysqli_fetch_array($results);
                          $class_id=$rowss['class_id'];
                           $teacher="select * from student where class_id='$class_id'";
                           $result=mysqli_query($conn,$teacher);
                           $counter=0;
                           while($row=mysqli_fetch_array($result)){
                          ?>
                                    <tr>
                                 
                                    <td><?php echo $row['roll_no'];?></td>
                                    <td><input type="hidden" value="<?php echo $row['student_id'];?>" name="student_name[]">
                                     <?php echo $row['first_name']." ".$row['last_name'];?> 
                                   </td>
                            <td class="align-middle">
                            <input type="radio" name="attendance_status[<?php echo $counter;?>]" value="present" required>Present
                            <input type="radio" name="attendance_status[<?php  echo $counter;?>]" value="absent" required>Absent
                            </td>
                          </tr>
                           <?php $counter++;  } ?>
                           
                           
                        </tbody>
                       
                      </table>
                      <input type="submit" name="student_attendance" value="Submit" class="btn btn-primary mr-30">
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
             </form>
          </div>
        </section>
        <?php include "footer_teacher.php";?>