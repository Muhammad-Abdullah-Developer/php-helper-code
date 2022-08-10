<?php 

    namespace App\Core;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    class Mail{

        function __construct(String $to, String $subject, String $emailTemplateAddress, String $from = "", String $fromName = "" , String $toName = "", $altBody = "") {

            try{

                $mail = new PHPMailer;
                //Enable SMTP debugging. 
                //$mail->SMTPDebug = 3;                               
                //Set PHPMailer to use SMTP.
                $mail->isSMTP();            
                //Set SMTP host name                          
                $mail->Host = getenv("SMTP_HOST");
                //Set this to true if SMTP host requires authentication to send email
                $mail->SMTPAuth = true;                          
                //Provide username and password     
                $mail->Username = getenv("USERNAME");                 
                $mail->Password = getenv("PASSWORD");                           
                //If SMTP requires TLS encryption then set it
                if(getenv("REQUIRES_ENCRYPTION")){
                    $mail->SMTPSecure = getenv("SMTPSECURE");                           
                }
    
                //Set TCP port to connect to 
                $mail->Port = getenv("PORT");                                   
                
                $mail->From = empty($from) ? getenv("DEFUALT_MAIL_ADDRESS"):$from;
                $mail->FromName = empty($fromName) ? getenv("DEFUALT_MAIL_ADDRESS"):$from;
                
                $mail->addAddress($to, $toName);
                //$mail->AddCC($varEmail,'');
                
                $mail->isHTML(true);
    
                $mail->Subject = $subject;
                $mail->Body = require_once $emailTemplateAddress;
                
                $mail->AltBody = $altBody;
                $mail->send();		
            }catch (Exception $e){
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                exit();
            }

        }

    }

?>