<?php
$servername = "localhost";
$username = "u380514009_nghia";
$password = "261997";
$dbname = "u380514009_ezfb";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>



