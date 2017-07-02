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

        $confirmCode = rand();

        $sql = "INSERT INTO users (first, last, uid, pwd, email, confirmed, confirmCode) 
        VALUES ('$first', '$last', '$uid', '$pwd', '$email', FALSE , '$confirmCode')";

        $result = mysqli_query($conn, $sql);

        $message = "Thanks for signing up, please click the following link to confirm your email address.
         http://localhost/loginsystem/emailconfirm.php?uid=$uid&code=$confirmCode";

        mail($email, $_REQUEST["Confirm Email for Login System"], $_REQUEST[$message], "From: ". $_REQUEST['DoNotReply@LoginSystem.com']);

        echo "Thanks for signing up, please check your email for an account confirmation link.";
        //header("Location: ../index.php");
    }
}
?>gi