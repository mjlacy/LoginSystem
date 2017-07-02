<?php
session_start();
include '../dbh.php';

$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$stmt = $conn->prepare("SELECT * FROM users WHERE uid= ? AND pwd = ?");
$stmt->bind_param("ss", $username, $password);

$username = $uid;
$password = $pwd;
$stmt->execute();

$result = $stmt->get_result();

if(!$row = mysqli_fetch_assoc($result)){
    header("Location: ../index.php?error=input");
} else {
	$_SESSION['id'] = $row['id'];
	header("Location: ../index.php");
}
?>