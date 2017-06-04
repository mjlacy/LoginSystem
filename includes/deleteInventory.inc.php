<?php
session_start();

include '../dbh.php';

$inv_id = $_GET['delete'];

$sql = "DELETE FROM inventory WHERE inv_id = '$inv_id'";

$result = mysqli_query($conn, $sql);

header("Location: ../index.php");

?>