<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
 if(isset($_GET['username'])){  
 	$redis = new Redis(); 
    $redis->connect('127.0.0.1', 6379); 
      $username = $_GET["username"]; 
      $password = $_GET["password"]; 
      $email=$_GET["email"];
      $users= $redis-> get (Test_users);
      if ($users==0){$users=1;};

        $y=0;
       for($x=1;$x<$users;$x++){
               if($username==$redis-> hget ("Test_user_id_".$x, username)){
              $y++;
              break;
               }
             };
               if ($y==0){
                $login=rand(10000000,99999999);
                $redis->set("user_login_".$users, $login);
                $redis->expire("user_login_".$users);
//Mail


$mail = new PHPMailer(true);                              
try {
    $mail->SMTPDebug = 0;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp-auth.iitb.ac.in';
    $mail->AuthType = 'LOGIN';
    $mail->SMTPAuth = true;                               
    $mail->Username = '15b030028';                 
    $mail->Password = 'Harsha@908';  
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 25;
    /*$mail->Host = 'smtp.gmail.com';
    $mail->Username = 'rsriharsha22@gmail.com';                 
    $mail->Password = 'r16101968';
    
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;*/                                    

    //Recipients
    $mail->setFrom('edunext@info.in', 'Edunext');
    $mail->addAddress($email, $username);     
    //$mail->addAddress('ellen@example.com');               
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Edunext';
    $mail->Body    = 'Thanks for signing up in Edunext.Please click on the following link for verification. http://sriharsha.ga/login.php?user='.$users.'&login='.$login.' This link is valid for only 24 hours.';
    //$mail->AltBody = 'What are you doing susnata';

    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
   // echo 'Message could not be sent.';
   // echo 'Mailer Error: ' . $mail->ErrorInfo;
}
    $redis->hmset("Test_user_id_".$users, array(
      "username" => $username,
      "password" => $password, 
      "email"    =>  $email
      )
      );



      $users++;
      $redis-> set ("Test_users",$users);
   }
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edunext</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
        <form class="login100-form validate-form">
          <span class="login100-form-title p-b-33">
            Register
          </span>

          <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="wrap-input100 rs1 validate-input" >
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>
          <div class="wrap-input100 rs1 validate-input" >
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>
          <div class="container-login100-form-btn m-t-20">
            <button class="login100-form-btn">
              Sign up
            </button>
          </div>

          <div class="text-center p-t-45 p-b-4">
            <span class="txt1">
              <?php 
                if ($y==1){ 
                  echo "Username already exists";
                }
                ?>
            </span>

            <a href="#" class="txt2 hov1">
              <?php 
                if ($y==1){ 
                  echo "Forgot Password";
                }
                ?>

            </a>
          </div>

          <div class="text-center">
            <span class="txt1">
              <?php 
              if(isset($_GET['username'])){ 
                if ($y==0){ 
                  echo "Activate your account by verifying your Email";
                };
              }
                ?>

            <a href="/../1.php" class="txt2 hov1">
              <?php 
              if(isset($_GET['username'])){ 
                if ($y==0){ 
                  echo "Sign in";
                };
              }
                ?>
              
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>
