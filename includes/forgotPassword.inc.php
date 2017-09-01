<?php
session_start();
include '../dbh.php';

$email = $_POST['email'];

$sql = "SELECT email FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$emailcheck = mysqli_num_rows($result);
if($emailcheck == 0){
    header("Location: ../forgotPassword.php?error=email");
    exit();
}

else{
    $sql = "SELECT pwdRecoveryKey FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if($row = $result->fetch_assoc()){
        $pwdRecoveryKey = $row['pwdRecoveryKey'];

        $message = "Hello, a request has been made to reset your password for the login system. To reset your password, please follow this link: 
        http://localhost/loginsystem/newPassword.php?email=$email&pwdRecoveryKey=$pwdRecoveryKey";

        mail($email, "Password Recovery for Login System", $message, "From: ". 'DoNotReply@LoginSystem.com');

        header("Location: ../forgotPassword.php?sent");
    }
}

?>