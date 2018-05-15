<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ;
   else echo header("Location:/login.php");
   $x=$_SESSION['usernumber'];
   $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
    #verification of login
//$login=$_GET["login"];
   //$x=$_GET["x"];
      if(isset($_POST['1question'])){ 
            $Test_id=$redis->get(Total_tests);
            $gen=$redis->get(General_knowledge);
            $mat=$redis->get(Maths);
            $phy=$redis->get(Physics);
            $chem=$redis->get(Chemistry);
            if ($Test_id==0){$Test_id=1;};
            $subject=$_POST["subject"];
            if ($subject==1){
                if($gen==0){$gen=1;};
                 $question_id=1;
            for ($i=1; $i <=5 ; $i++) { 
                            /*
                            $question=$i."questio";
                            $option_1=$i.option_1;
                            $option_2=$i.option_2;
                            $option_3=$i.option_3;
                            $option_4=$i.option_4;
                            $answer=$i.answer;*/
                            $question=$_POST[$i."question"];
                            $option_1=$_POST[$i."1"];
                            $option_2=$_POST[$i."2"];
                            $option_3=$_POST[$i."3"];
                            $option_4=$_POST[$i."4"];
                            $answer=$_POST["option".$i];
                                

                             $redis->hmset("Gen_".$gen, array(
                                        $question_id."_question" => $question,
                                        $question_id."_option_1" => $option_1, 
                                        $question_id."_option_2" => $option_2,
                                        $question_id."_option_3"=> $option_3,
                                        $question_id."_option_4"=> $option_4,
                                        $question_id."_answer"   => $answer,
                                        "question_id" => $question_id,
                                        )
                                  );
                             $question_id++;
            };
             echo "successfully added";
                $gen++;
                 $redis->set(General_knowledge,$gen);
            };
            if ($subject==2){
                if($mat==0){$mat=1;};
                     $question_id=1;
            for ($i=1; $i <=5 ; $i++) { 
                            /*
                            $question=$i."questio";
                            $option_1=$i.option_1;
                            $option_2=$i.option_2;
                            $option_3=$i.option_3;
                            $option_4=$i.option_4;
                            $answer=$i.answer;*/
                            $question=$_POST[$i."question"];
                            $option_1=$_POST[$i."1"];
                            $option_2=$_POST[$i."2"];
                            $option_3=$_POST[$i."3"];
                            $option_4=$_POST[$i."4"];
                            $answer=$_POST["option".$i];
                                

                             $redis->hmset("Maths_".$mat, array(
                                        $question_id."_question" => $question,
                                        $question_id."_option_1" => $option_1, 
                                        $question_id."_option_2" => $option_2,
                                        $question_id."_option_3"=> $option_3,
                                        $question_id."_option_4"=> $option_4,
                                        $question_id."_answer"   => $answer,
                                        "question_id" => $question_id,
                                        )
                                  );
                             $question_id++;
            };
             echo "successfully added";
                $mat++;
                                 $redis->set(Maths,$mat);

            };
            if ($subject==3){
                if($phy==0){$phy=1;};
                     $question_id=1;
            for ($i=1; $i <=5 ; $i++) { 
                            /*
                            $question=$i."questio";
                            $option_1=$i.option_1;
                            $option_2=$i.option_2;
                            $option_3=$i.option_3;
                            $option_4=$i.option_4;
                            $answer=$i.answer;*/
                            $question=$_POST[$i."question"];
                            $option_1=$_POST[$i."1"];
                            $option_2=$_POST[$i."2"];
                            $option_3=$_POST[$i."3"];
                            $option_4=$_POST[$i."4"];
                            $answer=$_POST["option".$i];
                                

                             $redis->hmset("Physics_".$phy, array(
                                        $question_id."_question" => $question,
                                        $question_id."_option_1" => $option_1, 
                                        $question_id."_option_2" => $option_2,
                                        $question_id."_option_3"=> $option_3,
                                        $question_id."_option_4"=> $option_4,
                                        $question_id."_answer"   => $answer,
                                        "question_id" => $question_id,
                                        )
                                  );
                             $question_id++;
            };
             echo "successfully added";
                $phy++;
                $redis->set(Physics,$phy);

            };
            if ($subject==4){
                if($chem==0){$chem=1;};
                     $question_id=1;
            for ($i=1; $i <=5 ; $i++) { 
                            /*
                            $question=$i."questio";
                            $option_1=$i.option_1;
                            $option_2=$i.option_2;
                            $option_3=$i.option_3;
                            $option_4=$i.option_4;
                            $answer=$i.answer;*/
                            $question=$_POST[$i."question"];
                            $option_1=$_POST[$i."1"];
                            $option_2=$_POST[$i."2"];
                            $option_3=$_POST[$i."3"];
                            $option_4=$_POST[$i."4"];
                            $answer=$_POST["option".$i];
                                

                             $redis->hmset("Chemistry_".$chem, array(
                                        $question_id."_question" => $question,
                                        $question_id."_option_1" => $option_1, 
                                        $question_id."_option_2" => $option_2,
                                        $question_id."_option_3"=> $option_3,
                                        $question_id."_option_4"=> $option_4,
                                        $question_id."_answer"   => $answer,
                                        "question_id" => $question_id,
                                        )
                                  );
                             $question_id++;
            };
             echo "successfully added";
                $chem++;
                 $redis->set(Chemistry,$chem);

            };
            

};
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                
                <li >
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
                 <li class="active" >
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
<div style="margin-left: 30px; margin-top: 20px; max-width:600px">        
  <form method="post" action="">
  Please select the subject
  <select name="subject" >
    <option value="1">General Knowledge</option>
    <option value="2">Maths</option>
    <option value="3">Physics</option>
    <option value="4">Chemistry</option>
  </select>
    <div  id="test" ></div>
    <script>               
       var x ="", i
       for (i=1; i<=5; i++) {
                   x = x+" <br><div>"+i+"</div><textarea name='"+i+"question' style='width:800px; height:25px; display:inline;' placeholder='Question'  ;    ></textarea> <br>"+
                  "<div>";
                              for (var j = 1; j<= 4; j++) {
                                  x = x+ "<input type='radio' name='option"+i+"' value="+j+">"+
                                  "<input class='input100' type='text' name="+i+j+" placeholder='option "+j+"'><br></div>";
                                                          };           
                            };
        x=x+"<div style='text-align: center;'><input type='submit' name='submit' value='submit' ></div>";
        document.getElementById("test").innerHTML = x;
    </script>
  </form>
</div>
       <footer class="footer">
            <div  class="container-fluid">
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
