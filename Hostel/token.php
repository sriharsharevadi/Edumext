<?php

if (isset($_GET[access_token])) {
  $access_token= $_GET[access_token];
	
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
    //echo $access_token;
};
?>

