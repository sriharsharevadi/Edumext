<?php
 $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
//echo "Connected successfully";
$n=$_GET['name'];

/*
$someArray=$redis->sort ('Ecofr_12', array(
    'by' => 'Ecofr_12:*->Time_stamp',
    'limit' => array("0", "100"),
    'get' =>'Ecofr_12:*->Temp_1'));*/
//$someJSON = json_encode($someArray);
//echo $someJSON;
    $day=$_GET['day'];
    $hour=$_GET['hour'];

    $time= $day*24*60-$hour*60-720;

    $k=60;
//$redis->select(15);

$someArray_1=$redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_'.$n.':*->Time_stamp',
    'limit' => array($time, $k),
    'get' =>'Ecofr_'.$n.':*->Temp_1'));
$someArray_2=$redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_'.$n.':*->Time_stamp',
    'limit' => array($time,$k),
    'get' =>'Ecofr_'.$n.':*->Set_point'));
$someArray_3=$redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_'.$n.':*->Time_stamp',
    'limit' => array($time, $k),
    'get' =>'Ecofr_'.$n.':*->Humidity'));
$someArray_4=$redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_'.$n.':*->Time_stamp',
    'limit' => array($time, $k),
    'get' =>'Ecofr_'.$n.':*->TES1'));
$someArray_5=$redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_'.$n.':*->Time_stamp',
    'limit' => array($time, $k),
    'get' =>'Ecofr_'.$n.':*->TES2'));
$someArray_6=$redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_'.$n.':*->Time_stamp',
    'limit' => array($time, $k),
    'get' =>'Ecofr_'.$n.':*->Power'));
$someArray_7=$redis->sort ('Ecofr_'.$n, array(
    'by' => 'Ecofr_'.$n.':*->Time_stamp',
    'limit' => array($time, $k),
    'get' =>'Ecofr_'.$n.':*->Battery'));



$data = array(
	'data_1' => $someArray_1,
			'data_2' => $someArray_2,
			'data_3' => $someArray_3,
			'data_4' => $someArray_4,
			'data_5' => $someArray_5,
			'data_6' => $someArray_6,
			'data_7' => $someArray_7,);
echo json_encode($data,JSON_NUMERIC_CHECK);

?>
