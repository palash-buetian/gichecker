<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "gichecker";
$conn = new mysqli($servername, $username, $password, "$dbname");
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$conn->set_charset('utf8mb4');
if (!$conn)
{
    die('Could not Connect MySql Server:' . mysql_error());
}
?>