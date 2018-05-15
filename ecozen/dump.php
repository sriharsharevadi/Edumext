<?php
 $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
/*echo "Connected successfully";
   if (isset($_POST['name'])) {
  	echo $_POST['name'];
  	# code...
  }

 
  $n=1;

 echo implode(" ", $redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_1'.$n.':*->Time_stamp',
    'limit' => array("0", "100"),
    'get' =>'Ecofr_1'.$n.':*->Temp_1')));


  echo $redis-> hget ('Ecofr_1:1','Time_stamp');
  */
?>
<html>
 <head>
 </head>
 <body>

 <form method="POST" action="">

 <input type="text" name="name"  >
 <input type="submit" name="submit">
 <select>
<option>Ecofrost</option>
<option>Ecotron</option>
</select><br>

 

 
 </form>
 <?php if (isset($_POST['submit'])) {
    echo htmlentities($_POST['name']);
    
  }
    ?>
 <?php  //$redis-> set(harsha, $_POST['name']) ?>

</body>
</html>