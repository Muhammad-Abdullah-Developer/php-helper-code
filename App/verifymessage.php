<?php

require "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Core\Flash;
use App\Core\Mail;



new Mail("muhabd0336@gmail.com", "Email verification", "emailtemplate.php");


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