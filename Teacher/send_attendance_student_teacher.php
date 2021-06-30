<?php 
session_start();
include "../Admin/connection.php";
$ryes=$_GET['ryes'];
  $rno=$_GET['rno'];
if($ryes == "Yes"){
  $_SESSION["login_time_stamp"] = time(); 
     $sid=$_GET['id'];

      $query="update status set requested='$ryes',status='0' where student_id='$sid'";
    $result=mysqli_query($conn,$query);
    if($result){
        //echo "updated";
      $_SESSION['status']="Accepted";
      $_SESSION['status_code']="success";
      header("location:show_request_attendance_teacher.php");
    }else{
        //echo "upadted not";
      $_SESSION['status']="Error";
      $_SESSION['status_code']="error";
      header("location:show_request_attendance_teacher.php");
    }
}elseif($rno == "No"){
   
  
    $sids=$_GET['id'];

 $query="update status set requested='$rno',status='1' where student_id='$sids'";
 $result=mysqli_query($conn,$query);
 if($result){
     //echo "updated";
   $_SESSION['status']="Rejected";
   $_SESSION['status_code']="success";
   header("location:show_request_attendance_teacher.php");
 }else{
     //echo "updated not";
   $_SESSION['status']="Error";
   $_SESSION['status_code']="error";
   header("location:show_request_attendance_teacher.php");
 }
}
   
      
 

  
?>