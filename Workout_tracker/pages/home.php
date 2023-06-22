<?php
// Start a session to authenticate the user
session_start();

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Retrieve the logged-in user's username from the session
$username = $_SESSION['username'];
?>