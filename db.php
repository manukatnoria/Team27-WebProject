<?php

$servername = "db";
$username = "mysite_db";
$password = "mydatabase";
$dbname = "mysite_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>