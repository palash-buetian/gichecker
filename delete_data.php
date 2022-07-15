<?php

// Include config file
require_once "config.php";
ob_start(); // Initiate the output buffer

// Initialize the session
session_start();


//print_r($_SESSION);

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


if (isset($_GET["id"])) {

    $id = $_GET['id'];

    $delete_query = "DELETE FROM dag WHERE id = '{$id}'";

    //print_r($delete_query);

    if ($conn->query($delete_query) === TRUE) {
        $_SESSION['success_message'] = "এই দাগের তথ্য সফলভাবে মুছে দেয়া হয়েছে।";
    } else {
        $_SESSION['error_message'] = "এই দাগের তথ্য ডিলিট করা সম্ভব হয় নাই।";
    }

    $conn->close();
    header("location: dashboard.php");
    exit;
	
}
ob_end_flush(); // Flush the output from the buffer