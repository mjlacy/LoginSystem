<?php
session_start();

include '../dbh.php';

$name = $_POST['name'];

$sql = "ALTER TABLE inventory ADD $name VARCHAR(100);";

$result = mysqli_query($conn, $sql);

header("Location: ../index.php");

?>