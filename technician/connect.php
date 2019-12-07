<?php
$dbUsername = 'root';
$dbpass = '';
$dbName = 'medical_image_beta';
$dbServername = 'localhost';

$conn = mysqli_connect($dbServername, $dbUsername, $dbpass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }
   echo "Connected successfully";
?>