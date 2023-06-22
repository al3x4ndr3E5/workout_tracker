<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}

include 'dashboard.html';

?>


