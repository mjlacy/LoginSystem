<?php
session_start();

include '../dbh.php';

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

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
    $sql="SELECT uid FROM user WHERE uid='$uid'";
    $result = mysqli_query($conn, $sql);
    $uidcheck = mysqli_num_rows($result);
    if($uidcheck > 0){
        header("Location: ../signup.php?error=username");
        exit();
    }
    $sql="SELECT email FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $emailcheck = mysqli_num_rows($result);
    if($emailcheck > 0){
        header("Location: ../signup.php?error=email");
        exit();
    }
    else{
        $sql = "INSERT INTO user (first, last, email, uid, pwd) 
        VALUES ('$first', '$last', '$email', '$uid', '$pwd')";

        $result = mysqli_query($conn, $sql);

        header("Location: ../index.php");
    }
}
?>