<?php
 
$server = "localhost";
$database = "biblioteca";
$username = "root";
$pass = "";


// Create connection
$conn = new PDO("mysql:host=$server;dbname=$database", $username, $pass);
// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 