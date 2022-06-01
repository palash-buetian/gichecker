<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "gichecker";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
$conn->set_charset('utf8mb4');
if (!$conn)
{
    die('Could not Connect MySql Server:' . mysql_error());
}
?>