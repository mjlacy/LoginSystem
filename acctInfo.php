<?php

include 'header.php';
include 'dbh.php';

if(isset($_SESSION['id'])) {
    $currentID = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='$currentID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo "<table cellspacing='10'><tr><td><b>First Name: </b>".$row['first']."</td></tr>
    <td><b>Last Name: </b>".$row['last']."</td></tr>
    <td><b>Account Name: </b>".$row['uid']."</td></tr>
    <td><b>Email Address: </b>".$row['email']."</td></tr>
    <td><b>Account Type: </b>".$row['type']."</td></tr></table>
    
    &nbsp&nbsp<a href='editMyAcct.php?edit=$row[id]'>Edit</a>";
}

?>