<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
include "connection.php";

/***************************insert class data in database***************************/
if(isset($_POST['submit_insert'])){

    $class_name=$_POST['class_name'];

    $query="insert into class(class) values('$class_name')";

    $result=mysqli_query($conn,$query);
    if($result){
        //echo "Insert Successfully";
        $_SESSION['status']="Data Is Send To Database";
        $_SESSION['status_code']="success";
        header("location:add_class_admin.php");
    }
    else{
         //echo "Not insert successfully";
        $_SESSION['status']="Data Is Not Send To Database";
        $_SESSION['status_code']="error";
        header("location:add_class_admin.php");
    }

}

/***************************insert teacher attendance data in database***************************/
if(isset($_POST['attendance'])){
  
    foreach($_POST['attendance_status'] as $id=>$attendance_status){
      $teacherid=$_POST['teacher_name'][$id];
         $date=date("Y-m-d");
      $id1="select * from teacher_attendance where teacher_id='$teacherid' and t_a_date='$date' ";
      $result=mysqli_query($conn,$id1);
      $row=mysqli_num_rows($result);

     if($row>0)
     {
         $_SESSION['status']="Attendance Already Taken";
        $_SESSION['status_code']="info";
         header("location:add_attendance_teacher_admin.php");
     }
   else{
     $finalquery="insert into teacher_attendance(t_a_date,attendance_status,teacher_id)
                   values('$date','$attendance_status','$teacherid')";
     $finalresult=mysqli_query($conn,$finalquery);
     if($finalresult){
        //  echo "insert";
        $_SESSION['status']="Data Is Send To Database";
        $_SESSION['status_code']="success";
         header("location:add_attendance_teacher_admin.php");
     }
     else{
        //  echo "insert not";
        $_SESSION['status']="Data Is Not Send To Database";
        $_SESSION['status_code']="error";
         header("location:add_attendance_teacher_admin.php");
     }
    }
    
   }
  }




  /***************************insert class teacher data in database***************************/

  if(isset($_POST['class_teacher_add'])){


    $teacher_id=$_POST['t_name'];
    $class_id=$_POST['t_class'];
   
   $query="insert into class_teacher(class_id,teacher_id) values('$class_id','$teacher_id')";
   $result=mysqli_query($conn,$query);
  
  
   if($result){
       //echo "insert successfully";
       $_SESSION['status']="Data Is Send To Database";
        $_SESSION['status_code']="success";
       header("location:add_class_teacher_admin.php");
   }
   else{
       //echo "insert not successfully";
       $_SESSION['status']="Data Is Not Send To Database";
        $_SESSION['status_code']="error";
       header("location:add_class_teacher_admin.php");
      
   }
   }

   


 /***************************insert exam data in database***************************/

   if (isset($_POST['i_exam'])) {
	

    $exam_name=$_POST['e_name'];
    $exam_year=$_POST['e_year'];
  

/********file upload start***************************/

$img_file = $_FILES["e_time_table"]["name"];
$img_file;
$folderName="exam_time_table/";
$validExt = array("jpg", "png", "jpeg", "bmp", "gif","txt");

if ($img_file == "") {
 $_SESSION['status_code']="Attach an image";
 header("location:add_exam_admin.php");
} elseif ($_FILES["e_time_table"]["size"] <= 0 ) {
 $_SESSION['status_code']="Image is not proper";
 header("location:add_exam_admin.php");
} else {
$temp = explode('.', $img_file);
$file_extension = end($temp);
 $ext = strtolower($file_extension);
 if ( !in_array($ext, $validExt) )  {
    
    $_SESSION['status_code']="Not A Valid Image File";
    header("location:add_exam_admin.php");
 } else {
      $filePath = $folderName. rand(10000, 990000). '_'. date("his").'.'.$ext;
     
     if (move_uploaded_file($_FILES["e_time_table"]["tmp_name"],$filePath)) {

        $query="INSERT INTO exam_student(exam_name,exam_year,exam_time_table) VALUES ('$exam_name','$exam_year','$filePath')";
         
         $sql = mysqli_query($conn,$query); 
         if($sql){
             //echo "insert";
             $_SESSION['status']="Data Is Send To Database";
             $_SESSION['status_code']="success";
            header("location:add_exam_admin.php");
         }
        else{
          //   echo "Problem in saving to database";
          $_SESSION['status']="Data Is Not Send To Database";
        $_SESSION['status_code']="error";
            header("location:add_exam_admin.php");
           
        }
         
     } else {
       //   echo "Problem in uploading file";
       $_SESSION['status']="Problem in uploading file";
       $_SESSION['status_code']="error";
         header("location:add_exam_admin.php");
        
     }
     
 }
}

/********file upload end****************************************/
} 



/************************insert notice data in database*********************************/

if (isset($_POST['i_notice'])) {
	

    $n_title=$_POST['n_title'];
    $n_details=$_POST['n_details'];
    $n_posted=$_POST['n_posted'];
    $n_date=$_POST['n_date'];
   

/********file upload start***************************/

$img_file = $_FILES["n_poster"]["name"];
$img_file;
$folderName="notice_poster/";
$validExt = array("jpg", "png", "jpeg", "bmp", "gif","txt");

if ($img_file == "") {

$_SESSION['status_code']="Attach an image";
header("location:add_notice_admin.php");
} elseif ($_FILES["n_poster"]["size"] <= 0 ) {

$_SESSION['status_code']="Image is not proper";
header("location:add_notice_admin.php");

} else {
$temp = explode('.', $img_file);
$file_extension = end($temp);
 $ext = strtolower($file_extension);
 if ( !in_array($ext, $validExt) )  {
   
    $_SESSION['status_code']="Not A Valid Image File";
    header("location:add_notice_admin.php");
 } else {
      $filePath = $folderName. rand(10000, 990000). '_'. date("his").'.'.$ext;
     
     if (move_uploaded_file($_FILES["n_poster"]["tmp_name"],$filePath)) {

        $query="INSERT INTO notice(notice_title,notice_details,notice_posted_by,notice_poster,notice_date)
        VALUES ('$n_title','$n_details','$n_posted','$filePath','$n_date')";
         
         $sql = mysqli_query($conn,$query); 
         if($sql){
            //  echo "insert";
            $_SESSION['status']="Data Is Send To Database";
            $_SESSION['status_code']="success";
            header("location:add_notice_admin.php");
         }
        else{
            // echo "Problem in saving to database";
            $_SESSION['status']="Data Is Not Send To Database";
            $_SESSION['status_code']="error";
            header("location:add_notice_admin.php");
            
        }
         
     } else {
        //  echo "Problem in uploading file";
        $_SESSION['status']="Problem in uploading file";
        $_SESSION['status_code']="error";
         header("location:add_notice_admin.php");
      
     }
 }
}
/********file upload end****************************************/
} 


/*************************************insert parent data in database*******************************************/

if (isset($_POST['insert_p'])) {
	

    $firstname=$_POST['f_name'];
    $lastname=$_POST['l_name'];
    $address=$_POST['address'];
    $email=$_POST['e_mail'];
    $mobile=$_POST['phone'];
    $gender=$_POST['gender'];
    $occupation=$_POST['occupation'];
    $birthday=$_POST['dob'];
    $age=$_POST['age'];
    $bgroup=$_POST['b_group'];
    $password=$_POST['lock'];

/********file upload start***************************/

$img_file = $_FILES["p_photo"]["name"];
$img_file;
$folderName="profile_photo_parent/";
$validExt = array("jpg", "png", "jpeg", "bmp", "gif","txt");

if ($img_file == "") {

$_SESSION['status_code']="Attach an image";
header("location:add_parent_admin.php");
} elseif ($_FILES["p_photo"]["size"] <= 0 ) {

$_SESSION['status_code']="Image is not proper";
header("location:add_parent_admin.php");
} else {
$temp = explode('.', $img_file);
$file_extension = end($temp);
 $ext = strtolower($file_extension);
 if ( !in_array($ext, $validExt) )  {
   
    $_SESSION['status_code']="Not A Valid Image File";
    header("location:add_parent_admin.php");
 } else {
      $filePath = $folderName. rand(10000, 990000). '_'. date("his").'.'.$ext;
     
     if (move_uploaded_file($_FILES["p_photo"]["tmp_name"],$filePath)) {

        $query="INSERT INTO parent(p_first_name,p_last_name,gender_p,occupation,dob_p,age_p,blood_group_p,e_mail_p,address_p,phone_p,profiles_photo_p,password_p)
        VALUES ('$firstname','$lastname','$gender',' $occupation','$birthday','$age','$bgroup','$email','$address','$mobile','$filePath','$password')";
         
         $sql = mysqli_query($conn,$query); 
         if($sql){
            //  echo "insert";
            $_SESSION['status']="Data Is Send To Database";
            $_SESSION['status_code']="success";
            header("location:add_parent_admin.php");
         }
        else{
          //   echo "Problem in saving to database";
         
          $_SESSION['status']="Data Is Not Send To Database";
          $_SESSION['status_code']="error";
            header("location:add_parent_admin.php");
          
        }
         
     } else {
       //   echo "Problem in uploading file";
       $_SESSION['status']="Problem in uploading file";
       $_SESSION['status_code']="error";
         header("location:add_parent_admin.php");
        
     }
     
 }
}

/********file upload end****************************************/
} 



/*************************************insert student data in database*******************************************/

if (isset($_POST['i_student'])) {
	

    $firstname=$_POST['s_f_name'];
    $lastname=$_POST['s_l_name'];
    $address=$_POST['s_address'];
    $roll=$_POST['s_roll'];
    $email=$_POST['s_email'];
    $mobile=$_POST['s_phone'];
    $gender=$_POST['s_gender'];
    $parent=$_POST['s_parent'];
    
     $class_n=$_POST['s_class'];
    $religion=$_POST['s_religion'];
    $birthday= $_POST['s_birth'];
   
    
    $age=$_POST['s_age'];
    $bgroup=$_POST['s_blood'];
    $password=$_POST['s_password'];

/********file upload start***************************/

$img_file = $_FILES["s_profile_photo"]["name"];
$img_file;
$folderName="profile_photo_student/";
$validExt = array("jpg", "png", "jpeg", "bmp", "gif","txt");

if ($img_file == "") {

    $_SESSION['status_code']="Attach an image";
    header("location:add_student_admin.php");
} elseif ($_FILES["s_profile_photo"]["size"] <= 0 ) {

    $_SESSION['status_code']="Image is not proper";
    header("location:add_student_admin.php");
 
} else {
$temp = explode('.', $img_file);
$file_extension = end($temp);
 $ext = strtolower($file_extension);
 if ( !in_array($ext, $validExt) )  {
   
    $_SESSION['status_code']="Not A Valid Image File";
    header("location:add_student_admin.php");
    
 } else {
      $filePath = $folderName. rand(10000, 990000). '_'. date("his").'.'.$ext;
     
     if (move_uploaded_file($_FILES["s_profile_photo"]["tmp_name"],$filePath)) {

        $querys="INSERT INTO student(first_name,last_name,address_s,roll_no,gender_s,age_s,dob_s,password_s,blood_group_s,phone_s,e_mail_s,religion_s,profile_photo_s,class_id,parent_id)
        VALUES ('$firstname','$lastname','$address',' $roll','$gender','$age','$birthday','$password','$bgroup','$mobile','$email','$religion','$filePath','$class_n','$parent')";
         
         $sql = mysqli_query($conn,$querys); 
         if($sql){
             // echo "insert";
             $_SESSION['status']="Data Is Send To Database";
             $_SESSION['status_code']="success";
           header("location:add_student_admin.php");
            
           
         }
        else{
          //   echo "Problem in saving to database";
               $_SESSION['status']="Data Is Not Send To Database";
               $_SESSION['status_code']="error";
              header("location:add_student_admin.php");
        }
         
     } else {
       //   echo "Problem in uploading file";
       $_SESSION['status']="Problem in uploading file";
       $_SESSION['status_code']="error";
         header("location:add_student_admin.php");
      
     }
     
 }
}

/********file upload end****************************************/
} 



/*************************************insert subject data in database*******************************************/

if(isset($_POST['sub_insert'])){

    $subject_name=$_POST['sub_name'];
    $class_name=$_POST['sub_class'];
    $query_subject="select * from class where class_id='$class_name'";
    $result_sub=mysqli_query($conn,$query_subject);
    $row_su=mysqli_fetch_array($result_sub);
    $class_id=$row_su['class_id'];
    
   

     $query="insert into subject(subject_name,class_id)values('$subject_name','$class_id')";
    
    $result=mysqli_query($conn,$query);
   
    if($result){
        // echo "insert";
        $_SESSION['status']="Data Is Send To Database";
        $_SESSION['status_code']="success";
        header("location:add_subject_admin.php");
    }
    else{
        // echo "not insert successfully";
       
        $_SESSION['status']="Data Is Not Send To Database";
        $_SESSION['status_code']="error";
        header("location:add_subject_admin.php");
        
    }
  

}


/*************************************insert teacher data in database*******************************************/


if (isset($_POST['i_teacher'])) {
	

    $firstname=$_POST['t_f_name'];
    $lastname=$_POST['t_l_name'];
    $address=$_POST['t_address'];
    $tsubject=$_POST['t_subject'];
    $query_teacher="select * from subject where subject_id='$tsubject'";
    $result_p=mysqli_query($conn,$query_teacher);
     while($rows=mysqli_fetch_array($result_p)){
          $subject_name=$rows['subject_name'];
          $subject_id=$rows['subject_id'];
     }
    $email=$_POST['t_email'];
    $mobile=$_POST['t_phone'];
    $gender=$_POST['t_gender'];
    $qulification=$_POST['t_qualification'];
    $exp=$_POST['t_experience'];
    $religion=$_POST['t_religion'];
    $birthday=$_POST['t_birthday'];
    $age=$_POST['t_age'];
    $password=$_POST['t_password'];

/********file upload start***************************/

$img_file = $_FILES["t_profile_photo"]["name"];
$img_file;
$folderName="profile_photo_teacher/";
$validExt = array("jpg", "png", "jpeg", "bmp", "gif","txt");

if ($img_file == "") {

$_SESSION['status_code']="Attach an image";
header("location:add_teacher_admin.php");
} elseif ($_FILES["t_profile_photo"]["size"] <= 0 ) {

$_SESSION['status_code']="Image is not proper";
header("location:add_teacher_admin.php");
 
} else {
$temp = explode('.', $img_file);
$file_extension = end($temp);
 $ext = strtolower($file_extension);
 if ( !in_array($ext, $validExt) )  {
   
    $_SESSION['status_code']="Not A Valid Image File";
    header("location:add_teacher_admin.php");
    
 } else {
      $filePath = $folderName. rand(10000, 990000). '_'. date("his").'.'.$ext;
     
     if (move_uploaded_file($_FILES["t_profile_photo"]["tmp_name"],$filePath)) {

        $querys="INSERT INTO teacher(t_f_name,t_l_name,address_t,phone_t,e_mail_t,gender_t,qualification_t,experience_t,
        dob_t,age_t,password_t,religion_t,profile_photo_t,subject_id) VALUES ('$firstname','$lastname','$address','$mobile',
        '$email','$gender','$qulification','$exp','$birthday','$age','$password','$religion','$filePath','$tsubject')";
         
         $sql = mysqli_query($conn,$querys); 
         if($sql){
            //  echo "insert";
            $_SESSION['status']="Data Is Send To Database";
            $_SESSION['status_code']="success";
            header("location:add_teacher_admin.php");
           
         }
        else{
            // echo "Problem in saving to database";
           
            $_SESSION['status']="Data Is Not Send To Database";
            $_SESSION['status_code']="error";
            header("location:add_teacher_admin.php");
           
        }
         
     } else {
        //  echo "Problem in uploading file";
        $_SESSION['status']="Problem in uploading file";
        $_SESSION['status_code']="error";
         header("location:add_teacher_admin.php");
         
     }
     
 }
}

/********file upload end****************************************/
} 

?>