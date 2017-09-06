<?php
include 'header.php';
include 'dbh.php';

$columnNames = array();

if(isset($_SESSION['id'])) {
    $sql="SHOW COLUMNS FROM inventory";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        array_push($columnNames, $row['Field']);
    }

    echo "<br>&nbsp&nbspEnter what criteria you would like to see any matching items for.

        <form action ='searchInventoryResults.php' method ='POST'><br>";
            for($count = 0; $count< count($columnNames); $count++){
                echo "&nbsp&nbsp<label>$columnNames[$count]</label> <br>&nbsp&nbsp<input type='text' name=".$columnNames[$count]." value=".$row[$columnNames[$count]]."><br><br>";
            }
            echo "&nbsp&nbsp<button type='submit'>Submit</button></form>";
}
else{
    echo "<br> Please log in to manipulate the database";
}
?>