<?php


    
include 'config.php';
session_start();
require_once "PHPMailer/PHPMailerAutoload.php";
$a = $_SESSION['user_name'];
$b = $_SESSION['user_email'];


//==Email Process===================
    $mail = new PHPMailer;
    //Enable SMTP debugging. 
    //$mail->SMTPDebug = 3;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "aliyanmuhammad840@gmail.com";                 
    $mail->Password = "jbtpkwyqgvqastua";                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to 
    $mail->Port = 587;                                   
    
    $mail->From = "aliyanmuhammad840@gmail.com";
    $mail->FromName = "Project";
    
    $mail->addAddress($b, "Verification");
    //$mail->AddCC($varEmail,'');
    
    $mail->isHTML(true);
    
    $mail->Subject = "Email Verification - Project";
    $mail->Body = "<h1>$a</h1><p>It takes a Few seconds to verify <h1>$b</h1> Just click verify email link.</p> <a href='http://localhost/all/email_verify.php'>Verify Email</a>";
    
    $mail->AltBody = "This is the plain text version of the email content";
    $mail->send();		

 //==End Email Process===================
?>
<h1 style="text-align: center;">We have sent a verification link on your email. Please check your mail inbox and verify your email.</h1>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>