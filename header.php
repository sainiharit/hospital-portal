<?php
session_start();
$servername = "localhost";
$username = "id17283697_root";
$password = "HELLOworld@2020";
$dbname = "id17283697_hospital";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection to server failed: " . $conn->connect_error);
}
?>
