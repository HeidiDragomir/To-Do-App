<?php

require "db_connection.php";
require "functions.php";


$id = $_GET["id"];

deleteTask($id);
header("location: index.php");
die;
