<?php
session_start();

include '../dbh.php';

$id = $_POST['id'];
$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$email = $_POST['email'];
$pwd = $_POST['password'];

$sql = "SELECT uid FROM users WHERE uid='$uid'";
$result = mysqli_query($conn, $sql);
$uidcheck = mysqli_num_rows($result);
if($uidcheck > 0) {
    //$currentID = $_SESSION['id'];
    $sql = "SELECT uid FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    if($uid != $row['uid']) {
        header("Location: ../editUser.php?error=username");
        exit();
    }
}

$sql = "SELECT email FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$emailcheck = mysqli_num_rows($result);
if($emailcheck > 0){
    //$currentID = $_SESSION['id'];
    $sql = "SELECT email FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    if($email != $row['email']) {
        header("Location: ../editUser.php?error=email");
        exit();
    }
}

$sql = "UPDATE users SET first = '$first', last = '$last', uid = '$uid', pwd = '$pwd', email = '$email' WHERE id ='$id'";

$result = mysqli_query($conn, $sql);

header("Location: ../acctInfo.php");

?>