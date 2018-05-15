<?php
require_once 'sso_handler.php';

$sso_handler = new SSOHandler("Vi6m4JhPnGmgsiPeeIxEDhwLISe2LMVp1HX2aiYs"," 8yuBrHtBDObWsJkULQ0PlKkrILpTpadU8slKUo2QGo5aEMiayYaZdpECeZ5fSQIWFFLxBr5Y2QHEtaQDaSYVqQbLChVpetaHCvYZldti7rx80OqceCz6esTpmdV2YvT2");
$response_type=code;
$state=some_state;
$permissions="basic profile ldap program";
$url = $sso_handler->gen_auth_url($response_type, $state, $permissions);
echo '<a href="'.$url.'">Sign In</a>';

//response_type=code&scope=basic&redirect_uri=REDIRECT_URI&state=some_state
?>