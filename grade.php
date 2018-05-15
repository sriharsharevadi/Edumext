<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ;
   else echo header("Location:/login.php");
   $x=$_SESSION['usernumber'];
   $sub=$_GET[sub];
   $id=$_GET[id];
   $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379);
   /*$Test_id=$redis->get(Total_tests);
            $gen=$redis->get(General_knowledge);
            $mat=$redis->get(Maths);
            $phy=$redis->get(Physics);
            $chem=$redis->get(Chemistry);*/
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
    




$answer_1 =$redis->hget($subject."_".$id, "1_answer");
$answer_2 =$redis->hget($subject."_".$id, "2_answer");
$answer_3 =$redis->hget($subject."_".$id, "3_answer");
$answer_4 =$redis->hget($subject."_".$id, "4_answer");
$answer_5 =$redis->hget($subject."_".$id, "5_answer");






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


	<div id="page-wrap">

        <h4 style="text-align: center;">RESULT</h1>
		
        <?php
        $marks=0;
            $answer1 = $_POST["1_question"];
            $answer2 = $_POST["2_question"];
            $answer3 = $_POST["3_question"];
            $answer4 = $_POST["4_question"];
            $answer5 = $_POST["5_question"];
            //$answer5= hii;
            for ($i=1; $i <=5 ; $i++) { 
                $a=answer.$i;
                $b=answer_.$i;  
                
                                //echo $$b;


                if (isset($$a)){
                    $attempted++;
                if ( $$a==$$b){
                
                        $marks=$marks+4;
                $corrected++;
                    
                }
                else $marks=$marks-1;





            };
        };
            
            $incorrect= $attempted-$corrected;
            
            echo "<div >Total marks obtained=".$marks."</div>";
            echo "<div >Total questions attempted=".$attempted."</div>";
            echo "<div >Total questions correct=".$corrected."</div>";
            echo "<div >Total questions incorrect=".$incorrect."</div>";
$tests=$redis->hget(user_.$x,tests);
if ($tests==0){
    $tests=1;
};
if ($subject=="Gen") {
    $subject="General knowledge";
};
for ($i=1; $i <=$tests ; $i++) {
    $sub_1=$redis->hget("user_".$x, $i."_sub" );
    $id_1=$redis->hget("user_".$x, $i."_id" );
    if ($subject==$sub_1 && $id==$id_1) {
        $tests=$i;
        $new_test++;
        # code...
    }

};


$redis->hmset("user_".$x, array(
      $tests."_sub" => $subject,
      $tests."_id" => $id, 
      $tests."_marks"    =>  $marks,
      $tests."_date" => date(" d-m-Y")

      )
      );
if ($new_test==0 ){
$tests++;
$redis->hset(user_.$x,tests,$tests);

};





            
        ?>
	
	</div>
	
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-68528-29");
	pageTracker._initData();
	pageTracker._trackPageview();
	</script>

</body>

</html>