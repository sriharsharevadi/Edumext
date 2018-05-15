<?php
 session_start();

 $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
    #verification of login
//$login=$_GET["login"];
   //$x=$_GET["x"];
   
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ;
        else echo header("Location:/login.php");
           $x=$_SESSION['usernumber'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Edunext</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also addq an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Edunext
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="index.php">
                        <i class="pe-7s-pen"></i>
                        <p>Tests</p>
                    </a>
                </li>
                
                <li class="active">
                    <a href="results.php">
                        <i class="pe-7s-note2"></i>
                        <p>Results</p>
                    </a>
                </li>
                <li>
                
                <li>
                    <a href="answers.php">
                        <i class="pe-7s-notebook"></i>
                        <p>Answers</p>
                    </a>
                </li>
                 <li>
                    <a href="create.php">
                        <i class="pe-7s-note"></i>
                        <p>Create a Test</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Welcome<?php echo " ".$redis-> hget ("Test_user_id_".$x, username); ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                        
                        
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style='text-align: center;'>Results</h4>
                        
                            </div>
                            <div class="content table-responsive table-full-width">

                                <table class="table table-hover table-striped" >


                                
                                    
<?php  
$tests=$redis->hget("user_".$x,"tests");


 if ($tests==0){
            echo "<tbody>
                                        <tr><td style='text-align: center; ' >
                                        You have not taken any tests.
                                        </td>
                                        
                                                                                <td></td>
                                        
                                        </tr>
                                        
                                    </tbody>";
           }
           else{

      


                                 echo "<thead>
                                                <th>Subject</th>
                                                <th>Test ID</th>
                                                <th>Date</th>
                                                <th>Max Marks</th>
                                                <th>Marks Secured</th>
                                            </thead>"; 
           
           for ($i = 1 ; $i < $tests; $i++) {
                            $sub=$redis->hget("user_".$x, $i."_sub" );
                            $id=$redis->hget("user_".$x, $i."_id" );
                            $date=$redis->hget("user_".$x, $i."_date" );
                            $marks=$redis->hget("user_".$x, $i."_marks" );
                                  echo " <tbody>
                                        <tr>
                                            <td>".$sub."</td>                                                                 
                                            <td>".$id."</td>
                                            <td>".$date."</td>
                                            <td>20</td>
                                            <td>".$marks."</td>

                                        </tr>
                                        
                                    </tbody>";
                                };
                



};




        ?>
                                        </table>


                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
       <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.facebook.com/profile.php?id=100008218835753">Sri Harsha Revadi</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    

</html>
