<?php
$host = 'localhost';
$user = 'your_username';
$password = 'your_password';
$database = 'your_database';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully!";
$conn->close();
?>
