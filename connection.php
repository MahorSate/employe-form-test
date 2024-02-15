<?php
$host = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$database = "test";

$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>