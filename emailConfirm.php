<?php

include 'header.php';
include 'dbh.php';

$uid = $_GET['uid'];
$confirmCode = $_GET['confirmCode'];

$query = mysqli_query($conn,"SELECT * FROM users WHERE uid = '$uid'");

$row = mysqli_fetch_assoc($query);
$db_code = $row['confirmCode'];

if($confirmCode == $db_code){
    mysqli_query($conn,"UPDATE users SET confirmed = TRUE WHERE uid = '$uid'");
    mysqli_query($conn,"UPDATE users SET confirmCode = NULL");

    echo "<br>&nbsp&nbspThanks for registering your email address, please log in.";
    $_SESSION['id'] = $row['id'];
}
else{
    echo "<br>&nbsp&nbsp Username and code don't match";
}

?>