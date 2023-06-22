<?php
// Retrieve user input from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$servername = "localhost";
$db_username = "root"; // Replace with your actual database username
$db_password = ""; // Replace with your actual database password
$db_name = "workout_tracker.db"; // Replace with your actual database name

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to fetch user data
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

// Check if the username exists in the database
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    // Verify the password
    if (password_verify($password, $hashedPassword)) {
        // Password is correct, user is authenticated
        session_start();
        $_SESSION['username'] = $username;
        header("Location : dashboard.html"); // Redirect to the dashboard page
        exit();
    } else {
        // Password is incorrect
        header("Location: login.html?error=invalid_password"); // Redirect back to login page with an error message
        exit();
    }
} else {
    // Username does not exist
    header("Location: login.html?error=invalid_username"); // Redirect back to login page with an error message
    exit();
}

$conn->close();
?>