<?php
/*if(isset($open) && $open){
  ob_start();
  //do what it is supposed to do
}
else {
  header("HTTP/1.1 403 Forbidden");
  exit;
}*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';


function sendOnHoldMail($email, $remarks, $lname, $fname, $mname, $office){

  $mail = new PHPMailer(true);

  $body ="<p>Dear $lname, $fname $mname,</p>
  <p>Greetings of Peace!</p>
  <p>Your request for an Exit Clearance has been set to ON HOLD.</p>
  <p>The department of the $office has given the remarks of '$remarks'.</p>
  <p>Please resolve the issue immediately before your request expires due to unmet requirements.</p>
  <p><b>This is an auto generated email please do not reply.</b></p>
  <p>Thank you and stay safe.</p>";
  try {
    //Server settings
    //Server settings
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;
     $mail->isSMTP();
     $mail->Host       = 'smtp.gmail.com';     //platform
     $mail->SMTPAuth   = true;
     $mail->Username   = 'ceumlsecle@gmail.com';   //email
     $mail->Password   = 'afjrtcvmtfbbpzhp';                                //password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
     $mail->Port       = 587;

     //Recipients
     $mail->setFrom('ceumlsecle@gmail.com');       //sender
     $mail->addAddress($email);

     //Content
     $mail->isHTML(true);
     $mail->Subject = 'Exit Clearance On Hold';
     $mail->Body    = $body;             //content

     $mail->SMTPDebug  = SMTP::DEBUG_OFF;
     $mail->send();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}


