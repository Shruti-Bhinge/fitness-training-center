<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sneha_fitness";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql)) {
    echo "<script>alert('Registration Successful! Redirecting to login...'); window.location.href='login.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>