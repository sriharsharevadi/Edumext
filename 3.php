 
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp-auth.iitb.ac.in';
    $mail->AuthType = 'LOGIN';
  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '15b030028';                 // SMTP username
    $mail->Password = 'Harsha@908';  
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;
                       // SMTP password
    /*$mail->Host = 'smtp.gmail.com';
    $mail->Username = 'rsriharsha22@gmail.com';                 // SMTP username
    $mail->Password = 'r16101968';
    
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;*/                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('amrutha@dff.com', 'Amrutha');
    $mail->addAddress('anuragg2208@gmail.com', 'Anurag Gupta');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Hello Anurag';
    $mail->Body    = 'What are you doing';
    $mail->AltBody = 'What are you doing susnata';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
   // echo 'Message could not be sent.';
   // echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>