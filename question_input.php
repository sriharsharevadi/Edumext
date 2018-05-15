<?php
 $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 

if(isset($_POST['1question'])){ 
            $qp_id=$redis->get(Total_tests);
            #question adds to bottom
            //$question_id=$redis->hget("Test_".$qp_id, question_id);
            //$question_id++;
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
                            $answer=$_POST[$i."option"];
                            	

                             $redis->hmset("Test_".$qp_id, array(
                            			"question".$question_id => $question,
                            			"option_1".$question_id => $option_1, 
                            			"option_2".$question_id => $option_2,
                            			"option_3".$question_id => $option_3,
                            			"option_4".$question_id => $option_4,
                            			"answer".$question_id   => $answer,
                            			"question_id" => $question_id,
                            			)
                                  );
                             $question_id++;
            };
             echo "successfully added";

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form method="post" action="">
    <div id="test"></div>
    <script>               
       var x ="", i
       for (i=1; i<=5; i++) {
                   x = x+i+" Question:<br><textarea name='"+i+"question' style='width:800px; height:20px;''></textarea> <br>"+
                  "options:<div>";
                              for (var j = 1; j<= 4; j++) {
                                  x = x+ "<input type='radio' name='option' value="+j+">"+
                                  "<input class='input100' type='text' name="+i+j+" placeholder='option "+j+"'><br>";
                                                          };           
                            };
        x=x+"<input type='submit' name='submit' value='submit' >";
        document.getElementById("test").innerHTML = x;
    </script>
  </form>



</body>
</html>

