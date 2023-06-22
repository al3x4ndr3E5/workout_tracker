<?php
// Connect to the database
$servername = "127.0.0.1";
$db_username = "Alexandre"; // Replace with your actual database username
$db_password = "vakvubem35"; // Replace with your actual database password
$db_name = "workout_tracker.db"; // Replace with your actual database name

$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected to the database successfully!";
}

// Close the database connection
mysqli_close($conn);
?>
