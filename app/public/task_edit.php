<?php

require "db_connection.php";


global $conn;

if (isset($_GET["edit"])) {

    $id = $_GET['edit'];
    $query = "SELECT * FROM tasks WHERE id=:id";
    $stmt = $conn->prepare($query);

    $stmt->bindValue("id", $id);

    $stmt->execute();

    $info = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST["update"], $_GET["edit"])) {

    $id = $_GET["edit"];
    $task = $_POST["task"];
    $description = $_POST["description"];
    $created = date("Y-m-d H:i:s");

    $query2 = "UPDATE tasks SET Id = :id, Task = :task, Description = :description, Created = :created
    WHERE Id = :id";

    $stmt2 = $conn->prepare($query2);
    $stmt2->execute([
        "id" => $id,
        "task" => $task,
        "description" => $description,
        "created" => $created

    ]);
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list application</title>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
</head>

<body>
    <form class="edit_form" action="" method="post">

        <label for="task">Edit task:</label>

        <input type="text" id="task" value="<?php echo $info['Task'] ?>" name="task">
        <label class="space" for="description">Edit description:</label>
        <input type="text" id="description" value="<?php echo $info['Description'] ?>" name="description">
        <input type="date" hidden name="created">

        <button type="submit" name="update">Update</button>



    </form>

    <footer>&copy; Copyright 2022 | Heidi</footer>

</body>

</html>