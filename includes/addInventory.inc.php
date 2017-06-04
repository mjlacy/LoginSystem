<?php
session_start();

include '../dbh.php';

$description = $_POST['description'];
$quantityStored = $_POST['quantityStored'];
$quantityOrdered = $_POST['quantityOrdered'];

$sql = "INSERT INTO inventory (description, quantityStored, quantityOrdered) 
        VALUES ('$description', '$quantityStored', '$quantityOrdered')";

$result = mysqli_query($conn, $sql);

header("Location: ../index.php");

?>