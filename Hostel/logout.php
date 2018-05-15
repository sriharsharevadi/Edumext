<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<img src="https://gymkhana.iitb.ac.in/sso/account/logout/" />


</body>
</html>

<img src="https://gymkhana.iitb.ac.in/sso/account/logout/" />


<?php 
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session

$ch = curl_init("https://gymkhana.iitb.ac.in/sso/account/logout/");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);       
        curl_close($ch);


header("location:3.php");

//header("location:https://gymkhana.iitb.ac.in/sso/account/logout/?redirect_uri=http://10.3.160.93/Hostel/sso.php"); 
exit();
    ?>
    https://gymkhana.iitb.ac.in/sso/account/login/?next=%2Fsso%2Foauth%2Fauthorize%2F%3Fclient_id%3D12kyyuagNUZKvShtMrLQbvNBAa5dPUveMZq8iBbI%26scope%3Dbasic+profile+program%26redirect_uri%3Dhttp%3A%2F%2F127.0.0.1%3A8000%2Frebate%2Flogin%26response_type%3Dcode

    https://gymkhana.iitb.ac.in/sso/account/login/?next=/sso/oauth/authorize/%3Fclient_id%3DVi6m4JhPnGmgsiPeeIxEDhwLISe2LMVp1HX2aiYs%26response_type%3Dcode%26state%3Dsome_state%26scope%3Dbasic%2520profile%2520ldap%2520program
