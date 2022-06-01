<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
}

// Redirect to login page
header("location: login.php");
exit;
?><?php
