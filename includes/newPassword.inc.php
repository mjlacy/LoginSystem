<?php

session_start();
include '../dbh.php';

$email = $_POST['email'];
$pwdRecoveryKey = $_POST['pwdRecoveryKey'];
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];

if($newPassword !== $confirmNewPassword){
    header("Location: ../newPassword.php?email=".$email."&pwdRecoveryKey=".$pwdRecoveryKey."&error=noMatch");
    exit();
}

$sql = "UPDATE users SET pwd = '$newPassword' WHERE email ='$email'";
$result = mysqli_query($conn, $sql);

header("Location: ../newPassword.php?success");

?>