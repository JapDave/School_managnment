<?php
session_start();
include "../Admin/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$email=$_POST['e_mails'];
$_SESSION['mails']=$email;
if(isset($_POST['login_s']) && $_POST['user_types'] == "student")
{
 
    $userquery="select * from student where e_mail_s='$email'";
     $resultquery=mysqli_query($conn,$userquery);
      $emailcount=mysqli_num_rows($resultquery);
      if($emailcount){
  
        $userdata=mysqli_fetch_array($resultquery);
         $username=$userdata['first_name']." ".$userdata['last_name'];
          $otp=rand(100000,99999999);
          $_SESSION['otp'] =$otp;
          $_SESSION['user']=$userdata['e_mail_s'];
          
      require '../PHPMailer/src/Exception.php';
      require '../PHPMailer/src/PHPMailer.php';
      require '../PHPMailer/src/SMTP.php';


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

          //Recipients
          $mail->setFrom('ghorineel@gmail.com', 'SMS');
          $mail->addAddress($email);     //Add a recipient
          $mail->addReplyTo('ghorineel@gmail.com', 'no-reply');

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Reset Password';
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
                                <h1 style="text-align: center; font-size: 30px;color: black; padding-top: 15px;">Verify Your Login</h1> 
                            </div>
                            <div>
                            <h1  style="text-align:center; font-size: 19px;color: Black; padding-top: 15px;padding-right:85px;">Hi,'.$username.'</h1>
                              <h1 style="text-align: center; font-size: 15px;color: Black; padding-top: 15px;">Below Is Your One Time Passcode</h1> 
                          </div>
                          <div>
                            <h1 style="text-align: center; font-size: 50px;color: black; padding-top: 15px;">'.$otp.'</h1> 
                        </div>
                        </div>
                      </div>   
          </body>
          </html>';
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          $_SESSION['msgs']="Mail has been sent";
          header("location:otp_check_login.php");
      } catch (Exception $e) {
          //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          $_SESSION['msgs']= "Email sending failed...";
          header("location:forgot_password_user.php");
      }
        
  }else{
    $_SESSION['msgs']="Email Not Found";
    header("location:forgot_password_user.php");
  }

}else if(isset($_POST['login_s']) && $_POST['user_types'] == "parents")
	{
    $userquery="select * from parent where e_mail_p='$email'";
     $resultquery=mysqli_query($conn,$userquery);
      $emailcount=mysqli_num_rows($resultquery);
      if($emailcount){
  
        $userdata=mysqli_fetch_array($resultquery);
         $username=$userdata['p_first_name']." ".$userdata['p_last_name'];
          $otp=rand(100000,99999999);
          $_SESSION['otp'] =$otp;
          $_SESSION['userp']=$userdata['e_mail_p'];
          
      require '../PHPMailer/src/Exception.php';
      require '../PHPMailer/src/PHPMailer.php';
      require '../PHPMailer/src/SMTP.php';


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

          //Recipients
          $mail->setFrom('ghorineel@gmail.com', 'SMS');
          $mail->addAddress($email);     //Add a recipient
          $mail->addReplyTo('ghorineel@gmail.com', 'no-reply');

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Reset Password';
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
                                <h1 style="text-align: center; font-size: 30px;color: black; padding-top: 15px;">Verify Your Login</h1> 
                            </div>
                            <div>
                            <h1  style="text-align:center; font-size: 19px;color: Black; padding-top: 15px;padding-right:85px;">Hi,'.$username.'</h1>
                              <h1 style="text-align: center; font-size: 15px;color: Black; padding-top: 15px;">Below Is Your One Time Passcode</h1> 
                          </div>
                          <div>
                            <h1 style="text-align: center; font-size: 50px;color: black; padding-top: 15px;">'.$otp.'</h1> 
                        </div>
                        </div>
                      </div>   
          </body>
          </html>';
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          $_SESSION['msgs']="Mail has been sent";
          header("location:otp_check_login.php");
      } catch (Exception $e) {
          //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          $_SESSION['msgs']= "Email sending failed...";
          header("location:forgot_password_user.php");
      }
        
  }else{
    $_SESSION['msgs']="No Email Found";
    header("location:forgot_password_user.php");
  }
}else if(isset($_POST['login_s']) && $_POST['user_types'] == "teachers")
	{
    $userquery="select * from teacher where e_mail_t='$email'";
    $resultquery=mysqli_query($conn,$userquery);
     $emailcount=mysqli_num_rows($resultquery);
     if($emailcount){
 
       $userdata=mysqli_fetch_array($resultquery);
        $username=$userdata['t_f_name']." ".$userdata['t_l_name'];
         $otp=rand(100000,99999999);
         $_SESSION['otp'] =$otp;
         $_SESSION['usert']=$userdata['e_mail_t'];
         
     require '../PHPMailer/src/Exception.php';
     require '../PHPMailer/src/PHPMailer.php';
     require '../PHPMailer/src/SMTP.php';


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

         //Recipients
         $mail->setFrom('ghorineel@gmail.com', 'SMS');
         $mail->addAddress($email);     //Add a recipient
         $mail->addReplyTo('ghorineel@gmail.com', 'no-reply');

         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = 'Reset Password';
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
                               <h1 style="text-align: center; font-size: 30px;color: black; padding-top: 15px;">Verify Your Login</h1> 
                           </div>
                           <div>
                           <h1  style="text-align:center; font-size: 19px;color: Black; padding-top: 15px;padding-right:85px;">Hi,'.$username.'</h1>
                             <h1 style="text-align: center; font-size: 15px;color: Black; padding-top: 15px;">Below Is Your One Time Passcode</h1> 
                         </div>
                         <div>
                           <h1 style="text-align: center; font-size: 50px;color: black; padding-top: 15px;">'.$otp.'</h1> 
                       </div>
                       </div>
                     </div>   
         </body>
         </html>';
         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

         $mail->send();
         $_SESSION['msgs']="Mail has been sent";
         header("location:otp_check_login.php");
     } catch (Exception $e) {
         //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         $_SESSION['msgs']= "Email sending failed...";
         header("location:forgot_password_user.php");
     }
       
 }else{
  $_SESSION['msgs']="No Email Found";
  header("location:forgot_password_user.php");
 }
}else{
       
  $_SESSION['msgs']="Error";
  header("location:forgot_password_user.php");
}

?>