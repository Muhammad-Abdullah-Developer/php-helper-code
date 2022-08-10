<?php 

    namespace App\Core;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    class Mail{

        function __construct() {

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
            
        }

    }

?>