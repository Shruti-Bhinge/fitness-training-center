<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sneha_fitness";  // Replace with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>