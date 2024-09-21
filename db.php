<?php

$Servername = "localhost";
$Username = "admintask";
$Password = "123456";
$Dbname = "taskphp";

try {
    $conn = new PDO("mysql:host=$Servername;dbname=$Dbname", $Username, $Password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}