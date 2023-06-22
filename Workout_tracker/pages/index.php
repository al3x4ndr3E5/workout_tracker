<?php


// Connect to the database
$servername = "127.0.0.1";
$username = "Alexandre";
$password = "vakvubem35";
$dbname = "workout_tracker.db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to the database successfully.";
}


// Retrieve the requested URL
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Parse the URL and determine the corresponding PHP file or function
switch ($url) {
    case '':
        // Homepage
        include 'home.php';
        break;
    case 'login':
        // Login page
        include 'login.php';
        break;
    case 'dashboard':
        // Dashboard page
        include 'dashboard.php';
        break;
    default:
        // Handle 404 - page not found
        include '404.php';
        break;
}

?>
