<?php

/*if (isset($_GET[access_token])) {
  $refresh_token= $_GET[access_token];

$redirect_uri="http://10.3.160.93/Hostel/sso.php";


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
    echo $response;
    $obj = json_decode($response);
    echo $obj->{'access_token'};
    $access_token=$obj->{'access_token'};
    echo header("Location:token.php?access_token=".$access_token);
};*/

echo curl_getinfo();
    ?>

