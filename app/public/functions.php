<?php

require "db_connection.php";

// Delete a task

function deleteTask($id)
{
    global $conn;

    $query = "DELETE FROM tasks WHERE id=:id";

    $stmt = $conn->prepare($query);

    $stmt->bindValue("id", $id);

    $stmt->execute();
}
