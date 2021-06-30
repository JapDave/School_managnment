<?php
session_start();
include "../Admin/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 /***************************insert student attendance data in database***************************/
         
      require '../PHPMailer/src/Exception.php';
      require '../PHPMailer/src/PHPMailer.php';
      require '../PHPMailer/src/SMTP.php';

      $date=date("Y-m-d");     
            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
      
            try {
                //Server settings
      
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ghorineel@gmail.com';                     //SMTP username
                $mail->Password   = 'ghori1732@';                               //SMTP password
                $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
                $mail->setFrom('ghorineel@gmail.com', 'SMS');
               
                $id2="select t1.*,t2.*,t3.* from student as t1 left join parent as t2 on t1.parent_id=t2.parent_id 
                      left join student_attendance as t3 on t1.student_id=t3.student_id  where attendance_status='absent' and s_a_date='$date'";
                $result2=mysqli_query($conn,$id2);
                if(mysqli_num_rows($result2)){
                 
                  while($row2=mysqli_fetch_array($result2)){
                    
                      $email=$row2['e_mail_p'];
                      
                      $mail->addAddress($email);
                    
                  }
                 
                    //$gmail=implode(",",$email);
                 
                 
                       //Add a recipient
                  $mail->addReplyTo('ghorineel@gmail.com', 'no-reply');
        
                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Attendance';
                  $mail->Body    = '<!DOCTYPE html>
                  <html lang="en">
                  <head>
                  </head>
                  <body>
                              <div>
                                <div style="padding-top: 20px;
                                padding-bottom: 20px; background-color:#F7F3F2;">
                                
                                    <div  style="text-align: center;">
                                    <h1 style="color:black;">SMS</h1>
                                    </div>
                                    <div>
                                        <h1 style="text-align: center; font-size: 30px;color: black; padding-top: 15px;">Attendance</h1> 
                                    </div>
                                    <div>
                                   
                                    
                                      <h1 style="text-align: center; font-size: 30px;color: Black; padding-top: 15px;">Hi,Sir <br>
                                      Your Son Is Absent Today '.$date.' </h1> 
                                  </div>
                                </div>
                              </div>   
                  </body>
                  </html>'; 
                                  
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
                  $mail->send();
                   //echo "mail send";
                  $_SESSION['status']="Mail has been sent";
                  $_SESSION['status_code']="success";
                  header("location:add_attendance_student_teacher.php");
                }
                //Recipients
              
            } catch (Exception $e) {
                //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                 echo "mail not send";
                $_SESSION['status']="Email sending failed...";
                $_SESSION['status_code']="error";
                header("location:add_attendance_student_teacher.php");
            }
          
            $_SESSION['status']="Attendance Taken";
            $_SESSION['status_code']="success";
  header("location:add_attendance_student_teacher.php");


?>