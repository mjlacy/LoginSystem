<?php
session_start();

include '../dbh.php';

$inv_id = $_POST['inv_id'];
$description = $_POST['description'];
$quantityStored = $_POST['quantityStored'];
$quantityOrdered = $_POST['quantityOrdered'];

$sql = "UPDATE inventory SET description = '$description', quantityStored = '$quantityStored', quantityOrdered = '$quantityOrdered'
WHERE inv_id = '$inv_id'";

$result = mysqli_query($conn, $sql);

header("Location: ../index.php");

?>