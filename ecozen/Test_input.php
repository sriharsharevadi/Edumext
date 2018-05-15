<?php 
   
   $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
   


//$redis->select(1);
for($y=1; $y<=100; $y++){
  $k= rand(20,200)/10;
  $k_1=rand(0,95);

for ($x = 14000; $x >0; $x--) {
		$d=mktime(13, 00-$x, 00, 12, 29, 2017);
		$A01= rand($k*100,$k*100+50)/100;
		$A02= rand($k_1,$k_1+5);
		$A03= rand(1,5);
		$A04= rand(15,30);
		$A05= rand($k*100,$k*100+50)/100;  
		$key = "Ecofr_".$y.":".$x;
		$redis->hmset($key, array(
			"Time_stamp" => $x,
			"Temp_1" => $A01, 
			"Time" => date("d-m-Y h:i:s", $d),
			"TES1" => $A01,
			"TES2" => $A05,
			"Set_point" => $k,
			"Humidity" => $A02,
			"Power" => $A03,
			"Battery" => $A04
			)
		);

                $redis->zadd ("Ecofr_".$y , $x, $x); 

 
                          }
 			echo $y."\n";
               }




?>

