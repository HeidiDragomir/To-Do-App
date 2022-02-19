<?php

require "db_connection.php";
require "functions.php";
require "task_read.php";
require "task_create.php";

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
    <h1>My todo list</h1>
    <div class="container">

        <!-- FORM -->
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="index_form" method="post">
                <label for="task">New task:</label>
                <input type="text" id="task" name="task" placeholder="Add a task!">
                <label class="space" for="description">Description:</label>
                <input type="text" id="description" name="description" placeholder="Details">
                <input type="date" hidden name="created">
                <button type="submit" name="submit">Add</button>
            </form>
        </div>


        <!-- TABLE -->
        <div class="table">
            <table class="todo-list">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Completed</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>

                <tbody><?php
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row["Task"]; ?></td>
                            <td><?php echo $row["Description"]; ?></td>
                            <td><?php echo $row["Created"]; ?></td>
                            <td><?php echo $row["Completed"]; ?></td>
                            <td>
                                <a href="task_edit.php?edit=<?php echo $row["Id"]; ?>">Edit</a>
                            </td>
                            <td>
                                <a href="task_completed.php?completed=<?php echo $row["Id"]; ?>">Completed</a>
                            </td>
                            <td>
                                <a href="task_delete.php?id=<?php echo $row["Id"]; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>

    <footer>&copy; Copyright 2022 | Heidi</footer>
</body>

</html>