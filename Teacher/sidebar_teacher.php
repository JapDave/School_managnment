<?php
session_start();
error_reporting(0);
?>
<html>
<head>
</head>
<body>
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php"> <img alt="image" src="../Admin/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">SMS</span>
            </a>
          </div>
          <ul class="sidebar-menu">
     
     <li class="dropdown active">
       <a href="index.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
     </li>
     <li class="dropdown">
       <a href="Student_details_teacher.php" class="nav-link"><i data-feather="user"></i><span>Student Details</span></a>
     </li>
     <li class="dropdown">
       <a href="parent_details_teacher.php" class="nav-link"><i data-feather="users"></i><span>Parents Details</span></a>
     </li>
     <li class="dropdown">
       <a href="display_attendance_teacher.php" class="nav-link"><i data-feather="check-square"></i><span>Attendance</span></a>
     </li>
     
       
       <?php
      include "../Admin/connection.php";
      $query="select t1.*,t2.* from teacher as t1 right join class_teacher as t2 on t1.teacher_id=t2.teacher_id where t1.teacher_id=".$_SESSION['teachers'];
      $result=mysqli_query($conn,$query);
     
     

      if(mysqli_num_rows($result) > 0){?>
       
       <li class="dropdown">
     <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="check-square"></i><span>Student Attendance</span></a>
       <ul class="dropdown-menu">
        <li><a class="nav-link" href="display_attendance_student_teacher.php">Show Attendance</a></li>
        <li><a class="nav-link" href="add_attendance_student_teacher.php">Take Attendance</a></li>
        <li><a class="nav-link" href="show_request_attendance_teacher.php">Request For Attendance</a></li>
        </ul>
        </li>
      <?php }else{
        ?>
         
      <?php }
     ?>
    
   
     <li class="dropdown">
       <a href="exam_teacher.php" class="nav-link"><i data-feather="edit"></i><span>Exam</span></a>
     </li>
     <li class="dropdown">
     <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="airplay"></i><span>Result</span></a>
     <?php
      include "../Admin/connection.php";
      $query="select t1.*,t2.* from teacher as t1 right join class_teacher as t2 on t1.teacher_id=t2.teacher_id where t1.teacher_id=".$_SESSION['teachers'];
      $result=mysqli_query($conn,$query);
     
     

      if(mysqli_num_rows($result) > 0){?>
       
        <ul class="dropdown-menu">
        <li><a class="nav-link" href="add_result_teacher.php">Upload Result</a></li>
        <li><a class="nav-link" href="show_result_teacher.php">Show Result</a></li>
        </ul>
      <?php }else{
        ?>
           
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="show_result_teacher.php">Show Result</a></li>
            </ul>
      <?php }
     ?>
     </li>
     <li class="dropdown">
       <a href="notice_teacher.php" class="nav-link"><i data-feather="clipboard"></i><span>Notice</span></a>
     </li>
     <li class="dropdown">
       <a href="add_message_teacher.php" class="nav-link"><i data-feather="mail"></i><span>Message</span></a>
     </li>
  </ul>
        </aside>
      </div>
</body>
</html>
