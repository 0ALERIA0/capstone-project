<?php
session_start();

include('config.php');

// Get username and password from form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if username and password match and fetch the role
$sql = "SELECT * FROM my_employee WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user data
    $row = $result->fetch_assoc();
    $role = $row['employee_type'];
    
    // User authenticated, start session and store username and role
    $_SESSION['username'] = $username;
    $_SESSION['employee_type'] = $role;

    // Redirect based on user role
    if ($role == 'Doctor') {
        header("Location: doctor-account/doctor-dashboard.php");
    } elseif ($role == 'Nurse') {
        header("Location: nurse-account/patient.php");
    } else {
        // Handle other roles or invalid role cases
        header("Location: employee-login.php?error=invalid_role");
    }
} else {
    // Invalid credentials, redirect back to login page with an error message
    header("Location: employee-login.php?error=invalid_credentials");
}

$conn->close();
?>

