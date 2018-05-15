<?php
 if(isset($_GET['username'])){  
  $redis = new Redis(); 
    $redis->connect('127.0.0.1', 6379); 
      $username = $_GET["username"]; 
      $password = $_GET["password"]; 
      $password_1=$_GET["password_1"];
      $users= $redis-> get (Test_users);
        $y=0;
       for($x=1;$x<$users;$x++){
               if($username==$redis-> hget ("Test_user_id_".$x, username)){
              $y++;
              break;
               };
             };
               
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edunext</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            Reset Password
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
            <input class="input100" type="password" name="password_1" placeholder="Re-enter Password">
            <span class="focus-input100-1"></span>
            <span class="focus-input100-2"></span>
          </div>
          <div class="container-login100-form-btn m-t-20">
            <button class="login100-form-btn">
              Reset
            </button>
          </div>

          <div class="text-center p-t-45 p-b-4">


            
            <span class="txt1">
              <?php 
              if(isset($_GET['username'])){ 
                if ($password!=$password_1){ 
                  echo "Passwords doesn't match.";
                  $y=$y+2;

                };
              }
                ?>
              
            </a>
          </div>
          <div class="text-center">
            <span class="txt1">
            <?php 
            if(isset($_GET['username'])){ 
              if ($y==0){
                 echo "username doesn't exists. Try";
                  };
                }
                  ?>

            </span>

            <a href=4.php class="txt2 hov1">
              <?php 
              if(isset($_GET['username'])){ 
                if ($y==0){ 
                  echo "Sign up";
                };
              }
                ?>

            </a>
          </div>
          <div class="text-center">
            <span class="txt1">
            <?php 
            if(isset($_GET['username'])){ 
              $redis = new Redis(); 
    $redis->connect('127.0.0.1', 6379); 
              if ($y==1){
                $redis->hset("Test_user_id_".$x, password, $password);

                 echo "Password updated successfully.";
                  };
                }
                  ?>

            </span>



            <a href="/../1.php" class="txt2 hov1">
              <?php 
              if(isset($_GET['username'])){ 
                if ($y==1){ 
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