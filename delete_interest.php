<?php

// Include config file
require_once "config.php";

// Initialize the session
session_start();

//print_r($_SESSION);

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


if (isset($_GET["interest_id"])) {

    $id = $_GET['interest_id'];



    $delete_query = "DELETE FROM interest WHERE interest_id = '{$id}'";

   // print_r($delete_query);

    if ($conn->query($delete_query) === TRUE) {
        $_SESSION['success_message'] = "সরকারি স্বাত্থের ধরণ সফলভাবে মুছে দেয়া হয়েছে।";
    } else {
        $_SESSION['error_message'] = "সরকারি স্বার্থের ধরণ ডিলিট করা সম্ভব হয় নাই।";
    }


    $delete_dag = "DELETE FROM dag WHERE interest_id = '{$id}'";


    if ($conn->query($delete_dag) === TRUE) {
        $_SESSION['success_message'] = "সকল মৌজা হতে এই ধরণের সরকারি স্বার্থ মুছে দেয়া হয়েছে।";
    } else {
        $_SESSION['error_message'] = "সকল মৌজা হতে এই ধরণের সরকারি স্বার্থ ডিলিট করা সম্ভব হয় নাই।";
    }


    $conn->close();
    header("location: interest.php");
    exit;
}