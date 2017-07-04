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
    $sql = "SELECT id, confirmed FROM users WHERE uid='$uid'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $confirmed = $row['confirmed'];

    if ($confirmed != 1) {
        header("Location: ../index.php?error=unregistered");
    }
    else{
        $_SESSION['id'] = $id;
        header("Location: ../index.php");
    }
}
?>