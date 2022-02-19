<?php

require "db_connection.php";

if (isset($_POST["submit"])) {

    $task = $_POST["task"];
    $description = $_POST["description"];
    $created = date("Y-m-d H:i:s");

    $query = "INSERT INTO tasks (Task, Description, Created)
            VALUES (:task, :description, :created)
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute([

        "task" => $task,
        "description" => $description,
        "created" => $created
    ]);

    header("location: index.php");
}
