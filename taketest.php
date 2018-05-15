<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ;
   else echo header("Location:/../");
   $x=$_SESSION['usernumber'];
   $ans=$_SESSION[answer];
   $sub=$_GET[sub];
   $id=$_GET[id];
   $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379);
   /*$Test_id=$redis->get(Total_tests);
            $gen=$redis->get(General_knowledge);
            $mat=$redis->get(Maths);
            $phy=$redis->get(Physics);
            $chem=$redis->get(Chemistry);*/
            if ($sub=="General knowledge") {
                            $sub=1;
                            $y++;
};
if ($sub=="Maths") {
                            $sub=2;
                            $y++;

};
if ($sub=="Physics") {
                            $sub=3;                            
                            $y++;
};
if ($sub=="Chemistry") {
                            $sub=4;
                             $y++;

};
    if ($sub==1){
        $subject= Gen;
    };
    if ($sub==2){
        $subject= Maths;
    };
    if ($sub==3){
        $subject= Physics;
    };
    if ($sub==4){
        $subject= Chemistry;
    };
    


   for ($i=1; $i <=5 ; $i++) { 


};

/*
$questions->$question=$redis->hget($subject."_".$id, $question);
$questions->$option_1 =$redis->hget($subject."_".$id,$option_1);
$questions->$option_2 =$redis->hget($subject."_".$id,$option_2);
$questions->$option_3=$redis->hget($subject."_".$id, $option_3);
$questions->$option_4=$redis->hget($subject."_".$id, $option_4);
$questions->$answer =$redis->hget($subject."_".$id, $answer);
};
$questionsJSON = json_encode($questions);
//echo $questionsJSON;
*/





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

        <link rel="stylesheet" type="text/css" href="css/style.css" />
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
                        
                        
                        <li >
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


    <div id="page-wrap">
        <h4 style="text-align: center;"><?php echo$subject ?></h1>
        <form action="grade.php?sub=<?php echo $sub; ?>&id=<?php echo $id; ?>" method="post" id="quiz">
            <ol style='color:purple;'>
                <div>
                    <?php
                        //var questions= '<?php echo $questionsJSON; ?';
                        //var obj = JSON.parse( questions);
                           //document.getElementById("demo").innerHTML = questions;
                        //var y ="", i;
                        for ($i=1; $i<=5; $i++) {

                            $question=$i._question;  
$option_1=$i._option_1;
$option_2=$i._option_2;
$option_3=$i._option_3;
$option_4=$i._option_4;
$answer=$i._answer;
$$question=$redis->hget($subject."_".$id, $question);
$$option_1 =$redis->hget($subject."_".$id,$option_1);
$$option_2 =$redis->hget($subject."_".$id,$option_2);
$$option_3=$redis->hget($subject."_".$id, $option_3);
$$option_4=$redis->hget($subject."_".$id, $option_4);
$$answer =$redis->hget($subject."_".$id, $answer);
                            //var x ="", j,k=1;
                            for ($j=1; $j<=1; $j++) {
                                echo "<li><h3 >".$$question."</h3>";
                                    for ($k=1; $k<=4; $k++) {
                                        $option=option_.$k;

                                if ($y==0) {
                                   
                               
                                       
                        echo "<div>    <input type='radio' name='".$i."_question' value='".$k."'/> ".$$$option."</div>";                                     
                                    };
                            
                                 if ($y==1) {
                                    if ($k==$$answer) {
                                         echo "<div style='color: green'><b>".$$$option."</b></div>";  
                                    } else
                                                              
                        echo "<div>".$$$option."</div>";                                     
                                    };
                                };
                    
                
                                         
                                     
                                 echo "</li>";
                                };
                    
                         };
                            //echo $answer;


                         ?>

                      

                    </div>
             </ol>
            
            <input style="text-align: center;margin: 0 0 0 250px" type="submit" value="Submit Quiz" />

        
        </form>
    
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
