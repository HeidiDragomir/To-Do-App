<?php

$dsn = "mysql:host=mysql;dbname=todo_list";
$user = "root";
$password = "secret";

// Connect to database

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}


// If connection fails

catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
