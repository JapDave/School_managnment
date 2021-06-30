<?php
session_start();
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['reset_password'])){

$e_mails=$_POST['email'];
$_SESSION['mail']=$e_mails;
    $userquery="select * from admin_login where e_mails='$e_mails'";
    $resultquery=mysqli_query($conn,$userquery);
       $emailcount=mysqli_num_rows($resultquery);
if($emailcount > 0){


  $userdata=mysqli_fetch_array($resultquery);
      $username=$userdata['username'];
      $otp=rand(100000,99999999);
      $_SESSION['otp'] =$otp;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


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
    $mail->addAddress($e_mails);     //Add a recipient
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
                      <img src="..\Admin\assets\img\logo.png" alt="image">
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
    //echo 'Message has been sent';
    header("location:reset_password_admin.php");
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $_SESSION['msg']= "Email sending failed...";
    header("location:forget_password_admin.php");
}
}
else{
  // echo "no email found";
  $_SESSION['msg']="No Email Found";    
   header("location:forget_password_admin.php");
}
}
?>
