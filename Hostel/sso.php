<?php
session_start();
if (isset($_GET["code"])) {

$code=$_GET["code"];


$redirect_uri="http://10.3.160.142/Hostel/sso.php";


$credentials =  "Vi6m4JhPnGmgsiPeeIxEDhwLISe2LMVp1HX2aiYs:8yuBrHtBDObWsJkULQ0PlKkrILpTpadU8slKUo2QGo5aEMiayYaZdpECeZ5fSQIWFFLxBr5Y2QHEtaQDaSYVqQbLChVpetaHCvYZldti7rx80OqceCz6esTpmdV2YvT2" ;

    $curl_request = curl_init();
    curl_setopt($curl_request, CURLOPT_URL, "https://gymkhana.iitb.ac.in/sso/oauth/token/");
    curl_setopt($curl_request, CURLOPT_USERPWD, $credentials);
    curl_setopt($curl_request, CURLOPT_POST, 1);
    curl_setopt($curl_request, CURLOPT_POSTFIELDS, http_build_query(
    array(
      'code' => $code,
      'grant_type' => 'authorization_code',
      'redirect_uri' => $redirect_uri,
    )));
    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl_request);
    curl_close ($curl_request);
    $obj = json_decode($response);
    //echo $obj->{'refresh_token'};
        $refresh_token =$obj->{'refresh_token'};

    //$access_token=$obj->{'refresh_token'};
    //echo header("Location:refresh.php?access_token=".$access_token);
    // $refresh_token= $_GET[access_token];

//$redirect_uri="http://10.3.160.93/Hostel/sso.php";


$credentials =  "Vi6m4JhPnGmgsiPeeIxEDhwLISe2LMVp1HX2aiYs:8yuBrHtBDObWsJkULQ0PlKkrILpTpadU8slKUo2QGo5aEMiayYaZdpECeZ5fSQIWFFLxBr5Y2QHEtaQDaSYVqQbLChVpetaHCvYZldti7rx80OqceCz6esTpmdV2YvT2" ;

    $curl_request = curl_init();
    curl_setopt($curl_request, CURLOPT_URL, "https://gymkhana.iitb.ac.in/sso/oauth/token/");
    curl_setopt($curl_request, CURLOPT_USERPWD, $credentials);
    curl_setopt($curl_request, CURLOPT_POST, 1);
    curl_setopt($curl_request, CURLOPT_POSTFIELDS, http_build_query(
    array(
      
      'refresh_token' => $refresh_token,
      'grant_type' => 'refresh_token',
    )));
    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl_request);
    curl_close ($curl_request);
   // echo $response;
    $obj = json_decode($response);
   // echo $obj->{'access_token'};
    $access_token=$obj->{'access_token'};
    $curl_request = curl_init();
    curl_setopt($curl_request, CURLOPT_URL, "https://gymkhana.iitb.ac.in/sso/user/api/user/?fields=first_name,last_name,roll_number,email");
    //curl_setopt($curl_request, CURLOPT_USERPWD, $credentials);
     curl_setopt($curl_request, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'Authorization: Bearer '.$access_token));

    /*curl_setopt($curl_request, CURLOPT_POST, 1);
    curl_setopt($curl_request, CURLOPT_POSTFIELDS, http_build_query(
    array(
      'token' => $access_token,
      'client_id' => 'Vi6m4JhPnGmgsiPeeIxEDhwLISe2LMVp1HX2aiYs',
      'client_secret' => '8yuBrHtBDObWsJkULQ0PlKkrILpTpadU8slKUo2QGo5aEMiayYaZdpECeZ5fSQIWFFLxBr5Y2QHEtaQDaSYVqQbLChVpetaHCvYZldti7rx80OqceCz6esTpmdV2YvT2',
      'token_type_hint' => 'access_token',

    )));*/
    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl_request);
    curl_close ($curl_request);
    echo $response;
        $obj = json_decode($response);
    $_SESSION["roll_number"]=$obj->{'roll_number'};
        $_SESSION["first_name"]=$obj->{'first_name'};
    $_SESSION["last_name"]=$obj->{'last_name'};
    $_SESSION["email"]=$obj->{'email'};
        $_SESSION["id"]=$obj->{'id'};

         $curl_request = curl_init();
    curl_setopt($curl_request, CURLOPT_URL, "https://gymkhana.iitb.ac.in/sso/oauth/revoke_token/");
    curl_setopt($curl_request, CURLOPT_USERPWD, $credentials);
    curl_setopt($curl_request, CURLOPT_POST, 1);
    curl_setopt($curl_request, CURLOPT_POSTFIELDS, http_build_query(
    array(
      
      'token' => $access_token,
      'client_id' => 'Vi6m4JhPnGmgsiPeeIxEDhwLISe2LMVp1HX2aiYs',
      'client_secret' => '8yuBrHtBDObWsJkULQ0PlKkrILpTpadU8slKUo2QGo5aEMiayYaZdpECeZ5fSQIWFFLxBr5Y2QHEtaQDaSYVqQbLChVpetaHCvYZldti7rx80OqceCz6esTpmdV2YvT2',
      'token_type_hint' => 'access_token',
    )));
    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl_request);
    curl_close ($curl_request);



        echo header("Location:3.php");




};



    
    





?>
