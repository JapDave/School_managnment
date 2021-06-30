<?php
session_start();
include "../Admin/connection.php";
if(isset($_POST['send_requested_to'])){
    $date=date('y-m-d');
    $student_id=$_SESSION['student'];  
    $query3="select * from status where student_id='$student_id'";
    $result3=mysqli_query($conn,$query3);
    if(mysqli_num_rows($result3) > 0){
      $query="update status set s_date='$date',requested='pending',status='-1',student_id='$student_id' where student_id='$student_id'";
      $result=mysqli_query($conn,$query);
          if($result){
            $_SESSION['status']="Request Send";
            $_SESSION['status_code']="success";
            header("location:display_attendance_student.php");
        }else{
            $_SESSION['status']="Request Send Failed";
            $_SESSION['status_code']="error";
            header("location:display_attendance_student.php");
        }
    }else{
      
      $query1="insert into status(s_date,requested,status,student_id)values('$date','pending','-1','$student_id')";
      $result1=mysqli_query($conn,$query1);
  
        if($result1){
          $_SESSION['status']="Request Send";
          $_SESSION['status_code']="success";
          header("location:display_attendance_student.php");
      }else{
          $_SESSION['status']="Request Send Failed";
          $_SESSION['status_code']="error";
          header("location:display_attendance_student.php");
      }
        
    }
  }
?>