<?php
session_start();

include('config.php');

// Get username and password from form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if username and password match
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authenticated, start session and store username
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    // Invalid credentials, redirect back to login page
    header("Location: admin-login.php");
}

$conn->close();
?>
