<?php

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Validate form data
if (empty($username) || empty($password)) {
    // Display an error message if any required field is empty
    $error = "Please fill in all the required fields.";
} else {
    // Connect to the database
    $servername = "localhost";
    $dbUsername = "root"; // Replace with your actual database username
    $dbPassword = ""; // Replace with your actual database password
    $dbName = "workout_tracker.db"; // Replace with your actual database name

    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        // Display an error message if unable to connect to the database
        $error = "Connection failed: " . mysqli_connect_error();
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the users table
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Registration successful, redirect to login page
            header("Location: login.html");
            exit();
        } else {
            // Display an error message if unable to insert user data
            $error = "Registration failed. Please try again.";
        }

        // Close the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

// Display an error message if any
if (isset($error)) {
    echo $error;
}
?>
