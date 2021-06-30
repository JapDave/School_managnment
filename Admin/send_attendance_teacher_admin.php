<?php 
session_start();
include "connection.php";
$ryes=$_GET['ryes'];
  $rno=$_GET['rno'];
if($ryes == "Yes"){
  $_SESSION["login_time_stampt"] = time(); 
     $tid=$_GET['id'];

      $query="update status_teacher set requested='$ryes',s_teacher='0' where teacher_id='$tid'";
    $result=mysqli_query($conn,$query);
    if($result){
        //echo "updated";
      $_SESSION['status']="Accepted";
      $_SESSION['status_code']="success";
      header("location:show_request_attendance_teacher_admin.php");
    }else{
        //echo "upadted not";
      $_SESSION['status']="Error";
      $_SESSION['status_code']="error";
      header("location:show_request_attendance_teacher_admin.php");
    }
}elseif($rno == "No"){
   
  
    $tids=$_GET['id'];

 $query="update status_teacher set requested='$rno',s_teacher='1' where teacher_id='$tids'";
 $result=mysqli_query($conn,$query);
 if($result){
     //echo "updated";
   $_SESSION['status']="Rejected";
   $_SESSION['status_code']="success";
   header("location:show_request_attendance_teacher_admin.php");
 }else{
     //echo "updated not";
   $_SESSION['status']="Error";
   $_SESSION['status_code']="error";
   header("location:show_request_attendance_teacher_admin.php");
 }
}
   
      
 

  
?>