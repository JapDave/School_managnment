<?php
session_start();
include "../Admin/connection.php";
if(isset($_POST['teacher_message'])){

$teacher_message=$_POST['teacher_m'];
$date=date('y-m-d');
$teacher_id=$_SESSION['teachers'];
$query="insert into message(message,message_date,teacher_id)
         values('$teacher_message','$date','$teacher_id')";
$result=mysqli_query($conn,$query);
if($result){
    //echo "insert";
    $_SESSION['status']="Message Has Sent";
    $_SESSION['status_code']="success";
    header("location:add_message_teacher.php");

}
else{
   // echo "insert not";
    $_SESSION['status']="Message Is Not Sent";
    $_SESSION['status_code']="error";
    header("location:add_message_teacher.php");

}
}

/******************************************message send by student*******************************************************/
if(isset($_POST['student_message'])){

    $student_message=$_POST['student_m'];
    $date=date('y-m-d');
    $student_id=$_SESSION['student'];
    $query="insert into message(message,message_date,student_id)
             values('$student_message','$date','$student_id')";
    $result=mysqli_query($conn,$query);
    if($result){
        //echo "insert";
        $_SESSION['status']="Message Has Sent";
        $_SESSION['status_code']="success";
        header("location:../Student/add_message_student.php");
    
    
    }
    else{
       // echo "insert not";
        $_SESSION['status']="Message Is Not Sent";
        $_SESSION['status_code']="error";
        header("location:../Student/add_message_student.php");
    
    }
    }
    


/******************************************message send by parent*******************************************************/
if(isset($_POST['parent_message'])){

    $parent_message=$_POST['parent_m'];
    $date=date('y-m-d');
    $parent_id=$_SESSION['parent'];
    $query="insert into message(message,message_date,parent_id)
             values('$parent_message','$date','$parent_id')";
    $result=mysqli_query($conn,$query);
    if($result){
        //echo "insert";
        $_SESSION['status']="Message Has Sent";
        $_SESSION['status_code']="success";
        header("location:../Parent/add_message_parent.php");
    
    
    }
    else{
        //echo "insert not";
        $_SESSION['status']="Message Is Not Sent";
        $_SESSION['status_code']="error";
        header("location:../Parent/add_message_parent.php");
    
    }
    }
    
?>