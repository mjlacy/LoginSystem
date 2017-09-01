<?php
session_start();

include '../dbh.php';

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

if(empty($first)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($last)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($email)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($uid)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($pwd)){
    header("Location: ../signup.php?error=empty");
    exit();
}
else{
    $sql="SELECT uid FROM users WHERE uid='$uid'";
    $result = mysqli_query($conn, $sql);
    $uidcheck = mysqli_num_rows($result);
    if($uidcheck > 0){
        header("Location: ../signup.php?error=username");
        exit();
    }
    $sql="SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $emailcheck = mysqli_num_rows($result);
    if($emailcheck > 0){
        header("Location: ../signup.php?error=email");
        exit();
    }
    else{
        $stmt = $conn->prepare("INSERT INTO users (first, last, uid, pwd, email, confirmed, confirmCode) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssss", $firstname, $lastname, $username, $password, $email2, $confirmed, $confirmCode, $pwdRecoveryKey);

        $firstname = $first;
        $lastname = $last;
        $username = $uid;
        $password = $pwd;
        $email2 = $email;
        $confirmed = FALSE;
        $confirmCode = rand();
        $pwdRecoveryKey = rand();

        $stmt->execute();

        $message = "Thanks for signing up, please click the following link to confirm your email address.
         http://localhost/loginsystem/emailConfirm.php?uid=$uid&confirmCode=$confirmCode";

        mail($email, "Confirm Email for Login System", $message, "From: ". 'DoNotReply@LoginSystem.com');

        header("Location: ../signup.php?error=unregistered");

        //header("Location: ../index.php");
    }
}
?>