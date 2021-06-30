<?php
session_start();
include "../Admin/connection.php";
if(isset($_POST['send_requested_to'])){
    $date=date('y-m-d');
    $tid=$_SESSION['teachers'];  
    $query3="select * from status_teacher where teacher_id='$tid'";
    $result3=mysqli_query($conn,$query3);
    if(mysqli_num_rows($result3) > 0){
      $query="update status set s_t_date='$date',requested='',s_teacher='-1',teacher_id='$tid' where teacher_id='$tid'";
      $result=mysqli_query($conn,$query);
          if($result){
            $_SESSION['status']="Request Send";
            $_SESSION['status_code']="success";
            header("location:display_attendance_teacher.php");
        }else{
            $_SESSION['status']="Request Send Failed";
            $_SESSION['status_code']="error";
            header("location:display_attendance_teacher.php");
        }
    }else{
      
      $query1="insert into status_teacher(s_t_date,requested,s_teacher,teacher_id)values('$date','pending','-1','$tid')";
      $result1=mysqli_query($conn,$query1);
  
        if($result1){
          $_SESSION['status']="Request Send";
          $_SESSION['status_code']="success";
          header("location:display_attendance_teacher.php");
      }else{
          $_SESSION['status']="Request Send Failed";
          $_SESSION['status_code']="error";
          header("location:display_attendance_teacher.php");
      }
        
    }
  }
?>