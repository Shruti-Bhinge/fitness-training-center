<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sneha_fitness";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        echo "<script>alert('Login Successful!'); window.location.href='index1.html';</script>";
    } else {
        echo "<script>alert('Invalid password'); window.location.href='login.html';</script>";
    }
} else {
    echo "<script>alert('User not found'); window.location.href='login.html';</script>";
}
$conn->close();
?>