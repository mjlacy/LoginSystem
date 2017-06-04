<?php
session_start();
include '../dbh.php';

$uid = mysqli_real_escape_string($conn, $_POST['uid']); //Prevents SQL Injection
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']); //Prevents SQL Injection

$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd = '$pwd' ";

$result = mysqli_query($conn, $sql);

if(!$row = mysqli_fetch_assoc($result)){
	//echo "Your username or password is incorrect!";
    header("Location: ../index.php?error=input");
} else {
	$_SESSION['id'] = $row['id'];
	header("Location: ../index.php");
}
?>