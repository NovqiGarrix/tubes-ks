<?php

$servername = "127.0.0.1";
$port = 8889;
$username = "root";
$password = "root";
$database = "ks";

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
