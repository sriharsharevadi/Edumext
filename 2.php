<?php
 $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
   //echo $redis->get(name);
   
$login=$_GET["login"];
$x=$_GET["x"];
//echo $username;
//echo $password;
//echo $redis-> get ("Test_user_id ".$x." login");
  //echo $login;
  if ($login==$redis-> get ("Test_user_id ".$x." login") && $x!=0) ;
  else echo header("Location:/../1.php");

?>
<!DOCTYPE html>
<html>
<body>

<h1>Welcome <?php echo $redis-> hget ("Test_user_id ".$x, username); ?> </h1>

   
1. Which scientist discovered the radioactive element radium?

 <form method="GET" action="">
  <input type="radio" name="1" value="-1"> Isaac Newton
  <input type="radio" name="1" value="-1"> Albert Einstein
  <input type="radio" name="1" value="-1"> Benjamin Franklin
  <input type="radio" name="1" value="4"> Marie Curie
  
  </br>
  </br>
2. Plants receive their nutrients mainly from
</br>
  <input type="radio" name="2" value="-1"> chlorophyll
  <input type="radio" name="2" value="-1"> atmosphere
  <input type="radio" name="2" value="-1"> light
  <input type="radio" name="2" value="4"> soil
</br>
  </br>

3. Tajmahal is on the banks of  
</br>
<input type="radio" name="3" value="-1"> Ganges
  <input type="radio" name="3" value="4"> Jamuna
  <input type="radio" name="3" value="-1"> Tapti
  <input type="radio" name="3" value="-1"> Cauvery
  </br>

  </br>
  4. Which is the Land of the Rising Sun?  
</br>
 <input type="radio" name="4" value="4"> Japan
  <input type="radio" name="4" value="-1"> Australia
  <input type="radio" name="4" value="-1"> Taiwan
  <input type="radio" name="4" value="-1"> China
  </br>
</br>
  5. The largest ocean in the world is  
</br>
 <input type="radio" name="5" value="4"> The Pacific Ocean 
  <input type="radio" name="5" value="-1"> The Indian Ocean
  <input type="radio" name="5" value="-1"> The Antarctic Ocean
  <input type="radio" name="5" value="-1"> The Atlantic Ocean


  </br>
  </br>
  <input type='hidden' name='x' value='<?php echo "$x";?>'>
  <input type="submit" name="submit" value="submit" >
</form>
<?php
if(isset($_GET['1'])){ 
$Q1=$_GET["1"];
$Q2=$_GET["2"];
$Q3=$_GET["3"];
$Q4=$_GET["4"];
$Q5=$_GET["5"];
$correct=0;
$incorrect=0;
for ($i=1; $i <6 ; $i++) { 
	$z="Q".$i;
	if ($$z==4) { $correct++;};
	if ($$z==-1){ $incorrect++;};
	};

$Final= $Q1+$Q2+$Q3+$Q4+$Q5;
echo "Number of correct answers: ".$correct.'<br />';
echo "Number of incorrect answers: ".$incorrect.'<br />';
echo "Marks secured: ".$Final;
$redis-> hset ("Test_user_id ".$x, marks, $Final);
};
 ?>
</body>
</html>