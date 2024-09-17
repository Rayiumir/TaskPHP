<?php

$Servername = "localhost";
$Username = "admintask";
$Password = "123456";
$Dbname = "taskphp";

try {
    $conn = new PDO("mysql:host=$Servername;dbname=$Dbname", $Username, $Password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}