<?php
session_start();
include "connection.php";


/*****************************************************delete class data from database**********************************************/
if(isset($_GET['class_id'])){
$id=$_GET['class_id']; 
 $querry = "delete from class where class_id=$id"; 
$sql=mysqli_query($conn,$querry);

if ($sql)
 {
	 
	  //echo "record del successfully";
     $_SESSION['status']="Data Is Deleted";
     $_SESSION['status_code']="success";
	header('location:display_class_admin.php');
 
 }
 else
 {
	 
	// echo "record not del successfully";
   $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
      header('location:display_class_admin.php');


 }

}


/*****************************************************delete exam data from database**********************************************/

if(isset($_GET['exam_id'])){


    $id=$_GET['exam_id'];
     $querry = "delete from exam_student where exam_id=$id";
    $sql=mysqli_query($conn,$querry);
    
    if ($sql)
     {
         
        //  echo "record del successfully";
        $_SESSION['status']="Data Is Deleted";
     $_SESSION['status_code']="success";
        header('location:display_exam_admin.php');
     
     }
     else
     {
         
        //  echo "record not del successfully";
        $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
         header('location:display_exam_admin.php');
     
    
     }
    }

 /*****************************************************delete message data from database**********************************************/

 if(isset($_GET['message_id'])){

    $id=$_GET['message_id'];
     $querry = "delete from message where message_id=$id";
    $sql=mysqli_query($conn,$querry);
    
    if ($sql)
     {
         
        //  echo "record del successfully";
        $_SESSION['status']="Data Is Deleted";
        $_SESSION['status_code']="success";
        header('location:display_message_admin.php');
     
     }
     else
     {
         
        //  echo "record not del successfully";
        $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
         header('location:display_message_admin.php');
    
     }
    
    }elseif(isset($_GET['message_p_id'])){

      $pid=$_GET['message_p_id'];
      $querry = "delete from message where message_id=$pid";
     $sql=mysqli_query($conn,$querry);
     
     if ($sql)
      {
          
         //  echo "record del successfully";
         $_SESSION['status']="Data Is Deleted";
         $_SESSION['status_code']="success";
         header('location:display_message_admin.php');
      
      }
      else
      {
          
         //  echo "record not del successfully";
         $_SESSION['status']="Data Is Not Deleted";
                 $_SESSION['status_code']="error";
          header('location:display_message_admin.php');
     
      }

    }elseif(isset($_GET['message_t_id'])){
      $tid=$_GET['message_t_id'];
      $querry = "delete from message where message_id=$tid";
     $sql=mysqli_query($conn,$querry);
     
     if ($sql)
      {
          
         //  echo "record del successfully";
         $_SESSION['status']="Data Is Deleted";
         $_SESSION['status_code']="success";
         header('location:display_message_admin.php');
      
      }
      else
      {
          
         //  echo "record not del successfully";
         $_SESSION['status']="Data Is Not Deleted";
                 $_SESSION['status_code']="error";
          header('location:display_message_admin.php');
     
      }
    }

     /*****************************************************delete notice data from database**********************************************/

     if(isset($_GET['notice_id'])){


        $id=$_GET['notice_id'];
         $querry = "delete from notice where notice_id=$id";
        $sql=mysqli_query($conn,$querry);
        
        if ($sql)
         {
             
            //  echo "record del successfully";
            $_SESSION['status']="Data Is Deleted";
            $_SESSION['status_code']="success";
            header('location:display_notice_admin.php');
         
         }
         else
         {
             
            //  echo "record not del successfully";
            $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
             header('location:display_notice_admin.php');
        
         }
        
        }

   /*****************************************************delete parent data from database**********************************************/

   if(isset($_GET['parent_id'])){


    $id=$_GET['parent_id'];
     $querry = "delete from parent where parent_id=$id";
    $sql=mysqli_query($conn,$querry);
    
    if ($sql)
     {
         
        //  echo "record del successfully";
        $_SESSION['status']="Data Is Deleted";
     $_SESSION['status_code']="success";
        header('location:display_parent_admin.php');
     
     }
     else
     {
         
        //  echo "record not del successfully";
        $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
         header('location:display_parent_admin.php');
         
    
     }
    }

   /*****************************************************delete student data from database**********************************************/

   if(isset($_GET['student_id'])){


    $id=$_GET['student_id'];
     $querry = "delete from student where student_id=$id";
    $sql=mysqli_query($conn,$querry);
    
    if ($sql)
     {
         
        //  echo "record del successfully";
        $_SESSION['status']="Data Is Deleted";
     $_SESSION['status_code']="success";
        header('location:display_student_admin.php');
     
     }
     else
     {
         
        //  echo "record not del successfully";
        $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
         header('location:display_student_admin.php');
        
    
     }
    }
    

 /*****************************************************delete subject data from database**********************************************/


    if(isset($_GET['subject_id'])){


        $id=$_GET['subject_id'];
         $querry = "delete from subject where subject_id=$id";
        $sql=mysqli_query($conn,$querry);
        
        if ($sql)
         {
             
            //  echo "record del successfully";
            $_SESSION['status']="Data Is Deleted";
     $_SESSION['status_code']="success";
            header('location:display_subject_admin.php');
         
         }
         else
         {
             
            //  echo "record not del successfully";
            $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
             header('location:display_subject_admin.php');
            
        
         }
        }

        /*****************************************************delete teacher data from database**********************************************/

        if(isset($_GET['teacher_id'])){


            $id=$_GET['teacher_id'];
             $querry = "delete from teacher where teacher_id=$id";
            $sql=mysqli_query($conn,$querry);
            
            if ($sql)
             {
                 
                //  echo "record del successfully";
                $_SESSION['status']="Data Is Deleted";
                 $_SESSION['status_code']="success";
                header('location:display_teacher_admin.php');
             
             }
             else
             {
                 
                //  echo "record not del successfully";
                $_SESSION['status']="Data Is Not Deleted";
                $_SESSION['status_code']="error";
                 header('location:display_teacher_admin.php');
                 
            
             }
            
            }

             /*****************************************************delete class teacher data from database**********************************************/
            //  if(isset($_GET['class_teacher_id'])){


            //    $id=$_GET['class_teacher_id'];
            //     $querry = "delete from class_teacher where class_teacher_id=$id";
            //    $sql=mysqli_query($conn,$querry);
               
            //    if ($sql)
            //     {
                    
            //        //  echo "record del successfully";
            //        header('location:display_class_teacher_admin.php');
                
            //     }
            //     else
            //     {
                    
            //        //  echo "record not del successfully";
            //         header('location:display_class_teacher_admin.php');
                    
               
            //     }
               
            //    }

?>