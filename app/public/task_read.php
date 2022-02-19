<?php

require "db_connection.php";


global $conn;

$query = "SELECT * FROM tasks ORDER BY Id ASC";

$stmt = $conn->prepare($query);

$stmt->execute();
