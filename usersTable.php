<?php

include 'header.php';
include 'dbh.php';

if(isset($_SESSION['id'])) {
    $currentID = $_SESSION['id'];
    $sql = "SELECT type FROM users WHERE id='$currentID'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $acctType = $row['type'];

    if ($acctType != "Admin") {
        echo "<br>&nbsp&nbspSorry, only administrators may see the users";
    } else {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        echo "<table cellspacing='10'><tr><th>First Name</th>
        <th>Last Name</th>
        <th>Account Name</th>
        <th>Email Address</th>
        <th>Account Type</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                <td> " . $row['first'] . "</td>
                <td> " . $row['last'] . "</td>
                <td> " . $row['uid'] . "</td>
                <td> " . $row['email'] . "</td>
                <td> " . $row['type'] . " </td>
                <td> <a href='editUser.php?edit=$row[id]'>Edit<br></td>
                <td> <a href='includes/deleteUser.inc.php?delete=$row[id]'>Delete<br></td>
            </tr><br>";
        }
    }
}
?>