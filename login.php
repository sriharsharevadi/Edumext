<?php
     if(isset($_GET['login'])){ 
      $redis = new Redis(); 
    $redis->connect('127.0.0.1', 6379); 

      $users=$_GET["user"];
     $login= $_GET["login"];
     if ($login== $redis->get("user_login_".$users)){
      $redis->hset("Test_user_id_".$users, "verified",1);
      
echo "Successfully registered";
     };
   };

               
  

 if(isset($_GET['username'])){ 
session_start();


    $redis = new Redis(); 
    $redis->connect('127.0.0.1', 6379); 
    

       $username = $_GET["username"]; 
        $password = $_GET["password"]; 
        $users= $redis-> get (Test_users);
        for($x=1;$x<$users;$x++){
               if($username==$redis-> hget ("Test_user_id_".$x, username)){
              break;
               }
        }
        if($username==$redis-> hget ("Test_user_id_".$x, username) && $password==$redis-> hget ("Test_user_id_".$x, password)){

          if ($redis->hget("Test_user_id_".$x, "verified")==1){
                    
          //$login=rand(100000,999999);
    $_SESSION['loggedin'] = true;
    $_SESSION['usernumber'] = $x;

         //$redis-> set ("Test_user_id ".$x." login", $login);
         //$redis-> expire ("Test_user_id ".$x." login", 600);
        echo header("Location:index.php");
        }
        else $mail++;
       

} else $y++;


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edunext</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->  
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->  
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
            Account Login
          </span>
          
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>

          <div class="container-login100-form-btn m-t-20">
            <button class="login100-form-btn">
              Sign in
            </button>
          </div>
          <div class="text-center p-t-20 p-b-2 ">
            <span class="txt1" style="color:red;">
          <?php 
            if(isset($_GET['username'])){ 
                             if ($mail==1){
              echo "Check your email";
            };

              if ($y==1){
                 echo "Username/Password incorrect";
                  };
                }
                  ?>
                  </span>
                  </div>
          


          <div class="text-center p-t-45 p-b-4 ">
            <span class="txt1">
              Forgot
            </span>

            <a href="reset.php" class="txt2 hov1">
              Username / Password?
            </a>
          </div>

          <div class="text-center">
            <span class="txt1">
              Create an account?
            </span>

            <a href="register.php" class="txt2 hov1">
              Sign up
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