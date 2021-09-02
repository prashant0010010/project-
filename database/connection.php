<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'blogsite';

$conn = new MySQLi($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}