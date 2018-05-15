<?php
session_start();
if (isset($_SESSION["roll_number"])){
 $roll_number=$_SESSION["roll_number"];
       $first_name= $_SESSION["first_name"];
    $last_name=$_SESSION["last_name"];
    $email=$_SESSION["email"];
        $id=$_SESSION["id"];
$resume=$_POST[resume];
$verify=$_POST[verify];

$servername = "localhost";
$username = "root";
$password = "sriharsha";
$dbname = "hostel3";


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";



$conn->query("CREATE TABLE IF NOT EXISTS student_details (
roll_number VARCHAR(30) NOT NULL primary key,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP,
    UNIQUE (roll_number)

);");

$sq = "CREATE TABLE IF NOT EXISTS resume_verification (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
roll_number VARCHAR(30) NOT NULL,
resume_point VARCHAR(2000) NOT NULL,
verified_by VARCHAR(30) NOT NULL,
time_of_inserting TIMESTAMP,
verification VARCHAR(5) ,
Comments VARCHAR(500),
time_of_verification VARCHAR(30)

)";
$conn->query($sq);






//inserting data'

$sql = "INSERT INTO student_details  (firstname, lastname, roll_number, email)
VALUES ('$first_name', '$last_name', '$roll_number', '$email')";
$conn->query($sql);



if (isset($resume)){

	$sql = "INSERT INTO resume_verification (roll_number, resume_point, verified_by)
VALUES ('$roll_number', '$resume', '$verify')";
	if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




//






}; 
$result= $conn->query("select resume_point,verified_by from resume_verification where roll_number='$roll_number'");

//echo $result;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Resume point:     " . $row["resume_point"]. "To be verified by:   ".$row["verified_by"]." <br>";


    }
} else {
    echo "0 results";
}
};

//echo $_SESSION["roll_number"];


//print_r($_SESSION);



?> 


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Navbar Menu Template</title>

        <!-- CSS -->        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400|Roboto:300,400,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

<body >




    
    	<!-- Top menu -->
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-left">
						
						<li><a class="btn btn-link-3" href= <?php if (isset($roll_number)){
						echo 'logout.php';
							//echo " https://gymkhana.iitb.ac.in/sso/account/logout/?next=http://10.3.160.142/Hostel/sso.php";
						} 
						else echo " https://gymkhana.iitb.ac.in/sso/account/logout/?next=http://10.3.160.142/Hostel/other.php";
						/*else echo " https://gymkhana.iitb.ac.in/sso/oauth/authorize/?client_id=Vi6m4JhPnGmgsiPeeIxEDhwLISe2LMVp1HX2aiYs&response_type=code&state=some_state&scope=basic%20profile%20ldap%20program&redirect_uri=http://10.3.160.142/Hostel/sso.php";*/
						?>>




						 <?php if (isset($roll_number)){
							echo $roll_number;
						} 
						else echo "sign in with sso";
						?>
						</a>

						 </li>
					</ul>
			</div>



<?php if (isset($roll_number)){
echo "<div>
<form method='post'>
  Resume points:<br>
  <textarea name='resume' rows='10' cols='30'>
</textarea>
  <br>
  Verification from:<br>
<select name='verify'>
    <option value='General Secretary'>General Secretary</option>
    <option value='Sports Councillor'>Sports Councillor</option>
    <option value='Cultural Councillor'>Cultural Councillor</option>
  </select>  <br><br>
  <input type='submit' value='submit'>
</form> 
</div>";
}
?>
</body>
</html>

		
    
    	
        
       