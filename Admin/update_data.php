<?php
session_start();
include "connection.php";

/*********************************updata class data in database**************************************************/
if(isset($_POST['e_class'])){


$classid=$_POST['class_hidden'];
$class=$_POST['e_class_name'];

$displayquery="update class set class='$class' where class_id='$classid'";
$result = mysqli_query($conn,$displayquery);
if($result){
    // echo "update successfully";
    $_SESSION['status']="Data Is Update In Database";
    $_SESSION['status_code']="success";
    header("location:display_class_admin.php");
}
else{
    // echo "update not"; 
   
    $_SESSION['status']="Data Is Not Update In Database";
    $_SESSION['status_code']="error";
    header("location:display_class_admin.php");
 
}

}


/*********************************updata class teacher data in database**************************************************/


if(isset($_POST['u_class_teacher'])){


    $c_t_id=$_POST['class_teacher_hidden'];
    $t_name=$_POST['c_t_name'];
    $c_name=$_POST['c_t_class'];
   
   $displayquery="update class_teacher set class_id='$c_name',teacher_id='$t_name' where class_teacher_id='$c_t_id'";
   $result = mysqli_query($conn,$displayquery);
  
   if($result){
       // echo "update successfully";
       $_SESSION['status']="Data Is Update In Database";
       $_SESSION['status_code']="success";
       header("location:display_class_teacher_admin.php");
   }
   else{
       // echo "update not"; 
       $_SESSION['status']="Data Is Not Update In Database";
       $_SESSION['status_code']="error";
      
       header("location:display_class_teacher_admin.php");
       
   }
   }


   /*********************************updata exam data in database**************************************************/
   if(isset($_POST['e_exam'])){


    $id= $_POST['exam_hidden'];
    
    $examname=$_POST['e_exam_name'];
    $examyear=$_POST['e_exam_year'];
    $exam_time_table=$_FILES['e_exam_time_table']['name'];
    $exam_old_tt=$_POST['exam_old'];


    /********file upload start***************************/
  if($exam_time_table != ''){
    $img_file = $_FILES["e_exam_time_table"]["name"];
   $folderName="exam_time_table/";
   $validExt = array("jpg", "png", "jpeg", "bmp", "gif","txt");
  
   if ($img_file == "") {
     
       echo "Attach an image";
   } elseif ($_FILES["e_exam_time_table"]["size"] <= 0 ) {
     
      echo "Image is not proper";
       
   } else {
      $temp = explode('.', $img_file);
      $file_extension = end($temp);
       $ext = strtolower($file_extension);
       if ( !in_array($ext, $validExt) )  {
          //  $msg = errorMessage( "Not a valid image file");
          echo "not a valid image file";
          
       } else {
            $filePath = $folderName. rand(10000, 990000). '_'. date("his").'.'.$ext;
           
           if (move_uploaded_file($_FILES["e_exam_time_table"]["tmp_name"],$filePath)) {
  
              $querys="update exam_student set exam_name='$examname',exam_year='$examyear', exam_time_table='$filePath' where exam_id='$id'";
               
               $sql = mysqli_query($conn,$querys); 
               if($sql){
                  //  echo "insert";
                  $_SESSION['status']="Image Data Is Updated";
                  $_SESSION['status_code']="success";
                 
                  header("location:display_exam_admin.php");
                 
               }
              else{
                 //  echo "Problem in saving to database";
                 $_SESSION['status']="Image Data Is Not Updated";
                 $_SESSION['status_code']="error";
                  header("location:display_exam_admin.php");
           
              }
               
           } else {
              //  echo "Problem in uploading file";
              $_SESSION['status']="Image Is Not Update In Database";
              $_SESSION['status_code']="error";
               header("location:display_exam_admin.php");
              
           } 
       }
    }
  }else{
    $update_filename = $exam_old_tt;
    $displayquery="update exam_student set exam_name='$examname',exam_year='$examyear', exam_time_table='$update_filename' where exam_id='$id'";
       $result = mysqli_query($conn,$displayquery);
       if($result){
       // echo "update successfully";
       $_SESSION['status']="Data Is Update In Database";
       $_SESSION['status_code']="success";
       header("location:display_exam_admin.php");
       }
       else{
       // echo "update not"; 
       $_SESSION['status']="Data Is Not Update In Database";
       $_SESSION['status_code']="error";
       header("location:display_exam_admin.php");
       }

  }
 
 }

 /********file upload end****************************************/




/*********************************updata notice data in database**************************************************/

if(isset($_POST['e_notice'])){


    $n_id=$_POST['notice_hidden'];
    $n_title=$_POST['e_title'];
    $n_details=$_POST['e_details'];
    $n_posted=$_POST['e_posted'];
    $n_date=$_POST['e_date'];
    $new_poster=$_FILES['e_poster']['name'];
    $old_poster=$_POST['notice_old'];

    if($new_poster != ''){
         
          $img_file = $_FILES["e_poster"]["name"];
         $folderName="notice_poster/";
        $validExt = array("jpg", "png", "jpeg", "bmp", "gif","txt");
          if ($img_file == "") {
            echo "Attach an image";
         } elseif ($_FILES["e_poster"]["size"] <= 0 ) {
      
               echo "Image is not proper";
                
            } else {
                 $temp = explode('.', $img_file);
                $file_extension = end($temp);
               $ext = strtolower($file_extension);
                 if ( !in_array($ext, $validExt) )  {
    
                     echo "not a valid image file";
                    
                 } else {
                     $filePath = $folderName. rand(10000, 990000). '_'. date("his").'.'.$ext;
                    
                     if (move_uploaded_file($_FILES["e_poster"]["tmp_name"],$filePath)) {
                        $query1="update notice set notice_title='$n_title',notice_details='$n_details',
                        notice_posted_by='$n_posted',notice_poster='$filePath',notice_date='$n_date' where notice_id='$n_id'";
                        $result1=mysqli_query($conn,$query1);
                            if($result1){
                                    //  echo "insert";
                                     $_SESSION['status']="New Update";
                                     $_SESSION['status_code']="success";
                                
                                    header("location:display_notice_admin.php");
                                
                                }
                            else{
                             //  echo "Problem in saving to database";
                                 $_SESSION['status']="New Is Not Update";
                                 $_SESSION['status_code']="error";
                                     header("location:display_notice_admin.php");
                            
                                 }
                     } else {
                        //  echo "Problem in uploading file";
                     $_SESSION['status']="Image Is Not Update In Database";
                         $_SESSION['status_code']="error";
                          header("location:display_notice_admin.php");
                        
                      }
                     }
                    } 

     }else{
         $update_filename = $old_poster;
         $displayquery="update notice set notice_title='$n_title',notice_details='$n_details',
         notice_posted_by='$n_posted',notice_poster='$update_filename',notice_date='$n_date' where notice_id='$n_id'";
            $result = mysqli_query($conn,$displayquery);
            if($result){
            // echo "update successfully";
            $_SESSION['status']="Data Is Update In Database";
            $_SESSION['status_code']="success";
            header("location:display_notice_admin.php");
            }
            else{
            // echo "update not"; 
            $_SESSION['status']="Data Is Not Update In Database";
            $_SESSION['status_code']="error";
            header("location:display_notice_admin.php");
            }
    }
   }


    /*********************************updata parent data in database**************************************************/

    if(isset($_POST['e_parent'])){


        $id= $_POST['parent_hidden'];
        
        $firstname=$_POST['e_p_f_name'];
        $lastname=$_POST['e_p_l_name'];
        $address=$_POST['e_p_address'];
        $occupation=$_POST['e_p_occupation'];
        $email=$_POST['e_p_email'];
        $mobile=$_POST['e_p_phone'];
        $gender=$_POST['e_p_gender'];
        $birthday=$_POST['e_p_birthday'];
        $age=$_POST['e_p_age'];
        $bgroup=$_POST['e_p_blood_group'];
        
 
 
    $query_update="update parent set p_first_name='$firstname',p_last_name='$lastname',gender_p='$gender',occupation='$occupation',dob_p='$birthday',
                   age_p='$age',blood_group_p='$bgroup',e_mail_p='$email',address_p='$address',phone_p='$mobile' where parent_id='$id'";
      $result_update=mysqli_query($conn,$query_update);
      if($result_update){
          
         //  echo "update successfully";
         $_SESSION['status']="Data Is Update In Database";
       $_SESSION['status_code']="success";
          header("location:display_parent_admin.php");
      }
      else{
         //  echo "update not successfully";
         $_SESSION['status']="Data Is Not Update In Database";
         $_SESSION['status_code']="error";
          header("location:display_parent_admin.php");
         
      }
     }


  /*********************************updata student data in database**************************************************/

  if(isset($_POST['e_student'])){


    $id= $_POST['student_hidden'];
      
      $firstname=$_POST['e_f_name'];
      $lastname=$_POST['e_l_name'];
      $address=$_POST['e_address'];
      $roll=$_POST['e_roll'];
      $email=$_POST['e_email'];
      $class_s=$_POST['s_class'];
      $mobile=$_POST['e_phone'];
      $gender=$_POST['e_gender'];
      $religion=$_POST['e_religion'];
      $birthday=$_POST['e_birthday'];
      $age=$_POST['e_age'];
      $bgroup=$_POST['e_blood_group'];
      


  $query_update="update student set first_name='$firstname',last_name='$lastname',address_s='$address',roll_no='$roll',gender_s='$gender',
                 age_s='$age',dob_s='$birthday',blood_group_s='$bgroup',phone_s='$mobile',e_mail_s='$email',religion_s='$religion',class_id='$class_s' where student_id='$id'";
    $result_update=mysqli_query($conn,$query_update);
    if($result_update){
        
       //  echo "update successfully";
       $_SESSION['status']="Data Is Update In Database";
       $_SESSION['status_code']="success";
        header("location:display_student_admin.php");
    }
    else{
       //  echo "update not successfully";
       
       $_SESSION['status']="Data Is Not Update In Database";
      $_SESSION['status_code']="error";
        header("location:update_student_admin.php");
      
    }
   }


  /*********************************updata student promotion data in database**************************************************/

  if(isset($_POST['i_student'])){


    $id= $_POST['student_promotion_hidden'];
    
    $c_class=$_POST['p_class'];
    $p_class=$_POST['p_p_class'];

$query_update="update student set class_id='$p_class' where class_id='$c_class'";
  $result_update=mysqli_query($conn,$query_update);
  if($result_update){
      
     //  echo "update successfully";
     $_SESSION['status']="Data Is Update In Database";
     $_SESSION['status_code']="success";
      header("location:student_promotion_admin.php");
     
  }
  else{
     //  echo "update not successfully";
     $_SESSION['status']="Data Is Not Update In Database";
     $_SESSION['status_code']="error";
      header("location:student_promotion_admin.php");
     
    
  }
 }   

  /*********************************updata subject data in database**************************************************/

  if(isset($_POST['e_subject'])){

    $s_id=$_POST['subject_hidden'];
    $s_name=$_POST['e_sub_name'];
    $s_class_name=$_POST['e_sub_class'];
    
    
    $displayquery="update subject set subject_name='$s_name',class_id='$s_class_name' where subject_id='$s_id'";
    $result = mysqli_query($conn,$displayquery);
    if($result){
        // echo "update successfully";
        $_SESSION['status']="Data Is Update In Database";
        $_SESSION['status_code']="success";
        header("location:display_subject_admin.php");
    }
    else{
        // echo "update not"; 
        $_SESSION['status']="Data Is Not Update In Database";
        $_SESSION['status_code']="error";
        header("location:update_subject_admin.php");
        
    }
    }
    
/*********************************updata teacher data in database**************************************************/

if(isset($_POST['e_teacher'])){

 
    $id= $_POST['teacher_hidden'];
    $firstname=$_POST['e_f_name'];
    $lastname=$_POST['e_l_name'];
    $address=$_POST['e_address'];
    $qualification=$_POST['e_qua'];
    $exp=$_POST['e_exp'];
    $ts=$_POST['e_subject'];
     $qts="select * from subject where subject_id='$ts'";
     $rts=mysqli_query($conn,$qts);
     while($row=mysqli_fetch_array($rts)){
         $subject_name=$row['subject_name'];
     }
    $email=$_POST['e_email'];
    $mobile=$_POST['e_phone'];
    $gender=$_POST['e_gender'];
    $religion=$_POST['e_religion'];
    $birthday=$_POST['e_birthday'];
    $age=$_POST['e_age'];
    


$query_update="update teacher set t_f_name='$firstname',t_l_name='$lastname',address_t='$address',phone_t='$mobile',e_mail_t='$email',
               gender_t='$gender',qualification_t='$qualification',experience_t='$exp',age_t='$age',
               dob_t='$birthday', religion_t='$religion',subject_id='$ts' where teacher_id='$id'";
  $result_update=mysqli_query($conn,$query_update);
  if($result_update){
      
     //  echo "update successfully";
     $_SESSION['status']="Data Is Update In Database";
       $_SESSION['status_code']="success";
      header("location:display_teacher_admin.php");
  }
  else{
     //  echo "update not successfully";
     $_SESSION['status']="Data Is Not Update In Database";
     $_SESSION['status_code']="error";
      header("location:display_teacher_admin.php");
     
  }
 }
?>