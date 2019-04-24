<?php
$servername = "localhost";
$username = "u380514009_repib";
$password = "261997";
$dbname = "u380514009_repib";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 