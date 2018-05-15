<?php
session_start();
if (isset($_SESSION["roll_number"])){
 $roll_number=$_SESSION["roll_number"];
       $first_name= $_SESSION["first_name"];
    $last_name=$_SESSION["last_name"];
    $email=$_SESSION["email"];
        $id=$_SESSION["id"];



}; 
print_r($_SESSION);

echo $_SESSION["roll_number"];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<script type="application/javascript">

        new SSO_JS({
            config: {
                client_id: 'your-long-client-id',   // Compulsory
                scope: ['basic', 'profile'],    // Optional. Default is  ['basic']
                state: '', // Optional. Default None
                response_type: 'code',  // Optional. Default is 'code'
                redirect_uri: 'uri-for-redirection',    //Optional
                new_window: 'false',    // Optional.
                                        // Where authorization page should be opened in new tab or
                                        // same tab Default is false.
                sso_root: document.getElementById('sso-root'),
                /* Optional
                 document.getElementById don't work if your element is not in light DOM. In that case you need to
                 provide selector here. In most of the cases this will work.
                 */
            },
            colors: { // All Optional
                button_div_bg_color: '303F9F', // Background color of button
                button_anchor_color: 'FFFFFF', // Font color of Button
                logout_anchor_color: '727272', // Font color of logout mark (The one with 'Login as other user'
            },
        }).init();

    </script>
    </body>
</html>