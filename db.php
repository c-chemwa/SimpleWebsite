<?php
// db.php

$servername = "localhost";
$username = "root";   // Database username
$password = "C@p1t0l$";       // Database password
$dbname = "CAT1";     // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
