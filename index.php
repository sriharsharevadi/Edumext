<?php
session_start();
//$_SESSION[answer]="hello";


 $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
    #verification of login
//$login=$_GET["login"];
   //$x=$_GET["x"];
   $x=$_SESSION['usernumber'];
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ;
        else echo header("Location:/login.php");
            $gen=$redis->get(General_knowledge);
            $mat=$redis->get(Maths);
            $phy=$redis->get(Physics);
            $chem=$redis->get(Chemistry);


  /* {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    echo "Please log in first to see this page.";
};

//echo $username;
//echo $password;
//echo $redis-> get ("Test_user_id ".$x." login");
  //echo $login;
  if ($login==$redis-> get ("Test_user_id ".$x." login") && $x!=0) ;
        //else echo header("Location:/../1.php");*/

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
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href='css/google-apis.css' rel='stylesheet' type='text/css'>
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
                <li class="active">
                    <a href="index.php">
                        <i class="pe-7s-pen"></i>
                        <p>Tests</p>
                    </a>
                </li>
                
                <li>
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
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
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
                                <h4 class="title">General Knowledge</h4>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="gn">

                                    
                                </table>

                                <script >
                                    var gen= '<?php echo $gen; ?>';
                                    var x ="", i;
                                     x=x+ `<thead>
                                                <th>Test ID</th>
                                                <th>No. of questions</th>
                                                <th>Max Marks</th>
                                                <th>Created by</th>
                                            </thead>`;
           for (var i = 1 ; i < gen; i++) {
                            
                                  x=x+ `  <tbody>
                                        <tr>
                                            <td>`+i+`</td>
                                            <td>5</td>
                                            <td>20</td>
                                            <td>Harsha</td>
                                            <td ><a href='taketest.php?sub=1&id=`+i+`'><button style='text-decoration: none;color: black;'>Take Test</button></a></td>
                                        </tr>
                                        
                                    </tbody>`;
                                };
                document.getElementById("gn").innerHTML = x;








                                </script>

                            </div>
                        </div>
                    </div>
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Maths</h4>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="Maths">

                                    
                                </table>

                                <script >
                                    var mat= '<?php echo $mat; ?>';
                                    var x ="", i;
                                     x=x+ `<thead>
                                                <th>Test ID</th>
                                                <th>No. of questions</th>
                                                <th>Max Marks</th>
                                                <th>Created by</th>
                                            </thead>`;
           for (var i = 1 ; i < mat; i++) {
                            
                                  x=x+ `  <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>5</td>
                                            <td>20</td>
                                            <td>Harsha</td>
                                            <td ><a href='taketest.php?sub=2&id=`+i+`'><button style='text-decoration: none;color: black;'>Take Test</button></a></td>
                                        </tr>
                                        
                                    </tbody>`;
                                };
                document.getElementById("Maths").innerHTML = x;








                                </script>

                            </div>
                        </div>
                    </div>
<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Physics</h4>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="Physics">

                                    
                                </table>

                                <script >
                                    var phy= '<?php echo $phy; ?>';
                                    var x ="", i;
                                     x=x+ `<thead>
                                                <th>Test ID</th>
                                                <th>No. of questions</th>
                                                <th>Max Marks</th>
                                                <th>Created by</th>
                                            </thead>`;
           for (var i = 1 ; i < phy; i++) {
                            
                                  x=x+ `  <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>5</td>
                                            <td>20</td>
                                            <td>Harsha</td>
                                            <td ><a href='taketest.php?sub=3&id=`+i+`'><button style='text-decoration: none;color: black;'>Take Test</button></a></td>
                                        </tr>
                                        
                                    </tbody>`;
                                };
                document.getElementById("Physics").innerHTML = x;








                                </script>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Chemistry</h4>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="Chemistry">

                                    
                                </table>

                                <script >
                                    var chem= '<?php echo $chem; ?>';
                                    var x ="", i;
                                     x=x+ `<thead>
                                                <th>Test ID</th>
                                                <th>No. of questions</th>
                                                <th>Max Marks</th>
                                                <th>Created by</th>
                                            </thead>`;
           for (var i = 1 ; i < chem; i++) {
                            
                                  x=x+ `  <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>5</td>
                                            <td>20</td>
                                            <td>Harsha</td>
                                            <td ><a href='taketest.php?sub=4&id=`+i+`'><button style='text-decoration: none;color: black;'>Take Test</button></a></td>
                                        </tr>
                                        
                                    </tbody>`;
                                };
                document.getElementById("Chemistry").innerHTML = x;








                                </script>

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

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome to <b>Edunext</b> - Take your free test."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>

</html>
