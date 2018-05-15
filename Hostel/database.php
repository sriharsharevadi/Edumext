<?php
session_start();
if (isset($_SESSION["roll_number"])){
 $roll_number=$_SESSION["roll_number"];
       $first_name= $_SESSION["first_name"];
    $last_name=$_SESSION["last_name"];
    $email=$_SESSION["email"];
        $id=$_SESSION["id"];



}; 
echo $_SESSION["roll_number"];
//sql connection
/*
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
echo "Connected successfully";



$sql = "CREATE TABLE IF NOT EXISTS student_details (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
roll_number VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);";

if ($conn->query($sql) === TRUE) {
    echo "Table hostel_students created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sq = "CREATE TABLE IF NOT EXISTS resume_verification (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
roll_number VARCHAR(30) NOT NULL,
resume_point VARCHAR(2000) NOT NULL,
verified_by VARCHAR(30) NOT NULL,
time_of_inserting TIMESTAMP,
verification VARCHAR(5) NOT NULL,
Comments VARCHAR(500),
time_of_verification VARCHAR(30)

)";
if ($conn->query($sq) === TRUE) {
    echo "Table hostel_students created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
//inserting data'

$sql = "INSERT INTO student_details (firstname, lastname, roll_number, email)
VALUES ('$first_name', '$last_name', '$roll_number', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




?>