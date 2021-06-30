<?php
session_start();
include "../Admin/connection.php";

// if(isset($_POST['login_s']) && $_POST['user_type'] == "student")
// {
//     $username=$_POST['username'];
//     $password=$_POST['lock'];
//     $query1="select * from student where e_mail='$username'and password='$password'";
//     $result1=mysqli_query($conn,$query1);
//     $row=mysqli_num_rows($result1);
//     $rows=mysqli_fetch_array($result1);
//     if($row > 0)
//     {
//         $_SESSION['student']=$rows['student_id'];
//         header("location:../Student/index.php");
//     }
//     else{
//     	$_SESSION['msg']="Username or password is Wrong";
//         header("location:login_page.php");
//     }
// }else if(isset($_POST['login_s']) && $_POST['user_type'] == "parents")
// 	{
//       $username=$_POST['username'];
//       $password=$_POST['lock'];
//       $query="select * from parent where e_mails='$username'and password='$password'";
//       $result=mysqli_query($conn,$query);
//       $row=mysqli_num_rows($result);
//       $rows=mysqli_fetch_array($result);
//        if($row > 0)
//        {
//            $_SESSION['parent']=$rows['parent_id'];
//            header("location:../Parent/index.php");
//        }
//        else{
//         $_SESSION['msg']="Username Or password is Wrong";
//         header("location:login_page.php");
//        }
// }else if(isset($_POST['login_s']) && $_POST['user_type'] == "teachers")
// 	{
//       $username=$_POST['username'];
//       $password=$_POST['lock'];
//       $query="select * from teacher where e_mail='$username'and password='$password'";
//       $result=mysqli_query($conn,$query);
//       $row=mysqli_num_rows($result);
//       $rows=mysqli_fetch_array($result);
//        if($row > 0)
//        {
//            $_SESSION['teachers']=$rows['teacher_id'];
//            header("location:../Teacher/index.php");
//        }
//        else{
           
//         $_SESSION['msg']="Username Or password is Wrong";
//         header("location:login_page.php");   
//     }
// }else{
       
//     $_SESSION['msg']="login failed";
// }



if(isset($_POST['login_s'])){
    $username=$_POST['username'];
     $password=$_POST['lock'];
    if($_POST['user_type'] == 'student'){

    $query1="select * from student where e_mail_s='$username'";
    $result1=mysqli_query($conn,$query1);
    $row=mysqli_num_rows($result1);
    if($row){
        $password_fetch=mysqli_fetch_array($result1);
        echo $password_db=$password_fetch['password_s'];
        if($password == $password_db){
            //$_SESSION['msg']="login successfully";
            $_SESSION['student']=$password_fetch['student_id'];
            header("location:../Student/index.php");
        }
        else{
            $_SESSION['msg']="Password Enter Is Wrong";
            header("location:login_page.php");

        }
        
    }else{
             $_SESSION['msg']="Invalid Email";
            header("location:login_page.php");
        }

    }elseif($_POST['user_type'] == 'parents'){
      
      $query2="select * from parent where e_mail_p='$username'";
    $result2=mysqli_query($conn,$query2);
    $rows=mysqli_num_rows($result2);
    if($rows){
        $password_fetch=mysqli_fetch_array($result2);
        $password_db=$password_fetch['password_p'];
        
        if($password == $password_db){
            $_SESSION['parent']=$password_fetch['parent_id'];
            header("location:../Parent/index.php");
        }
        else{
            $_SESSION['msg']="Password Enter Is Wrong";
            header("location:login_page.php");
        }
        
    }
    else{
        $_SESSION['msg']="Invalid Email";
        header("location:login_page.php");
    }
}
    elseif($_POST['user_type'] == 'teachers'){
        $query1="select * from teacher where e_mail_t='$username'";
    $result1=mysqli_query($conn,$query1);
    $row=mysqli_num_rows($result1);
    if($row){
        $password_fetch=mysqli_fetch_array($result1);
        $password_db=$password_fetch['password_t'];
        
        if($password == $password_db){
            $_SESSION['teachers']=$password_fetch['teacher_id'];
            header("location:../Teacher/index.php");
        }
        else{
            $_SESSION['msg']="Password Enter Is Wrong";
            header("location:login_page.php");
        }
        
    }
    else{
        $_SESSION['msg']="Invalid Email";
        header("location:login_page.php");
    }

    }
}
else{
    $_SESSION['msg']="Login Failed";
    header("location:login_page.php");
}




?>