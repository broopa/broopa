<?php

$to = "ian@broopa.com";
$from = $_POST['email']; 
$fromSanitized = filter_var($from, FILTER_SANITIZE_EMAIL);
$name = htmlspecialchars($_POST['name']);
$cleanname = htmlspecialchars($name);
$subject = "Form Submission from Broopa";
$message = $name . " wrote the following:" . "\n\n" . htmlspecialchars($_POST['project_name']) . htmlspecialchars($_POST['project_desc']) . "Please contact me back at:" . $fromSanitized;

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "website@broopa.com";
  $mail->Password   = "PASSWORD_HIDDEN";

  $mail->IsHTML(true);
  $mail->AddAddress($to);
  $mail->SetFrom($fromSanitized, $name);
  $mail->AddReplyTo($fromSanitized, $name);
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    header("Location: /error.html");
  } else {
    header("Location: /thank_you.html");;
  }
?>