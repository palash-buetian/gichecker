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


if (isset($_GET["mouja_id"])) {

    $id = $_GET['mouja_id'];



    $delete_query = "DELETE FROM mouja WHERE id = '{$id}'";


    if ($conn->query($delete_query) === TRUE) {
        $_SESSION['success_message'] = "এই মৌজা সফলভাবে মুছে দেয়া হয়েছে।";
    } else {
        $_SESSION['error_message'] = "এই মৌজা ডিলিট করা সম্ভব হয় নাই।";
    }


    $delete_dag = "DELETE FROM dag WHERE mouja_id = '{$id}'";


    //print_r($delete_query);

   // print_r($delete_dag);

    if ($conn->query($delete_dag) === TRUE) {
        $_SESSION['success_message'] = "এই মৌজার সকল দাগ মুছে দেয়া হয়েছে।";
    } else {
        $_SESSION['error_message'] = "এই মৌজার সকল দাগ ডিলিট করা সম্ভব হয় নাই।";
    }


    $conn->close();
    header("location: mouja.php");
    exit;
}