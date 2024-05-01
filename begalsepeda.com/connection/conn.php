<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "begalsepeda";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if ($db->connect_error) {
    echo "Failed to connect to the database";
    die("Error!");
}

?>