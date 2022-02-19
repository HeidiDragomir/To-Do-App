<?php

require "db_connection.php";

global $conn;

if (isset($_GET["completed"])) {

    $id = $_GET['completed'];
    $completed = "DONE";

    $query = "UPDATE tasks SET Completed = :completed
    WHERE Id = :id";

    $stmt = $conn->prepare($query);
    $stmt->execute([

        "id" => $id,
        "completed" => $completed

    ]);

    header("location: index.php");
}
